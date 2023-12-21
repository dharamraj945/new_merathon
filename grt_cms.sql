-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 07:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grt_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `grt_menu`
--

CREATE TABLE `grt_menu` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(200) NOT NULL,
  `menu_handler` varchar(200) NOT NULL,
  `menu_type` int(200) NOT NULL DEFAULT 0,
  `menu_action` varchar(500) NOT NULL,
  `menu_action_type` varchar(200) NOT NULL,
  `menu_status` int(11) NOT NULL,
  `menu_seq` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grt_pages`
--

CREATE TABLE `grt_pages` (
  `id` int(11) NOT NULL,
  `page_type` tinyint(4) NOT NULL,
  `is_index_page` tinyint(4) NOT NULL DEFAULT 0,
  `page_title` varchar(200) NOT NULL,
  `page_handler` varchar(200) NOT NULL,
  `page_short_desc` varchar(200) NOT NULL,
  `page_content` longtext NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grt_pages`
--

INSERT INTO `grt_pages` (`id`, `page_type`, `is_index_page`, `page_title`, `page_handler`, `page_short_desc`, `page_content`, `created_date`, `updated_date`) VALUES
(15, 0, 1, 'HomePage', 'homepage', 'HomePage', '', '2023-12-21 14:59:00', '2023-12-21 17:18:59'),
(16, 1, 0, 'This Page is About New Section', 'this-page-is-about-new-section', 'this is a new event page', '%3Ch2%3E%3Cstrong%3EHow+To+Add+Animated+Insa+Story+Category+Icon+Section+In+Shopify+Store+Without+Any+App%3C%2Fstrong%3E%3C%2Fh2%3E%3Cul%3E%3Cli%3EPost+author%3A%3Ca+href%3D%22https%3A%2F%2Fdevdesire.com%2Fauthor%2Fkumardharamraj2017%2F%22%3Ekumardharamraj2017%3C%2Fa%3E%3C%2Fli%3E%3Cli%3EPost+published%3ANovember+14%2C+2023%3C%2Fli%3E%3Cli%3EPost+category%3A%3Ca+href%3D%22https%3A%2F%2Fdevdesire.com%2Fcategory%2Fblog%2F%22%3EBlog%3C%2Fa%3E%3C%2Fli%3E%3Cli%3EPost+comments%3A%3Ca+href%3D%22https%3A%2F%2Fdevdesire.com%2Fhow-to-add-animated-insa-story-category-icon-section-in-shopify-store-without-any-app%2F%23respond%22%3E0+Comments%3C%2Fa%3E%3C%2Fli%3E%3C%2Ful%3E%3Cp%3ETo+Create+A+New+Section+In+your+Shopify+Store+Folllow+Steps%3C%2Fp%3E%3Col%3E%3Cli%3E%3Cstrong%3EAccess+Theme+Customization%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3ELog+in+to+your+Shopify+admin.%3C%2Fli%3E%3Cli%3EGo+to+Online+Store+%26gt%3B+Themes.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3EChoose+a+Theme%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3EClick+on+the+%E2%80%9CCustomize%E2%80%9D+button+for+the+theme+you+want+to+edit.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3EAdd+a+Section%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3ELook+for+the+%E2%80%9CSections%E2%80%9D+tab+in+the+left-hand+menu.%3C%2Fli%3E%3Cli%3EClick+on+it%2C+and+you%E2%80%99ll+see+a+list+of+available+sections.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3ESelect+or+Add+a+New+Section%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3EChoose+the+section+where+you+want+to+add+content.%3C%2Fli%3E%3Cli%3EIf+the+section+you+need+is+not+available%2C+some+themes+allow+you+to+add+a+new+section.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3EConfigure+the+Section%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3ECustomize+the+content+of+the+section+using+the+options+provided+in+the+theme+editor.+This+may+include+adding+images%2C+text%2C+products%2C+or+other+elements.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3ESave+Changes%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3EOnce+you%E2%80%99ve+configured+the+section+to+your+liking%2C+save+your+changes.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3EPreview+and+Publish%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3EIt%E2%80%99s+a+good+practice+to+preview+your+changes+to+see+how+they+look+on+your+storefront.%3C%2Fli%3E%3Cli%3EIf+you%E2%80%99re+satisfied%2C+click+the+%E2%80%9CPublish%E2%80%9D+button+to+make+your+changes+live.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3C%2Fol%3E%3Cp%3EIf+the+section+you+need+isn%E2%80%99t+available+in+the+theme+customization+settings%2C+you+might+need+to+make+changes+to+the+theme+code.+Here%E2%80%99s+a+more+advanced+guide+for+that%3A%3C%2Fp%3E%3Col%3E%3Cli%3E%3Cstrong%3EAccess+Theme+Code%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3EIn+the+theme+editor%2C+click+on+the+%E2%80%9CActions%E2%80%9D+dropdown+and+select+%E2%80%9CEdit+Code.%E2%80%9D%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3ECreate+a+New+Section+File%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3EIn+the+Sections+folder%2C+click+on+%E2%80%9CAdd+a+new+section.%E2%80%9D%3C%2Fli%3E%3Cli%3EName+the+new+file+and+click+%E2%80%9CCreate+section.%E2%80%9D%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3EEdit+the+Section+Code%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3EIn+the+new+section+file%2C+you+can+add+your+HTML%2C+Liquid%2C+and+CSS+code+to+define+the+content+and+styling+of+the+section.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3EInclude+the+Section+in+a+Template%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3EEdit+the+template+file+where+you+want+the+new+section+to+appear+and+include+the+section+using+Liquid+code.+This+might+involve+adding+something+like+%7B%25+section+%27your-section-name%27+%25%7D+to+the+template.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3ESave+Changes%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3ESave+your+changes+in+the+code+editor.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3EPreview+and+Publish%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3EAs+before%2C+preview+your+changes+and+then+publish+them+if+you%E2%80%99re+satisfied.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3C%2Fol%3E', '2023-12-21 15:37:28', '2023-12-21 15:39:19'),
(17, 0, 0, 'Test Page', 'test-page', 'Test Page', '', '2023-12-21 17:10:29', '2023-12-21 17:16:40'),
(18, 1, 0, 'Custome Page ', 'custome-page-', 'Custome Page ', '%3Cp%3ETo+Create+A+New+Section+In+your+Shopify+Store+Folllow+Steps%3C%2Fp%3E%3Col%3E%3Cli%3E%3Cstrong%3EAccess+Theme+Customization%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3ELog+in+to+your+Shopify+admin.%3C%2Fli%3E%3Cli%3EGo+to+Online+Store+%26gt%3B+Themes.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3EChoose+a+Theme%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3EClick+on+the+%E2%80%9CCustomize%E2%80%9D+button+for+the+theme+you+want+to+edit.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3EAdd+a+Section%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3ELook+for+the+%E2%80%9CSections%E2%80%9D+tab+in+the+left-hand+menu.%3C%2Fli%3E%3Cli%3EClick+on+it%2C+and+you%E2%80%99ll+see+a+list+of+available+sections.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3ESelect+or+Add+a+New+Section%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3EChoose+the+section+where+you+want+to+add+content.%3C%2Fli%3E%3Cli%3EIf+the+section+you+need+is+not+available%2C+some+themes+allow+you+to+add+a+new+section.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3EConfigure+the+Section%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3ECustomize+the+content+of+the+section+using+the+options+provided+in+the+theme+editor.+This+may+include+adding+images%2C+text%2C+products%2C+or+other+elements.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3ESave+Changes%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3EOnce+you%E2%80%99ve+configured+the+section+to+your+liking%2C+save+your+changes.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3EPreview+and+Publish%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3EIt%E2%80%99s+a+good+practice+to+preview+your+changes+to+see+how+they+look+on+your+storefront.%3C%2Fli%3E%3Cli%3EIf+you%E2%80%99re+satisfied%2C+click+the+%E2%80%9CPublish%E2%80%9D+button+to+make+your+changes+live.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3C%2Fol%3E%3Cp%3EIf+the+section+you+need+isn%E2%80%99t+available+in+the+theme+customization+settings%2C+you+might+need+to+make+changes+to+the+theme+code.+Here%E2%80%99s+a+more+advanced+guide+for+that%3A%3C%2Fp%3E%3Col%3E%3Cli%3E%3Cstrong%3EAccess+Theme+Code%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3EIn+the+theme+editor%2C+click+on+the+%E2%80%9CActions%E2%80%9D+dropdown+and+select+%E2%80%9CEdit+Code.%E2%80%9D%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3ECreate+a+New+Section+File%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3EIn+the+Sections+folder%2C+click+on+%E2%80%9CAdd+a+new+section.%E2%80%9D%3C%2Fli%3E%3Cli%3EName+the+new+file+and+click+%E2%80%9CCreate+section.%E2%80%9D%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3EEdit+the+Section+Code%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3EIn+the+new+section+file%2C+you+can+add+your+HTML%2C+Liquid%2C+and+CSS+code+to+define+the+content+and+styling+of+the+section.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3EInclude+the+Section+in+a+Template%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3EEdit+the+template+file+where+you+want+the+new+section+to+appear+and+include+the+section+using+Liquid+code.+This+might+involve+adding+something+like+%7B%25+section+%27your-section-name%27+%25%7D+to+the+template.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3ESave+Changes%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3ESave+your+changes+in+the+code+editor.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3Cli%3E%3Cstrong%3EPreview+and+Publish%3A%3C%2Fstrong%3E%3Cul%3E%3Cli%3EAs+before%2C+preview+your+changes+and+then+publish+them+if+you%E2%80%99re+satisfied.%3C%2Fli%3E%3C%2Ful%3E%3C%2Fli%3E%3C%2Fol%3E', '2023-12-21 17:18:26', '2023-12-21 17:18:57');

-- --------------------------------------------------------

--
-- Table structure for table `grt_page_section_trans`
--

CREATE TABLE `grt_page_section_trans` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `section_group_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grt_page_section_trans`
--

INSERT INTO `grt_page_section_trans` (`id`, `page_id`, `section_group_id`, `status`, `created_date`, `updated_date`) VALUES
(5, 15, 68, 0, '2023-12-21 14:59:00', '2023-12-21 14:59:00'),
(6, 15, 69, 0, '2023-12-21 14:59:00', '2023-12-21 14:59:00'),
(7, 15, 70, 0, '2023-12-21 14:59:00', '2023-12-21 14:59:00'),
(8, 17, 68, 0, '2023-12-21 17:10:29', '2023-12-21 17:10:29'),
(9, 17, 74, 0, '2023-12-21 17:10:29', '2023-12-21 17:10:29');

-- --------------------------------------------------------

--
-- Table structure for table `grt_sections`
--

CREATE TABLE `grt_sections` (
  `id` int(11) NOT NULL,
  `section_file` varchar(200) NOT NULL,
  `section_title` varchar(200) NOT NULL,
  `section_db_name` varchar(200) NOT NULL,
  `section_class` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grt_sections`
--

INSERT INTO `grt_sections` (`id`, `section_file`, `section_title`, `section_db_name`, `section_class`, `created_date`, `updated_date`) VALUES
(1, 'gallery.php\r\n', 'Gallery', 'grt_section_gallery\r\n', 'section_gallery', '2023-12-19 17:35:30', '2023-12-21 15:01:23'),
(2, 'section_banner.php', 'Banner', 'grt_section_banner', 'section_banner', '2023-12-19 17:44:55', '2023-12-21 15:02:08'),
(3, 'section_event_details.php', 'Events Details', 'grt_section_events', 'section_event', '2023-12-19 17:44:55', '2023-12-21 15:02:01'),
(4, 'section_registration_form.php', 'Registration Form', 'grt_section_registration', 'section_register', '2023-12-19 17:46:41', '2023-12-21 15:01:51'),
(5, 'section_news_feed.php', 'Blog', 'grt_section_blog', 'section_blog', '2023-12-19 17:46:41', '2023-12-21 15:01:45'),
(6, 'section_reviews.php', 'Testimonial', 'grt_section_testmonial', 'section_testimonial', '2023-12-19 17:47:25', '2023-12-21 15:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `grt_section_banner`
--

CREATE TABLE `grt_section_banner` (
  `id` int(11) NOT NULL,
  `section_group_id` int(11) NOT NULL,
  `banner_top_text` varchar(200) NOT NULL,
  `banner_heading` varchar(200) NOT NULL,
  `banner_filename` varchar(500) NOT NULL,
  `banner_sub_heading` varchar(200) NOT NULL,
  `banner_date` varchar(200) NOT NULL,
  `banner_time` varchar(200) NOT NULL,
  `banner_desc` varchar(500) NOT NULL,
  `banner_bnt_action` varchar(600) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grt_section_banner`
--

INSERT INTO `grt_section_banner` (`id`, `section_group_id`, `banner_top_text`, `banner_heading`, `banner_filename`, `banner_sub_heading`, `banner_date`, `banner_time`, `banner_desc`, `banner_bnt_action`, `created_date`, `updated_date`) VALUES
(2, 98, 'Come and join', 'Trail-A-Thon', '9394171657_banner.png', 'Gurugram Trails', '2023-12-19', '00:15', 'Trail-A-Thon now in its 10th year does not need any introduction; it is the largest and hottest Trail Running Event in the country and you have participated in it.', 'https://in.pinterest.com/pin/1407443626067517/', '2023-12-21 18:43:47', '2023-12-21 18:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `grt_section_events`
--

CREATE TABLE `grt_section_events` (
  `id` int(11) NOT NULL,
  `section_group_id` int(11) NOT NULL,
  `section_text` varchar(200) NOT NULL,
  `section_heading` varchar(200) NOT NULL,
  `section_richtext` longtext NOT NULL,
  `section_sequence` int(11) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grt_section_gallery`
--

CREATE TABLE `grt_section_gallery` (
  `id` int(11) NOT NULL,
  `section_group_id` int(11) NOT NULL,
  `image_alt` varchar(200) NOT NULL,
  `image_title` varchar(200) NOT NULL,
  `image_name` varchar(200) NOT NULL,
  `image_sequence` int(11) NOT NULL,
  `image_client_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grt_section_gallery`
--

INSERT INTO `grt_section_gallery` (`id`, `section_group_id`, `image_alt`, `image_title`, `image_name`, `image_sequence`, `image_client_id`, `created_date`, `updated_date`) VALUES
(158, 68, 'user_1_9387.jpg', 'user_1_9387.jpg', 'user_1_9387.jpg', 0, 1, '2023-12-20 17:01:10', '2023-12-20 17:01:10'),
(159, 68, 'user_1_9126.jpg', 'user_1_9126.jpg', 'user_1_9126.jpg', 0, 1, '2023-12-20 17:01:10', '2023-12-20 17:01:10'),
(160, 68, 'user_1_2546.jpg', 'user_1_2546.jpg', 'user_1_2546.jpg', 0, 1, '2023-12-20 17:01:10', '2023-12-20 17:01:10'),
(161, 68, 'user_1_7196.jpg', 'user_1_7196.jpg', 'user_1_7196.jpg', 0, 1, '2023-12-20 17:01:10', '2023-12-20 17:01:10'),
(162, 68, 'user_1_8346.jpg', 'user_1_8346.jpg', 'user_1_8346.jpg', 0, 1, '2023-12-20 17:01:10', '2023-12-20 17:01:10'),
(167, 69, 'user_1_1127.jpg', 'user_1_1127.jpg', 'user_1_1127.jpg', 0, 1, '2023-12-20 19:32:05', '2023-12-20 19:32:05'),
(168, 69, 'user_1_5985.jpg', 'user_1_5985.jpg', 'user_1_5985.jpg', 0, 1, '2023-12-20 19:32:05', '2023-12-20 19:32:05'),
(169, 69, 'user_1_2148.jpg', 'user_1_2148.jpg', 'user_1_2148.jpg', 0, 1, '2023-12-20 19:32:05', '2023-12-20 19:32:05'),
(170, 69, 'user_1_3840.jpg', 'user_1_3840.jpg', 'user_1_3840.jpg', 0, 1, '2023-12-20 19:32:05', '2023-12-20 19:32:05'),
(171, 69, 'user_1_416.jpg', 'user_1_416.jpg', 'user_1_416.jpg', 0, 1, '2023-12-20 19:32:05', '2023-12-20 19:32:05'),
(172, 69, 'user_1_3654.jpg', 'user_1_3654.jpg', 'user_1_3654.jpg', 0, 1, '2023-12-20 19:32:05', '2023-12-20 19:32:05'),
(173, 69, 'user_1_9450.jpg', 'user_1_9450.jpg', 'user_1_9450.jpg', 0, 1, '2023-12-20 19:32:05', '2023-12-20 19:32:05'),
(174, 69, 'user_1_9322.jpg', 'user_1_9322.jpg', 'user_1_9322.jpg', 0, 1, '2023-12-20 19:32:05', '2023-12-20 19:32:05'),
(175, 69, 'user_1_2634.jpg', 'user_1_2634.jpg', 'user_1_2634.jpg', 0, 1, '2023-12-20 19:32:05', '2023-12-20 19:32:05'),
(176, 69, 'user_1_4811.jpg', 'user_1_4811.jpg', 'user_1_4811.jpg', 0, 1, '2023-12-20 19:32:05', '2023-12-20 19:32:05'),
(177, 69, 'user_1_445.jpg', 'user_1_445.jpg', 'user_1_445.jpg', 0, 1, '2023-12-20 19:32:05', '2023-12-20 19:32:05'),
(178, 69, 'user_1_3854.jpg', 'user_1_3854.jpg', 'user_1_3854.jpg', 0, 1, '2023-12-20 19:32:05', '2023-12-20 19:32:05'),
(179, 69, 'user_1_2557.jpg', 'user_1_2557.jpg', 'user_1_2557.jpg', 0, 1, '2023-12-20 19:32:05', '2023-12-20 19:32:05'),
(180, 69, 'user_1_5989.jpg', 'user_1_5989.jpg', 'user_1_5989.jpg', 0, 1, '2023-12-20 19:32:05', '2023-12-20 19:32:05');

-- --------------------------------------------------------

--
-- Table structure for table `grt_section_group`
--

CREATE TABLE `grt_section_group` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `section_group_title` varchar(200) NOT NULL,
  `section_group_desc` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grt_section_group`
--

INSERT INTO `grt_section_group` (`id`, `client_id`, `section_id`, `section_group_title`, `section_group_desc`, `status`, `created_date`, `updated_date`) VALUES
(67, 1, 1, 'Dharmraj Kumar', 'Dharmraj Kumar', 1, '2023-12-20 16:54:14', '2023-12-20 16:54:14'),
(68, 1, 1, 'Gallery 2023', 'Aboout The All Data', 0, '2023-12-20 17:01:10', '2023-12-20 17:01:10'),
(69, 1, 1, 'Gallery 2025', 'Wiiner Galaary of 2025 ', 0, '2023-12-20 19:32:05', '2023-12-20 19:32:05'),
(70, 1, 1, 'Group 2022', 'Group 2022', 0, '2023-12-21 14:21:31', '2023-12-21 14:21:31'),
(74, 1, 3, 'Event 2022', 'Event 2022', 0, '2023-12-21 16:34:01', '2023-12-21 16:34:01'),
(98, 1, 2, 'Banner 2010', 'dsds', 0, '2023-12-21 18:43:47', '2023-12-21 18:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_mobile` varchar(15) NOT NULL,
  `user_pwd` varchar(300) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT 0,
  `user_type` int(11) DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_email`, `user_mobile`, `user_pwd`, `user_status`, `user_type`, `created_date`, `updated_date`) VALUES
(1, 'Dharmraj Kumar', 'kumardharamraj2017@gmail.com', '8851096421 ', '123', 0, 0, '2023-10-09 10:02:04', '2023-10-10 11:09:48'),
(4, 'dharamraj', 'kunal8851@gmail.com', '8851096421', '1234', 0, 0, '2023-10-09 12:11:29', '2023-10-10 13:22:10'),
(5, 'kunal k', 'kk@gmail.com', '9910706197', 'djdrmrajx8851', 0, 0, '2023-10-09 12:12:48', '2023-10-10 10:35:36'),
(6, 'kunal', 'kdk@gmail.com', '9910706197', '58', 0, 0, '2023-10-09 12:13:03', '2023-10-09 17:43:03'),
(7, 'Bad Boy', 'BadBoy@gmail.com', '123456789', '123', 0, 0, '2023-10-14 16:45:52', '2023-10-14 22:15:52'),
(8, 'kanika', 'kanika@gmail.com', '7290873574', 'kanika@8851', 0, 0, '2023-11-05 09:39:28', '2023-11-05 15:09:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grt_menu`
--
ALTER TABLE `grt_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grt_pages`
--
ALTER TABLE `grt_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grt_page_section_trans`
--
ALTER TABLE `grt_page_section_trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grt_sections`
--
ALTER TABLE `grt_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grt_section_banner`
--
ALTER TABLE `grt_section_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grt_section_events`
--
ALTER TABLE `grt_section_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grt_section_gallery`
--
ALTER TABLE `grt_section_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grt_section_group`
--
ALTER TABLE `grt_section_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grt_menu`
--
ALTER TABLE `grt_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grt_pages`
--
ALTER TABLE `grt_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `grt_page_section_trans`
--
ALTER TABLE `grt_page_section_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `grt_sections`
--
ALTER TABLE `grt_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grt_section_banner`
--
ALTER TABLE `grt_section_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grt_section_events`
--
ALTER TABLE `grt_section_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grt_section_gallery`
--
ALTER TABLE `grt_section_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `grt_section_group`
--
ALTER TABLE `grt_section_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
