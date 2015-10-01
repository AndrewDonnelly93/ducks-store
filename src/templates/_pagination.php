<?php
$count_of_items_on_page = 9;
$count = ceil(count($products) / $count_of_items_on_page);
if ((isset($_GET['page'])&&(is_numeric($_GET['page'])) && ($_GET['page'] <= $count))) {
    $page = $_GET['page'];
} else {
    $page = "1";
}

function showCatalog($count, $page) {
    echo "<ul class=catalog-items>";
for ($i = 1; $i < $count+1; $i++) {
    if ($i != $page) {
        echo "<li><a href=/catalog/?page=$i>$i</a></li>";
    } else {
        echo "<li class=current>$i</li>";
    }
}
}

   if ($page <= $count) {
        $offset = (intval($page)-1)*$count_of_items_on_page;
       if (isset($_SESSION['user_id'])) {
           include_once "_table-products.php";
       }
           for ($i = $offset; $i < $offset + $count_of_items_on_page; $i++) {
               if ($i < count($products)) {
                   if (!isset($_SESSION['user_id'])) {
                       include "_shop_element.php";
                   } else {
                       include "_shop_element_admin.php";
                   }
               }
           }
    } else {
        echo "Список товаров пуст";
    }

if (count($products) > $count_of_items_on_page) {
    showCatalog($count,$page);
}

if (isset($_SESSION['user_id'])) {
    echo "<a href=".\App\Utilities\Options::URL."/add class='add-item adm-btn'>Добавить товар</a>";
}
