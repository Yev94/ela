-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 29, 2022 at 06:54 PM
-- Server version: 5.7.36
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ela`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `iso` char(2) DEFAULT NULL COMMENT 'ISO',
  `name` varchar(80) DEFAULT NULL COMMENT 'Name',
  `nicename` varchar(80) DEFAULT NULL COMMENT 'Nicename',
  `nacionality` varchar(80) DEFAULT NULL COMMENT 'Nacionality',
  `iso3` char(3) DEFAULT NULL COMMENT 'ISO3',
  `numcode` smallint(6) DEFAULT NULL COMMENT 'Numcode',
  `phonecode` int(5) DEFAULT NULL COMMENT 'Phonecode',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=240 DEFAULT CHARSET=utf8 COMMENT='Countries Table';

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `iso`, `name`, `nicename`, `nacionality`, `iso3`, `numcode`, `phonecode`) VALUES
(1, 'AF', 'AFGHANISTAN', 'Afghanistan', NULL, 'AFG', 4, 93),
(2, 'AL', 'ALBANIA', 'Albania', NULL, 'ALB', 8, 355),
(3, 'DZ', 'ALGERIA', 'Algeria', NULL, 'DZA', 12, 213),
(4, 'AS', 'AMERICAN SAMOA', 'American Samoa', NULL, 'ASM', 16, 1684),
(5, 'AD', 'ANDORRA', 'Andorra', NULL, 'AND', 20, 376),
(6, 'AO', 'ANGOLA', 'Angola', NULL, 'AGO', 24, 244),
(7, 'AI', 'ANGUILLA', 'Anguilla', NULL, 'AIA', 660, 1264),
(8, 'AQ', 'ANTARCTICA', 'Antarctica', NULL, NULL, NULL, 0),
(9, 'AG', 'ANTIGUA AND BARBUDA', 'Antigua and Barbuda', NULL, 'ATG', 28, 1268),
(10, 'AR', 'ARGENTINA', 'Argentina', NULL, 'ARG', 32, 54),
(11, 'AM', 'ARMENIA', 'Armenia', NULL, 'ARM', 51, 374),
(12, 'AW', 'ARUBA', 'Aruba', NULL, 'ABW', 533, 297),
(13, 'AU', 'AUSTRALIA', 'Australia', NULL, 'AUS', 36, 61),
(14, 'AT', 'AUSTRIA', 'Austria', NULL, 'AUT', 40, 43),
(15, 'AZ', 'AZERBAIJAN', 'Azerbaijan', NULL, 'AZE', 31, 994),
(16, 'BS', 'BAHAMAS', 'Bahamas', NULL, 'BHS', 44, 1242),
(17, 'BH', 'BAHRAIN', 'Bahrain', NULL, 'BHR', 48, 973),
(18, 'BD', 'BANGLADESH', 'Bangladesh', NULL, 'BGD', 50, 880),
(19, 'BB', 'BARBADOS', 'Barbados', NULL, 'BRB', 52, 1246),
(20, 'BY', 'BELARUS', 'Belarus', NULL, 'BLR', 112, 375),
(21, 'BE', 'BELGIUM', 'Belgium', NULL, 'BEL', 56, 32),
(22, 'BZ', 'BELIZE', 'Belize', NULL, 'BLZ', 84, 501),
(23, 'BJ', 'BENIN', 'Benin', NULL, 'BEN', 204, 229),
(24, 'BM', 'BERMUDA', 'Bermuda', NULL, 'BMU', 60, 1441),
(25, 'BT', 'BHUTAN', 'Bhutan', NULL, 'BTN', 64, 975),
(26, 'BO', 'BOLIVIA', 'Bolivia', NULL, 'BOL', 68, 591),
(27, 'BA', 'BOSNIA AND HERZEGOVINA', 'Bosnia and Herzegovina', NULL, 'BIH', 70, 387),
(28, 'BW', 'BOTSWANA', 'Botswana', NULL, 'BWA', 72, 267),
(29, 'BV', 'BOUVET ISLAND', 'Bouvet Island', NULL, NULL, NULL, 0),
(30, 'BR', 'BRAZIL', 'Brazil', NULL, 'BRA', 76, 55),
(31, 'IO', 'BRITISH INDIAN OCEAN TERRITORY', 'British Indian Ocean Territory', NULL, NULL, NULL, 246),
(32, 'BN', 'BRUNEI DARUSSALAM', 'Brunei Darussalam', NULL, 'BRN', 96, 673),
(33, 'BG', 'BULGARIA', 'Bulgaria', NULL, 'BGR', 100, 359),
(34, 'BF', 'BURKINA FASO', 'Burkina Faso', NULL, 'BFA', 854, 226),
(35, 'BI', 'BURUNDI', 'Burundi', NULL, 'BDI', 108, 257),
(36, 'KH', 'CAMBODIA', 'Cambodia', NULL, 'KHM', 116, 855),
(37, 'CM', 'CAMEROON', 'Cameroon', NULL, 'CMR', 120, 237),
(38, 'CA', 'CANADA', 'Canada', NULL, 'CAN', 124, 1),
(39, 'CV', 'CAPE VERDE', 'Cape Verde', NULL, 'CPV', 132, 238),
(40, 'KY', 'CAYMAN ISLANDS', 'Cayman Islands', NULL, 'CYM', 136, 1345),
(41, 'CF', 'CENTRAL AFRICAN REPUBLIC', 'Central African Republic', NULL, 'CAF', 140, 236),
(42, 'TD', 'CHAD', 'Chad', NULL, 'TCD', 148, 235),
(43, 'CL', 'CHILE', 'Chile', NULL, 'CHL', 152, 56),
(44, 'CN', 'CHINA', 'China', NULL, 'CHN', 156, 86),
(45, 'CX', 'CHRISTMAS ISLAND', 'Christmas Island', NULL, NULL, NULL, 61),
(46, 'CC', 'COCOS (KEELING) ISLANDS', 'Cocos (Keeling) Islands', NULL, NULL, NULL, 672),
(47, 'CO', 'COLOMBIA', 'Colombia', NULL, 'COL', 170, 57),
(48, 'KM', 'COMOROS', 'Comoros', NULL, 'COM', 174, 269),
(49, 'CG', 'CONGO', 'Congo', NULL, 'COG', 178, 242),
(50, 'CD', 'CONGO, THE DEMOCRATIC REPUBLIC OF THE', 'Congo, the Democratic Republic of the', NULL, 'COD', 180, 242),
(51, 'CK', 'COOK ISLANDS', 'Cook Islands', NULL, 'COK', 184, 682),
(52, 'CR', 'COSTA RICA', 'Costa Rica', NULL, 'CRI', 188, 506),
(53, 'CI', 'COTE D\'IVOIRE', 'Cote D\'Ivoire', NULL, 'CIV', 384, 225),
(54, 'HR', 'CROATIA', 'Croatia', NULL, 'HRV', 191, 385),
(55, 'CU', 'CUBA', 'Cuba', NULL, 'CUB', 192, 53),
(56, 'CY', 'CYPRUS', 'Cyprus', NULL, 'CYP', 196, 357),
(57, 'CZ', 'CZECH REPUBLIC', 'Czech Republic', NULL, 'CZE', 203, 420),
(58, 'DK', 'DENMARK', 'Denmark', NULL, 'DNK', 208, 45),
(59, 'DJ', 'DJIBOUTI', 'Djibouti', NULL, 'DJI', 262, 253),
(60, 'DM', 'DOMINICA', 'Dominica', NULL, 'DMA', 212, 1767),
(61, 'DO', 'DOMINICAN REPUBLIC', 'Dominican Republic', NULL, 'DOM', 214, 1809),
(62, 'EC', 'ECUADOR', 'Ecuador', NULL, 'ECU', 218, 593),
(63, 'EG', 'EGYPT', 'Egypt', NULL, 'EGY', 818, 20),
(64, 'SV', 'EL SALVADOR', 'El Salvador', NULL, 'SLV', 222, 503),
(65, 'GQ', 'EQUATORIAL GUINEA', 'Equatorial Guinea', NULL, 'GNQ', 226, 240),
(66, 'ER', 'ERITREA', 'Eritrea', NULL, 'ERI', 232, 291),
(67, 'EE', 'ESTONIA', 'Estonia', NULL, 'EST', 233, 372),
(68, 'ET', 'ETHIOPIA', 'Ethiopia', NULL, 'ETH', 231, 251),
(69, 'FK', 'FALKLAND ISLANDS (MALVINAS)', 'Falkland Islands (Malvinas)', NULL, 'FLK', 238, 500),
(70, 'FO', 'FAROE ISLANDS', 'Faroe Islands', NULL, 'FRO', 234, 298),
(71, 'FJ', 'FIJI', 'Fiji', NULL, 'FJI', 242, 679),
(72, 'FI', 'FINLAND', 'Finland', NULL, 'FIN', 246, 358),
(73, 'FR', 'FRANCE', 'France', NULL, 'FRA', 250, 33),
(74, 'GF', 'FRENCH GUIANA', 'French Guiana', NULL, 'GUF', 254, 594),
(75, 'PF', 'FRENCH POLYNESIA', 'French Polynesia', NULL, 'PYF', 258, 689),
(76, 'TF', 'FRENCH SOUTHERN TERRITORIES', 'French Southern Territories', NULL, NULL, NULL, 0),
(77, 'GA', 'GABON', 'Gabon', NULL, 'GAB', 266, 241),
(78, 'GM', 'GAMBIA', 'Gambia', NULL, 'GMB', 270, 220),
(79, 'GE', 'GEORGIA', 'Georgia', NULL, 'GEO', 268, 995),
(80, 'DE', 'GERMANY', 'Germany', NULL, 'DEU', 276, 49),
(81, 'GH', 'GHANA', 'Ghana', NULL, 'GHA', 288, 233),
(82, 'GI', 'GIBRALTAR', 'Gibraltar', NULL, 'GIB', 292, 350),
(83, 'GR', 'GREECE', 'Greece', NULL, 'GRC', 300, 30),
(84, 'GL', 'GREENLAND', 'Greenland', NULL, 'GRL', 304, 299),
(85, 'GD', 'GRENADA', 'Grenada', NULL, 'GRD', 308, 1473),
(86, 'GP', 'GUADELOUPE', 'Guadeloupe', NULL, 'GLP', 312, 590),
(87, 'GU', 'GUAM', 'Guam', NULL, 'GUM', 316, 1671),
(88, 'GT', 'GUATEMALA', 'Guatemala', NULL, 'GTM', 320, 502),
(89, 'GN', 'GUINEA', 'Guinea', NULL, 'GIN', 324, 224),
(90, 'GW', 'GUINEA-BISSAU', 'Guinea-Bissau', NULL, 'GNB', 624, 245),
(91, 'GY', 'GUYANA', 'Guyana', NULL, 'GUY', 328, 592),
(92, 'HT', 'HAITI', 'Haiti', NULL, 'HTI', 332, 509),
(93, 'HM', 'HEARD ISLAND AND MCDONALD ISLANDS', 'Heard Island and Mcdonald Islands', NULL, NULL, NULL, 0),
(94, 'VA', 'HOLY SEE (VATICAN CITY STATE)', 'Holy See (Vatican City State)', NULL, 'VAT', 336, 39),
(95, 'HN', 'HONDURAS', 'Honduras', NULL, 'HND', 340, 504),
(96, 'HK', 'HONG KONG', 'Hong Kong', NULL, 'HKG', 344, 852),
(97, 'HU', 'HUNGARY', 'Hungary', NULL, 'HUN', 348, 36),
(98, 'IS', 'ICELAND', 'Iceland', NULL, 'ISL', 352, 354),
(99, 'IN', 'INDIA', 'India', NULL, 'IND', 356, 91),
(100, 'ID', 'INDONESIA', 'Indonesia', NULL, 'IDN', 360, 62),
(101, 'IR', 'IRAN, ISLAMIC REPUBLIC OF', 'Iran, Islamic Republic of', NULL, 'IRN', 364, 98),
(102, 'IQ', 'IRAQ', 'Iraq', NULL, 'IRQ', 368, 964),
(103, 'IE', 'IRELAND', 'Ireland', NULL, 'IRL', 372, 353),
(104, 'IL', 'ISRAEL', 'Israel', NULL, 'ISR', 376, 972),
(105, 'IT', 'ITALY', 'Italy', NULL, 'ITA', 380, 39),
(106, 'JM', 'JAMAICA', 'Jamaica', NULL, 'JAM', 388, 1876),
(107, 'JP', 'JAPAN', 'Japan', NULL, 'JPN', 392, 81),
(108, 'JO', 'JORDAN', 'Jordan', NULL, 'JOR', 400, 962),
(109, 'KZ', 'KAZAKHSTAN', 'Kazakhstan', NULL, 'KAZ', 398, 7),
(110, 'KE', 'KENYA', 'Kenya', NULL, 'KEN', 404, 254),
(111, 'KI', 'KIRIBATI', 'Kiribati', NULL, 'KIR', 296, 686),
(112, 'KP', 'KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF', 'Korea, Democratic People\'s Republic of', NULL, 'PRK', 408, 850),
(113, 'KR', 'KOREA, REPUBLIC OF', 'Korea, Republic of', NULL, 'KOR', 410, 82),
(114, 'KW', 'KUWAIT', 'Kuwait', NULL, 'KWT', 414, 965),
(115, 'KG', 'KYRGYZSTAN', 'Kyrgyzstan', NULL, 'KGZ', 417, 996),
(116, 'LA', 'LAO PEOPLE\'S DEMOCRATIC REPUBLIC', 'Lao People\'s Democratic Republic', NULL, 'LAO', 418, 856),
(117, 'LV', 'LATVIA', 'Latvia', NULL, 'LVA', 428, 371),
(118, 'LB', 'LEBANON', 'Lebanon', NULL, 'LBN', 422, 961),
(119, 'LS', 'LESOTHO', 'Lesotho', NULL, 'LSO', 426, 266),
(120, 'LR', 'LIBERIA', 'Liberia', NULL, 'LBR', 430, 231),
(121, 'LY', 'LIBYAN ARAB JAMAHIRIYA', 'Libyan Arab Jamahiriya', NULL, 'LBY', 434, 218),
(122, 'LI', 'LIECHTENSTEIN', 'Liechtenstein', NULL, 'LIE', 438, 423),
(123, 'LT', 'LITHUANIA', 'Lithuania', NULL, 'LTU', 440, 370),
(124, 'LU', 'LUXEMBOURG', 'Luxembourg', NULL, 'LUX', 442, 352),
(125, 'MO', 'MACAO', 'Macao', NULL, 'MAC', 446, 853),
(126, 'MK', 'MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF', 'Macedonia, the Former Yugoslav Republic of', NULL, 'MKD', 807, 389),
(127, 'MG', 'MADAGASCAR', 'Madagascar', NULL, 'MDG', 450, 261),
(128, 'MW', 'MALAWI', 'Malawi', NULL, 'MWI', 454, 265),
(129, 'MY', 'MALAYSIA', 'Malaysia', NULL, 'MYS', 458, 60),
(130, 'MV', 'MALDIVES', 'Maldives', NULL, 'MDV', 462, 960),
(131, 'ML', 'MALI', 'Mali', NULL, 'MLI', 466, 223),
(132, 'MT', 'MALTA', 'Malta', NULL, 'MLT', 470, 356),
(133, 'MH', 'MARSHALL ISLANDS', 'Marshall Islands', NULL, 'MHL', 584, 692),
(134, 'MQ', 'MARTINIQUE', 'Martinique', NULL, 'MTQ', 474, 596),
(135, 'MR', 'MAURITANIA', 'Mauritania', NULL, 'MRT', 478, 222),
(136, 'MU', 'MAURITIUS', 'Mauritius', NULL, 'MUS', 480, 230),
(137, 'YT', 'MAYOTTE', 'Mayotte', NULL, NULL, NULL, 269),
(138, 'MX', 'MEXICO', 'Mexico', NULL, 'MEX', 484, 52),
(139, 'FM', 'MICRONESIA, FEDERATED STATES OF', 'Micronesia, Federated States of', NULL, 'FSM', 583, 691),
(140, 'MD', 'MOLDOVA, REPUBLIC OF', 'Moldova, Republic of', NULL, 'MDA', 498, 373),
(141, 'MC', 'MONACO', 'Monaco', NULL, 'MCO', 492, 377),
(142, 'MN', 'MONGOLIA', 'Mongolia', NULL, 'MNG', 496, 976),
(143, 'MS', 'MONTSERRAT', 'Montserrat', NULL, 'MSR', 500, 1664),
(144, 'MA', 'MOROCCO', 'Morocco', NULL, 'MAR', 504, 212),
(145, 'MZ', 'MOZAMBIQUE', 'Mozambique', NULL, 'MOZ', 508, 258),
(146, 'MM', 'MYANMAR', 'Myanmar', NULL, 'MMR', 104, 95),
(147, 'NA', 'NAMIBIA', 'Namibia', NULL, 'NAM', 516, 264),
(148, 'NR', 'NAURU', 'Nauru', NULL, 'NRU', 520, 674),
(149, 'NP', 'NEPAL', 'Nepal', NULL, 'NPL', 524, 977),
(150, 'NL', 'NETHERLANDS', 'Netherlands', NULL, 'NLD', 528, 31),
(151, 'AN', 'NETHERLANDS ANTILLES', 'Netherlands Antilles', NULL, 'ANT', 530, 599),
(152, 'NC', 'NEW CALEDONIA', 'New Caledonia', NULL, 'NCL', 540, 687),
(153, 'NZ', 'NEW ZEALAND', 'New Zealand', NULL, 'NZL', 554, 64),
(154, 'NI', 'NICARAGUA', 'Nicaragua', NULL, 'NIC', 558, 505),
(155, 'NE', 'NIGER', 'Niger', NULL, 'NER', 562, 227),
(156, 'NG', 'NIGERIA', 'Nigeria', NULL, 'NGA', 566, 234),
(157, 'NU', 'NIUE', 'Niue', NULL, 'NIU', 570, 683),
(158, 'NF', 'NORFOLK ISLAND', 'Norfolk Island', NULL, 'NFK', 574, 672),
(159, 'MP', 'NORTHERN MARIANA ISLANDS', 'Northern Mariana Islands', NULL, 'MNP', 580, 1670),
(160, 'NO', 'NORWAY', 'Norway', NULL, 'NOR', 578, 47),
(161, 'OM', 'OMAN', 'Oman', NULL, 'OMN', 512, 968),
(162, 'PK', 'PAKISTAN', 'Pakistan', NULL, 'PAK', 586, 92),
(163, 'PW', 'PALAU', 'Palau', NULL, 'PLW', 585, 680),
(164, 'PS', 'PALESTINIAN TERRITORY, OCCUPIED', 'Palestinian Territory, Occupied', NULL, NULL, NULL, 970),
(165, 'PA', 'PANAMA', 'Panama', NULL, 'PAN', 591, 507),
(166, 'PG', 'PAPUA NEW GUINEA', 'Papua New Guinea', NULL, 'PNG', 598, 675),
(167, 'PY', 'PARAGUAY', 'Paraguay', NULL, 'PRY', 600, 595),
(168, 'PE', 'PERU', 'Peru', NULL, 'PER', 604, 51),
(169, 'PH', 'PHILIPPINES', 'Philippines', NULL, 'PHL', 608, 63),
(170, 'PN', 'PITCAIRN', 'Pitcairn', NULL, 'PCN', 612, 0),
(171, 'PL', 'POLAND', 'Poland', NULL, 'POL', 616, 48),
(172, 'PT', 'PORTUGAL', 'Portugal', NULL, 'PRT', 620, 351),
(173, 'PR', 'PUERTO RICO', 'Puerto Rico', NULL, 'PRI', 630, 1787),
(174, 'QA', 'QATAR', 'Qatar', NULL, 'QAT', 634, 974),
(175, 'RE', 'REUNION', 'Reunion', NULL, 'REU', 638, 262),
(176, 'RO', 'ROMANIA', 'Romania', NULL, 'ROM', 642, 40),
(177, 'RU', 'RUSSIAN FEDERATION', 'Russian Federation', NULL, 'RUS', 643, 70),
(178, 'RW', 'RWANDA', 'Rwanda', NULL, 'RWA', 646, 250),
(179, 'SH', 'SAINT HELENA', 'Saint Helena', NULL, 'SHN', 654, 290),
(180, 'KN', 'SAINT KITTS AND NEVIS', 'Saint Kitts and Nevis', NULL, 'KNA', 659, 1869),
(181, 'LC', 'SAINT LUCIA', 'Saint Lucia', NULL, 'LCA', 662, 1758),
(182, 'PM', 'SAINT PIERRE AND MIQUELON', 'Saint Pierre and Miquelon', NULL, 'SPM', 666, 508),
(183, 'VC', 'SAINT VINCENT AND THE GRENADINES', 'Saint Vincent and the Grenadines', NULL, 'VCT', 670, 1784),
(184, 'WS', 'SAMOA', 'Samoa', NULL, 'WSM', 882, 684),
(185, 'SM', 'SAN MARINO', 'San Marino', NULL, 'SMR', 674, 378),
(186, 'ST', 'SAO TOME AND PRINCIPE', 'Sao Tome and Principe', NULL, 'STP', 678, 239),
(187, 'SA', 'SAUDI ARABIA', 'Saudi Arabia', NULL, 'SAU', 682, 966),
(188, 'SN', 'SENEGAL', 'Senegal', NULL, 'SEN', 686, 221),
(189, 'CS', 'SERBIA AND MONTENEGRO', 'Serbia and Montenegro', NULL, NULL, NULL, 381),
(190, 'SC', 'SEYCHELLES', 'Seychelles', NULL, 'SYC', 690, 248),
(191, 'SL', 'SIERRA LEONE', 'Sierra Leone', NULL, 'SLE', 694, 232),
(192, 'SG', 'SINGAPORE', 'Singapore', NULL, 'SGP', 702, 65),
(193, 'SK', 'SLOVAKIA', 'Slovakia', NULL, 'SVK', 703, 421),
(194, 'SI', 'SLOVENIA', 'Slovenia', NULL, 'SVN', 705, 386),
(195, 'SB', 'SOLOMON ISLANDS', 'Solomon Islands', NULL, 'SLB', 90, 677),
(196, 'SO', 'SOMALIA', 'Somalia', NULL, 'SOM', 706, 252),
(197, 'ZA', 'SOUTH AFRICA', 'South Africa', NULL, 'ZAF', 710, 27),
(198, 'GS', 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS', 'South Georgia and the South Sandwich Islands', NULL, NULL, NULL, 0),
(199, 'ES', 'SPAIN', 'Spain', NULL, 'ESP', 724, 34),
(200, 'LK', 'SRI LANKA', 'Sri Lanka', NULL, 'LKA', 144, 94),
(201, 'SD', 'SUDAN', 'Sudan', NULL, 'SDN', 736, 249),
(202, 'SR', 'SURINAME', 'Suriname', NULL, 'SUR', 740, 597),
(203, 'SJ', 'SVALBARD AND JAN MAYEN', 'Svalbard and Jan Mayen', NULL, 'SJM', 744, 47),
(204, 'SZ', 'SWAZILAND', 'Swaziland', NULL, 'SWZ', 748, 268),
(205, 'SE', 'SWEDEN', 'Sweden', NULL, 'SWE', 752, 46),
(206, 'CH', 'SWITZERLAND', 'Switzerland', NULL, 'CHE', 756, 41),
(207, 'SY', 'SYRIAN ARAB REPUBLIC', 'Syrian Arab Republic', NULL, 'SYR', 760, 963),
(208, 'TW', 'TAIWAN, PROVINCE OF CHINA', 'Taiwan, Province of China', NULL, 'TWN', 158, 886),
(209, 'TJ', 'TAJIKISTAN', 'Tajikistan', NULL, 'TJK', 762, 992),
(210, 'TZ', 'TANZANIA, UNITED REPUBLIC OF', 'Tanzania, United Republic of', NULL, 'TZA', 834, 255),
(211, 'TH', 'THAILAND', 'Thailand', NULL, 'THA', 764, 66),
(212, 'TL', 'TIMOR-LESTE', 'Timor-Leste', NULL, NULL, NULL, 670),
(213, 'TG', 'TOGO', 'Togo', NULL, 'TGO', 768, 228),
(214, 'TK', 'TOKELAU', 'Tokelau', NULL, 'TKL', 772, 690),
(215, 'TO', 'TONGA', 'Tonga', NULL, 'TON', 776, 676),
(216, 'TT', 'TRINIDAD AND TOBAGO', 'Trinidad and Tobago', NULL, 'TTO', 780, 1868),
(217, 'TN', 'TUNISIA', 'Tunisia', NULL, 'TUN', 788, 216),
(218, 'TR', 'TURKEY', 'Turkey', NULL, 'TUR', 792, 90),
(219, 'TM', 'TURKMENISTAN', 'Turkmenistan', NULL, 'TKM', 795, 7370),
(220, 'TC', 'TURKS AND CAICOS ISLANDS', 'Turks and Caicos Islands', NULL, 'TCA', 796, 1649),
(221, 'TV', 'TUVALU', 'Tuvalu', NULL, 'TUV', 798, 688),
(222, 'UG', 'UGANDA', 'Uganda', NULL, 'UGA', 800, 256),
(223, 'UA', 'UKRAINE', 'Ukraine', NULL, 'UKR', 804, 380),
(224, 'AE', 'UNITED ARAB EMIRATES', 'United Arab Emirates', NULL, 'ARE', 784, 971),
(225, 'GB', 'UNITED KINGDOM', 'United Kingdom', NULL, 'GBR', 826, 44),
(226, 'US', 'UNITED STATES', 'United States', NULL, 'USA', 840, 1),
(227, 'UM', 'UNITED STATES MINOR OUTLYING ISLANDS', 'United States Minor Outlying Islands', NULL, NULL, NULL, 1),
(228, 'UY', 'URUGUAY', 'Uruguay', NULL, 'URY', 858, 598),
(229, 'UZ', 'UZBEKISTAN', 'Uzbekistan', NULL, 'UZB', 860, 998),
(230, 'VU', 'VANUATU', 'Vanuatu', NULL, 'VUT', 548, 678),
(231, 'VE', 'VENEZUELA', 'Venezuela', NULL, 'VEN', 862, 58),
(232, 'VN', 'VIET NAM', 'Viet Nam', NULL, 'VNM', 704, 84),
(233, 'VG', 'VIRGIN ISLANDS, BRITISH', 'Virgin Islands, British', NULL, 'VGB', 92, 1284),
(234, 'VI', 'VIRGIN ISLANDS, U.S.', 'Virgin Islands, U.s.', NULL, 'VIR', 850, 1340),
(235, 'WF', 'WALLIS AND FUTUNA', 'Wallis and Futuna', NULL, 'WLF', 876, 681),
(236, 'EH', 'WESTERN SAHARA', 'Western Sahara', NULL, 'ESH', 732, 212),
(237, 'YE', 'YEMEN', 'Yemen', NULL, 'YEM', 887, 967),
(238, 'ZM', 'ZAMBIA', 'Zambia', NULL, 'ZMB', 894, 260),
(239, 'ZW', 'ZIMBABWE', 'Zimbabwe', NULL, 'ZWE', 716, 263);

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

DROP TABLE IF EXISTS `email`;
CREATE TABLE IF NOT EXISTS `email` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `user_id` int(11) DEFAULT NULL COMMENT 'Foreign Key User ID',
  `email` varchar(100) DEFAULT NULL COMMENT 'Email',
  `create_time` datetime DEFAULT NULL COMMENT 'Create Time',
  `update_time` datetime DEFAULT NULL COMMENT 'Update Time',
  `deleted` tinyint(1) DEFAULT '0' COMMENT 'Indicates if the record is deleted',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Emails Table';

-- --------------------------------------------------------

--
-- Table structure for table `email_comment`
--

DROP TABLE IF EXISTS `email_comment`;
CREATE TABLE IF NOT EXISTS `email_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `email_id` int(11) DEFAULT NULL COMMENT 'Foreign Key Email ID',
  `content` text COMMENT 'Comment',
  `deleted` tinyint(1) DEFAULT '0' COMMENT 'Indicates if the record is deleted',
  `update_time` datetime DEFAULT NULL COMMENT 'Update Time',
  `create_time` datetime DEFAULT NULL COMMENT 'Create Time',
  `user_id` int(11) DEFAULT NULL COMMENT 'Foreign Key User ID who Comments',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Email Comments Table';

-- --------------------------------------------------------

--
-- Table structure for table `international_phone`
--

DROP TABLE IF EXISTS `international_phone`;
CREATE TABLE IF NOT EXISTS `international_phone` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `user_id` int(11) DEFAULT NULL COMMENT 'User Id',
  `numcode_city_id` int(11) DEFAULT NULL COMMENT 'Foreign Key Prefix Internation Number Id',
  `phone_number` varchar(50) DEFAULT NULL COMMENT 'International Number',
  `update_time` datetime DEFAULT NULL COMMENT 'Update Time',
  `create_time` datetime DEFAULT NULL COMMENT 'Create Time',
  `deleted` tinyint(1) DEFAULT '0' COMMENT 'Indicates if the record is deleted',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Internartion Phones Table';

-- --------------------------------------------------------

--
-- Table structure for table `international_phone_comment`
--

DROP TABLE IF EXISTS `international_phone_comment`;
CREATE TABLE IF NOT EXISTS `international_phone_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `international_phone_id` int(11) DEFAULT NULL COMMENT 'Foreign Key International Phone ID',
  `content` text COMMENT 'Comment',
  `deleted` tinyint(1) DEFAULT '0' COMMENT 'Indicates if the record is deleted',
  `update_time` datetime DEFAULT NULL COMMENT 'Update Time',
  `create_time` datetime DEFAULT NULL COMMENT 'Create Time',
  `user_id` int(11) DEFAULT NULL COMMENT 'Foreign Key User ID who Comments',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Internation Phone Comments Table';

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `province_id` int(11) DEFAULT NULL COMMENT 'Foreign Key Province ID',
  `locations` varchar(100) DEFAULT NULL COMMENT 'Location',
  `location_user_creator_id` int(11) DEFAULT NULL COMMENT 'Foreign Key of User who created the record',
  `update_time` datetime DEFAULT NULL COMMENT 'Last update time',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Locations Table';

-- --------------------------------------------------------

--
-- Table structure for table `mobile`
--

DROP TABLE IF EXISTS `mobile`;
CREATE TABLE IF NOT EXISTS `mobile` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `user_id` int(11) DEFAULT NULL COMMENT 'Foreign Key User Id',
  `phone_number` varchar(50) DEFAULT NULL COMMENT 'Mobile Number',
  `update_time` datetime DEFAULT NULL COMMENT 'Update Time',
  `create_time` datetime DEFAULT NULL COMMENT 'Create Time',
  `deleted` tinyint(1) DEFAULT '0' COMMENT 'Indicates if the record is deleted',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Mobiles Table';

-- --------------------------------------------------------

--
-- Table structure for table `mobile_comment`
--

DROP TABLE IF EXISTS `mobile_comment`;
CREATE TABLE IF NOT EXISTS `mobile_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `mobile_id` int(11) DEFAULT NULL COMMENT 'Foreign Key Mobile ID',
  `content` text COMMENT 'Comment',
  `deleted` tinyint(1) DEFAULT '0' COMMENT 'Indicates if the record is deleted',
  `update_time` datetime DEFAULT NULL COMMENT 'Update Time',
  `create_time` datetime DEFAULT NULL COMMENT 'Create Time',
  `user_id` int(11) DEFAULT NULL COMMENT 'Foreign Key User ID who Comments',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Mobile Comments Table';

-- --------------------------------------------------------

--
-- Table structure for table `phone`
--

DROP TABLE IF EXISTS `phone`;
CREATE TABLE IF NOT EXISTS `phone` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `user_id` int(11) DEFAULT NULL COMMENT 'Foreign Key User Id',
  `phone_number` varchar(50) DEFAULT NULL COMMENT 'Phone Number',
  `update_time` datetime DEFAULT NULL COMMENT 'Update Time',
  `create_time` datetime DEFAULT NULL COMMENT 'Create Time',
  `deleted` tinyint(1) DEFAULT '0' COMMENT 'Indicates if the record is deleted',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Phones Table';

-- --------------------------------------------------------

--
-- Table structure for table `phone_comment`
--

DROP TABLE IF EXISTS `phone_comment`;
CREATE TABLE IF NOT EXISTS `phone_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `phone_id` int(11) DEFAULT NULL COMMENT 'Foreign Key Phone ID',
  `content` text COMMENT 'Comment',
  `deleted` tinyint(1) DEFAULT '0' COMMENT 'Indicates if the record is deleted',
  `update_time` datetime DEFAULT NULL COMMENT 'Update Time',
  `create_time` datetime DEFAULT NULL COMMENT 'Create Time',
  `user_id` int(11) DEFAULT NULL COMMENT 'Foreign Key User ID who Comments',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Phone Comments Table';

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

DROP TABLE IF EXISTS `province`;
CREATE TABLE IF NOT EXISTS `province` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `country_id` int(11) DEFAULT NULL COMMENT 'Foreign Key Country ID',
  `province` varchar(100) DEFAULT NULL COMMENT 'Province',
  `province_user_creator_id` int(11) DEFAULT NULL COMMENT 'Foreign Key of User who created the record',
  `update_time` datetime DEFAULT NULL COMMENT 'Last update time',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Provinces Table';

-- --------------------------------------------------------

--
-- Table structure for table `sex`
--

DROP TABLE IF EXISTS `sex`;
CREATE TABLE IF NOT EXISTS `sex` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `sex` varchar(50) DEFAULT NULL COMMENT 'User Sex',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Sex Table';

-- --------------------------------------------------------

--
-- Table structure for table `street`
--

DROP TABLE IF EXISTS `street`;
CREATE TABLE IF NOT EXISTS `street` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `zip_code_id` int(11) DEFAULT NULL COMMENT 'Foreign Key of Zip Code',
  `street` varchar(100) DEFAULT NULL COMMENT 'Street',
  `user_creator_id` int(11) DEFAULT NULL COMMENT 'Foreign Key of User who created the record',
  `update_time` datetime DEFAULT NULL COMMENT 'Last update time',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Streets Table';

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `user_name` varchar(255) DEFAULT NULL COMMENT 'User Name',
  `last_name` varchar(255) DEFAULT NULL COMMENT 'User Last Name',
  `sex_id` int(11) DEFAULT NULL COMMENT 'Foreign Key Sex ID',
  `date_of_birth` date DEFAULT NULL COMMENT 'Date of birth',
  `nacionality_id` int(11) DEFAULT NULL COMMENT 'Foreign Key Nacionality ID',
  `identity_card` varchar(20) DEFAULT NULL COMMENT 'Identity Card',
  `user_nickname` varchar(255) DEFAULT NULL COMMENT 'User Nikname',
  `password` varchar(255) DEFAULT NULL COMMENT 'Password',
  `picture` varchar(255) DEFAULT NULL COMMENT 'Picture',
  `update_time` datetime DEFAULT NULL COMMENT 'Update Time',
  `create_time` datetime DEFAULT NULL COMMENT 'Creation Time',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Users Table';

-- --------------------------------------------------------

--
-- Table structure for table `users_comment`
--

DROP TABLE IF EXISTS `users_comment`;
CREATE TABLE IF NOT EXISTS `users_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `user_coment_id` int(11) DEFAULT NULL COMMENT 'Foreign Key User ID who Comments',
  `comment_to_user_id` int(11) DEFAULT NULL COMMENT 'Foreign Key User ID who is being Commented',
  `content` text COMMENT 'Comment',
  `deleted` tinyint(1) DEFAULT '0' COMMENT 'Indicates if the record is deleted',
  `update_time` datetime DEFAULT NULL COMMENT 'Update Time',
  `create_time` datetime DEFAULT NULL COMMENT 'Create Time',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Users Comments Table';

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

DROP TABLE IF EXISTS `user_address`;
CREATE TABLE IF NOT EXISTS `user_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `user_id` int(11) DEFAULT NULL COMMENT 'Foreign Key of User Table',
  `street_id` int(11) DEFAULT NULL COMMENT 'Foreign Key of Street Table',
  `direction` text COMMENT 'Rest of Direction Address of user in JSON format',
  `deleted` tinyint(1) DEFAULT '0' COMMENT 'Indicates if the record is deleted',
  `update_time` datetime DEFAULT NULL COMMENT 'Last update time',
  `create_time` datetime DEFAULT NULL COMMENT 'Creation time',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ZIPs Code Table';

-- --------------------------------------------------------

--
-- Table structure for table `zip_code`
--

DROP TABLE IF EXISTS `zip_code`;
CREATE TABLE IF NOT EXISTS `zip_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary Key',
  `location_id` int(11) DEFAULT NULL COMMENT 'Foreign Key Location ID',
  `zip_code` int(11) DEFAULT NULL COMMENT 'ZIP Code',
  `zip_user_creator_id` int(11) DEFAULT NULL COMMENT 'Foreign Key of User who created the record',
  `update_time` datetime DEFAULT NULL COMMENT 'Last update time',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='ZIPs Code Table';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
