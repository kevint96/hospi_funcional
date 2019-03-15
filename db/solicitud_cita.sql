-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2019 a las 22:58:32
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
-- Estructura de tabla para la tabla `solicitud_cita`
--

CREATE TABLE `solicitud_cita` (
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `numero_documento` int(11) NOT NULL,
  `lugar_expedicion_documento` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `depto_residencia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `municipio_residencia` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `barrio_residencia` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `genero` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `estado_civil` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_discapacidad` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_fijo` int(11) NOT NULL,
  `telefono_movil` int(11) NOT NULL,
  `poblacion_especial` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `especialidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `autorizacion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `orden_medica` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `solicitud_cita`
--
ALTER TABLE `solicitud_cita`
  ADD PRIMARY KEY (`numero_documento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
