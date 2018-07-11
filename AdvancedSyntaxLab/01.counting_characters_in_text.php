<?php

$letters = array();
$str = trim(fgets(STDIN));
//$str = "Learning PHP is FUN!";

for ($i = 0; $i < strlen($str); $i++){
    $letter = $str[$i];
    if ( !isset($letters[$letter])){
        $letters[$letter] = 1;
    }
    else {
        $letters[$letter]++;
    }
}
print_r($letters);