<?php

session_start();

require_once __DIR__ . '/functions/functions.php';
require_once __DIR__ . '/functions/template.php';
require_once __DIR__ . '/config/config.php';

if (empty($_GET['id'])) {
    http_response_code(400);
    exit('У вашому запиті виникла помилка');
}

$product = get_product($_GET['id']);

if (empty($product)) {
    http_response_code(404);
    require('404.php');
    exit();
} else {
    $product = $product[0];
}
?>

<!doctype html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
          crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
    <title><?php echo $product['image'] ?></title>
</head>
<body>
<?php require_once __DIR__ . '/navbar.php'; ?>
<div class="container">
    <?php require __DIR__ . '/templates/alerts.php'; ?>
    <div class="row justify-content-center">
        <div class="col col-lg-5 mt-4 mb-5">
            <div class="card text-center product-page-card">
                <div class="bg-image hover-overlay ripple"
                     data-mdb-ripple-color="light">
                    <img src="<?php echo IMAGE_PATH . $product['image'] ?>"
                         class="card-img-top"
                         alt="<?php echo $product['name'] ?>">
                </div>

                <div class="card-body">
                    <h1 class="card-title"><?php echo $product['name'] ?></h1>
                    <div class="product-price">
                        <?php echo $product['price'] ?> ₴
                    </div>
                </div>
                <div class="card-footer ">
                    <form action="controllers/add-to-cart-controller.php"
                          method="post">
                        <input type="hidden" name="productID"
                               value="<?php echo $product['id'] ?>">
                        <button type="submit" class="btn btn-success">
                            Додати в корзину
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


