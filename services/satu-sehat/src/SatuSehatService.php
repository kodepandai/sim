<?php

namespace KodePandai\SatuSehat;

use Illuminate\Foundation\Application;

class SatuSehatService
{
    public function __construct(protected Application $app)
    {
    }

    public function getVersion()
    {
        return $this->app->version();
    }
}
