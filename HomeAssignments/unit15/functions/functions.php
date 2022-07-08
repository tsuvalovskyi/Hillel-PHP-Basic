<?php

function user_register(PDO $database, array $data): bool
{

    $statement = $database->prepare(
        'SELECT `id` FROM `users` WHERE `email` = :email'
    );

    $statement->execute([
        'email' => $data['email']
    ]);

    $user = $statement->fetchAll();

    if (empty($user)) {

        $statement = $database->prepare(
            'INSERT INTO `users` (`email`, `password`) VALUES (:email, :password)'
        );

        $statement->execute([
            'email' => $data['email'],
            'password' => $data['password']
        ]);

        return true;

    } else {
        return false;
    }
}

function user_auth(PDO $database, string $email, string $password): bool
{

    $statement = $database->prepare(
        'SELECT `password` FROM `users` WHERE `email` = :email'
    );

    $statement->execute([
        'email' => $email
    ]);

    $user = $statement->fetch();
    $passwordInDb = $user['password'];
    $enteredPassword = md5($password);

    if (!empty($user)) {
        return ($passwordInDb === $enteredPassword);
    } else {
        return false;
    }
}

function user_is_auth($database): bool
{
    if (!empty($_SESSION['auth'])) {
        return true;
    } elseif (!empty($_COOKIE['login']) && !empty($_COOKIE['token'])) {

        $cookieLogin = ($_COOKIE['login']);
        $cookieToken = ($_COOKIE['token']);
        $isUser = getUserToken($database, $cookieLogin);

        if (!empty($isUser['token']) && $isUser['token'] === $cookieToken) {
            session_start();
            $_SESSION['auth'] = $cookieLogin;

            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}


function generateToken($length = 20): string
{
    return bin2hex(random_bytes($length));
}

function saveUserToken(PDO $database, string $email, string $token): void
{
    $statement = $database->prepare(
        'UPDATE `users` SET `token` = :token WHERE `email` = :email'
    );
    $statement->execute([
        'token' => $token,
        'email' => $email
    ]);
}

function getUserToken(PDO $database, string $email): array
{
    $statement = $database->prepare(
        'SELECT `token` FROM `users` WHERE `email` = :email'
    );
    $statement->execute([
        'email' => $email
    ]);

    return $statement->fetch();
}