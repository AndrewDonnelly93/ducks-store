<?php
if (isset($_GET['item']) && is_numeric($_GET['item'])) {
    $item = $_GET['item'];
    $product = \App\DB\Products::get($item,$connection);
    if ($product) {
        if (isset($_COOKIE['products'][$product['id']])) {
            $value = $_COOKIE['products'][$product['id']] + 1;
        } else {
            $value = 1;
        }
        setcookie("products[{$product['id']}],1",$value,time() + 3*24*60*60,"/");
        var_dump($_COOKIE);
    }
    var_dump($product);
}
header("Location: ".\App\Utilities\Options::URL);
/*if (isset($_GET['item']) && is_numeric($_GET['item'])) {
    $item = $_GET['item'];
    $product = \App\DB\Products::get($item, $connection);
    if ($product) {
        if (isset($_COOKIE['products'][$product['id']])) {
            $value = $_COOKIE['products'][$product['id']] + 1;
        } else {
            $value = 1;
        }
        var_dump($value);
        setcookie("products[{$product['id']}]", $value, time() + 3*24*60*60, "/");
}
    }
header("Location: " . \App\Utilities\Options::URL);*/