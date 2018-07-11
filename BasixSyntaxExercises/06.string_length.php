<?php
$input = trim(fgets(STDIN));
$output = "";
for ($i = 0; $i < 20; $i++){
    if ($i >= strlen($input)){
        $output .= "*";
    } else {
        $output .= $input[$i];
    }
}
echo $output;