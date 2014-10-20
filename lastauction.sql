-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2014 a las 20:04:03
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

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
(13, 19, '../productos/1413775020.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `preciominimo` int(10) unsigned NOT NULL,
  `compradirecta` int(10) unsigned NOT NULL,
  `fechainicial` int(10) unsigned NOT NULL,
  `fechafin` int(10) unsigned NOT NULL,
  `estado` int(1) unsigned NOT NULL,
  `usuario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `titulo`, `descripcion`, `preciominimo`, `compradirecta`, `fechainicial`, `fechafin`, `estado`, `usuario`) VALUES
(10, 'Prueba', 'Articulo de Prueba', 10, 0, 1413618720, 1413726720, 1, 1),
(12, 'Otro Telefono', 'funciona todo bien SS', 150, 0, 1413620160, 1413836160, 1, 1),
(16, 'LG TElefono Final', 'Super telefono con de todo y algo mas', 300, 0, 1413620460, 1413829020, 1, 1),
(17, 'Guantes Bicicleta', 'Bicicleta Anacleta lo mejor para tus manos', 12, 0, 1413620520, 1413829020, 1, 1),
(18, 'Bolsa de Viaje Bici', 'PequeÃ±a bolsa de viaje para bicicleta lleva tus herramientas telefono comida', 15, 0, 1413620580, 1413829020, 1, 1),
(19, 'Camiseta friki', 'camiseta friki code on', 10, 0, 1413775020, 1413829020, 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre`, `direccion`, `contrasena`) VALUES
(1, 'peibol@elhacker.net', 'Pablo Mario', 'c/ Santa Agueda 9', '7c6a180b36896a0a8c02787eeafb0e4c'),
(2, 'mario@gmail.com', 'Mario Garcia Lamata', 'c/ Santa Agueda 9', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'oscar@gmail.com', 'Oscar Mc tetis', 'C/ Pex 13', '827ccb0eea8a706c4c34a16891f84e7b');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
