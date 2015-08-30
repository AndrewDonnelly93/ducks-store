<?php
include_once __DIR__ . '/templates/_header.php';
include_once __DIR__ . '/templates/_top_menu.php';
include_once __DIR__ . '/templates/_form_shop_items.php';

$i = 1;
if(isset($_GET["id"])) {
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

			<div class=" row clearfix item-heading">
				<!-- название товара -->
				<h1 class="item-name column column6"><?=$products[$i][1];?></h1>
				<!-- цена -->
				<p class="price column column6"><?=$products[$i][3];?> P</p>
			</div>
			<div class="row clearfix">
				<div class="column column6">
					<!-- галерея картинок -->
					<div class="item-gallery">
						<img src="img/item.jpeg" alt="уточка">
						<div class="small-images">
							<img src="img/item.jpeg" alt="уточка">
							<img src="img/item.jpeg" alt="уточка">
							<img src="img/item.jpeg" alt="уточка">
						</div>
					</div>
				</div>
				<div class="column column6">
				<!-- описание -->
					<p class="item-description">
                        <?=$products[$i][2];?>
					</p>
					<!-- цена -->
					<p class="price"><?=$products[$i][3];?> P</p>
					<div class="order-btns">
						<a href="" class="btn-basket">В Корзину</a>
						<a href="" class="btn-click">Купить в 1 клик</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<footer>
	<div class="container">
		<p> © Epic Skills</p>
	</div>
</footer>
