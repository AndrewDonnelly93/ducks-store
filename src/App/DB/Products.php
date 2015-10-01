<?php
namespace App\DB;
use App\DB\Connection;
class Products {
    public static function getAll(Connection $connection) {
        $statement = $connection->prepare('SELECT p.id, p.title, p.description, p.price, p.category_id, p.updated_at, i.photo
 FROM `products` p INNER JOIN `images` i ON p.image_id = i.id GROUP BY p.id');
        $statement->execute();
        $products = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $products;
    }
    public static function getByCategory($categoryId,Connection $connection) {
        $statement = $connection->prepare('SELECT p.id, p.title, p.description, p.price, p.category_id, p.updated_at, i.photo
 FROM `products` p INNER JOIN `images` i ON p.image_id = i.id WHERE p.category_id = :id GROUP BY p.id');
        $statement->execute(['id' => $categoryId]);
        $products = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $products;
    }
    public static function get($id, Connection $connection) {
        $statement = $connection->prepare('SELECT p.id, p.title, p.description, p.price, p.category_id, p.updated_at, i.photo
 FROM `products` p INNER JOIN `images` i ON p.image_id = i.id WHERE p.id = :id');
        $statement->execute([':id' => $id]);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
    public static function getLastCreated(Connection $connection) {
        $statement = $connection->prepare('SELECT p.id, p.title, p.description, p.price, p.category_id, p.updated_at, i.photo
 FROM `products` p INNER JOIN `images` i ON p.image_id = i.id GROUP BY p.id ORDER BY p.created_at DESC LIMIT 6');
        $statement->execute();
        $products = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $products;
    }
    public static function updateProduct(Connection $connection,$id,$title,$description,$price,$category_id) {
        echo "Подождите, данные о товаре обновляются";
        $now = new \DateTime();
        $date = $now->format("Y-m-d H:i:s");
        try {
            $stmt = $connection->prepare(
                'UPDATE `products`
                SET `title` = :title,
                `description` = :description,
                `price` = :price,
                `category_id` = :category,
                `updated_at` = :updated_at
                WHERE `id` = :id'
            );
            $result = $stmt->execute([
                'title' => $title,
                'description' => $description,
                'price' => $price,
                'category' => $category_id,
                'updated_at' => $date,
                'id' => $id
            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $result;
    }

    public function __construct(Connection $connection,$title,$description,$price,$category_id) {
        echo "Товар создан, перенаправление на страницу редактирования";
        $now = new \DateTime();
        $date = $now->format("Y-m-d H:i:s");
        try {
            $stmt = $connection->prepare(
                'INSERT INTO `products`'.
                 '(`title`,`description`,`price`,`category_id`,`created_at`,`image_id`)'.
                 'VALUES (:title,:description,:price,:category,:created_at,:image_id)'
            );
            $result = $stmt->execute([
                ':title' => $title,
                ':description' => $description,
                ':price' => $price,
                ':category' => $category_id,
                ':created_at' => $date,
                ':image_id' => 1
            ]);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        return $result;
    }

    public static function deleteProduct($id, Connection $connection) {
        echo "Товар удаляется<br>";
        $stmt = $connection->prepare('DELETE FROM `products` WHERE `id` = :id');
        $result = $stmt->execute([':id' => $id]);
        return $result;
    }

    public static function getCurrentId(Connection $connection) {
        $get_id_stmt =
            $connection->prepare('SELECT `id` FROM `products` WHERE `id` = (SELECT MAX(`id`) FROM `products`)');
        $get_id_stmt->execute();
        $get_id = $get_id_stmt->fetch(\PDO::FETCH_ASSOC);
        return $get_id['id'];
    }

    public static function setPhoto(Connection $connection,$image_id,$product_id) {
        $uploadProducts = $connection->prepare(
            'UPDATE `products` SET `image_id` = :image_id WHERE `id` ='.$product_id
        );
        $result = $uploadProducts->execute([
           ":image_id" => $image_id
        ]);
        return $result;
    }

    public static function deleteCategoryId($category_id,Connection $connection) {
        $deleteCategoryId = $connection->prepare('UPDATE `products` SET `category_id` = null WHERE `category_id` = :category_id');
        $result = $deleteCategoryId->execute([":category_id" => $category_id]);
        return $result;
    }
}