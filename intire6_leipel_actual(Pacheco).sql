-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2018 a las 19:01:08
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.0.23

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

CREATE TABLE `account_balance` (
  `id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `balance` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actors`
--

CREATE TABLE `actors` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE `album` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `status` enum('Aprobado','En Revision','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Revision'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `applys_sellers`
--

CREATE TABLE `applys_sellers` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `status` enum('Aprobado','En Revision','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books_authors`
--

CREATE TABLE `books_authors` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `books_tags`
--

CREATE TABLE `books_tags` (
  `books_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `tags_id` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cast_movies`
--

CREATE TABLE `cast_movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `movies_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `actors_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_grades`
--

CREATE TABLE `content_grades` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directors_movies`
--

CREATE TABLE `directors_movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `type_roles` enum('Director Artistico','Dierctor','Dierctor Asistente') COLLATE utf8mb4_unicode_ci NOT NULL,
  `movies_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `episodes`
--

CREATE TABLE `episodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `series_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `cost` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sipnopsis` longtext COLLATE utf8mb4_unicode_ci,
  `episode_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aprobado','En Proceso','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Proceso',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_control`
--

CREATE TABLE `login_control` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_log` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_login` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `makeup_movies`
--

CREATE TABLE `makeup_movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `movies_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `megazines`
--

CREATE TABLE `megazines` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `status` enum('Aprobado','En Revision','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `megazine_tags`
--

CREATE TABLE `megazine_tags` (
  `megazine_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `tags_id` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `movies` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `trailer_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `music_authors`
--

CREATE TABLE `music_authors` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `status` enum('Aprobado','En Proceso','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Proceso'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `music_movies`
--

CREATE TABLE `music_movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `movies_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `music_tags`
--

CREATE TABLE `music_tags` (
  `music_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `tags_id` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photography_movies`
--

CREATE TABLE `photography_movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `movies_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promoter`
--

CREATE TABLE `promoter` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_c` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_s` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_s` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `promoter`
--

INSERT INTO `promoter` (`id`, `name_c`, `contact_s`, `phone_s`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Jose', NULL, NULL, 'promoter@gmail.com', '$2y$10$YnpAPodIj99XeScwjq1pg.mroliESK66zM16hLnyJxTxL3khu6s0S', '2018-06-27 04:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `radios`
--

CREATE TABLE `radios` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rating`
--

CREATE TABLE `rating` (
  `id` int(10) UNSIGNED NOT NULL,
  `r_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_descr` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referals`
--

CREATE TABLE `referals` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `refered` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `my_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saga`
--

CREATE TABLE `saga` (
  `id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `rating_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sag_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sag_description` longtext COLLATE utf8mb4_unicode_ci,
  `img_saga` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aprobado','En Proceso','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Proceso',
  `type_saga` enum('Libros','Peliculas','Series','Revistas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saga_tags`
--

CREATE TABLE `saga_tags` (
  `saga_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `tags_id` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sceneography_movies`
--

CREATE TABLE `sceneography_movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `movies_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sellers`
--

CREATE TABLE `sellers` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sellers`
--

INSERT INTO `sellers` (`id`, `name`, `email`, `password`, `logo`, `tlf`, `estatus`, `ruc_s`, `descs_s`, `adj_ruc`, `adj_ci`, `promoter_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jose', 'correo@gmail.com', '$2y$10$YnpAPodIj99XeScwjq1pg.mroliESK66zM16hLnyJxTxL3khu6s0S', 'NULL', 'NULL', 'Aprobado', 'NULL', 'NULL', 'NULL', 'NULL', 1, NULL, '2018-06-27 04:00:00', '2018-06-27 04:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sellers_modules`
--

CREATE TABLE `sellers_modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `seller_acces` (
  `sellers_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `modules_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `seller_acces`
--

INSERT INTO `seller_acces` (`sellers_id`, `modules_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seller_messages`
--

CREATE TABLE `seller_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_message` enum('Notificacion','Amonestacion','Informacion','Opinion') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Informacion',
  `status` enum('Leido','No Leido') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No Leido',
  `seller_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seller_password_resets`
--

CREATE TABLE `seller_password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `id` int(10) UNSIGNED NOT NULL,
  `seller_id` int(10) UNSIGNED NOT NULL,
  `saga_id` int(10) UNSIGNED NOT NULL,
  `cost` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `trailer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Aprobado','En Proceso','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Proceso',
  `status_series` enum('En Emision','Finalizado') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series_tags`
--

CREATE TABLE `series_tags` (
  `series_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `tags_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `songs`
--

CREATE TABLE `songs` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `songs_tags`
--

CREATE TABLE `songs_tags` (
  `songs_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `tags_id` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sound_movies`
--

CREATE TABLE `sound_movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `movies_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `storytellers_movies`
--

CREATE TABLE `storytellers_movies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `movies_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscription`
--

CREATE TABLE `suscription` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `seller_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tags_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_tags` enum('Peliculas','Musica','Libros','Radios','TV','Series','Revistas') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Aprobado','En Proceso','Denegado') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'En Proceso',
  `seller_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tv`
--

CREATE TABLE `tv` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `codigo_ref`, `ci`, `num_doc`, `img_doc`, `type`, `status`, `alias`, `img_perf`, `credito`, `verify`, `fech_nac`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jose', 'Pacheco', 'correo@gmail.com', NULL, '24218005', NULL, NULL, 'M', 'client', 'JosPach', NULL, 100, 0, '1995-08-09', '$2y$10$YnpAPodIj99XeScwjq1pg.mroliESK66zM16hLnyJxTxL3khu6s0S', 'tJwPSPxumFGfPg5VUFv9pvgxCLjUXZFIVJ36KF83M3v3B0lJDLG76Mqs4l79', '2018-06-27 04:00:00', '2018-06-27 04:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `account_balance`
--
ALTER TABLE `account_balance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_balance_seller_id_foreign` (`seller_id`);

--
-- Indices de la tabla `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`),
  ADD KEY `album_seller_id_foreign` (`seller_id`),
  ADD KEY `album_rating_id_foreign` (`rating_id`),
  ADD KEY `album_autors_id_foreign` (`autors_id`);

--
-- Indices de la tabla `applys_sellers`
--
ALTER TABLE `applys_sellers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applys_sellers_promoter_id_foreign` (`promoter_id`);

--
-- Indices de la tabla `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_seller_id_foreign` (`seller_id`),
  ADD KEY `books_saga_id_foreign` (`saga_id`),
  ADD KEY `books_rating_id_foreign` (`rating_id`),
  ADD KEY `books_author_id_foreign` (`author_id`);

--
-- Indices de la tabla `books_authors`
--
ALTER TABLE `books_authors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_authors_seller_id_foreign` (`seller_id`);

--
-- Indices de la tabla `books_tags`
--
ALTER TABLE `books_tags`
  ADD PRIMARY KEY (`books_id`,`tags_id`),
  ADD KEY `books_tags_tags_id_foreign` (`tags_id`);

--
-- Indices de la tabla `cast_movies`
--
ALTER TABLE `cast_movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cast_movies_actors_id_foreign` (`actors_id`),
  ADD KEY `cast_movies_movies_id_foreign` (`movies_id`);

--
-- Indices de la tabla `content_grades`
--
ALTER TABLE `content_grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_grades_megazines_id_foreign` (`megazines_id`),
  ADD KEY `content_grades_movies_id_foreign` (`movies_id`),
  ADD KEY `content_grades_episodes_id_foreign` (`episodes_id`),
  ADD KEY `content_grades_series_id_foreign` (`series_id`),
  ADD KEY `content_grades_song_id_foreign` (`song_id`),
  ADD KEY `content_grades_books_id_foreign` (`books_id`),
  ADD KEY `content_grades_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `directors_movies`
--
ALTER TABLE `directors_movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `directors_movies_movies_id_foreign` (`movies_id`);

--
-- Indices de la tabla `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `episodes_seller_id_foreign` (`seller_id`),
  ADD KEY `episodes_series_id_foreign` (`series_id`);

--
-- Indices de la tabla `login_control`
--
ALTER TABLE `login_control`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `makeup_movies`
--
ALTER TABLE `makeup_movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `makeup_movies_movies_id_foreign` (`movies_id`);

--
-- Indices de la tabla `megazines`
--
ALTER TABLE `megazines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `megazines_seller_id_foreign` (`seller_id`),
  ADD KEY `megazines_rating_id_foreign` (`rating_id`),
  ADD KEY `megazines_saga_id_foreign` (`saga_id`);

--
-- Indices de la tabla `megazine_tags`
--
ALTER TABLE `megazine_tags`
  ADD PRIMARY KEY (`megazine_id`,`tags_id`),
  ADD KEY `megazine_tags_tags_id_foreign` (`tags_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movies_seller_id_foreign` (`seller_id`),
  ADD KEY `movies_saga_id_foreign` (`saga_id`),
  ADD KEY `movies_rating_id_foreign` (`rating_id`);

--
-- Indices de la tabla `music_authors`
--
ALTER TABLE `music_authors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `music_authors_seller_id_foreign` (`seller_id`);

--
-- Indices de la tabla `music_movies`
--
ALTER TABLE `music_movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `music_movies_movies_id_foreign` (`movies_id`);

--
-- Indices de la tabla `music_tags`
--
ALTER TABLE `music_tags`
  ADD PRIMARY KEY (`music_id`,`tags_id`),
  ADD KEY `music_tags_tags_id_foreign` (`tags_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `photography_movies`
--
ALTER TABLE `photography_movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photography_movies_movies_id_foreign` (`movies_id`);

--
-- Indices de la tabla `promoter`
--
ALTER TABLE `promoter`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `radios`
--
ALTER TABLE `radios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `radios_seller_id_foreign` (`seller_id`);

--
-- Indices de la tabla `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `referals`
--
ALTER TABLE `referals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `referals_refered_foreign` (`refered`),
  ADD KEY `referals_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `saga`
--
ALTER TABLE `saga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saga_seller_id_foreign` (`seller_id`),
  ADD KEY `saga_rating_id_foreign` (`rating_id`);

--
-- Indices de la tabla `saga_tags`
--
ALTER TABLE `saga_tags`
  ADD PRIMARY KEY (`saga_id`,`tags_id`),
  ADD KEY `saga_tags_tags_id_foreign` (`tags_id`);

--
-- Indices de la tabla `sceneography_movies`
--
ALTER TABLE `sceneography_movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sceneography_movies_movies_id_foreign` (`movies_id`);

--
-- Indices de la tabla `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sellers_id_unique` (`id`),
  ADD UNIQUE KEY `sellers_email_unique` (`email`),
  ADD KEY `sellers_promoter_id_foreign` (`promoter_id`);

--
-- Indices de la tabla `sellers_modules`
--
ALTER TABLE `sellers_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seller_acces`
--
ALTER TABLE `seller_acces`
  ADD PRIMARY KEY (`sellers_id`,`modules_id`),
  ADD KEY `seller_acces_modules_id_foreign` (`modules_id`);

--
-- Indices de la tabla `seller_messages`
--
ALTER TABLE `seller_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_messages_seller_id_foreign` (`seller_id`),
  ADD KEY `seller_messages_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `seller_password_resets`
--
ALTER TABLE `seller_password_resets`
  ADD KEY `seller_password_resets_email_index` (`email`),
  ADD KEY `seller_password_resets_token_index` (`token`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `series_seller_id_foreign` (`seller_id`),
  ADD KEY `series_saga_id_foreign` (`saga_id`);

--
-- Indices de la tabla `series_tags`
--
ALTER TABLE `series_tags`
  ADD PRIMARY KEY (`series_id`,`tags_id`),
  ADD KEY `series_tags_tags_id_foreign` (`tags_id`);

--
-- Indices de la tabla `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `songs_rating_id_foreign` (`rating_id`),
  ADD KEY `songs_album_foreign` (`album`),
  ADD KEY `songs_seller_id_foreign` (`seller_id`),
  ADD KEY `songs_autors_id_foreign` (`autors_id`);

--
-- Indices de la tabla `songs_tags`
--
ALTER TABLE `songs_tags`
  ADD PRIMARY KEY (`songs_id`,`tags_id`),
  ADD KEY `songs_tags_tags_id_foreign` (`tags_id`);

--
-- Indices de la tabla `sound_movies`
--
ALTER TABLE `sound_movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sound_movies_movies_id_foreign` (`movies_id`);

--
-- Indices de la tabla `storytellers_movies`
--
ALTER TABLE `storytellers_movies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `storytellers_movies_movies_id_foreign` (`movies_id`);

--
-- Indices de la tabla `suscription`
--
ALTER TABLE `suscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suscription_user_id_foreign` (`user_id`),
  ADD KEY `suscription_seller_id_foreign` (`seller_id`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_seller_id_foreign` (`seller_id`);

--
-- Indices de la tabla `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_megazines_id_foreign` (`megazines_id`),
  ADD KEY `transactions_movies_id_foreign` (`movies_id`),
  ADD KEY `transactions_episodes_id_foreign` (`episodes_id`),
  ADD KEY `transactions_series_id_foreign` (`series_id`),
  ADD KEY `transactions_song_id_foreign` (`song_id`),
  ADD KEY `transactions_books_id_foreign` (`books_id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `tv`
--
ALTER TABLE `tv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tv_seller_id_foreign` (`seller_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `account_balance`
--
ALTER TABLE `account_balance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `actors`
--
ALTER TABLE `actors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `album`
--
ALTER TABLE `album`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `applys_sellers`
--
ALTER TABLE `applys_sellers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `books_authors`
--
ALTER TABLE `books_authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cast_movies`
--
ALTER TABLE `cast_movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `content_grades`
--
ALTER TABLE `content_grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `directors_movies`
--
ALTER TABLE `directors_movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login_control`
--
ALTER TABLE `login_control`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `makeup_movies`
--
ALTER TABLE `makeup_movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `megazines`
--
ALTER TABLE `megazines`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `music_authors`
--
ALTER TABLE `music_authors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `music_movies`
--
ALTER TABLE `music_movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `photography_movies`
--
ALTER TABLE `photography_movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `promoter`
--
ALTER TABLE `promoter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `radios`
--
ALTER TABLE `radios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `referals`
--
ALTER TABLE `referals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `saga`
--
ALTER TABLE `saga`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sceneography_movies`
--
ALTER TABLE `sceneography_movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sellers_modules`
--
ALTER TABLE `sellers_modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `seller_messages`
--
ALTER TABLE `seller_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sound_movies`
--
ALTER TABLE `sound_movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `storytellers_movies`
--
ALTER TABLE `storytellers_movies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `suscription`
--
ALTER TABLE `suscription`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tv`
--
ALTER TABLE `tv`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_autors_id_foreign` FOREIGN KEY (`autors_id`) REFERENCES `music_authors` (`id`),
  ADD CONSTRAINT `album_rating_id_foreign` FOREIGN KEY (`rating_id`) REFERENCES `rating` (`id`),
  ADD CONSTRAINT `album_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`);

--
-- Filtros para la tabla `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `books_authors` (`id`),
  ADD CONSTRAINT `books_rating_id_foreign` FOREIGN KEY (`rating_id`) REFERENCES `rating` (`id`),
  ADD CONSTRAINT `books_saga_id_foreign` FOREIGN KEY (`saga_id`) REFERENCES `saga` (`id`),
  ADD CONSTRAINT `books_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`);

--
-- Filtros para la tabla `books_authors`
--
ALTER TABLE `books_authors`
  ADD CONSTRAINT `books_authors_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`);

--
-- Filtros para la tabla `episodes`
--
ALTER TABLE `episodes`
  ADD CONSTRAINT `episodes_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`),
  ADD CONSTRAINT `episodes_series_id_foreign` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`);

--
-- Filtros para la tabla `megazines`
--
ALTER TABLE `megazines`
  ADD CONSTRAINT `megazines_rating_id_foreign` FOREIGN KEY (`rating_id`) REFERENCES `rating` (`id`),
  ADD CONSTRAINT `megazines_saga_id_foreign` FOREIGN KEY (`saga_id`) REFERENCES `saga` (`id`),
  ADD CONSTRAINT `megazines_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`);

--
-- Filtros para la tabla `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_rating_id_foreign` FOREIGN KEY (`rating_id`) REFERENCES `rating` (`id`),
  ADD CONSTRAINT `movies_saga_id_foreign` FOREIGN KEY (`saga_id`) REFERENCES `saga` (`id`),
  ADD CONSTRAINT `movies_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`);

--
-- Filtros para la tabla `music_authors`
--
ALTER TABLE `music_authors`
  ADD CONSTRAINT `music_authors_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`);

--
-- Filtros para la tabla `photography_movies`
--
ALTER TABLE `photography_movies`
  ADD CONSTRAINT `photography_movies_movies_id_foreign` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`);

--
-- Filtros para la tabla `radios`
--
ALTER TABLE `radios`
  ADD CONSTRAINT `radios_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`);

--
-- Filtros para la tabla `referals`
--
ALTER TABLE `referals`
  ADD CONSTRAINT `referals_refered_foreign` FOREIGN KEY (`refered`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `referals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `saga`
--
ALTER TABLE `saga`
  ADD CONSTRAINT `saga_rating_id_foreign` FOREIGN KEY (`rating_id`) REFERENCES `rating` (`id`),
  ADD CONSTRAINT `saga_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`);

--
-- Filtros para la tabla `saga_tags`
--
ALTER TABLE `saga_tags`
  ADD CONSTRAINT `saga_tags_saga_id_foreign` FOREIGN KEY (`saga_id`) REFERENCES `songs` (`id`),
  ADD CONSTRAINT `saga_tags_tags_id_foreign` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`);

--
-- Filtros para la tabla `sceneography_movies`
--
ALTER TABLE `sceneography_movies`
  ADD CONSTRAINT `sceneography_movies_movies_id_foreign` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`);

--
-- Filtros para la tabla `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `sellers_promoter_id_foreign` FOREIGN KEY (`promoter_id`) REFERENCES `promoter` (`id`);

--
-- Filtros para la tabla `seller_acces`
--
ALTER TABLE `seller_acces`
  ADD CONSTRAINT `seller_acces_modules_id_foreign` FOREIGN KEY (`modules_id`) REFERENCES `sellers_modules` (`id`),
  ADD CONSTRAINT `seller_acces_sellers_id_foreign` FOREIGN KEY (`sellers_id`) REFERENCES `sellers` (`id`);

--
-- Filtros para la tabla `seller_messages`
--
ALTER TABLE `seller_messages`
  ADD CONSTRAINT `seller_messages_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`),
  ADD CONSTRAINT `seller_messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `series_saga_id_foreign` FOREIGN KEY (`saga_id`) REFERENCES `saga` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `series_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `series_tags`
--
ALTER TABLE `series_tags`
  ADD CONSTRAINT `series_tags_series_id_foreign` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`),
  ADD CONSTRAINT `series_tags_tags_id_foreign` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`);

--
-- Filtros para la tabla `songs`
--
ALTER TABLE `songs`
  ADD CONSTRAINT `songs_album_foreign` FOREIGN KEY (`album`) REFERENCES `album` (`id`),
  ADD CONSTRAINT `songs_autors_id_foreign` FOREIGN KEY (`autors_id`) REFERENCES `music_authors` (`id`),
  ADD CONSTRAINT `songs_rating_id_foreign` FOREIGN KEY (`rating_id`) REFERENCES `rating` (`id`),
  ADD CONSTRAINT `songs_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`);

--
-- Filtros para la tabla `songs_tags`
--
ALTER TABLE `songs_tags`
  ADD CONSTRAINT `songs_tags_songs_id_foreign` FOREIGN KEY (`songs_id`) REFERENCES `songs` (`id`),
  ADD CONSTRAINT `songs_tags_tags_id_foreign` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`);

--
-- Filtros para la tabla `sound_movies`
--
ALTER TABLE `sound_movies`
  ADD CONSTRAINT `sound_movies_movies_id_foreign` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`);

--
-- Filtros para la tabla `storytellers_movies`
--
ALTER TABLE `storytellers_movies`
  ADD CONSTRAINT `storytellers_movies_movies_id_foreign` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`);

--
-- Filtros para la tabla `suscription`
--
ALTER TABLE `suscription`
  ADD CONSTRAINT `suscription_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`),
  ADD CONSTRAINT `suscription_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_books_id_foreign` FOREIGN KEY (`books_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `transactions_episodes_id_foreign` FOREIGN KEY (`episodes_id`) REFERENCES `episodes` (`id`),
  ADD CONSTRAINT `transactions_megazines_id_foreign` FOREIGN KEY (`megazines_id`) REFERENCES `megazines` (`id`),
  ADD CONSTRAINT `transactions_movies_id_foreign` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `transactions_series_id_foreign` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`),
  ADD CONSTRAINT `transactions_song_id_foreign` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`),
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `tv`
--
ALTER TABLE `tv`
  ADD CONSTRAINT `tv_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
