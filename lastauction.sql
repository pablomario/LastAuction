-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2014 a las 20:34:19
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `lastauction`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `producto` int(10) unsigned NOT NULL,
  `imagen` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `producto`, `imagen`) VALUES
(5, 7, '../productos/1413532740.jpg'),
(6, 8, '../productos/1413532860.jpg'),
(7, 9, '../productos/1413532920.jpg'),
(8, 10, '../productos/1413618720.jpg'),
(9, 12, '../productos/1413620160.jpg'),
(10, 16, '../productos/1413620460.jpg'),
(11, 17, '../productos/1413620520.jpg'),
(12, 18, '../productos/1413620580.jpg'),
(13, 19, '../productos/1413775020.jpg'),
(14, 20, '../productos/1413940080.jpg'),
(15, 22, '../productos/1414323300.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificaciones`
--

CREATE TABLE IF NOT EXISTS `notificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `tipo`, `descripcion`, `usuario`) VALUES
(1, 2, 'Â¡Enhorabuena! Has comprado el articulo <span>Camiseta friki</span> por: 15â‚¬. ', 4),
(2, 2, 'Â¡Enhorabuena! Has comprado el articulo <span>JUAN</span> por: 200â‚¬. ', 1),
(3, 2, 'Â¡Enhorabuena! Has comprado el articulo <span>Bicicleta de Paseo</span> por: 425â‚¬. ', 4),
(4, 0, 'Tu subasta <span>Telefono Molon</span> ha caducado', 4),
(5, 2, 'Â¡Enhorabuena! Has comprado el articulo <span>JUAN</span> por: 200â‚¬. ', 1),
(6, 2, 'Â¡Enhorabuena! Has comprado el articulo <span>JUAN</span> por: 200â‚¬. ', 1),
(7, 3, 'Â¡Genial! Tu puja de <span>20â‚¬</span> para <span>Bolsa de Viaje Bici</span> ha sido aceptada.', 4),
(8, 3, 'Â¡Genial! Tu puja de <span>302â‚¬</span> para <span>LG TElefono Final</span> ha sido aceptada.', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `preciominimo` int(10) unsigned NOT NULL,
  `categoria` int(1) unsigned NOT NULL,
  `fechainicial` int(10) unsigned NOT NULL,
  `fechafin` int(10) unsigned NOT NULL,
  `estado` int(1) unsigned NOT NULL,
  `usuario` int(10) unsigned NOT NULL,
  `comprador` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `titulo`, `descripcion`, `preciominimo`, `categoria`, `fechainicial`, `fechafin`, `estado`, `usuario`, `comprador`) VALUES
(10, 'Prueba', 'Articulo de Prueba', 10, 1, 1413618720, 2413829020, 1, 1, 0),
(12, 'Otro Telefono', 'funciona todo bien SS', 150, 5, 1413620160, 2413829020, 1, 1, 0),
(16, 'LG TElefono Final', 'Super telefono con de todo y algo mas', 300, 5, 1413620460, 2413829020, 1, 1, 0),
(17, 'Guantes Bicicleta', 'Bicicleta Anacleta lo mejor para tus manos', 12, 4, 1413620520, 2413829020, 1, 1, 0),
(18, 'Bolsa de Viaje Bici', 'PequeÃ±a bolsa de viaje para bicicleta lleva tus herramientas telefono comida', 15, 4, 1413620580, 2413829020, 1, 1, 0),
(19, 'Camiseta friki', 'camiseta friki code on', 10, 3, 1413775020, 2413829020, 2, 1, 0),
(20, 'JUAN', 'descripcion producto juan', 150, 5, 1413940080, 1414048080, 2, 4, 0),
(21, 'Universal SSL', 'Vendo Protocolo Universal SSL para webs o blogs , muy economico y facil de instalar', 20, 0, 1414323120, 1414539120, 1, 4, 0),
(22, 'LOGO SSL', 'bonito logo SSL', 135, 0, 1414323300, 1414431300, 1, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pujas`
--

CREATE TABLE IF NOT EXISTS `pujas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `producto` int(10) unsigned NOT NULL,
  `puja` int(10) unsigned NOT NULL,
  `usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `pujas`
--

INSERT INTO `pujas` (`id`, `producto`, `puja`, `usuario`) VALUES
(1, 20, 151, '1'),
(2, 20, 200, '1'),
(3, 19, 15, '4'),
(4, 12, 160, '4'),
(5, 17, 20, '4'),
(6, 17, 25, '4'),
(7, 18, 20, '4'),
(8, 16, 302, '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre`, `direccion`, `contrasena`) VALUES
(1, 'peibol@elhacker.net', 'Pablo Mario', 'c/ Santa Agueda 9', '7c6a180b36896a0a8c02787eeafb0e4c'),
(2, 'mario@gmail.com', 'Mario Garcia Lamata', 'c/ Santa Agueda 9', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'oscar@gmail.com', 'Oscar Mc tetis', 'C/ Pex 13', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'juan@juan.com', 'Juan', 'C/ Jota', '827ccb0eea8a706c4c34a16891f84e7b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
