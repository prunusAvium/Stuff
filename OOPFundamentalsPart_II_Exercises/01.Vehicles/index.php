<?php
declare(strict_types=1);

include '01.Vehicles.php';
include 'Car.php';
include 'Truck.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    $class = $class . ".php";

    require_once $class;
});


list($vehicle, $fuel, $liters) = explode(' ', trim(fgets(STDIN)));
$car = new Car(floatval($fuel), floatval($liters));

list($vehicle, $fuel, $liters) = explode(' ', trim(fgets(STDIN)));
$truck = new Truck(floatval($fuel), floatval($liters));

$n = intval(fgets(STDIN));
while ($n--) {
    list($command, $vehicle, $km) = explode(' ', trim(fgets(STDIN)));

    if ($command == 'Drive') {
        if ($vehicle == 'Car') {
            $car->drive(floatval($km));
            echo $car->getTraveling() . PHP_EOL;
        } elseif ($vehicle == 'Truck') {
            $truck->drive(floatval($km));
            echo $truck->getTraveling() . PHP_EOL;
        }
    } elseif ($command == 'Refuel') {
        if ($vehicle == 'Car') {
            $car->refuel(floatval($km));
        } elseif ($vehicle == 'Truck') {
            $truck->refuel(floatval($km));
        }
    }
}

echo "Car: {$car->getFuelQuantity()}" . PHP_EOL;
echo "Truck: {$truck->getFuelQuantity()}";