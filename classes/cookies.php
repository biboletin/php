<?php
/**
 *
 */
namespace Biboletin;

use Exception;
use DateTime;

/**
 * Undocumented class
 */
class Cookie
{
    private static $cookieName = '';
    private static $cookieValue = '';
    private static $cookieTime;
    private static $cookieDomain = '';
    private static $cookiePath = '';
    private static $cookieSecured = false;
    private static $cookieHttpOnly = false;
    // private static $useDefaults = false;
/**
 * Undocumented function
 *
 * @param [type] $name
 * @return void
 */
    public static function setName($name)
    {
        self::$cookieName = strip_tags(trim($name));
    }
/**
 * Undocumented function
 *
 * @param [type] $val
 * @return void
 */
    public static function setValue($val)
    {
        $value = strip_tags(trim($val));
        self::$cookieValue = $value;
    }
/**
 * Undocumented function
 *
 * @param [type] $time
 * @return void
 */
    public static function setTime($time)
    {
        $date = new DateTime();
        $date->modify($time);
        self::$cookieTime = $date->getTimestamp();
    }
/**
 * Undocumented function
 *
 * @param [type] $domain
 * @return void
 */
    public static function setDomain($domain)
    {
        if (!empty($domain)) {
            self::$cookieDomain = strip_tags(trim($domain));
        } else {
            self::$cookieDomain = 'localhost';
        }
    }
/**
 * Undocumented function
 *
 * @param [type] $path
 * @return void
 */
    public static function setPath($path)
    {
        if (!empty($domain)) {
            self::$cookiePath = strip_tags(trim($path));
        } else {
            self::$cookiePath = '/';
        }
    }
/**
 * Undocumented function
 *
 * @param [type] $httpOnly
 * @return void
 */
    public static function setHttpOnly($httpOnly)
    {
        if ($httpOnly) {
            self::$cookieHttpOnly = 1;
        } else {
            self::$cookieHttpOnly = 0;
        }
    }
/**
 * Undocumented function
 *
 * @return void
 */
    public static function getName()
    {
        return self::$cookieName;
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getValue()
    {
        return self::$cookieValue;
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public static function getTime()
    {
        return self::$cookieTime;
    }
/**
 * Undocumented function
 *
 * @return void
 */
    public static function getDomain()
    {
        return self::$cookieDomain;
    }
/**
 * Undocumented function
 *
 * @return void
 */
    public static function getPath()
    {
        return self::$cookiePath;
    }
/**
 * Undocumented function
 *
 * @return void
 */
    public static function getHttpOnly()
    {
        return self::$cookieHttpOnly;
    }
/**
 * Undocumented function
 *
 * @return void
 */
    public static function create()
    {
        return setcookie(
            self::$cookieName,
            self::$cookieValue,
            self::$cookieTime,
            self::$cookiePath,
            self::$cookieDomain,
            self::$cookieSecured,
            self::$cookieHttpOnly
        );
    }
/**
 * Undocumented function
 *
 * @param [type] $cookieName
 * @return void
 */
    public static function destroy($cookieName)
    {
        $name = strip_tags(trim($cookieName));

        if (isset($_COOKIE[$name])) {
            unset($_COOKIE[$name]);
            setcookie($name, '', time() - 3600, self::$cookieDomain);
        }

        if (($cookieName === '') || ($cookieName === null)) {
            $_COOKIE = [];
        }
    }
}
