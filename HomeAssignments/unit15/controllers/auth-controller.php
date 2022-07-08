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
$password = $_POST['password'];

// 3. Проверить наличие пользователя

$connection = database_connect();

$userAuth = user_auth($connection, $email, $password);

if ($userAuth) {
    $_SESSION['auth'] = $email;

    $token = generateToken();

    setcookie('login', $email, time() + 60 * 60 * 24 * 30, '/');
    setcookie('token', $token, time() + 60 * 60 * 24 * 30, '/');

    saveUserToken($connection, $email, $token);

    set_alert('success', 'Ви успішно авторизувалися на сайті');
    header('Location: /Hillel-PHP-Basic/HomeAssignments/unit15/index.php');

} else {
    set_alert('warning', 'Такого користувача не існує або введений пароль невірний');
    header('Location: /Hillel-PHP-Basic/HomeAssignments/unit15/auth.php');

}