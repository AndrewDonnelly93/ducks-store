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
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 7;
-- ---------------------------------------------------------


-- CREATE TABLE "category" ---------------------------------
CREATE TABLE `category` ( 
	`id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`title` VarChar( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL, 
	`description` Text CHARACTER SET utf8 COLLATE utf8_general_ci NULL, 
	`created_at` DateTime NULL, 
	`updated_at` DateTime NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 1;
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
AUTO_INCREMENT = 17;
-- ---------------------------------------------------------


-- CREATE TABLE "orders" -----------------------------------
CREATE TABLE `orders` ( 
	`order_id` Int( 11 ) AUTO_INCREMENT NOT NULL, 
	`customer_id` Int( 11 ) NOT NULL, 
	`cost` Int( 11 ) NOT NULL, 
	`order_date` DateTime NOT NULL,
	 PRIMARY KEY ( `order_id` )
 )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
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
AUTO_INCREMENT = 43;
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


-- Dump data of "categories" -------------------------------
INSERT INTO `categories`(`id`,`title`) VALUES ( '1', 'Азиатские утки' );
INSERT INTO `categories`(`id`,`title`) VALUES ( '2', 'Европейские утки' );
INSERT INTO `categories`(`id`,`title`) VALUES ( '3', 'Резиновые утки' );
INSERT INTO `categories`(`id`,`title`) VALUES ( '4', 'Российские утки' );
INSERT INTO `categories`(`id`,`title`) VALUES ( '5', 'Английские утки' );
INSERT INTO `categories`(`id`,`title`) VALUES ( '6', 'Оранжевые утки' );
-- ---------------------------------------------------------


-- Dump data of "category" ---------------------------------
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
-- ---------------------------------------------------------


-- Dump data of "orders" -----------------------------------
INSERT INTO `orders`(`order_id`,`customer_id`,`cost`,`order_date`) VALUES ( '1', '1', '104', '2015-09-20 22:22:49' );
INSERT INTO `orders`(`order_id`,`customer_id`,`cost`,`order_date`) VALUES ( '2', '1', '210', '2015-09-21 14:55:40' );
-- ---------------------------------------------------------


-- Dump data of "ordersproducts" ---------------------------
INSERT INTO `ordersproducts`(`order_id`,`product_id`,`amount`) VALUES ( '1', '3', '1' );
INSERT INTO `ordersproducts`(`order_id`,`product_id`,`amount`) VALUES ( '2', '2', '1' );
INSERT INTO `ordersproducts`(`order_id`,`product_id`,`amount`) VALUES ( '2', '3', '1' );
-- ---------------------------------------------------------


-- Dump data of "products" ---------------------------------
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '2', 'маленькая желтая уточка 25', 'она маленькая и резиновая (edited-8)                ', '106.00', '16', '2015-09-08 10:56:29', '2015-09-16 20:32:01', '4' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '3', 'маленькая желтая уточка 18', 'она маленькая и желтая (edited-3)   ', '104.00', '14', '2015-09-08 10:56:29', '2015-09-16 19:19:28', '2' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '4', 'маленькая желтая уточка 6', 'она маленькая ', '103.00', '1', '2015-09-08 10:56:29', '0000-00-00 00:00:00', '1' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '6', 'маленькая желтая уточка 6', 'маленькая, желтая', '106.00', '2', '2015-09-08 10:56:29', '0000-00-00 00:00:00', '2' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '24', 'маленькая желтая уточка 7', 'она маленькая ', '107.00', '1', NULL, '2015-09-16 19:41:41', '1' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '35', 'маленькая желтая уточка 11', 'она маленькая', '123.00', '1', NULL, '0000-00-00 00:00:00', '2' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '36', 'маленькая желтая уточка 11', 'она маленькая', '123.00', '9', NULL, '0000-00-00 00:00:00', '2' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '38', 'маленькая желтая уточка 112', 'она желтая', '105.00', '10', NULL, '0000-00-00 00:00:00', '1' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '40', 'маленькая желтая уточка 9', 'она маленькая', '123.00', '11', NULL, '0000-00-00 00:00:00', '1' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '41', 'маленькая желтая уточка 16', 'она большая', '302.00', '8', NULL, '0000-00-00 00:00:00', '1' );
INSERT INTO `products`(`id`,`title`,`description`,`price`,`image_id`,`created_at`,`updated_at`,`category_id`) VALUES ( '42', 'маленькая уточка 3', 'она маленькая', '104.00', '1', '2015-09-20 16:52:48', '0000-00-00 00:00:00', '5' );
-- ---------------------------------------------------------


-- Dump data of "properties" -------------------------------
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


