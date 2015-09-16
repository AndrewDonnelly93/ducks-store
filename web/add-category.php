<?php
$src_path = __DIR__ . '/../src/';
include_once $src_path . "/utilities/db.php";
include_once $src_path . "/templates/_add-category.php";
if (!empty($_POST)) {
    $cat_stmt = $connection->connection->prepare('SELECT `title` FROM `categories`');
    $cat_stmt->execute();
    $categories = $cat_stmt->fetchAll(PDO::FETCH_ASSOC);
    $new_cat = $_POST['category'];
    $flag = false;
    foreach ($categories as $category) {
        if ($category['title'] == $new_cat) {
            $flag = true;
            break;
        }
    }
    if (!$flag) {
        $addCat = $connection->connection->prepare('INSERT INTO `categories`'.
                                        '(`title`)'.
                                        'VALUES (:title)');
        $result = $addCat->execute(['title' => $new_cat]);
        if ($result) {
            echo "Категория добавлена";
            echo "<a class=btn href=admin.php?view=catalog style=margin-right: 20px>В каталог</a>";
        } else {
            echo "Ошибка. Категория не добавлена";
            echo "<a class=btn href=admin.php?view=catalog style=margin-right: 20px>В каталог</a>";
        }
    } else {
        echo "Такая категория уже существует";
        echo "<a class=btn href=admin.php?view=catalog style=margin-right: 20px>В каталог</a>";
        include_once $src_path . "/templates/_add-category.php";
    }
} else {
    include_once $src_path . "/templates/_add-category.php";
    echo "<br>Введите название категории";
}