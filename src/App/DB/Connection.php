<?php
namespace App\DB;
class Connection {
    private $connection;
    public function __construct($username,$password) {
        try {
            $this->connection = new \PDO(
                'mysql:host=localhost;dbname=duck_store;charset=utf8',
                $username,
                $password
            );

        } catch (\Exception $e) {
            die($e->getMessage());
        }
    }
    public function prepare($sql) {
        return $this->connection->prepare($sql);
    }
}