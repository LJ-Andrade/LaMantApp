-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 08-06-2016 a las 17:24:06
-- Versión del servidor: 5.5.41-log
-- Versión de PHP: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `lamantapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team`
--

CREATE TABLE IF NOT EXISTS `team` (
`team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `team_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `national_team` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `club` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `goals` int(11) NOT NULL DEFAULT '0',
  `wins` int(11) NOT NULL DEFAULT '0',
  `looses` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `team`
--

INSERT INTO `team` (`team_id`, `user_id`, `team_name`, `national_team`, `club`, `goals`, `wins`, `looses`) VALUES
(1, 1, 'LosVenosos', 'Belgica', 'Chelsea', 0, 0, 0),
(3, 199, 'MadRoberts', 'Uruguay', 'Juventus', 0, 0, 0),
(5, 200, 'Las Fashions', 'Mowbos Landia', 'Moncho Cloub', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `creation_date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=201 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `user`, `password`, `name`, `status`, `last_login`, `creation_date`) VALUES
(1, 'jav', '12', 'Leandro', '3', '2016-06-07 07:55:01', '2016-05-28'),
(2, 'test', '1', 'test', '0', '2016-06-07 07:55:05', '2016-06-06'),
(199, 'aris', '12', 'Arielito', '1', '2016-06-08 02:11:21', '0000-00-00'),
(200, 'viole', '12', 'Violeta', '2', '2016-06-08 03:11:03', '0000-00-00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `team`
--
ALTER TABLE `team`
 ADD PRIMARY KEY (`team_id`), ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `team`
--
ALTER TABLE `team`
MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=201;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `team`
--
ALTER TABLE `team`
ADD CONSTRAINT `team_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
