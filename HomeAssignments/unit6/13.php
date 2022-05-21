<?php

$date = "2022-05-17";
$formattedDate = explode("-", $date);

$year = $formattedDate[0];
$month = $formattedDate[1];
$day = $formattedDate[2];

$monthName = match ($month) {
    '01' => 'січень',
    '02' => 'лютий',
    '03' => 'березень',
    '04' => 'квітень',
    '05' => 'травень',
    '06' => 'червень',
    '07' => 'липень',
    '08' => 'серпень',
    '09' => 'вересень',
    '10' => 'жовтень',
    '11' => 'листопад',
    '12' => 'грудень'
};

echo "Рік: " . $year . PHP_EOL;
echo "Місяць: " . $month . " (" . $monthName . ")" . PHP_EOL;
echo "День: " . $day . PHP_EOL;