<?php
    session_start();
?>
<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Додати новий товар</title>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col col-lg-4">
            <?php require __DIR__ . '/templates/alerts.php'; ?>
            <form action="controllers/add-product-controller.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">
                        Назва товару
                    </label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">
                        Зображення
                    </label>
                    <input type="file" name="image" id="image" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">
                        Вартість
                    </label>
                    <input type="number" name="price" id="price" step="0.01" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-lg btn-success d-block w-100">
                    Додати товар
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>
</html>