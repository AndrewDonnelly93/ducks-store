<?php
require_once __DIR__.'/../vendor/autoload.php';
$src_path = __DIR__ . '/../src/';
include_once $src_path . 'autoload.php';
session_start();

$connection = new \App\DB\Connection('root', '');
$urler = new \App\Utilities\Url();
$view = $urler->getPage();
$categories = \App\DB\Categories::getAll($connection);

switch ($view) {
    case 'main':
        include_once $src_path . 'main.php';
        break;
    case 'company':
        include_once $src_path . 'company.php';
        break;
    case 'contacts':
        include_once $src_path . 'contacts.php';
        break;
    case 'exit':
        if (isset($_SESSION['user_id'])) {
            include_once $src_path . 'exit.php';
        } else {
            echo "<h1>404 Not Found</h1>";
        }
        break;
    case 'edit':
        if (isset($_SESSION['user_id'])) {
            include_once $src_path . 'edit.php';
        } else {
            echo "<h1>404 Not Found</h1>";
        }
        break;
    case 'add-cat':
        if (isset($_SESSION['user_id'])) {
            include_once $src_path . 'add-cat.php';
        } else {
            echo "<h1>404 Not Found</h1>";
        }
        break;
    case 'edit-cat':
        if (isset($_SESSION['user_id'])) {
            include_once $src_path . 'edit-cat.php';
        } else {
            echo "<h1>404 Not Found</h1>";
        }
        break;
    case 'pay-del':
        include $src_path . 'payment-delivery.php';
        break;
    case 'edit-cat-all':
        if (isset($_SESSION['user_id'])) {
            include_once $src_path . 'edit-cat-all.php';
        } else {
            echo "<h1>404 Not Found</h1>";
        }
        break;
    case 'category':
        include $src_path . 'category.php';
        break;
    case 'catalog':
        include $src_path . 'catalog.php';
        break;
    case 'product':
        include $src_path . 'single-item.php';
        break;
    case 'cart/add':
        if (!isset($_SESSION['user_id'])) {
            include $src_path . 'cart_add.php';
        } else {
            echo "<h1>404 Not Found</h1>";
        }
        break;
    case 'cart':
        if (!isset($_SESSION['user_id'])) {
            include $src_path . 'cart.php';
        } else {
            echo "<h1>404 Not Found</h1>";
        }
        break;
    case 'orders':
        if (isset($_SESSION['user_id'])) {
            include $src_path . 'orders.php';
        } else {
            echo "<h1>404 Not Found</h1>";
        }
        break;
    case 'order':
        if (isset($_SESSION['user_id'])) {
            include $src_path . 'single-order.php';
        } else {
            echo "<h1>404 Not Found</h1>";
        }
        break;
    case 'create_order':
        if (!isset($_SESSION['user_id'])) {
            include $src_path . 'create_order.php';
        } else {
            echo "<h1>404 Not Found</h1>";
        }
        break;
    case 'login':
        include $src_path . 'login.php';
        break;
    case 'orders':
        include $src_path . 'orders.php';
        break;
    case 'delete':
        if (isset($_SESSION['user_id'])) {
            include $src_path . 'delete.php';
        } else {
            echo "<h1>404 Not Found</h1>";
        }
        break;
    case 'add':
        if (isset($_SESSION['user_id'])) {
            include $src_path . 'add-item.php';
        } else {
            echo "<h1>404 Not Found</h1>";
        }
        break;
    case 'delete-cat':
        if (isset($_SESSION['user_id'])) {
            include $src_path . 'delete-cat.php';
        } else {
            echo "<h1>404 Not Found</h1>";
        }
        break;
    default:
        echo "<h1>Oooops. 404</h1>";
        break;
}

