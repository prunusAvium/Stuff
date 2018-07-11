<?php
$people = [
    ['name' => 'John', 'weight' => 69, 'height' => 1.69],
    ['name' => 'Peter', 'weight' => 85, 'height' => 1.68],
    ['name' => 'Ivan', 'weight' => 75, 'height' => 1.72],
    ['name' => 'Mitko', 'weight' => 95, 'height' => 1.70]
];

$value = 70;

$bmiCalcAvg = function ($carry, $item) use ($value): float {
    return floatval($item['weight']) + floatval($item['height']) > $value ?
        $carry += floatval($item['weight']) + floatval($item['height']) : $carry += 0;
};

$bmiAvg = array_reduce($people, $bmiCalcAvg) / count($people);

echo "Average BMI: $bmiAvg";