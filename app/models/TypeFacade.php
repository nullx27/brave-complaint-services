<?php namespace App\Models;

use Illuminate\Support\Facades\Facade;


class TypeFacade extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'types';
    }
}