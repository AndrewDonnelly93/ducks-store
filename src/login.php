<?php
include_once __DIR__ . '/templates/_header.php';
include_once __DIR__ . '/templates/_top_menu.php';
?>

<section>
    <div class="container">
    <div class="row clearfix">
    <!-- боковое меню -->
<?php include_once 'templates/_menu.php'; ?>
    <div class="column column9">
    <div class="catalog">
    <!-- хлебные крошки -->
    <div class="breadcrumbs">
        <a href="/">Магазин</a>
        <p>Авторизация</p>
    </div>
    <div class="row clearfix">
<?php
use \App\DB;
if(empty($_POST)
    || (!isset($_POST['username']) && !isset($_POST['password']))
){
    if (isset($_SESSION['error'])) {
        echo "<h2>{$_SESSION['error']}</h2>";
        unset($_SESSION['error']);
    }
    ?>
    <form class=auth-form action="" method="post">
        <input type="text" name="username" value="" placeholder="Логин">
        <input type="password" name="password" value="" placeholder="Пароль">
        <button type="submit" name="submit">Login</button>
    </form>
<?php } else {
    $username = $_POST['username'];
    $usernameCheck = \App\DB\Users::checkUsernameExists($connection,$username);
    if ($usernameCheck) {
        $password = $_POST['password'];
        $id = App\DB\Users::getIdIfExists($connection,$username,$password);
        if ($id != 0) {
            $_SESSION['user_id'] = $id;
            header('Location: / ');
        } else {
            $_SESSION['error'] = 'Неправильный пароль';
            header('Location: ' . \App\Utilities\Options::URL . '/login');
        }
    } else {
        $_SESSION['error'] = 'Такого пользователя не существует';
        header('Location: ' . \App\Utilities\Options::URL . '/login');
    }
}
?>
</div>
        </div>
    </div>
    </div>
</div>
</section>
<?php
include_once __DIR__ . '/templates/_footer.php';
?>