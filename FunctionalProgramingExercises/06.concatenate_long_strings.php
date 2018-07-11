<?php
$input = ['Hello ', 'there.', 'This is just another long string', ' that would pass the check.', ' but', ' this', ' will', ' not', 'pass it.'];

$above = 20;
$out = array_reduce(
    $input,
    function ($carry, $item)use ($above){
        if (strlen($item) > $above){
            return $carry .= $item;
        } else{
            return $carry;
        }
    }
);
print_r($out);
