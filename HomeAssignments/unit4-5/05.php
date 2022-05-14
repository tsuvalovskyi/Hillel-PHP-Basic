<?php

$number = random_int(1000, 9999);

echo "Випадкове число: " . $number . "<br>";

$thousands = ($number - $number % 1000) / 1000;
$number -= $thousands * 1000;
$hundreds = ($number - $number % 100) / 100;
$number -= $hundreds * 100;
$tens = ($number - $number % 10) / 10;
$number -= $tens * 10;
$sum = $thousands + $hundreds + $tens + $number;

echo "Тисячі: " . $thousands . "<br>";
echo "Сотні: " . $hundreds . "<br>";
echo "Десятки: " . $tens . "<br>";
echo "Остання цифра: " . $number . "<br>";
echo "Сума: " . $sum . "<br>";