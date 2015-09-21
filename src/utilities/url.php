<?php
function get_page() {
    $request_uri = $_SERVER['REQUEST_URI'];
    $script_name = $_SERVER['SCRIPT_NAME'];
    $page = str_replace($script_name, '', $request_uri);
    $page = substr_replace($page, '', strpos($page, '?'));
    $page = trim($page, '/');
    if (!$page) {
        $page = 'main';
    }
    return $page;
}