<?php

use Illuminate\Auth\UserInterface;

class ApiUser extends Eloquent implements UserInterface {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'api_users';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('token');

    protected $_permissions = null;

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $fillable = array('id',
                                'token',
                                'remember_token',
                                'character_name',
                                'alliance_id',
                                'alliance_name',
                                'tags',
                                'status',
                                'permission',
                                'user_permissions');
    private $token;


    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier(){
        return $this->getKey();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword(){
        return $this->token;
    }

    public function getRememberToken(){
        return $this->remember_token;
    }

    public function setRememberToken($value){
        $this->remember_token = $value;
    }

    public function getRememberTokenName(){
        return 'remember_token';
    }


    public function hasPermission($permission)
    {
        if(is_null($this->_permissions)){
            $this->_permissions = unserialize($this->user_permissions);
        }

        return in_array($permission, $this->_permissions);
    }

    public function isReviewer($is_admin = false){
        //check if user has all permission else check if he has reviewer rights
        if($is_admin)
        {
            return $this->hasPermission(Config::get('braveapi.permission-review-all'));
        }

        return $this->hasPermission(Config::get('braveapi.application-permission-review'));
    }

    public function canReview($what = null){
        if(is_null($what))
        {
            return $this->hasPermission(Config::get('braveapi.permission-review-all'));
        }
        else
        {
            if(is_null($this->_permissions)){
                $this->_permissions = unserialize($this->user_permissions);
            }

            // if user can review all complaints don't bother to check for specifics
            if(in_array(Config::get('braveapi.permission-review-all'), $this->_permissions)){
                return true;
            }

            $perm = Types::getPermission($what);
            return in_array($perm, $this->_permissions);
        }

    }


    public function scopeIdByName($query, $name){
        return $query->select('id')->where('character_name', 'LIKE', "%{$name}%");
    }

    public function getPermissions(){
        return $this->_permissions;
    }

}