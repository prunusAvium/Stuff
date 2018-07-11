<?php

class Tire {
    public $pressure;
    public $age;

    function __construct(float $pressure, int $age)
    {
        $this->pressure = $pressure;
        $this->age = $age;
    }
}