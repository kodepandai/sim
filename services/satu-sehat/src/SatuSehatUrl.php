<?php

namespace KodePandai\SatuSehat;

class SatuSehatUrl
{
    const oauthBaseUrl = [
        'production' => 'https://api-satusehat.kemkes.go.id/oauth2/v1',
        'development' => 'https://api-satusehat-stg.dto.kemkes.go.id/oauth2/v1',
    ];

    const baseUrl = [
        'production' => 'https://api-satusehat.kemkes.go.id/fhir-r4/v1',
        'development' => 'https://api-satusehat-stg.dto.kemkes.go.id/fhir-r4/v1',
    ];

    const consentUrl = [
        'production' => 'https://api-satusehat.kemkes.go.id/consent',
        'development' => 'https://api-satusehat-stg.dto.kemkes.go.id/consent/v1',
    ];

    public function __construct(protected string $mode = 'production')
    {
    }

    public function oauthBaseUrl(?string $path): string
    {
        return self::oauthBaseUrl[$this->mode].($path ?? '');
    }

    public function baseUrl(?string $path): string
    {
        return self::baseUrl[$this->mode].($path ?? '');
    }

    public function consentUrl(?string $path): string
    {
        return self::consentUrl[$this->mode].($path ?? '');
    }
}
