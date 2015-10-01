<?php
namespace App\DB;
use App\DB\Connection;
class Images
{
    public static function getAll(Connection $connection)
    {
        $statement = $connection->prepare('SELECT `id`,`photo` FROM `images`');
        $statement->execute();
        $images = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $images;
    }

    public static function get($id,Connection $connection)
    {
        $statement = $connection->prepare('SELECT * FROM `images` WHERE `id` = :id');
        $statement->execute([":id" => $id]);
        $images = $statement->fetch(\PDO::FETCH_ASSOC);
        return $images;
    }

    public static function getCurrentId(Connection $connection) {
        $get_id_stmt =
            $connection->prepare('SELECT `id` FROM `images` WHERE `id` = (SELECT MAX(`id`) FROM `images`)');
        $get_id_stmt->execute();
        $get_id = $get_id_stmt->fetch(\PDO::FETCH_ASSOC);
        return $get_id['id'];
    }

    public function __construct(Connection $connection,$uploadfile) {
        $now = new \DateTime();
        $date = $now->format("Y-m-d H:i:s");
        $uploadImageTable = $connection->prepare('INSERT INTO `images`'.
            '(`photo`,`created_at`)'.
            ' VALUES (:photo, :created_at)');
        $uploadImageTable->execute([
            ':photo' => $uploadfile,
            ':created_at' => $date
        ]);
    }

}