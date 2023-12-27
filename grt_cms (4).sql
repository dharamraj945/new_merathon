-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 02:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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

--
-- Dumping data for table `grt_menu`
--

INSERT INTO `grt_menu` (`id`, `menu_name`, `menu_handler`, `menu_type`, `menu_action`, `menu_action_type`, `menu_status`, `menu_seq`, `created_date`, `updated_date`) VALUES
(7, 'Contact Us', 'contact-us', 0, '36', '0', 0, 1, '2023-12-26 15:40:59', '2023-12-26 15:40:59');

-- --------------------------------------------------------

--
-- Table structure for table `grt_pages`
--

CREATE TABLE `grt_pages` (
  `id` int(11) NOT NULL,
  `page_type` tinyint(4) NOT NULL,
  `is_index_page` tinyint(4) NOT NULL DEFAULT 0,
  `page_title` varchar(200) NOT NULL,
  `is_custom` int(11) NOT NULL DEFAULT 0,
  `page_handler` varchar(200) NOT NULL,
  `page_short_desc` varchar(200) NOT NULL,
  `page_content` longtext NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grt_pages`
--

INSERT INTO `grt_pages` (`id`, `page_type`, `is_index_page`, `page_title`, `is_custom`, `page_handler`, `page_short_desc`, `page_content`, `created_date`, `updated_date`) VALUES
(35, 0, 1, 'Home Page 2', 0, 'home-page', 'HomePage 2 3', '', '2023-12-26 15:37:40', '2023-12-27 10:49:10'),
(36, 1, 0, 'About US 2', 1, 'about-us-', 'About US ', '%3Cp%3E%3Cstrong%3EIntroduction%3A%3C%2Fstrong%3E%3C%2Fp%3E%3Cul%3E%3Cli%3EBriefly+introduce+your+organization+or+business.%3C%2Fli%3E%3Cli%3EProvide+a+summary+of+what+your+organization+does.%3C%2Fli%3E%3C%2Ful%3E%3Cp%3E%3Cstrong%3EHistory%3A%3C%2Fstrong%3E%3C%2Fp%3E%3Cul%3E%3Cli%3EShare+the+history+of+your+organization%2C+including+when+it+was+founded.%3C%2Fli%3E%3Cli%3EHighlight+key+milestones+and+achievements.%3C%2Fli%3E%3C%2Ful%3E%3Cp%3E%3Cstrong%3EMission+and+Values%3A%3C%2Fstrong%3E%3C%2Fp%3E%3Cul%3E%3Cli%3EClearly+state+your+organization%27s+mission+and+values.%3C%2Fli%3E%3Cli%3EExplain+the+goals+and+principles+that+guide+your+work.%3C%2Fli%3E%3C%2Ful%3E%3Cp%3E%3Cstrong%3ETeam+Members%3A%3C%2Fstrong%3E%3C%2Fp%3E%3Cul%3E%3Cli%3EIntroduce+key+team+members+or+founders.%3C%2Fli%3E%3Cli%3EInclude+brief+bios+and+photos+to+make+it+more+personal.%3C%2Fli%3E%3C%2Ful%3E%3Cp%3E%3Cstrong%3ECompany+Culture%3A%3C%2Fstrong%3E%3C%2Fp%3E%3Cul%3E%3Cli%3EDescribe+the+company+culture+and+what+makes+your+organization+unique.%3C%2Fli%3E%3Cli%3EHighlight+any+awards+or+recognition.%3C%2Fli%3E%3C%2Ful%3E%3Cp%3E%3Cstrong%3EAchievements%3A%3C%2Fstrong%3E%3C%2Fp%3E%3Cul%3E%3Cli%3EShowcase+any+significant+achievements+or+milestones.%3C%2Fli%3E%3Cli%3EShare+success+stories+or+projects.%3C%2Fli%3E%3C%2Ful%3E%3Cp%3E%26nbsp%3B%3C%2Fp%3E', '2023-12-26 15:39:16', '2023-12-27 10:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `grt_page_section_trans`
--

CREATE TABLE `grt_page_section_trans` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `section_seq` int(11) NOT NULL,
  `section_group_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grt_page_section_trans`
--

INSERT INTO `grt_page_section_trans` (`id`, `page_id`, `section_seq`, `section_group_id`, `status`, `created_date`, `updated_date`) VALUES
(226, 35, 0, 68, 0, '2023-12-27 11:47:36', '2023-12-27 11:47:36'),
(227, 35, 0, 69, 0, '2023-12-27 11:47:36', '2023-12-27 11:47:36'),
(228, 35, 0, 70, 0, '2023-12-27 11:47:36', '2023-12-27 11:47:36'),
(229, 35, 0, 98, 0, '2023-12-27 11:47:36', '2023-12-27 11:47:36'),
(230, 35, 0, 104, 0, '2023-12-27 11:47:36', '2023-12-27 11:47:36'),
(231, 35, 0, 106, 0, '2023-12-27 11:47:36', '2023-12-27 11:47:36'),
(232, 35, 0, 109, 0, '2023-12-27 11:47:36', '2023-12-27 11:47:36'),
(233, 35, 0, 110, 0, '2023-12-27 11:47:36', '2023-12-27 11:47:36'),
(234, 35, 1, 123, 0, '2023-12-27 11:47:36', '2023-12-27 11:47:48');

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
  `status` int(11) NOT NULL DEFAULT 0,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grt_sections`
--

INSERT INTO `grt_sections` (`id`, `section_file`, `section_title`, `section_db_name`, `section_class`, `status`, `created_date`, `updated_date`) VALUES
(1, 'gallery.php\r\n', 'Gallery', 'grt_section_gallery\r\n', 'section_gallery', 0, '2023-12-19 17:35:30', '2023-12-21 15:01:23'),
(2, 'section_banner.php', 'Banner', 'grt_section_banner', 'section_banner', 0, '2023-12-19 17:44:55', '2023-12-21 15:02:08'),
(3, 'section_event_details.php', 'Events Details', 'grt_section_events', 'section_event', 0, '2023-12-19 17:44:55', '2023-12-21 15:02:01'),
(4, 'section_registration_form.php', 'Registration Form', 'grt_section_registration', 'section_register', 1, '2023-12-19 17:46:41', '2023-12-26 18:40:18'),
(5, 'section_news_feed.php', 'Blog', 'grt_section_blog', 'section_blog', 0, '2023-12-19 17:46:41', '2023-12-21 15:01:45'),
(6, 'section_reviews.php', 'Testimonial', 'grt_section_testimonials', 'section_testimonial', 0, '2023-12-19 17:47:25', '2023-12-22 19:18:46'),
(7, 'section_custom.php', 'Custom Section', 'grt_section_custom', 'section_custom', 0, '2023-12-22 19:19:43', '2023-12-22 19:19:43');

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
(13, 134, 'We are Hiring', 'Top Web Devolopers ', '9275587756_banner.png', 'Location Delhi', '2023-11-27', '18:52', 'A+position+defines+an+xy+coordinate%2C+to+place+an+item+relative+to+the+edges+of+an+element%27s+box.+It+can+be+defined+using+one+to+four+values.', 'https://www.youtube.com/watch?v=AJTJTNP3WME&list=RDMM&index=7', '2023-12-27 13:20:10', '2023-12-27 13:34:04'),
(14, 135, 'Banner', 'Banner', '6986412765_banner.jpg', 'Banner', '2023-12-08', '21:50', 'Banner', 'https://www.youtube.com/watch?v=AJTJTNP3WME&list=RDMM&index=7', '2023-12-27 13:20:51', '2023-12-27 13:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `grt_section_blog`
--

CREATE TABLE `grt_section_blog` (
  `id` int(11) NOT NULL,
  `section_group_id` int(11) NOT NULL,
  `bloge_date` varchar(200) NOT NULL,
  `bloge_image` varchar(500) NOT NULL,
  `bloge_heading` varchar(200) NOT NULL,
  `bloge_author` varchar(200) NOT NULL,
  `bloge_content` longtext NOT NULL,
  `bloge_action` varchar(500) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grt_section_blog`
--

INSERT INTO `grt_section_blog` (`id`, `section_group_id`, `bloge_date`, `bloge_image`, `bloge_heading`, `bloge_author`, `bloge_content`, `bloge_action`, `created_date`, `updated_date`) VALUES
(11, 109, '2023-12-27', 'Bloge_1_1968.jpg', 'Understanding+Shopify+Customization%3A+Unleashing+the+Power+of+Theme+Customization', 'Amita', '%3Cp%3EIntroduction%3A%3C%2Fp%3E%3Cp%3EShopify%2C+a+leading+e-commerce+platform%2C+empowers+businesses+to+establish+and+grow+their+online+presence+effortlessly.+One+of+the+key+features+that+sets+Shopify+apart+is+its+theme+customization+capabilities.+Tailoring+your+online+store%E2%80%99s+appearance+and+functionality+is+crucial+to+creating+a+unique+brand+identity+and+providing+a+seamless+shopping+experience+for+your+customers.+In+this+blog+post%2C+we%E2%80%99ll+delve+into+the+fundamentals+of+Shopify+theme+customization%2C+exploring+the+tools+and+techniques+that+allow+you+to+unleash+the+full+potential+of+your+online+store.%3C%2Fp%3E%3Ch2%3E%3Cstrong%3EGetting+Started+with+Theme+Customization%3A%3C%2Fstrong%3E%3C%2Fh2%3E%3Col%3E%3Cli%3E%3Cstrong%3EChoosing+the+Right+Theme%3A%3C%2Fstrong%3E%3Cbr%3EBefore+diving+into+customization%2C+it%E2%80%99s+essential+to+choose+a+theme+that+aligns+with+your+brand+and+meets+your+business+needs.+Shopify+offers+a+range+of+free+and+premium+themes%2C+each+with+its+own+set+of+features+and+design+elements.%3C%2Fli%3E%3Cli%3E%3Cstrong%3EAccessing+the+Theme+Editor%3A%3C%2Fstrong%3E%3Cbr%3EOnce+you%E2%80%99ve+selected+a+theme%2C+navigate+to+the+Shopify+admin+dashboard+and+access+the+%E2%80%98Online+Store%E2%80%99+section.+From+here%2C+click+on+%E2%80%98Themes%E2%80%99+and+then+%E2%80%98Customize%E2%80%99+to+enter+the+Theme+Editor.%3C%2Fli%3E%3C%2Fol%3E%3Ch2%3E%3Cstrong%3ETheme+Customization+Tools%3A%3C%2Fstrong%3E%3C%2Fh2%3E%3Col%3E%3Cli%3E%3Cstrong%3ESections+and+Blocks%3A%3C%2Fstrong%3E%3Cbr%3EShopify+themes+are+structured+using+sections+and+blocks.+Sections+are+the+overall+components+of+a+page+%28e.g.%2C+header%2C+footer%29%2C+and+blocks+are+the+individual+elements+within+those+sections+%28e.g.%2C+product+grid%2C+image+slideshow%29.+Use+these+to+organize+and+customize+different+parts+of+your+online+store.%3C%2Fli%3E%3Cli%3E%3Cstrong%3ETypography+and+Colors%3A%3C%2Fstrong%3E%3Cbr%3ETailor+the+fonts+and+colors+of+your+store+to+match+your+brand+identity.+The+Theme+Editor+allows+you+to+modify+these+aspects+easily%2C+ensuring+a+consistent+and+visually+appealing+design.%3C%2Fli%3E%3Cli%3E%3Cstrong%3EHeader+and+Footer+Customization%3A%3C%2Fstrong%3E%3Cbr%3EThe+header+and+footer+are+critical+areas+for+navigation+and+branding.+Customize+these+sections+to+include+your+logo%2C+navigation+menus%2C+and+any+additional+information+or+links+relevant+to+your+business.%3C%2Fli%3E%3Cli%3E%3Cstrong%3EProduct+Page+Customization%3A%3C%2Fstrong%3E%3Cbr%3EEnhance+the+presentation+of+your+products+by+customizing+the+product+page+layout.+Adjust+the+product+image+size%2C+add+product+details%2C+and+highlight+key+features+to+capture+your+customers%E2%80%99+attention.%3C%2Fli%3E%3Cli%3E%3Cstrong%3ECollection+Pages%3A%3C%2Fstrong%3E%3Cbr%3ECustomize+the+layout+and+appearance+of+collection+pages+to+create+a+cohesive+browsing+experience.+Showcase+products+in+a+way+that+makes+it+easy+for+customers+to+find+what+they%E2%80%99re+looking+for.%3C%2Fli%3E%3C%2Fol%3E', 'https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DKKgzN2awy9I%26list%3DRDjH0mjd8zELM%26index%3D16', '2023-12-23 11:08:05', '2023-12-23 11:08:05'),
(12, 109, '2023-12-21', 'Bloge_1_4150.jpg', 'Understanding+Shopify+Customization%3A+Unleashing+the+Power+of+Theme+Customization', 'Knaika', '%3Ch2%3E%3Cstrong%3ETheme+Customization+Tools%3A%3C%2Fstrong%3E%3C%2Fh2%3E%3Col%3E%3Cli%3E%3Cstrong%3ESections+and+Blocks%3A%3C%2Fstrong%3E%3Cbr%3EShopify+themes+are+structured+using+sections+and+blocks.+Sections+are+the+overall+components+of+a+page+%28e.g.%2C+header%2C+footer%29%2C+and+blocks+are+the+individual+elements+within+those+sections+%28e.g.%2C+product+grid%2C+image+slideshow%29.+Use+these+to+organize+and+customize+different+parts+of+your+online+store.%3C%2Fli%3E%3Cli%3E%3Cstrong%3ETypography+and+Colors%3A%3C%2Fstrong%3E%3Cbr%3ETailor+the+fonts+and+colors+of+your+store+to+match+your+brand+identity.+The+Theme+Editor+allows+you+to+modify+these+aspects+easily%2C+ensuring+a+consistent+and+visually+appealing+design.%3C%2Fli%3E%3Cli%3E%3Cstrong%3EHeader+and+Footer+Customization%3A%3C%2Fstrong%3E%3Cbr%3EThe+header+and+footer+are+critical+areas+for+navigation+and+branding.+Customize+these+sections+to+include+your+logo%2C+navigation+menus%2C+and+any+additional+information+or+links+relevant+to+your+business.%3C%2Fli%3E%3Cli%3E%3Cstrong%3EProduct+Page+Customization%3A%3C%2Fstrong%3E%3Cbr%3EEnhance+the+presentation+of+your+products+by+customizing+the+product+page+layout.+Adjust+the+product+image+size%2C+add+product+details%2C+and+highlight+key+features+to+capture+your+customers%E2%80%99+attention.%3C%2Fli%3E%3Cli%3E%3Cstrong%3ECollection+Pages%3A%3C%2Fstrong%3E%3Cbr%3ECustomize+the+layout+and+appearance+of+collection+pages+to+create+a+cohesive+browsing+experience.+Showcase+products+in+a+way+that+makes+it+easy+for+customers+to+find+what+they%E2%80%99re+looking+for.%3C%2Fli%3E%3C%2Fol%3E%3Ch2%3E%3Cstrong%3EAdvanced+Customization%3A%3C%2Fstrong%3E%3C%2Fh2%3E%3Col%3E%3Cli%3E%3Cstrong%3ELiquid+Code%3A%3C%2Fstrong%3E%3Cbr%3EFor+more+advanced+customization%2C+you+can+leverage+Shopify%E2%80%99s+Liquid+code.+This+allows+you+to+modify+and+extend+your+theme%E2%80%99s+functionality.+It%E2%80%99s+essential+to+have+a+good+understanding+of+HTML%2C+CSS%2C+and+the+Liquid+templating+language.%3C%2Fli%3E%3Cli%3E%3Cstrong%3EApps+and+Integrations%3A%3C%2Fstrong%3E%3Cbr%3EExplore+the+Shopify+App+Store+for+additional+apps+and+integrations+that+can+enhance+your+store%E2%80%99s+functionality.+Many+apps+offer+customization+options+that+can+be+seamlessly+integrated+into+your+chosen+theme.%3C%2Fli%3E%3C%2Fol%3E', 'https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DuYmpUa38-Fk%26list%3DRDjH0mjd8zELM%26index%3D17', '2023-12-23 11:09:45', '2023-12-23 11:09:45');

-- --------------------------------------------------------

--
-- Table structure for table `grt_section_custom`
--

CREATE TABLE `grt_section_custom` (
  `id` int(11) NOT NULL,
  `section_group_id` int(11) NOT NULL,
  `section_content` longtext NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grt_section_custom`
--

INSERT INTO `grt_section_custom` (`id`, `section_group_id`, `section_content`, `created_date`, `Updated_date`) VALUES
(1, 106, '%3Cp%3E%26lt%3Bdiv+class%3D%22area-of-run%22%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3Bdiv+class%3D%22container%22%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3Bdiv+class%3D%22row%22%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3Bdiv+class%3D%22area-inr+d-flex%22%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3Bdiv+class%3D%22area-img-conteiner+col-12+col-lg-3+d-flex+align-items-stretch%22%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3Bimg+src%3D%22.%2Fmarathon-images%2Farea-of-run.png%22+alt%3D%22area-of-run%22%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3B%2Fdiv%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3Bdiv+class%3D%22area-text+col-12+col-lg-9+d-flex+align-items-stretch%22%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3Bp+class%3D%22title-top%22%26gt%3BTotal+Run%26lt%3B%2Fp%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3Bh2+class%3D%22section-title%22%26gt%3BArea+Of+Run%26lt%3B%2Fh2%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3Bp+class%3D%22area-address%22%26gt%3BManger+to+Damdama+Lake%2C+off+Gurgaon+Faridabad+Road%26lt%3B%2Fp%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3Bul+class%3D%22area-list%22%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3Bli%26gt%3BThe+distances+may+be+increased+or+decreased+a+little.+You+are+in+for+a+fun+filled%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3Brunning+experience+like+past+editions+of+Trail-A-Thon%26lt%3B%2Fli%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3Bli%26gt%3BUltra+Runners+won%27t+be+allowed+to+run+without+head+torch+or+proper+lighting%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3Barrangements.%26lt%3B%2Fli%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3B%2Ful%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3B%2Fdiv%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3B%2Fdiv%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3B%2Fdiv%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3B%2Fdiv%26gt%3B%3Cbr%3E%26nbsp%3B+%26nbsp%3B+%26nbsp%3B+%26nbsp%3B%26lt%3B%2Fdiv%26gt%3B%3C%2Fp%3E', '2023-12-22 19:49:38', '2023-12-22 19:49:38');

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

--
-- Dumping data for table `grt_section_events`
--

INSERT INTO `grt_section_events` (`id`, `section_group_id`, `section_text`, `section_heading`, `section_richtext`, `section_sequence`, `created_date`, `updated_date`) VALUES
(17, 123, '01', 'Background', '%3Cp%3ETrail-a-thon+is+the+fruit+of+most+Delhi+NCR+Groups+coming+together+under+the+banner+of+Aravali+Trail+Blazers+%28ATB%29+with+one+purpose%3B+to+organize+an+event+which+can+showcase+the+capabilities+of+the+Running+Community+of+Delhi+NCR+by+organizing+an+event+which+will+set+standards+for+others+to+follow+through+its+concept%2C+innovations+and+execution+providing+benchmark+for+others+to+follow+through+a+luxurious+running+event+for+runners+and+lots+of+fun+for+the+families+and+non+runners%3C%2Fp%3E', 0, '2023-12-27 11:45:36', '2023-12-27 11:45:36'),
(18, 123, '02', 'A+well+established+Event', '%3Cp%3ETrail-A-Thon+now+in+its+11th+year+does+not+need+any+introduction%3B+it+has+evolved+to+become+the+largest+and+hottest+Trail+Running+Event+in+the+country.+It+is+a+time+chipped+event+on+a+luxurious+well+supported+fully+runnable+trail+but+with+a+few+twists+and+turns+to+ensure+there+are+enough+challenges+for+even+the+most+seasoned+runners.+It+takes+place+in+the+scenic+Manger+forest+region+of+the+Aravalis+in+Gurgaon.+It+is+also+an+event+where+the+running+community+comes+together+to+create+awareness+about+the+Aravalis+and+their+awareness+thus+helping+in+their+conservation%2C+Besides+serious+runners%2C+there+is+also+plenty+for+the+walkers%2C+nature+lovers+and+families+of+runners+to+join+in+and+enjoy+the+beautiful+day+walking+in+the+forest+with+plenty+of+activities+to+keep+them+engaged%3C%2Fp%3E', 0, '2023-12-27 11:45:51', '2023-12-27 11:45:51'),
(19, 123, '03', 'As+a+runner+you+get+to+%E2%80%98Extend+your+limits%E2%80%99', '%3Cp%3EWe+all+know+that+the+standard+distances+are+5%2C10%2C+21+and+42+kms%2C+however+here+we+encourage+runners+to+push+themselves+just+a+little+more+so+the+distances+went+to+7%2C14%2C28+with+a+ultra+56kms+run+for+the+ultra+running+junkies.%26nbsp%3B%3C%2Fp%3E', 0, '2023-12-27 11:46:03', '2023-12-27 11:46:03'),
(20, 123, '04', 'Plenty+of++fun+and+goodies', '%3Cp%3ETrail-A-Thon+is+known+for+its+amazing+merchandize+and+fun+quotient.+It+has+given+goodies+like+run+jerseys%2C+technical+shorts%2C+arm+sleeves%2C+etc.+to+ensure+that+you+have+an+apparel+which+will+go+beyond+the+event%2C+which+you+can+enjoy+year+after+year.+Even+today+it+is+not+surprising+to+see+a+runner+running+in+the+t+shirt+provided+in+the+1st+edition%2C+yes%2C+a+decade+back%21+In+fact+Trail-a-thon+is+the+event+which+started+the+trend+of+runners+being+given+super+star+royal+treatment.+We+have+innovated+in+our+technical+gear%2C+year+after+year.+Our+innovative+medals+too+are+a+legend.+We+have+given+the+first+metal+%26nbsp%3Bcut+medal%2C+the+first+wooden+medal%2C+the+first+and+only+technical+whistle+for+runners+to+use+while+running%2C+the+first+and+only+medal+which+was+also+a+belt+buckle.+So+innovation+and+trendsetting+is+in+the+DNA+for+Trail-a-thon%3C%2Fp%3E%3Cp%3ETrail-a-thon+is+also+known+for+providing+unique+experiences+to+runners%3B+from+live+flute+players+in+the+jungle+to+masseurs+on+the+trail%2C+piping+hot+food%2C+right+in+the+jungle+to+fresh+sugarcane+juice.+We+have+given+it+all.+We+even+have+our+own+definition+of+Camelbak%3B+where+in+the+runners+get+water+on+the+trail+with+moving+aid+station+on+the+back+of+camels%21+Finally%2C+of+course%2C+the+photos%2C+we+have+the+highest+number+of+photos+that+one+can+have+and+with+some+amazing+background%21%3C%2Fp%3E', 0, '2023-12-27 11:46:39', '2023-12-27 11:46:39');

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
(180, 69, 'user_1_5989.jpg', 'user_1_5989.jpg', 'user_1_5989.jpg', 0, 1, '2023-12-20 19:32:05', '2023-12-20 19:32:05'),
(182, 110, 'user_1_9547.jpg', 'user_1_9547.jpg', 'user_1_9547.jpg', 0, 1, '2023-12-23 11:31:08', '2023-12-23 11:31:08'),
(183, 110, 'user_1_7040.jpg', 'user_1_7040.jpg', 'user_1_7040.jpg', 0, 1, '2023-12-23 11:31:08', '2023-12-23 11:31:08'),
(184, 110, 'user_1_379.jpg', 'user_1_379.jpg', 'user_1_379.jpg', 0, 1, '2023-12-23 11:31:09', '2023-12-23 11:31:09'),
(185, 110, 'user_1_5891.jpg', 'user_1_5891.jpg', 'user_1_5891.jpg', 0, 1, '2023-12-23 11:31:09', '2023-12-23 11:31:09'),
(186, 110, 'user_1_874.jpg', 'user_1_874.jpg', 'user_1_874.jpg', 0, 1, '2023-12-23 11:31:09', '2023-12-23 11:31:09'),
(187, 110, 'user_1_976.jpg', 'user_1_976.jpg', 'user_1_976.jpg', 0, 1, '2023-12-23 11:31:09', '2023-12-23 11:31:09'),
(188, 110, 'user_1_2798.jpg', 'user_1_2798.jpg', 'user_1_2798.jpg', 0, 1, '2023-12-23 11:31:09', '2023-12-23 11:31:09');

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
(68, 1, 1, 'Gallery 2023', 'Aboout The All Data', 0, '2023-12-20 17:01:10', '2023-12-20 17:01:10'),
(69, 1, 1, 'Gallery 2025', 'Wiiner Galaary of 2025 ', 0, '2023-12-20 19:32:05', '2023-12-20 19:32:05'),
(70, 1, 1, 'Group 2022', 'Group 2022', 0, '2023-12-21 14:21:31', '2023-12-21 14:21:31'),
(106, 1, 7, 'Area of Run', 'Area of Run', 0, '2023-12-22 19:49:38', '2023-12-22 19:49:38'),
(110, 1, 1, 'Sangeet', 'Sangget Galary', 0, '2023-12-23 11:31:08', '2023-12-23 11:31:08'),
(123, 1, 3, 'Event 2024', 'Event 2024', 0, '2023-12-27 11:44:51', '2023-12-27 11:44:51'),
(134, 1, 2, 'Banner 2024', 'Banner 2024', 0, '2023-12-27 13:20:10', '2023-12-27 13:20:10'),
(135, 1, 2, 'Banner', 'Banner', 1, '2023-12-27 13:20:51', '2023-12-27 13:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `grt_section_testimonials`
--

CREATE TABLE `grt_section_testimonials` (
  `id` int(11) NOT NULL,
  `section_group_id` int(11) NOT NULL,
  `section_image` varchar(200) NOT NULL,
  `section_rating` int(11) NOT NULL,
  `section_desc` varchar(500) NOT NULL,
  `section_cus_name` varchar(200) NOT NULL,
  `section_cus_position` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grt_section_testimonials`
--

INSERT INTO `grt_section_testimonials` (`id`, `section_group_id`, `section_image`, `section_rating`, `section_desc`, `section_cus_name`, `section_cus_position`, `created_date`, `updated_date`) VALUES
(18, 104, 'Testimonials_1_6606.png', 5, '+Taking+seamless+key+performance+indicators+offline+to+maximise+the+long+tail.+Keeping+your+eye+on+the+ball+while+performing+a+deep+dive.+Completely+synergize+resource+taxing+relationships+via+premier+niche+markets.+Professionally+cultivate+one-to-one+customer.+', 'Richard+Hartisona', 'Founder', '2023-12-22 18:44:23', '2023-12-22 18:44:23'),
(19, 104, 'Testimonials_1_7270.jpg', 4, 'I+like+This+Product+And+Love+Maratons+that+is+orgnized+in+the+events+I+like+This+Product+And+Love+Maratons+that+is+orgnized+in+the+events+I+like+This+Product+And+Love+Maratons+that+is+orgnized+in+the+events+', 'Dhaamraj', 'Manager', '2023-12-22 18:44:37', '2023-12-22 18:44:37'),
(20, 104, 'Testimonials_1_7561.jpg', 3, '+Taking+seamless+key+performance+indicators+offline+to+maximise+the+long+tail.+Keeping+your+eye+on+the+ball+while+performing+a+deep+dive.+Completely+synergize+resource+taxing+relationships+via+premier+niche+markets.+Professionally+cultivate+one-to-one+customer.+', 'Richard+Hartisona', 'Manager', '2023-12-22 18:44:53', '2023-12-22 18:44:53');

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
(1, 'Dharmraj Kumar', 'kumardharamraj2017@gmail.com', '8851096421 ', '123', 0, 0, '2023-10-09 10:02:04', '2023-10-10 11:09:48');

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
-- Indexes for table `grt_section_blog`
--
ALTER TABLE `grt_section_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grt_section_custom`
--
ALTER TABLE `grt_section_custom`
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
-- Indexes for table `grt_section_testimonials`
--
ALTER TABLE `grt_section_testimonials`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `grt_pages`
--
ALTER TABLE `grt_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `grt_page_section_trans`
--
ALTER TABLE `grt_page_section_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `grt_sections`
--
ALTER TABLE `grt_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `grt_section_banner`
--
ALTER TABLE `grt_section_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `grt_section_blog`
--
ALTER TABLE `grt_section_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `grt_section_custom`
--
ALTER TABLE `grt_section_custom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grt_section_events`
--
ALTER TABLE `grt_section_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `grt_section_gallery`
--
ALTER TABLE `grt_section_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `grt_section_group`
--
ALTER TABLE `grt_section_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `grt_section_testimonials`
--
ALTER TABLE `grt_section_testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
