<?php
declare(strict_types=1);

include "geography_db.php";
include "MyPDO.php";

try {
    $db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);
    $db->setErrorException(); // Throw exception on all errors
    $continents = $db->query("
        SELECT * FROM `continents`");
    foreach ($continents as $i => $continent) {
        print_r($continent["continent_name"] . " (" . $continent["continent_code"] . "), ");
    }
    $continents = null; // Close connection
    $db         = null;
} catch (PDOException $e) {
    print "PDO Error: " . $e->getMessage() . "<br/>";
}