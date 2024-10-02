-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2024 a las 23:22:46
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `g160_db__tienda_celulares`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_orden` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id`, `id_producto`, `id_orden`, `cantidad`, `precio`, `fecha`) VALUES
(1, 1, 1, 1, 799.99, '0000-00-00'),
(2, 2, 1, 1, 499.99, '0000-00-00'),
(3, 3, 2, 1, 699.99, '0000-00-00'),
(4, 4, 3, 1, 999.99, '0000-00-00'),
(5, 5, 4, 1, 899.99, '0000-00-00'),
(6, 1, 5, 3, 2399.97, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_de_pedido`
--

CREATE TABLE `orden_de_pedido` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `total_del_pedido` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `orden_de_pedido`
--

INSERT INTO `orden_de_pedido` (`id`, `id_usuario`, `fecha`, `total_del_pedido`) VALUES
(1, 1, '2024-09-15', 1299.97),
(2, 2, '2024-09-16', 699.99),
(3, 3, '2024-09-16', 1199.99),
(4, 4, '2024-09-17', 999.99),
(5, 5, '2024-09-17', 1499.95);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `bateria` int(11) DEFAULT NULL,
  `pantalla` float DEFAULT NULL,
  `camara` int(11) DEFAULT NULL,
  `almacenamiento` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `descripcion_card` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `modelo`, `marca`, `bateria`, `pantalla`, `camara`, `almacenamiento`, `descripcion`, `descripcion_card`) VALUES
(1, 'Galaxy S21', 'Samsung', 4000, 6.2, 64, 128, 'Smartphone de alta gama con cámara de 64 MP y batería de larga duración.', 'Samsung Galaxy S21: 6.2\", 64 MP'),
(2, 'iPhone 12', 'Apple', 2815, 6.1, 12, 64, 'iPhone con rendimiento excepcional y diseño elegante.', 'iPhone 12: 6.1\", 12 MP'),
(3, 'Pixel 5', 'Google', 4080, 6, 16, 128, 'Smartphone con excelente cámara y software optimizado.', 'Google Pixel 5: 6.0\", 16 MP'),
(4, 'OnePlus 9', 'OnePlus', 4500, 6.55, 48, 256, 'Teléfono con carga rápida y cámara de 48 MP.', 'OnePlus 9: 6.55\", 48 MP'),
(5, 'Xperia 5 II', 'Sony', 4000, 6.1, 12, 128, 'Smartphone con enfoque en multimedia y audio.', 'Sony Xperia 5 II: 6.1\", 12 MP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre_de_usuario` varchar(200) NOT NULL,
  `contraseña` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `email` varchar(255) NOT NULL,
  `codigo_postal` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre_de_usuario`, `contraseña`, `nombre`, `apellido`, `email`, `codigo_postal`, `direccion`) VALUES
(1, 'jdoe', 'contraseñaSegura123', 'John', 'Doe', 'jdoe@example.com', 10001, '123 Elm St, Springfield'),
(2, 'maryj', 'contraseñaSegura456', 'Mary', 'Johnson', 'maryj@example.com', 10002, '456 Oak St, Springfield'),
(3, 'clopez', 'contraseñaSegura789', 'Carlos', 'Lopez', 'clopez@example.com', 10003, '789 Pine St, Springfield'),
(4, 'anita.m', 'contraseñaSegura321', 'Ana', 'Martínez', 'anita.m@example.com', 10004, '321 Maple St, Springfield'),
(5, 'luigi.f', 'contraseñaSegura654', 'Luigi', 'Fernández', 'luigi.f@example.com', 10005, '654 Cedar St, Springfield');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_orden` (`id_orden`);

--
-- Indices de la tabla `orden_de_pedido`
--
ALTER TABLE `orden_de_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre_de_usuario` (`nombre_de_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `orden_de_pedido`
--
ALTER TABLE `orden_de_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`id_orden`) REFERENCES `orden_de_pedido` (`id`);

--
-- Filtros para la tabla `orden_de_pedido`
--
ALTER TABLE `orden_de_pedido`
  ADD CONSTRAINT `orden_de_pedido_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
