-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-02-2018 a las 22:21:22
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `crmdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agendar`
--

CREATE TABLE `agendar` (
  `idagenda` int(11) NOT NULL,
  `asunto` varchar(50) NOT NULL,
  `descripcion` longtext,
  `fec_generada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fec_evento` varchar(20) DEFAULT NULL,
  `hora_evento` varchar(20) DEFAULT NULL,
  `duracion` time DEFAULT NULL,
  `tipo_evento` varchar(20) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idcontacto` int(11) NOT NULL,
  `mantenimiento` varchar(15) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `agendar`
--

INSERT INTO `agendar` (`idagenda`, `asunto`, `descripcion`, `fec_generada`, `fec_evento`, `hora_evento`, `duracion`, `tipo_evento`, `idusuario`, `idcontacto`, `mantenimiento`, `estado`) VALUES
(3, 'PROBANDO AGENDAR', 'Esta es una prueba de agendado', '2018-02-20 17:44:49', 'Pospuesto', '', '00:00:00', 'tarea', 9, 126, 'Descartado', 0),
(5, 'QQ', 'Example', '2018-02-20 17:59:54', 'Pospuesto', '', '00:00:00', 'correo', 14, 126, 'Pospuesto', 0),
(6, 'POP', 'pyoghyan', '2018-02-20 18:01:07', '02/26/2018', '8:00pm', '02:45:00', 'llamada', 9, 121, 'Completado', 1),
(7, 'QWERTY', 'XX', '2018-02-20 18:02:27', 'Pospuesto', '', '00:00:00', 'plazo', 10, 126, 'Pospuesto', 0),
(8, 'Reunión de prueba', 'PPPPP', '2018-02-20 18:04:10', '02/27/2018', '', '00:00:00', 'reunion', 9, 121, 'Pendiente', 1),
(9, 'Asistido', 'Asisitio', '2018-02-21 20:29:59', '02/21/2018', '2:30pm', '01:00:00', 'tarea', 13, 126, 'Pendiente', 1),
(10, 'Descartar', 'descartar', '2018-02-21 20:30:20', '02/24/2018', '6:00pm', '01:00:00', 'almuerzo', 9, 121, 'Descartado', 0),
(11, 'Enviar', 'correo', '2018-02-21 20:30:45', '03/12/2018', '5:00pm', '00:30:00', 'correo', 10, 127, 'Completado', 1),
(12, 'Mover', 'datos', '2018-02-21 20:31:21', '02/24/2018', '5:30pm', '03:30:00', 'plazo', 14, 126, 'Pendiente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_det`
--

CREATE TABLE `articulo_det` (
  `idarticulo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `valor` decimal(11,2) NOT NULL DEFAULT '0.00',
  `imagen` varchar(200) DEFAULT NULL,
  `condicion` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo_det`
--

INSERT INTO `articulo_det` (`idarticulo`, `nombre`, `descripcion`, `valor`, `imagen`, `condicion`) VALUES
(1, 'Impresora EPSON L23030', 'Impresora laser', '200000.00', '1517844280.jpg', 1),
(27, 'Laptop Office HP Notebook', 'Intel core i5', '400000.00', '1517844290.jpg', 1),
(29, 'llaves Dimasoft', 'Acceso a software', '500000.00', '1517844304.png', 1),
(36, 'Impresora ZEBRA', 'Boleta electronica', '200000.00', '1517844330.jpg', 1),
(37, 'Rollos ticket', 'Para impresora Zebra', '10000.00', '1517844382.jpg', 1),
(38, 'Escritorio Remoto', 'Acceso remoto', '80000.00', 'noimage.png', 1),
(39, 'Procesadores', 'De computadora', '600000.00', 'noimage.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `idcontacto` int(11) NOT NULL,
  `razonsocial` varchar(30) NOT NULL,
  `rut` varchar(15) DEFAULT NULL,
  `giro` varchar(30) DEFAULT NULL,
  `contacto` varchar(50) DEFAULT NULL,
  `cargo` varchar(20) DEFAULT NULL,
  `tlf_1` varchar(20) NOT NULL,
  `tlf_2` varchar(20) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `region` varchar(20) DEFAULT NULL,
  `ciudad` varchar(20) DEFAULT NULL,
  `comuna` varchar(20) DEFAULT NULL,
  `direccion` text,
  `canal_deingreso` int(11) DEFAULT NULL,
  `filtro` int(11) NOT NULL DEFAULT '1',
  `estado` int(10) NOT NULL,
  `enlace` varchar(200) DEFAULT NULL,
  `fec_ingreso` datetime DEFAULT CURRENT_TIMESTAMP,
  `codigopostal` int(15) DEFAULT NULL,
  `imagen` varchar(100) NOT NULL,
  `sitioweb` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`idcontacto`, `razonsocial`, `rut`, `giro`, `contacto`, `cargo`, `tlf_1`, `tlf_2`, `correo`, `region`, `ciudad`, `comuna`, `direccion`, `canal_deingreso`, `filtro`, `estado`, `enlace`, `fec_ingreso`, `codigopostal`, `imagen`, `sitioweb`) VALUES
(121, 'Dimasoft', '', '', 'Isabel Maldonado', '', '2449223456', '', '', '', '', '', '', 0, 5, 2, 'https://chile.as.com/chile/', '2018-01-08 15:29:18', 0, '1515507950.png', 'https://chile.as.com/chile/'),
(126, 'Plan de Ventas', '99999999', 'Outsourcing', 'Isabel Maldonado', 'Ejecutiva general', '2 2222 2222', '9 9999 9999', 'plandeventas@gmail.com', '', '', '', '', 3, 2, 1, '', '2018-02-05 12:31:18', 0, '1517844721.png', ''),
(127, 'PDV', '111111', '', '', '', '999999', '', '', '', '', '', '', 2, 2, 1, '', '2018-02-06 10:31:00', 0, 'noavatar.png', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `idcotizacion` int(11) NOT NULL,
  `idcontacto` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fec_generada` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `impuesto` decimal(4,2) NOT NULL,
  `total` decimal(11,2) NOT NULL DEFAULT '0.00',
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cotizacion`
--

INSERT INTO `cotizacion` (`idcotizacion`, `idcontacto`, `idusuario`, `serie`, `descripcion`, `fec_generada`, `impuesto`, `total`, `estado`) VALUES
(26, 127, 9, '912726CT', 'SERIE', '2018-02-08 12:39:48', '19.00', '23800.00', 'Aprobado'),
(27, 126, 9, '912627CT', '', '2018-02-08 14:56:59', '19.00', '2594200.00', 'Anulado'),
(28, 126, 9, '912628CT', 'NUEVO', '2018-02-08 17:27:11', '19.00', '856800.00', 'Negociando'),
(29, 126, 9, '912629CT', 'VIEJA', '2018-02-08 17:28:15', '19.00', '833000.00', 'Negociando'),
(30, 127, 9, '912730CT', 'PDV COT', '2018-02-08 17:45:24', '19.00', '23800.00', 'Negociando'),
(31, 126, 9, '912631CT', 'COTIZACION', '2018-02-08 17:46:02', '19.00', '238000.00', 'Negociando'),
(32, 127, 9, '912732CT', '', '2018-02-08 17:46:58', '19.00', '600950.00', 'Negociando'),
(33, 126, 9, '912633CT', '', '2018-02-08 17:48:32', '19.00', '238000.00', 'Negociando'),
(34, 127, 9, '912734CT', '', '2018-02-08 17:49:56', '19.00', '476000.00', 'Negociando'),
(35, 126, 9, '912635CT', 'AGREGAR A TABLA', '2018-02-08 18:05:27', '19.00', '303450.00', 'Negociando'),
(36, 127, 9, '912736CT', '', '2018-02-08 18:12:04', '19.00', '1178100.00', 'Negociando'),
(37, 127, 10, '1012737CT', 'cotizacion 13-02-2018', '2018-02-13 18:18:09', '19.00', '0.00', 'Anulado'),
(38, 127, 10, '1012738CT', '1111', '2018-02-13 18:19:22', '19.00', '0.00', 'Anulado'),
(39, 127, 9, '912739CT', '', '2018-02-13 18:23:55', '19.00', '238000.00', 'Negociando'),
(40, 127, 10, '1012740CT', '', '2018-02-13 18:24:52', '19.00', '595000.00', 'Negociando'),
(41, 126, 10, '1012641CT', 'qweqeqwewq', '2018-02-13 18:25:18', '19.00', '11900.00', 'Negociando'),
(42, 126, 9, '912642CT', '', '2018-02-15 14:55:07', '19.00', '1904000.00', 'Anulado'),
(43, 126, 9, '912643CT', '', '2018-02-15 14:55:28', '19.00', '4760000.00', 'Anulado'),
(44, 127, 9, '912744CT', '', '2018-02-15 14:55:42', '19.00', '202300.00', 'Anulado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cot`
--

CREATE TABLE `detalle_cot` (
  `iddetalle` int(11) NOT NULL,
  `idcotizacion` int(11) NOT NULL,
  `idarticulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(11,2) NOT NULL,
  `descuento` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_cot`
--

INSERT INTO `detalle_cot` (`iddetalle`, `idcotizacion`, `idarticulo`, `cantidad`, `precio_venta`, `descuento`) VALUES
(23, 26, 37, 2, '10000.00', '20.00'),
(24, 27, 27, 4, '400000.00', '20.00'),
(25, 27, 29, 1, '500000.00', '0.00'),
(26, 27, 36, 2, '200000.00', '0.00'),
(27, 28, 1, 2, '200000.00', '20.00'),
(28, 28, 27, 1, '400000.00', '0.00'),
(29, 29, 29, 1, '500000.00', '0.00'),
(30, 29, 36, 1, '200000.00', '0.00'),
(31, 30, 37, 2, '10000.00', '0.00'),
(32, 31, 36, 1, '200000.00', '0.00'),
(33, 32, 29, 1, '500000.00', '99.00'),
(34, 32, 29, 1, '500000.00', '0.00'),
(35, 33, 1, 1, '200000.00', '0.00'),
(36, 34, 27, 1, '400000.00', '0.00'),
(37, 35, 1, 3, '100000.00', '15.00'),
(38, 36, 36, 3, '200000.00', '20.00'),
(39, 36, 37, 1, '10000.00', '0.00'),
(40, 36, 29, 1, '500000.00', '0.00'),
(41, 37, 1, 4, '200000.00', '10.00'),
(42, 37, 27, 2, '400000.00', '5.00'),
(43, 37, 29, 2, '500000.00', '5.00'),
(44, 38, 29, 1, '500000.00', '0.00'),
(45, 39, 1, 1, '200000.00', '0.00'),
(46, 40, 29, 1, '500000.00', '0.00'),
(47, 41, 37, 1, '10000.00', '0.00'),
(48, 42, 36, 10, '200000.00', '20.00'),
(49, 43, 29, 10, '500000.00', '20.00'),
(50, 44, 1, 1, '200000.00', '15.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `idpermiso` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`idpermiso`, `nombre`) VALUES
(1, 'Escritorio'),
(2, 'Contactos'),
(3, 'Oportunidades'),
(4, 'Artículos'),
(5, 'Negociaciones'),
(6, 'Acceso'),
(7, 'Agenda');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `qqq`
--
CREATE TABLE `qqq` (
`asunto` varchar(50)
,`fec_evento` varchar(20)
,`hora_evento` varchar(20)
,`duracion` time
,`tipo_evento` varchar(20)
,`mantenimiento` varchar(15)
,`contacto` varchar(50)
,`razonsocial` varchar(30)
,`tlf_1` varchar(20)
,`correo` varchar(30)
,`nombre` varchar(100)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cargo` varchar(35) DEFAULT NULL,
  `rut` varchar(20) NOT NULL,
  `empresa` varchar(50) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `clave` varchar(64) NOT NULL,
  `condicion` tinyint(4) NOT NULL,
  `imagen` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `tipo`, `nombre`, `cargo`, `rut`, `empresa`, `telefono`, `direccion`, `email`, `clave`, `condicion`, `imagen`) VALUES
(9, 1, 'admin', 'Administrador', '99.999.999-9', NULL, NULL, NULL, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, 'nouser.png'),
(10, 1, 'user', 'Usuario', '99.999.999-8', NULL, NULL, NULL, 'user', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 1, '1517842290.jpg'),
(13, 1, 'Pepe', 'Asistente', '9999999', NULL, NULL, NULL, 'pepe@pepe', '7c9e7c1494b2684ab7c19d6aff737e460fa9e98d5a234da1310c97ddf5691834', 1, 'nouser.png'),
(14, 1, 'Roger', '', '9.999.999-1', NULL, NULL, NULL, 'pdv@pdv', 'f19ccf1eb395a4d74606c59b491ecd0a37b5f26eae0ec55c33bbd2743c658b26', 1, '1517845544.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_permiso`
--

CREATE TABLE `usuario_permiso` (
  `idusuario_permiso` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idpermiso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_permiso`
--

INSERT INTO `usuario_permiso` (`idusuario_permiso`, `idusuario`, `idpermiso`) VALUES
(1, 7, 1),
(2, 7, 2),
(3, 7, 3),
(4, 7, 4),
(5, 7, 5),
(6, 7, 6),
(7, 8, 1),
(8, 8, 2),
(9, 8, 3),
(10, 8, 4),
(11, 8, 5),
(12, 8, 6),
(13, 9, 1),
(14, 9, 2),
(15, 9, 3),
(16, 9, 4),
(17, 9, 5),
(18, 9, 6),
(42, 11, 1),
(43, 11, 3),
(79, 12, 1),
(80, 12, 6),
(91, 10, 1),
(92, 10, 2),
(93, 10, 3),
(94, 10, 4),
(95, 10, 5),
(96, 13, 1),
(97, 13, 2),
(98, 13, 3),
(99, 13, 4),
(100, 13, 5),
(104, 14, 1),
(105, 14, 7),
(106, 9, 7);

-- --------------------------------------------------------

--
-- Estructura para la vista `qqq`
--
DROP TABLE IF EXISTS `qqq`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qqq`  AS  select `a`.`asunto` AS `asunto`,`a`.`fec_evento` AS `fec_evento`,`a`.`hora_evento` AS `hora_evento`,`a`.`duracion` AS `duracion`,`a`.`tipo_evento` AS `tipo_evento`,`a`.`mantenimiento` AS `mantenimiento`,`c`.`contacto` AS `contacto`,`c`.`razonsocial` AS `razonsocial`,`c`.`tlf_1` AS `tlf_1`,`c`.`correo` AS `correo`,`u`.`nombre` AS `nombre` from ((`agendar` `a` join `contacto` `c` on((`a`.`idcontacto` = `c`.`idcontacto`))) join `usuario` `u` on((`a`.`idusuario` = `u`.`idusuario`))) where ((`a`.`mantenimiento` = 'Pendiente') or (`a`.`mantenimiento` = 'Pospuesto')) order by `a`.`idagenda` desc ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agendar`
--
ALTER TABLE `agendar`
  ADD PRIMARY KEY (`idagenda`);

--
-- Indices de la tabla `articulo_det`
--
ALTER TABLE `articulo_det`
  ADD PRIMARY KEY (`idarticulo`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`idcontacto`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD PRIMARY KEY (`idcotizacion`),
  ADD KEY `idcontacto` (`idcontacto`);

--
-- Indices de la tabla `detalle_cot`
--
ALTER TABLE `detalle_cot`
  ADD PRIMARY KEY (`iddetalle`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`idpermiso`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD UNIQUE KEY `rut` (`rut`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  ADD PRIMARY KEY (`idusuario_permiso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agendar`
--
ALTER TABLE `agendar`
  MODIFY `idagenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `articulo_det`
--
ALTER TABLE `articulo_det`
  MODIFY `idarticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `idcontacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  MODIFY `idcotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT de la tabla `detalle_cot`
--
ALTER TABLE `detalle_cot`
  MODIFY `iddetalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `idpermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `usuario_permiso`
--
ALTER TABLE `usuario_permiso`
  MODIFY `idusuario_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
