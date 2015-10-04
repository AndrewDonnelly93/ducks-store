# Интернет-магазин резиновых уточек

## Для установки необходимо:

* Скачать репозиторий на локальный компьютер.
* Скачать на компьютер локальный веб-сервер, например,
дистрибутив Apache XAMPP - https://www.apachefriends.org/ru/download.html . 
* Скачать на компьютер клиент для работы с базой данных MySQL (например, Valentina
Studio https://www.valentina-db.com/en/developer/database/download-valentina-database-adk) или воспользоваться встроенным 
в XAMPP PHP https://www.phpmyadmin.net/ . Для запуска последнего нужно нажать кнопку Admin на контрольной
панели XAMPP рядом с сервисом Apache.
* Открыть клиент для работы с SQL, создать базу под названием duck_store 
на локальном сервере (127.0.0.1) и загрузить туда дамп базы данных ducks.sql из репозитория.
* Прописать локальные хосты (далее указаны действия для Windows ):
** Открыть файл hosts (C:\Windows\System32\Drivers\hosts) и внести следующие изменения:
> #	127.0.0.1       localhost
> #	::1             localhost
> 127.0.0.1     ducks-store.local
** Открыть файл (..dir\Xampp\Apache\conf\extra\httpd-vhosts.conf) и внести следующие изменения:

    NameVirtualHost *:80
	<VirtualHost *:80>
		DocumentRoot "D:\Xampp\htdocs\ducks-store\web"
		ServerName localhost
	</VirtualHost>

	<VirtualHost *:80>
		ServerAdmin webmaster@blog.local
	   DocumentRoot "D:\Xampp\htdocs\ducks-store\web"
		ServerName ducks-store.local
		ServerAlias www.ducks-store.local
		ErrorLog "D:\Xampp\htdocs\ducks-store\logs\error.log"
		 CustomLog "D:\Xampp\htdocs\ducks-store\logs\access.log" combined
	   <Directory "D:\Xampp\htdocs\ducks-store\web">
		 Require all granted
		AllowOverride All
		Order allow,deny
		Allow from all
	   </Directory>
	 </VirtualHost>
	 
* После этого можно открывать в браузере сайт ducks-store.local и пользоваться им.

## Клиентская часть
* На главной странице отображаются 6 последних созданных уточек.
* Картинка является ссылкой на страницу отдельного товара.
* Просмотреть каталог можно на одноименной вкладке или воспользоваться поиском по категории, выбрав одну из 
них в боковом меню. 
* Положить товар в корзину можно из каталога или на странице товара (на последней можно указать количество).
Максимальное возможное количество - 99. После нажатия кнопки "В корзину" происходит возврат на предыдущую страницу, 
если клиент поддерживает установку $_SERVER['HTTP_REFERER'] или на главную страницу в противном случае.
* На странице "корзина"	можно просмотреть выбранные товары, изменить количество или удалить отдельные единицы,
а также очистить корзину. Также там содержится ссылка на форму для создания заказа.
* В форме создания заказа нужно указать ФИО, адрес и e-mail (эти поля обязательные) и возможно написать примечание к заказу.

## Админская часть
Войти в админскую часть сайта можно, введя логин admin и пароль 123.
### Каталог: 
в этой части  представлена таблица продуктов, каждый содержит ссылку на редактирование товара и удаление.
* Редактирование: 
Содержит форму, в которой вводится название, цена товара, его описание, а также выбирается категория. Можно загружать файлы
графических форматов: 'gif','png' ,'jpg', 'jpeg'.
После отправки формы происходит возврат на страницу с редактированием.
* Удаление:
Товар удаляется из базы данных, происходит перенаправление на страницу товаров.
* Добавление товаров:
Форма, аналогичная редактированию. После отправки производится перенаправление на страницу с редактированием товара.
### Категории:
При нажатии на кнопку редактировать выводится список категорий. Можно отредактировать категории, добавить новые или удалить их из списка.
При удалении категории ее ID удаляется из всех привязанных к ней товаров, и теперь в таблице товаров их категория становится равной значению "Не указана".
### Заказы:
При нажатии на кнопку "Заказы" выводится таблица товаров. В ней указаны ID заказа и дата его создания. При нажатии на одно из этих полей
можно просмотреть заказ. 
На странице заказа указаны контактные данные лица, оформившего его, а также таблица заказанных товаров.