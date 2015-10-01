<?php
namespace App\DB;
use App\DB\Connection;
class Orders {

    protected $cost;

    public function __construct(Connection $connection,$name,$address,$email,$addition = null)
    {
        $now = new \DateTime();
        $stmt = $connection->prepare('INSERT INTO `orders`
            (`customer_name`,`address`,`email`,`addition`,`order_date`)
            VALUES (:customer_name, :address, :email, :addition, :order_date)');
        $result = $stmt->execute([
            ":customer_name" => $name,
            ":address" => $address,
            ":email" => $email,
            ":addition" => $addition,
            ":order_date" => $now->format("Y-m-d H:i:s")
        ]);
    }

    public function setPrice(Connection $connection, $cost, $order_id)
    {
        $this->cost = $cost;
        $setPrice_stmt = $connection->prepare('UPDATE `orders` SET `cost` = :cost
            WHERE `order_id` = :order_id');
        $setPrice_stmt->execute([
            ":cost" => $this->cost,
            ":order_id" => $order_id
        ]);
    }

    public function getCurrentId(Connection $connection) {
        $order_id_stmt =
            $connection->prepare('SELECT `order_id` FROM `orders` WHERE `order_id` = (SELECT MAX(`order_id`) FROM `orders`)');
        $order_id_stmt->execute();
        $order_id = $order_id_stmt->fetch(\PDO::FETCH_ASSOC);
        return $order_id['order_id'];
    }
/*
    public static function getByCustomer($customer_id, Connection $connection) {
        $statement = $connection->prepare('SELECT *
 FROM `orders` WHERE `customer_id` = :customer_id');
        $statement->execute([':customer_id' => $customer_id]);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
*/
}
