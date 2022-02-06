<?php

namespace Exonyx\Sms\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Exonyx\Sms\Sms
 */
class Sms extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'exonyx-sms';
    }
}
