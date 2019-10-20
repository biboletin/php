<?php
namespace Biboletin;

use Exception;

class User implements Users
{
    private static $username;
    private static $password;

    public function setUserName($username)
    {
        $name = strip_tags(trim($username));
        if (empty($name)) {
            throw new Exception('Username cant be empty');
        }
        self::$username = $name;
    }

    public function getUserName()
    {
        return self::$username;
    }
}
