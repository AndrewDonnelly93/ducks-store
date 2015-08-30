<?php
$id = $_GET["id"];
?>

<form style="margin-bottom: 20px" action="index.php?view=edit-item&id=<?=$id?>" enctype="multipart/form-data" method="post">
    <p>Введите название товара:</p>
    <input type="text" name="item-name" value="<?=$products[$id][1]?>" required>
    <p>Введите описание товара:</p>
    <textarea style="width: 50%" name="item-description" rows="3" required><?=$products[$id][2]?> </textarea>
    <p>Введите цену товара:</p>
    <input type="number" name="item-price" value="<?=$products[$id][3]?>" required>
    <p>Загрузите картинку с изображением товара:</p>
    <input name="userfile" type="file" />
    <input type="submit" value="Отправить">
</form>

<a class="btn" href="catalog.php" style="margin-right: 20px">В каталог</a>
