<?php
$people = [
    ['name'=> 'John'  , 'height'=> 1.65],
    ['name'=> 'Peter' , 'height'=> 1.85],
    ['name'=> 'Silvia', 'height'=> 1.69],
    ['name'=> 'Martin', 'height'=> 1.82]
];

$filter = array_filter($people, function ($people){
    if ($people['height'] >=1.80){
        return true;
    }
    return false;
});

print_r($filter);