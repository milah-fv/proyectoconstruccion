-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-10-2018 a las 20:22:19
-- Versión del servidor: 5.6.37
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pibe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog_category`
--

CREATE TABLE IF NOT EXISTS `blog_category` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `blog_category`
--

INSERT INTO `blog_category` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Alimentacion', 'alimentacion', NULL, NULL),
(2, 'Cuidados', 'cuidados', NULL, NULL),
(3, 'Maternidad', 'maternidad', NULL, NULL),
(4, 'Recetas', 'recetas', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Enterizos / Bodies', 'enterizos-bodies', NULL, NULL),
(2, 'Gorros', 'gorros', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(10) NOT NULL,
  `color` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `colors`
--

INSERT INTO `colors` (`id`, `color`, `created_at`, `updated_at`) VALUES
(1, '#f00000', NULL, NULL),
(2, '#b4cc01', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
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
  `address` varchar(150) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `name`, `last_name`, `email`, `password`, `actived`, `verified`, `dni`, `celphone`, `phone`, `address`, `district`, `province`, `department`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Milah', 'Fonseca', 'milah@gmail.com', '$2y$10$kQiQdYoApRuhkKPhYGuVwOhgYJp9Hu0JjmVVOuGABq77BS1uAOrPK', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'iiyJPqmPpRrv7LfohCrh0ENrMk87uDvqDXYPjgMo4uefb0E1DsGSeNNSyBck', '2018-10-06 00:56:23', '2018-10-06 10:35:46'),
(7, 'Fabrizio', 'Fonseca', 'fabri@gmail.com', '$2y$10$i/.T3ZyZiS3RdB4hZsMGNOQSiaFe6MSKf.ELWHpJ5pq4FKubcVrCi', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '4RFWoui9651iy87ANNDvHYo1jyUwlAhyxWtynys3nFk7YsNAYJFrPaS0YIG3', '2018-10-06 01:32:20', '2018-10-06 01:35:20'),
(8, 'Rodrigo', 'Flores', 'rodrigo@gmail.com', '$2y$10$3EbCAZndZWv1issvOJ8wd.hWoZ/bbM2aSyD9zjKvClLnKT/iCeSmq', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0ld9ugYloo1EcKsZAvAkb4bwFQ3VnZTzj6lpp6q4bHkP1XnxiJZj5RFZJvT0', '2018-10-06 02:37:25', '2018-10-06 02:37:25'),
(9, 'Paul', 'Hinostroza', 'paul@gmail.com', '$2y$10$wCj2KwMUsfBxS4FAO8YtxuQecKWl0gqhZ4JAg/hchn7jWYLC/zC7e', 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mw7yShPIv8r8qdwg9vZEyylgkFdkSyFXSbGz2NSZnpOgRXEQO2ZkvSIj8WDZ', '2018-10-06 11:27:54', '2018-10-06 11:27:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customer_verify`
--

CREATE TABLE IF NOT EXISTS `customer_verify` (
  `customer_id` int(10) NOT NULL,
  `token` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `customer_verify`
--

INSERT INTO `customer_verify` (`customer_id`, `token`, `created_at`, `updated_at`) VALUES
(6, 'CFyrSpGw2uk6uMh4bVjnR2GUvBLmZyPXRye3mOGN', '2018-10-06 00:56:23', '2018-10-06 00:56:23'),
(7, 'Rox1C77suj1c87RJBkKiP4AfMezjAlybD3w1f6hX', '2018-10-06 01:32:20', '2018-10-06 01:32:20'),
(8, 'YHjLH5mjjtNZz1JwFfFngxeaAvef3jnsC9gq4Xbx', '2018-10-06 02:37:25', '2018-10-06 02:37:25'),
(9, 'xKgcZVqlliLkOSbersZc1OB8B7C93FHazC8rOuL4', '2018-10-06 11:27:54', '2018-10-06 11:27:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(150) NOT NULL,
  `token` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('rodrigo@gmail.com', '$2y$10$ttEisEr3nmCBEyFD6sVCdOSbzyfrcQ7iIEWIHLcHj1kxhI3Mg./Bm', '2018-10-06 02:44:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `blog_category_id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `abstract` varchar(500) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `blog_category_id`, `name`, `slug`, `abstract`, `body`, `image`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, '¿Le estoy dando los mejores alimentos?', 'le-estoy-dando-los-mejores-alimentos', 'Acabo de iniciar la diversificación alimentaria de mi hijo, pero no sé si es mejor prepararle los purés y compotas yo misma o comprarle tarritos ya preparados. De momento, voy alternando y me resulta bastante práctico.', 'Alimentación natural\r\n\r\nUna cosa tienes clara: quieres dar unos buenos alimentos a tu bebé. Pero no se trata de romperse la cabeza preparando comidas en casa o de culpabilizarse por darle tarritos a nuestro bebé. Cada modo de alimentación tiene sus ventajas y nos equivocaríamos si prescindiéramos de ellas. Se trata, pues, de hacernos la vida más fácil y de satisfacer las necesidades y gustos de nuestro niño.\r\n\r\n \r\n\r\nUna alimentación complementada\r\n\r\nEn la cocina te las arreglas muy bien y quieres cocinar el mejor alimento para que tu bebé lo aproveche al máximo. Pero claro, la preparación casera exige tiempo, una nevera bien llena y el material necesario, en especial para la alimentación del pequeño. Por contra, los tarritos ya preparados son muy prácticos, y no sólo eso: la normativa vigente los considera fuentes de vitaminas y minerales. Los controles de nitratos y otros agentes contaminantes son muy estrictos. Y cuando el bebé inicia su diversificación alimentaria, las cantidades que necesita son tan pequeñas que no siempre es fácil cocinar 30 g de verdura. Como habrás podido comprobar, no hay una única solución para satisfacer el apetito de tu hijo a lo largo de su despertar a la alimentación, sino varias y todas válidas.\r\n\r\n¡Lo he hecho yo!\r\n\r\n \r\n\r\nCuando se inicia la diversificación , ponte al día en el tema electrodomésticos. Lo mejor es un cocedor triturador especial para bebés (pídelo prestado a una amiga si puedes). Este codiciado objeto descongela, calienta, cuece al vapor y tritura en un abrir y cerrar de ojos. ¡Casi nada! Si no quieres invertir en un aparato así, existen por suerte otras maneras para cocinar los alimentos. Puedes elegir entre un cocedor al vapor, cocer al agua sin sal o cocer al microondas con un recipiente adaptado. Añádele una buena batidora para triturar fino y preparar cremas perfectas, sobre todo para los lactantes, ¡y ya está!\r\n\r\n \r\n\r\nDesde el punto de vista de la organización, prepara comida para varios días al mismo tiempo y congela lo que no vayas a comer en el momento. Intenta tener siempre hecha la próxima comida: no hay nada peor que cocinar de urgencia con un niño hambriento y cansado después de un duro día de trabajo.\r\n\r\nFinalmente, cuando vayas de compras, calcula en función de los menús de la semana. Es la mejor manera de diversificar las comidas del niño, aunque deba tirarse de planificación. Parece un poco de colegio, pero es muy eficaz. Cuando compres los ingredientes, imagina cómo puedes utilizarlos en diversas recetas a lo largo de la semana (puré de patatas con pescado o pastel de patatas y carne). En cuanto a los ingredientes, elige frutas y verduras de temporada, más ricas en vitaminas, más económicas y son un excelente alimento para bebés. Pero no te prives de las verduras congeladas, siempre dispuestas a servirte, ya peladas y cortadas para usar únicamente la cantidad necesaria.\r\n\r\nCon el pescadoy la carne, sobre todo si tienes diversas generaciones en casa, reserva los trozos más tiernos para los pequeños (pechuga de pollo).\r\n\r\nUn último consejo: no sales ni endulces tus purés y compotas caseros, ya que las sales o azúcares naturales de las frutas y verduras se adaptan perfectamente al organismo todavía delicado de tu bebé.\r\n\r\nFinalmente, si tienes tiempo y ganas, elabora pequeñas recetas caseras para tu niño; ¡no es tan complicado! Y no olvides que cocinar es un juego en el que el bebé puede participar, aunque sólo sea viéndote actuar en la cocina.\r\n\r\nSi necesitas ideas para preparar deliciosas recetas, usa esta guía\r\n\r\n \r\n\r\nLa calidad , el compromiso de Nestlé\r\n\r\n¿Por qué no alternar las recetas caseras con preparados ya hechos vendidos comercialmente? Perfectamente adaptados a las necesidades de tu bebé, aportan la dosis precisa de nutrientes, vitaminas y minerales . Los productos de nutrición infantil están sujetos a una legislación más rigurosa que la de los productos para adultos. NESTLÉ va más allá de la normativa vigente con importantes compromisos:\r\n\r\nLimitación de sal en nuestros productos para ayudar a no sobrecargar el organismo todavía frágil del bebé. Nuestras recetas presentan una cantidad de sal limitada*o no incluyen sal.\r\nLimitación de azúcares añadidos en nuestros productos para no habituar al bebé a sabores demasiado dulces. De esta manera, nuestras papillas de cereales y las compotas de frutas se elaboran con un 100% de fruta, sin azúcares añadidos.\r\nLa calidad y la cantidad de lípidos de nuestras recetas a base de carne o pescado se adapta para participar en el desarrollo del sistema nervioso del bebé.\r\nNuestras recetas a base de leche infantil, carne o pescado aportan la dosis exacta de proteínas. Es importante respetar el organismo del bebé.\r\nGran exigencia de sabor de nuestras recetas, mucho más sabrosas gracias a nuevos procesos de cocción respetuosos con los ingredientes.\r\nEstos compromisos contribuyen a ofrecerte recetas respetuosas con el organismo todavía frágil e inmaduro de tu hijo y le ayudan a adquirir buenos hábitos alimentarios.\r\n\r\nEs bueno tener mucho donde escoger y hay multitud de alimentos que puedes dar a tu bebé. ¡A ti te toca combinar lo mejor para despertar el gusto de tu querubín!\r\n\r\n', 'img_post/1.jpg', NULL, NULL),
(2, NULL, 1, 'Masticar y Morder', 'masticar-y-morder', 'Desde su nacimiento, mi bebé se ha alimentado exclusivamente con leche. Al diversificar su alimentación, le inicio no sólo a nuevos sabores, sino también a texturas inéditas. ¡Una auténtica revolución!', 'Nueva texturas para el bebé\r\n\r\nEn la evolución del bebé, todos los avances están relacionados entre sí. Al cabo de unos meses, su boquita ya es capaz de aceptar otro alimento que no sea leche. Tu pequeño glotón está ya preparado para descubrir no sólo nuevas texturas sino también sabores hasta ahora insospechados. ¡Una experiencia cuanto menos desconcertante que transformará sus primeras referencias!\r\n\r\n \r\n\r\nMasticar: una etapa imprescindible en el desarrollo del bebé\r\n\r\nMientras que succionar era un acto reflejo, masticar requiere un aprendizaje que deberás enseñar a tu bebé. Se inicia hacia los cuatro meses y se perfecciona hasta el año de vida. Por eso es imposible que los lactantes coman otra cosa que no sea leche durante su primer trimestre de vida. Su pequeña lengua repele instintivamente cualquier alimento sólido. Hacia los 4/5 meses, al niño se le abre un nuevo mundo. Cada avance entrañará otro nuevo, ¡como un juego de muñecas rusas! El niño descubrirá primero que puede chupar, mordisquear y guardarse un trozo de comida en la boca, sensaciones nuevas que los niños suelen adorar\r\nCerca de dos meses más tarde, su evolución psicomotriz y la aparición de los incisivos le permitirán masticar. Gracias a esta nueva aptitud, refuerza los músculos de mejillas, labios y faringe. El bebé descubre asombrado que puede destruir alimentos con la boca.\r\n\r\n \r\n\r\nSu "yo gustativo" inicia su construcción*\r\nPronto estará en condiciones de comer pequeños trozos de comida. Mientras el bebé perfecciona el masticado, sus mandíbulas se estiran y se modelan. Si la diversificación se desarrolla de forma progresiva, el niño padecerá menos otitis y, más adelante, tendrá que visitar menos al dentista. Y como las buenas noticias no vienen solas, mientras aprende a masticar tu pequeño conseguirá sujetar la cuchara y el biberón sin ayuda. Debes enseñar a masticar a tu bebé y guiarle en sus primeros pasos hacia la independencia alimentaria', '/img_post/2.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `old_price` decimal(8,2) DEFAULT NULL,
  `cover_image` varchar(150) NOT NULL,
  `stock` int(10) DEFAULT NULL,
  `description` text NOT NULL,
  `features` varchar(500) DEFAULT NULL,
  `state` varchar(150) DEFAULT NULL,
  `category_id` int(10) NOT NULL,
  `color_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `old_price`, `cover_image`, `stock`, `description`, `features`, `state`, `category_id`, `color_id`, `created_at`, `updated_at`) VALUES
(1, 'Enterizo Mickey Mouse', '25.00', '30.00', '/img_product/1.png', 10, 'Enterizo 100% algodón, con broche debajo', '100% algodón, disponible diferentes tallas', 'Oferta', 1, 1, NULL, NULL),
(2, 'Babero gatito neko neko', '10.00', NULL, '/img_product/8.png', 10, '100% algodón', NULL, 'Nuevo', 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(10) NOT NULL,
  `image` varchar(150) NOT NULL,
  `product_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'fant.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_size`
--

CREATE TABLE IF NOT EXISTS `product_size` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `size_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, NULL, NULL),
(2, 2, 2, 0, NULL, NULL),
(3, 1, 2, 5, NULL, NULL),
(4, 2, 1, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sizes`
--

CREATE TABLE IF NOT EXISTS `sizes` (
  `id` int(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '0', NULL, NULL),
(2, '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sliders`
--

CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(10) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `subtitle` varchar(150) DEFAULT NULL,
  `image` varchar(150) NOT NULL,
  `url` varchar(150) DEFAULT NULL,
  `position` tinyint(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `subtitle`, `image`, `url`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Prepárate para Halloween', 'Tenemos los mejores disfraces para tu bebé', '/img_web/sliders/1.jpg', '/productos', 1, NULL, NULL),
(2, 'Día del Niño', 'Lo mejor para tu bebé', '/img_web/sliders/4.jpg', '/productos', 1, NULL, NULL),
(3, 'Los mejores diseños', 'Unicamente aquí', '/img_web/sliders/2.jpg', '/productos', 2, NULL, NULL),
(4, '¡Yo me subí aqui!\r\nAhora te toca a tí', 'Trae a tu niño a la tienda y por tus compras, sube a la nave completamente gratis', '/img_web/sliders/3.jpg', '/productos', 2, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

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
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`user_id`,`blog_category_id`),
  ADD KEY `blog_category_id` (`blog_category_id`);

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
-- Indices de la tabla `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `customer_verify`
--
ALTER TABLE `customer_verify`
  ADD CONSTRAINT `customer_verify_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_category` (`id`);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
