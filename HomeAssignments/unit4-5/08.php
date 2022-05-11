<?php

/*
    Признаки високосного року https://docs.microsoft.com/ru-ru/office/troubleshoot/excel/determine-a-leap-year
    Рік є високосним за 2х обставин:
    - Він ділиться на 4 без залишку, але не кратний 100
    - Він кратний 100 і ділиться на 400 без залишку
*/

$year = random_int(0, 9999);

// Зробив 2 варіанти.
// Перший варіант і компактніше, і читається легше, ніж той, що нижче. Тому я би використовував його.
// Тему логічних операторів читав, але глибоко не копався, тому на додаткові питання не претендую :)

if (($year % 4 === 0) && ($year % 100 !== 0)) {
    echo $year . " - високосний рік!";
} elseif (($year % 100 === 0) && ($year % 400 === 0)) {
    echo $year . " - високосний рік!";
} else {
    echo $year . " - не є високосним роком!";
}

echo "<br>";

// Другий, більш громіздкий і менш очевидний варіант, але не основі того, що вивчали.

if ($year % 4 === 0) {
    if ($year % 100 === 0) {
        if ($year % 400 === 0) {
            echo $year . " - високосний рік!";
        } else {
            echo $year . " - не є високосним роком!";
        }
    } else {
        echo $year . " - високосний рік!";
    }
} else {
    echo $year . " - не є високосним роком!";
}