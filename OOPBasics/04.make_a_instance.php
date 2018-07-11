<?php
class Car {
    private $brand;
    private $model;
    private $year;

    function __construct($brand, $model)
    {
        $this->brand =$brand;
        $this->model=$model;
    }
    function setYear($year){
        if (is_numeric($year) and strlen($year) == 4){
            $this->year=$year;
        }
    }

    function getBrand(){
        return $this->brand;
    }
    function getModel(){
        return $this->model;
    }
    function getYear(){
        return $this->year;
    }
}

for ($x = 0; $x <=4; $x++){
    $input = explode(' ', trim(fgets(STDIN)));
    $car = new Car($input[0], $input[1]);
    $car->setYear($input[2]);
    $cars[] = $car;
}


print_r($car);