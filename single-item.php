<?php
include_once __DIR__ . '/templates/_header.php';
include_once __DIR__ . '/templates/_top_menu.php';
include_once __DIR__ . '/templates/_form_shop_items.php';

$flag = (isset($_GET["id"])&&($_GET["id"] < count($products))&&(is_numeric($_GET["id"])));
if ($flag) {
    $i = $_GET["id"];
}
?>
<section>
<section>
<div class="container">
	<div class="row clearfix">
	    <!-- боковое меню -->
        <?php include_once 'templates/_menu.php'; ?>
		<div class="catalog column column9">
			<div class="order-status ">
				<div class="row clearfix">
					<p>Мини-утка брелок добавлена в корзину</p>
					<a href="" class="order-status-btn-basket">В Корзину</a>
				</div>
			</div>
			<!-- хлебные крошки -->
			<div class="breadcrumbs item-breadcrumbs">
				<a href="index.html">Магазин</a>
				<a href="catalog.html">Мини - утки</a>
			</div>
			<?php
                if ($flag) {
                    include_once __DIR__."/templates/_item-page.php";
                } else {
                    echo "<br>There are no item with this ID";
                }
            ?>
		</div>
	</div>
</div>
</section>
<footer>
	<div class="container">
		<p> © Epic Skills</p>
	</div>
</footer>
