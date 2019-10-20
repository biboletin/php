<?php
namespace Biboletin;

class Config
{
    private static $config = [
        "mysql" => [
            "host" => "127.0.0.1",
            "user" => "root",
            "password" => "",
            "database" => "",
            "port" => 3306,
        ],
    ];

    public static function get($value)
    {
        foreach (self::$config as $props => $values) {
            if (is_array($values)) {
                foreach ($values as $prop => $value) {
                    echo $prop . ': ' . $value . '<br/>';
                }
            }
        }
    }
}
