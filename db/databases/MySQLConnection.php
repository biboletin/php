<?php

/**
 * ���� �� ��������� � ���� �����, ���� MySQL
 *
 * @author BK
 */
class MySQLConnection implements SQLQuery
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
     * @var string
     */
    public $encoding;
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
     * @return object
     */
    public function getConnection()
    {
        self::$connection = mysql_connect(
            DB_HOST_ADDRESS,
            DB_PORT,
            DB_USER,
            DB_PASSWORD
        );
        if (!self::$connection) {
            die("������: " . mysql_error());
        }

        if (!mysql_select_db(DB_DATABASE_NAME)) {
            die("������: " . mysql_error());
        }
        if ($this->encoding !== "") {
            mysql_query(
                "SET CHARACTER SET " . $this->encoding,
                self::$connection
            );
        }
        if ($this->encoding === "") {
            mysql_query(
                "SET CHARACTER SET " . DATABASE_CHARSET,
                self::$connection
            );
        }
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
        $queryType = explode(" ", strtolower(trim($sql)));
        $action = $queryType[0];
        if (($action === "insert") || ($action === "update")) {
            return (bool) mysql_query($sql);
        }

        $result = mysql_query($sql);
        $data = array();

        while ($row = mysql_fetch_assoc($result)) {
            $data[] = $row;
        }
        return (array) $data;
    }
}
