<?php

namespace Biboletin;

use Exception;

class Csv{
    // private $tableName;
    // private $columns;

    public function __construct($csv = null){
        if($csv === null){
            throw new Exception("There is no csv file");
        }

        $extension = explode(".", strtolower(basename($csv)));

        if($extension[1] !== "csv"){
            throw new Exception("This is not a CSV file");
        }
    }

    public function csvToText($separator){}
    public function txtToCsv(){}

    public function csvToArray(){}
    public function arrayToCsv($separator){}
    // public function csvToSQL(){}
}