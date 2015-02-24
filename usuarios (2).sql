-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2015 at 03:08 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cauac`
--

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `cedula` int(11) NOT NULL COMMENT 'Cedula',
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombres',
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellidos',
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Usuario',
  `clave` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Clave',
  `rol` smallint(6) NOT NULL COMMENT 'Rol',
  `empresa` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Empresa',
  `cargo` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Cargo Empresa',
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Email',
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Telefono',
  `aprobado` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'n' COMMENT 'Aprobacion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de usuarios';

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `nombres`, `apellidos`, `usuario`, `clave`, `rol`, `empresa`, `cargo`, `correo`, `telefono`, `aprobado`) VALUES
(123, 'camilo', 'rodriguez', 'camilo', '123', 1, 'bla', '', '', '', 'n'),
(456, 'Robin', 'Hood', 'robin', '123', 1, 'bla', '', '', '', 'n'),
(789, 'Rambo', 'Tyson', 'rambo', '123', 0, 'bla9', '', '', '', 'n'),
(999999, 'Pedro', 'Vasquez', 'vasq', '123', 0, 'HP', 'Gerente', 'bla@hp.com', '1234567', 'n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`cedula`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
