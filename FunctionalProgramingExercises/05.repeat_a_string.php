<?php
$input = 'Hello, there! ';
$n = 3;

$repeatString = function (&$repeatString, &$input, $i = 0, $output = "") use($n){
    if ($i < $n){
        return $repeatString($repeatString, $input, $i+1, $output.=$input);
    } else {
        return $output;
    }
};

echo $repeatString($repeatString, $input);
