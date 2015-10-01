<?php
$flag = false;
$images = \App\DB\Images::getAll($connection);
$uploadfile = '../data/uploads/' . basename($_FILES['userfile']['name']);
foreach ($images as $image) {
    if ($image['photo'] === $uploadfile) {
        // Если нашли в таблице изображений такой файл, обновляем таблицу с продуктами
        $flag = true;
        $uploadProducts = \App\DB\Products::setPhoto($connection,$image['id'],$id);
        break;
    }
}
if (!$flag) {
    // Если не нашли, обновляем две таблицы - заносим новый файл к изображениям и информацию об его ID в продукты
    $image = new \App\DB\Images($connection,$uploadfile);
    $image_id = \App\DB\Images::getCurrentId($connection);
    $uploadProducts = \App\DB\Products::setPhoto($connection,$image_id,$id);
}