<?php

session_start();

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

    <title>Registration</title>
</head>
<body>


<div class="container">
    <div class="row justify-content-center">
        <div class="col col-lg-4 mt-4">
            <?php require __DIR__ . '/templates/alerts.php'; ?>
            <form action="controllers/registration-controller.php"
                  method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email"
                           class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <br>
                    <input type="password" name="password" id="password"
                           class="form-control" required>
                </div>
                <button type="submit"
                        class="btn btn-lg btn-success d-block w-100">Зареєструватися
                </button>
            </form>
            <div class="mt-3 text-center">або <a href="auth.php"
                                                 class="link-secondary">авторизуйтеся</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
