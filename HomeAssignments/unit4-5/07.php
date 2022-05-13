<?php

$degrees = random_int(0, 360);
$degreesPerHour = 360 / 12;

//Функцію intdiv ви нам давали, тому, думаю, її можна використовувати
$hours = intdiv($degrees, $degreesPerHour);

echo "Градуси: " . $degrees . "<br>";
echo "Години: " . $hours;