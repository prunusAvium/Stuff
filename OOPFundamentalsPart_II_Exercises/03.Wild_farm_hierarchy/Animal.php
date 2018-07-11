<?php
declare(strict_types=1);

abstract class  Animal {
    protected $animalName;
    protected $animalType;
    protected $animalWeight;
    protected $foodEaten = 0;

    /**
     * Animal constructor.
     * @param $animalName
     * @param $animalType
     * @param $animalWeight
     */
    public function __construct(string $animalName, string $animalType, float $animalWeight)
    {
        $this->setAnimalName($animalName);
        $this->setAnimalType($animalType);
        $this->setAnimalWeight($animalWeight);
    }

    /**
     * @return mixed
     */
    public function getAnimalName()
    {
        return $this->animalName;
    }

    /**
     * @param mixed $animalName
     */
    public function setAnimalName(string $animalName)
    {
        $this->animalName = $animalName;
    }

    /**
     * @return mixed
     */
    public function getAnimalType()
    {
        return $this->animalType;
    }

    /**
     * @param mixed $animalType
     */
    public function setAnimalType(string $animalType)
    {
        $this->animalType = $animalType;
    }

    /**
     * @return mixed
     */
    public function getAnimalWeight()
    {
        return $this->animalWeight;
    }

    /**
     * @param mixed $animalWeight
     */
    public function setAnimalWeight(float $animalWeight)
    {
        $this->animalWeight = $animalWeight;
    }

    /**
     * @return mixed
     */
    public function getFoodEaten()
    {
        return $this->foodEaten;
    }

    /**
     * @param mixed $foodEaten
     */
    public function setFoodEaten(int $foodEaten)
    {
        $this->foodEaten = $foodEaten;
    }

    public function makeSound(){
        echo "animal sound";
    }

    public function eatFood(Food $food){
        $this->foodEaten += $food->getFoodQuantity();
    }

}
