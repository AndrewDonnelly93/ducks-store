<?php
$request_uri = $_SERVER['REQUEST_URI'];
$script_name = $_SERVER['SCRIPT_NAME'];

$page = str_replace($script_name,'',$request_uri);
$page = substr_replace($page,'',strpos($page,'?'));
var_dump($page);die();