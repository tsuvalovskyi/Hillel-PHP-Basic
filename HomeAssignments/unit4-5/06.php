<?php

$cardNumber = random_int(6, 14);

$cards = [
    6 => 'Six',
    7 => 'Seven',
    8 => 'Eight',
    9 => 'Nine',
    10 => 'Ten',
    11 => 'Jack',
    12 => 'Queen',
    13 => 'King',
    14 => 'Ace'
];

echo "Your card is " . $cards[$cardNumber];
