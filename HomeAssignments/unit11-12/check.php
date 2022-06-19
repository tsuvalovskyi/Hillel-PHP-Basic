<?php

session_start();

require_once(__DIR__ . '/functions/functions.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    set_alert('error', 'Використаний недопустимий метод');

    header('Location: index.php');
    exit;
}

$userAnswers = $_POST;
$tasksInfo = $_SESSION['tasks'];
$userScore = get_user_score($userAnswers, $tasksInfo);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Контрольна робота - результати</title>
</head>
<body>
<div class="container">
    <div class="wrapper">
        <h2>Ваш результат:
            <?php echo $userScore['score']; ?>
            з <?php echo $userScore['taskCounter'] ?>
        </h2>
        <p>
            <a href="index.php">Пройти контрольну ще раз</a>
        </p>
    </div>
</div>
</body>
</html>