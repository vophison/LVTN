-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 22, 2021 lúc 01:19 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `eciname`
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2014_10_12_000000_create_users_table', 2),
(12, '2014_10_12_100000_create_password_resets_table', 2),
(13, '2021_06_13_235553_create_tbl_admin_table', 2),
(14, '2021_06_14_152644_create_tbl_category_product', 2),
(15, '2021_06_15_172828_create_tbl_combo', 2),
(16, '2021_06_16_085818_create_tbl_phim', 2),
(17, '2021_06_16_152856_create_tbl_dangphim', 3),
(18, '2021_06_17_131244_create_tbl_theloaiphim', 4),
(19, '2021_06_20_202504_create_tbl_phong', 5),
(20, '2021_06_21_203431_create_tbl_thanhpho', 6),
(21, '2021_06_23_022931_create_tbl_rap', 7),
(22, '2021_06_24_122245_create_tbl_tintuc', 8),
(23, '2021_06_25_121105_create_tbl_suatchieu', 9),
(24, '2021_06_26_054900_tbl_customer', 10),
(25, '2021_06_30_142350_create_tbl_ve', 11),
(26, '2021_07_10_105714_create_tbl_datve', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `admin_diachi`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '2150', 'ngo tuong vu', '0354161612', 'binh an', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_combo`
--

CREATE TABLE `tbl_combo` (
  `combo_id` int(10) UNSIGNED NOT NULL,
  `combo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `combo_gia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `combo_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `combo_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_combo`
--

INSERT INTO `tbl_combo` (`combo_id`, `combo_name`, `combo_gia`, `combo_image`, `combo_desc`, `created_at`, `updated_at`) VALUES
(1, '1 bắp 1 nước', '50.000', '240x201-959.jpg', 'đổi ly lớn', NULL, NULL),
(2, '1 Bắp 2 Nước', '100.000', '240X201-1622.jpg', 'có 2 ly nước và 1 bịch bắp', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `google_id` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `google_id`, `customer_name`, `customer_email`, `customer_password`, `customer_phone`, `created_at`, `updated_at`) VALUES
(1, '0', 'Ngô Vũ', 'tuongvu@gmail.com', 'zzzz', '0354161612', NULL, NULL),
(2, '0', 'phi son', 'hi@gmail.com', '123', '091919123', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangphim`
--

CREATE TABLE `tbl_dangphim` (
  `dangphim_id` int(10) UNSIGNED NOT NULL,
  `dangphim_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dangphim_gia` int(20) NOT NULL,
  `dangphim_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dangphim_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangphim`
--

INSERT INTO `tbl_dangphim` (`dangphim_id`, `dangphim_name`, `dangphim_gia`, `dangphim_desc`, `dangphim_status`, `created_at`, `updated_at`) VALUES
(1, '2D', 20000, '<p>aa</p>', 0, NULL, NULL),
(2, '3D', 30000, '<p>aaa</p>', 0, NULL, NULL),
(3, '4D', 40000, '<p>aaaa</p>', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phim`
--

CREATE TABLE `tbl_phim` (
  `phim_id` int(10) UNSIGNED NOT NULL,
  `dangphim_id` int(10) UNSIGNED NOT NULL,
  `theloaiphim_id` int(11) NOT NULL,
  `suatchieu_id` int(11) NOT NULL,
  `phim_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phim_noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phim_gia` int(20) NOT NULL,
  `phim_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phim_quocgia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phim_daodien` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phim_dienvien` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phim_thoiluong` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phim_rated` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phim_trailer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phim_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_phim`
--

INSERT INTO `tbl_phim` (`phim_id`, `dangphim_id`, `theloaiphim_id`, `suatchieu_id`, `phim_name`, `phim_noidung`, `phim_gia`, `phim_image`, `phim_quocgia`, `phim_daodien`, `phim_dienvien`, `phim_thoiluong`, `phim_rated`, `phim_trailer`, `phim_status`, `created_at`, `updated_at`) VALUES
(11, 1, 4, 2, 'aliba ba', 'haa', 20000, '258.jpg', 'Miến điện', 'vũ', 'ngưu lang, chức nữ', '180 phút', 'tất cả', 'https://www.youtube.com/embed/oCBGTCNJW2g', 0, NULL, NULL),
(12, 1, 7, 3, 'Không thấy đường về', 'một cuộc hành trình', 200000, '352.jpg', 'Mỹ', 'Victor Vũ', 'lương sơn bá, chúc anh đài', '60 phút', 'C18 - PHIM CẤM KHÁN GIẢ DƯỚI 18 TUỔI', 'https://www.youtube.com/embed/oCBGTCNJW2g', 0, NULL, NULL),
(13, 1, 7, 7, 'Diệp vấn', 'Diệp Vấn là một võ sư nổi tiếng người Hồng Kông, được xem là người có công lớn trong việc hình thành và quảng bá hệ phái Vịnh Xuân quyền ở Hồng Kông. Một trong những đệ tử thành danh của ông là minh tinh màn bạc Lý Tiểu Long trong những năm đầu đời khi họ Lý mới tập tành học võ thuật.', 50000, 'ipman81.jpg', 'Trung Quốc', 'Victor Vũ', 'vũ thần tông', '100 phút', 'tất cả', 'https://www.youtube.com/embed/oCBGTCNJW2g', 0, NULL, NULL),
(14, 2, 10, 8, 'Người Tình Ánh Trăng', 'Hae Soo là một cô gái thời hiện đại.Cô nhảy ra giữa dòng sông để cứu đứa bé nhưng không kịp leo lên thuyền khi xảy ra nguyệt thực và bị xuyên không về thời Cao Ly và gặp được các vương tử Wang So, Wang Wook, Wang Jung cùng một số vương tử khác. Tình yêu, tình bạn và sự tranh quyền đoạt vị cũng diễn ra rất nhanh chóng. Câu chuyện kết thúc trong nước mắt, theo đúng nguyên tác.', 100000, 'MLOVER56.jpg', 'Hàn Quốc', 'Kim Kyu-tae', 'Lee Joon-gi, Lee Ji-eun, Kang Ha-neul', '126 phút', 'C18 - PHIM CẤM KHÁN GIẢ DƯỚI 18 TUỔI', 'https://www.youtube.com/embed/o7mYYXToqmw', 0, NULL, NULL),
(15, 3, 11, 9, 'Khu Vườn Trên Mây', 'Akizuki Takao là một học sinh 15 tuổi, sống với mẹ và anh trai, cậu tin rằng \"chỉ có đóng giày mới mang cậu thoát khỏi nơi này\".Một buổi sáng mùa mưa, trên đường đến trường, cậu đã cúp tiết lang thang đến một khu vườn để phác thảo mẫu giày và bắt gặp một cô gái quyến rũ tên Yukino Yukari đang ngồi uống bia ngắm mưa rơi. Họ không nói nhau lời nào, nhưng khi trời tạnh mưa, cô gái từ biệt cậu bằng một bài tanka khiến cậu bối rối. Tiếp tục những buổi sáng trời mưa tiếp theo, họ lại gặp nhau và...?', 80000, 'khu vườn ngôn từ37.jpg', 'Nhật Bản', 'Makoto Shinkai', 'Miyu Irino, Kana Hanazawa, Fumi Hirano', '94 Phút', 'P - PHIM DÀNH CHO MỌI ĐỐI TƯỢNG', 'https://www.youtube.com/embed/xnLaOqqtCKs', 0, NULL, NULL),
(16, 1, 9, 10, 'AVENGERS: ENDGAME', 'Sau những sự kiện tàn khốc trong Avengers: Infinity War, vũ trụ bị hủy hoại do những nỗ lực của Thanos. Với sự giúp đỡ của các đồng minh còn lại, Avengers phải tập hợp lại một lần nữa để đảo ngược hành động của Thanos và khôi phục trật tự cho vũ trụ vĩnh viễn, bất kể hậu quả có thể xảy ra.', 200000, 'endgame79.jpg', 'Mỹ', 'Anthony Russo, Joe Russo', 'Robert Downey Jr., Chris Hemsworth, Mark Ruffalo, Chris Evans, Benedict Cumberbatch,...', '182 Phút', 'C13 - PHIM CẤM KHÁN GIẢ DƯỚI 13 TUỔI', 'https://www.youtube.com/embed/TcMBFSGVi1c', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phong`
--

CREATE TABLE `tbl_phong` (
  `phong_id` int(10) UNSIGNED NOT NULL,
  `dangphim_id` int(11) NOT NULL,
  `suatchieu_id` int(11) NOT NULL,
  `phong_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phong_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cot` int(10) NOT NULL,
  `hang` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_phong`
--

INSERT INTO `tbl_phong` (`phong_id`, `dangphim_id`, `suatchieu_id`, `phong_name`, `phong_desc`, `cot`, `hang`, `created_at`, `updated_at`) VALUES
(8, 1, 3, 'Phòng số 1', 'hi', 8, 10, NULL, NULL),
(9, 2, 5, 'Phòng số 10', 'hhhh', 7, 10, NULL, NULL),
(10, 1, 3, 'Phòng số 2', 'hh', 9, 10, NULL, NULL),
(11, 3, 6, 'Phòng số 9', 'aaaa', 10, 9, NULL, NULL),
(12, 1, 7, 'Phòng số 4', 'aa', 10, 8, NULL, NULL),
(13, 1, 2, 'Phòng số 3', 'aa', 9, 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_rap`
--

CREATE TABLE `tbl_rap` (
  `rap_id` int(10) UNSIGNED NOT NULL,
  `thanhpho_id` int(11) NOT NULL,
  `rap_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rap_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rap_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_rap`
--

INSERT INTO `tbl_rap` (`rap_id`, `thanhpho_id`, `rap_name`, `rap_desc`, `rap_status`, `created_at`, `updated_at`) VALUES
(4, 1, 'TikiLazada Tân Phú', 'TikiLazada', 0, NULL, NULL),
(5, 1, 'TikiLazada Tân Bình', 'TikiLazada', 0, NULL, NULL),
(6, 1, 'TikiLazada Gò Vấp', 'TikiLazada', 0, NULL, NULL),
(7, 1, 'TikiLazada Bình Tân', 'TikiLazada', 0, NULL, NULL),
(8, 1, 'TikiLazada Quận 1', 'TikiLazada', 0, NULL, NULL),
(10, 5, 'TikiLazada Rạch Miễu', 'TikiLazada', 0, NULL, NULL),
(11, 5, 'TikiLazada Sense City', 'TikiLazada', 0, NULL, NULL),
(12, 5, 'TikiLazada Xuân Khánh', 'TikiLazada', 0, NULL, NULL),
(13, 5, 'TikiLazada Hùng Vương', 'TikiLazada', 0, NULL, NULL),
(14, 5, 'TikiLazada Cái Răng', 'TikiLazada', 0, NULL, NULL),
(15, 3, 'TikiLazada Hòa Vang', 'TikiLazada', 0, NULL, NULL),
(16, 3, 'TikiLazada Cẩm Lệ', 'TikiLazada', 0, NULL, NULL),
(17, 3, 'TikiLazada Hòa Châu', 'TikiLazada', 0, NULL, NULL),
(18, 3, 'TikiLazada Ngũ Hành Sơn', 'TikiLazada', 0, NULL, NULL),
(19, 3, 'TikiLazada Lê Duẩn', 'TikiLazada', 0, NULL, NULL),
(20, 2, 'TikiLazada Cầu Giấy', 'TikiLazada', 0, NULL, NULL),
(21, 2, 'TikiLazada Hoàn Kiếm', 'TikiLazada', 0, NULL, NULL),
(22, 2, 'TikiLazada TimeCity', 'TikiLazada', 0, NULL, NULL),
(23, 2, 'TikiLazada Hoàng Mai', 'TikiLazada', 0, NULL, NULL),
(24, 2, 'TikiLazada Đống Đa', 'TikiLazada', 0, NULL, NULL),
(25, 3, 'Tiki đa nang', 'zz', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_suatchieu`
--

CREATE TABLE `tbl_suatchieu` (
  `suatchieu_id` int(10) UNSIGNED NOT NULL,
  `dangphim_id` int(11) NOT NULL,
  `suatchieu_date` date NOT NULL,
  `suatchieu_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_suatchieu`
--

INSERT INTO `tbl_suatchieu` (`suatchieu_id`, `dangphim_id`, `suatchieu_date`, `suatchieu_time`, `created_at`, `updated_at`) VALUES
(2, 1, '2021-06-29', '10:55:00', NULL, NULL),
(3, 1, '2021-06-30', '13:50:00', NULL, NULL),
(5, 2, '2021-06-30', '07:10:00', NULL, NULL),
(6, 3, '2021-06-30', '15:00:00', NULL, NULL),
(7, 1, '2021-07-01', '15:30:00', NULL, NULL),
(8, 1, '2021-07-04', '17:30:00', NULL, NULL),
(9, 1, '2021-07-04', '20:00:00', NULL, NULL),
(10, 1, '2021-07-04', '22:30:00', NULL, NULL),
(11, 1, '2021-07-04', '01:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thanhpho`
--

CREATE TABLE `tbl_thanhpho` (
  `thanhpho_id` int(10) UNSIGNED NOT NULL,
  `thanhpho_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thanhpho_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_thanhpho`
--

INSERT INTO `tbl_thanhpho` (`thanhpho_id`, `thanhpho_name`, `thanhpho_status`, `created_at`, `updated_at`) VALUES
(1, 'Tp. Hồ Chí Minh', 0, NULL, NULL),
(2, 'Hà Nội', 0, NULL, NULL),
(3, 'Đà Nẵng', 0, NULL, NULL),
(5, 'Cần Thơ', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_theloaiphim`
--

CREATE TABLE `tbl_theloaiphim` (
  `theloaiphim_id` int(10) UNSIGNED NOT NULL,
  `theloaiphim_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theloaiphim_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `theloaiphim_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_theloaiphim`
--

INSERT INTO `tbl_theloaiphim` (`theloaiphim_id`, `theloaiphim_name`, `theloaiphim_desc`, `theloaiphim_status`, `created_at`, `updated_at`) VALUES
(4, 'Tình cảm', 'Tình cảm là những thái độ thể hiện sự rung cảm ổn định của con người đối với sự vật hiện tượng có liên quan đến nhu cầu và động cơ của họ.', 0, NULL, NULL),
(5, 'Kinh dị', 'Phim kinh dị là một thể loại điện ảnh đưa đến cho khán giả xem phim những cảm xúc tiêu cực, gợi cho người xem nỗi sợ hãi nguyên thủy nhất thông qua cốt truyện, nội dung phim, những hình ảnh rùng rợn, bí hiểm, ánh sáng mờ ảo, những âm thanh rùng rợn, nhiều cảnh máu me, chết chóc... hay có những cảnh giật mình thông qua .', 0, NULL, NULL),
(6, 'Trinh thám', 'Tiểu thuyết trinh thám là một tiểu loại của tiểu thuyết phiêu lưu. Bản thân tên gọi thể loại đã làm nổi bật một vài đặc điểm riêng của nó. Nó nói lên nghề nghiệp của nhân vật chính', 0, NULL, NULL),
(7, 'Hành động', 'Phim hành động cũng gọi là phim hoạt động là một thể loại điện ảnh trong đó một hoặc nhiều nhân vật anh hùng bị đẩy vào một loạt những thử thách, thường bao gồm những kì công vật lý, các cảnh hành động kéo dài, yếu tố bạo lực và những cuộc rượt đuổi điên cuồng.', 0, NULL, NULL),
(8, 'Chiến tranh', 'Bối cảnh là các trận chiến và thời gian chiến tranh, đây cũng có thể coi là tiểu thể loại của phim lịch sử nếu các sự kiện chiến tranh là có thật trong quá khứ', 0, NULL, NULL),
(9, 'Khoa Học Viễn Tưởng', 'Bối cảnh phim có xuất hiện những công nghệ, kỹ thuật hiện đại chưa hoặc không có thật trong thực tế (như du hành thời gian,...), thời gian của phim thường được đặt ở tương lai', 0, NULL, NULL),
(10, 'Kiếm hiệp', 'Phim đặc trưng của châu Á, thường có bối cảnh là thời phong kiến và có rất nhiều cuộc giao tranh bằng vũ khí lạnh (kiếm, đao,...). Nếu có các yếu tố phi thực tế, phim kiếm hiệp còn có thể xếp vào loại phim giả tưởng hoặc phim thần bí.', 0, NULL, NULL),
(11, 'Hoạt Hình, Anime', 'Phim hoạt hình hay phim hoạt họa là một hình thức sử dụng ảo ảnh quang học về sự chuyển động do nhiều hình ảnh tĩnh được chiếu tiếp diễn liên tục.', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tintuc`
--

CREATE TABLE `tbl_tintuc` (
  `tintuc_id` int(10) UNSIGNED NOT NULL,
  `tintuc_tieude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tintuc_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tintuc_noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tintuc_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_tintuc`
--

INSERT INTO `tbl_tintuc` (`tintuc_id`, `tintuc_tieude`, `tintuc_image`, `tintuc_noidung`, `tintuc_status`, `created_at`, `updated_at`) VALUES
(1, 'Việt Nam chung tay đánh bại covid', '240x201-562.jpg', 'Để thể hiện tình đoàn kếtt', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_ve`
--

CREATE TABLE `tbl_ve` (
  `ve_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `thanhpho_id` int(10) UNSIGNED NOT NULL,
  `suatchieu_id` int(10) UNSIGNED NOT NULL,
  `rap_id` int(10) UNSIGNED NOT NULL,
  `dangphim_id` int(10) UNSIGNED NOT NULL,
  `phim_id` int(10) UNSIGNED NOT NULL,
  `phong_id` int(10) UNSIGNED NOT NULL,
  `ve_gia` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ve_ngay` date NOT NULL,
  `vitrighe` int(10) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_ve`
--

INSERT INTO `tbl_ve` (`ve_id`, `customer_id`, `thanhpho_id`, `suatchieu_id`, `rap_id`, `dangphim_id`, `phim_id`, `phong_id`, `ve_gia`, `ve_ngay`, `vitrighe`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 5, 15, 2, 16, 9, '100', '2021-07-10', 15, 1, NULL, NULL),
(4, 1, 1, 3, 4, 1, 15, 8, '100', '2021-07-08', 1, 1, NULL, NULL),
(6, 1, 2, 5, 20, 2, 13, 9, '100', '2021-07-10', 5, 1, '2021-07-10 01:46:38', NULL),
(11, 1, 2, 3, 22, 1, 16, 8, '100', '2021-07-10', 34, 1, NULL, NULL),
(17, 1, 3, 5, 18, 2, 12, 9, '100', '2021-07-12', 94, 1, NULL, NULL),
(28, 1, 3, 3, 16, 1, 15, 8, '100000', '2021-07-20', 44, 1, NULL, NULL),
(30, 1, 2, 5, 21, 2, 16, 9, '230000', '2021-07-20', 1, 1, NULL, NULL),
(31, 1, 2, 5, 21, 2, 16, 9, '230000', '2021-07-20', 2, 1, NULL, NULL),
(32, 1, 2, 5, 21, 2, 15, 9, '110000', '2021-07-20', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_combo`
--
ALTER TABLE `tbl_combo`
  ADD PRIMARY KEY (`combo_id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_dangphim`
--
ALTER TABLE `tbl_dangphim`
  ADD PRIMARY KEY (`dangphim_id`);

--
-- Chỉ mục cho bảng `tbl_phim`
--
ALTER TABLE `tbl_phim`
  ADD PRIMARY KEY (`phim_id`);

--
-- Chỉ mục cho bảng `tbl_phong`
--
ALTER TABLE `tbl_phong`
  ADD PRIMARY KEY (`phong_id`);

--
-- Chỉ mục cho bảng `tbl_rap`
--
ALTER TABLE `tbl_rap`
  ADD PRIMARY KEY (`rap_id`);

--
-- Chỉ mục cho bảng `tbl_suatchieu`
--
ALTER TABLE `tbl_suatchieu`
  ADD PRIMARY KEY (`suatchieu_id`);

--
-- Chỉ mục cho bảng `tbl_thanhpho`
--
ALTER TABLE `tbl_thanhpho`
  ADD PRIMARY KEY (`thanhpho_id`);

--
-- Chỉ mục cho bảng `tbl_theloaiphim`
--
ALTER TABLE `tbl_theloaiphim`
  ADD PRIMARY KEY (`theloaiphim_id`);

--
-- Chỉ mục cho bảng `tbl_tintuc`
--
ALTER TABLE `tbl_tintuc`
  ADD PRIMARY KEY (`tintuc_id`);

--
-- Chỉ mục cho bảng `tbl_ve`
--
ALTER TABLE `tbl_ve`
  ADD PRIMARY KEY (`ve_id`),
  ADD KEY `suatchieu_ve` (`suatchieu_id`),
  ADD KEY `phim_ve` (`phim_id`),
  ADD KEY `phong_ve` (`phong_id`),
  ADD KEY `rap_ve` (`rap_id`),
  ADD KEY `dangphim_ve` (`dangphim_id`),
  ADD KEY `thanhpho_ve` (`thanhpho_id`),
  ADD KEY `khachhang_ve` (`customer_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_combo`
--
ALTER TABLE `tbl_combo`
  MODIFY `combo_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_dangphim`
--
ALTER TABLE `tbl_dangphim`
  MODIFY `dangphim_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `tbl_phim`
--
ALTER TABLE `tbl_phim`
  MODIFY `phim_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `tbl_phong`
--
ALTER TABLE `tbl_phong`
  MODIFY `phong_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_rap`
--
ALTER TABLE `tbl_rap`
  MODIFY `rap_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `tbl_suatchieu`
--
ALTER TABLE `tbl_suatchieu`
  MODIFY `suatchieu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_thanhpho`
--
ALTER TABLE `tbl_thanhpho`
  MODIFY `thanhpho_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_theloaiphim`
--
ALTER TABLE `tbl_theloaiphim`
  MODIFY `theloaiphim_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_tintuc`
--
ALTER TABLE `tbl_tintuc`
  MODIFY `tintuc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_ve`
--
ALTER TABLE `tbl_ve`
  MODIFY `ve_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_ve`
--
ALTER TABLE `tbl_ve`
  ADD CONSTRAINT `dangphim_ve` FOREIGN KEY (`dangphim_id`) REFERENCES `tbl_dangphim` (`dangphim_id`),
  ADD CONSTRAINT `khachhang_ve` FOREIGN KEY (`customer_id`) REFERENCES `tbl_customer` (`customer_id`),
  ADD CONSTRAINT `phim_ve` FOREIGN KEY (`phim_id`) REFERENCES `tbl_phim` (`phim_id`),
  ADD CONSTRAINT `phong_ve` FOREIGN KEY (`phong_id`) REFERENCES `tbl_phong` (`phong_id`),
  ADD CONSTRAINT `rap_ve` FOREIGN KEY (`rap_id`) REFERENCES `tbl_rap` (`rap_id`),
  ADD CONSTRAINT `suatchieu_ve` FOREIGN KEY (`suatchieu_id`) REFERENCES `tbl_suatchieu` (`suatchieu_id`),
  ADD CONSTRAINT `thanhpho_ve` FOREIGN KEY (`thanhpho_id`) REFERENCES `tbl_thanhpho` (`thanhpho_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
