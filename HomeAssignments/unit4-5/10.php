<?php

$finger = random_int(1, 5);

$fingerNames = [
    1 => 'великий',
    2 => 'вказівний',
    3 => 'середній',
    4 => 'підмізинний',
    5 => 'мізинець'
];

echo "Палець №" . $finger . " - це " . $fingerNames[$finger];
