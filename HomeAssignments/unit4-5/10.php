<?php

$finger = random_int(1, 5);

$fingerNames = [
    1 => 'великий',
    2 => 'вказівний',
    3 => 'середній',
    4 => 'підмізинний',
    5 => 'мізинець'
];

if ($finger !== 5) {
    echo "Палець №" . $finger . " - це " . $fingerNames[$finger] . " палець";
} else {
    echo "Палець №" . $finger . " - це " . $fingerNames[$finger];
}