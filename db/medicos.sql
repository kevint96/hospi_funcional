-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2019 a las 22:59:53
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
-- Estructura de tabla para la tabla `medicos`
--

CREATE TABLE `medicos` (
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_documento` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `numero_documento` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `celular` int(11) NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_disponible` date NOT NULL,
  `hora_disponible` time NOT NULL,
  `especialidad_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`nombre`, `apellido`, `tipo_documento`, `numero_documento`, `fecha_nacimiento`, `email`, `celular`, `direccion`, `fecha_disponible`, `hora_disponible`, `especialidad_id`) VALUES
('Sara Sofia', 'Vargas', 'CC', 8686667, '2019-03-05', 'jkjkdkjdjdj', 764354655, 'nnkkdkdjd', '2019-03-27', '05:06:06', 3),
('Sebastian', 'Barragan', 'CC', 11922118, '2019-03-06', 'Sebastian@gmail.com', 321324323, 'kkmkksd', '2019-03-20', '03:45:00', 4),
('Tatiana ', 'Gonzales', 'CC', 12727181, '2019-03-04', 'jsdjjdsjjdsd', 24434324, 'jdkjdkdjjdkdsj', '2019-03-12', '03:00:00', 1),
('Camila', 'Bejarano', 'CC', 65771487, '2019-03-03', 'jhknnddf', 1292922, 'kxdkdmksx', '2019-04-02', '05:04:00', 1),
('Juan Camilo', 'Torres ', 'CC', 71716221, '2019-03-05', 'kdkjdjdkd', 87684445, 'kjkhhhklkl', '2019-03-17', '04:04:00', 2),
('Gilma', 'Linares', 'CC', 111223322, '2019-03-26', 'Gilma@gmail.com', 312232322, 'kmkmskmms', '2019-03-31', '09:00:00', 4),
('Carolina', 'Amaya', 'CC', 316612171, '2019-03-05', 'Caro@gmail.com', 322344222, 'bhbbbdbdss', '2019-03-28', '05:00:00', 5),
('Fernando', 'Solano', 'CC', 322772121, '2019-03-29', 'Fer@gmail.com', 321171111, 'njbjnbjnj', '2019-04-24', '07:00:00', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`numero_documento`),
  ADD KEY `especialidad_id` (`especialidad_id`) USING BTREE;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `fk_especialidad_id` FOREIGN KEY (`especialidad_id`) REFERENCES `especialidad_medicos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
