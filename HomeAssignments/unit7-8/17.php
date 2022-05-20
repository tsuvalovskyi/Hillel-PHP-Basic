<?php

$array = [10, -20, 30, -40, 50];

foreach ($array as $key => $value) {
    if ($value >= 0) {
        continue;
    }
    $array[$key] = abs($value);
}

var_dump($array);