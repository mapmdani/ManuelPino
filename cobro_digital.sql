-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 28, 2021 at 01:37 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cobro_digital`
--

-- --------------------------------------------------------

--
-- Table structure for table `archivos`
--

DROP TABLE IF EXISTS `archivos`;
CREATE TABLE IF NOT EXISTS `archivos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `archivo` varchar(100) NOT NULL,
  `procesado` tinyint(1) NOT NULL DEFAULT '0',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultima_actualizacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `filename` (`archivo`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pagosdirectos`
--

DROP TABLE IF EXISTS `pagosdirectos`;
CREATE TABLE IF NOT EXISTS `pagosdirectos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tipo_de_pago` varchar(20) NOT NULL,
  `transaccion` int(20) NOT NULL,
  `monto` decimal(20,2) NOT NULL DEFAULT '0.00',
  `identificador` varchar(30) NOT NULL,
  `fecha` date NOT NULL,
  `medio_de_pago` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=469067 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` text NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `foto` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  `ultimo_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `correo`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(59, 'Manuel Pino', 'manuel', 'mapmdani@gmail.com', '$2a$07$asxx54ahjppf45sd87a5aub7LdtrTXnn.ZQdALsthndsluPeTbv.a', 'Administrador', 'vistas/img/usuarios/manuel/910.jpg', 1, '2021-12-27 21:29:14', '2021-12-28 00:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_token`
--

DROP TABLE IF EXISTS `usuarios_token`;
CREATE TABLE IF NOT EXISTS `usuarios_token` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(10) NOT NULL,
  `Token` varchar(45) NOT NULL,
  `Estado` varchar(10) NOT NULL,
  `Fecha` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios_token`
--

INSERT INTO `usuarios_token` (`Id`, `id_usuario`, `Token`, `Estado`, `Fecha`) VALUES
(2, 59, '038686c9cfcdf436e9d9daadf97eba63', 'inactivo', '2021-12-22 22:14:26'),
(3, 59, '0f1a957e85cf5d7a5f193535627b5750', 'inactivo', '2021-12-22 22:47:33'),
(4, 59, 'fb5933f1d8f2cf652cbf1ea0a08b1971', 'inactivo', '2021-12-26 13:02:27'),
(5, 59, '4dea055332bc68dd6eb8b80f23528dd2', 'inactivo', '2021-12-27 09:52:41'),
(6, 59, 'c5fa78b261d75409b6e14833642888e6', 'inactivo', '2021-12-27 10:08:23'),
(7, 59, '4bd81c6854fffc46c56c4195ab806799', 'inactivo', '2021-12-27 13:33:22'),
(8, 59, 'cd54e03946a6f1fc4d28898f45c69e39', 'inactivo', '2021-12-27 14:33:16'),
(9, 59, 'a957c497fe90c624b74100b8570985e1', 'inactivo', '2021-12-27 15:02:28'),
(10, 59, '1ac7967a6fac2ed5c10d37f4985e70d1', 'activo', '2021-12-27 21:29:14');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
