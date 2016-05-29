-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-05-2016 a las 21:41:43
-- Versión del servidor: 5.5.41-log
-- Versión de PHP: 5.6.13

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
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
`id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'Equipos'),
(3, 'Pedro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
`id` int(11) NOT NULL,
  `nombreeq` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dt` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `seleccion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `club` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id`, `nombreeq`, `dt`, `seleccion`, `club`) VALUES
(1, 'Los Venosos', 'Lea El Vieja', 'Bélgica', 'Chelsea'),
(2, 'MadRoberts', 'El Aris', 'Uruguay', 'Juventus'),
(3, 'LasFetas', 'Fetas', 'Colombia', 'Atletico Madrid'),
(6, 'Pochos Club', 'Adri', 'Chile', 'Manchester City');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foros`
--

CREATE TABLE IF NOT EXISTS `foros` (
`id` int(200) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descrip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad_mensajes` bigint(200) NOT NULL DEFAULT '0',
  `cantidad_temas` bigint(255) NOT NULL DEFAULT '0',
  `id_categoria` int(70) NOT NULL DEFAULT '1',
  `estado` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` bigint(255) NOT NULL,
  `user` varchar(17) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `permisos` int(1) NOT NULL DEFAULT '1',
  `activo` int(1) NOT NULL DEFAULT '0',
  `keyreg` varchar(120) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `keypass` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `new_pass` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_reg` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ultima_conexion` int(32) NOT NULL DEFAULT '0',
  `no_leidos` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `pass`, `email`, `permisos`, `activo`, `keyreg`, `keypass`, `new_pass`, `fecha_reg`, `ultima_conexion`, `no_leidos`) VALUES
(1, 'javzero', 'b7f03c069563121ecbaff8f1c7adf843', 'javzero@hotmail.com', 2, 0, '', '', '', '27/05/2016', 0, ''),
(4, 'invitado', '47b4d0c9445131dec646a489805f0f52', 'javzero1@gmail.com', 0, 0, '9d7e44e2fa15d95899670102a24c7195', '', '', '28/05/2016', 0, ''),
(5, 'lospibes', '47b4d0c9445131dec646a489805f0f52', '', 1, 0, '', '', '', '28/05/2016', 0, ''),
(6, 'Viole', 'b7f03c069563121ecbaff8f1c7adf843', 'info@studiovimana.com', 1, 1, '', '', '', '28/05/2016', 0, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `foros`
--
ALTER TABLE `foros`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `foros`
--
ALTER TABLE `foros`
MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
