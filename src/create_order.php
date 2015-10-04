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
                <p>Оформление заказа</p>
            </div>
            <div class="row clearfix">
                <?php
                ob_start();
use Respect\Validation\Validator as v;
error_reporting(E_ALL & ~E_WARNING);
function orderCost($connection) {
    $orderCost = 0;
    $productsInCart = $_COOKIE['products'];
    foreach ($productsInCart as $id => $value) {
        $product = \App\DB\Products::get($id, $connection);
        $totalPrice = $product['price'] * $value;
        $orderCost += $totalPrice;
    }
    return $orderCost;
}
if (empty($_POST) && isset($_COOKIE['products']) && !empty($_COOKIE['products'])) {
    $orderCost = orderCost($connection);
    echo "<div class=order-cost> Общая стоимость заказа: <span>$orderCost</span> рублей</div>";
    include_once "templates/_create-order-form.php";
} elseif (empty($_COOKIE['products'])) {
    echo "Ваша корзина пуста";
}

if (!empty($_POST) && isset($_COOKIE['products']) && !empty($_COOKIE['products'])) {
    include_once "order_data-validate.php";
    // Data sanitising and validation
    $errors = [];
    $name = nameValidate($errors,$_POST['name']);
    $address = addressValidate($errors,$_POST['address']);
    $email = emailValidate($errors,$_POST['email']);
    $addition = "";
    if (v::string()->notEmpty()->validate(filter_var(trim($_POST['addition']),FILTER_SANITIZE_STRING))) {
        $addition = filter_var(trim($_POST['addition']),FILTER_SANITIZE_STRING);
    }
    if (!v::arr()->notEmpty()->validate($errors)) {
        // No errors after form validation
        $order = new \App\DB\OrdersProducts($connection,$name,$address,$email,$addition);
        foreach ($_COOKIE['products'] as $id => $value) {
            setcookie("products[{$id}]", "", time() - 3600, "/");
        }
        echo "<p class='order-created'>Поздравляем! Заказ оформлен</p>";
        echo "<a href=".\App\Utilities\Options::URL."../catalog class='adm-btn order'>В каталог</a>";
        header('Refresh:0 url=/');
    } else {
        echo "<div class=order-cost> Общая стоимость заказа: <span>$orderCost</span> рублей</div>";
        include_once "templates/_create-order-form.php";
        include_once "templates/_form-errors.php";
    }
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