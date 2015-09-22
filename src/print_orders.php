<?php
function OrderTable($ordersProducts = array(),$connection){
    foreach ($ordersProducts as $arrayNumber => $orders_data) {
        echo "<tr class='product'>";
        foreach ($orders_data as $data_key => $data_value) {
            switch ($data_key) {
                case "product_id":
                    $product = \App\DB\Products::get($data_value, $connection);
                    printProduct($product);
                    break;
                case "amount":
                    echo "<td data-amount='$data_value'>$data_value</td></tr>";
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

function printOrders($orders,$connection) {
    echo "<table>";
    foreach ($orders as $order => $orders_data) {
        echo "<tr>";
        foreach ($orders_data as $order_data => $value) {
            switch ($order_data) {
                case 'order_id':
                    echo "<td><span>Заказ № </span> $value</td>";
                    $ordersProducts[] = \App\DB\OrdersProducts::getProductsInOrder($connection,$value);
                    echo "<tr class='product-data'><td>Название</td><td>Стоимость</td><td>Количество</td></tr>";
                    OrderTable(end($ordersProducts),$connection);
                    break;
                case 'cost':
                    echo "<td><span>Общая стоимость: </span>$value</td>";
                    break;
                case 'order_date':
                    echo "<td><span>Дата заказа: </span> $value</td>";
                    break;
            }
        }
    }
    echo "</table>";
}
