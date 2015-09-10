<?php
include_once __DIR__ . '/templates/_header.php';
include_once __DIR__ . '/templates/_top_menu.php';
include_once __DIR__ . '/templates/_form_shop_items.php';
?>
    <section>
        <div class="container">
            <div class="row clearfix">
                <!-- боковое меню -->
                <?php include_once 'templates/_menu-admin.php'; ?>
                <div class="column column9">
                    <div class="catalog">
                        <!-- хлебные крошки -->
                        <div class="breadcrumbs">
                            <a href="../index.html">Админка</a>
                        </div>
                        <div class="row clearfix">
                            <!-- элементы каталога -->
                            <?php
                            include_once __DIR__ . '/templates/_pagination-admin.php';
                            ?>
                            <a href="add.php" class="add-item btn">Добавить товар</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include_once __DIR__ . '/templates/_footer.php';