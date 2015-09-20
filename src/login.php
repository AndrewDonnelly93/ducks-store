<?php
if (empty($_POST)||
    ((!isset($_POST['username']))&&(!isset($_POST['password'])))){

    if (isset($_SESSION['error'])) {
        echo "<h1>{$_SESSION['error']}</h1>";
        unset($_SESSION['error']);
    }
    ?>
    <form action="" method="post">
        <input type="text" name="username" value="">
        <br>
        <input type="password" name="password" value="">
        <br>
        <button type="submit">Login</button>
    </form>
<?php } else {
  $usernameStored = 'admin';
    $passwordStored = 123;
    if ($_POST['username'] == $usernameStored && $_POST['password'] == $passwordStored) {
        $_SESSION['user_id'] = 1;
        header('Location: '.\App\Utilities\Options::URL);
    } else {
        $_SESSION['error'] = "Неправильные данные";
        header('Location: '.\App\Utilities\Options::URL.'/login');
    }
}
?>