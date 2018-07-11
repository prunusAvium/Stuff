<?php
$numbers = trim(fgets(STDIN));
$arr = explode(' ', $numbers);
$result = [];

for ($i = 0; $i < count($arr); $i++){
    if (!is_numeric($arr[$i])){
        continue;
    }
    $num = $arr[$i];

    if (!array_key_exists($num, $result)){
        $result[$num] = 0;
    }
    $result[$num]++;
}
printResult($result);

function printResult(array $result){
    ksort($result);
    foreach ($result as $key => $value){
        echo $key . ' -> ' . $value ." times\n";
    }
}

