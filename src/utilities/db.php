<?php
$username = 'root';
$password = '';
try {
    $connection = new PDO(
        'mysql:host=localhost;dbname=duck_store;charset=utf8',
        $username,
        $password
    );
    function get_categories($connection) {
        $cat_stmt = $connection->prepare("SELECT * FROM `categories`");
        $cat_stmt->execute();
        return $cat_stmt->fetchAll(PDO::FETCH_ASSOC);
    }

} catch (Exception $e) {
    die($e->getMessage());
}