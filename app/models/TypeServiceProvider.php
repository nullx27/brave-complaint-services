<?php namespace App\Models;

use Illuminate\Support\ServiceProvider;

class TypeServiceProvider extends ServiceProvider {

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('types', function()
        {
            return new Types;
        });
    }


}