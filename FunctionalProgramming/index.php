<?php

/*for ($i = 0; $i <= 5; $i++ ){
    echo "i = $i, i*i = " . ($i * $i) . " \n";
}*/

$square = function (&$square, $i = 1, $n = 5, $out = ""){

    echo "input i,n,out: $i, $n, $out";
    if ($i < $n){
        $dump =  $square($square, $i+1, $n, $out . "i = $i, i*i = " . ($i * $i) . " \n");
        echo "output out = " . $dump;
        return $dump;
    } else {
        $dump =  $out . "i = $i, i*i = " . ($i * $i) . " \n";
        echo "output out = " . $dump . "\n";
        return $dump;
    }
};


$some = function (&$n){
//...
};
print_r(array_map($some, [[1, 2, [23, 3], 4], [2, 3], [1, 2], []]));

print_r(
  array_reduce([1,2,3,4,5,6,7,8,9,10], function ($sum, $item){
      return $sum + $item;
  })
);
