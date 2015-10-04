<header>
	<div class="container clearfix">
		<!-- логотип -->
		<a href="<?= \App\Utilities\Options::URL ."/" ?>" class="logo">Yellow Duck</a>
		<!-- меню -->
		<nav>
			<ul>
				<li><a href="../company">О Компании</a></li>
				<li><a href="../catalog">Каталог</a></li>
				<li><a href="../pay-del">Доставка и оплата</a></li>
				<li><a href="../contacts">Контакты</a></li>
			</ul>
		</nav>
        <div class="cart-info">
            <?php
            function getProductsInCart() {
                $count = 0;
                if (isset($_COOKIE['products']) && !empty($_COOKIE['products'])) {
                    $productsInCart = $_COOKIE['products'];
                    foreach ($productsInCart as $id => $value) {
                        $count += $value;
                    }
                }
                return $count;
            }
            if (isset($_SESSION['user_id'])) {
                echo "<p>Admin</p>";
                echo "<a class=exit href=". \App\Utilities\Options::URL."../exit ".">Выйти</a ><br>";
                echo "<a class=user-link href=".\App\Utilities\Options::URL."../orders"."/>Заказы</a>";
            }
             else {
                 echo "<a href=". \App\Utilities\Options::URL."../login ".">Войти</a >";
                 echo "<a class='user-link cart' href=".\App\Utilities\Options::URL."../cart"."/>Корзина</a>";
                 echo "<div class=products>Товаров в корзине: <span>".$count = getProductsInCart()."</span></div>";
            }
            ?>
        </div>
	</div>
</header>
