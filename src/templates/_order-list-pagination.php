<?php
$count_of_items_on_page = 9;

$count = ceil(count($orders) / $count_of_items_on_page);
if ((isset($_GET['page'])&&(is_numeric($_GET['page'])) && ($_GET['page'] <= $count))) {
    $page = $_GET['page'];
} else {
    $page = "1";
}

function showCatalog($count, $page) {
    echo "<ul class=catalog-items>";
    for ($i = 1; $i < $count+1; $i++) {
        if ($i != $page) {
            echo "<li><a href=/orders/?page=$i>$i</a></li>";
        } else {
            echo "<li class=current>$i</li>";
        }
    }
}

if ($page <= $count) {
    $offset = (intval($page)-1)*$count_of_items_on_page;
    include_once "_order-list-table.php";
    for ($i = $offset; $i < $offset + $count_of_items_on_page; $i++) {
        if ($i < count($orders)) {
            {
                echo "<table class='order-list'><tbody>";
                echo "<tr>";
                echo "<td><a href=". \App\Utilities\Options::URL ."/order/?id=".$orders[$i]['order_id']
                    ." class='adm-btn'>".$orders[$i]['order_id']."</a></td>";
                echo "<td><a href=". \App\Utilities\Options::URL ."/order/?id=".$orders[$i]['order_id']
                    ." class='adm-btn'>".$orders[$i]['order_date']."</a></td>";
                echo "</tr></tbody></table>";
            }
        }
    }
} else {
    echo "Список заказов пуст";
}

if (count($orders) > $count_of_items_on_page) {
    showCatalog($count,$page);
}