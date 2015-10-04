<?php
if (isset($_COOKIE['products'])) {
    foreach ($_COOKIE['products'] as $id => $value) {
        setcookie("products[{$id}]", "", time() - 3600, "/");
    }
    header('Location: /cart');
}