<?php

namespace Biboletin;

use Biboletin\Session;

class Token
{
    /**
     * Hold token
     *
     * @var [string]
     */
    private static $token;

    /**
     * Create Token
     *
     * @return [string]
     */
    public static function generateToken()
    {
        Session::start();
        // Session::del("token");

        $token = bin2hex(random_bytes(32));

        return Session::set("token", $token);
    }
    public static function checkToken($token)
    {
        return (Session::get("token") === $token);
    }
    public static function deleteToken()
    {
        Session::start();
        Session::del("token");
    }
}
