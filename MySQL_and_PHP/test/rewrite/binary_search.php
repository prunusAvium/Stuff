<?php
/*arr[] = {5, 6, 7, 8, 9, 10, 1, 2, 3};
         key = 3*/

$arr = [5, 6, 7, 8, 9, 10, 1, 2, 3];

$key = 6;
for ($i = 0; $i < count($arr); $i++){
    if ($arr[$i] == $key){
        echo "Found at index " . $i . PHP_EOL;
    } elseif($i == count($arr) - 1 and $arr[$i] != $key){
        echo "Not found";
        var_dump($i);
        var_dump(count($arr)-1);
        var_dump($arr[$i]);
        var_dump($key);
    }
}
