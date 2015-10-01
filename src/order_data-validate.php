<?php
use \Respect\Validation\Validator as v;
function nameValidate(&$errors,$name) {
    $nameBlankError = "Вы не заполнили поле ФИО";
    $nameNotValid = "Укажите правильное имя";
    if ($name != "") {
        $name = filter_var(trim(strip_tags($name)),FILTER_SANITIZE_STRING);
        if (!v::string()->notEmpty()->validate($name)) {
            $errors[] = $nameNotValid;
        };
    } else {
        $errors[] = $nameBlankError;
    }
    return $name;
}
function addressValidate(&$errors,$address) {
    $addressBlankError = "Вы не заполнили поле Адрес";
    $addressNotValid = "Укажите правильный адрес";
    if ($address != "") {
        $address = filter_var(trim(strip_tags($address)),FILTER_SANITIZE_STRING);
        if (!v::string()->notEmpty()->validate($address)) {
            $errors[] = $addressNotValid;
        };
    } else {
        $errors[] = $addressBlankError;
    }
    return $address;
}
function emailValidate(&$errors,$email) {
    $emailBlankError = "Вы не заполнили поле Email";
    $emailNotValid = "Укажите правильный Email";
    if ($email != "") {
        $email = filter_var(trim(strip_tags($email)), FILTER_SANITIZE_EMAIL);
        if (!v::string()->notEmpty()->validate($email) || !v::email()->validate($email)) {
            $errors[] = $emailNotValid;
        }
    } else {
        $errors[] = $emailBlankError;
    }
    return $email;
}