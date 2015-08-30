<?php

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'main';
}

switch ($page) {
    case 'main':
        include_once 'main.php';
        break;
    case 'catalog':
        include 'catalog.php';
        break;
    case 'single-item':
        include 'single-item.php';
        break;
    default:
        echo "<h1>Oooops. 404</h1>";
        break;
}

