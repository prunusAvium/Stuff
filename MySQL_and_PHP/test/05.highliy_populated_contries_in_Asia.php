<?php
declare(strict_types=1);

include "geography_db.php";
include "MyPDO.php";

try {
    $db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);
    $db->setErrorException(); // Throw exception on all errors
    $continents = $db->query("
        SELECT `a`.`country_name`
            FROM `countries` AS `a`, `continents` AS `b`
            WHERE `a`.`continent_code` = `b`.`continent_code`
              AND `a`.`population`     > 1000000000 ");
    foreach ($continents as $i => $continent) {
        print_r($continent["country_name"]."\n\r");
    }
    $continents = null; // Close connection
    $db         = null;
} catch (PDOException $e) {
    print "PDO Error: " . $e->getMessage() . "<br/>";
}