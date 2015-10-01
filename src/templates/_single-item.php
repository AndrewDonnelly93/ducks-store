
<section>
    <section>
        <div class="container">
            <div class="row clearfix">
                <!-- боковое меню -->
                <?php include_once '_menu.php'; ?>
                <div class="catalog column column9">
                  <!--  <div class="order-status ">
                        <div class="row clearfix">
                            <p></p>
                        </div>
                    </div>-->
                    <!-- хлебные крошки -->
                    <div class="breadcrumbs item-breadcrumbs">
                        <a href="<?=\App\Utilities\Options::URL?>">Магазин</a>
                        <a href="<?=\App\Utilities\Options::URL.'/catalog'?>">Мини - утки</a>
                    </div>
                    <?php
                        include_once __DIR__ . "/_item-page.php";
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
