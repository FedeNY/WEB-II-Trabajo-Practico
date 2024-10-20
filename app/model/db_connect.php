<?php
require_once './config.php';

class ConectDB
{
    protected $db;

    public function __construct()
    {
        try {

            $this->db = new PDO(
                "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DB . ";charset=utf8",
                MYSQL_USER,
                MYSQL_PASS
            );

            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_deploy();
        } catch (PDOException $e) {

            echo "Error de conexión: " . $e->getMessage();
            exit;
        }
    }

    private function _deploy()
    {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            $sql = "
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-10-2024 a las 19:51:10
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
START TRANSACTION;
SET time_zone = '+00:00';

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Base de datos: `g160_db_prueba_tienda`

-- Estructura de tabla para la tabla `category`

CREATE TABLE `category` (
  `brand` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcado de datos para la tabla `category`

INSERT INTO `category` (`brand`) VALUES
('apple'),
('google'),
('motorola'),
('samsung'),
('sony'),
('xiaomi');

-- Estructura de tabla para la tabla `product`

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

-- Volcado de datos para la tabla `product`

INSERT INTO `product` (`id`, `img`, `name`, `description`, `camera`, `system`, `screen`, `brand`, `gamma`, `price`, `offer`, `offer_price`, `stock`, `quota`) VALUES
(65, 'https://ar.celulares.com/fotos/sony-xperia-xa1-ultra-46672-g-alt.jpg', 'Motorola G4 (Editado)', 'Motorola G4 (Editado): Un smartphone que combina rendimiento y diseño elegante. Perfecto para el usuario moderno, con una pantalla brillante y batería de larga duración, ideal para disfrutar de tus aplicaciones y redes sociales. Es un dispositivo confiable y accesible que se adapta a tus necesidades diaria', 12, 'Android 12', 6.5, 'motorola', 'high', 1500, 20, 1200, 0, 6),
(66, 'https://yuhmak.vtexassets.com/arquivos/ids/176628-800-auto?v=638315011422600000&width=800&height=auto&aspect=true', 'Motorola G10', 'Motorola G10: Un dispositivo accesible y funcional, ideal para quienes buscan calidad sin gastar de más. Con una cámara sorprendente y un diseño elegante, este teléfono ofrece todo lo que necesitas para mantenerte conectado.', 48, 'Android 11', 6.5, 'motorola', 'medium', 250, 20, 200, 1, 6),
(67, 'https://yuhmak.vtexassets.com/arquivos/ids/176628-800-auto?v=638315011422600000&width=800&height=auto&aspect=true', 'Motorola G30', 'Motorola G30: Potente y versátil, diseñado para adaptarse a las necesidades diarias de cualquier usuario. Su cámara de alta resolución te permitirá capturar momentos increíbles.', 64, 'Android 10', 6.7, 'motorola', 'medium', 320, 0, 0, 1, 0),
(68, 'https://yuhmak.vtexassets.com/arquivos/ids/176628-800-auto?v=638315011422600000&width=800&height=auto&aspect=true', 'Motorola G50 reeem', 'Motorola G50: Un teléfono con características avanzadas y un rendimiento excepcional para un uso cotidiano. Equipado con tecnología 5G, este dispositivo te permite navegar y transmitir contenido a altas velocidades.', 12, 'iOS', 6.1, 'motorola', 'high', 450, 15, 382.5, 0, 612),
(69, 'https://yuhmak.vtexassets.com/arquivos/ids/176628-800-auto?v=638315011422600000&width=800&height=auto&aspect=true', 'Motorola Edge', 'Motorola Edge: Destaca por su pantalla envolvente y tecnología de vanguardia, ideal para los amantes del multimedia.', 16, 'Android 12', 6.5, 'motorola', 'high', 600, 0, 0, 1, 12),
(70, 'https://yuhmak.vtexassets.com/arquivos/ids/176628-800-auto?v=638315011422600000&width=800&height=auto&aspect=true', 'Motorola G100', 'Motorola G100: Smartphone completo que ofrece una gran batería y cámaras de calidad, perfecto para cualquier ocasión.', 108, 'Android 12', 6.8, 'motorola', 'medium', 700, 10, 630, 1, 6),
(76, 'https://celularesindustriales.com.ar/wp-content/uploads/Captura-de-pantalla-2024-07-30-111615.png', 'Sony Xperia 10 II', 'Sony Xperia 10 II: Ofrece una experiencia multimedia superior con su pantalla de 21:9 y excelente calidad de sonido.', 24, 'Android 12', 6.5, 'sony', 'medium', 500, 15, 425, 1, 6),
(89, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTVoATh1TnhwtXss-ewVGvyxgE0jrtvPfboiA&s', 'Samsung Galaxy S21', 'Smartphone de última generación con pantalla AMOLED y cámara triple.', 64, 'Android 11', 6.2, 'samsung', 'high', 799.99, 10, 719.99, 1, 0);

-- Estructura de tabla para la tabla `user`

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `img_profile` varchar(250) DEFAULT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(60) NOT NULL,
  `rol` varchar(10) NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcado de datos para la tabla `user`

INSERT INTO `user` (`id`, `img_profile`, `name`, `email`, `password`, `rol`) VALUES
(1, 'https://plus.unsplash.com/premium_photo-1661405578751-dc9d663710bd?w=500&auto=format&fit=crop&q=60', 'admin', 'fede1782015@hotmail.com.ar', '\$2y\$10\$k53x7DbJXWlm1I.eU5A81evQBZ6TDOKm97SUYMw6aC3GaNByYdKES', 'admin');

-- Indices para tablas volcadas

ALTER TABLE `category` ADD UNIQUE KEY `brand` (`brand`);
ALTER TABLE `product` ADD PRIMARY KEY (`id`);
ALTER TABLE `user` ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `name` (`name`);

-- AUTO_INCREMENT de las tablas volcadas

ALTER TABLE `product` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
ALTER TABLE `user` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

-- Fijación de restricciones para tablas volcadas

COMMIT;

";
            $this->db->exec($sql);
        }
    }
}
