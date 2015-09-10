<?php
$item_name = $_POST["item-name"];
$item_description = $_POST["item-description"];
$item_price = $_POST["item-price"];
$userfile = $_FILES['userfile']['name'];
$uploaddir = 'data/uploads/';
$uploadfile = $uploaddir.basename($userfile);

if (!(move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))) {
    $uploadfile = $uploaddir."item.jpeg";
}
$data_file = "./data/products.csv";
if (($handler = fopen($data_file,"a+")) === false) {
    echo "Error while opening file";
} else {
    $stringCount = sizeof(file($data_file));
    $item_info = [$stringCount,$item_name,$item_description,$item_price,$uploadfile];
    fputcsv($handler,$item_info,";");
    fclose($handler);
    echo "Товар добавлен в каталог";
}

