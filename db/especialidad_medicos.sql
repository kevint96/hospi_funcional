-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2019 a las 23:00:02
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
-- Estructura de tabla para la tabla `especialidad_medicos`
--

CREATE TABLE `especialidad_medicos` (
  `id` int(11) NOT NULL,
  `especialidad` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialidad_medicos`
--

INSERT INTO `especialidad_medicos` (`id`, `especialidad`) VALUES
(1, 'GINECOLOGIA'),
(2, 'MEDICINA INTERNA'),
(3, 'OFTALMOLOGIA'),
(4, 'PEDIATRIA'),
(5, 'CIRUGIA GENERAL'),
(6, 'UROLOGIA'),
(7, 'ANESTESIOLOGIA'),
(8, 'RADIOLOGIA'),
(9, 'GASTROENTEROLOGIA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `especialidad_medicos`
--
ALTER TABLE `especialidad_medicos`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
