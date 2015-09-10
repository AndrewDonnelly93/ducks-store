<?php

$src_path = __DIR__."/../src/";
include_once $src_path.'utilities/db.php';
$categories = get_categories($connection);

function updatePhoto($uploadfile,$connection) {
    $stmt = $connection->prepare('SELECT `id`,`photo` FROM `images`');
    $stmt->execute();
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $get_prod_id = $connection->prepare('SELECT `id` FROM `products` WHERE `id` = (SELECT MAX(`id`) FROM `products`)');
    $get_prod_id->execute();
    $prod_id = $get_prod_id->fetch(PDO::FETCH_ASSOC);
    $prod_id = $prod_id['id'];
    $uploadImageTable = $connection->prepare('INSERT INTO `images`'.
    '(`photo`)'.
    ' VALUES (:photo)');
    $uploadProducts = $connection->prepare('UPDATE `products` SET `image_id` = :id WHERE `id` ='.$prod_id);
    $flag = false;

    foreach ($images as $image) {
        if ($image['photo'] === $uploadfile) {
            // Если нашли в таблице изображений такой файл, обновляем таблицу с продуктами
            $flag = true;
            $uploadProducts->execute([
                 'id' => $image['id']
            ]);
            break;
        }
    }
    if (!$flag) {
        // Если не нашли, обновляем две таблицы - заносим новый файл к изображениям и информацию об его ID в продукты
        $uploadImageTable->execute([
           'photo' => $uploadfile
        ]);
        $get_image_id = $connection->prepare('SELECT `id` FROM `images` WHERE `id` = (SELECT MAX(`id`) FROM `images`)');
        $get_image_id->execute();
        $image_id = $get_image_id->fetch(PDO::FETCH_ASSOC);
        $image_id = $image_id['id'];
       $uploadProducts->execute([
           'id' => $image_id
        ]);
    }
}
include_once $src_path."templates/_add-shop-item-form.php";

if (!empty($_POST)) {
    if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['category'])) {
        try {
            $stmt = $connection->prepare(
                'INSERT INTO `products` ' .
                '(`title`, `description`, `price`, `category_id`)' .
                ' VALUES (:title, :description, :price, :category)'
            );
            $result = $stmt->execute([
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'category' => $_POST['category']
            ]);
            if ($result) {
                echo "Товар добавлен";
            } else {
                echo "Ошибка. Товар не добавлен";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    } else {
        include_once $src_path . "templates/_add-shop-item-form.php";
        echo "Вы заполнили не все поля";
    }
    /* File upload */
    $userfile = $_FILES['userfile']['name'];
    $uploaddir = '../data/uploads/';
    $uploadfile = $uploaddir . basename($userfile);
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        updatePhoto($uploadfile, $connection);
    }
}