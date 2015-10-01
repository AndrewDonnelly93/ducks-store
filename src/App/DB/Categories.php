<?php
namespace App\DB;
use App\DB\Connection;
class Categories {
    public static function getAll(Connection $connection) {
        $cat_stmt = $connection->prepare("SELECT * FROM `categories`");
        $cat_stmt->execute();
        return $cat_stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    public static function get($id, Connection $connection) {
        $stmt = $connection->prepare("SELECT * FROM `categories` WHERE `categories`.`id` = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public static function update($id, $title, Connection $connection) {
        echo "<p>Название категории обновляется</p>";
        $now = new \DateTime();
        $date = $now->format("Y-m-d H:i:s");
        $stmt = $connection->prepare(
            'UPDATE `categories`
            SET `title` = :title,
            `updated_at` = :updated_at
            WHERE `id` = :id'
        );
        $result = $stmt->execute([
           ":title" => $title,
            ":updated_at" => $date,
            ":id" => $id
        ]);
    }

    public function __construct($title, Connection $connection) {
        echo "<p>Категория создается</p>";
        $now = new \DateTime();
        $date = $now->format("Y-m-d H:i:s");
        $stmt = $connection->prepare(
            'INSERT INTO `categories`
             (`title`, `created_at`)
              VALUES(:title,:created_at)'
        );
        $result = $stmt->execute([
            ":title" => $title,
            ":created_at" => $date
        ]);
    }

    public static function deleteCategory($id, Connection $connection) {
        echo "Категория удаляется<br>";
        $stmt = $connection->prepare('DELETE FROM `categories` WHERE `id` = :id');
        $result = $stmt->execute([':id' => $id]);
        return $result;
    }
}