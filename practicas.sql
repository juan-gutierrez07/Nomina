-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2019 a las 03:24:47
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `codigo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`codigo`, `nombre`) VALUES
('1', 'ing. sistemas'),
('2', 'ing. civil'),
('3', 'aux. enfermeria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contrato`
--

CREATE TABLE `contrato` (
  `numero` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `codigo_cargo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_empleado` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contrato`
--

INSERT INTO `contrato` (`numero`, `fecha_inicio`, `fecha_fin`, `codigo_cargo`, `codigo_empleado`) VALUES
(2, '2019-10-24', '2019-12-24', '2', '102050'),
(3, '2019-10-24', NULL, '1', '102030'),
(4, '2019-10-24', NULL, '3', '102040');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos trabajador`
--

CREATE TABLE `datos trabajador` (
  `precio_hora` int(9) NOT NULL,
  `codigo_empleado` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `arl` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `eps` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fondo de pensiones` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial de liquidacion`
--

CREATE TABLE `historial de liquidacion` (
  `numero` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `sueldo` int(20) NOT NULL,
  `descuentos` int(20) NOT NULL,
  `codigo_empleado` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incapacidad o licencia`
--

CREATE TABLE `incapacidad o licencia` (
  `numero` int(3) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` enum('incapacidad','licencia') COLLATE utf8_spanish_ci NOT NULL,
  `codigo_empleado` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion de datos`
--

CREATE TABLE `informacion de datos` (
  `codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `valor` int(10) NOT NULL,
  `codigo_empleado` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `tipo` enum('arl','eps','fondo de pensiones') COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad de vacaciones`
--

CREATE TABLE `novedad de vacaciones` (
  `codigo_empleado` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `codigo` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedades`
--

CREATE TABLE `novedades` (
  `numero` int(100) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_empleado` char(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `dni` char(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_empleado` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `celular` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`dni`, `nombres`, `apellidos`, `direccion`, `codigo_empleado`, `celular`) VALUES
('1070626808', 'cesar estiven', 'mesa medrano', 'mza 12a casa 4', '102030', '3114906018'),
('1111193174', 'jhireth zaray', 'gonzalez flores', 'calle 8 # 5-87', '102040', '3154747232'),
('1234567890', 'nesly dayana', 'gonzalez flores', 'calle 8 # 5-87', '102050', '3114906019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trayecto de contratacion`
--

CREATE TABLE `trayecto de contratacion` (
  `Nombre de la empresa` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `funciones` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `codigo_empleado` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `contraseña` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `nombre`, `contraseña`) VALUES
('admin', 'todos', '12345'),
('desarrollo', 'cesar', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `contrato_personas_fk` (`codigo_empleado`),
  ADD KEY `contrato_cargo_fk` (`codigo_cargo`);

--
-- Indices de la tabla `datos trabajador`
--
ALTER TABLE `datos trabajador`
  ADD PRIMARY KEY (`codigo_empleado`);

--
-- Indices de la tabla `historial de liquidacion`
--
ALTER TABLE `historial de liquidacion`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `historial_de_liquidacion_personas_fk` (`codigo_empleado`);

--
-- Indices de la tabla `incapacidad o licencia`
--
ALTER TABLE `incapacidad o licencia`
  ADD PRIMARY KEY (`codigo_empleado`);

--
-- Indices de la tabla `informacion de datos`
--
ALTER TABLE `informacion de datos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `arl_datos_trabajador_fk` (`codigo_empleado`);

--
-- Indices de la tabla `novedad de vacaciones`
--
ALTER TABLE `novedad de vacaciones`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `novedad_de_vacaciones_personas_fk` (`codigo_empleado`);

--
-- Indices de la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `novedades_personas_fk` (`codigo_empleado`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`codigo_empleado`),
  ADD UNIQUE KEY `personas_un` (`dni`);

--
-- Indices de la tabla `trayecto de contratacion`
--
ALTER TABLE `trayecto de contratacion`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `trayecto_de_contratacion_personas_fk` (`codigo_empleado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contrato`
--
ALTER TABLE `contrato`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `historial de liquidacion`
--
ALTER TABLE `historial de liquidacion`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `novedades`
--
ALTER TABLE `novedades`
  MODIFY `numero` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `trayecto de contratacion`
--
ALTER TABLE `trayecto de contratacion`
  MODIFY `numero` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contrato`
--
ALTER TABLE `contrato`
  ADD CONSTRAINT `contrato_cargo_fk` FOREIGN KEY (`codigo_cargo`) REFERENCES `cargo` (`codigo`),
  ADD CONSTRAINT `contrato_personas_fk` FOREIGN KEY (`codigo_empleado`) REFERENCES `personas` (`codigo_empleado`);

--
-- Filtros para la tabla `datos trabajador`
--
ALTER TABLE `datos trabajador`
  ADD CONSTRAINT `datos_trabajador_personas_fk` FOREIGN KEY (`codigo_empleado`) REFERENCES `personas` (`codigo_empleado`);

--
-- Filtros para la tabla `historial de liquidacion`
--
ALTER TABLE `historial de liquidacion`
  ADD CONSTRAINT `historial_de_liquidacion_personas_fk` FOREIGN KEY (`codigo_empleado`) REFERENCES `personas` (`codigo_empleado`);

--
-- Filtros para la tabla `incapacidad o licencia`
--
ALTER TABLE `incapacidad o licencia`
  ADD CONSTRAINT `incapacidad_o_licencia_personas_fk` FOREIGN KEY (`codigo_empleado`) REFERENCES `personas` (`codigo_empleado`);

--
-- Filtros para la tabla `informacion de datos`
--
ALTER TABLE `informacion de datos`
  ADD CONSTRAINT `arl_datos_trabajador_fk` FOREIGN KEY (`codigo_empleado`) REFERENCES `datos trabajador` (`codigo_empleado`);

--
-- Filtros para la tabla `novedad de vacaciones`
--
ALTER TABLE `novedad de vacaciones`
  ADD CONSTRAINT `novedad_de_vacaciones_personas_fk` FOREIGN KEY (`codigo_empleado`) REFERENCES `personas` (`codigo_empleado`);

--
-- Filtros para la tabla `novedades`
--
ALTER TABLE `novedades`
  ADD CONSTRAINT `novedades_personas_fk` FOREIGN KEY (`codigo_empleado`) REFERENCES `personas` (`codigo_empleado`);

--
-- Filtros para la tabla `trayecto de contratacion`
--
ALTER TABLE `trayecto de contratacion`
  ADD CONSTRAINT `trayecto_de_contratacion_personas_fk` FOREIGN KEY (`codigo_empleado`) REFERENCES `personas` (`codigo_empleado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
