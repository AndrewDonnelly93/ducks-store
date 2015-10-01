<?php
use \Respect\Validation\Validator as v;
function OrderTable($ordersProducts,$connection){
    foreach ($ordersProducts as $arrayNumber => $orders_data) {
        echo "<tr class='product'>";
        foreach ($orders_data as $data_key => $data_value) {
            //echo "data-key: ".$data_key." data-value: ".$data_value."<br>";
            switch ($data_key) {
                case "product_id":
                    $product = \App\DB\Products::get($data_value, $connection);
                    $flag = v::arr()->notEmpty()->validate($product);
                    if ($flag) {
                        printProduct($product);
                    } else {
                        echo "<td class='deleted-product' colspan='2'>Товар удален из базы данных</td>";
                    }
                    break;
                case "amount":
                    echo "<td data-amount='$data_value'>".$data_value."</td></tr>";
                    break;
                default:
                    break;
            }
        }
    }
}

function printProduct($product) {
    foreach ($product as $field_name => $field_value) {
        switch ($field_name) {
            case "title":
                echo "<td>$field_value</td>";
                break;
            case "price":
                echo "<td data-price='$field_value'></td>";
                break;
            default:
                break;
        }
    }
}

function printOrder($order,$connection) {
    echo "<table class='order-info'>";
        foreach ($order as $order_data => $value) {
            switch ($order_data) {
                case 'cost':
                    echo "<td><span>Общая стоимость: </span>$value</td>";
                    break;
                case 'order_date':
                    echo "<td><span>Дата заказа: </span> $value</td>";
                    break;
                default:
                    break;
            }
        }
    echo "</table>";
}
