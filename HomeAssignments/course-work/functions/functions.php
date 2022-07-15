<?php

require_once __DIR__ . '/database.php';

function get_products(int $limit, int $offset = 0): array
{
    $connection = get_database_connection();

    $statement = $connection->prepare(
        'SELECT * FROM `products` LIMIT :offset, :limit'
    );

    $statement->execute(compact('offset', 'limit'));

    return $statement->fetchAll();
}


function get_product(int $id): array
{
    $connection = get_database_connection();

    $statement = $connection->prepare(
        'SELECT * FROM `products` WHERE `id` = :id'
    );

    $statement->execute([
        'id' => $id
    ]);

    return $statement->fetchAll();
}

function get_cart_products(array $sessionProducts): array
{
    $cartProducts = [];
    foreach ($sessionProducts as $id => $qty) {

        $productData = get_product($id);
        $productData = $productData[0];
        $productData['quantity'] = $qty;
        $cartProducts[] = $productData;
    }

    return $cartProducts;
}

function count_products(): int
{
    $connection = get_database_connection();

    $statement = $connection->prepare(
        'SELECT COUNT(*) AS products_count FROM `products`'
    );

    $statement->execute();

    return (int)$statement->fetch()['products_count'];
}

function get_cart_summary(array $cartProducts): int|float
{
    $cartSummary = 0;
    foreach ($cartProducts as $cartProduct) {
        $cartSummary += $cartProduct['price'] * $cartProduct['quantity'];
    }

    return $cartSummary;
}

function clear_cart(): void
{
    unset($_SESSION['cartProducts']);
}