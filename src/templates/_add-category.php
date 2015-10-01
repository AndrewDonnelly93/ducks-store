<?php
include_once $src_path.'autoload.php';
?>

<form action="<?=App\Utilities\Options::URL?>/add-cat" method="post">
    <p style="margin-bottom:5px;">Введите название категории:</p>
    <input style="width: 50%;margin-bottom:5px;" type="text" name="category" value="" required>
    <input type="submit" value="Отправить">
</form>

