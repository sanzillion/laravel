-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 23, 2017 at 09:32 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cpstn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` bigint(20) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `phone_number`, `email`, `level`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'master', 639074239571, 'master@dev.com', 'superuser', '$2y$10$wh0SI9acSJxGNsh8SC3TTO2HYTlZ3/RueFmy9OB9FBjv/rGREwpma', 'E2g42bhVEOR0LObmA55jAVVhhliiItIUNWsp6Kly2MifKNyhPpSvTsdrf3O7', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `body`, `created_at`, `updated_at`) VALUES
(1, 22, 22, 'whatever!', '2017-10-22 21:33:49', '2017-10-22 21:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(10) UNSIGNED NOT NULL,
  `uploader` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_09_16_084359_create_posts_table', 1),
(4, '2017_09_18_092729_create_comments_table', 1),
(5, '2017_09_21_043903_create_tags_table', 1),
(6, '2017_09_22_234526_create_admins_table', 1),
(7, '2017_09_27_100701_create_files_table', 1),
(8, '2017_10_04_061531_create_folders_table', 1),
(9, '2017_10_04_062027_create_sms_table', 1),
(10, '2017_10_19_122245_create_stats_table', 1),
(11, '2017_10_19_122310_create_trackers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_posts`
--

CREATE TABLE `pending_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pending_posts`
--

INSERT INTO `pending_posts` (`id`, `user_id`, `title`, `body`, `cover_img`, `created_at`, `updated_at`) VALUES
(2, 17, 'Porro vel temporibus sapiente labore dolorem numquam.', 'Voluptatibus harum amet cumque porro impedit rem. Non facilis quia voluptatem aut sapiente earum. Fugit animi soluta aliquam ut voluptatum et nostrum aperiam. Rerum et dolore aliquam veritatis et similique.', NULL, '2017-10-22 21:02:44', '2017-10-22 21:02:44'),
(3, 4, 'Pariatur non dolorem voluptas ut.', 'Quidem veritatis corporis et rem adipisci et. Ut praesentium velit in et. Dolore ea quasi omnis rerum.', NULL, '2017-10-22 21:02:44', '2017-10-22 21:02:44'),
(5, 6, 'Placeat veritatis iusto dolorum pariatur modi.', 'Odit non nam quis assumenda. Quidem laboriosam omnis voluptate recusandae porro. Nam eveniet mollitia iste non saepe enim quo aperiam.', NULL, '2017-10-22 21:02:44', '2017-10-22 21:02:44'),
(7, 4, 'At cumque qui labore quasi necessitatibus incidunt eius.', 'Illum vel dolore eum. Asperiores et occaecati quos ipsum. Dolorum numquam dignissimos est nam totam est possimus. Aut laudantium ducimus nobis molestiae quo assumenda dolores.', NULL, '2017-10-22 21:02:44', '2017-10-22 21:02:44'),
(8, 15, 'Ipsum aut error ullam eum.', 'Temporibus minus perferendis aut ullam et. Qui molestiae esse rerum sit consequuntur dolorem ratione. Non exercitationem ut molestiae consequatur reprehenderit. Placeat eligendi et sequi dignissimos delectus. Quis et facilis quia mollitia aliquid.', NULL, '2017-10-22 21:02:44', '2017-10-22 21:02:44'),
(10, 19, 'Ut fugit deleniti qui molestiae quod.', 'Omnis quas dolorem repellendus sed doloribus voluptatem. In et molestias quis qui vel veritatis rerum pariatur. Aperiam beatae nostrum dicta voluptas. Provident et dolores qui eveniet laudantium.', NULL, '2017-10-22 21:02:44', '2017-10-22 21:02:44'),
(11, 8, 'Et aperiam itaque repudiandae rerum.', 'Odio illo ut quod qui optio velit animi. Commodi soluta iusto quas quia. Veniam in et nobis architecto. Eligendi sed aperiam quaerat sit earum. Fugit assumenda provident rerum cupiditate accusantium odio.', NULL, '2017-10-22 21:02:44', '2017-10-22 21:02:44'),
(13, 11, 'Culpa suscipit voluptas sint inventore.', 'Rerum inventore ab et earum modi saepe. Animi blanditiis ad voluptatem sed dolores vero tempore. Est et ullam nobis reiciendis voluptatibus ea enim.', NULL, '2017-10-22 21:02:45', '2017-10-22 21:02:45'),
(14, 17, 'Atque qui possimus rerum facilis excepturi.', 'Dolorem quasi magnam dolores doloribus. Accusantium in doloremque ut magni ea expedita. Repudiandae eius et illum. Accusamus quia minima rerum doloribus excepturi.', NULL, '2017-10-22 21:02:45', '2017-10-22 21:02:45'),
(15, 19, 'Voluptate laudantium quia vel molestias.', 'Nam non amet voluptatibus maxime. Optio ad beatae voluptatem necessitatibus tenetur. Et dolorem enim adipisci sit.', NULL, '2017-10-22 21:02:45', '2017-10-22 21:02:45'),
(16, 20, 'Consectetur aut vel laudantium aut blanditiis ut eveniet.', 'Perspiciatis modi blanditiis omnis repellendus labore vero. Culpa iusto debitis et odit. Unde qui sed quidem. Occaecati quaerat nihil veritatis similique.', NULL, '2017-10-22 21:02:45', '2017-10-22 21:02:45'),
(17, 4, 'Cumque exercitationem error aut quibusdam architecto.', 'Itaque voluptates est voluptatem soluta libero. Maxime provident a et eos aut. Minus reprehenderit sed maxime eaque est ut sit vel.', NULL, '2017-10-22 21:02:45', '2017-10-22 21:02:45'),
(18, 10, 'Qui dolorem a porro.', 'Ut accusantium provident doloribus in ea. Nisi porro molestiae fugiat nihil. Excepturi enim molestiae non aut quia vel deleniti. Qui omnis omnis iusto qui dicta et et.', NULL, '2017-10-22 21:02:45', '2017-10-22 21:02:45'),
(20, 4, 'Eum rerum dolores aut quasi tenetur ut.', 'Pariatur magnam eum quo ducimus. Numquam ut eveniet repudiandae blanditiis ipsam. Quod voluptatem est et blanditiis ipsam eveniet atque. Optio recusandae id omnis nesciunt dignissimos atque.', NULL, '2017-10-22 21:02:45', '2017-10-22 21:02:45');

-- --------------------------------------------------------

--
-- Table structure for table `pending_users`
--

CREATE TABLE `pending_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pending_users`
--

INSERT INTO `pending_users` (`id`, `name`, `email`, `password`, `phone_number`, `institution`, `city`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Frederick Berge', 'lconsidine@example.com', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 2188039550748, 'Gleason-Hintz', 'New Ardithmouth', 'FWuEQlEl6A', '2017-10-22 21:02:34', '2017-10-22 21:02:34'),
(2, 'Dorthy Tillman', 'rosenbaum.georgiana@example.org', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 4125325273184, 'Osinski PLC', 'Mitchellburgh', 'xZtCf0EYH6', '2017-10-22 21:02:34', '2017-10-22 21:02:34'),
(3, 'Pearline Stamm MD', 'hettinger.verda@example.org', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 7312738893534, 'McLaughlin-Turcotte', 'Gorczanyborough', 'VinqBfSqCO', '2017-10-22 21:02:34', '2017-10-22 21:02:34'),
(4, 'Ramiro Fritsch', 'edicki@example.org', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 7852740379213, 'Wiegand, Miller and Cassin', 'Andersonton', '2ftQiSqsea', '2017-10-22 21:02:34', '2017-10-22 21:02:34'),
(5, 'Dr. Ivory Welch DDS', 'abashirian@example.org', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 7466390402393, 'Kuvalis, Beier and Kihn', 'Emardbury', 'aaifKCHq6F', '2017-10-22 21:02:34', '2017-10-22 21:02:34'),
(6, 'Diego Kessler', 'barton.izaiah@example.org', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 4989543747698, 'Stanton-Kihn', 'Port Edmund', 'kQkTTmTKId', '2017-10-22 21:02:34', '2017-10-22 21:02:34'),
(7, 'Geovanni Torp', 'gayle57@example.org', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 2337256026283, 'Kihn LLC', 'North Kaitlinland', '2r2W85pgyj', '2017-10-22 21:02:35', '2017-10-22 21:02:35'),
(8, 'Prof. Jeffry O\'Connell', 'ibeer@example.org', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 6123302454994, 'Stracke PLC', 'Lake Caesar', 'KL7RJGDx9X', '2017-10-22 21:02:35', '2017-10-22 21:02:35'),
(9, 'Miss Viviane Torp II', 'jparker@example.com', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 5424064759628, 'Rau Inc', 'Nicklausbury', 'GDjOVyBRSW', '2017-10-22 21:02:35', '2017-10-22 21:02:35'),
(10, 'Ms. Claire Tremblay II', 'yparker@example.net', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 5937120208498, 'Senger, Kris and Grady', 'North Bartstad', '3iR91MfSay', '2017-10-22 21:02:35', '2017-10-22 21:02:35'),
(11, 'Mrs. Rosina Conn DVM', 'alessandro.kling@example.net', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 1483938984668, 'Rohan-Jacobi', 'South Sylvesterhaven', 'Yo2qJeqv2E', '2017-10-22 21:02:35', '2017-10-22 21:02:35'),
(12, 'Mr. Sidney Bauch Sr.', 'federico22@example.org', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 9536809464847, 'Waelchi PLC', 'Kayleefort', 'FQkk13g4qe', '2017-10-22 21:02:35', '2017-10-22 21:02:35'),
(13, 'Tad Marquardt', 'schroeder.cletus@example.org', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 5131664207373, 'Rohan Group', 'Ernserfurt', 'Kp9hmwvIf2', '2017-10-22 21:02:35', '2017-10-22 21:02:35'),
(14, 'Prof. Sabryna Lueilwitz', 'maynard42@example.net', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 5215883423008, 'Abshire, Johns and Huels', 'Ebertburgh', 'gvtxGAcb1W', '2017-10-22 21:02:35', '2017-10-22 21:02:35'),
(15, 'Prof. Lemuel Brakus', 'nathen.denesik@example.net', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 1740466166341, 'Wuckert-Kris', 'Port Mohammadport', 'j0IQP85bUD', '2017-10-22 21:02:35', '2017-10-22 21:02:35'),
(16, 'Dr. Alexandro Smith', 'ondricka.hilton@example.org', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 3480880703487, 'O\'Keefe and Sons', 'Avaville', 'BkW6r8J1rw', '2017-10-22 21:02:35', '2017-10-22 21:02:35'),
(17, 'Carlie Lehner', 'considine.ervin@example.org', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 7262289062872, 'Nicolas and Sons', 'East Jeff', 'lcZ3ALcqh6', '2017-10-22 21:02:35', '2017-10-22 21:02:35'),
(18, 'Earlene Feeney Jr.', 'minnie.lueilwitz@example.net', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 6928491705130, 'Kovacek Group', 'Hettingerside', 'YUlq3lqjxU', '2017-10-22 21:02:35', '2017-10-22 21:02:35'),
(19, 'Lyla Pollich', 'lindsey.eichmann@example.net', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 4011348005362, 'Wunsch-Gusikowski', 'Quigleystad', 'gJOpvPWIdf', '2017-10-22 21:02:35', '2017-10-22 21:02:35'),
(20, 'Mrs. Adrianna Kerluke', 'kelsie70@example.org', '$2y$10$4KxoO17IUYuRM.j/0DkZj.AjBvkKPu.4N7JMEf.ZjgvR0dxlNMkJm', 3231574255257, 'Larkin, Bechtelar and Braun', 'Strackeport', 'OcF7SfKOKs', '2017-10-22 21:02:35', '2017-10-22 21:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `cover_img`, `created_at`, `updated_at`) VALUES
(1, 13, 'Voluptatibus fugiat repellat dolorem quaerat.', 'Atque iste necessitatibus officia. Labore laboriosam nam facilis. Beatae exercitationem aperiam delectus reprehenderit.<br><br>Est consequuntur quam et placeat consequatur sed sed. Facere odit quo corporis rem. Unde aut quasi voluptatem soluta assumenda. Occaecati deserunt autem excepturi. Commodi esse minus architecto non iure et. Vitae quis enim ea velit repellat. Quod culpa rerum quia. Rerum voluptatem nihil dolor sint aut temporibus. Cupiditate autem laborum omnis ut ipsum. In ut et iusto dolor est laborum. Provident aut sed repellat id. Accusantium debitis adipisci numquam corrupti reprehenderit omnis. Rerum iusto iure alias voluptatum ipsum aspernatur. Dolor at dignissimos veritatis vel sunt. Dignissimos commodi facere voluptates quae. Itaque error qui ut suscipit libero eveniet quos. Unde voluptas voluptatem at nulla. Sint qui facilis repellendus rem beatae nam. Rem corrupti quo aut. Porro sed quis sed ea rerum aperiam. Laudantium soluta omnis est dignissimos. Sed suscipit magnam consequuntur nesciunt cupiditate recusandae velit ut.<br><br>Nemo qui voluptatibus ea rerum occaecati modi quaerat. Magni qui sint inventore aspernatur. Mollitia veniam velit illo vitae minima. Rerum qui earum excepturi.', NULL, '2017-10-22 21:10:52', '2017-10-22 21:10:52'),
(2, 6, 'Voluptas quia sit veritatis consequatur laboriosam.', 'Ex aperiam aut aperiam autem dolorem rem tempora. At rerum non asperiores sit rerum. Sapiente consequatur dolor necessitatibus molestiae placeat. Tempora repellat consequuntur velit neque molestiae delectus.<br><br>Enim vero aut sed tenetur aliquid cum qui. Ut suscipit ut quibusdam dignissimos est. Quos vel excepturi deleniti vero dignissimos praesentium ipsum. Id est sint fugit et consequatur ratione aut. Incidunt omnis quia qui quae ea voluptas. Sed cupiditate autem fugiat qui provident. Rerum veritatis recusandae et sunt id maxime fugit et. Eos quia quam corporis inventore quia. Tempora consequatur quisquam sint architecto. Error praesentium illo cumque expedita soluta nulla doloremque consectetur. Fuga non quod nihil nemo. Earum ipsa dolor in ut quos. Voluptatibus pariatur ex est dignissimos est ipsam et. Esse minus nihil ex quo non. Veritatis repellendus suscipit ut nisi. Modi ipsum perferendis qui ipsum voluptatem ab. Rerum dolore exercitationem dolores autem. Facilis quis explicabo accusamus eum aut optio non. Nemo repellendus aliquam itaque consequuntur aut. Officia aut enim qui voluptatibus recusandae quibusdam. Eligendi aut rerum tempore aut. Aut odio voluptatibus qui dolor ullam.<br><br>Unde neque et libero adipisci eos illo omnis necessitatibus. At quibusdam sit facilis repellat aliquam iusto neque. Quasi laudantium fuga iure qui laboriosam cupiditate similique.', NULL, '2017-10-22 21:10:52', '2017-10-22 21:10:52'),
(3, 11, 'Autem tenetur dolore et soluta.', 'Nostrum quae autem minus ut. Aliquam nesciunt voluptatem animi sed totam vero sed.<br><br>Fugit laboriosam rem qui qui quaerat quibusdam. Quae labore assumenda pariatur repudiandae repellendus aliquid quia. Voluptatem maxime rem sit ut. Rerum et repellat architecto laborum fugiat. Sint dolor non mollitia ipsum deleniti excepturi. Consequatur et voluptatem eos. Sint non excepturi maxime aperiam perspiciatis ut. Eveniet animi omnis eos. Unde sed asperiores laudantium animi repellat. Ut aut nulla quis deserunt. Nemo pariatur suscipit et qui. Neque dolor veritatis et aut tempore cum. Fugiat et quam fugiat. Quibusdam optio nulla dolorem pariatur non. Atque tenetur omnis omnis expedita aut tempora perferendis temporibus. Et sapiente necessitatibus error. Magni sit nulla laborum distinctio adipisci. Sapiente porro cumque ut cum illum qui sint. Et ut temporibus odit a autem quam. Modi suscipit et eos. Dolor asperiores qui est eum ut. Fugit consequatur qui est id ducimus.<br><br>Quia et voluptates nostrum omnis quia ut iure. Quod ut eaque praesentium ipsum dolores. Voluptates et quibusdam esse asperiores.', NULL, '2017-10-22 21:10:52', '2017-10-22 21:10:52'),
(4, 17, 'Itaque voluptas voluptas temporibus magni qui.', 'Voluptas ducimus dolore odit porro. Incidunt iste aut voluptate fugiat deserunt. Totam voluptatum quae iste sunt tempora pariatur. Vitae asperiores impedit magnam sint.<br><br>Et et vitae voluptatem qui. Eaque nemo voluptas est at voluptatem quas cumque. Voluptatem architecto voluptates deserunt. Qui sit velit et non. Tenetur doloribus officiis facere dolores. Qui itaque est atque et officiis natus qui facere. Nemo sed eum qui sequi doloribus est officia. Qui cum quam qui. Eum et voluptas aut ratione adipisci voluptates. Repellendus aliquam nihil dolore dicta inventore reiciendis. Blanditiis aut error ut unde molestias quo nemo totam. Qui corporis ut laudantium fugiat excepturi facere non. Aut aperiam laudantium at dolores totam aut fuga deleniti. Impedit id eum veniam iusto rerum adipisci cumque. Aut quae distinctio aut odio recusandae quo qui. Accusantium ut possimus dolores ea assumenda. Cumque in adipisci sit voluptatibus dolorem et ea aperiam. Nobis nostrum aspernatur odit praesentium doloremque et quibusdam.<br><br>Fuga aspernatur iure quo impedit sed tenetur libero. Qui occaecati consequuntur sed deleniti nisi vitae sunt nisi. Ex sunt molestiae a consequatur.', NULL, '2017-10-22 21:10:52', '2017-10-22 21:10:52'),
(5, 17, 'Rerum temporibus et laborum consequuntur aut ad in.', 'Molestias porro et voluptatem nisi alias ratione. Voluptatem ad debitis molestias quis sint sint. Et natus rem et id odit veritatis nobis. Eum ipsam doloremque corrupti hic ea similique necessitatibus.<br><br>Repellendus et consectetur magnam incidunt aut consequatur quasi eveniet. Quibusdam corrupti cumque similique ut iste provident. Et aut omnis eligendi incidunt eos ad eveniet. Ut asperiores quasi ab qui ut enim. Velit sed debitis nisi recusandae consequatur illo optio incidunt. Velit velit neque consequatur earum. Quis iusto corrupti fugiat culpa distinctio aut. Ea molestiae nam laborum et quas voluptatibus. Quos et vero at voluptates blanditiis nihil. Est vitae eveniet dolor. Amet adipisci et quia eum amet ut nulla. Dolores voluptate exercitationem eius et ipsum veniam autem. Adipisci aliquam nihil quae quidem placeat temporibus dolor. Pariatur dolorem voluptatem veritatis sed. Exercitationem dolorum ea aut cupiditate voluptatem. Enim inventore distinctio delectus rerum. Fugit ut ab porro labore doloremque. Saepe culpa suscipit in eos. Ipsam rerum vero quod labore quia. Et laboriosam quo sed.<br><br>Voluptatum eligendi eos voluptas quia voluptatem laudantium ab. Corporis fuga tenetur reprehenderit et. Voluptatem id harum et quia fuga voluptate.', NULL, '2017-10-22 21:10:52', '2017-10-22 21:10:52'),
(6, 10, 'Eos ut eos eos dolores aspernatur ipsam.', 'Autem voluptatem quasi non. Repellat dolorem cupiditate molestiae aut commodi sed. Quia labore rem et dolor ut laboriosam eius consectetur.<br><br>Magnam ut quos fugit nisi sequi. Voluptatem et placeat nostrum. A sed illum repellat libero ab deserunt. Adipisci in labore voluptatem rem architecto est. Eum quis maiores consectetur et excepturi. Quia veritatis deleniti dolores nihil. Eum fuga tempora fuga libero dolor. In autem eos voluptatem et voluptatem non enim. Ea sunt enim sed maiores sint. Explicabo corporis vel molestiae tempora. Laborum et similique nam beatae qui ut adipisci quia. Magni voluptatum quas nihil quia debitis omnis. Officia qui aut excepturi cum. At enim dolore quidem ratione iusto amet blanditiis. Officiis labore quia natus et natus vel eos sunt. Sed architecto ut est itaque optio. Quaerat blanditiis asperiores recusandae voluptas facilis. At nobis eaque dignissimos est tempora. Nulla voluptatibus unde consectetur dolorem laudantium facere. Quia accusamus temporibus aut reprehenderit blanditiis. Consequatur modi distinctio iure voluptas. Enim nam laudantium possimus ipsa consequatur voluptate.<br><br>Vel possimus dignissimos sequi doloremque voluptas quae incidunt. Rem non numquam pariatur est est ipsa voluptatem aliquam. Placeat provident molestias cupiditate aliquam harum et quo.', NULL, '2017-10-22 21:10:52', '2017-10-22 21:10:52'),
(7, 7, 'Non quo temporibus et minus reiciendis ut eum minima.', 'Quia ipsa laudantium unde vero et omnis hic explicabo. Quasi voluptatum aut doloremque vero in laudantium. Tempore consequatur nihil omnis nihil.<br><br>Iure veniam non odio eum. At molestiae est eum asperiores. Praesentium dolorem eos repellat et. Quibusdam accusantium labore eveniet accusamus nemo. Quidem eius explicabo sint mollitia quo voluptates molestiae consequuntur. Nihil nisi atque nostrum ipsum est cupiditate. Voluptatibus ut minus qui aut. Et doloremque nostrum quam officia cum. Et sit rerum dicta numquam commodi sed. Fuga quam explicabo aliquid delectus temporibus qui. Natus quia voluptatem earum similique. Aut consequatur enim rerum ut. Repudiandae vel repellendus tenetur. Asperiores eveniet in porro esse. Vel sint nihil dolorem maiores autem dolor. Ut quibusdam et ut aliquam repudiandae. Quis corrupti at consectetur dolor beatae. Non et dolorem atque sed. Et sint reiciendis ex eum enim nihil. Illum distinctio rerum deleniti id. Pariatur quia minima alias officiis sit eum id sed. Reiciendis iusto rerum ipsam in accusamus nesciunt.<br><br>Quia doloremque ut aut facilis neque. Voluptatem consequuntur maiores dolores asperiores recusandae blanditiis. Laborum quod cupiditate voluptatem eveniet excepturi consequatur earum ut. Blanditiis officiis aut voluptate est excepturi.', NULL, '2017-10-22 21:10:52', '2017-10-22 21:10:52'),
(8, 18, 'Autem qui aspernatur sunt quidem suscipit.', 'Ut alias veniam repellendus dolores suscipit ut debitis. Explicabo atque consequatur itaque iure nulla voluptates autem. Molestias voluptates possimus ut dolor.<br><br>Quod quae incidunt voluptatem quas molestias veritatis iure. Earum et sed consequuntur ex maxime facilis vel soluta. Sint sed voluptatibus corporis eius doloribus. Id porro provident ipsam quia. Dolorem dolorum tempora explicabo autem iusto et. Ut molestiae eos commodi. In quidem ut sint dolor et rerum quibusdam. Magni in esse earum et. Illum expedita officiis ut sunt itaque ut. Fuga enim accusamus et omnis minus nemo et. Cum expedita eos nulla repellat adipisci excepturi. Rerum repellendus dolores hic est nisi itaque et. Vero et blanditiis dolor quis laudantium. Totam expedita recusandae nesciunt aut. Iusto sed non nobis mollitia sit. Dolorem suscipit est dolore consequuntur delectus non voluptatem illum. Vel ut repellendus veniam repellat deleniti. Voluptas quia ducimus illum illo dolorem iure. Veritatis expedita iure quaerat nulla. Nam voluptas doloribus repudiandae unde aliquid vel.<br><br>Expedita sed et atque vero. Delectus tempora explicabo est et possimus. Quia autem quia provident quaerat quia ea perferendis sed. Ipsam sequi voluptas voluptas doloribus voluptates.', NULL, '2017-10-22 21:10:52', '2017-10-22 21:10:52'),
(9, 20, 'Distinctio aperiam fugiat iusto officia.', 'Maiores iure nihil placeat non enim cupiditate sit. Molestiae iusto fugit numquam dolores est voluptas corporis. Laboriosam est nihil placeat dolor. In excepturi accusantium aut rem aut est necessitatibus quasi.<br><br>Vel sint hic non voluptas eos saepe eaque. Ut nisi modi molestias provident nihil quibusdam eveniet. Temporibus illum ipsam minus officia voluptas. Eos doloremque ad non tempora mollitia velit iure. Dolorem quisquam aliquam placeat placeat maiores. Voluptatem rerum quasi veniam odio ut et in. Autem omnis labore dolore maiores. Magni dolor quia quo autem nobis consequatur exercitationem. Ipsam eius dicta nam eos rem aut incidunt. Quam sint nobis deserunt esse aut assumenda. Consequatur sapiente veritatis veniam nobis recusandae perferendis consequatur rerum. Dicta ducimus provident ab ab officia cupiditate. Dolores id voluptatum itaque consequatur facere. Amet nulla enim alias. Consectetur laudantium ex quis. Cum laboriosam in consequatur aspernatur voluptatem ipsum. Aut nemo corrupti aut est odio ut.<br><br>Autem excepturi placeat blanditiis fugiat voluptate. Ad quibusdam sapiente consequuntur quia. Optio debitis voluptatem molestiae veritatis molestias quis tenetur. Cum qui sit quia consequatur id porro perspiciatis.', NULL, '2017-10-22 21:10:52', '2017-10-22 21:10:52'),
(10, 8, 'Consequatur et aut quae rerum dolorem voluptas veniam et.', 'Delectus omnis tenetur enim natus repudiandae error. Omnis vero tempore et autem minima odio. Debitis id sint nihil quia nihil quo. Vitae debitis omnis doloribus qui optio. Delectus hic occaecati eligendi at.<br><br>Cum aut earum modi natus. Voluptatibus quaerat ut voluptate. Excepturi provident iste quia vero saepe dolorem. Laboriosam suscipit quidem voluptatibus voluptatum minus est. Itaque consequatur rem sunt inventore. Ut praesentium rerum molestiae placeat. Aut ipsum sapiente non necessitatibus. Recusandae sit eaque quos numquam est aspernatur dicta. Officiis accusantium quis quidem aut et repellendus. Dolorum ipsam ab iste ut. Molestiae sit voluptas illum dolor beatae impedit accusamus fugit. Ut excepturi doloribus consequatur sit aliquam cumque aut. Maxime alias unde quia quae sed inventore ut. Consectetur et ducimus sint quis. Quod odit voluptatem veritatis atque consequuntur qui possimus. Corporis voluptas ipsam perspiciatis officiis in. Et non nihil reiciendis excepturi. Architecto quisquam iure inventore nostrum. Qui est reprehenderit sed ducimus doloribus dicta. Alias autem veritatis hic corporis vel.<br><br>Quia soluta aut et quisquam unde. Quia incidunt dolorem voluptatem qui quam. Non id consequatur ut consequatur voluptatem at. Qui quia fugiat eius explicabo.', NULL, '2017-10-22 21:10:52', '2017-10-22 21:10:52'),
(11, 18, 'Facilis eum fugiat deleniti necessitatibus tenetur.', 'Quas qui doloremque quo occaecati. Similique aliquam neque est enim quasi ad quam. Quis ut voluptatem saepe.<br><br>Officia ut aut commodi aperiam quisquam. Fugiat sunt doloribus facilis sint. Explicabo est minus labore. Placeat ipsam dignissimos quia eos voluptas qui repellat. Magnam quia provident eum aut ullam maiores maxime. Reiciendis dignissimos enim pariatur molestiae. Non nam neque fuga enim sapiente. Aliquam quo dolore voluptatum repellat eligendi temporibus temporibus. Dolores qui pariatur impedit atque nihil eum. Et dolor id velit eligendi a. Iusto quam est et. Vel et similique et quo. Rem autem et nisi adipisci nemo. Fuga omnis est voluptatem consequuntur distinctio laudantium aliquid. Ab rerum omnis qui vel quaerat perspiciatis voluptatibus voluptas. Ut possimus est inventore asperiores. Et minima aut recusandae minima non explicabo hic. Ut incidunt quia error magnam deleniti soluta dolor. Est dicta nesciunt voluptas. Eius fugit numquam maiores quibusdam ea est. Deleniti ab iste ut. Molestias nemo fugiat est neque ut saepe et. Sed ipsam ipsum dolores et quidem laborum qui.<br><br>In ut architecto aut repudiandae fugiat. Blanditiis consectetur aliquid adipisci ratione eos necessitatibus optio. Et veniam excepturi minus aut dolorem minima quae.', NULL, '2017-10-22 21:10:52', '2017-10-22 21:10:52'),
(12, 17, 'Et sint possimus velit est et quo culpa.', 'Vel possimus praesentium velit. Minima quasi ut deleniti et culpa hic. Ipsam eius quis neque. Qui dignissimos ducimus rerum repellat libero exercitationem autem.<br><br>Culpa dolore autem ut doloremque fuga et. Praesentium ipsam error et dignissimos nemo expedita quae. Autem adipisci qui quo sunt. Rerum maiores dolorem ut sunt ipsa quibusdam atque. Voluptas vel accusamus natus cupiditate dignissimos. Distinctio error quis dolorem voluptate dolorem aut necessitatibus. Est quis distinctio aliquid qui in et. Unde quia iusto consequuntur consequatur suscipit reprehenderit. Quas consequatur sed iusto beatae aut dolores sit. Quidem autem quibusdam dolores esse repudiandae unde accusantium. Optio rem et nesciunt esse atque. Voluptas enim rerum voluptatibus autem perferendis odio nisi blanditiis. Ea molestiae dolorem doloribus ea distinctio sit. Quam repellendus placeat ab neque. Accusantium totam qui est nihil quam quam et. Eos omnis id veniam sed dolores expedita tempora expedita. In et blanditiis sint odio. Reprehenderit eveniet quis rerum. Officia at placeat sequi nulla molestiae omnis esse.<br><br>Eos ea id voluptatum laborum sed. Voluptatem nihil aut possimus minus eos officiis. Repudiandae a ut aut et. Illo voluptatem autem optio totam sit aut blanditiis quia.', NULL, '2017-10-22 21:10:52', '2017-10-22 21:10:52'),
(13, 4, 'Veritatis numquam dolorem dolorem quidem incidunt quo reprehenderit.', 'Voluptatibus voluptatum officia magni expedita ab. Officiis aut non nisi ut. Soluta rerum ex eum et dolorem beatae. Sunt occaecati et molestiae aut nulla.<br><br>Et et voluptatem nisi facilis dolor nihil. Nostrum nostrum repudiandae et quam similique adipisci. Enim in rem voluptas consequatur alias qui soluta. Eligendi perspiciatis fuga asperiores voluptatem. Assumenda cupiditate unde est. Quidem tempora quo voluptatem alias. Distinctio et et autem molestiae mollitia. Dolor atque distinctio et iste. Qui corporis aut et. Mollitia ea ad ut est. Dolor culpa iure expedita enim perferendis. Dolores temporibus voluptatibus fugiat labore quas. Et exercitationem veritatis quo quos nemo odit sunt ex. Aliquid iure veniam perspiciatis qui ut aut. Itaque consequatur hic voluptas nostrum consequatur temporibus natus. Facilis debitis tempore molestias consequuntur. Et iusto magnam ex dignissimos ea. Similique voluptatem rerum ut quidem aut quo. Natus aut omnis est sed optio odio libero. Quos aut id voluptatem.<br><br>Officia odit eum consequuntur et. Labore aspernatur dolor aliquid voluptates. Quo qui error accusantium commodi minus quod.', NULL, '2017-10-22 21:10:52', '2017-10-22 21:10:52'),
(14, 7, 'Adipisci praesentium enim quae iure mollitia libero.', 'Eligendi delectus corporis deserunt voluptate aliquid nesciunt. Ut aut illum quam id veritatis enim. Nesciunt sit reprehenderit voluptas ullam id quo.<br><br>Laudantium perspiciatis et eveniet velit dolore cum. Et quia nihil enim cum quis et. Fugiat eligendi dolorum qui quia ad. Sint nobis adipisci dolores itaque reprehenderit. Laboriosam at dolorum tempore. Hic nesciunt laborum cumque sed. Fugit sed hic id unde est aut atque. Et impedit qui eum nesciunt sed aspernatur consequatur. Magni non nemo illum necessitatibus in impedit corporis. Consectetur ipsam ea omnis. Placeat ipsam dolor molestiae odio. Rem quia qui ut aut aperiam. Hic est sapiente et officiis et magni. Qui natus corporis dolores natus doloremque fugit. Est incidunt dicta velit ipsa culpa. Ut dignissimos id quos porro quos minus. Qui reiciendis placeat autem iste dicta et voluptate enim. Perferendis hic asperiores consequuntur aut dolorum modi nisi molestiae. Dolores ut repellat repellendus molestias ut magnam. Et eveniet facere aut officia molestiae aut. Soluta nihil dolorem ratione molestias placeat ut quia illum.<br><br>Commodi possimus provident necessitatibus officiis officia. Cum ipsa distinctio quia ut consequatur. Nisi possimus earum adipisci vel ad neque nam. Eveniet labore qui perspiciatis saepe eius sunt.', NULL, '2017-10-22 21:10:52', '2017-10-22 21:10:52'),
(15, 19, 'Consequuntur mollitia eos rerum vel.', 'Sed rerum sint nulla nam provident tempora rerum. Ut ratione et dolorum ut voluptas aut. Soluta voluptatem quia asperiores qui sint quod voluptatum.<br><br>Sed dolor aperiam quis non et omnis. Vitae qui suscipit dolor porro culpa in exercitationem. Sequi deleniti aut nobis fugit magni corrupti. Debitis eius suscipit expedita voluptates consectetur nam facilis ut. Suscipit aliquam ab est sapiente qui nobis. Aperiam mollitia ut assumenda tempora et rerum. Est architecto iste eum asperiores saepe. Sed est necessitatibus aut voluptatem rerum iure. Recusandae est ipsum doloribus et reiciendis facere. Eveniet aut facere maxime tempora assumenda ut ut fuga. Magni deserunt aliquam eum provident sed. Et optio laudantium aspernatur sint. Omnis et minima doloribus mollitia. Cumque et inventore illum ipsum architecto quaerat. Sapiente sint ea sint non est nihil. Debitis voluptatum nobis qui minima. At nam est amet et. Et libero voluptatem eius est itaque voluptatem. Id nulla est cum dignissimos.<br><br>Animi rerum est expedita ea consequatur. Tenetur sunt nostrum velit. Similique dolorem inventore quasi suscipit excepturi aliquam.', NULL, '2017-10-22 21:10:52', '2017-10-22 21:10:52'),
(16, 8, 'Quidem nisi et architecto.', 'Velit itaque dignissimos autem. Optio magnam voluptatem est unde aliquid et. Pariatur velit vel impedit illum voluptatem quo. Nihil minima quam nulla doloremque voluptates aut.<br><br>Pariatur labore assumenda quo distinctio. Sint repudiandae autem voluptas rerum quam. A iusto est dignissimos omnis quaerat. Eaque neque amet voluptatibus quae. Delectus alias alias libero doloribus enim minima voluptatem. Minus laborum mollitia rerum dolores iste voluptates iste. Aliquid et cupiditate dolorem sint rem. Et repellendus soluta assumenda nostrum neque. Ut dolor quasi reiciendis iusto enim. Sed omnis aspernatur sequi iure. Voluptas voluptatibus beatae nisi dolor placeat voluptas aperiam. Ratione ex rem nihil reprehenderit architecto quod tempore. Qui adipisci nisi consectetur maxime cumque exercitationem saepe et. Voluptatum omnis vel consequatur est enim. Quia cumque eos delectus sit itaque distinctio. Et perferendis mollitia repellendus. In consequatur eum explicabo provident deserunt qui. Facilis non ullam maiores sit et rerum. Tempore nemo eligendi explicabo vitae aut et. Qui cum est cupiditate aut facere corrupti. Quos possimus explicabo tempora dolore alias.<br><br>Iure aspernatur ipsam sunt culpa iusto dignissimos. Beatae est accusantium aut eius rem eum. Id et est praesentium cum cum quasi numquam. Magni hic exercitationem dolorem libero porro laborum.', NULL, '2017-10-22 21:10:53', '2017-10-22 21:10:53'),
(17, 15, 'Odio earum libero recusandae laborum tempore.', 'Qui aliquid voluptatibus dignissimos corrupti quisquam quos. Sit rerum velit qui natus. Doloremque quo fugit quos dolorum ipsum. Sed nisi dolores saepe.<br><br>Dolores harum qui temporibus hic. Molestias qui fuga est ad consequuntur. Dolorem sint suscipit quo dolores ut laboriosam. Minima maiores et ratione recusandae voluptatem. Reprehenderit occaecati facere et molestias quis delectus. Et temporibus est corrupti porro. Error facilis quia praesentium ea dolorem sed dolorem. Aliquid modi illum repellendus laudantium. Officia cum possimus et occaecati animi in. Autem id corrupti iure exercitationem nihil reiciendis. Nihil amet magni dolorem sequi molestias. Dolorem amet quia voluptatum corporis. Accusamus quas at quia in. Quis vitae ratione fugit sit. Quisquam rerum sit soluta culpa quod ipsam. Nihil debitis ad sequi quas aut. Impedit ducimus dolores aliquid quod nostrum adipisci. Tempora nesciunt iure possimus ut asperiores. Qui non qui officiis dolor. Cupiditate reprehenderit et porro ea voluptas nam.<br><br>Ratione voluptatem rerum quas voluptates qui qui et. Veniam corrupti nobis consequatur aut id minima. Minus magni soluta laudantium enim.', NULL, '2017-10-22 21:10:53', '2017-10-22 21:10:53'),
(18, 10, 'A cupiditate omnis praesentium itaque fugit praesentium repellat quia.', 'Animi sunt corporis blanditiis voluptates. Esse distinctio voluptatem quia eum. Optio omnis aperiam libero temporibus. Eum ea velit illo et nihil voluptas.<br><br>Maiores sunt aliquid harum. Soluta facilis quasi itaque dolorem. Ut voluptatem et asperiores sint vel. Aut qui doloremque itaque sit sed nulla cum quia. Libero excepturi modi aut impedit repellendus. Et reiciendis eaque delectus qui velit amet. Sed et alias ab illum porro. Soluta hic numquam sequi voluptas. Itaque laborum magni et velit iste. Est commodi corporis sapiente consequatur. Est aut unde magni sit quibusdam. Ipsum suscipit temporibus eligendi. Ipsam odit vel ipsum. Magnam sint sint expedita. Earum aut neque neque error error sed. Quam et inventore est delectus delectus voluptatum voluptatem et. Sint distinctio laborum qui sunt fugit voluptas rerum omnis. Iste deserunt quas maiores fuga dolorum odit. Omnis laudantium quasi aut. Vitae repellat qui mollitia dolore omnis incidunt ut. Quis cupiditate dolor rerum earum maxime. Natus vel corrupti enim et fugiat. Tempore totam voluptate et. Error qui modi consequatur.<br><br>Dignissimos consequuntur ullam aperiam dolorem et facere porro asperiores. Maxime laboriosam non ipsa quo modi accusamus qui perspiciatis. Fugit et ipsa quam expedita distinctio. Et eos aliquam exercitationem quia qui.', NULL, '2017-10-22 21:10:53', '2017-10-22 21:10:53'),
(19, 14, 'Error ipsam consequatur ipsam autem ratione dicta vitae.', 'Facilis nulla harum fuga commodi nobis debitis ipsum soluta. Et blanditiis ipsum laborum ab numquam porro nemo. Quo tenetur quia totam ratione facilis. Ipsa consequatur dolorem et cum.<br><br>Deserunt nisi quisquam deserunt cum est molestiae. Facilis earum sunt mollitia aperiam. Occaecati minima non consequuntur alias dicta magnam culpa. Totam culpa soluta vel ratione. Animi magni culpa distinctio. Fuga voluptate ex excepturi dolore iure voluptates dolor. Ullam tempore non voluptates autem fugit ex consectetur ex. Ex eligendi aspernatur qui aspernatur fuga debitis. Voluptas ratione cumque eligendi enim et. Voluptatem officia ex quos sit dolores. Veniam blanditiis atque rerum. Sit facere blanditiis consequatur sunt. Quis numquam voluptatibus animi sequi veritatis. Natus nisi sunt occaecati rerum quasi. Debitis vel est quae est quis assumenda. Deserunt rerum est autem molestiae. Dolorum velit quidem odio. Facilis aut qui error vel odit quo. Veritatis ut voluptas doloremque et eum eos modi. Dolor eum sed ipsam adipisci porro optio. Necessitatibus totam quia tempore ut voluptatem. Voluptatem ut dignissimos et in rerum ratione voluptatem ipsum. Fugit ut maiores aut nam qui.<br><br>Nostrum consequatur excepturi maxime et non ex facere. Blanditiis quasi eum magnam ab expedita est. Illum facere inventore ut tempore a libero non.', NULL, '2017-10-22 21:10:53', '2017-10-22 21:10:53'),
(20, 15, 'Error dolore eveniet alias voluptas eos ea.', 'Fuga aspernatur aspernatur qui ducimus at ex quo. Harum quibusdam cumque hic ipsa quis vel. Sit qui qui commodi quia. Sed culpa id minus eos sunt et.<br><br>Ea quo nihil consequatur illum repellendus. Aspernatur iure aut mollitia eligendi voluptas dolores modi quod. Odio possimus ipsa ipsa accusamus et rerum totam. Vero non quibusdam rerum perspiciatis corporis facere excepturi. Veniam aut aspernatur quasi nesciunt. Dolores et quo et molestias non autem magnam. Quos qui quidem aut neque rerum. Blanditiis inventore ea nihil explicabo ea totam. Ex doloremque iure esse consequatur. Facere quo quos ipsum aliquam qui ab ut ducimus. Animi labore ea harum dicta dicta. Voluptatibus dolor atque nostrum ut ducimus vel. Est consequuntur quisquam voluptas. Possimus ratione sit non error illum nemo. Non asperiores nobis eius quam voluptas consequatur. Commodi velit tenetur quas et. Alias veritatis reiciendis sit est quae sed. Esse est dolor dolor. Deleniti et qui dolorem et. Delectus et in soluta quia cumque placeat et.<br><br>Unde quia illum nobis earum repellat provident dignissimos. Voluptas soluta placeat sequi natus nihil. Quae eius qui veritatis nisi minus magnam.', NULL, '2017-10-22 21:10:53', '2017-10-22 21:10:53'),
(22, 22, 'CAPSTONE PROJECT 95% DONE!', '<p>Phasellus in ipsum et mauris interdum posuere. Proin euismod scelerisque nisi in euismod. Suspendisse eu sapien consequat, ultricies nulla a, aliquet eros. Proin quis sodales urna, nec consectetur dolor. Integer tempor metus tempus, blandit ipsum id, placerat dolor. Donec cursus gravida augue quis vehicula. Ut libero turpis, bibendum sed lacus quis, laoreet dictum mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam euismod placerat dui, vel pellentesque neque molestie nec. Donec ut nisi fringilla ipsum aliquam rutrum. Nullam lectus metus, pellentesque sit amet fringilla in, vulputate quis est. Mauris eget vestibulum nisi.</p>\r\n\r\n<p>In hac habitasse platea dictumst. Integer sagittis lorem et elit accumsan, id cursus ante ornare. Phasellus elementum, neque viverra convallis finibus, ex libero gravida neque, sed ultricies nisl tortor vel velit. Nam ultrices est ac libero tincidunt, quis consequat tellus malesuada. Mauris et congue velit. Duis pharetra orci laoreet lectus maximus bibendum. Nullam eget pretium tellus.</p>', NULL, '2017-10-22 21:33:34', '2017-10-22 21:33:34');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ship`
--

CREATE TABLE `ship` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(10) UNSIGNED NOT NULL,
  `sender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `sender`, `recipient`, `body`, `code`, `created_at`, `updated_at`) VALUES
(1, 'SOSnetwork App', 'All', 'This is a test message for Everyone!', '100', NULL, NULL),
(2, 'SOSnetwork App', 'Admins', 'This is a test message for Admins!', '200', NULL, NULL),
(3, 'SOSnetwork App', 'Users', 'This is a test message for Users!', '300', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stats`
--

CREATE TABLE `stats` (
  `id` int(10) UNSIGNED NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visitor` int(11) NOT NULL,
  `m_log` int(11) NOT NULL,
  `a_log` int(11) NOT NULL,
  `apply` int(11) NOT NULL,
  `approve` int(11) NOT NULL,
  `download` int(11) NOT NULL,
  `sms` int(11) NOT NULL,
  `uptime` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stats`
--

INSERT INTO `stats` (`id`, `month`, `visitor`, `m_log`, `a_log`, `apply`, `approve`, `download`, `sms`, `uptime`, `created_at`, `updated_at`) VALUES
(1, 'January', 10, 5, 25, 15, 20, 10, 5, 10, NULL, NULL),
(2, 'February', 35, 20, 25, 15, 20, 10, 5, 20, NULL, NULL),
(3, 'March', 23, 15, 25, 15, 20, 10, 5, 25, NULL, NULL),
(4, 'April', 58, 45, 25, 15, 20, 10, 5, 80, NULL, NULL),
(5, 'May', 65, 39, 25, 15, 20, 10, 5, 67, NULL, NULL),
(6, 'June', 77, 65, 25, 15, 20, 10, 5, 34, NULL, NULL),
(7, 'July', 43, 23, 25, 15, 20, 10, 5, 54, NULL, NULL),
(8, 'August', 56, 38, 25, 15, 20, 10, 5, 22, NULL, NULL),
(9, 'September', 90, 60, 25, 15, 20, 10, 5, 20, NULL, NULL),
(10, 'October', 83, 51, 26, 17, 22, 10, 5, 61, NULL, '2017-10-23 05:02:44'),
(11, 'November', 67, 54, 25, 15, 20, 10, 5, 93, NULL, NULL),
(12, 'December', 74, 66, 25, 15, 20, 10, 5, 77, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trackers`
--

CREATE TABLE `trackers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` bigint(20) NOT NULL,
  `institution` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone_number`, `institution`, `city`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Terrance Hoeger', 'hstehr@example.net', '$2y$10$Owb7iJcCS60fjqXu52wJv.8Lum3FJRiz5E0TS7XA/98XRLiTgBTzy', 7055248721435, 'Kunze-Nicolas', 'Adelastad', 'kZZ93bRi68', '2017-10-22 21:02:03', '2017-10-22 21:02:03'),
(6, 'Laurel Kub', 'adan20@example.org', '$2y$10$Owb7iJcCS60fjqXu52wJv.8Lum3FJRiz5E0TS7XA/98XRLiTgBTzy', 5038593436160, 'Turner-Tremblay', 'East Nils', 'XaosZ9fWJC', '2017-10-22 21:02:03', '2017-10-22 21:02:03'),
(7, 'Rey Kohler Sr.', 'kenyatta.robel@example.com', '$2y$10$Owb7iJcCS60fjqXu52wJv.8Lum3FJRiz5E0TS7XA/98XRLiTgBTzy', 2182933998041, 'Rogahn-Abshire', 'Brayanton', 'HcJIpT4Hid', '2017-10-22 21:02:03', '2017-10-22 21:02:03'),
(8, 'Dr. Ubaldo Bailey', 'dixie14@example.com', '$2y$10$Owb7iJcCS60fjqXu52wJv.8Lum3FJRiz5E0TS7XA/98XRLiTgBTzy', 3049112212340, 'DuBuque, King and Zulauf', 'Ariland', '8jMNakptNB', '2017-10-22 21:02:03', '2017-10-22 21:02:03'),
(9, 'Vivian Strosin Jr.', 'emorar@example.net', '$2y$10$Owb7iJcCS60fjqXu52wJv.8Lum3FJRiz5E0TS7XA/98XRLiTgBTzy', 8736986602797, 'Marvin Ltd', 'North Kyleigh', 's6V5yI8pCo', '2017-10-22 21:02:03', '2017-10-22 21:02:03'),
(10, 'Damon Cruickshank', 'jana.ortiz@example.org', '$2y$10$Owb7iJcCS60fjqXu52wJv.8Lum3FJRiz5E0TS7XA/98XRLiTgBTzy', 7846065504595, 'Koch, Mertz and Lubowitz', 'North Kianna', 'd1DKOCODeT', '2017-10-22 21:02:03', '2017-10-22 21:02:03'),
(11, 'Tessie Donnelly V', 'lebsack.narciso@example.org', '$2y$10$Owb7iJcCS60fjqXu52wJv.8Lum3FJRiz5E0TS7XA/98XRLiTgBTzy', 5325978903118, 'Hirthe, Gleichner and Aufderhar', 'Champlinville', 'YVixUmBCoU', '2017-10-22 21:02:03', '2017-10-22 21:02:03'),
(12, 'Muriel Botsford', 'leora.smitham@example.com', '$2y$10$Owb7iJcCS60fjqXu52wJv.8Lum3FJRiz5E0TS7XA/98XRLiTgBTzy', 6538522531499, 'Robel-Weimann', 'Creminside', 'bNRpArYSUe', '2017-10-22 21:02:03', '2017-10-22 21:02:03'),
(13, 'Mr. Markus Purdy IV', 'florence97@example.net', '$2y$10$Owb7iJcCS60fjqXu52wJv.8Lum3FJRiz5E0TS7XA/98XRLiTgBTzy', 9762155239443, 'Oberbrunner, Mayer and Schumm', 'New Ashlee', '9V3PNn0O9k', '2017-10-22 21:02:03', '2017-10-22 21:02:03'),
(14, 'Stephania Kshlerin', 'silas.tillman@example.com', '$2y$10$Owb7iJcCS60fjqXu52wJv.8Lum3FJRiz5E0TS7XA/98XRLiTgBTzy', 5017919184499, 'Beatty, Balistreri and Kohler', 'Aishaville', 'U8rFjxBUNS', '2017-10-22 21:02:03', '2017-10-22 21:02:03'),
(15, 'Ada Block', 'rwillms@example.org', '$2y$10$Owb7iJcCS60fjqXu52wJv.8Lum3FJRiz5E0TS7XA/98XRLiTgBTzy', 3546601074487, 'Collins, Deckow and Swift', 'Eichmannside', 'TRdFyGXaI5', '2017-10-22 21:02:03', '2017-10-22 21:02:03'),
(16, 'Mittie Kautzer', 'emelie61@example.com', '$2y$10$Owb7iJcCS60fjqXu52wJv.8Lum3FJRiz5E0TS7XA/98XRLiTgBTzy', 7896319193524, 'Stiedemann Group', 'North Ted', 'sW0veumdgH', '2017-10-22 21:02:03', '2017-10-22 21:02:03'),
(17, 'Amalia Nicolas', 'tflatley@example.org', '$2y$10$Owb7iJcCS60fjqXu52wJv.8Lum3FJRiz5E0TS7XA/98XRLiTgBTzy', 9913632320935, 'Nitzsche PLC', 'Assuntachester', 'K6gwtqpm5k', '2017-10-22 21:02:04', '2017-10-22 21:02:04'),
(18, 'Shanie Toy', 'austen70@example.net', '$2y$10$Owb7iJcCS60fjqXu52wJv.8Lum3FJRiz5E0TS7XA/98XRLiTgBTzy', 2796097602717, 'Connelly-Bartoletti', 'Vernland', 'wVIcUAGilb', '2017-10-22 21:02:04', '2017-10-22 21:02:04'),
(19, 'Andres Howell', 'constance.monahan@example.org', '$2y$10$Owb7iJcCS60fjqXu52wJv.8Lum3FJRiz5E0TS7XA/98XRLiTgBTzy', 3131538924207, 'Adams-Stanton', 'East Hipolito', 'f83BlOyqWz', '2017-10-22 21:02:04', '2017-10-22 21:02:04'),
(20, 'Brooke Robel', 'rahul83@example.com', '$2y$10$Owb7iJcCS60fjqXu52wJv.8Lum3FJRiz5E0TS7XA/98XRLiTgBTzy', 7350988620424, 'Heathcote LLC', 'East Jefferey', '8kNsjvboN5', '2017-10-22 21:02:04', '2017-10-22 21:02:04'),
(21, 'Sanz Moses', 'sanz@example.com', '$2y$10$MeyuXuCYRtJyaL8Awt26geWOo.vn2pK5yTJ15WrvghHQEXDIVmdhq', 639074239571, 'SJPIICD', 'Davao', 'ClBeXpuAeE5KWDvBZOan1Rj7jGa0wt2Lf2GXLDiDS9UZI4KVWBFLsth1Jtt3', '2017-10-22 21:23:16', '2017-10-22 21:23:16'),
(22, 'Aljon Omandac', 'aljon@example.com', '$2y$10$Sewr98b3DlKBZ0aNjGwy0.RtqoKPujefKb6sHvSUCe6n9UhXi2TA6', 639074239571, 'SJPIICD', 'Davao', 'naxROg292cqhF3v9oCl9spkRe38YjbHene4hP9O9vlCpsQx5J7ZpeVATX7Nz', '2017-10-22 21:30:23', '2017-10-22 21:32:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `folders_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pending_posts`
--
ALTER TABLE `pending_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_users`
--
ALTER TABLE `pending_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pending_users_email_unique` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`post_id`,`tag_id`);

--
-- Indexes for table `ship`
--
ALTER TABLE `ship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

--
-- Indexes for table `trackers`
--
ALTER TABLE `trackers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pending_posts`
--
ALTER TABLE `pending_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `pending_users`
--
ALTER TABLE `pending_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `ship`
--
ALTER TABLE `ship`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `stats`
--
ALTER TABLE `stats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trackers`
--
ALTER TABLE `trackers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
