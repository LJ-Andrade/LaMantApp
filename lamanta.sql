-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-06-2016 a las 21:25:49
-- Versión del servidor: 5.5.41-log
-- Versión de PHP: 5.6.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `lamanta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expelled`
--

CREATE TABLE IF NOT EXISTS `expelled` (
`expelled_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `player` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `expelled`
--

INSERT INTO `expelled` (`expelled_id`, `match_id`, `team_id`, `player`) VALUES
(1, 1, 2, 'Mandingo'),
(2, 1, 1, 'Don Gato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game`
--

CREATE TABLE IF NOT EXISTS `game` (
`game_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `home_team` int(11) NOT NULL,
  `visitor_team` int(11) NOT NULL,
  `home_goal` int(11) NOT NULL,
  `visitor_goal` int(11) NOT NULL,
  `extra` tinyint(1) NOT NULL,
  `penalties` tinyint(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `game`
--

INSERT INTO `game` (`game_id`, `date`, `home_team`, `visitor_team`, `home_goal`, `visitor_goal`, `extra`, `penalties`) VALUES
(1, '2016-05-01 00:00:00', 1, 2, 5, 0, 0, 0),
(2, '2016-05-02 00:00:00', 2, 1, 2, 2, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localgame`
--

CREATE TABLE IF NOT EXISTS `localgame` (
`localgame_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `team` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `goals` int(11) NOT NULL,
  `expelled` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `final_result` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team`
--

CREATE TABLE IF NOT EXISTS `team` (
`team_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `selection` varchar(255) NOT NULL,
  `club` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `team`
--

INSERT INTO `team` (`team_id`, `name`, `user_id`, `selection`, `club`) VALUES
(1, 'cats', 1, 'Bulgaria', 'Tigre'),
(2, 'Tuviejateam', 6, 'Nigeria', 'Banfield');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `creation_date` datetime NOT NULL,
  `last_conection` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`user_id`, `user`, `password`, `name`, `email`, `creation_date`, `last_conection`) VALUES
(1, 'jav', '1212', 'Leandro', 'javzero@hotmail.com', '2016-05-31 22:06:00', '2016-06-01 01:07:07'),
(2, 'test', '1', 'Test', 'test@test.com', '2016-06-02 04:00:00', '2016-06-02 07:21:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitorgame`
--

CREATE TABLE IF NOT EXISTS `visitorgame` (
`visitorgame_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `team` varchar(255) NOT NULL,
  `goals` int(11) NOT NULL,
  `expelled` int(11) NOT NULL,
  `final_result` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `expelled`
--
ALTER TABLE `expelled`
 ADD PRIMARY KEY (`expelled_id`);

--
-- Indices de la tabla `game`
--
ALTER TABLE `game`
 ADD PRIMARY KEY (`game_id`);

--
-- Indices de la tabla `localgame`
--
ALTER TABLE `localgame`
 ADD PRIMARY KEY (`localgame_id`);

--
-- Indices de la tabla `team`
--
ALTER TABLE `team`
 ADD PRIMARY KEY (`team_id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `user` (`user`);

--
-- Indices de la tabla `visitorgame`
--
ALTER TABLE `visitorgame`
 ADD PRIMARY KEY (`visitorgame_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `expelled`
--
ALTER TABLE `expelled`
MODIFY `expelled_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `game`
--
ALTER TABLE `game`
MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `localgame`
--
ALTER TABLE `localgame`
MODIFY `localgame_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `team`
--
ALTER TABLE `team`
MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `visitorgame`
--
ALTER TABLE `visitorgame`
MODIFY `visitorgame_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
