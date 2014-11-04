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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

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
 (17,23,'../productos/1414408200.jpg'),
 (18,24,'../productos/1415010780.jpg'),
 (19,25,'../productos/1415010840.jpg'),
 (20,26,'../productos/1415011680.jpg'),
 (21,27,'../productos/1415100060.jpg'),
 (22,28,'../productos/1415062200.jpg'),
 (23,29,'../productos/1415062320.jpg'),
 (24,30,'../productos/1415062500.jpg');
/*!40000 ALTER TABLE `imagenes` ENABLE KEYS */;


--
-- Definition of table `notificaciones`
--

DROP TABLE IF EXISTS `notificaciones`;
CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notificaciones`
--

/*!40000 ALTER TABLE `notificaciones` DISABLE KEYS */;
INSERT INTO `notificaciones` (`id`,`tipo`,`descripcion`,`usuario`) VALUES 
 (1,2,'<p class=notificacionCompra> Â¡Enhorabuena! Has comprado el articulo <span>Camiseta friki</span> por: 15â‚¬. </p>',4),
 (2,2,'<p class=notificacionCompra> Â¡Enhorabuena! Has comprado el articulo <span>JUAN</span> por: 200â‚¬. </p>',1),
 (3,2,'<p class=notificacionCompra> Â¡Enhorabuena! Has comprado el articulo <span>Bicicleta de Paseo</span> por: 425â‚¬. </p>',4),
 (4,0,'<p class=notificacionCaducada>Tu subasta <span>Telefono Molon</span> ha caducado</p>',4),
 (5,2,'<p class=notificacionCompra> Â¡Enhorabuena! Has comprado el articulo <span>JUAN</span> por: 200â‚¬. </p>',1),
 (6,2,'<p class=notificacionCompra>Â¡Enhorabuena! Has comprado el articulo <span>JUAN</span> por: 200â‚¬. </p>',1),
 (7,3,'<p class=notificacionPuja> Â¡Genial! Tu puja de <span>20â‚¬</span> para <span>Bolsa de Viaje Bici</span> ha sido aceptada.</p>',4),
 (8,3,'<p class=notificacionPuja> Â¡Genial! Tu puja de <span>302â‚¬</span> para <span>LG TElefono Final</span> ha sido aceptada.</p>',4),
 (9,3,'<p class=notificacionPuja>Â¡Genial! Tu puja de <span>300â‚¬</span> para <span>Reloj Casio</span> ha sido aceptada.</p>',1),
 (10,3,'<p class=notificacionPuja>Â¡Genial! Tu puja de <span>201â‚¬</span> para <span>JUAN</span> ha sido aceptada.</p>',1),
 (11,3,'<p class=notificacionPuja>Â¡Genial! Tu puja de <span>302â‚¬</span> para <span>LG TElefono Final</span> ha sido aceptada.</p>',4),
 (12,3,'<p class=notificacionPuja>Â¡Genial! Tu puja de <span>26â‚¬</span> para <span>Twclado wave</span> ha sido aceptada.</p>',4),
 (13,3,'<p class=notificacionPuja>Â¡Genial! Tu puja de <span>250000â‚¬</span> para <span>Coche Rojo</span> ha sido aceptada.</p>',4),
 (14,3,'<p class=notificacionPuja>Â¡Genial! Tu puja de <span>16â‚¬</span> para <span>Camiseta friki</span> ha sido aceptada.</p>',4),
 (15,3,'<p class=notificacionPuja>Â¡Genial! Tu puja de <span>17â‚¬</span> para <span>Camiseta friki</span> ha sido aceptada.</p>',4),
 (16,3,'<p class=notificacionPuja>Â¡Genial! Tu puja de <span>20â‚¬</span> para <span>Bolsa de Viaje Bici</span> ha sido aceptada.</p>',4),
 (17,3,'<p class=notificacionPuja>Â¡Genial! Tu puja de <span>25â‚¬</span> para <span>Guantes Bicicleta</span> ha sido aceptada.</p>',5),
 (18,5,'<p class=notificacionSobrepuja>e ham sobrepujado en: <span>Guantes Bicicleta</span></p>',4),
 (19,3,'<p class=notificacionPuja>Â¡Genial! Tu puja de <span>260000â‚¬</span> para <span>Coche Rojo</span> ha sido aceptada.</p>',5),
 (20,5,'<p class=notificacionSobrepuja>e ham sobrepujado en: <span>Coche Rojo</span></p>',4),
 (21,3,'<p class=notificacionPuja>Â¡Genial! Tu puja de <span>26â‚¬</span> para <span>Guantes Bicicleta</span> ha sido aceptada.</p>',5),
 (22,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <span>Guantes Bicicleta</span></p>',4),
 (23,3,'<p class=notificacionPuja>Â¡Genial! Tu puja de <span>30â‚¬</span> para <span>Guantes Bicicleta</span> ha sido aceptada.</p>',5),
 (24,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <span>Guantes Bicicleta</span></p>',4),
 (25,3,'<p class=notificacionPuja>Â¡Genial! Tu puja de <span>50â‚¬</span> para <span>Guantes Bicicleta</span> ha sido aceptada.</p>',5),
 (26,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <span>Guantes Bicicleta</span></p>',4),
 (27,3,'<p class=notificacionPuja>Â¡Genial! Tu puja de <span>305â‚¬</span> para <span>LG TElefono Final</span> ha sido aceptada.</p>',5),
 (28,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <span>LG TElefono Final</span></p>',4),
 (29,3,'<p class=notificacionPuja>Â¡Genial! Tu puja de <span>25â‚¬</span> para <span>Bolsa de Viaje Bici</span> ha sido aceptada.</p>',5),
 (30,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <span>Bolsa de Viaje Bici</span></p>',4),
 (31,3,'<p class=notificacionPuja>Â¡Genial! Tu puja de <span>20â‚¬</span> para <span>Camiseta friki</span> ha sido aceptada.</p>',5),
 (32,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <span>Camiseta friki</span></p>',4),
 (33,0,'<p class=notificacionCaducada>Lo sentimos, su subasta <span>JUAN</span> ha caducado.</p>',4),
 (34,0,'<p class=notificacionCaducada>Lo sentimos, su subasta <span>Coche Rojo</span> ha caducado.</p>',4),
 (35,0,'<p class=notificacionCaducada>Lo sentimos, su subasta <span>Reloj Casio</span> ha caducado.</p>',4),
 (36,0,'<p class=notificacionCaducada>Lo sentimos, su subasta <span>Twclado wave</span> ha caducado.</p>',4),
 (37,4,'Tus subasta <span>Taxi RC Amarillo</span> se ha creado correctamente.',6),
 (38,4,'Tus subasta <span>Babas</span> se ha creado correctamente.',6),
 (39,4,'Tus subasta <span>Guacamole</span> se ha creado correctamente.',6),
 (40,0,'<p class=notificacionCaducada>Lo sentimos, su subasta <span>Babas</span> ha caducado.</p>',6),
 (41,4,'Tus subasta <span>Monitor</span> se ha creado correctamente.',9),
 (42,3,'Tu puja de 200â‚ para Taxi RC Amarillo ha sido aceptada.',1),
 (43,3,'Tu puja de <span>300â‚¬</span> para <a href=http://127.0.0.1/php/lastauction/solo.php?p=24 ><span>Taxi RC Amarillo</span></a> ha sido aceptada.',4),
 (44,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <a href=http://127.0.0.1/php/lastauction/solo.php?p=24 ><span>Taxi RC Amarillo</span></a></p>',1),
 (45,3,'Tu puja de <span>55â‚¬</span> para <a href=http://127.0.0.1/php/lastauction/solo.php?p=17><span>Guantes Bicicleta</span></a> ha sido aceptada.</p>',4),
 (46,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <a href=http://127.0.0.1/php/lastauction/solo.php?p=17 ><span>Guantes Bicicleta</span></a></p>',5),
 (47,3,'Tu puja de <span>400â‚¬</span> para <a href=http://127.0.0.1/php/lastauction/solo.php?p=16><span>LG TElefono Final</span></a> ha sido aceptada.',4),
 (48,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <a href=http://127.0.0.1/php/lastauction/solo.php?p=16 ><span>LG TElefono Final</span></a></p>',5),
 (49,3,'<p class=notificacionPuja>Tu puja de 300 para <a href=http://127.0.0.1/php/lastauction/solo.php?p=26 ><span>Guacamole</span></a></p>',5),
 (50,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <a href=http://127.0.0.1/php/lastauction/solo.php?p=26 ><span>Guacamole</span></a></p>',4),
 (51,3,'<p class=notificacionPuja>Genial! Tu puja de 1000000 para <a href=http://127.0.0.1/php/lastauction/solo.php?p=10 ><span>Prueba</span></a> ha sido aceptada</p>',5),
 (52,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <a href=http://127.0.0.1/php/lastauction/solo.php?p=10 ><span>Prueba</span></a></p>',9),
 (53,3,'<p class=notificacionPuja>Genial! Tu puja de 99999999 para <a href=http://127.0.0.1/php/lastauction/solo.php?p=10 ><span>Prueba</span></a> ha sido aceptada</p>',4),
 (54,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <a href=http://127.0.0.1/php/lastauction/solo.php?p=10 ><span>Prueba</span></a></p>',5),
 (55,3,'<p class=notificacionPuja>Genial! Tu puja de 30 para <a href=http://127.0.0.1/php/lastauction/solo.php?p=18 ><span>Bolsa de Viaje Bici</span></a> ha sido aceptada</p>',1),
 (56,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <a href=http://127.0.0.1/php/lastauction/solo.php?p=18 ><span>Bolsa de Viaje Bici</span></a></p>',5),
 (57,3,'<p class=notificacionPuja>Genial! Tu puja de 200 para <a href=http://127.0.0.1/php/lastauction/solo.php?p=12 ><span>Otro Telefono</span></a> ha sido aceptada</p>',5),
 (58,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <a href=http://127.0.0.1/php/lastauction/solo.php?p=12 ><span>Otro Telefono</span></a></p>',4),
 (59,3,'<p class=notificacionPuja>Genial! Tu puja de 999999999 para <a href=http://127.0.0.1/php/lastauction/solo.php?p=10 ><span>Prueba</span></a> ha sido aceptada</p>',5),
 (60,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <a href=http://127.0.0.1/php/lastauction/solo.php?p=10 ><span>Prueba</span></a></p>',4),
 (61,3,'<p class=notificacionPuja>Genial! Tu puja de 250 para <a href=http://127.0.0.1/php/lastauction/solo.php?p=27 ><span>Monitor</span></a> ha sido aceptada</p>',1),
 (62,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <a href=http://127.0.0.1/php/lastauction/solo.php?p=27 ><span>Monitor</span></a></p>',4),
 (63,4,'Tus subasta <span>CARA</span> se ha creado correctamente.',1),
 (64,4,'Tus subasta <span>wrath of the lich king</span> se ha creado correctamente.',1),
 (65,3,'<p class=notificacionPuja>Genial! Tu puja de 6 para <a href=http://127.0.0.1/php/lastauction/solo.php?p=29 ><span>wrath of the lich king</span></a> ha sido aceptada</p>',4),
 (66,3,'<p class=notificacionPuja>Genial! Tu puja de 8 para <a href=http://127.0.0.1/php/lastauction/solo.php?p=29 ><span>wrath of the lich king</span></a> ha sido aceptada</p>',5),
 (67,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <a href=http://127.0.0.1/php/lastauction/solo.php?p=29 ><span>wrath of the lich king</span></a></p>',4),
 (68,3,'<p class=notificacionPuja>Genial! Tu puja de 60 para <a href=http://127.0.0.1/php/lastauction/solo.php?p=28 ><span>CARA</span></a> ha sido aceptada</p>',5),
 (69,4,'Tus subasta <span>burning crusade</span> se ha creado correctamente.',5),
 (70,3,'<p class=notificacionPuja>Genial! Tu puja de 070 para <a href=http://127.0.0.1/php/lastauction/solo.php?p=30 ><span>burning crusade</span></a> ha sido aceptada</p>',4),
 (71,3,'<p class=notificacionPuja>Genial! Tu puja de 000990 para <a href=http://127.0.0.1/php/lastauction/solo.php?p=29 ><span>wrath of the lich king</span></a> ha sido aceptada</p>',4),
 (72,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <a href=http://127.0.0.1/php/lastauction/solo.php?p=29 ><span>wrath of the lich king</span></a></p>',5),
 (73,3,'<p class=notificacionPuja>Genial! Tu puja de 80 para <a href=http://127.0.0.1/php/lastauction/solo.php?p=30 ><span>burning crusade</span></a> ha sido aceptada</p>',1),
 (74,5,'<p class=notificacionSobrepuja>Te han sobrepujado en: <a href=http://127.0.0.1/php/lastauction/solo.php?p=30 ><span>burning crusade</span></a></p>',4);
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

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
 (20,'JUAN','descripcion producto juan',150,5,1413940080,1414048080,0,4),
 (21,'Coche Rojo','adwadwadawdaw',200000,2,1414407120,1414461120,0,4),
 (22,'Reloj Casio','Ca sio de esos mÃ­ticos relojes? siÃ©ntete hipster co nesta maravilla',250,2,1414407480,1414461480,0,4),
 (23,'Twclado wave','teclado wave logitec muy chulo molon y tope hacker',25,5,1414408200,1414516200,0,4),
 (24,'Taxi RC Amarillo','Taxi amarillo de dibujos especial para niÃ±os',120,5,1415010780,1415118780,1,6),
 (25,'Babas','babas humanas',2,4,1415010840,1415064840,0,6),
 (26,'Guacamole','Reloj de Guacamole',120,2,1415011680,1417603680,1,6),
 (27,'Monitor','El monitor de computadora es el principal dispositivo de salida (interfaz), que muestra datos o informaciÃ³n al usuario.\r\n\r\nTambiÃ©n puede considerarse un perifÃ©rico de Entrada/Salida si el monitor tiene pantalla tÃ¡ctil o multitÃ¡ctil.',99,5,1415100060,1420284060,1,9),
 (28,'CARA','descripcion descripcion descripcion descripcion',55,3,1415062200,1417654200,1,1),
 (29,'wrath of the lich king','wrath of the lich king wrath of the lich king wrath of the lich king',5,5,1415062320,1420246320,1,1),
 (30,'burning crusade','burning crusade burning crusade burning crusade burning crusade',2,5,1415062500,1417654500,1,5);
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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

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
 (6,12,151,'4'),
 (7,22,300,'1'),
 (8,20,201,'1'),
 (9,16,302,'4'),
 (10,23,26,'4'),
 (11,21,250000,'4'),
 (12,19,16,'4'),
 (13,19,17,'4'),
 (14,18,20,'4'),
 (15,17,25,'5'),
 (16,21,260000,'5'),
 (17,17,26,'5'),
 (18,17,30,'5'),
 (19,17,50,'5'),
 (20,16,305,'5'),
 (21,18,25,'5'),
 (22,19,20,'5'),
 (23,25,10,'7'),
 (24,22,400,'7'),
 (25,10,9999,'9'),
 (26,27,120,'1'),
 (27,26,200,'1'),
 (28,24,200,'1'),
 (29,24,300,'4'),
 (30,19,30,'4'),
 (31,17,55,'4'),
 (32,17,55,'4'),
 (33,17,55,'4'),
 (34,17,55,'4'),
 (35,17,55,'4'),
 (36,16,400,'4'),
 (37,27,200,'4'),
 (38,26,250,'4'),
 (39,26,300,'5'),
 (40,10,1000000,'5'),
 (41,10,99999999,'4'),
 (42,18,30,'1'),
 (43,12,200,'5'),
 (44,10,999999999,'5'),
 (45,27,250,'1'),
 (46,29,6,'4'),
 (47,29,8,'5'),
 (48,28,60,'5'),
 (49,30,70,'4'),
 (50,29,990,'4'),
 (51,30,80,'1');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`,`email`,`nombre`,`direccion`,`contrasena`) VALUES 
 (1,'peibol@elhacker.net','Pablo Mario','c/ Santa Agueda 9','7c6a180b36896a0a8c02787eeafb0e4c'),
 (2,'mario@gmail.com','Mario Garcia Lamata','c/ Santa Agueda 9','827ccb0eea8a706c4c34a16891f84e7b'),
 (3,'oscar@gmail.com','Oscar Mc tetis','C/ Pex 13','827ccb0eea8a706c4c34a16891f84e7b'),
 (4,'juan@juan.com','Juan','C/ Jota','827ccb0eea8a706c4c34a16891f84e7b'),
 (5,'mario@mario.com','Mario Garcia Lamata','c/ santa Agueda 9','de2f15d014d40b93578d255e6221fd60'),
 (6,'elite@elite.com','Elite Mega Pro','elite','bd0e6da36e55f57ddd98b6af62f6e617'),
 (7,'rotecho_5@hotmail.com','Roberto Elguapo','calle pez','202cb962ac59075b964b07152d234b70'),
 (8,'silvialonsogil@gmail.com','Silvia Alonso Gil','Calle zapaterÃ­a nÂº 15','9aa5ed6b766f107318a5a54a4ccf0571'),
 (9,'finitowelelaso@a.com','we welele filipino','C/ de el codigo nÂº 50','17019d15a8a1c1792f7108e13d713aca');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
