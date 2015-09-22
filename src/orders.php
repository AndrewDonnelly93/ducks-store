<?php
include_once __DIR__ . '/templates/_header.php';
include_once __DIR__ . '/templates/_top_menu.php';
?>

<script>
    $(function()  {
        if ($(".product").length) {
            $(".product").each(function() {
                var price = $(this).find("td:nth-child(2)").data('price');
                var amount = $(this).find("td:nth-child(3)").data('amount');
                var data = price*amount;
                $(this).find("td:nth-child(2)").html(data);
            });
        }
    });
</script>

<section>
<div class="container">
	<div class="row clearfix">
	    <!-- боковое меню -->
        <?php include_once 'templates/_menu.php'; ?>
    <div class="column column9">
        <div class="catalog">
            <!-- хлебные крошки -->
            <div class="breadcrumbs">
                <a href="../index.html">Магазин</a>
                <p>Мои заказы</p>
            </div>
            <div class="row clearfix">

<?php
if (isset($_SESSION['user_id'])) {
    include_once __DIR__ . '/print_orders.php';
    $orders = \App\DB\Orders::getByCustomer($_SESSION['user_id'],$connection);
    $ordersProducts = [];
    printOrders($orders,$connection);
} else {
    echo "Авторизуйтесь, чтобы увидеть список заказов";
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