-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2016 a las 20:59:32
-- Versión del servidor: 5.6.25
-- Versión de PHP: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `beneficiario`
--

CREATE TABLE IF NOT EXISTS `beneficiario` (
  `idbeneficiario` int(11) NOT NULL,
  `ci_beneficiario` varchar(11) DEFAULT NULL,
  `nombre_beneficiario` varchar(50) DEFAULT NULL,
  `direccion_beneficiario` char(50) DEFAULT NULL,
  `telefono` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleta_pesaje`
--

CREATE TABLE IF NOT EXISTS `boleta_pesaje` (
  `idboleta` int(11) NOT NULL,
  `nboleta` varchar(11) DEFAULT NULL,
  `idchofer` int(11) DEFAULT NULL,
  `idcamion` int(11) DEFAULT NULL,
  `idsilo` int(11) DEFAULT NULL,
  `idproducto` int(11) DEFAULT NULL,
  `fecha_de_balanza` date DEFAULT NULL,
  `merma` double DEFAULT NULL,
  `peso_producto_salida` double DEFAULT NULL,
  `peso_producto_llegada` double DEFAULT NULL,
  `flete` double DEFAULT NULL,
  `porcentaje` double DEFAULT NULL,
  `fletexpeso` double DEFAULT NULL,
  `idcontrato` int(11) DEFAULT NULL,
  `iddestino` int(11) DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `fecha_llegada` date DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=307 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `boleta_pesaje`
--



CREATE TABLE IF NOT EXISTS `camion` (
  `idcamion` int(11) NOT NULL,
  `placa` char(20) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `tonelaje` double DEFAULT NULL,
  `idtransportadora` int(11) DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=137 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `camion`
--



CREATE TABLE IF NOT EXISTS `chofer` (
  `idchofer` int(11) NOT NULL,
  `ci_chofer` varchar(11) DEFAULT NULL,
  `nombre_chofer` varchar(50) DEFAULT NULL,
  `direccion_chofer` char(50) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `idtransportadora` int(11) DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=281 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chofer`
--



CREATE TABLE IF NOT EXISTS `contrato` (
  `idcontrato` int(11) NOT NULL,
  `ncontrato` int(11) NOT NULL,
  `fecha_contrato` date DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contrato`
--



CREATE TABLE IF NOT EXISTS `destino` (
  `iddestino` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `destino`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
  `idpago` int(11) NOT NULL,
  `monto` double DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `modo` char(50) DEFAULT NULL,
  `cheque` char(50) DEFAULT NULL,
  `estado` char(50) DEFAULT NULL,
  `idbeneficiario` int(11) DEFAULT NULL,
  `idboleta` int(11) DEFAULT NULL,
  `estado_eliminado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `idproducto` int(11) NOT NULL,
  `descripcion` char(90) DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `silo`
--

CREATE TABLE IF NOT EXISTS `silo` (
  `idsilo` int(11) NOT NULL,
  `nombre_silo` varchar(50) DEFAULT NULL,
  `direccion_silo` char(50) DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `silo`
--



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporal`
--

CREATE TABLE IF NOT EXISTS `temporal` (
  `id` int(11) NOT NULL,
  `ncontrato` varchar(11) DEFAULT NULL,
  `placa` char(20) DEFAULT NULL,
  `peso_producto_salida` double DEFAULT NULL,
  `nboleta` varchar(11) DEFAULT NULL,
  `nombre_transportadora` varchar(50) DEFAULT NULL,
  `nombre_chofer` varchar(50) DEFAULT NULL,
  `nombre_silo` varchar(50) DEFAULT NULL,
  `flete` double DEFAULT NULL,
  `porcentaje` double DEFAULT NULL,
  `cheque` char(50) DEFAULT NULL,
  `fletexpeso` double DEFAULT NULL,
  `fecha_de_balanza` date DEFAULT NULL,
  `fecha_contrato` date DEFAULT NULL,
  `direccion_silo` char(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `descripcion` char(90) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `carguio` int(11) DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=307 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `temporal`
--

--
-- Disparadores `temporal`
--
DELIMITER $$
CREATE TRIGGER `Separar` AFTER INSERT ON `temporal`
 FOR EACH ROW BEGIN
declare id_chofer INT;
declare id_transportadora INT;
declare id_silo INT;
declare id_camion INT;
declare id_contrato INT;
declare id_producto INT;
declare id_destino INT;
INSERT INTO boleta_pesaje (nboleta, fecha_de_balanza, flete,porcentaje, fletexpeso, peso_producto_salida) 
values 
(new.nboleta,new.fecha_de_balanza,new.flete,new.porcentaje,new.fletexpeso,new.peso_producto_salida);
 IF (EXISTS(SELECT * FROM transportadora WHERE nombre_transportadora = NEW.nombre_transportadora)) THEN
		select idtransportadora into id_transportadora from transportadora where nombre_transportadora = NEW.nombre_transportadora;
		
	else
	   insert into transportadora (nombre_transportadora) values (new.nombre_transportadora);
		select idtransportadora into id_transportadora from transportadora where nombre_transportadora = NEW.nombre_transportadora;
	
	
	
  END IF; 
 IF (EXISTS(SELECT * FROM chofer WHERE nombre_chofer = NEW.nombre_chofer)) THEN
		select idchofer into id_chofer from chofer where nombre_chofer = NEW.nombre_chofer;
		Update boleta_pesaje set idchofer=id_chofer where new.nboleta=nboleta;
	else
	   insert into chofer (nombre_chofer,idtransportadora) values (new.nombre_chofer,id_transportadora);
		select idchofer into id_chofer from chofer where nombre_chofer = NEW.nombre_chofer;
	Update boleta_pesaje set idchofer=id_chofer where new.nboleta=nboleta;
	
	
  END IF;
 
  IF (EXISTS(SELECT * FROM silo WHERE nombre_silo = NEW.nombre_silo)) THEN
		select idsilo into id_silo from silo where nombre_silo = NEW.nombre_silo;
		Update boleta_pesaje set idsilo=id_silo where new.nboleta=nboleta;
	else
	   insert into silo (nombre_silo,direccion_silo) values (new.nombre_silo,new.direccion_silo);
		select idsilo into id_silo from silo where nombre_silo = NEW.nombre_silo;
	Update boleta_pesaje set idsilo=id_silo where new.nboleta=nboleta;
	
	
  END IF;
  IF (EXISTS(SELECT * FROM camion WHERE placa = NEW.placa)) THEN
		select idcamion into id_camion from camion where placa = NEW.placa;
		Update boleta_pesaje set idcamion=id_camion where new.nboleta=nboleta;
	else
	   insert into camion (placa,color,idtransportadora) values (new.placa,new.color,id_transportadora);
		select idcamion into id_camion from camion where placa = NEW.placa;
	Update boleta_pesaje set idcamion=id_camion where new.nboleta=nboleta;
	
	
  END IF;
  
  IF (EXISTS(SELECT * FROM contrato WHERE ncontrato = NEW.ncontrato)) THEN
		select idcontrato into id_contrato from contrato where ncontrato = NEW.ncontrato;
		Update boleta_pesaje set idcontrato=id_contrato where new.nboleta=nboleta;
	else
	   insert into contrato (ncontrato,fecha_contrato) values (new.ncontrato,new.fecha_contrato);
		select idcontrato into id_contrato from contrato where ncontrato = NEW.ncontrato;
	Update boleta_pesaje set idcontrato=id_contrato where new.nboleta=nboleta;
	
	
  END IF;
    IF (EXISTS(SELECT * FROM producto WHERE descripcion = NEW.descripcion)) THEN
		select idproducto into id_producto from producto where descripcion = NEW.descripcion;
		Update boleta_pesaje set idproducto=id_producto where new.nboleta=nboleta;
	else
	   insert into producto (descripcion) values (new.descripcion);
		select idproducto into id_producto from producto where descripcion = NEW.descripcion;
	Update boleta_pesaje set idproducto=id_producto where new.nboleta=nboleta;
	
	
  END IF;
    IF (EXISTS(SELECT * FROM destino WHERE ciudad = NEW.ciudad)) THEN
		select iddestino into id_destino from destino where ciudad = NEW.ciudad;
		Update boleta_pesaje set iddestino=id_destino where new.nboleta=nboleta;
	else
	   insert into destino (ciudad) values (new.ciudad);
		select iddestino into id_destino from destino where ciudad = NEW.ciudad;
	Update boleta_pesaje set iddestino=id_destino where new.nboleta=nboleta;
	
	
  END IF;
  
  END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transportadora`
--

CREATE TABLE IF NOT EXISTS `transportadora` (
  `idtransportadora` int(11) NOT NULL,
  `nombre_transportadora` varchar(50) DEFAULT NULL,
  `direccion_transportadora` char(50) DEFAULT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `transportadora`
--



--
-- Indices de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  ADD PRIMARY KEY (`idbeneficiario`);

--
-- Indices de la tabla `boleta_pesaje`
--
ALTER TABLE `boleta_pesaje`
  ADD PRIMARY KEY (`idboleta`),
  ADD KEY `FK_boleta_pesaje_contrato` (`idcontrato`),
  ADD KEY `FK_boleta_pesaje_producto` (`idproducto`),
  ADD KEY `FK_boleta_pesaje_silo` (`idsilo`),
  ADD KEY `FK_ci_chofer` (`idchofer`),
  ADD KEY `FK_id_destino` (`iddestino`),
  ADD KEY `FK_placa` (`idcamion`);

--
-- Indices de la tabla `camion`
--
ALTER TABLE `camion`
  ADD PRIMARY KEY (`idcamion`),
  ADD KEY `FK_camion_transportadora` (`idtransportadora`);

--
-- Indices de la tabla `chofer`
--
ALTER TABLE `chofer`
  ADD PRIMARY KEY (`idchofer`),
  ADD KEY `FK_chofer_transportadora` (`idtransportadora`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`idcontrato`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`iddestino`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`idpago`),
  ADD KEY `FK_pago_boleta_pesaje` (`idboleta`),
  ADD KEY `FK_pago_beneficiario` (`idbeneficiario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`);

--
-- Indices de la tabla `silo`
--
ALTER TABLE `silo`
  ADD PRIMARY KEY (`idsilo`);

--
-- Indices de la tabla `temporal`
--
ALTER TABLE `temporal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transportadora`
--
ALTER TABLE `transportadora`
  ADD PRIMARY KEY (`idtransportadora`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `beneficiario`
--
ALTER TABLE `beneficiario`
  MODIFY `idbeneficiario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `boleta_pesaje`
--
ALTER TABLE `boleta_pesaje`
  MODIFY `idboleta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=307;
--
-- AUTO_INCREMENT de la tabla `camion`
--
ALTER TABLE `camion`
  MODIFY `idcamion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=137;
--
-- AUTO_INCREMENT de la tabla `chofer`
--
ALTER TABLE `chofer`
  MODIFY `idchofer` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=281;
--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `idcontrato` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `iddestino` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `idpago` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `silo`
--
ALTER TABLE `silo`
  MODIFY `idsilo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `temporal`
--
ALTER TABLE `temporal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=307;
--
-- AUTO_INCREMENT de la tabla `transportadora`
--
ALTER TABLE `transportadora`
  MODIFY `idtransportadora` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `boleta_pesaje`
--
ALTER TABLE `boleta_pesaje`
  ADD CONSTRAINT `FK_boleta_pesaje_contrato` FOREIGN KEY (`idcontrato`) REFERENCES `contrato` (`idcontrato`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_boleta_pesaje_producto` FOREIGN KEY (`idproducto`) REFERENCES `producto` (`idproducto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_boleta_pesaje_silo` FOREIGN KEY (`idsilo`) REFERENCES `silo` (`idsilo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_ci_chofer` FOREIGN KEY (`idchofer`) REFERENCES `chofer` (`idchofer`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_id_destino` FOREIGN KEY (`iddestino`) REFERENCES `destino` (`iddestino`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_placa` FOREIGN KEY (`idcamion`) REFERENCES `camion` (`idcamion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `camion`
--
ALTER TABLE `camion`
  ADD CONSTRAINT `FK_camion_transportadora` FOREIGN KEY (`idtransportadora`) REFERENCES `transportadora` (`idtransportadora`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `chofer`
--
ALTER TABLE `chofer`
  ADD CONSTRAINT `FK_chofer_transportadora` FOREIGN KEY (`idtransportadora`) REFERENCES `transportadora` (`idtransportadora`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `FK_pago_beneficiario` FOREIGN KEY (`idbeneficiario`) REFERENCES `beneficiario` (`idbeneficiario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pago_boleta_pesaje` FOREIGN KEY (`idboleta`) REFERENCES `boleta_pesaje` (`idboleta`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
