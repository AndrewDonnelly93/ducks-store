-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "categories" -------------------------------
CREATE TABLE `categories` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`title` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`created_at` DateTime NULL DEFAULT CURRENT_TIMESTAMP, 
	`updated_at` DateTime NULL DEFAULT CURRENT_TIMESTAMP,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 7;
-- ---------------------------------------------------------


-- CREATE TABLE "category" ---------------------------------
CREATE TABLE `category` ( 
 )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- ---------------------------------------------------------


-- CREATE TABLE "feedbacks" --------------------------------
CREATE TABLE `feedbacks` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`email` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`text` Text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`created_at` DateTime NULL DEFAULT CURRENT_TIMESTAMP,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- ---------------------------------------------------------


-- CREATE TABLE "images" -----------------------------------
CREATE TABLE `images` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`photo` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`created_at` DateTime NULL, 
	`updated_at` DateTime NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 20;
-- ---------------------------------------------------------


-- CREATE TABLE "orders" -----------------------------------
CREATE TABLE `orders` ( 
	`order_id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`customer_name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`address` LongText CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`email` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`addition` LongText CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`cost` Int( 11 ) NOT NULL, 
	`order_date` DateTime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	 PRIMARY KEY ( `order_id` )
 )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 8;
-- ---------------------------------------------------------


-- CREATE TABLE "ordersproducts" ---------------------------
CREATE TABLE `ordersproducts` ( 
	`order_id` Int( 11 ) NOT NULL, 
	`product_id` Int( 11 ) NOT NULL, 
	`amount` Int( 11 ) NOT NULL
 )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB;
-- ---------------------------------------------------------


-- CREATE TABLE "products" ---------------------------------
CREATE TABLE `products` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`title` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`description` Text CHARACTER SET utf8 COLLATE utf8_general_ci NULL, 
	`price` Double( 7, 2 ) NOT NULL, 
	`image_id` Int( 11 ) NOT NULL DEFAULT '1', 
	`created_at` DateTime NULL, 
	`updated_at` DateTime NOT NULL, 
	`category_id` Int( 11 ) NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 42;
-- ---------------------------------------------------------


-- CREATE TABLE "properties" -------------------------------
CREATE TABLE `properties` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`title` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`type` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
-- ---------------------------------------------------------


-- CREATE TABLE "users" ------------------------------------
CREATE TABLE `users` ( 
	`user_id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`user_name` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`hash_password` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	 PRIMARY KEY ( `user_id` )
 )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- ---------------------------------------------------------


-- Dump data of "categories" -------------------------------
INSERT INTO `categories`(`id`,`title`,`created_at`,`updated_at`) VALUES ( '2', 'Европейские утки', '2015-10-01 12:29:14', '2015-10-01 12:29:24' );
INSERT INTO `categories`(`id`,`title`,`created_at`,`updated_at`) VALUES ( '3', 'Резиновые утки', '2015-10-01 12:29:14', '2015-10-01 12:29:24' );
INSERT INTO `categories`(`id`,`title`,`created_at`,`updated_at`) VALUES ( '4', 'Японские утки', '2015-10-01 12:29:14', '2015-10-01 11:43:22' );
INSERT INTO `categories`(`id`,`title`,`created_at`,`updated_at`) VALUES ( '5', 'Английские утки', '2015-10-01 12:29:14', '2015-10-01 12:29:24' );
INSERT INTO `categories`(`id`,`title`,`created_at`,`updated_at`) VALUES ( '6', 'Зеленые утки', '2015-10-01 12:29:14', '2015-10-02 10:47:25' );
-- ---------------------------------------------------------


-- Dump data of "feedbacks" --------------------------------
INSERT INTO `feedbacks`(`id`,`name`,`email`,`text`,`created_at`) VALUES ( '1', 'trtq', 'trt', 'gfg', '2015-09-21 21:23:06' );
INSERT INTO `feedbacks`(`id`,`name`,`email`,`text`,`created_at`) VALUES ( '2', 'trtq', 'trt', 'gfg', '2015-09-21 21:26:19' );
INSERT INTO `feedbacks`(`id`,`name`,`email`,`text`,`created_at`) VALUES ( '3', 'andrew', 'fdfsf', 'dfs', '2015-09-21 21:27:06' );
-- ---------------------------------------------------------


-- Dump data of "images" -----------------------------------
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '1', '../data/uploads/item.jpeg', '2015-09-08 12:34:57', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '2', '../data/uploads/banner.jpeg', '2015-09-08 12:34:57', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '3', '../data/uploads/IMG_8456_Fotor.jpg', '2015-09-08 12:34:57', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '4', '../data/uploads/bolsie-predmety-3.jpg', '2015-09-08 12:34:57', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '8', '../data/uploads/ae8c0c4d4a49.jpg', NULL, NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '9', '../data/uploads/1835_03.jpg', NULL, NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '10', '../data/uploads/3c816dbadc88529e54feae4e89cf5cca.jpg', NULL, NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '11', '../data/uploads/14247673513059.jpg', NULL, NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '12', '../data/uploads/Duck08ad.jpg', NULL, NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '13', '../data/uploads/images.jpg', NULL, NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '14', '../data/uploads/(266)soldier rubber duck dark camo.jpg', NULL, NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '15', '../data/uploads/images (1).jpg', '0000-00-00 00:00:00', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '16', '../data/uploads/rubberDuck.jpg', '2015-09-16 19:38:33', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '18', '../data/uploads/19314798_1204392341_utko.jpg', '2015-09-30 15:36:09', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '19', '../data/uploads/Rezinovaya_utochka_11373367845042466.jpg', '2015-09-30 15:41:29', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '20', '../data/uploads/01155887-lrg.jpg', '2015-10-02 10:53:30', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '21', '../data/uploads/14463071-rubber-duck-pirate-over-white-Stock-Photo.jpg', '2015-10-02 10:54:11', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '22', '../data/uploads/1353764115-10659200.jpg', '2015-10-02 10:55:50', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '23', '../data/uploads/barrister-rubber-duck-1.jpg', '2015-10-02 10:56:29', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '24', '../data/uploads/Bride and Groom_m.jpg', '2015-10-02 10:57:08', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '25', '../data/uploads/camouflage-rubber-ducks-extralarge.jpg', '2015-10-02 10:57:56', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '26', '../data/uploads/doctor-rubber-duck-1_1.jpg', '2015-10-02 10:58:42', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '27', '../data/uploads/graduate-rubber-duck-extralarge.jpg', '2015-10-02 11:00:06', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '28', '../data/uploads/images (2).jpg', '2015-10-02 11:01:13', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '29', '../data/uploads/images (3).jpg', '2015-10-02 11:01:52', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '30', '../data/uploads/jazz-rubber-duck-767.jpg', '2015-10-02 11:03:14', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '31', '../data/uploads/large.jpg', '2015-10-02 11:03:51', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '32', '../data/uploads/lrgscale3968.2.jpg', '2015-10-02 11:04:40', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '33', '../data/uploads/monster-duck-show.jpg', '2015-10-02 11:05:22', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '34', '../data/uploads/reader-rubber-duck-leaning.jpg', '2015-10-02 11:06:21', NULL );
INSERT INTO `images`(`id`,`photo`,`created_at`,`updated_at`) VALUES ( '35', '../data/uploads/stars-stripes-rubber-duck.jpg', '2015-10-02 11:07:53', NULL );
-- ---------------------------------------------------------


-- Dump data of "orders" -----------------------------------
INSERT INTO `orders`(`order_id`,`customer_name`,`address`,`email`,`addition`,`cost`,`order_date`) VALUES ( '5', 'Сердюков Александр Андреевич', 'Санкт-Петербург, ул. Красного Курсанта, 25', 'alexweb@gmail.ru', '', '314', '2015-09-29 12:08:50' );
INSERT INTO `orders`(`order_id`,`customer_name`,`address`,`email`,`addition`,`cost`,`order_date`) VALUES ( '6', 'Андреев Георгий Леонидович', 'Санкт-Петербург, Невский пр., 22', 'andreev@mail.ru', '', '210', '2015-10-01 10:13:37' );
INSERT INTO `orders`(`order_id`,`customer_name`,`address`,`email`,`addition`,`cost`,`order_date`) VALUES ( '7', 'Федорова Надежда', 'пр. Науки, 30', 'fedorovana@gmail.com', '', '229', '2015-10-01 10:17:53' );
-- ---------------------------------------------------------


-- Dump data of "ordersproducts" ---------------------------
INSERT INTO `ordersproducts`(`order_id`,`product_id`,`amount`) VALUES ( '5', '3', '1' );
INSERT INTO `ordersproducts`(`order_id`,`product_id`,`amount`) VALUES ( '5', '2', '1' );
INSERT INTO `ordersproducts`(`order_id`,`product_id`,`amount`) VALUES ( '5', '42', '1' );
INSERT INTO `ordersproducts`(`order_id`,`product_id`,`amount`) VALUES ( '6', '3', '1' );
INSERT INTO `ordersproducts`(`order_id`,`product_id`,`amount`) VALUES ( '6', '6', '1' );
INSERT INTO `ordersproducts`(`order_id`,`product_id`,`amount`) VALUES ( '7', '36', '1' );
INSERT INTO `ordersproducts`(`order_id`,`product_id`,`amount`) VALUES ( '7', '6', '1' );
-- ---------------------------------------------------------


-- Dump data of "products" ---------------------------------
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '6', 'маленькая желтая уточка 6', 'маленькая, желтая', '106.00', '2', '2015-09-08 10:56:29', '0000-00-00 00:00:00', '2' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '40', 'маленькая желтая уточка 9', 'она маленькая', '123.00', '11', '2015-09-08 10:56:29', '0000-00-00 00:00:00', NULL );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '41', 'маленькая желтая уточка 16', 'она большая', '302.00', '8', '2015-09-08 10:56:29', '0000-00-00 00:00:00', NULL );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '42', 'утка-солдат', 'Утка в виде солдата', '210.00', '14', '2015-10-02 10:50:49', '0000-00-00 00:00:00', '2' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '43', 'гигантская утка', 'утка очень большого размера', '510.00', '10', '2015-10-02 10:51:25', '0000-00-00 00:00:00', '3' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '44', 'утка-пират', 'симпатичная утка в виде пирата', '214.00', '9', '2015-10-02 10:52:03', '0000-00-00 00:00:00', '4' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '45', 'утка-фокусник', 'утка удивит вас и ваших друзей! Возьмите ее с собой везде, куда отправитесь.', '150.00', '20', '2015-10-02 10:53:30', '0000-00-00 00:00:00', '4' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '46', 'утка-пират', 'еще один пират в виде милой уточки', '140.00', '21', '2015-10-02 10:54:11', '0000-00-00 00:00:00', '4' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '47', 'утка с бабочкой', 'утка, одетая для праздника', '120.00', '18', '2015-10-02 10:54:48', '0000-00-00 00:00:00', '4' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '48', 'утка-повар', 'этот повар - тот, кто нужен для сопровождения в ванную, чтобы купание стало веселым', '130.00', '22', '2015-10-02 10:55:50', '0000-00-00 00:00:00', '5' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '49', 'утка-конгрессмен', 'хотите взглянуть на настоящего конгрессмена? нет проблем', '200.00', '23', '2015-10-02 10:56:29', '0000-00-00 00:00:00', '5' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '50', 'жених и невеста', 'эта парочка украсит вашу ванную', '130.00', '24', '2015-10-02 10:57:08', '0000-00-00 00:00:00', '2' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '51', 'утка-солдат', 'утка в камуфляже подойдет для всех', '300.00', '25', '2015-10-02 10:57:56', '0000-00-00 00:00:00', '6' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '52', 'утка-доктор', 'давно ли вы были на приеме у доктора? спрашивает вас эта модель', '100.00', '26', '2015-10-02 10:58:42', '0000-00-00 00:00:00', '2' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '53', 'утка-рэпер', 'модная игрушка для любителей современной музыки', '103.00', '12', '2015-10-02 10:59:26', '0000-00-00 00:00:00', '5' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '54', 'утка-выпускник', 'эта утка напомнит вам о собственном выпускном', '103.00', '27', '2015-10-02 11:00:06', '0000-00-00 00:00:00', '4' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '55', 'маленькая уточка', 'классическая желтая уточка для купания', '102.00', '15', '2015-10-02 11:00:35', '0000-00-00 00:00:00', '2' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '56', 'утка-серфингист', 'утка, покоряющая волны! пусть даже и в рамках вашей ванной', '103.00', '28', '2015-10-02 11:01:13', '0000-00-00 00:00:00', '3' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '57', 'разноцветная утка', 'взгляните на эти переливы красок!', '104.00', '29', '2015-10-02 11:01:52', '0000-00-00 00:00:00', '3' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '58', 'утка-пилот', 'эта утка не боится воздушных вихрей, так что смело берите ее с собой', '103.00', '13', '2015-10-02 11:02:34', '0000-00-00 00:00:00', '3' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '59', 'утка с сигарой', 'красивая утка, которая украсит ваш дом', '300.00', '30', '2015-10-02 11:03:14', '0000-00-00 00:00:00', '2' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '60', 'утиное сердце', 'сердце с большим количеством уточек внутри, наполните дом любовью', '103.00', '31', '2015-10-02 11:03:51', '0000-00-00 00:00:00', '3' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '61', 'утка-дайвингист', 'посмотрите на эту симпатичную утку и займитесь дайвингом сами', '300.00', '32', '2015-10-02 11:04:40', '0000-00-00 00:00:00', '4' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '62', 'классическая желтая утка', 'еще одна дань классике', '102.00', '33', '2015-10-02 11:05:22', '0000-00-00 00:00:00', '2' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '63', 'Утка-ученый', 'Утка-ученый напоминает о важности получения знаний', '304.00', '34', '2015-10-02 11:06:21', '0000-00-00 00:00:00', '4' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '64', 'утка со звездами', 'утка, украшенная звездами, оживит интерьер', '103.00', '35', '2015-10-02 11:07:53', '0000-00-00 00:00:00', '6' );
-- ---------------------------------------------------------


-- Dump data of "users" ------------------------------------
INSERT INTO `users`(`user_id`,`user_name`,`hash_password`) VALUES ( '1', 'admin', '$2y$10$YWLhre.iwBP0rZyFQkCEQOBzrFD3yCsGZ/2wEhfshpp7V4dCK4Vf.' );
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


