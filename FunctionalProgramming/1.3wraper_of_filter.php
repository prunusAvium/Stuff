<?php
$animals = [
    ['name' => 'Waffles', 'type' => 'dog', 'age' => 12],
    ['name' => 'Fluffy', 'type' => 'cat', 'age' => 14],
    ['name' => 'Spelunky', 'type' => 'dog', 'age' => 4],
    ['name' => 'Doggo', 'type' => 'dog', 'age' => 2],
    ['name' => 'Hank', 'type' => 'dog', 'age' => 11],
    ['name' => 'Rude', 'type' => 'dog', 'age' => 5]
];

$age = 8;
$youngOrOld = 'young';

$youngDogs = function ($value) use ($age) {
    return $value['type'] == 'dog' && $value['age'] < $age;
};

$oldDogs = function ($value) use ($age) {
    return $value['type'] == 'dog' && $value['age'] > $age;
};


$filter = function ($input, $youngOrOld, $youngDogs, $oldDogs){
    $result = [];
    foreach ($input as $value){
        if (strtolower($youngOrOld) == 'young' and $youngDogs($value) == true){
            $result[] = $value;
        } elseif (strtolower($youngOrOld) == 'old' and $oldDogs($value) == true){
            $result[] = $value;
        }
    }
    return $result;
};

$dogsOutput = $filter($animals, $youngOrOld, $youngDogs, $oldDogs);

print_r($dogsOutput);