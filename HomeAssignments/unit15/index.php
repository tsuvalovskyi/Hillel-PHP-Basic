<?php

session_start();
require_once __DIR__ . '/functions/functions.php';
require_once __DIR__ . '/functions/database.php';

$connection = database_connect();
$userIsAuth = user_is_auth($connection);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
          crossorigin="anonymous">

    <title>Index</title>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-lg-5 mt-3">
            <?php require __DIR__ . '/templates/alerts.php'; ?>

            <?php if ($userIsAuth): ?>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                    ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Duis aute irure dolor in reprehenderit in voluptate velit
                    esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                    occaecat cupidatat non proident, sunt in culpa qui officia
                    deserunt mollit anim id est laborum.</p>

                <form action="controllers/logout-controller.php" method="post">
                    <button type="submit"
                            class="btn btn-s btn btn-outline-info d-block">Вийти
                        з акаунту
                    </button>
                </form>

            <?php else: ?>
                <p>Для доступу на сайт потрібно <a href="auth.php">авторизуватись</a>
                </p>
                <p>Якщо ви у нас вперше - пройдіть <a href="registration.php">процедуру
                        реєстрації</a></p>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html>
