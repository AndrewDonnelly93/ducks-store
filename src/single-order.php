<?php
use \Respect\Validation\Validator as v;
include_once __DIR__ . '/templates/_header.php';
include_once __DIR__ . '/templates/_top_menu.php';
$flag = false;
if (isset($_GET['id'])&&(is_numeric($_GET['id']))) {
    $id = $_GET['id'];
    $order = \App\DB\Orders::getById($id,$connection);
    if (v::arr()->notEmpty()->validate($order)) {
        $flag = true;
    }
}
?>

<section>
    <div class="container">
        <div class="row clearfix">
            <!-- боковое меню -->
            <?php include_once '/templates/_menu.php'; ?>
            <div class="column column9">
                <div class="catalog">
                    <!-- хлебные крошки -->
                    <div class="breadcrumbs">
                        <a href="/">Магазин</a>
                        <p>Просмотр заказа</p>
                    </div>
                    <div class="row orders clearfix">
                        <?php
                            if (!$flag) {
                                echo "Такого заказа не существует";
                            } else {
                                echo "<p class=info>Контактные данные</p>";
                                echo "<table class=customer>
                                        <thead><tr>
                                            <td>ФИО</td>
                                            <td>Адрес доставки</td>
                                            <td>Email</td>
                                            <td>Примечание</td>
                                        </tr></thead>";
                                echo "<tbody><tr><td>".$order['customer_name']."</td>";
                                echo "<td>".$order['address']."</td>";
                                echo "<td>".$order['email']."</td>";
                                echo "<td>".$order['addition']."</td><tr></tbody></table>";
                                echo "<p class=info>Заказанные товары</p>";
                                include_once "print_orders.php";
                                echo "<table class=products-table>
                                        <thead><tr>
                                            <td>Название товара</td>
                                            <td>Стоимость</td>
                                            <td>Количество</td>
                                        </tr></thead>";
                                $productsInOrder = \App\DB\OrdersProducts::getProductsInOrder($connection,$order['order_id']);
                                OrderTable($productsInOrder,$connection);
                                echo "</table>";
                                printOrder($order,$connection);
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
