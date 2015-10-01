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
                <p>Изменение товара</p>
            </div>
            <div class="row clearfix">
<?php
use Respect\Validation\Validator as v;
// Проверяем, существует ли запрошенный ID  в базе данных
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 'error';
}
if (!is_numeric($id)) {
    echo "Введите ID в корректном формате";
    echo "<a href=/catalog class=btn>В каталог</a>";
} elseif (empty($_POST)) {
    $isProdExists = \App\DB\Products::get($id,$connection);
    if (v::arr()->notEmpty()->validate($isProdExists)) {
        include_once $src_path . "templates/_edit-form.php";
    } else {
        echo "Такого товара нет в базе данных<br>";
        echo "<a href=/catalog class=btn style='margin-top: 10px;'>В каталог</a>";
    }
} elseif (!empty($_POST)) {
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
        $id = $_GET['id'];
        $category_id = $_POST['category'];
        if ($userfile) {
            // Set new photo
           include_once "add-image.php";
        }
        $updateProduct = \App\DB\Products::updateProduct($connection,$id,$title,$description,$price,$category_id);
        if  ($updateProduct) {
            header("Refresh:0");
        } else {
            echo "Ошибка. Товар не изменен";
        }
    } else {
        include_once  "templates/_edit-form.php";
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