<?php

session_start();
require_once __DIR__ . '/../functions/alerts.php';

unset($_SESSION['auth']);
session_destroy();

setcookie('login', '', time(), '/');
setcookie('token', '', time(), '/');

header('Location: /Hillel-PHP-Basic/HomeAssignments/unit15/auth.php');