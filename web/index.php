<?php
$src_path = __DIR__ . '/../src/';
include_once $src_path . 'utilities/url.php';
include_once $src_path . 'autoload.php';
$connection = new \App\DB\Connection('root', '');
$categories = $connection->getCategories();
//var_dump($categories);
$view = get_page();
var_dump($view);

if (isset($_GET['view'])) {
    $view = $_GET['view'];
} else {
    $view = 'main';
}

switch ($view) {
    case 'main':
        include_once $src_path.'main.php';
        break;
    case 'catalog':
        include $src_path.'catalog.php';
        break;
    case 'single-item':
        include $src_path.'single-item.php';
        break;
    case 'add-item':
        include $src_path . 'add-item.php';
        break;
    case 'edit-item':
        include $src_path . 'edit-item.php';
        break;
    default:
        echo "<h1>Oooops. 404</h1>";
        break;
}

