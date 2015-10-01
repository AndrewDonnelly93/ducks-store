<?php
include_once __DIR__ . '/templates/_header.php';
include_once __DIR__ . '/templates/_top_menu.php';
?>
<section>
    <div class="container">
        <div class="row clearfix">
            <!-- боковое меню -->
            <?php include_once 'templates/_menu.php'; ?>
            <div class="column column9">
                <div class="catalog">
                    <!-- хлебные крошки -->
                    <div class="breadcrumbs">
                        <a href="/">Магазин</a>
                        <p>Моя корзина</p>
                    </div>
                    <div class="row clearfix">
<?php
    if (isset($_COOKIE['products']) && !empty($_COOKIE['products'])) {
        echo "<table class=product-table><tr><th>Название товара</th>
        <th>Количество</th>
        <th>Стоимость (1 товар)</th>
        <th>Стоимость (общая)</th></tr>";
        $productsInCart = $_COOKIE['products'];
        $orderCost = 0;
        foreach ($productsInCart as $id => $value) {
            $product = \App\DB\Products::get($id, $connection);
            $totalPrice = $product['price'] * $value;
            $orderCost += $totalPrice;
            echo "<tr>";
            echo "<td>{$product['title']}</td>";
            echo "<td>{$value}</td>";
            echo "<td>{$product['price']}</td>";
            echo "<td>{$totalPrice}</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<div class=order-cost> Общая стоимость заказа: <span>$orderCost</span> рублей</div>";
    } else {
        echo "Ваша корзина пуста";
    }

if (isset($_COOKIE['products']) && !empty($_COOKIE['products'])) {
    echo "<a href=".\App\Utilities\Options::URL."../create_order class=create-order>Сформировать заказ</a>";
}
?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once __DIR__ . '/templates/_footer.php';
?>