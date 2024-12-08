-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 08, 2024 lúc 02:54 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `univer`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `descrip` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `descrip`, `created_at`, `updated_at`) VALUES
(1, 'All', 'All Games', NULL, NULL),
(2, 'Adventure', 'Explore vast worlds and uncover hidden secrets in immersive environments.', NULL, NULL),
(3, 'RPG', 'Role-playing games with character progression and rich storylines.', NULL, NULL),
(4, 'Strategy', 'Plan and outwit opponents with careful decision-making and tactics.', NULL, NULL),
(5, 'Fighting', 'One-on-one combat games where players use unique moves and combos.', NULL, NULL),
(6, 'Shooter', 'Engage in combat using firearms and other ranged weapons.', NULL, NULL),
(7, 'Sports', 'Simulate real-world sports with competitive gameplay.', NULL, NULL),
(8, 'Racing', 'Race against opponents in fast-paced driving challenges.', NULL, NULL),
(9, 'Puzzle', 'Solve intricate puzzles and challenges to progress through levels.', NULL, NULL),
(10, 'Horror', 'Games designed to scare, featuring eerie atmospheres and survival elements.', NULL, NULL),
(11, 'Simulation', 'Simulate real-world scenarios and manage virtual environments.', NULL, NULL),
(12, 'Platformer', 'Jump and run through levels with various obstacles and challenges.', NULL, NULL),
(13, 'Fighting RPG', 'Role-playing games with combat mechanics similar to traditional fighting games.', NULL, NULL),
(14, 'Battle Royale', 'Survive against multiple players in a fight to be the last one standing.', NULL, NULL),
(15, 'Multiplayer', 'Games that focus on online or local multiplayer gameplay.', NULL, NULL),
(16, 'Stealth', 'Complete objectives without being detected by enemies or obstacles.', NULL, NULL),
(17, 'Fantasy', 'Immerse yourself in magical worlds filled with mythical creatures and powerful magic.', NULL, NULL),
(18, 'Sci-Fi', 'Explore futuristic and alien worlds with advanced technology and space exploration.', NULL, NULL),
(19, 'Simulation Strategy', 'Simulate real-world scenarios with strategic planning and management.', NULL, NULL),
(20, 'Action', 'High-paced gameplay with intense combat and quick ...\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `controls`
--

CREATE TABLE `controls` (
  `control_id` int(10) UNSIGNED NOT NULL,
  `game_id` int(10) UNSIGNED NOT NULL,
  `control_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `controls`
--

INSERT INTO `controls` (`control_id`, `game_id`, `control_type_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, NULL),
(2, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `control__types`
--

CREATE TABLE `control__types` (
  `control_type_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `descrip` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `control__types`
--

INSERT INTO `control__types` (`control_type_id`, `name`, `descrip`, `created_at`, `updated_at`) VALUES
(1, 'Game Controller', 'Use the left joystick to move and the buttons to jump or shoot.', NULL, NULL),
(2, 'Keyboard', 'Use WASD to move around and some game use spacebar to jump.', NULL, NULL),
(3, 'Mouse', 'Use the mouse to aim and click to shoot.', NULL, NULL),
(4, 'Joystick', 'Move the joystick to navigate.', NULL, NULL),
(5, 'Touchscreen', 'Tap the screen and swipe to play.', NULL, NULL),
(6, 'VR Controller', 'Point and click to interact with objects in a virtual world.', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `games`
--

CREATE TABLE `games` (
  `game_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `imagePath` varchar(255) NOT NULL,
  `gamePath` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `total_plays` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `total_likes` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `total_dislikes` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `rating` double(2,1) NOT NULL DEFAULT 0.0,
  `descrip` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `games`
--

INSERT INTO `games` (`game_id`, `name`, `imagePath`, `gamePath`, `category_id`, `total_plays`, `total_likes`, `total_dislikes`, `rating`, `descrip`, `created_at`, `updated_at`) VALUES
(1, 'Heroes Fight', '1.jpg', 'Webgame_game01/index.html', 5, 4, 0, 0, 0.0, 'Heroes Fight is a 2-player anime fighting game where players battle using unique characters with special moves and attacks. Enjoy fast-paced combat and vibrant visuals in thrilling one-on-one showdowns!', '2024-11-30 23:23:36', '2024-12-07 18:51:51'),
(2, 'Miss Daisy Hansen II', 'download (14).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBCF3.tmp', 2, 0, 0, 0, 0.0, 'Ea tempora exercitationem rem qui qui. Autem neque voluptatibus molestiae perferendis tempora sit. Vitae et et repudiandae et. Hic ad et ab doloribus voluptatum ullam. Impedit est asperiores natus reprehenderit.', '2024-11-30 23:23:36', '2024-11-30 23:27:49'),
(3, 'Thurman Schulist', 'download (13).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBCF5.tmp', NULL, 0, 0, 0, 0.0, 'At dolores vero quis nobis. Et nobis eum sit. Voluptatem labore molestias voluptas itaque. Sint repellendus at quisquam quam.', '2024-11-30 23:23:36', '2024-11-30 23:27:49'),
(4, 'Dr. Jaylin Bayer Jr.', 'download (12).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBCF7.tmp', NULL, 0, 0, 0, 0.0, 'Numquam ducimus non eum. Quae est illo aliquam est repellendus provident adipisci. Eveniet quam quis delectus molestias sit. Labore eius error nemo occaecati eveniet.', '2024-11-30 23:23:36', '2024-11-30 23:27:49'),
(5, 'Miss Gisselle Gottlieb I', 'download (6).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBCF9.tmp', 2, 0, 0, 0, 0.0, 'Nesciunt ab sint non voluptatum id voluptatem ut deleniti. Fugiat ipsum dicta impedit eum. Occaecati corrupti corrupti nihil commodi ut nisi.', '2024-11-30 23:23:36', '2024-11-30 23:27:42'),
(6, 'Maurice Borer', 'download (5).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBCFB.tmp', NULL, 0, 0, 0, 0.0, 'Et occaecati alias ex consequatur veritatis sit corrupti. Ut eum esse repellendus perferendis. Quia porro soluta at quam provident aspernatur sint. Nulla vel reiciendis et voluptatibus veritatis voluptas blanditiis at.', '2024-11-30 23:23:36', '2024-11-30 23:27:42'),
(7, 'Daija Kunze', 'download (4).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBCFD.tmp', NULL, 0, 0, 0, 0.0, 'Incidunt quas sint rerum accusamus dicta. Placeat id et dolor autem quisquam. Enim voluptas officia qui est quaerat. Expedita nihil ex et molestiae porro non.', '2024-11-30 23:23:36', '2024-11-30 23:27:42'),
(8, 'Orville Ullrich IV', 'download (3).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBCFF.tmp', NULL, 0, 0, 0, 0.0, 'Sed omnis provident et ut dicta voluptatem omnis. Veniam non omnis necessitatibus nesciunt provident cupiditate et. Autem est quibusdam est quasi qui. Illo maxime assumenda illo maxime.', '2024-11-30 23:23:36', '2024-11-30 23:27:42'),
(9, 'Arturo Murray', 'download (2).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD01.tmp', NULL, 0, 0, 0, 0.0, 'Vel odio aperiam eius nostrum nihil quia. Sunt qui tenetur qui odio sit. Nisi inventore ullam labore et.', '2024-11-30 23:23:36', '2024-11-30 23:27:42'),
(10, 'Marcelina Flatley', 'download (1).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD03.tmp', 6, 0, 0, 0, 0.0, 'Error repudiandae est quam voluptas. Omnis et expedita beatae rerum modi earum est est. Cupiditate quo natus rem illo pariatur. Excepturi odit voluptatem fugit et non maxime accusantium.', '2024-11-30 23:23:36', '2024-11-30 23:27:42'),
(11, 'Sabina Hintz', 'download (0).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD05.tmp', NULL, 0, 0, 0, 0.0, 'Distinctio et ducimus necessitatibus ipsum facilis. Molestias nobis voluptatem sed a earum omnis quae. Velit est aut rerum exercitationem veniam eligendi.', '2024-11-30 23:23:36', '2024-11-30 23:27:42'),
(12, 'Dean Kub', 'download (23).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD07.tmp', NULL, 0, 0, 0, 0.0, 'Dolorum rem assumenda mollitia dolorem in. Dolorem molestiae aperiam at earum. Doloremque enim porro quis id officiis. Voluptatem officiis saepe iusto sint tenetur eligendi est.', '2024-11-30 23:23:36', '2024-11-30 23:27:42'),
(13, 'Timmothy Abbott', 'download (22).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD09.tmp', NULL, 0, 0, 0, 0.0, 'Temporibus quia tempora explicabo distinctio quis. Enim voluptatem voluptatem et debitis et sed. Facere reiciendis nostrum eius. Nemo quis adipisci veniam.', '2024-11-30 23:23:36', '2024-11-30 23:27:42'),
(14, 'Shaniya Krajcik', 'download (21).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD0B.tmp', NULL, 0, 0, 0, 0.0, 'Voluptas fugit sit est rerum ab aut ut. Architecto quam sit quisquam totam nesciunt excepturi ex nemo. Voluptas quo consequatur qui numquam. Excepturi non fugiat minima nulla.', '2024-11-30 23:23:36', '2024-11-30 23:27:42'),
(15, 'Prof. Hardy Bauch', 'download (20).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD0D.tmp', NULL, 0, 0, 0, 0.0, 'Et eligendi ad saepe ipsam. Consectetur dicta dolore laudantium excepturi itaque. Consequuntur qui saepe sapiente cumque quis sit quos. Et atque fugiat iste vel sed est.', '2024-11-30 23:23:36', '2024-11-30 23:27:42'),
(16, 'Jonathan Hoppe', 'download (19).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD0F.tmp', NULL, 0, 0, 0, 0.0, 'Et tempora occaecati dolore. Ea porro ab quis quod sed autem et. Qui dolores recusandae dicta totam. Sequi et officia nemo omnis cumque.', '2024-11-30 23:23:36', '2024-11-30 23:27:42'),
(17, 'Prof. Erin Price', 'download (18).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD11.tmp', NULL, 0, 0, 0, 0.0, 'Incidunt voluptas consectetur sint et amet perferendis quia aspernatur. Quia adipisci iure velit magni architecto cupiditate. Porro id veritatis quidem provident facilis magnam vitae tempora.', '2024-11-30 23:23:36', '2024-11-30 23:27:42'),
(18, 'Elbert Kunde IV', 'download (17).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD13.tmp', NULL, 0, 0, 0, 0.0, 'Rerum ut ad ut quia. Et nostrum in dolor nisi quis autem quo autem. Atque aut cumque repudiandae est.', '2024-11-30 23:23:36', '2024-11-30 23:27:42'),
(19, 'Ivory Greenfelder', 'download (16).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD15.tmp', NULL, 0, 0, 0, 0.0, 'Inventore rerum rerum sit veniam nemo necessitatibus itaque veritatis. Dolor hic tempora ullam rerum porro in aperiam. Inventore officia est perferendis quae sit iste sunt.', '2024-11-30 23:23:36', '2024-11-30 23:27:42'),
(20, 'Alberto Bergnaum', 'download (15).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD17.tmp', NULL, 0, 0, 0, 0.0, 'Id laborum et porro id tempore commodi voluptatem. Ad ea vero laudantium voluptatem. Maiores maxime et corrupti quaerat quia.', '2024-11-30 23:23:36', '2024-11-30 23:27:42'),
(21, 'Ruthie Turcotte', 'download (14).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD19.tmp', NULL, 0, 0, 0, 0.0, 'Voluptas harum soluta soluta dignissimos quam vel culpa. Fugiat unde quisquam explicabo mollitia mollitia et voluptates. Veritatis facere expedita sint consequatur. Ab amet esse dolore ea enim rerum illo.', '2024-11-30 23:23:36', '2024-11-30 23:27:41'),
(22, 'Alia Daniel', 'download (13).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD1B.tmp', NULL, 0, 0, 0, 0.0, 'Minima possimus facere doloremque minus. Magni est dolores vel quia eligendi. Saepe perspiciatis harum nihil.', '2024-11-30 23:23:36', '2024-11-30 23:27:41'),
(23, 'Tara Heller DVM', 'download (12).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD1D.tmp', NULL, 0, 0, 0, 0.0, 'Debitis doloribus quaerat aut expedita ea sed. At labore nihil in minima alias iste. Est minus odit magnam qui assumenda. Soluta perferendis nihil quisquam aut quaerat et assumenda.', '2024-11-30 23:23:36', '2024-11-30 23:27:41'),
(24, 'Miss Margarett Nolan IV', 'download (11).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD1F.tmp', NULL, 0, 0, 0, 0.0, 'Eum alias dicta et aliquam accusamus voluptas. Recusandae aspernatur distinctio qui impedit ut magnam error. Vel tenetur officia consectetur numquam est eaque. Dolores delectus delectus perspiciatis.', '2024-11-30 23:23:36', '2024-11-30 23:27:41'),
(25, 'Mr. Elmo Kiehn', 'download (10).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD21.tmp', NULL, 0, 0, 0, 0.0, 'Ut aspernatur quia neque debitis perspiciatis asperiores. Est consequatur qui rerum sequi et perferendis qui. Alias libero quos labore aut neque.', '2024-11-30 23:23:36', '2024-11-30 23:27:41'),
(26, 'Roxanne Fahey', 'download (9).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD23.tmp', NULL, 0, 0, 0, 0.0, 'Veritatis facilis molestias est id perferendis quia omnis. Ipsam tenetur dolorem aut eum maxime molestias reiciendis sequi. Similique quis expedita non dicta.', '2024-11-30 23:23:36', '2024-11-30 23:27:41'),
(27, 'Arnoldo Raynor', 'download (8).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD25.tmp', NULL, 0, 0, 0, 0.0, 'Cumque ipsam architecto quia et. Saepe et eos ipsam eius. Esse doloremque sunt cupiditate fugit voluptate iusto consequatur.', '2024-11-30 23:23:36', '2024-11-30 23:27:41'),
(28, 'Estevan Schinner', 'download (7).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD27.tmp', NULL, 0, 0, 0, 0.0, 'Laborum iure esse saepe vitae qui. Quasi numquam est amet nemo voluptatibus natus.', '2024-11-30 23:23:36', '2024-11-30 23:27:41'),
(29, 'Ms. Orie Pagac PhD', 'download (24).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD39.tmp', NULL, 0, 0, 0, 0.0, 'Aut omnis libero vel aperiam. Sit inventore quibusdam voluptas et provident commodi voluptatum. Voluptatem neque libero totam doloribus laudantium. Dignissimos vitae natus ea perspiciatis sit ipsam.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(30, 'Dr. Raven Volkman', 'download (23).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD3B.tmp', NULL, 0, 0, 0, 0.0, 'Odio vero quos eum. In laudantium cum nihil enim ut et placeat. Aut alias et veritatis sit tempore deserunt sit fugiat. Perspiciatis explicabo facilis voluptatem pariatur ut officiis deleniti.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(31, 'Edwardo Davis', 'download (22).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD3D.tmp', NULL, 0, 0, 0, 0.0, 'Minima ipsam nostrum delectus quod provident aperiam ut. Distinctio ut veniam animi tenetur non. Ipsa aliquid necessitatibus molestiae aut aperiam.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(32, 'Estevan Bode', 'download (21).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD3F.tmp', NULL, 0, 0, 0, 0.0, 'Molestias eveniet natus alias ex aut quas accusamus. Aut doloribus eum fugit asperiores earum eaque odio.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(33, 'Ms. Teagan Smitham', 'download (20).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD41.tmp', NULL, 0, 0, 0, 0.0, 'Iste optio sint porro explicabo. Laborum voluptatum autem tenetur aliquam. In placeat odit eligendi beatae. Repellendus illum aut saepe earum.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(34, 'Henry Nader', 'download (19).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD43.tmp', NULL, 0, 0, 0, 0.0, 'Quia repellendus in veniam quidem quas id. Quidem voluptatem ea velit rerum est repellendus. Quia error soluta porro quidem omnis dolores.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(35, 'Mr. Elbert Abernathy', 'download (18).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD45.tmp', NULL, 0, 0, 0, 0.0, 'Delectus harum expedita et molestias est quo. Hic consectetur ut asperiores nisi porro ut sed. Ut dolores modi odio porro quis illum.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(36, 'Elliott Mann', 'download (17).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD47.tmp', NULL, 0, 0, 0, 0.0, 'Occaecati sunt incidunt et hic. Sunt distinctio amet dolores earum velit rerum. Rerum cumque optio et consequatur quas quam.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(37, 'Skylar Bednar DDS', 'download (16).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD49.tmp', NULL, 0, 0, 0, 0.0, 'Voluptatem quis earum aut et voluptates fuga. Et suscipit necessitatibus alias at aut modi. Sunt ut voluptas dolorem voluptate rem velit. Aliquid voluptates provident et accusantium ex et.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(38, 'Billy Carroll', 'download (15).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD4B.tmp', NULL, 0, 0, 0, 0.0, 'Dolore id molestiae laboriosam nulla sit dolores expedita. Vel consectetur quidem labore labore. Autem sed ut vitae nihil. Culpa sunt doloremque ut iusto assumenda.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(39, 'Helmer Roob', 'download (14).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD4D.tmp', NULL, 0, 0, 0, 0.0, 'Qui porro nobis accusantium reiciendis sed. Illum totam nulla omnis itaque asperiores illo eligendi repellendus. Cupiditate doloribus iusto excepturi qui aut dolorem. Suscipit impedit et voluptatem minima autem perferendis nemo.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(40, 'Jana Barton', 'download (13).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD4F.tmp', NULL, 0, 0, 0, 0.0, 'Nemo autem sit consequatur repellendus odit. Omnis adipisci officiis vitae aut ut. Enim eum sint est nulla cum voluptas accusantium.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(41, 'Hazel Reynolds', 'download (12).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD51.tmp', NULL, 0, 0, 0, 0.0, 'Sit soluta et numquam fugit distinctio dolores ducimus. Quisquam et tempore sint qui nihil. Possimus harum tenetur molestias omnis inventore. Sunt quibusdam enim et.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(42, 'Alfonzo Gibson', 'download (11).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD53.tmp', NULL, 0, 0, 0, 0.0, 'Nemo debitis fugiat libero nihil nobis animi. Ut veniam consequatur non vel tenetur itaque. Asperiores adipisci odio eius iste officiis. Mollitia unde vero fugit voluptatum eaque at vero.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(43, 'Gregorio Waters', 'download (10).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD55.tmp', NULL, 0, 0, 0, 0.0, 'Iusto enim est ullam eum sed in. Aspernatur ipsum consequatur a ad deleniti earum incidunt ea.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(44, 'Stan Kirlin', 'download (9).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD57.tmp', NULL, 0, 0, 0, 0.0, 'Voluptatibus deleniti consequatur voluptatem consequatur vel. Enim occaecati vel facere occaecati.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(45, 'Prof. Kayleigh Weber MD', 'download (8).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD59.tmp', NULL, 0, 0, 0, 0.0, 'Amet reprehenderit necessitatibus quo. Et soluta nemo nam amet in eum qui.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(46, 'Graham Kohler', 'download (7).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD5B.tmp', NULL, 0, 0, 0, 0.0, 'Voluptatem voluptate accusantium debitis repellendus. Sed facere deserunt fuga. Libero error recusandae voluptates quaerat cum iste eos eum. Quia necessitatibus delectus enim et ea.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(47, 'Boris Cole Jr.', 'download (6).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD5D.tmp', NULL, 0, 0, 0, 0.0, 'Ab quaerat tempora vel quis vitae vero. Minus quisquam nam optio et animi. Repellendus voluptatibus libero et placeat aut magni nisi. Libero consequatur et ipsa non amet alias. Illo error sequi enim alias alias nulla voluptatum.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(48, 'Prof. Melba Bednar', 'download (5).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD5F.tmp', NULL, 0, 0, 0, 0.0, 'Fuga quos nam et corporis expedita et quod. Rem iure inventore sit ex quia non laboriosam. Qui deserunt quis ut quibusdam cupiditate quia ut.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(49, 'Dr. Reanna Parker', 'download (4).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD61.tmp', NULL, 0, 0, 0, 0.0, 'A molestiae veniam rerum ab. Dignissimos cum eveniet nostrum. Excepturi illo amet facere.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(50, 'Mylene Hermiston', 'download (3).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD63.tmp', NULL, 0, 0, 0, 0.0, 'Tempore dignissimos esse dolores alias accusamus distinctio sint. Tempore aut quo aut repudiandae labore autem repellat hic. Ullam est tempora deserunt sed. In inventore architecto impedit quis.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(51, 'Luisa Okuneva', 'download (2).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD65.tmp', NULL, 0, 0, 0, 0.0, 'Necessitatibus autem quod ex ipsa voluptatem sapiente. Sint veniam tempore doloribus animi animi nihil. Aut illum sapiente eos voluptatem. Magni voluptatum recusandae et consectetur doloremque enim sunt aspernatur.', '2024-11-30 23:23:36', '2024-11-30 23:27:07'),
(52, 'Madge Tillman', 'download (1).jpg', 'C:\\Users\\LENOVO\\AppData\\Local\\Temp\\fakBD67.tmp', NULL, 0, 0, 0, 0.0, 'Dolores repellat est explicabo dolores officia sequi sequi. Omnis ducimus expedita qui sit. Vel quae et ipsam perspiciatis sit. Voluptates dolorem repudiandae ut nemo ipsam.', '2024-11-30 23:23:36', '2024-11-30 23:27:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(19, '2014_10_12_000000_create_users_table', 1),
(20, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(21, '2019_08_19_000000_create_failed_jobs_table', 1),
(22, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(23, '2024_11_26_142708_create_categories_table', 1),
(24, '2024_11_26_144301_create_control__types_table', 1),
(25, '2024_11_26_144315_create_games_table', 1),
(28, '2024_11_26_144327_create_controls_table', 2),
(30, '2024_11_26_144334_create_user__games_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `imagePath` varchar(255) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `language` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user__games`
--

CREATE TABLE `user__games` (
  `user_game_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `game_id` int(10) UNSIGNED NOT NULL,
  `playtime` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `like_dislike` tinyint(4) NOT NULL DEFAULT 0,
  `review` varchar(255) NOT NULL,
  `bookmark` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `controls`
--
ALTER TABLE `controls`
  ADD PRIMARY KEY (`control_id`),
  ADD KEY `controls_game_id_foreign` (`game_id`),
  ADD KEY `controls_control_type_id_foreign` (`control_type_id`);

--
-- Chỉ mục cho bảng `control__types`
--
ALTER TABLE `control__types`
  ADD PRIMARY KEY (`control_type_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `games_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `user__games`
--
ALTER TABLE `user__games`
  ADD PRIMARY KEY (`user_game_id`),
  ADD KEY `user__games_user_id_foreign` (`user_id`),
  ADD KEY `user__games_game_id_foreign` (`game_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `controls`
--
ALTER TABLE `controls`
  MODIFY `control_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `control__types`
--
ALTER TABLE `control__types`
  MODIFY `control_type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user__games`
--
ALTER TABLE `user__games`
  MODIFY `user_game_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `controls`
--
ALTER TABLE `controls`
  ADD CONSTRAINT `controls_control_type_id_foreign` FOREIGN KEY (`control_type_id`) REFERENCES `control__types` (`control_type_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `controls_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `user__games`
--
ALTER TABLE `user__games`
  ADD CONSTRAINT `user__games_game_id_foreign` FOREIGN KEY (`game_id`) REFERENCES `games` (`game_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user__games_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
