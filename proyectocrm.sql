-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-05-2012 a las 13:57:07
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyectocrm`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `totalfactura`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `totalfactura`(IN idfact INT , OUT totalfact DOUBLE(20,2))
BEGIN
 SELECT SUM(cantidad*precio) INTO totalfact FROM facturas_has_productos INNER JOIN productos ON facturas_has_productos.productos_idarticulos=productos.idarticulos WHERE facturas_idfacturas=idfact ;
 UPDATE facturas SET importe = totalfact where idfacturas=idfact;
 END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`) VALUES
(1, 'prueba', 'hdfhfg'),
(2, 'prueba2', 'ghfdhd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `idclientes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cif` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `empresa` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `cod_postal` int(10) unsigned DEFAULT NULL,
  `telefono` int(10) unsigned DEFAULT NULL,
  `movil` int(10) unsigned DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idclientes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idclientes`, `cif`, `nombre`, `apellido`, `empresa`, `direccion`, `provincia`, `cod_postal`, `telefono`, `movil`, `email`) VALUES
(1, '4534534', '345345345', '34532534534', 'hola', '345345345', '345345345', 34534534, 345345345, 345345345, 'hola@hola.com'),
(2, '45345345345', '345345345', '34532534534', 'hola', '345345345', '345345345', 34534534, 345345345, 4545455, '345345345'),
(3, '434534534', '435345345', '345345345', '345345', '345345345', '3535353', 53535345, 3453535, 344534534, '3535353'),
(4, '435345345', '345345345', '345345345', '345345345', '3534534534', '534534534', 5345345, 535345, 34534534, 'hola@hola.com'),
(5, '435345345', '345345345', '345345345', '345345345', '3534534534', '534534534', 5345345, 535345, 34534534, 'hola.com'),
(6, '435345345', '345345345', '345345345', '345345345', '3534534534', '534534534', 5345345, 535345, 34534534, 'holadrwerwer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

DROP TABLE IF EXISTS `facturas`;
CREATE TABLE IF NOT EXISTS `facturas` (
  `idfacturas` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `clientes_idclientes` int(10) unsigned NOT NULL,
  `fecha` date DEFAULT NULL,
  `concepto` varchar(30) DEFAULT NULL,
  `importe` double(20,2) DEFAULT NULL,
  PRIMARY KEY (`idfacturas`),
  KEY `fk_facturas_clientes` (`clientes_idclientes`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`idfacturas`, `clientes_idclientes`, `fecha`, `concepto`, `importe`) VALUES
(5, 1, '1999-02-02', 'rewerwerwer', 8041460614.00),
(6, 1, '0000-00-00', 'sdfsdfsdfs', 30097273.00),
(7, 1, '0000-00-00', 'erwwerwerwe', 722.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas_has_productos`
--

DROP TABLE IF EXISTS `facturas_has_productos`;
CREATE TABLE IF NOT EXISTS `facturas_has_productos` (
  `facturas_idfacturas` int(10) unsigned NOT NULL,
  `productos_idarticulos` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`facturas_idfacturas`,`productos_idarticulos`),
  KEY `fk_facturas_has_productos_productos1` (`productos_idarticulos`),
  KEY `fk_facturas_has_productos_facturas1` (`facturas_idfacturas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `facturas_has_productos`
--

INSERT INTO `facturas_has_productos` (`facturas_idfacturas`, `productos_idarticulos`, `cantidad`) VALUES
(5, 1, 94),
(5, 2, 423234239),
(5, 3, 299),
(6, 2, 423441),
(6, 3, 958778),
(7, 2, 38);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `idarticulos` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `stock` int(10) unsigned DEFAULT NULL,
  `precio` double(20,2) DEFAULT NULL,
  `categoria_idcategoria` int(11) NOT NULL,
  `proveedores_idproveedores` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idarticulos`,`proveedores_idproveedores`),
  KEY `fk_productos_categoria1` (`categoria_idcategoria`),
  KEY `fk_productos_proveedores1` (`proveedores_idproveedores`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idarticulos`, `nombre`, `descripcion`, `stock`, `precio`, `categoria_idcategoria`, `proveedores_idproveedores`) VALUES
(1, 'dfgdfg', 'dfgdfgdfgd', 34, 34.00, 1, 1),
(2, 'fsdfsdfsdf', 'sdfsdfsdf', 20, 19.00, 2, 3),
(3, 'dfssdfsdsdf', 'sdfsdfsfs', 23, 23.00, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `idproveedores` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cif` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `empresa` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `cod_postal` int(10) unsigned DEFAULT NULL,
  `telefono` int(10) unsigned DEFAULT NULL,
  `movil` int(10) unsigned DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idproveedores`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idproveedores`, `cif`, `nombre`, `apellido`, `empresa`, `direccion`, `provincia`, `cod_postal`, `telefono`, `movil`, `email`) VALUES
(1, '324324', 'egegfd', 'dfgdfgdgdf', 'dfgdfgdfg', 'dfgdfgdf', 'gdfgdfddfgdfg', 432234, 234234234, 234242423, '234242342'),
(2, '23423423', '234234234', '23423423423', '234234234', '234234234', '242342342', 234234234, 234234234, 2342342342, '23423423423'),
(3, '534534534', '345345345', '34534534', '5345345345', '5345345345', '34534534', 534534534, 34534534, 534534534, '34534534534');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `fk_facturas_clientes` FOREIGN KEY (`clientes_idclientes`) REFERENCES `clientes` (`idclientes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `facturas_has_productos`
--
ALTER TABLE `facturas_has_productos`
  ADD CONSTRAINT `fk_facturas_has_productos_facturas1` FOREIGN KEY (`facturas_idfacturas`) REFERENCES `facturas` (`idfacturas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_facturas_has_productos_productos1` FOREIGN KEY (`productos_idarticulos`) REFERENCES `productos` (`idarticulos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categoria1` FOREIGN KEY (`categoria_idcategoria`) REFERENCES `categoria` (`idcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_proveedores1` FOREIGN KEY (`proveedores_idproveedores`) REFERENCES `proveedores` (`idproveedores`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
