<?php
declare(strict_types=1);
spl_autoload_register(function ($class) {
    $class = $class . ".php";
    require_once $class;
});
$d = new DesktopComputer('i7', '16GB');
$d->click(false, true);
$l1 = new Laptop('i3', '4GB');
$l1->click(true);
$l1->move(800, 400, 100, 100);
$l2 = new Laptop('i5', '8GB');
$t = new Tablet('1080p', 96);
$m1 = new MobilePhone('8\'', 58, 'Mtel', true);
$m1 = new MobilePhone('4\'', 59, 'Telenor', false);
$m1 = new MobilePhone('5\'', 68, 'Vivacom', true);
$n = new Notebook('celeron n3060', '8GB');
$n->writeText("Hello SoftUni");
$n->getWrittenText();
$n->pressKey('P');