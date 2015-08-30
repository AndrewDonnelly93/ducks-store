<?php

if (isset($_GET['view'])) {
    $view = $_GET['view'];
} else {
    $view = 'main';
}

switch ($view) {
    case 'main':
        include_once 'main.php';
        break;
    case 'catalog':
        include 'catalog.php';
        break;
    case 'single-item':
        include 'single-item.php';
        break;
    case 'add-item':
        include 'add-item.php';
        break;
    case 'edit-item':
        include 'edit-item.php';
        break;
    default:
        echo "<h1>Oooops. 404</h1>";
        break;
}

