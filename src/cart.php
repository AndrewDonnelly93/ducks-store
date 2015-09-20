<?php
$productsInCart = $_COOKIE['products'];
?>
<table>
    <tr>
        <th>Название товара</th>
        <th>Количество</th>
        <th>Стоимость</th>
    </tr>

<?php
foreach ($productsInCart as $product => $value) {
    $product = \App\DB\Products::get($id,$connection);
    $totalPrice = $product['price'] * $value;
    echo "<tr>";
        echo "<td>{$product['title']}</td>";
    echo "<td>{$value}</td>";
    echo "<td>{$totalPrice}</td>";
    echo "</tr>";
}
?>