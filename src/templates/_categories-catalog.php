<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "1";
}

function showCatalog($count, $page) {
    echo "<ul class=catalog-items>";
    for ($i = 1; $i < $count+1; $i++) {
        if ($i != $page) {
            echo "<li><a href=/edit-cat-all/?page=$i>$i</a></li>";
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
$count = ceil(count($categories) / $count_of_items_on_page);
if ($page <= $count) {
    $offset = (intval($page)-1)*$count_of_items_on_page;
    include_once "_table-categories.php";
    for ($i = $offset; $i < $offset + $count_of_items_on_page; $i++) {
        if ($i < count($categories)) {
            {
                echo "<table class='categories list'><tbody>";
                echo "<tr>";
                echo  "<td>".$categories[$i]['id']."</td>";
                echo "<td>".$categories[$i]['title']."</td>";
                echo "<td><a href=". \App\Utilities\Options::URL ."/edit-cat/?id=".$categories[$i]['id']." class='edit adm-btn'>Изменить</a></td>";
                echo "<td><a href=". \App\Utilities\Options::URL ."/delete-cat/?id=".$categories[$i]['id']." class='delete adm-btn'>Удалить</a></td>";
                echo "</tr></tbody></table>";
            }
        }
    }
} else {
    echo "Список товаров пуст";
}

if (count($categories) > $count_of_items_on_page) {
    showCatalog($count,$page);
}