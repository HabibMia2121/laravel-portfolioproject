-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2022 at 03:50 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_areas`
--

CREATE TABLE `about_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `headline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_areas`
--

INSERT INTO `about_areas` (`id`, `text`, `headline`, `phone_number`, `email`, `address`, `short_description`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Hello', 'I am Habib,Web Developer From Comilla, Bangladesh.', '01969440721', 'habib@gmail.com', 'Titas,Comilla', 'variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&amp;amp;amp;amp;amp;amp;#039;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&amp;amp;amp;amp;amp;amp;#039;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'upload-photo-file/about-photos/14-87L4sqj.jpg', '2022-04-19 08:53:07', '2022-07-30 14:20:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `awards_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `award_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `awards_name`, `award_subtitle`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Best Front-End Developers', 'Top Front-End Developer', '2022-02-21 13:19:57', '2022-04-16 06:13:21', NULL),
(3, 'Design Conference', 'Best UI/UX Designer', '2022-02-21 16:29:11', '2022-02-22 13:46:26', NULL),
(7, 'Best Plugin Developer', 'Winner', '2022-02-22 13:47:01', '2022-04-16 06:13:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `award__icons`
--

CREATE TABLE `award__icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `award__icons`
--

INSERT INTO `award__icons` (`id`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'fa-trophy', NULL, '2022-04-16 06:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_headline` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_headline`, `banner_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 'My personal portfolio & website', 'upload-photo-file/banner-photo/14-bCVyT8y.jpg', '2022-07-30 13:30:29', '2022-07-30 14:14:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `long_description`, `blog_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'How to Create a RetroPie on Raspberry Graphical.', 'Vel sint commodi repudiandae consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit, tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit, quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam recusandae alias error harum maxime adipisci amet laborum. Perspiciatis minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit quibusdam sed amet tempora.', 'upload-photo-file/blog-photo/14-yvipoiR.jpg', '2022-03-21 08:42:31', '2022-07-30 16:14:21', NULL),
(5, 'Designers Use Uncode’s Visuals for Great Visitor area.', 'sint commodi repudiandae consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit, tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit, quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam recusandae alias error harum maxime adipisci amet laborum. Perspiciatis minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit quibusdam sed amet tempora.', 'upload-photo-file/blog-photo/2p8zesw.jpg', '2022-03-21 08:43:05', '2022-07-30 16:14:53', NULL),
(6, 'How to Use Design Thinking to Solve common Problems.', 'Quas vel sint commodi repudiandae consequuntur voluptatum laborum numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit, tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit, quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam recusandae alias error harum maxime adipisci amet laborum. Perspiciatis minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur fugiat, temporibus enim commodi iusto libero magni deleniti quod quam consequuntur! Commodi minima excepturi repudiandae velit hic maxime', 'upload-photo-file/blog-photo/IKtMgtX.jpg', '2022-03-21 08:43:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_heads`
--

CREATE TABLE `blog_heads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_heads`
--

INSERT INTO `blog_heads` (`id`, `header_title`, `header_subtitle`, `created_at`, `updated_at`) VALUES
(1, 'Latest News', 'This Subtitle dolor sit amet, consectetur adipi sunt nisi id magni digni.', '0000-00-00 00:00:00', '2022-03-21 09:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'web', '2022-03-13 05:28:58', '2022-03-13 09:14:01', NULL),
(4, 'Graphics', '2022-03-13 08:54:49', NULL, NULL),
(5, 'design', '2022-03-13 09:15:16', NULL, NULL),
(6, 'logo', '2022-03-13 09:15:27', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_areas`
--

CREATE TABLE `contact_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_areas`
--

INSERT INTO `contact_areas` (`id`, `name`, `email`, `number`, `message`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Rashed', 'rashed@gmail.com', 1969440721, 'Hi,', '2022-03-07 01:09:33', '2022-03-10 14:35:47', NULL),
(61, 'Rafi', 'rafi@gmail.com', 1936548759, 'Hello', '2022-03-13 04:22:45', NULL, NULL),
(64, 'Hridoy', 'hridoy@gmail.com', 1965875498, 'Very fine.', '2022-06-03 15:15:25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_headers`
--

CREATE TABLE `contact_headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `head_name_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_name_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_headers`
--

INSERT INTO `contact_headers` (`id`, `head_name_one`, `head_name_two`, `head_title`, `created_at`, `updated_at`) VALUES
(1, 'Get In Touch', 'Contact Info', 'Address area dolor sit amet, consecte adipisicing elit sed do eiusmod tempor incididunt.', '2022-02-10 01:33:15', '2022-04-17 06:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `count_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count_number` int(11) NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `count_name`, `count_number`, `icon`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Win Awards', 520, 'fa-rocket', '2022-02-25 13:06:50', '2022-04-16 08:52:54', NULL),
(3, 'Project Complated', 1966, 'fa-trophy', '2022-02-25 13:18:41', '2022-04-16 08:55:26', NULL),
(4, 'Satisfied Clients', 9865, 'fa-thumbs-up', '2022-04-16 09:11:37', NULL, NULL),
(5, 'Cuf Coffee', 321, 'fa-camera-retro', '2022-04-16 09:12:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `counter_bgphotos`
--

CREATE TABLE `counter_bgphotos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `background_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_background_photo.jpg',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counter_bgphotos`
--

INSERT INTO `counter_bgphotos` (`id`, `background_photo`, `created_at`, `updated_at`) VALUES
(2, 'YA4tjwc.jpg', NULL, '2022-07-30 14:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_file_names`
--

CREATE TABLE `dashboard_file_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dashboard_file_names`
--

INSERT INTO `dashboard_file_names` (`id`, `file_name`, `file_link`, `created_at`, `updated_at`) VALUES
(1, 'Banner', 'http://127.0.0.1:8000/banner/create', '2022-08-01 10:32:24', NULL),
(3, 'Awards', 'http://127.0.0.1:8000/award', '2022-08-01 10:34:56', NULL),
(4, 'Education', 'http://127.0.0.1:8000/educations', '2022-08-01 10:35:15', NULL),
(5, 'Experience', 'http://127.0.0.1:8000/experience', '2022-08-01 10:35:38', NULL),
(6, 'Skill', 'http://127.0.0.1:8000/skills', '2022-08-01 10:35:57', NULL),
(7, 'Service', 'http://127.0.0.1:8000/service', '2022-08-01 10:36:17', NULL),
(9, 'Counter', 'http://127.0.0.1:8000/counter', '2022-08-01 10:37:06', NULL),
(12, 'Team', 'http://127.0.0.1:8000/team', '2022-08-01 10:38:32', NULL),
(14, 'Hire area', 'http://127.0.0.1:8000/hire/area', '2022-08-01 10:39:20', NULL),
(15, 'Testimonial', 'http://127.0.0.1:8000/testimonial', '2022-08-01 10:39:44', NULL),
(16, 'Blog', 'http://127.0.0.1:8000/blog', '2022-08-01 10:40:01', NULL),
(17, 'Contact', 'http://127.0.0.1:8000/contact', '2022-08-01 10:40:23', NULL),
(18, 'Footer icon', 'http://127.0.0.1:8000/footer_icon', '2022-08-01 10:40:45', NULL),
(19, 'about area list', 'http://127.0.0.1:8000/about_area', '2022-08-01 10:41:09', NULL),
(20, 'about area create', 'http://127.0.0.1:8000/about_area/create', '2022-08-01 10:41:34', NULL),
(21, 'Dashboard', 'http://127.0.0.1:8000/home', '2022-08-01 10:42:10', NULL),
(22, 'protfolio area subcategory', 'http://127.0.0.1:8000/subcategory', '2022-08-01 10:44:08', NULL),
(23, 'protfolio area category', 'http://127.0.0.1:8000/category/index', '2022-08-01 10:44:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institution_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id`, `institution_name`, `qualification_title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'University of Peoples', 'Bachelor of Science', '2022-02-22 12:58:33', NULL, NULL),
(2, 'College of Ahsanullah', 'School of Hafiz Uddin', '2022-02-22 13:20:26', NULL, NULL),
(3, 'School of Hafiz Uddin', 'Bachelor of Design', '2022-02-23 04:33:57', '2022-02-23 04:33:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `education__icons`
--

CREATE TABLE `education__icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education__icons`
--

INSERT INTO `education__icons` (`id`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'fa-graduation-cap', NULL, '2022-04-16 06:13:53');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `experience_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `experience_name`, `experience_subtitle`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Front-End Developer', 'Themeforest Marketplace', '2022-02-23 01:02:35', NULL, NULL),
(2, 'Lead Developer', 'Creative Art company', '2022-02-23 01:04:13', NULL, NULL),
(3, 'UI/UX Engineer', 'Design Studio', '2022-02-23 01:04:32', '2022-02-23 01:49:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `experience__icons`
--

CREATE TABLE `experience__icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experience__icons`
--

INSERT INTO `experience__icons` (`id`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'fa-asterisk', NULL, '2022-04-16 07:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `footer_icons`
--

CREATE TABLE `footer_icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_icons`
--

INSERT INTO `footer_icons` (`id`, `social_icon`, `social_link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'fa-facebook', 'https://www.facebook.com/', '2022-07-31 06:50:42', '2022-07-31 12:37:58', NULL),
(2, 'fa-twitter', 'https://twitter.com/', '2022-07-31 07:01:07', '2022-07-31 12:37:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hire_areas`
--

CREATE TABLE `hire_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hire_areas`
--

INSERT INTO `hire_areas` (`id`, `short_description`, `created_at`, `updated_at`) VALUES
(1, 'Interested in working with me on an upcoming project ?', NULL, '2022-04-16 11:54:55');

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2021_12_25_134516_create_banners_table', 2),
(13, '2021_12_26_141016_create_banners_table', 3),
(22, '2022_01_08_001346_create_profiles_table', 5),
(26, '2022_01_08_074609_add_field_at_users_table', 6),
(27, '2022_02_21_150838_create_profiles_table', 28),
(28, '2022_02_21_151249_create_awards_table', 7),
(34, '2022_02_21_193641_create_award__icons_table', 11),
(36, '2022_02_22_150850_create_education__icons_table', 14),
(42, '2022_02_22_184755_create_educations_table', 15),
(43, '2022_02_23_063401_create_experiences_table', 16),
(44, '2022_02_23_081100_create_experience__icons_table', 17),
(45, '2022_02_23_082433_create_skills_table', 18),
(46, '2022_02_23_100602_create_skill__icons_table', 19),
(48, '2022_02_25_114719_create_service_headers_table', 21),
(50, '2022_02_25_184523_create_counters_table', 23),
(51, '2022_02_25_194316_create_counter_bgphotos_table', 24),
(52, '2022_02_25_215255_create_teams_table', 25),
(53, '2022_02_25_224752_create_team_headers_table', 26),
(55, '2022_02_26_190121_create_testimonials_table', 27),
(56, '2022_02_26_200916_create_testimonial_headers_table', 28),
(57, '2022_02_27_062810_create_hire_areas_table', 29),
(58, '2022_02_27_070447_create_contact_areas_table', 30),
(59, '2022_03_10_192909_create_contact_headers_table', 31),
(60, '2022_03_13_110525_create_categories_table', 32),
(61, '2022_03_13_141651_create_portfolio_heads_table', 33),
(63, '2022_03_14_062306_create_subcategories_table', 34),
(64, '2022_03_17_114225_create_blogs_table', 35),
(65, '2022_03_17_122035_create_blog_heads_table', 36),
(67, '2022_02_25_104311_create_services_table', 37),
(68, '2022_01_06_184554_create_about_areas_table', 38),
(69, '2022_07_31_114003_create_footer_icons_table', 39),
(71, '2022_08_01_140258_create_dashboard_file_names_table', 40);

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
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `portfolio_heads`
--

CREATE TABLE `portfolio_heads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_heads`
--

INSERT INTO `portfolio_heads` (`id`, `header_title`, `header_subtitle`, `created_at`, `updated_at`) VALUES
(1, 'Latest Work.', 'Portfolio area dolor sit amet, consectetur adipi sunt nisi id magni digni', '2022-03-13 08:25:29', '2022-04-17 09:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `small_description`, `icon`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Web Designer', 'Quo neque error repudiandae fuga? Ipsa laudantium molestias eos sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam recusandae alias error harum maxime adipisci amet laborum.', 'fa-book', '2022-04-16 08:23:58', '2022-04-16 08:48:44', NULL),
(2, 'Responsive design', 'Luo neque error repudiandae fuga? Ipsa laudantium molestias eos sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam recusandae alias error harum maxime adipisci amet laborum.', 'fa-desktop', '2022-04-16 08:24:53', NULL, NULL),
(3, 'Dedicated support', 'Neque error repudiandae fuga? Ipsa laudantium molestias eos sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam recusandae alias error harum maxime adipisci amet laborum.', 'fa-comment', '2022-04-16 08:25:33', '2022-04-16 08:47:09', NULL),
(4, 'Web Development', 'Web  neque error repudiandae fuga? Ipsa laudantium molestias eos sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam recusandae alias error harum maxime adipisci amet laborum.', 'fa-align-center', '2022-04-16 08:26:31', '2022-04-16 08:45:17', NULL),
(5, 'Laravel Development', 'Laravel neque error repudiandae fuga? Ipsa laudantium molestias eos sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam recusandae alias error harum maxime adipisci amet laborum.', 'fa-check-circle', '2022-04-16 08:27:22', '2022-04-16 08:43:51', NULL),
(6, 'Laravel Framwork', 'Laravel framwork neque error repudiandae fuga? Ipsa laudantium molestias eos sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam recusandae alias error harum maxime adipisci amet laborum.', 'fa-adjust', '2022-04-16 08:28:53', '2022-04-16 08:44:41', NULL),
(7, 'asdfdsa', 'asdfsdaf', 'fa-american-sign-language-interpreting', '2022-08-01 12:26:28', '2022-08-01 12:27:01', '2022-08-01 12:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `service_headers`
--

CREATE TABLE `service_headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_headers`
--

INSERT INTO `service_headers` (`id`, `header_title`, `header_subtitle`, `created_at`, `updated_at`) VALUES
(1, 'What i Do.', 'Services head text lorem ipsum dolor sit amet, consectetur adipi sunt nisi id magni digni', NULL, '2022-04-16 08:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skill_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `percentage`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'HTML', 82, '2022-02-23 03:28:04', '2022-04-16 07:15:22', NULL),
(3, 'CSS', 73, '2022-02-23 03:48:45', '2022-04-16 07:15:28', NULL),
(4, 'Bootstrap', 77, '2022-04-16 06:17:58', '2022-04-17 06:26:41', NULL),
(5, 'PHP', 68, '2022-04-16 06:18:24', '2022-04-17 06:27:24', NULL),
(6, 'Laravel', 72, '2022-04-17 06:27:43', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `skill__icons`
--

CREATE TABLE `skill__icons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skill__icons`
--

INSERT INTO `skill__icons` (`id`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'fa-industry', NULL, '2022-04-16 07:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `services` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail_photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `title`, `subtitle`, `Short_description`, `client`, `industay`, `services`, `website`, `thumbnail_photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Et eum ut dolor lore', 'Accusamus sunt velit', 'Labore illo adipisci', 'Ut amet aut non mol', 'Iusto labore ut maio', 'Et magna proident m', 'https://www.xyliwycyw.co.uk', 'upload-photo-file/subcategory-photos/6-fZFQnu6.jpg', '2022-03-15 09:47:46', '2022-04-18 05:40:31', NULL),
(5, 1, 'Possimus atque volu', 'Placeat ad necessit', 'Laboriosam sit qui', 'Et ut libero error p', 'Et facilis nostrud d', 'Cum ullamco dolores', 'https://www.kakokicojuzytu.org', 'upload-photo-file/subcategory-photos/6-Fg4qezV.jpg', '2022-04-17 09:48:19', '2022-04-18 05:39:41', NULL),
(6, 5, 'In aut unde quia qui', 'Pariatur Duis et ob', 'Aut nulla consectetu', 'Voluptatem velit dol', 'Et accusamus ut dese', 'Ducimus pariatur F', 'https://www.tep.org', 'upload-photo-file/subcategory-photos/6-coqwlDD.jpg', '2022-04-17 09:48:37', '2022-04-18 05:42:03', NULL),
(7, 4, 'Dolores consequat D', 'Nobis obcaecati inci', 'Necessitatibus liber', 'Ut et dolor porro un', 'Cillum sint cupidita', 'Eu aut quo consequat', 'https://www.jus.ws', 'upload-photo-file/subcategory-photos/NCucezf.webp', '2022-04-18 05:42:27', '2022-04-18 09:56:37', NULL),
(8, 5, 'Officia facere digni', 'Enim itaque officia', 'Debitis cillum in do', 'Provident nemo eaqu', 'Sunt quia recusanda', 'Illo unde do quia vo', 'https://www.kobizacadahuzuk.tv', 'upload-photo-file/subcategory-photos/hqZvZnZ.webp', '2022-04-18 05:43:04', NULL, NULL),
(9, 6, 'Sed similique molest', 'Ut deleniti magnam e', 'Proident aliquam es', 'Omnis irure est qua', 'Iusto aliquam et exc', 'Distinctio Nostrud', 'https://www.gowemujesytuw.cm', 'upload-photo-file/subcategory-photos/Epe4PCi.jpg', '2022-04-18 05:43:26', NULL, NULL),
(10, 6, 'Sunt in labore volu', 'Earum velit fugiat', 'Est molestiae magnam', 'Nam animi non in qu', 'Voluptate eveniet s', 'Nulla distinctio Il', 'https://www.gin.co', 'upload-photo-file/subcategory-photos/JX9IjZS.jpg', '2022-04-18 05:43:50', NULL, NULL),
(11, 4, 'Est autem libero del', 'Nostrud voluptate la', 'Quia lorem quae ut v', 'Rerum molestiae magn', 'Impedit odio recusa', 'Saepe aut nostrum as', 'https://www.hir.org.au', 'upload-photo-file/subcategory-photos/boefJoO.webp', '2022-04-18 05:44:05', '2022-04-18 09:56:45', NULL),
(12, 1, 'Eveniet mollit saep', 'Rem aspernatur volup', 'Dolor voluptates sit', 'Ad doloribus officia', 'Ab repellendus Et f', 'Distinctio Veniam', 'https://www.cyhypub.me', 'upload-photo-file/subcategory-photos/QD9Nfi8.jpg', '2022-04-18 05:44:42', NULL, NULL),
(13, 4, 'Repellendus Ut sed', 'Qui ea quisquam labo', 'Vel praesentium enim', 'Et amet dolorem eli', 'Non omnis ipsum dolo', 'Do esse omnis enim a', 'https://www.xemixak.in', 'upload-photo-file/subcategory-photos/7j3YiYM.webp', '2022-04-18 05:45:40', '2022-04-18 09:56:52', NULL),
(14, 1, 'Qui ipsum suscipit e', 'Ut aliqua Fugiat s', 'Minima beatae maxime', 'In explicabo Minima', 'Quo vel earum dolor', 'Tempora pariatur Qu', 'https://www.xubyfurewoba.com.au', 'upload-photo-file/subcategory-photos/c1xlxHj.jpg', '2022-04-18 05:46:23', NULL, NULL),
(15, 6, 'Nihil rerum in et si', 'Aliquid consectetur', 'In repellendus Dolo', 'Anim consequat Omni', 'Laboriosam id non f', 'Est ut dolore tempo', 'https://www.hikon.cc', 'upload-photo-file/subcategory-photos/mMO2D7b.jpg', '2022-04-18 05:46:54', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `title`, `subtitle`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'Kiron Pali', 'designer', 'upload-photo-file/team-photo/6-3q4yA5Q.jpg', '2022-02-26 00:54:07', '2022-04-16 13:00:08', NULL),
(4, 'Elenga Mark', 'Developer', 'upload-photo-file/team-photo/6-75OfXhg.jpg', '2022-04-16 11:23:01', '2022-04-16 12:59:50', NULL),
(5, 'Husne Farah', 'Graphic designer', 'upload-photo-file/team-photo/14-RUbRH3U.jpg', '2022-04-16 11:25:35', '2022-07-30 15:17:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `team_headers`
--

CREATE TABLE `team_headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_headers`
--

INSERT INTO `team_headers` (`id`, `header_title`, `header_subtitle`, `created_at`, `updated_at`) VALUES
(1, 'Creative Stuff', 'Teams area ipsum dolor sit amet, consectetur adipi sunt nisi id .', NULL, '2022-04-16 11:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `small_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `subtitle`, `small_description`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'Mitali Rox', 'Designer', 'aliquid culpa officia aut! Impedit sit sunt quaerat, odit, tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit, quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam', 'upload-photo-file/testimonial-photo/6-zA7XR31.png', '2022-02-26 15:25:13', '2022-02-26 16:54:50', NULL),
(13, 'Jon Martinex', 'ux/ui designer', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout', 'upload-photo-file/testimonial-photo/pVW9wUk.png', '2022-02-26 16:59:12', '2022-02-26 17:04:19', NULL),
(14, 'Rechar Man', 'Developer', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 'upload-photo-file/testimonial-photo/14-Tiv8EBY.png', '2022-02-26 17:07:19', '2022-07-30 15:56:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_headers`
--

CREATE TABLE `testimonial_headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `header_subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonial_headers`
--

INSERT INTO `testimonial_headers` (`id`, `header_title`, `header_subtitle`, `created_at`, `updated_at`) VALUES
(1, 'Clients Say', 'Testimonial dolor sit amet, consectetur adipi sunt nisi id magni digni', NULL, '2022-04-16 11:58:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_profile_photo.jpg',
  `cover_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_cover_photo.jpg',
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `year_experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `address`, `phone_number`, `profile_photo`, `cover_photo`, `short_description`, `availability`, `age`, `year_experience`) VALUES
(14, 'Habib Mia', 'habib@gmail.com', NULL, '$2y$10$v.tXOFhGTcbdUm8KsyIMJOglKcJng6nO6VoHwpcelzextVcVYsE1G', NULL, '2022-04-18 10:55:08', '2022-04-19 09:33:31', 'Titas,Comilla', '01969440721', '14-6Q5a4iq.jpg', '14-NrCdUBv.jpg', 'ut molestias architecto voluptate aliquam nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit, tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit, quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam recusandae alias error harum maxime adipisci amet laborum. Perspiciatis minima nesciunt dolorem! Officiis iure rerum voluptates a cumque velit quibusdam sed amet tempora. Sit laborum ab, eius fugit doloribus tenetur fugiat, temporibus enim commodi iusto libero magni deleniti quod quam consequuntur! Commodi minima excepturi repudiandae velit hic maxime', 'No any work', 22, '4'),
(16, 'Rashed', 'rashed@gmail.com', NULL, '$2y$10$8RoN4qMmF5DLyUFYG/YRluki3xC2/iSuCOwWbZGnzbBPLmPJH0b2y', NULL, '2022-04-19 08:19:29', '2022-04-19 09:40:14', 'Danmondi,Dhaka', '0196548721', '16-BG0K4TG.png', '16-TDGVXE3.jpg', 'Maxime mollitia,\r\nmolestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum\r\nnumquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium\r\noptio, eaque rerum! Provident similique accusantium nemo autem.', 'No any work', 25, '5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_areas`
--
ALTER TABLE `about_areas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `about_areas_email_unique` (`email`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `award__icons`
--
ALTER TABLE `award__icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_heads`
--
ALTER TABLE `blog_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_areas`
--
ALTER TABLE `contact_areas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_headers`
--
ALTER TABLE `contact_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter_bgphotos`
--
ALTER TABLE `counter_bgphotos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard_file_names`
--
ALTER TABLE `dashboard_file_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education__icons`
--
ALTER TABLE `education__icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experience__icons`
--
ALTER TABLE `experience__icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footer_icons`
--
ALTER TABLE `footer_icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hire_areas`
--
ALTER TABLE `hire_areas`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `portfolio_heads`
--
ALTER TABLE `portfolio_heads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_headers`
--
ALTER TABLE `service_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill__icons`
--
ALTER TABLE `skill__icons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_headers`
--
ALTER TABLE `team_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_headers`
--
ALTER TABLE `testimonial_headers`
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
-- AUTO_INCREMENT for table `about_areas`
--
ALTER TABLE `about_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `award__icons`
--
ALTER TABLE `award__icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blog_heads`
--
ALTER TABLE `blog_heads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_areas`
--
ALTER TABLE `contact_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `contact_headers`
--
ALTER TABLE `contact_headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `counter_bgphotos`
--
ALTER TABLE `counter_bgphotos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dashboard_file_names`
--
ALTER TABLE `dashboard_file_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `education__icons`
--
ALTER TABLE `education__icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `experience__icons`
--
ALTER TABLE `experience__icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_icons`
--
ALTER TABLE `footer_icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hire_areas`
--
ALTER TABLE `hire_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portfolio_heads`
--
ALTER TABLE `portfolio_heads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service_headers`
--
ALTER TABLE `service_headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `skill__icons`
--
ALTER TABLE `skill__icons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `team_headers`
--
ALTER TABLE `team_headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `testimonial_headers`
--
ALTER TABLE `testimonial_headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
