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
-- Table structure for table `foros`
--

CREATE TABLE IF NOT EXISTS `foros` (
`codigo` int(11) NOT NULL COMMENT 'Codigo Foro',
  `titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Titulo Foro',
  `contenido` varchar(2000) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Contenido Foro',
  `archivo` varchar(150) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Archivo Foro',
  `videoURL` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Video de youtube'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Foros';

--
-- Dumping data for table `foros`
--

INSERT INTO `foros` (`codigo`, `titulo`, `contenido`, `archivo`, `videoURL`) VALUES
(17, 'bla1', 'blaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '9501.sql', 'https://www.youtube.com/embed/WB_MOsJjkaU');

-- --------------------------------------------------------

--
-- Table structure for table `foro_mensajes`
--

CREATE TABLE IF NOT EXISTS `foro_mensajes` (
`codigo` int(11) NOT NULL,
  `codigoForo` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `contenido` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'FEcha creacion comentario'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `foro_mensajes`
--

INSERT INTO `foro_mensajes` (`codigo`, `codigoForo`, `cedula`, `contenido`, `fecha`) VALUES
(11, 17, 123, 'aaaaaaaaaaaaaa', '2015-02-24 06:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `foro_usuarios`
--

CREATE TABLE IF NOT EXISTS `foro_usuarios` (
`codigo` int(11) NOT NULL COMMENT 'Codigo',
  `codigoforo` int(11) NOT NULL COMMENT 'Codigo foro',
  `cedula` int(11) NOT NULL COMMENT 'cedula'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Usuarios permitidos foro';

--
-- Dumping data for table `foro_usuarios`
--

INSERT INTO `foro_usuarios` (`codigo`, `codigoforo`, `cedula`) VALUES
(8, 17, 456);

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
  `fecha` date NOT NULL COMMENT 'Fecha',
  `archivo` varchar(150) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Archivo mensaje'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabal de Mensajes';

--
-- Dumping data for table `mensajes`
--

INSERT INTO `mensajes` (`codigo`, `titulo`, `contenido`, `emisor`, `receptor`, `fecha`, `archivo`) VALUES
(2, 'mensaje 2', 'Otro mensaje mas de prueba.', 123, 123, '2015-02-06', ''),
(3, 'RE:mensaje 1', 'aaaaaaaaaaa', 123, 123, '2015-02-13', ''),
(6, 'mensaje 3', 'mas pruebas', 456, 123, '2015-02-06', ''),
(7, 'RE:mensaje 3', 'mensaje a robin', 123, 456, '2015-02-13', ''),
(8, 'RE:RE:mensaje 3', 'recibido camilo :P', 456, 123, '2015-02-13', ''),
(9, 'mensaje envio', 'redaactar algo', 123, 123, '2015-02-13', ''),
(10, 'mensaje a robin', 'asdnlasd aslkd aslkdskld', 123, 456, '2015-02-13', ''),
(11, 'mensaje a todos camilo y robin', 'mensaje de pruebas a todos', 123, 123, '2015-02-13', ''),
(12, 'mensaje a todos camilo y robin', 'mensaje de pruebas a todos', 123, 456, '2015-02-13', ''),
(13, 'mensje a todos!', 'sssssssssssss', 456, 123, '2015-02-13', ''),
(14, 'a camilo', 'qqqqqqqqqqqqq', 789, 123, '2015-02-13', ''),
(15, 'a todos desde rambo', 'qqqqqqqqqqqqqqq', 789, 123, '2015-02-13', ''),
(16, 'a todos desde rambo', 'qqqqqqqqqqqqqqq', 789, 456, '2015-02-13', ''),
(17, 'RE:a todos desde rambo', 'assssssssssssssssssa aaaaaaaaaaaaaaaaaaasssssssss aaaasssss', 123, 789, '2015-02-17', ''),
(18, 'RE:mensaje 2', '            otro mensaje de prueba parte 2\n\n            Otro mensaje mas de prueba.        ', 123, 123, '2015-02-18', ''),
(19, 'RE:mensaje 2', 'respuesta numero 1\n\n        Otro mensaje mas de prueba.', 123, 123, '2015-02-18', ''),
(20, 'RE:RE:mensaje 2', 'respuesta 2\n\n        respuesta numero 1\n\n        Otro mensaje mas de prueba.', 123, 123, '2015-02-18', ''),
(21, 'RE:a camilo', 'qqqqqq 2\n\n__________________________\n        qqqqqqqqqqqqq', 123, 789, '2015-02-18', ''),
(22, 'RE:RE:a camilo', 'qqqqqqqq3\n\n__________________________\n        qqqqqq 2\n\n__________________________\n        qqqqqqqqqqqqq', 789, 123, '2015-02-18', ''),
(23, 'RE:RE:RE:a camilo', 'qqqqqqqq 4\n\n__________________________\n        qqqqqqqq3\n\n__________________________\n        qqqqqq 2\n\n__________________________\n        qqqqqqqqqqqqq', 123, 789, '2015-02-18', ''),
(24, 'foro aaaaa', 'blaaaaaaaaaaaaaaaaa', 123, 456, '2015-02-20', '94479.jpg'),
(25, 'foro aaaaa', 'blaaaaaaaaaaaaaaaaa', 123, 789, '2015-02-20', '94479.jpg'),
(26, 'RE:RE:mensaje 3', 'blaaa mensaje robin 2\n\n__________________________\n            mensaje a robin', 456, 123, '2015-02-20', '41440.jpg');

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
-- Indexes for table `foros`
--
ALTER TABLE `foros`
 ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `foro_mensajes`
--
ALTER TABLE `foro_mensajes`
 ADD PRIMARY KEY (`codigo`);

--
-- Indexes for table `foro_usuarios`
--
ALTER TABLE `foro_usuarios`
 ADD PRIMARY KEY (`codigo`);

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
-- AUTO_INCREMENT for table `foros`
--
ALTER TABLE `foros`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo Foro',AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `foro_mensajes`
--
ALTER TABLE `foro_mensajes`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `foro_usuarios`
--
ALTER TABLE `foro_usuarios`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo',AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mensajes`
--
ALTER TABLE `mensajes`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo Mensaje',AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
