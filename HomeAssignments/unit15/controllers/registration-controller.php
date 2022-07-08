<?php

session_start();

require_once __DIR__ . '/../functions/alerts.php';
require_once __DIR__ . '/../functions/database.php';
require_once __DIR__ . '/../functions/functions.php';

// 1. Проверить корректность запроса

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    set_alert('warning', 'Використаний недозволений метод');

    header('Location: ' . $_SERVER['HTTP_REFERER']);

    exit();
}

// 2. Проверить данные

if (!isset($_POST['email']) || !isset($_POST['password'])) {
    set_alert('warning', 'Всі поля обов\'язкові для заповнення');

    header('Location: ' . $_SERVER['HTTP_REFERER']);

    exit();
}

$email = trim($_POST['email']);
$password = md5($_POST['password']);

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    set_alert('warning', 'Введено некоректну email адресу');

    header('Location: ' . $_SERVER['HTTP_REFERER']);

    exit();
}

// 3. Проверить существование пользователя.

$connection = database_connect();

$userData = [
    'email' => $email,
    'password' => $password
];

$userRegister = user_register($connection, $userData);

if ($userRegister) {
    set_alert('success', 'Ви успішно зареєстровані');
} else {
    set_alert('warning', 'Користувач з таким email вже зареєстрований! Будь ласка, авторизуйтесь');
}
header('Location: /Hillel-PHP-Basic/HomeAssignments/unit15/auth.php');

exit();