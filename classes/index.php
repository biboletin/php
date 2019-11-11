<?php

include 'cookies.php';
include 'db.php';
include 'hash.php';
include 'session.php';
include 'UserInterface.php';
include 'users.php';
include 'curl.php';
// include '../calculator/calculator.php';
include 'token.php';
include 'filter.php';
include 'config.php';
use Biboletin\Config;

echo Config::get("mysql", "user");
