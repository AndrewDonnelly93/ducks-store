<table>
    <tr>
        <th>Название товара</th>
        <th>Количество</th>
        <th>Стоимость</th>
    </tr>
    <?php
    if (isset($_COOKIE['products']) && !empty($_COOKIE['products'])) {
        $productsInCart = $_COOKIE['products'];
        foreach ($productsInCart as $id => $value) {
            $product = \App\DB\Products::get($id, $connection);
            $totalPrice = $product['price'] * $value;

            echo "<tr>";
            echo "<td>{$product['title']}</td>";
            echo "<td>{$value}</td>";
            echo "<td>{$totalPrice}</td>";
            echo "</tr>";
        }
    } else {
        echo "Ваша корзина пуста";
    }
    ?>
</table>
<?php
if (empty($_POST) && isset($_COOKIE['products']) && !empty($_COOKIE['products'])) {
    echo "<form action='' method='post'>";
    echo "<button type='submit' name='create'>Сформировать заказ</button>";
    echo "</form>";
}
if (!empty($_POST) && isset($_COOKIE['products']) && !empty($_COOKIE['products'])) {
    $order = new \App\DB\OrdersProducts($connection);
    foreach ($_COOKIE['products'] as $id => $value) {
        setcookie("products[{$id}]", "", time() - 3600, "/");
    }
    echo "Заказ оформлен<br>";
}
?>
<a href="/">На главную</a>