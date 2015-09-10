
<section>
    <section>
        <div class="container">
            <div class="row clearfix">
                <!-- боковое меню -->
                <?php include_once '_menu.php'; ?>
                <div class="catalog column column9">
                    <div class="order-status ">
                        <div class="row clearfix">
                            <p>Мини-утка брелок добавлена в корзину</p>
                        </div>
                    </div>
                    <!-- хлебные крошки -->
                    <div class="breadcrumbs item-breadcrumbs">
                        <a href="../index.html">Магазин</a>
                        <a href="catalog.html">Мини - утки</a>
                    </div>
                    <?php
                    if ($flag) {
                        include_once __DIR__ . "/_item-page.php";
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
