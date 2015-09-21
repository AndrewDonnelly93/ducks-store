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
                          include_once __DIR__ . '/_pagination.php';
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>