<?php
/*declare(strict_types=1);

include "geography_db.php";
include "MyPDO.php";

try {
    $db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_user, $db_password);
    $db->setErrorException(); // Throw exception on all errors
    $stmt = $db->prepare("
  SELECT * 
    FROM `countries`
    WHERE `country_name` = ?");
    if ($stmt->execute(array($input))) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "Country: " . $row['country_name'] . "\n\r" . "Capital: " . $row['capital'] . "\n\r";
            // Todo
        }
    }
    $iv = null; // Close connection
    $db         = null;
} catch (PDOException $e) {
    print "PDO Error: " . $e->getMessage() . "<br/>";
}*/

declare(strict_types=1);
spl_autoload_register(function ($class) {
    $class = $class . ".php";
    require_once $class;
});
$app = new CallCenter();
echo "Problem 7. Call Center Application - number: 7" .PHP_EOL;
echo "Problem 7.1. Add Currency and Continent - number: 7.1" . PHP_EOL;
echo "Problem 7.2. Customers in the Mountain - number: 7.2" . PHP_EOL;
echo "Problem 7.3. Special Ski Equipment - number: 7.3" . PHP_EOL;
echo "Problem 9. Add Customer Functionality - number: 9" . PHP_EOL;
echo "Problem 10. Delete Customer Functionality - number: 10" . PHP_EOL;
echo "Problem 11. Customers in Specific Country* - number: 11" . PHP_EOL;
echo "Problem 12. Customers in Specific Continent** - number: 12" . PHP_EOL;
echo "Enter problem number: ";
$app->main(floatval(fgets(STDIN)));