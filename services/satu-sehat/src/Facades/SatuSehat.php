<?php

namespace KodePandai\SatuSehat\Facades;

use Illuminate\Support\Facades\Facade;

class SatuSehat extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'satu-sehat';
    }
}
