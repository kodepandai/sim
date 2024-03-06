<?php

namespace KodePandai\SatuSehat\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array getConfig()
 */
class SatuSehat extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'satu-sehat';
    }
}
