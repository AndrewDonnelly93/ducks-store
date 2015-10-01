<?php
if (isset($_GET['id'])) {
    $id = $_GET["id"];
}
include_once $src_path.'autoload.php';
$getCatId  = \App\DB\Categories::get($id,$connection);
?>

<form action="<?=App\Utilities\Options::URL?>/edit-cat/?id=<?=$getCatId['id']?>" method="post">
    <p style="margin-bottom:5px;">Введите название категории:</p>
    <input style="width: 50%;margin-bottom:5px;" type="text" name="category" value="<?=$getCatId['title']?>" required>
    <input type="submit" value="Отправить">
</form>

<?php
if (!empty($getCatId['updated_at']) && ($getCatId['updated_at'] != "0000-00-00 00:00:00")) {
    echo "<p style='margin-bottom: 5px, margin-top: 10px;'>Название категории изменено: ".$getCatId['updated_at']."</p>";
}
?>
