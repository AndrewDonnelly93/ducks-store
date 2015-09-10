<link rel="stylesheet" href="templates/main.css">
<form style="margin-bottom: 20px" action="add.php" enctype="multipart/form-data" method="post">
    <p>Введите название товара:</p>
    <input style="width: 50%" type="text" name="title" required>
    <p>Введите описание товара:</p>
    <textarea style="width: 50%" name="description" rows="3" required></textarea>
    <p>Введите цену товара:</p>
    <input type="number" name="price" required>
    <p>Выберите категорию товара:</p>
    <select name="category">
    <?php foreach ($categories as $category) {
        echo "<option value=" . $category['id'] . ">"
            . $category['title'] . "</option>";
    } ?>
    </select>
    <p>Загрузите картинку с изображением товара:</p>
    <input name="userfile" type="file" />
    <input type="submit" value="Отправить">
</form>

<a class="btn" href="admin.php?view=catalog" style="margin-right: 20px">В каталог</a>