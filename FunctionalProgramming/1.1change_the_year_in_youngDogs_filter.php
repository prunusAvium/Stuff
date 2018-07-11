<?php
$animals = [
    ['name'=>"Buky", 'type'=>"dog", 'age'=> 4],
    ['name'=>"Einstein", 'type'=>"dog", 'age'=> 12],
    ['name'=>"Helga", 'type'=>"dog", 'age'=> 11],
    ['name'=>"Vav", 'type'=>"cat", 'age'=> 3],
    ['name'=>"Roky", 'type'=>"dog", 'age'=> 7],
];

$age = 9;
$type = 'dog';

$youngDogs = function ($item) use ($type, $age){
    return $item['type'] == $type and $item['age'] < $age;
};

print_r(array_filter($animals, $youngDogs));