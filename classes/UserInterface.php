<?php
namespace Biboletin;

interface Users
{
    // private static $username;
    // private static $password;
    public function setUserName($username);
    // public function setFullName($fullName);
    // public function setPassword($password);

    public function getUserName();
}
