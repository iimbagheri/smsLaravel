<?php

if (! function_exists('sms')) {
    /**
     * Access SmsManager through helper.
     * @return \Exonyx\Sms\Sms
     */
    function sms()
    {
        return app('exonyx-sms');
    }
}
