<?php
include_once __DIR__ . '/templates/_header.php';
include_once __DIR__ . '/templates/_top_menu.php';
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
                <p>Список заказов</p>
            </div>
            <div class="row orders clearfix">
<p>Чтобы увидеть информацию по заказу, щелкните по ID или времени создания</p>
<?php
    $orders = \App\DB\Orders::getIdAndDate($connection);
    include_once '/templates/_order-list-pagination.php';
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