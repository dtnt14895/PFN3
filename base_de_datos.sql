-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-08-2023 a las 01:37:25
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `university`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `us_id` int NOT NULL AUTO_INCREMENT,
  `us_name` varchar(20)  NOT NULL,
  `us_lastname` varchar(20)  NOT NULL,
  `us_dni` varchar(11) NOT NULL,
  `us_addres` varchar(50) NOT NULL,
  `us_birth` date NOT NULL,
  `us_email` varchar(25)  NOT NULL,
  `us_password` varchar(80) NOT NULL,
  `us_permiso` int NOT NULL,
  `us_status` bit(1) NOT NULL,
  PRIMARY KEY (`us_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`us_id`, `us_name`, `us_lastname`, `us_dni`, `us_addres`, `us_birth`, `us_email`, `us_password`, `us_permiso`, `us_status`) VALUES
(1, 'Admin', 'Administrator', '1234567890', 'Calle#1', '1990-01-01', 'admin@admin.com', '123qwe', 1, b'1'),
(2, 'John', 'Doe', '9876543210', 'Calle Profesor #1', '1975-01-15', 'profesor1@gmail.com', '123qwe', 2, b'1'),
(5, 'Alice', 'Williams', '7890123456', 'Calle Alumno #4', '2002-03-05', 'alumno1@gmail.com', '123qwe', 3, b'1')


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

DROP TABLE IF EXISTS `materia`;
CREATE TABLE IF NOT EXISTS `materia` (
  `ma_id` int NOT NULL AUTO_INCREMENT,
  `ma_nombre` varchar(50)  NOT NULL,
  `ma_profesor` int DEFAULT NULL,
  PRIMARY KEY (`ma_id`),
  KEY `materia_usuario_idprofesor` (`ma_profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`ma_id`, `ma_nombre`, `ma_profesor`) VALUES
(1, 'Programación en Python', 2),
(2, 'Bases de Datos', 3),
(3, 'Desarrollo Web', 4),
(4, 'Seguridad Informática', 2),
(5, 'Redes de Computadoras', 4),
(6, 'Matemáticas Avanzadas', NULL),
(7, 'Historia del Arte', NULL),
(8, 'Inteligencia Artificial', 2),
(9, 'Diseño de Interfaces', 2),
(10, 'Sistemas Operativos', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seleccion`
--

DROP TABLE IF EXISTS `seleccion`;
CREATE TABLE IF NOT EXISTS `seleccion` (
  `se_id` int NOT NULL AUTO_INCREMENT,
  `se_alumno` int NOT NULL,
  `se_materia` int NOT NULL,
  `se_nota` int DEFAULT NULL,
  `se_mensaje` text ,
  PRIMARY KEY (`se_id`),
  KEY `seleccion_materia_idmateria` (`se_materia`),
  KEY `seleccion_usuario_id_alumno` (`se_alumno`)
) ENGINE=InnoDB AUTO_INCREMENT=72 ;

--
-- Volcado de datos para la tabla `seleccion`
--

INSERT INTO `seleccion` (`se_id`, `se_alumno`, `se_materia`, `se_nota`, `se_mensaje`) VALUES
(52, 5, 1, 87, 'Bien hecho en la asignatura de Python.'),
(53, 6, 2, 72, 'Sigue estudiando las bases de datos.'),
(54, 7, 3, 0, ''),
(55, 8, 4, 80, 'Buen enfoque en seguridad informática.'),
(56, 9, 5, 0, 'Participación baja en clase.'),
(57, 10, 5, 88, ''),
(58, 5, 7, 0, ' La nota se encuentra pendiente.'),
(59, 6, 8, 75, 'Interesante proyecto de inteligencia artificial.'),
(60, 7, 5, 82, 'Buenas mejoras en el diseño de interfaces.'),
(61, 8, 10, 0, 'Comprende bien los sistemas operativos. La nota se está evaluando.'),
(62, 5, 3, 78, 'Progreso constante en la materia.'),
(63, 6, 5, 0, ''),
(64, 7, 8, 96, 'Muestra un gran dominio del desarrollo web.'),
(65, 8, 7, 0, 'Rechazado. El enfoque en historia del arte no cumple con los requisitos.'),
(66, 9, 8, 0, 'Sigue refinando tus diseños de interfaces.'),
(67, 10, 3, 91, 'Excelente trabajo en el proyecto de IA.'),
(68, 6, 10, 0, 'Baja comprensión de los sistemas operativos. La nota está pendiente.'),
(69, 6, 1, 75, 'Estás progresando en programación.'),
(70, 7, 2, 0, ''),
(71, 10, 3, 86, 'Buena presentación en seguridad informática.');


-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_materia_calificacion`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_materia_calificacion`;
CREATE TABLE IF NOT EXISTS `vista_materia_calificacion` (
`se_id` int
,`se_alumno` int
,`us_name` varchar(41)
,`se_materia` int
,`ma_nombre` varchar(50)
,`se_nota` int
,`se_mensaje` text
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_materia_profe_alumno`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_materia_profe_alumno`;
CREATE TABLE IF NOT EXISTS `vista_materia_profe_alumno` (
`ma_id` int
,`ma_nombre` varchar(50)
,`ma_profesor_id` int
,`us_name` varchar(41)
,`cantidad` bigint
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_profesor_materia`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_profesor_materia`;
CREATE TABLE IF NOT EXISTS `vista_profesor_materia` (
`us_id` int
,`us_name` varchar(20)
,`us_email` varchar(25)
,`us_addres` varchar(50)
,`us_birth` date
,`materias` text
,`materia_id` text
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_materia_calificacion`
--
DROP TABLE IF EXISTS `vista_materia_calificacion`;

DROP VIEW IF EXISTS `vista_materia_calificacion`;
CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `vista_materia_calificacion`  AS SELECT `seleccion`.`se_id` AS `se_id`, `seleccion`.`se_alumno` AS `se_alumno`, concat(`usuario`.`us_name`,' ',`usuario`.`us_lastname`) AS `us_name`, `seleccion`.`se_materia` AS `se_materia`, `materia`.`ma_nombre` AS `ma_nombre`, `seleccion`.`se_nota` AS `se_nota`, `seleccion`.`se_mensaje` AS `se_mensaje` FROM ((`seleccion` left join `usuario` on((`seleccion`.`se_alumno` = `usuario`.`us_id`))) left join `materia` on((`seleccion`.`se_materia` = `materia`.`ma_id`)))  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_materia_profe_alumno`
--
DROP TABLE IF EXISTS `vista_materia_profe_alumno`;

DROP VIEW IF EXISTS `vista_materia_profe_alumno`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vista_materia_profe_alumno`  AS SELECT `m`.`ma_id` AS `ma_id`, `m`.`ma_nombre` AS `ma_nombre`, `m`.`ma_profesor` AS `ma_profesor_id`, concat(`u`.`us_name`,' ',`u`.`us_lastname`) AS `us_name`, count(`s`.`se_materia`) AS `cantidad` FROM ((`materia` `m` left join `seleccion` `s` on((`m`.`ma_id` = `s`.`se_materia`))) left join `usuario` `u` on((`m`.`ma_profesor` = `u`.`us_id`))) GROUP BY `m`.`ma_id`  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_profesor_materia`
--
DROP TABLE IF EXISTS `vista_profesor_materia`;

DROP VIEW IF EXISTS `vista_profesor_materia`;
CREATE ALGORITHM=UNDEFINED  SQL SECURITY DEFINER VIEW `vista_profesor_materia`  AS SELECT `usuario`.`us_id` AS `us_id`, `usuario`.`us_name` AS `us_name`, `usuario`.`us_email` AS `us_email`, `usuario`.`us_addres` AS `us_addres`, `usuario`.`us_birth` AS `us_birth`, group_concat(`materia`.`ma_nombre` separator ', ') AS `materias`, group_concat(`materia`.`ma_id` separator ', ') AS `materia_id` FROM (`usuario` left join `materia` on((`materia`.`ma_profesor` = `usuario`.`us_id`))) WHERE (`usuario`.`us_permiso` = 2) GROUP BY `usuario`.`us_id`  ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_usuario_idprofesor` FOREIGN KEY (`ma_profesor`) REFERENCES `usuario` (`us_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `seleccion`
--
ALTER TABLE `seleccion`
  ADD CONSTRAINT `seleccion_materia_idmateria` FOREIGN KEY (`se_materia`) REFERENCES `materia` (`ma_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seleccion_usuario_id_alumno` FOREIGN KEY (`se_alumno`) REFERENCES `usuario` (`us_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
