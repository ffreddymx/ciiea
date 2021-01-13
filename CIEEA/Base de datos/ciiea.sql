-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-11-2020 a las 04:41:03
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

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
  `No.Actividad` int(10) NOT NULL,
  `Nombre_Actividad` varchar(50) NOT NULL,
  `Calificaciones` int(20) NOT NULL,
  `No.Alumno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1077016524, 1660795590, 'Alec Edgardo Hernández Cornelio'),
(1743575876, 1147491308, 'Alec Edgardo Hernández Cornelio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `No_Asistencia` int(10) NOT NULL,
  `No_Alumno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `Id_Grupo` int(10) NOT NULL,
  `Nombre_Grupo` varchar(30) NOT NULL,
  `Turno` varchar(30) NOT NULL,
  `Id_Maestro` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`Id_Grupo`, `Nombre_Grupo`, `Turno`, `Id_Maestro`) VALUES
(892024469, 'Sele', 'Vespertino', 760238978),
(1628892557, 'Sele', 'Vespertino', 1572967428),
(1840064069, 'Sele', 'Vespertino', 803085176);

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
(21, 'Cieea', 'alec_cornelio3@gmail.com', '12345678'),
(66, 'Paco', 'alec_hernandez1999@gmail.com', '12345'),
(74, 'Cieea', 'alec_cornelio3@gmail.com', '12345678'),
(85, 'Valeria', 'Valecita_cornelio3@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `Nombre` varchar(30) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Id_Maestro` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`Nombre`, `Correo`, `Password`, `Id_Maestro`) VALUES
('Tutoriales', 'sheylamar93@gmail.com', 'LUNA1', 12),
('Alec Edgardo Hernandez Corneli', 'alec_cornelio3@gmail.com', 'LUNA2', 43),
('Alec Edgardo Hernandez Corneli', 'sheylamar93@gmail.com', 'pokemon', 4),
('', '', '$2y$10$Q8PrnbeD5PVSlkBPAwbtIOA', 0),
('', '', '$2y$10$1TCP1mnONAKRWn7kDXA2CuT', 0),
('Aleccito', 'alec_cornelio3@gmail.com', '1234567', 7);

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
  ADD PRIMARY KEY (`No.Actividad`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`No_Alumno`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`No_Asistencia`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`Id_Bitacora`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`Id_Grupo`);

--
-- Indices de la tabla `inicio de sesión`
--
ALTER TABLE `inicio de sesión`
  ADD PRIMARY KEY (`Id_Login`);

--
-- Indices de la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`Id_Maestro`);

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
  MODIFY `No.Actividad` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `No_Alumno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1743575877;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `No_Asistencia` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `Id_Bitacora` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `Id_Grupo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1840064070;

--
-- AUTO_INCREMENT de la tabla `inicio de sesión`
--
ALTER TABLE `inicio de sesión`
  MODIFY `Id_Login` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `Id_Maestro` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `reporte`
--
ALTER TABLE `reporte`
  MODIFY `Folio_Reporte` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
