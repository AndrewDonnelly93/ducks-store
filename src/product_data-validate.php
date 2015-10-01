<?php
use Respect\Validation\Validator as v;

function titleValidate(&$errors,$title) {
    $titleBlankError = "Вы не заполнили название товара";
    $titleNotValid = "Укажите правильное название товара";
    if ($title != "") {
        $title = filter_var(trim(strip_tags($title)),FILTER_SANITIZE_STRING);
        if (!v::string()->notEmpty()->validate($title)) {
            $errors[] = $titleNotValid;
        };
    } else {
        $errors[] = $titleBlankError;
    }
    return $title;
}

function descriptionValidate(&$errors,$description) {
    $descriptionBlankError = "Вы не заполнили описание товара";
    $descriptionNotValid = "Укажите правильное описание товара";
    if ($description != "") {
        $description = filter_var(trim(strip_tags($description)),FILTER_SANITIZE_STRING);
        if (!v::string()->notEmpty()->validate($description)) {
            $errors[] = $descriptionNotValid;
        };
    } else {
        $errors[] = $descriptionBlankError;
    }
    return $description;
}

function priceValidate(&$errors,$price) {
    $priceBlankError = "Вы не указали цену товара";
    $priceNotValid = "Цена товара должна быть положительным числом";
    if ($price != "") {
        $price = filter_var(trim(strip_tags($price)),FILTER_SANITIZE_NUMBER_INT);
        if (!v::string()->notEmpty()->validate($price) || !v::numeric()->validate($price)
        || ($price <= 0)) {
            $errors[] = $priceNotValid;
        };
    } else {
        $errors[] = $priceBlankError;
    }
    return $price;
}

function fileValidate(&$errors,$userfile) {
    $notValidFile = "Загружен файл неправильного расширения";
    $allowed =  array('gif','png' ,'jpg', 'jpeg');
    // Check extension
    $ext = pathinfo($userfile, PATHINFO_EXTENSION);
    if (!in_array($ext, $allowed)) {
        $errors[] = $notValidFile;
        return false;
    } else {
        $uploaddir = '../web/data/uploads/';
        $uploadfile = $uploaddir . basename($userfile);
        move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile);
        return true;
    }
}


