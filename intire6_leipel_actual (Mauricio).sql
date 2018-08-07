-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-06-2018 a las 08:27:30
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `intire6_leipel_actual`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `account_balance`
--

DROP TABLE IF EXISTS `account_balance`;
CREATE TABLE IF NOT EXISTS `account_balance` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `balance` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `account_balance_seller_id_foreign` (`seller_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actors`
--

DROP TABLE IF EXISTS `actors`;
CREATE TABLE IF NOT EXISTS `actors` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `autors_id` int(10) UNSIGNED NOT NULL,
  `rating_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `name_alb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `producer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` int(10) UNSIGNED NOT NULL,
  `release_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Aprobado','En Revision','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Revision',
  PRIMARY KEY (`id`),
  KEY `album_seller_id_foreign` (`seller_id`),
  KEY `album_rating_id_foreign` (`rating_id`),
  KEY `album_autors_id_foreign` (`autors_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `applys_sellers`
--

DROP TABLE IF EXISTS `applys_sellers`;
CREATE TABLE IF NOT EXISTS `applys_sellers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `promoter_id` int(11) DEFAULT NULL,
  `name_c` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_s` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_s` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dsc` longtext COLLATE utf8mb4_unicode_ci,
  `desired_m` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  `assing_at` datetime DEFAULT NULL,
  `status` enum('Aprobado','En Proceso','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Proceso',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `applys_sellers_promoter_id_foreign` (`promoter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `author_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `original_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `rating_id` int(10) UNSIGNED NOT NULL,
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `sinopsis` longtext COLLATE utf8mb4_unicode_ci,
  `books_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `after` int(10) UNSIGNED DEFAULT '0',
  `before` int(10) UNSIGNED DEFAULT '0',
  `saga_id` int(10) UNSIGNED DEFAULT '0',
  `release_year` int(10) UNSIGNED DEFAULT '0',
  `cost` int(10) UNSIGNED DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Aprobado','En Revision','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `books_seller_id_foreign` (`seller_id`),
  KEY `books_saga_id_foreign` (`saga_id`),
  KEY `books_rating_id_foreign` (`rating_id`),
  KEY `books_author_id_foreign` (`author_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books_authors`
--

DROP TABLE IF EXISTS `books_authors`;
CREATE TABLE IF NOT EXISTS `books_authors` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_c` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aprobado','En Revision','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Revision',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `books_authors_seller_id_foreign` (`seller_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books_tags`
--

DROP TABLE IF EXISTS `books_tags`;
CREATE TABLE IF NOT EXISTS `books_tags` (
  `books_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `tags_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`books_id`,`tags_id`),
  KEY `books_tags_tags_id_foreign` (`tags_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cast_movies`
--

DROP TABLE IF EXISTS `cast_movies`;
CREATE TABLE IF NOT EXISTS `cast_movies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `movies_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `actors_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cast_movies_actors_id_foreign` (`actors_id`),
  KEY `cast_movies_movies_id_foreign` (`movies_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_grades`
--

DROP TABLE IF EXISTS `content_grades`;
CREATE TABLE IF NOT EXISTS `content_grades` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `books_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `album_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `song_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `series_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `episodes_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `movies_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `megazines_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `grade` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `content_grades_megazines_id_foreign` (`megazines_id`),
  KEY `content_grades_movies_id_foreign` (`movies_id`),
  KEY `content_grades_episodes_id_foreign` (`episodes_id`),
  KEY `content_grades_series_id_foreign` (`series_id`),
  KEY `content_grades_song_id_foreign` (`song_id`),
  KEY `content_grades_books_id_foreign` (`books_id`),
  KEY `content_grades_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directors_movies`
--

DROP TABLE IF EXISTS `directors_movies`;
CREATE TABLE IF NOT EXISTS `directors_movies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type_roles` enum('Director Artistico','Dierctor','Dierctor Asistente') COLLATE utf8mb4_unicode_ci NOT NULL,
  `movies_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `directors_movies_movies_id_foreign` (`movies_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `episodes`
--

DROP TABLE IF EXISTS `episodes`;
CREATE TABLE IF NOT EXISTS `episodes` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `series_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `cost` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sipnopsis` longtext COLLATE utf8mb4_unicode_ci,
  `episode_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aprobado','En Proceso','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Proceso',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `episodes_seller_id_foreign` (`seller_id`),
  KEY `episodes_series_id_foreign` (`series_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_control`
--

DROP TABLE IF EXISTS `login_control`;
CREATE TABLE IF NOT EXISTS `login_control` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_log` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_login` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `makeup_movies`
--

DROP TABLE IF EXISTS `makeup_movies`;
CREATE TABLE IF NOT EXISTS `makeup_movies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `movies_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `makeup_movies_movies_id_foreign` (`movies_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `megazines`
--

DROP TABLE IF EXISTS `megazines`;
CREATE TABLE IF NOT EXISTS `megazines` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rating_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `seller_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `num_pages` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `cover` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `descripcion` longtext COLLATE utf8mb4_unicode_ci,
  `megazine_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `saga_id` int(10) UNSIGNED DEFAULT '0',
  `cost` int(10) UNSIGNED DEFAULT '0',
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Aprobado','En Revision','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `megazines_seller_id_foreign` (`seller_id`),
  KEY `megazines_rating_id_foreign` (`rating_id`),
  KEY `megazines_saga_id_foreign` (`saga_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `megazine_tags`
--

DROP TABLE IF EXISTS `megazine_tags`;
CREATE TABLE IF NOT EXISTS `megazine_tags` (
  `megazine_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `tags_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`megazine_id`,`tags_id`),
  KEY `megazine_tags_tags_id_foreign` (`tags_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_01_08_155601_create_rating_table', 1),
(4, '2017_01_11_153249_create_promoters_table', 1),
(5, '2017_01_28_014840_create_sellersmodule_table', 1),
(6, '2017_01_28_151437_create_sellers_table', 1),
(7, '2017_01_28_163839_create_sellers_password_reset_table', 1),
(8, '2017_01_28_173839_create_tags_music_table', 1),
(9, '2017_01_28_173840_create_saga_table', 1),
(10, '2017_11_07_165014_create_musicauthors_table', 1),
(11, '2017_11_07_213002_create_account_balance_table', 1),
(12, '2017_11_07_214509_create_album_table', 1),
(13, '2017_11_07_214846_create_songs_table', 1),
(14, '2017_11_08_164104_create_actors_movies_table', 1),
(15, '2017_11_08_164105_create_movies_table', 1),
(16, '2017_11_08_164106_create_cast_movies_table', 1),
(17, '2017_11_08_203149_create_music_movies_table', 1),
(18, '2017_11_08_204006_create_sond_movies_table', 1),
(19, '2017_11_08_213909_create_makeup_movies_table', 1),
(20, '2017_11_08_214050_create_photograohy_movies_table', 1),
(21, '2017_11_08_214212_create_scenes_movies_table', 1),
(22, '2017_11_08_214330_create_storytellers_movies_table', 1),
(23, '2017_11_08_214443_create_directors_movies_table', 1),
(24, '2017_11_09_193745_create_music_m_t_m_tags_table', 1),
(25, '2017_11_10_020220_create_sellers_acces_table', 1),
(26, '2017_11_11_163155_create_applys_table', 1),
(27, '2017_12_09_033011_Create_Table_Radios', 1),
(28, '2017_12_09_035141_Create_Table_TV', 1),
(29, '2017_12_18_193929_CreateTableTagsMusic', 1),
(30, '2017_12_22_042800_CreateTableBooksAuthors', 1),
(31, '2017_12_22_053836_CreateTableBooks', 1),
(32, '2017_12_22_054208_CreateTableBooksTags', 1),
(33, '2017_12_22_054236_CreateTableMegazines', 1),
(34, '2018_01_26_074825_create_table_sagas_tags', 1),
(35, '2018_02_13_011054_Create_Table_Series', 1),
(36, '2018_02_13_011155_Create_Table_Episodes', 1),
(37, '2018_02_13_233142_Create_Table_Suscriptions', 1),
(38, '2018_02_13_234010_Create_Table_Transacctions', 1),
(39, '2018_02_14_221706_CreateTableCastSeries', 1),
(40, '2018_04_12_132929_CreateTable_LoginControl', 1),
(41, '2018_05_17_061208_SellerMessages', 1),
(42, '2018_05_23_001030_CreateReferalsTable', 1),
(43, '2018_05_31_032246_megazine_tags', 1),
(44, '2018_06_24_032338_CreateTablePromoterModule', 1),
(45, '2018_06_24_033034_CreateTablePromoteAcces', 1),
(46, '2018_06_24_072353_CreateTableGrade', 1),
(47, '2018_06_24_082114_CreateTablePromoterTask', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `original_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `img_poster` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `story` longtext COLLATE utf8mb4_unicode_ci,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `based_on` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `after` int(10) UNSIGNED DEFAULT '0',
  `before` int(10) UNSIGNED DEFAULT '0',
  `saga_id` int(10) UNSIGNED DEFAULT '0',
  `release_year` int(10) UNSIGNED DEFAULT '0',
  `rating_id` int(10) UNSIGNED DEFAULT '0',
  `cost` int(10) UNSIGNED DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Aprobado','En Proceso','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL,
  `trailer_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `movies_seller_id_foreign` (`seller_id`),
  KEY `movies_saga_id_foreign` (`saga_id`),
  KEY `movies_rating_id_foreign` (`rating_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `music_authors`
--

DROP TABLE IF EXISTS `music_authors`;
CREATE TABLE IF NOT EXISTS `music_authors` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_authors` enum('Agrupacion Musical','Solista') COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` longtext COLLATE utf8mb4_unicode_ci,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Aprobado','En Proceso','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Proceso',
  PRIMARY KEY (`id`),
  KEY `music_authors_seller_id_foreign` (`seller_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `music_movies`
--

DROP TABLE IF EXISTS `music_movies`;
CREATE TABLE IF NOT EXISTS `music_movies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `movies_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `music_movies_movies_id_foreign` (`movies_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `music_tags`
--

DROP TABLE IF EXISTS `music_tags`;
CREATE TABLE IF NOT EXISTS `music_tags` (
  `music_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `tags_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`music_id`,`tags_id`),
  KEY `music_tags_tags_id_foreign` (`tags_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photography_movies`
--

DROP TABLE IF EXISTS `photography_movies`;
CREATE TABLE IF NOT EXISTS `photography_movies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `movies_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `photography_movies_movies_id_foreign` (`movies_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promoter`
--

DROP TABLE IF EXISTS `promoter`;
CREATE TABLE IF NOT EXISTS `promoter` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name_c` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_s` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_s` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promoter_acces`
--

DROP TABLE IF EXISTS `promoter_acces`;
CREATE TABLE IF NOT EXISTS `promoter_acces` (
  `promoter_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `promoter_module_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`promoter_id`,`promoter_module_id`),
  KEY `promoter_acces_promoter_module_id_foreign` (`promoter_module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promoter_modules`
--

DROP TABLE IF EXISTS `promoter_modules`;
CREATE TABLE IF NOT EXISTS `promoter_modules` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `priority` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `promoter_modules`
--

INSERT INTO `promoter_modules` (`id`, `priority`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'SuperAdmin', NULL, NULL),
(2, 2, 'Admin', NULL, NULL),
(3, 3, 'Operator', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promoter_task`
--

DROP TABLE IF EXISTS `promoter_task`;
CREATE TABLE IF NOT EXISTS `promoter_task` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `amount` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promoter_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `promoter_task_promoter_id_foreign` (`promoter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `radios`
--

DROP TABLE IF EXISTS `radios`;
CREATE TABLE IF NOT EXISTS `radios` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `name_r` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `streaming` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_c` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aprobado','En Proceso','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Proceso',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `radios_seller_id_foreign` (`seller_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `r_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_descr` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rating`
--

INSERT INTO `rating` (`id`, `r_name`, `r_descr`) VALUES
(1, 'TP', 'Todo Publico'),
(2, '12 años', 'Mayores de 12 años'),
(3, '15 años', 'Mayores de 15 años'),
(4, '18 años', 'Mayores de 18 años');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referals`
--

DROP TABLE IF EXISTS `referals`;
CREATE TABLE IF NOT EXISTS `referals` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `refered` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `my_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `referals_refered_foreign` (`refered`),
  KEY `referals_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saga`
--

DROP TABLE IF EXISTS `saga`;
CREATE TABLE IF NOT EXISTS `saga` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `rating_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sag_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sag_description` longtext COLLATE utf8mb4_unicode_ci,
  `img_saga` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aprobado','En Proceso','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Proceso',
  `type_saga` enum('Libros','Peliculas','Series','Revistas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `saga_seller_id_foreign` (`seller_id`),
  KEY `saga_rating_id_foreign` (`rating_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saga_tags`
--

DROP TABLE IF EXISTS `saga_tags`;
CREATE TABLE IF NOT EXISTS `saga_tags` (
  `saga_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `tags_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`saga_id`,`tags_id`),
  KEY `saga_tags_tags_id_foreign` (`tags_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sceneography_movies`
--

DROP TABLE IF EXISTS `sceneography_movies`;
CREATE TABLE IF NOT EXISTS `sceneography_movies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `movies_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sceneography_movies_movies_id_foreign` (`movies_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sellers`
--

DROP TABLE IF EXISTS `sellers`;
CREATE TABLE IF NOT EXISTS `sellers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `tlf` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `estatus` enum('Pre-Aprobado','Aprobado','Rechazado','En Proceso') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Proceso',
  `ruc_s` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `descs_s` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `adj_ruc` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `adj_ci` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `promoter_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sellers_email_unique` (`email`),
  KEY `sellers_promoter_id_foreign` (`promoter_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `email`, `password`, `logo`, `tlf`, `estatus`, `ruc_s`, `descs_s`, `adj_ruc`, `adj_ci`, `promoter_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Musica', 'musica@example.com', '$2y$10$nHEiAZA8MNM4DizvpY7MteC35NP5JaxjdB9gf2suj7YZ3pwGzggUC', 'NULL', 'NULL', 'Aprobado', 'Musica', 'Musica', 'NULL', 'NULL', 0, NULL, NULL, NULL),
(2, 'Peliculas', 'peliculas@example.com', '$2y$10$Jf/MPrrL6cv15Jfi7dLhFuYreUa3ipynDbOaWeh0OX2ppkES9.gGm', 'NULL', 'NULL', 'Aprobado', 'Musica', 'Musica', 'NULL', 'NULL', 0, NULL, NULL, NULL),
(3, 'Series', 'series@example.com', '$2y$10$fB95zVFgDf3uE3eYzHVZ8O5h0DEPux9MIFPYvTRazJ/cLLgASQ11e', 'NULL', 'NULL', 'Aprobado', 'Series', 'Series', 'NULL', 'NULL', 0, NULL, NULL, NULL),
(4, 'Tv', 'tv@example.com', '$2y$10$6omEIWWHlWX.fynZ.KoK5.qAdVPTQz2NtU3.VKYVEv5JTK/sJezva', 'NULL', 'NULL', 'Aprobado', 'Tv', 'Tv', 'NULL', 'NULL', 0, NULL, NULL, NULL),
(5, 'Radio', 'radio@example.com', '$2y$10$MZc8NPwIKi0OmzUNcJGAGe9qiQ/DCeqMSF/P7mVvA//GksaQENbhW', 'NULL', 'NULL', 'Aprobado', 'Radio', 'Radio', 'NULL', 'NULL', 0, NULL, NULL, NULL),
(6, 'Libros', 'libros@example.com', '$2y$10$Maa2XHRGRNothIub1Lh4yOMTs2urCSBAyc1/oRiZ4a02v36ZclyNq', 'NULL', 'NULL', 'Aprobado', 'Libros', 'Libros', 'NULL', 'NULL', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sellers_modules`
--

DROP TABLE IF EXISTS `sellers_modules`;
CREATE TABLE IF NOT EXISTS `sellers_modules` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sellers_modules`
--

INSERT INTO `sellers_modules` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Musica', NULL, NULL),
(2, 'Peliculas', NULL, NULL),
(3, 'Libros', NULL, NULL),
(4, 'Series', NULL, NULL),
(5, 'Revistas', NULL, NULL),
(6, 'Radios', NULL, NULL),
(7, 'TV', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seller_acces`
--

DROP TABLE IF EXISTS `seller_acces`;
CREATE TABLE IF NOT EXISTS `seller_acces` (
  `sellers_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `modules_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`sellers_id`,`modules_id`),
  KEY `seller_acces_modules_id_foreign` (`modules_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seller_messages`
--

DROP TABLE IF EXISTS `seller_messages`;
CREATE TABLE IF NOT EXISTS `seller_messages` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_message` enum('Notificacion','Amonestacion','Informacion','Opinion') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Informacion',
  `status` enum('Leido','No Leido') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No Leido',
  `seller_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seller_messages_seller_id_foreign` (`seller_id`),
  KEY `seller_messages_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seller_password_resets`
--

DROP TABLE IF EXISTS `seller_password_resets`;
CREATE TABLE IF NOT EXISTS `seller_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `seller_password_resets_email_index` (`email`),
  KEY `seller_password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

DROP TABLE IF EXISTS `series`;
CREATE TABLE IF NOT EXISTS `series` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `saga_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `cost` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `trailer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aprobado','En Proceso','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Proceso',
  `status_series` enum('En Emision','Finalizado') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `series_seller_id_foreign` (`seller_id`),
  KEY `series_saga_id_foreign` (`saga_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series_tags`
--

DROP TABLE IF EXISTS `series_tags`;
CREATE TABLE IF NOT EXISTS `series_tags` (
  `series_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `tags_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`series_id`,`tags_id`),
  KEY `series_tags_tags_id_foreign` (`tags_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `autors_id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `rating_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `album` int(10) UNSIGNED NOT NULL,
  `song_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `song_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost` int(11) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `status` enum('Aprobado','En Revision','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Revision',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `songs_rating_id_foreign` (`rating_id`),
  KEY `songs_album_foreign` (`album`),
  KEY `songs_seller_id_foreign` (`seller_id`),
  KEY `songs_autors_id_foreign` (`autors_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `songs_tags`
--

DROP TABLE IF EXISTS `songs_tags`;
CREATE TABLE IF NOT EXISTS `songs_tags` (
  `songs_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `tags_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  PRIMARY KEY (`songs_id`,`tags_id`),
  KEY `songs_tags_tags_id_foreign` (`tags_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sound_movies`
--

DROP TABLE IF EXISTS `sound_movies`;
CREATE TABLE IF NOT EXISTS `sound_movies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `movies_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sound_movies_movies_id_foreign` (`movies_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `storytellers_movies`
--

DROP TABLE IF EXISTS `storytellers_movies`;
CREATE TABLE IF NOT EXISTS `storytellers_movies` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `movies_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `storytellers_movies_movies_id_foreign` (`movies_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscription`
--

DROP TABLE IF EXISTS `suscription`;
CREATE TABLE IF NOT EXISTS `suscription` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `seller_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `suscription_user_id_foreign` (`user_id`),
  KEY `suscription_seller_id_foreign` (`seller_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tags_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_tags` enum('Peliculas','Musica','Libros','Radios','TV','Series','Revistas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aprobado','En Proceso','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Proceso',
  `seller_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tags_seller_id_foreign` (`seller_id`)
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tags`
--

INSERT INTO `tags` (`id`, `tags_name`, `type_tags`, `status`, `seller_id`, `created_at`, `updated_at`) VALUES
(1, 'Bolero', 'Musica', 'En Proceso', NULL, NULL, NULL),
(2, 'Bossa nova', 'Musica', 'En Proceso', NULL, NULL, NULL),
(3, 'Break-beat', 'Musica', 'En Proceso', NULL, NULL, NULL),
(4, 'Calypso', 'Musica', 'En Proceso', NULL, NULL, NULL),
(5, 'Cancion de protesta', 'Musica', 'En Proceso', NULL, NULL, NULL),
(6, 'Candombia', 'Musica', 'En Proceso', NULL, NULL, NULL),
(7, 'Cool-Jazz', 'Musica', 'En Proceso', NULL, NULL, NULL),
(8, 'Country', 'Musica', 'En Proceso', NULL, NULL, NULL),
(9, 'Cumbia', 'Musica', 'En Proceso', NULL, NULL, NULL),
(10, 'Dance', 'Musica', 'En Proceso', NULL, NULL, NULL),
(11, 'Dancehall', 'Musica', 'En Proceso', NULL, NULL, NULL),
(12, 'Deep house', 'Musica', 'En Proceso', NULL, NULL, NULL),
(13, 'Disco', 'Musica', 'En Proceso', NULL, NULL, NULL),
(14, 'Electroacustica', 'Musica', 'En Proceso', NULL, NULL, NULL),
(15, 'Etno-rock', 'Musica', 'En Proceso', NULL, NULL, NULL),
(16, 'Eurobeat', 'Musica', 'En Proceso', NULL, NULL, NULL),
(17, 'Flamenco', 'Musica', 'En Proceso', NULL, NULL, NULL),
(18, 'Folk', 'Musica', 'En Proceso', NULL, NULL, NULL),
(19, 'Free-Jazz', 'Musica', 'En Proceso', NULL, NULL, NULL),
(20, 'Gabber', 'Musica', 'En Proceso', NULL, NULL, NULL),
(21, 'Garage', 'Musica', 'En Proceso', NULL, NULL, NULL),
(22, 'Grunge', 'Musica', 'En Proceso', NULL, NULL, NULL),
(23, 'Hip-Hop', 'Musica', 'En Proceso', NULL, NULL, NULL),
(24, 'House', 'Musica', 'En Proceso', NULL, NULL, NULL),
(25, 'Jazz', 'Musica', 'En Proceso', NULL, NULL, NULL),
(26, 'Mambo', 'Musica', 'En Proceso', NULL, NULL, NULL),
(27, 'Merengue tipico', 'Musica', 'En Proceso', NULL, NULL, NULL),
(28, 'Merengue urbano', 'Musica', 'En Proceso', NULL, NULL, NULL),
(29, 'Musica concreta', 'Musica', 'En Proceso', NULL, NULL, NULL),
(30, 'Musica electrónica', 'Musica', 'En Proceso', NULL, NULL, NULL),
(31, 'Musica minimalista', 'Musica', 'En Proceso', NULL, NULL, NULL),
(32, 'New age', 'Musica', 'En Proceso', NULL, NULL, NULL),
(33, 'Nueva onda', 'Musica', 'En Proceso', NULL, NULL, NULL),
(34, 'Ópera', 'Musica', 'En Proceso', NULL, NULL, NULL),
(35, 'Pop', 'Musica', 'En Proceso', NULL, NULL, NULL),
(36, 'Punk', 'Musica', 'En Proceso', NULL, NULL, NULL),
(37, 'Ragtime', 'Musica', 'En Proceso', NULL, NULL, NULL),
(38, 'Ranchero', 'Musica', 'En Proceso', NULL, NULL, NULL),
(39, 'Rap', 'Musica', 'En Proceso', NULL, NULL, NULL),
(40, 'Reggae', 'Musica', 'En Proceso', NULL, NULL, NULL),
(41, 'Reggaeton', 'Musica', 'En Proceso', NULL, NULL, NULL),
(42, 'Rhythm and Blues (R&B)', 'Musica', 'En Proceso', NULL, NULL, NULL),
(43, 'Rock', 'Musica', 'En Proceso', NULL, NULL, NULL),
(44, 'Rock Alternativo', 'Musica', 'En Proceso', NULL, NULL, NULL),
(45, 'Rock and Roll', 'Musica', 'En Proceso', NULL, NULL, NULL),
(46, 'Rock Mestizo', 'Musica', 'En Proceso', NULL, NULL, NULL),
(47, 'Rock Progresivo', 'Musica', 'En Proceso', NULL, NULL, NULL),
(48, 'Rock sinfonico', 'Musica', 'En Proceso', NULL, NULL, NULL),
(49, 'Salsa', 'Musica', 'En Proceso', NULL, NULL, NULL),
(50, 'Salsa choque', 'Musica', 'En Proceso', NULL, NULL, NULL),
(51, 'Samba', 'Musica', 'En Proceso', NULL, NULL, NULL),
(52, 'Sicodelica', 'Musica', 'En Proceso', NULL, NULL, NULL),
(53, 'Ska', 'Musica', 'En Proceso', NULL, NULL, NULL),
(54, 'Soul', 'Musica', 'En Proceso', NULL, NULL, NULL),
(55, 'Swing', 'Musica', 'En Proceso', NULL, NULL, NULL),
(56, 'Tango', 'Musica', 'En Proceso', NULL, NULL, NULL),
(57, 'Tecno', 'Musica', 'En Proceso', NULL, NULL, NULL),
(58, 'Trance', 'Musica', 'En Proceso', NULL, NULL, NULL),
(59, 'Trancecore', 'Musica', 'En Proceso', NULL, NULL, NULL),
(60, 'Trash metal', 'Musica', 'En Proceso', NULL, NULL, NULL),
(61, 'Trip-hop', 'Musica', 'En Proceso', NULL, NULL, NULL),
(62, 'Trova', 'Musica', 'En Proceso', NULL, NULL, NULL),
(63, 'Underground', 'Musica', 'En Proceso', NULL, NULL, NULL),
(64, 'Vallenato', 'Musica', 'En Proceso', NULL, NULL, NULL),
(65, 'Woogie', 'Musica', 'En Proceso', NULL, NULL, NULL),
(66, 'World music', 'Musica', 'En Proceso', NULL, NULL, NULL),
(67, 'Ye-yé', 'Musica', 'En Proceso', NULL, NULL, NULL),
(68, 'Zarzuela', 'Musica', 'En Proceso', NULL, NULL, NULL),
(69, 'Acción', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(70, 'Animado', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(71, 'Aventura', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(72, 'Catástrofe', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(73, 'Comedia', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(74, 'Drama', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(75, 'Erótico', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(76, 'Fantasía', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(77, 'Ficción', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(78, 'Misterio', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(79, 'Musical', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(80, 'Religioso', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(81, 'Romántico', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(82, 'Suspenso', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(83, 'Terror', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(84, 'Infantil', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(85, 'Juvenil', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(86, 'Adulto', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(87, 'Familiar', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(88, 'Mudo', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(89, '2D', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(90, '3D', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(91, 'Biográfico', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(92, 'Documental', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(93, 'Histórico', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(94, 'Cortometraje', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(95, 'Largometraje', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(96, 'Cine de autor', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(97, 'Cine independiente', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(98, 'Cine experimental', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(99, 'Crimen', 'Peliculas', 'En Proceso', NULL, NULL, NULL),
(100, 'Adultos‎', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(101, 'Automóvil‎isticas', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(102, 'Ciencias', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(103, 'Economia', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(104, 'Culturales', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(105, 'Deportivas', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(106, 'Entretenimiento', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(107, 'Femeninas', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(108, 'Fotografia', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(109, 'Gastronomia', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(110, 'Humor', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(111, 'Informatica', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(112, 'Romanticas', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(113, 'Interes General', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(114, 'LGBT‎', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(115, 'Moda', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(116, 'Musica', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(117, 'Infantiles', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(118, 'Politica', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(119, 'Pseudociencia', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(120, 'Religion', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(121, 'Informativa', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(122, 'Otros', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(123, 'Poesía', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(124, 'Policíacas', 'Revistas', 'En Proceso', NULL, NULL, NULL),
(125, 'Políticas', 'Revistas', 'En Proceso', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `books_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `album_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `song_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `series_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `episodes_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `movies_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `megazines_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `tickets` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_megazines_id_foreign` (`megazines_id`),
  KEY `transactions_movies_id_foreign` (`movies_id`),
  KEY `transactions_episodes_id_foreign` (`episodes_id`),
  KEY `transactions_series_id_foreign` (`series_id`),
  KEY `transactions_song_id_foreign` (`song_id`),
  KEY `transactions_books_id_foreign` (`books_id`),
  KEY `transactions_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tv`
--

DROP TABLE IF EXISTS `tv`;
CREATE TABLE IF NOT EXISTS `tv` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `name_r` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `streaming` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_c` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aprobado','En Proceso','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Proceso',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tv_seller_id_foreign` (`seller_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_ref` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_doc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_doc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('M','F','Indefinido') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Indefinido',
  `status` enum('admin','client') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'client',
  `alias` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img_perf` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credito` int(11) DEFAULT NULL,
  `verify` tinyint(1) NOT NULL DEFAULT '0',
  `fech_nac` date DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
