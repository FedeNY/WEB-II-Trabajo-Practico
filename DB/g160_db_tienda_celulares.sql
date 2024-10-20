-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2024 a las 20:40:48
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
-- Base de datos: `g160_db_tienda_celulares`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `brand` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`brand`) VALUES
('apple'),
('google'),
('motorola'),
('samsung'),
('sony'),
('xiaomi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_phone`
--

CREATE TABLE `order_phone` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `purchase_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `img` varchar(250) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `camera` double DEFAULT NULL,
  `system` varchar(30) DEFAULT NULL,
  `screen` double DEFAULT NULL,
  `brand` varchar(60) NOT NULL,
  `gamma` varchar(10) DEFAULT NULL,
  `price` double NOT NULL,
  `offer` int(11) NOT NULL,
  `offer_price` double DEFAULT NULL,
  `stock` tinyint(1) NOT NULL,
  `quota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `img`, `name`, `description`, `camera`, `system`, `screen`, `brand`, `gamma`, `price`, `offer`, `offer_price`, `stock`, `quota`) VALUES
(65, 'https://ar.celulares.com/fotos/sony-xperia-xa1-ultra-46672-g-alt.jpg', 'Motorola G4 (Editado)', 'Motorola G4 (Editado): Un smartphone que combina rendimiento y diseño elegante. Perfecto para el usuario moderno, con una pantalla brillante y batería de larga duración, ideal para disfrutar de tus aplicaciones y redes sociales. Es un dispositivo confiable y accesible que se adapta a tus necesidades diaria', 12, 'Android 12', 6.5, 'motorola', 'high', 1500, 20, 1200, 0, 6),
(66, 'https://yuhmak.vtexassets.com/arquivos/ids/176628-800-auto?v=638315011422600000&width=800&height=auto&aspect=true', 'Motorola G10', 'Motorola G10: Un dispositivo accesible y funcional, ideal para quienes buscan calidad sin gastar de más. Con una cámara sorprendente y un diseño elegante, este teléfono ofrece todo lo que necesitas para mantenerte conectado. Perfecto para usuarios que valoran la funcionalidad y el rendimiento en su día a día.', 48, 'Android 11', 6.5, 'motorola', 'medium', 250, 20, 200, 1, 6),
(67, 'https://yuhmak.vtexassets.com/arquivos/ids/176628-800-auto?v=638315011422600000&width=800&height=auto&aspect=true', 'Motorola G30', 'Motorola G30: Potente y versátil, diseñado para adaptarse a las necesidades diarias de cualquier usuario. Su cámara de alta resolución te permitirá capturar momentos increíbles, mientras que su rendimiento rápido garantiza una experiencia fluida en todas tus aplicaciones. Un excelente equilibrio entre precio y calidad.', 64, 'Android 10', 6.7, 'motorola', 'medium', 320, 0, 0, 1, 0),
(68, 'https://yuhmak.vtexassets.com/arquivos/ids/176628-800-auto?v=638315011422600000&amp;width=800&amp;height=auto&amp;aspect=true', 'Motorola G50 reeem', 'Motorola G50: Un teléfono con características avanzadas y un rendimiento excepcional para un uso cotidiano. Equipado con tecnología 5G, este dispositivo te permite navegar y transmitir contenido a altas velocidades. Además, su batería duradera asegura que estés siempre conectado, dondequiera que vayas.', 12, 'iOS', 6.1, 'motorola', 'high', 450, 15, 382.5, 0, 612),
(69, 'https://yuhmak.vtexassets.com/arquivos/ids/176628-800-auto?v=638315011422600000&width=800&height=auto&aspect=true', 'Motorola Edge', 'Motorola Edge: Destaca por su pantalla envolvente y tecnología de vanguardia, ideal para los amantes del multimedia. Con un rendimiento excepcional y una cámara de alta calidad, este smartphone es perfecto para quienes buscan una experiencia visual envolvente. Disfruta de tus series y juegos como nunca antes.', 16, 'Android 12', 6.5, 'motorola', 'high', 600, 0, 0, 1, 12),
(70, 'https://yuhmak.vtexassets.com/arquivos/ids/176628-800-auto?v=638315011422600000&width=800&height=auto&aspect=true', 'Motorola G100', 'Motorola G100: Smartphone completo que ofrece una gran batería y cámaras de calidad, perfecto para cualquier ocasión. Su diseño elegante y funcional permite un uso intuitivo, mientras que sus potentes especificaciones garantizan un rendimiento excepcional en todas las tareas diarias. Ideal para usuarios exigentes.', 108, 'Android 12', 6.8, 'motorola', 'medium', 700, 10, 630, 1, 6),
(76, 'https://celularesindustriales.com.ar/wp-content/uploads/Captura-de-pantalla-2024-07-30-111615.png', 'Sony Xperia 10 II', 'Sony Xperia 10 II: Ofrece una experiencia multimedia superior con su pantalla de 21:9 y excelente calidad de sonido. Con un diseño estilizado, es perfecto para ver películas y jugar. Su cámara te ayudará a capturar cada momento, haciendo de este smartphone una excelente elección para usuarios multimedia.', 24, 'Android 12', 6.5, 'sony', 'medium', 500, 15, 425, 1, 6),
(77, 'https://celularesindustriales.com.ar/wp-content/uploads/Captura-de-pantalla-2024-07-30-111615.png', 'Sony Xperia 5 III', 'Sony Xperia 5 III: Compacto y poderoso, ideal para quienes buscan una cámara de alta calidad en un formato pequeño. Su diseño elegante y su gran rendimiento permiten disfrutar de aplicaciones y juegos sin problemas. Perfecto para quienes desean un dispositivo que no comprometa en calidad y portabilidad.', 16, 'Android 11', 6.5, 'sony', 'medium', 750, 0, 0, 1, 0),
(78, 'https://celularesindustriales.com.ar/wp-content/uploads/Captura-de-pantalla-2024-07-30-111615.png', 'Sony Xperia 1 III', 'Sony Xperia 1 III: Un teléfono insignia con una pantalla espectacular y capacidades fotográficas excepcionales. Ideal para creadores de contenido y amantes de la tecnología, su diseño y funcionalidad se adaptan a tus necesidades diarias. Captura fotos y videos de calidad profesional con facilidad.', 48, 'Android 12', 6.5, 'sony', 'medium', 1000, 20, 800, 1, 6),
(79, 'https://celularesindustriales.com.ar/wp-content/uploads/Captura-de-pantalla-2024-07-30-111615.png', 'Sony Xperia Pro', 'Sony Xperia Pro: Diseñado para los creadores de contenido, con características avanzadas para fotografía y video. Su pantalla de alta calidad y su rendimiento excepcional lo convierten en la herramienta perfecta para profesionales. Experimenta un control completo sobre tus proyectos creativos y captura cada detalle.', 12, 'iOS', 6.1, 'sony', 'high', 1300, 0, 0, 0, 12),
(80, 'https://celularesindustriales.com.ar/wp-content/uploads/Captura-de-pantalla-2024-07-30-111615.png', 'Sony Xperia L4', 'Sony Xperia L4: Smartphone asequible que combina un diseño atractivo con características funcionales para el día a día. Su cámara y rendimiento son ideales para usuarios que buscan un dispositivo confiable y práctico. Perfecto para navegar en internet y estar conectado con tus seres queridos.', 108, 'Android 12', 6.5, 'sony', 'low', 400, 10, 360, 1, 612),
(81, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTacsXdVD-sVueu43wzV5ZOytcNeRxhglbQgg&s', 'iPhone 13', 'iPhone 13: Innovador y poderoso, con una cámara impresionante y un rendimiento de alto nivel para cualquier usuario. Su diseño elegante y fácil de usar ofrece una experiencia fluida. Ideal para quienes desean un smartphone de última generación que mantenga su relevancia en el competitivo mercado.', NULL, 'iOS 15', 6.1, 'apple', 'high', 1200, 10, 1080, 1, 6),
(82, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTacsXdVD-sVueu43wzV5ZOytcNeRxhglbQgg&s', 'iPhone 13 Pro', 'iPhone 13 Pro: Alta gama con funcionalidades avanzadas, ideal para los que buscan lo mejor en tecnología móvil. Su cámara profesional y pantalla Super Retina hacen que cada foto y video sea espectacular. Un dispositivo que combina rendimiento y estilo, perfecto para usuarios exigentes.', 12, 'iOS 15', 6.1, 'apple', 'high', 1400, 0, 0, 1, 12),
(83, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTacsXdVD-sVueu43wzV5ZOytcNeRxhglbQgg&s', 'iPhone 12', 'iPhone 12: Un dispositivo equilibrado, potente y con un diseño moderno que sigue siendo relevante en el mercado actual. Su cámara y rendimiento son ideales para el uso diario, mientras que su tecnología avanzada asegura una experiencia fluida y agradable. Perfecto para quienes buscan calidad a buen precio.', 12, 'iOS 15', 6.1, 'apple', 'medium', 1000, 15, 850, 1, 6),
(84, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTacsXdVD-sVueu43wzV5ZOytcNeRxhglbQgg&s', 'iPhone SE', 'iPhone SE: Compacto y potente, perfecto para quienes desean un iPhone a un precio accesible sin comprometer calidad. Su diseño clásico y su gran rendimiento lo convierten en una excelente opción para usuarios que buscan funcionalidad en un formato pequeño. Ideal para la vida cotidiana y redes sociales.', 12, 'iOS 15', 6.1, 'apple', 'medium', 600, 0, 0, 0, 0),
(85, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTacsXdVD-sVueu43wzV5ZOytcNeRxhglbQgg&s', 'iPhone 11', 'iPhone 11: Ideal para quienes buscan rendimiento y buena cámara en un smartphone, a un precio competitivo. Su diseño atractivo y funcionalidad completa son perfectos para el uso diario. Con un rendimiento excepcional, este dispositivo se adapta a todas tus necesidades y se destaca entre la competencia.', 12, 'iOS 15', 6.1, 'apple', 'medium', 800, 20, 640, 1, 12),
(87, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcQXZADzvQ2wROpBJorTpawSatsTV1k47pqg&s', 'Funciona o No funciona', 'Funciona o No funciona: Dispositivo que brinda opciones para quienes buscan una experiencia única en el mundo tecnológico. Ideal para quienes desean experimentar diferentes funciones en un solo lugar. Este smartphone ofrece versatilidad y características para satisfacer a todos los usuarios.', 12, 'Android 12', 6.5, 'xiaomi', 'high', 1, 0, 0, 0, 6),
(88, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcQXZADzvQ2wROpBJorTpawSatsTV1k47pqg&s', 'Funciona o No funciona', 'Funciona o No funciona: Dispositivo que brinda opciones para quienes buscan una experiencia única en el mundo tecnológico. Ideal para quienes desean experimentar diferentes funciones en un solo lugar. Este smartphone ofrece versatilidad y características para satisfacer a todos los usuarios.', 16, 'iOS 11', 6.1, 'apple', 'medium', 2, 3, 0.06, 0, 6),
(89, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVoATh1TnhwtXss-ewVGvyxgE0jrtvPfboiA&s', 'Samsung Galaxy S21', 'Smartphone de última generación con pantalla AMOLED y cámara triple.', 64, 'Android 11', 6.2, 'samsung', 'high', 799.99, 10, 719.99, 1, 0),
(90, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVoATh1TnhwtXss-ewVGvyxgE0jrtvPfboiA&s', 'Samsung Galaxy Note 20', 'Phablet con S-Pen y cámara profesional.', 108, 'Android 11', 6.7, 'samsung', 'high', 999.99, 15, 849.99, 1, 6),
(91, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVoATh1TnhwtXss-ewVGvyxgE0jrtvPfboiA&s', 'Samsung Galaxy A52', 'Smartphone económico con buena cámara y pantalla.', 64, 'Android 11', 6.5, 'samsung', 'medium', 349.99, 5, 329.99, 1, 12),
(92, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVoATh1TnhwtXss-ewVGvyxgE0jrtvPfboiA&s', 'Samsung Galaxy M32', 'Teléfono inteligente con batería de larga duración.', 64, 'Android 11', 6.4, 'samsung', 'medium', 279.99, 0, 279.99, 1, 0),
(93, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVoATh1TnhwtXss-ewVGvyxgE0jrtvPfboiA&s', 'Samsung Galaxy Z Flip 3', 'Teléfono plegable con diseño innovador.', 12, 'Android 11', 6.7, 'samsung', 'high', 999.99, 20, 799.99, 1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `img_profile` varchar(250) DEFAULT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(60) NOT NULL,
  `rol` varchar(10) NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `img_profile`, `name`, `email`, `password`, `rol`) VALUES
(1, 'https://plus.unsplash.com/premium_photo-1661405578751-dc9d663710bd?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8YWRtaW58ZW58MHx8MHx8fDA%3D', 'admin', 'fede1782015@hotmail.com.ar', '$2y$10$k53x7DbJXWlm1I.eU5A81evQBZ6TDOKm97SUYMw6aC3GaNByYdKES', 'admin'),
(3, 'https://images.unsplash.com/photo-1663544093605-31a537e5afe5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fGZ1bGwlMjBoZCUyMHdhbGxwYXBlcnxlbnwwfHwwfHx8MA%3D%3D', 'Soila', 'soila@hotmail.com.ar', '$2y$10$jEMrq6zRWttgWK84H9fhkOnDXd/H7yaD5pH2B6BlipkcYNzhRV8j2', 'normal'),
(9, 'https://cdn-icons-png.flaticon.com/512/3736/3736502.png', 'Ema', 'ema178@hotmail.com', '$2y$10$2znfLe33HOW1g5Vui7SyieRu6JxDXZ3teHy0iO581B0RtrGUtR/oq', 'normal'),
(10, 'https://olympusv2.gg/cloud-tags-loop.svg', 'EmaNube', 'ema1728@hotmail.com', '$2y$10$aZ8MwsVaOcpDA4OYd8yW9uadlk7nvsyHfyzSyRFn7nbB1IUpS.eLC', 'normal');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD UNIQUE KEY `brand` (`brand`);

--
-- Indices de la tabla `order_phone`
--
ALTER TABLE `order_phone`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `order_phone`
--
ALTER TABLE `order_phone`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `order_phone`
--
ALTER TABLE `order_phone`
  ADD CONSTRAINT `order_phone_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
