-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-07-2021 a las 02:45:51
-- Versión del servidor: 10.4.19-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u223232943_mindsover`
--
create database cursosenlinea;
use cursosenlinea;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carro_compras`
--

CREATE TABLE `carro_compras` (
  `id_carro_compras` int(11) NOT NULL,
  `nombre_carro_compras` varchar(120) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(120) DEFAULT NULL,
  `desc_categoria` varchar(1200) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `desc_categoria`, `activo`, `fecha_creacion`) VALUES
(1, 'APPAREL', 'Pelotas de beisbol y mucho mas', 1, '2021-03-02 16:41:01'),
(2, 'BATES', 'Gorras de distintas marcas', 1, '2021-03-02 16:41:01'),
(3, 'ZAPATOS', NULL, 1, '2021-03-07 06:42:29'),
(4, 'GUANTES', NULL, 1, '2021-03-07 06:42:29'),
(5, 'CATCHERS', NULL, 1, '2021-03-07 06:42:29'),
(6, 'MALETAS', NULL, 1, '2021-03-07 06:42:29'),
(7, 'CASCOS', NULL, 1, '2021-03-07 06:42:29'),
(8, 'PELOTAS', NULL, 1, '2021-03-07 06:42:29'),
(9, 'MALLAS', NULL, 1, '2021-03-07 06:42:29'),
(10, 'SOFTBAL', NULL, 1, '2021-03-07 06:42:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `charges`
--

CREATE TABLE `charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idUsuario` int(10) NOT NULL DEFAULT 1,
  `cardholder` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_brand` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `charges`
--

INSERT INTO `charges` (`id`, `idUsuario`, `cardholder`, `stripe_id`, `card_brand`, `card_last_four`, `total`, `created_at`, `updated_at`) VALUES
(3, 0, 'Daniel Eduardo Solis Can', 'tok_1IT8ezKGjcpz85FFakCoG9ib', 'Visa', '4242', NULL, '2021-03-09 22:44:00', '2021-03-09 22:44:00'),
(4, 0, 'Eduardo', 'tok_1ITTjZKGjcpz85FFr67t3FsH', 'MasterCard', '4444', NULL, '2021-03-10 21:14:08', '2021-03-10 21:14:08'),
(5, 0, 'Otro', 'tok_1ITTodKGjcpz85FFSWaIAwUh', 'Visa', '4242', 1900, '2021-03-10 21:19:22', '2021-03-10 21:19:22'),
(6, 0, 'Iruharu', 'tok_1ITTpeKGjcpz85FFAG9rrdnQ', 'Visa', '4242', 1900, '2021-03-10 21:20:26', '2021-03-10 21:20:26'),
(7, 0, 'Daniel Prueba', 'tok_1ITTrNKGjcpz85FFIPvTsCLu', 'MasterCard', '3222', 1900, '2021-03-10 21:22:13', '2021-03-10 21:22:13'),
(8, 0, 'Prueba daniel', 'ch_1ITTyyKGjcpz85FFRNOIGdt5', 'Visa', '4242', 400, '2021-03-10 21:30:03', '2021-03-10 21:30:03'),
(9, 0, 'Daniel prueba', 'ch_1ITUSzKGjcpz85FFBBYaUAkT', 'MasterCard', '4444', 1500, '2021-03-10 22:01:04', '2021-03-10 22:01:04'),
(10, 0, 'Marine', 'ch_1ITUVMKGjcpz85FF6hUHqvRm', 'MasterCard', '8210', 350, '2021-03-10 22:03:31', '2021-03-10 22:03:31'),
(11, 0, 'Manuel', 'ch_1ITWDCKGjcpz85FFbyLuQ9z1', 'Visa', '5556', 1500, '2021-03-10 23:52:52', '2021-03-10 23:52:52'),
(12, 0, 'Marine Burgos', 'ch_1ITWQGKGjcpz85FFJhDinl1B', 'Visa', '4242', 2650, '2021-03-11 00:06:22', '2021-03-11 00:06:22'),
(13, 0, 'Carla Serrano', 'ch_1ITWm9KGjcpz85FFm8ymeL1r', 'MasterCard', '8210', 350, '2021-03-11 00:28:59', '2021-03-11 00:28:59'),
(14, 0, 'Carla serrano madrid', 'ch_1ITWniKGjcpz85FFsvkIJ6jw', 'MasterCard', '8210', 350, '2021-03-11 00:30:36', '2021-03-11 00:30:36'),
(15, 0, 'Mariana vazquez', 'ch_1ITX62KGjcpz85FF0ecEgmNY', 'Visa', '4242', 1900, '2021-03-11 00:49:33', '2021-03-11 00:49:33'),
(16, 0, 'Mariana Vazquez', 'ch_1ITX6zKGjcpz85FFX84Vt4je', 'Visa', '4242', 750, '2021-03-11 00:50:31', '2021-03-11 00:50:31'),
(17, 0, 'Mariano', 'ch_1ITXb5KGjcpz85FFeTsdsmyG', 'Visa', '5556', 1500, '2021-03-11 01:21:37', '2021-03-11 01:21:37'),
(18, 0, 'Daniel solis', 'ch_1ITXeAKGjcpz85FF2zn2g2II', 'Visa', '4242', 350, '2021-03-11 01:24:48', '2021-03-11 01:24:48'),
(19, 0, 'Natalia', 'ch_1ITXfyKGjcpz85FFp3nKuAEV', 'Visa', '4242', 350, '2021-03-11 01:26:40', '2021-03-11 01:26:40'),
(20, 0, 'Monserrat Escalante', 'ch_1ITXhEKGjcpz85FFYNZHjOMb', 'Visa', '4242', 400, '2021-03-11 01:27:58', '2021-03-11 01:27:58'),
(21, 0, 'Monse', 'ch_1ITXpwKGjcpz85FFnVHRdyiB', 'Visa', '4242', 350, '2021-03-11 01:36:58', '2021-03-11 01:36:58'),
(22, 0, 'Daniel Eduardo', 'ch_1Iz31AKGjcpz85FF7eGx739I', 'Visa', '4242', 50, '2021-06-05 22:10:40', '2021-06-05 22:10:40'),
(23, 0, 'Iru Burgos', 'ch_1Iz3ukCjrYS9cPLbgsrSvyE6', 'Visa', '4242', 50, '2021-06-05 23:08:07', '2021-06-05 23:08:07'),
(24, 0, 'Iruhary Moreno', 'ch_1Iz43ACjrYS9cPLbUgGRJwDe', 'Visa', '4242', 50, '2021-06-05 23:16:49', '2021-06-05 23:16:49'),
(25, 0, 'Daniel Solis', 'ch_1Iz4E1CjrYS9cPLb2oqDvpAf', 'MasterCard', '8210', 250, '2021-06-05 23:28:02', '2021-06-05 23:28:02'),
(26, 0, 'Daniel', 'ch_1J7rfACjrYS9cPLbj8NABXyO', 'Visa', '4242', 50, '2021-06-30 05:52:25', '2021-06-30 05:52:25'),
(27, 1, 'Daniel solis', 'ch_1J8ABCCjrYS9cPLbmKhz2u5N', 'Visa', '4242', 60, '2021-07-01 01:38:44', '2021-07-01 01:38:44'),
(28, 1, 'Daniel USD', 'ch_1J8ADWCjrYS9cPLbwOxovo6N', 'Visa', '4242', 260, '2021-07-01 01:41:07', '2021-07-01 01:41:07'),
(29, 1, 'Iru USD', 'ch_1J8AJ0CjrYS9cPLbuLDGFEdt', 'Visa', '4242', 60, '2021-07-01 01:46:48', '2021-07-01 01:46:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `desc_curso` varchar(255) DEFAULT NULL,
  `portada` varchar(155) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='catalogo de cursos';

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nombre`, `desc_curso`, `portada`, `activo`, `fecha_creacion`) VALUES
(2, 'Formación general para principiantes', 'Formación general para principiantes', 'Cielo.jpg', 1, '2021-07-12 23:53:20'),
(3, 'Trading de futuros', 'Trading de futuros', 'node.png', 1, '2021-07-13 19:40:17'),
(4, 'Análisis técnico', 'Análisis técnico', 'analisis.jpg', 1, '2021-07-13 21:48:07'),
(5, 'Gestión de riesgo', 'Gestión de riesgo', 'gestion.jpg', 1, '2021-07-13 21:48:40'),
(6, 'Aprende a operar CFD´s ', 'Aprende a operar CFD´s ', 'cfd.png', 1, '2021-07-14 00:35:36'),
(7, 'Nuevo curso', 'aaaa', 'Cielo Rojo para PC.jpg', NULL, '2021-07-27 22:08:10'),
(8, 'El principito', 'Lobo y 3 cochinitos', 'img_minds.jpg', NULL, '2021-07-27 22:09:14'),
(9, 'Trading para principiantes', 'Aqui encontraras mucha información', 'Cielo Rojo para PC.jpg', 1, '2021-07-28 03:14:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `id_detalle_venta` int(11) NOT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `id_direccion` int(11) NOT NULL,
  `domicilio` varchar(140) DEFAULT NULL,
  `pais` varchar(80) DEFAULT NULL,
  `estado` varchar(80) DEFAULT NULL,
  `codigo_postal` varchar(7) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `id_material` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  `bActivo` tinyint(4) NOT NULL DEFAULT 1,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `id_curso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`id_material`, `nombre`, `url`, `bActivo`, `fecha_creacion`, `id_curso`) VALUES
(1, 'Libreta', '', 1, '2021-07-13 14:29:09', 2),
(2, 'Libro', '', 1, '2021-07-13 14:44:38', 3),
(3, 'Material ejemplo', '', 1, '2021-07-13 17:01:10', 4),
(4, 'Ejemplo', '', 1, '2021-07-13 20:22:28', 5),
(5, 'Ejemplo', '', 1, '2021-07-13 20:22:41', 6),
(8, 'Libro', '2° GLM Ficha Mayo-03 feb AE-Potencias fin dos-convertido.docx', 1, '2021-07-26 17:13:00', NULL),
(9, 'Material crypto 1', 'img_minds.jpg', 1, '2021-07-26 20:36:32', NULL),
(10, 'Crypto avanzado', 'Fondo de pantalla.jpg', 1, '2021-07-26 21:03:42', NULL),
(11, 'Material de prueba', 'Cielo Rojo para PC.jpg', 1, '2021-07-27 16:58:22', 4),
(12, 'Formato de prueba', 'WhatsApp Image 2021-04-21 at 12.57.12 PM.jpeg', 1, '2021-07-28 03:13:46', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_temario`
--

CREATE TABLE `material_temario` (
  `id_material_temario` int(11) NOT NULL,
  `id_material` int(11) DEFAULT NULL,
  `id_temario` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  `activo` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `membresias`
--

CREATE TABLE `membresias` (
  `id_mebresias` int(11) NOT NULL COMMENT 'primary key',
  `id_usuario` int(11) DEFAULT NULL,
  `id_tipo_cobro` int(11) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_modificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla para relacionar los pagos con los usuarios y saber si se generara cobro mensual, anual o solo unica vez';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `int` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `int`) VALUES
(30, '2019_05_03_000001_create_customer_columns', 1),
(31, '2019_05_03_000002_create_subscriptions_table', 1),
(32, '2019_05_03_000003_create_subscription_items_table', 1),
(33, '2021_04_15_231614_create_roles_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id_modulo`, `nombre`, `fecha_creacion`, `id_curso`) VALUES
(2, 'Introducción al trading', '2021-07-12 18:53:46', 2),
(3, 'Broker y plataforma', '2021-07-13 14:40:43', 3),
(4, 'Análisis técnico básico', '2021-07-13 16:49:35', 4),
(5, 'Teoría del mercado', '2021-07-13 16:49:51', 4),
(6, 'Indicadores técnicos', '2021-07-13 16:50:15', 4),
(7, 'Trading avanzado', '2021-07-13 16:50:15', 4),
(8, 'Análisis técnico básico', '2021-07-13 16:50:37', 5),
(9, 'Herramientas de trabajo', '2021-07-13 20:26:32', 6),
(10, 'Nivel Básicos', '2021-07-13 20:26:45', 6),
(11, 'Nivel Intermedio ', '2021-07-13 20:26:57', 6),
(12, 'Nivel Avanzado', '2021-07-13 20:27:10', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT 'current_timestamp()'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`) VALUES
(3, 'danielsolis023@gmail.com', '$2y$10$sqb0v7Jg37h3PDFgaLUcouegS5I2cS5UFaz1CeWdn3lIu2eu//S/u', '2021-07-13 22:04:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `nombre_producto` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desc_producto` varchar(1200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `url_imagen` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `activo` tinyint(4) DEFAULT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoria`, `nombre_producto`, `desc_producto`, `url_imagen`, `precio`, `cantidad`, `id_marca`, `activo`, `fecha_creacion`) VALUES
(1, 1, 'MENSUALIDAD', 'MES', '01.jpg', 50, 5, NULL, 1, '2021-03-02 16:43:03'),
(2, 1, 'SEMESTRAL', '6 MESES', '02.jpg', 250, 4, NULL, 1, '2021-03-07 06:25:10'),
(3, 2, 'ANUALIDAD', '(TE AHORRAS 2 MEMBRESÍAS)', '03.jpg', 500, 8, NULL, 1, '2021-03-02 16:47:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2021-04-23 01:59:16', '2021-04-23 01:59:16'),
(2, 'unica', 'unica', '2021-04-23 01:59:16', '2021-04-23 01:59:16'),
(3, 'premium', 'premium', '2021-04-23 01:59:16', '2021-04-23 01:59:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(28, 3, 1, '2021-07-13 03:50:34', '2021-07-13 03:50:34'),
(29, 3, 2, '2021-07-28 03:14:18', '2021-07-28 03:14:18'),
(30, 3, 3, '2021-07-28 03:15:15', '2021-07-28 03:15:15'),
(31, 3, 4, '2021-07-28 03:16:17', '2021-07-28 03:16:17'),
(32, 3, 5, '2021-07-28 03:17:19', '2021-07-28 03:17:19'),
(33, 3, 6, '2021-07-28 03:17:59', '2021-07-28 03:17:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temario`
--

CREATE TABLE `temario` (
  `id_temario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `url_video` varchar(200) NOT NULL,
  `bActivo` tinyint(4) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `id_modulo` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `temario`
--

INSERT INTO `temario` (`id_temario`, `nombre`, `descripcion`, `url_video`, `bActivo`, `fecha_creacion`, `id_modulo`, `id_curso`) VALUES
(6, 'Clase 1: ¿Qué es la bolsa de valores?', '(acciones, divisas, índices, futuros, cfd’s) ', 'video_example_.mp4', 1, '0000-00-00 00:00:00', 2, 2),
(7, 'Clase 2: Participantes del mercado.', '(trader profesional, trader minorista y broker, inversionista y trader)', 'video_example_.mp4', 1, '0000-00-00 00:00:00', 2, 2),
(9, 'Clase 3: ¿Cómo elegir un broker?', '(caracteristicas)', 'video_example_.mp4', 1, '0000-00-00 00:00:00', 2, 2),
(10, 'Clase 4: tipos de análisis: fundamental y técnico.', '', 'video_example_.mp4', 1, '2021-07-13 14:39:28', 2, 2),
(11, 'Clase 5: broker ', '(registro, como fondear, como retirar, contactar a soporte, descargar plataforma de operaciones)', 'video_example_.mp4', 1, '2021-07-13 14:42:06', 3, 3),
(12, 'Clase 6: Ninja trader ', '(instalación, como abrir un gráfico, seleccionar instrumento, como instalar indicadores, como hacer ', 'video_example_.mp4', 1, '2021-07-13 16:52:51', 3, 3),
(13, 'Clase 7: como ingresar órdenes de compra y venta, SL y TP ', '(limite, mercado, stop).', 'video_example_.mp4', 1, '2021-07-13 16:53:43', 3, 3),
(14, 'Clase 8: Ley de oferta y demanda', 'Aprenderas sobre la oferta y demanda', 'video_example_.mp4', 1, '2021-07-13 16:54:48', 4, 4),
(15, 'Clase 9:  conceptos de tendencia, impulso, retroceso, rechazo, testeo.', 'Principios básicos que un buen trader debe saber', 'WhatsApp Video 2021-07-20 at 3.26.03 PM.mp4', 1, '2021-07-13 16:56:47', 4, 4),
(16, 'Clase 10: soporte, resistencia, zona de reversión.', '', 'video_example_.mp4', 1, '2021-07-13 16:58:05', 4, 4),
(17, 'Clase 11: acción del precio, sentimiento y naturaleza.', '', 'video_example_.mp4', 1, '2021-07-13 17:00:11', 4, 4),
(18, 'Clase 12: método Wyckoff ', '', 'video_example_.mp4', 1, '2021-07-13 17:00:49', 5, 4),
(19, 'Clase 13: Lógica del mercado', '', 'video_example_.mp4', 1, '2021-07-13 20:14:38', 5, 4),
(20, 'Clase 14: manipulación profesional.', '', 'video_example_.mp4', 1, '2021-07-13 20:15:02', 5, 4),
(21, 'Clase 15: Análisis fundamental.', '', 'video_example_.mp4', 1, '2021-07-13 20:15:37', 5, 4),
(22, 'Clase 16: Volumen', '', 'video_example_.mp4', 1, '2021-07-13 20:16:02', 6, 4),
(23, 'Clase 17: Emas', '', 'video_example_.mp4', 1, '2021-07-13 20:16:34', 6, 4),
(24, 'Clase 18: Volumen profile', '', 'video_example_.mp4', 1, '2021-07-13 20:17:12', 6, 4),
(25, 'Clase 19: RSI', '', 'video_example_.mp4', 1, '2021-07-13 20:17:37', 6, 4),
(26, 'Clase 20: estructuras de mercado', '', 'video_example_.mp4', 1, '2021-07-13 20:18:20', 7, 4),
(27, 'Clase 21: fibonacci', '', 'video_example_.mp4', 1, '2021-07-13 20:18:48', 7, 4),
(28, 'Clase 22: integración de elementos de análisis', '', 'video_example_.mp4', 1, '2021-07-13 20:19:16', 7, 4),
(29, 'Clase 23: premarket', '', 'video_example_.mp4', 1, '2021-07-13 20:19:44', 7, 4),
(30, 'Clase 24: estrategia para entrar y salir.', '', 'video_example_.mp4', 1, '2021-07-13 20:20:18', 7, 4),
(31, 'Clase 25: ¿qué es un plan de trading y como definirlo?', '', 'video_example_.mp4', 1, '2021-07-13 20:21:40', 8, 5),
(32, 'Clase 26: define una estrategia ', '', 'video_example_.mp4', 1, '2021-07-13 20:24:28', 8, 5),
(33, 'Clase 27: gestión de riesgo y registro de operativa ', '(diario de trading y álbum de operaciones)', 'video_example_.mp4', 1, '2021-07-13 20:25:08', 8, 5),
(34, 'Diferencia entre consistencia y rentabilidad. ', '', 'video_example_.mp4', 1, '2021-07-13 20:25:35', 8, 5),
(36, 'C1 Apertura de cuenta GNT', '', 'video_example_.mp4', 1, '2021-07-13 20:29:56', 9, 6),
(37, 'C2 Recorrido GNT', '', 'video_example_.mp4', 1, '2021-07-13 20:30:19', 9, 6),
(38, 'C3 Vincular cuenta a GNT- MT5 ', '', 'video_example_.mp4', 1, '2021-07-13 20:31:08', 9, 6),
(39, 'C4 Configuración de MT5', '', 'video_example_.mp4', 1, '2021-07-13 20:31:31', 9, 6),
(40, 'C5 Operaciones ', '', 'video_example_.mp4', 1, '2021-07-13 20:31:56', 9, 6),
(41, 'C1 Líneas de soporte y resistencia ', '', 'video_example_.mp4', 1, '2021-07-13 20:32:27', 10, 6),
(42, 'C2 Tendencias ', '', 'video_example_.mp4', 1, '2021-07-13 20:32:51', 10, 6),
(43, 'C3 RSI ', '', 'video_example_.mp4', 1, '2021-07-13 20:33:16', 10, 6),
(44, 'C4 EMA', '', 'video_example_.mp4', 1, '2021-07-13 20:33:45', 10, 6),
(45, 'C5 Lectura de velas', '', 'video_example_.mp4', 1, '2021-07-13 20:34:17', 10, 6),
(46, 'C1 Zonas de oferta y demanda', '', 'video_example_.mp4', 1, '2021-07-13 20:35:13', 11, 6),
(47, 'C2 Máximos y Mínimos- Zonas de cambio ', '', 'video_example_.mp4', 1, '2021-07-13 20:35:39', 11, 6),
(48, 'C3 Conociendo la estrategia', '', 'video_example_.mp4', 1, '2021-07-13 20:36:05', 11, 6),
(49, 'C4 Creando una disciplina ', '', 'video_example_.mp4', 1, '2021-07-13 20:37:28', 11, 6),
(50, '5 Adáptate al mercado  ', '', 'video_example_.mp4', 1, '2021-07-13 20:38:07', 11, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` varchar(75) CHARACTER SET utf8mb4 DEFAULT NULL,
  `name` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL,
  `email` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL,
  `membresia` int(10) DEFAULT 1,
  `token` varchar(256) CHARACTER SET utf8mb4 DEFAULT NULL,
  `stripe_id` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `card_brand` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `card_last_four` varchar(4) CHARACTER SET utf8mb4 DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_name` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL,
  `last_name2` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL,
  `date_of_birth` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL,
  `phone` varchar(13) CHARACTER SET utf8mb4 DEFAULT NULL,
  `country` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL,
  `state` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL,
  `zip_code` varchar(15) CHARACTER SET utf8mb4 DEFAULT NULL,
  `ine` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `proof_of_address` varchar(45) CHARACTER SET utf8mb4 DEFAULT NULL,
  `rfc` varchar(25) CHARACTER SET utf8mb4 DEFAULT NULL,
  `remember_token` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `password`, `name`, `email`, `membresia`, `token`, `stripe_id`, `card_brand`, `card_last_four`, `trial_ends_at`, `created_at`, `updated_at`, `last_name`, `last_name2`, `date_of_birth`, `phone`, `country`, `state`, `zip_code`, `ine`, `proof_of_address`, `rfc`, `remember_token`, `tipo_user`) VALUES
(1, '$2y$10$CZTdQaYJvnbGaYWkW4wzqOLyFaALxQGgx9Mn9wnx4.qbbu3Zihy42', 'Mariné', 'iruhary@gmail.com', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-13 03:50:34', '2021-07-13 03:50:34', 'Moreno', 'Burgos', '1996-10-10', '9992660071', 'México', 'Yucatán', '97470', NULL, NULL, NULL, 'iY5YYDd9aki6D6tMOtTJ0TeY1MYIS54iXluGN4E7svFeFDXLcW26YWfpItAC', 3),
(2, '$2y$10$Dk/PEIjf/MbcICWh024GQ.g48iZK5GPK8sjpJq6AaR6056WILMO4q', 'Felix', 'felix.rasgado@mindsovermarket.com', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-28 03:14:18', '2021-07-28 03:14:18', 'Rasgado', 'Rasgado', '1999-09-19', '9999999999', 'MX', 'Yuc', '97000', NULL, NULL, NULL, NULL, 3),
(3, '$2y$10$WXcQmE/lCjROGRYEjXCwvODxdBrUdyJ6r0ebhKr89RbZ7B0xexBXW', 'Gerardo', 'gerardo.bellavista@mindsovermarket.com', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-28 03:15:15', '2021-07-28 03:15:15', 'Bellavista', 'Bellavista', '1999-01-01', '9999999999', 'MX', 'Yuc', '97000', NULL, NULL, NULL, NULL, 3),
(4, '$2y$10$8bfx.uCsNvBddgyjdfKhweo2ejERJtwZVIvCr7cYq.9qVgUMd.A5y', 'Erwin', 'erwin.park@mindsovermarket.com', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-28 03:16:17', '2021-07-28 03:16:17', 'Park', 'Park', '1999-01-01', '9999999999', 'MX', 'Yuc', '97000', NULL, NULL, NULL, NULL, 3),
(5, '$2y$10$U2K6bnnjJKpkFi/2Pb7jKuHptV.rgZl.jStpwN8y7xALhub3Wab0O', 'Isaac', 'isaac.pena@mindsovermarket.com', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-28 03:17:19', '2021-07-28 03:17:19', 'Peña', 'Peña', '1999-01-01', '9999999999', 'MX', 'Yuc', '97000', NULL, NULL, NULL, 'a9ROVmOWUFErYuTM1TE0BmwJJ0T9RVcyT8AUIFKf1ndpBWoYBipaS9KUeKiZ', 3),
(6, '$2y$10$p3DXSmaTb43OqnhOLfbNjeDKgidkyn0WsyyDAXpbN.RNvlXvTCv3W', 'Julio', 'julio.gonzales@mindsovermarket.com', 1, NULL, NULL, NULL, NULL, NULL, '2021-07-28 03:17:59', '2021-07-28 03:17:59', 'Gonzales', 'Gonzales', '1999-01-01', '9999999999', 'MX', 'Yuc', '97000', NULL, NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `fecha_venta` date DEFAULT NULL,
  `total_productos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carro_compras`
--
ALTER TABLE `carro_compras`
  ADD PRIMARY KEY (`id_carro_compras`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`id_detalle_venta`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`id_direccion`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`id_material`);

--
-- Indices de la tabla `material_temario`
--
ALTER TABLE `material_temario`
  ADD PRIMARY KEY (`id_material_temario`);

--
-- Indices de la tabla `membresias`
--
ALTER TABLE `membresias`
  ADD PRIMARY KEY (`id_mebresias`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`),
  ADD KEY `id_curso_idx` (`id_curso`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_productos__categorias__id_categoria_idx` (`id_categoria`),
  ADD KEY `fk_productos__marcas_id_marca_idx` (`id_marca`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indices de la tabla `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_plan_unique` (`subscription_id`,`stripe_plan`),
  ADD KEY `subscription_items_stripe_id_index` (`stripe_id`);

--
-- Indices de la tabla `temario`
--
ALTER TABLE `temario`
  ADD PRIMARY KEY (`id_temario`),
  ADD KEY `id_modulo_idx` (`id_modulo`),
  ADD KEY `id_curso_idx` (`id_curso`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carro_compras`
--
ALTER TABLE `carro_compras`
  MODIFY `id_carro_compras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `charges`
--
ALTER TABLE `charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `id_detalle_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `material_temario`
--
ALTER TABLE `material_temario`
  MODIFY `id_material_temario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `membresias`
--
ALTER TABLE `membresias`
  MODIFY `id_mebresias` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key';

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temario`
--
ALTER TABLE `temario`
  MODIFY `id_temario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD CONSTRAINT `id_curso` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `temario`
--
ALTER TABLE `temario`
  ADD CONSTRAINT `id_cursot` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_modulot` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
