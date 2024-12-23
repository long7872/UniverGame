-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 23, 2024 lúc 06:31 PM
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
  `name` varchar(40) NOT NULL,
  `imagePath` varchar(255) NOT NULL,
  `gamePath` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `total_plays` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `total_likes` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `total_dislikes` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `rating` double(2,1) NOT NULL DEFAULT 0.0,
  `descrip` varchar(1000) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `games`
--

INSERT INTO `games` (`game_id`, `name`, `imagePath`, `gamePath`, `category_id`, `total_plays`, `total_likes`, `total_dislikes`, `rating`, `descrip`, `created_at`, `updated_at`) VALUES
(1, 'Boom Evade', '1734968493.png', 'BOOM-game/index.html', 9, 13, 0, 0, 0.0, 'Boom Evade is an exciting action game where players dodge falling bombs from the sky. With simple controls and increasing difficulty, it tests reflexes and quick thinking. Can you survive the bombardment?', '2024-12-23 08:41:33', '2024-12-23 10:19:31'),
(2, 'Heroes Fight', '1734974822.png', 'Webgame_game01/index.html', 5, 0, 0, 0, 0.0, 'Heroes Fight is an intense 2-player fighting game where players select their favorite anime characters to battle in exciting one-on-one combat. Each character has unique moves and abilities, creating dynamic, fast-paced fights. Test your skills and strategy as you fight for victory in epic anime-style battles!', '2024-12-23 10:27:03', '2024-12-23 10:27:03');

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
(20, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(21, '2019_08_19_000000_create_failed_jobs_table', 1),
(22, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(23, '2024_11_26_142708_create_categories_table', 1),
(24, '2024_11_26_144301_create_control__types_table', 1),
(49, '2014_10_12_000000_create_users_table', 3),
(51, '2024_11_26_144315_create_games_table', 4),
(52, '2024_11_26_144327_create_controls_table', 4),
(54, '2024_11_26_144334_create_user__games_table', 5);

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
  `privilege` tinyint(4) NOT NULL DEFAULT 0,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `auth_provider` varchar(255) DEFAULT NULL,
  `auth_provider_id` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT 'N/A',
  `imagePath` varchar(255) DEFAULT 'defaultuser.png',
  `gender` tinyint(4) DEFAULT NULL,
  `dateOfBirth` date DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL,
  `about` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `privilege`, `username`, `password`, `auth_provider`, `auth_provider_id`, `email`, `email_verified_at`, `name`, `imagePath`, `gender`, `dateOfBirth`, `language`, `about`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'user1', NULL, 'google', '115742490972631334311', 'long77872@gmail.com', NULL, 'Khánh Long', 'https://lh3.googleusercontent.com/a/ACg8ocL2GrM2WU93GuW4LAlIB3Y2fK5XV1figU1cY2S_CsKWZHa9HnMr=s96-c', NULL, NULL, NULL, NULL, 1, 's6jGoTe5Tvj2m1NAycLVoBFqVnOusYk3P7GnDgHa3pa7JHIBQ6A5ZE4Bp1G5', '2024-12-23 00:35:43', '2024-12-23 10:18:51'),
(2, 0, 'user2', NULL, 'google', '117178194521299373856', 'longtmk.23itb@vku.udn.vn', NULL, 'Trương Minh Khánh Long', 'https://lh3.googleusercontent.com/a/ACg8ocKS10NGUM7Yd5swP1-Z6cU_DBentlImcGUFadduZo90kOxaNw=s96-c', NULL, NULL, NULL, NULL, 0, 'ctjQHqKajJ0XyTJlhgmCO4xFa4cVimdw8zTJ3OVk43kzGOH0kDfZrayL27aS', '2024-12-23 00:35:51', '2024-12-23 10:18:46'),
(4, 0, '11', NULL, NULL, NULL, '11', NULL, 'N/A', 'defaultuser.png', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(5, 0, '111', NULL, NULL, NULL, '111', NULL, 'N/A', 'defaultuser.png', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(7, 0, '11111', NULL, NULL, NULL, '11111', NULL, 'N/A', 'defaultuser.png', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(8, 0, '111111', NULL, NULL, NULL, '111111', NULL, 'N/A', 'defaultuser.png', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(11, 0, '111111111', NULL, NULL, NULL, '111111111', NULL, 'N/A', 'defaultuser.png', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(13, 0, '11111111111', NULL, NULL, NULL, '11111111111', NULL, 'N/A', 'defaultuser.png', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(14, 0, '111111111111', NULL, NULL, NULL, '111111111111', NULL, 'N/A', 'defaultuser.png', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(15, 0, '2', NULL, NULL, NULL, '2', NULL, 'N/A', 'defaultuser.png', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(16, 0, '22', NULL, NULL, NULL, '22', NULL, 'N/A', 'defaultuser.png', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(17, 0, '222', NULL, NULL, NULL, '222', NULL, 'N/A', 'defaultuser.png', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(18, 0, '2222', NULL, NULL, NULL, '2222', NULL, 'N/A', 'defaultuser.png', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(19, 0, '22222', NULL, NULL, NULL, '22222', NULL, 'N/A', 'defaultuser.png', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(20, 0, '222222', NULL, NULL, NULL, '222222', NULL, 'N/A', 'defaultuser.png', NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL);

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
  `report` varchar(50) DEFAULT NULL,
  `review` varchar(255) DEFAULT NULL,
  `bookmark` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user__games`
--

INSERT INTO `user__games` (`user_game_id`, `user_id`, `game_id`, `playtime`, `like_dislike`, `report`, `review`, `bookmark`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1876, 0, 'bug', NULL, 0, '2024-12-23 09:22:58', '2024-12-23 10:19:33'),
(2, 2, 1, 6, 0, 'harmful', NULL, 0, '2024-12-23 10:18:34', '2024-12-23 10:18:41');

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
  ADD UNIQUE KEY `users_username_unique` (`username`),
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
  MODIFY `control_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `game_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `user__games`
--
ALTER TABLE `user__games`
  MODIFY `user_game_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
