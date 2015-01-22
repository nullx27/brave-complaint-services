<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserProviderInterface;

class ApiUserProvider implements UserProviderInterface {

    public function retrieveById($identifier){
        return ApiUser::find($identifier);
    }

    public function retrieveByCredentials(array $credentials){
        try{
            $user = ApiUser::where('token', '=', $credentials['token'])->get();

            if(isset($user[0])){
                return $user[0];
            } else {
                $api = new Brave\API(Config::get(
                    'braveapi.application-endpoint'),
                    Config::get('braveapi.application-identifier'),
                    Config::get('braveapi.local-private-key'),
                    Config::get('braveapi.remote-public-key'));

                try {
                    $result = $api->core->info(array('token' => $credentials['token']));
                } catch(Exception $e){
                    return Redirect::route('login')
                        ->with('flash_error', 'Login Failed, Please Try Again');
                }


                if(!isset($result->character->name)){
                    return Redirect::route('login')
                        ->with('flash_error', 'Login Failed, Please Try Again');
                }

                $user = $this->updateUser($credentials['token'], $result);
                return $user;
            }
        }
        catch(Exception $e){
            echo "\n\n";
            echo $e->getMessage();
            echo "\n\n";
            echo "Credentials:\n";
            var_dump($credentials);
            echo "\n\n";
            exit;
        }
    }

    public function validateCredentials(UserInterface $user, array $credentials){
        if(isset($user->token) and $user->token == $credentials['token']){
            return true;
        }

        try {
            $api = new Brave\API(Config::get(
                'braveapi.application-endpoint'),
                Config::get('braveapi.application-identifier'),
                Config::get('braveapi.local-private-key'),
                Config::get('braveapi.remote-public-key'));

            $result = $api->core->info(array('token' => $credentials['token']));

            if(!isset($result->character->name)) {
                return Redirect::route('login')
                    ->with('flash_error', 'Login Failed, Please Try Again');
            }

            $this->updateUser($credentials['token'], $result);
            return true;
        } catch(Exception $e) {
            return Redirect::route('login')
                ->with('flash_error', 'Login Failed, Please Try Again');
        }
    }

    public function retrieveByToken($identifier, $token) {}

    public function updateRememberToken(UserInterface $user, $token) {}

    private function updateUser($token, $result) {

        // Get alliance info
        $api = new Brave\API(
            Config::get('braveapi.application-endpoint'),
            Config::get('braveapi.application-identifier'),
            Config::get('braveapi.local-private-key'),
            Config::get('braveapi.remote-public-key'));

        try {
            $alliance_result = $api->lookup->alliance(array('search' => $result->alliance->id, 'only' => 'short'));
        } catch(Exception $e) {
            return Redirect::route('login')
                ->with('flash_error', 'Login Failed, Please Try Again');
        }

        // filter permissions and save only the relevant ones
        $namespace = Config::get('braveapi.application-permission-namespace');
        $perms = $result->perms;

        $relevant_perms = array_filter($perms, function($var) use ($namespace) {
            return starts_with($var, $namespace);
        });

        $relevant_perms = serialize($relevant_perms);

        // check for existing user
        $userfound = ApiUser::find($result->character->id);
        if($userfound == false)
        {
            // no user found, create it
            $userfound = ApiUser::create(array(
                'id' => $result->character->id,
                'token' => $token,
                'remember_token' => '',
                'character_name' => $result->character->name,
                'alliance_id' => $result->alliance->id,
                'alliance_name' => $result->alliance->name,
                'alliance_ticker' => $alliance_result->short,
                'user_permissions' => $relevant_perms,
                'tags' => serialize($result->tags),
                'status' => 1,
            ));
        }
        else
        {
            // update the existing user
            $userfound->token = $token;
            $userfound->token = $token;
            $userfound->character_name = $result->character->name;
            $userfound->alliance_id = $result->alliance->id;
            $userfound->alliance_name = $result->alliance->name;
            $userfound->user_permissions = $relevant_perms;
            $userfound->tags = serialize($result->tags);
            $userfound->status = 1;

            $userfound->save();
        }

        return $userfound;
    }
}
