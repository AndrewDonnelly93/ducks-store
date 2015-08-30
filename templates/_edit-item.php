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
$item_info = [$id,$item_name,$item_description,$item_price,$uploadfile];
$data_file = "./data/products.csv";
if (($handler = fopen($data_file,"r")) === false) {
    echo "Error while opening file";
} else {
    $dataArray = file($data_file);
    fclose($handler);
    $handler = fopen($data_file,"w+");
    $dataArray[$id] = implode($item_info,";");
    $dataArray[$id] .= "\n";
    foreach ($dataArray as $product) {
        fwrite($handler,$product,1000);
    }
    fclose($handler);
    echo "Товар изменен";
}
