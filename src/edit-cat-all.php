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
                <p>Список категорий</p>
            </div>
            <div class="row clearfix">
                <?php
                    include_once __DIR__ . '/templates/_categories-catalog.php';
                ?>
               <a href=<?=\App\Utilities\Options::URL?>/add-cat class='add-item adm-btn'>Добавить категорию</a>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<?php
include_once __DIR__ . '/templates/_footer.php';
?>