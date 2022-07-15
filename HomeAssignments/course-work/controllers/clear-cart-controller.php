<?php

session_start();
require_once __DIR__ . '/../functions/alerts.php';
require_once __DIR__ . '/../config/config.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    exit('Використаний недопустимий метод!');
}

unset($_SESSION['cartProducts']);

set_alert('info', 'Корзину було очищено');
header('Location: ' . ROOT_PATH . 'index.php');
exit();