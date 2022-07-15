<?php

require_once __DIR__ . '/functions/functions.php';
require_once __DIR__ . '/functions/template.php';
require_once __DIR__ . '/config/config.php';

session_start();

if (!empty($_SESSION['cartProducts'])) {
    $cartProducts = get_cart_products($_SESSION['cartProducts']);
    $cartSummary = get_cart_summary($cartProducts);
} else {
    header('Location: ' . ROOT_PATH . 'index.php');
    exit();
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
    <title>Оформлення замовлення</title>
</head>
<body>
<?php require_once __DIR__ . '/navbar.php'; ?>
<div class="container">
    <?php require __DIR__ . '/templates/alerts.php'; ?>
    <div class="row justify-content-center">
        <div class="col col-lg-6 mt-5 mb-2">
            <h1>Ваша корзина</h1>
            <table class="table cart-products">
                <tr>
                    <th>Зображення</th>
                    <th>Назва</th>
                    <th>Кількість</th>
                    <th>Ціна за одиницю</th>
                </tr>
                <?php foreach ($cartProducts as $cartProduct): ?>
                    <tr>
                        <td>
                            <img src="<?php echo IMAGE_PATH . $cartProduct['image']; ?>"
                                 alt="<?php echo $cartProduct['name']; ?>"></td>
                        <td><?php echo $cartProduct['name']; ?></td>
                        <td><?php echo $cartProduct['quantity']; ?></td>
                        <td><?php echo $cartProduct['price']; ?> ₴</td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td></td>
                    <td>Всього</td>
                    <td></td>
                    <td><?php echo $cartSummary; ?> ₴</td>
                </tr>
            </table>
            <form action="controllers/clear-cart-controller.php" method="post">
                <button type="submit"
                        class="btn btn-s btn btn-outline-info d-block">Очистити
                    корзину
                </button>
            </form>
        </div>
        <div class="row justify-content-center">
            <div class="col col-lg-6 mt-4 mb-5">
                <h2>Оформлення замовлення</h2>
                <form action="controllers/checkout-controller.php"
                      method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Ваше ім'я</label>
                        <input type="text"
                               name="name"
                               id="name"
                               class="form-control"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email"
                               name="email"
                               id="email"
                               class="form-control"
                               required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Телефон</label>
                        <input type="tel"
                               id="phone"
                               name="phone"
                               minlength="10"
                               maxlength="13"
                               class="form-control"
                               required>
                    </div>
                    <?php foreach ($cartProducts as $i => $cartProduct): ?>
                        <input type="hidden"
                               name="products[<?php echo $i ?>][id]"
                               value="<?php echo $cartProduct['id'] ?>"
                        >
                        <input type="hidden"
                               name="products[<?php echo $i ?>][quantity]"
                               value="<?php echo $cartProduct['quantity'] ?>"
                        >
                        <input type="hidden"
                               name="products[<?php echo $i ?>][price]"
                               value="<?php echo $cartProduct['price'] ?>"
                        >
                    <?php endforeach; ?>
                    <button type="submit"
                            class="btn btn-lg btn-success d-block w-100">
                        Оформити
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>