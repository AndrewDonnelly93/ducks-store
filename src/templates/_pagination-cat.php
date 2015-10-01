<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "1";
}

function showCatalog($count, $page, $id)
{
    echo "<ul class=catalog-items>";
    for ($i = 1; $i < $count + 1; $i++) {
        if ($i != $page) {
            echo "<li><a href=/category/?id=$id&page=$i>$i</a></li>";
        } else {
            echo "<li class=current>$i</li>";
        }
    }
}

switch ($page) {
    case (!is_numeric($page)):
        $page = "1";
        break;
    default:
        break;
}

$count_of_items_on_page = 9;
$count = ceil(count($products) / $count_of_items_on_page);
if ($page <= $count) {
    $offset = (intval($page)-1)*$count_of_items_on_page;
    if (isset($_SESSION['user_id'])) {
        include_once "_table-products.php";
    }
    for ($i = $offset; $i < $offset + $count_of_items_on_page; $i++) {
        if ($i < count($products)) {
            if (isset($_SESSION['user_id'])) {
                include "_shop_element_admin.php";
            } else {
                include "_shop_element.php";
            }
        }
    }
} else {
    echo "Список товаров пуст";
}

if (count($products) > $count_of_items_on_page) {
    showCatalog($count,$page,$id);
}

if (isset($_SESSION['user_id'])) {
    echo "<a href=".\App\Utilities\Options::URL."/add class='add-item adm-btn'>Добавить товар</a>";
}


