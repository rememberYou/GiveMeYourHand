-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2017 at 09:30 AM
-- Server version: 10.1.23-MariaDB
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `givemeyourhand`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_05_13_204308_create_portraits_table', 1),
(4, '2017_05_13_204326_create_offers_table', 1),
(5, '2017_05_13_204339_create_services_table', 1),
(6, '2017_05_13_204352_create_statistics_table', 1),
(7, '2017_05_13_204407_create_roles_table', 1),
(8, '2017_05_13_204419_create_permissions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(5,2) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `title`, `price`, `content`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'GiveMeEnough™', '9.99', '<p><strong>1 month</strong> of calling / session video</p>', 'give-me-enough', '2017-05-15 17:24:58', '2017-05-15 17:24:58'),
(2, 'GiveMeMore™', '19.99', '<p><strong>3 months</strong> of calling / session video</p>', 'give-me-more', '2017-05-15 17:30:22', '2017-05-15 17:30:22'),
(3, 'GiveMe™', '49.99', '<p><strong>6 months</strong> of calling / session videofdfdsfdsfdsdsfds</p>', 'give-me-everything', '2017-05-15 17:31:33', '2017-06-07 04:41:40');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('dream_catcher@gmail.com', '$2y$10$Pbc6p5dnbBM2F8F1/1Mp5Oclmi/vdpUTauDph/v4z8gQCqEaOSALe', '2017-05-18 05:10:16'),
('terencio.agozzino@gmail.com', '$2y$10$wDmasqeQZQeguY2i0mJf.OEvwbOtOP32KspojxtO0nZfMqjnImsqW', '2017-06-07 03:59:20');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'standard',
  `level` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `level`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'standard', 1, 'standard', '2017-05-14 07:17:44', '2017-05-14 07:17:44'),
(2, 'advanced', 2, 'advanced', '2017-05-14 07:18:34', '2017-05-14 07:18:34'),
(3, 'full', 3, 'slug-full', '2017-06-07 04:47:20', '2017-06-07 04:47:20');

-- --------------------------------------------------------

--
-- Table structure for table `portraits`
--

CREATE TABLE `portraits` (
  `id` int(10) UNSIGNED NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portraits`
--

INSERT INTO `portraits` (`id`, `picture`, `firstname`, `name`, `status`, `facebook`, `linkedin`, `email`, `content`, `slug`, `created_at`, `updated_at`) VALUES
(1, '1495544814.jpg', 'Nelson', 'Mandela', 'President of South Africa', 'https://www.facebook.com/nelsonmandela/?ref=br_rs', NULL, 'nelson_mandela@gmail.com', '<p>As long as poverty, injustice and gross inequality persist in our world, none of us can truly rest.</p>', 'nelson-mandela', '2017-05-14 06:27:56', '2017-05-23 11:06:54'),
(2, '1495544794.jpg', 'Alice', 'Cullen', 'Psychologist in her lost time', NULL, NULL, 'alice.cullen@gmail.com', '<p>After the Jesper lost, I decided to spend my life to help people like someone did in my life.</p>', 'alice-cullen', '2017-05-14 06:28:28', '2017-05-23 11:06:34'),
(3, '1495543998.jpg', 'Terencio', 'Agozzino', 'Developer of GiveMeYourHand', 'https://www.facebook.com/saum.wann', 'https://www.linkedin.com/in/terencioagozzino/', 'terencio.agozzino@gmail.com', '<p>I don\'t know where I go, but I know who I am. When I feel lost, I can still remember...</p>', 'terencio-agozzino', '2017-05-14 06:28:59', '2017-06-07 07:27:31'),
(4, '1495544863.jpg', 'Jesselyn', 'Ramesh C.', 'Founder of GiveMeYourHand', 'https://www.facebook.com/rjesselyn', 'https://www.linkedin.com/in/roshini-jesselyn-50a74a107/', 'jesselyn_shin@hotmail.com', '<p>I love you, I am sorry, Please forgive me, Thank you!</p>', 'jesselyn-ramesh-chandru', '2017-05-14 06:29:43', '2017-06-07 07:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission_id` tinyint(3) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permission_id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'user', 1, 'user', '2017-05-14 07:13:04', '2017-05-15 16:23:08'),
(2, 'psychologist', 2, 'psychologist', '2017-05-14 07:14:12', '2017-05-15 16:24:39'),
(3, 'coach', 2, 'coach', '2017-05-14 07:17:25', '2017-05-20 12:36:41'),
(4, 'developer', 3, 'developer', '2017-05-14 07:33:26', '2017-05-14 07:33:26'),
(5, 'founder', 3, 'founder', '2017-05-14 07:34:49', '2017-05-14 07:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `color`, `title`, `content`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'fa-video-camera', 'blue', 'Video Conference', '<p>We have a video session. The first session is <strong>free</strong>!</p>', 'therapy-center', '2017-05-14 05:53:49', '2017-05-14 06:35:52'),
(2, 'fa-comments', 'green', 'Instant Messaging', '<p>For those who prefer the words to voice, we offer a 24/7 instant messaging services.</p>', 'service-comments', '2017-05-14 06:07:33', '2017-05-18 10:47:16'),
(3, 'fa-home', 'red', 'Therapy Center', '<p>Therapy centers are at disposal for those wishing to attend.</p>', 'service-therapy-center', '2017-05-14 06:10:54', '2017-05-14 06:10:54');

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`id`, `icon`, `name`, `number`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'fa-graduation-cap', 'Qualified People', 56, 'statistic-qualified-people', '2017-05-14 06:31:19', '2017-05-14 06:31:19'),
(2, 'fa-coffee', 'Successful Projects', 287, 'statistic-successful-projects', '2017-05-14 06:32:54', '2017-05-14 06:32:54'),
(3, 'fa-thumbs-o-up', 'Satisfied Customers', 323, 'statistic-satisfied-customers', '2017-05-14 12:05:25', '2017-05-23 06:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `role_id`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rememberYou', 4, 'terencio.agozzino@gmail.com', '$2y$10$9caPrtt1msauf7tBUuG68uVvTMz10N9iRSMVSQPQIQXWDcX5UrCxG', '4PoAsl4R952tWAyUcufa87tyBX90ETYqbzRAh7JlGSdC58sC3ngxoeBoaqSM', '2017-05-14 05:27:08', '2017-06-06 14:04:02'),
(2, 'jRoshini', 5, 'jesselyn.roshini@gmail.com', '$2y$10$mtr53zpTZzmYD44lzDWK5.ai60aSoxmu8lVhfggFPZNRS0H9N9CM2', 'kravp2U9AdWe5GJXMpdJrqtYuPyyjUr9AdMzH7OM1iLd76QqLcwCKpnYrd9b', '2017-05-14 16:12:32', '2017-05-18 04:43:02'),
(6, 'dreamcatcher', 1, 'dream_catcher@gmail.com', '$2y$10$d9eoOtXdQwCzEovPzdm9YOAti8mAuXOjwYPKVkYryy4H2xhffAZ7W', 'YQ2QbgOIl8VUqEHHl617GHety5H7HTaemSrKxHGXgoIbXS8ncUbIy9HtxSt7', '2017-05-15 17:52:36', '2017-05-15 17:59:16'),
(15, 'tulipe22', 1, 'la-petite-tulipe22@gmail.com', '$2y$10$xPQE54vHn60.MTqqGSTVHu3xOt2UApRrXltxY3GmgvYGl/hf9No4K', 'oV0NkO8Gm9SlGbkL31XXXsVooJj4y25fZE795neA9vcOhmUS12bIEc8Kc921', '2017-05-21 15:00:29', '2017-05-23 06:31:06'),
(16, 'bquoitin', 4, 'bruno.quoitin@gmail.com', '$2y$10$0yLecZ5SB7tkvLsFtywCfuqMUmNENoR65W1pbuDd2TrT1smqGKZmu', NULL, '2017-05-23 06:31:44', '2017-05-23 06:31:44'),
(17, 'hmelot', 4, 'hadrien.melot@gmail.com', '$2y$10$C.cLWHHy3RNdz0ycpOpnFOzC2rqQJXc88mWX3XI2C.C38Tm.aJecO', NULL, '2017-05-23 06:32:50', '2017-05-23 06:32:50'),
(18, 'iLLo', 1, 'catchmeillo@gmail.com', '$2y$10$sN8JttVZG0lSSZiSFbeXQupeILRAVFm11W2B3r/vkGvUoNVq1v/FC', NULL, '2017-05-23 06:33:54', '2017-05-23 06:33:54'),
(19, 'moskau', 1, 'moskaurussia@gmail.com', '$2y$10$0BABi0z/IaZ.N.06z8GaUeHfPAc3nLgLdgg2RsWylR.orcBSB6chi', NULL, '2017-05-23 06:34:22', '2017-05-23 06:34:22'),
(20, 'desira', 2, 'desira-gyh@gmail.com', '$2y$10$0vS0oU8SsvExW8pm5/BpveJdAg6yHwGH4rYllH2eD9SPHEIBOF9E6', NULL, '2017-05-23 06:34:55', '2017-05-23 06:34:55'),
(21, 'nash', 3, 'nash-gyh@gmail.com', '$2y$10$MvfgPr8D7r7sNiAtGsJsFO1W7f8iUAj9VrlsHpvfdYVaaXnjhZEBC', NULL, '2017-05-23 06:35:16', '2017-05-23 06:35:16'),
(22, 'juanS', 2, 'juans-gyh@gmail.com', '$2y$10$wnByh5UmWkd6tVmUPGXmLeZHwY8vBi9sy03XfSepTVxYzaRBF0eQa', NULL, '2017-05-23 06:36:04', '2017-06-06 14:44:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `offers_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indexes for table `portraits`
--
ALTER TABLE `portraits`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `portraits_slug_unique` (`slug`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_slug_unique` (`slug`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `statistics_slug_unique` (`slug`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `portraits`
--
ALTER TABLE `portraits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `statistics`
--
ALTER TABLE `statistics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
