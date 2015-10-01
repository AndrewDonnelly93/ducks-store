<?php
include_once $src_path . 'autoload.php';
$connection = new \App\DB\Connection('root', '');
$photo = \App\DB\Images::get(1,$connection);
?>

<form style="margin-bottom: 20px" action="/add" enctype="multipart/form-data" class='default-form edit-form' method="post">
    <p>Введите название товара:</p>
    <input type="text" name="title" value="" required>
    <p>Введите описание товара:</p>
    <textarea name="description" rows="3" required></textarea>
    <p>Введите цену товара:</p>
    <input type="number" name="price" value="" required>
    <p>Выберите категорию товара:</p>
    <select name="category">
        <?php
            foreach ($categories as $category) {
                echo "<option value=" . $category['id'] . ">"
                    . $category['title'] . "</option>";
            }
         ?>
    </select>
    <p>Загрузите картинку с изображением товара:</p>
    <input name="userfile" type="file" />
    <input type="submit" value="Отправить">
</form>
<div class="item-gallery edit">
    <img src="<?=$photo['photo']?>" alt="уточка">
</div>

<a class="btn" href="/catalog" style="margin-right: 20px">В каталог</a>