<?php
$array = [];

for ($i = 0; $i < 10; $i++) {
    $array[$i] = $i;
    echo $array[$i] . '<br>';
}

$person = [
    'name' => 'Den',
    'age' => 37,
    'city' => 'Chelny'
];
 echo $person['name'] . '<br>';
 print_r($person);
