<?php

$array = [1, 2, 1, 4, 4];
$arrayWithCounter = array_count_values($array);
$doubles = [];
foreach ($arrayWithCounter as $key => $value) {
    if ($value === 1) {
        continue;
    }
    $doubles[] = $key;
}

var_dump($doubles);