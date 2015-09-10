
<section>
    <section>
        <div class="container">
            <div class="row clearfix">
                <!-- боковое меню -->
                <?php include_once __DIR__.'/_menu.php'; ?>
                <div class="catalog column column9">
                    <div class="order-status ">
                    </div>
                    <!-- хлебные крошки -->
                    <div class="breadcrumbs item-breadcrumbs">
                        <a href="admin.php?view=catalog">Админка</a>
                        <a href="admin.php?view=catalog">Мини - утки</a>
                    </div>
                    <?php
                    if ($flag) {
                        include_once __DIR__ . "/_item-page_admin.php";
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
