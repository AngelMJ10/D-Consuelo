/*
SQLyog Trial v13.1.8 (64 bit)
MySQL - 10.4.28-MariaDB : Database - momcarmen
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`momcarmen` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `momcarmen`;

/*Table structure for table `detalle_pedido` */

DROP TABLE IF EXISTS `detalle_pedido`;

CREATE TABLE `detalle_pedido` (
  `idDetallePedido` smallint(6) NOT NULL AUTO_INCREMENT,
  `idpedido` smallint(6) NOT NULL,
  `idproducto` smallint(6) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDetallePedido`),
  KEY `fk_idpedido_dp` (`idpedido`),
  KEY `fk_idproducto_dp` (`idproducto`),
  CONSTRAINT `fk_idpedido_dp` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`idpedido`),
  CONSTRAINT `fk_idproducto_dp` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `detalle_pedido` */

insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values 
(91,118,21,1,'1','2023-11-04 19:58:17'),
(92,118,25,2,'1','2023-11-04 19:58:17'),
(93,119,21,1,'1','2023-11-04 21:01:49'),
(94,119,25,1,'1','2023-11-04 21:01:49'),
(95,120,21,1,'1','2023-11-05 12:41:52'),
(96,121,22,2,'1','2023-11-05 15:48:32'),
(97,121,25,2,'1','2023-11-05 15:48:32'),
(98,121,23,2,'1','2023-11-05 15:48:33'),
(99,122,21,1,'1','2023-11-06 18:53:16'),
(100,122,23,1,'1','2023-11-06 18:53:16'),
(101,122,25,1,'1','2023-11-06 18:53:16'),
(102,123,21,1,'1','2023-11-06 18:54:00'),
(103,123,23,1,'1','2023-11-06 18:54:00');

/*Table structure for table `deuda` */

DROP TABLE IF EXISTS `deuda`;

CREATE TABLE `deuda` (
  `iddeudor` smallint(6) NOT NULL,
  `iddeuda` smallint(6) NOT NULL AUTO_INCREMENT,
  `idventa` smallint(6) NOT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_update` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`iddeuda`),
  KEY `fk_iddeudor_d` (`iddeudor`),
  CONSTRAINT `fk_iddeudor_d` FOREIGN KEY (`iddeudor`) REFERENCES `deudores` (`iddeudor`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `deuda` */

insert  into `deuda`(`iddeudor`,`iddeuda`,`idventa`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`) values 
(10,14,78,'ojis','1','2023-11-04 21:01:49','2023-11-04 21:01:49'),
(10,15,82,'jnjik','1','2023-11-06 18:54:00','2023-11-06 18:54:00');

/*Table structure for table `deudores` */

DROP TABLE IF EXISTS `deudores`;

CREATE TABLE `deudores` (
  `idpersona` smallint(6) NOT NULL,
  `usuario_creador` smallint(6) NOT NULL,
  `iddeudor` smallint(6) NOT NULL AUTO_INCREMENT,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_update` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`iddeudor`),
  KEY `fk_idpersona_d` (`idpersona`),
  KEY `fk_idusuario_d` (`usuario_creador`),
  CONSTRAINT `fk_idpersona_d` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`),
  CONSTRAINT `fk_idusuario_d` FOREIGN KEY (`usuario_creador`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `deudores` */

insert  into `deudores`(`idpersona`,`usuario_creador`,`iddeudor`,`estado`,`fecha_creacion`,`fecha_update`) values 
(12,5,10,'2','2023-11-04 19:59:34','2023-11-04 19:59:34');

/*Table structure for table `gastos` */

DROP TABLE IF EXISTS `gastos`;

CREATE TABLE `gastos` (
  `idgasto` smallint(6) NOT NULL AUTO_INCREMENT,
  `gasto` varchar(80) NOT NULL,
  `tipo` varchar(40) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_update` datetime DEFAULT NULL,
  PRIMARY KEY (`idgasto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `gastos` */

/*Table structure for table `marcas` */

DROP TABLE IF EXISTS `marcas`;

CREATE TABLE `marcas` (
  `idmarca` smallint(6) NOT NULL AUTO_INCREMENT,
  `marca` varchar(40) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`idmarca`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `marcas` */

insert  into `marcas`(`idmarca`,`marca`,`estado`,`fecha_creacion`,`fecha_fin`) values 
(4,'Inka Kola','1','2023-11-04 12:17:33',NULL),
(5,'Coca Cola','1','2023-11-04 19:34:16',NULL);

/*Table structure for table `pedido` */

DROP TABLE IF EXISTS `pedido`;

CREATE TABLE `pedido` (
  `idpedido` smallint(6) NOT NULL AUTO_INCREMENT,
  `idusuario` smallint(6) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idpedido`),
  KEY `fk_idusuario_p` (`idusuario`),
  CONSTRAINT `fk_idusuario_p` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `pedido` */

insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values 
(118,5,'2023-11-04 19:58:17'),
(119,5,'2023-11-04 21:01:49'),
(120,5,'2023-11-05 12:41:52'),
(121,5,'2023-11-05 15:48:32'),
(122,5,'2023-11-06 18:53:15'),
(123,5,'2023-11-06 18:54:00');

/*Table structure for table `persona` */

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
  `idpersona` smallint(6) NOT NULL AUTO_INCREMENT,
  `apellidos` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `dni` char(8) DEFAULT NULL,
  `telefono` char(9) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `persona` */

insert  into `persona`(`idpersona`,`apellidos`,`nombre`,`dni`,`telefono`,`direccion`,`estado`,`fecha_creacion`,`fecha_fin`) values 
(11,'Ángel Eduardo','Marquina Jaime','72745028','951531166','León de Vivero MZ V LT-22','1','2023-11-04 11:25:09',NULL),
(12,'Repuesto','Omar',NULL,'944469388','Repuesto','1','2023-11-04 19:59:34',NULL);

/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `idproducto` smallint(6) NOT NULL AUTO_INCREMENT,
  `idmarca` smallint(6) DEFAULT NULL,
  `producto` varchar(50) NOT NULL,
  `tipo` char(1) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`idproducto`),
  KEY `fk_idmarca_b` (`idmarca`),
  CONSTRAINT `fk_idmarca_b` FOREIGN KEY (`idmarca`) REFERENCES `marcas` (`idmarca`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `producto` */

insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values 
(21,5,'Coca Cola 1 Litro 1/2','B',7.00,7,'1','2023-11-04 19:38:03',NULL),
(22,4,'Inka kola 1 Litro 1/2','B',7.00,10,'1','2023-11-04 19:39:15',NULL),
(23,NULL,'Ceviche','P',13.00,NULL,'1','2023-11-04 19:53:53',NULL),
(24,NULL,'Chilcano','P',8.00,NULL,'1','2023-11-04 19:54:28',NULL),
(25,NULL,'Chilcano + Ceviche','M',15.00,NULL,'1','2023-11-04 19:57:01',NULL);

/*Table structure for table `usuario` */

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario` (
  `idpersona` smallint(6) NOT NULL,
  `idusuario` smallint(6) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `nivelacceso` char(1) NOT NULL DEFAULT 'E',
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`idusuario`),
  KEY `fk_idpersona_fk` (`idpersona`),
  CONSTRAINT `fk_idpersona_fk` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `usuario` */

insert  into `usuario`(`idpersona`,`idusuario`,`usuario`,`clave`,`nivelacceso`,`estado`,`fecha_creacion`,`fecha_fin`) values 
(11,5,'AngelMJ','$2y$10$WY.iP85bEYxBMkVBG0jKO.9Q97kEbofLVwJPUT1OAmsDzLXQ8Pcka','A','1','2023-11-04 11:25:54',NULL);

/*Table structure for table `venta` */

DROP TABLE IF EXISTS `venta`;

CREATE TABLE `venta` (
  `idventa` smallint(6) NOT NULL AUTO_INCREMENT,
  `idpedido` smallint(6) NOT NULL,
  `total` decimal(6,2) NOT NULL,
  `idusuario` smallint(6) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `metodo` char(1) NOT NULL,
  `comentario` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`idventa`),
  KEY `fk_idpedido_v` (`idpedido`),
  KEY `fk_idproducto_v` (`idusuario`),
  CONSTRAINT `fk_idpedido_v` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`idpedido`),
  CONSTRAINT `fk_idproducto_v` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `venta` */

insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`,`metodo`,`comentario`) values 
(77,118,37.00,5,'1','2023-11-04 19:58:17','1',NULL),
(78,119,22.00,5,'2','2023-11-04 21:01:49','1',NULL),
(79,120,7.00,5,'1','2023-11-05 12:41:52','2',NULL),
(80,121,70.00,5,'1','2023-11-05 15:48:33','3',NULL),
(81,122,35.00,5,'1','2023-11-06 18:53:16','1',NULL),
(82,123,20.00,5,'2','2023-11-06 18:54:00','',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
