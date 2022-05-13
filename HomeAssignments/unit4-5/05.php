<?php

$number = random_int(1000, 9999);

echo "Random number: " . $number . "<br>";

$thousands = ($number - $number % 1000) / 1000;
$number -= $thousands * 1000;
$hundreds = ($number - $number % 100) / 100;
$number -= $hundreds * 100;
$tens = ($number - $number % 10) / 10;
$number -= $tens * 10;
$sum = $thousands + $hundreds + $tens + $number;

echo "Thousands: " . $thousands . "<br>";
echo "Hundreds: " . $hundreds . "<br>";
echo "Tens: " . $tens . "<br>";
echo "Last: " . $number . "<br>";
echo "Sum: " . $sum . "<br>";