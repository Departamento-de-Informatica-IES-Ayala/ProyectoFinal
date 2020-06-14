-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2020 a las 13:17:31
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `hora` varchar(70) NOT NULL,
  `dia` date NOT NULL,
  `dni_Prof` varchar(9) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_citas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`hora`, `dia`, `dni_Prof`, `id_cliente`, `id_citas`) VALUES
('18:00', '2020-06-10', '77992641D', 17, 1),
('20:00', '2020-06-10', '77992641D', 17, 3),
('17:00', '2020-06-10', '77992641D', 17, 4),
('17:00', '2020-06-09', '77992641D', 17, 5),
('12:00', '2020-06-09', '77992641D', 18, 6),
('18:00', '2020-06-09', '77992641D', 18, 7),
('20:00', '2020-06-12', '77992641D', 17, 9),
('19:00', '2020-06-13', '77992641D', 18, 15),
('21:31', '2020-06-11', '77992641D', 18, 20),
('18:33', '2020-06-16', '77992641D', 18, 21),
('19:32', '2020-06-17', '77992641D', 18, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `email` varchar(230) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `valoracion` text NOT NULL,
  `DNIProf` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `dni`, `email`, `telefono`, `valoracion`, `DNIProf`) VALUES
(17, 'María ', '77992649D', 'paula.lj17@gmail.com', '647453949', '', '77992641D'),
(18, 'pepe', '77992641D', 'paula.lj17@gmail.com', '333333', '', '77992641D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` varchar(70) NOT NULL,
  `pass` varchar(230) NOT NULL,
  `email` varchar(230) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`id_empresa`, `pass`, `email`) VALUES
('beaty', '$2y$10$Yu/TisDdDVFZcDM057LOeuuSbX1vGmVYRE4hOQwhNOC218MvEDCka', 'beaty@gmail.com'),
('papaf', '1234', 'papaf@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tratamientos`
--

CREATE TABLE `tratamientos` (
  `id_tratamiento` int(11) NOT NULL,
  `tratamiento` text NOT NULL,
  `precio` varchar(9) NOT NULL,
  `importe_pagado` varchar(10) NOT NULL,
  `dni_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tratamientos`
--

INSERT INTO `tratamientos` (`id_tratamiento`, `tratamiento`, `precio`, `importe_pagado`, `dni_cliente`) VALUES
(40, 'limpieza', '10', '', 18),
(44, 'depilacion cejas', '10', '5', 17),
(47, 'limpieza', '20', '5', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `nombre` varchar(70) NOT NULL,
  `funcion` varchar(20) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `email` varchar(230) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_empresa` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`nombre`, `funcion`, `dni`, `email`, `password`, `id_empresa`) VALUES
('Pedro', 'www', '77992641D', 'paula@gmail.com', '$2y$10$SFGoLysVO2ZmlT7Pj9KUiuatFhPCsOEWsCQwofmQtJi7I8KWEfWJm', 'papaf'),
('pepe', 'masajista', '77992643X', 'paula@gmail.com', '$2y$10$tSGUhnHEhqnSVowiBbdfVuHjtzPdJeNrALcjh3EYMx7PZ0pAzVwCO', 'papaF');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_citas`),
  ADD KEY `clientCitas` (`id_cliente`),
  ADD KEY `profCitas` (`dni_Prof`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD PRIMARY KEY (`id_tratamiento`),
  ADD KEY `tratamiento` (`dni_cliente`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`dni`),
  ADD KEY `users_ibfk_1` (`id_empresa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_citas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  MODIFY `id_tratamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `clientCitas` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `profCitas` FOREIGN KEY (`dni_Prof`) REFERENCES `users` (`dni`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tratamientos`
--
ALTER TABLE `tratamientos`
  ADD CONSTRAINT `tratamiento` FOREIGN KEY (`dni_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id_empresa`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
