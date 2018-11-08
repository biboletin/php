<?php

class Database
{
    private $host = '127.0.0.1';
    private $username = 'root';
    private $password = '';
    private $dbName = 'restapi';
    private $dsn;
    private $conn;

    public function __construct()
    {
        $this->dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbName;
    }

    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO($this->dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $error) {
            echo "Connection error: " . $error->getMessage();
        }
    }
}

$db = new Database();
$db->connect();
