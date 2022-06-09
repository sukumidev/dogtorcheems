-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-06-2022 a las 18:24:37
-- Versión del servidor: 10.5.12-MariaDB
-- Versión de PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id18947108_dogtorcheems`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id_cita` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `fechacita` date NOT NULL,
  `datetimeUnico` datetime NOT NULL,
  `servicio_id` int(11) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id_cita`, `cliente_id`, `fechacita`, `datetimeUnico`, `servicio_id`, `active`) VALUES
(1, 1, '2022-05-25', '2022-05-25 08:00:00', 3, 1),
(3, 1, '2022-05-25', '2022-05-25 14:00:00', 2, 1),
(5, 1, '2022-05-27', '2022-05-27 16:00:00', 4, 1),
(9, 1, '2022-05-25', '2022-05-25 13:00:00', 1, 1),
(10, 1, '2022-05-25', '2022-05-25 16:30:00', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `email`, `nombre`, `apellidos`, `telefono`, `password`, `active`) VALUES
(1, 'usagianonimo@gmail.com', 'Usagi', 'Anonimo', '3344115566', '12345678', 1),
(8, 'rctvane@gmail.com', 'El', 'Xokas', '3222778712', '123456', 1),
(9, 'rctvane@gmail.com', 'El Xocas', 'anonimo', '3222778712', '12345678', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `ID_empleado` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `apellidos` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permisos` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefono` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `puesto` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nss` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechanacimiento` date DEFAULT NULL,
  `iniciolabores` date DEFAULT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`ID_empleado`, `username`, `password`, `nombre`, `apellidos`, `permisos`, `telefono`, `puesto`, `nss`, `fechanacimiento`, `iniciolabores`, `active`) VALUES
(1, 'admin', 'admin', 'Admin', 'Muy chido', 'Admin', '3344115566', 'Administrador', '12345678910', '1998-08-24', '2022-05-23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(11) NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_horario`, `hora`) VALUES
(1, '08:00:00'),
(2, '08:30:00'),
(3, '09:00:00'),
(4, '09:30:00'),
(5, '10:00:00'),
(6, '10:30:00'),
(7, '11:00:00'),
(8, '11:30:00'),
(9, '12:00:00'),
(10, '12:30:00'),
(11, '13:00:00'),
(12, '13:30:00'),
(13, '14:00:00'),
(14, '14:30:00'),
(15, '15:00:00'),
(16, '15:30:00'),
(17, '16:00:00'),
(18, '16:30:00'),
(19, '17:00:00'),
(20, '17:30:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_clientes`
--

CREATE TABLE `login_clientes` (
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_empleados`
--

CREATE TABLE `login_empleados` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `permisos` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `login_empleados`
--

INSERT INTO `login_empleados` (`id`, `username`, `password`, `permisos`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `preciounit` float NOT NULL,
  `inventario` int(11) NOT NULL,
  `imglink` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `nombre`, `categoria`, `preciounit`, `inventario`, `imglink`, `active`) VALUES
(1, 'juguete pelotas', 'Juguetes', 129, 1, 'https://http2.mlstatic.com/D_NQ_NP_655864-MLM47717331264_092021-V.webp', 0),
(2, 'Premios Nupec Relax Treats 180g', 'Premios', 71, 2, 'https://http2.mlstatic.com/D_NQ_NP_837463-MLM44154306783_112020-V.webp', 1),
(3, 'Plato Y Dispensador Croqueta Y Agua', 'Accesorios', 350, 3, 'https://http2.mlstatic.com/D_Q_NP_872624-MLM31926643569_082019-AB.webp\r\n', 1),
(4, 'Jaula Para Hamster', 'Habitat', 300, 4, 'https://http2.mlstatic.com/D_NQ_NP_651143-MLM48366111836_112021-V.webp', 1),
(5, 'El Xocas', 'Ninguna', 1234, 2, '', 0),
(6, 'El Xokas', 'Ninguna', 1234, 2, 'https://fotografias-neox.atresmedia.com/clipping/cmsimages02/2021/07/08/EAC707BC-19B6-44D2-98E8-43CC85B63ADE/69.jpg', 0),
(7, 'Juguete 3 pelotas de tenis con sonido', 'Juguetes', 100, 12, 'https://http2.mlstatic.com/D_NQ_NP_942387-MLM45685866560_042021-V.webp', 1),
(8, 'Juguete Peluche Cachorros Perros Mascotas Sonido Chillón', 'Juguetes', 90, 5, 'https://http2.mlstatic.com/D_NQ_NP_902273-MLM46638073510_072021-V.webp', 1),
(9, 'Alimento Para Perros Premios Soft Chewy Sabor Pollo Hill\'s', 'Premio', 150, 10, 'https://http2.mlstatic.com/D_NQ_NP_940139-MLM46120599560_052021-V.webp', 1),
(10, 'Botana Para Perro Dog Chow Galleta De Pollo', 'Pre', 75, 15, 'https://http2.mlstatic.com/D_NQ_NP_839438-MLM43428236350_092020-V.webp', 1),
(11, 'Plato Para Perro Plegable Plato Silicon Para Gato Plegable', 'Accesorios', 115, 3, 'https://http2.mlstatic.com/D_NQ_NP_703542-MLM40246150216_122019-W.webp', 1),
(12, 'Collar Correa Perro Cascabel Raza Pequeña', 'Accesorios', 85, 20, 'https://http2.mlstatic.com/D_NQ_NP_604087-MLM49266018693_032022-W.webp', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipos` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `costo` float NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `nombre`, `tipos`, `costo`, `active`) VALUES
(1, 'Consulta veterinaria', 'Clínico', 200, 0),
(2, 'Consulta veterinaria a domicilio', 'Clínico', 300, 0),
(3, 'Corte', 'Estilista', 200, 1),
(4, 'Consulta veterinario', 'clinico', 300, 0),
(5, 'Con', 'Estilista', 500, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id_cita`),
  ADD UNIQUE KEY `datetimeUnico` (`datetimeUnico`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `servicio_id` (`servicio_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`ID_empleado`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `login_clientes`
--
ALTER TABLE `login_clientes`
  ADD KEY `email` (`email`);

--
-- Indices de la tabla `login_empleados`
--
ALTER TABLE `login_empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `ID_empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `login_empleados`
--
ALTER TABLE `login_empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
