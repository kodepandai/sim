<?php

namespace KodePandai\SatuSehat;

use Illuminate\Foundation\Application;

class SatuSehatService
{
    protected SatuSehatApi $api;

    public function __construct(protected Application $app)
    {
        $this->api = new SatuSehatApi($this->getConfig());
    }

    public function getConfig(): array
    {
        return $this->app->config->get('satu-sehat');
    }

    public function generateToken(): string
    {
        $res = $this->api->getToken();
        $token = $res['access_token'];
        $this->api->setToken($token);

        return $token;
    }
}
