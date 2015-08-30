<?php
include_once __DIR__ . '/templates/_header.php';
include_once __DIR__ . '/templates/_top_menu.php';
include_once __DIR__ . '/templates/_form_shop_items.php';
?>

<main>
	<div class="container">
		<div class="banner"></div>
		<div class="row clearfix">
			<!-- боковое меню -->
            <?php include_once 'templates/_menu.php'; ?>
			<div class="column column9">
				<div class="catalog">
					<div class="row clearfix">
                        <?php
                            include_once __DIR__ . '/templates/_pagination.php';
                        ?>
                        <div class="div">
                            <a class="add-item btn" href="add-item.php">Добавить товар</a>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php include_once __DIR__ . '/templates/_footer.php';