<?php

namespace KodePandai\SatuSehat;

use Illuminate\Support\ServiceProvider;

class SatuSehatServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('satu-sehat', function ($app) {
            return new SatuSehatService($app);
        });
    }
}
