<?php

$word = "abba";
$wordLikeArray = mb_str_split($word);
$reverseArray = array_reverse($wordLikeArray);

$arraysDifference = array_diff_assoc($wordLikeArray, $reverseArray);

if ($arraysDifference === []) {
    echo "Слово " . $word . " - паліндром";
} else {
    echo "Слово " . $word . " - не є паліндромом";
}