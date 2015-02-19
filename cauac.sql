-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2015 a las 05:03:21
-- Versión del servidor: 5.6.14
-- Versión de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cauac`
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
  `videoURL` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Foros' AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `foros`
--

INSERT INTO `foros` (`codigo`, `titulo`, `contenido`, `archivo`, `videoURL`) VALUES
(2, 'Prueba Foro 1 ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ac nisi a sapien elementum pretium. Vestibulum a velit a ante interdum elementum eget ut diam. Aliquam erat volutpat. Cras hendrerit, felis ut feugiat sodales, est dolor blandit turpis, et varius justo sapien quis tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Integer fringilla volutpat bibendum. Phasellus euismod dapibus pretium. Praesent dictum maximus nibh eget rutrum. Vivamus tortor nisl, condimentum quis dui ut, viverra fringilla nibh. In placerat at libero ut egestas. Etiam non nisl at nulla tristique imperdiet eget quis leo. Cras tempor libero quis sagittis volutpat', '70181.jpg', 'https://www.youtube.com/embed/DHdkRvEzW84'),
(3, 'Prueba Foro 2 Sin video', 'Donec dictum erat vel quam rutrum posuere eu a mauris. Cras scelerisque iaculis eleifend. Proin a turpis elit. Nulla rutrum arcu ante, vel rutrum erat tristique ut. Phasellus tempor consequat libero ultrices sollicitudin. Vivamus viverra augue purus, vitae laoreet justo luctus id. In vulputate dictum risus id pellentesque. Etiam ultrices laoreet nunc, malesuada aliquet mauris aliquam ut. Proin ornare magna ante, eu ullamcorper nunc dapibus in. Nulla erat purus, mollis sit amet congue non, vestibulum vitae est. Proin id quam arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec eleifend ligula non ex tincidunt tristique. Praesent hendrerit magna lacinia ligula iaculis condimentum.', '67120.jpg', ''),
(4, 'Foro prueba sin imagen', 'Nullam in sapien finibus, aliquam nisi sed, molestie tellus. Nullam efficitur egestas diam, sit amet sollicitudin lacus molestie ut. Integer nec dolor porta, fringilla arcu nec, imperdiet elit. Maecenas in enim pretium, ornare lectus ac, pretium neque. In hac habitasse platea dictumst. Suspendisse finibus, turpis ut fermentum tempus, massa mi sodales felis, at volutpat sapien ipsum vitae elit. Donec a tellus velit. Quisque vitae massa in velit ullamcorper fermentum eu ut sem. Ut pretium dictum est ut faucibus. Curabitur scelerisque facilisis turpis, hendrerit consequat sapien dignissim semper. Morbi auctor erat a metus lacinia egestas. Donec vitae cursus turpis, porttitor facilisis erat. Curabitur ac libero lorem. Vivamus fringilla elit ut dapibus accumsan', '', 'https://www.youtube.com/embed/inb8MMZ-QmA'),
(5, 'Foro prueba sin video ni imagen', 'Nullam in sapien finibus, aliquam nisi sed, molestie tellus. Nullam efficitur egestas diam, sit amet sollicitudin lacus molestie ut. Integer nec dolor porta, fringilla arcu nec, imperdiet elit. Maecenas in enim pretium, ornare lectus ac, pretium neque. In hac habitasse platea dictumst. Suspendisse finibus, turpis ut fermentum tempus, massa mi sodales felis, at volutpat sapien ipsum vitae elit. Donec a tellus velit. Quisque vitae massa in velit ullamcorper fermentum eu ut sem. Ut pretium dictum est ut faucibus. Curabitur scelerisque facilisis turpis, hendrerit consequat sapien dignissim semper. Morbi auctor erat a metus lacinia egestas. Donec vitae cursus turpis, porttitor facilisis erat. Curabitur ac libero lorem. Vivamus fringilla elit ut dapibus accumsan', '', ''),
(6, 'Foro Prueba con archivo tipo pdf', 'Praesent dictum rhoncus metus sit amet suscipit. Mauris urna dui, egestas non metus vitae, facilisis mattis mauris. Donec nec aliquet massa. Sed congue turpis non rutrum mattis. Proin elementum posuere sodales. Morbi magna magna, lobortis non efficitur et, dictum id nunc. Cras consequat neque et nunc accumsan, ac auctor sem faucibus. Vestibulum diam risus, semper et pulvinar in, molestie sit amet magna. Vivamus pretium consectetur augue, non interdum neque elementum sit amet. Nam ornare neque id metus finibus, et interdum lectus gravida. Nullam at urna quis libero egestas maximus. Suspendisse potenti.', '89285.pdf', ''),
(7, 'Foro prueba con archivo cualquiera para descargar', 'Praesent dictum rhoncus metus sit amet suscipit. Mauris urna dui, egestas non metus vitae, facilisis mattis mauris. Donec nec aliquet massa. Sed congue turpis non rutrum mattis. Proin elementum posuere sodales. Morbi magna magna, lobortis non efficitur et, dictum id nunc. Cras consequat neque et nunc accumsan, ac auctor sem faucibus. Vestibulum diam risus, semper et pulvinar in, molestie sit amet magna. Vivamus pretium consectetur augue, non interdum neque elementum sit amet. Nam ornare neque id metus finibus, et interdum lectus gravida. Nullam at urna quis libero egestas maximus. Suspendisse potenti.', '64899.doc', ''),
(8, 'Foro prueba Doc y Video', 'Praesent dictum rhoncus metus sit amet suscipit. Mauris urna dui, egestas non metus vitae, facilisis mattis mauris. Donec nec aliquet massa. Sed congue turpis non rutrum mattis. Proin elementum posuere sodales. Morbi magna magna, lobortis non efficitur et, dictum id nunc. Cras consequat neque et nunc accumsan, ac auctor sem faucibus. Vestibulum diam risus, semper et pulvinar in, molestie sit amet magna. Vivamus pretium consectetur augue, non interdum neque elementum sit amet. Nam ornare neque id metus finibus, et interdum lectus gravida. Nullam at urna quis libero egestas maximus. Suspendisse potenti.', '89254.doc', 'https://www.youtube.com/embed/Tgb0jK143MI');

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
(0, 2, 123, 'Que buen foro comentario prueba 1', '2015-02-19 07:29:05'),
(0, 3, 123, 'prueba comentario 2', '2015-02-19 07:29:19'),
(0, 4, 123, 'prueba comentario 3', '2015-02-19 07:29:34'),
(0, 6, 123, 'se puede ver el archivo pdf en una nueva ventana', '2015-02-19 07:48:51'),
(0, 2, 123, 'Ha si es muy bueno ', '2015-02-19 08:18:55');

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
(0, 2, 123),
(0, 2, 456),
(0, 3, 123),
(0, 3, 456),
(0, 4, 123),
(0, 4, 456),
(0, 5, 123),
(0, 5, 456),
(0, 6, 123),
(0, 6, 456),
(0, 7, 123),
(0, 7, 456),
(0, 8, 123),
(0, 8, 456);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `codigo` int(11) NOT NULL COMMENT 'Codigo Mensaje',
  `titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Titulo Mensaje',
  `contenido` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Contenido Mensaje',
  `emisor` int(11) NOT NULL COMMENT 'Emisor',
  `receptor` int(11) NOT NULL COMMENT 'Receptor',
  `fecha` date NOT NULL COMMENT 'Fecha'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabal de Mensajes';

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`codigo`, `titulo`, `contenido`, `emisor`, `receptor`, `fecha`) VALUES
(1, 'mensaje 1', 'Este es un mensaje de prueba enviado por el admin.', 123, 123, '2015-02-06'),
(2, 'mensaje 2', 'Otro mensaje mas de prueba.', 123, 123, '2015-02-06'),
(1, 'mensaje 1', 'Este es un mensaje de prueba enviado por el admin.', 123, 123, '2015-02-06'),
(2, 'mensaje 2', 'Otro mensaje mas de prueba.', 123, 123, '2015-02-06'),
(3, 'RE:mensaje 1', 'aaaaaaaaaaa', 123, 123, '2015-02-13'),
(6, 'mensaje 3', 'mas pruebas', 456, 123, '2015-02-06'),
(7, 'RE:mensaje 3', 'mensaje a robin', 123, 456, '2015-02-13'),
(8, 'RE:RE:mensaje 3', 'recibido camilo :P', 456, 123, '2015-02-13'),
(9, 'mensaje envio', 'redaactar algo', 123, 123, '2015-02-13'),
(10, 'mensaje a robin', 'asdnlasd aslkd aslkdskld', 123, 456, '2015-02-13'),
(11, 'mensaje a todos camilo y robin', 'mensaje de pruebas a todos', 123, 123, '2015-02-13'),
(12, 'mensaje a todos camilo y robin', 'mensaje de pruebas a todos', 123, 456, '2015-02-13'),
(14, 'a camilo', 'qqqqqqqqqqqqq', 789, 123, '2015-02-13'),
(15, 'a todos desde rambo', 'qqqqqqqqqqqqqqq', 789, 123, '2015-02-13'),
(16, 'a todos desde rambo', 'qqqqqqqqqqqqqqq', 789, 456, '2015-02-13'),
(0, 'RE:mensaje 2', 'ricardo prueba mensaje ', 123, 123, '2015-02-17'),
(1, 'mensaje 1', 'Este es un mensaje de prueba enviado por el admin.', 123, 123, '2015-02-06'),
(2, 'mensaje 2', 'Otro mensaje mas de prueba.', 123, 123, '2015-02-06'),
(3, 'RE:mensaje 1', 'aaaaaaaaaaa', 123, 123, '2015-02-13'),
(6, 'mensaje 3', 'mas pruebas', 456, 123, '2015-02-06'),
(7, 'RE:mensaje 3', 'mensaje a robin', 123, 456, '2015-02-13'),
(8, 'RE:RE:mensaje 3', 'recibido camilo :P', 456, 123, '2015-02-13'),
(9, 'mensaje envio', 'redaactar algo', 123, 123, '2015-02-13'),
(10, 'mensaje a robin', 'asdnlasd aslkd aslkdskld', 123, 456, '2015-02-13'),
(11, 'mensaje a todos camilo y robin', 'mensaje de pruebas a todos', 123, 123, '2015-02-13'),
(12, 'mensaje a todos camilo y robin', 'mensaje de pruebas a todos', 123, 456, '2015-02-13'),
(13, 'mensje a todos!', 'sssssssssssss', 456, 123, '2015-02-13'),
(14, 'a camilo', 'qqqqqqqqqqqqq', 789, 123, '2015-02-13'),
(15, 'a todos desde rambo', 'qqqqqqqqqqqqqqq', 789, 123, '2015-02-13'),
(16, 'a todos desde rambo', 'qqqqqqqqqqqqqqq', 789, 456, '2015-02-13'),
(17, 'RE:a todos desde rambo', 'assssssssssssssssssa aaaaaaaaaaaaaaaaaaasssssssss aaaasssss', 123, 789, '2015-02-17');

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
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de usuarios';

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `nombres`, `apellidos`, `usuario`, `clave`, `rol`, `empresa`) VALUES
(123, 'camilo', 'rodriguez', 'camilo', '123', 1, 'bla'),
(456, 'daniel', 'hernandez', 'daniel', '456', 0, 'bla');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
