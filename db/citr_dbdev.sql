-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th8 20, 2023 lúc 08:57 PM
-- Phiên bản máy phục vụ: 10.4.30-MariaDB
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `citr_dbdev`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` text NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `city` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `address`, `latitude`, `longitude`, `city`, `user_name`, `phone`, `created_at`, `updated_at`) VALUES
(1, 1, 'Q9, HCM', 10.1235, 90.4567, NULL, NULL, '', NULL, NULL),
(2, 2, 'Q2, HCM', 57.1235, 90.4567, NULL, NULL, '', NULL, NULL),
(3, 3, 'Q8, HCM', 70.1235, 90.4567, NULL, NULL, '', NULL, NULL),
(4, 4, 'Q5, HCM', 18.1234, 80.4567, NULL, NULL, '', NULL, NULL),
(6, 6, 'Q2, HCM', 57.1235, 90.4567, NULL, NULL, '', NULL, NULL),
(7, 7, 'Q3, HCM', 70.1235, 90.4567, NULL, NULL, '', NULL, NULL),
(8, 8, 'Q5, HCM', 18.1234, 80.4567, NULL, NULL, '', NULL, NULL),
(10, 10, 'Q9, HCM', 10.1235, 90.4567, NULL, NULL, '', NULL, NULL),
(11, 11, 'Q2, HCM', 57.1235, 90.4567, NULL, NULL, '', NULL, NULL),
(12, 12, 'Thu Duc, HCM', 100.123, 90.4567, NULL, NULL, '', NULL, NULL),
(13, 13, 'Q3, HCM', 70.1235, 90.4567, NULL, NULL, '', NULL, NULL),
(14, 14, 'Q5, HCM', 18.1234, 80.4567, NULL, NULL, '', NULL, NULL),
(15, 15, 'Thu Duc, HCM', 100.123, 90.4567, NULL, NULL, '', NULL, NULL),
(16, 16, 'Q9, HCM', 10.1235, 90.4567, NULL, NULL, '', NULL, NULL),
(17, 3, '39 Duong ACB', 12.6789, 78.012, 'Di An', 'Test', '', '2023-08-11 20:00:28', '2023-08-11 20:00:28'),
(24, 17, '49 Duong ACB', 12.6789, 78.012, 'Di An', 'Test 2', '', '2023-08-11 20:00:28', '2023-08-11 20:00:28'),
(25, 18, '49 Duong BEF', 11.9789, 78.0127, 'Di An', 'Test 3', '', '2023-08-11 20:00:28', '2023-08-11 20:00:28'),
(26, 19, '79 Duong BEF', 12.9789, 78.0127, 'Di An', 'Test 4', '', '2023-08-11 20:00:28', '2023-08-11 20:00:28'),
(27, 20, '79 Duong XYZ', 12.5678, 78.1234, 'Di An', 'Test 5', '', '2023-08-11 20:00:28', '2023-08-11 20:00:28'),
(28, 9, 'Quan 8', 0, 0, 'HCM', NULL, '0123456789', '2023-08-12 23:26:49', '2023-08-12 23:26:49'),
(29, 9, 'Quan 3', 0, 0, 'HCM', NULL, '0123', '2023-08-12 23:31:23', '2023-08-12 23:31:23'),
(30, 3, 'Duong ABC', 12.6789, 125.012, 'Thuan An', '12.6789', '123456789', '2023-08-12 23:35:38', '2023-08-12 23:35:38'),
(31, 9, '1', 0, 0, '1', NULL, '1', '2023-08-12 23:51:27', '2023-08-12 23:51:27'),
(32, 9, '1', 0, 0, '1', NULL, NULL, '2023-08-12 23:51:40', '2023-08-12 23:51:40'),
(33, 22, 'Duong DT743B', 12.6789, 125.012, 'Di An', '12.6789', '123456789', '2023-08-12 23:35:38', '2023-08-12 23:35:38'),
(34, 13, 'q9 hcm', 0, 0, '32/gò cát', NULL, '0905970344', '2023-08-13 15:16:50', '2023-08-13 15:16:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `price_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `price_id`, `qty`, `created_at`, `updated_at`) VALUES
(76, 13, 6, 1, '2023-08-21 06:12:35', '2023-08-21 06:12:35'),
(77, 13, 10, 1, '2023-08-21 06:22:22', '2023-08-21 06:22:22'),
(78, 13, 16, 1, '2023-08-21 06:24:11', '2023-08-21 06:24:11'),
(79, 13, 19, 1, '2023-08-21 06:24:39', '2023-08-21 06:24:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chats`
--

CREATE TABLE `chats` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chat_user`
--

CREATE TABLE `chat_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `chat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `parent_id`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, NULL, 'Test comment parent 01', '2023-08-02 14:47:59', '2023-08-02 14:47:59', NULL),
(2, 3, 1, NULL, 'Test comment parent 02', '2023-08-02 14:48:10', '2023-08-02 14:48:10', NULL),
(3, 3, 1, 1, 'Test comment child 01', '2023-08-02 14:48:40', '2023-08-02 14:48:40', NULL),
(4, 9, 1, 1, 'Test comment child 01', '2023-08-07 05:33:31', '2023-08-07 05:33:31', NULL),
(5, 9, 1, NULL, 'Test comment child 01', '2023-08-07 05:41:49', '2023-08-07 05:41:49', NULL),
(6, 9, 1, NULL, 'Test comment child 01', '2023-08-07 05:42:00', '2023-08-07 05:42:00', NULL),
(7, 9, 1, NULL, 'ggg', '2023-08-07 06:30:27', '2023-08-07 06:30:27', NULL),
(8, 9, 1, NULL, 'ggg', '2023-08-07 06:32:32', '2023-08-07 06:32:32', NULL),
(9, 9, 6, NULL, 'h', '2023-08-07 06:34:35', '2023-08-07 06:34:35', NULL),
(10, 9, 7, NULL, 'k', '2023-08-07 06:36:17', '2023-08-07 06:36:17', NULL),
(11, 9, 7, NULL, 'k', '2023-08-07 06:37:06', '2023-08-07 06:37:06', NULL),
(12, 9, 9, NULL, 'Test comment child 01', '2023-08-07 06:37:33', '2023-08-07 06:37:33', NULL),
(13, 9, 7, NULL, 'g', '2023-08-07 06:40:48', '2023-08-07 06:40:48', NULL),
(14, 9, 7, NULL, 'g', '2023-08-07 06:40:56', '2023-08-07 06:40:56', NULL),
(15, 9, 7, NULL, '1', '2023-08-07 06:41:46', '2023-08-07 06:41:46', NULL),
(16, 13, 1, NULL, 'hello', '2023-08-13 23:57:04', '2023-08-13 23:57:04', NULL),
(17, 13, 1, NULL, 'hello', '2023-08-13 23:57:16', '2023-08-13 23:57:16', NULL),
(18, 13, 1, NULL, 'test', '2023-08-14 13:34:42', '2023-08-14 13:34:42', NULL),
(19, 13, 1, NULL, 'gg', '2023-08-17 02:33:15', '2023-08-17 02:33:15', NULL),
(20, 9, 3, NULL, 'aaaaa', '2023-08-17 15:26:37', '2023-08-17 15:26:37', NULL),
(21, 13, 17, NULL, 'jjk', '2023-08-17 19:36:04', '2023-08-17 19:36:04', NULL),
(22, 13, 1, NULL, 'hi', '2023-08-21 04:38:22', '2023-08-21 04:38:22', NULL),
(23, 13, 18, NULL, 'bị bênh tháng thư', '2023-08-21 05:34:49', '2023-08-21 05:34:49', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `details`
--

CREATE TABLE `details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_name` text NOT NULL,
  `price` text NOT NULL,
  `total_price` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `details`
--

INSERT INTO `details` (`id`, `order_id`, `product_id`, `qty`, `product_name`, `price`, `total_price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 4, 2, 1, 'Bisomin 2SL', '250000', '250000', NULL, NULL, NULL),
(2, 5, 2, 1, 'Bisomin 2SL', '250000', '250000', NULL, NULL, NULL),
(3, 6, 2, 1, 'Bisomin 2SL', '250000', '250000', NULL, NULL, NULL),
(4, 7, 2, 1, 'Bisomin 2SL', '250000', '250000', NULL, NULL, NULL),
(5, 8, 2, 1, 'Bisomin 2SL', '250000', '250000', NULL, NULL, NULL),
(6, 9, 1, 1, 'Actinovate 1SP', '320000', '320000', NULL, NULL, NULL),
(7, 10, 1, 1, 'Actinovate 1SP', '320000', '320000', NULL, NULL, NULL),
(8, 11, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(9, 11, 2, 3, 'Bisomin 2SL', '250000', '750000', NULL, NULL, NULL),
(10, 12, 1, 3, 'Actinovate 1SP', '340000', '1020000', NULL, NULL, NULL),
(11, 13, 1, 4, 'Actinovate 1SP', '340000', '1360000', NULL, NULL, NULL),
(12, 14, 2, 1, 'Bisomin 2SL', '200000', '200000', NULL, NULL, NULL),
(13, 15, 1, 1, 'Actinovate 1SP', '340000', '340000', NULL, NULL, NULL),
(14, 16, 1, 1, 'Actinovate 1SP', '340000', '340000', NULL, NULL, NULL),
(15, 17, 2, 1, 'Bisomin 2SL', '140000', '140000', NULL, NULL, NULL),
(16, 18, 2, 1, 'Bisomin 2SL', '140000', '140000', NULL, NULL, NULL),
(17, 18, 1, 1, 'Actinovate 1SP', '360000', '360000', NULL, NULL, NULL),
(18, 19, 1, 1, 'Actinovate 1SP', '360000', '360000', NULL, NULL, NULL),
(19, 19, 2, 1, 'Bisomin 2SL', '140000', '140000', NULL, NULL, NULL),
(20, 20, 1, 2, 'Actinovate 1SP', '370000', '740000', NULL, NULL, NULL),
(21, 21, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(22, 22, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(23, 23, 1, 5, 'Actinovate 1SP', '370000', '1850000', NULL, NULL, NULL),
(24, 24, 1, 2, 'Actinovate 1SP', '370000', '740000', NULL, NULL, NULL),
(25, 25, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(26, 26, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(27, 27, 2, 1, 'Bisomin 2SL', '250000', '250000', NULL, NULL, NULL),
(28, 28, 2, 1, 'Bisomin 2SL', '250000', '250000', NULL, NULL, NULL),
(29, 29, 2, 1, 'Bisomin 2SL', '250000', '250000', NULL, NULL, NULL),
(30, 30, 2, 2, 'Bisomin 2SL', '250000', '500000', NULL, NULL, NULL),
(31, 31, 2, 4, 'Bisomin 2SL', '250000', '1000000', NULL, NULL, NULL),
(32, 32, 2, 3, 'Bisomin 2SL', '250000', '750000', NULL, NULL, NULL),
(33, 33, 2, 6, 'Bisomin 2SL', '250000', '1500000', NULL, NULL, NULL),
(34, 34, 1, 2, 'Actinovate 1SP', '370000', '740000', NULL, NULL, NULL),
(35, 35, 1, 4, 'Actinovate 1SP', '370000', '1480000', NULL, NULL, NULL),
(36, 36, 4, 3, 'Envio 250SC', '2', '6', NULL, NULL, NULL),
(37, 37, 1, 2, 'Actinovate 1SP', '370000', '740000', NULL, NULL, NULL),
(38, 38, 1, 3, 'Actinovate 1SP', '370000', '1110000', NULL, NULL, NULL),
(39, 39, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(40, 40, 2, 1, 'Bisomin 2SL', '250000', '250000', NULL, NULL, NULL),
(41, 40, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(42, 41, 2, 1, 'Bisomin 2SL', '250000', '250000', NULL, NULL, NULL),
(43, 41, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(44, 42, 1, 1, 'Actinovate 1SP', '320000', '320000', NULL, NULL, NULL),
(45, 43, 2, 2, 'Bisomin 2SL', '140000', '280000', NULL, NULL, NULL),
(46, 44, 2, 5, 'Bisomin 2SL', '250000', '1250000', NULL, NULL, NULL),
(47, 44, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(48, 45, 2, 5, 'Bisomin 2SL', '250000', '1250000', NULL, NULL, NULL),
(49, 45, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(50, 46, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(51, 47, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(52, 48, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(53, 49, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(54, 50, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(55, 51, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(56, 52, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(57, 53, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(58, 54, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(59, 55, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(60, 56, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(61, 57, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(62, 58, 2, 1, 'Bisomin 2SL', '250000', '250000', NULL, NULL, NULL),
(63, 58, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(64, 59, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(65, 60, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(66, 61, 1, 1, 'Actinovate 1SP', '360000', '360000', NULL, NULL, NULL),
(67, 62, 1, 1, 'Actinovate 1SP', '360000', '360000', NULL, NULL, NULL),
(68, 63, 1, 1, 'Actinovate 1SP', '360000', '360000', NULL, NULL, NULL),
(69, 64, 1, 1, 'Actinovate 1SP', '360000', '360000', NULL, NULL, NULL),
(70, 65, 2, 1, 'Bisomin 2SL', '250000', '250000', NULL, NULL, NULL),
(71, 65, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(72, 66, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(73, 67, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(74, 68, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(75, 69, 1, 1, 'Actinovate 1SP', '320000', '320000', NULL, NULL, NULL),
(76, 70, 1, 1, 'Actinovate 1SP', '320000', '320000', NULL, NULL, NULL),
(77, 71, 1, 1, 'Actinovate 1SP', '320000', '320000', NULL, NULL, NULL),
(78, 72, 2, 1, 'Bisomin 2SL', '250000', '250000', NULL, NULL, NULL),
(79, 72, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(80, 73, 1, 1, 'Actinovate 1SP', '320000', '320000', NULL, NULL, NULL),
(81, 74, 1, 1, 'Actinovate 1SP', '320000', '320000', NULL, NULL, NULL),
(82, 75, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(83, 75, 8, 1, 'Regent', '123', '123', NULL, NULL, NULL),
(84, 76, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(85, 77, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(86, 78, 1, 1, 'Actinovate 1SP', '360000', '360000', NULL, NULL, NULL),
(87, 79, 2, 1, 'Bisomin 2SL', '250000', '250000', NULL, NULL, NULL),
(88, 80, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(89, 81, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(90, 82, 9, 1, 'acbd', '12345', '12345', NULL, NULL, NULL),
(91, 83, 9, 1, 'acbd', '12345', '12345', NULL, NULL, NULL),
(92, 84, 9, 1, 'acbd', '12345', '12345', NULL, NULL, NULL),
(93, 85, 9, 1, 'acbd', '12345', '12345', NULL, NULL, NULL),
(94, 86, 9, 1, 'acbd', '12345', '12345', NULL, NULL, NULL),
(95, 87, 1, 1, 'Actinovate 1SP', '370000', '370000', NULL, NULL, NULL),
(96, 88, 7, 1, 'Nativo', '300000', '300000', NULL, NULL, NULL),
(97, 89, 7, 1, 'Nativo', '300000', '300000', NULL, NULL, NULL),
(98, 90, 7, 1, 'Nativo', '300000', '300000', NULL, NULL, NULL),
(99, 91, 2, 1, 'Bisomin 2SL', '210000', '210000', NULL, NULL, NULL),
(100, 92, 3, 1, 'Amistar 250SC', '400000', '400000', NULL, NULL, NULL),
(101, 93, 2, 1, 'Bisomin 2SL', '250000', '250000', NULL, NULL, NULL),
(102, 94, 2, 1, 'Bisomin 2SL', '240000', '240000', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diagnostics`
--

CREATE TABLE `diagnostics` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `dis_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diagnostics`
--

INSERT INTO `diagnostics` (`id`, `user_id`, `dis_id`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 1, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-01\\/MYwSz5H44i17dxzg2eNLLXTpsLd5sbxSKU5YL81u.png\",\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-01\\/xDcpMqaN2tFplTsS4v6Ws5oeQB4cLhGJW62UcJYf.png\"]', '2023-08-10 02:31:56', '2023-08-10 02:31:56', NULL),
(2, 9, 1, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-01\\/MYwSz5H44i17dxzg2eNLLXTpsLd5sbxSKU5YL81u.png\",\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-01\\/xDcpMqaN2tFplTsS4v6Ws5oeQB4cLhGJW62UcJYf.png\"]', '2023-08-13 07:06:58', '2023-08-13 07:06:58', NULL),
(3, 9, 1, '\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-01\\/MYwSz5H44i17dxzg2eNLLXTpsLd5sbxSKU5YL81u.png\"', '2023-08-13 07:08:54', '2023-08-13 07:08:54', NULL),
(4, 9, 1, '\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-01\\/MYwSz5H44i17dxzg2eNLLXTpsLd5sbxSKU5YL81u.png\"', '2023-08-13 07:09:19', '2023-08-13 07:09:19', NULL),
(5, 9, 1, '\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-13\\/zuKhiHQY0Uhf7eBa2ZfPYQKHpW5lmIo9qLlrxIGq.jpg\"', '2023-08-13 07:30:18', '2023-08-13 07:30:18', NULL),
(6, 13, 1, '\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-13\\/TwzbOQX0Zqp2ASTW9FKk3xzf6bzJ7tYMZrhvELbx.jpg\"', '2023-08-13 15:50:48', '2023-08-13 15:50:48', NULL),
(7, 13, 1, '\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-13\\/yhag5iyKNQKXjVyQokwOnxH1qeDN7r3cQVvKxU2B.jpg\"', '2023-08-13 15:53:31', '2023-08-13 15:53:31', NULL),
(8, 13, 1, '\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-13\\/kFKPsim87XVK9qm5BUIAPmNagZpU7VVzLKVFULQj.jpg\"', '2023-08-13 23:30:08', '2023-08-13 23:30:08', NULL),
(9, 13, 1, '\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-13\\/5Imkon1nuZLC78ORPloKm1MJg60kiUrs8XxydFeG.jpg\"', '2023-08-13 23:30:49', '2023-08-13 23:30:49', NULL),
(10, 13, 1, '\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-14\\/Bve5u0PMmPb1xGLqS1PvpDrXwREANtxynlnXUNcI.jpg\"', '2023-08-14 13:16:27', '2023-08-14 13:16:27', NULL),
(11, 13, 1, '\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-14\\/VzvPwwmpGlA3N4U18d148mwp3V5Z0SVP8b3z4Lbd.jpg\"', '2023-08-14 13:23:07', '2023-08-14 13:23:07', NULL),
(12, 13, 1, '\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-15\\/vToWEX6GSWxv6YF7ViAursxChGVTWKynz8brshK7.jpg\"', '2023-08-15 21:01:42', '2023-08-15 21:01:42', NULL),
(13, 13, 1, '\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-16\\/XPe1RBDb22HX5cxLSpoedp5TLIO8tL0Eni3EPBSr.jpg\"', '2023-08-17 02:17:12', '2023-08-17 02:17:12', NULL),
(14, 13, 1, '\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/R2yK4zGM7hHbyAVAyVWxHAkBkQ7NO96l1Vh4TCOL.jpg\"', '2023-08-17 18:41:10', '2023-08-17 18:41:10', NULL),
(15, 13, 1, '\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/I25eFXPTMpTCkToUFYMi0vgZNs0x5dKHR6qHxxiX.jpg\"', '2023-08-17 18:43:07', '2023-08-17 18:43:07', NULL),
(16, 13, 1, '\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/ovpNxUWLoqHZyAr0KffbnHqiEuNhuOAqf7M1jeo6.jpg\"', '2023-08-17 19:24:42', '2023-08-17 19:24:42', NULL),
(17, 13, 1, '\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/Yy0nvDKAB5yaT6Own1JIeesN9Vn7aqaqSyxERnGa.jpg\"', '2023-08-17 19:40:53', '2023-08-17 19:40:53', NULL),
(18, 13, 1, '\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-20\\/92uYS5Ad8REKu8qx5zKFj9X5oZjwHpTe2uUvFBxd.jpg\"', '2023-08-20 22:02:14', '2023-08-20 22:02:14', NULL),
(19, 13, 1, '\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-21\\/QbodprGTaLtzNcnzAaQqE1dGPX8hmHlPsLiTa6GL.jpg\"', '2023-08-21 05:26:34', '2023-08-21 05:26:34', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diseases`
--

CREATE TABLE `diseases` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `characteristic` text NOT NULL,
  `reason` text NOT NULL,
  `photo` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diseases`
--

INSERT INTO `diseases` (`id`, `name`, `characteristic`, `reason`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bệnh Nấm-Canker-Loet', 'Bệnh này chủ yếu ảnh hưởng đến loài cây cam ba lá và các giống lai của nó, chẳng hạn như giống Swingle citrumelo trong điều kiện vườn ươm. Các tổn thương trông rất giống với các tổn thương của bệnh loét trên lá ở các giống cam khác, nhưng chúng có dạng phẳng hoặc lõm mặt mà không lồi lên. Trên lá, các tổn thương có dấu hiệu đặc trưng là có tâm hình tròn, màu nâu, bao gồm có mô chết, thường rách vỡ hoặc vỡ vụn, hình thành hiện tượng \"lỗ vỡ toét\" khiến lá trông có vẻ rách nát. Chúng còn có viền mép bủng nước và quầng sáng màu vàng bao quanh và loang dần ra. Tổn thương do các chủng vi khuẩn mạnh gây ra có viền bủng nước loang ra rõ rệt hơn. Theo thời gian, các tổn thương lớn dần và hợp lại với nhau, tạo ra các mảng màu nâu nhạt có dạng góc cạnh và không đều. Lá bị nhiễm bệnh nghiêm trọng trở nên úa vàng hoặc cháy sém, có thể gây rụng sớm và gây nên hiện tượng cây rụng lá.', 'Bệnh do vi khuẩn Xanthomonas alfalfae gây ra. Loài vi khuẩn này có ba chủng khác nhau, gây ra các triệu chứng có mức độ nghiêm trọng khác nhau cho cây ký chủ. Vi khuẩn lan truyền tự nhiên trong các vườn ươm ngoài trời nhờ mưa gió, sương hay nước tưới phun từ trên cao. Chúng cũng có thể lan truyền cơ học từ cây này sang cây khác thông qua quá trình làm việc tại vườn trồng hoặc vườn ươm, chủ yếu là trong điều kiện tán lá còn ướt. Các lỗ thở tự nhiên trên lá hay trên vỏ cây (khí khổng) là các điểm xâm nhập của vi khuẩn. Tuy nhiên, vi khuẩn chết khi cây non được trồng lại thành vườn, và các triệu chứng dần biến mất. Nhiệt độ ấm áp (14 đến 38°C), nhiều cơn mưa nhẹ, nhiều sương và thời tiết có gió tạo điều kiện thuận lợi nhất cho bệnh phát triển và lây lan. Ngược lại, sự phát triển của vi khuẩn và quá trình lây nhiễm bị suy yếu đi khi thời tiết nóng và khô.', NULL, '2023-07-18 07:09:35', '2023-07-27 18:13:40', NULL),
(2, 'Bệnh Nấm-anthracnose-than thu', 'Lá có những đốm tròn màu nâu nhạt với viền màu tím nổi bật. Trung tâm của những đốm này dần dần chuyển sang màu xám và trong giai đoạn sau của quá trình nhiễm trùng, có thể xuất hiện những đốm đen nhỏ phân tán. Các mô bị tổn thương do các yếu tố môi trường (chẳng hạn như tổn thương do côn trùng hoặc các tổn thương do nguyên nhân khác) dễ bị nấm bệnh thán thư xâm chiếm hơn. Trái cây trước đây đã bị tổn thương bởi các tác nhân khác như cháy nắng, bỏng hóa chất, sâu bệnh, bầm tím hoặc điều kiện bảo quản không thuận lợi, đặc biệt dễ bị bệnh thán thư. Các triệu chứng trên quả là cứng và khô, có các đốm màu nâu đến đen có đường kính 1,5 mm hoặc lớn hơn một chút. Các khối bào tử mọc trên vết bệnh thường có màu nâu đến đen, nhưng trong điều kiện ẩm ướt có thể chuyển sang màu hồng phấn.', 'Bệnh thán thư mọc trên gỗ chết trong tán cây và lây lan trong khoảng cách ngắn do mưa tạt, sương dày đặc và tưới tiêu trên cao. Bằng cách này, nó tiếp cận các mô nhạy cảm của lá và quả non, và bắt đầu phát triển, gây ra các triệu chứng. Các đợt bào tử mới được tạo ra trên các cấu trúc hữu tính mọc trên các đốm và vết bệnh trên lá và quả. Những bào tử này có thể bay trong không khí và sau đó có thể phát tán bệnh trên một khoảng cách dài. Sau khi các bào tử nảy mầm, chúng tạo thành một cấu trúc nghỉ ngơi, không hoạt động cho đến khi vết thương xảy ra hoặc cho đến khi xử lý trái cây sau thu hoạch (ví dụ như phân loại). Điều kiện tối ưu cho sự phát triển của nấm là độ ẩm rất cao và nhiệt độ 25-28°C, nhưng nhìn chung nhiễm trùng có thể phát triển ở 20-30°C.', NULL, '2023-08-01 05:19:18', '2023-08-01 05:19:18', NULL),
(3, 'bệnh rầy', 'bệnh', 'rầy quá', NULL, '2023-08-01 15:13:48', '2023-08-01 15:22:27', '2023-08-01 15:22:27'),
(4, 'aa', '123', '123', NULL, '2023-08-01 15:23:00', '2023-08-01 15:24:30', '2023-08-01 15:24:30'),
(5, 'Test', 'test', 'test', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-13\\/LfLytv089mTLjS6ZqVW6wSb9C6raiM8S0qq4YEiV.jpg\",\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-13\\/6CKxpzCOi7xM6q6Zvtje0MsUIaNmbKQ0BrkwBMrK.jpg\"]', '2023-08-13 16:14:44', '2023-08-13 23:19:04', '2023-08-13 23:19:04'),
(6, 'test1', 'test2', 'test3', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/G1GFN3CqYYdmhdCPyCY6OZiieCLuAtyKh2yFUEL2.jpg\",\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/DymgsHTwrWXiWPiXp1AuQjrPaUepMX6wcDEA69Kv.jpg\"]', '2023-08-13 23:19:43', '2023-08-21 03:36:07', '2023-08-21 03:36:07'),
(7, 'Tên bệnh 1', 'Chiệu trứng 1', 'Nguyên nhân 1', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-20\\/G7sHvTHvt54qmaTH6sIrPsPN0nAMHmCqozL7tq6D.jpg\"]', '2023-08-21 02:58:57', '2023-08-21 03:35:44', '2023-08-21 03:35:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `expert_id` int(11) NOT NULL,
  `star` text NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'user mobile 1', '2023-07-26 03:02:39', '2023-07-26 03:02:39', NULL),
(2, 2, 'Expert sent', '2023-07-26 04:13:37', '2023-07-26 04:13:37', NULL),
(3, 3, 'user mobile 2', '2023-07-26 04:25:47', '2023-07-26 04:25:47', NULL),
(4, 2, 'test', '2023-07-26 04:27:28', '2023-07-26 04:27:28', NULL),
(5, 2, 'ok na', '2023-07-26 04:29:46', '2023-07-26 04:29:46', NULL),
(6, 2, 'hehe', '2023-07-26 04:34:14', '2023-07-26 04:34:14', NULL),
(7, 3, 'user mobile ok la', '2023-07-26 04:34:52', '2023-07-26 04:34:52', NULL),
(8, 2, 'hehe', '2023-07-26 04:36:06', '2023-07-26 04:36:06', NULL),
(9, 2, 'not good', '2023-07-26 04:50:29', '2023-07-26 04:50:29', NULL),
(10, 3, 'ok la', '2023-07-26 04:50:57', '2023-07-26 04:50:57', NULL),
(11, 2, 'test', '2023-08-01 01:07:34', '2023-08-01 01:07:34', NULL),
(12, 2, 'hi', '2023-08-01 15:06:51', '2023-08-01 15:06:51', NULL),
(13, 2, 'ok', '2023-08-01 15:10:44', '2023-08-01 15:10:44', NULL),
(14, 2, 'oke', '2023-08-14 13:33:56', '2023-08-14 13:33:56', NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_23_001336_create_products_table', 1),
(6, '2023_06_29_094226_create_diseases_table', 1),
(7, '2023_06_29_094332_create_therapies_table', 1),
(8, '2023_06_29_095220_create_roles_table', 1),
(9, '2023_06_29_100315_create_diagnostics_table', 1),
(10, '2023_06_29_100802_create_stores_table', 1),
(11, '2023_06_29_100936_create_branches_table', 1),
(12, '2023_06_29_101200_create_reports_table', 1),
(13, '2023_06_29_101324_create_prices_table', 1),
(14, '2023_06_29_101503_create_posts_table', 1),
(15, '2023_06_29_101714_create_comments_table', 1),
(16, '2023_06_29_101859_create_feedback_table', 1),
(17, '2023_06_29_104518_create_orders_table', 1),
(18, '2023_06_29_111009_create_details_table', 1),
(19, '2023_06_29_112048_create_chats_table', 1),
(20, '2023_06_29_112216_create_messages_table', 1),
(21, '2023_06_29_112417_create_chat_user_table', 1),
(22, '2023_07_18_085625_create_user_otps_table', 1),
(23, '0000_00_00_000000_create_websockets_statistics_entries_table', 2),
(24, '2023_07_24_093937_create_messages_table', 2),
(25, '2023_08_09_005617_create_carts_table', 3),
(26, '2023_08_11_152407_create_addresses_table', 4),
(27, '2023_08_15_132246_create_signatures_table', 5),
(28, '2023_08_15_132303_create_payments_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_code` varchar(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` longtext DEFAULT NULL,
  `shipping_fee` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `paid` int(2) NOT NULL COMMENT '1 là thanh toán rồi, 0 là chưa thanh toán',
  `payment` int(2) NOT NULL COMMENT '1 là thanh toán bằng payvn, 2 là thanh toán sau khi nhận hàng	',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `user_id`, `store_id`, `address_id`, `status`, `description`, `shipping_fee`, `total`, `paid`, `payment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'OR4473', 3, 1, 3, 3, 'test user mb 02 order 03', 90000, 340000, 0, 0, '2023-08-12 21:26:16', '2023-08-13 07:47:08', NULL),
(2, 'OR9607', 3, 1, 3, 4, 'test user mb 02 order 03', 90000, 340000, 0, 0, '2023-08-12 21:27:57', '2023-08-13 23:34:56', NULL),
(3, 'OR7806', 3, 1, 3, 3, 'test user mb 02 order 03', 90000, 340000, 0, 0, '2023-08-12 21:30:11', '2023-08-13 23:23:57', NULL),
(4, 'OR3555', 3, 1, 3, 3, 'test user mb 02 order 03', 90000, 340000, 0, 0, '2023-08-12 21:31:52', '2023-08-13 16:10:37', NULL),
(5, 'OR7748', 9, 1, 3, 3, 'test user mb 02 order 03', 90000, 340000, 0, 0, '2023-08-12 21:32:32', '2023-08-13 23:23:50', NULL),
(6, 'OR8592', 3, 1, 3, 3, 'test user mb 02 order 03', 90000, 340000, 0, 0, '2023-08-13 05:14:07', '2023-08-13 07:47:15', NULL),
(7, 'OR2390', 3, 1, 3, 4, 'Bệnh sâu đục thân', 90000, 340000, 0, 0, '2023-08-13 05:14:11', '2023-08-13 23:27:32', NULL),
(8, 'OR2027', 3, 1, 3, 4, 'Bệnh nấm', 90000, 340000, 0, 0, '2023-08-13 05:21:25', '2023-08-13 23:26:43', NULL),
(9, 'OR5198', 9, 6, 32, 3, NULL, 90000, 410000, 0, 0, '2023-08-13 05:28:27', '2023-08-17 02:27:10', NULL),
(10, 'OR2850', 9, 6, 32, 4, NULL, 90000, 410000, 0, 0, '2023-08-13 06:18:35', '2023-08-17 02:32:04', NULL),
(11, 'OR4350', 22, 1, 3, 4, 'Bệnh rầy', 90000, 1210000, 0, 0, '2023-08-13 08:29:50', '2023-08-13 23:26:38', NULL),
(12, 'OR3142', 13, 3, 34, 3, NULL, 90000, 1110000, 0, 0, '2023-08-13 15:17:21', '2023-08-17 02:06:58', NULL),
(13, 'OR4549', 13, 3, 34, 1, NULL, 90000, 1450000, 0, 0, '2023-08-13 15:29:46', '2023-08-13 15:29:46', NULL),
(14, 'OR2263', 13, 3, 34, 1, NULL, 90000, 290000, 0, 0, '2023-08-13 16:19:18', '2023-08-13 16:19:18', NULL),
(15, 'OR4798', 13, 3, 34, 1, NULL, 90000, 430000, 0, 0, '2023-08-13 16:20:21', '2023-08-13 16:20:21', NULL),
(16, 'OR4822', 13, 3, 34, 1, NULL, 90000, 430000, 0, 0, '2023-08-13 16:21:36', '2023-08-13 16:21:36', NULL),
(17, 'OR7813', 13, 2, 34, 1, NULL, 90000, 230000, 0, 0, '2023-08-13 16:23:02', '2023-08-13 16:23:02', NULL),
(18, 'OR6662', 13, 2, 34, 3, NULL, 90000, 590000, 0, 0, '2023-08-13 16:32:40', '2023-08-13 16:36:19', NULL),
(19, 'OR9612', 13, 2, 34, 1, NULL, 90000, 590000, 0, 0, '2023-08-13 16:33:19', '2023-08-13 16:33:19', NULL),
(20, 'OR6934', 13, 1, 34, 4, NULL, 90000, 830000, 0, 0, '2023-08-13 16:42:34', '2023-08-13 23:26:21', NULL),
(21, 'OR7860', 13, 1, 34, 4, 'test1', 90000, 460000, 0, 0, '2023-08-13 16:44:30', '2023-08-13 23:25:33', NULL),
(22, 'OR6790', 13, 1, 34, 4, NULL, 90000, 460000, 0, 0, '2023-08-13 23:31:43', '2023-08-13 23:32:08', NULL),
(23, 'OR3772', 13, 1, 34, 4, NULL, 90000, 1940000, 0, 0, '2023-08-13 23:32:45', '2023-08-13 23:33:18', NULL),
(24, 'OR8396', 13, 1, 34, 2, NULL, 90000, 830000, 0, 0, '2023-08-13 23:38:54', '2023-08-13 23:44:25', NULL),
(25, 'OR7851', 13, 1, 34, 3, NULL, 90000, 460000, 0, 0, '2023-08-13 23:39:41', '2023-08-13 23:44:08', NULL),
(26, 'OR7158', 13, 1, 34, 2, NULL, 90000, 460000, 0, 0, '2023-08-13 23:42:20', '2023-08-13 23:42:43', NULL),
(27, 'OR6924', 13, 1, 34, 3, NULL, 90000, 340000, 0, 0, '2023-08-13 23:45:41', '2023-08-13 23:46:48', NULL),
(28, 'OR3973', 13, 1, 34, 2, NULL, 90000, 340000, 0, 0, '2023-08-13 23:47:40', '2023-08-13 23:48:13', NULL),
(29, 'OR8314', 13, 1, 34, 1, NULL, 90000, 340000, 0, 0, '2023-08-13 23:48:46', '2023-08-13 23:48:46', NULL),
(30, 'OR2460', 13, 1, 34, 4, NULL, 90000, 590000, 0, 0, '2023-08-13 23:50:19', '2023-08-13 23:51:52', NULL),
(31, 'OR7167', 13, 1, 34, 1, NULL, 90000, 1090000, 0, 0, '2023-08-13 23:52:09', '2023-08-13 23:52:09', NULL),
(32, 'OR6945', 13, 1, 34, 4, NULL, 90000, 840000, 0, 0, '2023-08-13 23:53:25', '2023-08-13 23:53:58', NULL),
(33, 'OR2624', 13, 1, 34, 1, NULL, 90000, 1590000, 0, 0, '2023-08-13 23:54:28', '2023-08-13 23:54:28', NULL),
(34, 'OR2677', 13, 1, 34, 1, NULL, 90000, 830000, 0, 0, '2023-08-13 23:55:06', '2023-08-13 23:55:06', NULL),
(35, 'OR1541', 13, 1, 34, 1, NULL, 90000, 1570000, 0, 0, '2023-08-13 23:55:43', '2023-08-13 23:55:43', NULL),
(36, 'OR8607', 13, 1, 34, 1, NULL, 90000, 90006, 0, 0, '2023-08-13 23:57:47', '2023-08-13 23:57:47', NULL),
(37, 'OR3725', 13, 1, 34, 1, NULL, 90000, 830000, 0, 0, '2023-08-14 13:18:20', '2023-08-14 13:20:55', NULL),
(38, 'OR5681', 13, 1, 34, 3, 'anh quang test', 90000, 1200000, 0, 0, '2023-08-14 13:24:57', '2023-08-14 13:26:02', NULL),
(39, 'OR3947', 13, 1, 34, 3, NULL, 90000, 460000, 0, 0, '2023-08-14 13:36:17', '2023-08-14 13:36:41', NULL),
(40, 'OR9853', 3, 1, 3, 4, 'Bệnh rầy', 90000, 710000, 0, 0, '2023-08-15 04:57:44', '2023-08-15 04:59:34', NULL),
(41, 'OR3048', 3, 1, 3, 3, 'Test thanh toan vnpay', 90000, 710000, 1, 1, '2023-08-16 04:21:37', '2023-08-17 02:12:04', NULL),
(42, 'OR4611', 13, 6, 34, 1, NULL, 90000, 410000, 0, 2, '2023-08-17 02:22:25', '2023-08-17 02:22:25', NULL),
(43, 'OR8191', 9, 2, 32, 1, NULL, 90000, 370000, 0, 2, '2023-08-17 03:49:54', '2023-08-17 03:49:54', NULL),
(44, 'OR5844', 9, 1, 3, 1, 'Bệnh rầy', 90000, 1710000, 0, 2, '2023-08-17 03:50:22', '2023-08-17 03:50:22', NULL),
(45, 'OR4645', 9, 1, 3, 1, 'Bệnh rầy', 90000, 1710000, 0, 2, '2023-08-17 04:15:49', '2023-08-17 04:15:49', NULL),
(46, 'OR9786', 9, 1, 32, 1, NULL, 90000, 460000, 0, 2, '2023-08-17 05:10:57', '2023-08-17 05:10:57', NULL),
(47, 'OR7553', 9, 1, 32, 1, NULL, 90000, 460000, 0, 2, '2023-08-17 05:12:22', '2023-08-17 05:12:22', NULL),
(48, 'OR3901', 9, 1, 32, 1, NULL, 90000, 460000, 0, 2, '2023-08-17 05:14:04', '2023-08-17 05:14:04', NULL),
(49, 'OR6466', 9, 1, 32, 1, NULL, 90000, 460000, 0, 2, '2023-08-17 05:14:19', '2023-08-17 05:14:19', NULL),
(50, 'OR8739', 9, 1, 32, 1, NULL, 90000, 460000, 0, 2, '2023-08-17 05:15:53', '2023-08-17 05:15:53', NULL),
(51, 'OR3931', 9, 1, 32, 1, NULL, 90000, 460000, 0, 2, '2023-08-17 05:16:52', '2023-08-17 05:16:52', NULL),
(52, 'OR9973', 9, 1, 32, 1, NULL, 90000, 460000, 0, 1, '2023-08-17 05:17:05', '2023-08-17 05:17:05', NULL),
(53, 'OR4988', 9, 1, 32, 1, NULL, 90000, 460000, 0, 1, '2023-08-17 05:20:55', '2023-08-17 05:20:55', NULL),
(54, 'OR6261', 9, 1, 3, 1, 'Bệnh rầy', 90000, 460000, 1, 1, '2023-08-17 05:24:00', '2023-08-17 05:24:31', NULL),
(55, 'OR3011', 9, 1, 3, 1, 'Bệnh rầy', 90000, 460000, 1, 1, '2023-08-17 05:26:36', '2023-08-17 05:27:16', NULL),
(56, 'OR8281', 9, 1, 32, 1, NULL, 90000, 460000, 0, 1, '2023-08-17 05:37:11', '2023-08-17 05:37:11', NULL),
(57, 'OR4144', 9, 1, 32, 1, NULL, 90000, 460000, 0, 1, '2023-08-17 05:42:19', '2023-08-17 05:42:19', NULL),
(58, 'OR1568', 3, 1, 3, 1, 'Test thanh toan vnpay', 90000, 710000, 1, 1, '2023-08-17 05:43:34', '2023-08-17 05:44:50', NULL),
(59, 'OR2958', 9, 1, 3, 1, NULL, 90000, 460000, 0, 1, '2023-08-17 05:46:08', '2023-08-17 05:46:08', NULL),
(60, 'OR8952', 9, 1, 3, 1, NULL, 90000, 460000, 1, 1, '2023-08-17 05:47:04', '2023-08-17 05:47:42', NULL),
(61, 'OR7481', 9, 2, 32, 1, NULL, 90000, 450000, 0, 1, '2023-08-17 05:50:47', '2023-08-17 05:50:47', NULL),
(62, 'OR5746', 9, 2, 32, 1, NULL, 90000, 450000, 0, 2, '2023-08-17 05:54:29', '2023-08-17 05:54:29', NULL),
(63, 'OR3101', 9, 2, 32, 1, NULL, 90000, 450000, 0, 1, '2023-08-17 05:54:40', '2023-08-17 05:54:40', NULL),
(64, 'OR1975', 9, 2, 32, 1, NULL, 90000, 450000, 1, 1, '2023-08-17 05:58:05', '2023-08-17 05:58:46', NULL),
(65, 'OR4105', 3, 1, 3, 1, 'Test thanh toan vnpay new url', 90000, 710000, 1, 1, '2023-08-17 06:22:51', '2023-08-17 06:23:39', NULL),
(66, 'OR4363', 9, 1, 32, 1, NULL, 90000, 460000, 1, 1, '2023-08-17 06:33:24', '2023-08-17 06:34:03', NULL),
(67, 'OR6182', 9, 1, 32, 1, NULL, 90000, 460000, 0, 1, '2023-08-17 06:36:27', '2023-08-17 06:36:27', NULL),
(68, 'OR1607', 9, 1, 32, 1, NULL, 90000, 460000, 0, 1, '2023-08-17 06:36:32', '2023-08-17 06:36:32', NULL),
(69, 'OR2859', 13, 6, 34, 1, NULL, 90000, 410000, 0, 1, '2023-08-17 17:07:08', '2023-08-17 17:07:08', NULL),
(70, 'OR7169', 13, 6, 34, 1, NULL, 90000, 410000, 0, 1, '2023-08-17 17:08:45', '2023-08-17 17:08:45', NULL),
(71, 'OR6651', 13, 6, 34, 1, NULL, 90000, 410000, 0, 1, '2023-08-17 17:11:00', '2023-08-17 17:11:00', NULL),
(72, 'OR2566', 3, 1, 3, 1, 'Bệnh rầy', 90000, 710000, 1, 1, '2023-08-17 17:11:35', '2023-08-17 17:19:54', NULL),
(73, 'OR6720', 13, 6, 34, 1, NULL, 90000, 410000, 0, 1, '2023-08-17 17:11:37', '2023-08-17 17:11:37', NULL),
(74, 'OR2942', 13, 6, 34, 1, NULL, 90000, 410000, 1, 1, '2023-08-17 17:12:12', '2023-08-17 17:13:20', NULL),
(75, 'OR3913', 13, 1, 34, 1, NULL, 90000, 460123, 0, 2, '2023-08-17 17:16:26', '2023-08-17 17:16:26', NULL),
(76, 'OR7832', 13, 1, 34, 1, NULL, 90000, 460000, 1, 1, '2023-08-17 17:16:51', '2023-08-17 17:17:41', NULL),
(77, 'OR2086', 9, 1, 32, 1, NULL, 90000, 460000, 1, 1, '2023-08-17 18:07:33', '2023-08-17 18:12:24', NULL),
(78, 'OR6837', 13, 2, 34, 1, NULL, 90000, 450000, 0, 2, '2023-08-17 18:37:11', '2023-08-17 18:37:11', NULL),
(79, 'OR8542', 13, 1, 34, 1, NULL, 90000, 340000, 1, 1, '2023-08-17 18:37:50', '2023-08-17 18:39:44', NULL),
(80, 'OR1769', 13, 1, 34, 2, NULL, 90000, 460000, 1, 1, '2023-08-17 19:27:15', '2023-08-17 19:29:55', NULL),
(81, 'OR2200', 13, 1, 34, 1, NULL, 90000, 460000, 0, 2, '2023-08-17 19:29:05', '2023-08-17 19:29:05', NULL),
(82, 'OR7526', 13, 1, 34, 1, NULL, 90000, 102345, 0, 2, '2023-08-17 19:42:39', '2023-08-17 19:42:39', NULL),
(83, 'OR9457', 13, 1, 34, 1, NULL, 90000, 102345, 0, 2, '2023-08-17 19:42:57', '2023-08-17 19:42:57', NULL),
(84, 'OR1366', 13, 1, 34, 1, NULL, 90000, 102345, 0, 2, '2023-08-17 19:43:04', '2023-08-17 19:43:04', NULL),
(85, 'OR2100', 13, 1, 34, 1, NULL, 90000, 102345, 0, 2, '2023-08-17 19:43:28', '2023-08-17 19:43:28', NULL),
(86, 'OR6306', 13, 1, 34, 1, NULL, 90000, 102345, 0, 2, '2023-08-17 19:43:41', '2023-08-17 19:43:41', NULL),
(87, 'OR7728', 13, 1, 34, 1, NULL, 90000, 460000, 0, 2, '2023-08-18 02:13:01', '2023-08-18 02:13:01', NULL),
(88, 'OR7615', 13, 1, 34, 1, NULL, 90000, 390000, 0, 1, '2023-08-20 22:53:18', '2023-08-20 22:53:18', NULL),
(89, 'OR5333', 13, 1, 34, 1, NULL, 90000, 390000, 0, 1, '2023-08-20 22:53:52', '2023-08-20 22:53:52', NULL),
(90, 'OR9169', 13, 1, 34, 1, NULL, 90000, 390000, 0, 1, '2023-08-20 22:59:01', '2023-08-20 22:59:01', NULL),
(91, 'OR3632', 13, 6, 34, 1, NULL, 90000, 300000, 0, 2, '2023-08-21 04:01:50', '2023-08-21 04:01:50', NULL),
(92, 'OR6430', 13, 1, 34, 1, NULL, 90000, 490000, 0, 2, '2023-08-21 04:23:14', '2023-08-21 04:23:14', NULL),
(93, 'OR2284', 13, 1, 34, 1, NULL, 90000, 340000, 1, 1, '2023-08-21 05:29:10', '2023-08-21 05:31:20', NULL),
(94, 'OR3006', 13, 5, 34, 1, NULL, 90000, 330000, 0, 1, '2023-08-21 06:24:59', '2023-08-21 06:24:59', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `command` text NOT NULL,
  `curr_code` varchar(255) NOT NULL,
  `ip_addr` text NOT NULL,
  `locale` varchar(255) NOT NULL,
  `order_info` text NOT NULL,
  `order_type` varchar(255) NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `bank_code` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `expire_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `amount`, `command`, `curr_code`, `ip_addr`, `locale`, `order_info`, `order_type`, `order_code`, `bank_code`, `create_date`, `expire_date`, `created_at`, `updated_at`) VALUES
(1, 710000, 'pay', 'VND', '123.28.64.237', 'vn', 'Thanh toan GD:OR3048', 'other', 'OR3048', '', '2023-08-16 00:21:37', '2023-08-16 00:36:37', '2023-08-16 04:21:37', '2023-08-16 04:21:37'),
(2, 460000, 'pay', 'VND', '115.72.22.131', 'vn', 'Thanh toan GD:OR9973', 'other', 'OR9973', '', '2023-08-17 01:17:05', '2023-08-17 01:32:05', '2023-08-17 05:17:05', '2023-08-17 05:17:05'),
(3, 460000, 'pay', 'VND', '115.72.22.131', 'vn', 'Thanh toan GD:OR4988', 'other', 'OR4988', '', '2023-08-17 01:20:55', '2023-08-17 01:35:55', '2023-08-17 05:20:55', '2023-08-17 05:20:55'),
(4, 460000, 'pay', 'VND', '115.72.22.131', 'vn', 'Thanh toan GD:OR6261', 'other', 'OR6261', '', '2023-08-17 01:24:00', '2023-08-17 01:39:00', '2023-08-17 05:24:00', '2023-08-17 05:24:00'),
(5, 460000, 'pay', 'VND', '115.72.22.131', 'vn', 'Thanh toan GD:OR3011', 'other', 'OR3011', '', '2023-08-17 01:26:36', '2023-08-17 01:41:36', '2023-08-17 05:26:36', '2023-08-17 05:26:36'),
(6, 460000, 'pay', 'VND', '115.72.22.131', 'vn', 'Thanh toan GD:OR8281', 'other', 'OR8281', '', '2023-08-17 01:37:11', '2023-08-17 01:52:11', '2023-08-17 05:37:11', '2023-08-17 05:37:11'),
(7, 460000, 'pay', 'VND', '115.72.22.131', 'vn', 'Thanh toan GD:OR4144', 'other', 'OR4144', '', '2023-08-17 01:42:19', '2023-08-17 01:57:19', '2023-08-17 05:42:19', '2023-08-17 05:42:19'),
(8, 710000, 'pay', 'VND', '123.28.64.237', 'vn', 'Thanh toan GD:OR1568', 'other', 'OR1568', '', '2023-08-17 01:43:34', '2023-08-17 01:58:34', '2023-08-17 05:43:34', '2023-08-17 05:43:34'),
(9, 460000, 'pay', 'VND', '115.72.22.131', 'vn', 'Thanh toan GD:OR2958', 'other', 'OR2958', '', '2023-08-17 01:46:08', '2023-08-17 02:01:08', '2023-08-17 05:46:08', '2023-08-17 05:46:08'),
(10, 460000, 'pay', 'VND', '115.72.22.131', 'vn', 'Thanh toan GD:OR8952', 'other', 'OR8952', '', '2023-08-17 01:47:04', '2023-08-17 02:02:04', '2023-08-17 05:47:04', '2023-08-17 05:47:04'),
(11, 450000, 'pay', 'VND', '115.72.22.131', 'vn', 'Thanh toan GD:OR7481', 'other', 'OR7481', '', '2023-08-17 01:50:47', '2023-08-17 02:05:47', '2023-08-17 05:50:47', '2023-08-17 05:50:47'),
(12, 450000, 'pay', 'VND', '115.72.22.131', 'vn', 'Thanh toan GD:OR3101', 'other', 'OR3101', '', '2023-08-17 01:54:40', '2023-08-17 02:09:40', '2023-08-17 05:54:40', '2023-08-17 05:54:40'),
(13, 450000, 'pay', 'VND', '115.72.22.131', 'vn', 'Thanh toan GD:OR1975', 'other', 'OR1975', '', '2023-08-17 01:58:05', '2023-08-17 02:13:05', '2023-08-17 05:58:05', '2023-08-17 05:58:05'),
(14, 710000, 'pay', 'VND', '123.28.64.237', 'vn', 'Thanh toan GD:OR4105', 'other', 'OR4105', '', '2023-08-17 02:22:51', '2023-08-17 02:37:51', '2023-08-17 06:22:51', '2023-08-17 06:22:51'),
(15, 460000, 'pay', 'VND', '115.72.22.131', 'vn', 'Thanh toan GD:OR4363', 'other', 'OR4363', '', '2023-08-17 02:33:24', '2023-08-17 02:48:24', '2023-08-17 06:33:24', '2023-08-17 06:33:24'),
(16, 460000, 'pay', 'VND', '115.72.22.131', 'vn', 'Thanh toan GD:OR6182', 'other', 'OR6182', '', '2023-08-17 02:36:27', '2023-08-17 02:51:27', '2023-08-17 06:36:27', '2023-08-17 06:36:27'),
(17, 460000, 'pay', 'VND', '115.72.22.131', 'vn', 'Thanh toan GD:OR1607', 'other', 'OR1607', '', '2023-08-17 02:36:32', '2023-08-17 02:51:32', '2023-08-17 06:36:32', '2023-08-17 06:36:32'),
(18, 410000, 'pay', 'VND', '58.186.196.82', 'vn', 'Thanh toan GD:OR2859', 'other', 'OR2859', '', '2023-08-17 13:07:08', '2023-08-17 13:22:08', '2023-08-17 17:07:08', '2023-08-17 17:07:08'),
(19, 410000, 'pay', 'VND', '58.186.196.82', 'vn', 'Thanh toan GD:OR7169', 'other', 'OR7169', '', '2023-08-17 13:08:45', '2023-08-17 13:23:45', '2023-08-17 17:08:45', '2023-08-17 17:08:45'),
(20, 410000, 'pay', 'VND', '58.186.196.82', 'vn', 'Thanh toan GD:OR6651', 'other', 'OR6651', '', '2023-08-17 13:11:00', '2023-08-17 13:26:00', '2023-08-17 17:11:00', '2023-08-17 17:11:00'),
(21, 710000, 'pay', 'VND', '54.86.50.139', 'vn', 'Thanh toan GD:OR2566', 'other', 'OR2566', '', '2023-08-17 13:11:35', '2023-08-17 13:26:35', '2023-08-17 17:11:35', '2023-08-17 17:11:35'),
(22, 410000, 'pay', 'VND', '58.186.196.82', 'vn', 'Thanh toan GD:OR6720', 'other', 'OR6720', '', '2023-08-17 13:11:37', '2023-08-17 13:26:37', '2023-08-17 17:11:37', '2023-08-17 17:11:37'),
(23, 410000, 'pay', 'VND', '58.186.196.82', 'vn', 'Thanh toan GD:OR2942', 'other', 'OR2942', '', '2023-08-17 13:12:12', '2023-08-17 13:27:12', '2023-08-17 17:12:12', '2023-08-17 17:12:12'),
(24, 460000, 'pay', 'VND', '58.186.196.82', 'vn', 'Thanh toan GD:OR7832', 'other', 'OR7832', '', '2023-08-17 13:16:51', '2023-08-17 13:31:51', '2023-08-17 17:16:51', '2023-08-17 17:16:51'),
(25, 460000, 'pay', 'VND', '222.253.42.176', 'vn', 'Thanh toan GD:OR2086', 'other', 'OR2086', '', '2023-08-17 14:07:33', '2023-08-17 14:22:33', '2023-08-17 18:07:33', '2023-08-17 18:07:33'),
(26, 340000, 'pay', 'VND', '118.69.69.189', 'vn', 'Thanh toan GD:OR8542', 'other', 'OR8542', '', '2023-08-17 14:37:50', '2023-08-17 14:52:50', '2023-08-17 18:37:50', '2023-08-17 18:37:50'),
(27, 460000, 'pay', 'VND', '118.69.69.189', 'vn', 'Thanh toan GD:OR1769', 'other', 'OR1769', '', '2023-08-17 15:27:15', '2023-08-17 15:42:15', '2023-08-17 19:27:15', '2023-08-17 19:27:15'),
(28, 390000, 'pay', 'VND', '14.169.80.195', 'vn', 'Thanh toan GD:OR7615', 'other', 'OR7615', '', '2023-08-20 18:53:18', '2023-08-20 19:08:18', '2023-08-20 22:53:18', '2023-08-20 22:53:18'),
(29, 390000, 'pay', 'VND', '14.169.80.195', 'vn', 'Thanh toan GD:OR5333', 'other', 'OR5333', '', '2023-08-20 18:53:52', '2023-08-20 19:08:52', '2023-08-20 22:53:52', '2023-08-20 22:53:52'),
(30, 390000, 'pay', 'VND', '14.169.80.195', 'vn', 'Thanh toan GD:OR9169', 'other', 'OR9169', '', '2023-08-20 18:59:01', '2023-08-20 19:14:01', '2023-08-20 22:59:01', '2023-08-20 22:59:01'),
(31, 340000, 'pay', 'VND', '14.169.80.195', 'vn', 'Thanh toan GD:OR2284', 'other', 'OR2284', '', '2023-08-21 01:29:10', '2023-08-21 01:44:10', '2023-08-21 05:29:10', '2023-08-21 05:29:10'),
(32, 330000, 'pay', 'VND', '58.186.196.82', 'vn', 'Thanh toan GD:OR3006', 'other', 'OR3006', '', '2023-08-21 02:24:59', '2023-08-21 02:39:59', '2023-08-21 06:24:59', '2023-08-21 06:24:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'App\\Models\\User', 4, 'authTokens', 'f43ffe41b0e9187349a3ddb8c4291601b0e0461af1ddc7ef7890579b2365f0b3', '[\"*\"]', NULL, NULL, '2023-07-18 07:00:51', '2023-07-18 07:00:51', NULL),
(2, 'App\\Models\\User', 4, 'authTokens', '9ce5d4fe28ba334e45d52170c499c460529c5317238088770c885312341845cf', '[\"*\"]', NULL, NULL, '2023-07-18 07:03:14', '2023-07-18 07:03:14', NULL),
(3, 'App\\Models\\User', 4, 'authTokens', '8838648b5925da785ca2e8ac5a78c3ff2dfa32ba64a0d08f151217a5228eb126', '[\"*\"]', '2023-07-18 07:08:13', NULL, '2023-07-18 07:06:35', '2023-07-18 07:08:13', NULL),
(4, 'App\\Models\\User', 4, 'authTokens', '81b467914c108f171fc4421cd8096c4c59b35898eb629c328841fe721b25d86e', '[\"*\"]', NULL, NULL, '2023-07-18 07:08:03', '2023-07-18 07:08:03', NULL),
(5, 'App\\Models\\User', 4, 'authTokens', '276fb382d1ddc1ca4b4c3e2dd93fb248975025d0c21c5cc26ae05274cfba7550', '[\"*\"]', NULL, NULL, '2023-07-18 07:08:23', '2023-07-18 07:08:23', NULL),
(6, 'App\\Models\\User', 4, 'authTokens', '0bdcba1c757c37883fab477a2094dd2f23c0851adfc2c75f5d86133458488242', '[\"*\"]', NULL, NULL, '2023-07-19 00:49:57', '2023-07-19 00:49:57', NULL),
(7, 'App\\Models\\User', 7, 'authTokens', '5acc28d780146727e9faa62339b3818a9db0785af46cb910562a315488f0f1cd', '[\"*\"]', NULL, NULL, '2023-07-20 05:05:20', '2023-07-20 05:05:20', NULL),
(8, 'App\\Models\\User', 7, 'authTokens', 'ec6ce9326d241c230c7459e4025cc3e133bda27a34542efb6d36d041143e41c3', '[\"*\"]', NULL, NULL, '2023-07-20 05:06:37', '2023-07-20 05:06:37', NULL),
(9, 'App\\Models\\User', 7, 'authTokens', '8877d3a12790d175786eb3d853bb47bfcd243d118c9e22803730afef84ce853a', '[\"*\"]', NULL, NULL, '2023-07-23 03:50:58', '2023-07-23 03:50:58', NULL),
(10, 'App\\Models\\User', 7, 'authTokens', 'ed1498b2c1874588a46f6873ec8c0266fd942e9a2495a1a0b81f3e3afce2d3fc', '[\"*\"]', NULL, NULL, '2023-07-23 04:29:18', '2023-07-23 04:29:18', NULL),
(11, 'App\\Models\\User', 9, 'authTokens', '9278131dee551a821499b65f13ccaee70998b3ff5c549e17dbe5b7dd0f2a6b79', '[\"*\"]', NULL, NULL, '2023-07-23 04:41:27', '2023-07-23 04:41:27', NULL),
(12, 'App\\Models\\User', 9, 'authTokens', 'ce0495762cbac3e31c36fb63b01a16b3feb34ef3df7d2155e5571f8086246e5d', '[\"*\"]', NULL, NULL, '2023-07-23 04:41:54', '2023-07-23 04:41:54', NULL),
(13, 'App\\Models\\User', 9, 'authTokens', '81e40e674e6ad55ae0a012e716f6f05f49639b429d621d5ce7fbae2474b49d2c', '[\"*\"]', NULL, NULL, '2023-07-23 06:00:06', '2023-07-23 06:00:06', NULL),
(14, 'App\\Models\\User', 11, 'authTokens', '0a8f7cbf95e3ef31b1eba1ca8b171e39923c9b532b2066ca2810096addd6b7f9', '[\"*\"]', NULL, NULL, '2023-07-24 03:10:36', '2023-07-24 03:10:36', NULL),
(15, 'App\\Models\\User', 11, 'authTokens', '4cefc98716e0c238bc1701b71354d9207975ff8f55a4795d8fca74ce44aa772d', '[\"*\"]', NULL, NULL, '2023-07-24 03:11:57', '2023-07-24 03:11:57', NULL),
(16, 'App\\Models\\User', 11, 'authTokens', '07f575b06400b62242d653f5b15e0afd86abb9dcb5e914ded63a625d1932c9ab', '[\"*\"]', NULL, NULL, '2023-07-24 03:13:05', '2023-07-24 03:13:05', NULL),
(17, 'App\\Models\\User', 11, 'authTokens', '4183c44b848767be53e35c825f59075a30f221d151301102d3fdc50c540256e4', '[\"*\"]', NULL, NULL, '2023-07-24 03:20:55', '2023-07-24 03:20:55', NULL),
(18, 'App\\Models\\User', 11, 'authTokens', 'c088ba96bdd1170340572180342ab26a09d1c7364832ebb2eb0cd1df203c6504', '[\"*\"]', NULL, NULL, '2023-07-24 03:20:55', '2023-07-24 03:20:55', NULL),
(19, 'App\\Models\\User', 11, 'authTokens', '30cec239c2974e6257ca864fa8237d639da73e35d157b347175284645586bec5', '[\"*\"]', NULL, NULL, '2023-07-24 03:23:13', '2023-07-24 03:23:13', NULL),
(20, 'App\\Models\\User', 11, 'authTokens', '56addc374335bd9b9d49a5ad7380f2dfb3b01c85ad7c46bda6dc9147e001752f', '[\"*\"]', NULL, NULL, '2023-07-24 03:28:41', '2023-07-24 03:28:41', NULL),
(21, 'App\\Models\\User', 11, 'authTokens', 'ac30286fa370f0aafd5493ad71ebe027e6c71f996d48e2eebd29851fe7e79b78', '[\"*\"]', NULL, NULL, '2023-07-24 03:29:29', '2023-07-24 03:29:29', NULL),
(22, 'App\\Models\\User', 12, 'authTokens', 'eb255f6e40b9a308e27ee4ecb9fe140ac7f3b59e9f3d45032e137531e1367261', '[\"*\"]', '2023-07-24 03:45:43', NULL, '2023-07-24 03:44:28', '2023-07-24 03:45:43', NULL),
(23, 'App\\Models\\User', 13, 'authTokens', '56b2d4f95f753debda42a70b301e46239c9fb58c5cbf7859df93337c032f0841', '[\"*\"]', NULL, NULL, '2023-07-24 04:18:01', '2023-07-24 04:18:01', NULL),
(24, 'App\\Models\\User', 9, 'authTokens', '37a9e28ab11d0014fd2977d03356030a42d221dc130a8d3cb57fe406b1739d33', '[\"*\"]', NULL, NULL, '2023-07-24 04:23:17', '2023-07-24 04:23:17', NULL),
(25, 'App\\Models\\User', 13, 'authTokens', '478ce82e90dc82cd7cc31f463cfd5b0e1adbb8478dda09974c8571c199e9f43a', '[\"*\"]', NULL, NULL, '2023-07-25 17:34:26', '2023-07-25 17:34:26', NULL),
(26, 'App\\Models\\User', 13, 'authTokens', '53fbb189d522e33e728ef3ad1a0f26a1f95bb3df8add0e2fa162e14ced0fa0fd', '[\"*\"]', NULL, NULL, '2023-07-25 18:09:55', '2023-07-25 18:09:55', NULL),
(27, 'App\\Models\\User', 13, 'authTokens', 'f8f2eea4009dbc7766750a85be4b889a6205e2c7e14163e68d9d208da8f976be', '[\"*\"]', NULL, NULL, '2023-07-25 19:06:09', '2023-07-25 19:06:09', NULL),
(28, 'App\\Models\\User', 3, 'authTokens', 'aedec0d1997b394db586e103171969b47be76c740d1ebb5ea17a9b3c682eb08a', '[\"*\"]', '2023-07-26 03:09:30', NULL, '2023-07-26 03:00:53', '2023-07-26 03:09:30', NULL),
(29, 'App\\Models\\User', 3, 'authTokens', '6f937c1bf86481e6be80cb8616b55ee20de9c67a0641037a76c22d852b1894e4', '[\"*\"]', '2023-07-26 04:52:06', NULL, '2023-07-26 03:14:42', '2023-07-26 04:52:06', NULL),
(30, 'App\\Models\\User', 3, 'authTokens', '871622f3b69aace0b46b688cca7f229ea75cb42e0dae5b92a2d827d0f568c918', '[\"*\"]', '2023-07-27 01:12:33', NULL, '2023-07-26 05:57:53', '2023-07-27 01:12:33', NULL),
(31, 'App\\Models\\User', 9, 'authTokens', '3b26ba64831844cfaaa72452e5f38849b2d68dec339eefc5d3a6d6ef06d8175c', '[\"*\"]', '2023-07-27 01:11:34', NULL, '2023-07-26 06:10:13', '2023-07-27 01:11:34', NULL),
(32, 'App\\Models\\User', 9, 'authTokens', '43926b5bb73a388ecef7cc88b7d3dbfa5116d47b15033429191b53e72602e65a', '[\"*\"]', '2023-07-27 01:12:54', NULL, '2023-07-27 01:12:44', '2023-07-27 01:12:54', NULL),
(33, 'App\\Models\\User', 9, 'authTokens', '5720700866419b64051d6eec1ebd14097a65c106f78d5ea097d90624038aa848', '[\"*\"]', NULL, NULL, '2023-07-27 01:28:52', '2023-07-27 01:28:52', NULL),
(34, 'App\\Models\\User', 9, 'authTokens', '0f4b74db0592855317a505480301aade7c7255694b7611d994eea0ec4b782e27', '[\"*\"]', NULL, NULL, '2023-07-27 02:23:52', '2023-07-27 02:23:52', NULL),
(35, 'App\\Models\\User', 3, 'authTokens', 'c552b30cb818b74d53e21f2b5c0122ee8b80b6b21c272c82fc7dac10fd62832b', '[\"*\"]', '2023-07-27 18:48:18', NULL, '2023-07-27 18:21:18', '2023-07-27 18:48:18', NULL),
(36, 'App\\Models\\User', 9, 'authTokens', '0868f3a8f82fabd5f8885dc33e9949a7def45385dd7618b5f932ca93599b5b33', '[\"*\"]', '2023-08-01 04:47:41', NULL, '2023-07-31 05:19:58', '2023-08-01 04:47:41', NULL),
(37, 'App\\Models\\User', 13, 'authTokens', '4db803ceb40288bebabe565c77c6d6d918887e6402d23ff34b5251d8a0f587d9', '[\"*\"]', NULL, NULL, '2023-08-01 00:38:57', '2023-08-01 00:38:57', NULL),
(38, 'App\\Models\\User', 13, 'authTokens', 'e5425bc0061f1385d2326bf724b35291b1da99e9360f08bf215efbb97ba1f94d', '[\"*\"]', NULL, NULL, '2023-08-01 00:40:30', '2023-08-01 00:40:30', NULL),
(39, 'App\\Models\\User', 13, 'authTokens', '49de6fceabbafc9200d13dc6d9899956201257fd595e1257b567b5076f3b86c1', '[\"*\"]', NULL, NULL, '2023-08-01 00:47:41', '2023-08-01 00:47:41', NULL),
(40, 'App\\Models\\User', 13, 'authTokens', 'd8c9682c90852df69dbd7d9a2a6aa96b2ebf7460a7a8f433c88b3151069270ad', '[\"*\"]', NULL, NULL, '2023-08-01 01:06:07', '2023-08-01 01:06:07', NULL),
(41, 'App\\Models\\User', 13, 'authTokens', '81eb5729cf88d5d782031cf080a3a95b80267bd1a4b66f2cd2e31044a5069350', '[\"*\"]', NULL, NULL, '2023-08-01 01:16:12', '2023-08-01 01:16:12', NULL),
(42, 'App\\Models\\User', 9, 'authTokens', '8a1b7982deb375e07f6003eb9d0c262e9e0b76a13a44a6ac6aa8c31d05130a42', '[\"*\"]', NULL, NULL, '2023-08-01 03:53:47', '2023-08-01 03:53:47', NULL),
(43, 'App\\Models\\User', 9, 'authTokens', 'e49b6b1289500e5a06f8f47b68cb53fc298950cdcb36a6f07a4576406fea1e7c', '[\"*\"]', NULL, NULL, '2023-08-01 03:54:26', '2023-08-01 03:54:26', NULL),
(44, 'App\\Models\\User', 9, 'authTokens', 'e44d63c52d436d5608b342c86593ff52c51fa615a81e2254226c367d58016b1d', '[\"*\"]', NULL, NULL, '2023-08-01 04:25:52', '2023-08-01 04:25:52', NULL),
(45, 'App\\Models\\User', 9, 'authTokens', '561c50753fe408f4cd11864cf1f6149b37d94b16b7d01bfa6a870ba1163f456c', '[\"*\"]', '2023-08-01 05:16:03', NULL, '2023-08-01 04:45:13', '2023-08-01 05:16:03', NULL),
(46, 'App\\Models\\User', 9, 'authTokens', '9013e953dc0cd2b5c9e98ac0d8a5859a6c97a75ff39b62dc8714dc80b4cdde88', '[\"*\"]', NULL, NULL, '2023-08-01 05:02:06', '2023-08-01 05:02:06', NULL),
(47, 'App\\Models\\User', 9, 'authTokens', 'dc1abb69a424c3e818321327b316ba8358353c613331cf3d220ecd5ef6b7dd38', '[\"*\"]', '2023-08-01 06:52:48', NULL, '2023-08-01 05:17:53', '2023-08-01 06:52:48', NULL),
(48, 'App\\Models\\User', 9, 'authTokens', 'a5017360cebe2d2c9a443e00b387e80bc9d8d16df135500bbb9b4da30572590c', '[\"*\"]', '2023-08-01 05:45:12', NULL, '2023-08-01 05:34:17', '2023-08-01 05:45:12', NULL),
(49, 'App\\Models\\User', 9, 'authTokens', '86efe634141b1ba3556c977e856a9e4c91342d7955e8074a9ece1e0ab12be48c', '[\"*\"]', NULL, NULL, '2023-08-01 05:43:48', '2023-08-01 05:43:48', NULL),
(50, 'App\\Models\\User', 9, 'authTokens', 'c9c9894c8f3e2bf4e6938bbcd2135c5988459897e5e771cd6a7d0ea41ef7a47f', '[\"*\"]', NULL, NULL, '2023-08-01 06:19:47', '2023-08-01 06:19:47', NULL),
(51, 'App\\Models\\User', 3, 'authTokens', '8eeabf5a69b9f06450e186df89fcd3190d1b3644a60af9c42809412437d99218', '[\"*\"]', '2023-08-01 18:01:48', NULL, '2023-08-01 06:27:08', '2023-08-01 18:01:48', NULL),
(52, 'App\\Models\\User', 9, 'authTokens', '5c2373a779716f561412b17b74da08e1e42758d2b12e9f85501744fa1b447144', '[\"*\"]', '2023-08-01 06:28:52', NULL, '2023-08-01 06:28:41', '2023-08-01 06:28:52', NULL),
(53, 'App\\Models\\User', 9, 'authTokens', 'b9247de98f08bf3bfe0b9d8af19377c83d85e8d6a39f601baad256b79d4c59b2', '[\"*\"]', NULL, NULL, '2023-08-01 06:35:51', '2023-08-01 06:35:51', NULL),
(54, 'App\\Models\\User', 9, 'authTokens', '09d28048691fb2d1d8dd280b9d5d93e0ca0217ae1c691cb459af5659817c406d', '[\"*\"]', NULL, NULL, '2023-08-01 06:37:26', '2023-08-01 06:37:26', NULL),
(55, 'App\\Models\\User', 9, 'authTokens', 'f19c4716cdedb53c73417949568fa902116ba57f557378ac488ec2de9641287c', '[\"*\"]', NULL, NULL, '2023-08-01 06:41:03', '2023-08-01 06:41:03', NULL),
(56, 'App\\Models\\User', 9, 'authTokens', '4826da7e198b3587697939ecaf9e5820ba736dfb34d844e55cb518c9dbc89a7c', '[\"*\"]', '2023-08-01 14:18:31', NULL, '2023-08-01 14:18:03', '2023-08-01 14:18:31', NULL),
(57, 'App\\Models\\User', 13, 'authTokens', '1823393ca18b2d8bcc84015a53b224901e7fdb69600227c99a6e1af19a92add0', '[\"*\"]', NULL, NULL, '2023-08-01 14:24:45', '2023-08-01 14:24:45', NULL),
(58, 'App\\Models\\User', 13, 'authTokens', '90fa5c374dc778f40814f56bcc4d71aecb94389389fc2436c29ffd53481d9572', '[\"*\"]', '2023-08-01 22:36:22', NULL, '2023-08-01 15:45:14', '2023-08-01 22:36:22', NULL),
(59, 'App\\Models\\User', 3, 'authTokens', 'b3b049caa17835fa4b3d2b12567e5ed68e94d8685f11795b4a547f6bcc0d5d1c', '[\"*\"]', '2023-08-02 01:18:56', NULL, '2023-08-02 01:11:34', '2023-08-02 01:18:56', NULL),
(60, 'App\\Models\\User', 3, 'authTokens', 'f75df712cdfb0e060fc7c2d7ae450aee5287c3cf8aaa8d51beeadf2c682bbbe9', '[\"*\"]', NULL, NULL, '2023-08-02 12:50:24', '2023-08-02 12:50:24', NULL),
(61, 'App\\Models\\User', 3, 'authTokens', '0e92845974c5bfad095046c7cd1e08125b3063deafea9eafe49f13eaa19c2521', '[\"*\"]', '2023-08-02 15:01:13', NULL, '2023-08-02 14:45:59', '2023-08-02 15:01:13', NULL),
(62, 'App\\Models\\User', 3, 'authTokens', '9369d4c1fb56abd44c5099a8921cb84387ac5f32a98713037999559a2460f94f', '[\"*\"]', '2023-08-02 15:04:57', NULL, '2023-08-02 15:04:37', '2023-08-02 15:04:57', NULL),
(63, 'App\\Models\\User', 9, 'authTokens', '820d1db91dc0f76ae306c6667e880b473ec2018a04537ab2c7dcb8ac78fc7e82', '[\"*\"]', '2023-08-04 04:17:33', NULL, '2023-08-04 04:17:21', '2023-08-04 04:17:33', NULL),
(64, 'App\\Models\\User', 9, 'authTokens', 'a2363d2fce56346fc40aa4bce5c91a6cfaaaaec32600ee09322ef734468fdb77', '[\"*\"]', NULL, NULL, '2023-08-04 04:18:49', '2023-08-04 04:18:49', NULL),
(65, 'App\\Models\\User', 9, 'authTokens', 'a22718a0078932c5fe20c0e4b494d86760c04cb38a9df746ecc90ffdb0d174bf', '[\"*\"]', NULL, NULL, '2023-08-04 04:27:36', '2023-08-04 04:27:36', NULL),
(66, 'App\\Models\\User', 9, 'authTokens', 'a34924a3d5bf76bf6e40c6fdeee51c0d153b98e700008f83b28a51ec3d2203af', '[\"*\"]', '2023-08-04 05:31:45', NULL, '2023-08-04 04:27:55', '2023-08-04 05:31:45', NULL),
(67, 'App\\Models\\User', 9, 'authTokens', 'eaffec9546753c28d3b4e72606870434841ca37762d70921882a2b1e32b20cc9', '[\"*\"]', '2023-08-04 05:02:12', NULL, '2023-08-04 04:30:31', '2023-08-04 05:02:12', NULL),
(68, 'App\\Models\\User', 9, 'authTokens', '0693a3542bccd92a3dfa0c9fa63f14acd6a1494b92d8ec98a68dbe2f4c10ebc2', '[\"*\"]', '2023-08-04 06:09:04', NULL, '2023-08-04 05:12:41', '2023-08-04 06:09:04', NULL),
(69, 'App\\Models\\User', 9, 'authTokens', '4ed68ce6223d5c614ab5725adb885fc84487632766976a698a7db79809460aba', '[\"*\"]', '2023-08-04 20:57:32', NULL, '2023-08-04 05:31:52', '2023-08-04 20:57:32', NULL),
(70, 'App\\Models\\User', 9, 'authTokens', '4f5043ecf69f009683c6c44a5eaa5f040c3e6e827c22491f0fb0c9aefe19a50a', '[\"*\"]', NULL, NULL, '2023-08-04 14:52:24', '2023-08-04 14:52:24', NULL),
(71, 'App\\Models\\User', 9, 'authTokens', '7738756c0b69c3c3041fddc6c5e0c2c3722507ebee76db24ced76f7a1c93587b', '[\"*\"]', NULL, NULL, '2023-08-04 14:55:57', '2023-08-04 14:55:57', NULL),
(72, 'App\\Models\\User', 13, 'authTokens', 'b69836290778cf9d05a6ba37b2e020fe5958b154333f6da162b15f94b531336e', '[\"*\"]', '2023-08-04 16:01:39', NULL, '2023-08-04 15:14:41', '2023-08-04 16:01:39', NULL),
(73, 'App\\Models\\User', 9, 'authTokens', 'f903280d43534ebd070421586694b8428fbc520b6145115be09c3704f4bf7b16', '[\"*\"]', NULL, NULL, '2023-08-04 15:23:26', '2023-08-04 15:23:26', NULL),
(74, 'App\\Models\\User', 9, 'authTokens', 'cdbd4977849d48c56753ebbbf02461ddf1ab901d218fb481ea6f11fcd9e320c1', '[\"*\"]', NULL, NULL, '2023-08-04 15:51:42', '2023-08-04 15:51:42', NULL),
(75, 'App\\Models\\User', 9, 'authTokens', 'e2f070645d9ffa31506f1db3e89a8d1e8efe32d556b9c2ab30da4f62d1f778f6', '[\"*\"]', NULL, NULL, '2023-08-04 15:58:06', '2023-08-04 15:58:06', NULL),
(76, 'App\\Models\\User', 9, 'authTokens', '1691a6dc5ad48b80082a3de6a69d70b4a0c16e8b048d440f50f79f82b5650b21', '[\"*\"]', NULL, NULL, '2023-08-04 16:18:11', '2023-08-04 16:18:11', NULL),
(77, 'App\\Models\\User', 9, 'authTokens', 'fac72d6e286b80c2687b4517d88e0aae9f831ceb8c1deca7a6f4aee1a2e896f1', '[\"*\"]', NULL, NULL, '2023-08-04 16:23:02', '2023-08-04 16:23:02', NULL),
(78, 'App\\Models\\User', 3, 'authTokens', '7557b7cca5e6c4d1040cf058a51763bd709d6ce3f8931ad51ba25a38a537ce7d', '[\"*\"]', NULL, NULL, '2023-08-04 16:30:25', '2023-08-04 16:30:25', NULL),
(79, 'App\\Models\\User', 9, 'authTokens', '6b31a3d7f611ac130dcfd6db7d0ea1b6a091bc1c0806cac92c6dbde7ba6d63b8', '[\"*\"]', NULL, NULL, '2023-08-04 16:40:06', '2023-08-04 16:40:06', NULL),
(80, 'App\\Models\\User', 9, 'authTokens', '3cdb0728b4a3d9c05b69b2da80f4f76b44413d40754d87c5708614990030d1ae', '[\"*\"]', NULL, NULL, '2023-08-04 17:34:50', '2023-08-04 17:34:50', NULL),
(81, 'App\\Models\\User', 9, 'authTokens', 'd0f5efd4fdd3323b0b7ddbe28ad06d3bb6ccae1642e2d2f8eb628a5a889a2a48', '[\"*\"]', NULL, NULL, '2023-08-04 18:28:09', '2023-08-04 18:28:09', NULL),
(82, 'App\\Models\\User', 9, 'authTokens', '84f5b0935840c14d661ea3a200487a58192b83a9592d7e9d3d19d3261bc187ea', '[\"*\"]', NULL, NULL, '2023-08-04 18:44:52', '2023-08-04 18:44:52', NULL),
(83, 'App\\Models\\User', 9, 'authTokens', '0f30ded2027568f29db3bde530848c2a175c25745f1d32c473fcae5bd82e2b0f', '[\"*\"]', NULL, NULL, '2023-08-04 19:05:21', '2023-08-04 19:05:21', NULL),
(84, 'App\\Models\\User', 9, 'authTokens', 'a86923631ad5ae3d4a61b96c647bf9878cc036c7cdd095a466da8a9b5757e009', '[\"*\"]', '2023-08-04 20:56:24', NULL, '2023-08-04 20:56:17', '2023-08-04 20:56:24', NULL),
(85, 'App\\Models\\User', 3, 'authTokens', '320d6a22a3ef8b5469368664317e351c108e6f5e48f2da576e3c7709cd87471b', '[\"*\"]', '2023-08-04 21:05:10', NULL, '2023-08-04 20:58:20', '2023-08-04 21:05:10', NULL),
(86, 'App\\Models\\User', 9, 'authTokens', '8244b9da7346b2797f3312d136483e00da8852ed0477b1a6c4125ec7e2784754', '[\"*\"]', NULL, NULL, '2023-08-04 21:25:45', '2023-08-04 21:25:45', NULL),
(87, 'App\\Models\\User', 9, 'authTokens', 'f443b1def3e5b5948468516bdbd08a3a43d1193ff99e7f29389ca2ad8b4a573f', '[\"*\"]', NULL, NULL, '2023-08-04 21:30:13', '2023-08-04 21:30:13', NULL),
(88, 'App\\Models\\User', 9, 'authTokens', '5151c6e672d98cd8424278c341f1d9c53989dc770321758602bacfd6694f0ecd', '[\"*\"]', NULL, NULL, '2023-08-04 21:35:15', '2023-08-04 21:35:15', NULL),
(89, 'App\\Models\\User', 9, 'authTokens', 'e4beb13da89636584a00cc741c591180e9f9a41e60fcb1ebf3846896eebc086f', '[\"*\"]', NULL, NULL, '2023-08-04 21:38:33', '2023-08-04 21:38:33', NULL),
(90, 'App\\Models\\User', 9, 'authTokens', 'a8450ab12abf6fe6fced9984eaff6f82fbdc05268754977d490c0f9bec32db3b', '[\"*\"]', NULL, NULL, '2023-08-04 21:44:51', '2023-08-04 21:44:51', NULL),
(91, 'App\\Models\\User', 9, 'authTokens', '48dfcc2a6f5d04cb1bfb46b34215e1144aa9b967a6165026edb316c8fcfc2c3b', '[\"*\"]', NULL, NULL, '2023-08-04 23:45:15', '2023-08-04 23:45:15', NULL),
(92, 'App\\Models\\User', 9, 'authTokens', '630cb288d144b395dfe43ec2ca9cfebd85b95e9386785078ea3b12bf04c97e4f', '[\"*\"]', NULL, NULL, '2023-08-04 23:54:10', '2023-08-04 23:54:10', NULL),
(93, 'App\\Models\\User', 9, 'authTokens', 'b0ba31cf122a0e1b52dfe4853b8472bc8c9f07917009cedcc0ed874a792f4a91', '[\"*\"]', '2023-08-07 05:32:58', NULL, '2023-08-06 05:40:59', '2023-08-07 05:32:58', NULL),
(94, 'App\\Models\\User', 9, 'authTokens', 'a7cf23b4f21d212aee7c40a0df113d328d49f98f2b188159e84a70fa7b936ac6', '[\"*\"]', '2023-08-07 05:45:39', NULL, '2023-08-06 05:54:29', '2023-08-07 05:45:39', NULL),
(95, 'App\\Models\\User', 9, 'authTokens', 'b4ed07d5623aa5d826102ba833cc3274c978d7f580e71c3cab5190d24437af3e', '[\"*\"]', NULL, NULL, '2023-08-06 18:17:22', '2023-08-06 18:17:22', NULL),
(96, 'App\\Models\\User', 9, 'authTokens', 'ceabae48d354c3c2c20e925b6aa6d029f238b6042a288c77ca276c271a26d30c', '[\"*\"]', NULL, NULL, '2023-08-06 20:30:09', '2023-08-06 20:30:09', NULL),
(97, 'App\\Models\\User', 9, 'authTokens', 'bb31f40f51883012bc21f1849658abb4ccc625f7b0020cb0f0763a92ee1c4480', '[\"*\"]', NULL, NULL, '2023-08-06 20:47:03', '2023-08-06 20:47:03', NULL),
(98, 'App\\Models\\User', 9, 'authTokens', 'cde55225cf936d0157717b1ed1118c66ccb3962b1e9e5f6f780c75d8394839f0', '[\"*\"]', NULL, NULL, '2023-08-06 20:49:17', '2023-08-06 20:49:17', NULL),
(99, 'App\\Models\\User', 9, 'authTokens', '30267e357ad8a0b02116b436dde74612844a8c356fe4868fcb337fb7a697d50e', '[\"*\"]', NULL, NULL, '2023-08-06 20:54:00', '2023-08-06 20:54:00', NULL),
(100, 'App\\Models\\User', 9, 'authTokens', 'c093c2367c7bbeac1c810a209885c5c2e0f2dabf1743e1b4fec90ea23d9edbae', '[\"*\"]', '2023-08-07 06:37:33', NULL, '2023-08-07 02:32:42', '2023-08-07 06:37:33', NULL),
(101, 'App\\Models\\User', 3, 'authTokens', '97148b2bae1ecb214e6bb6e73c665c27db9f6c46415f42736c156b9591d0e8e5', '[\"*\"]', '2023-08-07 02:50:40', NULL, '2023-08-07 02:44:44', '2023-08-07 02:50:40', NULL),
(102, 'App\\Models\\User', 3, 'authTokens', '7048f24ff57b79967e48eaf941e60cf2beb30fd098ff1d3d9f45a4125a24b81d', '[\"*\"]', '2023-08-07 03:06:46', NULL, '2023-08-07 03:06:34', '2023-08-07 03:06:46', NULL),
(103, 'App\\Models\\User', 9, 'authTokens', 'a31f7cc11bc5029e5b6d78590e29217e7d0322dccaaad9b4d3aa68b390a096ab', '[\"*\"]', '2023-08-07 06:42:22', NULL, '2023-08-07 05:45:09', '2023-08-07 06:42:22', NULL),
(104, 'App\\Models\\User', 9, 'authTokens', '0174c1fb97cc050574d66100f90eb84d4f85df0a742617ef67ad9443f4b02b33', '[\"*\"]', '2023-08-07 21:39:16', NULL, '2023-08-07 06:33:19', '2023-08-07 21:39:16', NULL),
(105, 'App\\Models\\User', 3, 'authTokens', '2ea038a950eae0178691d19a910fad9b02f3cb3d38177ca4fc33acf920328696', '[\"*\"]', NULL, NULL, '2023-08-07 11:46:29', '2023-08-07 11:46:29', NULL),
(106, 'App\\Models\\User', 3, 'authTokens', 'a623b5c16e46a7c65e36968af819d09544d816aef6550486e90a79825643be8a', '[\"*\"]', '2023-08-07 14:26:43', NULL, '2023-08-07 14:18:48', '2023-08-07 14:26:43', NULL),
(107, 'App\\Models\\User', 9, 'authTokens', 'effbd10a13e80634112dfa60d308303ffc353d4f25517af7b22b9868fb9728f8', '[\"*\"]', '2023-08-09 05:02:20', NULL, '2023-08-08 21:49:10', '2023-08-09 05:02:20', NULL),
(108, 'App\\Models\\User', 9, 'authTokens', '044dbcb34b2cbe9a23db01223bf4bceebeed0e8fbd717cf0ef92a60531a300f7', '[\"*\"]', '2023-08-08 22:08:06', NULL, '2023-08-08 22:07:52', '2023-08-08 22:08:06', NULL),
(109, 'App\\Models\\User', 9, 'authTokens', '8a761ac02a55b92b5633b1ca0e62d2a65323b158de86c1537576e1338dba6a6e', '[\"*\"]', '2023-08-09 04:58:30', NULL, '2023-08-09 00:18:13', '2023-08-09 04:58:30', NULL),
(110, 'App\\Models\\User', 3, 'authTokens', '2e40e4db5023c5f45c615b915068fc3329209d1f46005e133de78186c08a0ac4', '[\"*\"]', NULL, NULL, '2023-08-09 03:51:33', '2023-08-09 03:51:33', NULL),
(111, 'App\\Models\\User', 3, 'authTokens', '666217befc3c593197de3d81e7796138c9016e64aff12e64483a9578fc8138d8', '[\"*\"]', '2023-08-10 03:18:04', NULL, '2023-08-09 05:36:29', '2023-08-10 03:18:04', NULL),
(112, 'App\\Models\\User', 9, 'authTokens', 'bfcaf542a38927527713c94320313b1eaf07c45ac8de84aca31f9bf935477522', '[\"*\"]', '2023-08-10 02:56:06', NULL, '2023-08-10 02:02:19', '2023-08-10 02:56:06', NULL),
(113, 'App\\Models\\User', 9, 'authTokens', '1ae14ae0d1d9d6cf203c8c767b50f8b5fb6a8a0957916c3fb59db7dbf2529e55', '[\"*\"]', '2023-08-10 04:42:03', NULL, '2023-08-10 02:31:07', '2023-08-10 04:42:03', NULL),
(114, 'App\\Models\\User', 9, 'authTokens', '2617cfcc099e9c2dcf55e0407557c628ff05e42929cf6ab4b3b7c7c99c96976c', '[\"*\"]', '2023-08-10 03:15:09', NULL, '2023-08-10 03:15:01', '2023-08-10 03:15:09', NULL),
(115, 'App\\Models\\User', 9, 'authTokens', '58ea695b0ff623e894f8e6a79466358a118a4550730dfa57add258b7b77b1d69', '[\"*\"]', '2023-08-10 03:30:56', NULL, '2023-08-10 03:22:54', '2023-08-10 03:30:56', NULL),
(116, 'App\\Models\\User', 9, 'authTokens', 'becc2218d4299e651543ddacc7454c398fd4dec98475ba937b27ad4232104e57', '[\"*\"]', '2023-08-10 05:27:51', NULL, '2023-08-10 03:37:52', '2023-08-10 05:27:51', NULL),
(117, 'App\\Models\\User', 3, 'authTokens', '6faafa9c5104a0ea800aee49c818d17956c61a57fe7495b34d0c5a93bc1aa3cf', '[\"*\"]', '2023-08-11 18:52:51', NULL, '2023-08-11 18:49:12', '2023-08-11 18:52:51', NULL),
(118, 'App\\Models\\User', 3, 'authTokens', 'e7c7b2d71e0d411579682ef86448c93de286750a6e783b0c405db2bb1c078b12', '[\"*\"]', '2023-08-11 21:05:11', NULL, '2023-08-11 19:59:49', '2023-08-11 21:05:11', NULL),
(119, 'App\\Models\\User', 9, 'authTokens', '7c2e77ada3653613a795af0554969f159953ee102d08bb0b2171e00d328f368b', '[\"*\"]', '2023-08-12 23:43:16', NULL, '2023-08-12 17:30:00', '2023-08-12 23:43:16', NULL),
(120, 'App\\Models\\User', 9, 'authTokens', '14a0e14040c20a37ac7814d48e554f741cc8ec537292b67680814f47de11e759', '[\"*\"]', '2023-08-12 18:13:45', NULL, '2023-08-12 18:04:03', '2023-08-12 18:13:45', NULL),
(121, 'App\\Models\\User', 9, 'authTokens', '725e14cfbd7cbc641181870aab40df0553c3de9eef66cc0cb0a0f8ca9b17b4fc', '[\"*\"]', '2023-08-12 20:02:37', NULL, '2023-08-12 19:59:12', '2023-08-12 20:02:37', NULL),
(122, 'App\\Models\\User', 9, 'authTokens', 'c032ba9d043bb2a3fb95436d1e0c713356f63b5f64546d5a1181d62e50590ac1', '[\"*\"]', NULL, NULL, '2023-08-12 20:14:43', '2023-08-12 20:14:43', NULL),
(123, 'App\\Models\\User', 9, 'authTokens', '1fa4dc4fe29889b890990ce97d200c6dc80b28963fa0761ce75c597b031eead3', '[\"*\"]', NULL, NULL, '2023-08-12 20:17:29', '2023-08-12 20:17:29', NULL),
(124, 'App\\Models\\User', 9, 'authTokens', '3d3e4f7ec0bf05b9bf037c5678ab37fde55118ad4f90bae32405a5d0d06d5b1e', '[\"*\"]', '2023-08-12 20:41:39', NULL, '2023-08-12 20:20:03', '2023-08-12 20:41:39', NULL),
(125, 'App\\Models\\User', 3, 'authTokens', '2b837bce4cd254745f8fdbf762a17d216d5240d18cbc3c7dade9fff5dd3a1333', '[\"*\"]', '2023-08-12 21:31:52', NULL, '2023-08-12 21:22:04', '2023-08-12 21:31:52', NULL),
(126, 'App\\Models\\User', 9, 'authTokens', 'abf4aeed25c957a52ea60feb4fd47b97779ac23c8b43189b87a35a78f5ce637c', '[\"*\"]', '2023-08-12 21:42:56', NULL, '2023-08-12 21:24:29', '2023-08-12 21:42:56', NULL),
(127, 'App\\Models\\User', 9, 'authTokens', 'eac07e8d0d3eb9be21240c9d9708bc2342b52fce03cfd9c84520d4aaf7ae4fac', '[\"*\"]', '2023-08-12 21:47:33', NULL, '2023-08-12 21:47:25', '2023-08-12 21:47:33', NULL),
(128, 'App\\Models\\User', 9, 'authTokens', '666f6b0e2e988188c72ca25f52f2f39c68c145b99162e5632d9ca4a2d73cad30', '[\"*\"]', NULL, NULL, '2023-08-12 21:56:30', '2023-08-12 21:56:30', NULL),
(129, 'App\\Models\\User', 9, 'authTokens', '61825279dd8bffd5c40cea579dd1b4e9f76b8129c20ad87565421fa2cd96d5ec', '[\"*\"]', '2023-08-12 21:57:45', NULL, '2023-08-12 21:57:36', '2023-08-12 21:57:45', NULL),
(130, 'App\\Models\\User', 9, 'authTokens', '4c7538e0190f5465edcab8f77fb88dba13cdfeb90acd14899664ea1fd65dec3b', '[\"*\"]', '2023-08-13 16:43:38', NULL, '2023-08-12 21:59:31', '2023-08-13 16:43:38', NULL),
(131, 'App\\Models\\User', 3, 'authTokens', '19fc8964f01004fb9f44efd8939e686799538128de68ff7e38a37edd1aa76faf', '[\"*\"]', '2023-08-13 16:38:40', NULL, '2023-08-12 23:09:24', '2023-08-13 16:38:40', NULL),
(132, 'App\\Models\\User', 9, 'authTokens', 'ba4e73e3b9d5fde136caf509589f5dffea2349ba2398165f6a6516a845ffe210', '[\"*\"]', '2023-08-13 13:58:08', NULL, '2023-08-12 23:49:52', '2023-08-13 13:58:08', NULL),
(133, 'App\\Models\\User', 22, 'authTokens', '79dd83d30730a988888387107831a66dd93e6bdf14063918a951a90bf0208339', '[\"*\"]', '2023-08-13 13:36:36', NULL, '2023-08-13 08:29:33', '2023-08-13 13:36:36', NULL),
(134, 'App\\Models\\User', 22, 'authTokens', '8cf4509dfa8abd0ee7992d61b43b27e0dcffe219ba9b795e47f7ebb5cf75bbb8', '[\"*\"]', '2023-08-13 14:38:13', NULL, '2023-08-13 13:45:19', '2023-08-13 14:38:13', NULL),
(135, 'App\\Models\\User', 13, 'authTokens', '8b10da4eb82d388c9d302118da863ffda6836dff1db527cc5a315306d867f91a', '[\"*\"]', '2023-08-13 15:44:17', NULL, '2023-08-13 14:59:59', '2023-08-13 15:44:17', NULL),
(136, 'App\\Models\\User', 13, 'authTokens', '2d86eeafb72eb6e221694ea31ceea198534f4a75fc33765d51044b8e010e3f40', '[\"*\"]', '2023-08-14 13:41:32', NULL, '2023-08-13 15:50:05', '2023-08-14 13:41:32', NULL),
(137, 'App\\Models\\User', 22, 'authTokens', '0fbeccbfa57713775b7e315bea5f30091a55aa839455d3e0ec2ff6a8d4d75909', '[\"*\"]', '2023-08-13 16:22:06', NULL, '2023-08-13 16:15:16', '2023-08-13 16:22:06', NULL),
(138, 'App\\Models\\User', 22, 'authTokens', 'fa7ed1858eade47d7dbb1450c6b29c8d626dfa4656eeeddd850f9ebefe63adf6', '[\"*\"]', '2023-08-13 16:52:05', NULL, '2023-08-13 16:42:08', '2023-08-13 16:52:05', NULL),
(139, 'App\\Models\\User', 13, 'authTokens', '104a2692bcca4428b19c3ebeaba74b4f491784b3b7967d41a0c6bb28482aa538', '[\"*\"]', '2023-08-14 13:59:41', NULL, '2023-08-14 13:03:47', '2023-08-14 13:59:41', NULL),
(140, 'App\\Models\\User', 22, 'authTokens', 'c5734cc23f8db144816a5df5d9e5174135fab48065747515583778f2476f11e9', '[\"*\"]', '2023-08-15 02:27:09', NULL, '2023-08-15 02:11:15', '2023-08-15 02:27:09', NULL),
(141, 'App\\Models\\User', 22, 'authTokens', '5dfadb6fc2f336604e8bcc0bd72a0a49158d3451c7dfd2ed56169907a7a49493', '[\"*\"]', '2023-08-15 02:47:19', NULL, '2023-08-15 02:43:39', '2023-08-15 02:47:19', NULL),
(142, 'App\\Models\\User', 3, 'authTokens', '3ad3536cb6d7178735022054543529ea611762d8006144f82e17c1b104def6d9', '[\"*\"]', '2023-08-15 02:58:52', NULL, '2023-08-15 02:47:49', '2023-08-15 02:58:52', NULL),
(143, 'App\\Models\\User', 3, 'authTokens', '09c4157579db37967a43c3ae6ee3fccc7ccf86b6fa2042a80236d00e5f791d23', '[\"*\"]', '2023-08-15 04:59:44', NULL, '2023-08-15 04:55:55', '2023-08-15 04:59:44', NULL),
(144, 'App\\Models\\User', 13, 'authTokens', '33b20bd43f1286a138aa83af3ec66af83f4ee02f471e234908fdc07d72956ec9', '[\"*\"]', '2023-08-15 22:43:55', NULL, '2023-08-15 19:56:45', '2023-08-15 22:43:55', NULL),
(145, 'App\\Models\\User', 3, 'authTokens', '180e606c36c1addc072bfabc96e1fe3738d4e951bd44bc24276250d59007103f', '[\"*\"]', '2023-08-16 04:21:37', NULL, '2023-08-16 04:18:54', '2023-08-16 04:21:37', NULL),
(146, 'App\\Models\\User', 13, 'authTokens', '26d499dc8767dfc668f1eddefe1cdcec5e3c78bd55b241612e1b2a06ce6c0c54', '[\"*\"]', '2023-08-16 14:45:06', NULL, '2023-08-16 12:16:03', '2023-08-16 14:45:06', NULL),
(147, 'App\\Models\\User', 9, 'authTokens', '23e98b98eff35f681363519ea905c08c0e70a1617037e42018fab572ab2af81f', '[\"*\"]', '2023-08-17 18:12:53', NULL, '2023-08-17 01:17:44', '2023-08-17 18:12:53', NULL),
(148, 'App\\Models\\User', 9, 'authTokens', '31a3971ae14c00f8d35e362a3d47fc28f5a0e8cb285cf56aebe0ab30f274ee8c', '[\"*\"]', '2023-08-17 06:38:46', NULL, '2023-08-17 01:26:55', '2023-08-17 06:38:46', NULL),
(149, 'App\\Models\\User', 13, 'authTokens', '682abb2627aada628c61b69ea8f91e1fe24c06b7101ac9ff52d040cf67d80c03', '[\"*\"]', '2023-08-17 14:13:57', NULL, '2023-08-17 02:16:42', '2023-08-17 14:13:57', NULL),
(150, 'App\\Models\\User', 3, 'authTokens', '2878fdb25e09d1452a8b22e8f7f5920f60283c3f1a723fe232cb514c3773ae1d', '[\"*\"]', '2023-08-17 17:11:35', NULL, '2023-08-17 05:42:17', '2023-08-17 17:11:35', NULL),
(151, 'App\\Models\\User', 9, 'authTokens', '8edb54c3be8dca4b2bd38823a050cd61ad3939f3b8a44e6c5f7b08472ea09a55', '[\"*\"]', '2023-08-17 06:46:16', NULL, '2023-08-17 06:46:04', '2023-08-17 06:46:16', NULL),
(152, 'App\\Models\\User', 13, 'authTokens', '99af577c9959ca7e5e72cf7636696065580c69ccff9b91856fa23a02b3dd373a', '[\"*\"]', '2023-08-17 14:54:33', NULL, '2023-08-17 14:19:09', '2023-08-17 14:54:33', NULL),
(153, 'App\\Models\\User', 3, 'authTokens', '48b24db6e0dc8564133df0d16064b42c0ddf5e7168a128e6e1a164e6bd55300a', '[\"*\"]', NULL, NULL, '2023-08-17 14:42:33', '2023-08-17 14:42:33', NULL),
(154, 'App\\Models\\User', 9, 'authTokens', '7091e2151e9bb569bfc8ab4ff884a58ca77b04b7c84933a0d285f268457ad761', '[\"*\"]', '2023-08-17 18:12:24', NULL, '2023-08-17 14:45:08', '2023-08-17 18:12:24', NULL),
(155, 'App\\Models\\User', 13, 'authTokens', '34bf527f6abb5cfdab711d47caed0aba1b7dc4d98696754c2bed9aef661e0706', '[\"*\"]', '2023-08-17 16:01:15', NULL, '2023-08-17 15:57:56', '2023-08-17 16:01:15', NULL),
(156, 'App\\Models\\User', 13, 'authTokens', 'b39d543e0fd92bab475e946685310f30b2ab81b1919cc81b7611337c31ac935c', '[\"*\"]', '2023-08-17 16:29:19', NULL, '2023-08-17 16:21:44', '2023-08-17 16:29:19', NULL),
(157, 'App\\Models\\User', 3, 'authTokens', '7bacd9de6aeb88644cdc870004cec92b6a0133aaedf763a562a85d1f9e3ff602', '[\"*\"]', NULL, NULL, '2023-08-17 16:43:57', '2023-08-17 16:43:57', NULL),
(158, 'App\\Models\\User', 13, 'authTokens', '7c873219c165d950df77156908fea36502fc5b7d72b087ac31516088a4d21f3b', '[\"*\"]', '2023-08-18 02:13:01', NULL, '2023-08-17 17:05:27', '2023-08-18 02:13:01', NULL),
(159, 'App\\Models\\User', 9, 'authTokens', 'ab1eab14311497c32393fd7b9cf2ecc3659aea665172725fd83726907e6f7a02', '[\"*\"]', '2023-08-20 06:14:43', NULL, '2023-08-20 04:24:04', '2023-08-20 06:14:43', NULL),
(160, 'App\\Models\\User', 13, 'authTokens', '1793f5daae200c7fb5eee6b88ebb74e66710b6dc5a6af79844fcdb10fe6d0a43', '[\"*\"]', '2023-08-21 00:48:27', NULL, '2023-08-20 22:00:51', '2023-08-21 00:48:27', NULL),
(161, 'App\\Models\\User', 9, 'authTokens', '4bda9f5341394f97891b05b41309cb6b4a38a81fd0dafe94ead70b1d84804000', '[\"*\"]', NULL, NULL, '2023-08-21 02:18:30', '2023-08-21 02:18:30', NULL),
(162, 'App\\Models\\User', 9, 'authTokens', '64d0c595681b240c312621368c08a96b752f32a1b75e4e30eb24ad2d09e13ff2', '[\"*\"]', '2023-08-21 04:41:04', NULL, '2023-08-21 02:44:02', '2023-08-21 04:41:04', NULL),
(163, 'App\\Models\\User', 9, 'authTokens', '0607d7092769744230ecdaef45edabfdeea944a6692e3d2a21d4980dc90e19f7', '[\"*\"]', '2023-08-21 03:38:13', NULL, '2023-08-21 03:04:36', '2023-08-21 03:38:13', NULL),
(164, 'App\\Models\\User', 13, 'authTokens', '0d5909995685861fae1cbc56eaabfcb1e6c72588bd2169819abc015ed125be96', '[\"*\"]', '2023-08-21 04:36:55', NULL, '2023-08-21 03:13:54', '2023-08-21 04:36:55', NULL),
(165, 'App\\Models\\User', 13, 'authTokens', 'a3bc07c5f595402f3f73e07a7bbaf67568594f14c2e6e0c017aa53a74dd0b25a', '[\"*\"]', '2023-08-21 05:03:38', NULL, '2023-08-21 04:37:31', '2023-08-21 05:03:38', NULL),
(166, 'App\\Models\\User', 13, 'authTokens', '1c722b64d058f12f40314ffc8adf33b1233ba11f86f6256c2e14d8ddbfbfda8b', '[\"*\"]', '2023-08-21 05:37:01', NULL, '2023-08-21 05:25:53', '2023-08-21 05:37:01', NULL),
(167, 'App\\Models\\User', 13, 'authTokens', 'c9741ba95e70b21dbb75ee70cd77327d2cf4a14457aeb31db5c2ade1d57bbb08', '[\"*\"]', '2023-08-21 06:51:00', NULL, '2023-08-21 05:40:37', '2023-08-21 06:51:00', NULL),
(168, 'App\\Models\\User', 13, 'authTokens', '1bf850e509258056f1db8746d1ea32989204c8e230660c726a32a26e813c9477', '[\"*\"]', '2023-08-21 06:26:12', NULL, '2023-08-21 06:21:15', '2023-08-21 06:26:12', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `image` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'Post 01', 'Test create post', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-01\\/MYwSz5H44i17dxzg2eNLLXTpsLd5sbxSKU5YL81u.png\",\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-01\\/xDcpMqaN2tFplTsS4v6Ws5oeQB4cLhGJW62UcJYf.png\"]', '2023-08-02 01:12:55', '2023-08-02 01:12:55', NULL),
(2, 9, 'Post 01', 'Test create post', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-01\\/MYwSz5H44i17dxzg2eNLLXTpsLd5sbxSKU5YL81u.png\",\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-01\\/xDcpMqaN2tFplTsS4v6Ws5oeQB4cLhGJW62UcJYf.png\"]', '2023-08-06 07:13:12', '2023-08-06 07:13:12', NULL),
(3, 9, 't', 't', '[]', '2023-08-07 04:31:38', '2023-08-07 04:31:38', NULL),
(4, 9, 'Post 01', 'Test create post', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-01\\/MYwSz5H44i17dxzg2eNLLXTpsLd5sbxSKU5YL81u.png\",\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-01\\/xDcpMqaN2tFplTsS4v6Ws5oeQB4cLhGJW62UcJYf.png\"]', '2023-08-07 04:32:03', '2023-08-07 04:32:03', NULL),
(5, 9, 'Test 1', '1', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-07\\/JiGGifTiRZ2P3R4AmXiKlqQL62ONXRwh2wdd63xj.jpg\"]', '2023-08-07 04:41:18', '2023-08-07 04:41:18', NULL),
(6, 9, 'Create test post', 'Description for test post', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-07\\/cDmAAYpgruJKv76CExGDMNG7U8qOJcwhcNXIB7rz.jpg\",\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-07\\/57WCAur0hi11BbY5F9a84w1ZAWBQ3vShncDAEniJ.jpg\"]', '2023-08-07 04:50:38', '2023-08-07 04:50:38', NULL),
(7, 9, 'Title', 'Desc', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-07\\/PrknwyresQcpV4MyZeErFT6Dj2JjmTW4tGCXbP8K.jpg\",\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-07\\/1OZrqPg4B12g321sFJN2n1WBTkjfimXRzgmKfSfS.jpg\",\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-07\\/rLTkqP38Qv76nc9nCPzGds5kqCbgbYCdq5UOkTe9.jpg\"]', '2023-08-07 04:55:47', '2023-08-07 04:55:47', NULL),
(8, 13, 'helo', 'test', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-13\\/oC7dDB8BZ4zXbhAm9vyWO26yFY66qPDNYw1l1KNK.jpg\"]', '2023-08-13 23:59:21', '2023-08-13 23:59:21', NULL),
(9, 13, 'test', 'h', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-14\\/6kqHJHWWTBv1T785Jj1xk7qGlFlhSnLBh4ozN3Zg.jpg\"]', '2023-08-14 13:36:34', '2023-08-14 13:36:34', NULL),
(10, 13, 'a', 'b', '[]', '2023-08-17 02:32:29', '2023-08-17 02:32:29', NULL),
(11, 13, 'bênh k biêt', 'ni', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/iJRjbwyZ9lsR3qefdvVvEoAVLAkLzWMq7rIecxlE.jpg\"]', '2023-08-17 14:46:50', '2023-08-17 14:46:50', NULL),
(12, 13, 'no', 'no', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/95gqpcki9mSTqaJw2nu2kFozhKQ1jSLyyYKx5TCX.jpg\"]', '2023-08-17 14:47:21', '2023-08-17 14:47:21', NULL),
(13, 13, 'abc', 'abc', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/inBHygL8N64kT0ItNH70CxqTzDkuI6IhhvchxugT.jpg\"]', '2023-08-17 14:47:47', '2023-08-17 14:47:47', NULL),
(14, 9, 'Hello Sang', 'Co van de i ko', '[]', '2023-08-17 14:52:44', '2023-08-17 14:52:44', NULL),
(15, 9, 'new post', 'a', '[]', '2023-08-17 14:53:25', '2023-08-17 14:53:25', NULL),
(16, 13, 'rẻ', 'rẻ', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/EtSNrvtsX1HhCd2tyg1Pd83yPMj2gDTnF8HxK4Wk.jpg\"]', '2023-08-17 16:24:45', '2023-08-17 16:24:45', NULL),
(17, 13, 'abbbb', 'abbbb', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/ekrmFjst6PoEuHYOrHLym2EweU1InjQ8nchH4IsQ.jpg\"]', '2023-08-17 19:35:57', '2023-08-17 19:35:57', NULL),
(18, 13, 'Cây có triệu chứng lạ vậy mn ?', 'đóm đen xuất hiện trên lá', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-21\\/sfkKOijp8GG5wUsmICpoloNtyUItarlBvGIFEpBY.jpg\"]', '2023-08-21 05:34:26', '2023-08-21 05:34:26', NULL),
(19, 13, 'tình trạng trên cây cam ?', 'đóm đen trên vỏ', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-21\\/IF5h5CX1bbmGewBy6ysXPeFpEbV1MwVq8VOHX8xX.jpg\"]', '2023-08-21 05:35:36', '2023-08-21 05:35:36', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prices`
--

CREATE TABLE `prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `store_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `date_of_manufacture` date NOT NULL,
  `date_of_expiry` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `prices`
--

INSERT INTO `prices` (`id`, `store_id`, `product_id`, `price`, `qty`, `status`, `date_of_manufacture`, `date_of_expiry`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 370000, 36, 1, '2023-07-31', '2024-07-31', NULL, '2023-08-18 02:13:01', NULL),
(3, 2, 1, 360000, 34, 1, '2023-01-31', '2024-08-30', NULL, '2023-08-17 18:37:11', NULL),
(4, 2, 2, 140000, 25, 1, '2023-02-28', '2024-08-30', NULL, '2023-08-17 03:49:54', NULL),
(6, 1, 2, 250000, 48, 1, '2023-06-05', '2024-07-11', '2023-07-31 15:54:18', '2023-08-21 05:31:20', NULL),
(8, 3, 2, 200000, 49, 1, '2023-04-10', '2024-09-12', '2023-07-31 15:54:18', '2023-08-13 16:19:18', NULL),
(9, 4, 2, 220000, 50, 1, '2023-05-07', '2024-05-14', '2023-07-31 15:54:18', '2023-08-12 21:32:32', NULL),
(10, 5, 2, 240000, 40, 1, '2023-02-01', '2024-11-08', '2023-07-31 15:54:18', '2023-08-12 21:32:32', NULL),
(11, 6, 2, 210000, 69, 1, '2023-04-03', '2024-08-09', '2023-07-31 15:54:18', '2023-08-21 04:01:50', NULL),
(12, 3, 1, 340000, 51, 1, '2023-08-16', '2024-10-10', '2023-07-31 15:54:18', '2023-08-13 16:21:36', NULL),
(13, 4, 1, 360000, 80, 1, '2023-04-10', '2024-12-25', '2023-07-31 15:54:18', '2023-08-12 21:32:32', NULL),
(14, 5, 1, 380000, 50, 1, '2023-03-06', '2024-08-15', '2023-07-31 15:54:18', '2023-08-12 21:32:32', NULL),
(15, 6, 1, 320000, 97, 1, '2023-08-01', '2024-08-15', '2023-07-31 15:54:18', '2023-08-17 17:13:20', NULL),
(16, 1, 3, 400000, 99, 1, '2023-08-01', '2024-03-28', '2023-08-13 23:26:38', '2023-08-21 04:23:14', NULL),
(19, 1, 4, 12000, 120, 1, '2023-08-18', '2023-08-18', '2023-08-17 14:38:38', '2023-08-17 18:32:55', NULL),
(20, 1, 7, 300000, 123, 1, '2023-08-18', '2023-08-18', '2023-08-17 16:28:18', '2023-08-17 16:28:18', NULL),
(21, 1, 8, 123, 122, 1, '2023-08-03', '2023-08-18', '2023-08-17 16:29:07', '2023-08-17 17:16:26', NULL),
(22, 1, 9, 12345, 7, 1, '2023-08-01', '2023-08-19', '2023-08-17 18:47:58', '2023-08-17 19:43:41', NULL),
(23, 17, 1, 120000, 30, 1, '2023-08-16', '2023-08-19', '2023-08-17 19:22:04', '2023-08-17 19:22:04', NULL),
(24, 17, 4, 2000000, 30, 1, '2023-08-05', '2023-08-31', '2023-08-17 19:22:52', '2023-08-17 19:22:52', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `therapy_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `instruction` text NOT NULL,
  `uses` longtext NOT NULL,
  `manufacturer` text NOT NULL,
  `reg_number` text NOT NULL,
  `status` int(11) NOT NULL,
  `photo` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `therapy_id`, `name`, `instruction`, `uses`, `manufacturer`, `reg_number`, `status`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Actinovate 1SP', 'Liều lượng phun: 5g/8 lít nước phun cho 250m2  Thời gian cách ly: 1 ngày Cách dùng: Phun khi bệnh chớm xuất hiện. Lượng nước phun 320lit/ha', 'có công dụng trong việc phòng, điều trị các loại sâu bệnh hoặc các vấn đề cây trồng trong Nông nghiệp.', 'Cty TNHH Hóa Nông Lúa vàng', '1702/CNĐKT-BVTV', 1, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/IzRQNLsx4UwozVDN5M8GJGgKMmvVrbhRCZBHRrfR.jpg\"]', '2023-07-27 18:20:01', '2023-08-21 00:20:21', '2023-08-21 00:20:21'),
(2, 2, 'Bisomin 2SL', 'Liều lượng: 2.0 lít/ha\r\nThời gian cách ly (PreHarvest Interval- PHI): 7ngày (Khoảng thời gian tính bằng ngày từ lần xử lý cuối cùng đến khi thu hoạch)\r\nCách dùng: Lương nước phun 400 – 600 lít/ha. Phun ngay khi bệnh mới xuất hiện.', 'có công dụng trong việc phòng, điều trị các loại sâu bệnh hoặc các vấn đề cây trồng trong Nông nghiệp.', 'Bailing Agrochemical Co.ltd', '3366/ CNĐKT-BVTV', 1, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/dKDLtJEmerW54XWxnr4ucobkiYin2dgoHwW85dpw.jpg\"]', '2023-07-27 18:20:40', '2023-08-17 13:41:32', NULL),
(3, 9, 'Amistar 250SC', 'Liều lượng : 0.08%\r\nThời gian cách ly: 5 ngày\r\nCách dùng: Phun khi tỷ lệ bệnh là 5% . Lượng nước phun 500-600lit/ha', 'có công dụng trong việc phòng, điều trị các loại sâu bệnh hoặc các vấn đề cây trồng trong Nông nghiệp.', 'Công ty TNHH ADC Việt Nam', '140/CNĐKT-BVTV', 1, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/8giRbmuCmBZp3GPVIgJ9SnK5iyAmbLBgxOMytioY.jpg\"]', '2023-08-01 05:25:51', '2023-08-17 13:40:59', NULL),
(4, 9, 'Envio 250SC', 'Liều lượng : 0.12%\r\nThời gian cách ly: 7 ngày\r\nCách dùng: Phun khi tỷ lệ bệnh là 5% . Lượng nước phun 400-800lit/ha. Phun thuốc 2 lần cách nhau 7 ngày', 'có công dụng trong việc phòng, điều trị các loại sâu bệnh hoặc các vấn đề cây trồng trong Nông nghiệp.', 'Công ty CPĐT Hợp Trí', '2567/CNĐKT-BVTV', 1, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/eABF1gAYmtkq1HEavlSfGaFATd8FAHJWgpH4LrS0.jpg\"]', '2023-08-01 05:26:45', '2023-08-17 13:41:57', NULL),
(5, 11, 'abc12', 'te', 'te', 'nhh', 'a', 1, NULL, '2023-08-01 15:19:06', '2023-08-01 15:20:52', '2023-08-01 15:20:52'),
(6, 13, '12', 'ok', 'ne', 'ok', 'a', 1, NULL, '2023-08-01 15:24:06', '2023-08-01 15:24:18', '2023-08-01 15:24:18'),
(7, 1, 'Nativo', 'test', 'thuốc diệt nấm', 'TGH', 'TPK-24', 1, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/g7sgnS3SBNs4GjJd3DWf110XuxvFvnvBWQ9BLiiI.jpg\"]', '2023-08-17 16:26:08', '2023-08-21 00:20:21', '2023-08-21 00:20:21'),
(8, 3, 'Regent', 'a', 'test', 'gg', 'gpk-19', 1, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/3Z2TRg0x3FbbJdKFbIFCE9gXQ8jboGfZIlsbhmGH.jpg\"]', '2023-08-17 16:27:50', '2023-08-17 16:27:50', NULL),
(9, 1, 'acbd', 'acbd', 'abcd', 'abc', '123456789', 1, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/J4guFI9xZ1kZ2ZPB7qu4XU0EjGyNqDLtxraR0jXV.jpg\"]', '2023-08-17 18:47:07', '2023-08-21 00:20:21', '2023-08-21 00:20:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'Have all permissions', NULL, NULL, NULL),
(2, 'Expert', 'Have store permissions', NULL, NULL, NULL),
(3, 'Farmer', 'Only app mobile', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `signatures`
--

CREATE TABLE `signatures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_type` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `order_info` text NOT NULL,
  `response_code` varchar(255) NOT NULL,
  `transaction_no` varchar(255) NOT NULL,
  `bank_code` varchar(255) NOT NULL,
  `pay_date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `signatures`
--

INSERT INTO `signatures` (`id`, `order_type`, `amount`, `order_info`, `response_code`, `transaction_no`, `bank_code`, `pay_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'OR3048', 710000, 'Thanh toan GD:OR3048', '00', '14093464', 'NCB', '2023-08-16 00:22:22', 0, '2023-08-16 04:22:29', '2023-08-16 04:22:29'),
(2, 'OR6261', 460000, 'Thanh toan GD:OR6261', '00', '14094566', 'NCB', '2023-08-17 01:24:26', 0, '2023-08-17 05:24:31', '2023-08-17 05:24:31'),
(3, 'OR3011', 460000, 'Thanh toan GD:OR3011', '00', '14094568', 'NCB', '2023-08-17 01:27:11', 0, '2023-08-17 05:27:16', '2023-08-17 05:27:16'),
(4, 'OR1568', 710000, 'Thanh toan GD:OR1568', '00', '14094572', 'NCB', '2023-08-17 01:44:43', 0, '2023-08-17 05:44:50', '2023-08-17 05:44:50'),
(5, 'OR8952', 460000, 'Thanh toan GD:OR8952', '00', '14094574', 'NCB', '2023-08-17 01:47:37', 0, '2023-08-17 05:47:42', '2023-08-17 05:47:42'),
(6, 'OR1975', 450000, 'Thanh toan GD:OR1975', '00', '14094577', 'NCB', '2023-08-17 01:58:38', 0, '2023-08-17 05:58:46', '2023-08-17 05:58:46'),
(7, 'OR1975', 450000, 'Thanh toan GD:OR1975', '00', '14094577', 'NCB', '2023-08-17 01:58:38', 0, '2023-08-17 05:58:46', '2023-08-17 05:58:46'),
(8, 'OR1568', 710000, 'Thanh toan GD:OR1568', '00', '14094572', 'NCB', '2023-08-17 01:44:43', 0, '2023-08-17 06:20:51', '2023-08-17 06:20:51'),
(9, 'OR1568', 710000, 'Thanh toan GD:OR1568', '00', '14094572', 'NCB', '2023-08-17 01:44:43', 0, '2023-08-17 06:22:23', '2023-08-17 06:22:23'),
(10, 'OR4105', 710000, 'Thanh toan GD:OR4105', '00', '14094579', 'NCB', '2023-08-17 02:23:29', 0, '2023-08-17 06:23:39', '2023-08-17 06:23:39'),
(11, 'OR4363', 460000, 'Thanh toan GD:OR4363', '00', '14094580', 'NCB', '2023-08-17 02:33:53', 0, '2023-08-17 06:34:03', '2023-08-17 06:34:03'),
(12, 'OR2942', 410000, 'Thanh toan GD:OR2942', '00', '14094951', 'NCB', '2023-08-17 13:13:09', 0, '2023-08-17 17:13:20', '2023-08-17 17:13:20'),
(13, 'OR7832', 460000, 'Thanh toan GD:OR7832', '00', '14094956', 'NCB', '2023-08-17 13:17:29', 0, '2023-08-17 17:17:41', '2023-08-17 17:17:41'),
(14, 'OR2566', 710000, 'Thanh toan GD:OR2566', '00', '14094957', 'NCB', '2023-08-17 13:19:48', 0, '2023-08-17 17:19:54', '2023-08-17 17:19:54'),
(15, 'OR2086', 460000, 'Thanh toan GD:OR2086', '00', '14095007', 'NCB', '2023-08-17 14:12:10', 0, '2023-08-17 18:12:24', '2023-08-17 18:12:24'),
(16, 'OR8542', 340000, 'Thanh toan GD:OR8542', '00', '14095053', 'NCB', '2023-08-17 14:39:27', 0, '2023-08-17 18:39:44', '2023-08-17 18:39:44'),
(17, 'OR1769', 460000, 'Thanh toan GD:OR1769', '00', '14095157', 'NCB', '2023-08-17 15:28:16', 0, '2023-08-17 19:28:30', '2023-08-17 19:28:30'),
(18, 'OR2284', 340000, 'Thanh toan GD:OR2284', '00', '14096994', 'NCB', '2023-08-21 01:30:51', 0, '2023-08-21 05:31:20', '2023-08-21 05:31:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stores`
--

CREATE TABLE `stores` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `status` int(11) NOT NULL,
  `address` text DEFAULT NULL,
  `photo` longtext DEFAULT NULL,
  `certificate1` longtext DEFAULT NULL,
  `certificate2` longtext DEFAULT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `stores`
--

INSERT INTO `stores` (`id`, `user_id`, `name`, `status`, `address`, `photo`, `certificate1`, `certificate2`, `latitude`, `longitude`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Store Test', 1, 'Di An, Binh Duong', '[\"https://citrusdev.xyz/storage/images/2023-08-12/FklATPUfIyXkcF0fn8qWVAGQuOH0YagrrdAOZAEG.jpg\"]', NULL, NULL, 39.0746, 79.4979, NULL, NULL, NULL),
(2, 16, 'Store 02', 1, 'Thủ Đức, HCM', '[\"https://citrusdev.xyz/storage/images/2023-08-12/FklATPUfIyXkcF0fn8qWVAGQuOH0YagrrdAOZAEG.jpg\"]', NULL, NULL, 39.0646, 79.4879, NULL, NULL, NULL),
(3, 17, 'Store 03', 1, 'Di An, Binh Duong', '[\"https://citrusdev.xyz/storage/images/2023-08-12/FklATPUfIyXkcF0fn8qWVAGQuOH0YagrrdAOZAEG.jpg\"]', NULL, NULL, 39.0646, 79.4879, NULL, NULL, NULL),
(4, 18, 'Store 04', 1, 'Thuan An, Binh Duong', '[\"https://citrusdev.xyz/storage/images/2023-08-12/FklATPUfIyXkcF0fn8qWVAGQuOH0YagrrdAOZAEG.jpg\"]', NULL, NULL, 39.0646, 78.4879, NULL, NULL, NULL),
(5, 19, 'Store 05', 1, 'Di An, Binh Duong', '[\"https://citrusdev.xyz/storage/images/2023-08-12/FklATPUfIyXkcF0fn8qWVAGQuOH0YagrrdAOZAEG.jpg\"]', NULL, NULL, 37.0646, 78.4879, NULL, NULL, NULL),
(6, 20, 'Store 06', 1, 'Thuan An, Binh Duong', '[\"https://citrusdev.xyz/storage/images/2023-08-12/FklATPUfIyXkcF0fn8qWVAGQuOH0YagrrdAOZAEG.jpg\"]', NULL, NULL, 38.9646, 79.4879, NULL, NULL, NULL),
(7, 23, 'Cua hang so 10', 1, 'Tessin, Thụy Sĩ', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-14\\/00dTeXSvtsHm9xYtpoMqjqwRHpOmp6u0cBBRjuep.jpg\",\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-14\\/dA0OIQk2rk6XHNgE4sWyuRsLCg8KS99O8by1H4yz.jpg\",\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-14\\/uoLXZhkoe1lLEJVHMc9zA8At9DshkfVMxOetTRtm.jpg\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-14\\/KenUKlQ1NyMYSQnTBC8V7n480h7ZlYdPoLoPhdqS.jpg\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-14\\/lytqmLBiEPVsqFFxXfdZxZv1ClTzl7l48yfnc4IT.jpg\"]', 46.3317, 8.80045, '2023-08-15 01:20:59', '2023-08-15 01:20:59', NULL),
(8, 29, 'SieuThai', 1, '1111 lac long quan', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-16\\/fvfrkSmConShmy1QbftICjF72eQaE9pVhKnnIxmX.bmp\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-16\\/B4d1Jqu3nGPDhW5m1v53d9Z2TpWZXKUYKPg9eZL6.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-16\\/b9klwNFuFkeOxNstUjGDvZvonYZJzq2WIEK2blbw.bmp\"]', 11112, 3123120, '2023-08-17 02:03:08', '2023-08-17 02:03:08', NULL),
(9, 34, 'Cua Hang 13', 1, 'Di An, Binh Duong', NULL, NULL, NULL, 10.4114, 106.684, '2023-08-17 12:32:19', '2023-08-17 12:32:19', NULL),
(10, 35, 'Nuoc hoa tu Phap 1', 1, 'Thasdfds', NULL, NULL, NULL, 10.4114, 106.754, '2023-08-17 12:36:24', '2023-08-17 12:36:24', NULL),
(11, 36, 'Cua hang so 15', 1, 'Test', NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/JQjr72HHOHCiz5nkexRcEc1Opzi4XZs9Ar5nT97T.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/aqsoOD2hVFYHSqTRKjrWlbMzoH4tzXwtvwkPv5ar.png\"]', 46.618, -66.5897, '2023-08-17 12:38:20', '2023-08-17 12:38:20', NULL),
(12, 37, 'Nước hoa nam 5', 1, 'ưerewrew', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/2ME9Kwn7XRWyZgD6qOvWucROz4VIqfKTJxduUcQA.jpg\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/GLF8Q2envv3d0YXbDRNrdEodFxAd26VicgYqVO1j.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/phDUIkIoGEwROraZ3A3uLeooQZQSzRFFPixOLKTf.png\"]', 10.4114, 7.025, '2023-08-17 12:48:02', '2023-08-17 12:48:02', NULL),
(13, 39, 'Cua Hang 18', 1, 'Di An, Binh Duong', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/YIbok7KKEqwkQFVzBCLLkJ7ABDYna6UKHPZTYMQx.jpg\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/nLWm2o9KDDzfvdWHZQ5Zwh0ziV4Xn3493wunVMkk.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/OTVzk4BjebgmoQ1OTPPwmokhocbXgYh2Py1hcer6.png\"]', 46.618, 7.025, '2023-08-17 13:03:53', '2023-08-17 13:03:53', NULL),
(14, 41, 'Chuyen Gia 20', 1, 'So 1', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/unX6ctq8RHLkNhSWwgHMDjHl8qKGc1fCopf01zeg.jpg\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/hjlW7qd0En7ycaVpW0sla732PRBMiFkBLlkGeWFx.png\",\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/cUhu1Zyo3QKyeUHrSLRT5JBQbQJp5wEWx8I1qOtw.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/EsaQAtrAQuHVQWKYFGiB0vzjShvqDYCiAeH6CsH4.png\"]', 46.618, 106.754, '2023-08-17 13:29:09', '2023-08-17 13:29:09', NULL),
(15, 42, 'Cua hang so 21', 1, 'Thu Duc HCM', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/e28Og74qocVsUSmDaX1rnWMDd8wtmBhAIeIWtC5c.jpg\",\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/PHqjAweLTGA2G62gBuC26SwcSrMR8tEuOybZgN5n.jpg\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/yeL7NJlStMt0UTHh530EhhFNO5sLrkeJiKxsELD6.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/lCbO27e6bQ0aufdqS6KUeaKVr7XPONwxFLwkO2I3.png\"]', 10.4114, 7.025, '2023-08-17 13:43:32', '2023-08-17 13:43:32', NULL),
(16, 43, 'Cua Hang 22', 1, 'Q2, HCM', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/6IDZv5B9pw8dMwahgFZErkwbKwwf1NdcuVQSVUcD.jpg\",\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/6viijQD0eMa3W4Q19jFevFZaNxKxNkKi8H3NIs0F.jpg\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/vwMf3HXV7ZgDPyLM1rTdyq6KLuyDdY8fLOivowcR.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/FCkT3k0q6vsyZ17jDiJAHs8mWauvt72E0J3Ibkvv.png\"]', 10.4114, 106.754, '2023-08-17 13:44:50', '2023-08-17 13:44:50', NULL),
(17, 45, 'test', 1, 'Tran Hung Dao, Hoàn Kiếm, Hanoi, Vietnam', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/BsOvc2cFFt0CT1Y8mwunYThmxYxd0mneubFmRo9q.jpg\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/G4T239usCtgfOEBktBAU7MYyPdmdegkHgoqw6e0n.jpg\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/FD1rFSgynsnAPC72MUEX8yBh1U8iK0Xilwt2KRAq.jpg\"]', 12, 32, '2023-08-17 19:17:25', '2023-08-17 19:17:25', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `therapies`
--

CREATE TABLE `therapies` (
  `id` int(10) UNSIGNED NOT NULL,
  `dis_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` longtext NOT NULL,
  `is_chemical` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `therapies`
--

INSERT INTO `therapies` (`id`, `dis_id`, `name`, `description`, `is_chemical`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Streptomyces Lydicus WYEC 108', 'Nhóm độc : GHS: 5  WHO: 4', '1', '2023-07-26 03:26:13', '2023-08-21 00:20:21', '2023-08-21 00:20:21'),
(2, 1, 'Kasugamycin (min 70%)', 'Nhóm độc: GHS: 5', '1', '2023-07-27 18:17:38', '2023-07-27 18:17:38', NULL),
(3, 1, 'Ninganmycin', 'Nhóm độc : GHS: 5 WHO: 4', '1', '2023-07-27 18:17:55', '2023-07-27 18:17:55', NULL),
(4, 1, 'Papain', 'Nhóm độc : GHS: 5', '1', '2023-07-27 18:18:10', '2023-07-27 18:18:10', NULL),
(5, 1, 'Tetramycin', 'Nhóm độc : GHS: 5', '1', '2023-07-27 18:18:30', '2023-07-27 18:18:30', NULL),
(6, 1, 'Cytosinpeptidemycin', 'Nhóm độc : GHS: 5 WHO: 4', '1', '2023-07-27 18:18:44', '2023-07-27 18:18:44', NULL),
(7, 1, 'Oxytetracycline 50g/kg + Streptomycin 50 g/kg', 'Nhóm độc : GHS: 5 WHO: 4', '1', '2023-07-27 18:19:01', '2023-07-27 18:19:01', NULL),
(8, 2, 'Streptomyces Lydicus WYEC 108', 'Nhóm độc : GHS: 5  WHO: 4', '1', '2023-08-01 05:21:04', '2023-08-01 05:21:04', NULL),
(9, 2, 'Azoxytrobin', 'Nhóm độc : GHS: 5  WHO: 3', '1', '2023-08-01 05:22:35', '2023-08-01 05:22:35', NULL),
(10, 2, 'Chlorothalonil (min 98%)', 'Nhóm độc: GHS: 5', '1', '2023-08-01 05:23:21', '2023-08-01 05:23:21', NULL),
(11, 3, 'rầy 1', 'chữa rầy', '1', '2023-08-01 15:14:24', '2023-08-01 15:22:27', '2023-08-01 15:22:27'),
(12, 4, '12', 'a', '1', '2023-08-01 15:23:09', '2023-08-01 15:23:19', '2023-08-01 15:23:19'),
(13, 4, '12', 'a', '1', '2023-08-01 15:23:39', '2023-08-01 15:24:18', '2023-08-01 15:24:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `lg_mobile` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `cccdmt` longtext DEFAULT NULL,
  `cccdms` longtext DEFAULT NULL,
  `avatar` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `fullname`, `phone`, `address_id`, `status`, `lg_mobile`, `role_id`, `password`, `email_verified_at`, `remember_token`, `cccdmt`, `cccdms`, `avatar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@gmail.com', 'Admin', '0925465485', 1, 1, 2, 1, '$2y$10$cOnAOTvplGvA65bXrXjV2ewA2QZ4vI.Vytf/MMVjiKdsvp8L6hyOe', NULL, NULL, NULL, NULL, NULL, NULL, '2023-07-27 18:48:12', NULL),
(2, 'expert@gmail.com', 'Expert 01', '0925465547', 2, 1, 2, 2, '$2y$10$b64TZhSoH8U1O9/DI7O0JuwFe3hFO6WJJgvKAvZ8z1ezE.Bf8F2.a', NULL, 'YQSnHhgx1fTeqfYAW1mhmSm7bVetVhysAf8cMs7wRGE19uKUlSuk7bwjmI6o', NULL, NULL, NULL, NULL, NULL, NULL),
(3, '', 'mb 01', '0921635678', 3, 1, 1, 3, '$2y$10$kk1gnYbZWH1/UnRCThbEg.8ykVkD/JyF0r3f5sNvID.MTwEBFekwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, '0921634444example@gmail.com', NULL, '0921634444', 4, 2, 1, 3, '$2y$10$X5e6XfYLTTcjR6/LpLhn8eIxNiTciFCGnFtsWqVwITKdt4BCTDev.', NULL, NULL, NULL, NULL, NULL, '2023-07-18 03:18:47', '2023-08-17 06:53:37', NULL),
(5, '0921631111example@gmail.com', NULL, '0921631111', 5, 2, 1, 3, '$2y$10$Ep.0dnjE2OhrGsafLODW.O.wQ3VhZw.RbyocmOcEhPZ70UazLtsR6', NULL, NULL, NULL, NULL, NULL, '2023-07-18 03:30:51', '2023-08-20 19:55:04', NULL),
(6, '0921632222example@gmail.com', NULL, '0921632222', 6, 2, 1, 3, '$2y$10$xhVfyq8zQ2x2LCJcCbvpM.5luzX6XNcwbusDufgUQCLSiUveYHXum', NULL, NULL, NULL, NULL, NULL, '2023-07-18 04:41:46', '2023-08-17 06:53:29', NULL),
(7, '0393872942example@gmail.com', NULL, '0393872942', 7, 1, 1, 3, '$2y$10$/2S8RhNRIzqlm6DwsR400eYzgofebIo3zVEbBRCVhn/IfJTVfGaDS', NULL, NULL, NULL, NULL, NULL, '2023-07-20 03:35:59', '2023-07-20 05:05:02', NULL),
(8, '0356999568example@gmail.com', NULL, '0356999568', 8, 1, 1, 3, '$2y$10$QTAZvNlvdrxXiFnfCHpClOOUnRtUCK9tf5pyAw.8brcSzeyJ6km8O', NULL, NULL, NULL, NULL, NULL, '2023-07-23 03:56:45', '2023-08-17 06:52:54', NULL),
(9, '0123456789example@gmail.com', NULL, '0123456789', 32, 1, 1, 3, '$2y$10$uB/MJbMHw9IUp839buk3seqxbWjL0yyf6SdAVVLdhRfGL3lzjGCm2', NULL, NULL, NULL, NULL, NULL, '2023-07-23 03:57:24', '2023-08-12 23:51:41', NULL),
(10, '0123456780example@gmail.com', NULL, '0123456780', 10, 1, 1, 3, '$2y$10$Qs9C95zo7eqHH0gMDemnKugejYWlUQbEk1Dx5KcUlhSmPfcyMatZS', NULL, NULL, NULL, NULL, NULL, '2023-07-23 04:01:37', '2023-08-17 06:53:01', NULL),
(11, '0999999999example@gmail.com', NULL, '0999999999', 11, 2, 1, 3, '$2y$10$RfSg99XSMhVZg.v7gQ8c2uh4Q0lDI/01W6hGWUCBBVTaLr9CipUiO', NULL, NULL, NULL, NULL, NULL, '2023-07-24 03:10:20', '2023-08-17 06:53:57', NULL),
(12, '0987654321example@gmail.com', NULL, '0987654321', 12, 1, 1, 3, '$2y$10$rIJ2toyMa5C4Oeqpad2gh.ot05PIFeZU.xhrGxdxyI4bSZ1TGFZw6', NULL, NULL, NULL, NULL, NULL, '2023-07-24 03:44:07', '2023-07-24 03:45:43', NULL),
(13, '0845473789example@gmail.com', NULL, '0845473789', 34, 1, 1, 3, '$2y$10$zj0zp60e2Ww6DUmsS0FlgehjRIM5FcjeeuO2UIjgPioh6sxqxhkC.', NULL, NULL, NULL, NULL, NULL, '2023-07-24 04:15:07', '2023-08-13 15:16:50', NULL),
(14, '0939889963example@gmail.com', NULL, '0939889963', 14, 1, 1, 3, '$2y$10$qbrFYGpngg22Y0kMLoh.rujuKU.rkNH87MInlDoEZZ7AtXS4ZEneu', NULL, NULL, NULL, NULL, NULL, '2023-07-26 07:35:11', '2023-08-17 06:52:46', NULL),
(15, '0987654322example@gmail.com', NULL, '0987654322', 15, 1, 1, 3, '$2y$10$XpeBNMJRvMjcaWDe8ax31eDG3k5fQZ5ayoRrMBbQeix0nhhql8yL2', NULL, NULL, NULL, NULL, NULL, '2023-07-27 02:22:02', '2023-08-17 06:53:09', NULL),
(16, 'expert02@gmail.com', 'Expert 02', '0925465548', 16, 1, 2, 2, '$2y$10$b64TZhSoH8U1O9/DI7O0JuwFe3hFO6WJJgvKAvZ8z1ezE.Bf8F2.a', NULL, 'YravgyGai6bDTwKF8VlusF9RGNe2gCh7EkIFsmKhZQ35vFbeTQQFVZ67rfZ4', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'expert03@gmail.com', 'Expert 03', '0925465584', 0, 1, 2, 2, '$2y$10$b64TZhSoH8U1O9/DI7O0JuwFe3hFO6WJJgvKAvZ8z1ezE.Bf8F2.a', NULL, '24ep3EP3XzjuSuf9qihRh9U716uPG1QuSjmbHUdscROzns95Ms75sF2e7JPm', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'expert04@gmail.com', 'Expert 04', '0925465579', 0, 1, 2, 2, '$2y$10$b64TZhSoH8U1O9/DI7O0JuwFe3hFO6WJJgvKAvZ8z1ezE.Bf8F2.a', NULL, '24ep3EP3XzjuSuf9qihRh9U716uPG1QuSjmbHUdscROzns95Ms75sF2e7JPm', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'expert05@gmail.com', 'Expert 05', '0925465539', 0, 1, 2, 2, '$2y$10$b64TZhSoH8U1O9/DI7O0JuwFe3hFO6WJJgvKAvZ8z1ezE.Bf8F2.a', NULL, '24ep3EP3XzjuSuf9qihRh9U716uPG1QuSjmbHUdscROzns95Ms75sF2e7JPm', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'expert06@gmail.com', 'Expert 06', '0925465536', 0, 1, 2, 2, '$2y$10$b64TZhSoH8U1O9/DI7O0JuwFe3hFO6WJJgvKAvZ8z1ezE.Bf8F2.a', NULL, '24ep3EP3XzjuSuf9qihRh9U716uPG1QuSjmbHUdscROzns95Ms75sF2e7JPm', NULL, NULL, NULL, NULL, NULL, NULL),
(22, '03209301425example@gmail.com', 'mb 02', '0329301425', 33, 1, 1, 3, '$2y$10$kk1gnYbZWH1/UnRCThbEg.8ykVkD/JyF0r3f5sNvID.MTwEBFekwe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'test10@gmail.com', 'Test 10', '1234567890', NULL, 2, 2, 2, '$2y$10$zFQ9h7mMA0hRbmBPN/W2Rus9trHBrCagy8/cKvFx/v/wKtK3U8j8.', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-14\\/9pvWwHu3LxXim9U9lDqD5NoyWwKLTaSl6vCX38zv.jpg\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-14\\/tEsD29a4jTStaHZsUPdqKRx8iRyvn6sRoh01E1Bq.jpg\"]', NULL, '2023-08-15 01:16:19', '2023-08-15 01:16:43', NULL),
(24, 'phieubanthuoc@gmail.com', 'nguyễn ngọc phiêu', '0905970334', NULL, 2, 2, 2, '$2y$10$tRmGVOeYVti7rKsNI1CjAeh.X3IHq8gKM2E.62CrjUfl.MgIJZ9Ki', NULL, NULL, NULL, NULL, NULL, '2023-08-15 23:27:19', '2023-08-15 23:27:19', NULL),
(25, 'sieulacull2803@gmail.com', 'Thái Nguyễn Minh Siêu', '0935100840', NULL, 2, 2, 2, '$2y$10$V992rQeyANQml576VaCRHOpXZDc4MBOwaDhQ4NoLR2/TseEQQc7ka', NULL, NULL, NULL, NULL, NULL, '2023-08-17 01:52:35', '2023-08-17 01:52:35', NULL),
(26, 'sieulacull2801@gmail.com', 'Thái Nguyễn Minh Siêu', '0935100841', NULL, 2, 2, 2, '$2y$10$cbCNyL32MW0O6IHPsQSGZOgZYtAnjuxOY.HiuRqXp5C8hCaUgLCya', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-16\\/D4eeJQ7O9C0eCtKRHi2rvo20MbSShoGkEaPHTYCD.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-16\\/VhLejtneETndGTtKeQqlGYqA1zkfNC6QIiGxReu1.png\"]', NULL, '2023-08-17 01:55:02', '2023-08-17 01:55:11', NULL),
(27, 'sieulacull28012@gmail.com', 'Thái Nguyễn Minh Siêu', '09351008401', NULL, 2, 2, 2, '$2y$10$GxD0.0A.mnxkVaX3V5rFouyFAQo3.YnE3NP83gqPGGFzYMt47UnMa', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-16\\/OJP7rFKeQGBsPOETbgBbMGnyfo79FvkOmPWT1xV0.bmp\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-16\\/pQHviDaztqmFwemr3GMeU4qzpJRnXqcbnJrycKZ7.png\"]', NULL, '2023-08-17 02:00:11', '2023-08-17 02:00:28', NULL),
(28, 'sieulacull28321@gmail.com', 'Thái Nguyễn Minh Siêu', '09351008401213', NULL, 2, 2, 2, '$2y$10$kuctRz73GRniI4YMAONbw.Mw1aDnLmY9YnD8ez6RVVpxwco2/HCQ2', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-16\\/j3ibimmrkQS1gjK5ySAOhHlhW83gGM4R5rt94jvm.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-16\\/BdomMFQ0ETTVP73rNGtQVHdkvpb77KwUrwgIG8cA.png\"]', NULL, '2023-08-17 02:01:01', '2023-08-17 02:01:11', NULL),
(29, 'sieulacull28133@gmail.com', 'Thái Nguyễn Minh Siêu', '093510084110', NULL, 2, 2, 2, '$2y$10$rt9MTlEkBURjXx.SoxlO5urlH6u0LGGItRQEd/cBvNH.bCwjE6k0q', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-16\\/pQy9I2wUdwDd6MfOc4DzF2bAwQJ6FlwOkzcwoDQY.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-16\\/VNXffkIPjeFes8yhb3pzTRKDHIw439He8KztNvPA.png\"]', NULL, '2023-08-17 02:01:55', '2023-08-17 02:02:37', NULL),
(30, 'chuyengia01@gmail.com', 'Chuyên Gia 01', '1234568790', NULL, 0, 2, 2, '$2y$10$Wrk1NaxqiSgFrrDIU3TSruJpXBYys.bpmerpOWU7K3KJUb7eMD21S', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/vvc9hr4d8Lnr4w63oUNAVYeCzTaHBy2MpFOxzNhd.jpg\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/HX4hOPzGf2qs7O2Wwtr7M9Dy5SJ94OFAVA7mZnYr.jpg\"]', NULL, '2023-08-17 06:55:08', '2023-08-17 06:55:42', NULL),
(31, 'chuyengia10@gmail.com', 'Chuyen Gia 10', '4569771234', NULL, 0, 2, 2, '$2y$10$zTb0SCtRFpM2eW9FJZ4BEOfZnkB/BTNXwPMGHDnzj7mCvfJnh1htW', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/oNu96f5bb0oBPQkBK4QA5Rx6s7w2MZ7S3eK3mgCM.jpg\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/2umMBV02nQHn2blz9VsepofAxAH4BGu1pAOfDD6q.jpg\"]', NULL, '2023-08-17 07:12:20', '2023-08-17 07:12:45', NULL),
(32, 'chuyengia11@gmail.com', 'Chuyen gia 11', '1235468790', NULL, 0, 2, 2, '$2y$10$OucqqUY6s8pKL4vIX8NK7u7r7O4Pc4DM8X80aZyjFr/n8pNcvvu4m', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/PK0rXYYNts3oMCuT3zMhZ0gmL4WD0K2ML8tm3pRs.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/lIYnf7TI45B4ORT6vhDu3E8vPZojgKdGkfp3P488.png\"]', NULL, '2023-08-17 07:31:31', '2023-08-17 07:31:50', NULL),
(33, 'chuyengia12@gmail.com', 'Chuyen Gia 12', '6547891230', NULL, 0, 2, 2, '$2y$10$SjJT0rOUDIDMUdLE5mnRL.upWvMJoQK0HMVHtPzQP.VrNfeGcq4bC', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/xEz7jMuhEX5vEFnK0Crh4tP6WDcHiZd3RTQ556Ch.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/GAP4HNQPAKiRQis7m0UbnrQsqOZFxiErTR86tTHP.png\"]', NULL, '2023-08-17 12:07:05', '2023-08-17 12:07:21', NULL),
(34, 'chuyengia13@gmail.com', 'Chuyen Gia 13', '12365487905', NULL, 0, 2, 2, '$2y$10$0T4DANAKDjAxEqcpIJj6BOH2DmGc/A8k8YNNf.DpYmiSiu4Qm87VO', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/kM0f9xBMOlohic0FqNI8vZosRJltqFINx3XTRPCT.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/CMuz3IiVZ0MOPvgRdsmjzYflLKtmdkb7BxA7w6qh.png\"]', NULL, '2023-08-17 12:26:14', '2023-08-17 12:31:39', NULL),
(35, 'chuyengia14@gmail.com', 'Chuyen Gia 14', '3214569870', NULL, 0, 2, 2, '$2y$10$1N9yGlkyP1rldunfxCYwe.66NCyEKh7U/Hn9lr2jbwEzYxfG3tZ9C', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/crh5rMEShjmP4WX1l8JbFSA9cPXDeD1coQE2dm8a.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/rgDLJcT7dt5zlGBBNMqGJIPAlEwNZ68KQCswXHZB.png\"]', NULL, '2023-08-17 12:33:17', '2023-08-17 12:33:27', NULL),
(36, 'chuyengia15@gmail.com', 'Chuyen Gia 15', '4569872130', NULL, 0, 2, 2, '$2y$10$JBJiC5xNW8uQBYiMjEzvduvDIrS/1LIHUtAZaIUMxb1y8h0b/pzcu', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/FS2ka9gWRUeibtDaiiR5O4R5dkrEcmkonI7QmA9m.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/LqKPEBILzesu6dOdoIxTDn9nizH2dM8HDPDkMENw.png\"]', NULL, '2023-08-17 12:37:36', '2023-08-17 12:37:46', NULL),
(37, 'chuyengia16@gmail.com', 'Chuyen Gia 16', '0541326987', NULL, 0, 2, 2, '$2y$10$M3.dUQnTMSijiO7lewNO.uwG2DVY5ZiulTK61laK1bvTfJY1s39hW', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/g3LAoObKMuuP3JUT4wZ9OnFjidfSxncX4PZs6Kmf.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/lHP2xhlG6ZUqa935o8tjccwl61ru4XTHlJDpXqN1.png\"]', NULL, '2023-08-17 12:42:45', '2023-08-17 12:42:54', NULL),
(38, 'chuyengia17@gmail.com', 'Chuyen Gia 17', '0125463789', NULL, 0, 2, 2, '$2y$10$mdeC5o9GiL2K/ZgubxlPA.yjd1ucKJ13X27jwMf3PVpSIg.6IDRhG', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/w5J4nbX9CkbudHyOAavpSzbfBRX2SqxPeLw4COtF.jpg\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/hfMUEU04I6l0jgUHG5cwyiwHbtqL5tqrU6JsVHuU.jpg\"]', NULL, '2023-08-17 12:48:44', '2023-08-17 12:48:59', NULL),
(39, 'chuyengia18@gmail.com', 'Chuyen Gia 18', '0985147632', NULL, 0, 2, 2, '$2y$10$4IlaIqp84JKxKihIeL3iwO5yUXDtgsAQCzLftgvXB7zUf74P3sBbq', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/t674PKqmiVWquqinioNBKaqP841gq98LA5WhxmtR.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/8ZrODT3sdlTrwCRMpCxdFvICKrL6FQlcmqQCi5CZ.png\"]', NULL, '2023-08-17 13:02:56', '2023-08-17 13:03:12', NULL),
(40, 'chuyengia19@gmail.com', 'Chuyen Gia 19', '0987456123', NULL, 0, 2, 2, '$2y$10$0O.N7AbTkNRm3eqAWbBqyuFbFWZG.bwA5ex8koVrIJwcZnP/J9zaO', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/rVdQsTSZtgpLl84wjHAuDKbjV4NZ5wwI5lnmuJeJ.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/CEV1eSkWtQBWmvzrXIX5xsN9pUo1h6QpmOtH7kZK.png\"]', NULL, '2023-08-17 13:04:39', '2023-08-17 13:04:48', NULL),
(41, 'chuyengia20@gmail.com', 'Chuyen Gia 20', '0654123987', NULL, 0, 2, 2, '$2y$10$0Z/0SKMTO5FeROql6dDA4ewTDINPTtRVNBtn9LJy1C3KYptPXvE56', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/SSJvR2hJ6LZ0r7mNvY0PkQ1PkpiaVhbUXtHxfM9Y.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/4Vnkm18nU4TuJYQY4utXfrpDgAETl8K6EMO5BP9s.png\"]', NULL, '2023-08-17 13:25:34', '2023-08-17 13:25:46', NULL),
(42, 'chuyengia21@gmail.com', 'Chuyen Gia 21', '0321456879', NULL, 0, 2, 2, '$2y$10$lLbzcEtC0yMEqhrlpYXjGe0Q90C.1Yvbx9bAdeRgCiT1Vxyf0uKvG', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/faV7aUo2W5t6Ld7MG8zCJ3ZksthSAFfREa4Sq1Ug.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/mRbtZHlosA3bzHHntoTwFVoAXx0UbkksYjPEWwTA.png\"]', NULL, '2023-08-17 13:33:53', '2023-08-17 13:34:07', NULL),
(43, 'chuyengia22@gmail.com', 'Chuyen gia 22', '0325416987', NULL, 1, 2, 2, '$2y$10$zvdj0NCQcZY9dJoyK26h3uQzwQyIspF8L9p8UOqhPLnsJuMqPAuGu', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/XXlF5mXDnfMhRJ2kugMRIe3red53skUuFyZY4kzS.png\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/dDSRtmuXJm4HTpnAgJqfL7pS21YsIkH6jphvsIxp.png\"]', NULL, '2023-08-17 13:44:05', '2023-08-17 18:45:52', NULL),
(44, 'expert111@gmail.com', 'vudaica', '9999999999', NULL, 1, 2, 2, '$2y$10$oP1eID9RUcIdZ3vh.tIWfORT/5aA4gCjon6E75hPGifUhCqwTHH/O', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/nb3LHfMCvI96vgUV0pFZuaiELYL08UI5g5FNImcj.jpg\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/ktaCfHXwiv7hBPs36pGh1gx6zOdmpOXIaava4aus.jpg\"]', NULL, '2023-08-17 18:54:57', '2023-08-21 03:06:43', NULL),
(45, 'quantest@gmail.com', 'quang', '03984848818', NULL, 1, 2, 2, '$2y$10$xpL3TVqW1cx5VjjECrVIPe0bfcKmYWZUwJiBZTquWeNCp5k/GxAw2', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/unCEtmbtnhqjtmG88vhQUhn7zrHtgwRo7aGWUCC2.jpg\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-17\\/FJYdzBuvGZYjRM5fWIK85sMUVODsDBVoo3smSy8l.jpg\"]', NULL, '2023-08-17 19:15:35', '2023-08-17 19:18:11', NULL),
(46, 'phieuexpert@gmail.com', 'phieutest', '0123456600', NULL, 1, 2, 2, '$2y$10$iXeqRQmlqTiOh/vFheKGCeAwDUnFTa0fU//JTQ/ROuEPqeuj7r3OC', NULL, NULL, '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-20\\/rMgSnHh6377aB92Gr8Zp7LH4mDZ4H4AU5fVnRrgz.jpg\"]', '[\"https:\\/\\/citrusdev.xyz\\/storage\\/images\\/2023-08-20\\/yhRNXYp1D9NeLrpslGj7aYEsF9etGAqj3ZqhZnEs.jpg\"]', NULL, '2023-08-20 19:56:28', '2023-08-21 02:44:15', NULL),
(47, '0356730643example@gmail.com', NULL, '0356730643', NULL, 0, 1, 3, '$2y$10$09IvwWGCTutDtVJy2DS0GefSUCG2O/533G2S5BxjrmH7E2A1W/jdy', NULL, NULL, NULL, NULL, NULL, '2023-08-21 05:38:30', '2023-08-21 05:38:30', NULL),
(48, '0903354667example@gmail.com', NULL, '0903354667', NULL, 0, 1, 3, '$2y$10$d/W/m0X589RyT9RnEGMy/OlHqKRNip6cK6T5dFu4Fw8/0Zb5AsGGa', NULL, NULL, NULL, NULL, NULL, '2023-08-21 05:38:57', '2023-08-21 05:38:57', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_otps`
--

CREATE TABLE `user_otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `otp` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expire_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_otps`
--

INSERT INTO `user_otps` (`id`, `otp`, `user_id`, `expire_at`, `created_at`, `updated_at`) VALUES
(1, '8162', 4, '2023-07-18 14:00:44', '2023-07-18 03:18:49', '2023-07-18 07:00:44'),
(2, '5562', 5, '2023-07-18 11:38:21', '2023-07-18 03:30:54', '2023-07-18 04:38:21'),
(3, '6296', 6, '2023-07-18 11:42:27', '2023-07-18 04:41:48', '2023-07-18 04:42:27'),
(4, '7398', 7, '2023-07-20 01:05:02', '2023-07-20 03:36:00', '2023-07-20 05:05:02'),
(5, '4594', 8, '2023-07-22 23:57:47', '2023-07-23 03:56:47', '2023-07-23 03:56:47'),
(6, '1285', 9, '2023-08-04 00:30:04', '2023-07-23 03:57:25', '2023-08-04 04:30:04'),
(7, '1020', 10, '2023-07-23 00:17:40', '2023-07-23 04:01:39', '2023-07-23 04:16:42'),
(8, '4960', 11, '2023-07-23 23:10:33', '2023-07-24 03:10:22', '2023-07-24 03:10:33'),
(9, '3389', 12, '2023-07-23 23:45:25', '2023-07-24 03:44:09', '2023-07-24 03:45:25'),
(10, '5386', 13, '2023-07-24 00:17:59', '2023-07-24 04:15:08', '2023-07-24 04:17:59'),
(11, '4393', 14, '2023-07-26 03:36:13', '2023-07-26 07:35:13', '2023-07-26 07:35:13'),
(12, '4813', 15, '2023-07-26 22:23:04', '2023-07-27 02:22:04', '2023-07-27 02:22:04'),
(13, '6779', 47, '2023-08-21 01:39:32', '2023-08-21 05:38:32', '2023-08-21 05:38:32'),
(14, '3369', 48, '2023-08-21 01:39:59', '2023-08-21 05:38:59', '2023-08-21 05:38:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(255) NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chat_user`
--
ALTER TABLE `chat_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `diagnostics`
--
ALTER TABLE `diagnostics`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `signatures`
--
ALTER TABLE `signatures`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `therapies`
--
ALTER TABLE `therapies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Chỉ mục cho bảng `user_otps`
--
ALTER TABLE `user_otps`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT cho bảng `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `chat_user`
--
ALTER TABLE `chat_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `details`
--
ALTER TABLE `details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `diagnostics`
--
ALTER TABLE `diagnostics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `signatures`
--
ALTER TABLE `signatures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `therapies`
--
ALTER TABLE `therapies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `user_otps`
--
ALTER TABLE `user_otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
