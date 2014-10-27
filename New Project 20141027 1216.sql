-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.50-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema lastauction
--

CREATE DATABASE IF NOT EXISTS lastauction;
USE lastauction;

--
-- Definition of table `imagenes`
--

DROP TABLE IF EXISTS `imagenes`;
CREATE TABLE `imagenes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `producto` int(10) unsigned NOT NULL,
  `imagen` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `imagenes`
--

/*!40000 ALTER TABLE `imagenes` DISABLE KEYS */;
INSERT INTO `imagenes` (`id`,`producto`,`imagen`) VALUES 
 (5,7,'../productos/1413532740.jpg'),
 (6,8,'../productos/1413532860.jpg'),
 (7,9,'../productos/1413532920.jpg'),
 (8,10,'../productos/1413618720.jpg'),
 (9,12,'../productos/1413620160.jpg'),
 (10,16,'../productos/1413620460.jpg'),
 (11,17,'../productos/1413620520.jpg'),
 (12,18,'../productos/1413620580.jpg'),
 (13,19,'../productos/1413775020.jpg'),
 (14,20,'../productos/1413940080.jpg'),
 (15,21,'../productos/1414407120.jpg'),
 (16,22,'../productos/1414407480.jpg'),
 (17,23,'../productos/1414408200.jpg');
/*!40000 ALTER TABLE `imagenes` ENABLE KEYS */;


--
-- Definition of table `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notificaciones`
--

/*!40000 ALTER TABLE `notificaciones` DISABLE KEYS */;
INSERT INTO `notificaciones` (`id`,`tipo`,`descripcion`,`usuario`) VALUES 
 (1,2,'Â¡Enhorabuena! Has comprado el articulo <span>Camiseta friki</span> por: 15â‚¬. ',4),
 (2,2,'Â¡Enhorabuena! Has comprado el articulo <span>JUAN</span> por: 200â‚¬. ',1),
 (3,2,'Â¡Enhorabuena! Has comprado el articulo <span>Bicicleta de Paseo</span> por: 425â‚¬. ',4),
 (4,0,'Tu subasta <span>Telefono Molon</span> ha caducado',4),
 (5,2,'Â¡Enhorabuena! Has comprado el articulo <span>JUAN</span> por: 200â‚¬. ',1),
 (6,2,'Â¡Enhorabuena! Has comprado el articulo <span>JUAN</span> por: 200â‚¬. ',1),
 (7,3,'Â¡Genial! Tu puja de <span>20â‚¬</span> para <span>Bolsa de Viaje Bici</span> ha sido aceptada.',4),
 (8,3,'Â¡Genial! Tu puja de <span>302â‚¬</span> para <span>LG TElefono Final</span> ha sido aceptada.',4),
 (9,3,'Â¡Genial! Tu puja de <span>20â‚¬</span> para <span>Guantes Bicicleta</span> ha sido aceptada.',4),
 (10,3,'Â¡Genial! Tu puja de <span>11â‚¬</span> para <span>Prueba</span> ha sido aceptada.',4),
 (11,3,'Â¡Genial! Tu puja de <span>151â‚¬</span> para <span>Otro Telefono</span> ha sido aceptada.',4),
 (12,4,'Tus subasta <span>Twclado wave</span> se ha creado correctamente.',4);
/*!40000 ALTER TABLE `notificaciones` ENABLE KEYS */;


--
-- Definition of table `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `preciominimo` int(10) unsigned NOT NULL,
  `categoria` int(1) unsigned DEFAULT NULL,
  `fechainicial` int(10) unsigned NOT NULL,
  `fechafin` int(10) unsigned NOT NULL,
  `estado` int(1) unsigned NOT NULL,
  `usuario` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productos`
--

/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`,`titulo`,`descripcion`,`preciominimo`,`categoria`,`fechainicial`,`fechafin`,`estado`,`usuario`) VALUES 
 (10,'Prueba','Articulo de Prueba',10,1,1413618720,2413829020,1,1),
 (12,'Otro Telefono','funciona todo bien SS',150,5,1413620160,2413829020,1,1),
 (16,'LG TElefono Final','Super telefono con de todo y algo mas',300,5,1413620460,2413829020,1,1),
 (17,'Guantes Bicicleta','Bicicleta Anacleta lo mejor para tus manos',12,4,1413620520,2413829020,1,1),
 (18,'Bolsa de Viaje Bici','PequeÃ±a bolsa de viaje para bicicleta lleva tus herramientas telefono comida',15,4,1413620580,2413829020,1,1),
 (19,'Camiseta friki','camiseta friki code on',10,3,1413775020,2413829020,1,1),
 (20,'JUAN','descripcion producto juan',150,5,1413940080,1414048080,1,4),
 (21,'Coche Rojo','adwadwadawdaw',200000,2,1414407120,1414461120,1,4),
 (22,'Reloj Casio','Ca sio de esos mÃ­ticos relojes? siÃ©ntete hipster co nesta maravilla',250,2,1414407480,1414461480,1,4),
 (23,'Twclado wave','teclado wave logitec muy chulo molon y tope hacker',25,5,1414408200,1414516200,1,4);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;


--
-- Definition of table `pujas`
--

DROP TABLE IF EXISTS `pujas`;
CREATE TABLE `pujas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `producto` int(10) unsigned NOT NULL,
  `puja` int(10) unsigned NOT NULL,
  `usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pujas`
--

/*!40000 ALTER TABLE `pujas` DISABLE KEYS */;
INSERT INTO `pujas` (`id`,`producto`,`puja`,`usuario`) VALUES 
 (1,20,151,'1'),
 (2,20,200,'1'),
 (3,19,15,'4'),
 (4,17,20,'4'),
 (5,10,11,'4'),
 (6,12,151,'4');
/*!40000 ALTER TABLE `pujas` ENABLE KEYS */;


--
-- Definition of table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(60) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`,`email`,`nombre`,`direccion`,`contrasena`) VALUES 
 (1,'peibol@elhacker.net','Pablo Mario','c/ Santa Agueda 9','7c6a180b36896a0a8c02787eeafb0e4c'),
 (2,'mario@gmail.com','Mario Garcia Lamata','c/ Santa Agueda 9','827ccb0eea8a706c4c34a16891f84e7b'),
 (3,'oscar@gmail.com','Oscar Mc tetis','C/ Pex 13','827ccb0eea8a706c4c34a16891f84e7b'),
 (4,'juan@juan.com','Juan','C/ Jota','827ccb0eea8a706c4c34a16891f84e7b');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
