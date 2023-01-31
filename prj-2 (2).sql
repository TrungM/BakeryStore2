-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 08, 2022 lúc 09:02 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `prj-2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_05_042320_create_tb_admin', 1),
(6, '2022_07_05_073602_tb_customer', 2),
(7, '2022_07_05_094001_tb_shipping', 3),
(8, '2022_07_06_073031_tb_order', 4),
(9, '2022_07_06_073532_tb_order_detail', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(128) NOT NULL,
  `product_name` varchar(128) NOT NULL,
  `product_price` int(128) NOT NULL,
  `product_images` varchar(256) DEFAULT NULL,
  `product_description` varchar(128) NOT NULL,
  `category_id` int(128) NOT NULL,
  `product_star` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_images`, `product_description`, `category_id`, `product_star`) VALUES
(1, 'Strawberry Yogurt Cake', 700000, 'Strawberry-Yogurt-Cake-1.png', 'Traditional Pink Cake', 1, '5'),
(2, 'Oreo Cream Cake', 650000, 'Oreo-Cream-Cake-1.png', 'Traditional Chocolate Cake', 1, '0'),
(3, 'Matcha Cake', 670000, 'Matcha.png', 'Traditional Cake', 1, '0'),
(4, 'Chocolate Cake', 640000, 'Duong-Phen-Chocolate-1-1-min.png', 'Newstyle Chocolate Cake', 1, '0'),
(5, 'Chocolate Royal Cake', 720000, 'Chocolate-Royal-Cake.jpg', 'Traditional Chocolate Cake', 1, '5'),
(6, 'Chocolate Cake Old Style', 680000, 'Chocolate-New-Style-2-min.png\r\n', 'Newstyle Chocolate Cake', 1, '0'),
(7, 'Chantilly Chocolate Cake', 580000, 'Chantilly-Chocolate-1.png', 'Traditional French Cake', 1, '0'),
(8, 'Chantilly Moka Cake', 630000, 'Chantilly-moka-min.png', 'Traditional French Cake', 1, '0'),
(9, 'Chantilly Min Cake', 530000, 'Chantilly-1-1-min.png', 'Newstyle Cake', 1, '0'),
(10, 'Calamansi Cake', 640000, 'Calamansi-Cream-Cakejpg.jpg', 'Traditional Chocolate Cake', 1, '0'),
(11, 'Pineapple Pie', 37000, 'piece-pineapple-cake-cream-mint-leaves-isolated-27896340.jpg', 'Sweet Slices Cake', 2, '3'),
(12, 'Blueberry Yogurt Cake', 660000, 'Blueberry-yogurt.png', 'Traditional Cake', 1, '0'),
(13, 'Chocolate Min Pie', 47000, 'piece-chocolate-pie-isolated-white-background-piece-chocolate-pie-isolated-white-background-103400646.jpg', 'Sweet Slices Cake', 2, '0'),
(14, 'Passion fruit Mouse', 37000, 'passion-fruits-cheese-cake-isolated-white-background-64246062.jpg', 'Dessert type', 3, '0'),
(15, 'Sandwich', 15000, 'bread.png', 'Sandwich Pack (500g)', 3, '0'),
(16, 'Tiramisu Cake', 42000, 'Tiramisu-Mieng.jpg', 'Dessert type', 3, '0'),
(17, 'Caramel Chocolate Cake', 27000, 'caramel-chocolate-crepe-cake-sauce-white-background-90158453.jpg', 'Tasty', 2, '0'),
(18, 'Sandwich With Egg', 40000, 'sandwichwithegg.jpg', 'Best Choice For Breakfast', 5, '0'),
(19, 'Coffee', 32000, 'darkamericano.jpg', 'Rich Coffee', 5, '0'),
(20, 'Cappuchino', 38000, 'cappuccino-white-background-fresh-soft-shadow-some-coffee-beans-40236848.jpg', 'Best when use with Croissant', 5, '0'),
(21, 'Christmas Roll Cake', 350000, 'chirstmasrollcake1.png', 'Seasonal Cake Dec1', 4, '0'),
(22, 'Christmas Roll Cake', 350000, 'chirstmasrollcake2.png', 'Seasonal Cake Dec2', 4, '0'),
(23, 'Christmas Roll Cake', 350000, 'chirstmasrollcake3.png', 'Seasonal Cake Dec3', 4, '5'),
(24, 'Christmas Roll Cake', 350000, 'chirstmasrollcake4.png', 'Seasonal Cake Dec4', 4, '0'),
(26, 'Christmas Roll Cake', 350000, 'chirstmasrollcake5.png', 'Seasonal Cake Dec6', 4, '4'),
(27, 'Christmas Roll Cake', 350000, 'yule-log-roll-cake-christmas-decorated-chocolate-ganache-165858658.jpg', 'Seasonal Cake Dec7', 4, '0'),
(28, 'Christmas Roll Cake', 350000, 'chocolate-yule-log-christmas-cake-isolated-white-background-202361926.jpg', 'Seasonal Cake Dec8', 4, '0'),
(29, 'Sandwich', 27000, 'sandwich.jpg', 'Fresh Ingredient', 5, '0'),
(32, 'Waffle with fruit', 50000, 'wafflewithfruit.jpg', 'Traditional Cake', 3, '0'),
(33, 'Pie with Berries', 45000, 'plate-piece-delicious-cherry-pie-white-background-151132668.jpg', 'Made with fresh Cream and Dark Chocolate', 2, '5'),
(34, 'Chocolate Slices Cake', 49000, 'chocolate-cake-jelly-white-background-isolated-203819664.jpg', 'Traditional Cake', 2, '5'),
(35, 'Lemon curd', 36000, 'AnyConv.com__concept-tasty-food-lemon-curd-isolated-white-background_185193-82865.png', 'Sweet', 3, '0'),
(36, 'Cheese Cake With Berries', 36000, 'cheese-cake-topped-mix-berries-strawberry-flavour-toppi-topping-83052277.jpg', 'Sweet', 2, '0'),
(37, 'Meringue Pie', 37000, 'AnyConv.com__pie-with-meringue-citrus-isolated-white-background_185193-80607.png', 'French', 2, '0'),
(38, 'Tiramisu Cake', 65000, 'AnyConv.com__plate-with-tiramisu-cake-isolated-white-background_185193-77841.png', 'Traditional Cake', 1, '0'),
(39, 'Red Velvet Pie', 39000, 'AnyConv.com__red-velvet-cakes-isolated_1203-6842.png', 'Sweet', 2, '0'),
(40, 'Cheese Pie With Cherry Jam', 45000, 'cherry-berries-piece-cream-fruit-pie-white-plate-close-up-sprig-131033044.jpg', 'Sweet', 2, '0'),
(41, 'Honey Pie', 39000, 'AnyConv.com__spatula-with-piece-honey-cake-isolated-white-background_185193-75309.png', 'Sweet', 2, '0'),
(42, 'Croissant', 17000, 'french-pastry-croissant-isolated-traditional-white-background-144684890.jpg', 'Crispy', 3, '0'),
(43, 'Puff pastry', 12000, 'puff-pastry-10473973.jpg', 'Best when use with coffee', 3, '0'),
(44, 'Bun roll', 14000, 'bun-roll-white-background-fresh-sweet-bun-white-background-bun-roll-white-background-112306134.jpg', 'Crunchy', 3, '0'),
(45, 'Poppy seed rollcake', 100000, 'poppy-seed-roll-cake-20790816.jpg', 'Traditional Cake', 4, '0'),
(46, 'Donut', 11000, 'donut-26180925.jpg', 'With Sprinkles', 3, '0'),
(47, 'Cupcake', 13000, 'cupcake-19852033.jpg', 'Sweet', 3, '0'),
(48, 'Egg Tart', 10000, 'homemade-egg-tart-22023345.jpg', 'Sweet', 3, '0'),
(49, 'Bagel', 39000, 'bacon-egg-cheese-breakfast-26245570.jpg', 'Energy for entire day', 5, '0'),
(50, 'BEC', 45000, 'bacon-egg-toast-tomato-fried-breakfast-4148828.jpg', 'Bacon-Egg-Cheese', 5, '0'),
(51, 'Long Sandwich', 42000, 'ham-swiss-sub-sandwich-white-background-5358909.jpg', 'Hot Hot Hot', 5, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_type`
--

CREATE TABLE `product_type` (
  `product_type_id` int(11) NOT NULL,
  `product_type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `product_type_name`) VALUES
(1, 'Whole Cake'),
(2, 'Slices Cake'),
(3, 'Pastry'),
(4, 'Seasonal'),
(5, 'Breakfast');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tborder`
--

CREATE TABLE `tborder` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `order_status_id` int(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `money` int(11) NOT NULL,
  `delivery_name` varchar(250) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `phone` int(12) NOT NULL,
  `payment_method` tinyint(4) NOT NULL COMMENT '0:COD, 1: Bank',
  `address` varchar(2000) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `note` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `delevery_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbstatus`
--

CREATE TABLE `tbstatus` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tbstatus`
--

INSERT INTO `tbstatus` (`id`, `name`, `description`) VALUES
(1, 'ordered', 'Đã đặt hàng'),
(2, 'confirmed', 'Đã xác nhận đơn hàng'),
(3, 'packaged', 'Hoàn tất đóng gói'),
(4, 'shipping', 'Đang giao hàng'),
(5, 'deliveried', 'Đã giao hàng'),
(6, 'canceled', 'Đơn hàng bị hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `admin_email`, `password`, `admin_phone`, `admin_address`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', '09272632782', '', '2022-07-05 04:54:56', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`, `category_status`) VALUES
(1, 'Whole Cake', 'active'),
(2, 'Slices Cake', 'active'),
(3, 'Pastry', 'active'),
(4, 'Seasonal', 'active'),
(5, 'Breakfast', 'active'),
(6, 'Others', 'active');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_comment`
--

CREATE TABLE `tb_comment` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(125) NOT NULL,
  `comment_name` varchar(125) NOT NULL,
  `comment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `comment_status` int(11) NOT NULL,
  `comment_reply` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_comment`
--

INSERT INTO `tb_comment` (`comment_id`, `comment`, `comment_name`, `comment_date`, `comment_status`, `comment_reply`, `product_id`) VALUES
(29, 'banh nhu the nao a', 'le minh trung', '2022-08-04 15:17:43', 0, 0, 1),
(30, 'hhhh', 'admin', '2022-07-31 14:50:05', 1, 29, 1),
(31, 'tui muon dat banh', 'tien', '2022-07-20 15:47:07', 0, 0, 1),
(32, 'xin lien qua zalo nhe', 'admin', '2022-07-20 15:47:05', 1, 31, 1),
(33, 'tui muon dang cho giang sinh', 'lam', '2022-07-20 15:51:10', 0, 0, 28),
(34, 'xin lien qua zalo', 'admin', '2022-07-20 15:51:08', 1, 33, 28),
(35, 'ok ban', 'minh trung', '2022-07-21 03:12:17', 0, 0, 1),
(36, 'muon tu van', 'minh', '2022-07-21 03:53:40', 0, 0, 1),
(37, 'helo ban', 'turng', '2022-07-21 04:41:57', 0, 0, 1),
(38, 'dxfchgjbk', 'cgjh', '2022-07-21 05:06:04', 0, 0, 1),
(39, 'dhvdvds', 'admin', '2022-07-21 05:06:02', 1, 38, 1),
(40, 'ca d vb,asbvdv', 'caascscsa', '2022-08-01 07:56:50', 1, 0, 1),
(41, 'wow', 'Minh trung', '2022-08-03 16:53:11', 0, 0, 3),
(42, 'yes', 'admin', '2022-08-03 16:53:06', 1, 41, 3),
(43, 'hey', 'fnsjvd', '2022-08-04 15:19:36', 0, 0, 3),
(44, 'cam on', 'hhh', '2022-08-04 15:21:49', 1, 0, 6),
(45, 'rree', 'tui', '2022-08-05 08:46:29', 0, 0, 28),
(46, 'rrrrrrrr', 'admin', '2022-08-05 08:46:27', 1, 45, 28);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_customer`
--

CREATE TABLE `tb_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_customer`
--

INSERT INTO `tb_customer` (`customer_id`, `customer_name`, `customer_password`, `customer_phone`, `customer_email`, `customer_address`, `role`) VALUES
(19, 'minh trung', '123', '12345673564546654', 'minhtrung1810123@gmail.com', 'an lac binh tan', 0),
(20, 'trung', '123', '0912345678', 'trunglmts2109015@fpt.edu.vn', 'binh thanh', 1),
(24, 'mr.siro', '123', '12345675667889965', 'siro@gmail.com', 'hihi', 0),
(25, 'minh', '123', '123456789', 'minh@gmail.com', 'tan binh', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_feedback`
--

CREATE TABLE `tb_feedback` (
  `feedback_id` int(11) NOT NULL,
  `feedback` varchar(125) DEFAULT NULL,
  `customer_id` varchar(125) NOT NULL,
  `feedback_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `feedback_status` int(11) NOT NULL,
  `feedback_reply` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `feedback_code` varchar(123) NOT NULL,
  `feedback_image` varchar(125) NOT NULL,
  `order_code` varchar(50) NOT NULL,
  `rating_avg` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_feedback`
--

INSERT INTO `tb_feedback` (`feedback_id`, `feedback`, `customer_id`, `feedback_date`, `feedback_status`, `feedback_reply`, `product_id`, `feedback_code`, `feedback_image`, `order_code`, `rating_avg`) VALUES
(367, 'delicious', '19', '2022-08-05 15:16:00', 0, 0, 28, '2c176', 'home783.jpg', 'c15d7', 4),
(368, 'tuyet voi', '19', '2022-08-05 15:16:23', 0, 0, 5, '53b58', 'home528.jpg', 'c15d7', 5),
(370, 'very good', '24', '2022-08-05 15:27:05', 0, 0, 5, '28867', 'home393.jpg', '0cc3a', 5),
(371, 'vui', '19', '2022-08-05 15:47:20', 0, 0, 3, '7f86c', 'home737.jpg', '06d7d', 0),
(372, 'ssssss', '19', '2022-08-06 02:35:35', 0, 0, 1, 'c4069', 'home580.jpg', 'b53a0', 5),
(373, 'tuyet voi', '19', '2022-08-07 15:22:15', 0, 0, 34, '5a95a', 'home698.jpg', '3e01d', 5),
(374, 'yeyyyy', '19', '2022-08-07 15:23:01', 0, 0, 11, '77c72', 'home332.jpg', '3e01d', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_gallery_feedback`
--

CREATE TABLE `tb_gallery_feedback` (
  `gallery_id` int(11) NOT NULL,
  `feedback_code` varchar(125) NOT NULL,
  `gallery_image` varchar(125) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_gallery_feedback`
--

INSERT INTO `tb_gallery_feedback` (`gallery_id`, `feedback_code`, `gallery_image`) VALUES
(40, '2c176', 'home783.jpg'),
(41, '53b58', 'home528.jpg'),
(42, '28867', 'home393.jpg'),
(43, '7f86c', 'home737.jpg'),
(44, 'c4069', 'home580.jpg'),
(45, '5a95a', 'home698.jpg'),
(46, '77c72', 'home332.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_hcm`
--

CREATE TABLE `tb_hcm` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `type` varchar(30) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_order`
--

CREATE TABLE `tb_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `order_total` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_order`
--

INSERT INTO `tb_order` (`order_id`, `customer_id`, `shipping_id`, `order_total`, `order_status`, `order_code`, `created_at`, `updated_at`) VALUES
(32, 19, 45, '23,909,600.00', 'Đang giao', '11b23', '2022-08-01 09:37:22', NULL),
(40, 19, 53, '6,485,600.00', 'Hoàn thành', '06d7d', '2022-07-29 05:58:54', NULL),
(48, 24, 78, '87,120,000.00', 'Hoàn thành', '0cc3a', '2022-08-05 15:24:53', NULL),
(49, 24, 79, '7,090,600.00', 'Đang xử lý', 'ba622', '2022-08-07 04:17:10', NULL),
(50, 24, 80, '7,090,600.00', 'Đang xử lý', 'a1c9c', '2022-08-07 04:19:51', NULL),
(52, 19, 82, '3,380,000.00', 'Đang xử lý', '38489', '2022-08-07 10:48:54', NULL),
(53, 19, 83, '4,636,000.00', 'Đang xử lý', '1b94c', '2022-08-07 15:19:39', NULL),
(54, 19, 84, '4,636,000.00', 'Hoàn thành', '3e01d', '2022-08-07 15:21:51', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_order_detail`
--

CREATE TABLE `tb_order_detail` (
  `order_detail_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) NOT NULL,
  `order_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(125) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_order_detail`
--

INSERT INTO `tb_order_detail` (`order_detail_id`, `order_id`, `order_code`, `product_id`, `product_name`, `product_price`, `product_quantity`, `product_size`, `created_at`, `updated_at`) VALUES
(45, 27, 'c795b', 2, 'Oreo Cream Cake', '650000', '9', '', NULL, NULL),
(46, 27, 'c795b', 3, 'Matcha Cake', '670000', '3', '', NULL, NULL),
(47, 27, 'c795b', 8, 'Chantilly Moka Cake', '630000', '8', '', NULL, NULL),
(48, 27, 'c795b', 4, 'Chocolate Cake', '640000', '10', '', NULL, NULL),
(49, 28, 'f5145', 2, 'Oreo Cream Cake', '650000', '9', '', NULL, NULL),
(50, 28, 'f5145', 3, 'Matcha Cake', '670000', '3', '', NULL, NULL),
(51, 28, 'f5145', 8, 'Chantilly Moka Cake', '630000', '8', '', NULL, NULL),
(52, 28, 'f5145', 4, 'Chocolate Cake', '640000', '10', '', NULL, NULL),
(53, 29, 'c2bbb', 5, 'Chocolate Royal Cake', '720000', '5', '', NULL, NULL),
(54, 29, 'c2bbb', 1, 'Strawberry Yogurt Cake', '700000', '1', '', NULL, NULL),
(55, 29, 'c2bbb', 3, 'Matcha Cake', '670000', '3', '', NULL, NULL),
(56, 30, 'b3784', 3, 'Matcha Cake', '670000', '3', '', NULL, NULL),
(57, 30, 'b3784', 5, 'Chocolate Royal Cake', '720000', '5', '', NULL, NULL),
(58, 30, 'b3784', 8, 'Chantilly Moka Cake', '630000', '8', '', NULL, NULL),
(59, 31, '46305', 1, 'Strawberry Yogurt Cake', '700000', '4', '', NULL, NULL),
(60, 32, '11b23', 5, 'Chocolate Royal Cake', '720000', '20', '', NULL, NULL),
(61, 32, '11b23', 3, 'Matcha Cake', '670000', '8', '', NULL, NULL),
(62, 33, '12109', 5, 'Chocolate Royal Cake', '720000', '20', '', NULL, NULL),
(63, 33, '12109', 3, 'Matcha Cake', '670000', '8', '', NULL, NULL),
(64, 34, 'b2251', 5, 'Chocolate Royal Cake', '720000', '20', '', NULL, NULL),
(65, 34, 'b2251', 3, 'Matcha Cake', '670000', '8', '', NULL, NULL),
(66, 35, '38c76', 5, 'Chocolate Royal Cake', '720000', '20', '', NULL, NULL),
(67, 35, '38c76', 3, 'Matcha Cake', '670000', '8', '', NULL, NULL),
(68, 36, '8b8d2', 5, 'Chocolate Royal Cake', '720000', '20', '', NULL, NULL),
(69, 36, '8b8d2', 3, 'Matcha Cake', '670000', '8', '', NULL, NULL),
(70, 37, '1ac98', 5, 'Chocolate Royal Cake', '720000', '20', '', NULL, NULL),
(71, 37, '1ac98', 3, 'Matcha Cake', '670000', '11', '', NULL, NULL),
(72, 38, 'a443d', 5, 'Chocolate Royal Cake', '720000', '6', '', NULL, NULL),
(73, 39, 'b53a0', 1, 'Strawberry Yogurt Cake', '700000', '6', '', NULL, NULL),
(74, 39, 'b53a0', 14, 'Mouse Passionflower', '37000', '5', '', NULL, NULL),
(75, 39, 'b53a0', 26, 'Chirsmas Roll Cake', '350000', '8', '', NULL, NULL),
(76, 39, 'b53a0', 3, 'Matcha Cake', '670000', '2', '', NULL, NULL),
(77, 40, '06d7d', 3, 'Matcha Cake', '670000', '8', '', NULL, NULL),
(78, 41, 'deb13', 1, 'Strawberry Yogurt Cake', '700000', '5', '', NULL, NULL),
(79, 42, '734aa', 1, 'Strawberry Yogurt Cake', '700000', '5', '', NULL, NULL),
(80, 43, '194ad', 49, 'Bagel', '39000', '24', '', NULL, NULL),
(81, 44, '039fd', 28, 'Christmas Roll Cake', '350000', '7', '', NULL, NULL),
(82, 45, 'c15d7', 28, 'Christmas Roll Cake', '350000', '18', '', NULL, NULL),
(83, 45, 'c15d7', 5, 'Chocolate Royal Cake', '720000', '1', '', NULL, NULL),
(84, 46, '2f18e', 22, 'Christmas Roll Cake', '350000', '8', '', NULL, NULL),
(85, 46, '2f18e', 44, 'Bun roll', '14000', '8', '', NULL, NULL),
(86, 47, '0a588', 22, 'Christmas Roll Cake', '350000', '8', '', NULL, NULL),
(87, 47, '0a588', 44, 'Bun roll', '14000', '8', '', NULL, NULL),
(88, 48, '0cc3a', 5, 'Chocolate Royal Cake', '720000', '100', '', NULL, NULL),
(89, 49, 'ba622', 5, 'Chocolate Royal Cake', '720000', '8', '', NULL, NULL),
(90, 49, 'ba622', 48, 'Egg Tart', '10000', '10', '', NULL, NULL),
(91, 50, 'a1c9c', 5, 'Chocolate Royal Cake', '720000', '8', '', NULL, NULL),
(92, 50, 'a1c9c', 48, 'Egg Tart', '10000', '10', '', NULL, NULL),
(93, 51, '3575b', 1, 'Strawberry Yogurt Cake', '700000', '5', '', NULL, NULL),
(94, 52, '38489', 2, 'Oreo Cream Cake', '650000', '5', '100000', NULL, NULL),
(95, 54, '3e01d', 34, 'Chocolate Slices Cake', '49000', '9', NULL, NULL, NULL),
(96, 54, '3e01d', 11, 'Pineapple Pie', '37000', '5', NULL, NULL, NULL),
(97, 54, '3e01d', 33, 'Pie with Berries', '45000', '8', NULL, NULL, NULL),
(98, 54, '3e01d', 23, 'Christmas Roll Cake', '350000', '4', NULL, NULL, NULL),
(99, 54, '3e01d', 24, 'Christmas Roll Cake', '350000', '6', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_posts`
--

CREATE TABLE `tb_posts` (
  `post_id` int(11) NOT NULL,
  `post_title` tinytext NOT NULL,
  `post_desc` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `post_images` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_posts`
--

INSERT INTO `tb_posts` (`post_id`, `post_title`, `post_desc`, `post_content`, `post_images`) VALUES
(18, 'Bánh Flan', 'CÁCH LÀM BÁNH FLAN PHÔ MAI MỀM MỊN, THƠM NGON KHÔNG BỊ RỖ MẶT', '1.Nguyên Liệu Cần Chuẩn Bị\n- Trứng gà: 6 quả (lấy 3 quả nguyên và 3 lòng đỏ)\n- Đường: 110gWhipping cream: 50ml\n- Phô mai con bò cười: 4 viên\n- Sữa tươi không đường: 400ml\n- 2 muỗng đường, 1 gói cà phê để làm caramel\n\n2. Làm Caramel\nCho đường vào nồi, đun ở lửa nhỏ đến khi thấy đường tan ra và trở nên vàng sậm như màu cánh gián là được. Hòa tan cà phê rồi cho một chút vào nồi caramel, khuấy đều hỗn hợp rồi rót vào khuôn bánh tráng đều đáy khuôn.\n\n3. Công Đoạn Làm Bánh Flan\n- Cho 3 quả trứng gà nguyên và tách thêm 3 lòng đỏ vào tô, khuấy đều cho trứng tan vào nhau. Lưu ý: Bạn nên khuấy nhẹ và đều tay theo 1 chiều.\n Cho tiếp 110g đường vào hỗn hợp rồi tiếp tục khuấy đều. Phần phô mai cho lên đun cách thủy đến khi tan chảy. Cho tiếp vào hỗn hợp: 400ml sữa, whipping cream,\nphô mai tan chảy rồi đun tiếp cho đến khi hỗn hợp ấm lên khoảng 50 – 60 độ C thì ngừng lại. Lưu ý: phần hỗn hợp này bạn không được đun sôi nhé.\n\n4. Bí Quyết Hấp Bánh Flan Không Bị Rỗ Mặt\n-Rót từ từ hỗn hợp này vào tô trứng, khuấy đều và nhẹ tay. Rây hỗn hợp 2 lần cho bánh giữ được độ đều mịn khi hấp. Đổ hỗn hợp vào khuôn bánh đã tráng caramel.\nđổ hỗn hợp vào khuôn bánh. \n- Đổ hỗn hợp vào khuôn bánh flan.\n- Xếp khuôn bánh vào xửng, che lên mặt bánh một tấm vải xô để thấm nước đọng lại trên nắp vung. Hấp bánh khoảng 30 phút với lửa nhỏ. Lưu ý: Trong quá trình hấp khoảng 10 phút bạn nên mở nắp ra một lần rồi lau khô phần nước đọng trên nắp, không để nước nhỏ xuống khiến bánh bị rỗ mặt.\n\n5. Hoàn Thành Và Thưởng Thức\n- Lấy bánh ra khỏi xửng hấp, đợi cho bánh nguội và cứng lại mới nhẹ nhàng đổ ra đĩa. Thêm chút đá bào và cà phê đen lên bánh để hương vị thơm ngon hơn. Hoặc bạn có thể thưởng thức một mình bánh flan đều được.\nbánh flan thơm ngon\n- Thêm chút đá lạnh và cà phê để món bánh thơm ngon hơn\n- Vậy là chỉ trong vài công đoạn đơn giản chúng ta đã hoàn thành xong công thức làm bánh flan phô mai thật hấp dẫn, thơm ngon phải không nào. Hi vọng với hướng dẫn chi tiết này bạn sẽ làm thành công món bánh ngon chiêu đãi cả nhà nhé. Tham khảo thêm cách làm bánh Crepe chuối kiểu Pháp thơm ngon để thay đổi khẩu vị thường xuyên hơn. Chúc bạn thành công!', 'flan.jpg'),
(19, 'Bánh mì bơ sữa', 'Cách làm bánh mì bơ sữa bằng nồi chiên không dầu thơm ngon, mềm mịn', '1. Nguyên liệu làm Bánh mì bơ sữa bằng nồi chiên không dầu\r\n - Bột mì đa dụng 300 gr\r\n - Sữa tươi không đường 60 ml\r\n - Bơ lạt 50 gr\r\n - Men nở instant 5 gr\r\n - Muối 1/4 muỗng cà phê\r\n - Đường 2 muỗng canh\r\n - Trứng gà 1 quả\r\n\r\n2.\r\nTrộn bột bánh\r\nCho 300gr bột mì đa dụng và 5gr men nở vào tô, trộn đều.\r\nCho thêm 1/4 muỗng cà phê muối, 2 muỗng canh đường, cho thêm 1 quả trứng gà và 60ml sữa tươi vào.\r\nTrộn đều hỗn hợp.\r\n\r\n3.\r\nNhào bột bánh\r\nCho khối bột ra ngoài và bắt đầu công đoạn nhồi bột. Đầu tiên bạn gấp bột lại sau đó dùng mu bàn tay, ấn và miết, đẩy bột ra xa (Folding and Stretching). Lưu ý là ấn và miết bột ra xa chứ không phải là ấn xuống. Xoay khối bột một góc 90 độ, lặp lại hai bước như trên.\r\nSau khi nhồi được 10 - 15 phút khối bột trở nên dai và mịn hơn thì cho 50gr bơ lạt và quả nam việt quất khô vào và nhồi theo cách tương tự rồi từ từ tăng tốc độ nhồi bột lên.\r\nNhồi cho đến khi bơ quyện vào bột, bột trở nên mềm, dai, mịn và không dính tay ngắt bột cục bột ra kéo được thành lớp màng mỏng là đạt.\r\n\r\n4.\r\nỦ bột\r\nDùng màng thực phẩm hoặc miếng vải mỏng bọc kín tô bột và ủ bột khoảng 45 phút tùy nhiệt độ phòng cho bột nở gấp đôi.\r\n\r\n5\r\nChia và cán bột\r\nRắc một ít bột khô lên mặt bàn, cho phần bột đã nhào ra dùng mu bàn tay, ấn và miết, đẩy bột ra xa (Folding and Stretching). Lưu ý là ấn và miết bột ra xa chứ không phải là ấn xuống. Xoay khối bột một góc 90 độ, lặp lại hai bước như trên.\r\nChia bột ra thành các phần nhỏ bằng nhau tùy theo kích thước khuôn của bạn. Đậy kín bột lại và ủ khoảng 10 phút trước khi tạo hình.\r\n\r\n6.\r\nTạo hình bánh và ủ lần 2\r\nBánh bạn có thể nặn thành hình tròn, hình xoắn ốc hoặc hình trụ dài tùy ý.\r\nĐậy kín bột lại và ủ khoảng 15 phút trước khi nướng bánh.\r\n\r\n7.\r\nNướng bánh bằng nồi chiên không dầu\r\nLót một tờ giấy bạc vào khay của nồi chiên không dầu, làm nóng nồi ở nhiệt độ 160 độ khoảng 4 phút\r\nXếp bánh vào khay nồi. Nướng bánh khoảng 160 độ C trong 5 phút, sau đó bạn mở nồi, trở bánh và nướng thêm khoảng 5 phút nữa cho bánh chín đều.\r\n\r\n8.\r\nThành phẩm\r\nBánh mì bơ sữa thơm thơm, ngọt ngào, mềm ngon với mùi bơ đặc trưng thật hấp dẫn đúng không nào? Cùng thưởng thức ngay nhé!', 'bosua.jpg'),
(20, 'Bánh mì bơ tỏi', 'Cách làm bánh mì bơ tỏi - Garlic Bread thơm ngon giòn rụm cho bữa ăn sáng', 'Nguyên liệu làm Bánh mì bơ tỏi\r\n - Bánh mì que 200 g\r\n(1 ổ Bánh mì baguette)\r\n-  Bơ lạt 50 g\r\n- Tỏi băm 30 g\r\n- Ngò rí 20 g\r\n - Muối 1/4 muỗng cà phê\r\n - Tiêu 1/4 muỗng cà phê\r\n - Bột phô mai 100 g\r\n(parmesan)\r\n - Thyme 10 g\r\n(Cỏ xạ hương)\r\n\r\nCách chế biến Bánh mì bơ tỏi\r\n1\r\nBăm tỏi và ngò\r\nTỏi đem bóc vỏ và băm nhỏ. Ngò rí rửa sạch cắt nhỏ.\r\n\r\n2\r\nLàm hỗn hợp bơ tỏi\r\nCho 50g bơ lạt vào tô sau đó thêm tỏi băm, ngò rí cắt nhỏ, thyme, muối và tiêu trộn đều hỗn hợp.\r\n\r\n3\r\nQuét bơ lên bánh mì và đem nướng\r\nBật lò nướng trước 15 phút để lò ổn định nhiệt độ.\r\nCắt bánh mì baguette thành khúc ngắn rồi cắt làm đôi, phết hỗn hợp bơ tỏi vừa trộn lên trên.\r\nXếp bánh mì vào khay, rắc 1 ít phô mai parmesan rồi đem đi nướng 15 phút ở 160 độ C là hoàn thành bánh mì bơ tỏi.\r\n\r\n4\r\nThành phẩm\r\nBánh mì bơ tỏi ra lò có màu nâu giòn lớp bơ tỏi óng ánh cùng phô mai thơm phức phía trên. Cắt lát ra và cùng thưởng thức bánh mì giòn tan thơm mùi của thyme và ngò rí kết hợp với tỏi cùng vị béo ngậy của bơ và phô mai, thật tuyệt vời.\r\nĐây là món ăn vặt tuyệt vời cho những ngày rảnh rỗi tại nhà. Bạn có thể dùng kem xúc xích, thịt nguội cùng với tương cà hoặc tương ớt cho buổi sáng, để giải ngấy bạn có thể dùng kèm các món salad cho buổi tối. Bánh mì bơ tỏi và mayonaise cũng là lựa chọn hoàn hảo.', 'bánh mì bơ tỏi50.jpg'),
(22, 'sdgsdgsd', 'sdgsdgsdg', '<p>sdgsdgsdgdsgsdgs</p>', 'pngegg409.png'),
(23, 'banh kem', 'kem', '<p><img alt=\"Cách Làm Bánh Kem\" src=\"https://cdn.shortpixel.ai/spai/q_lossless+w_855+to_auto+ret_img/https://www.thatlangon.com/wp-content/uploads/2020/05/cach-lam-banh-kem-1.jpg\" style=\"height:400px; width:570px\" /></p>\n\n<ul>\n	<li>\n	<p>Save</p>\n	</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<h3>Bước 1: C&aacute;ch L&agrave;m B&aacute;nh Kem - Cốt B&aacute;nh</h3>\n\n<p>1. Đầu ti&ecirc;n, bạn cần l&agrave;m n&oacute;ng l&ograve; nướng ở 180 &deg;C trong 10 ph&uacute;t. Việc l&agrave;m n&oacute;ng l&ograve; l&agrave; để gi&uacute;p nhiệt độ trong l&ograve; ổn định. Đến l&uacute;c cho b&aacute;nh v&agrave;o nướng th&igrave; bột sẽ nở nhanh, đều v&agrave; ngon hơn.</p>', 'home7851.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_rating`
--

CREATE TABLE `tb_rating` (
  `rating_id` int(11) NOT NULL,
  `product_id_star` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `rating_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `order_code` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_rating`
--

INSERT INTO `tb_rating` (`rating_id`, `product_id_star`, `rating`, `rating_time`, `order_code`) VALUES
(177, 28, 4, '2022-08-05 15:15:44', 'c15d7'),
(178, 5, 5, '2022-08-05 15:16:07', 'c15d7'),
(180, 5, 5, '2022-08-05 15:26:47', '0cc3a'),
(181, 3, 5, '2022-08-05 15:47:51', '06d7d'),
(182, 1, 5, '2022-08-06 02:35:27', 'b53a0'),
(183, 34, 5, '2022-08-07 15:22:04', '3e01d'),
(184, 11, 3, '2022-08-07 15:22:22', '3e01d'),
(185, 33, 5, '2022-08-07 15:22:39', '3e01d'),
(186, 23, 5, '2022-08-07 15:22:44', '3e01d');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_shipping`
--

CREATE TABLE `tb_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_time_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_time_hour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_payment` enum('COD','BANK') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_shipping`
--

INSERT INTO `tb_shipping` (`shipping_id`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_note`, `shipping_time_day`, `shipping_time_hour`, `shipping_payment`, `created_at`, `updated_at`) VALUES
(40, 'Minh Trung', 'an lac', '09127838837', 'note', '2022-07-12', '12:30', 'COD', NULL, NULL),
(41, 'Minh Trung', 'vdvsvavsva', '09127838837', 'note', '2022-07-13', '13:00', 'COD', NULL, NULL),
(42, 'Minh Trung', 'vdvsvavsva', '09127838837', 'note', '2022-07-20', '13:30', 'COD', NULL, NULL),
(43, 'Minh Trung', 'an lac', '09127838837', 'note', '2022-07-13', '13:00', 'BANK', NULL, NULL),
(44, 'Minh Trung', 'vdvsvavsva', '09127838837', 'note', '2022-07-27', '11:30', 'COD', NULL, NULL),
(45, 'Minh Trung', 'an lac', '09127838837', 'note', '2022-07-14', '11:00', 'COD', NULL, NULL),
(46, 'Minh Trung', 'bfbdf', '09127838837', 'note', '2022-08-04', '12:15', 'COD', NULL, NULL),
(47, 'Minh Trung', 'trung', '09127838837', 'note', '2022-07-20', '11:00', 'BANK', NULL, NULL),
(48, 'Minh Trung', 'trung', '09127838837', 'note', '2022-07-22', '12:15', 'COD', NULL, NULL),
(49, 'Minh Trung', 'an lac', '09127838837', 'note', '2022-07-19', '12:30', 'COD', NULL, NULL),
(50, 'Minh Trung', 'trung', '09127838837', 'note', '2022-07-14', '12:15', 'COD', NULL, NULL),
(51, 'Minh Trung', 'an lac', '09127838837', 'note', '2022-07-12', '13:30', 'BANK', NULL, NULL),
(52, 'Minh Trung', 'an lac', '09127838837', 'note', '2022-07-13', '13:00', 'BANK', NULL, NULL),
(53, 'Minh Trung', 'an lac', '09127838837', 'note', '2022-07-26', '12:00', 'BANK', NULL, NULL),
(54, 'le minh trung', 'an lac', '0912888935', 'note', '2022-08-22', 'NOW', 'COD', NULL, NULL),
(56, 'le minh trung', 'an lac', '0912888935', 'note', '2022-08-12', '13:00', 'COD', NULL, NULL),
(57, 'le minh trung', 'an lac', '0912888935', 'note', '2022-08-12', '13:00', 'COD', NULL, NULL),
(58, 'le minh trung', 'an lac', '0912888935', NULL, '2022-08-17', '15:30', 'COD', NULL, NULL),
(59, 'le minh trung', 'vdvsvavsva', '0912888935', NULL, '2022-08-16', '14:30', 'COD', NULL, NULL),
(60, 'le minh trung', 'vdvsvavsva', '0912888935', NULL, '2022-08-16', '14:30', 'COD', NULL, NULL),
(61, 'l', 'vdvsvavsva', '0912888935', NULL, '2022-08-23', '12:30', 'COD', NULL, NULL),
(62, 'le minh trung', 'vdvsvavsva', '0912888935', NULL, '2022-08-20', '14:30', 'COD', NULL, NULL),
(63, 'le minh trung', 'an lac', '0912888935', NULL, '2022-08-28', '12:30', 'COD', NULL, NULL),
(64, 'le minh trung', 'trung', '0912888935', NULL, '2022-08-24', '12:30', 'COD', NULL, NULL),
(65, 'le minh trung', 'trung', '0912888935', NULL, '2022-08-24', '12:30', 'COD', NULL, NULL),
(66, 'le minh trung', 'trung', '0912888935', NULL, '2022-08-30', '14:30', 'COD', NULL, NULL),
(67, 'le minh trung', 'trung', '0912888935', NULL, '2022-08-24', '14:30', 'COD', NULL, NULL),
(68, 'le minh trung', 'trung', '0912888935', NULL, '2022-08-25', '14:30', 'COD', NULL, NULL),
(69, 'le minh trung', 'trung', '0912888935', NULL, '2022-09-05', '15:30', 'COD', NULL, NULL),
(70, 'le minh trung', 'trung', '0912888935', 'note', '2022-08-22', '14:30', 'COD', NULL, NULL),
(71, 'le minh trung', 'trung', '0912888935', 'note', '2022-08-22', '14:30', 'COD', NULL, NULL),
(72, 'le minh trung', 'trung', '0912888935', 'note', '2022-08-06', '15:30', 'BANK', NULL, NULL),
(73, 'le minh trung', 'trung', '0912888935', 'note', '2022-08-24', '15:30', 'COD', NULL, NULL),
(74, 'le minh trung', 'vdvsvavsva', '0912888935', 'note', '2022-08-31', '13:30', 'COD', NULL, NULL),
(75, 'le minh trung', 'trung', '0912888935', NULL, '2022-09-06', '15:00', 'BANK', NULL, NULL),
(76, 'le minh trung', 'vdvsvavsva', '0912888935', 'note', '2022-08-23', '14:30', 'COD', NULL, NULL),
(77, 'le minh trung', 'an lac', '0912888935', 'note', '2022-08-23', '14:30', 'COD', NULL, NULL),
(78, 'siro mr', 'an lac', '0912888935', 'note', '2022-08-24', '14:30', 'COD', NULL, NULL),
(79, 'le minh trung', 'binh thanh', '0912888935', 'note', '2022-08-16', '16:00', 'COD', NULL, NULL),
(80, 'le minh trung', 'quan 1', '0912888935', 'note', '2022-09-01', '13:30', 'BANK', NULL, NULL),
(81, 'le minh trung', 'an lac', '0912888935', 'note', '2022-08-28', '14:00', 'COD', NULL, NULL),
(82, 'le minh trung', 'bfbdf', '0912888935', 'note', '2022-08-19', '13:30', 'COD', NULL, NULL),
(83, 'le minh trung', 'an lac', '0912888935', 'note', '2022-08-18', '14:30', 'COD', NULL, NULL),
(84, 'le minh trung', 'an lac', '0912888935', 'note', '2022-08-18', '14:30', 'COD', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_size`
--

CREATE TABLE `tb_size` (
  `size_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(20) NOT NULL,
  `size_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tb_size`
--

INSERT INTO `tb_size` (`size_id`, `product_id`, `size`, `size_price`) VALUES
(18, 1, '17x5cm', 100000),
(19, 1, '20x7cm', 150000),
(20, 1, '24x7cm', 200000),
(21, 2, '20x7cm', 100000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tb_user`
--

CREATE TABLE `tb_user` (
  `id` bigint(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(16) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `profile_pic` varchar(230) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(128) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-customers, 1-admin',
  `is_active` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0 - inActive, 1 - isActive	',
  `provider` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT 'form',
  `provider_id` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `email`, `password`, `profile_pic`, `phone`, `address`, `role`, `is_active`, `provider`, `provider_id`) VALUES
(1, 'trung', 'trung@gmail.com', '123', NULL, 1234567789, '5678gfcvjkyf', 1, 0, 'form', NULL),
(2, 'minh', 'minh@gmail.com', '123', NULL, 1234567889, '5678gfcvjkyf', 1, 0, 'form', NULL),
(3, 'thien', 'thien@gmail.com', '123', NULL, 1234566789, '5678gfcvjkyf', 0, 0, 'form', NULL),
(4, 'tuan', 'tuan@gmail.com', '123', NULL, 123456789, '5678gfcvjkyf', 0, 0, 'form', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_ibfk_1` (`category_id`);

--
-- Chỉ mục cho bảng `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Chỉ mục cho bảng `tborder`
--
ALTER TABLE `tborder`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_status_id_2` (`order_status_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `order_status_id` (`order_status_id`,`customer_id`);

--
-- Chỉ mục cho bảng `tbstatus`
--
ALTER TABLE `tbstatus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tb_feedback`
--
ALTER TABLE `tb_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Chỉ mục cho bảng `tb_gallery_feedback`
--
ALTER TABLE `tb_gallery_feedback`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Chỉ mục cho bảng `tb_hcm`
--
ALTER TABLE `tb_hcm`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Chỉ mục cho bảng `tb_posts`
--
ALTER TABLE `tb_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Chỉ mục cho bảng `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD PRIMARY KEY (`rating_id`);

--
-- Chỉ mục cho bảng `tb_shipping`
--
ALTER TABLE `tb_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Chỉ mục cho bảng `tb_size`
--
ALTER TABLE `tb_size`
  ADD PRIMARY KEY (`size_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tborder`
--
ALTER TABLE `tborder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbstatus`
--
ALTER TABLE `tbstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tb_comment`
--
ALTER TABLE `tb_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `tb_feedback`
--
ALTER TABLE `tb_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;

--
-- AUTO_INCREMENT cho bảng `tb_gallery_feedback`
--
ALTER TABLE `tb_gallery_feedback`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `tb_hcm`
--
ALTER TABLE `tb_hcm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  MODIFY `order_detail_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT cho bảng `tb_posts`
--
ALTER TABLE `tb_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT cho bảng `tb_shipping`
--
ALTER TABLE `tb_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT cho bảng `tb_size`
--
ALTER TABLE `tb_size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tborder`
--
ALTER TABLE `tborder`
  ADD CONSTRAINT `tborder_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `tbusers` (`id`),
  ADD CONSTRAINT `tborder_ibfk_2` FOREIGN KEY (`order_status_id`) REFERENCES `tbstatus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
