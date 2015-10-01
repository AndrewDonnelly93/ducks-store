<?php
$src_path = __DIR__."/../src/";
include_once $src_path.'utilities/db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 'error';
}

function deleteProduct($connection,$id) {
    $delete = $connection->prepare('DELETE FROM `products` WHERE `id` = '.$id);
    if ($result = $delete->execute()) {
        echo "Товар удален";
    } else {
        echo "Что-то пошло не так";
    }
}

if (!is_numeric($id)) {
    echo "Введите ID в корректном формате";
    echo "<a href=admin.php class=btn>В каталог</a>";
} else {
    $isProdExists = $connection->prepare('SELECT `id` FROM `products` WHERE `id` = '.$id);
    if ($isProdExists->execute()) {
        deleteProduct($connection,$id);
        echo "<a href=admin.php class=btn>В каталог</a>";
    } else {
        echo "Такого товара нет в базе данных";
        echo "<a href=admin.php class=btn>В каталог</a>";
    }
}
