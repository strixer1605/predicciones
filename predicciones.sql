-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2024 a las 21:59:09
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
-- Base de datos: `predicciones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `idPais` int(11) NOT NULL,
  `nombrePais` varchar(50) NOT NULL,
  `bandera` varchar(500) NOT NULL,
  `PJ` int(11) NOT NULL,
  `G` int(11) NOT NULL,
  `E` int(11) NOT NULL,
  `P` int(11) NOT NULL,
  `GF` int(11) NOT NULL,
  `GC` int(11) NOT NULL,
  `DG` int(11) NOT NULL,
  `pts` int(11) NOT NULL,
  `grupo` varchar(20) NOT NULL,
  `estado` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`idPais`, `nombrePais`, `bandera`, `PJ`, `G`, `E`, `P`, `GF`, `GC`, `DG`, `pts`, `grupo`, `estado`) VALUES
(1, 'Argentina', '../imagenes\\argentina.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo A', 1),
(2, 'Canadá', '../imagenes/canada.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo A', 1),
(3, 'Chile', '../imagenes/chile.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo A', 1),
(4, 'Perú', '../imagenes/peru.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo A', 1),
(5, 'Ecuador', '../imagenes/ecuador.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo B', 1),
(6, 'Jamaica', '../imagenes/jamaica.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo B', 1),
(7, 'México', '../imagenes/mexico.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo B', 1),
(8, 'Venezuela', '../imagenes/venezuela.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo B', 1),
(9, 'Bolivia', '../imagenes/bolivia.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo C', 1),
(10, 'EU', '../imagenes/estadosUnidos.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo C', 1),
(11, 'Panamá', '../imagenes/panama.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo C', 1),
(12, 'Uruguay', '../imagenes/uruguay.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo C', 1),
(13, 'Brasil', '../imagenes/brasil.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo D', 1),
(14, 'Colombia', '../imagenes/colombia.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo D', 1),
(15, 'Costa Rica', '../imagenes/costaRica.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo D', 1),
(16, 'Paraguay', '../imagenes/paraguay.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo D', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `idPartido` int(11) NOT NULL,
  `fkPais1` int(11) NOT NULL,
  `fkPais2` int(11) NOT NULL,
  `GF1P` int(11) NOT NULL,
  `GF2P` int(11) NOT NULL,
  `ganador` int(11) NOT NULL,
  `fechaHora` datetime NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`idPartido`, `fkPais1`, `fkPais2`, `GF1P`, `GF2P`, `ganador`, `fechaHora`, `estado`) VALUES
(1, 1, 2, 0, 0, 0, '2024-06-20 21:00:00', 1),
(2, 4, 3, 0, 0, 0, '2024-06-21 21:00:00', 1),
(5, 5, 8, 0, 0, 0, '2024-06-22 19:00:00', 1),
(6, 7, 6, 0, 0, 0, '2024-06-23 22:00:00', 1),
(7, 10, 9, 0, 0, 0, '2024-06-23 19:00:00', 1),
(8, 12, 11, 0, 0, 0, '2024-06-23 22:00:00', 1),
(9, 14, 16, 0, 0, 0, '2024-06-24 19:00:00', 1),
(10, 13, 15, 0, 0, 0, '2024-06-24 22:00:00', 1),
(11, 4, 2, 0, 0, 0, '2024-06-25 19:00:00', 1),
(12, 3, 1, 0, 0, 0, '2024-06-25 22:00:00', 1),
(13, 5, 6, 0, 0, 0, '2024-06-26 19:00:00', 1),
(14, 8, 7, 0, 0, 0, '2024-06-26 22:00:00', 1),
(15, 11, 10, 0, 0, 0, '2024-06-27 19:00:00', 1),
(16, 12, 9, 0, 0, 0, '2024-06-27 22:00:00', 1),
(17, 14, 15, 0, 0, 0, '2024-06-28 19:00:00', 1),
(18, 16, 13, 0, 0, 0, '2024-06-28 22:00:00', 1),
(19, 1, 4, 0, 0, 0, '2024-06-29 21:00:00', 1),
(20, 2, 3, 0, 0, 0, '2024-06-29 21:00:00', 1),
(21, 7, 5, 0, 0, 0, '2024-06-30 21:00:00', 1),
(22, 6, 8, 0, 0, 0, '2024-09-30 21:00:00', 1),
(23, 9, 11, 0, 0, 0, '2024-07-01 22:00:00', 1),
(24, 10, 12, 0, 0, 0, '2024-07-01 22:00:00', 1),
(25, 13, 14, 0, 0, 0, '2024-07-02 22:00:00', 1),
(26, 15, 16, 0, 0, 0, '2024-07-02 22:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `predicciones`
--

CREATE TABLE `predicciones` (
  `idPrediccion` int(11) NOT NULL,
  `fkPartido` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `GF1` int(11) NOT NULL,
  `GF2` int(11) NOT NULL,
  `puntos` int(11) NOT NULL,
  `puntos_suma` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `dni` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `puntos_totales` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `nombre`, `apellido`, `puntos_totales`) VALUES
(46736648, 'santiago', 'exposito', 0),
(26764251, 'santiago', 'gonzalez', 0),
(48229271, 'PITITO', 'GRANDE', 0),
(31635428, 'Gaston', 'Ferreyra', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`idPais`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`idPartido`),
  ADD KEY `fkPais2` (`fkPais2`),
  ADD KEY `fkPais1` (`fkPais1`);

--
-- Indices de la tabla `predicciones`
--
ALTER TABLE `predicciones`
  ADD PRIMARY KEY (`idPrediccion`),
  ADD KEY `fkPartido` (`fkPartido`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `idPartido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `predicciones`
--
ALTER TABLE `predicciones`
  MODIFY `idPrediccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `fkPais1` FOREIGN KEY (`fkPais1`) REFERENCES `paises` (`idPais`),
  ADD CONSTRAINT `fkPais2` FOREIGN KEY (`fkPais2`) REFERENCES `paises` (`idPais`);

--
-- Filtros para la tabla `predicciones`
--
ALTER TABLE `predicciones`
  ADD CONSTRAINT `fkPartido` FOREIGN KEY (`fkPartido`) REFERENCES `partidos` (`idPartido`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
