<?php
use \Respect\Validation\Validator as v;
function catNameValidate(&$errors,$catName) {
    $catNameBlankError = "Вы не заполнили название категории";
    $catNameNotValid = "Укажите правильное название категории";
    if ($catName != "") {
        $catName = filter_var(trim(strip_tags($catName)),FILTER_SANITIZE_STRING);
        if (!v::string()->notEmpty()->validate($catName)) {
            $errors[] = $catNameNotValid;
        };
    } else {
        $errors[] = $catNameBlankError;
    }
    return $catName;
}
function ifCatExists(\App\DB\Connection $connection,$catName) {
    $catArray = \App\DB\Categories::getAll($connection);
    $flag = false;
    foreach ($catArray as $cat) {
        if ($cat['title'] == $catName) {
            $flag = true;
            break;
        }
    }
    return $flag;
}