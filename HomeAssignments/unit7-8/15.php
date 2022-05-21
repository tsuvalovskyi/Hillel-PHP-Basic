<?php

$array = [1, 2, 3, 4, 1];
$arrayWithCounter = array_count_values($array);
$maxCount = max($arrayWithCounter);

if ($maxCount === 1) {
    echo "В цьому масиві немає дублів";
} else {
    echo "В цьому масиві присутні дублі";
}
