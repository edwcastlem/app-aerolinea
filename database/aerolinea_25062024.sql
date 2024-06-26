-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2024 a las 03:47:10
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aerolinea`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asientos`
--

CREATE TABLE `asientos` (
  `idAsiento` int(11) NOT NULL,
  `codAsiento` varchar(10) DEFAULT NULL,
  `idTipoAsiento` int(11) DEFAULT NULL,
  `idAvion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asientos`
--

INSERT INTO `asientos` (`idAsiento`, `codAsiento`, `idTipoAsiento`, `idAvion`) VALUES
(1, '1A', 1, 1),
(2, '1B', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviones`
--

CREATE TABLE `aviones` (
  `idAvion` int(11) NOT NULL,
  `modelo` varchar(20) DEFAULT NULL,
  `nroRegistro` varchar(20) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aviones`
--

INSERT INTO `aviones` (`idAvion`, `modelo`, `nroRegistro`, `capacidad`) VALUES
(1, 'Boeing 737', 'N12345', 150),
(2, 'Airbus A32', 'N54321', 180),
(3, 'Airbus B64', 'M39423', 200),
(8, 'Airbus C128', 'BC23949', 250),
(9, 'Boening A747', 'BA392348', 360);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('1521143@senati.pe|127.0.0.1', 'i:1;', 1718498423),
('1521143@senati.pe|127.0.0.1:timer', 'i:1718498423;', 1718498423),
('chavez@admin.com|127.0.0.1', 'i:1;', 1719174733),
('chavez@admin.com|127.0.0.1:timer', 'i:1719174732;', 1719174732);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallereserva`
--

CREATE TABLE `detallereserva` (
  `idDetalleReserva` int(11) NOT NULL,
  `idReserva` int(11) DEFAULT NULL,
  `idAsiento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detallereserva`
--

INSERT INTO `detallereserva` (`idDetalleReserva`, `idReserva`, `idAsiento`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadovuelo`
--

CREATE TABLE `estadovuelo` (
  `idEstadoVuelo` int(11) NOT NULL,
  `estado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estadovuelo`
--

INSERT INTO `estadovuelo` (`idEstadoVuelo`, `estado`) VALUES
(1, 'Programado'),
(2, 'En vuelo'),
(3, 'Aterrizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(104, '0001_01_01_000000_create_users_table', 1),
(105, '0001_01_01_000001_create_cache_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `idPago` int(11) NOT NULL,
  `monto` decimal(6,2) DEFAULT NULL,
  `fechaPago` datetime DEFAULT NULL,
  `metodoPago` varchar(30) DEFAULT NULL,
  `idReserva` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`idPago`, `monto`, `fechaPago`, `metodoPago`, `idReserva`) VALUES
(1, 150.00, '2024-06-01 10:30:00', 'Tarjeta de crédito', 1),
(2, 450.00, '2024-06-02 11:30:00', 'PayPal', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajeros`
--

CREATE TABLE `pasajeros` (
  `idPasajero` int(11) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `pasaporte` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pasajeros`
--

INSERT INTO `pasajeros` (`idPasajero`, `nombres`, `apellidos`, `fechaNac`, `dni`, `pasaporte`) VALUES
(1, 'John', 'Doe', '1985-05-15', '12345678', 'AB123456'),
(2, 'Jane', 'Smith', '1990-06-20', '87654321', 'CD987654'),
(3, 'Tania', 'Trinidad', '2005-03-18', '32423434', 'JSFJ2342');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `idReserva` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `ticket` varchar(15) DEFAULT NULL,
  `total` decimal(6,2) DEFAULT NULL,
  `idPasajero` int(11) DEFAULT NULL,
  `idVuelo` int(11) DEFAULT NULL,
  `idUsuario` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`idReserva`, `fecha`, `ticket`, `total`, `idPasajero`, `idVuelo`, `idUsuario`) VALUES
(1, '2024-06-01 10:00:00', 'TICKET001', 150.00, 1, 1, 2),
(2, '2024-06-02 11:00:00', 'TICKET002', 450.00, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `descripcion` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('o9vz3MorF05lUzR4SltfO2rlzgnmN0RAgyi6b9SZ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZVV1MXdDUjB1OEhwUVNzMmdJanhxQnNBWDJZbHlOcTkzNFVrbnczMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1719366119);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoasientos`
--

CREATE TABLE `tipoasientos` (
  `idTipoAsiento` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `precio` decimal(6,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoasientos`
--

INSERT INTO `tipoasientos` (`idTipoAsiento`, `descripcion`, `precio`) VALUES
(1, 'Económica', 100.00),
(2, 'Business', 300.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tripulacion`
--

CREATE TABLE `tripulacion` (
  `idTripulacion` int(11) NOT NULL,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `cargo` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tripulacion`
--

INSERT INTO `tripulacion` (`idTripulacion`, `nombres`, `apellidos`, `dni`, `cargo`) VALUES
(1, 'Jose', 'Joseee', '32423489', 'Piloto'),
(2, 'Ana', 'Gómez', '98765432', 'Azafata'),
(3, 'Felipe', 'Garcia', '29323432', 'Cargador'),
(5, 'Renzo', 'Flores', '12394033', 'Copiloto'),
(15, 'Renzo', 'Hugooooo', '92934203', 'Cargador'),
(16, 'Yuri', 'Estrada', '92349239', 'Copiloto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tripulacionvuelo`
--

CREATE TABLE `tripulacionvuelo` (
  `idTripulacionVuelo` int(11) NOT NULL,
  `idVuelo` int(11) DEFAULT NULL,
  `idTripulacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tripulacionvuelo`
--

INSERT INTO `tripulacionvuelo` (`idTripulacionVuelo`, `idVuelo`, `idTripulacion`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `fechaNac` date NOT NULL,
  `idRol` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombres`, `apellidos`, `email`, `password`, `dni`, `telefono`, `fechaNac`, `idRol`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@admin.com', '$2y$12$He6N4ZY5PQy00O7jzNRJ7OWsML3L6EP9cZ5niFNNPNLij0FUjxIly', '39849345', '+51971672063', '1978-05-28', 1, NULL, 'pTnz70lxyUJ76mXwYtgTR02hWaTQNu08QH5KWGGOxrYh8ntw1IFnnKtmeyNy', '2024-06-12 04:44:20', '2024-06-24 10:11:30'),
(2, 'Tania', 'Trinidad', 'tania@gmail.com', '$2y$12$GOw8XpmakVyIgXEqIpVWAOfJoWc3oGvQQZZNECnV172bpIiz/fXau', '28123123', '+51990234123', '2003-06-15', 1, NULL, NULL, '2024-06-13 12:18:02', '2024-06-13 12:18:02'),
(10, 'Gabi', 'Terrones', 'gabi@gmail.com', '$2y$12$Gq/tUKiKpYiXcB0wVWPd9.jv3dqXMXcivV4TVvX3dPw5wmwrOJoea', '12367559', '6546787', '1997-03-18', 2, NULL, NULL, '2024-06-16 07:16:22', '2024-06-16 07:16:22'),
(11, 'Margonalda', 'Gutierrez', 'margon@example.com', '$2y$12$W6pu3li2o7hHb1Eh8sdYe.YUCuD541qTuKoPI68go60V0BOxHtNJa', '23423434', '51971672063', '2023-08-09', 2, NULL, NULL, '2024-06-16 07:36:19', '2024-06-24 02:58:21'),
(18, 'Maria', 'Antineta', 'anto@gmail.com', '$2y$12$sbU7tn.s2KP9SIMtWpuPK.wtUsamjMXw2ZWPDvIDuLACH8B10SLCe', '39849343', '906004978', '2024-05-30', 1, NULL, NULL, '2024-06-21 05:30:57', '2024-06-21 05:30:57'),
(19, 'Julieta', 'Venegas', 'julieta@example.com', '$2y$12$V2nebg5DuJ/teZISSiQh9ubpYOgBOxdqB9L7MCoE68ayezqjsB7Na', '39849343', '906004978', '2024-05-31', 1, NULL, NULL, '2024-06-21 05:36:50', '2024-06-21 05:36:50'),
(20, 'Jhonatan', 'Guanilo', 'guanilo@example.com', '$2y$12$/C68.Vpzme7pbyoMObRj0.intgYpVUUMDzNW1O9bDzMdBRRdf.ErG', '12345678', '123456789', '2024-05-29', 1, NULL, NULL, '2024-06-21 05:39:48', '2024-06-21 05:39:48'),
(22, 'Fertrudis', 'Garcia', 'fer@example.com', '$2y$12$ytcYcJrOWTakf6k2uI0pNO59VxpSrOmWWRNICs7ahAZrOow6Exlye', '39849343', '1234567', '2024-06-06', 1, NULL, NULL, '2024-06-21 06:06:36', '2024-06-23 10:20:18'),
(23, 'Juan', 'Perez', 'juan@example.com', '$2y$12$aCKKRP4B3V3CwTrfS0HcdezRWWRdI5zGyU8IYtQPItXK.Z.5dkvVm', '12345675', '87897979', '2024-04-17', 2, NULL, NULL, '2024-06-23 06:40:58', '2024-06-23 06:40:58'),
(24, 'Carlos', 'Carlin', 'carlin@example.com', '$2y$12$DT9bzsUN6q9aEtvewk4tqeSdXppcrPdH8/ZkKstN2qTf.GV7U.xJy', '22001199', '+51971672063', '2002-04-06', 1, NULL, NULL, '2024-06-23 07:29:39', '2024-06-23 07:29:39'),
(27, 'Roberto', 'Gomez Verguenza', 'rbol@example.com', '$2y$12$Dmmiw582hqwGkdmIk520QeKcx1HNlviXR4B7NRVs.xmkaqQlom06.', '77444411', '197865466', '1987-06-18', 1, NULL, NULL, '2024-06-23 08:50:53', '2024-06-23 10:35:20'),
(30, 'Adolfo', 'Aguilar Mendoza', 'adolfo@example.com', '$2y$12$.ONzIVXbxmlGFaccIh4NR.TQQCCocjzlyr2bcYXIabRXEpgoqBEYO', '87877878', '+51971672063', '2017-06-13', 1, NULL, NULL, '2024-06-24 02:58:04', '2024-06-24 02:58:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelos`
--

CREATE TABLE `vuelos` (
  `idVuelo` int(11) NOT NULL,
  `nroVuelo` varchar(8) DEFAULT NULL,
  `origen` varchar(45) DEFAULT NULL,
  `destino` varchar(45) DEFAULT NULL,
  `fechaSalida` datetime DEFAULT NULL,
  `fechaLlegada` datetime DEFAULT NULL,
  `precio` decimal(6,2) DEFAULT NULL,
  `terminal` varchar(15) DEFAULT NULL,
  `puerta` varchar(15) DEFAULT NULL,
  `idEstadoVuelo` int(11) DEFAULT NULL,
  `idAvion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vuelos`
--

INSERT INTO `vuelos` (`idVuelo`, `nroVuelo`, `origen`, `destino`, `fechaSalida`, `fechaLlegada`, `precio`, `terminal`, `puerta`, `idEstadoVuelo`, `idAvion`) VALUES
(1, 'AA100', 'Lima', 'Buenos Aires', '2024-07-01 08:00:00', '2024-07-01 12:00:00', 540.50, 'T1', 'A1', 1, 1),
(2, 'AA200', 'Lima', 'New York', '2024-07-01 09:00:00', '2024-07-01 17:00:00', 865.25, 'T2', 'B2', 1, 2),
(3, 'GT-4353', 'Lima', 'Montevideo', '2024-04-06 16:15:00', '2024-12-06 19:30:00', 535.55, 'T3', 'P3', 2, 2),
(7, 'GT-4353', 'Trujilllo', 'Buenos Aires', '2024-06-06 18:20:00', '2024-09-06 09:25:00', 535.55, 'T2', 'P3', 1, 2),
(8, 'GT-4353', 'Trujilllo', 'Madrid', '2024-06-21 17:15:00', '2024-06-28 22:45:00', 1200.00, 'T3', 'P3', 2, 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asientos`
--
ALTER TABLE `asientos`
  ADD PRIMARY KEY (`idAsiento`),
  ADD KEY `idTipoAsiento` (`idTipoAsiento`),
  ADD KEY `idAvion` (`idAvion`);

--
-- Indices de la tabla `aviones`
--
ALTER TABLE `aviones`
  ADD PRIMARY KEY (`idAvion`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `detallereserva`
--
ALTER TABLE `detallereserva`
  ADD PRIMARY KEY (`idDetalleReserva`),
  ADD KEY `idReserva` (`idReserva`),
  ADD KEY `idAsiento` (`idAsiento`);

--
-- Indices de la tabla `estadovuelo`
--
ALTER TABLE `estadovuelo`
  ADD PRIMARY KEY (`idEstadoVuelo`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`idPago`),
  ADD KEY `idReserva` (`idReserva`);

--
-- Indices de la tabla `pasajeros`
--
ALTER TABLE `pasajeros`
  ADD PRIMARY KEY (`idPasajero`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `idPasajero` (`idPasajero`),
  ADD KEY `idVuelo` (`idVuelo`),
  ADD KEY `FK_reservas_aerolinea.users` (`idUsuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `tipoasientos`
--
ALTER TABLE `tipoasientos`
  ADD PRIMARY KEY (`idTipoAsiento`);

--
-- Indices de la tabla `tripulacion`
--
ALTER TABLE `tripulacion`
  ADD PRIMARY KEY (`idTripulacion`);

--
-- Indices de la tabla `tripulacionvuelo`
--
ALTER TABLE `tripulacionvuelo`
  ADD PRIMARY KEY (`idTripulacionVuelo`),
  ADD KEY `idVuelo` (`idVuelo`),
  ADD KEY `idTripulacion` (`idTripulacion`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD PRIMARY KEY (`idVuelo`),
  ADD KEY `idEstadoVuelo` (`idEstadoVuelo`),
  ADD KEY `idAvion` (`idAvion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asientos`
--
ALTER TABLE `asientos`
  MODIFY `idAsiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `aviones`
--
ALTER TABLE `aviones`
  MODIFY `idAvion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `detallereserva`
--
ALTER TABLE `detallereserva`
  MODIFY `idDetalleReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estadovuelo`
--
ALTER TABLE `estadovuelo`
  MODIFY `idEstadoVuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `idPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `pasajeros`
--
ALTER TABLE `pasajeros`
  MODIFY `idPasajero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipoasientos`
--
ALTER TABLE `tipoasientos`
  MODIFY `idTipoAsiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tripulacion`
--
ALTER TABLE `tripulacion`
  MODIFY `idTripulacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `tripulacionvuelo`
--
ALTER TABLE `tripulacionvuelo`
  MODIFY `idTripulacionVuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `vuelos`
--
ALTER TABLE `vuelos`
  MODIFY `idVuelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asientos`
--
ALTER TABLE `asientos`
  ADD CONSTRAINT `asientos_ibfk_1` FOREIGN KEY (`idTipoAsiento`) REFERENCES `tipoasientos` (`idTipoAsiento`),
  ADD CONSTRAINT `asientos_ibfk_2` FOREIGN KEY (`idAvion`) REFERENCES `aviones` (`idAvion`);

--
-- Filtros para la tabla `detallereserva`
--
ALTER TABLE `detallereserva`
  ADD CONSTRAINT `detallereserva_ibfk_1` FOREIGN KEY (`idReserva`) REFERENCES `reservas` (`idReserva`),
  ADD CONSTRAINT `detallereserva_ibfk_2` FOREIGN KEY (`idAsiento`) REFERENCES `asientos` (`idAsiento`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`idReserva`) REFERENCES `reservas` (`idReserva`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `FK_reservas_aerolinea.users` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`idPasajero`) REFERENCES `pasajeros` (`idPasajero`),
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`idVuelo`) REFERENCES `vuelos` (`idVuelo`);

--
-- Filtros para la tabla `tripulacionvuelo`
--
ALTER TABLE `tripulacionvuelo`
  ADD CONSTRAINT `tripulacionvuelo_ibfk_1` FOREIGN KEY (`idVuelo`) REFERENCES `vuelos` (`idVuelo`),
  ADD CONSTRAINT `tripulacionvuelo_ibfk_2` FOREIGN KEY (`idTripulacion`) REFERENCES `tripulacion` (`idTripulacion`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `idRol` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`);

--
-- Filtros para la tabla `vuelos`
--
ALTER TABLE `vuelos`
  ADD CONSTRAINT `vuelos_ibfk_1` FOREIGN KEY (`idEstadoVuelo`) REFERENCES `estadovuelo` (`idEstadoVuelo`),
  ADD CONSTRAINT `vuelos_ibfk_2` FOREIGN KEY (`idAvion`) REFERENCES `aviones` (`idAvion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
