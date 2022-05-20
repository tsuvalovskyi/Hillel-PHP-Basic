<?php

$array = [1, 2, 10, 3, 1, 10, 4, 10];
$arrayWithCounter = array_count_values($array);
$arrayMin = min($array);
$arrayMax = max($array);

echo "Мінімальне число = " . $arrayMin . ", зустрічається раз - " . $arrayWithCounter[$arrayMin] . "<br>";
echo "Максимальне число = " . $arrayMax . ", зустрічається раз - " . $arrayWithCounter[$arrayMax] . "<br>";