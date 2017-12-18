-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2017 a las 17:22:20
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
  `canal_deingreso` varchar(20) DEFAULT NULL,
  `filtro` int(11) NOT NULL DEFAULT '1',
  `estado` int(10) NOT NULL,
  `enlace` varchar(200) DEFAULT NULL,
  `fec_ingreso` datetime DEFAULT CURRENT_TIMESTAMP,
  `codigopostal` int(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`idcontacto`, `razonsocial`, `rut`, `giro`, `contacto`, `cargo`, `tlf_1`, `tlf_2`, `correo`, `region`, `ciudad`, `comuna`, `direccion`, `canal_deingreso`, `filtro`, `estado`, `enlace`, `fec_ingreso`, `codigopostal`) VALUES
(1, 'Plan de ventas', NULL, NULL, NULL, NULL, '22 205 1018', NULL, 'pdv@gmail.com', NULL, NULL, NULL, NULL, 'Correo', 1, 1, NULL, '2017-12-11 11:30:20', NULL),
(2, 'Dimasoft', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, 'Presencial', 1, 1, NULL, '2017-12-11 11:41:52', NULL),
(3, 'Ferreteria San Miguel', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, 'Presencial', 1, 1, NULL, '2017-12-11 11:43:07', NULL),
(4, 'Taller Los enanos', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, 'Correo', 1, 1, NULL, '2017-12-11 11:45:05', NULL),
(5, 'Farmacias fulanos', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '', 6, 3, NULL, '2017-12-11 11:55:32', NULL),
(6, 'Outlet chanchitos', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '', 1, 2, NULL, '2017-12-11 11:56:17', NULL),
(7, 'Outlet picapiedra', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '', 2, 1, NULL, '2017-12-11 11:56:38', NULL),
(8, 'Outlet patria', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '', 3, 1, NULL, '2017-12-11 11:56:55', NULL),
(9, 'Restaurant Viva', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '', 4, 2, NULL, '2017-12-11 11:57:26', NULL),
(10, 'Restaurant Vivax', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '', 5, 2, NULL, '2017-12-11 11:57:42', NULL),
(11, '6', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-18 10:18:47', NULL),
(12, '6', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-18 10:20:26', NULL),
(13, '4', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-18 10:24:17', NULL),
(14, '4', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-18 10:24:48', NULL),
(15, 'QiQi', NULL, NULL, NULL, NULL, '123123123', NULL, 'qiqi@qiqi.com', NULL, NULL, NULL, NULL, NULL, 6, 3, NULL, '2017-12-18 10:28:29', NULL),
(16, 'QiQi', NULL, NULL, NULL, NULL, '123123123', NULL, 'qiqi@qiqi.com', NULL, NULL, NULL, NULL, NULL, 6, 3, NULL, '2017-12-18 10:28:53', NULL),
(17, 'QiQi', NULL, NULL, NULL, NULL, '123123123', NULL, 'qiqi@qiqi.com', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, '2017-12-18 10:29:10', NULL),
(18, 'QiQi', NULL, NULL, NULL, NULL, '123123123', NULL, 'qiqi@qiqi.com', NULL, NULL, NULL, NULL, NULL, 6, 3, NULL, '2017-12-18 10:31:14', NULL),
(19, 'Dimasoft', NULL, NULL, NULL, NULL, '0102', NULL, 'dimasoft@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, 2, NULL, '2017-12-18 13:09:05', NULL),
(20, 'Dimasoft', NULL, NULL, NULL, NULL, '01020', NULL, 'dimasoft@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, 2, NULL, '2017-12-18 13:13:18', NULL),
(21, 'Dimasoft', NULL, NULL, NULL, NULL, '01020', NULL, 'dimasoft@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, 2, NULL, '2017-12-18 13:13:36', NULL),
(22, 'Dimasoft', NULL, NULL, NULL, NULL, '01020', NULL, 'dimasoft@gmail.com', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, '2017-12-18 13:13:50', NULL),
(23, 'Dimasoft', NULL, NULL, NULL, NULL, '01020', NULL, 'dimasoft@gmail.com', NULL, NULL, NULL, NULL, NULL, 6, 3, NULL, '2017-12-18 13:18:20', NULL),
(24, 'Dimasoft', NULL, NULL, NULL, NULL, '01020', NULL, 'dimasoft@gmail.com', NULL, NULL, NULL, NULL, NULL, 6, 3, NULL, '2017-12-18 13:18:50', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`idcontacto`),
  ADD UNIQUE KEY `rut` (`rut`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `idcontacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
