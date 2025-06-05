-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2025 a las 02:13:31
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `nombre` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fecha_reg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`nombre`, `email`, `fecha_reg`) VALUES
('aeuaq5', 'nHJDF@GMAIL.COM', '08/04/25/21:04'),
('admin', 'admin@GMAIL.COM', '24/04/25/19:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro2`
--

CREATE TABLE `registro2` (
  `nombre` int(11) NOT NULL,
  `email` int(11) NOT NULL,
  `fecha de registro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registronuevo`
--

CREATE TABLE `registronuevo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registronuevo`
--

INSERT INTO `registronuevo` (`id`, `nombre`, `apellido`, `email`, `user`, `pass`, `fecha_registro`) VALUES
(1, 'ramiro', 'salvatierra', 'ramsalvita@gmail.com', 'ramasa', '$2y$10$G3hEjuHjWT43zRbLFWFkpO/e7lYEMJ1qPmrt.qVqvAa0UkSinNrhm', '2025-05-15 22:23:25'),
(4, 'seba', 'pri', 'sebitix@gmail.com', 'sebitix', '$2y$10$eSAsJQFzzr7..waqoO3SiOeLLn2clb2WAMbb7DwWK7J7NdiA.E.Z.', '2025-05-15 23:24:20'),
(5, 'agus', 'magnacca', 'agusmagna@gmail.com', 'agus', '$2y$10$QwN4PMyOWF1SVpD8Ya7qPeJd9MqbU60/OeXCX4tyJE/mmoPEzNbo.', '2025-05-16 00:08:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `patente` varchar(10) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `hora_ingreso` datetime DEFAULT current_timestamp(),
  `hora_salida` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `patente`, `tipo`, `hora_ingreso`, `hora_salida`) VALUES
(1, 'hcf 315', 'Auto', '2025-04-24 19:34:50', '2025-04-24 19:39:20'),
(2, 'hcf 315', 'Auto', '2025-04-24 19:35:16', '2025-04-24 21:28:09'),
(3, 'das 123', 'Moto', '2025-04-24 19:39:38', '2025-04-24 19:39:51'),
(4, 'das 765', 'Camioneta', '2025-04-24 19:41:33', '2025-04-24 19:43:05'),
(5, 'das 765', 'Camioneta', '2025-04-24 19:42:32', '2025-04-24 21:28:08'),
(6, 'hkl 505', 'Auto', '2025-04-24 19:43:56', '2025-04-24 19:44:03'),
(7, 'ram 123', 'auto', '2025-04-24 20:28:24', '2025-04-24 21:28:11'),
(8, 'agu 123', 'Auto', '2025-04-24 21:19:54', '2025-04-24 21:28:06'),
(9, 'agu 123', 'Auto', '2025-04-24 21:20:43', '2025-04-24 21:28:00'),
(10, 'agu 123', 'Auto', '2025-04-24 21:21:14', '2025-04-24 21:27:59'),
(11, 'agu 123', 'Auto', '2025-04-24 21:21:17', '2025-04-24 21:27:57'),
(12, 'dad 123', 'Auto', '2025-04-24 21:21:58', '2025-04-24 21:28:01'),
(13, 'dad 123', 'Auto', '2025-04-24 21:22:12', '2025-04-24 21:28:03'),
(14, 'hcf 315', 'Auto', '2025-04-24 21:25:17', '2025-04-24 21:28:04'),
(15, 'hcf 315', 'Auto', '2025-04-24 21:25:41', '2025-04-24 21:29:06'),
(16, 'hcf 315', 'Auto', '2025-04-24 21:26:54', '2025-04-24 21:27:55'),
(17, 'hcf 315', 'Auto', '2025-04-24 21:26:58', '2025-04-24 21:28:13'),
(18, 'hcf 315', 'Auto', '2025-04-24 21:27:03', '2025-04-24 21:28:39'),
(19, 'hcf 315', 'Auto', '2025-04-24 21:27:41', '2025-05-13 20:39:09'),
(20, 'hcf 315', 'Auto', '2025-04-24 21:30:14', '2025-04-24 21:31:18'),
(21, 'wer234', 'Auto', '2025-05-13 20:39:04', '2025-05-13 20:39:35'),
(22, 'wer234', 'Auto', '2025-05-15 20:23:23', NULL),
(23, 'wer234', 'Auto', '2025-05-15 20:23:44', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registronuevo`
--
ALTER TABLE `registronuevo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registronuevo`
--
ALTER TABLE `registronuevo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
