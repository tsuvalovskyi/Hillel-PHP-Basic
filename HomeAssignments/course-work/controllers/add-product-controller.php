<?php

session_start();

require_once __DIR__.'/../functions/database.php';
require_once __DIR__ . '/../functions/alerts.php';
require_once __DIR__.'/../config/config.php';

if ('POST' !== $_SERVER['REQUEST_METHOD']) {
    exit('Method Not Allowed.');
}

$name  = $_POST['name'] ?? null;
$image = $_FILES['image'] ?? null;
$price = $_POST['price'] ?? null;

if (null === $name || null === $image || null === $price) {
    exit('Всі поля товару обов\'язкові для заповнення!');
}

$date = date('Ymd-Hi');

$filename = $date . "-" . $_FILES['image']['name'];
$uploadFilePath = $_SERVER['DOCUMENT_ROOT'] . IMAGE_UPLOAD_PATH . $filename;

move_uploaded_file($_FILES['image']['tmp_name'], $uploadFilePath);

$connection = get_database_connection();

$statement = $connection->prepare(
    'INSERT INTO `products` (`name`, `image`, `price`) VALUES (:name, :image, :price)'
);

$statement->execute([
    'name' => $name,
    'image' => $filename,
    'price' => $price
]);

set_alert('success', 'Товар успішно доданий!');
header('Location: '.$_SERVER['HTTP_REFERER']);
exit();
