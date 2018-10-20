<?php

include 'cookies.php';
include 'db.php';
include 'hash.php';
include 'session.php';
include 'UserInterface.php';
include 'users.php';
include 'curl.php';
include 'calculator.php';
include 'token.php';
include 'filter.php';

use Biboletin\Filter;

// use Biboletin\Curl;
use Biboletin\Users;
//var_dump(Calculator::add(5.5, 10));
//var_dump(Calculator::substract("3.5", 10));
//var_dump(Calculator::multiply(5, 5));
// var_dump(Calculator::divide(15, 3));

// echo Token::generateToken();
// echo Token::checkToken(Session::get("token"));
// echo Token::deleteToken();

$str1 = "<script>document.write(document.cookie);</script>";
// $str = "!@№$%€§*() - !@#$%^&*() <>";
// echo $str;
$str2 = [
    "name" => "Коби О'Брайън",
    "user" => [
        "id" => "<script>alert(document.cookie);</script>",
        "admin" => true,
    ],
];

$result = Filter::validate($str2);
echo "<pre>" . print_r($result, true) . "</pre>";
