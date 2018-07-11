<?php
class Bird {
    private $age;
    private $weight;
    private $flySpeed;

    function __construct($age, $weight, $flySpeed)
    {
        $this->age = $age;
        $this->weight = $weight;
        $this->flySpeed = $flySpeed;
    }

    function breathe(){
        echo 'Breathe';
    }
    function walk(){
        echo 'walk';
    }
    function fly(){
        echo 'fly';
    }
}

$b1 = new Bird(1, 100, 20);
$b2 = new Bird(2, 98, 25);

$b1->fly();

//print_r($b1);