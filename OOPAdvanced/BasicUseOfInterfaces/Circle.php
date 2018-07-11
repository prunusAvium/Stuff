<?php
declare(strict_types= 1);

class Circle implements Area {

    private $radius;
    public function __construct(float $radius)
    {
        $this->setRadius($radius);
    }

    public function setRadius(float $radius){

        $this->radius = $radius;
    }
    public function getSurface():string
    {
        $area = number_format(2 * M_PI * $this->radius, 2, '.', '');
        return "Circle, radius = {$this->radius} mm, area = {$area} mm";
    }
}