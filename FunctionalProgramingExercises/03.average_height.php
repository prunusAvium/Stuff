<?php
$people = [
    ['name'=> 'John'  , 'height'=> 1.65],
    ['name'=> 'Peter' , 'height'=> 1.85],
    ['name'=> 'Silvia', 'height'=> 1.69],
    ['name'=> 'Martin', 'height'=> 1.82]
];

$filter = array_reduce($people, function ($carry, $item){
    return $carry+= $item['height'];
}) / count($people);

print_r("Average height is " . $filter . " meters");