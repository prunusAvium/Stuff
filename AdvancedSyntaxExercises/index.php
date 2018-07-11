<?php
$a['BG'] = ['a' =>12403, 'b' => 4412, 'z'=>2956, 'q'=>19512];
$a['EN'] = ['c'=>3414, 'f'=>511132, 'm'=>37816, 'n'=>1254];
$a['DE'] = ['d'=>2662, 'e'=>23465, 'k'=>1342, 'i'=> 10738, 'p'=>27501];

foreach ($a as &$t){
    arsort($t);
}
uasort($a, function ($x, $y){
    return current($y) -  current($x);
});

print_r($a);