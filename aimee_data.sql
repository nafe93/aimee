-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 07 2017 г., 07:49
-- Версия сервера: 5.7.17-0ubuntu0.16.04.1
-- Версия PHP: 7.0.16-3+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `aimee`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ActiveProcess`
--

CREATE TABLE `ActiveProcess` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sheduler_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `ActiveProcess`
--

INSERT INTO `ActiveProcess` (`id`, `task_id`, `pid`, `sheduler_name`, `created_at`, `updated_at`) VALUES
(46, 'a8e31bdf6fc349e30f3e50dabce064cc', '31247\n', 'sheduler_1', NULL, NULL),
(47, 'eac8ccb22a73827960c08f006d8b9fe0', '31251\n', 'sheduler_1', NULL, NULL),
(48, '64d64dfa8945ee8ce316173612f133e7', '31255\n', 'sheduler_1', NULL, NULL),
(51, 'd34bb82f53f3e12f14240963d66e6b3e', '31358\n', 'sheduler_1', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `aimee_logger`
--

CREATE TABLE `aimee_logger` (
  `id` int(10) UNSIGNED NOT NULL,
  `process_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `technical_info` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `aimee_logger`
--

INSERT INTO `aimee_logger` (`id`, `process_id`, `user_id`, `source`, `message`, `technical_info`, `created_at`, `updated_at`) VALUES
(716504, '2', '1', 'Instagram random post', 'Instagram', 'NAME-SOCNET', NULL, NULL),
(716505, 'crazyhare86', '4', 'Water', '4', 'DONE_KEYWORD_INSTAGRAM', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `announcements`
--

CREATE TABLE `announcements` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `action_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action_url` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `api_tokens`
--

CREATE TABLE `api_tokens` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `metadata` text COLLATE utf8_unicode_ci NOT NULL,
  `transient` tinyint(4) NOT NULL DEFAULT '0',
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `invitations`
--

CREATE TABLE `invitations` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `invoices`
--

CREATE TABLE `invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `team_id` int(11) DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` decimal(8,2) DEFAULT NULL,
  `tax` decimal(8,2) DEFAULT NULL,
  `card_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_zip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vat_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2016_05_26_064608_create_performance_indicators_table', 1),
('2016_05_26_064609_create_announcements_table', 1),
('2016_05_26_064611_create_users_table', 1),
('2016_05_26_064614_create_password_resets_table', 1),
('2016_05_26_064618_create_api_tokens_table', 1),
('2016_05_26_064623_create_subscriptions_table', 1),
('2016_05_26_064629_create_invoices_table', 1),
('2016_05_26_064636_create_notifications_table', 1),
('2016_05_26_064644_create_teams_table', 1),
('2016_05_26_064653_create_team_users_table', 1),
('2016_05_26_064703_create_invitations_table', 1),
('2016_07_16_225911_add_social_authentication', 1),
('2016_08_05_205645_create_providers_table', 1),
('2016_08_15_200405_create_topics_table', 1),
('2016_08_16_210734_create_user_topics_table', 1),
('2016_05_26_064608_create_performance_indicators_table', 1),
('2016_05_26_064609_create_announcements_table', 1),
('2016_05_26_064611_create_users_table', 1),
('2016_05_26_064614_create_password_resets_table', 1),
('2016_05_26_064618_create_api_tokens_table', 1),
('2016_05_26_064623_create_subscriptions_table', 1),
('2016_05_26_064629_create_invoices_table', 1),
('2016_05_26_064636_create_notifications_table', 1),
('2016_05_26_064644_create_teams_table', 1),
('2016_05_26_064653_create_team_users_table', 1),
('2016_05_26_064703_create_invitations_table', 1),
('2016_07_16_225911_add_social_authentication', 1),
('2016_08_05_205645_create_providers_table', 1),
('2016_08_15_200405_create_topics_table', 1),
('2016_08_16_210734_create_user_topics_table', 1),
('2015_07_22_115516_create_ticketit_tables', 2),
('2015_07_22_123254_alter_users_table', 2),
('2015_09_29_123456_add_completed_at_column_to_ticketit_table', 2),
('2015_10_08_123457_create_settings_table', 2),
('2016_01_15_002617_add_htmlcontent_to_ticketit_and_comments', 2),
('2016_01_15_040207_enlarge_settings_columns', 2),
('2016_01_15_120557_add_indexes', 2),
('2016_08_18_225820_create_user_providers_table', 2),
('2016_11_20_124632_create_user_twitter_accounts_table', 2),
('2016_11_29_113107_create_user_facebook_accounts_table', 2),
('2016_12_01_172900_create_user_jobs_table', 2),
('2016_12_02_154921_create_user_scripts_table', 2),
('2016_12_07_145237_saved_user_scripts', 2),
('2016_12_09_131600_create_aimee_loger_table', 2),
('2016_12_19_230423_user_jobs_strategy', 2),
('2017_02_17_120654_ReadyToRun', 3),
('2017_02_17_192039_ActiveProcess', 4),
('2017_02_28_124545_CreateUserLinkedInAccountsTable', 5),
('2017_03_05_104648_CreateUserInstagramAccountsTable', 6),
('2017_03_06_111554_CreateUserGoogleAccountsTable', 7);

-- --------------------------------------------------------

--
-- Структура таблицы `notifications`
--

CREATE TABLE `notifications` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `action_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action_url` text COLLATE utf8_unicode_ci,
  `read` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `performance_indicators`
--

CREATE TABLE `performance_indicators` (
  `id` int(10) UNSIGNED NOT NULL,
  `monthly_recurring_revenue` decimal(8,2) NOT NULL,
  `yearly_recurring_revenue` decimal(8,2) NOT NULL,
  `daily_volume` decimal(8,2) NOT NULL,
  `new_users` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `providers`
--

CREATE TABLE `providers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `providers`
--

INSERT INTO `providers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, NULL, '2016-11-24 09:49:08', '2016-11-24 09:49:08'),
(2, 'twitter', '2016-11-24 09:50:53', '2016-11-24 09:50:53'),
(3, '{"id":1,"name":"test","email":"test@test.ru","photo_url":"https:\\/\\/www.gravatar.com\\/avatar\\/cbc4c5829ca103f23a20b31dbf953d05.jpg?s=200&d=mm","uses_two_factor_auth":false,"two_factor_reset_code":null,"current_team_id":null,"stripe_id":null,"current_billi', '2016-11-24 10:27:00', '2016-11-24 10:27:00'),
(4, '{"id":1,"name":"test","email":"test@test.ru","photo_url":"https:\\/\\/www.gravatar.com\\/avatar\\/cbc4c5829ca103f23a20b31dbf953d05.jpg?s=200&d=mm","uses_two_factor_auth":false,"two_factor_reset_code":null,"current_team_id":null,"stripe_id":null,"current_billi', '2016-11-24 10:27:10', '2016-11-24 10:27:10'),
(5, '{"id":1,"name":"test","email":"test@test.ru","photo_url":"https:\\/\\/www.gravatar.com\\/avatar\\/cbc4c5829ca103f23a20b31dbf953d05.jpg?s=200&d=mm","uses_two_factor_auth":false,"two_factor_reset_code":null,"current_team_id":null,"stripe_id":null,"current_billi', '2016-11-24 10:27:12', '2016-11-24 10:27:12'),
(6, 'slack', '2017-02-27 19:14:00', '2017-02-27 19:14:00'),
(7, 'foursquare', '2017-02-27 19:14:06', '2017-02-27 19:14:06'),
(8, 'tumblr', '2017-02-27 19:14:28', '2017-02-27 19:14:28');

-- --------------------------------------------------------

--
-- Структура таблицы `ReadyToRun`
--

CREATE TABLE `ReadyToRun` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `ReadyToRun`
--

INSERT INTO `ReadyToRun` (`id`, `task_id`, `status`, `created_at`, `updated_at`) VALUES
(5, '1601363a712a33790249990a0835fe04', 'paused', NULL, NULL),
(6, '500c2360eade9d8e2a61af4c18c971c8', 'paused', NULL, NULL),
(7, 'a8e31bdf6fc349e30f3e50dabce064cc', 'runned', NULL, NULL),
(8, 'eac8ccb22a73827960c08f006d8b9fe0', 'runned', NULL, NULL),
(9, '64d64dfa8945ee8ce316173612f133e7', 'runned', NULL, NULL),
(10, 'f01cb1d1d562ca889c19605f90e68f01', 'paused', NULL, NULL),
(11, '06c2751030a72dd22efeb9d6ba64d9f7', 'paused', NULL, NULL),
(12, 'd34bb82f53f3e12f14240963d66e6b3e', 'runned', NULL, NULL),
(13, 'fd59efab5942e55fc1ee57bea9705ddb', 'paused', NULL, NULL),
(14, 'e91f67406e8fde55128d32c05bab5a06', 'run', NULL, NULL),
(15, '7dca481a9f634b280799c1ca25018ac9', 'run', NULL, NULL),
(16, '7b421700bdf0b65f386ac5b466f35c08', 'run', NULL, NULL),
(17, 'c42f530339d369438a563675e9551028', 'run', NULL, NULL),
(18, 'e903195fde8e7796c5f3bd93a3737200', 'run', NULL, NULL),
(19, '3877aef906f11e05ea159f202fb79aa1', 'run', NULL, NULL),
(20, '27f19002f059bfa33e971fda78067009', 'run', NULL, NULL),
(21, '9429fc8bd269a331d94e542a55ef62e9', 'run', NULL, NULL),
(22, '95f3064da1ff93d3561fcf16356406ae', 'run', NULL, NULL),
(23, 'fe8efc7313537c9fff0a5b63ae3b8f91', 'run', NULL, NULL),
(24, 'c093a88bded3f2b1839e971d0f1a1dd0', 'run', NULL, NULL),
(25, 'cabead62e4ae178d2e7476eaf241c351', 'run', NULL, NULL),
(26, 'ee582fc038c3d2b41ee3528ad403ddd5', 'run', NULL, NULL),
(27, '627dcaccb434cbad3b7ce71de3e2b64c', 'run', NULL, NULL),
(28, 'bd549fafe28452453ef4110ea4878f74', 'run', NULL, NULL),
(29, 'c74c62ac013b80591cbe31bf85e8298b', 'run', NULL, NULL),
(30, '8b9a0ccb6469eeafec68fb73da078c6b', 'run', NULL, NULL),
(31, 'f8a3308aa5f50794345d6f16e1317301', 'run', NULL, NULL),
(32, '61deec945dcbd2958215c38ff6e97505', 'run', NULL, NULL),
(33, '7a9235fe3746122b1dce788900b97afd', 'run', NULL, NULL),
(34, '7b0007a9daa8cded566c28ed5dd45002', 'paused', NULL, NULL),
(35, 'dbd03e3a19bd5239485ecd1eaf9dd0a6', 'paused', NULL, NULL),
(36, 'dbe405afe5969aff7a9e98db75f9710a', 'paused', NULL, NULL),
(37, 'aa7eece82dc79b562bd6949103c25892', 'run', NULL, NULL),
(38, '0ecaf1799c5e5cde69cf1030dd66ad7f', 'run', NULL, NULL),
(39, 'ddb21a9750765e6505395fbf64a95685', 'run', NULL, NULL),
(40, 'bd442966bc3615f2c7567a599b80fac7', 'run', NULL, NULL),
(41, '53a585a81be5bc428ffa0f64baa46337', 'run', NULL, NULL),
(42, 'f0d443f1b61b3dafdfd03ea8c9bda946', 'run', NULL, NULL),
(43, '2915c3c17e408fe4dd168d269e3c7bce', 'run', NULL, NULL),
(44, 'f290936c476a8ec112e5756299605526', 'run', NULL, NULL),
(45, 'b4f10214a312171c78dc306d7a52dda3', 'run', NULL, NULL),
(46, '0c1b26d2d5c9373a5fadb871dca77c22', 'run', NULL, NULL),
(47, '5edd76b091912577b47c87330f83b344', 'run', NULL, NULL),
(48, 'c590fa398cb9e85cfc778ac6a68dd148', 'run', NULL, NULL),
(49, '4d9b55ffbbea95847443ea2ea2f4c21f', 'run', NULL, NULL),
(50, '6fe6f3521e79af83d2ae9deb7eb6e0f1', 'run', NULL, NULL),
(51, 'f1344b145730e1f47f1ceee7d489e797', 'run', NULL, NULL),
(52, '86c94b406dc0587552fdb236e07d87fd', 'run', NULL, NULL),
(53, '3a8257128122c160aab5acc1e7ee221c', 'run', NULL, NULL),
(54, '78176c2e669354b873862d36c8a45a4a', 'run', NULL, NULL),
(55, '381fdadce3fb60040f8a4bce74f882ab', 'run', NULL, NULL),
(56, 'c2fa38527757691bb712caa8fd1b1400', 'run', NULL, NULL),
(57, '3875b25f42fc997cb21e40579a02a55b', 'run', NULL, NULL),
(58, '7c257b3fe8b79263c0767b98f2efb95c', 'run', NULL, NULL),
(59, '9322756f2e34267d617a15d46b0dc182', 'run', NULL, NULL),
(60, '9e7a9010821e7683eb0ee0471986fec4', 'run', NULL, NULL),
(61, '076a44b925aa43627a38c1dd21ac21e2', 'run', NULL, NULL),
(62, 'e87c71d27efe7c0b7b15124b567dc133', 'run', NULL, NULL),
(63, '5f6f427ead57adac295a62dbe5889d7f', 'run', NULL, NULL),
(64, '2b93aee0fc68ae29186a746ddebf9cd6', 'run', NULL, NULL),
(65, '426cd37075008b2384605c886b2bdedc', 'run', NULL, NULL),
(66, '27e970149e55b11a540de3ff05aa06cf', 'run', NULL, NULL),
(67, '5a848d61ab6ae5acc6e4d28b4d3fa808', 'run', NULL, NULL),
(68, '78fd1beb0710d292908b6b7dcd7c2f3a', 'run', NULL, NULL),
(69, '521563ab28aad0a20d185b28f29d29ab', 'run', NULL, NULL),
(70, '9457d18b85a3db11b5412ef27a94e914', 'run', NULL, NULL),
(71, '5613fd96b6fbe7959b84f3a487f0e6a2', 'run', NULL, NULL),
(72, '5acd4e938f2bde300b226f67422d2ad9', 'run', NULL, NULL),
(73, '1b0344a2a9fbaff1b6c4db8526b89e5d', 'run', NULL, NULL),
(74, '3ff4f309200880b9561b9f6ea0fccc76', 'run', NULL, NULL),
(75, '370ac0eee965f24f57dd5907f962ec1d', 'run', NULL, NULL),
(76, 'b2da8b97ca1d8d8783e7a204dca4948f', 'run', NULL, NULL),
(77, 'b4839d981656f78d67d55b103025c6a3', 'run', NULL, NULL),
(78, 'b86c66e2735a345782c0b388f5221e09', 'run', NULL, NULL),
(79, '72f0d0a0c819016b696b521b9d277f6d', 'run', NULL, NULL),
(80, '83a85ccc8ba89130020424e4d8372acb', 'run', NULL, NULL),
(81, '51595d6ec1d3f3a85e0104ef24e4a8e8', 'run', NULL, NULL),
(82, 'd322cbcf4971ac55db4f755c76530978', 'run', NULL, NULL),
(83, '4a2a82051babe89379dba9207377d95d', 'run', NULL, NULL),
(84, '43918612584c08495e36a332f0d31990', 'run', NULL, NULL),
(85, '2ff9484ba56be93b752c9369e4515f3a', 'run', NULL, NULL),
(86, 'cb226f9864ea1987f06f62beb3db11a5', 'run', NULL, NULL),
(87, 'c748eb72dff2a01a3802eb8cc05c963f', 'run', NULL, NULL),
(88, '099051fd0086b9a0cdc2b3b0d1f6b0c1', 'run', NULL, NULL),
(89, 'ce546125480516fd0681cde14cc2e332', 'run', NULL, NULL),
(90, '87f56970dfaa1a77e058f4930da7d387', 'run', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `saved_user_scripts`
--

CREATE TABLE `saved_user_scripts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_tokens` longtext COLLATE utf8_unicode_ci NOT NULL,
  `script_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sheduler_parameters` longtext COLLATE utf8_unicode_ci NOT NULL,
  `script_target` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `script_parameters` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `social_network`
--

CREATE TABLE `social_network` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_natwork` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `social_network`
--

INSERT INTO `social_network` (`id`, `name_natwork`) VALUES
(1, 'Twitter'),
(2, 'Facebook');

-- --------------------------------------------------------

--
-- Структура таблицы `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `teams`
--

CREATE TABLE `teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo_url` text COLLATE utf8_unicode_ci,
  `stripe_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_billing_plan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_address_line_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_zip` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_country` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vat_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_billing_information` text COLLATE utf8_unicode_ci,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `team_subscriptions`
--

CREATE TABLE `team_subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `team_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `team_users`
--

CREATE TABLE `team_users` (
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ticketit`
--

CREATE TABLE `ticketit` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `html` longtext COLLATE utf8_unicode_ci,
  `status_id` int(10) UNSIGNED NOT NULL,
  `priority_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `agent_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `completed_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ticketit_audits`
--

CREATE TABLE `ticketit_audits` (
  `id` int(10) UNSIGNED NOT NULL,
  `operation` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ticketit_categories`
--

CREATE TABLE `ticketit_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ticketit_categories_users`
--

CREATE TABLE `ticketit_categories_users` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ticketit_comments`
--

CREATE TABLE `ticketit_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `html` longtext COLLATE utf8_unicode_ci,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ticketit_priorities`
--

CREATE TABLE `ticketit_priorities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ticketit_settings`
--

CREATE TABLE `ticketit_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `lang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `default` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ticketit_statuses`
--

CREATE TABLE `ticketit_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `topics`
--

CREATE TABLE `topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `owner_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo_url` text COLLATE utf8_unicode_ci,
  `uses_two_factor_auth` tinyint(4) NOT NULL DEFAULT '0',
  `authy_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_code` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `two_factor_reset_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_team_id` int(11) DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_billing_plan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `card_country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_address_line_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_zip` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `billing_country` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vat_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extra_billing_information` text COLLATE utf8_unicode_ci,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `last_read_announcements_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth_token_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ticketit_admin` tinyint(1) NOT NULL DEFAULT '0',
  `ticketit_agent` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `photo_url`, `uses_two_factor_auth`, `authy_id`, `country_code`, `phone`, `two_factor_reset_code`, `current_team_id`, `stripe_id`, `current_billing_plan`, `card_brand`, `card_last_four`, `card_country`, `billing_address`, `billing_address_line_2`, `billing_city`, `billing_state`, `billing_zip`, `billing_country`, `vat_id`, `extra_billing_information`, `trial_ends_at`, `last_read_announcements_at`, `created_at`, `updated_at`, `provider`, `oauth_token`, `oauth_token_secret`, `provider_id`, `avatar`, `ticketit_admin`, `ticketit_agent`) VALUES
(1, 'test', 'test@test.ru', '$2y$10$61KtkvolN7v.vGJ1NqnRWOedJFmffFhqqXGkaWJXmAtA.x1XZIQfm', 'Am1ZEBukR85BpU8ou3dPUQN824E5xtufMcGvsRJRXtX2ecOmdlsxoxsbusVS', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-11-16 12:32:40', '2016-11-16 12:32:40', '2016-11-16 12:32:40', '2016-11-24 11:25:19', NULL, NULL, NULL, NULL, NULL, 0, 0),
(2, 'alex', 'lekz22@yandex.ru', '$2y$10$HrKVj3KX7/PXoFlkSZBFy.0ryHc8I/w/DL7B8l5.VCxEMwdfPN14S', 'NnqmfgeXy2Ay9bfPbIoeklSWDTnJuu3LYLZk13KRVwjxHkuPspDKrIIjWLZC', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-11-21 13:00:43', '2016-11-21 13:00:43', '2016-11-21 13:00:43', '2017-01-05 09:07:04', NULL, NULL, NULL, NULL, NULL, 0, 0),
(3, 'test4', 'test4@test.ru', '$2y$10$PUO8l0wWg/IvjRYdP3v15uEDhQrXnouroM1dV9dpcb5skBRI4qXx2', '7vE5HYx4mgcJDojgduqZP8nFXBQY0DkjGG0z10GUvZtM3oi7MRxqBufV6VsY', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-11-22 11:41:34', '2016-11-22 11:41:34', '2016-11-22 11:41:34', '2016-11-22 11:41:56', NULL, NULL, NULL, NULL, NULL, 0, 0),
(4, 'Sergei A Zaitsev', 'crazyhare86@gmail.com', '$2y$10$TPCucUeABkuPrIkSAwdu7O5AStQ/uN8iIiR.NOGDeCww/Sq0Ys0s2', 'PjlzBiAd4JuC71GRlhCdBVxunLSBHk6e8CrQZ1CAg1VkqKpLFkapkCmcp1qa', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-12-11 20:36:56', '2016-12-11 20:36:56', '2016-12-11 20:36:56', '2017-02-20 17:12:48', NULL, NULL, NULL, NULL, NULL, 0, 0),
(5, 'Andrey', 'onlinesirius@yandex.ru', '$2y$10$Y6VWMslBj0bMc.2xWU5KIOsi0yOMTtdmaJbf/f8nHi6om6IWnQxb.', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-01-10 03:47:29', '2017-01-10 03:47:29', '2017-01-10 03:47:29', '2017-01-10 03:47:29', NULL, NULL, NULL, NULL, NULL, 0, 0),
(6, 'OZCZeeKKsk', 'KwUE9vfDgv@example.com', '$2y$10$55K/F30CqE5lsFJ9tZh2w.hxR.hLQUeQbDdBISAzVpLLMw5pg3L/O', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(7, 'Maks', 'rainy_dream@mail.ru', '$2y$10$q3Ivi8w/41ZqPI8XcPv5guE1XAN4ZyDFWoMCwFtgpVSHzln7BXKCa', 'CmzOMEEVBJcY2wTjClleXHObJmFe6J4WrsKaX3EP3xrYsZJU0zJCwWpopAsa', NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-02-20 22:33:06', '2017-02-20 22:33:06', '2017-02-20 22:33:06', '2017-03-05 14:38:56', NULL, NULL, NULL, NULL, NULL, 0, 0),
(8, 'nafe', 'nafe93@windowslive.com', '$2y$10$WNNt9aFwLVQVz/txmiakjO5c0q9VBgOriO6.0IeaPv6iQ9cfWn.nW', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-03-06 10:29:16', '2017-03-06 10:29:16', '2017-03-06 10:29:16', '2017-03-06 10:29:16', NULL, NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user_facebook_accounts`
--

CREATE TABLE `user_facebook_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_user_facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_facebook_login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook_access_token` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_create` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_end_of_life` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `authorization` tinyint(1) NOT NULL DEFAULT '0',
  `self_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user_facebook_accounts`
--

INSERT INTO `user_facebook_accounts` (`id`, `id_user`, `id_user_facebook`, `user_facebook_login`, `facebook_access_token`, `date_create`, `date_end_of_life`, `authorization`, `self_token`, `created_at`, `updated_at`) VALUES
(1, '4', '1251462914889928', 'Зайцев Сергей', 'EAADpKVGSQ2YBAG8xZCZCZBEdudcPY3QGGuiqas6i7rQ71x9OxJZCqYZBQcGrPUtIqvLKoIqZAD0DhHaFEmaTlAdMKxp6rnwscLahHMAIvZBAC90L9xvpsZCBQyxP2ZAgzhC25DUrB0SehjJMzTSbB4AKYKzlxjWYZAuRav40XZBj9g35gZDZD', '24.02.17', '1493138980', 1, 'b07832911ae09cd3f930ce6382d468e1', NULL, NULL),
(2, '4', '100534720480379', 'Sergei Zaitsev', 'EAADpKVGSQ2YBAKPOrV2j1ZAJgdjRQ2ywweM6FaZA4UwFfXDK3NeeMy4sjIjYOCZBkjxTwZA8tW7jpsbe5sRWGoHsBKCqAjq5rvoCh8873t2TtqvnMsVJHSjRvnE4IxA3rZBI4vACgnwDC1tTgSOkHlZAyqA0Oz1dxfRIira3BGBAZDZD', '06.03.17', '1493988754', 1, 'de03cec7fda7297ce0bdcddfbfbb55ad', NULL, NULL),
(4, '8', '1688064717886843', 'Nafe Kzir', 'EAADpKVGSQ2YBAPEcdLK10Dv50OsGhEmkB9HZB5YZCFaKIQgqpZBRn4koKDvGhbFhaaXZBQAie7wFBcZCu06LFMt16ksy1h3DAzfA8phqSkyYvdgRTeh0tUIGdwbNAXxiikNnCGhzxxc3if7ioiyj6oCpLDrgIMeb8SJ1qhEUgNgZDZD', '06.03.17', '1493990238', 1, '20015a82592492de3ebe5474e4fd7091', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_google_accounts`
--

CREATE TABLE `user_google_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_user_google` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_google_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google_access_token` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_create` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_end_of_life` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `authorization` tinyint(1) NOT NULL DEFAULT '0',
  `self_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user_google_accounts`
--

INSERT INTO `user_google_accounts` (`id`, `id_user`, `id_user_google`, `user_google_name`, `google_access_token`, `date_create`, `date_end_of_life`, `authorization`, `self_token`, `created_at`, `updated_at`) VALUES
(2, '4', '110981047710770418388', 'aimee.debug@gmail.com', 'ya29.GlsGBP-26--u4Qf-DpNoJAStFrMlAkAMdoXb634jd5iYR5dbJ1LTpjdd1Vb1aDsoupzbDa5Q3trW_pwN5WpFGoesxRuYvnkou0xcYGRmCu4qrrkaop43yvv0--9o', '06.03.17', '1488804518', 1, 'c88ecf5538daf6b0d903f2cb74680d6b', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_instagram_accounts`
--

CREATE TABLE `user_instagram_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_user_instagram` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_instagram_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instagram_access_token` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_create` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_end_of_life` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `authorization` tinyint(1) NOT NULL DEFAULT '0',
  `self_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user_instagram_accounts`
--

INSERT INTO `user_instagram_accounts` (`id`, `id_user`, `id_user_instagram`, `user_instagram_name`, `instagram_access_token`, `date_create`, `date_end_of_life`, `authorization`, `self_token`, `created_at`, `updated_at`) VALUES
(2, '7', '4767129036', 'webdevel_', '4767129036.206c0d1.f0ebd800c56642858669d353df6ed14c', '05.03.17', '-9002', 1, 'bd14b62b74c66631cf31921473f32ac3', NULL, NULL),
(3, '4', '3971209105', 'crazyhare86', '3971209105.206c0d1.00e0028dd8a541aca732e4f060ae20d7', '06.03.17', '-9002', 1, 'b346a9ae516dccc0c9d7ec75046c6e77', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_jobs_strategy`
--

CREATE TABLE `user_jobs_strategy` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `social_network` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `script_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `script_parameters` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_tokens` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `check_shedule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_shedule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shedule_script_hours` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shedule_script_minutes` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `script_total_repeat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `source_network` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `source_account` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_task` text COLLATE utf8_unicode_ci NOT NULL,
  `target_accaunt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user_jobs_strategy`
--

INSERT INTO `user_jobs_strategy` (`id`, `user_id`, `social_network`, `user_account`, `script_name`, `script_parameters`, `user_tokens`, `user_message`, `check_shedule`, `time_shedule`, `shedule_script_hours`, `shedule_script_minutes`, `script_total_repeat`, `source_network`, `source_account`, `create_date`, `created_at`, `updated_at`, `id_task`, `target_accaunt`) VALUES
(5, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'Auto retweet ', '{"keywords":"USD"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'checked_shedule', '20.02.2017 12:14', '0', '2', '50', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-02-20 09:15:08', NULL, NULL, '1601363a712a33790249990a0835fe04', '{"user_target_account_1":"CrazyHare1869 "}'),
(6, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'Auto retweet ', '{"keywords":"EUR"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'checked_shedule', '20.02.2017 16:15', '0', '5', '100', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-02-20 13:12:25', NULL, NULL, '500c2360eade9d8e2a61af4c18c971c8', '{"user_target_account_1":"CrazyHare1869 "}'),
(7, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'Auto retweet ', '{"keywords":"Network"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'checked_shedule', '20.02.2017 17:20', '0', '50', '100', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-02-20 14:33:07', NULL, NULL, 'a8e31bdf6fc349e30f3e50dabce064cc', '{"user_target_account_1":"CrazyHare1869 "}'),
(8, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'Auto retweet ', '{"keywords":"Russia"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'checked_shedule', '20.02.2017 17:31', '0', '25', '100', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-02-20 14:33:58', NULL, NULL, 'eac8ccb22a73827960c08f006d8b9fe0', '{"user_target_account_1":"CrazyHare1869 "}'),
(9, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'Auto retweet ', '{"keywords":"EUR"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'checked_shedule', '20.02.2017 17:33', '0', '31', '100', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-02-20 14:34:48', NULL, NULL, '64d64dfa8945ee8ce316173612f133e7', '{"user_target_account_1":"CrazyHare1869 "}'),
(12, '5', '{"social_network_1":"Twitter"}', '{"user_account_1":"AsinusAsinorum1 "}', 'Auto retweet ', '{"keywords":"Russia"}', '{"1":"818711939127902212-crS15OEGYIgkH95BRWOre0ZzfgJ6Rmv","2":"8VmaQ1hSWZ8MEP8Crp43wn9WF0uKTRwztH6mqM5u7qiE2"}', '', 'checked_shedule', '20.02.2017 18:00', '0', '15', '5', '{"source_network_1":"Twitter"}', '{"source_account_1":"AsinusAsinorum1 "}', '2017-02-20 15:00:47', NULL, NULL, 'd34bb82f53f3e12f14240963d66e6b3e', '{"user_target_account_1":"AsinusAsinorum1 "}'),
(14, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'Auto retweet ', '{"keywords":"php"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'on', '24.02.2017 20:37', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-02-24 17:38:04', NULL, NULL, 'e91f67406e8fde55128d32c05bab5a06', '{"user_target_account_1":"CrazyHare1869 "}'),
(15, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'RetweetFromListByKeywords ', '{"keywords":"CSS","list":"Development"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'checked_run_once', '24.02.2017 22:06', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-02-24 19:07:16', NULL, NULL, '7dca481a9f634b280799c1ca25018ac9', '{"user_target_account_1":"CrazyHare1869 "}'),
(16, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'RetweetFromListByKeywords ', '{"keywords":"PHP","list":"development"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'checked_run_once', '24.02.2017 22:07', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-02-24 19:09:12', NULL, NULL, '7b421700bdf0b65f386ac5b466f35c08', '{"user_target_account_1":"CrazyHare1869 "}'),
(17, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'RetweetFromListByKeywords ', '{"keywords":"show","list":"development"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'checked_run_once', '25.02.2017 09:24', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-02-25 06:24:55', NULL, NULL, 'c42f530339d369438a563675e9551028', '{"user_target_account_1":"CrazyHare1869 "}'),
(18, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'RetweetFromListByKeywords ', '{"keywords":"webdesign","list":"development"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'checked_run_once', '25.02.2017 09:24', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-02-25 06:26:40', NULL, NULL, 'e903195fde8e7796c5f3bd93a3737200', '{"user_target_account_1":"CrazyHare1869 "}'),
(19, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'RetweetFromListByKeywords ', '{"keywords":"easy,User ","list":"development"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'on', '25.02.2017 09:28', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-02-25 06:29:27', NULL, NULL, '3877aef906f11e05ea159f202fb79aa1', '{"user_target_account_1":"CrazyHare1869 "}'),
(21, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'RetweetFromList ', '{"keywords":"laravel","list":"development"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'on', '27.02.2017 20:29', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-02-27 17:30:15', NULL, NULL, '9429fc8bd269a331d94e542a55ef62e9', '{"user_target_account_1":"CrazyHare1869 "}'),
(46, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'LikeIfText ', '{"keywords":"developer"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'on', '28.02.2017 19:23', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-02-28 16:23:35', NULL, NULL, '0c1b26d2d5c9373a5fadb871dca77c22', '{"user_target_account_1":"CrazyHare1869 "}'),
(47, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'LikeIfText', '{"keywords":"laravel"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'checked_run_once', '01.03.2017 15:39', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869"}', '2017-03-01 12:38:45', NULL, NULL, '5edd76b091912577b47c87330f83b344', '{"user_target_account_1":"CrazyHare1869"}'),
(48, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'AllPopularFromList', '{"list":"development"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'checked_run_once', '01.03.2017 15:45', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-03-01 12:39:50', NULL, NULL, 'c590fa398cb9e85cfc778ac6a68dd148', '{"user_target_account_1":"CrazyHare1869 "}'),
(49, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'Auto retweet', '{"keywords":"USD"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'checked_run_once', '01.03.2017 16:00', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-03-01 12:55:06', NULL, NULL, '4d9b55ffbbea95847443ea2ea2f4c21f', '{"user_target_account_1":"CrazyHare1869 "}'),
(50, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'LikeIfText', '{"keywords":"EUR"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'checked_run_once', '01.03.2017 16:14', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-03-01 13:08:05', NULL, NULL, '6fe6f3521e79af83d2ae9deb7eb6e0f1', '{"user_target_account_1":"CrazyHare1869 "}'),
(77, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'Auto retweet', '{"keywords":"EUR"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'on', '02.03.2017 11:48', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-03-02 08:49:27', NULL, NULL, 'b4839d981656f78d67d55b103025c6a3', '{"user_target_account_1":"CrazyHare1869 "}'),
(78, '7', '{"social_network_1":"Twitter"}', '{"user_account_1":"Red_Rain91 "}', 'AllPopularFromList', '{"list":"mytest"}', '{"1":"624333180-em95QXjYaJm0Cpknak7LjKxOA6ZxttbaHNxv4KaR","2":"R6DhKuoAZE1NK3wssDfIlAMwBTVCAc6a3xxRTjaDXHXe8"}', '', 'on', '02.03.2017 10:27', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"Red_Rain91 "}', '2017-03-02 09:11:21', NULL, NULL, 'b86c66e2735a345782c0b388f5221e09', '{"user_target_account_1":"Red_Rain91 "}'),
(79, '7', '{"social_network_1":"Twitter"}', '{"user_account_1":"Red_Rain91 "}', 'RetweetFromListByKeywords', '{"keywords":"laravel","list":"mytest"}', '{"1":"624333180-em95QXjYaJm0Cpknak7LjKxOA6ZxttbaHNxv4KaR","2":"R6DhKuoAZE1NK3wssDfIlAMwBTVCAc6a3xxRTjaDXHXe8"}', '', 'on', '02.03.2017 12:11', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"Red_Rain91 "}', '2017-03-02 09:18:27', NULL, NULL, '72f0d0a0c819016b696b521b9d277f6d', '{"user_target_account_1":"Red_Rain91 "}'),
(86, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'RSS Repost', '{"Link":"http:\\/\\/ya.ru"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'on', '02.03.2017 16:54', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-03-02 13:55:05', NULL, NULL, 'cb226f9864ea1987f06f62beb3db11a5', '{"user_target_account_1":"CrazyHare1869 "}'),
(87, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'Auto retweet', '{"keywords":"Russia"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'checked_run_once', '02.03.2017 18:56', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-03-02 15:56:57', NULL, NULL, 'c748eb72dff2a01a3802eb8cc05c963f', '{"user_target_account_1":"CrazyHare1869 "}'),
(88, '4', '{"social_network_1":"Twitter"}', '{"user_account_1":"CrazyHare1869 "}', 'LikeIfText', '{"keywords":"USD"}', '{"1":"252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ","2":"nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd"}', '', 'checked_run_once', '05.03.2017 10:41', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-03-05 07:42:11', NULL, NULL, '099051fd0086b9a0cdc2b3b0d1f6b0c1', '{"user_target_account_1":"CrazyHare1869 "}'),
(89, '4', '{"social_network_1":"Instagram"}', '{"user_account_1":"crazyhare86"}', 'Instagram random post', '{"keywords":"Water"}', '[]', '', 'checked_run_once', '07.03.2017 10:27', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-03-07 07:27:43', NULL, NULL, 'ce546125480516fd0681cde14cc2e332', '{"user_target_account_1":"CrazyHare1869 "}'),
(90, '4', '{"social_network_1":"Instagram"}', '{"user_account_1":"crazyhare86"}', 'Instagram random post', '{"keywords":"Water"}', '[]', '', 'checked_run_once', '07.03.2017 10:47', '0', '0', '', '{"source_network_1":"Twitter"}', '{"source_account_1":"CrazyHare1869 "}', '2017-03-07 07:48:28', NULL, NULL, '87f56970dfaa1a77e058f4930da7d387', '{"user_target_account_1":"CrazyHare1869 "}');

-- --------------------------------------------------------

--
-- Структура таблицы `user_jobs_table`
--

CREATE TABLE `user_jobs_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `visual_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `run_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shedule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `script_runner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `script_storage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user_linkedin_accounts`
--

CREATE TABLE `user_linkedin_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_user_linkedin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_linkedin_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `linkedin_access_token` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_create` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_end_of_life` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `authorization` tinyint(1) NOT NULL DEFAULT '0',
  `self_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user_linkedin_accounts`
--

INSERT INTO `user_linkedin_accounts` (`id`, `id_user`, `id_user_linkedin`, `user_linkedin_name`, `linkedin_access_token`, `date_create`, `date_end_of_life`, `authorization`, `self_token`, `created_at`, `updated_at`) VALUES
(1, '4', '5od1tbjAxd', 'Zaitsev Sergei', 'AQVeyYPozUSb7N7cYnbvSvJzAmrnwZoPevwvRGGFXF9IR9WPmPG-2sOTEOZfGaSa52IH7sbs-cZk0TwUiDFhiM4xTg_5lNuJTnTOwWcmEVuOSZPzoxz6bOzwyYUQVRr89FzBww-ftRPPVLzR2VD5-tbDNJ60QnjPS3GXCetVIM__NXpBO1o', '28.02.17', '1493468137', 1, 'aa4165199c960ceff3b9d233d4842860', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_providers`
--

CREATE TABLE `user_providers` (
  `provider_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `oauth_token_secret` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user_scripts`
--

CREATE TABLE `user_scripts` (
  `id` int(10) UNSIGNED NOT NULL,
  `script_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `script_filename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `script_interpretator` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `script_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `script_parameters` longtext COLLATE utf8_unicode_ci NOT NULL,
  `script_info` text COLLATE utf8_unicode_ci NOT NULL,
  `external` tinyint(1) NOT NULL,
  `billing_plan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `script_target` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `full_description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user_scripts`
--

INSERT INTO `user_scripts` (`id`, `script_name`, `script_filename`, `script_interpretator`, `script_class`, `script_parameters`, `script_info`, `external`, `billing_plan`, `script_target`, `categories`, `created_at`, `updated_at`, `full_description`) VALUES
(1, 'Auto retweet', 'PHP', 'PHP', 'Twitter', '{"keywords":""}', 'Script for auto retweeting', 0, 'free', 'unself', '{"cat1":"finance", "cat2":"basic"}', NULL, NULL, 'Full description script 1 <p> New Script</p>'),
(2, 'RSS Repost', 'PHP', 'PHP', 'Facebook;Twitter', '{"url":"", "type":"", "count":"", "type_data":"", "rss_parse_id":""}', 'Script repost from RSS', 1, 'free', 'self', '{"cat1":"finance"}', '2016-12-28 08:00:00', '2016-12-28 08:00:00', 'Full description script 2'),
(3, 'DeleteOldTweets', 'del_old_tweet.py', 'python', 'Twitter', '{"date":"2016-12-01"}', 'Delete your old tweets', 1, 'free', 'self', '{"cat1":"basic"}', NULL, NULL, 'Full description script 3'),
(4, 'RetweetFromListByKeywords', 'php', 'php', 'Twitter', '{"keywords": "", "list":""}', 'Script for retweet popular tweets from my list', 0, 'free', 'self', '{"cat1":"finance", "cat2":"basic"}', '2017-02-20 08:29:18', '2017-02-20 08:29:18', 'Script for retweet popular tweets from my list'),
(5, 'RetweetFromList', 'PHP', 'PHP', 'Twitter', '{"keywords": "", "list":""}', 'Script for retweet popular tweets from my list by hashtags', 0, 'free', 'unself', '{"cat1":"finance", "cat2":"basic"}', '2017-02-27 15:01:30', '2017-02-27 15:01:30', 'Script for retweet popular tweets from my list by hashtags'),
(6, 'AllPopularFromList', 'PHP', 'PHP', 'Twitter', '{ "list" : "" }', 'Script for retweet all popular tweets from list', 0, 'free', 'unself', '{"cat1":"finance", "cat2":"basic"}', '2017-02-27 15:02:15', '2017-02-27 15:02:15', 'Script for retweet all popular tweets from list'),
(7, 'LikeIfText', 'PHP', 'PHP', 'Twitter', '{"keywords": ""}', 'Script favourites tweets, if the text is one of the words', 0, 'free', 'unself', '{"cat1":"finance", "cat2":"basic"}', '2017-02-27 15:03:30', '2017-02-27 15:03:30', 'Script favourites tweets, if the text is one of the words'),
(8, 'ChangeAvatar', 'PHP', 'PHP', 'Twitter', '{"keywords": ""}', 'Script randomly change user\'s avatar', 0, 'free', 'unself', '{"cat1":"finance", "cat2":"basic"}', '2017-02-28 15:05:50', '2017-02-28 15:05:50', 'Script randomly change user\'s avatar'),
(9, 'Instagram random post', 'PHP', 'PHP', 'Instagram', '{"keywords":""}', 'Script for post random image by keyword', 1, 'free', 'self', '{"cat1":"basic"}', NULL, NULL, 'Script for post random image by keyword');

-- --------------------------------------------------------

--
-- Структура таблицы `user_topics`
--

CREATE TABLE `user_topics` (
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user_twitter_accounts`
--

CREATE TABLE `user_twitter_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_twitter_login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter_access_token` longtext COLLATE utf8_unicode_ci NOT NULL,
  `twitter_access_token_secret` longtext COLLATE utf8_unicode_ci NOT NULL,
  `authorization` tinyint(1) NOT NULL DEFAULT '0',
  `self_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user_twitter_accounts`
--

INSERT INTO `user_twitter_accounts` (`id`, `id_user`, `user_twitter_login`, `twitter_access_token`, `twitter_access_token_secret`, `authorization`, `self_token`, `created_at`, `updated_at`) VALUES
(1, '4', 'CrazyHare1869', '252081434-tuApYNEqgbvRaA1cqb9a4dr1IxsxKhTxx2h670RZ', 'nzneA1JapqEyD77fkDwUY0guXUqZkP1nne57W7Ti85PUd', 1, 'f3b417bb805266a777b7604d455a922e', NULL, NULL),
(2, '7', 'Red_Rain91', '624333180-em95QXjYaJm0Cpknak7LjKxOA6ZxttbaHNxv4KaR', 'R6DhKuoAZE1NK3wssDfIlAMwBTVCAc6a3xxRTjaDXHXe8', 1, '2598a2d8ab4b0fb68d9011e200f6c07f', NULL, NULL),
(3, '5', 'AsinusAsinorum1', '818711939127902212-crS15OEGYIgkH95BRWOre0ZzfgJ6Rmv', '8VmaQ1hSWZ8MEP8Crp43wn9WF0uKTRwztH6mqM5u7qiE2', 1, '71bdabe6e96351b1e5fdda48e97c8f34', NULL, NULL),
(4, '4', 'SergeiZaitsev3', '836491331673415680-mJqUGfycGM2MTDshThT9iyC2KKOswGU', 'EerL4qd13nTXFl1bBqPHlOAbyF75WulD9vfSRhtj5stMY', 1, '1a62a447cb4eb087c19d4f0a42b21f6f', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ActiveProcess`
--
ALTER TABLE `ActiveProcess`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `aimee_logger`
--
ALTER TABLE `aimee_logger`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `api_tokens`
--
ALTER TABLE `api_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `api_tokens_token_unique` (`token`),
  ADD KEY `api_tokens_user_id_expires_at_index` (`user_id`,`expires_at`);

--
-- Индексы таблицы `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invitations_token_unique` (`token`),
  ADD KEY `invitations_team_id_index` (`team_id`),
  ADD KEY `invitations_user_id_index` (`user_id`);

--
-- Индексы таблицы `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_created_at_index` (`created_at`),
  ADD KEY `invoices_user_id_index` (`user_id`),
  ADD KEY `invoices_team_id_index` (`team_id`);

--
-- Индексы таблицы `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_created_at_index` (`user_id`,`created_at`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `performance_indicators`
--
ALTER TABLE `performance_indicators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `performance_indicators_created_at_index` (`created_at`);

--
-- Индексы таблицы `providers`
--
ALTER TABLE `providers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ReadyToRun`
--
ALTER TABLE `ReadyToRun`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `saved_user_scripts`
--
ALTER TABLE `saved_user_scripts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `social_network`
--
ALTER TABLE `social_network`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_owner_id_index` (`owner_id`);

--
-- Индексы таблицы `team_subscriptions`
--
ALTER TABLE `team_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `team_users`
--
ALTER TABLE `team_users`
  ADD UNIQUE KEY `team_users_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Индексы таблицы `ticketit`
--
ALTER TABLE `ticketit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticketit_subject_index` (`subject`),
  ADD KEY `ticketit_status_id_index` (`status_id`),
  ADD KEY `ticketit_priority_id_index` (`priority_id`),
  ADD KEY `ticketit_user_id_index` (`user_id`),
  ADD KEY `ticketit_agent_id_index` (`agent_id`),
  ADD KEY `ticketit_category_id_index` (`category_id`),
  ADD KEY `ticketit_completed_at_index` (`completed_at`);

--
-- Индексы таблицы `ticketit_audits`
--
ALTER TABLE `ticketit_audits`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ticketit_categories`
--
ALTER TABLE `ticketit_categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ticketit_comments`
--
ALTER TABLE `ticketit_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticketit_comments_user_id_index` (`user_id`),
  ADD KEY `ticketit_comments_ticket_id_index` (`ticket_id`);

--
-- Индексы таблицы `ticketit_priorities`
--
ALTER TABLE `ticketit_priorities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ticketit_settings`
--
ALTER TABLE `ticketit_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticketit_settings_slug_unique` (`slug`),
  ADD UNIQUE KEY `ticketit_settings_lang_unique` (`lang`),
  ADD KEY `ticketit_settings_lang_index` (`lang`),
  ADD KEY `ticketit_settings_slug_index` (`slug`);

--
-- Индексы таблицы `ticketit_statuses`
--
ALTER TABLE `ticketit_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topics_owner_id_index` (`owner_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_provider_id_unique` (`provider_id`);

--
-- Индексы таблицы `user_facebook_accounts`
--
ALTER TABLE `user_facebook_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_google_accounts`
--
ALTER TABLE `user_google_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_instagram_accounts`
--
ALTER TABLE `user_instagram_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_jobs_strategy`
--
ALTER TABLE `user_jobs_strategy`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_jobs_table`
--
ALTER TABLE `user_jobs_table`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_linkedin_accounts`
--
ALTER TABLE `user_linkedin_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_providers`
--
ALTER TABLE `user_providers`
  ADD UNIQUE KEY `user_providers_provider_id_user_id_unique` (`provider_id`,`user_id`);

--
-- Индексы таблицы `user_scripts`
--
ALTER TABLE `user_scripts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_topics`
--
ALTER TABLE `user_topics`
  ADD UNIQUE KEY `user_topics_topic_id_user_id_unique` (`topic_id`,`user_id`);

--
-- Индексы таблицы `user_twitter_accounts`
--
ALTER TABLE `user_twitter_accounts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ActiveProcess`
--
ALTER TABLE `ActiveProcess`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT для таблицы `aimee_logger`
--
ALTER TABLE `aimee_logger`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=716506;
--
-- AUTO_INCREMENT для таблицы `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `performance_indicators`
--
ALTER TABLE `performance_indicators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `providers`
--
ALTER TABLE `providers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `ReadyToRun`
--
ALTER TABLE `ReadyToRun`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT для таблицы `saved_user_scripts`
--
ALTER TABLE `saved_user_scripts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `team_subscriptions`
--
ALTER TABLE `team_subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ticketit`
--
ALTER TABLE `ticketit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ticketit_audits`
--
ALTER TABLE `ticketit_audits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ticketit_categories`
--
ALTER TABLE `ticketit_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ticketit_comments`
--
ALTER TABLE `ticketit_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ticketit_priorities`
--
ALTER TABLE `ticketit_priorities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ticketit_settings`
--
ALTER TABLE `ticketit_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `ticketit_statuses`
--
ALTER TABLE `ticketit_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `user_facebook_accounts`
--
ALTER TABLE `user_facebook_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `user_google_accounts`
--
ALTER TABLE `user_google_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `user_instagram_accounts`
--
ALTER TABLE `user_instagram_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `user_jobs_strategy`
--
ALTER TABLE `user_jobs_strategy`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT для таблицы `user_jobs_table`
--
ALTER TABLE `user_jobs_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user_linkedin_accounts`
--
ALTER TABLE `user_linkedin_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `user_scripts`
--
ALTER TABLE `user_scripts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `user_twitter_accounts`
--
ALTER TABLE `user_twitter_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
