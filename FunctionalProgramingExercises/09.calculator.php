<?php
/* Problem 09.  Calculator in Functional Code */
declare(strict_types=1);
$result = '';
if (isset($_GET["calculate"]) && strlen(trim($_GET["a"])) > 0 && strlen(trim($_GET["b"])) > 0) {
    $input = array($_GET["operation"], trim($_GET["a"]), trim($_GET["b"]));
    $opMultiply = function (float $a, float $b): float {
        return $a * $b;
    };
    $opDivide = function (float $a, float $b): float {
        return $a / $b;
    };
    $opSum = function (float $a, float $b): float {
        return $a + $b;
    };
    $opSubtract = function (float $a, float $b): float {
        return $a - $b;
    };
    $simpleCalc = function (callable &$simpleCalc, array $input, int $i = 2, string $output = '')
    use ($opSum, $opSubtract, $opMultiply, $opDivide) : string {
        if ($i < count($input)) {
            $op = $input[0];
            if (!is_numeric($input[1]) || !is_numeric($input[2])) {
                $output = 'Operand not numeric';
                return $simpleCalc($simpleCalc, $input, $i + 1, $output);
            }
            $a = floatval($input[1]);
            $b = floatval($input[2]);
            if ($a < floatval(-1E-15) || $a > floatval(1E+15) ||
                $b < floatval(-1E-15) || $b > floatval(1E+15)) {
                $output = 'Out of range';
                return $simpleCalc($simpleCalc, $input, $i + 1, $output);
            }
            if ($op == 'sum') {
                $output = (string)$opSum($a, $b);
            } elseif ($op == 'subtract') {
                $output = (string)$opSubtract($a, $b);
            } elseif ($op == 'divide') {
                if ($a == 0 || $b == 0) {
                    $output = 'Division By zero';
                    return $simpleCalc($simpleCalc, $input, $i + 1, $output);
                }
                $output = (string)$opDivide($a, $b);
            } elseif ($op == 'multiply') {
                $output = (string)$opMultiply($a, $b);
            }
            return $simpleCalc($simpleCalc, $input, $i + 1, $output);
        }
        return $output;
    };
    $result = ($simpleCalc($simpleCalc, $input));
};
include("09.1.calculator_frontend.php");
