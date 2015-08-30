<?php

include_once __DIR__ . '/templates/_header.php';
include_once __DIR__ . '/templates/_top_menu.php';
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
                        <!-- элементы каталога -->
                        <?php for($i = 0; $i < 6; $i++): ?>
                            <?php include 'templates/_single_element.php'; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
		</div>
	</div>
</main>
<?php include_once __DIR__ . '/templates/_footer.php';
