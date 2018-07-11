<?php
$animals = [
    ['name'=>"Buky", 'type'=>"dog", 'age'=> 3],
    ['name'=>"Einstein", 'type'=>"dog", 'age'=> 12],
    ['name'=>"Helga", 'type'=>"dog", 'age'=> 5],
    ['name'=>"Vav", 'type'=>"cat", 'age'=> 3],
    ['name'=>"Roky", 'type'=>"dog", 'age'=> 11],
];

/*$youngDogs = function ($item){
    return $item['type'] == 'dog' and $item['age'] < 11;

};
$output = array_filter($animals, $youngDogs);
print_r($output);*/

print_r(array_filter($animals, function ($value){
    return $value['type'] == 'dog' and $value['age'] < 11;
}));