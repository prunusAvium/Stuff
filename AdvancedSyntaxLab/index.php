<?php
//----------
/*function myBox($x){
    return $x + 1;
}
$x = 0;
myBox($x);
echo $x;*/
//---------- Pass By reference (Changing arguments in the function won't be lost (dosent make a copy of the code))
/*function changeValue(&$arg) {
    $arg += 100;
}
$num = 2;
echo $num . "\n"; // 2
changeValue($num);
echo $num; // 102*/

//----------- Variable-Length function arguments
/*function calcSum(){
    /*$sum = 0;
    foreach (func_get_args() as $arg){
        $sum += $arg;
    }
    return $sum;  */
/*    print_r(func_get_args());
}

echo calcSum(1, 2), '<br> />'; // 3
echo calcSum(10, 20, 30), '<br> />'; // 60
echo calcSum(10, 22, 0.5, 0.75, 12.50), '<br> />'; // 45.75*/
//----------------- Return Multiple Values from a Function
/*
function smallNumbers(){
    $a = 0;
    $b = 1;
    $c = 2;
    return[$a, $b, $c];
}
$res = smallNumbers();
print_r($res);

echo $res[0];
echo $res[1];

list($a, $b, $c) = smallNumbers();
echo "\$a = $a \$b = $b \$c = $c";*/
//----------- Strict mode
/*declare(strict_types=1); //Strict  mode
function example(int $arg): int {
    // The return result should be int
    return $arg + 1 ;
}*/
//-----------

$array = array("Team Building, Vitosha",
    "Nakov",
    "studying programming",
    "SoftUni"
);

usort($array, function($a, $b) {
    return strlen($b) - strlen($a);
});

print_r($array);




