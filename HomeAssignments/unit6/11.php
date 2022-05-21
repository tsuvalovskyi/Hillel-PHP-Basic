<?php

$phone = "380956199154";
echo "Номер, введений користувачем: " . $phone . PHP_EOL ;
$phoneLength = strlen($phone);

if ($phoneLength === 12) {
    $countryCode = substr($phone, 0, 3);
    if ($countryCode === "380") {
        $operatorCode = substr($phone, 3, 2);
        $firstPart = substr($phone, 5, 3);
        $secondPart = substr($phone, 8, 2);
        $thirdPart = substr($phone, 10, 2);
        $formattedPhone = "+" . $countryCode . " (" . $operatorCode . ") " . $firstPart . "-" . $secondPart . "-" . $thirdPart;
        echo "Номер у потрібному форматі: " . $formattedPhone;
    } else {
        echo "Номер вказаний в неправильному форматі!";
    }
} elseif ($phoneLength === 9) {
    $countryCode = "380";
    $operatorCode = substr($phone, 0, 2);
    $firstPart = substr($phone, 2, 3);
    $secondPart = substr($phone, 5, 2);
    $thirdPart = substr($phone, 7, 2);
    $formattedPhone = "+" . $countryCode . " (" . $operatorCode . ") " . $firstPart . "-" . $secondPart . "-" . $thirdPart;
    echo "Номер у потрібному форматі: " . $formattedPhone;
} else {
    echo "Номер вказаний в неправильному форматі!";
}

echo PHP_EOL;

/*
 *
    Для того, щоб не писати по 2 рази складання до купи $formattedPhone і вивід помилки хотів задати на початку
    змінну $phoneIsCorrect = true, для помилок прописувати $phoneIsCorrect = false, а в кінці вивести результат по умові:
    if ($phoneIsCorrect) {
        $formattedPhone = "+" . $countryCode . " (" . $operatorCode . ") " . $firstPart . "-" . $secondPart . "-" . $thirdPart;
    } else {
         echo "Телефон вказаний в неправильному форматі!";
    }

    Але Шторм виводив попередження про те, що $countryCode, $operatorCode і т.д. можуть бути невизначені, тому від гріха подалі переробив на поточний формат.

    Питання: так можна було робити, чи краще писати в тому форматі, який є зараз?

    Дякую!

*/




