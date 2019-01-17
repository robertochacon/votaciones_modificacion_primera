/*
SQLyog Community Edition- MySQL GUI v8.05 
MySQL - 5.5.5-10.1.37-MariaDB : Database - votaciones
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`votaciones` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `votaciones`;

/*Table structure for table `categorias` */

DROP TABLE IF EXISTS `categorias`;

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `categorias` */

insert  into `categorias`(`id`,`nombre`,`fecha`) values (10,'Conductor/a de TV','2019-01-14'),(11,'Programa de Radio','2019-01-16'),(12,'Medios de evangelización impreso ','2019-01-16'),(13,'Artista o Ministerio Regional ','2019-01-16'),(14,'Ministerio destacado en el extranjero ','2019-01-16'),(15,'Video Musical ','2019-01-16'),(16,'Ministerio de Música Infantil ','2019-01-16'),(17,'Productor Musical ','2019-01-16'),(18,'Evento Músico Teatral ','2019-01-16'),(19,'Colaboración Musical del año','2019-01-16'),(20,'Solista Masculino ','2019-01-16'),(21,'Duo','2019-01-16'),(22,'Grupo','2019-01-16'),(23,'Solista Femenina ','2019-01-16'),(24,'Revelación del año ','2019-01-16'),(25,'Sonido Urbano ','2019-01-16'),(26,'Sonido Tropical','2019-01-16'),(27,'Ministerio POP/Rock ','2019-01-16'),(28,'Concierto del año  ','2019-01-16'),(29,'Locutor del año ','2019-01-16'),(30,'Programa de TV','2019-01-16'),(31,'Canción del año','2019-01-16'),(32,'Album del año','2019-01-16');

/*Table structure for table `megustas` */

DROP TABLE IF EXISTS `megustas`;

CREATE TABLE `megustas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_voto` int(11) NOT NULL,
  `codigo_usuario` int(11) NOT NULL,
  `codigo_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `megustas` */

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `clave` varchar(30) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id_user`,`nombre`,`email`,`clave`,`role`,`fecha`) values (15,'admin','admin@gmail.com','admin','admin','2019-01-10');

/*Table structure for table `votacion` */

DROP TABLE IF EXISTS `votacion`;

CREATE TABLE `votacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` int(11) DEFAULT NULL,
  `nombre` varchar(60) DEFAULT NULL,
  `imagen` varchar(60) DEFAULT NULL,
  `megustas` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `biografia_logros` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `votacion` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
