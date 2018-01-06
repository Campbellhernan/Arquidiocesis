-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2017 a las 17:51:14
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `basesc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archiprestazgo`
--

CREATE TABLE IF NOT EXISTS `archiprestazgo` (
  `id_arch` int(11) NOT NULL AUTO_INCREMENT,
  `nom_arch` varchar(100) NOT NULL,
  `cod_arch` varchar(5) NOT NULL,
  PRIMARY KEY (`id_arch`),
  UNIQUE KEY `nom_arch` (`nom_arch`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `archiprestazgo`
--

INSERT INTO `archiprestazgo` (`id_arch`, `nom_arch`, `cod_arch`) VALUES
(5, 'Carabobo Este', '06'),
(7, 'Carabobo Oeste', '08'),
(6, 'Carabobo Sur', '07'),
(2, 'Valencia Centro - Norte', '03'),
(1, 'Valencia Centro - Sur', '02'),
(3, 'Valencia Sur - Este', '04'),
(8, 'Curia Arquidiocesana', '01'),
(4, 'Valencia Sur - Oeste', '05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE IF NOT EXISTS `documento` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `cod_doc` varchar(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `datos_registro` text NOT NULL,
  `abogado_redactor` text NOT NULL,
  `fecha` date NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_add_doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_doc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `documento` ADD `descripcion` TEXT NOT NULL AFTER `fecha_add_doc`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fundacion`
--

CREATE TABLE IF NOT EXISTS `fundacion` (
  `id_fund` int(11) NOT NULL AUTO_INCREMENT,
  `nom_fund` varchar(100) NOT NULL,
  PRIMARY KEY (`id_fund`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE IF NOT EXISTS `inmueble` (
  `id_inm` int(11) NOT NULL AUTO_INCREMENT,
  `cod_inm` varchar(11) NOT NULL,
  `descripcion` text NOT NULL,
  `modo_adq` varchar(50) NOT NULL,
  `direccion` text NOT NULL,
  `metraje` varchar(20) NOT NULL,
  `tipo_inm` varchar(50) NOT NULL,
  `fecha_add_inm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `linderos` text NOT NULL,
  `fecha` date NOT NULL,
  `datos_registro` text NOT NULL,
  `abogado_redactor` text NOT NULL,
  PRIMARY KEY (`id_inm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `inmueble`
    ADD `archiprestazgo` INT NULL DEFAULT NULL AFTER `linderos`,
    ADD `parroquia` INT NULL DEFAULT NULL AFTER `archiprestazgo`,
    ADD INDEX (`archiprestazgo`),
    ADD INDEX (`parroquia`);

ALTER TABLE `inmueble` ADD UNIQUE(`cod_inm`);

ALTER TABLE `inmueble` ADD `estatus` INT NOT NULL DEFAULT '1' AFTER `abogado_redactor`;

ALTER TABLE `inmueble` CHANGE `fecha` `fecha` DATE NULL;

ALTER TABLE `inmueble` ADD `map_position` TEXT NULL AFTER `estatus`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inm_pert_arqui`
--

CREATE TABLE IF NOT EXISTS `inm_pert_arqui` (
  `id_inmffff` int(11) NOT NULL,
  PRIMARY KEY (`id_inmffff`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inm_pert_fund`
--

CREATE TABLE IF NOT EXISTS `inm_pert_fund` (
  `id_inmff` int(11) NOT NULL,
  `id_fundff` int(11) NOT NULL,
  PRIMARY KEY (`id_inmff`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inm_pert_parro`
--

CREATE TABLE IF NOT EXISTS `inm_pert_parro` (
  `id_inmf` int(11) NOT NULL,
  `id_parrof` int(11) NOT NULL,
  PRIMARY KEY (`id_inmf`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

CREATE TABLE IF NOT EXISTS `parroquia` (
  `id_parro` int(11) NOT NULL AUTO_INCREMENT,
  `nom_parro` varchar(100) NOT NULL,
  `cod_parro` varchar(5) NOT NULL,
  `id_archif` int(11) NOT NULL,
  PRIMARY KEY (`id_parro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `parroquia`
--

INSERT INTO `parroquia` (`id_parro`, `nom_parro`, `cod_parro`, `id_archif`) VALUES
--  Curia Arquidiocesana id_archif = 3
--  Valencia Centro - Sur id_archif = 1 cod_arch = 2
(1, "Catedral", "01", 1),
(2, "Divina Pastora", "02", 1),
(3, "Candelaria", "03", 1),
(4, "Nuestra Señora de Coromoto", "04", 1),
(5, "San Blas", "05", 1),
(6, "San Martin de Porres", "06", 1),
(7, "San Miguel Arcangel", "07", 1),
(8, "San Pedro y San Pablo", "08", 1),
(9, "San Rafael", "09", 1),
(10, "Santa Rosa de Lima", "10", 1),
--  Centro - Norte id_archif = 2 cod_arch = 3
(11, "Corpus Cristi", "01", 2),
(12, "Inmaculado Corazon de Maria", "02", 2),
(13, "La Ascención del Señor", "03", 2),
(14, "La Ascención y Santa Rita", "04", 2),
(15, "La Inmaculada (Camoruco)", "05", 2),
(16, "Nuestra Señora de Begoña", "06", 2),
(17, "Nuestra Señora del Carmen", "07", 2),
(18, "La Purisima Concepción y Sanhto Niño de Praga", "08", 2),
(19, "San Antonio", "09", 2),
(20, "San Jose", "01", 2),
(21, "Santa Eduviguis", "11", 2),
(22, "Santa Marta", "12", 2),
(69, "San Cayetano", "13", 2),
--  Valencia Sur - Este id_archif = 3 cod_arch = 4
(23, "Espiritu Santo", "01", 3),
(24, "Jesús de Nazareth", "02", 3),
(25, "La Milagrosa", "03", 3),
(26, "La Misericordia del Señor", "04", 3),
(27, "Nuestra Señora de Guadalupe", "05", 3),
(28, "Sagrado Corazón de Jesús", "06", 3),
(29, "San Diego de Alcala y de la Candelaria", "07", 3),
(30, "Cuasi Parroquia La Transfiguración del Señor", "08", 3),
(31, "Cuasi Parroquia Santa Inés Mártin", "09", 3),
(32, "La Resurección del Señor", "10", 3),
--  Valencia Sur - Oeste id_archif = 4 cod_arch = 5
(33, "Jesús María y José", "01", 4),
(34, "Jesús Obrero", "02", 4),
(35, "Sagrada Familia", "03", 4),
(36, "Nuestra Señora de Las Mercedes", "04", 4),
(37, "San Jóse de Calasanz", "05", 4),
(38, "San José Obrero", "06", 4),
(39, "San Juan Bautista", "07", 4),
(40, "San Juan Bosco", "08", 4),
(41, "San Juan María Vianney", "09", 4),
(42, "San Pablo Ermitaño", "10", 4),
(43, "Santisimo Redentor", "11", 4),
--  Carabobo Este id_archif = 5 cod_arch = 6
(44, "Cristo Rey", "01", 5),
(45, "Divino Niño Jesús", "02", 5),
(46, "La Presentación del Señor", "03", 5),
(47, "María Madre de la Iglesia", "04", 5),
(48, "Nuestra Señora del Carmen", "05", 5),
(49, "Nuestra Señora del Carmen Y santa Teresita del Niño Jesús", "06", 5),
(50, "Nuestra Señora de la Medalla Milagrosa", "07", 5),
(51, "San Agustin", "08", 5),
(52, "San Antonio de Padua", "09", 5),
(53, "San Juan Apostol", "10", 5),
(54, "San Pancracio", "11", 5),
(55, "San Juan Pablo II", "12", 5),
--  Carabobo Sur id_archif = 6 cod_arch = 7
(56, "Maria Madre del Redentor", "01", 6),
(57, "Nuestra Señora de Belén", "02", 6),
(58, "Nuestra Señora del Carmen y San Luis", "03", 6),
(59, "Nuestra Señora del Rosario", "04", 6),
(60, "Santos Angeles Custodios y San Isidro", "05", 6),
(61, "Cuasi Parroquia E Santo Cristo", "06", 6),
(62, "Cuasi Parroquia San José de Los Naranjos (Vicaria San José)", "07", 6),
--  Carabobo Oeste id_archif = 7 cod_arch = 8
(63, "La Inmaculada Concepción", "01", 7),
(64, "Nuestra Señora de la Medalla Milagrosa y la San Cruz", "02", 7),
(65, "Nuestra Señora del Carmen", "03", 7),
(66, "Sagrado Corazon de Jesús", "04", 7),
(67, "San José", "05", 7),
(68, "San Rafael", "06", 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `se_refiere`
--

CREATE TABLE IF NOT EXISTS `se_refiere` (
  `id_docf` int(11) NOT NULL,
  `id_inmfff` int(11) NOT NULL,
  PRIMARY KEY (`id_docf`,`id_inmfff`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `codigo` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `nombre`, `codigo`) VALUES
(9, 'Adjudicación', 'AJ'),
(13, 'Anticresis', 'AN'),
(15, 'Arrendamiento', 'AR'),
(2, 'Cesion o Traspaso', 'CT'),
(1, 'Compra Venta', 'CV'),
(3, 'Donaciones', 'DO'),
(14, 'Expropiación', 'EX'),
(11, 'Hipoteca', 'HI'),
(8, 'Liquidación de Hipoteca', 'LH'),
(10, 'Liquidación y Partición de Bienes', 'LB'),
(6, 'Notas Aclaratorias', 'NA'),
(17, 'Otros', 'OT'),
(18, 'Comodato', 'CO'),
(18, 'Ocupación', 'OC'),
(4, 'Permutas', 'PE'),
(12, 'Petición Para Construcción', 'PC'),
(16, 'Retracto Legal', 'RL'),
(7, 'Testamento', 'TE'),
(5, 'Titulo Supletorio', 'TS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `login` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `rol` varchar(20) NOT NULL DEFAULT 'Consultor',
  `filasPP` int(11) NOT NULL DEFAULT '10',
  `abrirBusqDoc` bit(1) NOT NULL DEFAULT b'0',
  `filasPPInm` int(11) NOT NULL DEFAULT '10',
  `filasPPArch` int(11) NOT NULL DEFAULT '10',
  `filasPPFund` int(11) NOT NULL DEFAULT '10',
  `filasPPUsuario` int(11) NOT NULL,
  `abrirBusqInm` bit(1) NOT NULL,
  PRIMARY KEY (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`login`, `password`, `rol`, `filasPP`, `abrirBusqDoc`, `filasPPInm`, `filasPPArch`, `filasPPFund`, `filasPPUsuario`, `abrirBusqInm`) VALUES
('admin', 'admin1234', 'Administrador', 100, b'1', 10, 50, 10, 10, b'1'),
('consultor', 'consultor1234', 'Consultor', 10, b'1', 5, 20, 50, 10, b'1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
