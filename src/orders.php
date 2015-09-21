<table>
    <tr>
        <th>Название товара</th>
        <th>Количество</th>
        <th>Стоимость</th>
    </tr>

<?php
if (isset($_SESSION['user_id'])) {
    $orders = \App\DB\Orders::getByCustomer($_SESSION['user_id'],$connection);
    var_dump($orders);
    foreach ($orders as $order => $orders_data) {
        foreach ($orders_data as $order_data => $value) {
            $order = \App\DB\OrdersProducts::getProductsInOrder($connection,$value);
            var_dump($order);
        }
    }
//    $products_id = ;

} else {
    echo "Авторизуйтесь, чтобы увидеть список заказов";
}
