-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-06-2024 a las 15:24:23
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
  `nombrePais` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL,
  `bandera` varchar(500) COLLATE utf8mb3_unicode_ci NOT NULL,
  `pts` int NOT NULL,
  `victorias` int NOT NULL,
  `empates` int NOT NULL,
  `derrotas` int NOT NULL,
  PRIMARY KEY (`idPais`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`idPais`, `nombrePais`, `bandera`, `pts`, `victorias`, `empates`, `derrotas`) VALUES
(1, 'Argentina', '..\\imagenes\\argentina.png', 0, 0, 0, 0),
(2, 'Canadá', '../imagenes/canada.png', 0, 0, 0, 0),
(3, 'Chile', '../imagenes/chile.png', 0, 0, 0, 0),
(4, 'Perú', '../imagenes/peru.png', 0, 0, 0, 0),
(5, 'Ecuador', '../imagenes/ecuador.png', 0, 0, 0, 0),
(6, 'Jamaica', '../imagenes/jamaica.png', 0, 0, 0, 0),
(7, 'México', '../imagenes/mexico.png', 0, 0, 0, 0),
(8, 'Venezuela', '../imagenes/venezuela.png', 0, 0, 0, 0),
(9, 'Bolivia', '../imagenes/bolivia.png', 0, 0, 0, 0),
(10, 'Estados Unidos', '../imagenes/estadosUnidos.png', 0, 0, 0, 0),
(11, 'Panamá', '../imagenes/panama.png', 0, 0, 0, 0),
(12, 'Uruguay', '../imagenes/uruguay.png', 0, 0, 0, 0),
(13, 'Brasil', '../imagenes/brasil.png', 0, 0, 0, 0),
(14, 'Colombia', '../imagenes/colombia.png', 0, 0, 0, 0),
(15, 'Costa Rica', '../imagenes/costaRica.png', 0, 0, 0, 0),
(16, 'Paraguay', '../imagenes/paraguay.png', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `dni` int NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contraseña` varchar(50) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`dni`, `nombre`, `apellido`, `email`, `contraseña`) VALUES
(46736648, 'santiago', 'exposito', 'strixer1605@gmail.com', '1'),
(12345678, 'juan', 'cito', 'juan1234@gmail.com', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
