-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 01, 2021 at 07:21 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tienda`
--

-- --------------------------------------------------------

--
-- Table structure for table `articulos`
--

DROP TABLE IF EXISTS `articulos`;
CREATE TABLE IF NOT EXISTS `articulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `precio_compra` double NOT NULL,
  `precio_venta` double NOT NULL,
  `talla` varchar(20) NOT NULL,
  `existencias` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `proveedor` varchar(50) NOT NULL,
  `numero_proveedor` varchar(10) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delete_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `articulos`
--

INSERT INTO `articulos` (`id`, `nombre`, `marca`, `precio_compra`, `precio_venta`, `talla`, `existencias`, `fecha_ingreso`, `proveedor`, `numero_proveedor`, `create_at`, `delete_at`) VALUES
(11, 'Chamarrasssssss', 'levis', 200000000, 200000, 'Mediano', 20, '2021-06-01', 'No hay proveedor', '5535028899', '2021-07-01 23:56:47', '2021-07-01 23:56:47'),
(12, 'salkdalksdlasd', 'Pool', 100000, 150, 'Grandes', 10, '2021-06-01', 'Pool an bear', '1212121212', '2021-07-01 23:57:31', '2021-07-01 23:57:31'),
(6, 'salkdalksdlasd', 'Pool', 100000, 150, 'Grandes', 10, '2021-06-01', 'Pool an bear', '1212121212', '2021-06-03 07:02:30', '2021-06-03 07:02:30'),
(10, 'Pantalon', 'Levi\'s', 150, 200, '32', 10, '2021-06-03', 'Levi\'s', '5535028899', '2021-06-03 20:33:36', '2021-06-03 20:33:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
