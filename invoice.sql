-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.31-MariaDB-0ubuntu0.20.04.1 - Ubuntu 20.04
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for invoice
CREATE DATABASE IF NOT EXISTS `invoice` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `invoice`;

-- Dumping structure for table invoice.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` tinytext NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` int(20) NOT NULL,
  `paid` int(20) NOT NULL,
  `balance` int(20) NOT NULL,
  `note` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table invoice.invoice: ~1 rows (approximately)
DELETE FROM `invoice`;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` (`id`, `name`, `email`, `phone`, `address`, `date`, `total`, `paid`, `balance`, `note`) VALUES
	(52, 'Neha Qureshi', 'munuwap@gmail.com', 999999999, 'Natipora Srinagar Jammu and Kashmir India-190001', '2021-08-13 09:20:54', 850, 825, 25, 'Vegetable purchase '),
	(53, 'Muntazir Yarikul Updated', 'muntazir@yarikul.in', 9419017976, 'Mehjoor nagar srinagar', '2021-08-13 13:47:01', 23000, 20000, 3000, 'It is the last test for now');
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;

-- Dumping structure for table invoice.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table invoice.products: ~8 rows (approximately)
DELETE FROM `products`;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `invoice`, `name`, `price`) VALUES
	(138, 52, 'Potato', 50),
	(139, 52, 'Paneer', 200),
	(140, 52, 'Onion', 40),
	(141, 52, 'Tomato', 60),
	(142, 52, 'Brocolli', 500),
	(169, 53, 'mobile', 5000),
	(170, 53, 'laptop', 10000),
	(171, 53, 'desktop', 8000);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
