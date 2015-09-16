<?php
$id = $_GET["id"];
include_once $src_path . 'autoload.php';
$connection = new \App\DB\Connection('root', '');
$getProdInfo = $connection->connection->prepare('SELECT * FROM `products` WHERE `id` = '.$id);
$getProdInfo->execute();
$product = $getProdInfo->fetch(PDO::FETCH_ASSOC);
?>

<form style="margin-bottom: 20px" action="admin.php?view=edit&id=<?=$id?>" enctype="multipart/form-data" method="post">
    <p>Введите название товара:</p>
    <input style="width: 50%" type="text" name="title" value="<?=$product['title']?>" required>
    <p>Введите описание товара:</p>
    <textarea style="width: 50%" name="description" rows="3" required><?=$product['description']?> </textarea>
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


<a class="btn" href="admin.php?view=catalog" style="margin-right: 20px">В каталог</a>

<script>
    /*document.addEventListener("DOMContentLoaded", function(event) {
        console.log(document.querySelectorAll(".edited").length);

        if (document.querySelectorAll(".edited").length) {
            if(window.location.href.substr(-2) !== "?r") {
                window.location = window.location.href + "?r";
            }
        }
    });*/
</script>