<?php

/**
 * Description of PDOConnection
 *
 * @author BK
 */
class PDOConnection implements SQLQuery
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
     *
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
     *
     * @return object
     */
    public function getConnection()
    {
        $dsn = "mysql:host=" . DB_HOST_ADDRESS . ";";
        $dsn .= "dbname=" . DB_DATABASE_NAME;

        try {
            self::$connection = new PDO(
                $dsn,
                DB_USER,
                DB_PASSWORD
            );
        } catch (PDOException $error) {
            die("������: " . $error->getMessage());
        }

        self::$connection->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
        self::$connection->exec("SET NAMES " . DATABASE_CHARSET);
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

        if ($action !== "select") {
            return (bool) self::$connection->query($sql);
        }

        $result = self::$connection->query($sql, PDO::FETCH_ASSOC);
        $data = array();

        while ($row = $result->fetchAll()) {
            $data[] = $row;
        }
        if (is_array($data)) {
            return array_shift($data);
        }
    }
}
