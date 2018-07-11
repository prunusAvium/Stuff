<?php
declare(strict_types=1);

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
        return number_format(parent::getFuelQuantity(), 2 ,'.', '');
    }
}