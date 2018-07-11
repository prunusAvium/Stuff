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