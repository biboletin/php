<?php

/*
    Log клас за логване на SQL заявки
    1 да се инклудне в databaseConnector.php
    2 да се измисли начин на добавяне(извикване) в mysql класовете
*/

class QueryLog
{
    private $logDirectory;
    private $currentLogFile;
    const DS = DIRECTORY_SEPARATOR;

    public function __construct()
    {
        $this->logDirectory = dirname(getcwd()) . self::DS . "log" . self::DS;
        // $this->currentLogFile =
    }
    public function logDir()
    {
       // return dirname(getcwd());
        return $this->logDirectory;
        // return $_SESSION;
    }
    
    public function logExists()
    {
        // return (bool) (is_file($this->logDirectory . self::DS));
        return (bool) (is_file($this->logDirectory . date("Y") .
            self::DS . date("M") . self::DS . date("Y-m-d") . ".log"));
    }
    
    public function createLogFile()
    {
        if (!$this->logExists()) {
            fopen($this->logDirectory . date("Y") .
            self::DS . date("M") . self::DS . date("Y-m-d") . ".log", "w")
            or die("Не може да се създаде лог файл!");
        }
    }
}
