<?php
declare(strict_types=1);

$db_host     = "localhost";
$db_name     = "geography";
$db_user     = "root";
$db_password = "password";

$db = new PDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password,
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));