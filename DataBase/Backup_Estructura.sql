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
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4;

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

/*Table structure for table `marcas` */

CREATE TABLE `marcas` (
  `idmarca` smallint(6) NOT NULL AUTO_INCREMENT,
  `marca` varchar(40) NOT NULL,
  `estado` char(1) NOT NULL DEFAULT '1',
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`idmarca`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Table structure for table `pedido` */

CREATE TABLE `pedido` (
  `idpedido` smallint(6) NOT NULL AUTO_INCREMENT,
  `idusuario` smallint(6) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idpedido`),
  KEY `fk_idusuario_p` (`idusuario`),
  CONSTRAINT `fk_idusuario_p` FOREIGN KEY (`idusuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4;

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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
