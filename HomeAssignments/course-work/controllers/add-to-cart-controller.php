<?php

session_start();

require_once __DIR__ . '/../functions/alerts.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    exit('Використаний недопустимий метод!');
}

$productID = $_POST['productID'] ?? null;

if ($productID === null) {
    exit('Ідентифікатор товару не передано!');
}

print_r($_POST);

if (isset($_SESSION['cartProducts'][$productID])) {
    $qtyInCart = $_SESSION['cartProducts'][$productID];
    $_SESSION['cartProducts'][$productID] = ++$qtyInCart;
} else {
    $_SESSION['cartProducts'][$productID] = 1;
}

set_alert('success', 'Товар успішно доданий до корзини!');

header('Location: ' . $_SERVER['HTTP_REFERER']);