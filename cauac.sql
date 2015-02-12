-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 06, 2015 at 07:20 AM
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
-- Table structure for table `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
`codigo` int(11) NOT NULL COMMENT 'Codigo Mensaje',
  `titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Titulo Mensaje',
  `contenido` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Contenido Mensaje',
  `emisor` int(11) NOT NULL COMMENT 'Emisor',
  `receptor` int(11) NOT NULL COMMENT 'Receptor',
  `fecha` date NOT NULL COMMENT 'Fecha'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabal de Mensajes';

--
-- Dumping data for table `mensajes`
--

INSERT INTO `mensajes` (`codigo`, `titulo`, `contenido`, `emisor`, `receptor`, `fecha`) VALUES
(1, 'mensaje 1', 'Este es un mensaje de prueba enviado por el admin.', 123, 123, '2015-02-06'),
(2, 'mensaje 2', 'Otro mensaje mas de prueba.', 123, 123, '2015-02-06');

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
  `empresa` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Empresa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de usuarios';

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `nombres`, `apellidos`, `usuario`, `clave`, `rol`, `empresa`) VALUES
(123, 'camilo', 'rodriguez', 'camilo', '123', 1, 'bla');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mensajes`
--
ALTER TABLE `mensajes`
 ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`cedula`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mensajes`
--
ALTER TABLE `mensajes`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo Mensaje',AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
