<?php

namespace App\Providers;

use App;
use App\Settings\Setting;
use Illuminate\Support\ServiceProvider;

class SettingFacadesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('setting', function () {
            return new Setting;
        });
    }

    public function boot()
    {
        //
    }
}
