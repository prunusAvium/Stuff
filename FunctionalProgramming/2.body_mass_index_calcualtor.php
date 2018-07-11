<?php
declare(strict_types=1);

$people = [
    ['name' => 'John', 'weight' => 69, 'height' => 1.69],
    ['name' => 'Peter', 'weight' => 85, 'height' => 1.68],
    ['name' => 'Ivan', 'weight' => 75, 'height' => 1.72],
    ['name' => 'Mitko', 'weight' => 95, 'height' => 1.70]
];

print_r(array_map(function ($value){
        return floatval($value['weight']) /
            (floatval($value['height']) * floatval($value['height']));
    },
    $people
));

