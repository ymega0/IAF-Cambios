-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2019 a las 06:39:38
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pos2`
--
CREATE DATABASE IF NOT EXISTS `pos2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pos2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `alumno_id` int(11) NOT NULL,
  `nombre` text,
  `apellido_paterno` text,
  `fecha_nacimiento` date DEFAULT NULL,
  `lugar_nacimiento` text,
  `nacionalidad` text,
  `curp` text,
  `domicili_particular` text,
  `entre_calles` text,
  `municipio` text,
  `estado` text,
  `codigo_postal` text,
  `tutor` text,
  `genero` text,
  `telefono` int(11) DEFAULT NULL,
  `idcarrera` int(11) DEFAULT NULL,
  `nivel_educativo` text,
  `grado` text,
  `grupo` text,
  `matricula_interna` text,
  `matricual_oficial` text,
  `estatus` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
--
--

INSERT INTO `alumno` (`alumno_id`, `nombre`, `apellido_paterno`, `fecha_nacimiento`, `lugar_nacimiento`, `nacionalidad`, `curp`, `domicilio_particular`, `entre_calles`, `municipio`, `estado`, `codigo_postal`, `tutor`, `genero`, `telefono`, `nivel_educativo`, `grado`, `grupo`, `matricula_interna`, `matricula_oficial`, `estatus`) VALUES


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `idcarrera` int(11) NOT NULL COMMENT 'Id de las carreras que se encuentran dentro de las escuelas',
  `nombre` text COMMENT 'Nombre de las carreras que se encuentran en la escuela',
  `cuenta_ingreso` text,
  `ciclo_escolar` text,
  `idescuela` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `idmatria` int(11) NOT NULL,
  `nombre` text,
  `modalidad` text,
  `curso` date DEFAULT NULL,
  `turno` text,
  `grado` text,
  `grupo` text,
  `semestre` text,
  `profesor` text,
  `calificacion` float DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `idpago` int(11) NOT NULL,
  `concepto` text,
  `costo` float DEFAULT NULL,
  `carrera` int(11) DEFAULT NULL,
  `alumno_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `idescuela` int(11) NOT NULL,
  `escuela` text,
  `clave` text,
  `telefono` int(11) DEFAULT NULL,
  `municipio` text,
  `direccion` text,
  `persona_cargo` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) DEFAULT NULL,
  `nombre` text,
  `usuario` text,
  `password` text,
  `perfil` text,
  `foto` text,
  `estado` int(11) DEFAULT NULL,
  `ultimo_login` text,
  `fecha` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/img/usuarios/admin/116.jpg', 1, '2019-06-11 13:03:31', '2019-06-11 13:03:31'),
(57, 'Juan Fernando Urrego', 'juan', '$2a$07$asxx54ahjppf45sd87a5auwRi.z6UsW7kVIpm0CUEuCpmsvT2sG6O', 'Vendedor', 'vistas/img/usuarios/juan/582.jpg', 1, '2018-02-06 16:58:50', '2019-05-22 22:54:05'),
(58, 'Julio Gómez', 'julio', '$2a$07$asxx54ahjppf45sd87a5auQhldmFjGsrgUipGlmQgDAcqevQZSAAC', 'Especial', 'vistas/img/usuarios/julio/100.png', 1, '2018-02-06 17:09:22', '2018-02-06 16:09:22'),
(59, 'Ana Gonzalez', 'ana', '$2a$07$asxx54ahjppf45sd87a5auLd2AxYsA/2BbmGKNk2kMChC3oj7V0Ca', 'Vendedor', 'vistas/img/usuarios/ana/260.png', 1, '2017-12-26 19:21:40', '2017-12-26 18:21:40');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`alumno_id`),
  ADD KEY `alumno` (`idcarrera`);

--
-- Indices de la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD PRIMARY KEY (`idcarrera`),
  ADD KEY `carrera` (`idescuela`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idmatria`),
  ADD KEY `Fk_Materia_Alumno_idx` (`id_alumno`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idpago`),
  ADD KEY `Fk_Pagos_idx` (`alumno_id`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`idescuela`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrera`
--
ALTER TABLE `carrera`
  MODIFY `idcarrera` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de las carreras que se encuentran dentro de las escuelas';

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `idescuela` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno` FOREIGN KEY (`idcarrera`) REFERENCES `carrera` (`idcarrera`);

--
-- Filtros para la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD CONSTRAINT `carrera` FOREIGN KEY (`idescuela`) REFERENCES `sede` (`idescuela`);

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `Fk_Materia_Alumno` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`alumno_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `Fk_Pagos` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`alumno_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
