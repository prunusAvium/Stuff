<?php
abstract class Vehicle {
    abstract function getType();


}

class Car extends Vehicle{

    function getType()
    {
        return 'type';
    }
}