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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

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
 (13,19,'../productos/1413775020.jpg');
/*!40000 ALTER TABLE `imagenes` ENABLE KEYS */;


--
-- Definition of table `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productos`
--

/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id`,`titulo`,`descripcion`,`preciominimo`,`compradirecta`,`fechainicial`,`fechafin`,`estado`,`usuario`) VALUES 
 (10,'Prueba','Articulo de Prueba',10,0,1413618720,2413829020,1,1),
 (12,'Otro Telefono','funciona todo bien SS',150,0,1413620160,2413829020,1,1),
 (16,'LG TElefono Final','Super telefono con de todo y algo mas',300,0,1413620460,2413829020,1,1),
 (17,'Guantes Bicicleta','Bicicleta Anacleta lo mejor para tus manos',12,0,1413620520,2413829020,1,1),
 (18,'Bolsa de Viaje Bici','PequeÃ±a bolsa de viaje para bicicleta lleva tus herramientas telefono comida',15,0,1413620580,2413829020,1,1),
 (19,'Camiseta friki','camiseta friki code on',10,0,1413775020,2413829020,1,1);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;


--
-- Definition of table `pujas`
--

DROP TABLE IF EXISTS `pujas`;
CREATE TABLE `pujas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `producto` int(10) unsigned NOT NULL,
  `cantidad` int(10) unsigned NOT NULL,
  `usuario` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pujas`
--

/*!40000 ALTER TABLE `pujas` DISABLE KEYS */;
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
