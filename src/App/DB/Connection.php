<?php
namespace App\DB;
class Connection {
    public $connection;
    public function __construct($username,$password) {
        try {
            $this->connection = new \PDO(
                'mysql:host=localhost;dbname=duck_store;charset=utf8',
                $username,
                $password
            );

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function getCategories() {
        $cat_stmt = $this->connection->prepare("SELECT * FROM `categories`");
        $cat_stmt->execute();
        return $cat_stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}