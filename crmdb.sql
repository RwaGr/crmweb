-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2017 a las 22:14:56
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
  `codigopostal` int(15) DEFAULT NULL,
  `imagen` varchar(100) NOT NULL,
  `sitioweb` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`idcontacto`, `razonsocial`, `rut`, `giro`, `contacto`, `cargo`, `tlf_1`, `tlf_2`, `correo`, `region`, `ciudad`, `comuna`, `direccion`, `canal_deingreso`, `filtro`, `estado`, `enlace`, `fec_ingreso`, `codigopostal`, `imagen`, `sitioweb`) VALUES
(1, 'Plan de ventas', NULL, NULL, NULL, NULL, '22 205 1018', NULL, 'pdv@gmail.com', NULL, NULL, NULL, NULL, 'Correo', 3, 1, NULL, '2017-12-11 11:30:20', NULL, '', ''),
(2, 'Dimasoft', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, 'Presencial', 1, 2, NULL, '2017-12-11 11:41:52', NULL, '', ''),
(3, 'Ferreteria San Miguel', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, 'Presencial', 1, 2, NULL, '2017-12-11 11:43:07', NULL, '', ''),
(4, 'Taller Los enanos', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, 'Correo', 1, 2, NULL, '2017-12-11 11:45:05', NULL, '', ''),
(5, 'Farmacias fulanos', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '', 6, 3, NULL, '2017-12-11 11:55:32', NULL, '', ''),
(6, 'Outlet chanchitos', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '', 1, 2, NULL, '2017-12-11 11:56:17', NULL, '', ''),
(7, 'Outlet picapiedra', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '', 2, 1, NULL, '2017-12-11 11:56:38', NULL, '', ''),
(8, 'Outlet patria', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '', 3, 1, NULL, '2017-12-11 11:56:55', NULL, '', ''),
(9, 'Restaurant Viva', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '', 4, 2, NULL, '2017-12-11 11:57:26', NULL, '', ''),
(10, 'Restaurant Vivax', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, '', 5, 2, NULL, '2017-12-11 11:57:42', NULL, '', ''),
(11, '6', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-18 10:18:47', NULL, '', ''),
(12, '6', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-18 10:20:26', NULL, '', ''),
(13, '4', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-18 10:24:17', NULL, '', ''),
(14, '4', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-18 10:24:48', NULL, '', ''),
(15, 'QiQi', NULL, NULL, NULL, NULL, '123123123', NULL, 'qiqi@qiqi.com', NULL, NULL, NULL, NULL, NULL, 6, 3, NULL, '2017-12-18 10:28:29', NULL, '', ''),
(16, 'QiQi', NULL, NULL, NULL, NULL, '123123123', NULL, 'qiqi@qiqi.com', NULL, NULL, NULL, NULL, NULL, 6, 3, NULL, '2017-12-18 10:28:53', NULL, '', ''),
(17, 'QiQi', NULL, NULL, NULL, NULL, '123123123', NULL, 'qiqi@qiqi.com', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, '2017-12-18 10:29:10', NULL, '', ''),
(18, 'QiQi', NULL, NULL, NULL, NULL, '123123123', NULL, 'qiqi@qiqi.com', NULL, NULL, NULL, NULL, NULL, 6, 3, NULL, '2017-12-18 10:31:14', NULL, '', ''),
(19, 'Dimasoft', NULL, NULL, NULL, NULL, '0102', NULL, 'dimasoft@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, 2, NULL, '2017-12-18 13:09:05', NULL, '', ''),
(20, 'Dimasoft', NULL, NULL, NULL, NULL, '01020', NULL, 'dimasoft@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, 2, NULL, '2017-12-18 13:13:18', NULL, '', ''),
(21, 'Dimasoft', NULL, NULL, NULL, NULL, '01020', NULL, 'dimasoft@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, 2, NULL, '2017-12-18 13:13:36', NULL, '', ''),
(22, 'Dimasoft', NULL, NULL, NULL, NULL, '01020', NULL, 'dimasoft@gmail.com', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, '2017-12-18 13:13:50', NULL, '', ''),
(23, 'Dimasoft', NULL, NULL, NULL, NULL, '01020', NULL, 'dimasoft@gmail.com', NULL, NULL, NULL, NULL, NULL, 6, 3, NULL, '2017-12-18 13:18:20', NULL, '', ''),
(24, 'Dimasoft', NULL, NULL, NULL, NULL, '01020', NULL, 'dimasoft@gmail.com', NULL, NULL, NULL, NULL, NULL, 6, 3, NULL, '2017-12-18 13:18:50', NULL, '', ''),
(25, 'Correo Chile', NULL, NULL, NULL, NULL, '223459932', NULL, 'correochile@correo.com', NULL, NULL, NULL, NULL, NULL, 1, 2, NULL, '2017-12-18 14:48:53', NULL, '', ''),
(26, 'Correo Chile', NULL, NULL, NULL, NULL, '223459932', NULL, 'correochile@correo.com', NULL, NULL, NULL, NULL, NULL, 2, 1, NULL, '2017-12-18 14:49:07', NULL, '', ''),
(27, 'Correo Chile', NULL, NULL, NULL, NULL, '223459932', NULL, 'correochile@correo.com', NULL, NULL, NULL, NULL, NULL, 6, 3, NULL, '2017-12-18 14:49:16', NULL, '', ''),
(28, 'Correo Chile', NULL, NULL, NULL, NULL, '223459932', NULL, 'correochile@correo.com', NULL, NULL, NULL, NULL, NULL, 6, 3, NULL, '2017-12-18 14:49:30', NULL, '', ''),
(29, 'Correo Chile', NULL, NULL, NULL, NULL, '223459932', NULL, 'correochile@correo.com', NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, '2017-12-18 14:49:37', NULL, '', ''),
(30, 'Correo Chile', NULL, NULL, NULL, NULL, '223459932', NULL, 'correochile@correo.com', NULL, NULL, NULL, NULL, NULL, 4, 2, NULL, '2017-12-18 14:49:44', NULL, '', ''),
(31, 'Correo Chile', NULL, NULL, NULL, NULL, '223459932', NULL, 'correochile@correo.com', NULL, NULL, NULL, NULL, NULL, 5, 2, NULL, '2017-12-18 14:49:51', NULL, '', ''),
(32, 'Correo Chile', NULL, NULL, NULL, NULL, '000111', NULL, 'correochile@correo.com', NULL, NULL, NULL, NULL, NULL, 6, 3, NULL, '2017-12-18 16:13:20', NULL, '', ''),
(33, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:09:36', NULL, '', ''),
(34, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:10:01', NULL, '', ''),
(35, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:20:13', NULL, '', ''),
(36, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:20:16', NULL, '', ''),
(37, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:20:16', NULL, '', ''),
(38, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:20:16', NULL, '', ''),
(39, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:20:16', NULL, '', ''),
(40, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:20:16', NULL, '', ''),
(41, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:20:16', NULL, '', ''),
(42, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:20:16', NULL, '', ''),
(43, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:20:17', NULL, '', ''),
(44, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:20:17', NULL, '', ''),
(45, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:20:27', NULL, '', ''),
(46, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:22:39', NULL, '', ''),
(47, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:25:35', NULL, '', ''),
(48, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:25:48', NULL, '', ''),
(49, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:26:43', NULL, '', ''),
(50, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:26:45', NULL, '', ''),
(51, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:26:45', NULL, '', ''),
(52, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:26:45', NULL, '', ''),
(53, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:26:47', NULL, '', ''),
(54, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:26:48', NULL, '', ''),
(55, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:31:14', NULL, '', ''),
(56, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:34:26', NULL, '', ''),
(57, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:34:42', NULL, '', ''),
(58, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 3, NULL, '2017-12-19 11:35:27', NULL, '', ''),
(59, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:36:19', NULL, '', ''),
(60, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:38:07', NULL, '', ''),
(61, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:38:46', NULL, '', ''),
(62, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 11:38:52', NULL, '', ''),
(63, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 12:11:42', NULL, '', ''),
(64, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 12:12:35', NULL, '', ''),
(65, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 12:13:21', NULL, '', ''),
(66, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 12:16:08', NULL, '', ''),
(67, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 13:09:51', NULL, '', ''),
(68, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 14:05:49', NULL, '', ''),
(69, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 15:17:50', NULL, '', ''),
(70, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 15:18:55', NULL, '', ''),
(71, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 15:26:07', NULL, '', ''),
(72, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 15:28:11', NULL, '', ''),
(73, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 15:29:29', NULL, '', ''),
(74, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 15:29:55', NULL, '', ''),
(75, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 15:30:12', NULL, '', ''),
(76, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 15:30:42', NULL, '', ''),
(77, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 15:32:33', NULL, '', ''),
(78, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 15:36:37', NULL, '', ''),
(79, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 15:53:41', NULL, '', ''),
(80, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 15:54:39', NULL, '', ''),
(81, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 16:06:26', NULL, '', ''),
(82, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 16:07:58', NULL, '', ''),
(83, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-19 16:19:39', NULL, '', ''),
(84, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-20 10:53:10', NULL, '', ''),
(85, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-20 10:53:35', NULL, '', ''),
(86, 'Rwa', NULL, NULL, NULL, NULL, '223451223', NULL, 'rwa@rwa.com', NULL, NULL, NULL, NULL, NULL, 1, 2, NULL, '2017-12-20 11:02:08', NULL, '', ''),
(87, '', NULL, NULL, NULL, NULL, '010203', NULL, '', NULL, NULL, NULL, NULL, NULL, 5, 2, NULL, '2017-12-20 11:08:29', NULL, '', ''),
(88, 'Limon', NULL, NULL, NULL, NULL, '!!', NULL, '!!', NULL, NULL, NULL, NULL, NULL, 4, 2, NULL, '2017-12-20 11:11:06', NULL, '', ''),
(89, 'Frank Underwood', NULL, NULL, NULL, NULL, 'unknow', NULL, '', NULL, NULL, NULL, NULL, NULL, 6, 3, NULL, '2017-12-20 12:16:00', NULL, '', ''),
(90, 'Carmelot', NULL, NULL, NULL, NULL, 'sin tlf', NULL, 'sin correo', NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, '2017-12-20 12:16:57', NULL, '', ''),
(91, '', NULL, NULL, NULL, NULL, '', NULL, '', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, '2017-12-21 16:15:27', NULL, '', '');

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
  MODIFY `idcontacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
