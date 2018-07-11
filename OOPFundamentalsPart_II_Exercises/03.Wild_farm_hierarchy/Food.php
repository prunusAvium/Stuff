<?php
declare(strict_types=1);

class Food {

    protected $foodQuantity;
    protected $foodType;

    public function __construct(float $foodQuantity, string $foodType)
    {
        $this->setFoodQuantity($foodQuantity);
        $this->foodType = $foodType;
    }

    /**
     * @param mixed $foodQuantity
     */
    public function setFoodQuantity(float $foodQuantity)
    {
        $this->foodQuantity = $foodQuantity;
    }

    public function getFoodQuantity(){
        return $this->foodQuantity;
    }

    public function getFoodType(){

        return $this->foodType;
    }
}