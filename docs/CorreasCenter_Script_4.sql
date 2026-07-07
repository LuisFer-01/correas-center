-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.4.3 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para correas_center
CREATE DATABASE IF NOT EXISTS `correas_center` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `correas_center`;

-- Volcando estructura para tabla correas_center.aplicaciones
CREATE TABLE IF NOT EXISTS `aplicaciones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.aplicaciones: ~4 rows (aproximadamente)
INSERT IGNORE INTO `aplicaciones` (`id`, `nombre`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'Industria general', 1, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(2, 'Equipo de HVAC', 2, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(3, 'Césped y Jardín', 3, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(4, 'Agricultura', 4, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04');

-- Volcando estructura para tabla correas_center.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.cache: ~3 rows (aproximadamente)
INSERT IGNORE INTO `cache` (`key`, `value`, `expiration`) VALUES
	('correas-center-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6', 'i:1;', 1783439677),
	('correas-center-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6:timer', 'i:1783439677;', 1783439677),
	('correas-center-cache-spatie.permission.cache', 'a:3:{s:5:"alias";a:4:{s:1:"a";s:2:"id";s:1:"b";s:4:"name";s:1:"c";s:10:"guard_name";s:1:"r";s:5:"roles";}s:11:"permissions";a:317:{i:0;a:4:{s:1:"a";i:1;s:1:"b";s:18:"ViewAny:Aplicacion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:1;a:4:{s:1:"a";i:2;s:1:"b";s:15:"View:Aplicacion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:2;a:4:{s:1:"a";i:3;s:1:"b";s:17:"Create:Aplicacion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:3;a:4:{s:1:"a";i:4;s:1:"b";s:17:"Update:Aplicacion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:4;a:4:{s:1:"a";i:5;s:1:"b";s:17:"Delete:Aplicacion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:5;a:4:{s:1:"a";i:6;s:1:"b";s:20:"DeleteAny:Aplicacion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:6;a:4:{s:1:"a";i:7;s:1:"b";s:18:"Restore:Aplicacion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:7;a:4:{s:1:"a";i:8;s:1:"b";s:22:"ForceDelete:Aplicacion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:8;a:4:{s:1:"a";i:9;s:1:"b";s:25:"ForceDeleteAny:Aplicacion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:9;a:4:{s:1:"a";i:10;s:1:"b";s:21:"RestoreAny:Aplicacion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:10;a:4:{s:1:"a";i:11;s:1:"b";s:20:"Replicate:Aplicacion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:11;a:4:{s:1:"a";i:12;s:1:"b";s:18:"Reorder:Aplicacion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:12;a:4:{s:1:"a";i:13;s:1:"b";s:32:"ViewAny:CapacidadInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:13;a:4:{s:1:"a";i:14;s:1:"b";s:29:"View:CapacidadInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:14;a:4:{s:1:"a";i:15;s:1:"b";s:31:"Create:CapacidadInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:15;a:4:{s:1:"a";i:16;s:1:"b";s:31:"Update:CapacidadInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:16;a:4:{s:1:"a";i:17;s:1:"b";s:31:"Delete:CapacidadInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:17;a:4:{s:1:"a";i:18;s:1:"b";s:34:"DeleteAny:CapacidadInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:18;a:4:{s:1:"a";i:19;s:1:"b";s:32:"Restore:CapacidadInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:19;a:4:{s:1:"a";i:20;s:1:"b";s:36:"ForceDelete:CapacidadInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:20;a:4:{s:1:"a";i:21;s:1:"b";s:39:"ForceDeleteAny:CapacidadInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:21;a:4:{s:1:"a";i:22;s:1:"b";s:35:"RestoreAny:CapacidadInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:22;a:4:{s:1:"a";i:23;s:1:"b";s:34:"Replicate:CapacidadInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:23;a:4:{s:1:"a";i:24;s:1:"b";s:32:"Reorder:CapacidadInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:24;a:4:{s:1:"a";i:25;s:1:"b";s:37:"ViewAny:CaracteristicaInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:25;a:4:{s:1:"a";i:26;s:1:"b";s:34:"View:CaracteristicaInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:26;a:4:{s:1:"a";i:27;s:1:"b";s:36:"Create:CaracteristicaInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:27;a:4:{s:1:"a";i:28;s:1:"b";s:36:"Update:CaracteristicaInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:28;a:4:{s:1:"a";i:29;s:1:"b";s:36:"Delete:CaracteristicaInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:29;a:4:{s:1:"a";i:30;s:1:"b";s:39:"DeleteAny:CaracteristicaInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:30;a:4:{s:1:"a";i:31;s:1:"b";s:37:"Restore:CaracteristicaInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:31;a:4:{s:1:"a";i:32;s:1:"b";s:41:"ForceDelete:CaracteristicaInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:32;a:4:{s:1:"a";i:33;s:1:"b";s:44:"ForceDeleteAny:CaracteristicaInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:33;a:4:{s:1:"a";i:34;s:1:"b";s:40:"RestoreAny:CaracteristicaInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:34;a:4:{s:1:"a";i:35;s:1:"b";s:39:"Replicate:CaracteristicaInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:35;a:4:{s:1:"a";i:36;s:1:"b";s:37:"Reorder:CaracteristicaInfraestructura";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:36;a:4:{s:1:"a";i:37;s:1:"b";s:22:"ViewAny:Caracteristica";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:37;a:4:{s:1:"a";i:38;s:1:"b";s:19:"View:Caracteristica";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:38;a:4:{s:1:"a";i:39;s:1:"b";s:21:"Create:Caracteristica";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:39;a:4:{s:1:"a";i:40;s:1:"b";s:21:"Update:Caracteristica";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:40;a:4:{s:1:"a";i:41;s:1:"b";s:21:"Delete:Caracteristica";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:41;a:4:{s:1:"a";i:42;s:1:"b";s:24:"DeleteAny:Caracteristica";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:42;a:4:{s:1:"a";i:43;s:1:"b";s:22:"Restore:Caracteristica";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:43;a:4:{s:1:"a";i:44;s:1:"b";s:26:"ForceDelete:Caracteristica";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:44;a:4:{s:1:"a";i:45;s:1:"b";s:29:"ForceDeleteAny:Caracteristica";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:45;a:4:{s:1:"a";i:46;s:1:"b";s:25:"RestoreAny:Caracteristica";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:46;a:4:{s:1:"a";i:47;s:1:"b";s:24:"Replicate:Caracteristica";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:47;a:4:{s:1:"a";i:48;s:1:"b";s:22:"Reorder:Caracteristica";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:48;a:4:{s:1:"a";i:49;s:1:"b";s:17:"ViewAny:Categoria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:49;a:4:{s:1:"a";i:50;s:1:"b";s:14:"View:Categoria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:50;a:4:{s:1:"a";i:51;s:1:"b";s:16:"Create:Categoria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:51;a:4:{s:1:"a";i:52;s:1:"b";s:16:"Update:Categoria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:52;a:4:{s:1:"a";i:53;s:1:"b";s:16:"Delete:Categoria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:53;a:4:{s:1:"a";i:54;s:1:"b";s:19:"DeleteAny:Categoria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:54;a:4:{s:1:"a";i:55;s:1:"b";s:17:"Restore:Categoria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:55;a:4:{s:1:"a";i:56;s:1:"b";s:21:"ForceDelete:Categoria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:56;a:4:{s:1:"a";i:57;s:1:"b";s:24:"ForceDeleteAny:Categoria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:57;a:4:{s:1:"a";i:58;s:1:"b";s:20:"RestoreAny:Categoria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:58;a:4:{s:1:"a";i:59;s:1:"b";s:19:"Replicate:Categoria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:59;a:4:{s:1:"a";i:60;s:1:"b";s:17:"Reorder:Categoria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:60;a:4:{s:1:"a";i:61;s:1:"b";s:19:"ViewAny:Composicion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:61;a:4:{s:1:"a";i:62;s:1:"b";s:16:"View:Composicion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:62;a:4:{s:1:"a";i:63;s:1:"b";s:18:"Create:Composicion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:63;a:4:{s:1:"a";i:64;s:1:"b";s:18:"Update:Composicion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:64;a:4:{s:1:"a";i:65;s:1:"b";s:18:"Delete:Composicion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:65;a:4:{s:1:"a";i:66;s:1:"b";s:21:"DeleteAny:Composicion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:66;a:4:{s:1:"a";i:67;s:1:"b";s:19:"Restore:Composicion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:67;a:4:{s:1:"a";i:68;s:1:"b";s:23:"ForceDelete:Composicion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:68;a:4:{s:1:"a";i:69;s:1:"b";s:26:"ForceDeleteAny:Composicion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:69;a:4:{s:1:"a";i:70;s:1:"b";s:22:"RestoreAny:Composicion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:70;a:4:{s:1:"a";i:71;s:1:"b";s:21:"Replicate:Composicion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:71;a:4:{s:1:"a";i:72;s:1:"b";s:19:"Reorder:Composicion";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:72;a:4:{s:1:"a";i:73;s:1:"b";s:16:"ViewAny:Contacto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:73;a:4:{s:1:"a";i:74;s:1:"b";s:13:"View:Contacto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:74;a:4:{s:1:"a";i:75;s:1:"b";s:15:"Create:Contacto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:75;a:4:{s:1:"a";i:76;s:1:"b";s:15:"Update:Contacto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:76;a:4:{s:1:"a";i:77;s:1:"b";s:15:"Delete:Contacto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:77;a:4:{s:1:"a";i:78;s:1:"b";s:18:"DeleteAny:Contacto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:78;a:4:{s:1:"a";i:79;s:1:"b";s:16:"Restore:Contacto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:79;a:4:{s:1:"a";i:80;s:1:"b";s:20:"ForceDelete:Contacto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:80;a:4:{s:1:"a";i:81;s:1:"b";s:23:"ForceDeleteAny:Contacto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:81;a:4:{s:1:"a";i:82;s:1:"b";s:19:"RestoreAny:Contacto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:82;a:4:{s:1:"a";i:83;s:1:"b";s:18:"Replicate:Contacto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:83;a:4:{s:1:"a";i:84;s:1:"b";s:16:"Reorder:Contacto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:84;a:4:{s:1:"a";i:85;s:1:"b";s:19:"ViewAny:Diferencial";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:85;a:4:{s:1:"a";i:86;s:1:"b";s:16:"View:Diferencial";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:86;a:4:{s:1:"a";i:87;s:1:"b";s:18:"Create:Diferencial";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:87;a:4:{s:1:"a";i:88;s:1:"b";s:18:"Update:Diferencial";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:88;a:4:{s:1:"a";i:89;s:1:"b";s:18:"Delete:Diferencial";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:89;a:4:{s:1:"a";i:90;s:1:"b";s:21:"DeleteAny:Diferencial";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:90;a:4:{s:1:"a";i:91;s:1:"b";s:19:"Restore:Diferencial";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:91;a:4:{s:1:"a";i:92;s:1:"b";s:23:"ForceDelete:Diferencial";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:92;a:4:{s:1:"a";i:93;s:1:"b";s:26:"ForceDeleteAny:Diferencial";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:93;a:4:{s:1:"a";i:94;s:1:"b";s:22:"RestoreAny:Diferencial";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:94;a:4:{s:1:"a";i:95;s:1:"b";s:21:"Replicate:Diferencial";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:95;a:4:{s:1:"a";i:96;s:1:"b";s:19:"Reorder:Diferencial";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:96;a:4:{s:1:"a";i:97;s:1:"b";s:15:"ViewAny:Empresa";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:97;a:4:{s:1:"a";i:98;s:1:"b";s:12:"View:Empresa";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:98;a:4:{s:1:"a";i:99;s:1:"b";s:14:"Create:Empresa";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:99;a:4:{s:1:"a";i:100;s:1:"b";s:14:"Update:Empresa";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:100;a:4:{s:1:"a";i:101;s:1:"b";s:14:"Delete:Empresa";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:101;a:4:{s:1:"a";i:102;s:1:"b";s:17:"DeleteAny:Empresa";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:102;a:4:{s:1:"a";i:103;s:1:"b";s:15:"Restore:Empresa";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:103;a:4:{s:1:"a";i:104;s:1:"b";s:19:"ForceDelete:Empresa";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:104;a:4:{s:1:"a";i:105;s:1:"b";s:22:"ForceDeleteAny:Empresa";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:105;a:4:{s:1:"a";i:106;s:1:"b";s:18:"RestoreAny:Empresa";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:106;a:4:{s:1:"a";i:107;s:1:"b";s:17:"Replicate:Empresa";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:107;a:4:{s:1:"a";i:108;s:1:"b";s:15:"Reorder:Empresa";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:108;a:4:{s:1:"a";i:109;s:1:"b";s:14:"ViewAny:Footer";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:109;a:4:{s:1:"a";i:110;s:1:"b";s:11:"View:Footer";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:110;a:4:{s:1:"a";i:111;s:1:"b";s:13:"Create:Footer";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:111;a:4:{s:1:"a";i:112;s:1:"b";s:13:"Update:Footer";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:112;a:4:{s:1:"a";i:113;s:1:"b";s:13:"Delete:Footer";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:113;a:4:{s:1:"a";i:114;s:1:"b";s:16:"DeleteAny:Footer";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:114;a:4:{s:1:"a";i:115;s:1:"b";s:14:"Restore:Footer";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:115;a:4:{s:1:"a";i:116;s:1:"b";s:18:"ForceDelete:Footer";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:116;a:4:{s:1:"a";i:117;s:1:"b";s:21:"ForceDeleteAny:Footer";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:117;a:4:{s:1:"a";i:118;s:1:"b";s:17:"RestoreAny:Footer";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:118;a:4:{s:1:"a";i:119;s:1:"b";s:16:"Replicate:Footer";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:119;a:4:{s:1:"a";i:120;s:1:"b";s:14:"Reorder:Footer";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:120;a:4:{s:1:"a";i:121;s:1:"b";s:20:"ViewAny:GamaProducto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:121;a:4:{s:1:"a";i:122;s:1:"b";s:17:"View:GamaProducto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:122;a:4:{s:1:"a";i:123;s:1:"b";s:19:"Create:GamaProducto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:123;a:4:{s:1:"a";i:124;s:1:"b";s:19:"Update:GamaProducto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:124;a:4:{s:1:"a";i:125;s:1:"b";s:19:"Delete:GamaProducto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:125;a:4:{s:1:"a";i:126;s:1:"b";s:22:"DeleteAny:GamaProducto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:126;a:4:{s:1:"a";i:127;s:1:"b";s:20:"Restore:GamaProducto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:127;a:4:{s:1:"a";i:128;s:1:"b";s:24:"ForceDelete:GamaProducto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:128;a:4:{s:1:"a";i:129;s:1:"b";s:27:"ForceDeleteAny:GamaProducto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:129;a:4:{s:1:"a";i:130;s:1:"b";s:23:"RestoreAny:GamaProducto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:130;a:4:{s:1:"a";i:131;s:1:"b";s:22:"Replicate:GamaProducto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:131;a:4:{s:1:"a";i:132;s:1:"b";s:20:"Reorder:GamaProducto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:132;a:4:{s:1:"a";i:133;s:1:"b";s:12:"ViewAny:Hero";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:133;a:4:{s:1:"a";i:134;s:1:"b";s:9:"View:Hero";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:134;a:4:{s:1:"a";i:135;s:1:"b";s:11:"Create:Hero";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:135;a:4:{s:1:"a";i:136;s:1:"b";s:11:"Update:Hero";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:136;a:4:{s:1:"a";i:137;s:1:"b";s:11:"Delete:Hero";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:137;a:4:{s:1:"a";i:138;s:1:"b";s:14:"DeleteAny:Hero";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:138;a:4:{s:1:"a";i:139;s:1:"b";s:12:"Restore:Hero";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:139;a:4:{s:1:"a";i:140;s:1:"b";s:16:"ForceDelete:Hero";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:140;a:4:{s:1:"a";i:141;s:1:"b";s:19:"ForceDeleteAny:Hero";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:141;a:4:{s:1:"a";i:142;s:1:"b";s:15:"RestoreAny:Hero";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:142;a:4:{s:1:"a";i:143;s:1:"b";s:14:"Replicate:Hero";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:143;a:4:{s:1:"a";i:144;s:1:"b";s:12:"Reorder:Hero";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:144;a:4:{s:1:"a";i:145;s:1:"b";s:17:"ViewAny:Industria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:145;a:4:{s:1:"a";i:146;s:1:"b";s:14:"View:Industria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:146;a:4:{s:1:"a";i:147;s:1:"b";s:16:"Create:Industria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:147;a:4:{s:1:"a";i:148;s:1:"b";s:16:"Update:Industria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:148;a:4:{s:1:"a";i:149;s:1:"b";s:16:"Delete:Industria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:149;a:4:{s:1:"a";i:150;s:1:"b";s:19:"DeleteAny:Industria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:150;a:4:{s:1:"a";i:151;s:1:"b";s:17:"Restore:Industria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:151;a:4:{s:1:"a";i:152;s:1:"b";s:21:"ForceDelete:Industria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:152;a:4:{s:1:"a";i:153;s:1:"b";s:24:"ForceDeleteAny:Industria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:153;a:4:{s:1:"a";i:154;s:1:"b";s:20:"RestoreAny:Industria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:154;a:4:{s:1:"a";i:155;s:1:"b";s:19:"Replicate:Industria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:155;a:4:{s:1:"a";i:156;s:1:"b";s:17:"Reorder:Industria";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:156;a:4:{s:1:"a";i:157;s:1:"b";s:13:"ViewAny:Marca";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:157;a:4:{s:1:"a";i:158;s:1:"b";s:10:"View:Marca";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:158;a:4:{s:1:"a";i:159;s:1:"b";s:12:"Create:Marca";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:159;a:4:{s:1:"a";i:160;s:1:"b";s:12:"Update:Marca";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:160;a:4:{s:1:"a";i:161;s:1:"b";s:12:"Delete:Marca";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:161;a:4:{s:1:"a";i:162;s:1:"b";s:15:"DeleteAny:Marca";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:162;a:4:{s:1:"a";i:163;s:1:"b";s:13:"Restore:Marca";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:163;a:4:{s:1:"a";i:164;s:1:"b";s:17:"ForceDelete:Marca";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:164;a:4:{s:1:"a";i:165;s:1:"b";s:20:"ForceDeleteAny:Marca";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:165;a:4:{s:1:"a";i:166;s:1:"b";s:16:"RestoreAny:Marca";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:166;a:4:{s:1:"a";i:167;s:1:"b";s:15:"Replicate:Marca";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:167;a:4:{s:1:"a";i:168;s:1:"b";s:13:"Reorder:Marca";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:168;a:4:{s:1:"a";i:169;s:1:"b";s:14:"ViewAny:Medida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:169;a:4:{s:1:"a";i:170;s:1:"b";s:11:"View:Medida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:170;a:4:{s:1:"a";i:171;s:1:"b";s:13:"Create:Medida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:171;a:4:{s:1:"a";i:172;s:1:"b";s:13:"Update:Medida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:172;a:4:{s:1:"a";i:173;s:1:"b";s:13:"Delete:Medida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:173;a:4:{s:1:"a";i:174;s:1:"b";s:16:"DeleteAny:Medida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:174;a:4:{s:1:"a";i:175;s:1:"b";s:14:"Restore:Medida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:175;a:4:{s:1:"a";i:176;s:1:"b";s:18:"ForceDelete:Medida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:176;a:4:{s:1:"a";i:177;s:1:"b";s:21:"ForceDeleteAny:Medida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:177;a:4:{s:1:"a";i:178;s:1:"b";s:17:"RestoreAny:Medida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:178;a:4:{s:1:"a";i:179;s:1:"b";s:16:"Replicate:Medida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:179;a:4:{s:1:"a";i:180;s:1:"b";s:14:"Reorder:Medida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:180;a:4:{s:1:"a";i:181;s:1:"b";s:12:"ViewAny:Menu";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:181;a:4:{s:1:"a";i:182;s:1:"b";s:9:"View:Menu";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:182;a:4:{s:1:"a";i:183;s:1:"b";s:11:"Create:Menu";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:183;a:4:{s:1:"a";i:184;s:1:"b";s:11:"Update:Menu";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:184;a:4:{s:1:"a";i:185;s:1:"b";s:11:"Delete:Menu";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:185;a:4:{s:1:"a";i:186;s:1:"b";s:14:"DeleteAny:Menu";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:186;a:4:{s:1:"a";i:187;s:1:"b";s:12:"Restore:Menu";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:187;a:4:{s:1:"a";i:188;s:1:"b";s:16:"ForceDelete:Menu";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:188;a:4:{s:1:"a";i:189;s:1:"b";s:19:"ForceDeleteAny:Menu";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:189;a:4:{s:1:"a";i:190;s:1:"b";s:15:"RestoreAny:Menu";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:190;a:4:{s:1:"a";i:191;s:1:"b";s:14:"Replicate:Menu";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:191;a:4:{s:1:"a";i:192;s:1:"b";s:12:"Reorder:Menu";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:192;a:4:{s:1:"a";i:193;s:1:"b";s:18:"ViewAny:PasoWizard";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:193;a:4:{s:1:"a";i:194;s:1:"b";s:15:"View:PasoWizard";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:194;a:4:{s:1:"a";i:195;s:1:"b";s:17:"Create:PasoWizard";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:195;a:4:{s:1:"a";i:196;s:1:"b";s:17:"Update:PasoWizard";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:196;a:4:{s:1:"a";i:197;s:1:"b";s:17:"Delete:PasoWizard";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:197;a:4:{s:1:"a";i:198;s:1:"b";s:20:"DeleteAny:PasoWizard";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:198;a:4:{s:1:"a";i:199;s:1:"b";s:18:"Restore:PasoWizard";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:199;a:4:{s:1:"a";i:200;s:1:"b";s:22:"ForceDelete:PasoWizard";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:200;a:4:{s:1:"a";i:201;s:1:"b";s:25:"ForceDeleteAny:PasoWizard";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:201;a:4:{s:1:"a";i:202;s:1:"b";s:21:"RestoreAny:PasoWizard";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:202;a:4:{s:1:"a";i:203;s:1:"b";s:20:"Replicate:PasoWizard";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:203;a:4:{s:1:"a";i:204;s:1:"b";s:18:"Reorder:PasoWizard";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:204;a:4:{s:1:"a";i:205;s:1:"b";s:23:"ViewAny:PorqueElegirnos";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:205;a:4:{s:1:"a";i:206;s:1:"b";s:20:"View:PorqueElegirnos";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:206;a:4:{s:1:"a";i:207;s:1:"b";s:22:"Create:PorqueElegirnos";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:207;a:4:{s:1:"a";i:208;s:1:"b";s:22:"Update:PorqueElegirnos";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:208;a:4:{s:1:"a";i:209;s:1:"b";s:22:"Delete:PorqueElegirnos";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:209;a:4:{s:1:"a";i:210;s:1:"b";s:25:"DeleteAny:PorqueElegirnos";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:210;a:4:{s:1:"a";i:211;s:1:"b";s:23:"Restore:PorqueElegirnos";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:211;a:4:{s:1:"a";i:212;s:1:"b";s:27:"ForceDelete:PorqueElegirnos";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:212;a:4:{s:1:"a";i:213;s:1:"b";s:30:"ForceDeleteAny:PorqueElegirnos";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:213;a:4:{s:1:"a";i:214;s:1:"b";s:26:"RestoreAny:PorqueElegirnos";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:214;a:4:{s:1:"a";i:215;s:1:"b";s:25:"Replicate:PorqueElegirnos";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:215;a:4:{s:1:"a";i:216;s:1:"b";s:23:"Reorder:PorqueElegirnos";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:216;a:4:{s:1:"a";i:217;s:1:"b";s:16:"ViewAny:Producto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:217;a:4:{s:1:"a";i:218;s:1:"b";s:13:"View:Producto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:218;a:4:{s:1:"a";i:219;s:1:"b";s:15:"Create:Producto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:219;a:4:{s:1:"a";i:220;s:1:"b";s:15:"Update:Producto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:220;a:4:{s:1:"a";i:221;s:1:"b";s:15:"Delete:Producto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:221;a:4:{s:1:"a";i:222;s:1:"b";s:18:"DeleteAny:Producto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:222;a:4:{s:1:"a";i:223;s:1:"b";s:16:"Restore:Producto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:223;a:4:{s:1:"a";i:224;s:1:"b";s:20:"ForceDelete:Producto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:224;a:4:{s:1:"a";i:225;s:1:"b";s:23:"ForceDeleteAny:Producto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:225;a:4:{s:1:"a";i:226;s:1:"b";s:19:"RestoreAny:Producto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:226;a:4:{s:1:"a";i:227;s:1:"b";s:18:"Replicate:Producto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:227;a:4:{s:1:"a";i:228;s:1:"b";s:16:"Reorder:Producto";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:228;a:4:{s:1:"a";i:229;s:1:"b";s:12:"ViewAny:User";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:229;a:4:{s:1:"a";i:230;s:1:"b";s:9:"View:User";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:230;a:4:{s:1:"a";i:231;s:1:"b";s:11:"Create:User";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:231;a:4:{s:1:"a";i:232;s:1:"b";s:11:"Update:User";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:232;a:4:{s:1:"a";i:233;s:1:"b";s:11:"Delete:User";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:233;a:4:{s:1:"a";i:234;s:1:"b";s:14:"DeleteAny:User";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:234;a:4:{s:1:"a";i:235;s:1:"b";s:12:"Restore:User";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:235;a:4:{s:1:"a";i:236;s:1:"b";s:16:"ForceDelete:User";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:236;a:4:{s:1:"a";i:237;s:1:"b";s:19:"ForceDeleteAny:User";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:237;a:4:{s:1:"a";i:238;s:1:"b";s:15:"RestoreAny:User";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:238;a:4:{s:1:"a";i:239;s:1:"b";s:14:"Replicate:User";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:239;a:4:{s:1:"a";i:240;s:1:"b";s:12:"Reorder:User";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:240;a:4:{s:1:"a";i:241;s:1:"b";s:16:"ViewAny:Registro";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:241;a:4:{s:1:"a";i:242;s:1:"b";s:13:"View:Registro";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:242;a:4:{s:1:"a";i:243;s:1:"b";s:15:"Create:Registro";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:243;a:4:{s:1:"a";i:244;s:1:"b";s:15:"Update:Registro";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:244;a:4:{s:1:"a";i:245;s:1:"b";s:15:"Delete:Registro";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:245;a:4:{s:1:"a";i:246;s:1:"b";s:18:"DeleteAny:Registro";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:246;a:4:{s:1:"a";i:247;s:1:"b";s:16:"Restore:Registro";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:247;a:4:{s:1:"a";i:248;s:1:"b";s:20:"ForceDelete:Registro";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:248;a:4:{s:1:"a";i:249;s:1:"b";s:23:"ForceDeleteAny:Registro";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:249;a:4:{s:1:"a";i:250;s:1:"b";s:19:"RestoreAny:Registro";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:250;a:4:{s:1:"a";i:251;s:1:"b";s:18:"Replicate:Registro";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:251;a:4:{s:1:"a";i:252;s:1:"b";s:16:"Reorder:Registro";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:252;a:4:{s:1:"a";i:253;s:1:"b";s:16:"ViewAny:Servicio";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:253;a:4:{s:1:"a";i:254;s:1:"b";s:13:"View:Servicio";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:254;a:4:{s:1:"a";i:255;s:1:"b";s:15:"Create:Servicio";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:255;a:4:{s:1:"a";i:256;s:1:"b";s:15:"Update:Servicio";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:256;a:4:{s:1:"a";i:257;s:1:"b";s:15:"Delete:Servicio";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:257;a:4:{s:1:"a";i:258;s:1:"b";s:18:"DeleteAny:Servicio";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:258;a:4:{s:1:"a";i:259;s:1:"b";s:16:"Restore:Servicio";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:259;a:4:{s:1:"a";i:260;s:1:"b";s:20:"ForceDelete:Servicio";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:260;a:4:{s:1:"a";i:261;s:1:"b";s:23:"ForceDeleteAny:Servicio";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:261;a:4:{s:1:"a";i:262;s:1:"b";s:19:"RestoreAny:Servicio";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:262;a:4:{s:1:"a";i:263;s:1:"b";s:18:"Replicate:Servicio";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:263;a:4:{s:1:"a";i:264;s:1:"b";s:16:"Reorder:Servicio";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:264;a:4:{s:1:"a";i:265;s:1:"b";s:16:"ViewAny:Sucursal";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:265;a:4:{s:1:"a";i:266;s:1:"b";s:13:"View:Sucursal";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:266;a:4:{s:1:"a";i:267;s:1:"b";s:15:"Create:Sucursal";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:267;a:4:{s:1:"a";i:268;s:1:"b";s:15:"Update:Sucursal";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:268;a:4:{s:1:"a";i:269;s:1:"b";s:15:"Delete:Sucursal";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:269;a:4:{s:1:"a";i:270;s:1:"b";s:18:"DeleteAny:Sucursal";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:270;a:4:{s:1:"a";i:271;s:1:"b";s:16:"Restore:Sucursal";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:271;a:4:{s:1:"a";i:272;s:1:"b";s:20:"ForceDelete:Sucursal";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:272;a:4:{s:1:"a";i:273;s:1:"b";s:23:"ForceDeleteAny:Sucursal";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:273;a:4:{s:1:"a";i:274;s:1:"b";s:19:"RestoreAny:Sucursal";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:274;a:4:{s:1:"a";i:275;s:1:"b";s:18:"Replicate:Sucursal";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:275;a:4:{s:1:"a";i:276;s:1:"b";s:16:"Reorder:Sucursal";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:276;a:4:{s:1:"a";i:277;s:1:"b";s:18:"ViewAny:Suscriptor";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:277;a:4:{s:1:"a";i:278;s:1:"b";s:15:"View:Suscriptor";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:278;a:4:{s:1:"a";i:279;s:1:"b";s:17:"Create:Suscriptor";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:279;a:4:{s:1:"a";i:280;s:1:"b";s:17:"Update:Suscriptor";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:280;a:4:{s:1:"a";i:281;s:1:"b";s:17:"Delete:Suscriptor";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:281;a:4:{s:1:"a";i:282;s:1:"b";s:20:"DeleteAny:Suscriptor";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:282;a:4:{s:1:"a";i:283;s:1:"b";s:18:"Restore:Suscriptor";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:283;a:4:{s:1:"a";i:284;s:1:"b";s:22:"ForceDelete:Suscriptor";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:284;a:4:{s:1:"a";i:285;s:1:"b";s:25:"ForceDeleteAny:Suscriptor";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:285;a:4:{s:1:"a";i:286;s:1:"b";s:21:"RestoreAny:Suscriptor";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:286;a:4:{s:1:"a";i:287;s:1:"b";s:20:"Replicate:Suscriptor";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:287;a:4:{s:1:"a";i:288;s:1:"b";s:18:"Reorder:Suscriptor";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:288;a:4:{s:1:"a";i:289;s:1:"b";s:18:"ViewAny:TipoMedida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:289;a:4:{s:1:"a";i:290;s:1:"b";s:15:"View:TipoMedida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:290;a:4:{s:1:"a";i:291;s:1:"b";s:17:"Create:TipoMedida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:291;a:4:{s:1:"a";i:292;s:1:"b";s:17:"Update:TipoMedida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:292;a:4:{s:1:"a";i:293;s:1:"b";s:17:"Delete:TipoMedida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:293;a:4:{s:1:"a";i:294;s:1:"b";s:20:"DeleteAny:TipoMedida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:294;a:4:{s:1:"a";i:295;s:1:"b";s:18:"Restore:TipoMedida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:295;a:4:{s:1:"a";i:296;s:1:"b";s:22:"ForceDelete:TipoMedida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:296;a:4:{s:1:"a";i:297;s:1:"b";s:25:"ForceDeleteAny:TipoMedida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:297;a:4:{s:1:"a";i:298;s:1:"b";s:21:"RestoreAny:TipoMedida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:298;a:4:{s:1:"a";i:299;s:1:"b";s:20:"Replicate:TipoMedida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:299;a:4:{s:1:"a";i:300;s:1:"b";s:18:"Reorder:TipoMedida";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:300;a:4:{s:1:"a";i:301;s:1:"b";s:12:"ViewAny:Role";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:301;a:4:{s:1:"a";i:302;s:1:"b";s:9:"View:Role";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:302;a:4:{s:1:"a";i:303;s:1:"b";s:11:"Create:Role";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:303;a:4:{s:1:"a";i:304;s:1:"b";s:11:"Update:Role";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:304;a:4:{s:1:"a";i:305;s:1:"b";s:11:"Delete:Role";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:305;a:4:{s:1:"a";i:306;s:1:"b";s:14:"DeleteAny:Role";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:306;a:4:{s:1:"a";i:307;s:1:"b";s:12:"Restore:Role";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:307;a:4:{s:1:"a";i:308;s:1:"b";s:16:"ForceDelete:Role";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:308;a:4:{s:1:"a";i:309;s:1:"b";s:19:"ForceDeleteAny:Role";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:309;a:4:{s:1:"a";i:310;s:1:"b";s:15:"RestoreAny:Role";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:310;a:4:{s:1:"a";i:311;s:1:"b";s:14:"Replicate:Role";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:311;a:4:{s:1:"a";i:312;s:1:"b";s:12:"Reorder:Role";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:312;a:4:{s:1:"a";i:313;s:1:"b";s:18:"View:StatsOverview";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:313;a:4:{s:1:"a";i:314;s:1:"b";s:28:"View:MensajesRecientesWidget";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:314;a:4:{s:1:"a";i:315;s:1:"b";s:25:"View:AccesosRapidosWidget";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:315;a:4:{s:1:"a";i:316;s:1:"b";s:31:"View:ProductosPorCategoriaChart";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}i:316;a:4:{s:1:"a";i:317;s:1:"b";s:24:"View:EstadoSistemaWidget";s:1:"c";s:3:"web";s:1:"r";a:1:{i:0;i:1;}}}s:5:"roles";a:1:{i:0;a:3:{s:1:"a";i:1;s:1:"b";s:11:"super_admin";s:1:"c";s:3:"web";}}}', 1783526019);

-- Volcando estructura para tabla correas_center.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.cache_locks: ~0 rows (aproximadamente)

-- Volcando estructura para tabla correas_center.capacidades_infraestructura
CREATE TABLE IF NOT EXISTS `capacidades_infraestructura` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `capacidades_infraestructura_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `capacidades_infraestructura_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.capacidades_infraestructura: ~6 rows (aproximadamente)
INSERT IGNORE INTO `capacidades_infraestructura` (`id`, `empresa_id`, `nombre`, `icon`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Fabricación de sellos SKF a medida', 'CheckCircle2', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(2, 1, 'Prensado de mangueras hidráulicas', 'CheckCircle2', 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(3, 1, 'Reparación de cilindros industriales', 'CheckCircle2', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(4, 1, 'Empalmes y montaje de bandas transportadoras', 'CheckCircle2', 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(5, 1, 'Asesoría técnica especializada', 'CheckCircle2', 5, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(6, 1, 'Entregas a todo Bolivia', 'CheckCircle2', 6, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05');

-- Volcando estructura para tabla correas_center.caracteristicas
CREATE TABLE IF NOT EXISTS `caracteristicas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.caracteristicas: ~3 rows (aproximadamente)
INSERT IGNORE INTO `caracteristicas` (`id`, `nombre`, `descripcion`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'Construcción UniMatch', 'Rendimiento consistente en múltiples unidades de correa en V - asegura todas las correas medirán dentro normas de coincidencia ARPM', 1, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(2, 'Dual Branding', 'Secciones A & B de doble marca con clásica y números de pieza de FHP - reduce el inventario al permitirle suspender 4L y 5L', 2, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(3, 'Aceite y resistente al calor', 'Durabilidad en ambientes difíciles', 3, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04');

-- Volcando estructura para tabla correas_center.caracteristicas_infraestructura
CREATE TABLE IF NOT EXISTS `caracteristicas_infraestructura` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint unsigned NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stats` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `caracteristicas_infraestructura_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `caracteristicas_infraestructura_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.caracteristicas_infraestructura: ~4 rows (aproximadamente)
INSERT IGNORE INTO `caracteristicas_infraestructura` (`id`, `empresa_id`, `titulo`, `descripcion`, `stats`, `icon`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Planta de Fabricación', 'Instalaciones modernas equipadas con tecnología de punta para la fabricación de sellos SKF', '500m²', 'Factory', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(2, 1, 'Centro de Distribución', 'Almacén estratégico con más de 10,000 productos en stock para entregas inmediatas', '10,000+ productos', 'Truck', 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(3, 1, 'Equipo Técnico', 'Personal altamente capacitado con certificaciones internacionales', '+25 técnicos', 'Users', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(4, 1, 'Certificaciones', 'Licencia exclusiva SKF y certificaciones de calidad internacionales', 'SKF Autorizado', 'Award', 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05');

-- Volcando estructura para tabla correas_center.categorias
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `producto_id` bigint unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `descripcion_corta` text COLLATE utf8mb4_unicode_ci,
  `uso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categorias_slug_unique` (`slug`),
  KEY `categorias_producto_id_foreign` (`producto_id`),
  CONSTRAINT `categorias_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.categorias: ~61 rows (aproximadamente)
INSERT IGNORE INTO `categorias` (`id`, `producto_id`, `nombre`, `slug`, `imagen`, `descripcion`, `descripcion_corta`, `uso`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Correas en V', 'correas-en-v', '/producto/categoria/correas-en-v.jpg', 'Las correas en V, o trapezoidales, son bandas de transmisión flexibles que unen dos o más poleas para transferir fuerza y movimiento. Tienen una sección transversal en forma de "V" que encaja en ranuras similares de las poleas. Esto aumenta el agarre, evita que resbalen y mejora la eficiencia.', 'Correas industriales de alta resistencia para transmisión de potencia', 'Transmisión de potencia', 1, 'activo', '2026-07-01 19:41:04', '2026-07-03 23:55:32'),
	(2, 1, 'Correas Dentadas', 'correas-dentadas', '/producto/categoria/correas-dentadas.jpg', 'Una correa dentada es una cinta flexible con dientes en su cara interior. Estos dientes engranan en poleas especiales como lo hacen los dientes de dos engranajes. Este sistema elimina el deslizamiento y permite una sincronización exacta entre piezas móviles.', 'Correas sincronizadas para transmisión precisa', 'Transmisión precisa', 2, 'activo', '2026-07-01 19:41:04', '2026-07-03 23:56:20'),
	(3, 1, 'Correas Variadoras', 'correas-variadoras', '/producto/categoria/correas-variadoras.jpg', 'Las correas variadoras son bandas de caucho muy anchas y con forma de "V". Su función es transmitir la fuerza de un motor a una máquina, permitiendo cambiar la velocidad de forma continua. Se usan mucho en tornos industriales y motocicletas tipo scooter.', 'Correas para sistemas de velocidad variable', 'Velocidad variable', 3, 'activo', '2026-07-01 19:41:04', '2026-07-03 23:56:48'),
	(4, 1, 'Correas Acanaladas', 'correas-acanaladas', '/producto/categoria/correas-acanaladas.jpg', 'Una correa acanalada es una banda flexible con múltiples ranuras en forma de "V" en su interior. Transmite energía desde un motor a otras partes de una máquina. Son muy eficientes porque sus canales aumentan el agarre, lo que evita que resbalen.', 'Correas multicanales para alta eficiencia', 'Alta eficiencia', 4, 'activo', '2026-07-01 19:41:04', '2026-07-03 23:57:14'),
	(5, 2, 'Mangueras Hidráulicas', 'mangueras-hidraulicas', 'default/placeholder.png', 'Las mangueras hidráulicas son tubos flexibles diseñados para transportar líquidos a alta presión (como el aceite hidráulico) entre partes de una máquina. Transmiten la fuerza necesaria para mover equipos pesados como excavadoras y tractores. Su flexibilidad ayuda a absorber las vibraciones del motor.', 'Mangueras de alta presión para sistemas hidráulicos industriales', 'Alta presión', 5, 'activo', '2026-07-01 19:41:04', '2026-07-03 23:58:06'),
	(6, 2, 'Mangueras de Succión y Descarga', 'mangueras-de-succion-y-descarga', 'default/placeholder.png', 'Las mangueras de succión y descarga mueven líquidos y sólidos entre lugares. Son tubos flexibles que conectan bombas de agua. Funcionan aspirando líquidos (vacío) o empujándolos con fuerza (presión).', 'Mangueras para transferencia de fluidos', 'Transferencia de fluidos', 6, 'activo', '2026-07-01 19:41:04', '2026-07-03 23:58:35'),
	(7, 2, 'Mangueras Multiusos', 'mangueras-multiusos', 'default/placeholder.png', 'Las mangueras multiusos son tubos flexibles diseñados para transportar varios tipos de fluidos como agua, aire y aceites en una sola herramienta.', 'Mangueras versátiles para múltiples aplicaciones', 'Versátiles', 7, 'activo', '2026-07-01 19:41:04', '2026-07-03 23:59:06'),
	(8, 2, 'Mangueras Neumáticas', 'mangueras-neumaticas', 'default/placeholder.png', 'Las mangueras neumáticas son tubos flexibles que llevan aire a presión desde un compresor hacia máquinas o herramientas. Son clave en fábricas y talleres. Funcionan como las venas del sistema. Mueven la fuerza del aire para hacer girar, levantar o cortar piezas.', 'Mangueras para sistemas de aire comprimido', 'Aire comprimido', 8, 'activo', '2026-07-01 19:41:04', '2026-07-03 23:59:32'),
	(9, 3, 'Rodamientos de Rodillos', 'rodamientos-de-rodillos', 'default/placeholder.png', 'Los rodamientos de rodillos son piezas mecánicas que reducen la fricción entre ejes giratorios y otras partes de una máquina. Usan cilindros o barriles en lugar de bolas. Este diseño crea una línea de contacto. Como resultado, soportan cargas mucho más pesadas y resisten mejor los golpes que los rodamientos de bolas.', 'Rodamientos para cargas pesadas', 'Cargas pesadas', 9, 'activo', '2026-07-01 19:41:04', '2026-07-03 23:59:58'),
	(10, 3, 'Rodamientos de Bolas', 'rodamientos-de-bolas', 'default/placeholder.png', 'Un rodamiento de bolas es una pieza mecánica que reduce la fricción entre partes móviles. Usa pequeñas esferas de metal que ruedan entre dos anillos. Esto permite que las piezas giren rápido y suavemente. Es como usar ruedas de patines para mover cosas pesadas con poco esfuerzo.', 'Rodamientos de precisión para alta velocidad', 'Alta velocidad', 10, 'activo', '2026-07-01 19:41:04', '2026-07-04 00:00:18'),
	(11, 3, 'Rodamientos de Agujas', 'rodamientos-de-agujas', 'default/placeholder.png', 'Los rodamientos de agujas son cojinetes que usan rodillos cilíndricos muy finos y largos. Soportan cargas radiales pesadas en espacios muy pequeños. El contacto entre el rodillo y la pista es lineal, lo que distribuye el peso de manera uniforme.', 'Rodamientos compactos para espacios reducidos', 'Compactos', 11, 'activo', '2026-07-01 19:41:04', '2026-07-04 00:00:53'),
	(12, 3, 'Rodamientos Axiales', 'rodamientos-axiales', 'default/placeholder.png', 'Los rodamientos axiales, o rodamientos de empuje, soportan fuerzas paralelas al eje de rotación. Funcionan como una prensa que aprieta hacia abajo. Se dividen en tres tipos principales: de bolas para alta velocidad, de rodillos para cargas extremas, y esféricos que corrigen errores de alineación.', 'Rodamientos para cargas axiales', 'Cargas axiales', 12, 'activo', '2026-07-01 19:41:04', '2026-07-04 00:03:20'),
	(13, 3, 'Rodamientos Lineales', 'rodamientos-lineales', 'default/placeholder.png', 'Los rodamientos lineales son piezas mecánicas que permiten a una máquina mover objetos en línea recta con un esfuerzo muy bajo. Funcionan guiando un carro sobre un riel o eje mediante pequeñas bolitas o rodillos. Esto reduce el desgaste y permite movimientos suaves y exactos.', 'Rodamientos para movimiento lineal', 'Movimiento lineal', 13, 'activo', '2026-07-01 19:41:04', '2026-07-04 00:03:51'),
	(14, 4, 'Retenes', 'retenes', 'default/placeholder.png', 'Los retenes para sellado son piezas que cierran los espacios entre piezas fijas y móviles. Retienen los lubricantes (aceite o grasa) dentro de las máquinas. También frenan la entrada de polvo y agua. Se usan mucho en motores, cajas de cambios y ruedas.', 'Elementos de sellado para ejes rotativos', 'Sellado de ejes', 14, 'activo', '2026-07-01 19:41:04', '2026-07-04 00:05:31'),
	(15, 4, 'Sellos Mecánicos', 'sellos-mecanicos', 'default/placeholder.png', 'Aqui va la descripcion general papu', 'Sellos para bombas y equipos rotativos', 'Bombas y equipos', 15, 'inactivo', '2026-07-01 19:41:04', '2026-07-04 00:05:52'),
	(16, 4, 'O-Rings', 'o-rings', 'default/placeholder.png', 'Un o-ring (o junta tórica) es un anillo en forma de rosquilla con sección transversal redonda. Hecho de materiales elásticos, se coloca en una ranura y se comprime al unir dos piezas. Actúa como barrera, bloqueando el paso y evitando fugas de líquidos o gases.', 'Juntas tóricas para sellado estático y dinámico', 'Juntas tóricas', 16, 'activo', '2026-07-01 19:41:04', '2026-07-04 00:06:27'),
	(17, 4, 'Sellos Hidráulicos', 'sellos-hidraulicos', 'default/placeholder.png', 'Los sellos hidráulicos son anillos de caucho o plástico. Actúan como tapones herméticos. Su objetivo es evitar que el aceite o líquido se escape entre las partes de una máquina', 'Sellos para sistemas hidráulicos', 'Sistemas hidráulicos', 17, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:16:29'),
	(18, 4, 'Sellos Neumáticos', 'sellos-neumaticos', 'default/placeholder.png', 'Los sellos neumáticos son componentes de goma o plástico que retienen el aire comprimido en equipos como cilindros o compresores. Su función es evitar fugas, mantener la fuerza del aire y proteger el sistema contra la suciedad.', 'Sellos para sistemas neumáticos', 'Sistemas neumáticos', 18, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:17:40'),
	(19, 5, 'Bandas Lisas', 'bandas-lisas', 'default/placeholder.png', 'Las bandas transportadoras lisas son cintas planas sin relieves. Mueven productos de un punto a otro. Son la opción más común en fábricas. Funcionan bien en superficies planas o con poca inclinación (hasta 20°).', 'Bandas para cargas pesadas, minería e industria', 'Cargas pesadas', 19, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:22:02'),
	(20, 5, 'Bandas Nervadas', 'bandas-nervadas', 'default/placeholder.png', 'Las bandas transportadoras nervadas tienen relieves en su superficie, como tacos o crestas. Estos relieves evitan que el material se resbale o se caiga. Permiten subir productos con inclinaciones muy altas (hasta de 45º) y son ideales para cargar productos sueltos, cajas o alimentos.', 'Bandas para cargas pesadas, minería e industria', 'Cargas pesadas', 20, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:22:37'),
	(21, 5, 'Bandas Verticales', 'bandas-verticales', 'default/placeholder.png', 'Las bandas transportadoras verticales mueven objetos automáticamente entre diferentes niveles o pisos. Funcionan como un elevador continuo de carga. Su diseño ahorra espacio en las fábricas.', 'Bandas para cargas pesadas, minería e industria', 'Cargas pesadas', 21, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:23:50'),
	(22, 5, 'Bandas con Bordes', 'bandas-con-bordes', 'default/placeholder.png', 'Las bandas transportadoras con bordes contienen barreras físicas o sellos laterales que evitan que el material se caiga durante el traslado. Son clave para subir productos en ángulo o mover materiales sueltos. Existen dos tipos principales de bordes según su fabricación: cortados o moldeados.', 'Bandas para cargas pesadas, minería e industria', 'Cargas pesadas', 22, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:26:02'),
	(23, 5, 'Bandas Corrugadas', 'bandas-corrugadas', 'default/placeholder.png', 'Las bandas transportadoras corrugadas son cintas industriales con relieves en su superficie. Estos relieves mejoran el agarre. Están diseñadas para mover productos frágiles o cargas inclinadas. Evitan que la mercancía ruede o resbale hacia atrás.', 'Bandas para cargas pesadas, minería e industria', 'Cargas pesadas', 23, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:26:59'),
	(24, 6, 'Bandas Sintenticas', 'bandas-sintenticas', 'default/placeholder.png', 'Las bandas transportadoras sintéticas son sistemas de movimiento continuo formados por capas de tela unidas con plásticos como PVC o poliuretano mediante calor. Son muy flexibles, resistentes a la abrasión y fáciles de limpiar. Se usan mucho en alimentos, medicinas y paquetería gracias a sus características higiénicas.', 'Bandas para industria ligera', 'Industria ligera', 24, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:28:32'),
	(25, 6, 'Bandas Modulares', 'bandas-modulares', 'default/placeholder.png', 'Una banda transportadora modular es un sistema formado por piezas de plástico unidas entre sí. Estas piezas encajan como bloques de construcción. Se conectan usando varillas largas. Esta unión crea una superficie plana, resistente y flexible que se mueve usando ruedas dentadas.', 'Bandas para industria ligera', 'Industria ligera', 25, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:29:09'),
	(26, 6, 'Bandas PTFE', 'bandas-ptfe', 'default/placeholder.png', 'Las bandas transportadoras de PTFE (politetrafluoroetileno, conocido como Teflón) son cintas de fibra de vidrio recubiertas de resina sintética. Son famosas por su superficie antiadherente y su gran resistencia al calor. Soportan temperaturas extremas de -73 °C hasta 260 °C sin dañarse.', 'Bandas para industria ligera', 'Industria ligera', 26, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:30:53'),
	(27, 6, 'Bandas Homogeneas', 'bandas-homogeneas', 'default/placeholder.png', 'Las bandas transportadoras homogéneas son fajas continuas hechas de un solo material sólido, como poliuretano o caucho. A diferencia de las bandas tradicionales, no tienen capas internas (lonas) ni grietas. Esto las hace más seguras, duraderas y fáciles de limpiar.', 'Bandas para industria ligera', 'Industria ligera', 27, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:32:30'),
	(28, 6, 'Bandas de Caucho Ligeras', 'bandas-de-caucho-ligeras', 'default/placeholder.png', 'Las bandas transportadoras de caucho ligeras son cintas flexibles hechas de capas de tela (como poliéster) recubiertas de caucho. Mueven materiales de peso bajo o mediano en distancias cortas. Pesan poco y son fáciles de doblar. Estas bandas se usan mucho en agricultura, logística y empaque.', 'Bandas para industria ligera', 'Industria ligera', 28, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:33:08'),
	(29, 7, 'Cadenas de Rodillos de Precisión', 'cadenas-de-rodillos-de-precision', 'default/placeholder.png', 'Las cadenas de rodillos de precisión son piezas mecánicas que transmiten fuerza entre ejes. Usan eslabones metálicos y pequeños cilindros rodantes que engranan en ruedas dentadas. Son vitales en industrias y vehículos, ya que garantizan un movimiento silencioso y sin pérdidas de energía.', 'Cadenas para transmisión de potencia', 'Transmisión', 29, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:34:18'),
	(30, 7, 'Cadenas de Acero Inoxidable', 'cadenas-de-acero-inoxidable', 'default/placeholder.png', 'Las cadenas de acero inoxidable son tiras de eslabones de metal muy fuertes. No se oxidan ni se manchan. Son una mezcla de hierro, cromo y otros metales. El cromo forma una capa invisible que las protege del agua y del clima. Son muy duraderas y seguras para la piel.', 'Cadenas resistentes a la corrosión', 'Resistentes', 30, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:40:29'),
	(31, 7, 'Cadenas de Transmisión', 'cadenas-de-transmision', 'default/placeholder.png', 'Una cadena de transmisión es un mecanismo que transfiere energía mecánica y movimiento entre dos o más ejes. Consiste en una serie de eslabones metálicos que se engranan con ruedas dentadas (llamadas piñones). Este sistema evita que la cadena resbale, lo que asegura una fuerza exacta y constante.', 'Cadenas para transmisión industrial', 'Industrial', 31, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:41:34'),
	(32, 7, 'Cadenas con Transportador', 'cadenas-con-transportador', 'default/placeholder.png', 'Los transportadores de cadena son sistemas industriales que usan eslabones metálicos continuos para mover productos pesados. Un motor gira una rueda. La rueda tira de la cadena. La cadena arrastra la carga. Son muy fuertes. Mueven cosas grandes como palés donde las cintas de goma fallan.', 'Cadenas para sistemas de transporte', 'Transporte', 32, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:43:54'),
	(33, 7, 'Cadenas Agrícolas', 'cadenas-agricolas', 'default/placeholder.png', 'Las cadenas agrícolas tienen dos significados. En las máquinas, son piezas de metal o plástico que mueven partes de los equipos. En los negocios, son todas las etapas por las que pasa un cultivo desde la granja hasta tu mesa.', 'Cadenas para maquinaria agrícola', 'Agrícola', 33, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:44:51'),
	(34, 8, 'Poleas en V de Taladro Cónico y Cilíndrico', 'poleas-en-v-de-taladro-conico-y-cilindrico', 'default/placeholder.png', 'Las poleas en V para taladro transmiten el movimiento del motor al husillo mediante una correa trapezoidal. Los términos cónicas y cilindricas describen cómo se fija la polea al eje.', 'Poleas para correas en V', 'Correas en V', 34, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:46:21'),
	(35, 8, 'Poleas Sincrónicas', 'poleas-sincronicas', 'default/placeholder.png', 'Las poleas sincrónicas (o dentadas) son ruedas con ranuras que transmiten fuerza mediante el acoplamiento positivo. Sus dientes encajan perfectamente con los de una correa especial. No usan fricción. Esto garantiza una sincronización exacta, cero deslizamientos y máxima eficiencia.', 'Poleas para correas dentadas', 'Correas dentadas', 35, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:47:17'),
	(36, 8, 'Poleas MI-Lock', 'poleas-mi-lock', 'default/placeholder.png', 'Las poleas Mi-Lock son componentes mecánicos industriales de transmisión de potencia. Destacan por su sistema de bloqueo cónico sin chavetero, que une la polea al eje mediante presión. Esto elimina la necesidad de ranuras y tornillos. Son duraderas, silenciosas y evitan el desgaste.', 'Poleas con sistema de bloqueo MI-Lock', 'Sistema MI-Lock', 36, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:48:11'),
	(37, 9, 'Piñones de taladro cónico', 'pinones-de-taladro-conico', 'default/placeholder.png', 'Los piñones de taladro cónico son ruedas dentadas en forma de cono que transfieren la fuerza de giro y el movimiento entre ejes que se cruzan. Se usan mucho en taladros manuales (de pecho o berbiquí) para cambiar la dirección del giro 90° y aumentar la velocidad de la broca.', 'Piñones con ajuste cónico', 'Ajuste cónico', 37, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:50:11'),
	(38, 9, 'Piñones con agujero piloto', 'pinones-con-agujero-piloto', 'default/placeholder.png', 'Los piñones con agujero piloto (también llamados barrenos piloto o pilot bore) son ruedas dentadas que cuentan con un orificio central pequeño y preperforado. Este agujero no está listo para instalarse en una máquina. Sirve como guía para que un tornero lo perfore al tamaño exacto de tu eje.', 'Piñones para mecanizado personalizado', 'Mecanizado', 38, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:57:07'),
	(39, 9, 'Piñones simples de taladro cónico para 2 cadenas', 'pinones-simples-de-taladro-conico-para-2-cadenas', 'default/placeholder.png', 'Los piñones simples de taladro cónico para dos cadenas son ruedas dentadas dobles diseñadas para alojar dos cadenas simples paralelas. Usan un sistema de casquillo cónico para un agarre firme. Esto elimina el juego y hace que el montaje y desmontaje sean muy rápidos y sencillos.', 'Piñones dobles para transmisión', 'Transmisión doble', 39, 'activo', '2026-07-01 19:41:04', '2026-07-07 21:59:09'),
	(40, 10, 'Niples Hidráulicos', 'niples-hidraulicos', 'default/placeholder.png', 'Un niple hidráulico es un tubo corto con roscas en ambos extremos. Sirve para unir dos tuberías o mangueras en un sistema hidráulico, que es un mecanismo que usa aceite u otro líquido a presión para mover maquinaria. Su función principal es transmitir esta fuerza con seguridad y sin fugas.', 'Conexiones para sistemas hidráulicos', 'Hidráulicos', 40, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:00:07'),
	(41, 10, 'Niples de Cobre', 'niples-de-cobre', 'default/placeholder.png', 'Los niples de cobre son segmentos cortos de tubo que sirven para conectar dos accesorios de tubería o extender un sistema. Son muy resistentes al calor y a la corrosión, por lo que se usan mucho en agua, gas y aire acondicionado. A menudo se sueldan y garantizan una unión fuerte.', 'Conexiones de cobre para diversas aplicaciones', 'Conectar accesorios', 41, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:01:12'),
	(42, 10, 'Conexiones Rápidas', 'conexiones-rapidas', 'default/placeholder.png', 'Las conexiones rápidas son accesorios mecánicos que unen tuberías o mangueras en segundos sin usar herramientas. Se componen de dos partes: el macho (que se inserta) y la hembra (que bloquea y sella). Permiten conectar y desconectar sistemas de agua, aire o aceite de forma fácil y sin fugas.', 'Conexiones de acople rápido', 'Acople rápido', 42, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:02:56'),
	(43, 10, 'Adaptadores', 'adaptadores', 'default/placeholder.png', 'Los adaptadores son piezas clave que unen mangueras entre sí o las conectan a tuberías, llaves y equipos. Evitan fugas y mantienen la presión.', 'Adaptadores para diferentes configuraciones', 'Adaptación', 43, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:05:17'),
	(44, 10, 'Conectores Rápidos', 'conectores-rapidos', 'default/placeholder.png', 'Los conectores rápidos (o racores) permiten unir mangueras, herramientas y equipos de aire comprimido al instante. No necesitas herramientas para conectarlos. Ahorran tiempo, evitan fugas de aire y soportan alta presión gracias a sus sellos internos.', 'Conectores para conexión rápida', 'Conexión rápida', 44, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:06:51'),
	(45, 11, 'Cilindros Neumáticos', 'cilindros-neumaticos', 'default/placeholder.png', 'Los cilindros neumáticos son dispositivos que transforman la energía del aire comprimido en movimiento mecánico lineal. Se usan mucho en la industria para mover, levantar o empujar objetos. Funcionan como una jeringa: el aire empuja una pieza interna, haciendo que una barra salga o entre.', 'Cilindros para sistemas neumáticos', 'Neumáticos', 45, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:07:43'),
	(46, 11, 'Cilindros HTR (Tirantes)', 'cilindros-htr-tirantes', 'default/placeholder.png', 'Los cilindros de tirantes (conocidos como HTR) son componentes mecánicos que usan varillas de acero roscadas para unir las tapas de los extremos al cuerpo del cilindro. Su diseño estandarizado permite un fácil mantenimiento. Son ideales para uso industrial en prensas, maquinaria agrícola y equipos de manipulación de materiales.', 'Cilindros con diseño de tirantes', 'Tirantes', 46, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:08:31'),
	(47, 11, 'Cilindros HCW (Patentado)', 'cilindros-hcw-patentado', 'default/placeholder.png', 'Los cilindros HCW son actuadores lineales soldados de doble efecto diseñados para maquinaria industrial. Su nombre alude a los cilindros soldados con extremos de horquilla ajustables (Clevis Welded). Su diseño optimizado maneja grandes cargas en espacios pequeños.', 'Cilindros con diseño patentado', 'Patentado', 47, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:09:16'),
	(48, 12, 'Cangilones HD Stax (Heavy Duty)', 'cangilones-hd-stax-heavy-duty', 'default/placeholder.png', 'Los cangilones HD-STAX son recipientes de plástico para elevadores de cangilones. Mueven materiales a granel verticalmente. Son muy populares en la agricultura y la industria. Su diseño "Heavy Duty" (servicio pesado) permite soportar trabajos duros y desgastantes.', 'Cangilones de alta resistencia', 'Alta resistencia', 48, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:10:14'),
	(49, 12, 'Cangilones de Nylon', 'cangilones-de-nylon', 'default/placeholder.png', 'Los cangilones de nylon son recipientes plásticos que se instalan en cintas o cadenas para elevar materiales verticalmente. Son famosos por su gran fuerza y resistencia.', 'Cangilones ligeros de nylon', 'Ligeros', 49, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:10:54'),
	(50, 12, 'Cangilones de Poliuretano', 'cangilones-de-poliuretano', 'default/placeholder.png', 'Los cangilones de poliuretano son recipientes flexibles y ultrarresistentes utilizados en elevadores industriales para cargar y transportar materiales sólidos a granel. Funcionan como cucharas montadas en bandas móviles. Destacan por su extrema resistencia a la abrasión (desgaste por fricción) y su flexibilidad superior al metal o al plástico común.', 'Cangilones resistentes al desgaste', 'Resistentes', 50, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:11:31'),
	(51, 12, 'Pernos', 'pernos', 'default/placeholder.png', 'Los pernos para cangilones (también conocidos como pernos de elevador) son elementos de fijación especializados diseñados para unir de forma segura los cangilones a las bandas o cadenas transportadoras. Evitan que la correa se rompa o resbale durante la operación.', 'Pernos para fijación de cangilones', 'Fijación', 51, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:13:05'),
	(52, 12, 'Grapas de Empalme Mecánico', 'grapas-de-empalme-mecanico', 'default/placeholder.png', 'Las grapas para elevadores de cangilones son un tipo de empalme mecánico usado para unir los extremos de una banda transportadora. Permiten crear una banda continua. A la vez, permiten desarmar la unión fácil y rápidamente para hacer reparaciones o ajustes.', 'Grapas para unión de bandas', 'Unión', 52, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:16:12'),
	(53, 13, 'Cardanes Agrícolas', 'cardanes-agricolas', 'default/placeholder.png', 'Un cardán agrícola es una barra de transmisión. Lleva la fuerza y el movimiento de rotación desde el tractor hasta la maquinaria (como una desbrozadora o segadora). Funciona como una articulación. Permite que el tractor y el apero giren y se muevan sobre terreno irregular sin romperse.', 'Cardanes para maquinaria agrícola', 'Agrícola', 53, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:17:06'),
	(54, 14, 'Caja de Comando de 1 Palanca', 'caja-de-comando-de-1-palanca', 'default/placeholder.png', 'Una caja de comandos de una palanca es un dispositivo mecánico o hidráulico que controla dos acciones clave con un solo mango. Dependiendo del equipo, regula el flujo de aceite para mover maquinaria pesada (como grúas) o controla de forma simultánea la marcha y la aceleración en motores marinos.', 'Caja de comando con una palanca', '1 Palanca', 54, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:17:49'),
	(55, 14, 'Caja de Comandos de 2 Palancas', 'caja-de-comandos-de-2-palancas', 'default/placeholder.png', 'Una caja de comandos de 2 palancas es un dispositivo que permite controlar dos funciones mecánicas o hidráulicas desde un solo lugar. Por ejemplo, en maquinarias, una palanca sube y baja un brazo, mientras que la otra abre y cierra una pinza.', 'Caja de comando con dos palancas', '2 Palancas', 55, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:18:20'),
	(56, 14, 'Caja de Comandos de 3 Palancas', 'caja-de-comandos-de-3-palancas', 'default/placeholder.png', 'Una caja de comandos de 3 palancas es un dispositivo hidráulico usado para controlar maquinaria pesada. Permite dirigir el flujo de aceite para activar tres movimientos independientes. Las palancas se mueven a mano para subir, bajar o girar partes de equipos como grúas o tractores.', 'Caja de comando con tres palancas', '3 Palancas', 56, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:18:47'),
	(57, 14, 'Caja de Comandos de 4 Palancas', 'caja-de-comandos-de-4-palancas', 'default/placeholder.png', 'Una caja de comandos de 4 palancas es un dispositivo que controla sistemas hidráulicos. Permite dirigir el aceite a presión hacia diferentes cilindros o motores. Cada palanca opera una función independiente. Se usa mucho en grúas, montacargas, maquinaria agrícola e hidroelevadores.', 'Caja de comando con cuatro palancas', '4 Palancas', 57, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:19:12'),
	(58, 15, 'Abrazaderas Galvanizadas', 'abrazaderas-galvanizadas', 'default/placeholder.png', 'Una abrazadera galvanizada es una pieza de metal resistente que sirve para sujetar y asegurar tuberías, cables o mangueras. Está hecha de acero y recubierta con zinc para evitar la oxidación. Esto permite usarla en exteriores o lugares húmedos sin que se dañe.', 'Abrazaderas con recubrimiento galvanizado', 'Galvanizadas', 58, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:19:56'),
	(59, 15, 'Abrazaderas Inoxidables', 'abrazaderas-inoxidables', 'default/placeholder.png', 'Las abrazaderas de acero inoxidable son mecanismos de sujeción. Se usan para fijar, unir o soportar tuberías y mangueras. Aplican una fuerza de presión uniforme. Son muy duraderas porque resisten el óxido y los cambios de temperatura.', 'Abrazaderas de acero inoxidable', 'Inoxidables', 59, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:20:25'),
	(60, 15, 'Abrazaderas de Tornillo', 'abrazaderas-de-tornillo', 'default/placeholder.png', 'Las abrazaderas de tornillo son dispositivos que unen o sujetan objetos firmemente usando un mecanismo de tornillo. En fontanería y automoción, sellan mangueras. En carpintería, sostienen piezas juntas de forma temporal. Son reutilizables, ajustables y ofrecen una gran fuerza de apriete.', 'Abrazaderas con sistema de tornillo', 'Tornillo', 60, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:20:55'),
	(61, 15, 'Abrazaderas de Alambre', 'abrazaderas-de-alambre', 'default/placeholder.png', 'Una abrazadera de alambre es un anillo de metal diseñado para sujetar tuberías, cables o mangueras. Aprieta el tubo alrededor de otra pieza usando un tornillo o tuerca. Es ideal para trabajos donde hay baja presión o espacio reducido, ya que no daña los materiales.', 'Abrazaderas de alambre', 'Alambre', 61, 'activo', '2026-07-01 19:41:04', '2026-07-07 22:21:23');

-- Volcando estructura para tabla correas_center.composiciones
CREATE TABLE IF NOT EXISTS `composiciones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.composiciones: ~3 rows (aproximadamente)
INSERT IGNORE INTO `composiciones` (`id`, `nombre`, `descripcion`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'Compuesto', 'Caucho natural/SBR', 1, 'activo', '2026-07-01 19:41:04', '2026-07-03 23:53:05'),
	(2, 'Cordón', 'Poliéster', 2, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(3, 'Cubierta', 'Mezcla de algodón/poliéster', 3, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04');

-- Volcando estructura para tabla correas_center.contactos
CREATE TABLE IF NOT EXISTS `contactos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mensaje` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('nuevo','leido','respondido','archivado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'nuevo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contactos_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `contactos_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.contactos: ~0 rows (aproximadamente)

-- Volcando estructura para tabla correas_center.detalle_categorias
CREATE TABLE IF NOT EXISTS `detalle_categorias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `categoria_id` bigint unsigned NOT NULL,
  `marca_id` bigint unsigned DEFAULT NULL,
  `gama_producto_id` bigint unsigned DEFAULT NULL,
  `caracteristica_id` bigint unsigned DEFAULT NULL,
  `medida_id` bigint unsigned DEFAULT NULL,
  `valor_personalizado` decimal(10,4) DEFAULT NULL,
  `composicion_id` bigint unsigned DEFAULT NULL,
  `aplicacion_id` bigint unsigned DEFAULT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_categorias_categoria_id_foreign` (`categoria_id`),
  KEY `detalle_categorias_marca_id_foreign` (`marca_id`),
  KEY `detalle_categorias_gama_producto_id_foreign` (`gama_producto_id`),
  KEY `detalle_categorias_caracteristica_id_foreign` (`caracteristica_id`),
  KEY `detalle_categorias_medida_id_foreign` (`medida_id`),
  KEY `detalle_categorias_composicion_id_foreign` (`composicion_id`),
  KEY `detalle_categorias_aplicacion_id_foreign` (`aplicacion_id`),
  CONSTRAINT `detalle_categorias_aplicacion_id_foreign` FOREIGN KEY (`aplicacion_id`) REFERENCES `aplicaciones` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detalle_categorias_caracteristica_id_foreign` FOREIGN KEY (`caracteristica_id`) REFERENCES `caracteristicas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detalle_categorias_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detalle_categorias_composicion_id_foreign` FOREIGN KEY (`composicion_id`) REFERENCES `composiciones` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detalle_categorias_gama_producto_id_foreign` FOREIGN KEY (`gama_producto_id`) REFERENCES `gama_productos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detalle_categorias_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detalle_categorias_medida_id_foreign` FOREIGN KEY (`medida_id`) REFERENCES `medidas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.detalle_categorias: ~61 rows (aproximadamente)
INSERT IGNORE INTO `detalle_categorias` (`id`, `categoria_id`, `marca_id`, `gama_producto_id`, `caracteristica_id`, `medida_id`, `valor_personalizado`, `composicion_id`, `aplicacion_id`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 9, 1, 3, 4, 40.0000, 2, 4, 1, 'activo', '2026-07-01 19:41:04', '2026-07-03 23:47:40'),
	(2, 2, 3, 2, 3, 2, NULL, 2, 3, 2, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(3, 3, 2, 4, 2, 6, NULL, 3, 1, 3, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(4, 4, 15, 1, 3, 3, NULL, 2, 4, 4, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(5, 5, 23, 2, 1, 1, NULL, 2, 4, 5, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(6, 6, 6, 3, 3, 4, NULL, 2, 2, 6, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(7, 7, 23, 1, 2, 1, NULL, 1, 3, 7, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(8, 8, 8, 4, 1, 1, NULL, 3, 3, 8, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(9, 9, 11, 3, 1, 1, NULL, 1, 1, 9, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(10, 10, 2, 4, 3, 1, NULL, 2, 1, 10, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(11, 11, 16, 3, 1, 1, NULL, 3, 4, 11, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(12, 12, 19, 1, 2, 5, NULL, 2, 3, 12, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(13, 13, 13, 4, 2, 4, NULL, 3, 2, 13, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(14, 14, 15, 1, 2, 6, NULL, 3, 4, 14, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(15, 15, 13, 1, 3, 5, NULL, 1, 4, 15, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(16, 16, 16, 1, 1, 1, NULL, 2, 2, 16, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(17, 17, 8, 3, 2, 1, NULL, 1, 1, 17, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(18, 18, 6, 4, 1, 3, NULL, 1, 3, 18, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(19, 19, 5, 2, 2, 1, NULL, 3, 3, 19, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(20, 20, 11, 2, 1, 3, NULL, 2, 2, 20, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(21, 21, 12, 2, 3, 5, NULL, 2, 2, 21, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(22, 22, 20, 2, 3, 2, NULL, 2, 2, 22, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(23, 23, 11, 3, 3, 6, NULL, 1, 1, 23, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(24, 24, 3, 3, 1, 3, NULL, 2, 1, 24, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(25, 25, 8, 1, 3, 1, NULL, 2, 2, 25, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(26, 26, 19, 4, 3, 5, NULL, 2, 2, 26, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(27, 27, 22, 4, 1, 1, NULL, 1, 1, 27, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(28, 28, 2, 4, 2, 2, NULL, 3, 2, 28, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(29, 29, 2, 1, 2, 6, NULL, 2, 1, 29, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(30, 30, 16, 4, 1, 2, NULL, 2, 3, 30, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(31, 31, 9, 1, 2, 1, NULL, 1, 1, 31, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(32, 32, 1, 1, 2, 5, NULL, 1, 3, 32, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(33, 33, 7, 1, 2, 5, NULL, 3, 4, 33, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(34, 34, 2, 3, 3, 4, NULL, 1, 4, 34, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(35, 35, 18, 3, 1, 4, NULL, 2, 3, 35, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(36, 36, 14, 2, 1, 2, NULL, 1, 3, 36, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(37, 37, 11, 1, 3, 5, NULL, 3, 2, 37, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(38, 38, 6, 2, 2, 5, NULL, 3, 4, 38, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(39, 39, 19, 2, 1, 5, NULL, 3, 1, 39, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(40, 40, 17, 2, 2, 5, NULL, 2, 3, 40, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(41, 41, 3, 3, 1, 2, NULL, 1, 3, 41, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(42, 42, 5, 3, 3, 1, NULL, 1, 4, 42, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(43, 43, 4, 1, 3, 6, NULL, 3, 2, 43, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(44, 44, 13, 2, 2, 4, NULL, 3, 2, 44, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(45, 45, 13, 4, 3, 2, NULL, 1, 4, 45, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(46, 46, 5, 1, 3, 3, NULL, 2, 1, 46, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(47, 47, 7, 3, 2, 1, NULL, 2, 1, 47, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(48, 48, 2, 1, 1, 1, NULL, 1, 1, 48, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(49, 49, 3, 4, 2, 6, NULL, 3, 1, 49, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(50, 50, 6, 3, 2, 4, NULL, 1, 4, 50, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(51, 51, 19, 2, 1, 1, NULL, 3, 3, 51, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(52, 52, 22, 3, 1, 5, NULL, 3, 3, 52, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(53, 53, 3, 4, 2, 1, NULL, 1, 3, 53, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(54, 54, 13, 2, 1, 1, NULL, 2, 2, 54, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(55, 55, 21, 1, 1, 6, NULL, 2, 2, 55, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(56, 56, 13, 3, 3, 5, NULL, 3, 1, 56, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(57, 57, 19, 4, 3, 6, NULL, 1, 3, 57, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(58, 58, 11, 3, 1, 4, NULL, 2, 2, 58, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(59, 59, 21, 2, 2, 6, NULL, 2, 2, 59, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(60, 60, 16, 2, 1, 4, NULL, 1, 3, 60, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(61, 61, 18, 4, 1, 1, NULL, 1, 1, 61, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(62, 1, NULL, 1, 1, 7, NULL, 1, 3, 0, 'activo', '2026-07-03 23:49:01', '2026-07-03 23:49:01'),
	(63, 1, 12, 1, 2, 8, NULL, 3, 2, 0, 'activo', '2026-07-03 23:50:32', '2026-07-03 23:50:32'),
	(64, 1, NULL, 2, NULL, 8, 66.0000, NULL, NULL, 0, 'activo', '2026-07-03 23:51:08', '2026-07-03 23:51:08'),
	(65, 1, NULL, 2, NULL, 4, NULL, NULL, NULL, 0, 'activo', '2026-07-03 23:51:34', '2026-07-03 23:52:03'),
	(66, 1, NULL, 2, NULL, 7, 0.4100, NULL, NULL, 0, 'activo', '2026-07-03 23:52:28', '2026-07-03 23:52:28');

-- Volcando estructura para tabla correas_center.detalle_industrias
CREATE TABLE IF NOT EXISTS `detalle_industrias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `industria_id` bigint unsigned NOT NULL,
  `grupo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campo_id` bigint unsigned NOT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_industrias_industria_id_grupo_campo_id_index` (`industria_id`,`grupo`,`campo_id`),
  CONSTRAINT `detalle_industrias_industria_id_foreign` FOREIGN KEY (`industria_id`) REFERENCES `industrias` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.detalle_industrias: ~45 rows (aproximadamente)
INSERT IGNORE INTO `detalle_industrias` (`id`, `industria_id`, `grupo`, `campo_id`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Categoria', 18, 1, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(2, 1, 'Categoria', 33, 2, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(3, 1, 'Categoria', 37, 3, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(4, 1, 'Servicio', 4, 4, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(5, 1, 'Servicio', 6, 5, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(6, 2, 'Categoria', 5, 6, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(7, 2, 'Categoria', 29, 7, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(8, 2, 'Categoria', 38, 8, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(9, 2, 'Servicio', 4, 9, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(10, 2, 'Servicio', 6, 10, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(11, 3, 'Categoria', 35, 11, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(12, 3, 'Categoria', 42, 12, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(13, 3, 'Categoria', 53, 13, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(14, 3, 'Servicio', 3, 14, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(15, 3, 'Servicio', 6, 15, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(16, 4, 'Categoria', 4, 16, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(17, 4, 'Categoria', 20, 17, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(18, 4, 'Categoria', 39, 18, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(19, 4, 'Servicio', 3, 19, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(20, 4, 'Servicio', 5, 20, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(21, 5, 'Categoria', 2, 21, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(22, 5, 'Categoria', 12, 22, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(23, 5, 'Categoria', 54, 23, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(24, 5, 'Servicio', 1, 24, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(25, 5, 'Servicio', 4, 25, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(26, 6, 'Categoria', 3, 26, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(27, 6, 'Categoria', 4, 27, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(28, 6, 'Categoria', 11, 28, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(29, 6, 'Servicio', 3, 29, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(30, 6, 'Servicio', 4, 30, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(31, 7, 'Categoria', 11, 31, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(32, 7, 'Categoria', 35, 32, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(33, 7, 'Categoria', 51, 33, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(34, 7, 'Servicio', 2, 34, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(35, 7, 'Servicio', 5, 35, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(36, 8, 'Categoria', 18, 36, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(37, 8, 'Categoria', 32, 37, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(38, 8, 'Categoria', 57, 38, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(39, 8, 'Servicio', 5, 39, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(40, 8, 'Servicio', 6, 40, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(41, 9, 'Categoria', 28, 41, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(42, 9, 'Categoria', 40, 42, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(43, 9, 'Categoria', 60, 43, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(44, 9, 'Servicio', 1, 44, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(45, 9, 'Servicio', 2, 45, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04');

-- Volcando estructura para tabla correas_center.detalle_menus
CREATE TABLE IF NOT EXISTS `detalle_menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` bigint unsigned NOT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_menus_menu_id_foreign` (`menu_id`),
  CONSTRAINT `detalle_menus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.detalle_menus: ~61 rows (aproximadamente)
INSERT IGNORE INTO `detalle_menus` (`id`, `menu_id`, `ruta`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, '/products/correas/correas-en-v', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(2, 1, '/products/correas/correas-dentadas', 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(3, 1, '/products/correas/correas-variadoras', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(4, 1, '/products/correas/correas-acanaladas', 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(5, 2, '/products/mangueras/mangueras-hidraulicas', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(6, 2, '/products/mangueras/mangueras-de-succion-y-descarga', 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(7, 2, '/products/mangueras/mangueras-multiusos', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(8, 2, '/products/mangueras/mangueras-neumaticas', 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(9, 3, '/products/rodamientos/rodamientos-de-rodillos', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(10, 3, '/products/rodamientos/rodamientos-de-bolas', 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(11, 3, '/products/rodamientos/rodamientos-de-agujas', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(12, 3, '/products/rodamientos/rodamientos-axiales', 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(13, 3, '/products/rodamientos/rodamientos-lineales', 5, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(14, 4, '/products/retenes-sellos-y-o-rings/retenes', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(15, 4, '/products/retenes-sellos-y-o-rings/sellos-mecanicos', 2, 'inactivo', '2026-07-01 19:41:05', '2026-07-07 20:06:28'),
	(16, 4, '/products/retenes-sellos-y-o-rings/o-rings', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(17, 4, '/products/retenes-sellos-y-o-rings/sellos-hidraulicos', 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(18, 4, '/products/retenes-sellos-y-o-rings/sellos-neumaticos', 5, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(19, 5, '/products/bandas-transportadoras-pesadas/bandas-lisas', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(20, 5, '/products/bandas-transportadoras-pesadas/bandas-nervadas', 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(21, 5, '/products/bandas-transportadoras-pesadas/bandas-verticales', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(22, 5, '/products/bandas-transportadoras-pesadas/bandas-con-bordes', 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(23, 5, '/products/bandas-transportadoras-pesadas/bandas-corrugadas', 5, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(24, 6, '/products/bandas-transportadoras-livianas/bandas-sintenticas', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(25, 6, '/products/bandas-transportadoras-livianas/bandas-modulares', 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(26, 6, '/products/bandas-transportadoras-livianas/bandas-ptfe', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(27, 6, '/products/bandas-transportadoras-livianas/bandas-homogeneas', 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(28, 6, '/products/bandas-transportadoras-livianas/bandas-de-caucho-ligeras', 5, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(29, 7, '/products/cadenas/cadenas-de-rodillos-de-precision', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(30, 7, '/products/cadenas/cadenas-de-acero-inoxidable', 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(31, 7, '/products/cadenas/cadenas-de-transmision', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(32, 7, '/products/cadenas/cadenas-con-transportador', 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(33, 7, '/products/cadenas/cadenas-agricolas', 5, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(34, 8, '/products/poleas/poleas-en-v-de-taladro-conico-y-cilindrico', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(35, 8, '/products/poleas/poleas-sincronicas', 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(36, 8, '/products/poleas/poleas-mi-lock', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(37, 9, '/products/pinones/pinones-de-taladro-conico', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(38, 9, '/products/pinones/pinones-con-agujero-piloto', 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(39, 9, '/products/pinones/pinones-simples-de-taladro-conico-para-2-cadenas', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(40, 10, '/products/niples-conexiones-y-conectores/niples-hidraulicos', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(41, 10, '/products/niples-conexiones-y-conectores/niples-de-cobre', 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(42, 10, '/products/niples-conexiones-y-conectores/conexiones-rapidas', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(43, 10, '/products/niples-conexiones-y-conectores/adaptadores', 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(44, 10, '/products/niples-conexiones-y-conectores/conectores-rapidos', 5, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(45, 11, '/products/cilindros/cilindros-neumaticos', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(46, 11, '/products/cilindros/cilindros-htr-tirantes', 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(47, 11, '/products/cilindros/cilindros-hcw-patentado', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(48, 12, '/products/cangilones/cangilones-hd-stax-heavy-duty', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(49, 12, '/products/cangilones/cangilones-de-nylon', 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(50, 12, '/products/cangilones/cangilones-de-poliuretano', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(51, 12, '/products/cangilones/pernos', 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(52, 12, '/products/cangilones/grapas-de-empalme-mecanico', 5, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(53, 13, '/products/cardanes/cardanes-agricolas', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(54, 14, '/products/cajas-de-comandos/caja-de-comando-de-1-palanca', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(55, 14, '/products/cajas-de-comandos/caja-de-comandos-de-2-palancas', 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(56, 14, '/products/cajas-de-comandos/caja-de-comandos-de-3-palancas', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(57, 14, '/products/cajas-de-comandos/caja-de-comandos-de-4-palancas', 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(58, 15, '/products/abrazaderas/abrazaderas-galvanizadas', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(59, 15, '/products/abrazaderas/abrazaderas-inoxidables', 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(60, 15, '/products/abrazaderas/abrazaderas-de-tornillo', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(61, 15, '/products/abrazaderas/abrazaderas-de-alambre', 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05');

-- Volcando estructura para tabla correas_center.detalle_productos
CREATE TABLE IF NOT EXISTS `detalle_productos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `producto_id` bigint unsigned NOT NULL,
  `marca_id` bigint unsigned NOT NULL,
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_productos_producto_id_foreign` (`producto_id`),
  KEY `detalle_productos_marca_id_foreign` (`marca_id`),
  CONSTRAINT `detalle_productos_marca_id_foreign` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detalle_productos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.detalle_productos: ~75 rows (aproximadamente)
INSERT IGNORE INTO `detalle_productos` (`id`, `producto_id`, `marca_id`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 5, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(2, 1, 6, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(3, 1, 8, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(4, 1, 14, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(5, 1, 17, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(6, 2, 7, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(7, 2, 12, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(8, 2, 15, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(9, 2, 17, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(10, 2, 22, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(11, 3, 4, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(12, 3, 5, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(13, 3, 9, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(14, 3, 16, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(15, 3, 17, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(16, 4, 2, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(17, 4, 4, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(18, 4, 6, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(19, 4, 12, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(20, 4, 18, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(21, 5, 5, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(22, 5, 9, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(23, 5, 14, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(24, 5, 20, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(25, 5, 22, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(26, 6, 5, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(27, 6, 8, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(28, 6, 10, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(29, 6, 12, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(30, 6, 19, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(31, 7, 1, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(32, 7, 8, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(33, 7, 19, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(34, 7, 20, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(35, 7, 21, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(36, 8, 14, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(37, 8, 15, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(38, 8, 16, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(39, 8, 18, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(40, 8, 19, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(41, 9, 2, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(42, 9, 9, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(43, 9, 10, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(44, 9, 20, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(45, 9, 21, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(46, 10, 4, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(47, 10, 11, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(48, 10, 12, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(49, 10, 13, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(50, 10, 22, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(51, 11, 1, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(52, 11, 3, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(53, 11, 13, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(54, 11, 18, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(55, 11, 22, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(56, 12, 6, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(57, 12, 9, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(58, 12, 10, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(59, 12, 14, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(60, 12, 22, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(61, 13, 2, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(62, 13, 8, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(63, 13, 15, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(64, 13, 17, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(65, 13, 19, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(66, 14, 2, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(67, 14, 4, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(68, 14, 10, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(69, 14, 15, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(70, 14, 21, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(71, 15, 6, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(72, 15, 8, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(73, 15, 13, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(74, 15, 15, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(75, 15, 20, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04');

-- Volcando estructura para tabla correas_center.detalle_registros
CREATE TABLE IF NOT EXISTS `detalle_registros` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint unsigned NOT NULL,
  `registro_id` bigint unsigned NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `icono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stats` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `detalle_registros_empresa_id_foreign` (`empresa_id`),
  KEY `detalle_registros_registro_id_foreign` (`registro_id`),
  CONSTRAINT `detalle_registros_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `detalle_registros_registro_id_foreign` FOREIGN KEY (`registro_id`) REFERENCES `registros` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.detalle_registros: ~21 rows (aproximadamente)
INSERT IGNORE INTO `detalle_registros` (`id`, `empresa_id`, `registro_id`, `titulo`, `descripcion`, `icono`, `stats`, `subtitulo`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 4, 'Visión', 'Ser la empresa líder en soluciones industriales, hidráulicas y neumáticas en Bolivia, reconocida por nuestra calidad, servicio técnico especializado y compromiso con el desarrollo industrial del país.', 'Eye', NULL, NULL, 1, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(2, 1, 4, 'Misión', 'Proveer soluciones integrales de transmisión de potencia, sistemas hidráulicos y neumáticos con los más altos estándares de calidad, brindando asesoría técnica especializada y servicio personalizado a nuestros clientes.', 'Target', NULL, NULL, 2, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(3, 1, 4, 'Valores', 'Ética decidida, integridad, compromiso, calidad, innovación, servicio al cliente, responsabilidad social y trabajo en equipo.', 'Heart', NULL, NULL, 3, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(4, 1, 6, '1998', 'Correas Center inicia operaciones en La Paz, Bolivia, enfocándose en la venta de correas industriales y servicios de asesoría técnica.', 'Calendar', NULL, 'Fundación', 1, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(5, 1, 6, '2005', 'Apertura de sucursales en Santa Cruz y Cochabamba, ampliando nuestra cobertura a las principales ciudades del país.', 'MapPin', NULL, 'Expansión Nacional', 2, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(6, 1, 6, '2010', 'Obtención de la licencia exclusiva para fabricar sellos SKF en Bolivia, consolidándonos como líderes en el mercado.', 'Award', NULL, 'Licencia SKF', 3, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(7, 1, 6, '2015', 'Ampliación del catálogo para incluir sistemas hidráulicos, neumáticos y bandas transportadoras, ofreciendo soluciones integrales.', 'Package', NULL, 'Diversificación', 4, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(8, 1, 6, '2020', 'Implementación de sistemas digitales para mejorar la atención al cliente y optimizar los procesos internos.', 'Zap', NULL, 'Innovación Tecnológica', 5, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(9, 1, 6, '2024', 'Más de 25 años de experiencia, 4 sucursales y más de 1000 clientes satisfechos en todo Bolivia.', 'Crown', NULL, 'Líderes del Mercado', 6, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(10, 1, 3, '+25 Años', 'Más de dos décadas liderando el mercado industrial boliviano', 'Clock', NULL, 'Experiencia Comprobada', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(11, 1, 3, 'SKF', 'Únicos autorizados para fabricar sellos SKF en Bolivia', 'Award', NULL, 'Licencia Exclusiva', 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(12, 1, 3, '10,000+', 'Amplio inventario para entregas inmediatas', 'Package', NULL, 'Productos en Stock', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(13, 1, 3, '24/7', 'Asesoría especializada cuando la necesites', 'HeadphonesIcon', NULL, 'Soporte Técnico', 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(14, 1, 3, '4', 'Cobertura nacional para estar cerca de ti', 'MapPin', NULL, 'Sucursales', 5, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(15, 1, 3, '100%', 'Soluciones a medida para cada cliente', 'Users', NULL, 'Atención Personalizada', 6, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(16, 1, 5, 'Calidad Garantizada', 'Productos de las mejores marcas internacionales con garantía de calidad', 'CheckCircle2', NULL, NULL, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(17, 1, 5, 'Asesoría Técnica Especializada', 'Equipo técnico capacitado para brindarte la mejor solución', 'CheckCircle2', NULL, NULL, 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(18, 1, 5, 'Cobertura Nacional', '4 sucursales estratégicamente ubicadas para atenderte mejor', 'CheckCircle2', NULL, NULL, 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(19, 1, 5, 'Entregas Rápidas', 'Amplio inventario para entregas inmediatas en todo Bolivia', 'CheckCircle2', NULL, NULL, 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(20, 1, 5, 'Fabricante Autorizado SKF', 'Únicos autorizados para fabricar sellos SKF en Bolivia', 'CheckCircle2', NULL, NULL, 5, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(21, 1, 5, 'Servicio Personalizado', 'Soluciones a medida para cada cliente y cada industria', 'CheckCircle2', NULL, NULL, 6, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05');

-- Volcando estructura para tabla correas_center.diferenciales
CREATE TABLE IF NOT EXISTS `diferenciales` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint unsigned NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `diferenciales_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `diferenciales_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.diferenciales: ~6 rows (aproximadamente)
INSERT IGNORE INTO `diferenciales` (`id`, `empresa_id`, `titulo`, `subtitulo`, `descripcion`, `icon`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, '+25 Años', 'Experiencia Comprobada', 'Más de dos décadas liderando el mercado industrial boliviano', 'Clock', 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(2, 1, 'SKF', 'Licencia Exclusiva', 'Únicos autorizados para fabricar sellos SKF en Bolivia', 'Award', 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(3, 1, '10,000+', 'Productos en Stock', 'Amplio inventario para entregas inmediatas', 'Package', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(4, 1, '24/7', 'Soporte Técnico', 'Asesoría especializada cuando la necesites', 'HeadphonesIcon', 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(5, 1, '4', 'Sucursales', 'Cobertura nacional para estar cerca de ti', 'MapPin', 5, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(6, 1, '100%', 'Atención Personalizada', 'Soluciones a medida para cada cliente', 'Users', 6, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05');

-- Volcando estructura para tabla correas_center.empresas
CREATE TABLE IF NOT EXISTS `empresas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.empresas: ~0 rows (aproximadamente)
INSERT IGNORE INTO `empresas` (`id`, `nombre`, `logo`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'Correas Center', 'empresa/Logo_CC_Blanco.png', 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03');

-- Volcando estructura para tabla correas_center.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla correas_center.footers
CREATE TABLE IF NOT EXISTS `footers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint unsigned NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campo_id` bigint unsigned DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `mostrar` tinyint(1) NOT NULL DEFAULT '1',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `footers_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `footers_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.footers: ~20 rows (aproximadamente)
INSERT IGNORE INTO `footers` (`id`, `empresa_id`, `tipo`, `campo_id`, `titulo`, `url`, `icono`, `orden`, `mostrar`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 'producto', 1, NULL, NULL, NULL, 1, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(2, 1, 'producto', 2, NULL, NULL, NULL, 2, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(3, 1, 'producto', 3, NULL, NULL, NULL, 3, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(4, 1, 'producto', 4, NULL, NULL, NULL, 4, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(5, 1, 'producto', 5, NULL, NULL, NULL, 5, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(6, 1, 'producto', 6, NULL, NULL, NULL, 6, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(7, 1, 'producto', 7, NULL, NULL, NULL, 7, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(8, 1, 'industria', 1, NULL, NULL, NULL, 1, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(9, 1, 'industria', 2, NULL, NULL, NULL, 2, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(10, 1, 'industria', 3, NULL, NULL, NULL, 3, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(11, 1, 'industria', 4, NULL, NULL, NULL, 4, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(12, 1, 'industria', 5, NULL, NULL, NULL, 5, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(13, 1, 'servicio', 1, NULL, NULL, NULL, 1, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(14, 1, 'servicio', 2, NULL, NULL, NULL, 2, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(15, 1, 'servicio', 3, NULL, NULL, NULL, 3, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(16, 1, 'servicio', 4, NULL, NULL, NULL, 4, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(17, 1, 'red_social', NULL, 'Facebook', 'https://www.facebook.com/CorreasCenterLtda', 'faFacebookF', 1, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(18, 1, 'red_social', NULL, 'Instagram', 'https://www.instagram.com/correascenterltda', 'faInstagram', 2, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(19, 1, 'red_social', NULL, 'TikTok', 'https://www.tiktok.com/@correas.center.ltda', 'faTiktok', 3, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(20, 1, 'red_social', NULL, 'YouTube', 'https://www.youtube.com/@CorreasCenterLtda', 'faYoutube', 4, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05');

-- Volcando estructura para tabla correas_center.gama_productos
CREATE TABLE IF NOT EXISTS `gama_productos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.gama_productos: ~4 rows (aproximadamente)
INSERT IGNORE INTO `gama_productos` (`id`, `nombre`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'Serie A', 1, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(2, 'Serie B', 2, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(3, 'Serie C', 3, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(4, 'Serie D', 4, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04');

-- Volcando estructura para tabla correas_center.heroes
CREATE TABLE IF NOT EXISTS `heroes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint unsigned NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitulo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `badge_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cta_primary_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cta_primary_href` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cta_secondary_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cta_secondary_href` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `heroes_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `heroes_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.heroes: ~5 rows (aproximadamente)
INSERT IGNORE INTO `heroes` (`id`, `empresa_id`, `imagen`, `titulo`, `subtitulo`, `badge_text`, `cta_primary_text`, `cta_primary_href`, `cta_secondary_text`, `cta_secondary_href`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 'hero/Industria.jpg', 'Soluciones Industriales Confiables', 'Más de 25 años brindando repuestos, fabricación especializada y soporte técnico para la industria boliviana.', 'Lider en Soluciones Industriales', 'Solicitar Asesoría', '/contact', 'Ver Productos', '/products', 1, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(2, 1, 'hero/calidad.jpeg', 'Calidad SKF Garantizada', 'Fabricación autorizada SKF con los más altos estándares de calidad.', 'Fabricante Autorizado', 'Conocer Más', '/services/fabricacion-de-sellos-skf', 'Ver Productos', '/products', 2, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(3, 1, 'hero/Cinta transportadora Fabrica.jpeg', 'Bandas Transportadoras, Correas y Transmisiones de Alta Resistencia', 'Amplio stock en bandas transportadoras, correas en V, dentadas, variadoras y acanaladas para todo tipo de maquinaria.', 'Amplio Stock de Productos', 'Ver Correas', '/products/correas', 'Solicitar Cotización', '/contact', 3, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(4, 1, 'hero/Cinta transportadora cargada.png', 'Sistemas Hidráulicos y Neumáticos', 'Mangueras, conectores y componentes hidráulicos de las mejores marcas del mercado.', 'Proveedores de Sistemas Hidráulicos y Neumáticos', 'Ver Mangueras', '/products/mangueras', 'Contactar Ahora', '/contact', 4, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(5, 1, 'hero/soldador.jpeg', 'Entregas Rápidas a Todo Bolivia', 'Entregas rápidas a todo Bolivia con el respaldo de nuestro equipo técnico especializado', 'Cobertura Nacional', 'Contactar Ahora', '/contact', 'Ver Sucursales', '/branches', 5, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04');

-- Volcando estructura para tabla correas_center.industrias
CREATE TABLE IF NOT EXISTS `industrias` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `industrias_slug_unique` (`slug`),
  KEY `industrias_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `industrias_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.industrias: ~9 rows (aproximadamente)
INSERT IGNORE INTO `industrias` (`id`, `empresa_id`, `nombre`, `slug`, `imagen`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Industria Alimenticia', 'industria-alimenticia', '/industria/alimenticia.jpg', 1, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(2, 1, 'Agroindustrial', 'agroindustrial', '/industria/agroindustrial.jpg', 2, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(3, 1, 'Industria Minera', 'industria-minera', '/industria/minera.jpg', 3, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(4, 1, 'Industria Metalúrgica', 'industria-metalurgica', '/industria/metalurgica.jpg', 4, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(5, 1, 'Petróleo y Gas', 'petroleo-y-gas', '/industria/petroleo-gas.jpg', 5, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(6, 1, 'Manufactura', 'manufactura', '/industria/manufactura.jpg', 6, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(7, 1, 'Construcción', 'construccion', '/industria/construccion.jpg', 7, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(8, 1, 'Transporte', 'transporte', '/industria/transporte.jpg', 8, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(9, 1, 'Logística', 'logistica', '/industria/logistica.jpg', 9, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04');

-- Volcando estructura para tabla correas_center.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla correas_center.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.job_batches: ~0 rows (aproximadamente)

-- Volcando estructura para tabla correas_center.marcas
CREATE TABLE IF NOT EXISTS `marcas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `marcas_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.marcas: ~23 rows (aproximadamente)
INSERT IGNORE INTO `marcas` (`id`, `nombre`, `slug`, `logo`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'PERFECT POWER', 'perfect-power', 'marca/Perfect Power.png', 1, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(2, 'SKF', 'skf', 'marca/SKF-DISTRIBUIDOR-ESPECIALISTA-EN-SELLOS-VERTICAL.png', 2, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(3, 'SAV', 'sav', 'marca/SAV.png', 3, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(4, 'ARCA', 'arca', 'marca/ARCA.png', 4, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(5, 'FAG', 'fag', 'marca/FAG-2.png', 5, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(6, 'INA', 'ina', 'marca/INA.jpg', 6, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(7, 'NSK', 'nsk', 'marca/NSK.png', 7, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(8, 'NTN', 'ntn', 'marca/NTN.png', 8, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(9, 'JASON MEGADYNE', 'jason-megadyne', 'marca/JASON_MEGADYNE.jpg', 9, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(10, 'MITSUBA', 'mitsuba', 'marca/mitsuba.jpg', 10, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(11, 'GATES', 'gates', 'marca/GATES.png', 11, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(12, 'ABIX', 'abix', 'marca/ABIX.png', 12, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(13, 'PIX', 'pix', 'marca/PIX.jpg', 13, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(14, 'ZMTE', 'zmte', 'marca/ZMTE.png', 14, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(15, 'PABOVI', 'pabovi', 'marca/Pabovi.png', 15, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(16, 'APC', 'apc', 'marca/APC.png', 16, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(17, 'GMORS', 'gmors', 'marca/GMORS.jpg', 17, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(18, 'HERCULES', 'hercules', 'marca/HERCULES.jpg', 18, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(19, 'WORLD GASKET', 'world-gasket', 'marca/WORLD GASKET.png', 19, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(20, 'F&D', 'fd', 'marca/F&D.png', 20, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(21, 'FBJ', 'fbj', 'marca/FBJ.png', 21, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(22, 'KFB', 'kfb', 'marca/KFB.png', 22, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(23, 'TOP-Q', 'top-q', 'marca/TOP-Q.jpg', 23, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04');

-- Volcando estructura para tabla correas_center.medidas
CREATE TABLE IF NOT EXISTS `medidas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tipo_medida_id` bigint unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `magnitud` decimal(10,4) DEFAULT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `medidas_tipo_medida_id_foreign` (`tipo_medida_id`),
  CONSTRAINT `medidas_tipo_medida_id_foreign` FOREIGN KEY (`tipo_medida_id`) REFERENCES `tipo_medidas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.medidas: ~8 rows (aproximadamente)
INSERT IGNORE INTO `medidas` (`id`, `tipo_medida_id`, `nombre`, `magnitud`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Ancho externo', NULL, 1, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(2, 1, 'Longitud', NULL, 2, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(3, 4, 'Diámetro interno', NULL, 3, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(4, 5, 'Ángulo', NULL, 4, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(5, 6, 'Presión máxima', 3000.0000, 5, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(6, 1, 'Diámetro exterior', 40.0000, 6, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(7, 4, 'Espesor', 0.3100, 7, 'activo', '2026-07-03 23:48:47', '2026-07-03 23:48:47'),
	(8, 4, 'Ancho superior', 0.5000, 8, 'activo', '2026-07-03 23:50:01', '2026-07-03 23:50:01');

-- Volcando estructura para tabla correas_center.menus
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint unsigned NOT NULL,
  `grupo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campo_id` bigint unsigned DEFAULT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mostrar` tinyint(1) NOT NULL DEFAULT '1',
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_empresa_id_foreign` (`empresa_id`),
  KEY `menus_grupo_campo_id_index` (`grupo`,`campo_id`),
  CONSTRAINT `menus_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.menus: ~30 rows (aproximadamente)
INSERT IGNORE INTO `menus` (`id`, `empresa_id`, `grupo`, `campo_id`, `ruta`, `icon`, `mostrar`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Producto', 1, '/products/correas', 'fa-box', 1, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(2, 1, 'Producto', 2, '/products/mangueras', 'fa-box', 1, 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(3, 1, 'Producto', 3, '/products/rodamientos', 'fa-box', 1, 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(4, 1, 'Producto', 4, '/products/retenes-sellos-y-o-rings', 'fa-box', 1, 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(5, 1, 'Producto', 5, '/products/bandas-transportadoras-pesadas', 'fa-box', 1, 5, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(6, 1, 'Producto', 6, '/products/bandas-transportadoras-livianas', 'fa-box', 1, 6, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(7, 1, 'Producto', 7, '/products/cadenas', 'fa-box', 1, 7, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(8, 1, 'Producto', 8, '/products/poleas', 'fa-box', 1, 8, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(9, 1, 'Producto', 9, '/products/pinones', 'fa-box', 1, 9, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(10, 1, 'Producto', 10, '/products/niples-conexiones-y-conectores', 'fa-box', 1, 10, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(11, 1, 'Producto', 11, '/products/cilindros', 'fa-box', 1, 11, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(12, 1, 'Producto', 12, '/products/cangilones', 'fa-box', 1, 12, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(13, 1, 'Producto', 13, '/products/cardanes', 'fa-box', 1, 13, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(14, 1, 'Producto', 14, '/products/cajas-de-comandos', 'fa-box', 1, 14, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(15, 1, 'Producto', 15, '/products/abrazaderas', 'fa-box', 1, 15, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(16, 1, 'Aplicacion', 1, '/applications/industria-alimenticia', 'fa-industry', 1, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(17, 1, 'Aplicacion', 2, '/applications/agroindustrial', 'fa-industry', 1, 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(18, 1, 'Aplicacion', 3, '/applications/industria-minera', 'fa-industry', 1, 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(19, 1, 'Aplicacion', 4, '/applications/industria-metalurgica', 'fa-industry', 1, 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(20, 1, 'Aplicacion', 5, '/applications/petroleo-y-gas', 'fa-industry', 1, 5, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(21, 1, 'Aplicacion', 6, '/applications/manufactura', 'fa-industry', 1, 6, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(22, 1, 'Aplicacion', 7, '/applications/construccion', 'fa-industry', 1, 7, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(23, 1, 'Aplicacion', 8, '/applications/transporte', 'fa-industry', 1, 8, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(24, 1, 'Aplicacion', 9, '/applications/logistica', 'fa-industry', 1, 9, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(25, 1, 'Servicio', 1, '/services/fabricacion-de-sellos-skf', 'fa-wrench', 1, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(26, 1, 'Servicio', 2, '/services/prensado-de-mangueras', 'fa-wrench', 1, 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(27, 1, 'Servicio', 3, '/services/reparacion-de-cilindros', 'fa-wrench', 1, 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(28, 1, 'Servicio', 4, '/services/fabricacion-de-o-rings', 'fa-wrench', 1, 4, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(29, 1, 'Servicio', 5, '/services/asesoria-tecnica-industrial', 'fa-wrench', 1, 5, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(30, 1, 'Servicio', 6, '/services/empalmes-y-montaje-de-bandas', 'fa-wrench', 1, 6, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05');

-- Volcando estructura para tabla correas_center.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.migrations: ~0 rows (aproximadamente)
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2026_06_18_185513_create_empresas_table', 1),
	(5, '2026_06_18_185513_create_registros_table', 1),
	(6, '2026_06_18_185514_create_detalle_registros_table', 1),
	(7, '2026_06_18_185514_create_sucursales_table', 1),
	(8, '2026_06_18_185515_create_productos_table', 1),
	(9, '2026_06_18_185516_create_marcas_table', 1),
	(10, '2026_06_18_185517_create_categorias_table', 1),
	(11, '2026_06_18_185517_create_detalle_productos_table', 1),
	(12, '2026_06_18_185518_create_gama_productos_table', 1),
	(13, '2026_06_18_185518_create_tipo_medidas_table', 1),
	(14, '2026_06_18_185519_create_caracteristicas_table', 1),
	(15, '2026_06_18_185519_create_medidas_table', 1),
	(16, '2026_06_18_185520_create_composiciones_table', 1),
	(17, '2026_06_18_185521_create_aplicaciones_table', 1),
	(18, '2026_06_18_185521_create_detalle_categorias_table', 1),
	(19, '2026_06_18_185522_create_servicios_table', 1),
	(20, '2026_06_18_185523_create_industrias_table', 1),
	(21, '2026_06_18_185524_create_detalle_industrias_table', 1),
	(22, '2026_06_18_185525_create_heroes_table', 1),
	(23, '2026_06_18_185525_create_menus_table', 1),
	(24, '2026_06_18_185526_create_detalle_menus_table', 1),
	(25, '2026_06_19_124122_create_contactos_table', 1),
	(26, '2026_06_19_150430_create_diferenciales_table', 1),
	(27, '2026_06_19_150458_create_caracteristicas_infraestructura_table', 1),
	(28, '2026_06_19_150539_create_capacidades_infraestructura_table', 1),
	(29, '2026_06_19_150613_create_pasos_wizard_table', 1),
	(30, '2026_06_20_164858_add_uso_to_categorias_table', 1),
	(31, '2026_06_22_182252_create_footer_configuracions_table', 1),
	(32, '2026_06_22_182351_create_footer_porque_elegirnos_table', 1),
	(33, '2026_06_22_182643_add_mostrar_to_menus_table', 1),
	(34, '2026_06_24_122019_add_orden_to_detalle_menus_table', 1),
	(35, '2026_06_24_130536_add_orden_to_marcas_table', 1),
	(36, '2026_06_24_140315_add_orden_to_sucursales_table', 1),
	(37, '2026_06_25_140116_update_registros_table_add_fields', 1),
	(38, '2026_06_25_140117_update_detalle_registros_table_add_fields', 1),
	(39, '2026_06_25_161340_rename_footer_configuracions_to_footers', 1),
	(40, '2026_06_25_195729_add_empresa_id_to_diferenciales_table', 1),
	(41, '2026_06_25_214412_rename_footer_porque_elegirnos_to_porque_elegirnos', 1),
	(42, '2026_06_26_132352_add_empresa_id_and_orden_to_servicios_table', 1),
	(43, '2026_06_26_180650_add_empresa_id_to_productos_table', 1),
	(44, '2026_06_27_165509_add_valor_personalizado_to_detalle_categorias_table', 1),
	(45, '2026_06_29_154234_add_estado_to_users_table', 1),
	(46, '2026_06_29_211107_create_permission_tables', 1),
	(47, '2026_06_30_182726_create_suscriptores_table', 1);

-- Volcando estructura para tabla correas_center.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.model_has_permissions: ~0 rows (aproximadamente)

-- Volcando estructura para tabla correas_center.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.model_has_roles: ~0 rows (aproximadamente)
INSERT IGNORE INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1);

-- Volcando estructura para tabla correas_center.pasos_wizard
CREATE TABLE IF NOT EXISTS `pasos_wizard` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint unsigned NOT NULL,
  `identificador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuente_datos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campo_filtro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pasos_wizard_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `pasos_wizard_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.pasos_wizard: ~3 rows (aproximadamente)
INSERT IGNORE INTO `pasos_wizard` (`id`, `empresa_id`, `identificador`, `titulo`, `descripcion`, `fuente_datos`, `campo_filtro`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 'industria', '¿En qué industria trabajas?', 'Selecciona tu sector para recomendarte los mejores productos', 'industrias', NULL, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(2, 1, 'producto', '¿Qué tipo de producto necesitas?', 'Elige la categoría principal de producto', 'productos', NULL, 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(3, 1, 'categoria', 'Selecciona la subcategoría específica', 'Elige la variante que mejor se adapte a tu necesidad', 'categorias', 'producto_id', 3, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05');

-- Volcando estructura para tabla correas_center.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla correas_center.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=318 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.permissions: ~317 rows (aproximadamente)
INSERT IGNORE INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'ViewAny:Aplicacion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(2, 'View:Aplicacion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(3, 'Create:Aplicacion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(4, 'Update:Aplicacion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(5, 'Delete:Aplicacion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(6, 'DeleteAny:Aplicacion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(7, 'Restore:Aplicacion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(8, 'ForceDelete:Aplicacion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(9, 'ForceDeleteAny:Aplicacion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(10, 'RestoreAny:Aplicacion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(11, 'Replicate:Aplicacion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(12, 'Reorder:Aplicacion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(13, 'ViewAny:CapacidadInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(14, 'View:CapacidadInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(15, 'Create:CapacidadInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(16, 'Update:CapacidadInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(17, 'Delete:CapacidadInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(18, 'DeleteAny:CapacidadInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(19, 'Restore:CapacidadInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(20, 'ForceDelete:CapacidadInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(21, 'ForceDeleteAny:CapacidadInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(22, 'RestoreAny:CapacidadInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(23, 'Replicate:CapacidadInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(24, 'Reorder:CapacidadInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(25, 'ViewAny:CaracteristicaInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(26, 'View:CaracteristicaInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(27, 'Create:CaracteristicaInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(28, 'Update:CaracteristicaInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(29, 'Delete:CaracteristicaInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(30, 'DeleteAny:CaracteristicaInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(31, 'Restore:CaracteristicaInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(32, 'ForceDelete:CaracteristicaInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(33, 'ForceDeleteAny:CaracteristicaInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(34, 'RestoreAny:CaracteristicaInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(35, 'Replicate:CaracteristicaInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(36, 'Reorder:CaracteristicaInfraestructura', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(37, 'ViewAny:Caracteristica', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(38, 'View:Caracteristica', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(39, 'Create:Caracteristica', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(40, 'Update:Caracteristica', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(41, 'Delete:Caracteristica', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(42, 'DeleteAny:Caracteristica', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(43, 'Restore:Caracteristica', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(44, 'ForceDelete:Caracteristica', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(45, 'ForceDeleteAny:Caracteristica', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(46, 'RestoreAny:Caracteristica', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(47, 'Replicate:Caracteristica', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(48, 'Reorder:Caracteristica', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(49, 'ViewAny:Categoria', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(50, 'View:Categoria', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(51, 'Create:Categoria', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(52, 'Update:Categoria', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(53, 'Delete:Categoria', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(54, 'DeleteAny:Categoria', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(55, 'Restore:Categoria', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(56, 'ForceDelete:Categoria', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(57, 'ForceDeleteAny:Categoria', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(58, 'RestoreAny:Categoria', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(59, 'Replicate:Categoria', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(60, 'Reorder:Categoria', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(61, 'ViewAny:Composicion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(62, 'View:Composicion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(63, 'Create:Composicion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(64, 'Update:Composicion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(65, 'Delete:Composicion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(66, 'DeleteAny:Composicion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(67, 'Restore:Composicion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(68, 'ForceDelete:Composicion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(69, 'ForceDeleteAny:Composicion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(70, 'RestoreAny:Composicion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(71, 'Replicate:Composicion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(72, 'Reorder:Composicion', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(73, 'ViewAny:Contacto', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(74, 'View:Contacto', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(75, 'Create:Contacto', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(76, 'Update:Contacto', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(77, 'Delete:Contacto', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(78, 'DeleteAny:Contacto', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(79, 'Restore:Contacto', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(80, 'ForceDelete:Contacto', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(81, 'ForceDeleteAny:Contacto', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(82, 'RestoreAny:Contacto', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(83, 'Replicate:Contacto', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(84, 'Reorder:Contacto', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(85, 'ViewAny:Diferencial', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(86, 'View:Diferencial', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(87, 'Create:Diferencial', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(88, 'Update:Diferencial', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(89, 'Delete:Diferencial', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(90, 'DeleteAny:Diferencial', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(91, 'Restore:Diferencial', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(92, 'ForceDelete:Diferencial', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(93, 'ForceDeleteAny:Diferencial', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(94, 'RestoreAny:Diferencial', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(95, 'Replicate:Diferencial', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(96, 'Reorder:Diferencial', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(97, 'ViewAny:Empresa', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(98, 'View:Empresa', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(99, 'Create:Empresa', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(100, 'Update:Empresa', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(101, 'Delete:Empresa', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(102, 'DeleteAny:Empresa', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(103, 'Restore:Empresa', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(104, 'ForceDelete:Empresa', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(105, 'ForceDeleteAny:Empresa', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(106, 'RestoreAny:Empresa', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(107, 'Replicate:Empresa', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(108, 'Reorder:Empresa', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(109, 'ViewAny:Footer', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(110, 'View:Footer', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(111, 'Create:Footer', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(112, 'Update:Footer', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(113, 'Delete:Footer', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(114, 'DeleteAny:Footer', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(115, 'Restore:Footer', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(116, 'ForceDelete:Footer', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(117, 'ForceDeleteAny:Footer', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(118, 'RestoreAny:Footer', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(119, 'Replicate:Footer', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(120, 'Reorder:Footer', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(121, 'ViewAny:GamaProducto', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(122, 'View:GamaProducto', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(123, 'Create:GamaProducto', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(124, 'Update:GamaProducto', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(125, 'Delete:GamaProducto', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(126, 'DeleteAny:GamaProducto', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(127, 'Restore:GamaProducto', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(128, 'ForceDelete:GamaProducto', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(129, 'ForceDeleteAny:GamaProducto', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(130, 'RestoreAny:GamaProducto', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(131, 'Replicate:GamaProducto', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(132, 'Reorder:GamaProducto', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(133, 'ViewAny:Hero', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(134, 'View:Hero', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(135, 'Create:Hero', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(136, 'Update:Hero', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(137, 'Delete:Hero', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(138, 'DeleteAny:Hero', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(139, 'Restore:Hero', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(140, 'ForceDelete:Hero', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(141, 'ForceDeleteAny:Hero', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(142, 'RestoreAny:Hero', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(143, 'Replicate:Hero', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(144, 'Reorder:Hero', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(145, 'ViewAny:Industria', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(146, 'View:Industria', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(147, 'Create:Industria', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(148, 'Update:Industria', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(149, 'Delete:Industria', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(150, 'DeleteAny:Industria', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(151, 'Restore:Industria', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(152, 'ForceDelete:Industria', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(153, 'ForceDeleteAny:Industria', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(154, 'RestoreAny:Industria', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(155, 'Replicate:Industria', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(156, 'Reorder:Industria', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(157, 'ViewAny:Marca', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(158, 'View:Marca', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(159, 'Create:Marca', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(160, 'Update:Marca', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(161, 'Delete:Marca', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(162, 'DeleteAny:Marca', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(163, 'Restore:Marca', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(164, 'ForceDelete:Marca', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(165, 'ForceDeleteAny:Marca', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(166, 'RestoreAny:Marca', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(167, 'Replicate:Marca', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(168, 'Reorder:Marca', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(169, 'ViewAny:Medida', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(170, 'View:Medida', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(171, 'Create:Medida', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(172, 'Update:Medida', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(173, 'Delete:Medida', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(174, 'DeleteAny:Medida', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(175, 'Restore:Medida', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(176, 'ForceDelete:Medida', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(177, 'ForceDeleteAny:Medida', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(178, 'RestoreAny:Medida', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(179, 'Replicate:Medida', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(180, 'Reorder:Medida', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(181, 'ViewAny:Menu', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(182, 'View:Menu', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(183, 'Create:Menu', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(184, 'Update:Menu', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(185, 'Delete:Menu', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(186, 'DeleteAny:Menu', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(187, 'Restore:Menu', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(188, 'ForceDelete:Menu', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(189, 'ForceDeleteAny:Menu', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(190, 'RestoreAny:Menu', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(191, 'Replicate:Menu', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(192, 'Reorder:Menu', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(193, 'ViewAny:PasoWizard', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(194, 'View:PasoWizard', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(195, 'Create:PasoWizard', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(196, 'Update:PasoWizard', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(197, 'Delete:PasoWizard', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(198, 'DeleteAny:PasoWizard', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(199, 'Restore:PasoWizard', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(200, 'ForceDelete:PasoWizard', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(201, 'ForceDeleteAny:PasoWizard', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(202, 'RestoreAny:PasoWizard', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(203, 'Replicate:PasoWizard', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(204, 'Reorder:PasoWizard', 'web', '2026-07-01 19:55:19', '2026-07-01 19:55:19'),
	(205, 'ViewAny:PorqueElegirnos', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(206, 'View:PorqueElegirnos', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(207, 'Create:PorqueElegirnos', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(208, 'Update:PorqueElegirnos', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(209, 'Delete:PorqueElegirnos', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(210, 'DeleteAny:PorqueElegirnos', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(211, 'Restore:PorqueElegirnos', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(212, 'ForceDelete:PorqueElegirnos', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(213, 'ForceDeleteAny:PorqueElegirnos', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(214, 'RestoreAny:PorqueElegirnos', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(215, 'Replicate:PorqueElegirnos', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(216, 'Reorder:PorqueElegirnos', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(217, 'ViewAny:Producto', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(218, 'View:Producto', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(219, 'Create:Producto', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(220, 'Update:Producto', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(221, 'Delete:Producto', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(222, 'DeleteAny:Producto', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(223, 'Restore:Producto', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(224, 'ForceDelete:Producto', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(225, 'ForceDeleteAny:Producto', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(226, 'RestoreAny:Producto', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(227, 'Replicate:Producto', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(228, 'Reorder:Producto', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(229, 'ViewAny:User', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(230, 'View:User', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(231, 'Create:User', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(232, 'Update:User', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(233, 'Delete:User', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(234, 'DeleteAny:User', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(235, 'Restore:User', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(236, 'ForceDelete:User', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(237, 'ForceDeleteAny:User', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(238, 'RestoreAny:User', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(239, 'Replicate:User', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(240, 'Reorder:User', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(241, 'ViewAny:Registro', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(242, 'View:Registro', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(243, 'Create:Registro', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(244, 'Update:Registro', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(245, 'Delete:Registro', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(246, 'DeleteAny:Registro', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(247, 'Restore:Registro', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(248, 'ForceDelete:Registro', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(249, 'ForceDeleteAny:Registro', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(250, 'RestoreAny:Registro', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(251, 'Replicate:Registro', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(252, 'Reorder:Registro', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(253, 'ViewAny:Servicio', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(254, 'View:Servicio', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(255, 'Create:Servicio', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(256, 'Update:Servicio', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(257, 'Delete:Servicio', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(258, 'DeleteAny:Servicio', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(259, 'Restore:Servicio', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(260, 'ForceDelete:Servicio', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(261, 'ForceDeleteAny:Servicio', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(262, 'RestoreAny:Servicio', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(263, 'Replicate:Servicio', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(264, 'Reorder:Servicio', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(265, 'ViewAny:Sucursal', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(266, 'View:Sucursal', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(267, 'Create:Sucursal', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(268, 'Update:Sucursal', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(269, 'Delete:Sucursal', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(270, 'DeleteAny:Sucursal', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(271, 'Restore:Sucursal', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(272, 'ForceDelete:Sucursal', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(273, 'ForceDeleteAny:Sucursal', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(274, 'RestoreAny:Sucursal', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(275, 'Replicate:Sucursal', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(276, 'Reorder:Sucursal', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(277, 'ViewAny:Suscriptor', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(278, 'View:Suscriptor', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(279, 'Create:Suscriptor', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(280, 'Update:Suscriptor', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(281, 'Delete:Suscriptor', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(282, 'DeleteAny:Suscriptor', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(283, 'Restore:Suscriptor', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(284, 'ForceDelete:Suscriptor', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(285, 'ForceDeleteAny:Suscriptor', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(286, 'RestoreAny:Suscriptor', 'web', '2026-07-01 19:55:20', '2026-07-01 19:55:20'),
	(287, 'Replicate:Suscriptor', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(288, 'Reorder:Suscriptor', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(289, 'ViewAny:TipoMedida', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(290, 'View:TipoMedida', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(291, 'Create:TipoMedida', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(292, 'Update:TipoMedida', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(293, 'Delete:TipoMedida', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(294, 'DeleteAny:TipoMedida', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(295, 'Restore:TipoMedida', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(296, 'ForceDelete:TipoMedida', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(297, 'ForceDeleteAny:TipoMedida', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(298, 'RestoreAny:TipoMedida', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(299, 'Replicate:TipoMedida', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(300, 'Reorder:TipoMedida', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(301, 'ViewAny:Role', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(302, 'View:Role', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(303, 'Create:Role', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(304, 'Update:Role', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(305, 'Delete:Role', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(306, 'DeleteAny:Role', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(307, 'Restore:Role', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(308, 'ForceDelete:Role', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(309, 'ForceDeleteAny:Role', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(310, 'RestoreAny:Role', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(311, 'Replicate:Role', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(312, 'Reorder:Role', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(313, 'View:StatsOverview', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(314, 'View:MensajesRecientesWidget', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(315, 'View:AccesosRapidosWidget', 'web', '2026-07-01 19:55:21', '2026-07-01 19:55:21'),
	(316, 'View:ProductosPorCategoriaChart', 'web', '2026-07-01 19:55:22', '2026-07-01 19:55:22'),
	(317, 'View:EstadoSistemaWidget', 'web', '2026-07-01 19:55:22', '2026-07-01 19:55:22');

-- Volcando estructura para tabla correas_center.porque_elegirnos
CREATE TABLE IF NOT EXISTS `porque_elegirnos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint unsigned NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `icono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `mostrar` tinyint(1) NOT NULL DEFAULT '1',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `porque_elegirnos_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `porque_elegirnos_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.porque_elegirnos: ~6 rows (aproximadamente)
INSERT IGNORE INTO `porque_elegirnos` (`id`, `empresa_id`, `titulo`, `descripcion`, `icono`, `orden`, `mostrar`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Calidad Garantizada', 'Productos de las mejores marcas internacionales con garantía de calidad', 'CheckCircle2', 1, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(2, 1, 'Asesoría Técnica Especializada', 'Equipo técnico capacitado para brindarte la mejor solución', 'CheckCircle2', 2, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(3, 1, 'Cobertura Nacional', '4 sucursales estratégicamente ubicadas para atenderte mejor', 'CheckCircle2', 3, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(4, 1, 'Entregas Rápidas', 'Amplio inventario para entregas inmediatas en todo Bolivia', 'CheckCircle2', 4, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(5, 1, 'Fabricante Autorizado SKF', 'Únicos autorizados para fabricar sellos SKF en Bolivia', 'CheckCircle2', 5, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
	(6, 1, 'Servicio Personalizado', 'Soluciones a medida para cada cliente y cada industria', 'CheckCircle2', 6, 1, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05');

-- Volcando estructura para tabla correas_center.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `productos_slug_unique` (`slug`),
  KEY `productos_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `productos_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.productos: ~15 rows (aproximadamente)
INSERT IGNORE INTO `productos` (`id`, `empresa_id`, `nombre`, `slug`, `imagen`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Correas', 'correas', 'producto/Correas.jpg', 1, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(2, 1, 'Mangueras', 'mangueras', 'producto/Mangueras.jpg', 2, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(3, 1, 'Rodamientos', 'rodamientos', 'producto/Rodamientos.jpg', 3, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(4, 1, 'Retenes, Sellos y O-rings', 'retenes-sellos-y-o-rings', 'producto/Retenes_Sellos_Cubetas.png', 4, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(5, 1, 'Bandas Transportadoras Pesadas', 'bandas-transportadoras-pesadas', 'producto/Bandas_Transportadoras_Pesadas.jpg', 5, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(6, 1, 'Bandas Transportadoras Livianas', 'bandas-transportadoras-livianas', 'producto/Bandas_Transportadoras_Livianas.png', 6, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(7, 1, 'Cadenas', 'cadenas', 'producto/Cadenas.jpg', 7, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(8, 1, 'Poleas', 'poleas', 'producto/Poleas.jpg', 8, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(9, 1, 'Piñones', 'pinones', 'producto/Piñones.jpg', 9, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(10, 1, 'Niples, Conexiones y Conectores', 'niples-conexiones-y-conectores', 'producto/Niples_Casquillos_ConectoresHidraulicos.png', 10, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(11, 1, 'Cilindros', 'cilindros', 'producto/Cilindro_Neumatico.jpg', 11, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(12, 1, 'Cangilones', 'cangilones', 'producto/Cangilon.jpg', 12, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(13, 1, 'Cardanes', 'cardanes', 'producto/Cardanes.jpg', 13, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(14, 1, 'Cajas de Comandos', 'cajas-de-comandos', 'producto/Comandos.jpg', 14, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(15, 1, 'Abrazaderas', 'abrazaderas', 'producto/Abrazaderas.jpg', 15, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03');

-- Volcando estructura para tabla correas_center.registros
CREATE TABLE IF NOT EXISTS `registros` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `identificador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `registros_identificador_unique` (`identificador`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.registros: ~6 rows (aproximadamente)
INSERT IGNORE INTO `registros` (`id`, `identificador`, `nombre`, `descripcion`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'header', 'Sobre Nosotros', 'Líderes en soluciones industriales, hidráulicas, neumáticas y transmisión de potencia en Bolivia', 1, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(2, 'introduccion', 'Más de 25 Años de Experiencia', 'En <span class="font-semibold text-[#EA0A2A]">Correas Center</span>, nos dedicamos a proveer soluciones integrales de transmisión de potencia, sistemas hidráulicos y neumáticos con los más altos estándares de calidad. Contamos con asesoría técnica especializada y servicio personalizado para nuestros clientes en todo Bolivia.', 2, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(3, 'estadisticas', 'Nuestras Estadísticas', 'Cifras que respaldan nuestra trayectoria', 3, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(4, 'filosofia', 'Nuestra Filosofía Corporativa', 'Los principios que guían nuestro trabajo diario', 4, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(5, 'porque_elegirnos', '¿Por Qué Elegirnos?', 'Compromiso, calidad y experiencia al servicio de tu industria', 5, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(6, 'timeline', 'Nuestra Historia', 'Un recorrido por los hitos más importantes de nuestra trayectoria', 6, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03');

-- Volcando estructura para tabla correas_center.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.roles: ~0 rows (aproximadamente)
INSERT IGNORE INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'super_admin', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18'),
	(2, 'panel_user', 'web', '2026-07-03 23:25:46', '2026-07-03 23:25:46');

-- Volcando estructura para tabla correas_center.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.role_has_permissions: ~317 rows (aproximadamente)
INSERT IGNORE INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 1),
	(2, 1),
	(3, 1),
	(4, 1),
	(5, 1),
	(6, 1),
	(7, 1),
	(8, 1),
	(9, 1),
	(10, 1),
	(11, 1),
	(12, 1),
	(13, 1),
	(14, 1),
	(15, 1),
	(16, 1),
	(17, 1),
	(18, 1),
	(19, 1),
	(20, 1),
	(21, 1),
	(22, 1),
	(23, 1),
	(24, 1),
	(25, 1),
	(26, 1),
	(27, 1),
	(28, 1),
	(29, 1),
	(30, 1),
	(31, 1),
	(32, 1),
	(33, 1),
	(34, 1),
	(35, 1),
	(36, 1),
	(37, 1),
	(38, 1),
	(39, 1),
	(40, 1),
	(41, 1),
	(42, 1),
	(43, 1),
	(44, 1),
	(45, 1),
	(46, 1),
	(47, 1),
	(48, 1),
	(49, 1),
	(50, 1),
	(51, 1),
	(52, 1),
	(53, 1),
	(54, 1),
	(55, 1),
	(56, 1),
	(57, 1),
	(58, 1),
	(59, 1),
	(60, 1),
	(61, 1),
	(62, 1),
	(63, 1),
	(64, 1),
	(65, 1),
	(66, 1),
	(67, 1),
	(68, 1),
	(69, 1),
	(70, 1),
	(71, 1),
	(72, 1),
	(73, 1),
	(74, 1),
	(75, 1),
	(76, 1),
	(77, 1),
	(78, 1),
	(79, 1),
	(80, 1),
	(81, 1),
	(82, 1),
	(83, 1),
	(84, 1),
	(85, 1),
	(86, 1),
	(87, 1),
	(88, 1),
	(89, 1),
	(90, 1),
	(91, 1),
	(92, 1),
	(93, 1),
	(94, 1),
	(95, 1),
	(96, 1),
	(97, 1),
	(98, 1),
	(99, 1),
	(100, 1),
	(101, 1),
	(102, 1),
	(103, 1),
	(104, 1),
	(105, 1),
	(106, 1),
	(107, 1),
	(108, 1),
	(109, 1),
	(110, 1),
	(111, 1),
	(112, 1),
	(113, 1),
	(114, 1),
	(115, 1),
	(116, 1),
	(117, 1),
	(118, 1),
	(119, 1),
	(120, 1),
	(121, 1),
	(122, 1),
	(123, 1),
	(124, 1),
	(125, 1),
	(126, 1),
	(127, 1),
	(128, 1),
	(129, 1),
	(130, 1),
	(131, 1),
	(132, 1),
	(133, 1),
	(134, 1),
	(135, 1),
	(136, 1),
	(137, 1),
	(138, 1),
	(139, 1),
	(140, 1),
	(141, 1),
	(142, 1),
	(143, 1),
	(144, 1),
	(145, 1),
	(146, 1),
	(147, 1),
	(148, 1),
	(149, 1),
	(150, 1),
	(151, 1),
	(152, 1),
	(153, 1),
	(154, 1),
	(155, 1),
	(156, 1),
	(157, 1),
	(158, 1),
	(159, 1),
	(160, 1),
	(161, 1),
	(162, 1),
	(163, 1),
	(164, 1),
	(165, 1),
	(166, 1),
	(167, 1),
	(168, 1),
	(169, 1),
	(170, 1),
	(171, 1),
	(172, 1),
	(173, 1),
	(174, 1),
	(175, 1),
	(176, 1),
	(177, 1),
	(178, 1),
	(179, 1),
	(180, 1),
	(181, 1),
	(182, 1),
	(183, 1),
	(184, 1),
	(185, 1),
	(186, 1),
	(187, 1),
	(188, 1),
	(189, 1),
	(190, 1),
	(191, 1),
	(192, 1),
	(193, 1),
	(194, 1),
	(195, 1),
	(196, 1),
	(197, 1),
	(198, 1),
	(199, 1),
	(200, 1),
	(201, 1),
	(202, 1),
	(203, 1),
	(204, 1),
	(205, 1),
	(206, 1),
	(207, 1),
	(208, 1),
	(209, 1),
	(210, 1),
	(211, 1),
	(212, 1),
	(213, 1),
	(214, 1),
	(215, 1),
	(216, 1),
	(217, 1),
	(218, 1),
	(219, 1),
	(220, 1),
	(221, 1),
	(222, 1),
	(223, 1),
	(224, 1),
	(225, 1),
	(226, 1),
	(227, 1),
	(228, 1),
	(229, 1),
	(230, 1),
	(231, 1),
	(232, 1),
	(233, 1),
	(234, 1),
	(235, 1),
	(236, 1),
	(237, 1),
	(238, 1),
	(239, 1),
	(240, 1),
	(241, 1),
	(242, 1),
	(243, 1),
	(244, 1),
	(245, 1),
	(246, 1),
	(247, 1),
	(248, 1),
	(249, 1),
	(250, 1),
	(251, 1),
	(252, 1),
	(253, 1),
	(254, 1),
	(255, 1),
	(256, 1),
	(257, 1),
	(258, 1),
	(259, 1),
	(260, 1),
	(261, 1),
	(262, 1),
	(263, 1),
	(264, 1),
	(265, 1),
	(266, 1),
	(267, 1),
	(268, 1),
	(269, 1),
	(270, 1),
	(271, 1),
	(272, 1),
	(273, 1),
	(274, 1),
	(275, 1),
	(276, 1),
	(277, 1),
	(278, 1),
	(279, 1),
	(280, 1),
	(281, 1),
	(282, 1),
	(283, 1),
	(284, 1),
	(285, 1),
	(286, 1),
	(287, 1),
	(288, 1),
	(289, 1),
	(290, 1),
	(291, 1),
	(292, 1),
	(293, 1),
	(294, 1),
	(295, 1),
	(296, 1),
	(297, 1),
	(298, 1),
	(299, 1),
	(300, 1),
	(301, 1),
	(302, 1),
	(303, 1),
	(304, 1),
	(305, 1),
	(306, 1),
	(307, 1),
	(308, 1),
	(309, 1),
	(310, 1),
	(311, 1),
	(312, 1),
	(313, 1),
	(314, 1),
	(315, 1),
	(316, 1),
	(317, 1);

-- Volcando estructura para tabla correas_center.servicios
CREATE TABLE IF NOT EXISTS `servicios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `servicios_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `servicios_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.servicios: ~6 rows (aproximadamente)
INSERT IGNORE INTO `servicios` (`id`, `empresa_id`, `nombre`, `descripcion`, `imagen`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Fabricacion de Sellos SKF', 'Fabricación especializada de sellos y retenes con licencia exclusiva SKF para Bolivia', 'servicio/Fabricacion_SKF.jpeg', 1, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(2, 1, 'Prensado de Mangueras', 'Prensado profesional de mangueras con equipos de última generación de alta precisión', 'servicio/Manguera_Prensada.jpeg', 2, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(3, 1, 'Reparacion de Cilindros', 'Reparación y mantenimiento especializado de cilindros hidráulicos y neumáticos', 'servicio/reparacion-cilindros.jpeg', 3, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(4, 1, 'Fabricacion de O-rings', 'Fabricación de juntas tóricas a medida según especificaciones del cliente', 'servicio/fabricacion-orings.jpg', 4, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(5, 1, 'Asesoria Tecnica Industrial', 'Asesoría especializada en selección de productos y soluciones técnicas', 'servicio/Servicio_Tecnico.png', 5, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(6, 1, 'Empalmes y Montaje de Bandas', 'Servicio de empalme y montaje de bandas transportadoras', 'servicio/empalmes-montaje.jpg', 6, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04');

-- Volcando estructura para tabla correas_center.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.sessions: ~2 rows (aproximadamente)
INSERT IGNORE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('Sxa9wsBFrf5P65IIujKENMg3U7wcssIE2QD76fBn', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJwamcydzNvdGRiUDNRY2tIYVBEODFZTkVIZXR0TEFmYVQ2RGo2U1hFIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9hZG1pblwvY2F0ZWdvcmlhcyIsInJvdXRlIjoiZmlsYW1lbnQuYWRtaW4ucmVzb3VyY2VzLmNhdGVnb3JpYXMuaW5kZXgifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJ1cmwiOltdLCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MSwicGFzc3dvcmRfaGFzaF93ZWIiOiJiMWNjNTFlMmY1ZmNkMWQ2NjRjNjRkZWY3MjAwMjM1ZDUyNTU4MjU0ZjYzOTM4M2Y4Y2NiMGFlYWYwN2RmZTNkIiwidGFibGVzIjp7ImQyZDFkNWM2ZTQxZWQ1ZmY4ZWJlNmIyM2U4Y2RhMzM4X2NvbHVtbnMiOlt7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoibm9tYnJlIiwibGFiZWwiOiJOb21icmUiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiZW1haWwiLCJsYWJlbCI6IkVtYWlsIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InRlbGVmb25vIiwibGFiZWwiOiJUZWxcdTAwZTlmb25vIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im1lbnNhamUiLCJsYWJlbCI6Ik1lbnNhamUiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiY3JlYXRlZF9hdCIsImxhYmVsIjoiUmVjaWJpZG8iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiYWNjaW9uZXMiLCJsYWJlbCI6IkFjY2lvbmVzIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH1dLCJhNTE2Y2I0MzNkNTRjYjM3NjI4NGMyMWZjNGU0ZmFhNV9jb2x1bW5zIjpbeyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImdydXBvIiwibGFiZWwiOiJUaXBvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImNhbXBvX3JlbGFjaW9uYWRvIiwibGFiZWwiOiJFbGVtZW50byIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJpY29uIiwibGFiZWwiOiJJY29ubyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJkZXRhbGxlX21lbnVzX2NvdW50IiwibGFiZWwiOiJTdWJtZW5cdTAwZmFzIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im9yZGVuIiwibGFiZWwiOiJPcmRlbiIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJlc3RhZG8iLCJsYWJlbCI6IkVzdGFkbyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJjcmVhdGVkX2F0IiwibGFiZWwiOiJDcmVhZG8iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6ZmFsc2UsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0Ijp0cnVlfV0sIjBmNWQ2MmEyODBiYjBmNDBlMTg3M2Y4MGYyMTg1YTVhX2NvbHVtbnMiOlt7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoib3JkZW4iLCJsYWJlbCI6Ik9yZGVuIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InJ1dGEiLCJsYWJlbCI6IlJ1dGEiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiZXN0YWRvIiwibGFiZWwiOiJFc3RhZG8iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiY3JlYXRlZF9hdCIsImxhYmVsIjoiQ3JlYWRvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOmZhbHNlLCJpc1RvZ2dsZWFibGUiOnRydWUsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6dHJ1ZX1dLCIzMjNmNjA1OWNhZDA0YjZhMjQ4N2M0M2FjMzg4NzQ0Y19jb2x1bW5zIjpbeyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im9yZGVuIiwibGFiZWwiOiJPcmRlbiIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOnRydWUsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6ZmFsc2V9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJpbWFnZW4iLCJsYWJlbCI6IkltYWdlbiIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJwcm9kdWN0by5ub21icmUiLCJsYWJlbCI6IlByb2R1Y3RvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im5vbWJyZSIsImxhYmVsIjoiQ2F0ZWdvclx1MDBlZGEiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoidXNvIiwibGFiZWwiOiJVc28iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjp0cnVlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOmZhbHNlfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiZGV0YWxsZV9jYXRlZ29yaWFzX2NvdW50IiwibGFiZWwiOiJEZXRhbGxlcyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJlc3RhZG8iLCJsYWJlbCI6IkVzdGFkbyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJjcmVhdGVkX2F0IiwibGFiZWwiOiJDcmVhZG8iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6ZmFsc2UsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0Ijp0cnVlfV0sIjNkYTA0ZmY5Mzc0YjdkYWQzMTU5MTY4Mjc0ODI1YjY3X2NvbHVtbnMiOlt7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoib3JkZW4iLCJsYWJlbCI6Ik9yZGVuIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im1lZGlkYS5ub21icmUiLCJsYWJlbCI6Ik1lZGlkYSIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJ2YWxvcl9maW5hbCIsImxhYmVsIjoiVmFsb3IgRmluYWwiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiZ2FtYVByb2R1Y3RvLm5vbWJyZSIsImxhYmVsIjoiR2FtYSIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOnRydWUsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6ZmFsc2V9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJjYXJhY3RlcmlzdGljYS5ub21icmUiLCJsYWJlbCI6IkNhcmFjdGVyXHUwMGVkc3RpY2EiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjp0cnVlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOmZhbHNlfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiY29tcG9zaWNpb24ubm9tYnJlIiwibGFiZWwiOiJDb21wb3NpY2lcdTAwZjNuIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpmYWxzZX0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImFwbGljYWNpb24ubm9tYnJlIiwibGFiZWwiOiJBcGxpY2FjaVx1MDBmM24iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjp0cnVlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOmZhbHNlfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiZXN0YWRvIiwibGFiZWwiOiJFc3RhZG8iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfV0sIjExN2Y1MWM3YmNhNGEzNGNlZmQyYmM5N2Y5YTY1OTE4X2NvbHVtbnMiOlt7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoib3JkZW4iLCJsYWJlbCI6Ik9yZGVuIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpmYWxzZX0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImltYWdlbiIsImxhYmVsIjoiSW1hZ2VuIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im5vbWJyZSIsImxhYmVsIjoiTm9tYnJlIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InNsdWciLCJsYWJlbCI6IlNsdWciLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6ZmFsc2UsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0Ijp0cnVlfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoibWFyY2FzX2NvdW50IiwibGFiZWwiOiJNYXJjYXMiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiY2F0ZWdvcmlhc19jb3VudCIsImxhYmVsIjoiQ2F0ZWdvclx1MDBlZGFzIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImVzdGFkbyIsImxhYmVsIjoiRXN0YWRvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImNyZWF0ZWRfYXQiLCJsYWJlbCI6IkNyZWFkbyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjpmYWxzZSwiaXNUb2dnbGVhYmxlIjp0cnVlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOnRydWV9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJ1cGRhdGVkX2F0IiwibGFiZWwiOiJBY3R1YWxpemFkbyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOnRydWUsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6ZmFsc2V9XSwiOGM3ZGVlOWFmNzJkOTdkYmIxMGExYjZhMmVjNTQzMzRfY29sdW1ucyI6W3sidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJ0aXBvIiwibGFiZWwiOiJUaXBvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImVzdGFkbyIsImxhYmVsIjoiRXN0YWRvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im5vbWJyZSIsImxhYmVsIjoiTm9tYnJlIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImVtYWlsIiwibGFiZWwiOiJFbWFpbCIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJ0ZWxlZm9ubyIsImxhYmVsIjoiVGVsXHUwMGU5Zm9ubyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOnRydWUsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6ZmFsc2V9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJtZW5zYWplIiwibGFiZWwiOiJNZW5zYWplIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpmYWxzZX0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImNyZWF0ZWRfYXQiLCJsYWJlbCI6IlJlY2liaWRvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH1dLCJmODMyOTAzNGQwYWY1ZDBkODMxNDdlOGFmZmNiN2RjOF9jb2x1bW5zIjpbeyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImVzdGFkbyIsImxhYmVsIjoiRXN0YWRvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im5vbWJyZSIsImxhYmVsIjoiTm9tYnJlIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImVtYWlsIiwibGFiZWwiOiJFbWFpbCIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJlbWFpbF92ZXJpZmljYWRvX2F0IiwibGFiZWwiOiJWZXJpZmljYWRvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImNyZWF0ZWRfYXQiLCJsYWJlbCI6IlN1c2NyaXRvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH1dLCJiZTY0MTVmYmUyMDM4YmIyNWYwMzZhODY3ODk5ODg1Nl9jb2x1bW5zIjpbeyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Im9yZGVuIiwibGFiZWwiOiJPcmRlbiIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOnRydWUsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6ZmFsc2V9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJ0aXR1bG8iLCJsYWJlbCI6IlRcdTAwZWR0dWxvIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImRlc2NyaXBjaW9uIiwibGFiZWwiOiJEZXNjcmlwY2lcdTAwZjNuIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOmZhbHNlLCJpc1RvZ2dsZWFibGUiOnRydWUsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6dHJ1ZX0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6Imljb25vIiwibGFiZWwiOiJJY29ubyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJlc3RhZG8iLCJsYWJlbCI6IkVzdGFkbyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9XX0sImZpbGFtZW50IjpbXX0=', 1783448774);

-- Volcando estructura para tabla correas_center.sucursales
CREATE TABLE IF NOT EXISTS `sucursales` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empresa_id` bigint unsigned NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horarios` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mapa_incrustado` text COLLATE utf8mb4_unicode_ci,
  `latitud` decimal(10,8) DEFAULT NULL,
  `longitud` decimal(11,8) DEFAULT NULL,
  `es_principal` tinyint(1) NOT NULL DEFAULT '0',
  `orden` int NOT NULL DEFAULT '0',
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sucursales_empresa_id_foreign` (`empresa_id`),
  CONSTRAINT `sucursales_empresa_id_foreign` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.sucursales: ~4 rows (aproximadamente)
INSERT IGNORE INTO `sucursales` (`id`, `empresa_id`, `nombre`, `direccion`, `telefono`, `email`, `horarios`, `mapa_incrustado`, `latitud`, `longitud`, `es_principal`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Oficina Central', 'Segundo anillo 5, Santa Cruz de la Sierra', '+591 7 7306576', 'ventas@correascenter.com', 'Lun - Vie: 8:00 - 18:00 | Sáb: 8:00 - 13:00', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20802.77187535896!2d-63.22224718533964!3d-17.79752330000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e818129b636f%3A0xb79a33ec5254f60c!2sCORREAS%20CENTER%20LTDA!5e1!3m2!1ses-419!2sbo!4v1780433048739!5m2!1ses-419!2sbo', -17.79752330, -63.22224720, 1, 1, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(2, 1, 'Sucursal Banzer', 'Av. Cristo Redentor 2260, Santa Cruz de la Sierra', '+591 7 5008216', 'cajabanzer.correasc@gmail.com', 'Lun - Vie: 8:00 - 12:00 y 14:00 - 18:00 | Sáb: 8:00 - 13:00', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20806.27427524379!2d-63.211398785339654!3d-17.76744909999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e7c2698f3d4b%3A0x1d491b56825dba72!2sCorreas%20Center%20Ltda%20Sucursal%201!5e1!3m2!1ses-419!2sbo!4v1780432576106!5m2!1ses-419!2sbo', -17.76744910, -63.21139880, 0, 2, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(3, 1, 'Sucursal Pampa de la Isla', 'Av Virgen De Cotoca, Santa Cruz de la Sierra', '+591 7 4162510', 'ronalsanchez@correascenter.com', 'Lun - Vie: 8:00 - 12:00 y 14:00 - 18:00 | Sáb: 8:00 - 13:00', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d20805.695440343206!2d-63.15496336566989!3d-17.77242280214628!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e965c22926a9%3A0xa4a21021c446dd9a!2sCORREAS%20CENTER%20Ltda%20Sucursal%202!5e1!3m2!1ses-419!2sbo!4v1780432463578!5m2!1ses-419!2sbo', -17.77242280, -63.15496340, 0, 3, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(4, 1, 'Sucursal Montero', 'Av. Hernando Siles #789, Montero', '+591 7 5008215', 'cajamontero.correasc@gmail.com', 'Lun - Vie: 8:00 - 12:00 y 14:00 - 18:00 | Sáb: 8:00 - 13:00', 'https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3188.6736409998502!2d-63.261638324836305!3d-17.336964783541582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTfCsDIwJzEzLjEiUyA2M8KwMTUnMzIuNiJX!5e1!3m2!1ses!2sbo!4v1780489828187!5m2!1ses!2sbo', -17.33696480, -63.26163830, 0, 4, 'activo', '2026-07-01 19:41:03', '2026-07-01 19:41:03');

-- Volcando estructura para tabla correas_center.suscriptores
CREATE TABLE IF NOT EXISTS `suscriptores` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` enum('activo','inactivo','desuscrito') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `email_verificado_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `suscriptores_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.suscriptores: ~0 rows (aproximadamente)

-- Volcando estructura para tabla correas_center.tipo_medidas
CREATE TABLE IF NOT EXISTS `tipo_medidas` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `representacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.tipo_medidas: ~7 rows (aproximadamente)
INSERT IGNORE INTO `tipo_medidas` (`id`, `nombre`, `abreviatura`, `representacion`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 'Milímetro', 'mm', 'mm', 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(2, 'Centímetro', 'cm', 'cm', 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(3, 'Metro', 'm', 'm', 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(4, 'Pulgada', 'in', '"', 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(5, 'Grado', 'deg', '°', 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(6, 'Libra por pulgada cuadrada', 'psi', 'psi', 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(7, 'Bar', 'bar', 'bar', 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04');

-- Volcando estructura para tabla correas_center.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('activo','inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'activo',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.users: ~4 rows (aproximadamente)
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `estado`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin Camacho', 'luisfer.camacho.balli@gmail.com', 'activo', NULL, '$2y$12$fnPofFaooxLTZ8znUgVKP.fjSmsMiSVscDYyWXsdxQZKm0Yi2wUBK', NULL, '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(2, 'Administrador Ventas', 'ventas@correascenter.com', 'activo', NULL, '$2y$12$uEJ.ADeIKPE0GEvWbDBH.uiqAOkMTcer/ElSH.x36PK19oVvVet2e', NULL, '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(3, 'Soporte Técnico', 'soporte@correascenter.com', 'activo', NULL, '$2y$12$BkxhWyROc.igQuzORM77m.OMMQsV8C2f9pHKxDgOJF.b4CgQ3Necq', NULL, '2026-07-01 19:41:03', '2026-07-01 19:41:03'),
	(4, 'Usuario Demo', 'demo@correascenter.com', 'inactivo', NULL, '$2y$12$3Gvaz2n7h.qVqyqeFihgxuyxHzZ3S0i8F5Faa.mUOPsGAda55nwHi', NULL, '2026-07-01 19:41:03', '2026-07-01 19:41:03');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
