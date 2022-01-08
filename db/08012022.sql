-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.10-MariaDB-log - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6373
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ta_ibal
CREATE DATABASE IF NOT EXISTS `ta_ibal` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ta_ibal`;

-- Dumping structure for table ta_ibal.data_master
CREATE TABLE IF NOT EXISTS `data_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe` enum('atas','tengah','bawah') DEFAULT NULL,
  `jawaban` enum('B','S') DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table ta_ibal.data_master: ~6 rows (approximately)
DELETE FROM `data_master`;
INSERT INTO `data_master` (`id`, `tipe`, `jawaban`, `file`) VALUES
	(1, 'atas', 'B', '1641658760_b55f5f5407e6c260dc71.jpeg'),
	(2, 'atas', 'S', '1641649330_a8eb92fa6e55296d99b3.jpeg'),
	(3, 'tengah', 'B', '1641649343_364bf16d8d5c0a6cd630.jpeg'),
	(4, 'tengah', 'S', '1641649354_94211919dc08cb0b6b5d.jpeg'),
	(5, 'bawah', 'B', '1641649367_12fb1a6beea6aaab52b5.jpeg'),
	(6, 'bawah', 'S', '1641649380_365e6f0691cceefa2a86.jpeg');

-- Dumping structure for table ta_ibal.data_uji
CREATE TABLE IF NOT EXISTS `data_uji` (
  `id` int(11) DEFAULT NULL,
  `jawaban_atas` enum('B','S') DEFAULT NULL,
  `jawaban_tengah` enum('B','S') DEFAULT NULL,
  `jawaban_bawah` enum('B','S') DEFAULT NULL,
  `file_atas` varchar(255) DEFAULT NULL,
  `file_tengah` varchar(255) DEFAULT NULL,
  `file_bawah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ta_ibal.data_uji: ~0 rows (approximately)
DELETE FROM `data_uji`;

-- Dumping structure for table ta_ibal.deskripsi
CREATE TABLE IF NOT EXISTS `deskripsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status_atas` enum('B','S') NOT NULL,
  `status_tengah` enum('B','S') NOT NULL,
  `status_bawah` enum('B','S') NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Dumping data for table ta_ibal.deskripsi: ~4 rows (approximately)
DELETE FROM `deskripsi`;
INSERT INTO `deskripsi` (`id`, `status_atas`, `status_tengah`, `status_bawah`, `keterangan`) VALUES
	(1, 'B', 'B', 'B', 'werweww'),
	(2, 'B', 'B', 'S', 'dsfsd'),
	(3, 'B', 'S', 'B', '56'),
	(4, 'B', 'S', 'S', '234'),
	(5, 'S', 'B', 'B', 's'),
	(6, 'S', 'B', 'S', '12'),
	(7, 'S', 'S', 'B', 'sdfs'),
	(8, 'S', 'S', 'S', '5');

-- Dumping structure for table ta_ibal.jawaban
CREATE TABLE IF NOT EXISTS `jawaban` (
  `id` int(11) DEFAULT NULL,
  `tipe` int(11) DEFAULT NULL,
  `jawaban` int(11) DEFAULT NULL,
  `file` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ta_ibal.jawaban: ~0 rows (approximately)
DELETE FROM `jawaban`;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
