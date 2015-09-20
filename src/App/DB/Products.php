<?php
namespace App\DB;
use App\DB\Connection;
class Products {
    public static function getAll(Connection $connection) {
        $statement = $connection->prepare('SELECT p.id, p.title, p.description, p.price, i.photo
 FROM `products` p INNER JOIN `images` i ON p.image_id = i.id GROUP BY p.id');
        $statement->execute();
        $products = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $products;
    }
    public static function getByCategory($categoryId,Connection $connection) {
        $statement = $connection->prepare('SELECT p.id, p.title, p.description, p.price, i.photo
 FROM `products` p INNER JOIN `images` i ON p.image_id = i.id WHERE p.category_id = :id GROUP BY p.id');
        $statement->execute(['id' => $categoryId]);
        $products = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $products;
    }
    public static function get($id, Connection $connection) {
        $statement = $connection->prepare('SELECT p.id, p.title, p.description, p.price, i.photo
 FROM `products` p INNER JOIN `images` i ON p.image_id = i.id WHERE p.id = :id');
        $statement->execute([':id' => $id]);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
}