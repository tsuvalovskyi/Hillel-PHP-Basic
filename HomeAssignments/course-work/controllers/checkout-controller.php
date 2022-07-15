<?php

session_start();

require_once __DIR__ . '/../functions/database.php';
require_once __DIR__ . '/../functions/functions.php';
require_once __DIR__ . '/../functions/alerts.php';
require_once __DIR__ . '/../config/config.php';

if (empty($_POST['email']) || empty($_POST['name']) || empty($_POST['phone'])) {
    set_alert('warning', 'Всі поля в формі замовлення обов\'язкові для заповнення');

    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    set_alert('warning', 'Введено некоректну email адресу');

    header('Location: ' . $_SERVER['HTTP_REFERER']);

    exit();
}

$date = date("Y-m-d H:i:s");

$connection = get_database_connection();

$statement = $connection->prepare(
    'INSERT INTO `orders` (`created`, `name`, `email`, `phone`, `products`) 
VALUES (:created, :name, :email, :phone, :products)'
);

$statement->execute([
    'created' => $date,
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'products' => json_encode($_POST['products'])
]);

clear_cart();

header('Location: ' . ROOT_PATH . 'checkout-success.php');