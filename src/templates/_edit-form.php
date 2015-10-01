<?php
$id = $_GET["id"];
include_once $src_path . 'autoload.php';
$connection = new \App\DB\Connection('root', '');
$product = \App\DB\Products::get($id,$connection);
?>

<form style="margin-bottom: 20px" action="/edit/?id=<?=$id?>" enctype="multipart/form-data" class='default-form edit-form' method="post">
    <p>Введите название товара:</p>
    <input type="text" name="title" value="<?=$product['title']?>" required>
    <p>Введите описание товара:</p>
    <textarea name="description" rows="3" required><?=$product['description']?> </textarea>
    <p>Введите цену товара:</p>
    <input type="number" name="price" value="<?=$product['price']?>" required>
    <p>Выберите категорию товара:</p>
    <select name="category">
        <?php foreach ($categories as $category) {
            if ($category['id'] != $product['category_id']) {
                echo "<option value=" . $category['id'] . ">"
                    . $category['title'] . "</option>";
            } else {
                echo "<option selected='selected' value=" . $category['id'] . ">"
                    . $category['title'] . "</option>";
            }
        } ?>
    </select>
    <p>Загрузите картинку с изображением товара:</p>
    <input name="userfile" type="file" />
    <input type="submit" value="Отправить">
</form>
<div class="item-gallery edit">
    <img src="<?=$product['photo']?>" alt="уточка">
</div>
<?php
    if (!empty($product['updated_at']) && ($product['updated_at'] != "0000-00-00 00:00:00")) {
        echo "<p style='margin-bottom: 5px;'>Товар изменен: ".$product['updated_at']."</p>";
    }
?>

<a class="btn" href="/catalog" style="margin-right: 20px">В каталог</a>
<a href="<?=\App\Utilities\Options::URL ?>/add" class='add-item adm-btn'>Добавить товар</a>