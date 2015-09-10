<?php
$src_path = __DIR__ . '/../src/';
include_once $src_path . "/utilities/db.php";
include_once $src_path . "/templates/_edit_category.php";
// Проверяем, существует ли запрошенный ID  в базе данных
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 'error';
}
if (!is_numeric($id)) {
    echo "Введите ID в корректном формате";
    echo "<a href=admin.php class=btn>В каталог</a>";
} else {
    $isCatExists = $connection->prepare('SELECT `id` FROM `categories` WHERE `id` = '.$id);
    if ($isCatExists->execute()) {
        include_once $src_path . "/templates/_edit_category.php";
    } else {
        echo "Такой категории не существует";
        echo "<a href=admin.php class=btn>В каталог</a>";
    }
}
if (!empty($_POST)) {
    $cat_name = $_POST["category"];
    $catArray = $connection->prepare("SELECT * FROM `categories`");
    $catArray->execute();
    $catArray = $catArray->fetchAll(PDO::FETCH_ASSOC);

    $flag = false;
    foreach ($catArray as $cat) {
        if ($cat['title'] == $cat_name) {
            $flag = true;
            break;
        }
    }
    if (!$flag) {
        $updateCategories = $connection->prepare("UPDATE `categories` SET `title` = :title WHERE `id` = :id");
        $result = $updateCategories->execute([
            'title' => $cat_name
        ]);
    } else {
        echo "Такая категория уже существует";
        echo "<a class=btn href=admin.php?view=catalog style=margin-right: 20px>В каталог</a>";
    }
} else {
    include_once $src_path . "/templates/_edit_category.php";
    echo "<br>Введите название категории";
    echo "<a class=btn href=admin.php?view=catalog style=margin-right: 20px>В каталог</a>";
}