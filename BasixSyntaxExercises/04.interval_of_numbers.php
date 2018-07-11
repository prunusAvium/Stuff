<?php
$firstNumber = intval(fgets(STDIN));
$secondNumber = intval(fgets(STDIN));
$min = min($firstNumber, $secondNumber);
$max = max($firstNumber, $secondNumber);
for ($i = $min ; $i <= $max; $i++ ){
    echo $i ."\n";
}
