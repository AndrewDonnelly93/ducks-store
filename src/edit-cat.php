<?php
use \Respect\Validation\Validator as v;
include_once __DIR__ . '/templates/_header.php';
include_once __DIR__ . '/templates/_top_menu.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 'error';
}
$category = \App\DB\Categories::get($id,$connection);
$flag = v::arr()->notEmpty()->validate($category);
include_once "category_validate.php";
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
                        <p><?php
                            if (!$flag) {
                                echo "Список категорий";
                            } else {
                                echo $category['title'];
                            }
                            ?></p>
                    </div>
                    <div class="row clearfix">
                        <?php
                            if (empty($_POST)) {
                                if (!$flag) {
                                    echo "<h2>Такой категории не существует";
                                } else {
                                    include_once 'templates/_edit_category.php';
                                }
                            } else {
                                $errors=[];
                                $catName = catNameValidate($errors,$_POST['category']);
                                if (!v::arr()->notEmpty()->validate($errors)) {
                                    // Check if this category already exists
                                    $flag = ifCatExists($connection,$catName);
                                    if ($flag) {
                                        include_once  "templates/_edit_category.php";
                                        echo "<p>Такая категория уже существует</p>";
                                    } else {
                                        $newCategory = \App\DB\Categories::update($id,$catName,$connection);
                                        header('Refresh: 0; url=/edit-cat-all');
                                    }
                                } else {
                                    include_once  "templates/_edit_category.php";
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