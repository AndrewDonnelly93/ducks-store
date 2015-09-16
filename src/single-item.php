<?php
$flag = (!empty($_GET['id']) && isset($_GET["id"])&&(is_numeric($_GET["id"])));
if ($flag) {
    $id = $_GET["id"];
    $statement = $connection->connection->prepare('SELECT p.id, p.title, p.description, p.price, i.photo
 FROM `products` p INNER JOIN `images` i ON p.image_id = i.id WHERE p.id = :id');
    $statement->bindParam(':id',$id);
    $statement->execute([':id' => $id]);
    $product = $statement->fetch(PDO::FETCH_ASSOC);
    if (!$product) {
        die("Такой утки не обнаружено");
    }
    include_once __DIR__ . '/templates/_header.php';
    include_once __DIR__ . '/templates/_top_menu.php';
    include_once __DIR__ . '/templates/_single-item.php';
    include_once __DIR__ . '/templates/_footer.php';
} else {
   die("Такой утки нет");
}


?>