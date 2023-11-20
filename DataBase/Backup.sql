/*
SQLyog Ultimate v12.5.1 (64 bit)
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
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detalle_pedido` */

insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (1,1,1,2,'1','2023-10-03 11:44:45');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (2,1,4,2,'1','2023-10-03 11:44:45');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (3,27,1,3,'1','2023-10-11 20:06:19');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (4,27,2,1,'1','2023-10-11 20:06:19');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (5,28,3,2,'1','2023-10-11 20:09:33');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (6,28,8,2,'1','2023-10-11 20:09:33');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (7,28,2,1,'1','2023-10-11 20:09:33');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (8,29,1,2,'1','2023-10-11 20:20:58');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (9,29,2,1,'1','2023-10-11 20:20:58');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (10,30,1,3,'1','2023-10-11 20:21:48');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (11,30,2,2,'1','2023-10-11 20:21:48');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (12,30,3,3,'1','2023-10-11 20:21:48');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (13,31,8,2,'1','2023-10-11 20:26:03');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (14,31,4,3,'1','2023-10-11 20:26:03');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (15,31,5,2,'1','2023-10-11 20:26:03');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (16,31,1,2,'1','2023-10-11 20:26:03');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (17,32,1,1,'1','2023-10-12 00:08:43');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (18,33,1,12,'1','2023-10-12 00:11:24');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (19,33,2,12,'1','2023-10-12 00:11:24');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (20,33,4,1,'1','2023-10-12 00:11:24');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (21,33,5,1,'1','2023-10-12 00:11:24');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (22,34,4,1,'1','2023-10-12 00:18:02');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (23,35,1,13,'1','2023-10-12 13:08:41');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (24,36,1,13,'1','2023-10-12 13:12:07');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (25,48,2,13,'1','2023-10-12 13:27:29');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (26,49,2,1,'1','2023-10-12 13:28:11');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (27,50,2,1,'1','2023-10-12 13:28:15');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (28,61,2,1,'1','2023-10-12 13:37:48');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (29,62,3,1,'1','2023-10-12 13:37:53');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (30,63,3,1,'1','2023-10-12 13:39:57');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (31,64,2,1,'1','2023-10-12 13:40:05');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (32,65,2,1,'1','2023-10-12 13:40:29');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (33,69,2,1,'1','2023-10-12 13:46:17');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (34,70,2,1,'1','2023-10-12 13:48:03');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (35,71,2,1,'1','2023-10-12 13:51:11');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (36,72,2,1,'1','2023-10-12 13:53:25');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (37,73,2,1,'1','2023-10-12 13:54:22');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (38,74,2,1,'1','2023-10-12 13:54:32');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (39,75,2,1,'1','2023-10-12 13:54:57');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (40,76,2,1,'1','2023-10-12 13:55:37');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (41,77,2,1,'1','2023-10-12 13:55:43');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (42,78,3,1,'1','2023-10-12 13:55:49');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (43,79,2,1,'1','2023-10-12 13:55:59');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (44,80,2,1,'1','2023-10-12 13:56:11');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (45,81,2,1,'1','2023-10-12 13:57:31');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (46,82,2,1,'1','2023-10-12 13:57:50');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (47,83,2,1,'1','2023-10-12 13:58:43');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (48,84,2,1,'1','2023-10-12 14:12:32');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (49,85,2,1,'1','2023-10-12 14:12:45');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (50,86,3,1,'1','2023-10-12 14:14:01');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (51,87,3,1,'1','2023-10-12 14:14:24');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (52,88,3,1,'1','2023-10-12 14:14:55');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (53,90,3,1,'1','2023-10-12 14:19:43');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (54,91,3,1,'1','2023-10-12 14:20:15');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (55,92,2,1,'1','2023-10-12 16:56:03');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (56,93,2,1,'1','2023-10-12 16:56:33');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (57,94,2,1,'1','2023-10-12 16:56:38');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (58,95,2,1,'1','2023-10-12 16:56:49');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (59,96,2,1,'1','2023-10-12 16:56:52');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (60,97,2,1,'1','2023-10-12 16:57:01');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (61,98,2,1,'1','2023-10-12 17:40:08');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (62,99,2,1,'1','2023-10-12 17:41:33');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (63,100,2,1,'1','2023-10-12 17:41:42');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (64,101,2,1,'1','2023-10-12 17:44:35');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (65,102,2,1,'1','2023-10-12 17:47:22');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (66,103,8,1,'1','2023-10-12 17:53:40');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (67,104,3,4,'1','2023-10-13 00:07:30');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (68,105,1,1,'1','2023-10-16 11:13:27');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (69,105,4,1,'1','2023-10-16 11:13:27');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (70,105,9,1,'1','2023-10-16 11:13:27');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (71,105,5,1,'1','2023-10-16 11:13:27');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (72,105,2,1,'1','2023-10-16 11:13:27');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (73,106,2,1,'1','2023-10-18 12:00:25');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (74,107,2,1,'1','2023-10-18 12:16:48');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (75,108,1,1,'1','2023-10-18 12:19:43');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (76,109,1,1,'1','2023-10-18 12:20:18');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (77,110,1,1,'1','2023-10-21 00:37:47');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (78,110,4,1,'1','2023-10-21 00:37:47');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (79,111,1,1,'1','2023-10-21 19:54:54');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (80,112,1,1,'1','2023-10-21 19:56:40');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (81,113,1,1,'1','2023-10-21 19:58:45');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (82,114,1,1,'1','2023-10-24 19:10:35');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (83,114,4,1,'1','2023-10-24 19:10:35');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (84,114,5,1,'1','2023-10-24 19:10:35');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (85,114,9,1,'1','2023-10-24 19:10:35');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (86,115,1,1,'1','2023-10-24 19:13:31');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (87,116,11,1,'1','2023-10-26 22:59:58');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (88,116,1,1,'1','2023-10-26 22:59:58');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (89,117,11,3,'1','2023-11-02 20:54:50');
insert  into `detalle_pedido`(`idDetallePedido`,`idpedido`,`idproducto`,`cantidad`,`estado`,`fecha_creacion`) values (90,117,1,1,'1','2023-11-02 20:54:50');

/*Table structure for table `deuda` */

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

/*Data for the table `deuda` */

insert  into `deuda`(`iddeudor`,`iddeuda`,`idventa`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`) values (2,1,64,'Pagará el 30 de octubre','1','2023-10-18 10:28:14','2023-10-18 10:28:14');
insert  into `deuda`(`iddeudor`,`iddeuda`,`idventa`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`) values (2,2,65,'Pagará el 30 de octubre','1','2023-10-18 10:45:20','2023-10-18 10:45:20');
insert  into `deuda`(`iddeudor`,`iddeuda`,`idventa`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`) values (2,9,66,'Prueba 1','1','2023-10-18 12:12:41','2023-10-18 12:12:41');
insert  into `deuda`(`iddeudor`,`iddeuda`,`idventa`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`) values (2,10,69,'Prueba 1','1','2023-10-18 12:20:31','2023-10-18 12:20:31');
insert  into `deuda`(`iddeudor`,`iddeuda`,`idventa`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`) values (1,11,70,'Prueba','1','2023-10-21 00:37:47','2023-10-21 00:37:47');
insert  into `deuda`(`iddeudor`,`iddeuda`,`idventa`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`) values (1,12,71,'A','1','2023-10-21 19:56:40','2023-10-21 19:56:40');
insert  into `deuda`(`iddeudor`,`iddeuda`,`idventa`,`comentario`,`estado`,`fecha_creacion`,`fecha_update`) values (1,13,72,'Prueba exitosa','1','2023-10-21 19:58:45','2023-10-21 19:58:45');

/*Table structure for table `deudores` */

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `deudores` */

insert  into `deudores`(`idpersona`,`usuario_creador`,`iddeudor`,`estado`,`fecha_creacion`,`fecha_update`) values (4,1,1,'2','2023-10-17 23:17:23','2023-10-17 23:17:23');
insert  into `deudores`(`idpersona`,`usuario_creador`,`iddeudor`,`estado`,`fecha_creacion`,`fecha_update`) values (5,1,2,'2','2023-10-18 10:18:48','2023-10-18 10:18:48');
insert  into `deudores`(`idpersona`,`usuario_creador`,`iddeudor`,`estado`,`fecha_creacion`,`fecha_update`) values (6,1,7,'1','2023-11-01 23:52:44','2023-11-01 23:52:44');
insert  into `deudores`(`idpersona`,`usuario_creador`,`iddeudor`,`estado`,`fecha_creacion`,`fecha_update`) values (8,1,8,'1','2023-11-01 23:53:11','2023-11-01 23:53:11');

/*Table structure for table `marcas` */

CREATE TABLE `marcas` (
  `idmarca` smallint(6) NOT NULL AUTO_INCREMENT,
  `marca` varchar(40) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`idmarca`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `marcas` */

insert  into `marcas`(`idmarca`,`marca`,`estado`,`fecha_creacion`,`fecha_fin`) values (1,'Inka Kola','1','2023-10-03 08:46:38',NULL);
insert  into `marcas`(`idmarca`,`marca`,`estado`,`fecha_creacion`,`fecha_fin`) values (2,'Cerveza Cristal','1','2023-10-03 08:46:38',NULL);
insert  into `marcas`(`idmarca`,`marca`,`estado`,`fecha_creacion`,`fecha_fin`) values (3,'Cifrut','1','2023-10-03 08:46:38',NULL);

/*Table structure for table `pedido` */

CREATE TABLE `pedido` (
  `idpedido` smallint(6) NOT NULL AUTO_INCREMENT,
  `idusuario` smallint(6) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idpedido`),
  KEY `fk_idusuario_p` (`idusuario`),
  CONSTRAINT `fk_idusuario_p` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pedido` */

insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (1,1,'2023-10-03 11:43:32');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (2,1,'2023-10-11 16:57:31');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (3,1,'2023-10-11 16:57:31');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (4,1,'2023-10-11 16:57:32');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (5,1,'2023-10-11 16:57:32');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (6,1,'2023-10-11 17:17:03');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (7,1,'2023-10-11 17:17:21');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (8,1,'2023-10-11 17:18:07');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (9,1,'2023-10-11 17:18:56');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (10,1,'2023-10-11 17:19:00');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (11,1,'2023-10-11 17:19:00');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (12,1,'2023-10-11 17:19:01');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (13,1,'2023-10-11 17:19:01');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (14,1,'2023-10-11 17:19:01');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (15,1,'2023-10-11 17:19:40');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (16,1,'2023-10-11 17:19:48');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (17,1,'2023-10-11 17:20:34');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (18,1,'2023-10-11 17:20:43');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (19,1,'2023-10-11 17:22:50');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (20,1,'2023-10-11 17:22:55');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (21,1,'2023-10-11 17:23:43');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (22,1,'2023-10-11 17:23:44');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (23,1,'2023-10-11 17:23:49');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (24,1,'2023-10-11 17:23:58');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (25,1,'2023-10-11 17:24:02');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (26,1,'2023-10-11 17:26:41');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (27,1,'2023-10-11 20:06:19');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (28,1,'2023-10-11 20:09:33');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (29,1,'2023-10-11 20:20:58');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (30,1,'2023-10-11 20:21:47');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (31,1,'2023-10-11 20:26:03');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (32,1,'2023-10-12 00:08:43');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (33,1,'2023-10-12 00:11:24');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (34,1,'2023-10-12 00:18:02');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (35,1,'2023-10-12 13:08:41');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (36,1,'2023-10-12 13:12:07');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (37,1,'2023-10-12 13:14:41');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (38,1,'2023-10-12 13:15:24');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (39,1,'2023-10-12 13:16:57');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (40,1,'2023-10-12 13:16:59');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (41,1,'2023-10-12 13:17:06');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (42,1,'2023-10-12 13:17:10');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (43,1,'2023-10-12 13:17:13');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (44,1,'2023-10-12 13:20:07');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (45,1,'2023-10-12 13:24:40');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (46,1,'2023-10-12 13:26:00');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (47,1,'2023-10-12 13:26:18');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (48,1,'2023-10-12 13:27:29');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (49,1,'2023-10-12 13:28:11');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (50,1,'2023-10-12 13:28:15');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (51,1,'2023-10-12 13:31:37');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (52,1,'2023-10-12 13:31:42');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (53,1,'2023-10-12 13:31:55');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (54,1,'2023-10-12 13:32:08');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (55,1,'2023-10-12 13:32:32');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (56,1,'2023-10-12 13:34:01');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (57,1,'2023-10-12 13:35:48');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (58,1,'2023-10-12 13:35:56');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (59,1,'2023-10-12 13:36:03');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (60,1,'2023-10-12 13:36:28');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (61,1,'2023-10-12 13:37:48');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (62,1,'2023-10-12 13:37:53');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (63,1,'2023-10-12 13:39:57');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (64,1,'2023-10-12 13:40:05');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (65,1,'2023-10-12 13:40:29');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (66,1,'2023-10-12 13:41:57');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (67,1,'2023-10-12 13:43:12');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (68,1,'2023-10-12 13:44:23');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (69,1,'2023-10-12 13:46:17');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (70,1,'2023-10-12 13:48:03');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (71,1,'2023-10-12 13:51:11');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (72,1,'2023-10-12 13:53:25');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (73,1,'2023-10-12 13:54:22');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (74,1,'2023-10-12 13:54:32');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (75,1,'2023-10-12 13:54:57');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (76,1,'2023-10-12 13:55:37');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (77,1,'2023-10-12 13:55:43');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (78,1,'2023-10-12 13:55:49');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (79,1,'2023-10-12 13:55:59');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (80,1,'2023-10-12 13:56:11');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (81,1,'2023-10-12 13:57:31');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (82,1,'2023-10-12 13:57:50');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (83,1,'2023-10-12 13:58:43');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (84,1,'2023-10-12 14:12:32');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (85,1,'2023-10-12 14:12:45');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (86,1,'2023-10-12 14:14:01');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (87,1,'2023-10-12 14:14:24');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (88,1,'2023-10-12 14:14:55');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (89,1,'2023-10-12 14:19:08');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (90,1,'2023-10-12 14:19:43');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (91,1,'2023-10-12 14:20:15');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (92,1,'2023-10-12 16:56:03');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (93,1,'2023-10-12 16:56:33');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (94,1,'2023-10-12 16:56:37');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (95,1,'2023-10-12 16:56:49');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (96,1,'2023-10-12 16:56:52');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (97,1,'2023-10-12 16:57:01');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (98,1,'2023-10-12 17:40:08');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (99,1,'2023-10-12 17:41:33');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (100,1,'2023-10-12 17:41:42');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (101,1,'2023-10-12 17:44:35');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (102,1,'2023-10-12 17:47:22');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (103,1,'2023-10-12 17:53:40');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (104,1,'2023-10-13 00:07:30');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (105,1,'2023-10-16 11:13:27');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (106,1,'2023-10-18 12:00:25');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (107,1,'2023-10-18 12:16:48');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (108,1,'2023-10-18 12:19:43');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (109,1,'2023-10-18 12:20:18');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (110,1,'2023-10-21 00:37:47');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (111,1,'2023-10-21 19:54:54');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (112,1,'2023-10-21 19:56:40');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (113,1,'2023-10-21 19:58:45');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (114,1,'2023-10-24 19:10:35');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (115,1,'2023-10-24 19:13:31');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (116,1,'2023-10-26 22:59:58');
insert  into `pedido`(`idpedido`,`idusuario`,`fecha_creacion`) values (117,1,'2023-11-02 20:54:50');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

/*Data for the table `persona` */

insert  into `persona`(`idpersona`,`apellidos`,`nombre`,`dni`,`telefono`,`direccion`,`estado`,`fecha_creacion`,`fecha_fin`) values (1,'Ángel Eduardo','Marquina Jaime','72745028','951531166','León de Vivero MZ V LT-22','1','2023-10-03 08:37:55',NULL);
insert  into `persona`(`idpersona`,`apellidos`,`nombre`,`dni`,`telefono`,`direccion`,`estado`,`fecha_creacion`,`fecha_fin`) values (2,'Consuelo','Jaime Espinoza','75698458','947857626','Prolongación Grau 507','1','2023-10-03 08:37:55',NULL);
insert  into `persona`(`idpersona`,`apellidos`,`nombre`,`dni`,`telefono`,`direccion`,`estado`,`fecha_creacion`,`fecha_fin`) values (3,'Miguel Anthony','Marquina Jaime','75896487','932777928','Pasaje la tinguiña','1','2023-10-03 08:37:55',NULL);
insert  into `persona`(`idpersona`,`apellidos`,`nombre`,`dni`,`telefono`,`direccion`,`estado`,`fecha_creacion`,`fecha_fin`) values (4,'Chacalaiza Pachas','ítalo Jesús','74521852','970941729','AV. Santos Nagaro','1','2023-10-17 23:09:32',NULL);
insert  into `persona`(`idpersona`,`apellidos`,`nombre`,`dni`,`telefono`,`direccion`,`estado`,`fecha_creacion`,`fecha_fin`) values (5,'Marquina Jaime','Fernando Jeremy','75698478','906277606','Pasaje a la Tinguiña','1','2023-10-18 10:18:40',NULL);
insert  into `persona`(`idpersona`,`apellidos`,`nombre`,`dni`,`telefono`,`direccion`,`estado`,`fecha_creacion`,`fecha_fin`) values (6,'Marquina','Anthony',NULL,'951531166','León','1','2023-11-01 23:50:35',NULL);
insert  into `persona`(`idpersona`,`apellidos`,`nombre`,`dni`,`telefono`,`direccion`,`estado`,`fecha_creacion`,`fecha_fin`) values (7,'Marquina','Anthony',NULL,'95153116','Casa','1','2023-11-01 23:52:44',NULL);
insert  into `persona`(`idpersona`,`apellidos`,`nombre`,`dni`,`telefono`,`direccion`,`estado`,`fecha_creacion`,`fecha_fin`) values (8,'Marquina','Angel',NULL,'951531166','León de Vivero','1','2023-11-01 23:53:11',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

/*Data for the table `producto` */

insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (1,1,'Inka kola 1/2 litro','B',2.00,12,'1','2023-10-03 08:57:27',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (2,2,'Cerveza Cristal 650 ml','B',6.50,9,'1','2023-10-03 08:57:27',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (3,3,'Cifrut 1/2 litro','B',1.50,9,'1','2023-10-03 08:57:27',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (4,NULL,'Sopa Seca con Carapulcra','P',22.00,NULL,'1','2023-10-03 08:57:29',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (5,NULL,'Chilcano','P',7.00,NULL,'0','2023-10-03 08:57:29',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (6,NULL,'Ceviche con chicharron','P',12.00,NULL,'1','2023-10-03 08:57:29',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (7,NULL,'Ceviche','P',10.00,NULL,'1','2023-10-03 08:57:29',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (8,1,'Inka Kola 1.5 LT','B',6.50,11,'1','2023-10-04 15:58:12',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (9,NULL,'Estofado de Pollo con ensalada','P',10.00,NULL,'0','2023-10-04 15:58:24',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (10,NULL,'Chilcano + Ceviche con chicharron','M',20.00,NULL,'0','2023-10-25 18:45:18',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (11,NULL,'Chilcano + Ceviche','M',20.00,NULL,'1','2023-10-25 19:16:28',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (12,NULL,'Chilcano + Sopa Seca con Carapulcra','M',25.00,NULL,'0','2023-10-25 19:19:40',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (13,NULL,'Chilcano + Estofado de Pollo con ensalada','M',15.00,NULL,'0','2023-10-25 19:20:31',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (14,NULL,'Chilcano + Sopa Seca con Carapulcra','M',25.00,NULL,'0','2023-10-25 19:21:23',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (15,NULL,'Ceviche con chicharron + Estofado de Pollo con ens','M',25.00,NULL,'0','2023-10-25 19:22:43',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (16,NULL,'Chilcano + Sopa Seca con Carapulcra','M',25.00,NULL,'0','2023-10-25 19:52:57',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (17,NULL,'Seleccione el producto\n                    Sopa Se','M',0.00,NULL,'0','2023-10-25 20:13:26',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (18,NULL,'Chilcano + Ceviche con chicharron','M',20.00,NULL,'0','2023-10-25 20:14:01',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (19,NULL,'Sopa Seca con Carapulcra + Chilcano','M',25.00,NULL,'0','2023-10-25 20:22:33',NULL);
insert  into `producto`(`idproducto`,`idmarca`,`producto`,`tipo`,`precio`,`stock`,`estado`,`fecha_creacion`,`fecha_fin`) values (20,1,'Inka Kola 2 LT','B',8.00,12,'1','2023-10-26 21:12:14',NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuario` */

insert  into `usuario`(`idpersona`,`idusuario`,`usuario`,`clave`,`nivelacceso`,`estado`,`fecha_creacion`,`fecha_fin`) values (1,1,'AngelMJ','$2y$10$WY.iP85bEYxBMkVBG0jKO.9Q97kEbofLVwJPUT1OAmsDzLXQ8Pcka','A','1','2023-10-03 08:38:01',NULL);
insert  into `usuario`(`idpersona`,`idusuario`,`usuario`,`clave`,`nivelacceso`,`estado`,`fecha_creacion`,`fecha_fin`) values (2,2,'ConsueloJE','$2y$10$WY.iP85bEYxBMkVBG0jKO.9Q97kEbofLVwJPUT1OAmsDzLXQ8Pcka','E','1','2023-10-03 08:38:01',NULL);

/*Table structure for table `venta` */

CREATE TABLE `venta` (
  `idventa` smallint(6) NOT NULL AUTO_INCREMENT,
  `idpedido` smallint(6) NOT NULL,
  `total` decimal(6,2) NOT NULL,
  `idusuario` smallint(6) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idventa`),
  KEY `fk_idpedido_v` (`idpedido`),
  KEY `fk_idproducto_v` (`idusuario`),
  CONSTRAINT `fk_idpedido_v` FOREIGN KEY (`idpedido`) REFERENCES `pedido` (`idpedido`),
  CONSTRAINT `fk_idproducto_v` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4;

/*Data for the table `venta` */

insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (1,1,44.00,1,'1','2023-10-03 11:46:09');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (2,1,1.00,1,'1','2023-10-11 20:09:15');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (3,28,22.50,1,'1','2023-10-11 20:09:33');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (4,30,23.50,1,'1','2023-10-11 20:21:48');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (5,31,97.00,1,'1','2023-10-11 20:26:03');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (6,32,2.00,1,'1','2023-10-12 00:08:43');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (7,33,131.00,1,'1','2023-10-12 00:11:24');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (8,34,22.00,1,'1','2023-10-12 00:18:02');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (9,35,26.00,1,'1','2023-10-12 13:08:41');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (10,36,26.00,1,'1','2023-10-12 13:12:07');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (11,44,84.50,1,'1','2023-10-12 13:20:07');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (12,45,84.50,1,'1','2023-10-12 13:24:40');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (13,48,84.50,1,'1','2023-10-12 13:27:29');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (14,49,6.50,1,'1','2023-10-12 13:28:11');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (15,50,6.50,1,'1','2023-10-12 13:28:15');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (16,51,6.50,1,'1','2023-10-12 13:31:37');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (17,52,19.50,1,'1','2023-10-12 13:31:42');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (18,53,19.50,1,'1','2023-10-12 13:31:55');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (19,54,19.50,1,'1','2023-10-12 13:32:08');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (20,55,19.50,1,'1','2023-10-12 13:32:32');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (21,56,19.50,1,'1','2023-10-12 13:34:01');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (22,58,1.50,1,'1','2023-10-12 13:35:56');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (23,59,1.50,1,'1','2023-10-12 13:36:03');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (24,60,3.00,1,'1','2023-10-12 13:36:28');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (25,61,6.50,1,'1','2023-10-12 13:37:49');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (26,62,1.50,1,'1','2023-10-12 13:37:53');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (27,63,1.50,1,'1','2023-10-12 13:39:57');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (28,64,6.50,1,'1','2023-10-12 13:40:05');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (29,65,6.50,1,'1','2023-10-12 13:40:29');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (30,66,6.50,1,'1','2023-10-12 13:41:57');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (31,67,6.50,1,'1','2023-10-12 13:43:12');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (32,68,6.50,1,'1','2023-10-12 13:44:23');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (33,69,6.50,1,'1','2023-10-12 13:46:17');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (34,70,6.50,1,'1','2023-10-12 13:48:03');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (36,71,6.50,1,'1','2023-10-12 13:51:11');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (37,72,6.50,1,'1','2023-10-12 13:53:25');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (38,73,6.50,1,'1','2023-10-12 13:54:22');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (39,74,6.50,1,'1','2023-10-12 13:54:32');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (40,75,6.50,1,'1','2023-10-12 13:54:57');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (41,76,6.50,1,'1','2023-10-12 13:55:37');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (42,77,6.50,1,'1','2023-10-12 13:55:43');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (43,78,1.50,1,'1','2023-10-12 13:55:49');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (44,79,6.50,1,'1','2023-10-12 13:55:59');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (45,80,6.50,1,'1','2023-10-12 13:56:11');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (46,81,6.50,1,'1','2023-10-12 13:57:31');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (47,82,6.50,1,'1','2023-10-12 13:57:50');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (48,83,6.50,1,'1','2023-10-12 13:58:43');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (49,89,1.50,1,'1','2023-10-12 14:19:09');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (50,90,1.50,1,'1','2023-10-12 14:19:43');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (51,91,1.50,1,'1','2023-10-12 14:20:15');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (52,92,6.50,1,'1','2023-10-12 16:56:03');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (53,93,6.50,1,'1','2023-10-12 16:56:33');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (54,94,6.50,1,'1','2023-10-12 16:56:38');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (55,95,6.50,1,'1','2023-10-12 16:56:49');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (56,96,6.50,1,'1','2023-10-12 16:56:52');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (57,97,6.50,1,'1','2023-10-12 16:57:01');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (58,98,6.50,1,'1','2023-10-12 17:40:08');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (59,99,6.50,1,'1','2023-10-12 17:41:33');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (60,100,6.50,1,'1','2023-10-12 17:41:42');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (61,101,6.50,1,'1','2023-10-12 17:44:35');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (62,102,6.50,1,'1','2023-10-12 17:47:22');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (63,103,6.50,1,'1','2023-10-12 17:53:40');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (64,104,6.00,1,'2','2023-10-13 00:07:30');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (65,105,47.50,1,'2','2023-10-16 11:13:27');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (66,106,6.50,1,'2','2023-10-18 12:00:25');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (67,107,6.50,1,'1','2023-10-18 12:16:48');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (68,108,2.00,1,'1','2023-10-18 12:19:43');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (69,109,2.00,1,'2','2023-10-18 12:20:18');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (70,110,24.00,1,'2','2023-10-21 00:37:47');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (71,112,2.00,1,'2','2023-10-21 19:56:40');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (72,113,2.00,1,'2','2023-10-21 19:58:45');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (73,114,41.00,1,'1','2023-10-24 19:10:35');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (74,115,2.00,1,'1','2023-10-24 19:13:31');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (75,116,22.00,1,'1','2023-10-26 22:59:58');
insert  into `venta`(`idventa`,`idpedido`,`total`,`idusuario`,`estado`,`fecha_creacion`) values (76,117,62.00,1,'1','2023-11-02 20:54:50');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
