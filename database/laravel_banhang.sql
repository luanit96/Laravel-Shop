-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th2 23, 2021 lúc 09:43 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel_banhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `billid` int(10) UNSIGNED NOT NULL,
  `customerid` int(10) UNSIGNED NOT NULL,
  `total` int(10) UNSIGNED NOT NULL,
  `payment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`billid`, `customerid`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 550, 'ATM', 'giao hang truoc 15h00', '2019-08-26 19:26:37', '2019-08-26 19:26:37'),
(2, 2, 600, 'COD', 'Giao hàng sớm', '2019-08-26 20:44:28', '2019-08-26 20:44:28'),
(3, 3, 650, 'COD', 'Vui lòng giao hàng cho tôi vào buổi tối', '2019-08-27 02:56:54', '2019-08-27 02:56:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_details`
--

CREATE TABLE `bill_details` (
  `bill_detailid` int(10) UNSIGNED NOT NULL,
  `billid` int(10) UNSIGNED NOT NULL,
  `productid` int(10) UNSIGNED NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `saleprice` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_details`
--

INSERT INTO `bill_details` (`bill_detailid`, `billid`, `productid`, `quantity`, `price`, `saleprice`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 500, 200, '2019-08-26 19:26:37', '2019-08-26 19:26:37'),
(2, 1, 4, 1, 300, 200, '2019-08-26 19:26:37', '2019-08-26 19:26:37'),
(3, 1, 1, 1, 200, 150, '2019-08-26 19:26:38', '2019-08-26 19:26:38'),
(4, 2, 4, 2, 150, 200, '2019-08-26 20:44:28', '2019-08-26 20:44:28'),
(5, 2, 3, 1, 500, 200, '2019-08-26 20:44:28', '2019-08-26 20:44:28'),
(6, 3, 2, 2, 50, 50, '2019-08-27 02:56:54', '2019-08-27 02:56:54'),
(7, 3, 3, 2, 250, 200, '2019-08-27 02:56:54', '2019-08-27 02:56:54'),
(8, 3, 5, 1, 200, 150, '2019-08-27 02:56:54', '2019-08-27 02:56:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `catid` int(10) UNSIGNED NOT NULL,
  `catname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `orderitem` int(11) NOT NULL,
  `haschild` tinyint(1) NOT NULL,
  `public` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`catid`, `catname`, `parent`, `orderitem`, `haschild`, `public`, `created_at`, `updated_at`) VALUES
(1, 'Bánh mặn', 1, 1, 1, 1, '2019-03-26 16:46:23', '2019-08-29 09:18:32'),
(2, 'Bánh ngọt', 2, 2, 0, 1, '2019-03-26 16:46:50', '2019-08-29 09:18:48'),
(3, 'Bánh trái cây', 3, 3, 0, 1, '2019-03-26 16:47:05', '2019-08-29 09:19:14'),
(4, 'Bánh kem', 4, 3, 1, 0, '2019-03-26 16:47:05', '2019-08-29 09:19:22'),
(5, 'Bánh crepe', 5, 3, 1, 0, '2019-03-26 16:47:05', '2019-08-29 09:19:41'),
(6, 'Bánh pizza', 6, 3, 1, 1, '2019-03-26 16:47:05', '2019-08-29 09:19:45'),
(7, 'Bánh su kem', 7, 3, 1, 1, '2019-03-26 16:47:05', '2019-08-29 09:19:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `contactid` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `customerid` int(10) UNSIGNED NOT NULL,
  `customername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`customerid`, `customername`, `gender`, `email`, `address`, `phone`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Thành Luân', 'nam', 'ntluan9697@gmail.com', 'Bình Thuận', '0965522247', 'giao hang truoc 15h00', '2019-08-26 19:26:37', '2019-08-26 19:26:37'),
(2, 'Thành Luân', 'nam', 'luan96@gmail.com', 'TP.HCM', '0123456789', 'Giao hàng sớm', '2019-08-26 20:44:27', '2019-08-26 20:44:27'),
(3, 'Nguyễn Thị Bưởi', 'nữ', 'buoi@gmail.com', 'Đồng Nai', '01234657557', 'Vui lòng giao hàng cho tôi vào buổi tối', '2019-08-27 02:56:54', '2019-08-27 02:56:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `introduces`
--

CREATE TABLE `introduces` (
  `introduceid` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `introduces`
--

INSERT INTO `introduces` (`introduceid`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Bánh sinh nhật', 'Bánh sinh nhật nhà làm', 'gioithieu.jpg', '2019-08-27 09:14:13', '2019-08-26 22:15:09'),
(2, 'Bánh Crepe táo', 'Bánh crepe táo nhà làm ngon bổ rẻ', 'gioithieu2.jpg', '2019-08-26 17:21:12', '2019-08-26 20:25:16'),
(3, 'Bánh Crepe', 'Bánh crepre nhà làm', 'gioithieu3.jpg', '2019-08-26 17:21:12', '2019-08-26 20:25:16'),
(4, 'Bánh mặn', 'Bánh mặn độc đáo mới lạ', 'gioithieu4.jpg', '2019-08-26 17:21:12', '2019-08-26 20:25:16'),
(5, 'Bánh ngọt', 'Bánh ngọt nhà làm', 'giothieu5.jpg', '2019-08-26 17:21:12', '2019-08-26 20:25:16'),
(6, 'Bánh Crepe dừa', 'Bánh crepe dừa mới lạ', 'gioithieu6.jpg', '2019-08-26 17:21:12', '2019-08-26 20:25:16'),
(7, 'Bánh chocolate', 'Bánh chocolate nhà làm', 'gioithieu7.jpg', '2019-08-26 17:21:12', '2019-08-26 20:25:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2019_03_19_085210_create_categories_table', 1),
(23, '2019_03_19_085238_create_products_table', 1),
(28, '2019_08_26_033738_create_slides_table', 1),
(29, '2019_08_26_033814_create_contacts_table', 1),
(38, '2019_08_26_032229_create_customers_table', 3),
(39, '2019_08_26_033425_create_bills_table', 3),
(40, '2019_08_26_033447_create_bill_details_table', 3),
(44, '2019_08_27_063252_create_posts_table', 4),
(46, '2019_08_27_072330_create_introduces_table', 5),
(47, '2019_08_26_033723_create_users_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `postid` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`postid`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Bánh Crepe Nhà Làm', 'Bánh crepe là một món bánh vô cùng thơm ngon và nổi tiếng. Mùa sầu riêng đã đến, đừng bỏ lỡ món bánh crepe sầu riêng thơm ngon hết ý với cách làm siêu đơn giản', 'sample1.jpg', '2019-08-26 19:20:09', '2019-08-27 02:36:22'),
(2, 'Bánh Crepe chocola', 'Bánh crepe sầu riêng là sự kết hợp của bột mì, trứng, bơ, sầu riêng, kem sữa tươi, sữa. Thay vì thưởng thức ở ngoài hàng hãy tự làm bánh crepe sầu riêng cho gia đình thưởng thức với những nguyên liệu dễ tìm', 'sample2.jpg', '2019-08-27 09:15:24', '2019-08-26 23:20:12'),
(3, 'Bánh Crepe Táo', 'Bánh crepe sầu riêng là sự kết hợp của bột mì, trứng, bơ, sầu riêng, kem sữa tươi, sữa. Thay vì thưởng thức ở ngoài hàng hãy tự làm bánh crepe sầu riêng cho gia đình thưởng thức với những nguyên liệu dễ tìm', 'sample3.jpg', '2019-08-27 09:15:24', '2019-08-26 23:20:12'),
(4, 'Bánh Crepe Sầu riêng', 'Bánh crepe sầu riêng là sự kết hợp của bột mì, trứng, bơ, sầu riêng, kem sữa tươi, sữa. Thay vì thưởng thức ở ngoài hàng hãy tự làm bánh crepe sầu riêng cho gia đình thưởng thức với những nguyên liệu dễ tìm', 'sample4.jpg', '2019-08-27 09:15:24', '2019-08-26 23:20:12'),
(5, 'Bánh Crepe dừa', 'Bánh crepe sầu riêng là sự kết hợp của bột mì, trứng, bơ, sầu riêng, kem sữa tươi, sữa. Thay vì thưởng thức ở ngoài hàng hãy tự làm bánh crepe sầu riêng cho gia đình thưởng thức với những nguyên liệu dễ tìm', 'sample5.jpg', '2019-08-27 09:15:24', '2019-08-26 23:20:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `productid` int(10) UNSIGNED NOT NULL,
  `catid` int(10) UNSIGNED NOT NULL,
  `productname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `saleprice` int(10) UNSIGNED DEFAULT NULL,
  `views` int(10) UNSIGNED NOT NULL,
  `public` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`productid`, `catid`, `productname`, `image`, `detail`, `price`, `saleprice`, `views`, `public`, `created_at`, `updated_at`) VALUES
(1, 5, 'Bánh crepe Sầu riêng', '210215-banh-sinh-nhat-rau-cau-body- (6).jpg', '<p><a href=\"/ckfinder/userfiles/images/234.jpg\"><img alt=\"\" src=\"/ckfinder/userfiles/images/234.jpg\" style=\"height:788px; width:1000px\" /></a>banh crepe sau rieng</p>', 200, 150, 2, 0, '2019-03-26 16:48:08', '2019-08-30 08:14:09'),
(2, 5, 'Bánh crepe Chuối', '50020041-combo-20-banh-su-que-pho-mai-9.jpg', '<p>dafsdfasdfafasdfasd</p>', 100, 50, 1, 0, '2019-03-26 16:48:29', '2019-08-30 08:14:23'),
(3, 1, 'Bánh crepe Táo', 'crepe-tao.jpg', 'Bánh crepe táo nhà làm', 500, 200, 1, 1, '2019-04-01 06:29:56', '2019-04-01 06:29:56'),
(4, 1, 'Bánh crepe Chocola', 'crepe-chocolate.jpg', 'adfasdfasdfasdfasdfasdf', 300, 200, 1, 1, '2019-04-01 16:43:45', '2019-04-01 16:43:45'),
(5, 1, 'Bánh crepe Sầu riêng', '1430967449-pancake-sau-rieng-6.jpg', 'fasdfasdfasfasdfasd', 200, 150, 1, 1, '2019-03-26 16:48:08', '2019-03-26 17:17:41'),
(6, 4, 'Bánh kem', 'banhkem.jpg', 'fasdfasdfasfasdfasd', 250, 150, 1, 1, '2019-03-26 16:48:08', '2019-03-26 17:17:41'),
(7, 4, 'Bánh kem dâu', 'banhkem-dau.jpg', 'fasdfasdfasfasdfasd', 200, 150, 1, 1, '2019-03-26 16:48:08', '2019-03-26 17:17:41'),
(8, 6, 'Bánh trái cây', 'banhtraicay.jpg', 'fasdfasdfasfasdfasd', 250, 150, 1, 1, '2019-03-26 16:48:08', '2019-03-26 17:17:41'),
(9, 6, 'Bánh crepe Sầu riêng', '1430967449-pancake-sau-rieng-6.jpg', 'fasdfasdfasfasdfasd', 450, 150, 1, 1, '2019-03-26 16:48:08', '2019-03-26 17:17:41'),
(10, 6, 'Bánh crepe đào', 'crepe-dao.jpg', 'fasdfasdfasfasdfasd', 200, 150, 1, 1, '2019-03-26 16:48:08', '2019-03-26 17:17:41'),
(11, 7, 'Bánh que kem chocola', 'combo-20-banh-su-que-kem-sua-tuoi-phu-socola.jpg', 'fasdfasdfasfasdfasd', 200, 150, 1, 1, '2019-03-26 16:48:08', '2019-03-26 17:17:41'),
(12, 7, 'Bánh crepe Chuối', 'crepe-chuoi.jpg', 'dafsdfasdfafasdfasd', 100, 50, 1, 0, '2019-03-26 16:48:29', '2019-03-26 17:20:45'),
(13, 7, 'Bánh crepe pháp', 'crepe-phap.jpg', 'dafsdfasdfafasdfasd', 200, 50, 1, 0, '2019-03-26 16:48:29', '2019-03-26 17:20:45'),
(14, 3, 'Bánh crepe Chocola', 'crepe-chocolate.jpg', 'adfasdfasdfasdfasdfasdf', 300, 200, 1, 1, '2019-04-01 16:43:45', '2019-04-01 16:43:45'),
(15, 3, 'Bánh crepe Táo', 'crepe-tao.jpg', 'dấdfasdfasdf', 400, 200, 1, 1, '2019-04-01 06:29:56', '2019-04-01 06:29:56'),
(16, 2, 'Bánh kem sinh nhật', 'banh kem sinh nhat.jpg', 'fasdfasdfasfasdfasd', 200, 150, 1, 1, '2019-03-26 16:48:08', '2019-03-26 17:17:41'),
(17, 2, 'Bánh crepe dâu', 'crepedau.jpg', 'dafsdfasdfafasdfasd', 100, 50, 1, 0, '2019-03-26 16:48:29', '2019-03-26 17:20:45'),
(18, 5, 'Bánh sầu riêng dừa', 'saurieng-dua.jpg', 'fasdfasdfasfasdfasd', 200, 0, 1, 1, '2019-03-26 16:48:08', '2019-03-26 17:17:41'),
(19, 5, 'Bánh crepe Chuối', 'crepe-chuoi.jpg', 'dafsdfasdfafasdfasd', 100, 50, 1, 0, '2019-03-26 16:48:29', '2019-03-26 17:20:45'),
(21, 1, 'Bánh crepe Chocola', 'crepe-chocolate.jpg', 'adfasdfasdfasdfasdfasdf', 300, 200, 1, 1, '2019-04-01 16:43:45', '2019-04-01 16:43:45'),
(22, 1, 'Bánh su kem', 'sukem.jpg', 'fasdfasdfasfasdfasd', 200, 150, 1, 1, '2019-03-26 16:48:08', '2019-03-26 17:17:41'),
(23, 4, 'Bánh kem', 'banhkem.jpg', 'fasdfasdfasfasdfasd', 330, 150, 1, 1, '2019-03-26 16:48:08', '2019-03-26 17:17:41'),
(24, 4, 'Bánh kem dâu', 'banhkem-dau.jpg', 'fasdfasdfasfasdfasd', 200, 150, 1, 1, '2019-03-26 16:48:08', '2019-03-26 17:17:41'),
(25, 6, 'Bánh trái cây', 'banhtraicay.jpg', 'fasdfasdfasfasdfasd', 430, 150, 1, 1, '2019-03-26 16:48:08', '2019-03-26 17:17:41'),
(26, 6, 'Bánh su kem dâu', 'sukemdau.jpg', 'fasdfasdfasfasdfasd', 200, 150, 1, 1, '2019-03-26 16:48:08', '2019-03-26 17:17:41'),
(27, 6, 'Bánh mặn', 'sli12.jpg', 'fasdfasdfasfasdfasd', 430, 150, 1, 1, '2019-03-26 16:48:08', '2019-03-26 17:17:41'),
(28, 7, 'Bánh que kem chocola', 'combo-20-banh-su-que-kem-sua-tuoi-phu-socola.jpg', 'fasdfasdfasfasdfasd', 200, 150, 1, 1, '2019-03-26 16:48:08', '2019-03-26 17:17:41'),
(29, 7, 'Bánh crepe Chuối', 'crepe-chuoi.jpg', 'dafsdfasdfafasdfasd', 100, 50, 1, 0, '2019-03-26 16:48:29', '2019-03-26 17:20:45'),
(30, 7, 'Bánh crepe pháp', 'crepe-phap.jpg', 'dafsdfasdfafasdfasd', 220, 50, 1, 0, '2019-03-26 16:48:29', '2019-03-26 17:20:45'),
(31, 3, 'Bánh kem sinh nhật', 'banh kem sinh nhat.jpg', 'adfasdfasdfasdfasdfasdf', 350, 200, 1, 1, '2019-04-01 16:43:45', '2019-04-01 16:43:45'),
(32, 3, 'Bánh crepe Táo', 'crepe-tao.jpg', 'dấdfasdfasdf', 300, 200, 1, 1, '2019-04-01 06:29:56', '2019-04-01 06:29:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `slideid` int(10) UNSIGNED NOT NULL,
  `slidename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`slideid`, `slidename`, `link`, `image`, `created_at`, `updated_at`) VALUES
(1, 'slide1', 'google.com', 'banner1.jpg', '2019-05-09 09:16:17', '2021-02-23 06:01:43'),
(2, 'slide2', 'google.com', 'banner2.jpg', '2019-05-09 08:10:25', '2019-05-09 13:15:04'),
(3, 'slide3', 'google.com', 'banner3.jpg', '2019-05-09 09:16:17', '2019-05-09 14:12:08'),
(4, 'slide4', 'google.com', 'banner4.jpg', '2019-05-09 08:10:25', '2019-05-09 17:59:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `access`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2b$10$58ooDwhUfSiwYiE3.32R9ul7.9Sd09aHlzTO3J68/jT1AjiqjJkfi', 1, NULL, '2019-08-27 23:55:13', '2019-08-27 23:55:13');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`billid`),
  ADD KEY `bills_customerid_foreign` (`customerid`);

--
-- Chỉ mục cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`bill_detailid`),
  ADD KEY `bill_details_billid_foreign` (`billid`),
  ADD KEY `bill_details_productid_foreign` (`productid`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catid`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contactid`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customerid`);

--
-- Chỉ mục cho bảng `introduces`
--
ALTER TABLE `introduces`
  ADD PRIMARY KEY (`introduceid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`),
  ADD KEY `products_catid_foreign` (`catid`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`slideid`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `billid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `bill_detailid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `catid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `contactid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `customerid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `introduces`
--
ALTER TABLE `introduces`
  MODIFY `introduceid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `slideid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_customerid_foreign` FOREIGN KEY (`customerid`) REFERENCES `customers` (`customerid`);

--
-- Các ràng buộc cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `bill_details_billid_foreign` FOREIGN KEY (`billid`) REFERENCES `bills` (`billid`),
  ADD CONSTRAINT `bill_details_productid_foreign` FOREIGN KEY (`productid`) REFERENCES `products` (`productid`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_catid_foreign` FOREIGN KEY (`catid`) REFERENCES `categories` (`catid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
