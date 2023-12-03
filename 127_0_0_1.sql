-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-12-2023 a las 08:03:53
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aplicacion`
--
CREATE DATABASE IF NOT EXISTS `aplicacion` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `aplicacion`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaborador`
--
-- Creación: 04-09-2023 a las 00:47:23
-- Última actualización: 03-12-2023 a las 05:28:10
--

CREATE TABLE `colaborador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `colaborador`
--

INSERT INTO `colaborador` (`id`, `nombre`, `apellidos`) VALUES
(1, 'Leonardo Javier ', 'Fenix Ortega '),
(35, 'Jose Miguel', 'Basurto Tejeda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaborador_cursos`
--
-- Creación: 04-09-2023 a las 01:01:40
-- Última actualización: 03-12-2023 a las 05:28:10
--

CREATE TABLE `colaborador_cursos` (
  `id` int(11) NOT NULL,
  `idcolaborador` int(255) NOT NULL,
  `idcurso` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `colaborador_cursos`
--

INSERT INTO `colaborador_cursos` (`id`, `idcolaborador`, `idcurso`) VALUES
(124, 1, 1),
(205, 35, 2),
(206, 35, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--
-- Creación: 04-09-2023 a las 00:43:30
-- Última actualización: 03-12-2023 a las 05:52:53
--

CREATE TABLE `cursos` (
  `id` int(255) NOT NULL,
  `nombre_curso` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre_curso`) VALUES
(1, 'Procesos de Tienda'),
(2, 'Articulos Sobrestock CT'),
(3, 'CT de tienda '),
(26, 'Servicios de devolucion'),
(30, 'Servicios de ruta '),
(32, 'Servicios a domicilio');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colaborador`
--
ALTER TABLE `colaborador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colaborador_cursos`
--
ALTER TABLE `colaborador_cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcolaborador` (`idcolaborador`),
  ADD KEY `idcurso` (`idcurso`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `colaborador_cursos`
--
ALTER TABLE `colaborador_cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `colaborador_cursos`
--
ALTER TABLE `colaborador_cursos`
  ADD CONSTRAINT `colaborador_cursos_ibfk_1` FOREIGN KEY (`idcolaborador`) REFERENCES `colaborador` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `colaborador_cursos_ibfk_2` FOREIGN KEY (`idcurso`) REFERENCES `cursos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
