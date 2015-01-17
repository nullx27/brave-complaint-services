<?php

class Complaint extends Eloquent {

    protected $table = 'complaints';
    protected $guarded = array('id');


    public function scopeStatus($query, $status){

        if(empty($status) || $status == 'all'){
            return $query;
        }

        return $query->whereStatus($status);
    }

    public function scopeType($query, $type){
        if(empty($type) || $type == 'all'){
            return $query;
        }

        return $query->whereType($type);
    }

    public function scopeName($query, $name){
        $name = trim($name);

        if(empty($name)){
            return $query;
        }

        // Are we searching a complaint number?
        if(is_numeric($name)){
            return $query->where('id', '=', $name);
        }

        $user_ids = ApiUser::idByName($name)->get()->toArray();

        // if array is empty search for user id 0 so a empty result set returns
        if(count($user_ids) == 0){
            $user_ids = array(0);
        }

        //only return name searches that are not anonymous
        return $query->whereIn('user_id', array_flatten($user_ids))->where('anonymous', '=', false);
    }

}