<?php
include '02.Person.php';

$lines = fgets(STDIN);
$persons= [];

for ($i = 0; $i < $lines; $i++){
    $input = explode(' ', trim(fgets(STDIN)));
    $person = new Person($input[0], intval($input[1]));
    $persons[] = $person;
}

$out = array_filter($persons, function ($var){
   return $var->getAge() > 30;
});

usort($out, function ($a, $b){
    return $a->getName() <=> $b->getName();
});

foreach ($out as $value){
    echo $value->getName() . ' - ' . $value->getAge() . PHP_EOL;
}