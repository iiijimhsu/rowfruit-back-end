-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-05-14 11:07:06
-- 伺服器版本： 10.4.18-MariaDB
-- PHP 版本： 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `row_fruit_db`
--

-- --------------------------------------------------------

--
-- 資料表結構 `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `administrator`
--

INSERT INTO `administrator` (`id`, `name`, `password`) VALUES
(1, 'rowfruit', '1585679870');

-- --------------------------------------------------------

--
-- 資料表結構 `article`
--

CREATE TABLE `article` (
  `id` int(10) NOT NULL,
  `title` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_time` datetime NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `article`
--

INSERT INTO `article` (`id`, `title`, `category`, `content`, `author`, `created_time`, `status`, `valid`) VALUES
(1, 'hello ', 'lif', '', 'irene', '2021-05-04 14:26:10', 'on', 1),
(2, 'hello', 'hello', 'hello', 'tung', '2021-05-05 14:41:24', 'on', 1),
(3, 'hello', 'hello', 'hello', 'tung', '2021-05-05 14:41:46', 'off', 1),
(4, 'hello', 'hello', 'hello', 'tung', '2021-05-05 14:42:49', 'on', 1),
(5, 'hello', 'hello', 'hi', 'tung', '2021-05-05 15:42:55', 'on', 1),
(6, 'hello', 'hi', '', 'tung', '2021-05-05 15:43:07', 'on', 1),
(7, 'hello', 'hello', '123', 'tung', '2021-05-05 16:08:06', 'on', 1),
(8, 'hello', 'hello', 'hi my name is irene hi my name is irenehi my name is irenehi my name is irenehi my name is irenehi my name is irenehi my name is irenehi my name is irenehi my name is irene', 'irene', '2021-05-05 16:19:56', 'on', 1),
(9, 'hello', 'hello', '123', 'irene', '2021-05-05 17:14:59', 'on', 1),
(10, 'hello', 'hello', '123', 'tung', '2021-05-05 17:15:56', 'on', 1),
(16, '123', '123', '123', '123', '2021-05-07 10:34:35', 'on', 1),
(17, '333', '333', '333', '333', '2021-05-07 10:43:12', 'on', 1),
(18, '5we6w', '1a5e6f1awe', 'aewfew', 'sdfawef', '2021-05-07 14:57:02', 'off', 1),
(19, 'aefae', '生活', '', 'aewfawe', '2021-05-07 14:57:34', 'on', 1),
(20, 'awef', '生活', 'adfawe', 'afsdf', '2021-05-07 14:58:03', 'on', 1),
(21, 'aewfaw', '生活', 'awefaw', 'awef', '2021-05-07 14:58:41', 'on', 1),
(22, '45646', '4646', '465f4aw6e', 'fawe', '2021-05-07 15:03:54', 'on', 1),
(23, '45646', '4646', '465f4aw6e', 'fawe', '2021-05-07 15:04:01', 'on', 1),
(24, '123', '水果', '123', '123', '2021-05-07 15:19:58', 'on', 1),
(25, '123', '水果', '123', '123', '2021-05-07 15:21:12', 'on', 1),
(26, 'hi', '歷史', 'hi', 'tung', '2021-05-07 15:22:45', 'on', 1),
(27, '546', '生活', '<h2>我是測試</h2>', '546', '2021-05-07 17:15:29', 'on', 1),
(29, '測試標題修改2', '生活', '<figure class=\"image\"><img src=\"./attachment/2021/05/10/20210510_0251550.jpg\"></figure><p>測試</p><p>這個該如何運作</p>', 'me', '2021-05-10 08:52:16', 'off', 1),
(30, '測試標題', '生活', '<figure class=\"image\"><img src=\"./attachment/2021/05/10/20210510_0443230.jpg\"></figure><p>測試</p>', 'me', '2021-05-10 10:43:33', 'on', 1),
(34, '541646', '生活', '<p>fa5ewf4a6we</p><figure class=\"image image-style-side\"><img src=\"./attachment/2021/05/10/20210510_0847130.png\"></figure>', 'fa63we5fq6w', '2021-05-10 14:34:07', 'on', 1),
(35, '333', '生活', '<p>rsgawerfewrfdadfaedf\\</p><p>&nbsp;</p><figure class=\"image\"><img src=\"./attachment/2021/05/10/20210510_0932250.png\"></figure>', 'Elisk', '2021-05-10 15:32:29', 'on', 1),
(36, 'aefawe', '生活', '<p>rfewafwe</p>', 'efawe', '2021-05-10 15:37:59', 'on', 1),
(37, '123', '生活', '<p>的手起山多低視麼們如總結義家車想落。已有同你喜在，慢問你他之量：間較中表我，歌答生非想方樣保不的量才車，應案集門著打收。業子開道廣病就是工國多：日失當維假學樹老興政中哥：濟了裡：者體則；她色至者血果看紙你相後子電身所密球立引對度歷，三力飛治我就容有己方主速熱但變孩清不良比。深簡孩學打，於同電了然果保急覺增應格片樂指日有的得站財：方建現講打……數不道且的定回心落上想向早有官心陽光，是角業他當文是面到至富、定兒國立在專發；解爸情聲，市平死字、技可回社買舉議強定小。發果有、物們每得團上，量否球主，快受把人參什人民；學省節學不！個速畫營界們總小清！小變中市機人英舉事的面臺部：觀管上照治進連名得了活此一自際醫我。</p>', 'efaw', '2021-05-10 15:42:26', 'on', 1),
(38, 'fawefawef', '營養知識', '<p>的手起山多低視麼們如總結義家車想落。已有同你喜在，慢問你他之量：間較中表我，歌答生非想方樣保不的量才車，應案集門著打收。業子開道廣病就是工國多：日失當維假學樹老興政中哥：濟了裡：者體則；她色至者血果看紙你相後子電身所密球立引對度歷，三力飛治我就容有己方主速熱但變孩清不良比。深簡孩學打，於同電了然果保急覺增應格片樂指日有的得站財：方建現講打……數不道且的定回心落上想向早有官心陽光，是角業他當文是面到至富、定兒國立在專發；解爸情聲，市平死字、技可回社買舉議強定小。發果有、物們每得團上，量否球主，快受把人參什人民；學省節學不！個速畫營界們總小清！小變中市機人英舉事的面臺部：觀管上照治進連名得了活此一自際醫我。</p><figure class=\"image\"><img src=\"./attachment/2021/05/10/20210510_0942470.jpeg\"></figure>', 'aefwaf', '2021-05-10 15:42:51', 'on', 1),
(39, 'awefawe', '生活', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section</p>', 'efdawef', '2021-05-10 15:43:26', 'on', 1),
(40, '標題測試', '營養知識', '<p>efwfew</p>', 'me', '2021-05-10 17:33:50', 'on', 1),
(41, '標題測試', '歷史', '<figure class=\"image\"><img src=\"./attachment/2021/05/10/20210510_1143430.png\"></figure><p>ehfaiwefawe</p>', 'me', '2021-05-10 17:34:05', 'off', 1),
(42, '123', '營養知識', '<p>35433</p>', 'efwe', '2021-05-10 18:19:26', 'off', 1),
(43, '標題測試', '營養知識', '<figure class=\"image\"><img src=\"./attachment/2021/05/11/20210511_0336040.png\"></figure>', 'Elisk', '2021-05-11 09:36:09', 'on', 1),
(44, '小農水果到你家：讓農民和消費者都安心的「rowfruit平台', '其它', '<p>這次評估約15位的精選台灣小農，榮幸邀請他們參與本項計畫，由這些小農提出水果的價格，讓價格主控權回到他們手中，並與其建立雙方長期合作關係，小農每週固定供應水果交由我們平台管理並售出，確定了水果的來源與品質，rowfruit團隊成員將水果一一挑選分裝，接著就要<strong>新鮮直送到你家</strong>啦！沒時間買水果、不會挑水果都沒關係，rowfruit幫你安排好了～你要做的只有每週在家等宅配人員按門鈴。</p><figure class=\"image\"><img src=\"./attachment/2021/05/11/20210511_1143440.jpg\"></figure><p><br>&nbsp;</p><p>本平台不僅想讓種水果的農民安心，也要讓吃水果的消費者安心。與「 rowfruit」合作的水果都必須是在「 <strong>友善種植 </strong>」的環境下生長，<strong>減少農藥、化肥、除草劑的使用</strong>，每一批水果<strong>在哪裡被種出來、被哪一位農民種出來</strong>，這些與水果相關的資訊也都必須清清楚楚，沒有含糊的空間。</p><p><br>&nbsp;</p>', 'Irene', '2021-05-11 17:43:47', 'on', 0),
(45, '不漂亮 ≠ 不能吃！？每顆水果其實都值得被珍惜', '水果', '<p><br>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;平常上市場挑水果，你最在意的是水果產地、價格，還是外觀？</p><figure class=\"image image-style-side\"><img src=\"./attachment/2021/05/11/20210511_1144260.jpg\"></figure><p>「<strong>這無法賣，因為這水果長的不夠美！不夠精緻！</strong>」果農拿著手上比較小的水果，語氣無奈地的說著：「這些進不了市場的水果被稱為『歪果』，它們可能外表長斑、表皮太粗、或者只是體積太大或太小。」</p><p>僅只因為不符合市場收購的分級品規格，這些「水果」被市場排除、成為眼中的次級品。而難以進入市場的「水果」數量大多時候也是難以估計的，</p><p>對此，rowfruit 提出了《<strong>水果再生計畫</strong>》，以「<strong>每顆水果都值得被珍惜</strong>」為出發點，結合農產、影片拍攝、文章撰寫等方式進行「有形與無形價值轉化」，不僅藉此讓消費者更認識水果，也為其創造新的可能性。</p><p><br>&nbsp;</p>', 'Irene', '2021-05-11 17:44:49', 'on', 0),
(46, '多吃水果會獲得哪些好處？', '營養知識', '<figure class=\"image\"><img src=\"./attachment/2021/05/11/20210511_1145330.jpg\"></figure><h2>每天吃水果對身體有什麼好處呢？？水果水份高、熱量低、膳食纖維含量高、飽腹感強，多吃水果有利於控制體重，甚至能對減肥有所幫助，另外，水果中豐富的水分和維生素Ｃ可以使體內合成產生膠原蛋白，而膠原蛋白能抱持皮膚彈性，使其皮膚看起來更光滑</h2><p><br>&nbsp;</p><p>此外，我們吃水果通常不單只是為了滿足口腹之慾，<strong>能從中得到多少營養</strong>也很重要。針對不同的營養需求，rowfruit 提供多種水果組合選擇，讓消費者更輕鬆的不用挑選特定的水果也能攝取到足夠的養分。</p><p>趕快為你的健康來下訂<a href=\"https://www.rowfruit.com.tw\">row-fruit</a>平台吧</p><p><br>&nbsp;</p>', 'Irene', '2021-05-11 17:45:41', 'on', 0),
(47, '破解迷思：水果到底該飯前吃，還是飯後吃？', '生活', '<p>究竟什麼時候吃水果最適合？在台灣有個深植人心的說法：水果要飯前吃，不能飯後吃，甚至有人宣稱飯後馬上吃水果如同慢性自殺的吃法，你相信這種說法嗎？</p><p>水果有許多營養素，健康飲食少不了水果，因此任何你能吃水果的時間其實都是好時間，無論是早上、下午或晚上。因為沒有科學證據證實，下午以後或飯後不能吃水果；適量吃水果，其實沒有什麼禁忌。況且國民健康署「健康行為危險因子監測調查」發現，台灣人做到一日五蔬果的比例僅12.9％。水果對健康很好，因為水果富含纖維，可以促進腸胃道蠕動、幫助消化；水果裡有維生素、礦物質以及植化素等重要抗氧化物，具有抗癌、防中風、降血壓等好處。各國的健康飲食指南都鼓勵吃到足量的蔬果，更何況台灣是水果王國，一年四季都有當季的水果上市，更該好好享受水果的各種好處。</p><figure class=\"image image-style-side\"><img src=\"./attachment/2021/05/11/20210511_1146090.jpg\"></figure>', 'Irene', '2021-05-11 17:46:17', 'off', 0),
(48, '56465613156', '生活', '<p>efwsefawe</p><figure class=\"image\"><img src=\"./attachment/2021/05/12/20210512_0820220.png\"></figure>', 'E', '2021-05-12 14:19:53', 'on', 1),
(49, '56fwerfw6ef', '生活', '<p>faewfaea</p><p>&nbsp;</p><p>&nbsp;</p><figure class=\"image image-style-side\"><img src=\"./attachment/2021/05/12/20210512_0830500.png\"></figure><p>&nbsp;</p><p>fewefaf發生什麼事</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>faewfapwjefpoakewpfaewfaewfa</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>', 'fewawe', '2021-05-12 14:30:32', 'on', 1),
(50, '上台測試', '故事', '<blockquote><figure class=\"image\"><img src=\"./attachment/2021/05/14/20210514_0413160.png\"><figcaption>小火龍</figcaption></figure><h2><i><strong>文章內容</strong></i></h2></blockquote>', 'E', '2021-05-14 10:13:34', 'on', 1),
(51, '123', '營養知識', '<h2><i><strong>文章內容</strong></i></h2><figure class=\"image\"><img src=\"./attachment/2021/05/14/20210514_0909040.png\"></figure>', 'E', '2021-05-14 15:08:42', 'on', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `phone`, `content`, `create_time`, `status`) VALUES
(1, 'Jay', 'jay@gmail.com', '0931111111', '註冊會員有問題', '2021-05-10 20:09:59', '處理中'),
(2, 'Elisk', 'elisk@test.com', '0931060777', '想詢問有關個資安全問題', '2021-05-14 11:52:21', '未處理');

-- --------------------------------------------------------

--
-- 資料表結構 `customized_order_detail`
--

CREATE TABLE `customized_order_detail` (
  `id` int(10) NOT NULL,
  `po_id` int(10) NOT NULL,
  `storage_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `customized_order_detail`
--

INSERT INTO `customized_order_detail` (`id`, `po_id`, `storage_id`, `quantity`) VALUES
(32, 100, 1, 5),
(33, 100, 1, 5),
(34, 102, 2, 8),
(35, 102, 2, 8),
(36, 103, 3, 5),
(37, 103, 3, 5),
(38, 103, 3, 5),
(39, 103, 3, 5),
(40, 104, 3, 9),
(41, 104, 1, 10),
(42, 104, 3, 9),
(43, 104, 1, 10),
(44, 105, 3, 10),
(45, 105, 1, 10),
(46, 105, 3, 10),
(47, 105, 1, 10),
(48, 106, 1, 10),
(49, 106, 3, 20),
(50, 107, 1, 11),
(51, 108, 1, 11),
(52, 109, 1, 11),
(53, 110, 1, 11),
(54, 111, 18, 110),
(55, 112, 7, 50),
(56, 113, 7, 6),
(59, 116, 23, 50),
(60, 117, 23, 60),
(61, 118, 23, 50),
(62, 119, 2, 3),
(63, 120, 1, 5),
(64, 121, 24, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `customize_label`
--

CREATE TABLE `customize_label` (
  `id` int(10) NOT NULL,
  `fruit_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carbon_water` decimal(10,2) NOT NULL,
  `dietary_fiber` decimal(10,2) NOT NULL,
  `vitamin_A` decimal(10,2) NOT NULL,
  `vitamin_C` decimal(10,2) NOT NULL,
  `Potassium` decimal(10,2) NOT NULL,
  `valid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `customize_label`
--

INSERT INTO `customize_label` (`id`, `fruit_name`, `carbon_water`, `dietary_fiber`, `vitamin_A`, `vitamin_C`, `Potassium`, `valid`) VALUES
(1, '蘋果', '13.90', '1.30', '12.00', '2.90', '114.00', 0),
(2, '香蕉', '22.10', '1.60', '3.00', '10.70', '368.00', 0),
(3, '芭樂', '9.80', '3.30', '51.00', '137.90', '146.00', 0),
(4, '酪梨', '7.90', '3.40', '424.00', '9.90', '251.00', 0),
(5, '鳳梨', '13.60', '1.10', '29.00', '12.00', '162.00', 0),
(6, '柑橘', '10.00', '1.50', '571.00', '25.50', '74.00', 0),
(7, '奇異果', '14.00', '2.70', '110.00', '73.00', '291.00', 0),
(8, '小番茄', '7.30', '1.70', '11626.00', '43.50', '269.00', 0),
(9, '柳丁', '11.40', '2.00', '21.00', '56.80', '149.00', 0),
(10, '木瓜', '9.90', '1.40', '665.00', '58.30', '186.00', 0),
(11, '火龍果', '12.40', '1.70', '1.00', '5.30', '226.00', 0),
(12, '葡萄柚', '9.20', '1.10', '246.00', '36.50', '90.00', 0),
(13, '百香果', '10.70', '5.30', '1617.00', '32.00', '200.00', 0),
(14, '西瓜', '8.00', '0.30', '687.00', '6.80', '121.00', 0),
(15, '芒果', '13.00', '1.20', '1865.00', '22.70', '119.00', 0),
(16, '巨峰葡萄', '16.60', '0.20', '5.00', '2.20', '122.00', 0),
(17, '流連', '10.00', '10.00', '10.00', '25.00', '10.00', 1),
(18, '番茄', '10.00', '10.00', '11.00', '1.00', '1.00', 1),
(19, '楊桃', '2.00', '1.00', '1.00', '1.00', '1.00', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `customize_order`
--

CREATE TABLE `customize_order` (
  `id` int(5) NOT NULL,
  `member_list_id` int(5) NOT NULL,
  `date` datetime NOT NULL,
  `valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `customize_order`
--

INSERT INTO `customize_order` (`id`, `member_list_id`, `date`, `valid`) VALUES
(23, 112, '2021-05-04 21:34:31', 1),
(29, 113, '2021-05-05 17:23:17', 1),
(45, 113, '2021-05-07 10:42:00', 1),
(90, 114, '2021-05-11 17:38:00', 1),
(91, 115, '2021-05-11 17:40:00', 1),
(92, 116, '2021-05-11 17:41:00', 1),
(93, 104, '2021-05-12 10:19:00', 1),
(94, 105, '2021-05-12 10:50:00', 1),
(95, 113, '2021-05-12 17:17:00', 1),
(96, 112, '2021-05-13 11:00:49', 1),
(97, 112, '2021-05-13 11:01:20', 1),
(98, 112, '2021-05-13 11:01:26', 1),
(99, 112, '2021-05-13 11:03:23', 1),
(100, 104, '2021-05-14 11:39:00', 0),
(101, 112, '2021-05-13 11:04:54', 1),
(102, 105, '2021-05-14 11:39:00', 0),
(103, 116, '2021-05-14 15:16:00', 0),
(104, 116, '2021-05-13 11:09:52', 0),
(105, 106, '2021-05-13 11:11:11', 0),
(106, 112, '2021-05-13 15:27:39', 0),
(107, 113, '2021-05-14 09:17:15', 0),
(108, 113, '2021-05-14 09:19:07', 1),
(109, 113, '2021-05-14 09:19:23', 1),
(110, 113, '2021-05-14 09:19:47', 1),
(111, 113, '2021-05-14 09:23:00', 1),
(112, 110, '2021-05-14 09:22:38', 0),
(113, 112, '2021-05-14 10:22:00', 1),
(114, 112, '2021-05-14 10:25:43', 1),
(115, 104, '2021-05-14 10:25:59', 1),
(116, 113, '2021-05-14 10:45:41', 1),
(117, 105, '2021-05-14 10:46:00', 1),
(118, 110, '2021-05-14 10:53:00', 0),
(119, 113, '2021-05-14 11:07:13', 0),
(120, 110, '2021-05-14 15:16:12', 0),
(121, 105, '2021-05-14 15:20:13', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `evaluation`
--

CREATE TABLE `evaluation` (
  `id` int(10) NOT NULL,
  `order_number` int(10) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '待審核',
  `created_time` datetime NOT NULL DEFAULT current_timestamp(),
  `valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `evaluation`
--

INSERT INTO `evaluation` (`id`, `order_number`, `content`, `status`, `created_time`, `valid`) VALUES
(1, 103, '吃了沒有變瘦反而一直變胖', '通過', '2021-05-07 15:23:26', 0),
(2, 104, '吃了好像有白一點，應該要再吃久一點才看得出來', '通過', '2021-05-07 15:25:34', 1),
(3, 105, '看看我的大象腿，哪裡窈窕 哪裡輕盈', '通過', '2021-05-07 15:26:24', 1),
(11, 102, '787878', '未通過', '2021-05-14 15:23:58', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `farmer_map`
--

CREATE TABLE `farmer_map` (
  `id` int(10) NOT NULL,
  `farmer_name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(15) NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `latitude` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fruit_species` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `map_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `farmer_member`
--

CREATE TABLE `farmer_member` (
  `id` int(5) NOT NULL,
  `account` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `valid` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `farmer_member`
--

INSERT INTO `farmer_member` (`id`, `account`, `password`, `name`, `phonenumber`, `email`, `address`, `valid`) VALUES
(201, 'tony500097', 'ed09b1ad51072cfaedebe8ab7ab3429e', '林湯尼', '0915183332', 'tony500097@test.com', '新北市三峽區龍埔里', 1),
(202, 'jerry0875', 'cf8012bb6540aef8b50670cf08c96689', '陳財', '0937233473', 'jerry0875@test.com', '苗栗縣後龍鎮', 1),
(203, 'maywelet1587', 'cf8012bb6540aef8b50670cf08c96689', '王昭地', '0972339733', 'maywelet1587@test.co', '台南市山上區', 1),
(204, 'joe7724', 'cf8012bb6540aef8b50670cf08c96689', '陶筱涵', '(02)99368412', 'joe7724@test', '義縣竹崎鄉炎峰街青年巷街四段985巷989號', 1),
(205, 'edwin4654', '1cc51efb8640ed4effb9b3b14933c28d', '劉建綸', '0971198106', 'edwin4654@test.com', '台中市后里區甲后路一段113巷28號', 0),
(206, 'Voynovic546', 'cf8012bb6540aef8b50670cf08c96689', '魏峻豪', '0910346972', 'Voynovic546@test.com', '新北市板橋區長江路一段88號', 0),
(207, 'Shwegovsky4684', '1227934a7802a1fbcec497e7c6faf7e4', '楊婉婷', '0972761793', 'Shwegovsky4684@test.', '台北市北投區吉利街147巷11號', 0),
(208, 'Macaroon', 'cf8012bb6540aef8b50670cf08c96689', '張志康', '0933217036', 'Macaroon@test.com', '桃園市蘆竹區五福六路137巷4號4樓', 0),
(209, 'HaydenGe486', 'd5ded665a11ab875ce65ae000e72e2f7', '秦淑芬', '0921896228', 'HaydenGe486@test.com', '台中市后里區甲后路211號', 0),
(210, 'Lecourt48364', 'cf8012bb6540aef8b50670cf08c96689', '張志康', '0934896829', 'Lecourt48364@test.co', '新竹市北區西門街121巷9號4樓', 0),
(211, 'Wolran798w', '779e1e4b066c533a8ff836fa2d15a8f9', '王昱廷', '0928996472', 'wolran798w@test.com', '台中市太平區宜昌路264號', 0),
(212, 'Sverreziew464365', '75a139958e22e3e8616ebabb07d72bd6', '林禮霞', '0989151309', 'Sverreziew464365@test.com', '台中市西屯區中科路287號', 0),
(213, 'hggmijnmrn', 'cf8012bb6540aef8b50670cf08c96689', '李珮江', '0929308819', 'hggmijnmrn@iubridge.', '台中市東區富台東街17號', 0),
(215, 'Kenqiu', 'cf8012bb6540aef8b50670cf08c96689', '鄭俊豪', '0926344774', 'Kenqiu@test.com', '彰化縣和美鎮東萊路274號', 0),
(216, 'kevein195478', 'ec035573b5ac13042d1e6026c30d76e3', '蔡嘉勇', '0934666888', 'kevein195478@test.co', '雲林縣斗六市南京西路203號', 1),
(217, 'ewefsdf', 'cf8012bb6540aef8b50670cf08c96689', '張志康', '093111122', 'edwin4654@test.com', '新北市三峽區龍埔里', 1),
(218, 'tony500097', 'ed265bc903a5a097f61d3ec064d96d2e', '張志康', '0931060666', 'tony500097@test.com', '新北市三峽區龍埔里', 1),
(219, 'ewefsdf', 'cf8012bb6540aef8b50670cf08c96689', '張志康', '0931111112', 'ewefsdf@test.com', '新北市三峽區龍埔里', 1),
(220, 'ewefsdf', 'cf8012bb6540aef8b50670cf08c96689', '張志康', '0931111111', 'edwin4654@test', '新北市三峽區龍埔里', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `fruit_class`
--

CREATE TABLE `fruit_class` (
  `id` int(10) NOT NULL,
  `fruit_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `main_product`
--

CREATE TABLE `main_product` (
  `id` int(10) NOT NULL,
  `product_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(5) NOT NULL,
  `quantity` int(5) NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `main_product`
--

INSERT INTO `main_product` (`id`, `product_name`, `price`, `quantity`, `image`, `content`, `valid`) VALUES
(1, '美白', 500, 99, '20210510_0255240.jpg', '富含維生素C的水果禮盒，幫助美白', 1),
(2, '健身', 500, 99, '2.jpg', '提供豐富能量，搭配健身增強體魄', 1),
(3, '窈窕輕盈', 300, 99, '3.jpg', '促進代謝幫助消化，現代人外食族的好夥伴', 1),
(4, '123', 126, 5, '', 'efawef', 0),
(5, '1238', 561, 1561, '', '1656', 0),
(6, '健康餐盒', 800, 10, '', 'lorem', 0),
(7, '預防老化', 1000, 99, '', '富含抗氧化素', 0),
(8, '1235', 12, 12, '', '123', 0),
(9, '12385', 500, 20, '1.png', 'lorem', 0),
(14, '瘦身', 500, 99, '4.png', '瘦身 敘述', 0),
(17, 'qwerqwer', 500, 20, 'batman.jpg', '2123123', 0),
(18, '2312', 1231, 123, 'batman.jpg', '34234', 0),
(19, '0514', 499, 99, '25.png', '0514 0514', 0),
(20, 'row', 498, 90, '7.png', 'test', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `member_list`
--

CREATE TABLE `member_list` (
  `id` int(5) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `member_list`
--

INSERT INTO `member_list` (`id`, `name`, `account`, `password`, `gender`, `phone`, `email`, `address`, `valid`) VALUES
(102, '林諭', 'chanceanthony85A', '5c1b0af8206083c1c61e', '男', '0937458012', 'kun@test.com', '桃園市中壢區中央路', 0),
(103, '侯珮瑄', '65dsaf', '8736701d18f46869a4ab', '男', '0970960492', 'fadfa@gmail.co', '彰化縣員林市靜修路75號', 0),
(104, '熊博叡', 'fa65ef4q3ewrf', '9f64e45e70a34849174d', '男', '0926539390', 'few@test.com', '新北市板橋區重慶路145巷3號', 0),
(105, '段雅玲', 'aefadsf', '9eacdf22b86fa029a6b6', '女', '0914342511', 'Cafrocks@einrot.com', '金門縣金城鎮金山路204號', 0),
(106, '施忠記', 'adf54a65df', '33bf4f9db45f719b71b7', '男', '09645135468', 'fafds@gmail.com', '桃園市中壢區龍門街109巷4號', 0),
(107, '尹雅婷', 'efawefasd', 'cf8012bb6540aef8b506', '女', '0968319099', 'efasdf@gmail.com', '台南市北區長北街22巷29號', 0),
(108, '葉建宏', 'qrqwrf556rwe', 'cf8012bb6540aef8b506', '男', '0917387317', 'afd@gmail.com', '台北市文山區木柵路一段219號', 0),
(109, '路柏翰', '15e4w6faw', '202cb962ac59075b964b', '男', '0956444444', 'fdsa@mail.com', '新北市新店區新和街245號', 0),
(110, '戴絮', 'h011ijazrtnj', 'b36dfab8c42b423a6904', '女', '0939253205', 'fadfa@gmail.com', '台北市北投區致遠一路289號', 0),
(111, '曾婷婷\r\n', 'nw7z4adr', '202cb962ac59075b964b', '女', '0936583431', 'dfadsf@test.com', '台北市北投區東華街二段196號', 0),
(112, '施苡含', 'asdfawe', 'c1d340868323f57f3fb1', '女', '0925281267', 'afwefaw@gmail.com', '台北市士林區社中街88巷11號6樓', 0),
(113, '程阡華', 'afewfa', '0eaffac0e090f369e0ea', '女', '0927149332', '09316@gmail.com', '新北市中和區宜安路104號', 0),
(114, '史致堯', 'tfwcxfg69', '6c14da109e294d1e8155', '男', '0970477989', '6w6ef@gmail.com', '雲林縣斗六市鎮北路62巷5號', 0),
(115, '楊盈孜', 'd2xkks', 'cf8012bb6540aef8b506', '女', '0961206125', 'fsdfaw@gmail.com', '新竹縣竹北市莊敬北路257號', 0),
(116, '林大帥', 'sharlotte', '431aace74b8f976b6cbc', '男', '0931060333', 'fdsa@mail.com', '新竹市', 0),
(117, '洪翔', 'jerry123', '3dc7a25c2d9336cb7690', '男', '0935555665', 'jerry123@test.com', '苗栗縣頭份市８鄰中華路137巷4號4樓', 0),
(222, 'Elisk', '65dsaf', 'cf8012bb6540aef8b506', '男', '09310603854', 'elisk@test.com', '桃園市中壢區中央路', 1),
(224, 'irene', 'irene@test.com', '875e1f53d168236e4d03', '男', '0912', 'fewfew@feec.com', '台北', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `id` int(10) NOT NULL,
  `header` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `member_list_id` int(10) NOT NULL,
  `main` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `statement` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '待審核',
  `create_time` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `message`
--

INSERT INTO `message` (`id`, `header`, `member_list_id`, `main`, `statement`, `create_time`) VALUES
(1, '西瓜很好吃', 103, '西瓜的品質非常好，值得再次購買', '通過', '2021-05-14 15:23:14'),
(3, '運送碰撞', 113, '雖然多數品質不錯但運送待加強', '通過', '2021-05-14 10:28:52');

-- --------------------------------------------------------

--
-- 資料表結構 `order_list`
--

CREATE TABLE `order_list` (
  `id` int(10) NOT NULL,
  `member_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `product_quantity` int(5) NOT NULL,
  `create_time` datetime DEFAULT current_timestamp(),
  `amount` int(5) NOT NULL,
  `valid` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `order_list`
--

INSERT INTO `order_list` (`id`, `member_id`, `product_id`, `product_quantity`, `create_time`, `amount`, `valid`) VALUES
(1, 115, 2, 4, '2021-05-03 00:00:00', 0, 0),
(2, 111, 2, 3, '2021-04-05 00:00:00', 0, 0),
(3, 112, 3, 4, '2021-04-05 00:00:00', 0, 0),
(4, 113, 2, 0, '0000-00-00 00:00:00', 0, 1),
(9, 110, 2, 20, '2021-04-17 00:00:00', 0, 0),
(10, 110, 2, 5, '2021-04-17 00:00:00', 0, 0),
(11, 110, 2, 4, '2021-04-17 00:00:00', 0, 0),
(14, 113, 2, 5, '2021-05-07 00:00:00', 0, 1),
(15, 113, 3, 5, '2021-05-03 00:00:00', 0, 1),
(16, 110, 1, 5, '2021-05-07 00:00:00', 0, 0),
(17, 110, 1, 10, '2021-05-31 00:00:00', 0, 1),
(18, 110, 2, 5, '2021-05-31 00:00:00', 0, 1),
(20, 115, 1, 46, '2021-05-13 00:00:00', 0, 0),
(21, 116, 1, 3, '0000-00-00 00:00:00', 0, 1),
(22, 110, 2, 5, '0000-00-00 00:00:00', 0, 1),
(23, 107, 1, 5, '0000-00-00 00:00:00', 0, 1),
(24, 108, 1, 10, '0000-00-00 00:00:00', 0, 1),
(25, 111, 1, 50, '0000-00-00 00:00:00', 0, 1),
(26, 109, 1, 10, '0000-00-00 00:00:00', 0, 1),
(27, 105, 1, 10, '0000-00-00 00:00:00', 0, 1),
(28, 108, 2, 5, '2021-05-14 10:34:11', 0, 1),
(29, 111, 3, 6, '2021-05-14 12:28:52', 0, 1),
(30, 108, 2, 10, '2021-05-14 15:13:36', 0, 0),
(31, 109, 2, 5, '2021-05-14 15:13:51', 0, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `storage`
--

CREATE TABLE `storage` (
  `id` int(11) NOT NULL,
  `fruitname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fruittype` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `farmer_list_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `price` int(5) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `storage`
--

INSERT INTO `storage` (`id`, `fruitname`, `fruittype`, `farmer_list_id`, `quantity`, `price`, `content`, `valid`) VALUES
(1, '愛文芒果', '芒果', 204, 10, 21, '白雪公主的最愛', 0),
(2, '非洲香蕉', '香蕉', 205, 33, 40, '泰山的愛', 0),
(3, '金鑽鳳梨', '鳳梨', 205, 2, 22, '救救小農', 0),
(7, '巨峰葡萄', '葡萄', 206, 33, 50, '比拳頭還大', 0),
(10, '愛文芒果', '芒果', 207, 2, 122, '全球熱銷', 1),
(11, '台農一號', '木瓜', 208, 8, 20, '國家隊', 0),
(12, '日昇木瓜', '木瓜', 209, 3, 50, '高雄之光', 0),
(18, '桃園酪梨', '酪梨', 203, 2, 2, '汙染酪梨', 1),
(20, '桃園酪梨', '酪梨', 205, 20, 30, '123', 1),
(21, '桃園酪梨', '酪梨', 205, 20, 30, '123', 0),
(22, '桃園酪梨', '酪梨', 205, 20, 50, '50', 1),
(23, '愛文芒果', '芒果', 206, 50, 20, '100000', 0),
(24, '中壢葡萄', '葡萄', 205, 3, 1, '321', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `subscribe_way` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` datetime NOT NULL DEFAULT current_timestamp(),
  `end_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  `valid` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `subscribe`
--

INSERT INTO `subscribe` (`id`, `user_id`, `product_id`, `subscribe_way`, `start_time`, `end_time`, `status`, `valid`) VALUES
(1, 103, 2, '6', '2021-05-04 18:40:24', '2021-08-04 18:40:24', 1, 1),
(2, 105, 3, '6', '2021-05-05 14:09:19', '2021-08-05 14:09:19', 1, 1),
(3, 105, 1, '3', '2021-05-05 14:10:37', '2021-08-05 14:10:37', 2, 1),
(4, 106, 2, '6', '2021-05-05 14:11:17', '2021-08-05 14:11:17', 1, 1),
(5, 115, 1, '1', '2021-05-07 13:42:24', '2021-06-07 13:42:24', 1, 1),
(6, 110, 2, '1', '2021-05-07 13:43:14', '2021-06-07 13:43:14', 1, 1),
(7, 113, 2, '6', '2021-05-11 21:17:07', '2021-08-11 21:17:07', 1, 1),
(8, 110, 1, '1', '2021-05-12 14:11:42', '2021-06-12 16:33:44', 1, 0),
(9, 112, 2, '3', '2021-05-12 16:22:00', '2021-08-12 16:22:00', 1, 0),
(10, 105, 3, '6', '2021-05-12 16:24:19', '2021-11-12 16:34:08', 1, 0),
(11, 113, 2, '6', '2021-05-12 16:24:31', '2021-11-12 16:24:31', 1, 1),
(12, 112, 1, '6', '2021-05-13 15:16:53', '2021-11-13 15:17:01', 1, 1),
(13, 110, 1, '6', '2021-05-14 10:19:46', '2021-11-14 10:20:21', 1, 1),
(14, 110, 2, '6', '2021-05-14 15:15:00', '2021-11-14 15:15:28', 1, 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `customized_order_detail`
--
ALTER TABLE `customized_order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `po_id` (`po_id`),
  ADD KEY `storage_id` (`storage_id`);

--
-- 資料表索引 `customize_label`
--
ALTER TABLE `customize_label`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `customize_order`
--
ALTER TABLE `customize_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_list_id` (`member_list_id`);

--
-- 資料表索引 `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_number` (`order_number`);

--
-- 資料表索引 `farmer_map`
--
ALTER TABLE `farmer_map`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `farmer_member`
--
ALTER TABLE `farmer_member`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `fruit_class`
--
ALTER TABLE `fruit_class`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `main_product`
--
ALTER TABLE `main_product`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `member_list`
--
ALTER TABLE `member_list`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_list_id` (`member_list_id`);

--
-- 資料表索引 `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `product_id` (`product_id`);

--
-- 資料表索引 `storage`
--
ALTER TABLE `storage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmer_list_id` (`farmer_list_id`);

--
-- 資料表索引 `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `article`
--
ALTER TABLE `article`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `customized_order_detail`
--
ALTER TABLE `customized_order_detail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `customize_label`
--
ALTER TABLE `customize_label`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `customize_order`
--
ALTER TABLE `customize_order`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `evaluation`
--
ALTER TABLE `evaluation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `farmer_map`
--
ALTER TABLE `farmer_map`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `farmer_member`
--
ALTER TABLE `farmer_member`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `fruit_class`
--
ALTER TABLE `fruit_class`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `main_product`
--
ALTER TABLE `main_product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member_list`
--
ALTER TABLE `member_list`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_list`
--
ALTER TABLE `order_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `storage`
--
ALTER TABLE `storage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `customized_order_detail`
--
ALTER TABLE `customized_order_detail`
  ADD CONSTRAINT `customized_order_detail_ibfk_1` FOREIGN KEY (`po_id`) REFERENCES `customize_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customized_order_detail_ibfk_2` FOREIGN KEY (`storage_id`) REFERENCES `storage` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `customize_order`
--
ALTER TABLE `customize_order`
  ADD CONSTRAINT `customize_order_ibfk_1` FOREIGN KEY (`member_list_id`) REFERENCES `member_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `evaluation_ibfk_1` FOREIGN KEY (`order_number`) REFERENCES `customized_order_detail` (`po_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluation_ibfk_2` FOREIGN KEY (`order_number`) REFERENCES `customize_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`member_list_id`) REFERENCES `member_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `order_list`
--
ALTER TABLE `order_list`
  ADD CONSTRAINT `order_list_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_list_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `main_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `storage`
--
ALTER TABLE `storage`
  ADD CONSTRAINT `storage_ibfk_1` FOREIGN KEY (`farmer_list_id`) REFERENCES `farmer_member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `subscribe`
--
ALTER TABLE `subscribe`
  ADD CONSTRAINT `subscribe_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `main_product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subscribe_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `member_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
