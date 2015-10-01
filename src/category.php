<?php
$flag = false;
$products = [];
if ((isset($_GET['id']))&&(is_numeric($_GET['id']))) {
    $id = $_GET['id'];
    $category = \App\DB\Categories::get($id, $connection);
    if (!$category) {
        $flag = true;
        $category['title'] = "Неизвестная категория";
    }
    if (!$flag) {
        $products = \App\DB\Products::getByCategory($category['id'], $connection);
    }
} else {
    $flag = true;
    $category['title'] = "Неизвестная категория";
}

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
                            <a href="<?= \App\Utilities\Options::URL ?>">Магазин</a>
                            <p><?=$category['title']?></p>
                        </div>
                        <div class="row clearfix">
                            <!-- элементы каталога -->
                            <?php
                            if (!empty($products)) {
                                include_once __DIR__ . '/templates/_pagination-cat.php';
                            } else {
                                if (!$flag)
                                {
                                    echo "<h2>В данной категории нет товаров</h2>";
                                } else
                                {
                                    echo "<h2>Нет такой категории</h2>";
                                }
                                if (isset($_SESSION['user_id'])) {
                                    echo "<a href=".\App\Utilities\Options::URL."/add class='add-item adm-btn'>Добавить товар</a>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include_once __DIR__ . '/templates/_footer.php';
