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

-- Volcando datos para la tabla correas_center.cache: ~0 rows (aproximadamente)

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
	(1, 1, 'Correas en V', 'correas-en-v', '/producto/categoria/correas-en-v.jpg', 'Aqui va la descripcion general papu', 'Correas industriales de alta resistencia para transmisión de potencia', 'Transmisión de potencia', 1, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(2, 1, 'Correas Dentadas', 'correas-dentadas', '/producto/categoria/correas-dentadas.jpg', 'Aqui va la descripcion general papu', 'Correas sincronizadas para transmisión precisa', 'Transmisión precisa', 2, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(3, 1, 'Correas Variadoras', 'correas-variadoras', '/producto/categoria/correas-variadoras.jpg', 'Aqui va la descripcion general papu', 'Correas para sistemas de velocidad variable', 'Velocidad variable', 3, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(4, 1, 'Correas Acanaladas', 'correas-acanaladas', '/producto/categoria/correas-acanaladas.jpg', 'Aqui va la descripcion general papu', 'Correas multicanales para alta eficiencia', 'Alta eficiencia', 4, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(5, 2, 'Mangueras Hidráulicas', 'mangueras-hidraulicas', '/producto/categoria/mangueras-hidraulicas.jpg', 'Aqui va la descripcion general papu', 'Mangueras de alta presión para sistemas hidráulicos industriales', 'Alta presión', 5, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(6, 2, 'Mangueras de Succión y Descarga', 'mangueras-de-succion-y-descarga', '/producto/categoria/mangueras-de-succion-y-descarga.jpg', 'Aqui va la descripcion general papu', 'Mangueras para transferencia de fluidos', 'Transferencia de fluidos', 6, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(7, 2, 'Mangueras Multiusos', 'mangueras-multiusos', '/producto/categoria/mangueras-multiusos.jpg', 'Aqui va la descripcion general papu', 'Mangueras versátiles para múltiples aplicaciones', 'Versátiles', 7, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(8, 2, 'Mangueras Neumáticas', 'mangueras-neumaticas', '/producto/categoria/mangueras-neumaticas.jpg', 'Aqui va la descripcion general papu', 'Mangueras para sistemas de aire comprimido', 'Aire comprimido', 8, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(9, 3, 'Rodamientos de Rodillos', 'rodamientos-de-rodillos', '/producto/categoria/rodamientos-de-rodillos.jpg', 'Aqui va la descripcion general papu', 'Rodamientos para cargas pesadas', 'Cargas pesadas', 9, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(10, 3, 'Rodamientos de Bolas', 'rodamientos-de-bolas', '/producto/categoria/rodamientos-de-bolas.jpg', 'Aqui va la descripcion general papu', 'Rodamientos de precisión para alta velocidad', 'Alta velocidad', 10, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(11, 3, 'Rodamientos de Agujas', 'rodamientos-de-agujas', '/producto/categoria/rodamientos-de-agujas.jpg', 'Aqui va la descripcion general papu', 'Rodamientos compactos para espacios reducidos', 'Compactos', 11, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(12, 3, 'Rodamientos Axiales', 'rodamientos-axiales', '/producto/categoria/rodamientos-axiales.jpg', 'Aqui va la descripcion general papu', 'Rodamientos para cargas axiales', 'Cargas axiales', 12, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(13, 3, 'Rodamientos Lineales', 'rodamientos-lineales', '/producto/categoria/rodamientos-lineales.jpg', 'Aqui va la descripcion general papu', 'Rodamientos para movimiento lineal', 'Movimiento lineal', 13, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(14, 4, 'Retenes', 'retenes', '/producto/categoria/retenes.jpg', 'Aqui va la descripcion general papu', 'Elementos de sellado para ejes rotativos', 'Sellado de ejes', 14, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(15, 4, 'Sellos Mecánicos', 'sellos-mecanicos', '/producto/categoria/sellos-mecanicos.jpg', 'Aqui va la descripcion general papu', 'Sellos para bombas y equipos rotativos', 'Bombas y equipos', 15, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(16, 4, 'O-Rings', 'o-rings', '/producto/categoria/o-rings.jpg', 'Aqui va la descripcion general papu', 'Juntas tóricas para sellado estático y dinámico', 'Juntas tóricas', 16, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(17, 4, 'Sellos Hidráulicos', 'sellos-hidraulicos', '/producto/categoria/sellos-hidraulicos.jpg', 'Aqui va la descripcion general papu', 'Sellos para sistemas hidráulicos', 'Sistemas hidráulicos', 17, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(18, 4, 'Sellos Neumáticos', 'sellos-neumaticos', '/producto/categoria/sellos-neumaticos.jpg', 'Aqui va la descripcion general papu', 'Sellos para sistemas neumáticos', 'Sistemas neumáticos', 18, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(19, 5, 'Bandas Lisas', 'bandas-lisas', '/producto/categoria/bandas-lisas.jpg', 'Aqui va la descripcion general papu', 'Bandas para cargas pesadas, minería e industria', 'Cargas pesadas', 19, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(20, 5, 'Bandas Nervadas', 'bandas-nervadas', '/producto/categoria/bandas-nervadas.jpg', 'Aqui va la descripcion general papu', 'Bandas para cargas pesadas, minería e industria', 'Cargas pesadas', 20, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(21, 5, 'Bandas Verticales', 'bandas-verticales', '/producto/categoria/bandas-verticales.jpg', 'Aqui va la descripcion general papu', 'Bandas para cargas pesadas, minería e industria', 'Cargas pesadas', 21, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(22, 5, 'Bandas con Bordes', 'bandas-con-bordes', '/producto/categoria/bandas-con-bordes.jpg', 'Aqui va la descripcion general papu', 'Bandas para cargas pesadas, minería e industria', 'Cargas pesadas', 22, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(23, 5, 'Bandas Corrugadas', 'bandas-corrugadas', '/producto/categoria/bandas-corrugadas.jpg', 'Aqui va la descripcion general papu', 'Bandas para cargas pesadas, minería e industria', 'Cargas pesadas', 23, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(24, 6, 'Bandas Sintenticas', 'bandas-sintenticas', '/producto/categoria/bandas-sintenticas.jpg', 'Aqui va la descripcion general papu', 'Bandas para industria ligera', 'Industria ligera', 24, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(25, 6, 'Bandas Modulares', 'bandas-modulares', '/producto/categoria/bandas-modulares.jpg', 'Aqui va la descripcion general papu', 'Bandas para industria ligera', 'Industria ligera', 25, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(26, 6, 'Bandas PTFE', 'bandas-ptfe', '/producto/categoria/bandas-ptfe.jpg', 'Aqui va la descripcion general papu', 'Bandas para industria ligera', 'Industria ligera', 26, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(27, 6, 'Bandas Homogeneas', 'bandas-homogeneas', '/producto/categoria/bandas-homogeneas.jpg', 'Aqui va la descripcion general papu', 'Bandas para industria ligera', 'Industria ligera', 27, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(28, 6, 'Bandas de Caucho Ligeras', 'bandas-de-caucho-ligeras', '/producto/categoria/bandas-de-caucho-ligeras.jpg', 'Aqui va la descripcion general papu', 'Bandas para industria ligera', 'Industria ligera', 28, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(29, 7, 'Cadenas de Rodillos de Precisión', 'cadenas-de-rodillos-de-precision', '/producto/categoria/cadenas-de-rodillos-de-precision.jpg', 'Aqui va la descripcion general papu', 'Cadenas para transmisión de potencia', 'Transmisión', 29, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(30, 7, 'Cadenas de Acero Inoxidable', 'cadenas-de-acero-inoxidable', '/producto/categoria/cadenas-de-acero-inoxidable.jpg', 'Aqui va la descripcion general papu', 'Cadenas resistentes a la corrosión', 'Resistentes', 30, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(31, 7, 'Cadenas de Transmisión', 'cadenas-de-transmision', '/producto/categoria/cadenas-de-transmision.jpg', 'Aqui va la descripcion general papu', 'Cadenas para transmisión industrial', 'Industrial', 31, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(32, 7, 'Cadenas con Transportador', 'cadenas-con-transportador', '/producto/categoria/cadenas-con-transportador.jpg', 'Aqui va la descripcion general papu', 'Cadenas para sistemas de transporte', 'Transporte', 32, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(33, 7, 'Cadenas Agrícolas', 'cadenas-agricolas', '/producto/categoria/cadenas-agricolas.jpg', 'Aqui va la descripcion general papu', 'Cadenas para maquinaria agrícola', 'Agrícola', 33, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(34, 8, 'Poleas en V de Taladro Cónico y Cilíndrico', 'poleas-en-v-de-taladro-conico-y-cilindrico', '/producto/categoria/poleas-en-v-de-taladro-conico-y-cilindrico.jpg', 'Aqui va la descripcion general papu', 'Poleas para correas en V', 'Correas en V', 34, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(35, 8, 'Poleas Sincrónicas', 'poleas-sincronicas', '/producto/categoria/poleas-sincronicas.jpg', 'Aqui va la descripcion general papu', 'Poleas para correas dentadas', 'Correas dentadas', 35, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(36, 8, 'Poleas MI-Lock', 'poleas-mi-lock', '/producto/categoria/poleas-mi-lock.jpg', 'Aqui va la descripcion general papu', 'Poleas con sistema de bloqueo MI-Lock', 'Sistema MI-Lock', 36, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(37, 9, 'Piñones de taladro cónico', 'pinones-de-taladro-conico', '/producto/categoria/pinones-de-taladro-conico.jpg', 'Aqui va la descripcion general papu', 'Piñones con ajuste cónico', 'Ajuste cónico', 37, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(38, 9, 'Piñones con agujero piloto', 'pinones-con-agujero-piloto', '/producto/categoria/pinones-con-agujero-piloto.jpg', 'Aqui va la descripcion general papu', 'Piñones para mecanizado personalizado', 'Mecanizado', 38, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(39, 9, 'Piñones simples de taladro cónico para 2 cadenas', 'pinones-simples-de-taladro-conico-para-2-cadenas', '/producto/categoria/pinones-simples-de-taladro-conico-para-2-cadenas.jpg', 'Aqui va la descripcion general papu', 'Piñones dobles para transmisión', 'Transmisión doble', 39, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(40, 10, 'Niples Hidráulicos', 'niples-hidraulicos', '/producto/categoria/niples-hidraulicos.jpg', 'Aqui va la descripcion general papu', 'Conexiones para sistemas hidráulicos', 'Hidráulicos', 40, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(41, 10, 'Niples de Cobre', 'niples-de-cobre', '/producto/categoria/niples-de-cobre.jpg', 'Aqui va la descripcion general papu', 'Conexiones de cobre para diversas aplicaciones', 'Cobre', 41, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(42, 10, 'Conexiones Rápidas', 'conexiones-rapidas', '/producto/categoria/conexiones-rapidas.jpg', 'Aqui va la descripcion general papu', 'Conexiones de acople rápido', 'Acople rápido', 42, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(43, 10, 'Adaptadores', 'adaptadores', '/producto/categoria/adaptadores.jpg', 'Aqui va la descripcion general papu', 'Adaptadores para diferentes configuraciones', 'Adaptación', 43, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(44, 10, 'Conectores Rápidos', 'conectores-rapidos', '/producto/categoria/conectores-rapidos.jpg', 'Aqui va la descripcion general papu', 'Conectores para conexión rápida', 'Conexión rápida', 44, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(45, 11, 'Cilindros Neumáticos', 'cilindros-neumaticos', '/producto/categoria/cilindros-neumaticos.jpg', 'Aqui va la descripcion general papu', 'Cilindros para sistemas neumáticos', 'Neumáticos', 45, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(46, 11, 'Cilindros HTR (Tirantes)', 'cilindros-htr-tirantes', '/producto/categoria/cilindros-htr-tirantes.jpg', 'Aqui va la descripcion general papu', 'Cilindros con diseño de tirantes', 'Tirantes', 46, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(47, 11, 'Cilindros HCW (Patentado)', 'cilindros-hcw-patentado', '/producto/categoria/cilindros-hcw-patentado.jpg', 'Aqui va la descripcion general papu', 'Cilindros con diseño patentado', 'Patentado', 47, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(48, 12, 'Cangilones HD Stax (Heavy Duty)', 'cangilones-hd-stax-heavy-duty', '/producto/categoria/cangilones-hd-stax-heavy-duty.jpg', 'Aqui va la descripcion general papu', 'Cangilones de alta resistencia', 'Alta resistencia', 48, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(49, 12, 'Cangilones de Nylon', 'cangilones-de-nylon', '/producto/categoria/cangilones-de-nylon.jpg', 'Aqui va la descripcion general papu', 'Cangilones ligeros de nylon', 'Ligeros', 49, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(50, 12, 'Cangilones de Poliuretano', 'cangilones-de-poliuretano', '/producto/categoria/cangilones-de-poliuretano.jpg', 'Aqui va la descripcion general papu', 'Cangilones resistentes al desgaste', 'Resistentes', 50, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(51, 12, 'Pernos', 'pernos', '/producto/categoria/pernos.jpg', 'Aqui va la descripcion general papu', 'Pernos para fijación de cangilones', 'Fijación', 51, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(52, 12, 'Grapas de Empalme Mecánico', 'grapas-de-empalme-mecanico', '/producto/categoria/grapas-de-empalme-mecanico.jpg', 'Aqui va la descripcion general papu', 'Grapas para unión de bandas', 'Unión', 52, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(53, 13, 'Cardanes Agrícolas', 'cardanes-agricolas', '/producto/categoria/cardanes-agricolas.jpg', 'Aqui va la descripcion general papu', 'Cardanes para maquinaria agrícola', 'Agrícola', 53, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(54, 14, 'Caja de Comando de 1 Palanca', 'caja-de-comando-de-1-palanca', '/producto/categoria/caja-de-comando-de-1-palanca.jpg', 'Aqui va la descripcion general papu', 'Caja de comando con una palanca', '1 Palanca', 54, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(55, 14, 'Caja de Comandos de 2 Palancas', 'caja-de-comandos-de-2-palancas', '/producto/categoria/caja-de-comandos-de-2-palancas.jpg', 'Aqui va la descripcion general papu', 'Caja de comando con dos palancas', '2 Palancas', 55, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(56, 14, 'Caja de Comandos de 3 Palancas', 'caja-de-comandos-de-3-palancas', '/producto/categoria/caja-de-comandos-de-3-palancas.jpg', 'Aqui va la descripcion general papu', 'Caja de comando con tres palancas', '3 Palancas', 56, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(57, 14, 'Caja de Comandos de 4 Palancas', 'caja-de-comandos-de-4-palancas', '/producto/categoria/caja-de-comandos-de-4-palancas.jpg', 'Aqui va la descripcion general papu', 'Caja de comando con cuatro palancas', '4 Palancas', 57, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(58, 15, 'Abrazaderas Galvanizadas', 'abrazaderas-galvanizadas', '/producto/categoria/abrazaderas-galvanizadas.jpg', 'Aqui va la descripcion general papu', 'Abrazaderas con recubrimiento galvanizado', 'Galvanizadas', 58, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(59, 15, 'Abrazaderas Inoxidables', 'abrazaderas-inoxidables', '/producto/categoria/abrazaderas-inoxidables.jpg', 'Aqui va la descripcion general papu', 'Abrazaderas de acero inoxidable', 'Inoxidables', 59, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(60, 15, 'Abrazaderas de Tornillo', 'abrazaderas-de-tornillo', '/producto/categoria/abrazaderas-de-tornillo.jpg', 'Aqui va la descripcion general papu', 'Abrazaderas con sistema de tornillo', 'Tornillo', 60, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(61, 15, 'Abrazaderas de Alambre', 'abrazaderas-de-alambre', '/producto/categoria/abrazaderas-de-alambre.jpg', 'Aqui va la descripcion general papu', 'Abrazaderas de alambre', 'Alambre', 61, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04');

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
	(1, 'Compuesto', 'Natural rubber/SBR', 1, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
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
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.detalle_categorias: ~61 rows (aproximadamente)
INSERT IGNORE INTO `detalle_categorias` (`id`, `categoria_id`, `marca_id`, `gama_producto_id`, `caracteristica_id`, `medida_id`, `valor_personalizado`, `composicion_id`, `aplicacion_id`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 16, 1, 3, 4, NULL, 2, 4, 1, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
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
	(61, 61, 18, 4, 1, 1, NULL, 1, 1, 61, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04');

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
	(15, 4, '/products/retenes-sellos-y-o-rings/sellos-mecanicos', 2, 'activo', '2026-07-01 19:41:05', '2026-07-01 19:41:05'),
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

-- Volcando datos para la tabla correas_center.empresas: ~1 rows (aproximadamente)
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.medidas: ~6 rows (aproximadamente)
INSERT IGNORE INTO `medidas` (`id`, `tipo_medida_id`, `nombre`, `magnitud`, `orden`, `estado`, `created_at`, `updated_at`) VALUES
	(1, 1, 'Ancho externo', NULL, 1, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(2, 1, 'Longitud', NULL, 2, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(3, 4, 'Diámetro interno', NULL, 3, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(4, 5, 'Ángulo', NULL, 4, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(5, 6, 'Presión máxima', 3000.0000, 5, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04'),
	(6, 1, 'Diámetro exterior', 40.0000, 6, 'activo', '2026-07-01 19:41:04', '2026-07-01 19:41:04');

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

-- Volcando datos para la tabla correas_center.migrations: ~47 rows (aproximadamente)
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

-- Volcando datos para la tabla correas_center.model_has_roles: ~1 rows (aproximadamente)
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla correas_center.roles: ~1 rows (aproximadamente)
INSERT IGNORE INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'super_admin', 'web', '2026-07-01 19:55:18', '2026-07-01 19:55:18');

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

-- Volcando datos para la tabla correas_center.sessions: ~0 rows (aproximadamente)
INSERT IGNORE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('SrjwVidke5hyPLBMYCWQaUccM9qcjmNVS4LLCTgD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiIzVmlMQkFrb0tOa1RYNjVtSWluMTJtY1NmWWdiYmRLS052b1lCa3FqIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1782939647);

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
