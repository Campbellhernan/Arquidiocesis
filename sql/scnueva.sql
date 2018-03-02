-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-03-2018 a las 04:17:33
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `scnueva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archiprestazgo`
--

CREATE TABLE `archiprestazgo` (
  `id_arch` int(11) NOT NULL,
  `nom_arch` varchar(100) NOT NULL,
  `cod_arch` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `archiprestazgo`
--

INSERT INTO `archiprestazgo` (`id_arch`, `nom_arch`, `cod_arch`) VALUES
(1, 'Valencia Centro - Sur', '02'),
(2, 'Valencia Centro - Norte', '03'),
(3, 'Valencia Sur - Este', '04'),
(4, 'Valencia Sur - Oeste', '05'),
(5, 'Carabobo Este', '06'),
(6, 'Carabobo Sur', '07'),
(7, 'Carabobo Oeste', '08'),
(8, 'Curia Arquidiocesana', '01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `din_divisiones_inmuebles`
--

CREATE TABLE `din_divisiones_inmuebles` (
  `DIN_ID` bigint(20) NOT NULL,
  `DIN_PADRE` int(11) NOT NULL,
  `DIN_HIJO` int(11) NOT NULL,
  `COD_INM` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `din_divisiones_inmuebles`
--

INSERT INTO `din_divisiones_inmuebles` (`DIN_ID`, `DIN_PADRE`, `DIN_HIJO`, `COD_INM`) VALUES
(1, 8, 5, '06-09-0002-001'),
(2, 7, 33, '06-09-0001-001'),
(3, 41, 7, '05-10-0001-001'),
(4, 41, 38, '05-10-0001-002'),
(5, 41, 39, '05-10-0001-003'),
(6, 42, 27, '04-04-0003-001'),
(7, 42, 1, '04-04-0003-002'),
(8, 44, 9, '04-05-0001-001'),
(9, 44, 31, '04-05-0001-002'),
(10, 44, 6, '04-05-0001-003'),
(11, 44, 19, '04-05-0001-004'),
(12, 44, 37, '04-05-0001-005'),
(13, 42, 34, '04-04-0003-003'),
(14, 38, 19, '08-05-0001-001'),
(15, 39, 29, '08-06-0001-001'),
(16, 45, 29, '06-03-0001-005'),
(17, 47, 18, NULL),
(18, 48, 18, '03-02-0003-001'),
(22, 49, 21, '06-03-0001-001'),
(25, 49, 19, '06-03-0001-002'),
(28, 49, 28, '06-03-0001-003'),
(29, 49, 29, '06-03-0001-004'),
(30, 49, 8, '06-03-0001-005');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id_doc` int(11) NOT NULL,
  `cod_doc` varchar(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `datos_registro` text NOT NULL,
  `abogado_redactor` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `fecha_add_doc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`id_doc`, `cod_doc`, `tipo`, `datos_registro`, `abogado_redactor`, `fecha`, `activo`, `fecha_add_doc`, `descripcion`) VALUES
(1, 'TE-0001', 7, 'REGISTRO PRINCIPAL DE VALENCIA, Folios 38 al 50 del Libro de Contratos Publico de 1798. TESTAMENTO PADRE SEIJAS', 'Escribano Diego Melean', '2017-04-21', 1, '2017-08-18 16:33:14', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fundacion`
--

CREATE TABLE `fundacion` (
  `id_fund` int(11) NOT NULL,
  `nom_fund` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

CREATE TABLE `inmueble` (
  `id_inm` int(11) NOT NULL,
  `cod_inm` varchar(14) NOT NULL,
  `descripcion` text NOT NULL,
  `modo_adq` int(11) DEFAULT NULL,
  `direccion` text NOT NULL,
  `metraje` varchar(20) NOT NULL,
  `tipo_inm` varchar(50) NOT NULL,
  `fecha_add_inm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `linderos` text NOT NULL,
  `archiprestazgo` int(11) DEFAULT NULL,
  `parroquia` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `datos_registro` text NOT NULL,
  `abogado_redactor` text NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '1',
  `map_position` text,
  `zona` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inmueble`
--

INSERT INTO `inmueble` (`id_inm`, `cod_inm`, `descripcion`, `modo_adq`, `direccion`, `metraje`, `tipo_inm`, `fecha_add_inm`, `linderos`, `archiprestazgo`, `parroquia`, `fecha`, `datos_registro`, `abogado_redactor`, `estatus`, `map_position`, `zona`) VALUES
(1, '03-13-0001', 'Sede de la Iglesia de San Cayetano\r\nLos Planos están agregados al cuaderno de comprobante bajo los números 43770, 43771, 43772, 43773 y folios 44263-44263, 44264-44264, 44265-44265, 44266-44266 ', 0, 'Av. Norte Sur - 2 Urbanización Palma Real Mañongo, Naguanagua', '3779 Mtr2', 'Terreno', '2017-08-11 15:49:31', 'Norte: Parcela V-9 \r\nSur: Parcela V-10\r\nEste: Zona Verde o Recreacional Pasivo\r\nOeste: En parte con la parcela V-6 y en parte con la parcela C-1 de la Urbanización Palma Real', 2, 69, '2012-12-21', 'Registro Publico del Municipio Naguanagua del Estado Carabobo, 21 de Diciembre del 2012.\r\nQuedo inscrito bajo el numero 2012.5355, asiento registral 1 del inmueble matriculado con el No 311.7.12.1.7502 y correspondiente al libro de Folio Real del año 2012', 'Maria G. De Diego. Impreabogado 30820 Consultora Jurídica de Naguanagua', 1, '{"type":"marker","data":{"lat":10.24403153504223,"lng":-67.99655199050903}}', 'Zona Prueba'),
(2, '03-12-0001', 'Se esta CONSTRUYENDO la CASA PARROQUIAL Y SALONES PARROQUIALES.\r\n\r\nSe confronto los linderos del documento con los planos de la urbanización y no coinciden', 19, 'Avenida 107 que es su frente cruce con calle 196-A, esta determinada en el documento como Área de Uso Social., Urbanización La Campiña II, Naguanagua, Estado Carabobo.  \r\n', '540 Mts2', 'TERRENO', '2017-08-11 17:18:19', 'Norte: Calle 196-A\r\nSur: Área del Parque Infantil.\r\nEste; Propiedad que es o fue del Sr. Valenzuela.\r\nOeste: Avenida 7.', 2, 22, '1995-05-30', 'Autenticado en la Notaria Publica Tercera de Valencia, en el año 1995, bajo el No 88, Tomo 71 de los Libros de Autenticaciones.\r\nEl municipio de Valencia representado en este acto por el Doctor Rafael Feo la Cruz suficientemente autorizado por la cámara municipal en sesión del 14 de Julio de 1994 mediante oficio N 00263 de fecha 17 de Julio 1994 autoriza al Arquidiosesis de Valencia a ocupar la parcela', 'Marinellys Moreno de Garcia. Impreabogado No 50.020', 1, '{"type":"marker","data":{"lat":10.269348152061495,"lng":-68.02032709121704}}', 'Zona Prueba'),
(3, '03-12-0002', 'EN ESTE INMUEBLE SE ESTA CONSTRUYENDO LA IGLESIA \r\n\r\nSe confronto los linderos del documento con los planos de la urbanización y no coinciden', 0, 'Avenida 107 que es su frente, esta determinada en el documento como PARCELA PARQUE INFANTIL, Urbanización La Campiña II, Naguanagua, Estado Carabobo.', '1005 Mts2', 'TERRENO', '2017-08-11 17:29:45', 'Norte: Terreno conocido como Área Social.\r\nSur: Con la Parcela 148.\r\nEste: Propiedad que es o fue del Sr. Valenzuela.\r\nOeste: Con la Avenida 7.', 2, 22, '1995-05-30', 'Autenticado en la Notaria Publica Tercera de Valencia en el año 1995, bajo el No 88, Tomo 71 de los Libros de Autenticaciones.\r\nEl municipio de Valencia representado en este acto por el Doctor Rafael Feo la Cruz suficientemente autorizado por la cámara municipal en sesión del 14 de Julio de 1994 mediante oficio N 00263 de fecha 17 de Julio 1994 autoriza al Arquidiosesis de Valencia a ocupar la parcela', '', 1, '{"type":"marker","data":{"lat":10.269337595095276,"lng":-68.0203914642334}}', 'Zona Prueba'),
(5, '04-10-0001', 'En este Terreno se edifico la IGLESIA LA RESURRECCIÓN DEL SEÑOR', 3, 'Urbanización "Parque Residencial La Esmeralda", Sector Tres, Avenida Circunvalación Sur que es su frente, San Diego, Estado Carabobo', '9005 mts 2.', 'TERRENO', '2017-08-25 17:55:57', 'Norte: Avenida 16.Sur: Avenida Circunvalación Sur /Parcela No 23-A Manzana D-9 dest. Servicio publico. Este: Parcela 23-A /Parcela 22 y 55; y Oeste: Parcela 24 de la Manzana D-9.', 3, 32, '1985-03-14', 'Registrada ante la Oficina Subalterna del Primer Circuito de Registro del Distrito Valencia del Estado Carabobo, bajo el No 2, Folios 1 al 4, Protocolo 1, Tomo 25. Planos agregados al Cuaderno de Comprobante Bajo los No 1908 y 1909, Folios 3.513 y 3.514. del 1 Trimestre de 1985.', 'Jacqueline F. de Ortega. I.P.S.A No 4994', 1, '{"type":"marker","data":{"lat":10.22910244018972,"lng":-67.97016441822052}}', 'Zona Prueba'),
(6, '04-10-0002', 'Este Inmueble es una vivienda, colinda con la Iglesia, el documento contiene una nota importante ya que sobre el mismo se ha constituido servidumbre de paso de tuberías subterráneas que conducen aguas negras del fundo vecino y que se suman a la de la casa termina desaguando hacia la acera que da a la calle.', 1, 'Avenida 16, o Calle 160. Urbanización La Esmeralda Sector Tres.  Municipio San Diego. Estado Carabobo.\r\n', 'Terreno:147 mts2.', 'VIVIENDA', '2017-09-08 18:17:58', 'Norte: Avenida 16; Sur: Parcelas 22 y 23 (Social Religiosa); Este: Parcela 56; y Oeste: Parcela No 23 (Social Religiosa).', 3, 32, '1981-09-23', 'Oficina Subalterna del Primer Circuito de Registro del Distrito Valencia del Estado Carabobo, registrado bajo el No 5, Protocolo 1, Tomo 33.\r\nSu ubicación esta definida en Plano General de la Urbanización agregado al C de C de la precitada oficina el 10-01-1978, bajo los No 31 al 37, folios 35 al 41; y, el 18-12-1978, bajo los No 1309 al 1312, folios 1717 al 1720.', 'Elio Alvarado ', 1, '{"type":"marker","data":{"lat":10.229114400771577,"lng":-67.97018210403621}}', 'Zona Prueba'),
(7, '06-09-0001', 'ESTE INMUEBLE TIENE UN TITULO REGISTRADO POR LA VÍA DE LA PRESCRIPCIÓN ADQUISITIVA.\r\nEN ESTE LOTE SE ENCUENTRA ASENTADA LA IGLESIA SAN ANTONIO DE PADUA Y LA RESIDENCIA DEL PÁRROCO.', 17, 'Avenida Los Guayos cruce con Calle Sucre, frente a la Plaza Bolivar de Los Guayos, al lado del ambulatorio o medicatura de Los Guayos.', '2930 mts2', 'Iglesia y Casa Parroquial', '2017-12-01 04:42:18', 'Norte: Terrenos de la Medicatura, de Serbando Ramallo y Juana de Aguirre; Sur: Calle Sucre; Este: Casa y Terreno de Rosa Riera de Araujo; y, Oeste: Calle Montilla.', 5, 52, '1971-03-16', 'Oficina Subalterna de Registro de Distrito Valencia del Estado Carabobo, registrado bajo el No 67, Folios 158 vto al 250, Protocolo 1, Tomo 4.', 'Dr. Fernando Castillo Orduz', 1, '{"type":"marker","data":{"lat":10.188466529172182,"lng":-67.93671291321516}}', ''),
(8, '06-09-0002', 'En este terreno se encuentra ubicada la Casa Parroquial, así mismo varios locales alquilados, TODOS TIENEN CONTRATOS DE ARRENDAMIENTO.', 5, 'CALLE SUCRE CRUCE CON AVENIDA LOS GUAYOS su fondo es la CALLE RIVAS', '2670 MTS2', 'CASA PARROQUIAL Y LOCALES COMERCIALES', '2017-12-01 05:01:23', 'Norte: Calle Sucre; Sur: Calle Rivas; Este: Calle Montilla; y, Oeste: Terrenos de la Sucesion Magdaleno y de Pastor Moreno.', 5, 52, '1971-03-16', 'Oficina Subalterna de Registro del Distrito Valencia del Estado Carabobo, el cual quedo registrado bajo el No 67, Folios 158 vto al 250, Protocolo Primero, Tomo 4o. ', 'Dr. Fernando Castillo Orduz', 1, '{"type":"rectangle","data":{"south":10.18756334735312,"west":-67.93693721294403,"north":10.188123010192124,"east":-67.93676018714905}}', ''),
(9, '03-03-0001', '321312', 10, '421', '321312', '321312', '2018-01-07 19:20:33', '321312', 2, 13, '2018-01-01', '321312', '321', 1, '', 'Zona Prueba'),
(18, '03-04-0001', '687', 15, '786', '687', '8676', '2018-01-07 19:27:54', '678', 2, 14, '2018-01-01', '86786', '6878686', 1, '', 'Zona Prueba'),
(19, '06-03-0001-002', '321312', 8, '3213123', '321312', '321312', '2018-01-09 15:43:53', '321312', 1, 8, '2018-01-01', '321312', '321312', 1, '', 'Zona Prueba'),
(21, '06-03-0001-001', '312321', 18, '312312', '3213123', '321321', '2018-01-09 21:21:25', '312321', 1, 4, '2018-01-01', '321321', '312313', 1, '', 'Zona Prueba'),
(22, '03-04-0002', '2133123', 15, '32312', '312312', '321321312', '2018-01-09 22:12:03', '312312', 2, 14, '2018-01-01', '3123123', '31232131', 1, '', 'Zona Prueba'),
(26, '02-01-0001', '2133123', 15, '32312', '312312', '321321312', '2018-01-09 22:15:58', '312312', 1, 1, '2018-01-01', '3123123', '31232131', 1, '', 'Zona Prueba'),
(27, '03-02-0001', '2133123', 15, '32312', '312312', '321321312', '2018-01-09 22:17:24', '312312', 2, 12, '2018-01-01', '3123123', '31232131', 1, '', 'Zona Prueba'),
(28, '06-03-0001-003', '2133123', 15, '32312', '312312', '321321312', '2018-01-09 22:19:05', '312312', 2, 12, '2018-01-01', '3123123', '31232131', 1, '', 'Zona Prueba'),
(29, '06-03-0001-004', '312312321', 14, '231321321', '321312312', '321321312', '2018-01-09 22:53:23', '321321312', 1, 3, '2018-01-01', '312312312', '321312312', 1, '', 'Zona Prueba'),
(31, '04-04-0001', '312312321', 14, '231321321', '321312312', '321321312', '2018-01-09 22:54:42', '321321312', 3, 26, '2018-01-01', '312312312', '321312312', 1, '', 'Zona Prueba'),
(33, '04-04-0002', '312312321', 14, '231321321', '321312312', '321321312', '2018-01-09 23:00:31', '321321312', 3, 26, '2018-01-01', '312312312', '321312312', 1, '', 'Zona Prueba'),
(34, '04-03-0001', '312312321', 14, '231321321', '321312312', '321321312', '2018-01-09 23:00:52', '321321312', 3, 25, '2018-01-01', '312312312', '321312312', 1, '', 'Zona Prueba'),
(35, '04-02-0001', '312312321', 14, '231321321', '321312312', '321321312', '2018-01-09 23:01:25', '321321312', 3, 24, '2018-01-01', '312312312', '321312312', 1, '', 'Zona Prueba'),
(36, '04-08-0001', '312312321', 14, '231321321', '321312312', '321321312', '2018-01-09 23:01:42', '321321312', 3, 30, '2018-01-01', '312312312', '321312312', 1, '', 'Zona Prueba'),
(37, '08-03-0001', '312312321', 14, '231321321', '321312312', '321321312', '2018-01-09 23:02:52', '321321312', 7, 65, '2018-01-01', '312312312', '321312312', 1, '', 'Zona Prueba'),
(38, '08-05-0001', '312312321', 14, '231321321', '321312312', '321321312', '2018-01-09 23:04:39', '321321312', 7, 67, '2018-01-01', '312312312', '321312312', 1, '', ''),
(39, '08-06-0001', '312312321', 14, '231321321', '321312312', '321321312', '2018-01-09 23:05:44', '321321312', 7, 68, '2018-01-01', '312312312', '321312312', 1, '', ''),
(40, '08-03-0002', '312312321', 14, '231321321', '321312312', '321321312', '2018-01-09 23:06:16', '321321312', 7, 65, '2018-01-01', '312312312', '321312312', 1, '', 'Zona Prueba'),
(41, '05-10-0001', '312312321', 14, '231321321777fsfsd', '321312312', '321321312', '2018-01-09 23:13:57', '321321312', 4, 42, '2018-01-01', '312312312', '321312312', 1, '', ''),
(42, '04-04-0003', '312321', 9, 'dadasdasdsa', '1231', '321312', '2018-01-30 23:39:00', '321312', 3, 26, '2018-01-01', '312312', '1231231', 1, '', ''),
(44, '04-05-0001', '321', 13, '33', '321', '321', '2018-01-30 23:44:25', '321', 3, 27, '2018-01-02', '312312', '31231', 1, '', ''),
(45, '06-03-0001-005', '312', 1, '312312', '321', '312', '2018-01-31 01:09:29', '231', 2, 20, '2018-01-08', '321', '321', 1, '', ''),
(47, '02-01-0002', '321312', 13, '321312', '32131231', '321312321', '2018-01-31 01:11:04', '321312', 1, 1, '2018-01-02', '321312', '321312', 1, '', 'Zona Prueba'),
(48, '03-02-0003', '312312321', 13, '321312', '312312', '321321', '2018-01-31 01:13:20', '312312', 2, 12, '2018-01-02', '3213123', '321312321', 1, '', ''),
(49, '06-03-0001', '123', 13, '123', '123', '123', '2018-01-31 01:27:36', '123', 5, 46, '2018-01-01', '123', '123', 1, '{"type":"rectangle","data":{"south":10.182391451521125,"west":-68.00378298545837,"north":10.183172879961623,"east":-68.00273155952453},"color":"#ffff00"}', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inm_pert_arqui`
--

CREATE TABLE `inm_pert_arqui` (
  `id_inmffff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inm_pert_fund`
--

CREATE TABLE `inm_pert_fund` (
  `id_inmff` int(11) NOT NULL,
  `id_fundff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inm_pert_parro`
--

CREATE TABLE `inm_pert_parro` (
  `id_inmf` int(11) NOT NULL,
  `id_parrof` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

CREATE TABLE `parroquia` (
  `id_parro` int(11) NOT NULL,
  `nom_parro` varchar(100) NOT NULL,
  `cod_parro` varchar(5) NOT NULL,
  `id_archif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parroquia`
--

INSERT INTO `parroquia` (`id_parro`, `nom_parro`, `cod_parro`, `id_archif`) VALUES
(1, 'Catedral', '01', 1),
(2, 'Divina Pastora', '02', 1),
(3, 'Candelaria', '03', 1),
(4, 'Nuestra Señora de Coromoto', '04', 1),
(5, 'San Blas', '05', 1),
(6, 'San Martin de Porres', '06', 1),
(7, 'San Miguel Arcangel', '07', 1),
(8, 'San Pedro y San Pablo', '08', 1),
(9, 'San Rafael', '09', 1),
(10, 'Santa Rosa de Lima', '10', 1),
(11, 'Corpus Cristi', '01', 2),
(12, 'Inmaculado Corazon de Maria', '02', 2),
(13, 'La Ascención del Señor', '03', 2),
(14, 'La Ascención y Santa Rita', '04', 2),
(15, 'La Inmaculada (Camoruco)', '05', 2),
(16, 'Nuestra Señora de Begoña', '06', 2),
(17, 'Nuestra Señora del Carmen', '07', 2),
(18, 'La Purisima Concepción y Sanhto Niño de Praga', '08', 2),
(19, 'San Antonio', '09', 2),
(20, 'San Jose', '01', 2),
(21, 'Santa Eduviguis', '11', 2),
(22, 'Santa Marta', '12', 2),
(23, 'Espiritu Santo', '01', 3),
(24, 'Jesús de Nazareth', '02', 3),
(25, 'La Milagrosa', '03', 3),
(26, 'La Misericordia del Señor', '04', 3),
(27, 'Nuestra Señora de Guadalupe', '05', 3),
(28, 'Sagrado Corazón de Jesús', '06', 3),
(29, 'San Diego de Alcala y de la Candelaria', '07', 3),
(30, 'Cuasi Parroquia La Transfiguración del Señor', '08', 3),
(31, 'Cuasi Parroquia Santa Inés Mártin', '09', 3),
(32, 'La Resurección del Señor', '10', 3),
(33, 'Jesús María y José', '01', 4),
(34, 'Jesús Obrero', '02', 4),
(35, 'Sagrada Familia', '03', 4),
(36, 'Nuestra Señora de Las Mercedes', '04', 4),
(37, 'San Jóse de Calasanz', '05', 4),
(38, 'San José Obrero', '06', 4),
(39, 'San Juan Bautista', '07', 4),
(40, 'San Juan Bosco', '08', 4),
(41, 'San Juan María Vianney', '09', 4),
(42, 'San Pablo Ermitaño', '10', 4),
(43, 'Santisimo Redentor', '11', 4),
(44, 'Cristo Rey', '01', 5),
(45, 'Divino Niño Jesús', '02', 5),
(46, 'La Presentación del Señor', '03', 5),
(47, 'María Madre de la Iglesia', '04', 5),
(48, 'Nuestra Señora del Carmen', '05', 5),
(49, 'Nuestra Señora del Carmen Y santa Teresita del Niño Jesús', '06', 5),
(50, 'Nuestra Señora de la Medalla Milagrosa', '07', 5),
(51, 'San Agustin', '08', 5),
(52, 'San Antonio de Padua', '09', 5),
(53, 'San Juan Apostol', '10', 5),
(54, 'San Pancracio', '11', 5),
(55, 'San Juan Pablo II', '12', 5),
(56, 'Maria Madre del Redentor', '01', 6),
(57, 'Nuestra Señora de Belén', '02', 6),
(58, 'Nuestra Señora del Carmen y San Luis', '03', 6),
(59, 'Nuestra Señora del Rosario', '04', 6),
(60, 'Santos Angeles Custodios y San Isidro', '05', 6),
(61, 'Cuasi Parroquia E Santo Cristo', '06', 6),
(62, 'Cuasi Parroquia San José de Los Naranjos (Vicaria San José)', '07', 6),
(63, 'La Inmaculada Concepción', '01', 7),
(64, 'Nuestra Señora de la Medalla Milagrosa y la San Cruz', '02', 7),
(65, 'Nuestra Señora del Carmen', '03', 7),
(66, 'Sagrado Corazon de Jesús', '04', 7),
(67, 'San José', '05', 7),
(68, 'San Rafael', '06', 7),
(69, 'San Cayetano', '13', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `se_refiere`
--

CREATE TABLE `se_refiere` (
  `id_docf` int(11) NOT NULL,
  `id_inmfff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `codigo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `nombre`, `codigo`) VALUES
(1, 'Compra Venta', 'CV'),
(2, 'Cesion o Traspaso', 'CT'),
(3, 'Donaciones', 'DO'),
(4, 'Permutas', 'PE'),
(5, 'Titulo Supletorio', 'TS'),
(6, 'Notas Aclaratorias', 'NA'),
(7, 'Testamento', 'TE'),
(8, 'Liquidación de Hipoteca', 'LH'),
(9, 'Adjudicación', 'AJ'),
(10, 'Liquidación y Partición de Bienes', 'LB'),
(11, 'Hipoteca', 'HI'),
(12, 'Petición Para Construcción', 'PC'),
(13, 'Anticresis', 'AN'),
(14, 'Expropiación', 'EX'),
(15, 'Arrendamiento', 'AR'),
(16, 'Retracto Legal', 'RL'),
(17, 'Otros', 'OT'),
(18, 'Comodato', 'CO'),
(19, 'Ocupación', 'OC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `login` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `rol` varchar(20) NOT NULL DEFAULT 'Consultor',
  `filasPP` int(11) NOT NULL DEFAULT '10',
  `abrirBusqDoc` bit(1) NOT NULL DEFAULT b'0',
  `filasPPInm` int(11) NOT NULL DEFAULT '10',
  `filasPPArch` int(11) NOT NULL DEFAULT '10',
  `filasPPFund` int(11) NOT NULL DEFAULT '10',
  `filasPPUsuario` int(11) NOT NULL,
  `abrirBusqInm` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`login`, `password`, `rol`, `filasPP`, `abrirBusqDoc`, `filasPPInm`, `filasPPArch`, `filasPPFund`, `filasPPUsuario`, `abrirBusqInm`) VALUES
('admin', 'admin1234', 'Administrador', 100, b'1', 10, 50, 100, 10, b'1'),
('consultor', 'consultor1234', 'Consultor', 10, b'1', 5, 20, 50, 10, b'1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archiprestazgo`
--
ALTER TABLE `archiprestazgo`
  ADD PRIMARY KEY (`id_arch`),
  ADD UNIQUE KEY `nom_arch` (`nom_arch`);

--
-- Indices de la tabla `din_divisiones_inmuebles`
--
ALTER TABLE `din_divisiones_inmuebles`
  ADD PRIMARY KEY (`DIN_ID`),
  ADD KEY `DIN_PADRE` (`DIN_PADRE`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indices de la tabla `fundacion`
--
ALTER TABLE `fundacion`
  ADD PRIMARY KEY (`id_fund`);

--
-- Indices de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`id_inm`),
  ADD UNIQUE KEY `cod_inm` (`cod_inm`),
  ADD KEY `archiprestazgo` (`archiprestazgo`),
  ADD KEY `parroquia` (`parroquia`);

--
-- Indices de la tabla `inm_pert_arqui`
--
ALTER TABLE `inm_pert_arqui`
  ADD PRIMARY KEY (`id_inmffff`);

--
-- Indices de la tabla `inm_pert_fund`
--
ALTER TABLE `inm_pert_fund`
  ADD PRIMARY KEY (`id_inmff`);

--
-- Indices de la tabla `inm_pert_parro`
--
ALTER TABLE `inm_pert_parro`
  ADD PRIMARY KEY (`id_inmf`);

--
-- Indices de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD PRIMARY KEY (`id_parro`);

--
-- Indices de la tabla `se_refiere`
--
ALTER TABLE `se_refiere`
  ADD PRIMARY KEY (`id_docf`,`id_inmfff`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archiprestazgo`
--
ALTER TABLE `archiprestazgo`
  MODIFY `id_arch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `din_divisiones_inmuebles`
--
ALTER TABLE `din_divisiones_inmuebles`
  MODIFY `DIN_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `fundacion`
--
ALTER TABLE `fundacion`
  MODIFY `id_fund` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  MODIFY `id_inm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  MODIFY `id_parro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
