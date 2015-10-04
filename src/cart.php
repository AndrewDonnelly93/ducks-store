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
    if (isset($_COOKIE['products']) && !empty($_COOKIE['products']) && empty($_POST)) {
        echo "<form method='post' action='' class='create-order-form'>";
        echo "<table class=product-table><thead><tr><th>Название товара</th>
        <th>Количество</th>
        <th>Цена - 1 ед.</th>
        <th>Цена - общая</th><th><span class='delete-item'>x</span></th></tr></thead><tbody>";
        $productsInCart = $_COOKIE['products'];
        $orderCost = 0;
        foreach ($productsInCart as $id => $value) {
            $productsArray[] = $id;
            $product = \App\DB\Products::get($id, $connection);
            $totalPrice = $product['price'] * $value;
            $orderCost += $totalPrice;
            $price = str_replace(".00",'',$product['price']);
            echo "<tr>";
            echo "<td>{$product['title']}</td>";
            echo "<td><div class=decrement><span>-</span></div><!--
                    --><input type=text value='$value' name='amount[]' class='amount cart'><!--
                    --><div class=increment><span>+</span></div></td>";
            echo "<td class='single-price'>{$price}</td>";
            echo "<td class='total-price'>{$totalPrice}</td>";
            echo "<td><a class='delete' href=".\App\Utilities\Options::URL."../del-item-from-cart/?id=".$product['id'].">x</a></td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<div class=order-cost> Общая стоимость заказа: <span>$orderCost</span> рублей</div>";
        echo "<input type=submit class=create-order value='Оформить заказ'>";
        echo "<a href=".\App\Utilities\Options::URL."../delete_cart class='delete delete-cart'>Очистить корзину</a>";
        echo "</form>";
    } elseif (isset($_COOKIE['products']) && !empty($_COOKIE['products']) && !empty($_POST)) {
        // Переписывание Cookie в соответствии с новыми данными
        // Перенаправление на страницу с созданием заказа
        $firstCookie = $_COOKIE['products'];
        $productsId = [];
        foreach ($_COOKIE['products'] as $id => $amount) {
            $productsId[] = $id;
        }
        $productsArray = [];
        $values = $_POST['amount'];
        foreach ($values as $id => $value) {
            $id = $productsId[$id];
            $productsArray[$id] = $value;
        }
        foreach ($productsArray as $id => $amount) {
            setcookie("products[{$id}]",$amount,time() + 3*24*60*60,"/");
        }
        header('Location: /create_order');
    } elseif (!isset($_COOKIE['products']) || empty($_COOKIE['products'])) {
        echo "Ваша корзина пуста";
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