<?php
$letters = array();
$str = "appearance";

for ($i = 0; $i < strlen($str); $i++){
    $letter = $str[$i];
    if ( !isset($letters[$letter])){
        $letters[$letter] = 1;
    }
    else {
        $letters[$letter]++;
    }
}
#arsort($letters);
print_r($letters);