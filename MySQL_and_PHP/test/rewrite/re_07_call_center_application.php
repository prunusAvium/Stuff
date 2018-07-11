<?php
declare(strict_types=1);
spl_autoload_register(function ($class){
    $class = $class . ".php";
    require_once $class;
});

$app = new ReCallCenter();

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