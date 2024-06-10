-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 09-06-2024 a las 22:58:12
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.13

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

DROP TABLE IF EXISTS `paises`;
CREATE TABLE IF NOT EXISTS `paises` (
  `idPais` int NOT NULL AUTO_INCREMENT,
  `nombrePais` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `bandera` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `PJ` int NOT NULL,
  `G` int NOT NULL,
  `E` int NOT NULL,
  `P` int NOT NULL,
  `GF` int NOT NULL,
  `GC` int NOT NULL,
  `DG` int NOT NULL,
  `pts` int NOT NULL,
  `grupo` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`idPais`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`idPais`, `nombrePais`, `bandera`, `PJ`, `G`, `E`, `P`, `GF`, `GC`, `DG`, `pts`, `grupo`) VALUES
(1, 'Argentina', '../imagenes\\argentina.png', 3, 1, 1, 1, 5, 1, 4, 4, 'Grupo A'),
(2, 'Canadá', '../imagenes/canada.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo A'),
(3, 'Chile', '../imagenes/chile.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo A'),
(4, 'Perú', '../imagenes/peru.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo A'),
(5, 'Ecuador', '../imagenes/ecuador.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo B'),
(6, 'Jamaica', '../imagenes/jamaica.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo B'),
(7, 'México', '../imagenes/mexico.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo B'),
(8, 'Venezuela', '../imagenes/venezuela.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo B'),
(9, 'Bolivia', '../imagenes/bolivia.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo C'),
(10, 'EU', '../imagenes/estadosUnidos.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo C'),
(11, 'Panamá', '../imagenes/panama.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo C'),
(12, 'Uruguay', '../imagenes/uruguay.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo C'),
(13, 'Brasil', '../imagenes/brasil.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo D'),
(14, 'Colombia', '../imagenes/colombia.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo D'),
(15, 'Costa Rica', '../imagenes/costaRica.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo D'),
(16, 'Paraguay', '../imagenes/paraguay.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

DROP TABLE IF EXISTS `partidos`;
CREATE TABLE IF NOT EXISTS `partidos` (
  `idPartido` int NOT NULL AUTO_INCREMENT,
  `fkPais1` int NOT NULL,
  `fkPais2` int NOT NULL,
  `p1GF` int NOT NULL,
  `p2GF` int NOT NULL,
  `fechaHora` datetime NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`idPartido`),
  KEY `fkPais2` (`fkPais2`),
  KEY `fkPais1` (`fkPais1`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`idPartido`, `fkPais1`, `fkPais2`, `p1GF`, `p2GF`, `fechaHora`, `estado`) VALUES
(1, 1, 2, 2, 1, '2024-06-20 21:00:00', 1),
(2, 4, 3, 0, 0, '2024-06-21 21:00:00', 1),
(5, 5, 8, 0, 0, '2024-06-22 19:00:00', 1),
(6, 7, 6, 0, 0, '2024-06-23 22:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `predicciones`
--

DROP TABLE IF EXISTS `predicciones`;
CREATE TABLE IF NOT EXISTS `predicciones` (
  `idPrediccion` int NOT NULL AUTO_INCREMENT,
  `fkPartido` int NOT NULL,
  `dni` int NOT NULL,
  `GF1` int NOT NULL,
  `GF2` int NOT NULL,
  `fechaHora` datetime NOT NULL,
  PRIMARY KEY (`idPrediccion`),
  KEY `fkPartido` (`fkPartido`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `predicciones`
--

INSERT INTO `predicciones` (`idPrediccion`, `fkPartido`, `dni`, `GF1`, `GF2`, `fechaHora`) VALUES
(3, 6, 26764251, 1, 1, '2024-06-09 18:37:00'),
(4, 2, 48229271, 1, 3, '2024-06-09 19:08:04'),
(5, 1, 48229271, 4, 0, '2024-06-09 19:08:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `dni` int NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `nombre`, `apellido`) VALUES
(46736648, 'santiago', 'exposito'),
(26764251, 'santiago', 'gonzalez'),
(48229271, 'PITITO', 'GRANDE');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `fkPais1` FOREIGN KEY (`fkPais1`) REFERENCES `paises` (`idPais`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fkPais2` FOREIGN KEY (`fkPais2`) REFERENCES `paises` (`idPais`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `predicciones`
--
ALTER TABLE `predicciones`
  ADD CONSTRAINT `fkPartido` FOREIGN KEY (`fkPartido`) REFERENCES `partidos` (`idPartido`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
