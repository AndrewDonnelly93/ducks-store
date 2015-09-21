<header>
	<div class="container clearfix">
		<!-- логотип -->
		<a href="#" class="logo">Yellow Duck</a>
		<!-- меню -->
		<nav>
			<ul>
				<li><a href="">О Компании</a></li>
				<li><a href="#">Каталог</a></li>
				<li><a href="">Доставка и оплата</a></li>
				<li><a href="">Контакты</a></li>
			</ul>
		</nav>
        <div>
            <?php
            if (isset($_SESSION['user_id'])) {
                echo "вы зашли как пользователь<br>";
                echo "<a class=user-link href=".\App\Utilities\Options::URL."/cart"."/>Корзина</a>";
                echo "<a class=user-link href=".\App\Utilities\Options::URL."/orders"."/>Заказы</a>";
            }
             else {
                 echo "<a href=". \App\Utilities\Options::URL."./login ".">Войти</a >";
            }
            ?>
        </div>
	</div>
</header>
