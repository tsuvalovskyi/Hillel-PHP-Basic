<?php

require_once __DIR__ . '/database.php';

$connection = database_connect();

//CREATE

$statement = $connection->prepare(
    'INSERT INTO `posts` (`user`, `title`, `content`, `image`, `created`) 
VALUES (:user, :title, :content, :image, :created)'
);

$statement->execute([
    'user' => 23,
    'title' => 'Test post',
    'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
    'image' => '/storage/images/posts/05072022-2231-465464646.jpg',
    'created' => '2022-07-05 22:45:45'
]);

//READ

$statement = $connection->prepare(
    'SELECT * FROM `posts` WHERE `user` = :user'
);

$statement->execute([
    'user' => 23,
]);

$userPosts = $statement->fetchAll();


//UPDATE

$statement = $connection->prepare(
    'UPDATE `posts` SET `image` = :image WHERE id = :id'
);
$statement->execute([
    'image' => '/storage/images/posts/05072022-2231-465464646NEW.jpg',
    'id' => 3
]);

//DELETE

$statement = $connection->prepare(
    'DELETE FROM `posts` WHERE `id` = :id'
);
$statement->execute([
    'id' => 2
]);