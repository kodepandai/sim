<?php

namespace KodePandai\SatuSehat\Exceptions;

use Exception;

class SatuSehatApiException extends Exception
{
    public function __construct(public array $errorData)
    {
        parent::__construct('Request Failed');
    }
}
