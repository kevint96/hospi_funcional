-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2019 a las 22:59:41
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hospitalcandelaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cuenta` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion_cuenta` date NOT NULL,
  `primer_nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `segundo_nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `primer_apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `segundo_apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_documento` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `numero_documento` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `celular` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`email`, `cuenta`, `password`, `fecha_creacion_cuenta`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `tipo_documento`, `numero_documento`, `fecha_nacimiento`, `direccion`, `celular`) VALUES
('pedro@gmail.com', 'pedro', '1234', '2019-03-08', 'Pedro', '', 'Gonzales', '', 'CC', 12232322, '2019-03-12', 'msjsjsjs', 0),
('kjtj38@hotmail.com', 'mau', '123', '2019-03-06', 'Mauricio jose', '', 'Vargas torres', '', 'CC', 21727161, '2019-03-05', 'mz 3233', 0),
('lunamitgonzalez@gmail.com', 'mitzy12', '1234', '2019-03-07', 'Mitzy ', '', 'Luna', '', 'CC', 111023526, '1996-03-06', 'Cantabria', 0),
('rafcoruse@gmail.com', 'rafacordoba', '12340987', '2019-03-08', 'rafael', '', 'cordoba', '', 'CC', 1110554624, '1994-12-24', 'cll 121A N&deg;7C-26 apto 201 TR17', 0),
('kjtj39@hotmail.com', 'kevint24', 'torresjimenez24', '2019-03-07', 'Kevin', 'Jhoan', 'Torres', 'Jimenez', 'CC', 1110573720, '1996-08-05', 'mz 23 a casa 7 topacio', 0),
('Sandra@gmail.com', 'sandra', '12', '2019-03-07', 'Sandra Patricia', '', 'Gonzales Prada', '', 'CC', 2147483647, '2019-03-06', 'mz 23 a casa 7 topacio', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`numero_documento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
