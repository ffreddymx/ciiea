-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-01-2021 a las 22:00:44
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ciiea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `idalumno` int(11) NOT NULL,
  `Tiponota` varchar(5) NOT NULL,
  `Nota` int(11) NOT NULL,
  `Actividad` varchar(200) NOT NULL,
  `idmateria` int(5) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`idalumno`, `Tiponota`, `Nota`, `Actividad`, `idmateria`, `id`) VALUES
(1077016524, 'C1', 10, 'Entrega de portafolios', 1, 4),
(1077016524, 'C1', 9, 'Entrega de 30 ejercicios del libro de matematicas', 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `No_Alumno` int(10) NOT NULL,
  `Id_Grupo` int(10) NOT NULL,
  `Nombre_Alumno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`No_Alumno`, `Id_Grupo`, `Nombre_Alumno`) VALUES
(131803856, 911369402, ''),
(1053770347, 1923549530, ''),
(1077016524, 782383045, 'Alec Edgardo Hernández Cornelio'),
(1339123371, 1098493376, ''),
(1348909993, 449754371, ''),
(1496525430, 1891825839, ''),
(1743575876, 892024469, 'Bernardo Edgardo Hernández Cornelio'),
(1743575877, 782383045, 'Efrain Ramirez Ascuaga'),
(1786126150, 1323203744, ''),
(1786126151, 782383045, 'Leonel Messi Andrade Guzman'),
(1786126152, 782383045, 'Carlos Antonio Bustamante Correa'),
(1786126154, 782383045, 'Angel de Jesus Correa Carrillo'),
(1786126155, 782383045, 'Eusebio Mendez Castillo'),
(1786126156, 782383045, 'Aristoteles Cardenas Gullen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int(10) NOT NULL,
  `idalumno` int(10) NOT NULL,
  `Tipo` varchar(20) NOT NULL,
  `Justificacion` varchar(200) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id`, `idalumno`, `Tipo`, `Justificacion`, `Fecha`) VALUES
(1, 1077016524, 'Asistio', 'sdsa', '2021-01-13'),
(2, 1743575876, 'Asistio', '', '2021-01-15'),
(3, 1743575877, 'Retardo', 'Problemas de lluvia my fuertes', '2021-01-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `Id_Bitacora` int(10) NOT NULL,
  `Nombre del tema` varchar(30) NOT NULL,
  `Descripción de actividad` varchar(30) NOT NULL,
  `Reacción` int(30) NOT NULL,
  `Fecha de inicio` date NOT NULL,
  `Fecha de termino` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `events`
--

INSERT INTO `events` (`id`, `title`, `color`, `start`, `end`) VALUES
(1, 'Entregar tareas pendientes', '#0071c5', '2021-01-01 00:00:00', '2021-01-06 00:00:00'),
(2, 'Eventos 2', '#40E0D0', '2017-08-02 00:00:00', '2017-08-03 00:00:00'),
(3, 'Doble click para editar evento', '#008000', '2017-08-03 00:00:00', '2017-08-07 00:00:00'),
(5, '', '#FF8C00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Enviar los informes ', '#FF0000', '2021-01-01 09:00:00', '2021-01-02 12:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id` int(10) NOT NULL,
  `Nombre_Grupo` varchar(30) NOT NULL,
  `Turno` varchar(30) NOT NULL,
  `Id_Maestro` int(10) NOT NULL,
  `Ciclo` varchar(10) NOT NULL,
  `id_alumno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id`, `Nombre_Grupo`, `Turno`, `Id_Maestro`, `Ciclo`, `id_alumno`) VALUES
(782383045, 'Grupo D', 'Vespertino', 85, '2019-2020', 1077016524),
(892024469, 'Grupo D', 'Matutino', 85, '2019-2020', 1743575877),
(1628892557, 'Grupo B', 'Vespertino', 1572967428, '2019-2020', 0),
(1840064069, 'Grupo C', 'Vespertino', 803085176, '2019-2020', 0),
(1840064070, 'Grupo H', 'Matutino', 0, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio de sesión`
--

CREATE TABLE `inicio de sesión` (
  `Id_Login` int(10) NOT NULL,
  `Id_Maestro` int(10) NOT NULL,
  `Correo` int(30) NOT NULL,
  `Password` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscrito`
--

CREATE TABLE `inscrito` (
  `id` int(11) NOT NULL,
  `idalumno` int(11) NOT NULL,
  `idmateria` int(11) NOT NULL,
  `Cal1` float NOT NULL,
  `Cal2` float NOT NULL,
  `Cal3` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inscrito`
--

INSERT INTO `inscrito` (`id`, `idalumno`, `idmateria`, `Cal1`, `Cal2`, `Cal3`) VALUES
(1, 1077016524, 1, 10, 0, 0),
(2, 1077016524, 2, 9, 0, 0),
(3, 1077016524, 3, 0, 0, 0),
(4, 1077016524, 4, 0, 0, 0),
(5, 1077016524, 5, 0, 0, 0),
(6, 1743575876, 1, 0, 0, 0),
(7, 1743575876, 2, 0, 0, 0),
(8, 1743575876, 3, 0, 0, 0),
(9, 1743575876, 4, 0, 0, 0),
(10, 1743575876, 5, 0, 0, 0),
(11, 1743575877, 1, 0, 0, 0),
(12, 1743575877, 2, 0, 0, 0),
(13, 1743575877, 3, 0, 0, 0),
(14, 1743575877, 4, 0, 0, 0),
(15, 1743575877, 5, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE `maestro` (
  `Id_Maestro` int(10) NOT NULL,
  `Nombre` varchar(60) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Contraseña` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `maestro`
--

INSERT INTO `maestro` (`Id_Maestro`, `Nombre`, `Correo`, `Contraseña`) VALUES
(1, 'alec', 'sheylamar93@gmail.com', 'luna23'),
(2, 'alec_cornelio3@gmail.com', '1234567', '49'),
(21, 'Cieea', 'alec_cornelio3@gmail.com', '1'),
(66, 'Paco', 'alec_hernandez1999@gmail.com', '12345'),
(74, 'Cieea', 'alec_cornelio3@gmail.com', '12345678'),
(85, 'Valeria', 'Valecita_cornelio3@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `Materia` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `Materia`) VALUES
(1, 'Español'),
(2, 'Matemáticas'),
(3, 'Ciencias Sociales'),
(4, 'Informatica'),
(5, 'Artes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `Nombre` varchar(30) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Id_Maestro` int(10) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`Nombre`, `Correo`, `Password`, `Id_Maestro`, `id`) VALUES
('Tutoriales', 'sheylamar93@gmail.com', 'LUNA1', 12, 1),
('Alec Edgardo Hernandez Corneli', 'alec_cornelio3@gmail.com', 'LUNA2', 43, 2),
('Alec Edgardo Hernandez Corneli', 'sheylamar93@gmail.com', 'pokemon', 4, 3),
('', '', '$2y$10$Q8PrnbeD5PVSlkBPAwbtIOA', 0, 4),
('', '', '$2y$10$1TCP1mnONAKRWn7kDXA2CuT', 0, 5),
('Aleccito', 'alec_cornelio3@gmail.com', '1234567', 7, 6),
('Aleccito', 'admin', 'admin', 7, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE `reporte` (
  `Folio_Reporte` int(10) NOT NULL,
  `Nombre_Reporte` varchar(30) NOT NULL,
  `Id_Grupo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`No_Alumno`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`Id_Bitacora`);

--
-- Indices de la tabla `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inicio de sesión`
--
ALTER TABLE `inicio de sesión`
  ADD PRIMARY KEY (`Id_Login`);

--
-- Indices de la tabla `inscrito`
--
ALTER TABLE `inscrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`Id_Maestro`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reporte`
--
ALTER TABLE `reporte`
  ADD PRIMARY KEY (`Folio_Reporte`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `No_Alumno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1786126157;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `Id_Bitacora` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1840064072;

--
-- AUTO_INCREMENT de la tabla `inicio de sesión`
--
ALTER TABLE `inicio de sesión`
  MODIFY `Id_Login` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inscrito`
--
ALTER TABLE `inscrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `Id_Maestro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `Folio_Reporte` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
