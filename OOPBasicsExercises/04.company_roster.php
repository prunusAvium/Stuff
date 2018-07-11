<?php
declare(strict_types=1);
include "04.Employee.php";

$n = intval(fgets(STDIN));
$employees = [];
for($i = 0; $i < $n; $i++){
    $input = explode(' ', trim(fgets(STDIN)));
    $employee = new Employee($input[0], $input[1], $input[2], $input[3], $input[4], $input[5]);
    $employees[] = $employee;
}