<?php

if ((isset($_GET['id']))&&(is_numeric($_GET['id']))) {
    $id = $_GET['id'];
} else {
    die("Нет такой категории");
}
$category = \App\DB\Categories::get($id, $connection);
if (!$category ) {
    die("Нет такой категории");
}
$products = \App\DB\Products::getByCategory($category['id'],$connection);
include_once __DIR__ . '/templates/_header.php';
include_once __DIR__ . '/templates/_top_menu.php';
include_once __DIR__ . '/templates/_top_menu.php';
//include_once __DIR__ . '/templates/_form_shop_items.php';
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
					<a href="../index.html">Магазин</a>
					<p><?=$category['title']?></p>
				</div>
				<div class="row clearfix">
					<!-- элементы каталога -->
				<?php
                if (!empty($products)) {
                    include_once __DIR__ . '/templates/_pagination.php';
                } else {
                    echo "<h2>В данной категории нет товаров</h2>";
                }
                ?>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
<?php include_once __DIR__ . '/templates/_footer.php';
