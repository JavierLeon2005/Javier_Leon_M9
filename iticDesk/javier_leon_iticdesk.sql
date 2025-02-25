CREATE USER IF NOT EXISTS 'xavi'@'localhost' IDENTIFIED BY 'xavi';
GRANT ALL PRIVILEGES ON . TO 'xavi'@'localhost' WITH GRANT OPTION;
FLUSH PRIVILEGES;

CREATE DATABASE javier_leon_iticdesk;
USE javier_leon_iticdesk;


-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 25-02-2025 a las 15:44:31
-- Versión del servidor: 8.0.40-0ubuntu0.24.04.1
-- Versión de PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `javier_leon_iticdesk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencies`
--

CREATE TABLE `incidencies` (
  `id` int NOT NULL,
  `prioritat` enum('I','II','III','IV') NOT NULL,
  `titol` varchar(100) NOT NULL,
  `descripcio` text NOT NULL,
  `usuari_id` int NOT NULL,
  `data_creacio` date NOT NULL,
  `estat` enum('Oberta','Gestió','Tancada','Reoberta') NOT NULL DEFAULT 'Oberta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `incidencies`
--

INSERT INTO `incidencies` (`id`, `prioritat`, `titol`, `descripcio`, `usuari_id`, `data_creacio`, `estat`) VALUES
(1, 'I', 'Me muerto', 'Me estoy muriendo', 1, '2025-02-19', 'Oberta'),
(2, 'I', 'Se muere el ruben', 'Se esta muriendo el ruben', 1, '2025-02-19', 'Oberta'),
(3, 'I', 'Se muere el torrente', 'Se muere muy rapido el torrente', 2, '2025-02-19', 'Oberta'),
(4, 'I', 'Se muere el alex', 'Se esta muriendo ayuda', 1, '2025-02-25', 'Gestió'),
(5, 'II', 'No hay carne', 'Que me quedo sin comer', 3, '2025-02-25', 'Gestió');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuaris`
--

CREATE TABLE `usuaris` (
  `id` int NOT NULL,
  `dni` varchar(9) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `cognom` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contrasenya` varchar(255) NOT NULL,
  `rol` enum('professor','administrador') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuaris`
--

INSERT INTO `usuaris` (`id`, `dni`, `nom`, `cognom`, `email`, `contrasenya`, `rol`) VALUES
(1, '12345678A', 'Javier', 'Leon', 'xavi@xavi', 'xavi', 'administrador'),
(2, '87654321A', 'Ruben', 'Claudio', 'ruben@ruben', 'ruben', 'professor'),
(3, '13572468G', 'Manel', 'Moya', 'moya@moya', 'moya', 'professor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencies`
--
ALTER TABLE `incidencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuari_id` (`usuari_id`);

--
-- Indices de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencies`
--
ALTER TABLE `incidencies`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuaris`
--
ALTER TABLE `usuaris`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencies`
--
ALTER TABLE `incidencies`
  ADD CONSTRAINT `incidencies_ibfk_1` FOREIGN KEY (`usuari_id`) REFERENCES `usuaris` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
