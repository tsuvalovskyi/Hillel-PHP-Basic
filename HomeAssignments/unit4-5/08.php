<?php

/*
    Признаки високосного року https://docs.microsoft.com/ru-ru/office/troubleshoot/excel/determine-a-leap-year
    Рік є високосним за 2х обставин:
    - Він ділиться на 4 без залишку, але не кратний 100
    - Він кратний 100 і ділиться на 400 без залишку
*/


$year = random_int(0, 9999);

if (($year % 4 === 0) && ($year % 100 !== 0)) {
    echo $year . " - високосний рік!";
} elseif (($year % 100 === 0) && ($year % 400 === 0)) {
    echo $year . " - високосний рік!";
} else {
    echo $year . " - не є високосним роком!";
}