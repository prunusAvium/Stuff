<?php
include '02.Person.php';
$name = trim(fgets(STDIN));
$age = fgets(STDIN);

$person1 = new Person($name, $age);

print_r($person1);