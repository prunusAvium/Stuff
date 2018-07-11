<?php
declare(strict_types=1);

abstract class Vehicles
{
    private $fuelQuantity;
    private $litersPerKM;
    private $traveling;

    protected function __construct(float $fuelQuantity, float $litersPerKM)
    {
        $this->setFuelQuantity($fuelQuantity);
        $this->setLitersPerKM($litersPerKM);
    }

    protected function setFuelQuantity(float $fuelQuantity)
    {
        $this->fuelQuantity = $fuelQuantity;
    }

    protected function setLitersPerKM(float $litersPerKM)
    {
        $this->litersPerKM = $litersPerKM;
    }

    protected function vehicleDrive(string $vehicle, float $distance)
    {
        $needFuel = $this->getLitersPerKM() * $distance;
        if ($needFuel < $this->getFuelQuantity()) {
            $this->setFuelQuantity($this->getFuelQuantity() - $needFuel);
            $this->traveling = "$vehicle travelled {$distance} km";
        } else {
            $this->traveling = "$vehicle needs refueling";
        }
    }

    protected function getFuelQuantity()
    {
        return $this->fuelQuantity;
    }

    protected function getLitersPerKM()
    {
        return $this->litersPerKM;
    }

    protected function getTraveling()
    {
        return $this->traveling;
    }
}

class Truck extends Vehicles
{
    public function __construct(float $fuelQuantity, float $litersPerKM)
    {
        parent::__construct($fuelQuantity, $litersPerKM);
    }

    protected function setLitersPerKM(float $litersPerKM)
    {
        parent::setLitersPerKM($litersPerKM + 1.6);
    }

    public function refuel(float $fuelQuantity)
    {
        parent::setFuelQuantity(parent::getFuelQuantity() + ($fuelQuantity * 0.95));
    }

    public function drive(float $distance)
    {
        parent::vehicleDrive('Truck', $distance);
    }

    public function getTraveling()
    {
        return parent::getTraveling();
    }

    public function getFuelQuantity()
    {
        return number_format(parent::getFuelQuantity(), 2, '.', '');
    }
}
class Car extends Vehicles
{
    public function __construct(float $fuelQuantity, float $litersPerKM)
    {
        parent::__construct($fuelQuantity, $litersPerKM);
    }

    protected function setLitersPerKM(float $litersPerKM)
    {
        parent::setLitersPerKM($litersPerKM + 0.9);
    }

    public function refuel(float $fuelQuantity)
    {
        parent::setFuelQuantity(parent::getFuelQuantity() + $fuelQuantity);
    }

    public function drive(float $distance)
    {
        parent::vehicleDrive('Car', $distance);
    }

    public function getTraveling()
    {
        return parent::getTraveling();
    }

    public function getFuelQuantity()
    {
        return number_format(parent::getFuelQuantity(), 2, '.', '');
    }
}

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