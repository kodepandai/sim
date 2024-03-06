<?php

namespace KodePandai\SatuSehat;

use Illuminate\Support\Facades\Http;
use KodePandai\SatuSehat\Exceptions\SatuSehatApiException;

class SatuSehatApi
{
    protected SatuSehatUrl $url;

    protected string $accessToken;

    public function __construct(protected array $config)
    {
        $this->url = new SatuSehatUrl($config['mode']);
    }

    public function setToken(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    protected function apiCall(string $method, string $url, array $data = []): array
    {
        $res = Http::asForm()->{$method}(
            $url,
            $data
        );
        if ($res->failed()) {
            throw new SatuSehatApiException($res->json());
        }

        return $res->json();
    }

    public function getToken(): array
    {

        return $this->apiCall(
            method: 'post',
            url: $this->url->oauthBaseUrl('/accesstoken?grant_type=client_credentials'),
            data: [
                'client_id' => $this->config['client_key'],
                'client_secret' => $this->config['secret_key'],
            ]
        );
    }
}
