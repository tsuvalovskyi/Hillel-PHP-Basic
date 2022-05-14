<?php

$number = random_int(1, 9999);

echo "Випадкове число: " . $number . "<br>";

//Розбиваємо число на окремі цифри
$thousands = ($number - $number % 1000) / 1000;
$number -= $thousands * 1000;
$hundreds = ($number - $number % 100) / 100;
$number -= $hundreds * 100;
//Фіксуємо 2 останні цифри на випадок, якщо вони складають число в діапазоні 10-19
$tensWithLast = $number;
$tens = ($number - $number % 10) / 10;
$last = $number - $tens * 10;

$thousandInWords = [
    1 => 'одна тисяча',
    2 => 'дві тисячі',
    3 => 'три тисячі',
    4 => 'чотири тисячі',
    5 => 'п\'ять тисяч',
    6 => 'шість тисяч',
    7 => 'сім тисяч',
    8 => 'вісім тисяч',
    9 => 'дев\'ять тисяч'
];

$hundredInWords = [
    1 => 'сто',
    2 => 'двісті',
    3 => 'триста',
    4 => 'чотириста',
    5 => 'п\'ятсот',
    6 => 'шістсот',
    7 => 'сімсот',
    8 => 'вісімсот',
    9 => 'дев\'ятсот'
];

$tenInWords = [
    2 => 'двадцять',
    3 => 'тридцять',
    4 => 'сорок',
    5 => 'п\'ятдесят',
    6 => 'шістдесят',
    7 => 'сімдесят',
    8 => 'вісімдесят',
    9 => 'дев\'яносто'
];

$tenWithLastInWords = [
    10 => 'десять',
    11 => 'одинадцять',
    12 => 'дванадцять',
    13 => 'тринадцять',
    14 => 'чотирнадцять',
    15 => 'п\'ятнадцять',
    16 => 'шістнадцять',
    17 => 'сімнадцять',
    18 => 'вісімнадцять',
    19 => 'дев\'тнадцять'
];

$lastInWords = [
    1 => 'один',
    2 => 'два',
    3 => 'три',
    4 => 'чотири',
    5 => 'п\'ять',
    6 => 'шість',
    7 => 'сім',
    8 => 'вісім',
    9 => 'дев\'ять',
];

$numberInWords = ($thousands !== 0) ? $thousandInWords[$thousands] . " " : "";
$numberInWords .= ($hundreds !== 0) ? $hundredInWords[$hundreds] . " " : "";

if ($tens === 1) {
    $numberInWords .= $tenWithLastInWords[$tensWithLast] . " ";
    $currency = "доларів";
} else {
    $numberInWords .= ($tens !== 0) ? $tenInWords[$tens] . " " : "";
    $numberInWords .= ($last !== 0) ? $lastInWords[$last] . " " : "";

    if ($last === 1) {
        $currency = "долар";
    } elseif ($last === 2 || $last === 3 || $last === 4) {
        $currency = "долари";
    } else {
        $currency = "доларів";
    }
}

echo "Сума прописом: " . $numberInWords . $currency;