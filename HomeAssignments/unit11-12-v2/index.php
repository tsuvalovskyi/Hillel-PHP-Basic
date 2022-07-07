<?php

session_start();
require_once(__DIR__.'/functions/functions.php');

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Контрольна робота - завдання</title>
</head>
<body>
<div class="container">
    <div class="wrapper">
        <h1>Контрольна робота з математики</h1>
        <h4>Будь ласка, заповніть поля правильними відповідями. Якщо ви не знаєте, як вирішити завдання, просто пропустіть його</h4>
        <p class="hint">* правильна відповідь по завданню виведена в placeholder для легкості перевірки</p>

        <?php require (__DIR__.'/templates/alerts.php') ?>

        <form action="check.php" method="post">
            <fieldset>
                <legend>Завдання з додавання</legend>
                <?php
                $tasks = generate_tasks("addition", 3);
                include (__DIR__.'/templates/tasks.php');
                ?>
            </fieldset>
            <fieldset>
                <legend>Завдання з віднімання</legend>
                <?php
                $tasks = generate_tasks("subtraction", 3);
                include (__DIR__.'/templates/tasks.php');
                ?>
            </fieldset>
            <fieldset>
                <legend>Завдання з множення</legend>
                <?php
                $tasks = generate_tasks("multiplication", 3);
                include (__DIR__.'/templates/tasks.php');
                ?>
            </fieldset>
            <fieldset>
                <legend>Завдання з ділення</legend>
                <?php
                $tasks = generate_tasks("division", 3);
                include (__DIR__.'/templates/tasks.php');
                ?>
                <p class="hint">* у задачах з ділення відповідь вказуйте з округленням до 2-х цифр після коми</p>
            </fieldset>
            <button type="submit" class="button submit-button">Перевірити</button>
        </form>
    </div>
</div>
</body>
</html>