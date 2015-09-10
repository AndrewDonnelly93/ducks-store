<?php
if (isset($_GET['id'])) {
    $id = $_GET["id"];
}
include_once $src_path.'utilities/db.php';
$getCatId  = $connection->prepare('SELECT * FROM `categories` WHERE `id` = '.$id);
$getCatId ->execute();
$catName = $getCatId->fetch(PDO::FETCH_ASSOC);
?>

<form action="edit_category.php" method="post">
    <input style="width: 50%" type="text" name="category" value="<?=$catName['title']?>" required>
    <input type="submit" value="Отправить">
</form>