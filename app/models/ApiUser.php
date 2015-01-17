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


    public function hasPermission($permission){

        if(is_null($this->_permissions)){
            $this->_permissions = unserialize($this->user_permissions);
        }

        return in_array($permission, $this->_permissions);
    }


    public function canReview($what = null){
        if(is_null($what))
            return $this->hasPermission('complaint.test.review');
        else
            return $this->hasPermission('complaint.test.review.'.$what);
    }


    public function scopeIdByName($query, $name){
        return $query->select('id')->where('character_name', 'LIKE', "%{$name}%");
    }
}