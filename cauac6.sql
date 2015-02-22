-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2015 a las 23:07:22
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `producto_cauac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foros`
--

CREATE TABLE IF NOT EXISTS `foros` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo Foro',
  `titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Titulo Foro',
  `contenido` varchar(2000) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Contenido Foro',
  `archivo` varchar(150) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Archivo Foro',
  `videoURL` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Video de youtube',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Foros' AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `foros`
--

INSERT INTO `foros` (`codigo`, `titulo`, `contenido`, `archivo`, `videoURL`) VALUES
(25, 'Prueba foro 3', 'algun contenido ', 'no', 'https://www.youtube.com/embed/-CxKA1uETxE'),
(26, 'Prueba foro', 'contenido aleatorio prueba', 'no', 'https://www.youtube.com/embed/uMK0prafzw0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro_mensajes`
--

CREATE TABLE IF NOT EXISTS `foro_mensajes` (
  `codigo` int(11) NOT NULL,
  `codigoForo` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `contenido` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'FEcha creacion comentario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `foro_mensajes`
--

INSERT INTO `foro_mensajes` (`codigo`, `codigoForo`, `cedula`, `contenido`, `fecha`) VALUES
(0, 25, 5646854, 'oeee', '2015-02-18 03:17:19'),
(0, 26, 5646854, 'comentario de prueba 1', '2015-02-18 03:49:31'),
(0, 26, 123, 'comentario prueba 2', '2015-02-18 03:51:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro_usuarios`
--

CREATE TABLE IF NOT EXISTS `foro_usuarios` (
  `codigo` int(11) NOT NULL COMMENT 'Codigo',
  `codigoforo` int(11) NOT NULL COMMENT 'Codigo foro',
  `cedula` int(11) NOT NULL COMMENT 'cedula'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Usuarios permitidos foro';

--
-- Volcado de datos para la tabla `foro_usuarios`
--

INSERT INTO `foro_usuarios` (`codigo`, `codigoforo`, `cedula`) VALUES
(0, 25, 123),
(0, 25, 5646854),
(0, 26, 123),
(0, 26, 5646854);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Codigo Mensaje',
  `titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Titulo Mensaje',
  `contenido` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Contenido Mensaje',
  `emisor` int(11) NOT NULL COMMENT 'Emisor',
  `receptor` int(11) NOT NULL COMMENT 'Receptor',
  `fecha` date NOT NULL COMMENT 'Fecha',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabal de Mensajes' AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`codigo`, `titulo`, `contenido`, `emisor`, `receptor`, `fecha`) VALUES
(1, 'mensaje 1', 'Este es un mensaje de prueba enviado por el admin.', 123, 123, '2015-02-06'),
(3, 'RE:mensaje 1', 'sadfsdfasdfasdfasdf', 123, 123, '2015-02-17'),
(4, 'RE:mensaje 1', 'asdasdasdasd', 123, 123, '2015-02-17'),
(5, 'Mensaje 1', 'algun mensaje', 5646854, 123, '2015-02-17'),
(6, 'RE:Mensaje 1', 'respuesta a mensaje', 123, 5646854, '2015-02-17'),
(7, 'prueba comunicacion 1', 'algÃºn mensaje de prueba ', 123, 5646854, '2015-02-17'),
(8, 'RE:prueba comunicacion 1', 'respuesta x', 5646854, 123, '2015-02-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `cedula` int(11) NOT NULL COMMENT 'Cedula',
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Nombres',
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Apellidos',
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Usuario',
  `clave` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Clave',
  `rol` smallint(6) NOT NULL COMMENT 'Rol',
  `empresa` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Empresa',
  `aprobado` varchar(1) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'n' COMMENT 'Aprobacion usuario',
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de usuarios';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `nombres`, `apellidos`, `usuario`, `clave`, `rol`, `empresa`, `aprobado`) VALUES
(3, '3', '3', '3', '3', 0, '3', 'n'),
(123, 'camilo', 'rodriguez', 'camilo', '123', 1, 'bla', 's'),
(1234, 'w', 'e', 't', '123', 0, 'r', 'n'),
(12312, 'roberto', 'suarez', 'roberto', '123', 0, 'bla', 'n');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
