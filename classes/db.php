<?php
/**
 *
 */
namespace Biboletin;

/**
 * Singleton Database Handler
 */
class DataBase
{
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    private $connection;
    /**
     * Undocumented variable
     *
     * @var [type]
     */
    private static $instance;
    /**
     * Undocumented variable
     *
     * @var string
     */
    private $host = 'localhost';
    /**
     * Undocumented variable
     *
     * @var string
     */
    private $username = 'root';
    /**
     * Undocumented variable
     *
     * @var string
     */
    private $password = '';
    /**
     * Undocumented variable
     *
     * @var string
     */
    private $port = '3307';
    /**
     * Undocumented variable
     *
     * @var string
     */
    private $database = 'tests';

    /**
     * Undocumented function
     */
    private function __construct()
    {
        $this->connection = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database,
            $this->port
        );
        if (mysqli_connect_error()) {
            trigger_error(
                "Failed to connect to MySQL: " . mysql_connect_error(),
                E_USER_ERROR
            );
        }
    }
/**
 * Undocumented function
 *
 * @return void
 */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
/**
 * Undocumented function
 *
 * @return void
 */
    private function __clone()
    {
    }
/**
 * Undocumented function
 *
 * @return void
 */
    public function getConnection()
    {
        return $this->connection;
    }
}
