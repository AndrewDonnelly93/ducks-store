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
            <?php if (isset($_SESSION['user_id'])): ?>
                вы зашли как пользователь
            <?php else: ?>
                <a href="<?= \App\Utilities\Options::URL .'/login' ?>">войти</a>
            <?php endif; ?>
        </div>
	</div>
</header>
