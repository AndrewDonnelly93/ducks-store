<main>
    <div class="container">
        <div class="banner"></div>
        <div class="row clearfix">
            <!-- боковое меню -->
            <?php include_once __DIR__ .'/_menu.php'; ?>
            <div class="column column9">
                <div class="catalog">
                    <div class="row clearfix">
                        <?php
                        if (!empty($products)) {
                                include_once __DIR__ . '/_pagination.php';
                        } else {
                            echo "<h2>Список товаров пуст</h2>";
                            if (!isset($_SESSION['user_id'])) {
                                echo "<a href=".\App\Utilities\Options::URL."/add class='add-item adm-btn'>Добавить товар</a>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>