<?php
$mode = 'reg';
$uns = 0;
$users = [];
while(1){
    $input = trim(fgets(STDIN));
    if ($input == 'End'){
        break;
    }
    if ($input == 'login'){
        $mode = 'login';
        continue;
    }
    $data = explode(' -> ', $input);
    if ($mode == 'reg'){
        $users[$data[0]] = $data[1];
    } else{
        if (array_key_exists($data[0], $users)
            && $users[$data[0]] == $users[$data[1]]){
            echo $data[0] . ": logged in successfully";
        } else {
            echo $data[0] . ": login failed";
            $uns++;
        }
    }
}
echo 'unsuccessful login attempts:' . $uns;