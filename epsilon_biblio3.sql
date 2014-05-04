/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50536
Source Host           : localhost:3306
Source Database       : epsilon_biblio

Target Server Type    : MYSQL
Target Server Version : 50536
File Encoding         : 65001

Date: 2014-05-01 10:02:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `asignacion_libro_autor`
-- ----------------------------
DROP TABLE IF EXISTS `asignacion_libro_autor`;
CREATE TABLE `asignacion_libro_autor` (
  `autor` int(11) NOT NULL,
  `libro` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`autor`,`libro`),
  KEY `fk_asignacion_libro_autor_1_idx` (`libro`),
  CONSTRAINT `fk_asignacion_libro_autor_1` FOREIGN KEY (`libro`) REFERENCES `libro` (`idlibro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_asignacion_libro_autor_2` FOREIGN KEY (`autor`) REFERENCES `autor` (`idautor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of asignacion_libro_autor
-- ----------------------------

-- ----------------------------
-- Table structure for `autor`
-- ----------------------------
DROP TABLE IF EXISTS `autor`;
CREATE TABLE `autor` (
  `idautor` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `nacionalidad` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idautor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of autor
-- ----------------------------
INSERT INTO `autor` VALUES ('1', 'Gabriel garcia', 'colombiana', '1');

-- ----------------------------
-- Table structure for `categoria`
-- ----------------------------
DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL DEFAULT '0',
  `descripcion` text,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`),
  KEY `idcategoria` (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categoria
-- ----------------------------
INSERT INTO `categoria` VALUES ('1', 'contabilidaf', '1');

-- ----------------------------
-- Table structure for `detalle_prestamo`
-- ----------------------------
DROP TABLE IF EXISTS `detalle_prestamo`;
CREATE TABLE `detalle_prestamo` (
  `prestamo` int(11) NOT NULL,
  `libro` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`prestamo`,`libro`),
  KEY `fk_detalle_prestamo_1_idx` (`libro`),
  CONSTRAINT `fk_detalle_prestamo_1` FOREIGN KEY (`libro`) REFERENCES `libro` (`idlibro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_detalle_prestamo_2` FOREIGN KEY (`prestamo`) REFERENCES `prestamos` (`idprestamos`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of detalle_prestamo
-- ----------------------------

-- ----------------------------
-- Table structure for `editorial`
-- ----------------------------
DROP TABLE IF EXISTS `editorial`;
CREATE TABLE `editorial` (
  `ideditorial` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `nacionalidad` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`ideditorial`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of editorial
-- ----------------------------
INSERT INTO `editorial` VALUES ('1', 'oveja negra', 'colobiana', '1');
INSERT INTO `editorial` VALUES ('2', 'megabyte', 'peruana', '1');

-- ----------------------------
-- Table structure for `lector`
-- ----------------------------
DROP TABLE IF EXISTS `lector`;
CREATE TABLE `lector` (
  `idlector` int(11) NOT NULL,
  `nombre` text,
  `dni` varchar(8) DEFAULT NULL,
  `direccion` text,
  `telefono` varchar(45) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `fotografia` text,
  PRIMARY KEY (`idlector`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lector
-- ----------------------------
INSERT INTO `lector` VALUES ('1', 'antony', '12345678', null, null, '1', '1', null);

-- ----------------------------
-- Table structure for `libro`
-- ----------------------------
DROP TABLE IF EXISTS `libro`;
CREATE TABLE `libro` (
  `idlibro` int(11) NOT NULL,
  `codigo_libro` varchar(45) DEFAULT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `descripcion` text,
  `isbn` text,
  `editorial` int(11) DEFAULT NULL,
  `year_Edicion` date DEFAULT NULL,
  `year_last_edicion` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`idlibro`),
  KEY `fk_libro_1_idx` (`editorial`),
  KEY `fk_libro_cat` (`categoria`),
  CONSTRAINT `fk_libro_1` FOREIGN KEY (`editorial`) REFERENCES `editorial` (`ideditorial`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_libro_cat` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of libro
-- ----------------------------
INSERT INTO `libro` VALUES ('1', '0012', 'cien años de soledad', null, '001', '1', '2014-04-01', '0000-00-00', '1', '1');
INSERT INTO `libro` VALUES ('2', '0013', 'conta', null, '00-123', '1', null, null, '1', '1');

-- ----------------------------
-- Table structure for `modulo`
-- ----------------------------
DROP TABLE IF EXISTS `modulo`;
CREATE TABLE `modulo` (
  `idmodulo` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `submodulo` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `icono` text,
  PRIMARY KEY (`idmodulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modulo
-- ----------------------------
INSERT INTO `modulo` VALUES ('1', 'CATALOGO LIBROS', 'controller=_Permisos', null, '1', '1', 'icon-user');
INSERT INTO `modulo` VALUES ('2', 'PRESTAMOS LIBROS', '#', null, '1', '2', 'icon-th-list');
INSERT INTO `modulo` VALUES ('3', 'SEGURIDAD', '#', null, '1', '3', 'icon-shopping-cart');
INSERT INTO `modulo` VALUES ('4', 'lIBROS', 'controller=Libro', '1', '1', '1', null);
INSERT INTO `modulo` VALUES ('5', 'AUTORES', 'controller=Autor', '1', '1', '2', null);
INSERT INTO `modulo` VALUES ('6', 'EDITORIAL', 'controller=Editorial', '1', '1', '3', null);
INSERT INTO `modulo` VALUES ('7', 'CATEGORIA', 'controller=Categoria', '1', '1', '4', null);
INSERT INTO `modulo` VALUES ('8', 'PRESTAMOS', 'controller=Prestamo', '2', '1', '1', null);
INSERT INTO `modulo` VALUES ('9', 'LECTORES', 'controller=Lector', '2', '1', '2', null);
INSERT INTO `modulo` VALUES ('10', 'Perfil', 'controller=Perfil', '3', '1', '1', null);
INSERT INTO `modulo` VALUES ('11', 'Personal', 'controller=User', '3', '1', '2', null);
INSERT INTO `modulo` VALUES ('12', 'PERMISOS', 'controller=_Permisos', '3', '1', '3', null);

-- ----------------------------
-- Table structure for `perfil`
-- ----------------------------
DROP TABLE IF EXISTS `perfil`;
CREATE TABLE `perfil` (
  `idperfil` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idperfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of perfil
-- ----------------------------
INSERT INTO `perfil` VALUES ('1', 'administrador', '1');

-- ----------------------------
-- Table structure for `permiso`
-- ----------------------------
DROP TABLE IF EXISTS `permiso`;
CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `modulo` int(11) NOT NULL,
  `perfil` int(11) NOT NULL,
  `editar` int(11) DEFAULT NULL,
  `eliminar` int(11) DEFAULT NULL,
  `insertar` int(11) DEFAULT NULL,
  `acceder` int(11) DEFAULT NULL,
  PRIMARY KEY (`idpermiso`),
  KEY `fk_modulo_has_perfil_perfil1_idx` (`perfil`),
  KEY `fk_modulo_has_perfil_modulo1_idx` (`modulo`),
  CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`modulo`) REFERENCES `modulo` (`idmodulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `permiso_ibfk_2` FOREIGN KEY (`perfil`) REFERENCES `perfil` (`idperfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of permiso
-- ----------------------------
INSERT INTO `permiso` VALUES ('1', '1', '1', '1', '1', '1', '1');
INSERT INTO `permiso` VALUES ('2', '2', '1', '1', '1', '1', '1');
INSERT INTO `permiso` VALUES ('3', '3', '1', '1', '1', '1', '1');
INSERT INTO `permiso` VALUES ('4', '4', '1', '1', '1', '1', '1');
INSERT INTO `permiso` VALUES ('5', '5', '1', '1', '1', '1', '1');
INSERT INTO `permiso` VALUES ('6', '6', '1', '1', '1', '1', '1');
INSERT INTO `permiso` VALUES ('7', '7', '1', '1', '1', '1', '1');
INSERT INTO `permiso` VALUES ('8', '8', '1', '1', '1', '1', '1');
INSERT INTO `permiso` VALUES ('9', '9', '1', '1', '1', '1', '1');
INSERT INTO `permiso` VALUES ('10', '10', '1', '1', '1', '1', '1');
INSERT INTO `permiso` VALUES ('11', '11', '1', '1', '1', '1', '1');
INSERT INTO `permiso` VALUES ('12', '12', '1', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for `prestamos`
-- ----------------------------
DROP TABLE IF EXISTS `prestamos`;
CREATE TABLE `prestamos` (
  `idprestamos` int(11) NOT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `fecha_devolucion` date DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `lector` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `usuario` int(45) DEFAULT NULL,
  PRIMARY KEY (`idprestamos`),
  KEY `fk_prestamos_2_idx` (`lector`),
  KEY `fk_prestamo_usuario` (`usuario`),
  CONSTRAINT `fk_prestamos_2` FOREIGN KEY (`lector`) REFERENCES `lector` (`idlector`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_prestamo_usuario` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of prestamos
-- ----------------------------
INSERT INTO `prestamos` VALUES ('1', '2014-04-01', '2014-04-21', 'libros', '1', '1', '1');
INSERT INTO `prestamos` VALUES ('2', '2014-04-22', '2014-06-06', 'libros', '1', '1', '1');

-- ----------------------------
-- Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `perfil` int(11) NOT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `nombres` text,
  `domicilio` text,
  `telefono` text,
  `profesion` varchar(45) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `usuario` varchar(10) DEFAULT NULL,
  `clave` varchar(20) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `foto` text,
  PRIMARY KEY (`idusuario`),
  KEY `fk_usuario_perfil1_idx` (`perfil`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`perfil`) REFERENCES `perfil` (`idperfil`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuario
-- ----------------------------
INSERT INTO `usuario` VALUES ('1', '1', '46901755', 'lenin', 'jr.', '9', 'ing..sistemas', 'M', null, 'lenin', '123', '1', '129042014080449');

-- ----------------------------
-- View structure for `vista_lector`
-- ----------------------------
DROP VIEW IF EXISTS `vista_lector`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_lector` AS select `lector`.`idlector` AS `idlector`,`lector`.`dni` AS `dni`,`lector`.`nombre` AS `nombre`,`lector`.`direccion` AS `direccion`,(case `lector`.`tipo` when 1 then 'estudiante' when 2 then 'Docente' when 3 then 'otros' end) AS `tipo` from `lector` where (`lector`.`estado` = 1) ;

-- ----------------------------
-- View structure for `vista_libro`
-- ----------------------------
DROP VIEW IF EXISTS `vista_libro`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_libro` AS select `libro`.`idlibro` AS `idlibro`,`libro`.`titulo` AS `titulo`,`editorial`.`nombre` AS `nombre`,`categoria`.`descripcion` AS `descripcion` from ((`libro` join `categoria` on((`categoria`.`idcategoria` = `libro`.`categoria`))) join `editorial` on((`editorial`.`ideditorial` = `libro`.`editorial`))) where (`libro`.`estado` = 1) ;

-- ----------------------------
-- View structure for `vista_prestamo`
-- ----------------------------
DROP VIEW IF EXISTS `vista_prestamo`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_prestamo` AS select `prestamos`.`idprestamos` AS `idprestamos`,`lector`.`nombre` AS `nombre`,`prestamos`.`fecha_prestamo` AS `fecha_prestamo`,curdate() AS `fecha`,`prestamos`.`fecha_devolucion` AS `fecha_devolucion`,`prestamos`.`descripcion` AS `descripcion`,`prestamos`.`estado` AS `estado` from (`lector` join `prestamos` on((`prestamos`.`lector` = `lector`.`idlector`))) order by 1 ;

-- ----------------------------
-- Procedure structure for `usp_perfil`
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_perfil`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_perfil`(op  int,descrip text,id int)
BEGIN
declare max_id int;
if(op=1)then 
set max_id=(select max(idperfil)+1 from perfil);
if(max_id is null)then set max_id=1;end if;
insert into perfil(idperfil,descripcion,estado)values(max_id,descrip,1);
end if;
if(op=2)then
update perfil set descripcion=descrip where idperfil=id; 
end if;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `usp_permiso`
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_permiso`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_permiso`(_perfil int,_modulo int,_modificar int,_eliminar int,_insertar int,_acceder int,_permiso int)
BEGIN
	#Routine body goes here...
DECLARE max_id int;
if(_permiso=0)then 
set max_id=(SELECT max(idpermiso)+1 from permiso);
if(max_id is null)then  set max_id=1; end if;
insert into permiso(idpermiso,modulo,perfil,editar,eliminar,insertar,acceder)
VALUES(max_id,_modulo,_perfil,_modificar,_eliminar,_insertar,_acceder);
end if;
if(_permiso<>0)then 
UPDATE permiso set  modulo=_modulo,perfil=_perfil,editar=_modificar,eliminar=_eliminar,insertar=_insertar,acceder=_acceder
where idpermiso=_permiso;
end if;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `usp_usuario`
-- ----------------------------
DROP PROCEDURE IF EXISTS `usp_usuario`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `usp_usuario`(op int,_perfil int,_nombres text,_profesion text,_domicilio text,_telefono text,_dni text,_usuario text,_clave text,_fecha_n date,_foto text, id int)
BEGIN
	#Routine body goes here...
DECLARE max_id int; 
if(op=1)then
set max_id=(SELECT max(idusuario)+1 from usuario);
if(max_id is null)then 
set max_id=1;
end if;
INSERT into usuario(idusuario,perfil,dni,nombres,domicilio,telefono,profesion,fecha_nacimiento,usuario,clave,estado,foto)
VALUES(max_id,_perfil,_dni,_nombres,_domicilio,_telefono,_profesion,_fecha_n,_usuario,_clave,1,_foto);
 end if;
if(op=2)then 
UPDATE usuario set perfil=_perfil,dni=_dni,nombres=_nombres,domicilio=_domicilio,telefono=_telefono,profesion=_profesion,fecha_nacimiento=_fecha_n,foto=_foto,usuario=_usuario,clave=_clave
where idusuario=id;
end if;
END
;;
DELIMITER ;
