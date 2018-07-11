<?php
$arr = explode(' ', trim(fgets(STDIN)));
$sums = [];
for ($i = 0; $i < count($arr); $i += 2) {
    list($town, $income) = [$arr[$i], $arr[$i+1]];
    if ( ! isset($sums[$town]))
        $sums[$town] = $income;
    else
        $sums[$town] += $income;
}
print_r($sums);
