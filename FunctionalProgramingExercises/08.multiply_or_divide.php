<?php
$input = [
    ["sum", 12, 133],
    ["subtract", 3, 3],
    ["sum", 1, 2],
    ["divide", 100, 0],
    ["divide", 100, "PP"],
    ["sum", "p123", 123]
];

$opSum = function ($a, $b) {
    return $a + $b;
};

$opSubtract = function ($a, $b) {
    return $a - $b;
};

$opDivide = function ($a, $b){
  return $a / $b;
};

$opMultiply = function ($a, $b){
  return $a * $b;
};

$simpleCalc = function (&$simpleCalc, $input, $i = 0, $output = []) use ($opSum, $opSubtract, $opDivide, $opMultiply) {
    if ($i < count($input)) {
        $op = $input[$i][0];
        $a = $input[$i][1];
        $b = $input[$i][2];

        if (!is_numeric($a)) {
            $output[] = "'op1_not_numeric'";
        } elseif (!is_numeric($b)){
            $output[] = "'op2_not_numeric'";
        }
        elseif ($op == 'division' and $b == 0){
            $output[] = "'division_by_zero'";
        }
        elseif ($a < 0 or $a > 100
            or $b < 0 or $b > 100){
            $output[] = "'out_of_range'";
        }
        elseif ($op == 'divide'){
            $output[] = $opDivide($a, $b);
        }
        elseif ($op == 'multiply'){
            $output[] = $opMultiply($a, $b);
        }
        elseif ($op == 'sum') {
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