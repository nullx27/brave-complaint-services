<?php

class LoginController extends BaseController {

    private $api = null;

    public function __construct(){
        $this->api = new Brave\API(
            Config::get('braveapi.application-endpoint'),
            Config::get('braveapi.application-identifier'),
            Config::get('braveapi.local-private-key'),
            Config::get('braveapi.remote-public-key'));
    }

    public function loginView(){
        $view = $this->_defaultView()
            ->nest('content', 'login');

        return $view;
    }

    public function loginAction(){
        $info_data = array(
            'success' => route('info'),
            'failure' => route('info')
        );

        try{
            $result = $this->api->core->authorize($info_data);
        } catch (Exception $e) {
            return Redirect::route('login')
                ->with('flash_error', 'Login Failed, Please Try Again');
        }

        return Redirect::to($result->location);
    }

    public function infoAction(){
        $token = Input::get('token', false);

        if($token == false) {
            return Redirect::route('login')
                ->with('flash_error', 'Login Failed, Please Try Again');
        }
        if (Auth::attempt(array('token' => $token)))
        {
            return Redirect::route('home');
        }
        else
        {
            return Redirect::route('login')
                ->with('flash_error', 'Login Failed, Please Try Again');
        }
    }

    public function logoutAction(){
        //$token = Auth::user()->token;
        Auth::logout();
        return Redirect::route('home')
            ->with('flash_notice', 'You are successfully logged out.');
    }

    public function deauthAction(){
        $user = Auth::user();
        $this->api->core->deauthorize(array('token' => $user->token));
        $user->status = 0;
        $user->save();
        Auth::logout();

        return Redirect::route('home')
            ->with('flash_notice', 'You are successfully logged out.');
    }

}
