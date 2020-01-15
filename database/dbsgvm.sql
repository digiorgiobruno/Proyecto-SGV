-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2019 a las 16:30:24
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsgvm`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `numeroventa` int(11) NOT NULL,
  `idproducto` int(11) NOT NULL,
  `nombreproducto` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombreusuario` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` datetime(6) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` float NOT NULL,
  `preciounitario` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `numeroventa`, `idproducto`, `nombreproducto`, `nombreusuario`, `imagen`, `fecha`, `cantidad`, `subtotal`, `preciounitario`) VALUES
(1, 1, 2, 'Computadora', 'test1', 'computadora.jpg', '2019-06-20 00:00:00.000000', 1, 10000, 10000),
(2, 2, 1, 'Cebolla', 'test1', 'cebolla.jpg', '0000-00-00 00:00:00.000000', 1, 12.3, 12.3),
(3, 3, 2, 'Computadora', 'test1', 'computadora.jpg', '0000-00-00 00:00:00.000000', 1, 10000, 10000),
(4, 4, 3, 'Celular', 'test1', 'celular.jpg', '2019-06-11 17:51:02.000000', 1, 3500, 3500),
(5, 4, 1, 'Cebolla', 'test1', 'cebolla.jpg', '2019-06-11 17:51:02.000000', 1, 12.3, 12.3),
(6, 5, 1, 'Cebolla', 'test1', 'cebolla.jpg', '2019-06-11 17:51:49.000000', 1, 12.3, 12.3),
(7, 6, 2, 'Computadora', 'test1', 'computadora.jpg', '2019-06-11 19:57:00.000000', 2, 20000, 10000),
(8, 7, 1, 'Cebolla', 'prueba1', 'cebolla.jpg', '2019-06-11 21:37:57.000000', 1, 12.3, 12.3),
(9, 7, 2, 'Computadora', 'prueba1', 'computadora.jpg', '2019-06-11 21:37:57.000000', 1, 10000, 10000),
(10, 8, 2, 'Computadora', 'prueba3', 'computadora.jpg', '2019-06-11 21:46:07.000000', 1, 10000, 10000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `precio` double NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `imagen`, `precio`, `cantidad`) VALUES
(1, 'Cebolla', 'Cebolla morada', 'cebolla.jpg', 12.3, 10),
(2, 'Computadora', 'Pc portatil', 'computadora.jpg', 10000, 10),
(3, 'Celular', 'Éste es un celular ', 'celular.jpg', 3500, 10),
(4, 'pelota', 'esta es una pelota', '186238_cojin-de-microperlas-balon-de-futbol-D_NQ_NP_997822-MLM25751199314_072017-Q.jpg', 100, 0),
(5, 'fideos', 'Fideos economicos de 1kg', '512241_fideos-favorita-mostachol-500gr-por-unidad-D_NQ_NP_639118-MLA28330474807_102018-Q.jpg', 24, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuario`
--

CREATE TABLE `tusuario` (
  `User` varchar(20) NOT NULL,
  `Name` varchar(15) DEFAULT NULL,
  `Mail` varchar(15) DEFAULT NULL,
  `Pass` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tusuario`
--

INSERT INTO `tusuario` (`User`, `Name`, `Mail`, `Pass`) VALUES
('admin', 'Bruno Di Giorgi', 'bruno@gmail.com', '202cb962ac59075b964b07152d234b70'),
('bruno92', 'as', 'cas@gmail.com', '2cfd4560539f887a5e420412b370b361'),
('franco12', 'franco', 'franco@gmail.co', '202cb962ac59075b964b07152d234b70'),
('loquillo', 'locos', 'cas@gmail.com', '202cb962ac59075b964b07152d234b70'),
('prueba1', 'ju', 'juan@gmail.com', '202cb962ac59075b964b07152d234b70'),
('Prueba2', '1212', 'sdasd@gmail.com', '202cb962ac59075b964b07152d234b70'),
('prueba3', 'ju', 'aas@gmail.com', '202cb962ac59075b964b07152d234b70'),
('test1', 'test', 'test@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tusuario`
--
ALTER TABLE `tusuario`
  ADD PRIMARY KEY (`User`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
