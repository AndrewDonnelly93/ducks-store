<?php
if (isset($_GET['item']) && is_numeric($_GET['item'])) {
    $item = $_GET['item'];
    $product = \App\DB\Products::get($item,$connection);
    $maxAmount = 99;
    if ($product) {
        if ( isset($_COOKIE['products'][$product['id']]) && (empty($_POST['amount']))) {
            // Установлены куки, POST пуст
            $value = $_COOKIE['products'][$product['id']] + 1;
        } elseif ( isset($_COOKIE['products'][$product['id']]) && (!empty($_POST['amount']))) {
            // Установлены куки, POST получен
            $value = $_COOKIE['products'][$product['id']] + $_POST['amount'];

        } elseif ( (!isset($_COOKIE['products'][$product['id']]) && (!empty($_POST['amount']))) ) {
            // Не установлены куки, POST получен
                $value = $_POST['amount'];
        } else {
            //Не установлены куки, POST не получен
            $value = 1;
        }
        if ($value > $maxAmount) {
            $value = $maxAmount;
        }
        setcookie("products[{$product['id']}]",$value,time() + 3*24*60*60,"/");
    } else {
        echo "Такой утки не найдено";
    }
} else {
    echo "Такой утки не найдено";
}
ob_start();
if(isset($_SERVER['HTTP_REFERER'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    header('Location: / ');
}
ob_end_flush();
die();