<?php
declare(strict_types = 1);

spl_autoload_register(function ($class) {
    $class = $class . ".php";
    require_once $class;
});



$radius = new Circle(10);
echo $radius->getSurface(). PHP_EOL;
echo $radius->getCircumference() . PHP_EOL;