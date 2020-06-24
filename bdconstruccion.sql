-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-06-2020 a las 19:24:18
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdconstruccion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bouchers`
--

CREATE TABLE `bouchers` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bouchers`
--

INSERT INTO `bouchers` (`id`, `order_id`, `customer_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 'img_bouchers/3fpQNNMJCp3N7d9kdMHreV8n5YgNOhRbqMp3jbQD.jpeg', '2018-11-27 19:58:46', '2018-11-27 19:58:46'),
(2, 8, 6, 'img_bouchers/JPkuVrjOPZwEDDPPuoWb0h563pS2v8bADEXPrclO.png', '2018-11-27 23:11:42', '2018-11-27 23:11:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Conjuntos', 'conjuntos', '2018-11-15 12:58:39', '2018-11-15 12:58:39'),
(2, 'Vestidos', 'vestidos', '2018-11-15 12:58:57', '2018-11-15 12:58:57'),
(3, 'Pañaleras', 'panaleras', '2018-11-15 13:00:51', '2018-11-15 13:00:51'),
(4, 'Enterizos', 'enterizos', '2018-11-15 13:01:04', '2018-11-15 13:01:04'),
(5, 'Polos', 'polos', '2018-11-15 13:02:13', '2018-11-15 13:02:13'),
(6, 'Casacas', 'casacas', '2018-11-15 13:02:32', '2018-11-15 13:02:32'),
(7, 'Chalecos', 'chalecos', '2018-11-15 13:03:52', '2018-11-15 13:03:52'),
(8, 'Calzado', 'calzado', '2018-11-15 13:04:16', '2018-11-15 13:04:16'),
(9, 'Gorros y Sombreros', 'gorros-y-sombreros', '2018-11-15 13:26:41', '2018-11-15 13:26:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colors`
--

CREATE TABLE `colors` (
  `id` int(10) NOT NULL,
  `color` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colors`
--

INSERT INTO `colors` (`id`, `color`, `created_at`, `updated_at`) VALUES
(1, '#ff0000', '2018-11-15 12:50:12', '2018-11-15 12:50:12'),
(2, '#ffff00', '2018-11-15 12:50:24', '2018-11-15 12:50:24'),
(3, '#80ff00', '2018-11-15 12:50:35', '2018-11-15 12:50:35'),
(4, '#0080c0', '2018-11-15 12:51:04', '2018-11-15 12:51:04'),
(5, '#ff8000', '2018-11-15 12:51:23', '2018-11-15 12:51:23'),
(6, '#b000b0', '2018-11-15 12:51:52', '2018-11-15 12:51:52'),
(7, '#ff80c0', '2018-11-15 12:52:08', '2018-11-15 12:52:08'),
(8, '#ffffff', '2018-11-15 12:52:30', '2018-11-15 12:52:30'),
(9, '#000000', '2018-11-15 12:52:44', '2018-11-15 12:52:44'),
(10, '#ac6a06', '2018-11-15 12:53:16', '2018-11-15 12:53:16'),
(11, '#55fdbe', '2018-11-15 12:54:28', '2018-11-15 12:54:28'),
(12, '#008000', '2018-11-15 12:55:43', '2018-11-15 12:55:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `actived` tinyint(1) NOT NULL DEFAULT '1',
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `dni` varchar(8) DEFAULT NULL,
  `celphone` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `razon_social` varchar(150) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `name`, `last_name`, `email`, `password`, `actived`, `verified`, `dni`, `celphone`, `phone`, `ruc`, `razon_social`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rodrigo', 'flores del carpio', 'floresdelcarpio.r@gmail.com', '$2y$10$jTtxZY1LgJmp0L1GH4u.Beb0kzszn8DKw9htmyoMejkV5DaGSKnr6', 1, 1, '74278033', '945708608', '064742733', NULL, NULL, 'S2DH0AqT6wkAlfXf8MkMZRbOONJdo0aoLqUMkWAJ7xUvH1EoWw0zaqtjvclf', '2018-11-15 17:41:52', '2018-11-19 21:08:19'),
(3, 'juan', 'perez', 'i1521011@continental.edu.pe', '$2y$10$tiJT8b8H5KajmW5ABZoWG.x/fHhkbYY0LO8PuchwW3yqLoA1U2nK.', 1, 1, '74278034', '945708608', '064708985', NULL, NULL, '6sFfMCuhsYmvb2K8hgVuNUXKMXcU4sOLvFI7JdwyMiXuxR4TsPJmuO80M8AI', '2018-11-15 20:35:30', '2018-11-15 20:36:30'),
(4, 'Maria', 'Perez Aguilar', 'crojasc@continental.edu.pe', '$2y$10$l1WfUYeoKyKQL/E6L.3dzOtciREAKtGTBk.iBU5BBaqGgAgoxaMTO', 1, 1, '12345678', '980787878', '123123', NULL, NULL, 'HiQd50RyGQHwpyE88slApCyj30UcTBuO66QVk9hStmQoVniB1g4l9pjViPUF', '2018-11-15 23:04:13', '2018-11-15 23:05:38'),
(5, 'Paul Tom', 'Hinostroza Fernandez', 'i1113844@continental.edu.pe', '$2y$10$OG7UCnvCsfk6q9bYkkh6ZO9Qjqqr2l00YxsLCCeqIcJ/MRu1vYGF2', 1, 1, '75980648', '990022171', '064588027', NULL, NULL, 'Kq31xlWJn3Nzituek7mphXwWRTa4XvH5gDbtSJwzRBJSGqODTlsXPC5JGPLE', '2018-11-26 23:30:48', '2018-11-26 23:32:29'),
(6, 'Milah', 'Fonseca', 'i1314900@continental.edu.pe', '$2y$10$W5BIcDkPBzk/L29bp227peasDVMyToU3ACTMjfRus03HxK4p8m7fe', 1, 1, '70041413', '922222222', NULL, NULL, NULL, '6keF8ugjaK7FaAorLdBWU7xrPETi4z0f8nJgZWKmEqNRk65eJswc06afDDpy', '2018-11-27 23:02:57', '2018-11-27 23:05:30'),
(7, 'mery', 'diaz sanchez', 'i1620674@continental.edu.pe', '$2y$10$25vaU/VSzZcQRGPigsFPDO1LMf5sZh.mcCA.pcqPbSEir57iCq0yq', 1, 1, '71756942', '992912411', NULL, NULL, NULL, 'cRNc3JTK5qhlEbZll9zJU7nbMMS84N4a0K9yiI6kGsXPtlvB9BsgcgP9TVX3', '2018-11-29 21:14:25', '2018-11-29 21:15:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer_verify`
--

CREATE TABLE `customer_verify` (
  `customer_id` int(10) NOT NULL,
  `token` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `customer_verify`
--

INSERT INTO `customer_verify` (`customer_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 'CjNKjkC86QGqOTN1R4DuZTZkk36bbdBtaBFp8rUl', '2018-11-15 17:41:52', '2018-11-15 17:41:52'),
(3, 'dTdbnLvOpvBPOR6i2AhFqS5Ak0iJwk7awkumOTqF', '2018-11-15 20:35:30', '2018-11-15 20:35:30'),
(4, 'lsWeeyIonfQzyDdeBAadJTeR1ebcRgzeGm4yE99t', '2018-11-15 23:04:13', '2018-11-15 23:04:13'),
(5, '9emKFfxgmhu6lVimO6yIVhpDcaScSijFjCLqutQD', '2018-11-26 23:30:48', '2018-11-26 23:30:48'),
(6, 'mmuM8KIcUwvzmK5zl7xDoEdeW2Z0D2adVXGBL9lb', '2018-11-27 23:02:57', '2018-11-27 23:02:57'),
(7, '5izzq9wwbVlIqREjdqJerohcoVDf3WPZOW3uXnPK', '2018-11-29 21:14:25', '2018-11-29 21:14:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) NOT NULL,
  `invoice_type_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `serie` varchar(20) DEFAULT NULL,
  `number` varchar(20) NOT NULL,
  `ruc` varchar(11) DEFAULT NULL,
  `razon_social` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_type_id`, `order_id`, `serie`, `number`, `ruc`, `razon_social`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'kENn', 'afcl', NULL, NULL, '2018-11-15 17:45:38', '2018-11-15 17:45:38'),
(3, 1, 3, 'p1Ze', 'CXWf', NULL, NULL, '2018-11-15 20:46:01', '2018-11-15 20:46:01'),
(4, 1, 4, 'RL8g', 'VN76', NULL, NULL, '2018-11-15 23:08:29', '2018-11-15 23:08:29'),
(5, 1, 5, '0X1e', 'Nomy', NULL, NULL, '2018-11-26 23:33:35', '2018-11-26 23:33:35'),
(6, 1, 6, '9BFY', 'ZyAV', NULL, NULL, '2018-11-27 18:30:21', '2018-11-27 18:30:21'),
(7, 2, 7, 'SeVU', 'BKXj', '11111111111', 'Rafael SAC', '2018-11-27 23:08:21', '2018-11-27 23:08:21'),
(8, 2, 8, 'SMVS', 'vRv3', '11111111111', 'Rafael SAC', '2018-11-27 23:09:47', '2018-11-27 23:09:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoices_types`
--

CREATE TABLE `invoices_types` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `invoices_types`
--

INSERT INTO `invoices_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Boleta', NULL, NULL),
(2, 'Factura', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dni` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_At` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name`, `last_name`, `dni`, `state_id`, `created_at`, `updated_At`) VALUES
(1, 1, NULL, NULL, NULL, 2, '2018-11-15 17:45:38', '2018-11-15 17:45:38'),
(3, 1, NULL, NULL, NULL, 7, '2018-11-15 20:46:01', '2018-11-15 20:50:09'),
(4, 4, 'Ana', 'Caceres', '12312323', 7, '2018-11-15 23:08:29', '2018-11-15 23:19:26'),
(5, 5, NULL, NULL, NULL, 1, '2018-11-26 23:33:35', '2018-11-27 18:30:52'),
(6, 5, NULL, NULL, NULL, 3, '2018-11-27 18:30:21', '2018-11-27 18:30:21'),
(7, 6, 'Rodrigo', 'Flores', '12345678', 3, '2018-11-27 23:08:21', '2018-11-27 23:08:21'),
(8, 6, 'Rodrigo', 'Flores', '12345678', 7, '2018-11-27 23:09:47', '2018-11-27 23:20:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `size` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `order_details`
--

INSERT INTO `order_details` (`id`, `product_id`, `order_id`, `quantity`, `size`, `created_at`, `updated_at`) VALUES
(1, 23, 1, 1, 'Talla 4', '2018-11-15 17:45:38', '2018-11-15 17:45:38'),
(3, 2, 3, 1, NULL, '2018-11-15 20:46:01', '2018-11-15 20:46:01'),
(4, 3, 4, 5, '6 - 9 meses', '2018-11-15 23:08:29', '2018-11-15 23:08:29'),
(5, 11, 5, 1, 'Talla 4', '2018-11-26 23:33:35', '2018-11-26 23:33:35'),
(6, 12, 6, 2, NULL, '2018-11-27 18:30:21', '2018-11-27 18:30:21'),
(7, 6, 7, 2, 'Talla 6', '2018-11-27 23:08:21', '2018-11-27 23:08:21'),
(8, 6, 8, 2, 'Talla 6', '2018-11-27 23:09:47', '2018-11-27 23:09:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(150) NOT NULL,
  `token` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `order_id` int(10) NOT NULL,
  `payment_type_id` int(10) NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `reference_code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`order_id`, `payment_type_id`, `amount`, `reference_code`, `created_at`, `updated_at`) VALUES
(1, 1, '41.50', 'L7M6cgkPsP', '2018-11-15 17:45:38', '2018-11-15 17:45:38'),
(3, 1, '139.00', 'jYkOSqtiUp', '2018-11-15 20:46:01', '2018-11-15 20:46:01'),
(4, 2, '371.25', NULL, '2018-11-15 23:08:29', '2018-11-15 23:08:29'),
(5, 2, '100.00', NULL, '2018-11-26 23:33:35', '2018-11-26 23:33:35'),
(6, 2, '210.00', NULL, '2018-11-27 18:30:21', '2018-11-27 18:30:21'),
(7, 2, '158.00', NULL, '2018-11-27 23:08:21', '2018-11-27 23:08:21'),
(8, 2, '158.00', NULL, '2018-11-27 23:09:47', '2018-11-27 23:09:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_types`
--

CREATE TABLE `payment_types` (
  `id` int(10) NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `actived` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `actived`, `created_at`, `updated_at`) VALUES
(1, 'Tarjeta de Crédito', 0, NULL, '2018-11-27 23:18:12'),
(2, 'Depósito Bancario', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `old_price` decimal(8,2) DEFAULT NULL,
  `cover_image` varchar(150) NOT NULL,
  `stock` int(10) DEFAULT NULL,
  `description` text NOT NULL,
  `features` varchar(500) DEFAULT NULL,
  `state` varchar(150) DEFAULT NULL,
  `weight` smallint(6) DEFAULT NULL,
  `category_id` int(10) NOT NULL,
  `color_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `old_price`, `cover_image`, `stock`, `description`, `features`, `state`, `weight`, `category_id`, `color_id`, `created_at`, `updated_at`) VALUES
(1, 'Vestido Rosa Tejido', '10.00', '15.00', 'img_product/OlEwRtEWOo3EgeOZW0JDD4DRht4AI4Wi9AGkBJpo.jpeg', 1, 'Vestido rosa tejido artesanalmente, detalles en lana, hipoalergenico,&nbsp;', 'Vestido tejido artesanalmente, detalles en lana.', 'Oferta', NULL, 2, 7, '2018-11-15 13:32:31', '2018-11-15 14:32:31'),
(2, 'Vestido Floreado', '129.00', NULL, 'img_product/K4XxVISJU3KR5fLneImHmD1nitegHGMOls1cXrJQ.jpeg', 4, 'Elegante diseño de flores en tela de encaje blanca, flores hechas en mostasillas amarillas, hipoalergenico.', 'Algodón, Floreado, tela encaje blanca.', 'Simple', NULL, 2, 8, '2018-11-15 13:44:39', '2018-11-15 21:46:01'),
(3, 'Conjunto Clasico de Vestir', '99.00', NULL, 'img_product/kzwoV14YIoYUBP59W6eGjwUSiHeGWesnErKsF1Mu.jpeg', 5, 'Elegante traje de vestir, para cualquier tipo de compromiso. Incluye:<br><ul><li>Pantalon</li><li>Camisa</li><li>Corbata</li><li>Tirantes</li></ul>Piezas no se venden por separado', 'Incluye 4 piezas: Camisa, Pantalón, Corbata, Tirantes', 'Nuevo', NULL, 1, 12, '2018-11-15 13:53:15', '2018-11-27 21:01:09'),
(4, 'Conjunto Bailarina', '100.00', NULL, 'img_product/dRRI4Iadk5wXMscSSrf4QmXkTvjPuehUpHITZPIA.jpeg', 4, 'Polo de algodón, hipoalergénico. Detalles en brillantina y mostacillas.&nbsp;<br>Incluye falda con recubrimiento, material gasa con brillos.<br>No se venden las piezas por separado.', 'Incluye polo y falda de bailarina, detalles en las fotografias', 'Nuevo', NULL, 1, 12, '2018-11-15 14:00:34', '2018-11-27 06:51:25'),
(5, 'Casaca Impermeable Unisex', '116.00', '125.00', 'img_product/AGLSf1ARUVJzeDPAyzVcJribvWWDYt2kaG1Jb0ig.jpeg', 5, 'Casaca unisex reversible ideal para lluvias, material impermeable.', 'Casaca impermeable, ideal para las lluvias, reversible.', 'Oferta', NULL, 6, 1, '2018-11-15 14:07:17', '2018-11-15 15:07:17'),
(6, 'Polo clasico Cuello Camisa', '79.00', NULL, 'img_product/CNVA6ZLjGNlBEYE0wZSqi7rDwIoEayNl5A21HIOR.jpeg', 8, 'Polo clásico, manga larga, cuello estilo camisa, detalles bordados', 'Hecho de algodón.', 'Simple', NULL, 5, 1, '2018-11-15 14:12:07', '2018-11-28 00:20:16'),
(7, 'Pañalera Impermeable', '150.00', NULL, 'img_product/P8ACVq58AZcQ32RMK3w5eaD6WhPT50NihubrLPCl.jpeg', 5, '<div>Color beige. Pañalera impermeable, amplio espacio dentro, incluye:</div><div>Pañalera, cambiador de bebés, porta biberón, porta accesorios, y listón <u>de adorno</u></div>', 'Color Beige. Pañalera impermeable, amplio espacio dentro, incluye:\r\nPañalera, cambiador de bebés, porta biberón, porta accesorios, y listón de adorno', 'Nuevo', NULL, 3, 10, '2018-11-15 14:29:18', '2018-11-15 15:29:18'),
(8, 'Chaleco de Vestir Elegante', '69.00', NULL, 'img_product/au8HFEy72Rap5uMwflTqxGmS2r4ouEaMWZeKvZOv.jpeg', 6, 'Color Beige. Chaleco con recubrimiento de algodón, excelente para cualquier tipo de compromiso.', 'Color Beige. Chaleco con recubrimiento de algodón.', 'Simple', NULL, 7, 10, '2018-11-15 14:43:48', '2018-11-15 15:43:48'),
(9, 'Casaca de Vestir Unisex', '100.00', NULL, 'img_product/M7FGDLGdWI7ruF8SiVxdfpSr2j1Pqiv4uIi11lxa.jpeg', 5, 'Casaca doble, unisex, detalles bordados.', 'Casaca doble, unisex, detalles bordados', 'Nuevo', NULL, 6, 1, '2018-11-15 14:51:31', '2018-11-15 15:51:31'),
(10, 'Vestido Niña. Jade con Liston', '100.00', NULL, 'img_product/b5RDeIXSJkr11GjaPa6KTtzTH8GC5jug2QZ0jhLb.jpeg', 5, 'Vestido de seda, dolor jade, detalles con mostacillas, cintura ajustable, con liston, incluye vincha de flores.', 'Hermoso vestido de seda, Detalles con mostacillas, incluye vincha de flores.', 'Simple', NULL, 2, 12, '2018-11-15 14:55:02', '2018-11-27 06:54:47'),
(11, 'Vestido Niña. Flores Rosa con Liston', '100.00', NULL, 'img_product/3U9YvFQyIaoigEsLoYpHEoCaE5ESUgbRnHGDCwdj.jpeg', 2, 'Vestido de seda, con detalles de flores en encaje, cintas y mostacillas. Incluye vincha, material de velo: Gasa', 'Vestido de seda, con detalles de flores en encaje, cintas y mostacillas. Incluye vincha.', 'Simple', NULL, 2, 12, '2018-11-15 15:00:17', '2018-11-27 21:02:31'),
(12, 'Vestido Casual Primavera', '100.00', NULL, 'img_product/SRLRQbp9NhowCwuiZ7yA63sdNQ5UiWDz2hM5noLg.jpeg', 5, 'Vestido floreado primaveral, incluye sombrero, y ropa interior, detalles flores boradas, ajustable con botones.', 'Vestido floreado primaveral, incluye sombrero, y ropa interior.', 'Simple', NULL, 2, 12, '2018-11-15 15:03:40', '2018-11-15 18:03:07'),
(13, 'Conjunto Casual Little Boy', '150.00', NULL, 'img_product/sCKwvuq0qYj2WPmWIHUMxggq74ewa33J5zO7GQVK.jpeg', 5, 'Conjunto casual incluye jean y polo con cuello camisa. Detalles bordados.', 'Conjunto casual incluye pantalon jean y polo con cuello camisa. Detalles bordados.', 'Simple', NULL, 1, 8, '2018-11-15 15:09:06', '2018-11-15 16:09:06'),
(14, 'Calzado Niñas Rosa Floral', '42.00', '45.00', 'img_product/SycaRyTNnNd6EmDYf6p56K2ugBX3npdY0R5bgl0U.jpeg', 5, 'Suela suave. Material: Charol. Detalles flores.&nbsp;', 'Suela suave. Material: Charol. Detalles flores.', 'Oferta', NULL, 8, 7, '2018-11-15 15:14:23', '2018-11-15 16:14:23'),
(15, 'Calzado Niña Perla Liston', '42.00', NULL, 'img_product/wBSM6KtgmXGLbA1WcwwGpbmENFuFyW9PGkvifCMs.jpeg', 5, 'Color Perla. Suela suave. Material: Charol. Detalles liston.', 'Color perla. Suela suave. Material: Charol. Detalles liston.', 'Simple', NULL, 8, 8, '2018-11-15 15:16:14', '2018-11-15 16:16:14'),
(16, 'Calzado Niña Rojo Floral', '42.00', NULL, 'img_product/I2i4OsdQrK21E8mMW0sHWCF4z7efip80XCeibSOk.jpeg', 5, 'Suela suave. Material: Charol. Detalles flores en tela.', 'Suela suave. Material: Charol. Detalles flores en tela.', 'Simple', NULL, 8, 1, '2018-11-15 15:26:55', '2018-11-15 16:26:55'),
(17, 'Calzado Niño Cuero Osito', '42.00', NULL, 'img_product/gBJqJhKTgXUyZWfVpCLcxjyLMPDMXxj0dMr1rVgQ.jpeg', 5, 'Suela suave. Material: Cuero. Detalles parche de oso panda', 'Suela suave. Material: Cuero. Detalles parche de oso panda', 'Simple', NULL, 8, 10, '2018-11-15 15:28:51', '2018-11-15 16:28:51'),
(18, 'Calzado Niño Cuero Cat', '42.00', NULL, 'img_product/RSMDUDpNYw0shionUKry9FYB8XrQFRDw6xbxUtgG.jpeg', 4, 'Suela suave. Material: Cuero. Detalles parche de letras', 'Suela suave. Material: Cuero. Detalles parche de letras', 'Simple', NULL, 8, 9, '2018-11-15 15:30:05', '2018-11-15 21:26:24'),
(19, 'Sandalias Niño Cuero Casual', '42.00', NULL, 'img_product/C6nxaoStHGcZZU0cx9rJvOM0cOtYCQeccOzyItYH.jpeg', 5, 'Suela suave. Material: Cuero, broche resistente', 'Suela suave. Material: Cuero, broche resistente', 'Simple', NULL, 7, 10, '2018-11-15 15:31:30', '2018-11-15 16:31:30'),
(20, 'Zapatillas Rosa Niña', '70.00', NULL, 'img_product/aZvmGma11Xgj5YaExtyVu5pw96d9GGjWdYuSbECe.jpeg', 5, 'Suela suave. Material: Cuero, Broche de pega pega ajustable, detalle listón', 'Suela suave. Material: Cuero, Broche de pega pega ajustable, detalle listón', 'Simple', NULL, 8, 7, '2018-11-15 15:33:50', '2018-11-15 16:33:50'),
(21, 'Calzado Niña Minnie Rosa', '42.00', NULL, 'img_product/auYhiNpGo6eUEKA2NdJmc6YL2rDVoPmJh5zek37g.jpeg', 5, 'Suela suave. Material: Cuero. Detalles: color rosa punteada, parche de Minnie, hebilla resistente', 'Suela suave. Material: Cuero. Detalles: color rosa punteada, parche de Minnie, hebilla resistente', 'Simple', NULL, 8, 7, '2018-11-15 15:36:54', '2018-11-15 16:36:54'),
(22, 'Calzado Niña Charol Elegante', '42.00', NULL, 'img_product/x2L4hZ1AotNzMQBthl6s56x5MaBNlhVpwlFbFjZY.jpeg', 5, 'Suela suave. Material: Charol. Detalles&nbsp;bordado y listón rojos, hebilla ajustable y resistente', 'Suela suave. Material: Charol. Detalles bordado y listón rojos, hebilla ajustable y resistente', 'Simple', NULL, 8, 9, '2018-11-15 15:39:22', '2018-11-15 16:39:22'),
(23, 'Calzado Niño Charol Elegante', '42.00', NULL, 'img_product/TxuAr76F7NttXSouXtQZiOEihPWkNdCZglMltKcJ.jpeg', 4, 'Suela suave. Material: Charol, con pasadores.', 'Suela suave. Material: Charol, con pasadores.', 'Simple', NULL, 8, 9, '2018-11-15 15:41:05', '2018-11-15 18:45:38'),
(24, 'Zapatillas Deportivas Niño', '70.00', NULL, 'img_product/XLxRyDWISSnoVFGBPWlKMEIVwrtXL5j3mlbrOWmr.jpeg', 5, 'Suela suave. Material: cuero, con pasadores. Detalles en cintas blancas.', 'Suela suave. Material: cuero, con pasadores. Detalles en cintas blancas.', 'Simple', NULL, 8, 4, '2018-11-15 15:42:32', '2018-11-15 16:42:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) NOT NULL,
  `image` varchar(150) NOT NULL,
  `product_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'z64h42fycjGNYeP1D67iQElc38xcxufRHpMKocsI.jpeg', 1, '2018-11-15 13:32:31', '2018-11-15 13:32:31'),
(2, 'd7Qb34K5lpgOsISC0vWVJu7KQQeXiSlnATSzVPzy.jpeg', 2, '2018-11-15 13:44:39', '2018-11-15 13:44:39'),
(3, 'JKGiEnWdbPToHnjp79LmBBzE5gI5fn0oQFYKJDoE.jpeg', 2, '2018-11-15 13:44:40', '2018-11-15 13:44:40'),
(4, 'gIR1tnwZkNBI0iIjpdBW2zlTVGdjkg3LxWsoqxmr.jpeg', 3, '2018-11-15 13:53:15', '2018-11-15 13:53:15'),
(5, 'U4RO3AYyubS8Ij9Hk06sv2h1LUDy9RTSrlEbS3KN.jpeg', 3, '2018-11-15 13:53:15', '2018-11-15 13:53:15'),
(6, 'BubHA7lvIwpPz4frEfXSQuMxxvyCULzyGxEBRG40.jpeg', 4, '2018-11-15 14:00:34', '2018-11-15 14:00:34'),
(7, 'KlkouO5PwffRWDvatoJHpnTr1TqBJ4GX0lMwrI5j.jpeg', 5, '2018-11-15 14:07:17', '2018-11-15 14:07:17'),
(8, 'OS3J3fnKP1iDINvGx9BoqM4Zns8Dve9OKlkVOnfc.jpeg', 6, '2018-11-15 14:12:07', '2018-11-15 14:12:07'),
(9, '3lqyBPM3N68vzSQZKp4nGhBRjXjbx5Eya6RMehxs.jpeg', 7, '2018-11-15 14:29:18', '2018-11-15 14:29:18'),
(10, '01x42ophcNrYUouHo6PX4W1OFiON3cfSKtCUe2Nn.jpeg', 7, '2018-11-15 14:29:18', '2018-11-15 14:29:18'),
(11, 'NKj82CifXARedbAMvQonBczhzNVMzOFuQ31ke6GQ.jpeg', 8, '2018-11-15 14:43:48', '2018-11-15 14:43:48'),
(14, '6gcDZGG8sCVGS5RtLymMBsXiv4SPmfESKf0Ywzc6.jpeg', 10, '2018-11-15 14:55:02', '2018-11-15 14:55:02'),
(15, '8dqiLc25oJiDYHzGg6IDrOC7vzzvtE2dzQ6OIvdu.jpeg', 12, '2018-11-15 15:03:40', '2018-11-15 15:03:40'),
(16, 'mgsfJdG8qVWH5Per8EsSKg1eTpKwnRF7Aqaq4CSF.jpeg', 12, '2018-11-15 15:03:40', '2018-11-15 15:03:40'),
(17, 'wW5zr4LY7lLYkvo8i3tYHJrDzSCYOmJrbJvh5ShN.jpeg', 12, '2018-11-15 15:03:40', '2018-11-15 15:03:40'),
(18, 'cRArRsPxhIWoLY7ZNWDhSpCFr7osrUbFANFGdkgT.jpeg', 13, '2018-11-15 15:09:06', '2018-11-15 15:09:06'),
(19, '54MZxoe5k1lWhGNjlTJXfjcqlVW9vGAJBmEaty19.jpeg', 13, '2018-11-15 15:09:06', '2018-11-15 15:09:06'),
(20, 'wl41X2TLWrmNIwRk61uD83FL6YHHUx7ZPopaMAvP.jpeg', 13, '2018-11-15 15:09:07', '2018-11-15 15:09:07'),
(21, 'FHmRZcC6mx7zEZNBrZjR4JONPUGlDInukBt2mTyE.jpeg', 14, '2018-11-15 15:14:23', '2018-11-15 15:14:23'),
(22, '14SJRFYIO4kZzEEbRzpB2JwsUAcRFkdfDYZyLkvZ.jpeg', 15, '2018-11-15 15:16:14', '2018-11-15 15:16:14'),
(23, 'uA99ZUMxsTJvUuHD4EBGjsi025FBrDl96O1GrAWz.jpeg', 16, '2018-11-15 15:26:55', '2018-11-15 15:26:55'),
(24, 'IJYU42Atn4Wruhi3DAVCWxqnqpHuaaEeZRi9jaWk.jpeg', 17, '2018-11-15 15:28:51', '2018-11-15 15:28:51'),
(25, 'f7Eha3npaW4kUlxYUm8CQfd4X1WgiqDkfj5qDMWB.jpeg', 18, '2018-11-15 15:30:05', '2018-11-15 15:30:05'),
(26, '1Br9kZNT63pmYxJ4xW8i3Wm5OkJ0yYsS3IqmLoz9.jpeg', 18, '2018-11-15 15:30:05', '2018-11-15 15:30:05'),
(27, 'onkTgKiIe7Oxz0uzF4qt7rxUHEztJ2wceItqxIa1.jpeg', 18, '2018-11-15 15:30:05', '2018-11-15 15:30:05'),
(28, 'IIjaeHaHSTCwxfPkElq7cwxtMuIDgbdOrtAbd1gs.jpeg', 19, '2018-11-15 15:31:30', '2018-11-15 15:31:30'),
(29, 'gEFD3d16WwLXtDClHU2xdAXoQmj0VRscbmIvPa6Z.jpeg', 20, '2018-11-15 15:33:50', '2018-11-15 15:33:50'),
(30, '7OLHnn9zvv0uzpZiqfGCacZ9Q10nlFzJ42wyqiAm.jpeg', 20, '2018-11-15 15:33:50', '2018-11-15 15:33:50'),
(31, '6D41fypEjJ837mF14x4vu4GjynucXeNq50zNdHEW.jpeg', 21, '2018-11-15 15:36:54', '2018-11-15 15:36:54'),
(32, '9BdmEyyWDszrIJMnseoYTkPt1dX1HTNSBFSRQjjU.jpeg', 21, '2018-11-15 15:36:54', '2018-11-15 15:36:54'),
(33, 'b2G6UKbZEFjgGHLiBxIG2zZe6DA6OBD7snbUaiHa.jpeg', 22, '2018-11-15 15:39:22', '2018-11-15 15:39:22'),
(35, 'gYdhfsFjOyhtpQRJ3uQIJTUZ576xZzqGslA9Z9TR.jpeg', 24, '2018-11-15 15:42:32', '2018-11-15 15:42:32'),
(36, 'ypKFIy8AWtI7vEUJ1ohvHjKSwAz4b7DVw2KtLDpK.jpeg', 24, '2018-11-15 15:42:32', '2018-11-15 15:42:32'),
(37, 'sosCI6igMW1C4LoJfIV2eSK0sosKnHJEssI1zSFa.jpeg', 4, '2018-11-27 05:51:14', '2018-11-27 05:51:14'),
(38, 'LZ4NurusN92JVE2ff1kTVCnHnBXyLqPzuWdm5XjK.jpeg', 4, '2018-11-27 05:51:22', '2018-11-27 05:51:22'),
(39, '1Y073oNAs0ZSduolI8u839DfqZomw5NibxypM0Ax.jpeg', 9, '2018-11-27 05:52:51', '2018-11-27 05:52:51'),
(40, 'MGDT5YFZodxvDJOswClft1mYg2ymEzR1CWABSAIW.jpeg', 9, '2018-11-27 05:53:03', '2018-11-27 05:53:03'),
(41, 'XyDf22CduNZaef4qzWgmCML6b0fR1bw5GTKn5TMH.jpeg', 10, '2018-11-27 05:53:58', '2018-11-27 05:53:58'),
(42, 'xbYv40K3YGs6U9gSjA88m9ev63CH5v3c38Oy0DRY.jpeg', 10, '2018-11-27 05:54:12', '2018-11-27 05:54:12'),
(43, 'f941ZgDeLxhlgkPNGVkCNnT5CuwXdwhOLt7MgP7v.jpeg', 10, '2018-11-27 05:54:35', '2018-11-27 05:54:35'),
(44, 'zJ9aEk2sbgXukWUKM63h1SIqDkxXDBi0i7eptz4f.jpeg', 10, '2018-11-27 05:54:44', '2018-11-27 05:54:44'),
(45, 'fNwLs3X7qmQ1Nn2sY0qVB6kWUh4xuA3v3MuHso42.jpeg', 11, '2018-11-27 05:55:26', '2018-11-27 05:55:26'),
(46, 'IpTFROQPvFGloAZvtW9YDMRmVAiKu0PaM2cXVC9K.jpeg', 11, '2018-11-27 05:55:42', '2018-11-27 05:55:42'),
(47, 'G3LjLFbfoqqmgrEMtDFxCHaKDm29oAQiLwdvhezs.jpeg', 11, '2018-11-27 05:55:56', '2018-11-27 05:55:56'),
(48, 'DjWwp6V2bw9YqDQu1UBnQlGoiGJcSs8AaXuvBKvd.jpeg', 23, '2018-11-27 05:57:52', '2018-11-27 05:57:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_size`
--

CREATE TABLE `product_size` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `size_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2018-11-15 13:32:31', '2018-11-15 13:32:31'),
(3, 3, 3, 5, '2018-11-15 13:53:15', '2018-11-27 20:01:09'),
(5, 5, 3, 5, '2018-11-15 14:07:17', '2018-11-15 14:07:17'),
(6, 6, 14, 5, '2018-11-15 14:12:07', '2018-11-15 14:12:07'),
(7, 6, 15, 5, '2018-11-15 14:12:07', '2018-11-15 14:12:07'),
(8, 8, 11, 3, '2018-11-15 14:43:48', '2018-11-15 14:43:48'),
(9, 8, 13, 3, '2018-11-15 14:43:48', '2018-11-15 14:43:48'),
(10, 9, 13, 5, '2018-11-15 14:51:31', '2018-11-15 14:51:31'),
(12, 11, 13, 2, '2018-11-15 15:00:17', '2018-11-27 20:02:31'),
(14, 13, 13, 5, '2018-11-15 15:09:06', '2018-11-15 15:09:06'),
(15, 14, 13, 5, '2018-11-15 15:14:23', '2018-11-15 15:14:23'),
(16, 15, 13, 5, '2018-11-15 15:16:14', '2018-11-15 15:16:14'),
(17, 16, 13, 5, '2018-11-15 15:26:55', '2018-11-15 15:26:55'),
(18, 17, 13, 5, '2018-11-15 15:28:51', '2018-11-15 15:28:51'),
(19, 18, 13, 5, '2018-11-15 15:30:05', '2018-11-15 15:30:05'),
(20, 19, 13, 5, '2018-11-15 15:31:30', '2018-11-15 15:31:30'),
(21, 20, 13, 5, '2018-11-15 15:33:50', '2018-11-15 15:33:50'),
(22, 21, 13, 5, '2018-11-15 15:36:54', '2018-11-15 15:36:54'),
(23, 22, 13, 5, '2018-11-15 15:39:22', '2018-11-15 15:39:22'),
(24, 23, 13, 5, '2018-11-15 15:41:05', '2018-11-15 15:41:05'),
(25, 24, 13, 5, '2018-11-15 15:42:32', '2018-11-15 15:42:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shippings`
--

CREATE TABLE `shippings` (
  `order_id` int(10) NOT NULL,
  `departament` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referenceAddress` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `shippings`
--

INSERT INTO `shippings` (`order_id`, `departament`, `province`, `address`, `referenceAddress`, `price`, `created_at`, `updated_at`) VALUES
(1, '3655', '3656', 'Paseo la breña 3478', 'Al costado de el hospital el carmen', '10.00', '2018-11-15 17:45:38', '2018-11-15 17:45:38'),
(3, '3143', '3162', 'Av.Maricasl', 'al frente del hospital', '10.00', '2018-11-15 20:46:01', '2018-11-15 20:46:01'),
(4, '4567', '4568', 'Jr atalaya 123', 'Torre del reloj', '10.00', '2018-11-15 23:08:29', '2018-11-15 23:08:29'),
(5, '3655', '3708', 'jrn Hualhuas 0', 'costado de parque', '10.00', '2018-11-26 23:33:35', '2018-11-26 23:33:35'),
(6, '2534', '2557', 'jrn Hualhuas 250', 'al costado del parque', '10.00', '2018-11-27 18:30:21', '2018-11-27 18:30:21'),
(7, '3655', '3656', 'Jr. Cusco 1120', 'Espaldas clinica', '10.00', '2018-11-27 23:08:21', '2018-11-27 23:08:21'),
(8, '3655', '3656', 'Jr. Cusco 1120', 'Espaldas clinica', '10.00', '2018-11-27 23:09:47', '2018-11-27 23:09:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '0 - 3 meses', '2018-11-15 12:44:16', '2018-11-15 12:44:16'),
(2, '3 - 6 meses', '2018-11-15 12:44:30', '2018-11-15 12:44:30'),
(3, '6 - 9 meses', '2018-11-15 12:44:43', '2018-11-15 12:44:43'),
(4, '9 - 12 meses', '2018-11-15 12:45:11', '2018-11-15 12:45:11'),
(6, '12 - 18 meses', '2018-11-15 12:46:52', '2018-11-15 12:46:52'),
(11, '18 - 24 meses', '2018-11-15 13:38:45', '2018-11-15 13:38:45'),
(12, '24 - 36 meses', '2018-11-15 13:39:07', '2018-11-15 13:39:07'),
(13, 'Talla 4', '2018-11-15 13:39:14', '2018-11-15 13:39:14'),
(14, 'Talla 6', '2018-11-15 13:39:20', '2018-11-15 13:39:20'),
(15, 'Talla 8', '2018-11-15 13:39:27', '2018-11-15 13:39:27'),
(16, 'Talla 10', '2018-11-15 13:55:56', '2018-11-15 13:55:56'),
(17, 'Talla 12', '2018-11-15 13:56:02', '2018-11-15 13:56:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE `states` (
  `id` int(10) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'cancelado', NULL, NULL),
(2, 'en proceso', NULL, NULL),
(3, 'pendiente de pago', NULL, NULL),
(4, 'pendiente de revision', NULL, NULL),
(5, 'fallido', NULL, NULL),
(6, 'enviado', NULL, NULL),
(7, 'completado', NULL, NULL),
(8, 'en espera', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(1500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actived` tinyint(1) NOT NULL DEFAULT '1',
  `celphone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `password`, `avatar`, `actived`, `celphone`, `remember_token`, `updated_at`) VALUES
(1, 'Consuelo Raquel', 'Peralta Rojas', 'consuelo@gmail.com', '$2y$10$YoQkSAn/0.GpIvXt/RgW7eOZs7pcfCzXFvClrdMy5rMweVec94pLy', '', 1, '234234', 'NjCLyB715yUHGBuyMoheVTbR1kELJcFZkB5axkJnnTHcnFZxMezZJ4Wu0N6p', '2018-11-07 22:10:58'),
(3, 'Rodrigo', 'Flores del Carpio', 'rodrigo@gmail.com', '$2y$10$jdFqq/7XtL.HKfmLaDpz3e.SwqaHNZzx86e002m/5uYZ4L82ulA3u', NULL, 1, '945708608', '5o5WJoybmLd5FyAYzQFsuv0AUehAY8XVQRAhzwJwujKkn063fjZtT087jOvx', '2018-11-15 20:48:30'),
(4, 'Paul', 'Hinostroza Fernandez', 'paul@gmail.com', '$2y$10$9Sk7cpHLeMrLsSWZNxgPYODl04hep5lId5CTAjKMd8RhfGzFsB5TO', NULL, 1, '990022171', NULL, '2018-11-15 13:11:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bouchers`
--
ALTER TABLE `bouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`order_id`,`customer_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `customer_verify`
--
ALTER TABLE `customer_verify`
  ADD KEY `customer_id` (`customer_id`);

--
-- Indices de la tabla `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_type_id` (`invoice_type_id`,`order_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indices de la tabla `invoices_types`
--
ALTER TABLE `invoices_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`customer_id`,`state_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `name` (`name`,`last_name`,`dni`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indices de la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`product_id`,`order_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD KEY `order_id` (`order_id`,`payment_type_id`),
  ADD KEY `order_id_2` (`order_id`,`payment_type_id`),
  ADD KEY `payment_type_id` (`payment_type_id`);

--
-- Indices de la tabla `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Indices de la tabla `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `id_2` (`id`,`product_id`);

--
-- Indices de la tabla `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`product_id`,`size_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indices de la tabla `shippings`
--
ALTER TABLE `shippings`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `order_id_2` (`order_id`);

--
-- Indices de la tabla `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bouchers`
--
ALTER TABLE `bouchers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `invoices_types`
--
ALTER TABLE `invoices_types`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `states`
--
ALTER TABLE `states`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bouchers`
--
ALTER TABLE `bouchers`
  ADD CONSTRAINT `bouchers_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `bouchers_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Filtros para la tabla `customer_verify`
--
ALTER TABLE `customer_verify`
  ADD CONSTRAINT `customer_verify_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`invoice_type_id`) REFERENCES `invoices_types` (`id`),
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Filtros para la tabla `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `payments_ibfk_3` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_types` (`id`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`);

--
-- Filtros para la tabla `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_size_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);

--
-- Filtros para la tabla `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
