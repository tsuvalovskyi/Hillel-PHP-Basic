<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="mx-auto d-sm-flex d-block flex-sm-nowrap">
        <div class="collapse navbar-collapse text-center">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Список товарів</a>
                </li>
            </ul>

            <?php if (!empty($_SESSION['cartProducts'])): ?>
                <?php
                    $cartProductsCount = count($_SESSION['cartProducts']);
                ?>
                <a class="nav-link fw-bold ms-3" href="checkout.php">Корзина (<?php echo $cartProductsCount ?> тов.)</a>
            <?php endif; ?>
        </div>
    </div>
</nav>