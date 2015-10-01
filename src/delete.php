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
                <p>Удаление товара</p>
            </div>
            <div class="row clearfix">
<?php
use \Respect\Validation\Validator as v;
include_once $src_path . 'autoload.php';
$connection = new \App\DB\Connection('root', '');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 'error';
}
if (!is_numeric($id)) {
    echo "Введите ID в корректном формате";
} else {
    $product = \App\DB\Products::get($id,$connection);
    if (v::arr()->notEmpty()->validate($product)) {
        $deleteProduct = \App\DB\Products::deleteProduct($id,$connection);
        // Back to previous page
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}
?>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<?php
include_once __DIR__ . '/templates/_footer.php';
?>