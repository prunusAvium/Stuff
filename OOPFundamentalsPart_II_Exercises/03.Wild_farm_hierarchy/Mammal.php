<?php
declare(strict_types=1);

class Mammal extends Animal {

    protected $livingRegion;

    public function __construct(string $animalName, string $animalType, float $animalWeight, string $livingRegion)
    {
        parent::__construct($animalName, $animalType, $animalWeight);
        $this->setLivingRegion($livingRegion);
    }

    /**
     * @param string $livingRegion
     */
    public function setLivingRegion(string $livingRegion)
    {
        $this->livingRegion = $livingRegion;
    }



}