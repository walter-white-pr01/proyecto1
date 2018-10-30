-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2018 a las 14:14:03
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_casal_ww`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `cat_id` int(11) NOT NULL,
  `cat_nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`cat_id`, `cat_nom`) VALUES
(1, 'Sala Multidisciplinaria'),
(2, 'Sala de Informática'),
(3, 'Taller de Cocina'),
(4, 'Despacho de Entrevista'),
(5, 'Salón de Actos'),
(6, 'Sala Reuniones'),
(7, 'Proyector Portátil'),
(8, 'Portátil'),
(9, 'Móvil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicencias`
--

CREATE TABLE `indicencias` (
  `id_incidencia` int(11) NOT NULL,
  `id_recurso` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tipo_incidencia` int(11) NOT NULL,
  `asunto` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_ini` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `indicencias`
--

INSERT INTO `indicencias` (`id_incidencia`, `id_recurso`, `id_user`, `tipo_incidencia`, `asunto`, `fecha_ini`, `fecha_fin`, `descripcion`) VALUES
(11, 1, 2, 4, 'dfgfhjklññ', '2018-10-29 00:00:00', NULL, 'fgxhghj,k.lm-_:');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurso`
--

CREATE TABLE `recurso` (
  `id_recurso` int(11) NOT NULL,
  `nom_recur` varchar(40) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci,
  `img_src` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `disponibilidad` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `recurso`
--

INSERT INTO `recurso` (`id_recurso`, `nom_recur`, `descripcion`, `img_src`, `categoria`, `disponibilidad`) VALUES
(1, 'Sala Pollos Hermanos', 'Sala multidisciplinaria con 7, pizzarra digital LED táctil. Tiene enchufes y connexion a la red de alta velocidad.\r\nEquipada on 8 altavoces Bose con la tecnología Dobly Digital Atmosfera 7.1. Tiene tambien la posibilidad de conectrar un micrófono a los altavoces.', '../images/Multidisciplinar/imagen1.jpg', 1, 0),
(2, 'Sala Bromo', 'Sala multidisciplinaria de 25m ', '../images/Multidisciplinar/imagen2.jpg', 1, 1),
(3, 'Sala Boro', 'Sala multidisciplinaria con 4 mesas 16 sillas, armario equipado con juegos de mesa y una pizarra magnética.', '../images/Multidisciplinar/imagen3.jpg', 1, 0),
(4, 'Sala Albuquerque', 'Sala multidisciplinaria con 4 mesas 16 sillas, armario equipado con juegos de mesa y una pizarra magnética.', '../images/Multidisciplinar/imagen4.jpg', 1, 1),
(5, 'Sala de informática JAVA', 'Sala de informática equipada con 50 ordenadores de ultima generación para que los alumnos puedan desarrollar las diferentes actividades', '../images/Informatica/imagen1.jpg', 2, 0),
(6, 'Sala de informatica HTML', 'Sala de informática equipada con 60 ordenadores con la que los alumnos podrán desarrollar las diferentes actividades  ', '../images/Informatica/imagen2.jpg', 2, 0),
(7, 'Salón de Actos la niña bonita', 'Salón de actos equipado con 50 sillas, escenario con cortinas, luces, extintores y armarios con diversos objetos.', '../images/Salonactos/imagen1.jpg', 5, 0),
(8, 'Despacho White', 'Despacho preparado para entrevistar, con 2 sillas para los visitantes y una para el entrevistador. Incluye cajones con material vario, dispensador de agua y varios objetos decorativos (Plantas, cuadros...)', '../images/Despachos/imagen1.jpg', 4, 0),
(9, 'Despacho Black', 'Despacho preparado para entrevistar, con 2 sillas para los visitantes y una para el entrevistador. Incluye cajones con material vario, dispensador de agua y varios objetos decorativos (Plantas, cuadros...)', '../images/Despachos/imagen2.jpg', 4, 0),
(10, 'Taller de Cocina, el orgullo Chicote', 'Preparado con 2 fogones, 1 horno de alto rendimiento, nevera industrial con gran variedad de alimentos, cajon lleno de utensilios de cocina y Maestro Chef dispuesto a probar tu comida y criticarte', '../images/Cocina/imagen1.jpg', 3, 0),
(11, 'Proyector Portátil APEMAN', '2200 lúmenes de brillo LED y resolución nativa de 800 x 480P (compatible con 1080P). Proporciona una imagen limpia y nítida en la oscuridad. Perfecto para disfrutar películas, partidos de fútbol, música, TV, juegos, etc.', '../images/Proyectores/imagen1.jpeg', 7, 0),
(12, 'Artlii Mini Proyector', 'El proyector Artlii T20 LCD consta de 50 a 130 pulgadas y cuyo formato es de 16: 9. Gracias a ello puede disfrutar de una proyección nítida y con una calidad de imagen buena y duradera. A su vez cuenta con una resolución de color muy buena.', '../images/Proyectores/imagen2.jpg', 7, 0),
(13, 'Ordenador portátil Samsung Ideapad', 'Portátl preparado con herramientas Office, equipo preparado para ver películas en HD. Capacidad de conexión a Internet', '../images/Portatiles/imagen1.jpg', 8, 0),
(14, 'Ordenador portátil Toshiba C334', 'Portátl preparado con herramientas Office, equipo preparado para ver películas en HD. Capacidad de conexión a Internet', '../images/Portatiles/imagen2.jpg', 8, 0),
(15, 'Ordenador portátil ASUS Sideways', 'Portátl preparado con herramientas Office, equipo preparado para ver películas en HD. Capacidad de conexión a Internet', '../images/Portatiles/imagen3.jpg', 8, 0),
(16, 'Teléfono Móvil SAMSUNG', 'Móvil preparado para expediciones, con 24h de Batería, 3GB RAM, pantalla de 24 pulgadas y todo lo que puedas desear. Conexión a Internet permitida', '../images/Moviles/imagen1.jpg', 9, 0),
(17, 'Teléfono Móvil Huawei', 'Móvil preparado para expediciones, con 24h de Batería, 3GB RAM, pantalla de 24 pulgadas y todo lo que puedas desear. Conexión a Internet permitida', '../images/Moviles/imagen2.png', 9, 0),
(18, 'Sala de reuniones Meta', 'Sala de reuniones equipada con una mesa de 5 metros de largo por 2 metros de ancho redondeada con wifi de alta velocidad y aire acondicionado', '../images/Salareuniones/imagen1.jpg', 6, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_recurso` int(11) DEFAULT NULL,
  `fecha_ini` datetime DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `id_user`, `id_recurso`, `fecha_ini`, `fecha_fin`) VALUES
(2, 2, 1, '2018-10-26 19:41:05', '2018-10-09'),
(3, 1, 2, '2018-10-26 17:37:54', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_incidencia`
--

CREATE TABLE `tipo_incidencia` (
  `id_tipo` int(11) NOT NULL,
  `nom_incidencia` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_incidencia`
--

INSERT INTO `tipo_incidencia` (`id_tipo`, `nom_incidencia`) VALUES
(1, 'Averiado'),
(2, 'Robo o Perdida'),
(3, 'Anomalia'),
(4, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_user`
--

CREATE TABLE `tipo_user` (
  `id_Permiso` int(11) NOT NULL,
  `permiso` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipo_user`
--

INSERT INTO `tipo_user` (`id_Permiso`, `permiso`) VALUES
(1, 'Admin'),
(2, 'Socio'),
(3, 'Tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `permisos` int(11) NOT NULL,
  `user_name` text COLLATE utf8_spanish2_ci NOT NULL,
  `user_surname` text COLLATE utf8_spanish2_ci,
  `user_mail` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `user_telf` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `user_password` text COLLATE utf8_spanish2_ci NOT NULL,
  `user_img` text COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `user`, `permisos`, `user_name`, `user_surname`, `user_mail`, `user_telf`, `user_password`, `user_img`) VALUES
(1, 'dperez', 1, 'David', 'Perez', 'd.perez@gmail.com', '666999333', '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(2, 'test', 1, 'test', 'Admin', 'test@test.com', '696699696', '81dc9bdb52d04dc20036dbd8313ed055', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indices de la tabla `indicencias`
--
ALTER TABLE `indicencias`
  ADD PRIMARY KEY (`id_incidencia`),
  ADD KEY `id_recurso` (`id_recurso`,`id_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `incinencias_ibfk_3` (`tipo_incidencia`);

--
-- Indices de la tabla `recurso`
--
ALTER TABLE `recurso`
  ADD PRIMARY KEY (`id_recurso`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_user` (`id_user`,`id_recurso`),
  ADD KEY `id_recurso` (`id_recurso`);

--
-- Indices de la tabla `tipo_incidencia`
--
ALTER TABLE `tipo_incidencia`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `tipo_user`
--
ALTER TABLE `tipo_user`
  ADD PRIMARY KEY (`id_Permiso`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user` (`user`,`user_mail`,`user_telf`),
  ADD UNIQUE KEY `user_2` (`user`,`user_mail`,`user_telf`),
  ADD UNIQUE KEY `user_3` (`user`),
  ADD UNIQUE KEY `user_mail` (`user_mail`),
  ADD UNIQUE KEY `user_telf` (`user_telf`),
  ADD KEY `permisos` (`permisos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `indicencias`
--
ALTER TABLE `indicencias`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `recurso`
--
ALTER TABLE `recurso`
  MODIFY `id_recurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_incidencia`
--
ALTER TABLE `tipo_incidencia`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_user`
--
ALTER TABLE `tipo_user`
  MODIFY `id_Permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `indicencias`
--
ALTER TABLE `indicencias`
  ADD CONSTRAINT `incinencias_ibfk_3` FOREIGN KEY (`tipo_incidencia`) REFERENCES `tipo_incidencia` (`id_tipo`),
  ADD CONSTRAINT `indicencias_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `indicencias_ibfk_2` FOREIGN KEY (`id_recurso`) REFERENCES `recurso` (`id_recurso`);

--
-- Filtros para la tabla `recurso`
--
ALTER TABLE `recurso`
  ADD CONSTRAINT `recurso_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`cat_id`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`id_recurso`) REFERENCES `recurso` (`id_recurso`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`permisos`) REFERENCES `tipo_user` (`id_Permiso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
