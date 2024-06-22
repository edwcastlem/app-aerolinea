-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.7.0.6850
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para aerolinea
CREATE DATABASE IF NOT EXISTS `aerolinea` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `aerolinea`;

-- Volcando estructura para tabla aerolinea.asientos
CREATE TABLE IF NOT EXISTS `asientos` (
  `idAsiento` int(11) NOT NULL AUTO_INCREMENT,
  `codAsiento` varchar(10) DEFAULT NULL,
  `idTipoAsiento` int(11) DEFAULT NULL,
  `idAvion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAsiento`),
  KEY `idTipoAsiento` (`idTipoAsiento`),
  KEY `idAvion` (`idAvion`),
  CONSTRAINT `asientos_ibfk_1` FOREIGN KEY (`idTipoAsiento`) REFERENCES `tipoasientos` (`idTipoAsiento`),
  CONSTRAINT `asientos_ibfk_2` FOREIGN KEY (`idAvion`) REFERENCES `aviones` (`idAvion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla aerolinea.asientos: ~2 rows (aproximadamente)
INSERT INTO `asientos` (`idAsiento`, `codAsiento`, `idTipoAsiento`, `idAvion`) VALUES
	(1, '1A', 1, 1),
	(2, '1B', 2, 2);

-- Volcando estructura para tabla aerolinea.aviones
CREATE TABLE IF NOT EXISTS `aviones` (
  `idAvion` int(11) NOT NULL AUTO_INCREMENT,
  `modelo` varchar(10) DEFAULT NULL,
  `nroRegistro` varchar(10) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAvion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla aerolinea.aviones: ~2 rows (aproximadamente)
INSERT INTO `aviones` (`idAvion`, `modelo`, `nroRegistro`, `capacidad`) VALUES
	(1, 'Boeing 737', 'N12345', 150),
	(2, 'Airbus A32', 'N54321', 180);

-- Volcando estructura para tabla aerolinea.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aerolinea.cache: ~4 rows (aproximadamente)
INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
	('1521143@senati.pe|127.0.0.1', 'i:1;', 1718498423),
	('1521143@senati.pe|127.0.0.1:timer', 'i:1718498423;', 1718498423),
	('edcastle25@gmail.com|127.0.0.1', 'i:1;', 1718992337),
	('edcastle25@gmail.com|127.0.0.1:timer', 'i:1718992337;', 1718992337);

-- Volcando estructura para tabla aerolinea.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aerolinea.cache_locks: ~0 rows (aproximadamente)

-- Volcando estructura para tabla aerolinea.detallereserva
CREATE TABLE IF NOT EXISTS `detallereserva` (
  `idDetalleReserva` int(11) NOT NULL AUTO_INCREMENT,
  `idReserva` int(11) DEFAULT NULL,
  `idAsiento` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDetalleReserva`),
  KEY `idReserva` (`idReserva`),
  KEY `idAsiento` (`idAsiento`),
  CONSTRAINT `detallereserva_ibfk_1` FOREIGN KEY (`idReserva`) REFERENCES `reservas` (`idReserva`),
  CONSTRAINT `detallereserva_ibfk_2` FOREIGN KEY (`idAsiento`) REFERENCES `asientos` (`idAsiento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla aerolinea.detallereserva: ~2 rows (aproximadamente)
INSERT INTO `detallereserva` (`idDetalleReserva`, `idReserva`, `idAsiento`) VALUES
	(1, 1, 1),
	(2, 2, 2);

-- Volcando estructura para tabla aerolinea.estadovuelo
CREATE TABLE IF NOT EXISTS `estadovuelo` (
  `idEstadoVuelo` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idEstadoVuelo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla aerolinea.estadovuelo: ~3 rows (aproximadamente)
INSERT INTO `estadovuelo` (`idEstadoVuelo`, `estado`) VALUES
	(1, 'Programado'),
	(2, 'En vuelo'),
	(3, 'Aterrizado');

-- Volcando estructura para tabla aerolinea.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=108 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aerolinea.migrations: ~2 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(104, '0001_01_01_000000_create_users_table', 1),
	(105, '0001_01_01_000001_create_cache_table', 1);

-- Volcando estructura para tabla aerolinea.pagos
CREATE TABLE IF NOT EXISTS `pagos` (
  `idPago` int(11) NOT NULL AUTO_INCREMENT,
  `monto` decimal(6,2) DEFAULT NULL,
  `fechaPago` datetime DEFAULT NULL,
  `metodoPago` varchar(30) DEFAULT NULL,
  `idReserva` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPago`),
  KEY `idReserva` (`idReserva`),
  CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`idReserva`) REFERENCES `reservas` (`idReserva`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla aerolinea.pagos: ~2 rows (aproximadamente)
INSERT INTO `pagos` (`idPago`, `monto`, `fechaPago`, `metodoPago`, `idReserva`) VALUES
	(1, 150.00, '2024-06-01 10:30:00', 'Tarjeta de crédito', 1),
	(2, 450.00, '2024-06-02 11:30:00', 'PayPal', 2);

-- Volcando estructura para tabla aerolinea.pasajeros
CREATE TABLE IF NOT EXISTS `pasajeros` (
  `idPasajero` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `pasaporte` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`idPasajero`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla aerolinea.pasajeros: ~3 rows (aproximadamente)
INSERT INTO `pasajeros` (`idPasajero`, `nombres`, `apellidos`, `fechaNac`, `dni`, `pasaporte`) VALUES
	(1, 'John', 'Doe', '1985-05-15', '12345678', 'AB123456'),
	(2, 'Jane', 'Smith', '1990-06-20', '87654321', 'CD987654'),
	(3, 'Tania', 'Trinidad', '2005-03-18', '32423434', 'JSFJ2342');

-- Volcando estructura para tabla aerolinea.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aerolinea.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla aerolinea.reservas
CREATE TABLE IF NOT EXISTS `reservas` (
  `idReserva` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `ticket` varchar(15) DEFAULT NULL,
  `total` decimal(6,2) DEFAULT NULL,
  `idPasajero` int(11) DEFAULT NULL,
  `idVuelo` int(11) DEFAULT NULL,
  `idUsuario` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`idReserva`),
  KEY `idPasajero` (`idPasajero`),
  KEY `idVuelo` (`idVuelo`),
  KEY `FK_reservas_aerolinea.users` (`idUsuario`),
  CONSTRAINT `FK_reservas_aerolinea.users` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`id`),
  CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`idPasajero`) REFERENCES `pasajeros` (`idPasajero`),
  CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`idVuelo`) REFERENCES `vuelos` (`idVuelo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla aerolinea.reservas: ~2 rows (aproximadamente)
INSERT INTO `reservas` (`idReserva`, `fecha`, `ticket`, `total`, `idPasajero`, `idVuelo`, `idUsuario`) VALUES
	(1, '2024-06-01 10:00:00', 'TICKET001', 150.00, 1, 1, 2),
	(2, '2024-06-02 11:00:00', 'TICKET002', 450.00, 2, 2, 2);

-- Volcando estructura para tabla aerolinea.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla aerolinea.roles: ~2 rows (aproximadamente)
INSERT INTO `roles` (`idRol`, `descripcion`) VALUES
	(1, 'Administrador'),
	(2, 'Usuario');

-- Volcando estructura para tabla aerolinea.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aerolinea.sessions: ~1 rows (aproximadamente)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('OyxRxLyPqgWUM7kN5kBffp8mDZWMIh9BNWn9G24H', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQk0zVllIaHNBZTdoeVBGc2ZkVFJLVjRRa21wenFzbHByMml1NTEyNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM0OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYWRtaW4vdHJpcHVsYWNpb24/X3Rva2VuPUJNM1ZZSGhzQWU3aHlQRnNmZFRSS1Y0UWttcHpxc2xwcjJpdTUxMjQmYXBlbGxpZG9zPSZjYXJnbz0mZG5pPSZpZFRyaXB1bGFjaW9uPSZub21icmVzPSI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1718994983);

-- Volcando estructura para tabla aerolinea.tipoasientos
CREATE TABLE IF NOT EXISTS `tipoasientos` (
  `idTipoAsiento` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `precio` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`idTipoAsiento`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla aerolinea.tipoasientos: ~2 rows (aproximadamente)
INSERT INTO `tipoasientos` (`idTipoAsiento`, `descripcion`, `precio`) VALUES
	(1, 'Primera Clase', 100.00),
	(2, 'Ejecutiva', 100.00),
	(3, 'Económica Premium', 100.00),
	(4, 'Económica', 100.00);

-- Volcando estructura para tabla aerolinea.tripulacion
CREATE TABLE IF NOT EXISTS `tripulacion` (
  `idTripulacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `dni` varchar(8) DEFAULT NULL,
  `cargo` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`idTripulacion`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla aerolinea.tripulacion: ~6 rows (aproximadamente)
INSERT INTO `tripulacion` (`idTripulacion`, `nombres`, `apellidos`, `dni`, `cargo`) VALUES
	(1, 'Jose', 'Joseee', '32423489', 'Piloto'),
	(2, 'Ana', 'Gómez', '98765432', 'Azafata'),
	(3, 'Felipe', 'Garcia', '29323432', 'Cargador'),
	(4, 'Alonso', 'Jotamari', '23492394', 'Copiloto'),
	(5, 'Renzo', 'Flores', '12394033', 'Copiloto'),
	(10, 'Yoshimar', 'Yotun', '15648752', 'Futbolista');

-- Volcando estructura para tabla aerolinea.tripulacionvuelo
CREATE TABLE IF NOT EXISTS `tripulacionvuelo` (
  `idTripulacionVuelo` int(11) NOT NULL AUTO_INCREMENT,
  `idVuelo` int(11) DEFAULT NULL,
  `idTripulacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTripulacionVuelo`),
  KEY `idVuelo` (`idVuelo`),
  KEY `idTripulacion` (`idTripulacion`),
  CONSTRAINT `tripulacionvuelo_ibfk_1` FOREIGN KEY (`idVuelo`) REFERENCES `vuelos` (`idVuelo`),
  CONSTRAINT `tripulacionvuelo_ibfk_2` FOREIGN KEY (`idTripulacion`) REFERENCES `tripulacion` (`idTripulacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla aerolinea.tripulacionvuelo: ~2 rows (aproximadamente)
INSERT INTO `tripulacionvuelo` (`idTripulacionVuelo`, `idVuelo`, `idTripulacion`) VALUES
	(1, 1, 1),
	(2, 2, 2);

-- Volcando estructura para tabla aerolinea.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `idRol` (`idRol`),
  CONSTRAINT `idRol` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla aerolinea.users: ~18 rows (aproximadamente)
INSERT INTO `users` (`id`, `nombres`, `apellidos`, `email`, `password`, `dni`, `telefono`, `fechaNac`, `idRol`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Edward J.', 'Castillo', 'edcastle25@gmail.com', '$2y$12$qDxeCzP5DKwqDf1rhGkSfu7T8hBLxQu648qS.hUML0KIWiGrtAYg6', '38247238', '+51834348839', '1990-05-10', 1, NULL, 'QvXoQ0BglaWmap80zn4dQx2SKxqwSzMlJCa6l3xQvC1CD6OfcMlPmESiCr3E', '2024-06-12 04:44:20', '2024-06-21 07:22:29'),
	(2, 'Tania', 'Trinidad', 'tania@gmail.com', '$2y$12$GOw8XpmakVyIgXEqIpVWAOfJoWc3oGvQQZZNECnV172bpIiz/fXau', '28123123', '+51990234123', '2003-06-15', 1, NULL, NULL, '2024-06-13 12:18:02', '2024-06-13 12:18:02'),
	(5, 'Carlos', 'Contreras', 'ccontreras@gmail.com', '$2y$12$q8GQOgxBatVIxYNAZtGoUeF6SQQ7qxcgDl1oLVBxNwLEaYq3.eMUm', '12356778', '345978798', '1999-05-07', 1, NULL, NULL, '2024-06-14 07:33:29', '2024-06-14 07:33:29'),
	(7, 'Victor', 'Garci', 'victor@gmail.com', '$2y$12$wbqaZCTOjg0ckeBlgljN4O83Uu/jaS4bkLpSSQl96jnyrPBPaKEaK', '54646464', '+51123456456', '1990-05-10', 2, NULL, NULL, '2024-06-16 05:10:11', '2024-06-16 05:10:11'),
	(8, 'Ruben Harold', 'Fernandez', 'ruben@gmail.com', '$2y$12$1meVwVobP/jBT5BszMXvb.Bh2GJImqZDoMmQzw7eIkoc.e79L80ZW', '12345678', '546465464', '1999-10-05', 1, NULL, NULL, '2024-06-16 06:40:23', '2024-06-16 06:41:17'),
	(9, 'Prueba', 'Jimenez', 'jimenez@gmail.com', '$2y$12$QYDFz2OHyNNiyW8KpvIRQ.eFSx6nVwSLok6rnGC6g7P2.xnmysjx2', '56465454', '654654654', '1997-04-12', 2, NULL, NULL, '2024-06-16 07:15:06', '2024-06-16 07:15:06'),
	(10, 'Gabi', 'Terrones', 'gabi@gmail.com', '$2y$12$Gq/tUKiKpYiXcB0wVWPd9.jv3dqXMXcivV4TVvX3dPw5wmwrOJoea', '12367559', '6546787', '1997-03-18', 2, NULL, NULL, '2024-06-16 07:16:22', '2024-06-16 07:16:22'),
	(11, 'Jorge', 'Fernandez', 'jorge@gmail.com', '$2y$12$ziHebrQQbsGF3HuebWKhw.nKOLqZNKTeYj4hlAxnLxqA7U6vw8hqu', '12345578', '34165454', '2005-03-12', 2, NULL, NULL, '2024-06-16 07:36:19', '2024-06-16 07:36:19'),
	(12, 'Jhonatan', 'Trinidad', 'edcastle30@gmail.com', '$2y$12$PGLg.i/6I3ECko2ekqhHgeoMrVbhmEX7XDLJC7kG/ll3kIq6aWpJ.', '97648174', '65654654654', '2024-06-06', 2, NULL, NULL, '2024-06-19 02:45:00', '2024-06-19 02:45:00'),
	(13, 'Irene', 'Melendez', 'irene@example.pe', '$2y$12$bNJgdw4.LR52i6RS0quBqu8pwOpZvQJEttL/LSr5E54zJxpPBycue', '22129201', '923492387', '2024-06-07', 2, NULL, NULL, '2024-06-19 02:56:56', '2024-06-19 02:56:56'),
	(14, 'Jhonatan', 'Quiroz', 'quiroz@example.pe', '$2y$12$TEPqGKwevCWP3Hpu.Hc3sOgSElZAoJYSrgpTySyVGixorUZ0ypT2S', '87946522', '878916546', '2024-05-30', 2, NULL, NULL, '2024-06-19 02:58:44', '2024-06-19 02:58:44'),
	(15, 'Francisco', 'Toribio', 'francisco@example.pe', '$2y$12$CMsOYBikC7jQSU9wNm/OCuIOXAgvNmudzfmzcqMaADcVXmM7OuGSe', '32423433', '23492343', '2024-05-29', 1, NULL, NULL, '2024-06-19 04:50:23', '2024-06-19 04:50:23'),
	(16, 'Roberto', 'Gomez', 'edcastle29@gmail.com', '$2y$12$TLzbTwgd5iuIIcuquDbZ1O2RunLQEp5CegXGGtSWlIEJUFc5tY/WC', '39849343', '906004978', '2024-06-06', 1, NULL, NULL, '2024-06-21 05:22:58', '2024-06-21 05:22:58'),
	(17, 'Angelines', 'Ferandnez', 'karina2@senati.pe', '$2y$12$wMWPHWkIZES6Kv.759m7b.I77WWoFXNXICBSJOyM56dJ5mJPcsxR2', '39849343', '906004978', '2024-06-10', 1, NULL, NULL, '2024-06-21 05:29:08', '2024-06-21 05:29:08'),
	(18, 'Maria', 'Antineta', 'anto@gmail.com', '$2y$12$sbU7tn.s2KP9SIMtWpuPK.wtUsamjMXw2ZWPDvIDuLACH8B10SLCe', '39849343', '906004978', '2024-05-30', 1, NULL, NULL, '2024-06-21 05:30:57', '2024-06-21 05:30:57'),
	(19, 'Julieta', 'Venegas', 'julieta@example.com', '$2y$12$V2nebg5DuJ/teZISSiQh9ubpYOgBOxdqB9L7MCoE68ayezqjsB7Na', '39849343', '906004978', '2024-05-31', 1, NULL, NULL, '2024-06-21 05:36:50', '2024-06-21 05:36:50'),
	(20, 'Jhonatan', 'Guanilo', 'guanilo@example.com', '$2y$12$/C68.Vpzme7pbyoMObRj0.intgYpVUUMDzNW1O9bDzMdBRRdf.ErG', '12345678', '123456789', '2024-05-29', 1, NULL, NULL, '2024-06-21 05:39:48', '2024-06-21 05:39:48'),
	(21, 'Morena', 'Morelos', 'morelos@gmail.com', '$2y$12$HbsAL0MpOMHM7sCQDRQc0ubRN38XyApIOvrhrVHz6FZskBBXIel.G', '39849345', '456465546', '2024-05-29', 1, NULL, NULL, '2024-06-21 05:42:05', '2024-06-21 05:42:05'),
	(22, 'Fer', 'Mana', 'fer@example.com', '$2y$12$ytcYcJrOWTakf6k2uI0pNO59VxpSrOmWWRNICs7ahAZrOow6Exlye', '39849343', '1234567', '2024-06-06', 1, NULL, NULL, '2024-06-21 06:06:36', '2024-06-21 06:06:36');

-- Volcando estructura para tabla aerolinea.vuelos
CREATE TABLE IF NOT EXISTS `vuelos` (
  `idVuelo` int(11) NOT NULL AUTO_INCREMENT,
  `nroVuelo` varchar(8) DEFAULT NULL,
  `origen` varchar(45) DEFAULT NULL,
  `destino` varchar(45) DEFAULT NULL,
  `fechaSalida` datetime DEFAULT NULL,
  `fechaLlegada` datetime DEFAULT NULL,
  `terminal` varchar(15) DEFAULT NULL,
  `puerta` varchar(15) DEFAULT NULL,
  `idEstadoVuelo` int(11) DEFAULT NULL,
  `idAvion` int(11) DEFAULT NULL,
  PRIMARY KEY (`idVuelo`),
  KEY `idEstadoVuelo` (`idEstadoVuelo`),
  KEY `idAvion` (`idAvion`),
  CONSTRAINT `vuelos_ibfk_1` FOREIGN KEY (`idEstadoVuelo`) REFERENCES `estadovuelo` (`idEstadoVuelo`),
  CONSTRAINT `vuelos_ibfk_2` FOREIGN KEY (`idAvion`) REFERENCES `aviones` (`idAvion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla aerolinea.vuelos: ~2 rows (aproximadamente)
INSERT INTO `vuelos` (`idVuelo`, `nroVuelo`, `origen`, `destino`, `fechaSalida`, `fechaLlegada`, `terminal`, `puerta`, `idEstadoVuelo`, `idAvion`) VALUES
	(1, 'AA100', 'Lima', 'Buenos Aires', '2024-07-01 08:00:00', '2024-07-01 12:00:00', 'T1', 'A1', 1, 1),
	(2, 'AA200', 'Lima', 'New York', '2024-07-01 09:00:00', '2024-07-01 17:00:00', 'T2', 'B2', 1, 2);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
