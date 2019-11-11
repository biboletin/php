<?php

/**
 * ���� �� ��������� � ���� �����, ���� MySQLi
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
     * ��������� �� ���� ���������
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
     * ������ � ���� �����
     *
     * @return object
     */
    public function getConnection()
    {
        if (!function_exists("mysqli_connect")) {
            die("����������� MySQLi ������������!");
        }
        self::$connection = new mysqli(
            DB_HOST_ADDRESS,
            DB_USER,
            DB_PASSWORD
        );
        if (mysqli_connect_error()) {
            die("������: " . mysqli_error(self::$connection));
        }

        if (!mysqli_select_db(self::$connection, DB_DATABASE_NAME)) {
            die("������: " . mysqli_error(self::$connection));
        }
        self::$connection->query("SET CHARACTER SET " . DATABASE_CHARSET);
        return self::$connection;
    }

    /**
     * ��������� SQL ������
     * ����� true ��� false ��� UPDATE � INSERT ������
     *
     * ����� ����� � ����� ��� SELECT ������
     *
     * @param string $sql SQL ������
     * @return mixed
     */
    public function sqlQuery($sql)
    {
        if (($sql === null) || ($sql === "")) {
            throw new Exception("������ ������!");
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
