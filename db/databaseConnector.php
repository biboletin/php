<?php
include "interfaces/SQLQuery.php";
include "databases/MySQLConnection.php";
include "databases/MySQLiConnection.php";
include "databases/PDOConnection.php";

/**
 * Клас за свързване с MySQL
 *
 * $db = new DataBaseConnector();
 * $mysql = $db->setEngine("mysql")->makeConnection();
 * $mysqli = $db->setEngine("mysqli")->makeConnection();
 * $pdo = $db->setEngine("pdo")->makeConnection();
 *
 *
 * $query = "SELECT * FROM users WHERE username = ''";
 *
 * $result = $mysql->sqlQuery($query);
 * $result = $mysqli->sqlQuery($query);
 * $result = $pdo->sqlQuery($query);
 *
 */
class DataBaseConnector
{

    /**
     * Вид на връзката
     * mysql
     * mysqli
     * pdo
     * @var string
     */
    protected $engine = null;
    protected $db = null;

    /**
     * Ако, не е подаден параметър
     * по подразбиране взима стойността на DB_ENGINE от
     * конфигурационния файл: config.php
     *
     * @param string $engine
     * @return $this
     */
    public function setEngine($engine = null)
    {
        if (($engine === null) || ($engine === "")) {
            $this->engine = DB_ENGINE;
        }
        $this->engine = strtolower(trim($engine));
        return $this;
    }

    /**
     * Връща MySQL, MySQLi или PDO обект, чрез който могат да се правят заявки
     *
     * @return object
     */
    public function makeConnection()
    {
        if (($this->engine === null) || ($this->engine === "")) {
            $this->engine = DB_ENGINE;
        }

        switch ($this->engine) {
            case "mysql":
                $this->db = MySQLConnection::getInstance();
                $this->db->getConnection();
                break;
            case "mysqli":
                $this->db = MySQLiConnection::getInstance();
                $this->db->getConnection();
                break;
            case "pdo":
                $this->db = PDOConnection::getInstance();
                $this->db->getConnection();
                break;
        }
        return $this->db;
    }
    public function __destruct()
    {
        unset($this->db);
    }
}
