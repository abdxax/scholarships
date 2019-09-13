-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 سبتمبر 2019 الساعة 22:43
-- إصدار الخادم: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scholarships`
--

-- --------------------------------------------------------

--
-- بنية الجدول `address`
--

CREATE TABLE `address` (
  `id_gov` int(11) NOT NULL,
  `op1` text COLLATE utf8_unicode_ci NOT NULL,
  `phone1` text COLLATE utf8_unicode_ci NOT NULL,
  `op2` text COLLATE utf8_unicode_ci NOT NULL,
  `phone2` text COLLATE utf8_unicode_ci NOT NULL,
  `country_mom` text COLLATE utf8_unicode_ci NOT NULL,
  `country2` text COLLATE utf8_unicode_ci NOT NULL,
  `city_mom` text COLLATE utf8_unicode_ci NOT NULL,
  `city2` text COLLATE utf8_unicode_ci NOT NULL,
  `adds_mom` text COLLATE utf8_unicode_ci NOT NULL,
  `adds2` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `address`
--

INSERT INTO `address` (`id_gov`, `op1`, `phone1`, `op2`, `phone2`, `country_mom`, `country2`, `city_mom`, `city2`, `adds_mom`, `adds2`) VALUES
(1112, '43543', '45645645', '546', '6546456', 'dfg', 'dfgd', 'dfg', 'dfg', 'dgf', 'dgdf'),
(1094906623, '345', '435345345', '453', '43534543', 'sdfsd', 'sdfsd', 'sdfsd', 'sfs', 'sdfsd', 'sdf');

-- --------------------------------------------------------

--
-- بنية الجدول `countries`
--

CREATE TABLE `countries` (
  `id_count` int(11) NOT NULL,
  `code` varchar(2) NOT NULL,
  `name` varchar(100) NOT NULL,
  `en_name` varchar(100) NOT NULL,
  `ar_name` varchar(100) NOT NULL,
  `calling_code` varchar(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `countries`
--

INSERT INTO `countries` (`id_count`, `code`, `name`, `en_name`, `ar_name`, `calling_code`) VALUES
(1, 'AX', 'Åland‬‏', 'Åland Islands', 'جزر أولان ', '358'),
(2, 'AL', 'Shqipëria‬‏', 'Albania', 'ألبانيا ', '355'),
(3, 'DZ', 'الجزائر', 'Algeria', 'الجزائر', '213'),
(4, 'AS', 'American Samoa‬‏', 'American Samoa', 'ساموا الأمريكية ', '1 684'),
(5, 'AD', 'Andorra‬‏', 'Andorra', 'أندورا ', '376'),
(6, 'AO', 'Angola‬‏', 'Angola', 'أنغولا ', '244'),
(7, 'AI', 'Anguilla‬‏', 'Anguilla', 'أنغويلا ', '1 264'),
(8, 'AQ', 'Antarctica‬‏', 'Antarctica', 'أنتاركتيكا ', '672'),
(9, 'AG', 'Antigua and Barbuda‬‏', 'Antigua and Barbuda', 'أنتيغوا وبربودا ', '1 268'),
(10, 'AR', 'Argentina‬‏', 'Argentina', 'الأرجنتين ', '54'),
(11, 'AM', 'Հայաստան‬‏', 'Armenia', 'أرمينيا ', '374'),
(12, 'AW', 'Aruba‬‏', 'Aruba', 'آروبا ', '297'),
(13, 'AU', 'Australia‬‏', 'Australia', 'أستراليا ', '61'),
(14, 'AT', 'Österreich‬‏', 'Austria', 'النمسا ', '43'),
(15, 'AZ', 'Azərbaycan‬‏', 'Azerbaijan', 'أذربيجان ', '994'),
(16, 'BS', 'Bahamas‬‏', 'Bahamas', 'الباهاما ', '1 242'),
(17, 'BH', 'البحرين', 'Bahrain', 'البحرين', '973'),
(18, 'BD', 'বাংলাদেশ‬‏', 'Bangladesh', 'بنجلاديش ', '880'),
(19, 'BB', 'Barbados‬‏', 'Barbados', 'بربادوس ', '1 246'),
(20, 'BY', 'Беларусь‬‏', 'Belarus', 'روسيا البيضاء ', '375'),
(21, 'BE', 'België‬‏', 'Belgium', 'بلجيكا ', '32'),
(22, 'BZ', 'Belize‬‏', 'Belize', 'بليز ', '501'),
(23, 'BJ', 'Bénin‬‏', 'Benin', 'بنين ', '229'),
(24, 'BM', 'Bermuda‬‏', 'Bermuda', 'برمودا ', '1 441'),
(25, 'BT', 'འབྲུག‬‏', 'Bhutan', 'بوتان ', '975'),
(26, 'BO', 'Bolivia‬‏', 'Bolivia', 'بوليفيا ', '591'),
(27, 'BQ', 'Caribbean Netherlands‬‏', 'Caribbean Netherlands', 'هولندا الكاريبية ', '599'),
(28, 'BA', 'Босна и Херцеговина‬‏', 'Bosnia and Herzegovina', 'البوسنة والهرسك ', '387'),
(29, 'BW', 'Botswana‬‏', 'Botswana', 'بتسوانا ', '267'),
(30, 'BV', 'Bouvet Island‬‏', 'Bouvet Island', 'جزيرة بوفيه ', NULL),
(31, 'BR', 'Brasil‬‏', 'Brazil', 'البرازيل ', '55'),
(32, 'IO', 'British Indian Ocean Territory‬‏', 'British Indian Ocean Territory', 'الإقليم البريطاني في المحيط الهندي ', '246'),
(33, 'BN', 'Brunei‬‏', 'Brunei', 'بروناي ', '673'),
(34, 'BG', 'България‬‏', 'Bulgaria', 'بلغاريا ', '359'),
(35, 'BF', 'Burkina Faso‬‏', 'Burkina Faso', 'بوركينا فاسو ', '226'),
(36, 'BI', 'Uburundi‬‏', 'Burundi', 'بوروندي ', '257'),
(37, 'KH', 'កម្ពុជា‬‏', 'Cambodia', 'كمبوديا ', '855'),
(38, 'CM', 'Cameroun‬‏', 'Cameroon', 'الكاميرون ', '237'),
(39, 'CA', 'Canada‬‏', 'Canada', 'كندا ', '1'),
(40, 'CV', 'Kabu Verdi‬‏', 'Cape Verde', 'الرأس الأخضر ', '238'),
(41, 'KY', 'Cayman Islands‬‏', 'Cayman Islands', 'جزر الكايمن ', '1 345'),
(42, 'CF', 'République centrafricaine‬‏', 'Central African Republic', 'جمهورية أفريقيا الوسطى ', '236'),
(43, 'TD', 'Tchad‬‏', 'Chad', 'تشاد ', '235'),
(44, 'CL', 'Chile‬‏', 'Chile', 'شيلي ', '56'),
(45, 'CN', '中国‬‏', 'China', 'الصين ', '86'),
(46, 'CX', 'Christmas Island‬‏', 'Christmas Island', 'جزيرة الكريسماس ', '61'),
(47, 'CC', 'Cocos [Keeling] Islands‬‏', 'Cocos [Keeling] Islands', 'جزر كوكوس ', '61'),
(48, 'CO', 'Colombia‬‏', 'Colombia', 'كولومبيا ', '57'),
(49, 'KM', 'جزر القمر', 'Comoros', 'جزر القمر', '269'),
(50, 'CG', 'Congo-Brazzaville‬‏', 'Congo [Republic]', 'الكونغو - برازافيل ', '242'),
(51, 'CD', 'Jamhuri ya Kidemokrasia ya Kongo‬‏', 'Congo [DRC]', 'الكونغو - كينشاسا ', '243'),
(52, 'CK', 'Cook Islands‬‏', 'Cook Islands', 'جزر كوك ', '682'),
(53, 'CR', 'Costa Rica‬‏', 'Costa Rica', 'كوستاريكا ', '506'),
(54, 'CI', 'Côte d’Ivoire‬‏', 'Côte d’Ivoire', 'ساحل العاج ', '225'),
(55, 'HR', 'Hrvatska‬‏', 'Croatia', 'كرواتيا ', '385'),
(56, 'CU', 'Cuba‬‏', 'Cuba', 'كوبا ', '53'),
(57, 'CW', 'Curaçao‬‏', 'Curaçao', 'كوراساو ', '599 9'),
(58, 'CY', 'Κύπρος‬‏', 'Cyprus', 'قبرص ', '357'),
(59, 'CZ', 'Česká republika‬‏', 'Czech Republic', 'جمهورية التشيك ', '420'),
(60, 'DK', 'Danmark‬‏', 'Denmark', 'الدانمرك ', '45'),
(61, 'DJ', 'Djibouti‬‏', 'Djibouti', 'جيبوتي ', '253'),
(62, 'DM', 'Dominica‬‏', 'Dominica', 'دومينيكا ', '1 767'),
(63, 'DO', 'República Dominicana‬‏', 'Dominican Republic', 'جمهورية الدومينيك ', '1 809'),
(64, 'EC', 'Ecuador‬‏', 'Ecuador', 'الإكوادور ', '593'),
(65, 'EG', 'مصر', 'Egypt', 'مصر', '20'),
(66, 'SV', 'El Salvador‬‏', 'El Salvador', 'السلفادور ', '503'),
(67, 'GQ', 'Guinea Ecuatorial‬‏', 'Equatorial Guinea', 'غينيا الإستوائية ', '240'),
(68, 'ER', 'Eritrea‬‏', 'Eritrea', 'أريتريا ', '291'),
(69, 'EE', 'Eesti‬‏', 'Estonia', 'أستونيا ', '372'),
(70, 'ET', 'Ethiopia‬‏', 'Ethiopia', 'إثيوبيا ', '251'),
(71, 'FK', 'Falkland Islands [Islas Malvinas]‬‏', 'Falkland Islands [Islas Malvinas]', 'جزر فوكلاند ', '500'),
(72, 'FO', 'Føroyar‬‏', 'Faroe Islands', 'جزر فارو ', '298'),
(73, 'FJ', 'Fiji‬‏', 'Fiji', 'فيجي ', '679'),
(74, 'FI', 'Suomi‬‏', 'Finland', 'فنلندا ', '358'),
(75, 'FR', 'France‬‏', 'France', 'فرنسا ', '33'),
(76, 'GF', 'Guyane française‬‏', 'French Guiana', 'غويانا الفرنسية ', NULL),
(77, 'PF', 'Polynésie française‬‏', 'French Polynesia', 'بولينيزيا الفرنسية ', '689'),
(78, 'TF', 'Terres australes françaises‬‏', 'French Southern Territories', 'المقاطعات الجنوبية الفرنسية ', NULL),
(79, 'GA', 'Gabon‬‏', 'Gabon', 'الجابون ', '241'),
(80, 'GM', 'Gambia‬‏', 'Gambia', 'غامبيا ', '220'),
(81, 'GE', 'საქართველო‬‏', 'Georgia', 'جورجيا ', '995'),
(82, 'DE', 'Deutschland‬‏', 'Germany', 'ألمانيا ', '49'),
(83, 'GH', 'Gaana‬‏', 'Ghana', 'غانا ', '233'),
(84, 'GI', 'Gibraltar‬‏', 'Gibraltar', 'جبل طارق ', '350'),
(85, 'GR', 'Ελλάδα‬‏', 'Greece', 'اليونان ', '30'),
(86, 'GL', 'Kalaallit Nunaat‬‏', 'Greenland', 'غرينلاند ', '299'),
(87, 'GD', 'Grenada‬‏', 'Grenada', 'غرينادا ', '1 473'),
(88, 'GP', 'Guadeloupe‬‏', 'Guadeloupe', 'جوادلوب ', NULL),
(89, 'GU', 'Guam‬‏', 'Guam', 'غوام ', '1 671'),
(90, 'GT', 'Guatemala‬‏', 'Guatemala', 'غواتيمالا ', '502'),
(91, 'GG', 'Guernsey‬‏', 'Guernsey', 'غيرنزي ', '44'),
(92, 'GN', 'Guinée‬‏', 'Guinea', 'غينيا ', '224'),
(93, 'GW', 'Guiné Bissau‬‏', 'Guinea-Bissau', 'غينيا بيساو ', '245'),
(94, 'GY', 'Guyana‬‏', 'Guyana', 'غيانا ', '592'),
(95, 'HT', 'Haiti‬‏', 'Haiti', 'هايتي ', '509'),
(96, 'HM', 'Heard Island and McDonald Islands‬‏', 'Heard Island and McDonald Islands', 'جزيرة هيرد وجزر ماكدونالد ', NULL),
(97, 'VA', 'Città del Vaticano‬‏', 'Vatican City', 'الفاتيكان ', '39'),
(98, 'HN', 'Honduras‬‏', 'Honduras', 'هندوراس ', '504'),
(99, 'HK', '香港‬‏', 'Hong Kong', 'هونغ كونغ ', '852'),
(100, 'HU', 'Magyarország‬‏', 'Hungary', 'هنغاريا ', '36'),
(101, 'IS', 'Ísland‬‏', 'Iceland', 'أيسلندا ', '354'),
(102, 'IN', 'भारत‬‏', 'India', 'الهند ', '91'),
(103, 'ID', 'Indonesia‬‏', 'Indonesia', 'أندونيسيا ', '62'),
(104, 'IR', 'إيران', 'Iran', 'ایران', '98'),
(105, 'IQ', 'العراق', 'Iraq', 'العراق', '964'),
(106, 'IE', 'Ireland‬‏', 'Ireland', 'أيرلندا ', '353'),
(107, 'IM', 'Isle of Man‬‏', 'Isle of Man', 'جزيرة مان ', '44'),
(108, 'IL', 'ישראל', 'Israel', 'إسرائيل', '972'),
(109, 'IT', 'Italia‬‏', 'Italy', 'إيطاليا ', '39'),
(110, 'JM', 'Jamaica‬‏', 'Jamaica', 'جامايكا ', '1 876'),
(111, 'JP', '日本‬‏', 'Japan', 'اليابان ', '81'),
(112, 'JE', 'Jersey‬‏', 'Jersey', 'جيرسي ', '44'),
(113, 'JO', 'الأردن', 'Jordan', 'الأردن', '962'),
(114, 'KZ', 'Казахстан‬‏', 'Kazakhstan', 'كازاخستان ', '7'),
(115, 'KE', 'Kenya‬‏', 'Kenya', 'كينيا ', '254'),
(116, 'KI', 'Kiribati‬‏', 'Kiribati', 'كيريباتي ', '686'),
(117, 'KP', '조선 민주주의 인민 공화국‬‏', 'North Korea', 'كوريا الشمالية ', '850'),
(118, 'KR', '대한민국‬‏', 'South Korea', 'كوريا الجنوبية ', '82'),
(119, 'KW', 'الكويت', 'Kuwait', 'الكويت', '965'),
(120, 'KG', 'Kyrgyzstan‬‏', 'Kyrgyzstan', 'قرغيزستان ', '996'),
(121, 'LA', 'ສ.ປ.ປ ລາວ‬‏', 'Laos', 'لاوس ', '856'),
(122, 'LV', 'Latvija‬‏', 'Latvia', 'لاتفيا ', '371'),
(123, 'LB', 'لبنان', 'Lebanon', 'لبنان', '961'),
(124, 'LS', 'Lesotho‬‏', 'Lesotho', 'ليسوتو ', '266'),
(125, 'LR', 'Liberia‬‏', 'Liberia', 'ليبيريا ', '231'),
(126, 'LY', 'ليبيا', 'Libya', 'ليبيا', '218'),
(127, 'LI', 'Liechtenstein‬‏', 'Liechtenstein', 'ليختنشتاين ', '423'),
(128, 'LT', 'Lietuva‬‏', 'Lithuania', 'ليتوانيا ', '370'),
(129, 'LU', 'Luxembourg‬‏', 'Luxembourg', 'لوكسمبورغ ', '352'),
(130, 'MO', '澳門‬‏', 'Macau', 'مكاو ', '853'),
(131, 'MK', 'Македонија‬‏', 'Macedonia [FYROM]', 'مقدونيا ', '389'),
(132, 'MG', 'Madagasikara‬‏', 'Madagascar', 'مدغشقر ', '261'),
(133, 'MW', 'Malawi‬‏', 'Malawi', 'ملاوي ', '265'),
(134, 'MY', 'Malaysia‬‏', 'Malaysia', 'ماليزيا ', '60'),
(135, 'MV', 'Maldives‬‏', 'Maldives', 'جزر المالديف ', '960'),
(136, 'ML', 'Mali‬‏', 'Mali', 'مالي ', '223'),
(137, 'MT', 'Malta‬‏', 'Malta', 'مالطا ', '356'),
(138, 'MH', 'Marshall Islands‬‏', 'Marshall Islands', 'جزر المارشال ', '692'),
(139, 'MQ', 'Martinique‬‏', 'Martinique', 'مارتينيك ', '596'),
(140, 'MR', 'موريتانيا', 'Mauritania', 'موريتانيا', '222'),
(141, 'MU', 'Moris‬‏', 'Mauritius', 'موريشيوس ', '230'),
(142, 'YT', 'Mayotte‬‏', 'Mayotte', 'مايوت ', '262'),
(143, 'MX', 'México‬‏', 'Mexico', 'المكسيك ', '52'),
(144, 'FM', 'Micronesia‬‏', 'Micronesia', 'ميكرونيزيا ', '691'),
(145, 'MD', 'Republica Moldova‬‏', 'Moldova', 'مولدافيا ', '373'),
(146, 'MC', 'Monaco‬‏', 'Monaco', 'موناكو ', '377'),
(147, 'MN', 'Монгол‬‏', 'Mongolia', 'منغوليا ', '976'),
(148, 'ME', 'Crna Gora‬‏', 'Montenegro', 'الجبل الأسود ', '382'),
(149, 'MS', 'Montserrat‬‏', 'Montserrat', 'مونتسرات ', '1 664'),
(150, 'MA', 'المغرب', 'Morocco', 'المغرب', '212'),
(151, 'MZ', 'Moçambique‬‏', 'Mozambique', 'موزمبيق ', '258'),
(152, 'MM', 'မြန်မာ‬‏', 'Myanmar [Burma]', 'ميانمار -بورما ', '95'),
(153, 'NA', 'Namibia‬‏', 'Namibia', 'ناميبيا ', '264'),
(154, 'NR', 'Nauru‬‏', 'Nauru', 'ناورو ', '674'),
(155, 'NP', 'नेपाल‬‏', 'Nepal', 'نيبال ', '977'),
(156, 'NL', 'Nederland‬‏', 'Netherlands', 'هولندا ', '31'),
(157, 'NC', 'Nouvelle-Calédonie‬‏', 'New Caledonia', 'كاليدونيا الجديدة ', '687'),
(158, 'NZ', 'New Zealand‬‏', 'New Zealand', 'نيوزيلاندا ', '64'),
(159, 'NI', 'Nicaragua‬‏', 'Nicaragua', 'نيكاراغوا ', '505'),
(160, 'NE', 'Nijar‬‏', 'Niger', 'النيجر ', '227'),
(161, 'NG', 'Nigeria‬‏', 'Nigeria', 'نيجيريا ', '234'),
(162, 'NU', 'Niue‬‏', 'Niue', 'نيوي ', '683'),
(163, 'NF', 'Norfolk Island‬‏', 'Norfolk Island', 'جزيرة نورفوك ', '672'),
(164, 'MP', 'Northern Mariana Islands‬‏', 'Northern Mariana Islands', 'جزر ماريانا الشمالية ', '1 670'),
(165, 'NO', 'Norge‬‏', 'Norway', 'النرويج ', '47'),
(166, 'OM', 'عُمان', 'Oman', 'عُمان', '968'),
(167, 'PK', 'پاکستان', 'Pakistan', 'باكستان', '92'),
(168, 'PW', 'Palau‬‏', 'Palau', 'بالاو ', '680'),
(169, 'PS', 'فلسطين', 'Palestine', 'فلسطين', '970'),
(170, 'PA', 'Panamá‬‏', 'Panama', 'بنما ', '507'),
(171, 'PG', 'Papua New Guinea‬‏', 'Papua New Guinea', 'بابوا غينيا الجديدة ', '675'),
(172, 'PY', 'Paraguay‬‏', 'Paraguay', 'باراغواي ', '595'),
(173, 'PE', 'Perú‬‏', 'Peru', 'بيرو ', '51'),
(174, 'PH', 'Philippines‬‏', 'Philippines', 'الفيلبين ', '63'),
(175, 'PN', 'Pitcairn Islands‬‏', 'Pitcairn Islands', 'جزر بيتكيرن ', '870'),
(176, 'PL', 'Polska‬‏', 'Poland', 'بولندا ', '48'),
(177, 'PT', 'Portugal‬‏', 'Portugal', 'البرتغال ', '351'),
(178, 'PR', 'Puerto Rico‬‏', 'Puerto Rico', 'بورتوريكو ', '1 787'),
(179, 'QA', 'قطر', 'Qatar', 'قطر', '974'),
(180, 'RE', 'Réunion‬‏', 'Réunion', 'روينيون ', NULL),
(181, 'RO', 'România‬‏', 'Romania', 'رومانيا ', '40'),
(182, 'RU', 'Россия‬‏', 'Russia', 'روسيا ', '7'),
(183, 'RW', 'Rwanda‬‏', 'Rwanda', 'رواندا ', '250'),
(184, 'BL', 'Saint-Barthélémy‬‏', 'Saint Barthélemy', 'سان بارتليمي ', '590'),
(185, 'SH', 'Saint Helena‬‏', 'Saint Helena', 'سانت هيلنا ', '290'),
(186, 'KN', 'Saint Kitts and Nevis‬‏', 'Saint Kitts and Nevis', 'سانت كيتس ونيفيس ', '1 869'),
(187, 'LC', 'Saint Lucia‬‏', 'Saint Lucia', 'سانت لوسيا ', '1 758'),
(188, 'MF', 'Saint-Martin [partie française]‬‏', 'Saint Martin', 'سانت مارتن ', '1 599'),
(189, 'PM', 'Saint-Pierre-et-Miquelon‬‏', 'Saint Pierre and Miquelon', 'سانت بيير وميكولون ', '508'),
(190, 'VC', 'Saint Vincent and the Grenadines‬‏', 'Saint Vincent and the Grenadines', 'سانت فنسنت وغرنادين ', '1784'),
(191, 'WS', 'Samoa‬‏', 'Samoa', 'ساموا ', '685'),
(192, 'SM', 'San Marino‬‏', 'San Marino', 'سان مارينو ', '378'),
(193, 'ST', 'São Tomé e Príncipe‬‏', 'São Tomé and Príncipe', 'ساو تومي وبرينسيبي ', '239'),
(194, 'SA', 'المملكة العربية السعودية', 'Saudi Arabia', 'المملكة العربية السعودية', '966'),
(195, 'SN', 'Sénégal‬‏', 'Senegal', 'السنغال ', '221'),
(196, 'RS', 'Србија‬‏', 'Serbia', 'صربيا ', '381'),
(197, 'SC', 'Seychelles‬‏', 'Seychelles', 'سيشل ', '248'),
(198, 'SL', 'Sierra Leone‬‏', 'Sierra Leone', 'سيراليون ', '232'),
(199, 'SG', 'Singapore‬‏', 'Singapore', 'سنغافورة ', '65'),
(200, 'SX', 'Sint Maarten‬‏', 'Sint Maarten', 'سينت مارتن ', '1 721'),
(201, 'SK', 'Slovensko‬‏', 'Slovakia', 'سلوفاكيا ', '421'),
(202, 'SI', 'Slovenija‬‏', 'Slovenia', 'سلوفينيا ', '386'),
(203, 'SB', 'Solomon Islands‬‏', 'Solomon Islands', 'جزر سليمان ', '677'),
(204, 'SO', 'Soomaaliya‬‏', 'Somalia', 'الصومال ', '252'),
(205, 'ZA', 'South Africa‬‏', 'South Africa', 'جنوب أفريقيا ', '27'),
(206, 'GS', 'South Georgia and the South Sandwich Islands‬‏', 'South Georgia and the South Sandwich Islands', 'جورجيا الجنوبية وجزر ساندويتش الجنوبية ', NULL),
(207, 'SS', 'جنوب السودان', 'South Sudan', 'جنوب السودان', '211'),
(208, 'ES', 'España‬‏', 'Spain', 'إسبانيا ', '34'),
(209, 'LK', 'ශ්‍රී ලංකාව‬‏', 'Sri Lanka', 'سريلانكا ', '94'),
(210, 'SD', 'السودان', 'Sudan', 'السودان', '249'),
(211, 'SR', 'Suriname‬‏', 'Suriname', 'سورينام ', '597'),
(212, 'SJ', 'Svalbard og Jan Mayen‬‏', 'Svalbard and Jan Mayen', 'سفالبارد وجان مايان ', NULL),
(213, 'SZ', 'Swaziland‬‏', 'Swaziland', 'سوازيلاند ', '268'),
(214, 'SE', 'Sverige‬‏', 'Sweden', 'السويد ', '46'),
(215, 'CH', 'Schweiz‬‏', 'Switzerland', 'سويسرا ', '41'),
(216, 'SY', 'سوريا', 'Syria', 'سوريا', '963'),
(217, 'TW', '台灣‬‏', 'Taiwan', 'تايوان ', '886'),
(218, 'TJ', 'Tajikistan‬‏', 'Tajikistan', 'طاجكستان ', '992'),
(219, 'TZ', 'Tanzania‬‏', 'Tanzania', 'تانزانيا ', '255'),
(220, 'TH', 'ไทย‬‏', 'Thailand', 'تايلند ', '66'),
(221, 'TL', 'Timor-Leste‬‏', 'Timor-Leste', 'تيمور الشرقية ', '670'),
(222, 'TG', 'Togo‬‏', 'Togo', 'توجو ', '228'),
(223, 'TK', 'Tokelau‬‏', 'Tokelau', 'توكيلو ', '690'),
(224, 'TO', 'Tonga‬‏', 'Tonga', 'تونغا ', '676'),
(225, 'TT', 'Trinidad and Tobago‬‏', 'Trinidad and Tobago', 'ترينيداد وتوباغو ', '1 868'),
(226, 'TN', 'تونس', 'Tunisia', 'تونس', '216'),
(227, 'TR', 'Türkiye‬‏', 'Turkey', 'تركيا ', '90'),
(228, 'TM', 'Turkmenistan‬‏', 'Turkmenistan', 'تركمانستان ', '993'),
(229, 'TC', 'Turks and Caicos Islands‬‏', 'Turks and Caicos Islands', 'جزر الترك وجايكوس ', '1 649'),
(230, 'TV', 'Tuvalu‬‏', 'Tuvalu', 'توفالو ', '688'),
(231, 'UG', 'Uganda‬‏', 'Uganda', 'أوغندا ', '256'),
(232, 'UA', 'Україна‬‏', 'Ukraine', 'أوكرانيا ', '380'),
(233, 'AE', 'الإمارات العربية المتحدة', 'United Arab Emirates', 'الإمارات العربية المتحدة', '971'),
(234, 'GB', 'United Kingdom‬‏', 'United Kingdom', 'المملكة المتحدة ', '44'),
(235, 'US', 'United States‬‏', 'United States', 'الولايات المتحدة ', '1'),
(236, 'UM', 'U.S. Outlying Islands‬‏', 'U.S. Outlying Islands', 'جزر الولايات المتحدة البعيدة الصغيرة ', NULL),
(237, 'UY', 'Uruguay‬‏', 'Uruguay', 'أورغواي ', '598'),
(238, 'UZ', 'Ўзбекистон‬‏', 'Uzbekistan', 'أوزبكستان ', '998'),
(239, 'VU', 'Vanuatu‬‏', 'Vanuatu', 'فانواتو ', '678'),
(240, 'VE', 'Venezuela‬‏', 'Venezuela', 'فنزويلا ', '58'),
(241, 'VN', 'Việt Nam‬‏', 'Vietnam', 'فيتنام ', '84'),
(242, 'VG', 'British Virgin Islands‬‏', 'British Virgin Islands', 'جزر فرجين البريطانية ', '1 284'),
(243, 'VI', 'U.S. Virgin Islands‬‏', 'U.S. Virgin Islands', 'جزر فرجين الأمريكية ', '1 340'),
(244, 'WF', 'Wallis and Futuna‬‏', 'Wallis and Futuna', 'جزر والس وفوتونا ', '681'),
(245, 'EH', 'الصحراء الغربية', 'Western Sahara', 'الصحراء الغربية', '212'),
(246, 'YE', 'اليمن', 'Yemen', 'اليمن', '967'),
(247, 'ZM', 'Zambia‬‏', 'Zambia', 'زامبيا ', '260'),
(248, 'ZW', 'Zimbabwe‬‏', 'Zimbabwe', 'زيمبابوي ', '263');

-- --------------------------------------------------------

--
-- بنية الجدول `file`
--

CREATE TABLE `file` (
  `file_path` text COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `id_gov` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `file`
--

INSERT INTO `file` (`file_path`, `type`, `status`, `id_gov`) VALUES
('file/doc_pdf/1094906623_13328.pdf', 'pdf', 'comp', '1094906623'),
('file/doc_pdf/1094906623_13328.pdf', 'pdf', 'comp', '1094906623'),
('fghfghfghfg', 'video', 'comp', '1094906623'),
('file/doc_pdf/1112_13328 (1).pdf', 'pdf', 'comp', '1112'),
('fgthfgth', 'video', 'comp', '1112');

-- --------------------------------------------------------

--
-- بنية الجدول `order_app`
--

CREATE TABLE `order_app` (
  `id_gov` int(11) NOT NULL,
  `status_application` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `order_app`
--

INSERT INTO `order_app` (`id_gov`, `status_application`) VALUES
(1112, 'not'),
(99990998, 'not'),
(1094906623, 'not');

-- --------------------------------------------------------

--
-- بنية الجدول `point`
--

CREATE TABLE `point` (
  `id_gov` int(11) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `point`
--

INSERT INTO `point` (`id_gov`, `points`) VALUES
(1112, 6),
(1094906623, 3);

-- --------------------------------------------------------

--
-- بنية الجدول `quaf_type`
--

CREATE TABLE `quaf_type` (
  `q_id` int(11) NOT NULL,
  `name_q` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `quaf_type`
--

INSERT INTO `quaf_type` (`q_id`, `name_q`) VALUES
(1, 'علمي'),
(2, 'ادبي و شرعي ');

-- --------------------------------------------------------

--
-- بنية الجدول `qualification`
--

CREATE TABLE `qualification` (
  `id_gov` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `mark` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `country` text COLLATE utf8_unicode_ci NOT NULL,
  `dates` datetime NOT NULL,
  `great` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `qualification`
--

INSERT INTO `qualification` (`id_gov`, `type`, `mark`, `country`, `dates`, `great`, `status`) VALUES
('1094906623', 1, '88', 'جزر أولان', '1990-05-06 00:00:00', 'ممتاز', 'comp'),
('1112', 1, '87', 'جزر أولان', '1990-05-06 00:00:00', 'ممتاز', 'comp'),
('99990998', 1, '333', '', '0000-00-00 00:00:00', '', '');

-- --------------------------------------------------------

--
-- بنية الجدول `recomd`
--

CREATE TABLE `recomd` (
  `id_gov` int(11) NOT NULL,
  `name1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone1` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `job1` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone2` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `job2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(80) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `recomd`
--

INSERT INTO `recomd` (`id_gov`, `name1`, `phone1`, `job1`, `name2`, `phone2`, `job2`, `status`) VALUES
(1112, 'sdfsd', 'sdf', 'sdfs', 'sf', 'sdfs', 'sdf', 'comp'),
(1094906623, 'ddv', '4535', 'fdvdfv', 'dfgdfg', '4535', 'dfgdf', 'comp');

-- --------------------------------------------------------

--
-- بنية الجدول `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'student'),
(2, 'employee');

-- --------------------------------------------------------

--
-- بنية الجدول `student_info`
--

CREATE TABLE `student_info` (
  `name_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `name_en` text COLLATE utf8_unicode_ci NOT NULL,
  `gander` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nationality_org` text COLLATE utf8_unicode_ci NOT NULL,
  `nationality_now` text COLLATE utf8_unicode_ci NOT NULL,
  `id_giv` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password_gov` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Birthday` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `country_brith` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `city_brith` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `country_now` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `is_live_ycountry` text COLLATE utf8_unicode_ci NOT NULL,
  `is_musl_from_brith` text COLLATE utf8_unicode_ci NOT NULL,
  `s_m` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `any_sick` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `note_sick` text COLLATE utf8_unicode_ci NOT NULL,
  `Quran` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone1` text COLLATE utf8_unicode_ci NOT NULL,
  `phone2` text COLLATE utf8_unicode_ci NOT NULL,
  `city_mother_lan` text COLLATE utf8_unicode_ci NOT NULL,
  `city_en` text COLLATE utf8_unicode_ci NOT NULL,
  `country_mother_lan` text COLLATE utf8_unicode_ci NOT NULL,
  `country_en` text COLLATE utf8_unicode_ci NOT NULL,
  `address_mother_lan` text COLLATE utf8_unicode_ci NOT NULL,
  `address_en` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `student_info`
--

INSERT INTO `student_info` (`name_ar`, `name_en`, `gander`, `nationality_org`, `nationality_now`, `id_giv`, `password_gov`, `Birthday`, `country_brith`, `city_brith`, `country_now`, `is_live_ycountry`, `is_musl_from_brith`, `s_m`, `any_sick`, `note_sick`, `Quran`, `phone1`, `phone2`, `city_mother_lan`, `city_en`, `country_mother_lan`, `country_en`, `address_mother_lan`, `address_en`, `status`) VALUES
('عبدالرحمن جارالله عبدالرحمن جارالله', 'Abdulrahman Jarall ii ww', 'F', 'جزر أولان', 'جزر أولان', '1094906623', 'T77T8', '0000-00-00 00:00:00', 'جزر أولان', 'sdfsd', '', '', 'yes', 'singl', '', '', '', '', '', '', '', '', '', '', '', 'comp'),
('asa as as as', 'asa saa asa saa', 'F', 'جزر أولان', 'جزر أولان', '1112', '1212', '0000-00-00 00:00:00', 'جزر أولان', 'asdas', '', '', 'yes', 'singl', '', '', '', '', '', '', '', '', '', '', '', 'comp'),
('ohg dsfs fsf dsfsd', 'hgh hghg hghgh hghg', '', '', '', '99990998', '88uu8', '2019-09-13 20:42:53', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- بنية الجدول `user`
--

CREATE TABLE `user` (
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `pass` text COLLATE utf8_unicode_ci NOT NULL,
  `id_gov` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `reg_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- إرجاع أو استيراد بيانات الجدول `user`
--

INSERT INTO `user` (`email`, `pass`, `id_gov`, `role_id`, `reg_data`) VALUES
('abdxax@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1094906623', 1, '0000-00-00 00:00:00'),
('a@a.a', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1112', 1, '0000-00-00 00:00:00'),
('xss@s.s', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '99990998', 1, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id_gov`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id_count`),
  ADD KEY `code` (`code`);

--
-- Indexes for table `order_app`
--
ALTER TABLE `order_app`
  ADD PRIMARY KEY (`id_gov`);

--
-- Indexes for table `point`
--
ALTER TABLE `point`
  ADD PRIMARY KEY (`id_gov`);

--
-- Indexes for table `quaf_type`
--
ALTER TABLE `quaf_type`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`id_gov`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `recomd`
--
ALTER TABLE `recomd`
  ADD PRIMARY KEY (`id_gov`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id_giv`),
  ADD UNIQUE KEY `password_gov` (`password_gov`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_gov`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id_count` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `quaf_type`
--
ALTER TABLE `quaf_type`
  MODIFY `q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `qualification`
--
ALTER TABLE `qualification`
  ADD CONSTRAINT `qualification_ibfk_1` FOREIGN KEY (`type`) REFERENCES `quaf_type` (`q_id`);

--
-- القيود للجدول `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
