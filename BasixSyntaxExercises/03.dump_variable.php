<?php
//$input = "hello";
//$input = 15;
//$input = 1.234;
//$input = array(1,2,3);
$input = (object)[2,34];

if(is_numeric($input))
{
    var_dump($input);
}
else {
    echo gettype($input);
}