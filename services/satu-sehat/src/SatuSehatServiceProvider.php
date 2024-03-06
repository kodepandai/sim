<?php

namespace KodePandai\SatuSehat;

use Illuminate\Support\ServiceProvider;

class SatuSehatServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/satu-sehat.php', 'satu-sehat');
        $this->app->singleton('satu-sehat', function ($app) {
            return new SatuSehatService($app);
        });
    }
}
