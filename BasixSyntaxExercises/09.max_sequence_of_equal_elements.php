<?php
$arr = explode(' ', trim(fgets(STDIN)));

$arr = intValue($arr);

$prn = searchEqual($arr);

printResult($prn);

function searchEqual($arr){
    $lastElement = 0;
    $maxCount = 0;
    for ($i = 0; $i < count($arr); $i++) {
        $count = 0;

        for ($j = $i; $j < count($arr); $j++) {
            if ($arr[$i] === $arr[$j]) {
                $count++;
            } else {
                break;
            }

            if ($count > $maxCount) {
                $maxCount = $count;
                $lastElement = $arr[$j];
            }
        }
    }

    $prn = array('lastElement' => $lastElement, 'maxCount' => $maxCount);
    return $prn;
}

function printResult($prn){
    $lastElement = $prn['lastElement'];
    $maxCount = $prn['maxCount'];

    for ($i = 0; $i < $maxCount; $i++){
        echo $lastElement;
        if ($i < $maxCount - 1){
            echo ' ';
        }
    }
}

function intValue($arr){
    $intArr = [];

    foreach ($arr as $value) {
        $intArr[] = intval($value);
    }

    return $intArr;
}