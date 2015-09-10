<?php
include_once __DIR__ . '/templates/_header.php';
include_once __DIR__ . '/templates/_top_menu.php';
include_once __DIR__ . '/templates/_form_shop_items.php';
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
                            <a href="../../index.html">Магазин</a>
                            <p>Форма изменения товара</p>
                        </div>
                        <div class="row clearfix">
                            <!-- элементы каталога -->
                            <?php
                            include_once __DIR__ . '/templates/_edit-form.php';
                            if (!empty($_POST)) {
                                include_once __DIR__ . '/src/_edit-item.php';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include_once __DIR__ . '/templates/_footer.php';