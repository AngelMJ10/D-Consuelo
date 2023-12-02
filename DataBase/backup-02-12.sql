/*
SQLyog Ultimate
MySQL - 10.4.21-MariaDB : Database - momcarmen
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`momcarmen` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `momcarmen`;

/*Table structure for table `detalle_pedido` */

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
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detalle_pedido` */

insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (91,118,21,1,'1','2023-11-04 19:58:17');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (92,118,25,2,'1','2023-11-04 19:58:17');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (93,119,21,1,'1','2023-11-04 21:01:49');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (94,119,25,1,'1','2023-11-04 21:01:49');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (95,120,21,1,'1','2023-11-05 12:41:52');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (96,121,22,2,'1','2023-11-05 15:48:32');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (97,121,25,2,'1','2023-11-05 15:48:32');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (98,121,23,2,'1','2023-11-05 15:48:33');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (99,122,21,1,'1','2023-11-06 18:53:16');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (100,122,23,1,'1','2023-11-06 18:53:16');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (101,122,25,1,'1','2023-11-06 18:53:16');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (102,123,21,1,'1','2023-11-06 18:54:00');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (103,123,23,1,'1','2023-11-06 18:54:00');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (104,124,21,1,'1','2023-11-21 08:27:49');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (105,124,23,1,'1','2023-11-21 08:27:49');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (106,125,21,1,'1','2023-11-22 15:54:55');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (107,125,23,1,'1','2023-11-22 15:54:55');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (108,126,21,1,'1','2023-11-22 15:55:06');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (109,126,22,1,'1','2023-11-22 15:55:06');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (110,127,21,1,'1','2023-11-22 15:55:19');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (111,127,22,1,'1','2023-11-22 15:55:19');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (112,128,21,1,'1','2023-11-22 16:25:50');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (113,128,22,1,'1','2023-11-22 16:25:50');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (114,129,21,1,'1','2023-11-27 20:04:48');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (115,129,23,1,'1','2023-11-27 20:04:48');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (116,129,25,1,'1','2023-11-27 20:04:48');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (117,130,21,1,'1','2023-11-29 08:53:53');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (118,130,23,1,'1','2023-11-29 08:53:53');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (119,131,22,1,'1','2023-11-29 09:19:19');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (120,131,23,1,'1','2023-11-29 09:19:19');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (121,132,22,1,'1','2023-11-29 09:29:30');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (122,132,23,1,'1','2023-11-29 09:29:30');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (123,132,25,1,'1','2023-11-29 09:29:30');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (124,133,22,1,'1','2023-12-01 20:59:09');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (125,133,23,1,'1','2023-12-01 20:59:09');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (126,134,26,2,'1','2023-12-01 21:44:17');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (127,134,23,1,'1','2023-12-01 21:44:17');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (128,134,24,1,'1','2023-12-01 21:44:17');

/*Table structure for table `deuda` */

CREATE TABLE `deuda` (
  `iddeudor` smallint(6) NOT NULL,
  `iddeuda` smallint(6) NOT NULL AUTO_INCREMENT,
  `idventa` smallint(6) NOT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_update` datetime DEFAULT current_timestamp(),
  `aporte` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`iddeuda`),
  KEY `fk_iddeudor_d` (`iddeudor`),
  CONSTRAINT `fk_iddeudor_d` FOREIGN KEY (`iddeudor`) REFERENCES `deudores` (`iddeudor`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

/*Data for the table `deuda` */

insert  into `deuda`(`iddeudor`,`iddeuda`,`idventa`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`,`aporte`) values (10,14,78,'ojis','1','2023-11-04 21:01:49','2023-11-04 21:01:49',NULL);
insert  into `deuda`(`iddeudor`,`iddeuda`,`idventa`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`,`aporte`) values (10,15,82,'jnjik','2','2023-11-06 18:54:00','2023-11-06 18:54:00',NULL);
insert  into `deuda`(`iddeudor`,`iddeuda`,`idventa`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`,`aporte`) values (10,16,86,'158','1','2023-11-22 15:55:19','2023-11-22 15:55:19',NULL);
insert  into `deuda`(`iddeudor`,`iddeuda`,`idventa`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`,`aporte`) values (10,17,87,'ad','1','2023-11-22 16:25:50','2023-11-22 16:25:50',NULL);
insert  into `deuda`(`iddeudor`,`iddeuda`,`idventa`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`,`aporte`) values (11,18,88,'JIANH','2','2023-11-27 20:04:48','2023-11-27 20:04:48',NULL);
insert  into `deuda`(`iddeudor`,`iddeuda`,`idventa`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`,`aporte`) values (11,19,89,'a','2','2023-11-29 08:53:53','2023-11-29 08:53:53',NULL);
insert  into `deuda`(`iddeudor`,`iddeuda`,`idventa`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`,`aporte`) values (11,20,91,'wda','2','2023-11-29 09:29:30','2023-11-29 09:29:30',NULL);
insert  into `deuda`(`iddeudor`,`iddeuda`,`idventa`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`,`aporte`) values (11,21,92,'dwadwa','2','2023-12-01 20:59:09','2023-12-01 20:59:09',NULL);

/*Table structure for table `deudores` */

CREATE TABLE `deudores` (
  `idpersona` smallint(6) NOT NULL,
  `usuario_creador` smallint(6) NOT NULL,
  `iddeudor` smallint(6) NOT NULL AUTO_INCREMENT,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_update` datetime DEFAULT current_timestamp(),
  `aporte` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`iddeudor`),
  KEY `fk_idpersona_d` (`idpersona`),
  KEY `fk_idusuario_d` (`usuario_creador`),
  CONSTRAINT `fk_idpersona_d` FOREIGN KEY (`idpersona`) REFERENCES `persona` (`idpersona`),
  CONSTRAINT `fk_idusuario_d` FOREIGN KEY (`usuario_creador`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `deudores` */

insert  into `deudores`(`idpersona`,`usuario_creador`,`iddeudor`,`estado`,`fecha_creacion`,`fecha_update`,`aporte`) values (12,5,10,'2','2023-11-04 19:59:34','2023-11-04 19:59:34',0.00);
insert  into `deudores`(`idpersona`,`usuario_creador`,`iddeudor`,`estado`,`fecha_creacion`,`fecha_update`,`aporte`) values (13,5,11,'1','2023-11-27 20:04:29','2023-11-27 20:04:29',0.00);

/*Table structure for table `gastos` */

CREATE TABLE `gastos` (
  `idgasto` smallint(6) NOT NULL AUTO_INCREMENT,
  `idsemana` smallint(6) NOT NULL,
  `gasto` varchar(80) NOT NULL,
  `tipo` varchar(40) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_update` datetime DEFAULT NULL,
  PRIMARY KEY (`idgasto`),
  KEY `fk_idsemana_g` (`idsemana`),
  CONSTRAINT `fk_idsemana_g` FOREIGN KEY (`idsemana`) REFERENCES `semana` (`idsemana`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `gastos` */

insert  into `gastos`(`idgasto`,`idsemana`,`gasto`,`tipo`,`precio`,`estado`,`fecha_creacion`,`fecha_update`) values (1,1,'Agua','Servicios',50.00,'2','2023-11-16 11:13:11',NULL);
insert  into `gastos`(`idgasto`,`idsemana`,`gasto`,`tipo`,`precio`,`estado`,`fecha_creacion`,`fecha_update`) values (2,1,'Pago de Luz','Servicios',150.00,'1','2023-11-21 08:50:06',NULL);
insert  into `gastos`(`idgasto`,`idsemana`,`gasto`,`tipo`,`precio`,`estado`,`fecha_creacion`,`fecha_update`) values (3,1,'Caja de Coca Cola','Bebidas',38.00,'1','2023-11-21 08:50:06',NULL);
insert  into `gastos`(`idgasto`,`idsemana`,`gasto`,`tipo`,`precio`,`estado`,`fecha_creacion`,`fecha_update`) values (4,1,'Mamita','Otros gastos',50.00,'1','2023-11-21 08:50:06',NULL);
insert  into `gastos`(`idgasto`,`idsemana`,`gasto`,`tipo`,`precio`,`estado`,`fecha_creacion`,`fecha_update`) values (5,1,'Karen ,domingo','Otros gastos',50.00,'1','2023-11-21 08:50:06',NULL);
insert  into `gastos`(`idgasto`,`idsemana`,`gasto`,`tipo`,`precio`,`estado`,`fecha_creacion`,`fecha_update`) values (6,2,'6 aceites','Aceite',50.00,'1','2023-11-29 09:31:56',NULL);
insert  into `gastos`(`idgasto`,`idsemana`,`gasto`,`tipo`,`precio`,`estado`,`fecha_creacion`,`fecha_update`) values (7,2,'Caja de coca cola','Bebidas',38.00,'1','2023-11-29 09:32:27',NULL);
insert  into `gastos`(`idgasto`,`idsemana`,`gasto`,`tipo`,`precio`,`estado`,`fecha_creacion`,`fecha_update`) values (8,2,'6 - Coca cola 3LT','Bebidas',84.00,'1','2023-12-01 21:43:56',NULL);

/*Table structure for table `marcas` */

CREATE TABLE `marcas` (
  `idmarca` smallint(6) NOT NULL AUTO_INCREMENT,
  `marca` varchar(40) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`idmarca`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `marcas` */

insert  into `marcas`(`idmarca`,`marca`,`estado`,`fecha_creacion`,`fecha_fin`) values (4,'Inka Kola','1','2023-11-04 12:17:33',NULL);
insert  into `marcas`(`idmarca`,`marca`,`estado`,`fecha_creacion`,`fecha_fin`) values (5,'Coca Cola','1','2023-11-04 19:34:16',NULL);

/*Table structure for table `pedido` */

CREATE TABLE `pedido` (
  `idpedido` smallint(6) NOT NULL AUTO_INCREMENT,
  `idusuario` smallint(6) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idpedido`),
  KEY `fk_idusuario_p` (`idusuario`),
  CONSTRAINT `fk_idusuario_p` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pedido` */

insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (118,5,'2023-11-04 19:58:17');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (119,5,'2023-11-04 21:01:49');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (120,5,'2023-11-05 12:41:52');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (121,5,'2023-11-05 15:48:32');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (122,5,'2023-11-06 18:53:15');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (123,5,'2023-11-06 18:54:00');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (124,5,'2023-11-21 08:27:49');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (125,5,'2023-11-22 15:54:55');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (126,5,'2023-11-22 15:55:06');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (127,5,'2023-11-22 15:55:19');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (128,5,'2023-11-22 16:25:50');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (129,5,'2023-11-27 20:04:48');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (130,5,'2023-11-29 08:53:53');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (131,6,'2023-11-29 09:19:19');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (132,6,'2023-11-29 09:29:30');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (133,5,'2023-12-01 20:59:09');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (134,5,'2023-12-01 21:44:17');

/*Table structure for table `persona` */

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `persona` */

insert  into `persona`(`idpersona`,`apellidos`,`nombre`,`dni`,`telefono`,`direccion`,`estado`,`fecha_creacion`,`fecha_fin`) values (11,'Ángel Eduardo','Marquina Jaime','72745028','951531166','León de Vivero MZ V LT-22','1','2023-11-04 11:25:09',NULL);
insert  into `persona`(`idpersona`,`apellidos`,`nombre`,`dni`,`telefono`,`direccion`,`estado`,`fecha_creacion`,`fecha_fin`) values (12,'Repuesto','Omar',NULL,'944469388','Repuesto','1','2023-11-04 19:59:34',NULL);
insert  into `persona`(`idpersona`,`apellidos`,`nombre`,`dni`,`telefono`,`direccion`,`estado`,`fecha_creacion`,`fecha_fin`) values (13,'Marquina','Angel',NULL,'951531166','León de vivero','1','2023-11-27 20:04:29',NULL);

/*Table structure for table `producto` */

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

/*Data for the table `producto` */

insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (21,5,'Coca Cola 1 Litro 1/2','B',7.00,0,'0','2023-11-04 19:38:03',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (22,4,'Inka kola 1 Litro 1/2','B',7.00,4,'1','2023-11-04 19:39:15',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (23,NULL,'Ceviche','P',13.00,NULL,'1','2023-11-04 19:53:53',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (24,NULL,'Chilcano','P',8.00,NULL,'1','2023-11-04 19:54:28',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (25,NULL,'Chilcano + Ceviche','M',15.00,NULL,'1','2023-11-04 19:57:01',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (26,5,'Coca cola 3LT','B',15.50,4,'1','2023-12-01 21:43:17',NULL);

/*Table structure for table `semana` */

CREATE TABLE `semana` (
  `idsemana` smallint(6) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `comentario` varchar(200) DEFAULT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_update` datetime DEFAULT NULL,
  PRIMARY KEY (`idsemana`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

/*Data for the table `semana` */

insert  into `semana`(`idsemana`,`fecha_inicio`,`fecha_fin`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`) values (1,'2023-11-13','2023-11-25',NULL,'2','2023-11-15 14:49:03',NULL);
insert  into `semana`(`idsemana`,`fecha_inicio`,`fecha_fin`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`) values (2,'2023-11-28','2023-12-02',NULL,'1','2023-11-16 09:22:39',NULL);
insert  into `semana`(`idsemana`,`fecha_inicio`,`fecha_fin`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`) values (3,'2023-12-04','2023-12-09',NULL,'2','2023-11-22 15:49:17',NULL);
insert  into `semana`(`idsemana`,`fecha_inicio`,`fecha_fin`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`) values (4,'2023-12-11','2023-12-16',NULL,'2','2023-11-22 15:50:21',NULL);
insert  into `semana`(`idsemana`,`fecha_inicio`,`fecha_fin`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`) values (5,'2023-12-18','2023-12-23',NULL,'2','2023-11-22 15:51:10',NULL);

/*Table structure for table `usuario` */

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuario` */

insert  into `usuario`(`idpersona`,`idusuario`,`usuario`,`clave`,`nivelacceso`,`estado`,`fecha_creacion`,`fecha_fin`) values (11,5,'AngelMJ','$2y$10$WY.iP85bEYxBMkVBG0jKO.9Q97kEbofLVwJPUT1OAmsDzLXQ8Pcka','A','1','2023-11-04 11:25:54',NULL);
insert  into `usuario`(`idpersona`,`idusuario`,`usuario`,`clave`,`nivelacceso`,`estado`,`fecha_creacion`,`fecha_fin`) values (11,6,'ConsueloJE','$2y$10$WY.iP85bEYxBMkVBG0jKO.9Q97kEbofLVwJPUT1OAmsDzLXQ8Pcka','A','1','2023-11-29 09:17:38',NULL);

/*Table structure for table `venta` */

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
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4;

/*Data for the table `venta` */

insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`,`metodo`,`comentario`) values (77,118,37.00,5,'3','2023-11-04 19:58:17','1',NULL);
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`,`metodo`,`comentario`) values (78,119,22.00,5,'3','2023-11-04 21:01:49','1',NULL);
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`,`metodo`,`comentario`) values (79,120,7.00,5,'1','2023-11-05 12:41:52','2',NULL);
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`,`metodo`,`comentario`) values (80,121,70.00,5,'1','2023-11-05 15:48:33','3',NULL);
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`,`metodo`,`comentario`) values (81,122,35.00,5,'1','2023-11-06 18:53:16','1',NULL);
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`,`metodo`,`comentario`) values (82,123,20.00,5,'1','2023-11-06 18:54:00','1',NULL);
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`,`metodo`,`comentario`) values (83,124,20.00,5,'1','2023-11-21 08:27:49','1',NULL);
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`,`metodo`,`comentario`) values (84,125,20.00,5,'1','2023-11-22 15:54:55','1',NULL);
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`,`metodo`,`comentario`) values (85,126,14.00,5,'1','2023-11-22 15:55:06','1',NULL);
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`,`metodo`,`comentario`) values (86,127,14.00,5,'2','2023-11-22 15:55:19','1',NULL);
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`,`metodo`,`comentario`) values (87,128,14.00,5,'2','2023-11-22 16:25:50','1',NULL);
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`,`metodo`,`comentario`) values (88,129,35.00,5,'1','2023-11-27 20:04:48','1',NULL);
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`,`metodo`,`comentario`) values (89,130,20.00,5,'1','2023-11-29 08:53:53','1',NULL);
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`,`metodo`,`comentario`) values (90,131,20.00,6,'3','2023-11-29 09:19:19','1',NULL);
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`,`metodo`,`comentario`) values (91,132,35.00,6,'1','2023-11-29 09:29:30','1',NULL);
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`,`metodo`,`comentario`) values (92,133,20.00,5,'1','2023-12-01 20:59:09','1',NULL);
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`,`metodo`,`comentario`) values (93,134,52.00,5,'1','2023-12-01 21:44:17','1',NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
