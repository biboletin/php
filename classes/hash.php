<?php

namespace Biboletin;

use Exception;

class Hash
{
    // private static $init;
    private static $salt;
    private static $algorithm;
    private static $default = false;

    public static function hashit($stringForHash)
    {
        $hash;

        if (self::$algorithm === 'md5') {
            $hash = md5($stringForHash);
            return $hash;
        }

        if (self::$algorithm == 'crypt') {
            $hash = crypt($stringForHash, self::$salt);
            return $hash;
        }

        return $hash;
    }
    public static function check($unhashed, $hashed)
    {
        if (self::$algorithm === 'md5') {
            return md5(trim($unhashed)) === $hashed;
        }

        if (self::$algorithm === 'crypt') {
            return hash_equals($hashed, crypt($unhashed, $hashed));
        }
    }

    public static function setAlgorithm($algo = null)
    {
        $algorithm = strtolower($algo);

        if (empty($algorithm) || ($algorithm === null)) {
            throw new Exception(__METHOD__ . ": missing or empty argument's!");
        }

        if ($algorithm == 'bcrypt') {
            self::$algorithm = strip_tags(trim($algorithm));
        }

        if ($algorithm == 'crypt') {
            self::$algorithm = strip_tags(trim($algorithm));
        }

        if (in_array($algorithm, hash_algos())) {
            self::$algorithm = strip_tags(trim($algorithm));
        }
    }

    public static function getAlgorithm()
    {
        return strtoupper(self::$algorithm);
    }

    public static function setSalt($salt = null)
    {
        $salt = trim($salt);
        if (empty($salt) || ($salt === null)) {
            throw new Exception(__METHOD__ . ": missing or empty argument's!");
        }

        self::$salt = $salt;
    }
    public static function getSalt()
    {
        return self::$salt;
    }
}
