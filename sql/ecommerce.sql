-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2019 a las 23:08:09
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `contenido` varchar(250) NOT NULL,
  `fecha_publicacion` datetime NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `contenido`, `fecha_publicacion`, `id_producto`, `id_usuario`) VALUES
(1, 'muy contento con el producto', '2019-05-12 00:00:00', 4, 1),
(2, 'WRTEWRTWERTWE', '2019-05-14 21:16:49', 0, 5),
(3, 'ertwertwertwert', '2019-05-14 21:29:51', 5, 10),
(4, 'hola', '2019-05-14 21:30:26', 5, 9),
(5, 'que giuapo', '2019-05-14 21:31:37', 9, 5),
(6, 'reocmiendo este telefono', '2019-05-14 22:51:16', 7, 4),
(12, 'sdfsadfasdfsad', '2019-05-15 18:54:21', 10, 4),
(13, 'el mejor portatil en cuanto a hardware pero el precio es desorbitado', '2019-05-18 18:17:11', 15, 5),
(14, 'Un terminal legendario, el mejor de su Ã©poca, a pesar su escasa memoria ram fue un terminal que marco un antes y un despuÃ©s en la genreracion de los smartphones.', '2019-05-25 12:48:26', 16, 5),
(15, 'Un portatil muy bueno, pero el precio es desorbitado. no lo recomiendo.', '2019-05-25 18:22:33', 11, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `pago` enum('Credito','Debito','Bitcoin','Paypal') NOT NULL,
  `ciudad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `usuario`, `contrasena`, `email`, `direccion`, `pago`, `ciudad`) VALUES
(1, 'daniel', 'lulciuc', 'razz', 'c6ed319ce99df33f3f7998f23935fcb4477d54ad', 'razvan-lulciuc@gmail.com', 'Avenida de Madrid N15 2B', 'Credito', 'Zaragoza'),
(4, 'juan', 'juan', 'juan', '0f3fde0103dd44077c040215a2fabd09a097aecc', 'juan@gmail.com', 'Calle Italia N88 2A', 'Credito', 'Madrid'),
(5, 'daniel', 'lulciuc', 'daniel', '0f3fde0103dd44077c040215a2fabd09a097aecc', 'razvan-lulciuc@hotmail.es', 'Calle Santander N5 1Izq', 'Credito', 'Huesca'),
(6, 'daniel', 'lulciuc', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'daniel98@gmail.com', '', 'Credito', 'Mordor'),
(7, 'pedro', 'remiro', 'pedrito', '4410d99cefe57ec2c2cdbd3f1d5cf862bb4fb6f8', 'pedrito@gmail.com', '', 'Credito', 'Bilbao'),
(8, 'sara', 'martinez', 'sara98', 'dea04453c249149b5fc772d9528fe61afaf7441c', 'sara@gmail.com', '', 'Credito', 'Salou');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
