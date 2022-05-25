<?php

$word = "мадам";
$wordInArray = mb_str_split($word);
$reverseArray = array_reverse($wordInArray);

$diffArray = array_diff_assoc($wordInArray, $reverseArray);

if ($diffArray) {
    echo "Слово " . $word . " - не є паліндромом";
} else {
    echo "Слово " . $word . " - паліндром";
}