<?php
/**
 * Session handler class
 * for more secure session variables
 *
 * USE
 * Session::start();
 * Session::set(key, value);
 * Sesion::get(key);
 * Sesion::del(key);
 * Session::close();
 *
 * PHP Version 7.2
 *
 * @category Session_Handler
 * @package  Sessions
 * @author   Biboletin <biboletin87@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/biboletin/php
 */
namespace Biboletin;

use Exception;

/**
 * Session handler class
 * for more secure session variables
 *
 * @category Session_Handler
 * @package  Sessions
 * @author   Biboletin <biboletin87@gmail.com>
 * @license  MIT https://opensource.org/licenses/MIT
 * @link     https://github.com/biboletin/php
 */
class Session
{
    /**
     * Instantiating session handler
     *
     * @var boolean
     */
    private static $instance;
    /**
     * Session life time
     *
     * @var integer
     */
    private $sessionLife = 8840;
    /**
     * Set session directory
     * if not set
     * use default tmp directory
     *
     * @var string
     */
    private $sessionDir = '';
    /**
     * Set up private properties
     * Instantiate session
     */
    private function __construct()
    {
        self::secure();

        if (!empty($this->sessionDir)) {
            if (!file_exists($this->sessionDir)) {
                mkdir($this->sessionDir);
            }
            ini_set('session.save_path', $this->sessionDir);
        }

        if (!empty($this->sessionLife)) {
            ini_set('session.gc_maxlifetime', $this->sessionLife);
        }

        self::$instance = session_start();
    }
    /**
     * Calling Session::start()
     * instead session_start()
     *
     * @return boolean
     */
    public static function start()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    /**
     * Adding session element
     *
     * @return string
     */
    public static function set($sessionKey = null, $sessionValue = null)
    {
        if (!self::$instance) {
            throw new Exception("Session is not initialized!");
        }

        if ((empty($sessionKey)) || (empty($sessionValue))) {
            throw new Exception("Session::set() parameters are empty or null!");
        }

        $key = strip_tags(trim(addslashes($sessionKey)));
        $value = strip_tags(trim(addslashes($sessionValue)));

        return $_SESSION[$key] = $value;
    }
    /**
     * Get session element by key
     *
     * @return string
     */
    public static function get($sessionKey = null)
    {
        if (empty($sessionKey)) {
            throw new Exception("Session::get() parameter is empty or null!");
        }

        $key = strip_tags(trim(stripslashes($sessionKey)));
        return $_SESSION[$key];
    }
    /**
     * Remove session element
     *
     * @return void
     */
    public static function del($sessionKey)
    {
        if (empty($sessionKey)) {
            throw new Exception("Session::del() parameter is empty or null!");
        }
        $key = strip_tags(trim($sessionKey));
        unset($_SESSION[$key]);
    }
    /**
     * Destroy session
     *
     * @return void
     */
    public static function close()
    {
        session_unset();
        session_destroy();
        session_write_close();
        setcookie(session_name(), '', 0, '/');
        self::$instance = false;
    }
    /**
     * Securing session
     *
     * @return void
     */
    public static function secure()
    {
        ini_set('session.use_only_cookies', '1');

        if (phpversion() < '5.3.0') {
            ini_set('session.hash_function', 1);
        } else {
            ini_set('session.hash_function', 'sha256');
            ini_set('session.hash_bits_per_character', 5);
        }
    }
}
