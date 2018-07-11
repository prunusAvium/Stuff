<?php
$input = [
    ["sum", 12, 156],
    ["subtract", 5, 6],
    ["subtract", 1, 2],
    ["sum", -1, 2]
];

$opSum = function ($a, $b) {
    return $a + $b;
};

$opSubtract = function ($a, $b) {
    return $a - $b;
};

$simpleCalc = function (&$simpleCalc, $input, $i = 0, $output = []) use ($opSum, $opSubtract) {
    if ($i < count($input)) {
        $op = $input[$i][0];
        $a = $input[$i][1];
        $b = $input[$i][2];
        if ($a < 0 or $a > 100
            or $b < 0 or $b > 100
        ) {
            $output[] = "'error'";
        } elseif ($op == 'sum') {
            $output[] = $opSum($a, $b);
        } elseif($op == 'subtract') {
            $output[] = $opSubtract($a, $b);
        }  return $simpleCalc($simpleCalc, $input, $i+1, $output);
    } else {
        return $output;
    }
};
$output = $simpleCalc($simpleCalc, $input);
print_r($output);