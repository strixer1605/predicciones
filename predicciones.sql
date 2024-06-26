-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-06-2024 a las 23:42:10
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

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
  `nombrePais` varchar(50) NOT NULL,
  `bandera` varchar(500) NOT NULL,
  `PJ` int NOT NULL,
  `G` int NOT NULL,
  `E` int NOT NULL,
  `P` int NOT NULL,
  `GF` int NOT NULL,
  `GC` int NOT NULL,
  `DG` int NOT NULL,
  `pts` int NOT NULL,
  `grupo` varchar(20) NOT NULL,
  `estado` int DEFAULT '1',
  PRIMARY KEY (`idPais`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`idPais`, `nombrePais`, `bandera`, `PJ`, `G`, `E`, `P`, `GF`, `GC`, `DG`, `pts`, `grupo`, `estado`) VALUES
(1, 'Argentina', '../../imagenes\\argentina.png', 1, 1, 0, 0, 2, 0, 2, 3, 'Grupo A', 1),
(2, 'Canadá', '../../imagenes/canada.png', 1, 0, 0, 1, 0, 2, -2, 0, 'Grupo A', 1),
(3, 'Chile', '../../imagenes/chile.png', 1, 0, 1, 0, 0, 0, 0, 1, 'Grupo A', 1),
(4, 'Perú', '../../imagenes/peru.png', 1, 0, 1, 0, 0, 0, 0, 1, 'Grupo A', 1),
(5, 'Ecuador', '../../imagenes/ecuador.png', 1, 0, 0, 1, 1, 2, -1, 0, 'Grupo B', 1),
(6, 'Jamaica', '../../imagenes/jamaica.png', 1, 0, 0, 1, 0, 1, -1, 0, 'Grupo B', 1),
(7, 'México', '../../imagenes/mexico.png', 1, 1, 0, 0, 1, 0, 1, 3, 'Grupo B', 1),
(8, 'Venezuela', '../../imagenes/venezuela.png', 1, 1, 0, 0, 2, 1, 1, 3, 'Grupo B', 1),
(9, 'Bolivia', '../../imagenes/bolivia.png', 1, 0, 0, 1, 0, 2, -2, 0, 'Grupo C', 1),
(10, 'EU', '../../imagenes/estadosUnidos.png', 1, 1, 0, 0, 2, 0, 2, 3, 'Grupo C', 1),
(11, 'Panamá', '../../imagenes/panama.png', 1, 0, 0, 1, 1, 3, -2, 0, 'Grupo C', 1),
(12, 'Uruguay', '../../imagenes/uruguay.png', 1, 1, 0, 0, 3, 1, 2, 3, 'Grupo C', 1),
(13, 'Brasil', '../../imagenes/brasil.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo D', 1),
(14, 'Colombia', '../../imagenes/colombia.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo D', 1),
(15, 'Costa Rica', '../../imagenes/costaRica.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo D', 1),
(16, 'Paraguay', '../../imagenes/paraguay.png', 0, 0, 0, 0, 0, 0, 0, 0, 'Grupo D', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

DROP TABLE IF EXISTS `partidos`;
CREATE TABLE IF NOT EXISTS `partidos` (
  `idPartido` int NOT NULL AUTO_INCREMENT,
  `fkPais1` int NOT NULL,
  `fkPais2` int NOT NULL,
  `GF1P` int NOT NULL,
  `GF2P` int NOT NULL,
  `ganador` int NOT NULL,
  `fechaHora` datetime NOT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`idPartido`),
  KEY `fkPais2` (`fkPais2`),
  KEY `fkPais1` (`fkPais1`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`idPartido`, `fkPais1`, `fkPais2`, `GF1P`, `GF2P`, `ganador`, `fechaHora`, `estado`) VALUES
(1, 1, 2, 2, 0, 1, '2024-06-20 21:00:00', 0),
(2, 4, 3, 0, 0, 0, '2024-06-21 21:00:00', 0),
(5, 5, 8, 1, 2, 2, '2024-06-22 19:00:00', 0),
(6, 7, 6, 1, 0, 1, '2024-06-23 22:00:00', 0),
(7, 10, 9, 2, 0, 1, '2024-06-23 19:00:00', 0),
(8, 12, 11, 3, 1, 1, '2024-06-23 22:00:00', 0),
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

DROP TABLE IF EXISTS `predicciones`;
CREATE TABLE IF NOT EXISTS `predicciones` (
  `idPrediccion` int NOT NULL AUTO_INCREMENT,
  `fkPartido` int NOT NULL,
  `dni` bigint NOT NULL,
  `GF1` int NOT NULL,
  `GF2` int NOT NULL,
  `puntos` int NOT NULL,
  `puntos_suma` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`idPrediccion`),
  KEY `fkPartido` (`fkPartido`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `dni` bigint NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `puntos_totales` int NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `nombre`, `apellido`, `puntos_totales`) VALUES
(648927105384712, 'santiago', 'exposito', 0);

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
