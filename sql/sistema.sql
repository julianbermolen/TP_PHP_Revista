-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2016 a las 22:26:47
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_articulo` int(11) NOT NULL,
  `titulo` varchar(25) NOT NULL,
  `subtitulo` varchar(50) NOT NULL,
  `texto` text,
  `id_seccion` char(3) DEFAULT NULL,
  `coordenadas` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `titulo`, `subtitulo`, `texto`, `id_seccion`, `coordenadas`) VALUES
(1, 'nuevas motos', 'motos todo terreno', 'esto es un texto de prueba', 'mot', 'pb=!1m14!1m8!1m3!1d13124.463111942572!2d-58.5372425!3d-34.6770273!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x120f9d4493ecddd6!2sRoque+Simone+3965%2C+Tablada%2C+Buenos+Aires%2C+Argentina!5e0!3m2!1ses!2sar!4v1463873320951" width="600" height="450" frameborder="0" style="border:0'),
(2, 'La zorra de la semana', 'como cada semana les traemos la zorra de la semana', 'texto de prueba pajero', 'zrr', 'pb=!1m14!1m8!1m3!1d13124.463111942572!2d-58.5372425!3d-34.6770273!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x120f9d4493ecddd6!2sRoque+Simone+3965%2C+Tablada%2C+Buenos+Aires%2C+Argentina!5e0!3m2!1ses!2sar!4v1463873320951" width="600" height="450" frameborder="0" style="border:0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `calle` varchar(60) NOT NULL,
  `numero_calle` varchar(6) NOT NULL,
  `descripcion_localidad` varchar(50) NOT NULL,
  `cod_prov` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `id_edicion` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edicion`
--

CREATE TABLE `edicion` (
  `id_edicion` int(11) NOT NULL,
  `id_publicacion` int(11) DEFAULT NULL,
  `precio` decimal(4,2) DEFAULT NULL,
  `precios` decimal(4,2) DEFAULT NULL,
  `tapa` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `descripcion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `descripcion`) VALUES
(0, 'inactivo'),
(1, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL,
  `id_articulo` int(11) DEFAULT NULL,
  `path` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_prov` char(3) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `id_publicacion` int(11) NOT NULL,
  `nombre_publicacion` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`id_publicacion`, `nombre_publicacion`) VALUES
(1, 'revista porno'),
(2, 'revista Fierros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(2) NOT NULL,
  `descripcion` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `descripcion`) VALUES
(1, 'contenidista'),
(2, 'lector');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `id_seccion` char(3) NOT NULL,
  `id_publicacion` int(11) NOT NULL,
  `nombre` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`id_seccion`, `id_publicacion`, `nombre`) VALUES
('aut', 2, 'autos'),
('mot', 2, 'motos'),
('pts', 1, 'topless'),
('zrr', 1, 'zorras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcion`
--

CREATE TABLE `suscripcion` (
  `id_suscripcion` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `inicio` date NOT NULL,
  `fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cod_rol` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `clave`, `nombre`, `cod_rol`) VALUES
(1, 'ncardozo19@gmail.com', 'nico', '1234', '2'),
(2, 'julianbermolen@gmail.com', '123', 'julian', '2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `edicion`
--
ALTER TABLE `edicion`
  ADD PRIMARY KEY (`id_edicion`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id_publicacion`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`id_seccion`,`id_publicacion`);

--
-- Indices de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  ADD PRIMARY KEY (`id_suscripcion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `edicion`
--
ALTER TABLE `edicion`
  MODIFY `id_edicion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `suscripcion`
--
ALTER TABLE `suscripcion`
  MODIFY `id_suscripcion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
