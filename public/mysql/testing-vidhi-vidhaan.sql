-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2024 at 03:46 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing-vidhi-vidhaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `service_date` date NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `service_id`, `service_date`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 4, '2024-06-26', '10:10', '20:10', '2024-06-18 05:10:43', '2024-06-18 05:10:43'),
(2, 5, '2024-06-26', '10:00', '20:00', '2024-06-18 07:34:46', '2024-06-18 07:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT 0,
  `images` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_by` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `images`, `description`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Gemston', 'Gemston', 0, '1719820434_gemstoneimage1.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Active', 5, '2024-07-01 02:23:54', '2024-07-01 02:23:54'),
(2, 'Karmkand', 'Karmkand', 0, '1719820456_karamkandimage2.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Active', 5, '2024-07-01 02:24:16', '2024-07-01 02:24:16'),
(3, 'pearls', 'pearls', 1, '1719833818_gemstoneimage2.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Active', 5, '2024-07-01 02:44:36', '2024-07-01 06:06:58'),
(4, 'Rubies', 'Rubies', 1, '1719822102_gemstoneimage4.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Active', 5, '2024-07-01 02:51:42', '2024-07-01 02:51:42'),
(5, 'Diamond', 'Diamond', 1, '1719822143_gemstoneimage3.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Active', 5, '2024-07-01 02:52:23', '2024-07-01 02:52:23'),
(6, 'Puja', 'Puja', 2, '1719822182_homeserviceimg1.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Active', 5, '2024-07-01 02:53:02', '2024-07-01 02:53:02'),
(7, 'Havan', 'Havan', 2, '1719822282_homeblog2.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Active', 5, '2024-07-01 02:54:42', '2024-07-01 02:54:42'),
(8, 'Jaap', 'Jaap', 2, '1719822308_homeblog2.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Active', 5, '2024-07-01 02:55:08', '2024-07-01 02:55:08'),
(9, 'Marriage', 'Marriage', 2, '1719822326_homeserviceimg2.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Active', 5, '2024-07-01 02:55:26', '2024-07-01 02:55:26');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `mobile_number`, `message`, `created_at`, `updated_at`) VALUES
(2, 'cdcdcdc', 'nabendu.bose@yopmail.com', '1111111111', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-06-16 23:34:08', '2024-06-16 23:34:08'),
(3, 'aws', 'nabendu.bose@yopmail.com', '345678909', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-06-16 23:35:34', '2024-06-16 23:35:34'),
(4, 'rwe', 'nabendu.bose@yopmail.com', '2222222222', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-06-16 23:52:00', '2024-06-16 23:52:00'),
(5, 'Vidhi Vidhaan', 'nabendu.bose@pixelconsultancy.in', '7878787878', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2024-06-25 02:27:48', '2024-06-25 02:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `countrycode` varchar(255) NOT NULL,
  `countryname` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countrycode`, `countryname`, `code`, `created_at`, `updated_at`) VALUES
(1, 'AFG', 'Afghanistan', 'AF', NULL, NULL),
(2, 'ALA', 'Åland', 'AX', NULL, NULL),
(3, 'ALB', 'Albania', 'AL', NULL, NULL),
(4, 'DZA', 'Algeria', 'DZ', NULL, NULL),
(5, 'ASM', 'American Samoa', 'AS', NULL, NULL),
(6, 'AND', 'Andorra', 'AD', NULL, NULL),
(7, 'AGO', 'Angola', 'AO', NULL, NULL),
(8, 'AIA', 'Anguilla', 'AI', NULL, NULL),
(9, 'ATA', 'Antarctica', 'AQ', NULL, NULL),
(10, 'ATG', 'Antigua and Barbuda', 'AG', NULL, NULL),
(11, 'ARG', 'Argentina', 'AR', NULL, NULL),
(12, 'ARM', 'Armenia', 'AM', NULL, NULL),
(13, 'ABW', 'Aruba', 'AW', NULL, NULL),
(14, 'AUS', 'Australia', 'AU', NULL, NULL),
(15, 'AUT', 'Austria', 'AT', NULL, NULL),
(16, 'AZE', 'Azerbaijan', 'AZ', NULL, NULL),
(17, 'BHS', 'Bahamas', 'BS', NULL, NULL),
(18, 'BHR', 'Bahrain', 'BH', NULL, NULL),
(19, 'BGD', 'Bangladesh', 'BD', NULL, NULL),
(20, 'BRB', 'Barbados', 'BB', NULL, NULL),
(21, 'BLR', 'Belarus', 'BY', NULL, NULL),
(22, 'BEL', 'Belgium', 'BE', NULL, NULL),
(23, 'BLZ', 'Belize', 'BZ', NULL, NULL),
(24, 'BEN', 'Benin', 'BJ', NULL, NULL),
(25, 'BMU', 'Bermuda', 'BM', NULL, NULL),
(26, 'BTN', 'Bhutan', 'BT', NULL, NULL),
(27, 'BOL', 'Bolivia', 'BO', NULL, NULL),
(28, 'BES', 'Bonaire', 'BQ', NULL, NULL),
(29, 'BIH', 'Bosnia and Herzegovina', 'BA', NULL, NULL),
(30, 'BWA', 'Botswana', 'BW', NULL, NULL),
(31, 'BVT', 'Bouvet Island', 'BV', NULL, NULL),
(32, 'BRA', 'Brazil', 'BR', NULL, NULL),
(33, 'IOT', 'British Indian Ocean Territory', 'IO', NULL, NULL),
(34, 'VGB', 'British Virgin Islands', 'VG', NULL, NULL),
(35, 'BRN', 'Brunei', 'BN', NULL, NULL),
(36, 'BGR', 'Bulgaria', 'BG', NULL, NULL),
(37, 'BFA', 'Burkina Faso', 'BF', NULL, NULL),
(38, 'BDI', 'Burundi', 'BI', NULL, NULL),
(39, 'KHM', 'Cambodia', 'KH', NULL, NULL),
(40, 'CMR', 'Cameroon', 'CM', NULL, NULL),
(41, 'CAN', 'Canada', 'CA', NULL, NULL),
(42, 'CPV', 'Cape Verde', 'CV', NULL, NULL),
(43, 'CYM', 'Cayman Islands', 'KY', NULL, NULL),
(44, 'CAF', 'Central African Republic', 'CF', NULL, NULL),
(45, 'TCD', 'Chad', 'TD', NULL, NULL),
(46, 'CHL', 'Chile', 'CL', NULL, NULL),
(47, 'CHN', 'China', 'CN', NULL, NULL),
(48, 'CXR', 'Christmas Island', 'CX', NULL, NULL),
(49, 'CCK', 'Cocos [Keeling] Islands', 'CC', NULL, NULL),
(50, 'COL', 'Colombia', 'CO', NULL, NULL),
(51, 'COM', 'Comoros', 'KM', NULL, NULL),
(52, 'COK', 'Cook Islands', 'CK', NULL, NULL),
(53, 'CRI', 'Costa Rica', 'CR', NULL, NULL),
(54, 'HRV', 'Croatia', 'HR', NULL, NULL),
(55, 'CUB', 'Cuba', 'CU', NULL, NULL),
(56, 'CUW', 'Curacao', 'CW', NULL, NULL),
(57, 'CYP', 'Cyprus', 'CY', NULL, NULL),
(58, 'CZE', 'Czech Republic', 'CZ', NULL, NULL),
(59, 'COD', 'Democratic Republic of the Congo', 'CD', NULL, NULL),
(60, 'DNK', 'Denmark', 'DK', NULL, NULL),
(61, 'DJI', 'Djibouti', 'DJ', NULL, NULL),
(62, 'DMA', 'Dominica', 'DM', NULL, NULL),
(63, 'DOM', 'Dominican Republic', 'DO', NULL, NULL),
(64, 'TLS', 'East Timor', 'TL', NULL, NULL),
(65, 'ECU', 'Ecuador', 'EC', NULL, NULL),
(66, 'EGY', 'Egypt', 'EG', NULL, NULL),
(67, 'SLV', 'El Salvador', 'SV', NULL, NULL),
(68, 'GNQ', 'Equatorial Guinea', 'GQ', NULL, NULL),
(69, 'ERI', 'Eritrea', 'ER', NULL, NULL),
(70, 'EST', 'Estonia', 'EE', NULL, NULL),
(71, 'ETH', 'Ethiopia', 'ET', NULL, NULL),
(72, 'FLK', 'Falkland Islands', 'FK', NULL, NULL),
(73, 'FRO', 'Faroe Islands', 'FO', NULL, NULL),
(74, 'FJI', 'Fiji', 'FJ', NULL, NULL),
(75, 'FIN', 'Finland', 'FI', NULL, NULL),
(76, 'FRA', 'France', 'FR', NULL, NULL),
(77, 'GUF', 'French Guiana', 'GF', NULL, NULL),
(78, 'PYF', 'French Polynesia', 'PF', NULL, NULL),
(79, 'ATF', 'French Southern Territories', 'TF', NULL, NULL),
(80, 'GAB', 'Gabon', 'GA', NULL, NULL),
(81, 'GMB', 'Gambia', 'GM', NULL, NULL),
(82, 'GEO', 'Georgia', 'GE', NULL, NULL),
(83, 'DEU', 'Germany', 'DE', NULL, NULL),
(84, 'GHA', 'Ghana', 'GH', NULL, NULL),
(85, 'GIB', 'Gibraltar', 'GI', NULL, NULL),
(86, 'GRC', 'Greece', 'GR', NULL, NULL),
(87, 'GRL', 'Greenland', 'GL', NULL, NULL),
(88, 'GRD', 'Grenada', 'GD', NULL, NULL),
(89, 'GLP', 'Guadeloupe', 'GP', NULL, NULL),
(90, 'GUM', 'Guam', 'GU', NULL, NULL),
(91, 'GTM', 'Guatemala', 'GT', NULL, NULL),
(92, 'GGY', 'Guernsey', 'GG', NULL, NULL),
(93, 'GIN', 'Guinea', 'GN', NULL, NULL),
(94, 'GNB', 'Guinea-Bissau', 'GW', NULL, NULL),
(95, 'GUY', 'Guyana', 'GY', NULL, NULL),
(96, 'HTI', 'Haiti', 'HT', NULL, NULL),
(97, 'HMD', 'Heard Island and McDonald Islands', 'HM', NULL, NULL),
(98, 'HND', 'Honduras', 'HN', NULL, NULL),
(99, 'HKG', 'Hong Kong', 'HK', NULL, NULL),
(100, 'HUN', 'Hungary', 'HU', NULL, NULL),
(101, 'ISL', 'Iceland', 'IS', NULL, NULL),
(102, 'IND', 'India', 'IN', NULL, NULL),
(103, 'IDN', 'Indonesia', 'ID', NULL, NULL),
(104, 'IRN', 'Iran', 'IR', NULL, NULL),
(105, 'IRQ', 'Iraq', 'IQ', NULL, NULL),
(106, 'IRL', 'Ireland', 'IE', NULL, NULL),
(107, 'IMN', 'Isle of Man', 'IM', NULL, NULL),
(108, 'ISR', 'Israel', 'IL', NULL, NULL),
(109, 'ITA', 'Italy', 'IT', NULL, NULL),
(110, 'CIV', 'Ivory Coast', 'CI', NULL, NULL),
(111, 'JAM', 'Jamaica', 'JM', NULL, NULL),
(112, 'JPN', 'Japan', 'JP', NULL, NULL),
(113, 'JEY', 'Jersey', 'JE', NULL, NULL),
(114, 'JOR', 'Jordan', 'JO', NULL, NULL),
(115, 'KAZ', 'Kazakhstan', 'KZ', NULL, NULL),
(116, 'KEN', 'Kenya', 'KE', NULL, NULL),
(117, 'KIR', 'Kiribati', 'KI', NULL, NULL),
(118, 'XKX', 'Kosovo', 'XK', NULL, NULL),
(119, 'KWT', 'Kuwait', 'KW', NULL, NULL),
(120, 'KGZ', 'Kyrgyzstan', 'KG', NULL, NULL),
(121, 'LAO', 'Laos', 'LA', NULL, NULL),
(122, 'LVA', 'Latvia', 'LV', NULL, NULL),
(123, 'LBN', 'Lebanon', 'LB', NULL, NULL),
(124, 'LSO', 'Lesotho', 'LS', NULL, NULL),
(125, 'LBR', 'Liberia', 'LR', NULL, NULL),
(126, 'LBY', 'Libya', 'LY', NULL, NULL),
(127, 'LIE', 'Liechtenstein', 'LI', NULL, NULL),
(128, 'LTU', 'Lithuania', 'LT', NULL, NULL),
(129, 'LUX', 'Luxembourg', 'LU', NULL, NULL),
(130, 'MAC', 'Macao', 'MO', NULL, NULL),
(131, 'MKD', 'Macedonia', 'MK', NULL, NULL),
(132, 'MDG', 'Madagascar', 'MG', NULL, NULL),
(133, 'MWI', 'Malawi', 'MW', NULL, NULL),
(134, 'MYS', 'Malaysia', 'MY', NULL, NULL),
(135, 'MDV', 'Maldives', 'MV', NULL, NULL),
(136, 'MLI', 'Mali', 'ML', NULL, NULL),
(137, 'MLT', 'Malta', 'MT', NULL, NULL),
(138, 'MHL', 'Marshall Islands', 'MH', NULL, NULL),
(139, 'MTQ', 'Martinique', 'MQ', NULL, NULL),
(140, 'MRT', 'Mauritania', 'MR', NULL, NULL),
(141, 'MUS', 'Mauritius', 'MU', NULL, NULL),
(142, 'MYT', 'Mayotte', 'YT', NULL, NULL),
(143, 'MEX', 'Mexico', 'MX', NULL, NULL),
(144, 'FSM', 'Micronesia', 'FM', NULL, NULL),
(145, 'MDA', 'Moldova', 'MD', NULL, NULL),
(146, 'MCO', 'Monaco', 'MC', NULL, NULL),
(147, 'MNG', 'Mongolia', 'MN', NULL, NULL),
(148, 'MNE', 'Montenegro', 'ME', NULL, NULL),
(149, 'MSR', 'Montserrat', 'MS', NULL, NULL),
(150, 'MAR', 'Morocco', 'MA', NULL, NULL),
(151, 'MOZ', 'Mozambique', 'MZ', NULL, NULL),
(152, 'MMR', 'Myanmar [Burma]', 'MM', NULL, NULL),
(153, 'NAM', 'Namibia', 'NA', NULL, NULL),
(154, 'NRU', 'Nauru', 'NR', NULL, NULL),
(155, 'NPL', 'Nepal', 'NP', NULL, NULL),
(156, 'NLD', 'Netherlands', 'NL', NULL, NULL),
(157, 'NCL', 'New Caledonia', 'NC', NULL, NULL),
(158, 'NZL', 'New Zealand', 'NZ', NULL, NULL),
(159, 'NIC', 'Nicaragua', 'NI', NULL, NULL),
(160, 'NER', 'Niger', 'NE', NULL, NULL),
(161, 'NGA', 'Nigeria', 'NG', NULL, NULL),
(162, 'NIU', 'Niue', 'NU', NULL, NULL),
(163, 'NFK', 'Norfolk Island', 'NF', NULL, NULL),
(164, 'PRK', 'North Korea', 'KP', NULL, NULL),
(165, 'MNP', 'Northern Mariana Islands', 'MP', NULL, NULL),
(166, 'NOR', 'Norway', 'NO', NULL, NULL),
(167, 'OMN', 'Oman', 'OM', NULL, NULL),
(168, 'PAK', 'Pakistan', 'PK', NULL, NULL),
(169, 'PLW', 'Palau', 'PW', NULL, NULL),
(170, 'PSE', 'Palestine', 'PS', NULL, NULL),
(171, 'PAN', 'Panama', 'PA', NULL, NULL),
(172, 'PNG', 'Papua New Guinea', 'PG', NULL, NULL),
(173, 'PRY', 'Paraguay', 'PY', NULL, NULL),
(174, 'PER', 'Peru', 'PE', NULL, NULL),
(175, 'PHL', 'Philippines', 'PH', NULL, NULL),
(176, 'PCN', 'Pitcairn Islands', 'PN', NULL, NULL),
(177, 'POL', 'Poland', 'PL', NULL, NULL),
(178, 'PRT', 'Portugal', 'PT', NULL, NULL),
(179, 'PRI', 'Puerto Rico', 'PR', NULL, NULL),
(180, 'QAT', 'Qatar', 'QA', NULL, NULL),
(181, 'COG', 'Republic of the Congo', 'CG', NULL, NULL),
(182, 'REU', 'Réunion', 'RE', NULL, NULL),
(183, 'ROU', 'Romania', 'RO', NULL, NULL),
(184, 'RUS', 'Russia', 'RU', NULL, NULL),
(185, 'RWA', 'Rwanda', 'RW', NULL, NULL),
(186, 'BLM', 'Saint Barthélemy', 'BL', NULL, NULL),
(187, 'SHN', 'Saint Helena', 'SH', NULL, NULL),
(188, 'KNA', 'Saint Kitts and Nevis', 'KN', NULL, NULL),
(189, 'LCA', 'Saint Lucia', 'LC', NULL, NULL),
(190, 'MAF', 'Saint Martin', 'MF', NULL, NULL),
(191, 'SPM', 'Saint Pierre and Miquelon', 'PM', NULL, NULL),
(192, 'VCT', 'Saint Vincent and the Grenadines', 'VC', NULL, NULL),
(193, 'WSM', 'Samoa', 'WS', NULL, NULL),
(194, 'SMR', 'San Marino', 'SM', NULL, NULL),
(195, 'STP', 'São Tomé and Príncipe', 'ST', NULL, NULL),
(196, 'SAU', 'Saudi Arabia', 'SA', NULL, NULL),
(197, 'SEN', 'Senegal', 'SN', NULL, NULL),
(198, 'SRB', 'Serbia', 'RS', NULL, NULL),
(199, 'SYC', 'Seychelles', 'SC', NULL, NULL),
(200, 'SLE', 'Sierra Leone', 'SL', NULL, NULL),
(201, 'SGP', 'Singapore', 'SG', NULL, NULL),
(202, 'SXM', 'Sint Maarten', 'SX', NULL, NULL),
(203, 'SVK', 'Slovakia', 'SK', NULL, NULL),
(204, 'SVN', 'Slovenia', 'SI', NULL, NULL),
(205, 'SLB', 'Solomon Islands', 'SB', NULL, NULL),
(206, 'SOM', 'Somalia', 'SO', NULL, NULL),
(207, 'ZAF', 'South Africa', 'ZA', NULL, NULL),
(208, 'SGS', 'South Georgia and the South Sandwich Islands', 'GS', NULL, NULL),
(209, 'KOR', 'South Korea', 'KR', NULL, NULL),
(210, 'SSD', 'South Sudan', 'SS', NULL, NULL),
(211, 'ESP', 'Spain', 'ES', NULL, NULL),
(212, 'LKA', 'Sri Lanka', 'LK', NULL, NULL),
(213, 'SDN', 'Sudan', 'SD', NULL, NULL),
(214, 'SUR', 'Suriname', 'SR', NULL, NULL),
(215, 'SJM', 'Svalbard and Jan Mayen', 'SJ', NULL, NULL),
(216, 'SWZ', 'Swaziland', 'SZ', NULL, NULL),
(217, 'SWE', 'Sweden', 'SE', NULL, NULL),
(218, 'CHE', 'Switzerland', 'CH', NULL, NULL),
(219, 'SYR', 'Syria', 'SY', NULL, NULL),
(220, 'TWN', 'Taiwan', 'TW', NULL, NULL),
(221, 'TJK', 'Tajikistan', 'TJ', NULL, NULL),
(222, 'TZA', 'Tanzania', 'TZ', NULL, NULL),
(223, 'THA', 'Thailand', 'TH', NULL, NULL),
(224, 'TGO', 'Togo', 'TG', NULL, NULL),
(225, 'TKL', 'Tokelau', 'TK', NULL, NULL),
(226, 'TON', 'Tonga', 'TO', NULL, NULL),
(227, 'TTO', 'Trinidad and Tobago', 'TT', NULL, NULL),
(228, 'TUN', 'Tunisia', 'TN', NULL, NULL),
(229, 'TUR', 'Turkey', 'TR', NULL, NULL),
(230, 'TKM', 'Turkmenistan', 'TM', NULL, NULL),
(231, 'TCA', 'Turks and Caicos Islands', 'TC', NULL, NULL),
(232, 'TUV', 'Tuvalu', 'TV', NULL, NULL),
(233, 'UMI', 'U.S. Minor Outlying Islands', 'UM', NULL, NULL),
(234, 'VIR', 'U.S. Virgin Islands', 'VI', NULL, NULL),
(235, 'UGA', 'Uganda', 'UG', NULL, NULL),
(236, 'UKR', 'Ukraine', 'UA', NULL, NULL),
(237, 'ARE', 'United Arab Emirates', 'AE', NULL, NULL),
(238, 'GBR', 'United Kingdom', 'GB', NULL, NULL),
(239, 'USA', 'United States', 'US', NULL, NULL),
(240, 'URY', 'Uruguay', 'UY', NULL, NULL),
(241, 'UZB', 'Uzbekistan', 'UZ', NULL, NULL),
(242, 'VUT', 'Vanuatu', 'VU', NULL, NULL),
(243, 'VAT', 'Vatican City', 'VA', NULL, NULL),
(244, 'VEN', 'Venezuela', 'VE', NULL, NULL),
(245, 'VNM', 'Vietnam', 'VN', NULL, NULL),
(246, 'WLF', 'Wallis and Futuna', 'WF', NULL, NULL),
(247, 'ESH', 'Western Sahara', 'EH', NULL, NULL),
(248, 'YEM', 'Yemen', 'YE', NULL, NULL),
(249, 'ZMB', 'Zambia', 'ZM', NULL, NULL),
(250, 'ZWE', 'Zimbabwe', 'ZW', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `template_category` enum('Booking','Customer','Admin','Service','Global') NOT NULL,
  `template_code` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email_body` text NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `name`, `template_category`, `template_code`, `subject`, `email_body`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Customer Contact Template', 'Global', 'Template 1', 'Vidhi Vidhaan ::  Contact', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"padding:15px;\">\r\n			<p style=\"color:#414141; font-size:15px; line-height:30px;\">Dear [FULLNAME],<br />\r\n			Thanks for contacting us. We will contact you soon.</p>\r\n\r\n			<p style=\"color:#414141; font-size:15px; line-height:30px;\">Thank you and welcome to Vidhi Vidhaan.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, '2024-06-11 03:58:29', '2024-06-11 03:58:29'),
(2, 'Customer Registration Template From Admin', 'Admin', 'Template 2', 'Vidhi Vidhaan ::  Account Registration', '\n\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\n	<tbody>\n		<tr>\n			<td style=\"padding:15px;\">\n			<p style=\"color:#414141; font-size:15px; line-height:30px;\">Dear [FULLNAME],<br />\n			Your account has been successfully created on Vidhi Vidhaan.</p>\n\n			<p style=\"color:#414141; font-size:15px; line-height:30px;\">Your username is:&nbsp;<strong>[NAME]</strong></p>\n\n			<p style=\"color:#414141; font-size:15px; line-height:30px;\">You can now login&nbsp;by going directly to the Vidhi Vidhaan homepage at: www.vidhi-vidhaan.test</p>\n\n			<p style=\"color:#414141; font-size:15px; line-height:30px;\">Please remember your username in case you forget your password.</p>\n\n			<p style=\"color:#414141; font-size:15px; line-height:30px;\">Thank you and welcome to Vidhi Vidhaan.</p>\n			</td>\n		</tr>\n	</tbody>\n</table>', 1, '2024-06-13 05:40:49', '2024-06-13 05:40:49'),
(3, 'Registration Template With Verification Link and verify code', 'Customer', 'Template 3', 'Vidhi Vidhaan :: Account Verification', '\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n	<tbody>\r\n	    <tr>\r\n            <td style=\" padding:10px; width: 100%;padding-bottom: 30px;border-bottom: 1px solid #01bdd6;\" colspan=\"2\">\r\n                <img style=\"border: 3px solid #01bdd6;\r\n                padding: 7px;\r\n                width: 120px;\r\n                height: 120px;\r\n                border-radius: 50%;\r\n                overflow: hidden;\r\n                margin-right: 25px;object-fit: cover;float: left;\" src=\"https://administrator.altabooking.com/uploads/limo/pdf/booking-confirmation-logo.png\" />\r\n                <div>\r\n                    <h4 style=\"font-size: 22px;\r\n                    font-weight: 700;\r\n                    padding-bottom:0px;color: #000;margin-bottom: 0;\">Account Verification</h4>\r\n                    <p style=\"font-size: 14px;color: #000;\">Thank you for choosing Vidhi Vidhaan.</p>\r\n\r\n                </div>\r\n            </td>\r\n        </tr>\r\n	\r\n	</tbody>\r\n</table>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"padding:15px;\">\r\n			<p style=\"color:#414141; font-size:15px; line-height:30px;\">Dear [FULLNAME],<br />\r\n			You have successfully created an account on Vidhi Vidhaan.</p>\r\n\r\n			<p style=\"color:#414141; font-size:15px; line-height:30px;\">Please click the activation link below to finalise your account registration.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table style=\"border:solid 1px #ccc;\" width=\"100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"padding:15px; border-bottom:solid 1px #ccc;\">\r\n			<h4 style=\"margin-top:0; margin-bottom:0\">Account Information</h4>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:30%; padding-top:15px; padding-left:15px; padding-bottom:15px; border-bottom:solid 1px #ccc;\" valign=\"top\">\r\n			<p style=\"margin:0;\">Name</p>\r\n			</td>\r\n			<td style=\"width:70%; text-align:right; padding-top:15px; padding-right:15px; padding-bottom:15px; border-bottom:solid 1px #ccc;\" valign=\"top\">\r\n			<p style=\"margin:0;\"><strong>[NAME]</strong></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"width:30%; padding-top:15px; padding-left:15px; padding-bottom:15px;\" valign=\"top\">\r\n			<p style=\"margin:0;\">Activation Link</p>\r\n			</td>\r\n			<td style=\"width:70%; text-align:right; padding-top:15px; padding-right:15px; padding-bottom:15px;\" valign=\"top\">\r\n			<p style=\"margin:0;\"><strong>[LINK]</strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, '2024-06-25 11:00:18', '2024-06-25 11:00:18'),
(4, 'Provider Status Template', 'Global', 'Template 4', 'Vidhi Vidhaan :: Provider Account Status', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n	<tbody>\r\n	    <tr>\r\n            <td style=\" padding:10px; width: 100%;padding-bottom: 30px;border-bottom: 1px solid #01bdd6;\" colspan=\"2\">\r\n                <img style=\"border: 3px solid #01bdd6;\r\n                padding: 7px;\r\n                width: 120px;\r\n                height: 120px;\r\n                border-radius: 50%;\r\n                overflow: hidden;\r\n                margin-right: 25px;object-fit: cover;float: left;\" src=\"https://administrator.altabooking.com/uploads/limo/pdf/booking-confirmation-logo.png\" />\r\n                <div>\r\n                    <h4 style=\"font-size: 22px;\r\n                    font-weight: 700;\r\n                    padding-bottom:0px;color: #000;margin-bottom: 0;\">Account Verification</h4>\r\n                    <p style=\"font-size: 14px;color: #000;\">Thank you for choosing Vidhi Vidhaan.</p>\r\n\r\n                </div>\r\n            </td>\r\n        </tr>\r\n	\r\n	</tbody>\r\n</table>\r\n\r\n<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"padding:15px;\">\r\n			<p style=\"color:#414141; font-size:15px; line-height:30px;\">Dear [FULLNAME],<br />\r\n			Thanks for contacting us. Your Account is [STATUS]</p>\r\n\r\n			<p style=\"color:#414141; font-size:15px; line-height:30px;\">Thank you and welcome to Vidhi Vidhaan.</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `gemstones`
--

CREATE TABLE `gemstones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `images` varchar(255) NOT NULL,
  `weight` double(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gemstones`
--

INSERT INTO `gemstones` (`id`, `category_id`, `name`, `description`, `images`, `weight`, `price`, `status`, `created_at`, `updated_at`) VALUES
(6, 3, 'Akoya Pearls', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1719822808_gemstoneimage2.png', 1.20, 4000.00, 'Active', '2024-07-01 03:03:28', '2024-07-01 03:03:28'),
(7, 3, 'South Sea Pearls', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1719822891_gemstoneimage2.png', 0.85, 3200.00, 'Active', '2024-07-01 03:04:51', '2024-07-01 03:04:51'),
(8, 3, 'Baroque Pearls', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1719822936_gemstoneimage2.png', 2.50, 8500.00, 'Active', '2024-07-01 03:05:36', '2024-07-01 03:05:36'),
(9, 4, 'Burmese Rubies', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1719822987_gemstoneimage4.png', 0.98, 53000.00, 'Active', '2024-07-01 03:06:27', '2024-07-01 03:06:27'),
(10, 4, 'Mozambique Rubies', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1719823034_gemstoneimage4.png', 1.50, 69000.00, 'Active', '2024-07-01 03:07:14', '2024-07-01 03:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `karmkands`
--

CREATE TABLE `karmkands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_31_062625_create_roles_table', 1),
(6, '2024_06_06_071126_create_products_table', 1),
(7, '2024_06_11_043324_create_services_table', 1),
(9, '2024_06_11_075111_create_contacts_table', 3),
(10, '2024_06_11_084232_create_email_templates_table', 3),
(11, '2024_06_14_052043_create_countries_table', 3),
(13, '2024_06_18_102306_create_appointments_table', 4),
(14, '2024_06_25_091253_create_user_codes_table', 5),
(15, '2014_10_12_000000_create_users_table', 6),
(19, '2024_06_25_103155_create_categories_table', 7),
(20, '2024_06_27_061108_create_gemstones_table', 7),
(21, '2024_07_01_070150_create_karmkands_table', 8),
(22, '2024_07_01_130500_create_carts_table', 8),
(23, '2024_07_02_120006_create_user_details_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('rakesh.mondal@pixelconsultancy.in', 'MLZ6nyOjwewk6KNaep2it2i9GNe5qn5v6TS8hhK2FxdP6Rm3qC3D73j3HDx4rHL7', '2024-06-14 02:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `images` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `images`, `status`, `created_at`, `updated_at`) VALUES
(7, 'test1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 200.00, '1718709018_karamkandimage6.png', 'Active', '2024-06-18 05:40:18', '2024-06-18 05:40:18'),
(8, 'test2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 300.00, '1718709033_karamkandimage5.png', 'Active', '2024-06-18 05:40:33', '2024-06-18 05:40:33'),
(9, 'test3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 350.00, '1718709046_karamkandimage4.png', 'Active', '2024-06-18 05:40:46', '2024-06-18 05:40:46'),
(10, 'test4', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 380.00, '1718709066_karamkandimage3.png', 'Active', '2024-06-18 05:41:06', '2024-06-18 05:41:06'),
(11, 'test5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 420.00, '1718709085_karamkandimage2.png', 'Active', '2024-06-18 05:41:25', '2024-06-18 05:41:25'),
(12, 'test6', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 500.00, '1718711340_karamkandimage2.png', 'Active', '2024-06-18 06:19:00', '2024-06-18 06:19:00'),
(13, 'test 7', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 650.00, '1719214699_karamkandimage3.png', 'Active', '2024-06-18 06:19:20', '2024-06-24 02:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_by` bigint(20) NOT NULL,
  `updated_by` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Superadmin', 'Active', 1, 1, '2016-08-25 13:00:00', '2018-06-13 15:52:31'),
(2, 'Admin', 'Active', 1, 1, '2016-09-01 07:00:00', '2018-06-13 15:52:40'),
(3, 'Customers', 'Active', 1, 0, '2017-02-14 20:21:34', '2018-06-13 23:28:49'),
(4, 'Provider', 'Active', 1, 0, '2024-06-26 10:03:07', '2024-06-26 10:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `images` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `description`, `price`, `images`, `created_at`, `updated_at`) VALUES
(4, 'Service 1', 'tes-tet-s-te--vhcf-hbfhvb-v-fv', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1200.00, '1718707243_astrologerimg4.png', '2024-06-18 05:10:43', '2024-06-18 05:10:43'),
(5, 'Service -2', 'Aditya-Basu', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 2000.00, '1718715886_astrologerimg2.png', '2024-06-18 07:34:46', '2024-06-18 07:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dial_code` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(255) DEFAULT NULL,
  `registration_token` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Active','Inactive','Approved','Reject','Pending') NOT NULL DEFAULT 'Inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `first_name`, `last_name`, `email`, `dial_code`, `mobile_number`, `registration_token`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 3, 'Nabendu', 'Bose', 'nabendu.bose@pixelconsultancy.in', NULL, '+919875645785', NULL, '2024-06-26 01:05:06', '$2y$10$kTHS4wxMjbOi271usz103uS4g.MywlJrKX1h/rwb6elv.Lhhy1s7K', 'Active', NULL, '2024-06-26 00:40:05', '2024-06-26 01:05:06'),
(4, 3, 'Aditya', 'Basu', 'nabendu.bose@yopmail.com', NULL, '+917854125478', NULL, '2024-06-26 01:05:06', '$2y$10$7sUBTVL68eBnUlBRU.d4c.1kHgc7hDCAW8iIMqBjpHGe/dWjQDESW', 'Active', NULL, '2024-06-26 00:45:22', '2024-06-26 01:07:59'),
(5, 1, 'Nabendu', 'Admin', 'nabendu.bose2@pixelconsultancy.in', NULL, NULL, NULL, NULL, '$2y$10$jGOP7D49LxMkRLpRw/ETdeihY08HnLGAkqk5gdIcUKUxL4smnYyAq', 'Active', NULL, '2024-06-26 01:12:19', '2024-06-26 01:12:19'),
(12, 4, 'Astrologer', 'Test', 'provideraltabookingtest2@yopmail.com', NULL, '+917896547896', NULL, '2024-06-26 23:41:25', '$2y$10$WJNegC0Zuu4eIK433OLDPuD0/YTvV4PvbiQbuD94O0RCIQVakTeXO', 'Approved', NULL, '2024-06-26 23:40:39', '2024-06-26 23:41:25'),
(14, 4, 'Rakesh', 'Mondal', 'rakeshmondal@yopmail.com', NULL, '+9178787878787', NULL, '2024-07-01 06:37:34', '$2y$10$4ht1xgDFx.E1e4wXcx.dwOv7jlxlhIXZkyRywz8NYfmVX8..ZZ8Gq', 'Approved', NULL, '2024-07-01 06:36:45', '2024-07-01 06:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_codes`
--

CREATE TABLE `user_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` enum('Registration','Profile','Contact','Forget','Payout','Provider Profile Authentication','Admin') NOT NULL DEFAULT 'Registration',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_codes`
--

INSERT INTO `user_codes` (`id`, `user_id`, `code`, `type`, `created_at`, `updated_at`) VALUES
(1, 3, '4845', 'Registration', '2024-06-26 00:40:05', '2024-06-26 00:40:05'),
(2, 4, '8386', 'Registration', '2024-06-26 00:45:22', '2024-06-26 00:45:22'),
(9, 12, '5672', 'Registration', '2024-06-26 23:40:39', '2024-06-26 23:40:39'),
(11, 14, '6622', 'Registration', '2024-07-01 06:36:45', '2024-07-01 06:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `images` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `education` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `state_id` bigint(20) DEFAULT NULL,
  `city_id` bigint(20) DEFAULT NULL,
  `post_code` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `images`, `dob`, `education`, `experience`, `country_id`, `state_id`, `city_id`, `post_code`, `address`, `created_at`, `updated_at`) VALUES
(1, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 12, '1719927484_astrologerimage2.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-07-02 08:08:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_service_id_foreign` (`service_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gemstones`
--
ALTER TABLE `gemstones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gemstones_category_id_foreign` (`category_id`);

--
-- Indexes for table `karmkands`
--
ALTER TABLE `karmkands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karmkands_category_id_foreign` (`category_id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_codes`
--
ALTER TABLE `user_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_codes_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_details_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gemstones`
--
ALTER TABLE `gemstones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `karmkands`
--
ALTER TABLE `karmkands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_codes`
--
ALTER TABLE `user_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gemstones`
--
ALTER TABLE `gemstones`
  ADD CONSTRAINT `gemstones_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `karmkands`
--
ALTER TABLE `karmkands`
  ADD CONSTRAINT `karmkands_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_codes`
--
ALTER TABLE `user_codes`
  ADD CONSTRAINT `user_codes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
