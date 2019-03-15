-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2019 a las 23:00:11
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
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `nombre_paciente` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_paciente` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `email_paciente` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `genero_paciente` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `id_medico` int(11) NOT NULL,
  `nombre_medico` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `especialidad_medico` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `celular_medico` int(12) NOT NULL,
  `fecha_creacion_cita` date NOT NULL,
  `fecha_cita` date NOT NULL,
  `hora_cita` time NOT NULL,
  `estado_cita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `id_paciente`, `nombre_paciente`, `apellido_paciente`, `email_paciente`, `genero_paciente`, `id_medico`, `nombre_medico`, `especialidad_medico`, `celular_medico`, `fecha_creacion_cita`, `fecha_cita`, `hora_cita`, `estado_cita`) VALUES
(16, 2147483647, 'SANDRA PATRICIA', 'GONZALES PRADA', 'SANDRA@GMAIL.COM', 'H', 12727181, 'Tatiana  Gonzales', 'GINECOLOGIA', 24434324, '2019-03-07', '2019-03-12', '03:00:00', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD KEY `id_paciente` (`id_paciente`) USING BTREE,
  ADD KEY `id_medico` (`id_medico`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_id_medicos` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`numero_documento`),
  ADD CONSTRAINT `fk_id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`numero_documento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
