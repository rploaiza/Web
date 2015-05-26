-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-05-2015 a las 01:50:15
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `webapp_26_05_15db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloques`
--

CREATE TABLE IF NOT EXISTS `bloques` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `posicion` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bloques`
--

INSERT INTO `bloques` (`id`, `nombre`, `descripcion`, `posicion`, `estado`) VALUES
(1, 'Ficha de Inscripción', 'Inscribete <a href="#">aqui..</a>', 'derecha', '1'),
(2, 'Videos', '<iframe width="200" height="150" src="https://www.youtube.com/embed/19iiGyxzs8Y" frameborder="0" allowfullscreen></iframe>', 'izquierda', '1'),
(3, '', 'Desarrollado por @rploaiza | rploaiza@utpl.edu.ec', 'pie', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Conferencias`
--

CREATE TABLE IF NOT EXISTS `Conferencias` (
  `idConferencias` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `lugar` varchar(45) DEFAULT NULL,
  `hora` datetime DEFAULT NULL,
  `horaf` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Conferencias`
--

INSERT INTO `Conferencias` (`idConferencias`, `nombre`, `lugar`, `hora`, `horaf`) VALUES
(1, 'Conferencia 1', 'Auditorio 1', '2015-05-26 08:00:00', '2015-05-26 10:00:00'),
(2, 'Conferencia 2', 'Auditorio 1', '2015-05-26 11:00:00', '2015-05-26 13:00:00'),
(3, 'Conferencia 3', 'Auditorio 2', '2015-05-26 08:00:00', '2015-05-26 10:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ConferenciasPersonas`
--

CREATE TABLE IF NOT EXISTS `ConferenciasPersonas` (
  `idConferencias` int(11) NOT NULL,
  `cedula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ConferenciasPersonas`
--

INSERT INTO `ConferenciasPersonas` (`idConferencias`, `cedula`) VALUES
(1, 11111111),
(1, 1104263908);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cursos`
--

CREATE TABLE IF NOT EXISTS `Cursos` (
  `idCursos` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `costo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Cursos`
--

INSERT INTO `Cursos` (`idCursos`, `nombre`, `costo`) VALUES
(1, 'Innovación', '120'),
(2, 'Desarrollo', '110'),
(3, 'Emprendimiento', '125');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CursosPersonas`
--

CREATE TABLE IF NOT EXISTS `CursosPersonas` (
  `cedula` int(11) NOT NULL,
  `idCursos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `CursosPersonas`
--

INSERT INTO `CursosPersonas` (`cedula`, `idCursos`) VALUES
(11111111, 2),
(1104263908, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estado`
--

CREATE TABLE IF NOT EXISTS `Estado` (
  `idEstado` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Estado`
--

INSERT INTO `Estado` (`idEstado`, `estado`) VALUES
(1, 'Ausente'),
(2, 'Presente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Inscripciones`
--

CREATE TABLE IF NOT EXISTS `Inscripciones` (
  `idInscripciones` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL,
  `costo` decimal(20,0) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Inscripciones`
--

INSERT INTO `Inscripciones` (`idInscripciones`, `tipo`, `costo`) VALUES
(1, 'Estudiante', '60'),
(2, 'Expositor', '50'),
(3, 'Organizador', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Instituto`
--

CREATE TABLE IF NOT EXISTS `Instituto` (
  `idInstituto` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `descuentos` double DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Instituto`
--

INSERT INTO `Instituto` (`idInstituto`, `nombre`, `direccion`, `descuentos`) VALUES
(1, 'UTPL', 'San Cayetano', 0.1),
(2, 'UNL', 'La Argelia', 0),
(3, 'Espol', 'Quito', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `menu`) VALUES
(1, 'Home'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Personas`
--

CREATE TABLE IF NOT EXISTS `Personas` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `Correo` varchar(45) DEFAULT NULL,
  `idInstituto` int(11) NOT NULL,
  `idInscripciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `Personas`
--

INSERT INTO `Personas` (`cedula`, `nombre`, `apellido`, `direccion`, `Correo`, `idInstituto`, `idInscripciones`) VALUES
(11111111, 'Luis', 'Chalan', 'San Cayetano', 'lcchalan@utpl.edu.ec', 2, 2),
(1104263908, 'Roberth', 'Loaiza', 'La Tebaida', 'rploaiza@utpl.edu.ec', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bloques`
--
ALTER TABLE `bloques`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Conferencias`
--
ALTER TABLE `Conferencias`
  ADD PRIMARY KEY (`idConferencias`);

--
-- Indices de la tabla `ConferenciasPersonas`
--
ALTER TABLE `ConferenciasPersonas`
  ADD PRIMARY KEY (`idConferencias`,`cedula`);

--
-- Indices de la tabla `Cursos`
--
ALTER TABLE `Cursos`
  ADD PRIMARY KEY (`idCursos`);

--
-- Indices de la tabla `CursosPersonas`
--
ALTER TABLE `CursosPersonas`
  ADD PRIMARY KEY (`cedula`,`idCursos`);

--
-- Indices de la tabla `Estado`
--
ALTER TABLE `Estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `Inscripciones`
--
ALTER TABLE `Inscripciones`
  ADD PRIMARY KEY (`idInscripciones`);

--
-- Indices de la tabla `Instituto`
--
ALTER TABLE `Instituto`
  ADD PRIMARY KEY (`idInstituto`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `Personas`
--
ALTER TABLE `Personas`
  ADD PRIMARY KEY (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bloques`
--
ALTER TABLE `bloques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Conferencias`
--
ALTER TABLE `Conferencias`
  MODIFY `idConferencias` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Cursos`
--
ALTER TABLE `Cursos`
  MODIFY `idCursos` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Estado`
--
ALTER TABLE `Estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Inscripciones`
--
ALTER TABLE `Inscripciones`
  MODIFY `idInscripciones` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `Instituto`
--
ALTER TABLE `Instituto`
  MODIFY `idInstituto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
