-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-04-2026 a las 16:31:26
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `torneos`
--

CREATE TABLE `torneos` (
  `id` int(11) NOT NULL,
  `nombreTorneo` varchar(100) NOT NULL,
  `organizador` varchar(100) DEFAULT NULL,
  `patrocinadores` varchar(100) DEFAULT NULL,
  `sede` varchar(100) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `premio1` varchar(100) DEFAULT NULL,
  `premio2` varchar(100) DEFAULT NULL,
  `premio3` varchar(100) DEFAULT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `otroPremio` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `torneos`
--

INSERT INTO `torneos` (`id`, `nombreTorneo`, `organizador`, `patrocinadores`, `sede`, `categoria`, `premio1`, `premio2`, `premio3`, `usuario`, `contrasena`, `otroPremio`) VALUES
(2, 'CoPa-Mazatlán2026', 'Javier Rueda ', 'RVCA\r\nGATORADE', 'Universidad de Durango campus Maz', 'Libre', '95000', '50.000', '25000', 'JAVIER', '$2y$10$vqL/HzQkZyq2h9A7TOGLluBggDLcDJEERVSgyunFS.kdAfrzJY1ca', 'MEJOR ANOTADOR'),
(7, '2026SEMANA - SANTA-COPA', 'TOMBO', 'PACIFICO \r\nGATORADE\r\nADIDAS', 'LOPEZ-MATEOS-COURT', '2da. fuerza', '10000', '5000', '3000', 'TOMBO', '$2y$10$7ny13bO.YonnOUJ.vTEiVumGaB2JPE7/C3GDE86XGygtbXLEEdg56', '5000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `torneos`
--
ALTER TABLE `torneos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `torneos`
--
ALTER TABLE `torneos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
