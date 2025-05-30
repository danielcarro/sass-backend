-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para sass_backend
CREATE DATABASE IF NOT EXISTS `sass_backend` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `sass_backend`;

-- Copiando estrutura para tabela sass_backend.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'individual',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_document_unique` (`document`),
  UNIQUE KEY `clients_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sass_backend.clients: ~4 rows (aproximadamente)
INSERT INTO `clients` (`id`, `type`, `name`, `document`, `email`, `phone`, `whatsapp`, `created_at`, `updated_at`) VALUES
	(3, 'PF', 'Daniel Carro', '13562543816', 'danielcarrobr@gmail.com', '129912547548', '12991257548', '2025-05-29 16:03:58', '2025-05-29 17:46:09'),
	(4, 'PF', 'cliente1', '25133294816', 'cliente1@teste.com', '129912547548', '12991257548', '2025-05-29 16:38:06', '2025-05-29 16:38:06'),
	(5, 'PJ', 'cliente2', '73.409.442/0001-60', 'cliente2@teste.com', '129912547548', '12991257548', '2025-05-29 17:24:23', '2025-05-29 17:24:23'),
	(6, 'PF', 'cliente3', '686.750.850-28', 'cliente3@teste.com', '129912547548', '12991257548', '2025-05-30 01:40:57', '2025-05-30 01:40:57');

-- Copiando estrutura para tabela sass_backend.domains
CREATE TABLE IF NOT EXISTS `domains` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenant_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `domains_domain_unique` (`domain`),
  KEY `domains_tenant_id_foreign` (`tenant_id`),
  CONSTRAINT `domains_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sass_backend.domains: ~3 rows (aproximadamente)
INSERT INTO `domains` (`id`, `domain`, `tenant_id`, `created_at`, `updated_at`) VALUES
	(16, 'cliente1.localhost', '8241ce49-c277-4199-8e4b-12ed1e0c8b08', '2025-05-30 00:53:47', '2025-05-30 00:53:47'),
	(17, 'cliente2.localhost', '44035ecb-9d12-48b7-a457-ca4ea4aab119', '2025-05-30 01:00:36', '2025-05-30 01:00:36'),
	(18, 'cliente3.localhost', 'bfb1a0a8-3d7a-40c0-8940-87dd667cf9ef', '2025-05-30 03:03:59', '2025-05-30 03:03:59');

-- Copiando estrutura para tabela sass_backend.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sass_backend.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sass_backend.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sass_backend.migrations: ~13 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2019_08_19_000000_create_failed_jobs_table', 1),
	(5, '2019_09_15_000010_create_tenants_table', 1),
	(6, '2019_09_15_000020_create_domains_table', 1),
	(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(8, '2025_05_25_004853_create_permission_tables', 1),
	(9, '2025_05_27_002123_create_clients_table', 1),
	(10, '2025_05_27_002408_create_tenant_users_table', 1),
	(13, '2025_05_29_000116_add_client_id_to_users_table', 2),
	(14, '2025_05_29_000324_add_client_id_to_tenants_table', 2),
	(15, '2025_05_30_004642_tenant_files', 3);

-- Copiando estrutura para tabela sass_backend.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sass_backend.model_has_permissions: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sass_backend.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sass_backend.model_has_roles: ~4 rows (aproximadamente)
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\Models\\User', 1),
	(2, 'App\\Models\\User', 4),
	(2, 'App\\Models\\User', 5),
	(2, 'App\\Models\\User', 6);

-- Copiando estrutura para tabela sass_backend.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sass_backend.password_resets: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sass_backend.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sass_backend.password_reset_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sass_backend.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sass_backend.permissions: ~1 rows (aproximadamente)
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(2, 'edit_user', 'web', '2025-05-30 03:58:39', '2025-05-30 03:58:39');

-- Copiando estrutura para tabela sass_backend.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sass_backend.personal_access_tokens: ~11 rows (aproximadamente)
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
	(3, 'App\\Models\\User', 2, 'api-token', 'ca4fadb8663453c4db4482fcda21bf3f74540ccecb9c47f998f3a75e057f38da', '["*"]', '2025-05-29 05:56:06', NULL, '2025-05-29 05:51:28', '2025-05-29 05:56:06'),
	(4, 'App\\Models\\User', 4, 'api-token', '890320bf765c57ac9ff153b1fb0f8c09899074c37742eb3f162212c06d1369c4', '["*"]', '2025-05-29 17:25:32', NULL, '2025-05-29 17:12:10', '2025-05-29 17:25:32'),
	(5, 'App\\Models\\User', 5, 'api-token', 'cfbcca07e4a464b8de2ad74779b16d1bb55db96bc783abb178046830febfbefd', '["*"]', '2025-05-29 23:26:30', NULL, '2025-05-29 17:25:58', '2025-05-29 23:26:30'),
	(6, 'App\\Models\\User', 4, 'api-token', 'add8fab599d4255045e60d05f7bd36cea1394837c7c2f42f24e07e6051107158', '["*"]', '2025-05-29 23:46:55', NULL, '2025-05-29 22:44:54', '2025-05-29 23:46:55'),
	(7, 'App\\Models\\User', 5, 'api-token', '8a04424224873e90315d878b3636a59f1360f8266bada36421e0e701309bf065', '["*"]', '2025-05-30 01:11:35', NULL, '2025-05-29 23:26:44', '2025-05-30 01:11:35'),
	(8, 'App\\Models\\User', 5, 'api-token', '3b4d7315528a847040595570ed1f68f39d5e06617d42c9fc7311d53538729540', '["*"]', '2025-05-30 00:54:09', NULL, '2025-05-29 23:59:05', '2025-05-30 00:54:09'),
	(9, 'App\\Models\\User', 5, 'api-token', '307083cc1d2c753bcc4ad0d9e21cfcea3ae36e7de54d07c9b0f164e7a25985ab', '["*"]', '2025-05-30 01:10:49', NULL, '2025-05-30 00:54:14', '2025-05-30 01:10:49'),
	(10, 'App\\Models\\User', 4, 'api-token', '65e603413c943551fd8f905765b6d455fb721a3e02e18bc286cbf6398f014a35', '["*"]', '2025-05-30 04:12:54', NULL, '2025-05-30 01:10:39', '2025-05-30 04:12:54'),
	(11, 'App\\Models\\User', 4, 'api-token', '2e18b3db1e8b92fc7ea6a41609b413fb4d0f68530d9b0ab6f2a56f4e947b641a', '["*"]', NULL, NULL, '2025-05-30 01:29:56', '2025-05-30 01:29:56'),
	(12, 'App\\Models\\User', 6, 'api-token', 'f507f4892cee05ced6e9f3154b3f7d0a9339747ffa1acfaa0570a65bb497d943', '["*"]', '2025-05-30 02:09:17', NULL, '2025-05-30 02:01:07', '2025-05-30 02:09:17'),
	(13, 'App\\Models\\User', 6, 'api-token', '68673bce019a58c76d4bf59f59ffdf31676f47e3e01c4044ef9c577323d2222d', '["*"]', '2025-05-30 03:03:59', NULL, '2025-05-30 02:09:30', '2025-05-30 03:03:59');

-- Copiando estrutura para tabela sass_backend.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sass_backend.roles: ~4 rows (aproximadamente)
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'web', '2025-05-28 04:32:17', '2025-05-28 04:32:17'),
	(2, 'owner', 'web', '2025-05-28 04:32:17', '2025-05-28 04:32:17'),
	(3, 'manager', 'web', '2025-05-28 04:32:17', '2025-05-28 04:32:17'),
	(4, 'viewer', 'web', '2025-05-28 04:32:17', '2025-05-28 04:32:17');

-- Copiando estrutura para tabela sass_backend.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sass_backend.role_has_permissions: ~1 rows (aproximadamente)
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(2, 2);

-- Copiando estrutura para tabela sass_backend.tenants
CREATE TABLE IF NOT EXISTS `tenants` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `data` json DEFAULT NULL,
  `client_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tenants_client_id_foreign` (`client_id`),
  CONSTRAINT `tenants_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sass_backend.tenants: ~3 rows (aproximadamente)
INSERT INTO `tenants` (`id`, `created_at`, `updated_at`, `data`, `client_id`) VALUES
	('44035ecb-9d12-48b7-a457-ca4ea4aab119', '2025-05-30 01:00:36', '2025-05-30 01:00:36', '{"name": "cliente2", "client_id": "5"}', NULL),
	('8241ce49-c277-4199-8e4b-12ed1e0c8b08', '2025-05-30 00:53:47', '2025-05-30 00:53:47', '{"name": "cliente1", "client_id": "4"}', NULL),
	('bfb1a0a8-3d7a-40c0-8940-87dd667cf9ef', '2025-05-30 03:03:59', '2025-05-30 03:03:59', '{"name": "Cliente3", "client_id": 6}', NULL);

-- Copiando estrutura para tabela sass_backend.tenant_files
CREATE TABLE IF NOT EXISTS `tenant_files` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tenant_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tenant_files_tenant_id_foreign` (`tenant_id`),
  CONSTRAINT `tenant_files_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sass_backend.tenant_files: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela sass_backend.tenant_user
CREATE TABLE IF NOT EXISTS `tenant_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tenant_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tenant_user_tenant_id_foreign` (`tenant_id`),
  KEY `tenant_user_user_id_foreign` (`user_id`),
  CONSTRAINT `tenant_user_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tenant_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sass_backend.tenant_user: ~3 rows (aproximadamente)
INSERT INTO `tenant_user` (`id`, `tenant_id`, `user_id`, `role`, `created_at`, `updated_at`) VALUES
	(11, '8241ce49-c277-4199-8e4b-12ed1e0c8b08', 4, 'owner', '2025-05-30 00:53:47', '2025-05-30 00:53:47'),
	(12, '44035ecb-9d12-48b7-a457-ca4ea4aab119', 5, 'owner', '2025-05-30 01:00:36', '2025-05-30 01:00:36'),
	(13, 'bfb1a0a8-3d7a-40c0-8940-87dd667cf9ef', 6, 'admin', '2025-05-30 03:03:59', '2025-05-30 03:03:59');

-- Copiando estrutura para tabela sass_backend.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `client_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_client_id_foreign` (`client_id`),
  CONSTRAINT `users_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela sass_backend.users: ~4 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `client_id`) VALUES
	(1, 'Admin', 'sabermaisapps@gmail.com', NULL, '$2y$12$1z4elYa/e62L0wuYBRuYJeCZ.hEivxF7xDnV80oLWt9.o8P1Tfjje', 'NUgDr9wcgUpKV4lNo5WoKMf0MRY4U0SIQzuxMPNtZnVKWzQz72PI0qx2nHSP', '2025-05-29 06:00:23', '2025-05-30 03:55:07', 3),
	(4, 'cliente1', 'cliente1@teste.com', NULL, '$2y$12$9IGlZROjBc5OyqMnLmgFtO9fLT/V6bK7M3S.XWLE6vZlHFDDN6cEq', NULL, '2025-05-29 16:38:34', '2025-05-30 03:54:28', 4),
	(5, 'cliente2', 'cliente2@teste.com', NULL, '$2y$12$XTFewJcxREtg423sUiLG.uRlijuR7QpmtgwC5vrDgygt1LcyWvBPG', NULL, '2025-05-29 17:24:55', '2025-05-30 03:54:41', 5),
	(6, 'cliente3', 'cliente3@teste.com', NULL, '$2y$12$i9W5s275k.FO1h.7AXgMhuhdby8VxMGbYFus969CUbeEGVqvwLm1G', NULL, '2025-05-30 01:41:37', '2025-05-30 03:54:49', 6);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
