<?php

session_start();

require_once __DIR__ . '/functions/functions.php';
require_once __DIR__ . '/functions/template.php';
require_once __DIR__ . '/config/config.php';

$page = (int)($_GET['page'] ?? 1);
$productsPerPage = 3;
$offset = 1 === $page ? 0 : ($page * $productsPerPage) - $productsPerPage;

$products = get_products($productsPerPage, $offset);

$productsCount = count_products();
$maxPage = ceil($productsCount / $productsPerPage);
?>
<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Каталог товарів</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
          crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>

<?php require_once __DIR__ . '/navbar.php'; ?>

<div class="container">
    <?php require __DIR__ . '/templates/alerts.php'; ?>
    <div class="row justify-content-center mt-4">
        <?php if (!empty($products)): ?>
            <?php
            foreach ($products as $product):
                echo get_template_contents(__DIR__ . '/templates/product-tile.php', [
                    'image' => $product['image'],
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'id' => $product['id']
                ]);
            endforeach;
            ?>
        <?php else: ?>
            <div class="col-md-12">
                <div class="informer-template">
                    <h1>
                        Отакої :(
                    </h1>
                    <h2>
                        Жодного товару ще не було додано
                    </h2>
                </div>
            </div>
        <?php endif; ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mt-4">
                <?php for ($i = 1; $i <= $maxPage; ++$i): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?php echo $i; ?>">
                            <?php echo $i; ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </nav>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</body>
</html>