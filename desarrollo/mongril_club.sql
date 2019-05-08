-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:8889
-- Generation Time: Oct 18, 2017 at 02:28 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mongril_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `administradores`
--

CREATE TABLE IF NOT EXISTS `administradores` (
  `administrador_id` int(10) unsigned NOT NULL,
  `username` varchar(120) DEFAULT NULL,
  `password` varchar(90) DEFAULT NULL,
  `rol` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `administradores`
--

INSERT INTO `administradores` (`administrador_id`, `username`, `password`, `rol`) VALUES
(1, 'nachovazquez', 'taco', 1),
(2, 'pablo', 'taco', 2),
(3, 'manuel', 'taco', 2),
(4, 'serrano', 'taco', 2);

-- --------------------------------------------------------

--
-- Table structure for table `consumos`
--

CREATE TABLE IF NOT EXISTS `consumos` (
  `consumo_id` int(10) unsigned NOT NULL,
  `socios_id` int(10) unsigned NOT NULL,
  `productos_id` int(10) unsigned NOT NULL,
  `cantidad` float(10,2) NOT NULL,
  `importe` float(10,2) NOT NULL,
  `fecha` varchar(16) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `consumos`
--

INSERT INTO `consumos` (`consumo_id`, `socios_id`, `productos_id`, `cantidad`, `importe`, `fecha`) VALUES
(1, 3, 3, 3.00, 15.00, '13/09/17 | 08:26'),
(2, 2, 3, 3.00, 15.00, '13/09/17 | 08:27'),
(3, 4, 3, 3.00, 15.00, '13/09/17 | 08:27'),
(5, 1, 16, 1.00, 3.00, '19/09/17 | 3:57'),
(6, 1, 16, 1.00, 3.00, '19/09/17 | 4:27'),
(7, 1, 16, 1.00, 3.00, '19/09/17 | 6:30'),
(8, 1, 2, 1.00, 1.00, '20/09/17 | 13:55'),
(9, 1, 8, 2.00, 14.00, '20/09/17 | 14:07'),
(10, 6, 2, 1.00, 1.00, '20/09/17 | 14:12'),
(11, 7, 2, 1.00, 1.00, '20/09/17 | 14:12'),
(12, 1, 13, 2.00, 20.00, '20/09/17 | 15:20'),
(13, 1, 7, 0.62, 10.00, '20/09/17 | 15:22'),
(14, 2, 19, 2.00, 5.00, '20/09/17 | 15:27'),
(15, 6, 7, 5.00, 80.00, '20/09/17 | 15:27'),
(16, 3, 4, 5.00, 35.00, '20/09/17 | 15:28'),
(17, 6, 7, 1.25, 20.00, '20/09/17 | 15:31'),
(18, 6, 5, 5.00, 35.00, '20/09/17 | 15:32'),
(19, 1, 3, 4.00, 20.00, '20/09/17 | 15:33'),
(20, 4, 15, 3.00, 1.50, '20/09/17 | 15:38'),
(21, 4, 12, 1.00, 1.00, '20/09/17 | 15:38'),
(22, 7, 18, 3.00, 3.00, '20/09/17 | 15:42'),
(23, 6, 7, 1.88, 30.00, '20/09/17 | 15:42'),
(24, 6, 20, 5.00, 40.00, '20/09/17 | 15:48'),
(25, 6, 20, 5.00, 40.00, '20/09/17 | 16:01'),
(26, 6, 20, 3.75, 30.00, '20/09/17 | 16:01'),
(27, 2, 20, 3.75, 30.00, '20/09/17 | 16:33'),
(28, 8, 5, 1.43, 10.00, '20/09/17 | 16:38'),
(29, 8, 17, 4.00, 8.80, '20/09/17 | 16:38'),
(30, 8, 8, 5.00, 35.00, '20/09/17 | 16:38'),
(32, 8, 10, 2.00, 2.00, '20/09/17 | 16:38'),
(33, 8, 4, 5.71, 40.00, '20/09/17 | 16:38'),
(34, 2, 5, 4.29, 30.00, '20/09/17 | 16:40'),
(35, 2, 18, 2.00, 2.00, '20/09/17 | 16:40'),
(36, 2, 13, 1.00, 10.00, '20/09/17 | 16:40'),
(37, 2, 8, 2.86, 20.00, '20/09/17 | 16:40'),
(38, 2, 7, 3.12, 50.00, '20/09/17 | 16:40'),
(39, 9, 7, 1.25, 20.00, '20/09/17 | 17:34'),
(40, 9, 20, 2.50, 20.00, '20/09/17 | 17:35'),
(41, 9, 5, 4.29, 30.00, '20/09/17 | 17:35'),
(42, 9, 5, 71.43, 500.00, '20/09/17 | 17:36'),
(43, 1, 8, 1.43, 10.00, '21/09/17 | 0:52'),
(44, 1, 19, 40.00, 100.00, '21/09/17 | 0:53'),
(45, 6, 14, 2.00, 6.00, '21/09/17 | 0:56'),
(46, 6, 5, 2.86, 20.00, '21/09/17 | 22:51'),
(50, 1, 12, 2.00, 2.00, '22/09/17 | 4:23:'),
(51, 1, 14, 1.00, 3.00, '22/09/17 | 4:24'),
(52, 4, 3, 4.00, 20.00, '22/09/17 | 4:25'),
(53, 1, 18, 1.00, 1.00, '22/09/17 | 4:34'),
(54, 10, 3, 20.00, 100.00, '24/09/17 | 22:03');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `producto_id` int(10) unsigned NOT NULL,
  `producto` varchar(65) DEFAULT NULL,
  `precio` float(10,2) DEFAULT NULL,
  `tipos_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`producto_id`, `producto`, `precio`, `tipos_id`) VALUES
(1, 'Café con Leche', 1.20, 6),
(2, 'Café Solo', 1.00, 6),
(3, 'Chefchaouen', 5.00, 2),
(4, 'Caramella Cream', 7.00, 2),
(5, 'White Widow', 7.00, 1),
(6, 'Super Skunk', 8.00, 1),
(7, 'La Vaina', 16.00, 4),
(8, 'Tio Paco', 7.00, 3),
(9, 'Galleta', 0.25, 7),
(10, '5 galletas', 1.00, 7),
(11, 'Mamada', 6.20, 8),
(12, 'Papel Falso', 1.00, 5),
(13, 'Pipeta', 10.00, 5),
(14, 'Batido', 3.00, 6),
(15, 'Magdalena', 0.50, 7),
(16, 'Gofre', 3.00, 7),
(17, 'Porción de Pizza', 2.20, 7),
(18, 'Cerveza Lata', 1.00, 6),
(19, 'Perrito Caliente', 2.50, 7),
(20, 'Babilonica', 8.00, 1),
(21, 'Nano', 5.00, 2),
(22, 'Yerba de la Cuaderna', 10.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `socios`
--

CREATE TABLE IF NOT EXISTS `socios` (
  `socio_id` int(10) unsigned NOT NULL,
  `nombre` varchar(65) NOT NULL,
  `apellido_p` varchar(65) NOT NULL,
  `apellido_s` varchar(65) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `fecha_nac` varchar(10) NOT NULL,
  `email` varchar(65) DEFAULT NULL,
  `foto` varchar(120) NOT NULL,
  `firma` varchar(120) NOT NULL,
  `saldo` float(10,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `socios`
--

INSERT INTO `socios` (`socio_id`, `nombre`, `apellido_p`, `apellido_s`, `dni`, `fecha_nac`, `email`, `foto`, `firma`, `saldo`) VALUES
(1, 'Ignacio', 'Vázquez', 'Pingarrón', '51129162-R', '1990-06-29', 'nachovazquez@msn.com', '1.jpg', '1.jpg', 819.00),
(2, 'Pablo', 'Desantes', 'Fernández', '23345432-D', '1989-02-15', 'pablo77@hotmail.com', '2.jpg', '2.jpg', 838.00),
(3, 'Manuel', 'Kirksaether', 'Argentino', '34456345-T', '1987-12-22', 'yayux@gmail.com', '3.jpg', '3.jpg', 711.00),
(4, 'Alejandro', 'Serrano', 'Acelerado', '27736465-S', '1989-07-03', 'serrano_acelerado@gmail.com', '4.jpg', '4.jpg', 962.50),
(6, 'Santiago', 'Ojeda', 'Botán', '98876567-B', '1989-09-24', 'elchiringodelboke@hotmail.com', '5.jpg', '5.jpg', 954.00),
(7, 'Victor ', 'Bombín', 'Álvarez', '87765387-B', '1990-09-20', 'bobino@hotmail.com', '6.jpg', '6.jpg', 996.00),
(8, 'Guillermo', 'Gutierrez', 'Mellado', '78889234-O', '1988-12-21', 'g.gutierrez.m@gmail.com', '7.jpg', '7.jpg', 904.20),
(9, 'Omar ', 'Castillo', 'Venesuela', '43356789-O', '1990-05-06', 'omar_owner@gmail.com', '8.jpg', '7.jpg', 430.00),
(10, 'Javier', 'Couce', 'Langa', '47789123-G', '1989-05-05', 'couce@gmail.com', '9.jpg', '6.jpg', 900.00);

-- --------------------------------------------------------

--
-- Table structure for table `tipos`
--

CREATE TABLE IF NOT EXISTS `tipos` (
  `tipo_id` int(10) unsigned NOT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipos`
--

INSERT INTO `tipos` (`tipo_id`, `tipo`) VALUES
(1, 'Yerba'),
(2, 'Hachís'),
(3, 'Resina'),
(4, 'Extracción'),
(5, 'Parafernalia'),
(6, 'Bebida'),
(7, 'Comida'),
(8, 'Servicio');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`administrador_id`);

--
-- Indexes for table `consumos`
--
ALTER TABLE `consumos`
  ADD PRIMARY KEY (`consumo_id`,`socios_id`,`productos_id`),
  ADD KEY `fk_consumos_socios_idx` (`socios_id`) USING BTREE,
  ADD KEY `fk_consumos_productos_idx` (`productos_id`) USING BTREE;

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`,`tipos_id`),
  ADD KEY `fk_productos_tipos_idx` (`tipos_id`);

--
-- Indexes for table `socios`
--
ALTER TABLE `socios`
  ADD PRIMARY KEY (`socio_id`);

--
-- Indexes for table `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`tipo_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores`
--
ALTER TABLE `administradores`
  MODIFY `administrador_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `consumos`
--
ALTER TABLE `consumos`
  MODIFY `consumo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `socios`
--
ALTER TABLE `socios`
  MODIFY `socio_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tipos`
--
ALTER TABLE `tipos`
  MODIFY `tipo_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `consumos`
--
ALTER TABLE `consumos`
  ADD CONSTRAINT `fk_consumo_productos` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`producto_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_consumos_socios` FOREIGN KEY (`socios_id`) REFERENCES `socios` (`socio_id`) ON UPDATE CASCADE;

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_tipos` FOREIGN KEY (`tipos_id`) REFERENCES `tipos` (`tipo_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
