<?php
namespace App\DB;
use App\DB\Connection;
use \Respect\Validation\Validator as v;
class Users {
    public static function checkUsernameExists(Connection $connection,$username) {
        $stmt = $connection->prepare('SELECT * FROM `users`
        WHERE `user_name` = :user_name');
        $stmt->execute([
           ':user_name' => $username
        ]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (v::arr()->notEmpty()->validate($result)) {
            return true;
        } else {
            return false;
        }
    }
    public static function getIdIfExists(Connection $connection,$username,$password) {
        $id = 0;
        $stmt = $connection->prepare('SELECT * FROM `users`
        WHERE `user_name` = :user_name');
        $stmt->execute([
            ':user_name' => $username
        ]);
        $user_info = $stmt->fetch(\PDO::FETCH_ASSOC);
        if (password_verify($password,$user_info['hash_password'])) {
            $id = $user_info['user_id'];
        }
        return $id;
    }
}