<?php

namespace Biboletin;

use Exception;

class Curl
{
    private static $init;

    private function __construct()
    {

        if (!extension_loaded("curl")) {
            throw new Exception("Curl library is not enabled!");
        } else {
            self::$init = curl_init();
        }
    }

    private static function init()
    {
        if (!self::$init) {
            self::$init = new self();
        }
        return self::$init;
    }

    public static function get($url = null)
    {
        self::$init;
        self::setOptions(CURLOPT_URL, $url);
        self::setOptions(CURLOPT_CUSTOMREQUEST, 'GET');
        self::setOptions(CURLOPT_RETURNTRANSFER, true);
        self::setOptions(CURLOPT_HTTPGET, true);

        $res = curl_exec(curl_init());
        curl_close(curl_init());

        return $res;
    }

    private static function setOptions($option, $value)
    {
// var_dump(gettype(self::init()));
        $success = curl_setopt(curl_init(), $option, $value);
// var_dump($success);
// var_dump($success, $option, $value);
        // if(!$success){
            // throw new Exception("");
        // }
        return $success;
    }
    public static function post($url = null)
    {
    }
    public static function download($url = null)
    {
    }
}
