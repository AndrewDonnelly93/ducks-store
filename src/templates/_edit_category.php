<?php
if (isset($_GET['id'])) {
    $id = $_GET["id"];
}
include_once $src_path.'autoload.php';
$getCatId  = $connection->connection->prepare('SELECT * FROM `categories` WHERE `id` = '.$id);
$getCatId ->execute();
$catName = $getCatId->fetch(PDO::FETCH_ASSOC);
?>

<form action="admin.php?view=edit_category&id=<?=$id?>" method="post">
    <input style="width: 50%" type="text" name="category" value="<?=$catName['title']?>" required>
    <input type="submit" value="Отправить">
</form>