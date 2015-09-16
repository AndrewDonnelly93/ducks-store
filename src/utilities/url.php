<?php
function get_page() {
    $request_uri = $_SERVER['REQUEST_URI'];
    $script_name = $_SERVER['SCRIPT_NAME'];
    var_dump($request_uri);
    var_dump($script_name);
    $page = str_replace($script_name, '', $request_uri);
    echo "first";
    var_dump($page);
    $page = substr_replace($page, '', strpos($page, '?'));
    echo "second";
    var_dump($page);
    echo "third";
    $page = trim($page, '/');
    var_dump($page);
    if (!$page) {
        $page = 'main';
    }
    return $page;
}