<?php
declare(strict_types = 1);

spl_autoload_register(function ($class) {
    $class = $class . ".php";
    require_once $class;
});



$radius = new Circle(10);
echo $radius->getSurface(). PHP_EOL;

$radius = new Circle(12);
echo $radius->getSurface() . PHP_EOL;

$rectangle = new Rectangle(15, 35);
echo $rectangle->getSurface();