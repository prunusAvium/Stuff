<?php
declare(strict_types=1);

class Cat extends Felime {

    private $breed;

    public function __construct(string $animalName, string $animalType, float $animalWeight, string $livingRegion, string $breed)
    {
        parent::__construct($animalName, $animalType, $animalWeight, $livingRegion);
        $this->setBreed($breed);
    }

    private function setBreed(string $breed){
        $this->breed = $breed;
    }

    public function eatFood(Food $food)
    {
        $this->makeSound();
        $this->foodEaten += $food->getFoodQuantity();
    }

    public function makeSound()
    {
        echo "Meowwww". PHP_EOL;
    }

}