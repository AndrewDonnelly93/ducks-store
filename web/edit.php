<?php
$src_path = __DIR__."/../src/";
include_once $src_path.'autoload.php';
/*<a href="index.php?view=single-item&id=<?=$products[$i]['id']?>" class="item" title="<?=$products[$i]['title'];?>">*/

function updatePhoto($uploadfile,$connection,$id) {
    $stmt = $connection->prepare('SELECT `id`,`photo` FROM `images`');
    $stmt->execute();
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $uploadImageTable = $connection->prepare('INSERT INTO `images`'.
        '(`photo`,`created_at`)'.
        ' VALUES (:photo, :created_at)');
    $uploadProducts = $connection->prepare('UPDATE `products` SET `image_id` = :id WHERE `id` ='.$id);
    $flag = false;

    foreach ($images as $image) {
        if ($image['photo'] === $uploadfile) {
            // Если нашли в таблице изображений такой файл, обновляем таблицу с продуктами
            $flag = true;
            $uploadProducts->execute([
                'id' => $image['id']
            ]);
            break;
        }
    }
    if (!$flag) {
        $now = new DateTime();
        $date = $now->format("Y-m-d H:i:s");
        // Если не нашли, обновляем две таблицы - заносим новый файл к изображениям и информацию об его ID в продукты
        $uploadImageTable->execute([
            'photo' => $uploadfile,
            'created_at' => $date
        ]);
        $get_image_id = $connection->prepare('SELECT `id` FROM `images` WHERE `id` = (SELECT MAX(`id`) FROM `images`)');
        $get_image_id->execute();
        $image_id = $get_image_id->fetch(PDO::FETCH_ASSOC);
        $image_id = $image_id['id'];
        $uploadProducts->execute([
            'id' => $image_id
        ]);
    }
}

// Проверяем, существует ли запрошенный ID  в базе данных
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 'error';
}
if (!is_numeric($id)) {
    echo "Введите ID в корректном формате";
    echo "<a href=admin.php class=btn>В каталог</a>";
} else {
    $isProdExists = $connection->prepare('SELECT `id` FROM `products` WHERE `id` = '.$id);
    if ($isProdExists->execute()) {
        include_once $src_path . "templates/_edit-form.php";
    } else {
        echo "Такого товара нет в базе данных";
        echo "<a href=admin.php class=btn>В каталог</a>";
    }
}

if (!empty($_POST)) {
    if (isset($_POST['title']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['category'])) {
        $now = new DateTime();
        $date = $now->format("Y-m-d H:i:s");
        try {
            $stmt = $connection->prepare(
                'UPDATE `products`
                SET `title` = :title,
                `description` = :description,
                `price` = :price,
                `category_id` = :category,
                `updated_at` = :updated_at
                WHERE `id` = :id'
            );
            $result = $stmt->execute([
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'price' => $_POST['price'],
                'category' => $_POST['category'],
                'updated_at' => $date,
                'id' => $id
            ]);
            if ($result) {
                //header('location:' . $_SERVER['REQUEST_URI'] );
                echo "<p class=edited>Товар изменен</p>".$date;
                header("Refresh:2");
            } else {
                echo "Ошибка. Товар не изменен";
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    } else {
        include_once $src_path . "templates/_edit-form.php";
        echo "Вы заполнили не все поля";
    }
    /* File upload */
    $userfile = $_FILES['userfile']['name'];
    $uploaddir = '../data/uploads/';
    $uploadfile = $uploaddir . basename($userfile);
    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
        updatePhoto($uploadfile, $connection, $id);
    }
}