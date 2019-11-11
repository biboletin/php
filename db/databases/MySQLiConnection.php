<?php

/**
 * Клас за свързване с база данни, чрез MySQLi
 *
 * @author BK
 */
class MySQLiConnection implements SQLQuery
{

    /**
     *
     * @var object
     */
    private static $instance;

    /**
     *
     * @var object
     */
    private static $connection;

    /**
     *
     */
    private function __construct()
    {
    }

    /**
     *
     */
    private function __clone()
    {
    }

    /**
     * Създаване на нова инстанция
     * @return object
     */
    public static function getInstance()
    {
        self::$instance = null;

        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Връзка с база данни
     *
     * @return object
     */
    public function getConnection()
    {
        if (!function_exists("mysqli_connect")) {
            die("Активирайте MySQLi разширението!");
        }
        self::$connection = new mysqli(
            DB_HOST_ADDRESS,
            DB_USER,
            DB_PASSWORD
        );
        if (mysqli_connect_error()) {
            die("Грешка: " . mysqli_error(self::$connection));
        }

        if (!mysqli_select_db(self::$connection, DB_DATABASE_NAME)) {
            die("Грешка: " . mysqli_error(self::$connection));
        }
        self::$connection->query("SET CHARACTER SET " . DATABASE_CHARSET);
        return self::$connection;
    }

    /**
     * Изпълнява SQL заявка
     * Връща true или false при UPDATE и INSERT заявка
     *
     * Връща масив с данни при SELECT заявка
     *
     * @param string $sql SQL заявка
     * @return mixed
     */
    public function sqlQuery($sql)
    {
        if (($sql === null) || ($sql === "")) {
            throw new Exception("Празна заявка!");
        }
        $action = explode(" ", strtolower(trim($sql)));
        $result = array();

        if ($action[0] !== "select") {
            return (bool) self::$connection->query($sql);
        }

        if ($action[0] === "select") {
            if (!self::$connection->query($sql)) {
                return false;
            }

            $query = self::$connection->query($sql);
            if ($query->num_rows === 0) {
                return false;
            }

            while ($row = $query->fetch_assoc()) {
                $result[] = $row;
            }
            return $result;
        }
    }
}
