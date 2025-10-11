-- phpMyAdmin SQL Dump
-- versión 5.2.1
--
-- Base de datos: `db_nocticia`

CREATE DATABASE IF NOT EXISTS db_nocticia;
USE db_nocticia;

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` text NOT NULL,
  `orden` int(11) NOT NULL,
  `activa` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_categoria`),
  UNIQUE KEY `orden` (`orden`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `id_noticia` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(200) NOT NULL,
  `parrafo` text NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id_noticia`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
