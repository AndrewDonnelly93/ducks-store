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
                <p>Создание товара</p>
            </div>
            <div class="row clearfix">
<?php
use Respect\Validation\Validator as v;
if (empty($_POST)) {
    include_once $src_path . "templates/_add-shop-item-form.php";
} else {
    include_once "/product_data-validate.php";
// Data Validation
    $errors = [];
    $title = titleValidate($errors,$_POST['title']);
    $description = descriptionValidate($errors,$_POST['description']);
    $price = priceValidate($errors,$_POST['price']);
    if ($_FILES['userfile']['error'] != 4) {
        $userfile = fileValidate($errors, $_FILES['userfile']['name']);
    } else {
        $userfile = false;
    }
    if (!v::arr()->notEmpty()->validate($errors)) {
        $category_id = $_POST['category'];
        $createProduct = new \App\DB\Products($connection,$title,$description,$price,$category_id);
        $id = \App\DB\Products::getCurrentId($connection);
        if ($userfile) {
            // Set new photo
            include_once "add-image.php";
        }
        if  ($createProduct) {
            header("Refresh: 0; url=/edit/?id=".$id);
        } else {
            echo "Ошибка. Товар не создан";
        }
    } else {
        include_once  "templates/_add-shop-item-form.php";
        include_once  "templates/_form-errors.php";
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