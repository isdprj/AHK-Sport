-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 17, 2023 lúc 03:22 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `isd`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL DEFAULT 0,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_operation_log`
--

CREATE TABLE `admin_operation_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_permissions`
--

CREATE TABLE `admin_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `http_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `http_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_role_menu`
--

CREATE TABLE `admin_role_menu` (
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_role_permissions`
--

CREATE TABLE `admin_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_role_users`
--

CREATE TABLE `admin_role_users` (
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_user_permissions`
--

CREATE TABLE `admin_user_permissions` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_oreder` date NOT NULL,
  `total` double NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `date_oreder`, `total`, `payment`, `note`, `id_customer`, `created_at`, `updated_at`, `status`, `id_user`) VALUES
(1, '2023-05-17', 79000, 'vnpay', 'f', 8, '2023-05-17 04:08:50', '2023-05-17 04:08:50', 'Đã hủy đơn', 3),
(2, '2023-05-17', 249000, 'zalopay', 'b. Kích thước: null', 9, '2023-05-17 04:09:53', '2023-05-17 04:09:53', 'Đang xử lí', 3),
(3, '2023-05-17', 79000, 'ib', 'Veniam in error sun', 10, '2023-05-17 04:27:07', '2023-05-17 04:27:07', 'Đang đóng gói', 1),
(4, '2023-05-17', 609000, 'cash', 'iii. Kích thước: ', 11, '2023-05-17 04:27:33', '2023-05-17 04:27:33', 'Đang xử lí', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_details`
--

CREATE TABLE `bill_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_bill` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `unit_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_details`
--

INSERT INTO `bill_details` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(1, 1, 34, 1, 99000, '2023-05-17 04:08:50', '2023-05-17 04:08:50'),
(2, 2, 7, 1, 55000, '2023-05-17 04:09:53', '2023-05-17 04:09:53'),
(3, 2, 8, 1, 239000, '2023-05-17 04:09:53', '2023-05-17 04:09:53'),
(4, 3, 34, 1, 99000, '2023-05-17 04:27:07', '2023-05-17 04:27:07'),
(5, 4, 21, 1, 589000, '2023-05-17 04:27:33', '2023-05-17 04:27:33'),
(6, 4, 26, 1, 35000, '2023-05-17 04:27:33', '2023-05-17 04:27:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_user` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`, `id_user`) VALUES
(1, 'ggg', 'nữ', 'ngoclh012@gmail.com', 'gg', '09574567', 'ff', '2023-05-14 21:36:04', '2023-05-14 21:36:04', 1),
(2, 'Lê Hồng Ngọc', 'nữ', 'hongngocle492@gmail.com', '22', '93642212', '6666', '2023-05-16 02:20:45', '2023-05-16 02:20:45', 1),
(3, 'Lê Hồng Ngọc', 'nữ', 'hongngocle492@gmail.com', 'Hanoi University', '93642212', 'sss', '2023-05-16 20:50:31', '2023-05-16 20:50:31', 1),
(4, 'Lê Hồng Ngọc', 'nữ', 'hongngocle492@gmail.com', 'Hanoi University', '93642212', 'fff', '2023-05-16 20:56:37', '2023-05-16 20:56:37', 1),
(5, 'Lê Hồng Ngọc', 'nữ', 'ngoclh012@gmail.com', 'Hanu', '93642211', 'r', '2023-05-17 04:04:06', '2023-05-17 04:04:06', 3),
(6, 'Lê Hồng Ngọc', 'nữ', 'ngoclh012@gmail.com', 'Hanu', '93642211', 'r', '2023-05-17 04:05:38', '2023-05-17 04:05:38', 3),
(7, 'Lê Hồng Ngọc', 'nữ', 'ngoclh012@gmail.com', 'Hanu', '93642211', 'r', '2023-05-17 04:08:39', '2023-05-17 04:08:39', 3),
(8, 'Lê Hồng Ngọc', 'nữ', 'ngoclh012@gmail.com', 'Hanu', '93642211', 'r', '2023-05-17 04:08:50', '2023-05-17 04:08:50', 3),
(9, 'Lê Hồng Ngọc', 'nữ', 'ngoclh012@gmail.com', 'Hanu', '93642211', 'b', '2023-05-17 04:09:53', '2023-05-17 04:09:53', 3),
(10, 'Lê Hồng Ngọc', 'nữ', 'hongngocle492@gmail.com', 'Hanoi University', '93642211', 'j', '2023-05-17 04:27:07', '2023-05-17 04:27:07', 1),
(11, 'Lê Hồng Ngọc', 'nữ', 'hongngocle492@gmail.com', 'Hanoi University', '93642211', 'iii', '2023-05-17 04:27:33', '2023-05-17 04:27:33', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favourite`
--

CREATE TABLE `favourite` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `favourites`
--

INSERT INTO `favourites` (`id`, `id_user`, `id_product`, `created_at`, `updated_at`) VALUES
(1, 1, 35, '2023-05-10 09:04:25', '2023-05-10 09:04:25'),
(2, 1, 22, '2023-05-10 18:06:08', '2023-05-10 18:06:08'),
(3, 3, 1, '2023-05-16 02:53:01', '2023-05-16 02:53:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_03_23_103259_create_users_table', 1),
(5, '2023_03_24_050901_create_product_categories_table', 2),
(6, '2023_03_24_055159_create_news_table', 3),
(7, '2023_03_24_052744_create_products_table', 4),
(8, '2023_03_24_055357_create_sliders_table', 4),
(9, '2023_03_24_061707_create_customers_table', 5),
(10, '2023_03_24_060438_create_bills_table', 6),
(11, '2023_03_24_064831_create_bill_details_table', 7),
(12, '2023_03_24_072833_create_favourite_table', 8),
(13, '2016_01_04_173148_create_admin_tables', 9),
(14, '2023_04_01_064721_create_favourites_table', 9),
(15, '2023_04_10_135020_create_social_accounts_table', 9),
(16, '2023_04_12_075658_create_product_variations_table', 9),
(17, '2023_04_26_112717_create_menus_table', 9),
(18, '2023_05_04_073635_update_table_bill_details', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` double NOT NULL,
  `promotion_price` double DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stats` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_category`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `quantity`, `created_at`, `updated_at`, `stats`) VALUES
(1, 'ADIDAS PREDATOR ACCURACY .4 TF ', 1, 'adidas Predator Accuracy .4 TF Own Your Football - Core Black/Footwear White/Shock Pink là mẫu giày phổ thông dành cho mặt sân cỏ nhân tạo 5-7 người. Predator đã duy trì sự thay đổi trong suốt những năm qua, và 2023 là một ngoại hình hoàn toàn mới, thiết ', 1590000, 1390000, 'shoes_adidas1.1.png', '', 20, '2023-03-26 03:53:54', '2023-03-26 03:53:54', ''),
(2, 'NIKE STREET GATO IC', 2, 'Nike vốn được mệnh danh là \"master on the small courts\" - chuyên gia trong lĩnh vực giày bóng đá trong nhà. Để tiếp tục khẳng định vị trí của mình, Nike vừa mới đây đã phát hành phiên bản cải tiến ấn tượng của dòng giày Street Gato và các bản cập nhật màu sắc độc đáo đảm bảo đáp ứng mọi phong cách cho người chơi.', 2150000, 0, 'shoes_nike1.1.png', '', 20, '2023-03-26 04:02:42', '2023-03-26 04:02:42', ''),
(3, 'MIZUNO MORELIA NEO III PRO FG', 3, 'Morelia là dòng sản phẩm lâu đời nhất của Mizuno (ra mắt năm 1985), nhưng trải qua gần 30 năm hình thành và phát triển, Moreila đang không ngừng cải tiến từng ngày, từ thiết kế đến công nghệ nhằm bắt kịp xu thế hiện đại. Morelia III Beta cũng là dòng sản phẩm được Sergio Ramos làm đại diện trước khi chuyển qua Mizuno Alpha. Giữa thị trường giày bóng đá ngày càng đa dạng với nhiều thương hiệu đình đám, chúng ta vẫn phải công nhận những cải tiến và đột phá của mình đã giúp Mizuno có chỗ đứng vững chắc trong lòng người hâm mộ.', 2850000, 0, 'shoes_mizuno1.1.png', '', 0, '2023-03-26 04:10:03', '2023-03-26 04:10:03', ''),
(4, 'KAMITO TA11 PRO TF TOUCH MAGIC', 4, 'TA11 ra đời để vinh danh cũng như ghi nhận những đóng góp đáng giá của cầu thủ Nguyễn Tuấn Anh. Giống như những mẫu giày \"Signature\" khác, Kamito TA11 sở hữu những đặc trưng khác biệt và thú vị liên quan đến đội trưởng của CLB Hoàng Anh Gia Lai.\r\nNhững sản phẩm từ thương hiệu Kamito được kỳ công sáng tạo bởi những người thợ lành nghề, dồn tâm huyết vào từng đường kim mũi chỉ, mong muốn đem đến những sản phẩm tốt nhất, giúp các cầu thủ thăng hoa khi thi đấu cùng hiệu suất cao nhất. \r\n', 899000, 0, 'shoes_kamito1.1.png', '', 0, '2023-03-26 04:13:32', '2023-03-26 04:13:32', ''),
(5, 'PUMA FUTURE ULTIMATE FG/AG ', 5, 'Phiên bản giày đá banh Puma Future Ultimate \'Creativity\' mới dành cho Neymar được phối màu hài hòa từ 3 gam màu \"Puma White/Team Violet/Fluro Yellow\". Ngoài ra, ấn tượng nhất phải kể đến sự kết hợp sáng tạo giữa các họa tiết cách điệu đầy sự phá cách và táo bạo. Các đường nét họa tiết được thiết kế theo hình thức bất đối xứng, kết hợp giữa màu vàng và trắng mang lại sự độc đáo và ấn tượng mạnh mẽ cho phiên bản giày này. Logo Puma được đặt ở phía trên của giày, kết hợp với chữ ký của Neymar ở phía sau, tạo nên phong cách riêng biệt và cá tính. Tổng thể, màu sắc và họa tiết của phiên bản giày đá banh Future Ultimate rất phù hợp với phong cách chơi bóng nhanh nhẹn, đầy năng lượng của siêu sao Neymar.', 5390000, 0, 'shoes_puma1.1.png', '', 0, '2023-03-26 04:36:27', '2023-03-26 04:36:27', ''),
(6, 'TẤT CHỐNG TRƠN H3 SUPERB', 6, 'Tất chống trơn H3 Superb với thiết kế đặc biệt, lớp cao su dưới lòng bàn chân tạo ma sát, hạn chế trơn trượt, thường sử dụng trong các môn thể thao tốc độ như bóng đá, bóng bầu dục, tennis...\r\nCông nghệ làm tất H3 của Thailand ngày càng hoàn thiện, gần tiệm cận với tất Trusox nổi tiếng của nước ngoài. ', 200000, 175000, 'tất2.3.png', '', 0, '2023-03-26 05:56:50', '2023-03-26 05:56:50', ''),
(7, 'BĂNG KEO THỂ THAO STARBALM ', 7, 'BĂNG KEO THỂ THAO STARBALM thường được các vận động viên sử dụng trước, trong và sau khi thi đấu. ', 55000, 40000, 'brassard1.png', '', 0, '2023-03-26 06:01:17', '2023-03-26 06:01:17', ''),
(8, 'BỘ QUẦN ÁO BÓNG ĐÁ KAMITO Q3', 8, 'Bộ quần áo bóng đá Kamito Đà Nẵng - Xanh ngọc là dòng sản phẩm có chất vải mềm mại, giảm nhăn hiệu quả, thoáng khí, co dãn 4 chiều với độ đàn hồi cao nhờ sự kết hợp theo tỷ lệ đặc biệt từ sợi Polyester và sợi Elastan. Áp dụng công nghệ Moisture-Wicking giúp những chiếc áo đấu Kamito có khả năng hút ẩm cao và bay hơi nhanh. Người mặc sẽ luôn cảm thấy nhẹ nhàng và khô thoáng, hạn chế những mùi phát sinh trong quá trình vận động cường độ cao. Thiết kế body fit hiện đại, tôn dáng, năng động, giúp người mặc luôn tự tin khi sử dụng.', 239000, 209000, 'clothes1.png', '', 0, '2023-03-26 06:05:14', '2023-03-26 06:05:14', ''),
(9, 'BALO NEYMARSPORT FOOTBALL \n', 9, 'NEYMARSPORT FOOTBALL BACKPACK 2022 là mẫu Balo mới nhất được Neymarsport thiết kế với nhiều tiện lợi, thời trang phù hợp cho người dùng có thể mang đi đá bóng, đi chơi hoặc đi làm và đi học. Balo gồm nhiều ngăn túi đựng đồ đạc, laptop... Ngoài ra, 2 bên túi có thể đựng nước uống và phía dưới có ngăn đựng giày thông minh, gọn gàng tách riêng với đồ đạc cá nhân.\r\n', 219000, 199000, 'bag1.png', '', 0, '2023-03-26 06:10:03', '2023-03-26 06:10:03', ''),
(10, 'GĂNG TAY THỦ MÔN NIKE  ', 10, 'Găng tay thủ môn Nike Goalkeeper Match sẵn sàng cùng bạn trong mọi pha cứu thua. Lớp đệm mềm, hỗ trợ trong các pha bắt bóng. Thiết kế bề mặt nhẵn giúp bạn dễ dàng cầm nắm dù trong điều kiện ẩm ướt hay khô ráo.', 809000, 759000, 'găng tay1.1.png', '', 0, '2023-03-26 06:19:27', '2023-03-26 06:19:27', ''),
(11, 'ADIDAS X SPEEDPORTAL .1 FG L10NEL ', 1, 'Để kỷ niệm cho tuổi thứ 35 của Lionel Messi cũng như đánh dấu cho cột mốc một năm vừa qua anh và đồng đội của mình trở thành đương kim vô địch World Cup 2022, adidas chính thức cho ra mắt một phiên bản X Speedportal giới hạn đặc biệt với một cái tên vô cùng ý nghĩa “L10NEL M35SI”. Tiếp nối phiên bản X Speedportal ‘Leyenda’ trong mùa giải World Cup 2023, đôi giày đá bóng “L10NEL M35SI” lần này sẽ được kế thừa và phát triển những sáng tạo trong thiết kế từ lịch sử phát hành những silo trước đó mà adidas dành cho Messi. Tất nhiên, mọi phong cách và kỹ xảo đồ họa tinh hoa từ trước đến nay sẽ được hợp nhất lại ở giao diện của phiên bản lần này. Adidas X Speedportal .1 FG L10NEL M35SI - Solar Orange/Silver Metallic/Core Black LIMITED EDITION là phiên bản giày cao cấp có dây dành cho sân cỏ tự nhiên 11 người. Đây cũng chính là loại giày được Messi mang ra sân thi đấu. Các gam màu được sử dụng trong XSpeedportal “L10NEL M35SI” lần lượt là team solar orange, silver met và core black. Sắc cam làm chủ đạo để hỗ trợ cho các họa tiết hình học xanh, đen được nổi bật với mục đích làm điểm nhấn cho đôi giày. Mọi chi tiết được xử lý chuyên nghiệp và tinh tế, tạo nên cái nhìn hài hòa và sắc nét ngay ở cả những chi tiết nhỏ nhất. ', 5600000, 4950000, 'shoes_adidas2.1.png', '', 0, '2023-04-30 09:33:47', '2023-04-30 09:33:47', ''),
(12, 'ADIDAS TOP SALA COMPETITION IC ', 1, 'Theo dòng chảy của thời đại, ai rồi cũng sẽ thay đổi. Sau một thời gian hồi sinh vào năm 2019 thì Adidas Top Sala cuối cùng đã thay đổi, từ bỏ thiết kế cũ để chuyển sang 1 giao diện hoàn toàn mới, với tên gọi Top Sala Competition. ', 2695000, 1950000, 'shoes_adidas3.1.png', '', 0, '2023-04-30 09:41:53', '2023-04-30 09:41:53', ''),
(13, 'NIKE AIR ZOOM MERCURIAL VAPOR 15 ', 2, 'Lấy sự sôi động của mùa hè làm nguồn cảm hứng sáng tạo, Nike mang đến bộ sưu tập \'Luminous Pack\' với giao diện nổi bật, bắt mắt và chắc chắn sẽ không có cầu thủ nào có thể bỏ lỡ việc mang những siêu phẩm này lên sân cỏ để thi đấu. Sự tươi sáng và táo bạo được đặt lên hàng đầu, khi Air Zoom Mercurial Vapor XV, Superfly IX, Phantom GX và Tiempo Legend IX đều được khoác lên mình màu sắc rực rỡ của mùa hè chào đón cho những sự kiện thể thao đỉnh cao mới. Nike Air Zoom Mercurial Vapor 15 Academy TF Luminous - Pink Blast/Volt/Gridiron là mẫu giày phổ thông dành cho sân cỏ nhân taọ 5-7 người. Nike Air Zoom Mercurial Vapor 15 Academy TF Luminous sở hữu sắc màu nổi bật \"Pink Blast/Volt/Gridiron\". Gam màu hồng tươi trẻ làm nền, kết hợp cùng các điểm nhấn màu volt hiện đại đặc biệt cho biểu tượng Swoosh trên thân giày và mặt đế, tạo nên vẻ đẹp độc đáo và cuốn hút, khiến cho đôi giày trở thành tâm điểm chú ý trên sân cỏ.', 2695000, 2150000, 'shoes_nike2.1.png', '', 0, '2023-04-30 09:47:39', '2023-04-30 09:47:39', ''),
(14, 'NIKE AIR ZOOM MERCURIAL SUPERFLY ', 2, 'Nike Air Zoom Mercurial Superfly 9 Academy MG Blast - White/Baltic Blue/Pink Blast là phiên bản giày phổ thông dành chuyên cho sân cỏ tự nhiên 11 người. SUPERFLY là tên gọi của các phiên bản cổ cao thường được CR7, Mbappe, Rashford ưa chuộng. Khác với gam màu nâu kim loại \"Metallic Copper\" trầm ấm, phiên bản NNike Air Zoom Mercurial Superfly 9 Academy MG Blast - White/Baltic Blue/Pink Blast  trong Blast Pack này khoác lên mình 1 gam trắng màu vô cùng đẹp. Toàn bộ upper giày là màu trắng sáng, ẩn bên trong là những đường vân kết nối và các hoạ tiết màu xanh dương trong rất hài hoà và dịu mắt. Logo Swoosh của Nike được bao phủ bởi 1 loạt các chi tiết là chữ M cách điệu: viết tắt của dòng sản phẩm Mercurial. Phần đế màu hồng sáng cũng tôn lên vẻ đẹp hài hoà. Cũng như các bst từng phát hành trước đó, màu trắng tuy dễ bẩn nhưng lại là gam màu được yêu thích nhất.', 2939000, 2400000, 'shoes_nike3.1.png', '', 0, '2023-04-30 09:54:18', '2023-04-30 09:54:18', ''),
(15, 'MIZUNO ALPHA ELITE FG ', 3, 'Mẫu giày đá bóng Mizuno Alpha Elite FG - White/Purple/Red là mẫu giày phân khúc Elite (Cao cấp) dành cho mặt sân cỏ tự nhiên 11 người được phối bởi các gam màu White/Purple/Red. Trên nền Upper màu trắng, logo của Mizuno được làm nổi bật bởi sự kết hợp màu đỏ và màu tím, sau đó sử dụng đồ họa để phổ ra các vệt màu nhạt chạy dần về phía gót giày. Thiết kế độc đáo này mang đến cảm giác tốc độ sẵn sàng bùng nổ trong những đường chạy bóng bứt phá. Giày đá bóng Alpha mới của Mizuno được trang bị công nghệ hiện đại với nhiều cải tiến và đa dạng tính năng. Form giày cũng đã thay đổi để phù hợp với các phong cách chơi tốc độ. Alpha đang là dòng sản phẩm nhẹ nhất của nhà Mizuno. - Khác với các thiết kế cũ sử dụng da tự nhiên Kangaroo, Upper của Mizuno Alpha được làm hoàn toàn bằng chất liệu tổng hợp, với 5 chất liệu khác nhau (suede, sponge, frame, woven và PU) mang lại 1 cảm giác mỏng và nhẹ đáng kinh ngạc. Phiên bản Elite Upper được thiết kế mỏng hơn nhưng dẻo dai hơn phiên bản Pro nên trọng lượng cũng nhẹ hơn. - Thiết kế lưới dạng cấu trúc ZEROGLIDE như những đường xương cá, ôm gọn form bàn chân cùng thiết kế đinh dạng tam giác (thay vì đinh tròn như Morelia) tăng khả năng di chuyển hỗ trợ tăng tốc. ', 4800000, 4190000, 'shoes_mizuno2.1.png', '', 0, '2023-04-30 10:03:29', '2023-04-30 10:03:29', ''),
(16, 'MIZUNO MORELIA NEO III PRO TF ', 3, 'Mizuno Morelia Neo III Pro TF - White/Black/Red là mẫu giày chuyên cho sân cỏ nhân tạo 5-7 người. Mẫu giày này được các cầu thủ đánh giá rất cao vì sự toàn diện, bền bỉ và hỗ trợ các cầu thủ rất tốt. Với những sự nâng cấp đáng chú ý, Morelia Neo III Pro AS hứa hẹn sẽ là mẫu giày hot không kém hai phiên bản tiền nhiệm. Những cầu thủ có lối chơi thiên về tốc độ và mong muốn một đôi giày nhẹ, êm ái, cảm giác bóng tốt không thể bỏ qua Morelia Neo III Pro AS.', 3050000, 2700000, 'shoes_mizuno3.1.png', '', 0, '2023-04-30 10:13:23', '2023-04-30 10:13:23', ''),
(17, 'GIÀY ĐÁ BÓNG KAMITO TA11 ', 4, 'Giày đá bóng KAMITO TA11 Woncup - White/Yellow nằm trong bộ sưu tập Woncup, Kamito mang tới những thiết kế hoàn toàn mới dành riêng cho TA11 với những họa tiết đậm chất Qatar trải dài trên thân giày. Mẫu giày này vẫn có đầy đủ 3 phiên bản đế với đế TF đinh dăm dành cho sân cỏ nhân tạo, đế AG đinh cao dành cho sân cỏ tự nhiên và đế IN dành cho futsal. Bên cạnh đó, giày Kamito TA11 Woncup còn có hộp giày, túi đựng giày đi kèm và những sản phẩm này cũng được thiết kế đồng bộ cùng các sản phẩm khác trong bộ sưu tập.', 690000, 599000, 'shoes_kamito2.1.png', '', 0, '2023-04-30 10:19:43', '2023-04-30 10:19:43', ''),
(18, 'GIÀY ĐÁ BÓNG KAMITO QH19 AS TF', 4, 'Giày đá bóng Kamito QH19 AS TF - Violet Blue/White là mẫu giày dành cho sân cỏ nhân tạo 5-7 người. Nhân dịp trở lại trạng thái bình thường mới sau những ngày giãn cách và để tri ân tình cảm của các bạn dành cho QH19, Kamito quyết định ra mắt trở lại siêu phẩm QH19 với tinh thần “Bình thường mới – Sắc màu mới”. Đúng như slogan, QH19 phiên bản 2021 sẽ có những sắc màu mới đó là xanh ngọc và xanh chuối lần đầu tiên xuất hiện cùng với đó là hai phiên bản màu luôn cháy hàng “đỏ nhiệt huyết” và “xanh ánh dương” cũng được trở lại.', 555000, 0, 'shoes_kamito3.1.png', '', 0, '2023-04-30 10:39:12', '2023-04-30 10:39:12', ''),
(19, 'PUMA FUTURE 1.4 PRO CAGE TT', 5, 'PUMA Future 1.4 Pro Cage TT Fastest - Parisian Night/Fizzy Light/Pistachio là phiên bản giày cao cấp dành cho sân cỏ nhân tạo 5-7 người. Với thiết kế gam màu chính thức của Fastest là “Parisian Night/Fizzy Light/Pistachio”.', 3600000, 2750000, 'shoes_puma2.1.png', '', 0, '2023-04-30 10:43:25', '2023-04-30 10:43:25', ''),
(20, 'PUMA FUTURE MATCH TT ', 5, 'PUMA Future Match TT Supercharge - Blue Glimmer/PUMA White/Ultra Orange là mẫu giày phân khúc phổ thông của PUMA dành cho mặt sân cỏ nhân tạo 5-7 người. Từ 2023, Puma đã bỏ các phân biệt các phân khúc theo chấm \".\" thay vào đó họ sẽ đặt tên như sau: Ultimate (cao cấp nhất) - Pro (trung cấp) - Match (phổ thông) - Play (giá rẻ). Về ngoại hình, toàn bộ thân giày đá bóng PUMA Future Match TT Supercharge sở hữu gam màu xanh dương làm chủ đạo. Các dải PWRTAPE màu cam được thiết kế zig-zag kết hợp cùng logo báo trắng trên mũi giày tạo điểm nhấn ấn tượng cho silo này thêm thu hút và bắt mắt hơn. Đây là một phối màu tuy lạ mà quen của Puma trong những năm gần đây, phối màu tạo cảm giác hài hoà nhưng không kém phần nổi bật. Với ngoại hình giống đến 8/10, nếu nhìn sơ qua có thể bạn sẽ nhầm lẫn giữa 2 phân khúc Ultimate và Match.', 2629000, 2150000, 'shoes_puma3.1.png', '', 0, '2023-04-30 10:51:16', '2023-04-30 10:51:16', ''),
(21, 'PACK 6 ĐÔI VỚ BÓNG ĐÁ NIKE ', 6, 'Vớ có đệm của Nike Everyday Plus mang lại sự thoải mái cho cả ngày của bạn với lớp đệm bổ sung dưới gót chân và bàn chân trước và một dải vòm vừa vặn, hỗ trợ. Khả năng thấm mồ hôi và khả năng thoáng khí ở phần trên giúp giữ cho bàn chân của bạn khô ráo và mát mẻ để giúp bạn vượt qua tập luyện bổ sung đó. Công nghệ trên Pack 6 đôi vớ bóng đá Nike Everyday Plus Cushioned Crew Đệm dưới bàn chân trước và gót chân giúp làm dịu tác động của việc tập luyện của bạn.Công nghệ Dri-FIT giúp chân bạn luôn khô ráo và thoải mái.Dải xung quanh vòm tạo cảm giác vừa vặn và hỗ trợ.Mẫu dệt kim thoáng khí trên đầu tăng thêm sự thông thoáng.Gót chân và ngón chân gia cố được làm để kéo dài.', 589000, 0, 'tất2.1.png', '', 0, '2023-05-01 10:23:51', '2023-05-01 10:23:51', ''),
(22, 'VỚ NIKE EVERYDAY PLUS CUSHION', 6, 'Vớ có đệm của Nike Everyday Plus mang lại sự thoải mái cho cả ngày của bạn với lớp đệm bổ sung dưới gót chân và bàn chân trước và một dải vòm vừa vặn, hỗ trợ. Khả năng thấm mồ hôi và khả năng thoáng khí ở phần trên giúp giữ cho bàn chân của bạn khô ráo và mát mẻ để giúp bạn vượt qua tập luyện bổ sung đó. Công nghệ trên Pack 3 đôi vớ Nike Everyday Plus Cushioned Crew Đệm dưới bàn chân trước và gót chân giúp làm dịu tác động của việc tập luyện của bạn.Công nghệ Dri-FIT giúp chân bạn luôn khô ráo và thoải mái.Dải xung quanh vòm tạo cảm giác vừa vặn và hỗ trợ.Mẫu dệt kim thoáng khí trên đầu tăng thêm sự thông thoáng.Gót chân và ngón chân gia cố được làm để kéo dài.', 539000, 0, 'tất5.4.png', '', 0, '2023-05-01 10:31:57', '2023-05-01 10:31:57', ''),
(23, 'VỚ BÓNG ĐÁ NIKE EVERYDAY PLUS ', 6, 'Vớ có đệm của Nike Everyday Plus mang lại sự thoải mái cho cả ngày của bạn với lớp đệm bổ sung dưới gót chân và bàn chân trước và một dải vòm vừa vặn, hỗ trợ. Khả năng thấm mồ hôi và khả năng thoáng khí ở phần trên giúp giữ cho bàn chân của bạn khô ráo và mát mẻ để giúp bạn vượt qua tập luyện bổ sung đó. Công nghệ trên Vớ bóng đá Nike Everyday Plus Cushioned Trainings - White/Baltic Blue Đệm dưới bàn chân trước và gót chân giúp làm dịu tác động của việc tập luyện của bạn.Công nghệ Dri-FIT giúp chân bạn luôn khô ráo và thoải mái.Dải xung quanh vòm tạo cảm giác vừa vặn và hỗ trợ.Mẫu dệt kim thoáng khí trên đầu tăng thêm sự thông thoáng.Gót chân và ngón chân gia cố được làm để kéo dài.', 269000, 0, 'tất5.5.png', '', 0, '2023-05-01 10:37:10', '2023-05-01 10:37:10', ''),
(24, 'VỚ BÓNG ĐÁ ADIDAS FOOTBALL ', 6, 'Trong bóng đá, từng phần của trang phục đều rất quan trọng, bao gồm cả đôi tất dưới chân bạn. Hãy gây ấn tượng với đôi tất đầu gối nam này, kết hợp đệm lót bố trí hợp lý và các mảng phối lưới thoáng khí. Vớ bóng đá Adidas Football Socks Milano 16 White là mẫu vớ chính hãng của Adidas được làm bằng chất liệu 99% nylon và 1% elastane. Về thiết kế, phần cổ chân, vòm bàn chân và viền tất có gân sọc. Ngoài ra, đệm lót được bố trí theo hình dáng bàn chân để nâng đỡ, bảo vệ các vùng chịu nhiều áp lực và các mảng phối lưới thoáng khí giúp cho người chơi luôn thoải mái khi mang vào.', 290000, 0, 'tất5.1.png', '', 0, '2023-05-01 10:44:17', '2023-05-01 10:44:17', ''),
(25, 'BĂNG KEO CƠ THỂ THAO AHK SPORT', 7, 'Băng keo cơ được sử dụng trong các môn thể thao vận động như : Bóng đá, bóng chuyền, bóng rổ,...', 20000, 0, 'băngkeo2.1.png', '', 0, '2023-05-01 10:52:12', '2023-05-01 10:52:12', ''),
(26, 'BĂNG KEO VẢI THỂ THAO AHKSPORT', 7, 'Băng keo vải thể thao NEYMARSPORT là loại băng keo vải bóng đá chuyên dùng để quấn các vị trí như sơmi ( gót chân), mắt cá, đầu gối, vai, cổ hoặc bất cứ vị trí nào cần cố định hoặc hỗ trợ điều trị chấn thương. Cố định vị trí xương khớp và hỗ trợ hạn chế chấn thương do thi đấu bóng đá hoặc thi đấu thể thao.', 35000, 20000, 'băngkeo3.1.png', '', 0, '2023-05-01 10:55:29', '2023-05-01 10:55:29', ''),
(27, 'BỘ QUẦN ÁO BÓNG ĐÁ KAMITO Q2', 8, 'Bộ quần áo bóng đá Kamito FOOTBALL FESTIVAL - Vàng là dòng sản phẩm trong bộ sưu tập Woncup, bộ trang phục thi đấu Festival vẫn sở hữu những họa tiết đậm chất Qatar nhưng được sắp xếp một cách đầy ngẫu hứng và tinh tế, trải dài trên toàn thân áo, mang tới một không khí lễ hội bóng đá sôi động. Bộ trang phục Festival cũng có 7 phiên bản màu sắc khác nhau gồm: Vàng, đỏ, xanh biển, trắng, navy, cam và đỏ đô.', 199000, 0, 'clothes2.png', '', 0, '2023-05-01 11:04:35', '2023-05-01 11:04:35', ''),
(28, 'BỘ QUẦN ÁO BÓNG ĐÁ KAMITO Q1', 8, 'Bộ quần áo bóng đá KAMITO Bình Dương - Tím là bộ áo trang phục tập luyện cũng như thi đấu mới nhất 2022 của Becamex Bình Dương. ', 239000, 0, 'clothes3.1.png', '', 0, '2023-05-01 11:10:19', '2023-05-01 11:10:19', ''),
(29, 'BỘ QUẦN ÁO BÓNG ĐÁ KAMITO Q4', 8, 'Bộ quần áo bóng đá Kamito Tornado - Xanh đen là dòng sản phẩm có chất vải mềm mại, giảm nhăn hiệu quả, thoáng khí, co dãn 4 chiều với độ đàn hồi cao nhờ sự kết hợp theo tỷ lệ đặc biệt từ sợi Polyester. Áp dụng công nghệ Moisture-Wicking giúp những chiếc áo đấu Kamito có khả năng hút ẩm cao và bay hơi nhanh. Người mặc sẽ luôn cảm thấy nhẹ nhàng và khô thoáng, hạn chế những mùi phát sinh trong quá trình vận động cường độ cao. Thiết kế body fit hiện đại, tôn dáng, năng động, giúp người mặc luôn tự tin khi sử dụng.', 189000, 0, 'clothes4.1.png', '', 0, '2023-05-01 11:19:47', '2023-05-01 11:19:47', ''),
(30, 'BỘ QUẦN ÁO BÓNG ĐÁ MIZUNO', 8, 'Bộ quần áo bóng đá MIZUNO CAMO - ĐỎ là dòng sản phẩm có chất vải mềm mại, giảm nhăn hiệu quả, thoáng khí, co dãn 4 chiều với độ đàn hồi cao nhờ sự kết hợp theo tỷ lệ đặc biệt từ sợi Polyester và sợi Elastan. Áp dụng công nghệ Moisture-Wicking giúp những chiếc áo đấu MIZUNO có khả năng hút ẩm cao và bay hơi nhanh. Người mặc sẽ luôn cảm thấy nhẹ nhàng và khô thoáng, hạn chế những mùi phát sinh trong quá trình vận động cường độ cao. Thiết kế body fit hiện đại, tôn dáng, năng động, giúp người mặc luôn tự tin khi sử dụng.', 489000, 389000, 'clothes5.1.png', '', 0, '2023-05-01 11:24:29', '2023-05-01 11:24:29', ''),
(31, 'TÚI GYMSACK NIKE VISION ', 9, 'TÚI GYMSACK CHÍNH HÃNG PHANTOM VISION \"NEW LIGHTS\"', 350000, 99000, 'balo4.5.png', '', 0, '2023-05-01 11:31:07', '2023-05-01 11:31:07', ''),
(32, 'BALO XẾP GỌN NEYMARSPORT 2023', 9, 'Balo xếp gọn NEYMARSPORT 2023 là mẫu balo mới nhất được Neymarsport thiết kế với sự đa dạng về màu sắc, khả năng xếp gọn như ví cầm tay, thời trang phù hợp cho người dùng có thể mang đi đá bóng. Ba lô xếp gọn NEYMARSPORT 2023 có ngăn túi nhỏ đựng đồ đạc như ví tiền, thẻ xe, chìa khóa phía ngoài... Ngoài ra, túi có thể đựng 1 quả banh, 1 đôi giày với thêm 1 bộ đồ.', 139000, 0, 'balo3.1.png', '', 0, '2023-05-01 11:36:11', '2023-05-01 11:36:11', ''),
(33, 'BALO ĐỰNG GIÀY NEYMARSPORT ', 9, 'TÚI ĐEO CHÉO ĐỰNG GIÀY NEYMARSPORT Q1/2023 là mẫu túi mới nhất được Neymarsport thiết kế với sự đa dạng về màu sắc, với dây đeo chéo tiện lợi, thời trang phù hợp cho người dùng có thể mang đi đá bóng. Túi hộp đa năng có ngăn túi nhỏ đựng đồ đạc như ví tiền, thẻ xe, chìa khóa... Ngoài ra, túi có thể đựng 1 đôi giày với thêm 1 bộ đồ.', 99000, 0, 'balo3.3.png', '', 0, '2023-05-01 11:42:33', '2023-05-01 11:42:33', ''),
(34, 'TÚI ĐỰNG GIÀY NEYMARSPORT ', 9, 'TÚI HỘP ĐỰNG GIÀY NEYMARSPORT Q2/2022 là mẫu túi mới nhất được Neymarsport thiết kế với sự đổi mới về màu sắc từ 1 màu thành 2 màu, rất nhiều tiện lợi, thời trang phù hợp cho người dùng có thể mang đi đá bóng. Túi hộp đa năng bên trong có ngăn túi nhỏ đựng đồ đạc như ví tiền, thẻ xe, chìa khóa... Ngoài ra, túi có thể đựng 1 đôi giày với thêm 1 bộ đồ.', 99000, 79000, 'balo5.1.png', '', 0, '2023-05-01 11:52:21', '2023-05-01 11:52:21', ''),
(35, 'GĂNG TAY THỦ MÔN ADIDAS ', 10, 'ĐÔI GĂNG TAY TẬP LUYỆN SỬ DỤNG KẾT HỢP CÁC CHẤT LIỆU TÁI CHẾ VÀ CÓ THỂ TÁI TẠO. Bắt bóng mục tiêu chính xác và xử lý bóng hoàn hảo với đôi găng tay thủ môn adidas Predator này. Vân High Definition Texture dập chìm trên mu bàn tay tăng cường độ chính xác khi đưa bóng ra khỏi khung thành, còn lòng bàn tay Soft Grip giúp bạn bắt trọn những cú sút chéo góc và bóng xoáy khó nhằn. Quai đeo 1/2 cố định và chắc chắn tiếp thêm tự tin trong lúc tập luyện. Sản phẩm này có chứa tối thiểu 50% hỗn hợp chất liệu tái chế và có thể tái tạ', 800000, 790000, 'găngtay2.1.png', '', 0, '2023-05-01 12:03:59', '2023-05-01 12:03:59', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Adidas', '', '', '2023-03-26 03:41:48', '2023-03-26 03:41:48'),
(2, 'Nike', '', '', '2023-03-26 03:41:48', '2023-03-26 03:41:48'),
(3, 'Mizuno', '', '', '2023-03-26 03:44:30', '2023-03-26 03:44:30'),
(4, 'Kamito', '', '', '2023-03-26 03:44:30', '2023-03-26 03:44:30'),
(5, 'Puma', '', '', '2023-03-26 03:45:43', '2023-03-26 03:45:43'),
(6, 'Tất thể thao', '', '', '2023-03-26 03:45:43', '2023-03-26 03:45:43'),
(7, 'Băng keo', '', '', '2023-03-26 03:46:43', '2023-03-26 03:46:43'),
(8, 'Quần áo', '', '', '2023-03-26 03:46:43', '2023-03-26 03:46:43'),
(9, 'Túi đeo/Balo', '', '', '2023-03-26 03:48:09', '2023-03-26 03:48:09'),
(10, 'Găng tay', '', '', '2023-03-26 03:48:09', '2023-03-26 03:48:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variations`
--

CREATE TABLE `product_variations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `varname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `link`, `image`, `created_at`, `updated_at`) VALUES
(1, '', 'banner1.jpg', '2023-03-25 09:32:36', '2023-03-25 09:32:36'),
(2, '', 'banner2.jpg', '2023-03-25 09:33:00', '2023-03-25 09:33:00'),
(3, '', 'banner3.jpg', '2023-03-25 09:33:16', '2023-03-25 09:33:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_accounts`
--

CREATE TABLE `social_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `provider_user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_Verified` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone_number`, `address`, `remember_token`, `is_admin`, `created_at`, `updated_at`, `token`, `is_Verified`, `email_verified_at`) VALUES
(1, 'Lê Hồng Ngọc', 'hongngocle492@gmail.com', '$2y$10$hHa.6bGzC6oAFIsk4JMIm.WLh1KCcu1mVCMydD57u7xamV9mWfwlu', '93642212', 'Hanoi University', NULL, 1, '2023-05-10 06:52:42', '2023-05-10 06:52:42', NULL, 0, NULL),
(2, 'Ngọc', 'ngoclh2@gmail.com', '$2y$10$jTghH2YbPr1HjcK8MEsf0u0CDZXMzc5KB00rVkbiUvxktRzxNBLyu', '09574567', 'Hanu', NULL, 0, '2023-05-10 18:28:39', '2023-05-10 18:28:39', NULL, 0, NULL),
(3, 'Lê Hồng Ngọc', 'ngoclh012@gmail.com', '$2y$10$nbv5UFOFRTZD86pmvd61/uNiYu0Zc91ejVZNMw7toOMQLs8Y/OIOq', '93642211', 'Hanu', NULL, 0, '2023-05-16 02:51:47', '2023-05-16 02:51:47', NULL, 0, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_operation_log_user_id_index` (`user_id`);

--
-- Chỉ mục cho bảng `admin_permissions`
--
ALTER TABLE `admin_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_permissions_name_unique` (`name`),
  ADD UNIQUE KEY `admin_permissions_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_roles_name_unique` (`name`),
  ADD UNIQUE KEY `admin_roles_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `admin_role_menu`
--
ALTER TABLE `admin_role_menu`
  ADD KEY `admin_role_menu_role_id_menu_id_index` (`role_id`,`menu_id`);

--
-- Chỉ mục cho bảng `admin_role_permissions`
--
ALTER TABLE `admin_role_permissions`
  ADD KEY `admin_role_permissions_role_id_permission_id_index` (`role_id`,`permission_id`);

--
-- Chỉ mục cho bảng `admin_role_users`
--
ALTER TABLE `admin_role_users`
  ADD KEY `admin_role_users_role_id_user_id_index` (`role_id`,`user_id`);

--
-- Chỉ mục cho bảng `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_users_username_unique` (`username`);

--
-- Chỉ mục cho bảng `admin_user_permissions`
--
ALTER TABLE `admin_user_permissions`
  ADD KEY `admin_user_permissions_user_id_permission_id_index` (`user_id`,`permission_id`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_id_customer_foreign` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_details_id_bill_foreign` (`id_bill`),
  ADD KEY `bill_details_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourite_id_user_foreign` (`id_user`),
  ADD KEY `favourite_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favourites_id_user_foreign` (`id_user`),
  ADD KEY `favourites_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_slug_unique` (`slug`);

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
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_category_foreign` (`id_category`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variations_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `social_accounts`
--
ALTER TABLE `social_accounts`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT cho bảng `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `admin_operation_log`
--
ALTER TABLE `admin_operation_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `admin_permissions`
--
ALTER TABLE `admin_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `favourite`
--
ALTER TABLE `favourite`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `social_accounts`
--
ALTER TABLE `social_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`);

--
-- Các ràng buộc cho bảng `bill_details`
--
ALTER TABLE `bill_details`
  ADD CONSTRAINT `bill_details_id_bill_foreign` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id`),
  ADD CONSTRAINT `bill_details_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `favourite_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `favourites_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `product_categories` (`id`);

--
-- Các ràng buộc cho bảng `product_variations`
--
ALTER TABLE `product_variations`
  ADD CONSTRAINT `product_variations_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
