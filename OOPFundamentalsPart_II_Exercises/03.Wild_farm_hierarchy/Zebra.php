<?php
declare(strict_types=1);

class Zebra extends Mammal {

    public function makeSound()
    {
        echo "Zs" . PHP_EOL;
    }

    public function eatFood(Food $food)
    {
        $this->makeSound();

        if ($food->getFoodType() != "Vegetable"){
            echo "Mouse are not eating that type of food!";
        }else {
            $this->foodEaten += $food->getFoodQuantity();
        }

    }
}