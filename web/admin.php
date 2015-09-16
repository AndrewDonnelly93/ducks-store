<?php
$src_path = __DIR__ . '/../src/';
include_once $src_path . 'utilities/url.php';
include_once $src_path . 'autoload.php';
$connection = new \App\DB\Connection('root', '');
$categories = $connection->getCategories();

if (isset($_GET['view'])) {
    $view = $_GET['view'];
} else {
    $view = 'catalog';
}

switch ($view) {
    case 'catalog':
        include $src_path.'catalog-admin.php';
        break;
    case 'single-item_admin':
        include $src_path.'single-item_admin.php';
        break;
    case 'single-item':
        include $src_path.'single-item.php';
        break;
    case 'edit_category':
        include 'edit_category.php';
        break;
    case 'add':
        include 'add.php';
        break;
    case 'edit':
        include 'edit.php';
        break;
    case 'delete':
        include 'delete.php';
        break;
    default:
        echo "<h1>Oooops. 404</h1>";
        break;
}