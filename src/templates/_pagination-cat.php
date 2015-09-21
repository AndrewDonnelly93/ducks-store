<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = "1";
}

switch ($page) {
    case (!is_numeric($page)):
        $page = "1";
        break;
    default:
        break;
}

    $count = ceil(count($products) / 2);
   if ($page <= $count) {
       $offset = intval($page) + (intval($page) - 1);
       for ($i = $offset - 1; $i < $offset + 1; $i++) {
           if ($i < count($products)) {
               include "_shop_element.php";
           }
       }
   } else {
       echo "There are no such items";
   }
echo "<ul class=catalog-items>";
for ($i = 1; $i < $count+1; $i++) {
    if ($i != $page) {
        echo "<li><a href=/category/?id=$id&page=$i>$i</a></li>";
    } else {
        echo "<li class=current>$i</li>";
    }
}
echo "</ul>";

