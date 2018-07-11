<?php
declare(strict_types=1);

include "geography_db.php";
include "MyPDO.php";

try {
    $db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);
    $db->setErrorException(); // Throw exception on all errors
    $result = $db->query("
        SELECT `peak_name`, `elevation`
            FROM `peaks`
            WHERE `elevation` > '6700'
                AND `mountain_id` = '3'");
    foreach ($result as $i => $iv) {
        echo ($iv['peak_name'] . "," . $iv['elevation'] . "\n\r");
    }
    $iv = null; // Close connection
    $db         = null;
} catch (PDOException $e) {
    print "PDO Error: " . $e->getMessage() . "<br/>";
}