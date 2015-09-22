<?php
namespace App\DB;
use App\DB\Connection;
class OrdersProducts extends \App\DB\Orders {

    private $order_id;

    public function __construct(Connection $connection) {
        parent::__construct($connection);
        $productsInCart = $_COOKIE['products'];
        $cost = 0;
        $this->order_id = parent::getCurrentId($connection);
        foreach ($productsInCart as $id => $value) {
            $product = \App\DB\Products::get($id,$connection);
            $cost +=  $product['price'] * $value;
            $insProd = $connection->prepare('INSERT INTO `ordersproducts`
                (`order_id`, `product_id`, `amount`)
                VALUES (:order_id, :product_id, :amount)');
            $insProd->execute([
                ":order_id" => $this->order_id,
                ":product_id" => $id,
                ":amount" => $value
            ]);
        }
        parent::setPrice($connection,$cost,$this->order_id);
    }

    public static function getProductsInOrder(Connection $connection, $order_id) {
        $stmt = $connection->prepare('SELECT * FROM `ordersproducts`
            WHERE `order_id` = :order_id');
        $stmt->execute([
            ":order_id" => $order_id
        ]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}