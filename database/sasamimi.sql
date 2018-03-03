-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2017 at 11:48 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sasamimi`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product` text COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product`, `id`) VALUES
('[]', 2),
('{"7":1}', 4),
('[]', 5),
('[]', 6);

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `name`) VALUES
(1, 'Mobile'),
(2, 'Laptop'),
(3, 'Tablet'),
(4, 'Phụ Kiện');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(255) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `idUser`, `idProduct`, `title`, `content`, `time`) VALUES
(1, 2, 1, 'test', 'test', '2017-04-29 16:46:21'),
(2, 2, 1, 'abc', 'Giao hàng nhanh đóng gói chắc chắn', '2017-04-29 17:56:21'),
(3, 2, 1, '', 'Giao hàng chậm, sản phẩm không như hình ảnh', '2017-05-01 10:32:53'),
(4, 2, 1, '', 'test', '2017-05-03 16:20:25'),
(5, 4, 5, '', 'test', '2017-05-04 05:16:19'),
(6, 4, 14, 'Sản phẩm đẹp', 'Giao hàng đóng gói tốt', '2017-05-08 17:33:40');

-- --------------------------------------------------------

--
-- Table structure for table `group_user`
--

CREATE TABLE `group_user` (
  `id` int(11) NOT NULL,
  `content` varchar(55) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_user`
--

INSERT INTO `group_user` (`id`, `content`) VALUES
(1, 'Admin'),
(2, 'customer'),
(3, 'sale');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `full_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `idUser`, `full_name`, `phone`, `full_address`, `total_price`, `created`, `status`) VALUES
(1, 2, 'cao van thien', '0974690349', 'dia chi', '14990000', '2017-04-23 19:08:56', 0),
(2, 2, 'cao van thien', '0974690349', 'dia chi', '14990000', '2017-04-23 19:10:13', 0),
(3, 2, 'cao van thien', '0974690349', 'dia chi', '14990000', '2017-04-23 19:10:29', 0),
(4, 6, 'Elizabet Nacy', '0974690349', '241 Ba Đình Hà Nội', '4980000', '2017-05-03 19:19:03', 0),
(5, 4, 'Micheal Robert', '12345678', 'Abc Xyz Ghk', '10990000', '2017-05-08 17:34:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `idProduct` int(11) NOT NULL,
  `quanty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `idOrder`, `idProduct`, `quanty`) VALUES
(1, 3, 1, 1),
(2, 4, 12, 2),
(3, 5, 14, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `idCatalog` int(11) NOT NULL,
  `idSuplier` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_list` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double(15,0) NOT NULL,
  `discount` double(15,0) NOT NULL,
  `system` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `front_camera` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `behind_camera` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `cpu` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `graphics` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `ram` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `disk` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `storage` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `sim` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `connect` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `battery` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `display` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `star` int(11) NOT NULL,
  `view` int(20) NOT NULL,
  `buyed` int(20) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `idCatalog`, `idSuplier`, `name`, `image_link`, `image_list`, `price`, `discount`, `system`, `front_camera`, `behind_camera`, `cpu`, `graphics`, `ram`, `disk`, `storage`, `sim`, `connect`, `battery`, `display`, `content`, `star`, `view`, `buyed`, `total`) VALUES
(1, 1, 7, 'iPhone 7 Plus 256GB', '13245391_482948571902698_7038599756691781397_n.jpg', '[]', 27990000, 0, 'iOS 10', '', '', 'Apple A10 Fusion 4 nhân 64bit', '', 'Không có', '256GB', '', '1', '', '2900 mAh', 'LED-backlit IPS LCD, 5.5', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&lt;h2 style=&quot;margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot; dejavu=&quot;&quot; sans&quot;,=&quot;&quot; &quot;liberation=&quot;&quot; freesans,=&quot;&quot; sans-serif;=&quot;&quot; color:=&quot;&quot; rgb(51,=&quot;&quot; 51,=&quot;&quot; 51);=&quot;&quot; outline:=&quot;&quot; none;=&quot;&quot; zoom:=&quot;&quot; 1;=&quot;&quot; overflow:=&quot;&quot; hidden;=&quot;&quot; text-align:=&quot;&quot; justify;&quot;=&quot;&quot;&gt; <strong style="margin: 0px; padding: 0px;">Với thiết kế kh&ocirc;ng qu&aacute; nhiều thay đổi, vẫn bảo tồn vẻ đẹp truyền thống từ thời&nbsp;<a href="https://www.thegioididong.com/dtdd/iphone-6-plus-64gb" style="margin: 0px; padding: 0px; text-decoration: none; font-stretch: normal; line-height: 18px; color: rgb(80, 168, 227); outline: none; zoom: 1;" target="_blank" title="iPhone 6 Plus" type="iPhone 6 Plus">iPhone 6 Plus</a>, &nbsp;iPhone 7 Plus&nbsp;được trang bị nhiều n&acirc;ng cấp đ&aacute;ng gi&aacute; như camera k&eacute;p, đạt chuẩn chống nước chống bụi c&ugrave;ng cấu h&igrave;nh cực mạnh.</strong></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n', 0, 4, 0, 15),
(2, 1, 7, 'iPhone 7 Plus Red 128GB', '636257958510020562-iphone7plusdo-1o.jpg', '[]', 25190000, 0, 'iOS 10', '', '', 'Apple A10 Fusion 4 nhân', '', 'Không có', '128GB', '', '1', '', '2900 mAh', '', '<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	&nbsp;</p>\r\n<p>\r\n	<strong><span style="font-size: 16pt; font-weight: normal;">iPhone 7 Plus Red 128GB l&agrave; phi&ecirc;n bản iPhone 7 Plus mới được Apple giới thiệu với m&agrave;u sắc mới l&agrave; m&agrave;u Red nhằm kỉ niệm 10 năm&nbsp;hợp t&aacute;c giữa Apple v&agrave; (RED) &ndash; một tổ chức g&acirc;y quỹ hỗ trợ ph&ograve;ng chống AIDS.</span></strong><b><span style="font-size: 16pt;"><o:p></o:p></span></b></p>\r\n<p style="margin: 0in 0in 0.0001pt; font-stretch: normal; outline: none; zoom: 1; overflow: hidden;">\r\n	<span style="font-size:16.0pt;\r\ncolor:#333333">M&agrave;u đỏ l&agrave; tr&ecirc;n chiếc&nbsp;iPhone 7 Plus Red 128GB l&agrave; m&agrave;u lần đầu ti&ecirc;n được Apple mang l&ecirc;n những chiếc iPhone của m&igrave;nh. Theo đ&oacute; th&igrave; những chiếc iPhone mới sẽ c&oacute; mặt lưng được l&agrave;m từ nh&ocirc;m nguy&ecirc;n khối, được sơn l&ecirc;n lớp sơn m&agrave;u đ&oacute; rất nổi bật v&agrave; bắt mắt.<o:p></o:p></span></p>\r\n<p style="margin: 0in 0in 7.5pt; font-stretch: normal; outline: none; zoom: 1; overflow: hidden;">\r\n	<span style="font-size:16.0pt;color:#333333">Điểm cộng của chiếc&nbsp;iPhone 7 Plus Red 128GB mới l&agrave; mặt lưng của m&aacute;y sẽ kh&ocirc;ng để lại mồ h&ocirc;i v&agrave; dấu v&acirc;n tay trong qu&aacute; tr&igrave;nh sử dụng như m&agrave;u Jet Black ra mắt trước đ&oacute;.<o:p></o:p></span></p>\r\n', 0, 0, 0, 10),
(3, 1, 7, 'iPhone 7 Plus 32GB', 'iphone-7-plus-2-400x460-400x460.png', '[]', 21990000, 0, 'iOS 10', '7 MB', 'Hai camera 12 MP', 'Apple A10 Fusion 4 nhân 64-bit', '', '3GB', '32 GB', '', '1', '', '2900 mAh', 'LED-backlit IPS LCD, 5.5", Retina HD', '<p>\r\n	Với thiết kế kh&ocirc;ng qu&aacute; nhiều thay đổi, vẫn bảo tồn vẻ đẹp truyền thống từ thời&nbsp;<a href="https://www.thegioididong.com/dtdd/iphone-6-plus-64gb" target="_blank" title="iPhone 6 Plus">iPhone 6 Plus</a>, &nbsp;iPhone 7 Plus 32GB được trang bị nhiều n&acirc;ng cấp đ&aacute;ng gi&aacute; như camera k&eacute;p, đạt chuẩn chống nước chống bụi c&ugrave;ng cấu h&igrave;nh cực mạnh.</p>\r\n<p>\r\n	Thay đổi d&atilde;y nhựa an-ten bắt s&oacute;ng được đưa v&ograve;ng l&ecirc;n tr&ecirc;n thay v&igrave; cắt ngang ở mặt lưng như trước</p>\r\n<p>\r\n	N&uacute;t Home quen thuộc kh&ocirc;ng c&ograve;n l&agrave; ph&iacute;m vật l&yacute; nữa m&agrave; được thay thế bằng cảm ứng, n&oacute; sẽ rung l&ecirc;n khi bạn ấn. V&igrave; đ&atilde; d&ugrave;ng iPhone một thời gian rất d&agrave;i, n&ecirc;n t&ocirc;i c&ocirc;ng nhận rằng hơi kh&oacute; để l&agrave;m quen với n&oacute;, nhưng c&oacute; lẽ chỉ mất v&agrave;i ng&agrave;y th&ocirc;i.</p>\r\n', 0, 0, 0, 13),
(4, 1, 7, 'iPhone 6s Plus 64GB', 'iphone-6s-plus-64gb-400-400x450.png', '[]', 19990000, 0, 'iOS 9', '5 MP', '12 MP', 'Apple A9 2 nhân 64-bit', '', '2GB', '64 GB', '', '1', '', '2750 mAh', 'LED-backlit IPS LCD, 5.5", Retina HD', '<h2>\r\n	iPhone 6s Plus l&agrave;&nbsp;phi&ecirc;n bản&nbsp;n&acirc;ng cấp ho&agrave;n hảo từ iPhone 6 Plus với nhiều t&iacute;nh năng mới hấp dẫn.</h2>\r\n<h3>\r\n	<strong>Camera được cải tiến iPhone 6s Plus</strong></h3>\r\n<h2>\r\n	&nbsp;</h2>\r\n<p>\r\n	<a href="https://www.thegioididong.com/dtdd/iphone-6s-plus-64gb" title="iPhone 6s Plus 64GB" type="iPhone 6s Plus 64GB">iPhone 6s Plus 64 GB</a>&nbsp;được n&acirc;ng cấp độ ph&acirc;n giải camera sau l&ecirc;n 12 MP (thay v&igrave; 8 MP như tr&ecirc;n&nbsp;<a href="https://www.thegioididong.com/dtdd/iphone-6-plus-64gb" target="_blank" title="Thông tin điện thoại iPhone 6 Plus 64GB">iPhone 6 Plus</a>), camera cho tốc độ lấy n&eacute;t v&agrave; chụp nhanh, thao t&aacute;c chạm để chụp nhẹ nh&agrave;ng. Chất lượng ảnh trong c&aacute;c điều kiện chụp kh&aacute;c nhau tốt.</p>\r\n<p>\r\n	Camera trước với độ ph&acirc;n giải 5 MP cho h&igrave;nh ảnh với độ chi tiết r&otilde; n&eacute;t, đặc biệt m&aacute;y c&ograve;n c&oacute; t&iacute;nh năng Retina Flash, sẽ gi&uacute;p m&agrave;n h&igrave;nh s&aacute;ng l&ecirc;n như đ&egrave;n Flash để bức ảnh khi bạn chụp trong trời tối được tốt hơn</p>\r\n', 0, 0, 0, 15),
(5, 1, 7, 'iPhone 7 32GB', 'iphone-7-8-400x460.png', '[]', 17990000, 0, 'iOS 10', '12 MP', '7 MP', 'Apple A10 Fusion 4 nhân 64-bit', '', '2GB', '32 GB', '', '1', '', '1960 mA', 'LED-backlit IPS LCD, 4.7", Retina HD', '<p>\r\n	<a href="https://www.thegioididong.com/tim-kiem?key=iphone+7" target="_blank" title="Danh sách điện thoại iPhone 7">iPhone 7</a>&nbsp;32 GB vẫn mang tr&ecirc;n m&igrave;nh thiết kế quen thuộc của từ thời iPhone 6 nhưng c&oacute; nhiều thay đổi lớn về phần cứng như trang bị khả năng chống nước, d&agrave;n loa stereo v&agrave; cấu h&igrave;nh cực mạnh.</p>\r\n<p>\r\n	<strong>Camera trước tăng l&ecirc;n 7 MP</strong></p>\r\n<p>\r\n	Một sự cải thiện đ&aacute;ng kể so với iPhone 6s trước đ&oacute;, những tấm ảnh chụp selfie của bạn c&agrave;ng th&ecirc;m độ chi tiết v&agrave; sắc n&eacute;t, bộ nhớ lớn 32 GB cũng gi&uacute;p bạn thoải m&aacute;i chụp v&agrave; lưu trữ ảnh m&agrave; kh&ocirc;ng lo hết dung lượng để lưu.</p>\r\n<p>\r\n	&nbsp;</p>\r\n', 0, 1, 0, 17),
(6, 1, 6, 'Samsung Galaxy S7 Edge', 'samsung-galaxy-s7-edge-1-400x460.png', '[]', 15490000, 0, 'Android 6.0 (Marshmallow)', '5 MB', '12 MB', 'Exynos 8890 8 nhân 64-bit', '', '4GB', '32 GB', '', '1', '', '3600 mAh', 'Super AMOLED, 5.5", Quad HD (2K)', '<p>\r\n	<strong>Samsung Galaxy S7 Edge được thiết kế b&oacute;ng bẩy v&agrave; sang trọng hơn, b&ecirc;n cạnh đ&oacute; viền m&agrave;n h&igrave;nh với nhiều t&ugrave;y chỉnh tiện &iacute;ch, nhiều t&iacute;nh năng cao cấp như chống nước, camera chất lượng cao v&agrave; chụp đ&ecirc;m rất tốt.</strong></p>\r\n<p>\r\n	<strong>Khả năng chống nước, chống bụi an to&agrave;n của Galaxy S7 Edge</strong></p>\r\n', 0, 0, 0, 14),
(7, 1, 6, 'Samsung Galaxy S7', 'samsung-galaxy-s7-2-400x460.png', '[]', 12990000, 0, 'Android 6.0 (Marshmallow)', '5 MB', '15 MB', 'Exynos 8890 8 nhân 64-bit', '', '4GB', '32 GB', '', '1', '', '3000 mAh', 'Super AMOLED, 5.1", Quad HD (2K)', '<p>\r\n	<span style="font-size:12px;"><strong>Với những n&acirc;ng cấp tuyệt vời m&agrave;</strong>&nbsp;<strong><a href="https://www.thegioididong.com/dtdd-samsung" target="_blank" title="Các dòng điện thoại thương hiệu Samsung">Samsung</a></strong>&nbsp;<strong>mang lại cho người d&ugrave;ng như khả năng chống nước, thiết kế ho&agrave;n hảo, Galaxy S7 sẽ khiến bạn kh&ocirc;ng thể rời mắt.</strong></span></p>\r\n<p>\r\n	&nbsp;</p>\r\n', 0, 3, 0, 16),
(8, 1, 6, 'Samsung Galaxy Note 5', 'samsung-galaxy-note-5-1-400x534-1-400x448.png', '[]', 12490000, 0, 'Android 6.0 (Marshmallow)', '5 MB', '16 MB', 'Exynos 7420 8 nhân 64-bit', '', '4GB', '32GB', '', '1', '', '3000 mAh', 'Super AMOLED, 5.7", Quad HD (2K)', '<h3>\r\n	<strong>Thiết kế đột ph&aacute;, cải thiện trải nghiệm người d&ugrave;ng</strong></h3>\r\n<p>\r\n	Galaxy Note 5 trở n&ecirc;n sang trọng v&agrave; quyến rũ khi mang trong m&igrave;nh thiết kế kết hợp giữa khung kim loại chắc chắn v&agrave; mặt k&iacute;nh cường lực b&oacute;ng bẩy gi&uacute;p cầm nắm trong tay thoải m&aacute;i, dễ chịu.</p>\r\n<p>\r\n	B&uacute;t S-pen &ndash; c&aacute;i t&ecirc;n l&agrave;m n&ecirc;n danh tiếng d&ograve;ng Galaxy Note</p>\r\n<p>\r\n	B&uacute;t S-pen tr&ecirc;n Galaxy Note 5 được thiết kế thon gọn hơn để dễ d&agrave;ng thao t&aacute;c, c&aacute;c t&iacute;nh năng mới rất hữu &iacute;ch như c&oacute; thể ghi ch&uacute; trực tiếp m&agrave; kh&ocirc;ng cần mở m&aacute;y, tuy nhi&ecirc;n bạn chỉ ghi ch&uacute; được 1 lần, lần tiếp theo sẽ kh&ocirc;ng thể thao t&aacute;c được nữa.</p>\r\n', 0, 1, 0, 12),
(9, 1, 6, 'Samsung Galaxy C9 Pro', 'samsung-galaxy-c9-pro-1-400x460.png', '[]', 11490000, 0, 'Android 6.0 (Marshmallow)', '16 MB', '16 MB', 'Snapdragon 653 8 nhân 64-bit', '', '4GB', '64GB', '', '1', '', '4000 mAh', 'Super AMOLED, 6", Full HD', '<p>\r\n	<strong>Samsung Galaxy C9 Pro g&acirc;y được sự ch&uacute; &yacute; cho người d&ugrave;ng bởi n&oacute; sở hữu mức RAM l&ecirc;n tới 6 GB, lần đầu ti&ecirc;n c&oacute; một chiếc Galaxy đến từ Samsung sở hữu mức RAM đ&oacute;.</strong></p>\r\n<p>\r\n	<strong>Thiết kế mỏng, sang trọng</strong></p>\r\n<p>\r\n	<strong>K&iacute;ch thước của chiếc C9 Pro thực sự kh&aacute; lớn so với c&aacute;c smartphone đang c&oacute; mặt tr&ecirc;n thị trường hiện nay bởi m&aacute;y sở hữu cho m&igrave;nh một m&agrave;n h&igrave;nh c&oacute; k&iacute;ch thước l&ecirc;n tới 6 inch.</strong></p>\r\n<p>\r\n	Với việc sử dụng tấm nền Supper AMOLED c&ugrave;ng độ ph&acirc;n giải cao Android 6.0 (Marshmallow) được c&agrave;i đặt sẵn cho ph&eacute;p bạn thoải m&aacute;i sử dụng hầu hết c&aacute;c ứng dụng nặng nhất hiện nay tr&ecirc;n Google Play.</p>\r\n<p>\r\n	Samsung cũng trang bị cho m&aacute;y bộ nhớ trong 64 GB cho bạn thoải m&aacute;i lưu trữ dữ liệu c&ugrave;ng kết nối 4G tốc độ cao.</p>\r\n<p>\r\n	Camera sắc n&eacute;t</p>\r\n<p>\r\n	Camera ch&iacute;nh của m&aacute;y sở hữu độ ph&acirc;n giải 16 MP, khẩu độ lớn F/1.9 mang lại khả năng thu s&aacute;ng ấn tượng cho c&aacute;c bức ảnh. M&aacute;y cũng cho khả năng bắt n&eacute;t nhanh, lưu h&igrave;nh tức th&igrave; gi&uacute;p bạn kh&ocirc;ng bị bỏ lỡ khoảnh khắc đẹp trong cuộc sống.</p>\r\n', 0, 0, 0, 15),
(10, 1, 6, 'Samsung Galaxy A7 (2017)', 'samsung-galaxy-a7-2017-2-400x460.png', '[]', 10990000, 0, 'Android 6.0 (Marshmallow)', '16 MB', '16 MB', 'Exynos 7880 8 nhân 64-bit', '', '3GB', '32GB', '', '2', '', '3600 mAh', 'Super AMOLED, 5.7", Full HD', '<p>\r\n	<strong>Samsung Galaxy A7 (2017) tạo bước đột ph&aacute; cho d&ograve;ng A với thiết kế sang trọng v&agrave; đẳng cấp, cấu h&igrave;nh mạnh mẽ, nhiều tiện &iacute;ch cao cấp.</strong></p>\r\n<p>\r\n	Sang trọng, tinh tế: Galaxy A7 (2017) l&agrave; sự kết hợp h&agrave;i ho&agrave; của kim loại cao cấp v&agrave; 2 mặt k&iacute;nh cong kế thừa từ thiết kế của smartphone cao cấp Galaxy S7. C&aacute;c ph&iacute;m tăng giảm &acirc;m lượng được thiết kế tỉ mỉ nằm gọn b&ecirc;n cạnh tr&ecirc;n b&ecirc;n tr&aacute;i.</p>\r\n<p>\r\n	Ph&iacute;m nguồn cũng được l&agrave;m sao cho dễ sử dụng, loa được thiết kế s&aacute;ng tạo gi&uacute;p trải nghiệm &acirc;m thanh tốt hơn</p>\r\n<p>\r\n	M&agrave;n h&igrave;nh Super AMOLED, 5.7 inch, độ ph&acirc;n giải 1080 x 1920 pixels hiển thị sắc n&eacute;t. Mặt k&iacute;nh cong 2.5D thời thượng, thao t&aacute;c chạm lướt sẽ thoải m&aacute;i v&agrave; mượt m&agrave; hơn.</p>\r\n', 0, 2, 0, 20),
(11, 1, 8, 'LG X Power', 'lg-x-power-400-400x460.png', '[]', 3490000, 0, 'Android 6.0 (Marshmallow)', '', '', 'MT6735 4 nhân 64-bit', '', 'Không có', '16 GB', '', '1', '', '4100 mAh', 'IPS LCD, 5.3', '<p>\r\n	LG X Power c&oacute; vi&ecirc;n pin khủng 4100 mAh, sản phẩm c&ograve;n c&oacute; Android 6.0 v&agrave; hỗ trợ kết nối 4G.</p>\r\n<p>\r\n	LG X Power với dung lượng pin khủng</p>\r\n<p>\r\n	Th&ocirc;ng thường smartphone chỉ c&oacute; thể sử dụng được một ng&agrave;y ở cường độ tr&ecirc;n trung b&igrave;nh. Tuy nhi&ecirc;n với 4100 mAh của LG X Power bạn c&oacute; thời gian sử dụng l&ecirc;n đến 2 ng&agrave;y.</p>\r\n<p>\r\n	Khả năng sạc nhanh v&agrave; chia sẻ dung lượng</p>\r\n<p>\r\n	Ngo&agrave;i ra thiết bị hỗ trợ c&ocirc;ng nghệ sạc pin nhanh v&agrave; hơn nữa c&oacute; thể sạc được pin cho c&aacute;c thiết bị kh&aacute;c nhờ kết nối OTG.</p>\r\n', 0, 0, 0, 10),
(12, 1, 8, 'LG K10', 'lg-k10-400-460-400x460.png', '[]', 2490000, 0, 'Android 5.0 (Lollipop)', '5 MB', '8 MB', 'MTK 6582 4 nhân 32-bit', '', '1GB', '8 GB', '', '2', '', '2300 mAh', 'IPS LCD, 5.3", HD', '<p>\r\n	M&agrave;n h&igrave;nh hiển thị đẹp, thiết kế mỏng tinh tế c&ugrave;ng camera v&agrave; cấu h&igrave;nh ổn l&agrave; những g&igrave; LG K10 đang thể hiện rất tốt.</p>\r\n<p>\r\n	Thiết kế mỏng tinh tế của LG K10</p>\r\n<p>\r\n	Camera kh&aacute; tốt</p>\r\n<p>\r\n	Camera ch&iacute;nh với độ ph&acirc;n giải 8 MP tr&ecirc;n LG K10 kh&ocirc;ng qu&aacute; xuất sắc nhưng trong c&aacute;c điều kiện &aacute;nh s&aacute;ng tốt, đầy đủ m&aacute;y vẫn cho nước ảnh tốt v&agrave; s&aacute;ng.</p>\r\n', 0, 5, 0, 4),
(13, 1, 9, 'Sony Xperia XZs', 'sony-xperia-xzs-400x460.png', '[]', 14990000, 0, 'Android 7.0', '', '', 'Snapdragon 820 4 nhân 64-bit', '', 'Không có', '64 GB', '', '1', '', '2900 mAh', 'IPS LCD, 5.2', '<p>\r\n	Sony Xperia XZs l&agrave; smartphone được Sony đầu tư mạnh mẽ về camera với h&agrave;ng loạt c&aacute;c trang bị cao cấp v&agrave; sở hữu cho m&igrave;nh một mức gi&aacute; b&aacute;n hợp l&yacute; với người ti&ecirc;u d&ugrave;ng.</p>\r\n<p>\r\n	Thiết kế quen thuộc</p>\r\n<p>\r\n	M&aacute;y vẫn sở hữu thiết kế quen thuộc được thừa hưởng từ chiếc Xperia XZ đ&atilde; ra mắt trước đ&oacute;. Điểm kh&aacute;c biệt để ph&acirc;n biệt nằm ở mặt lưng khi XZs được trang bị cụm camera ch&iacute;nh với nhiều cảm biến hơn.</p>\r\n<p>\r\n	Thiết kế vu&ocirc;ng vức, sạng trọng v&agrave; mạnh mẽ XZs mang đến cho người d&ugrave;ng sự chắc chắn v&agrave; cứng c&aacute;p khi cầm nắm tr&ecirc;n tay.</p>\r\n<p>\r\n	Mặt k&iacute;nh của m&aacute;y cũng được ho&agrave;n thiện cong 2.5D mang lại trải nghiệm thực sự tốt khi vuốt từ c&aacute;c m&eacute;p của cạnh viền v&agrave;o m&agrave;n h&igrave;nh.</p>\r\n', 0, 0, 0, 10),
(14, 1, 9, 'Sony Xperia XZ', 'sony-xperia-xz-1-400x460.png', '[]', 10990000, 0, 'Android 7.0', '13 MB', '13 MB', 'Snapdragon 820 4 nhân 64-bit', '', '3GB', '64 GB', '', '1', '', '2900 mAh', 'TRILUMINOS™, 5.2", Full HD', '<p>\r\n	Sony Xperia XZ với thiết kế cực đẹp, c&ugrave;ng camera chất lượng hơn, nhiều t&iacute;nh năng tiện &iacute;ch hơn.</p>\r\n<p>\r\n	Thiết kế sang trọng</p>\r\n<p>\r\n	Cải tiến hơn so với thiết kế truyền thống của d&ograve;ng Xperia, Sony Xperia XZ mang tr&ecirc;n m&igrave;nh diện mạo mới - đẹp hơn, sang trọng hơn.</p>\r\n<p>\r\n	Sony Xperia XZ được trang bị c&ocirc;ng nghệ m&agrave;n h&igrave;nh TRILUMINOSTM k&iacute;ch thước 5.2 inch c&ugrave;ng độ ph&acirc;n giải FullHD gi&uacute;p h&igrave;nh ảnh hiển thị tốt, m&agrave;u sắc trung thực v&agrave; thời lượng pin được tăng cường đ&aacute;ng kể nhờ m&agrave;n h&igrave;nh kh&ocirc;ng qu&aacute; to</p>\r\n', 0, 2, 0, 4),
(15, 1, 9, 'Sony Xperia Z5 Dual', 'sony-xperia-z5-dual-400x460.png', '[]', 9990000, 0, 'Android 6.0 (Marshmallow)', '5 MB', '23 MB', 'Snapdragon 810 8 nhân 64-bit', '', '3GB', '32 GB', '', '2', '', '2900 mAh', 'IPS LCD, 5.2", Full HD', '<p>\r\n	Xperia Z5 Dual l&agrave; smartphone chủ lực của Sony với nhiều cải tiến về c&ocirc;ng nghệ lẫn thiết kế sẽ mang lại nhiều th&iacute;ch th&uacute; cho bạn.</p>\r\n<p>\r\n	Cảm biến v&acirc;n tay dễ d&agrave;ng sử dụng v&agrave; nhận diện nhanh ch&oacute;ng</p>\r\n<p>\r\n	Cảm biến v&acirc;n tay một chạm tr&ecirc;n Xperia Z5 Dual c&oacute; tốc độ xử l&yacute; nhanh, nhạy gi&uacute;p cho mở kh&oacute;a nhanh hơn, ngo&agrave;i ra cảm biến được đặt ngay vị tr&iacute; rất dễ để thao t&aacute;c nhanh ch&oacute;ng mở kh&oacute;a.</p>\r\n<p>\r\n	Camera cho tốc độ lấy n&eacute;t si&ecirc;u nhanh</p>\r\n<p>\r\n	Camera tr&ecirc;n m&aacute;y được t&iacute;ch hợp cảm biến Exmor RS cho tốc độ lấy n&eacute;t nhanh chỉ 0.03 gi&acirc;y, độ ph&acirc;n giải cao 23 MP hỗ trợ chống rung quang học, chụp thiếu s&aacute;ng tốt, quay video 4K hay khả năng zoom gấp 5 lần m&agrave; kh&ocirc;ng ảnh hưởng đến chất lượng ảnh qu&aacute; nhiều.</p>\r\n', 0, 1, 0, 4),
(16, 1, 9, 'Sony Xperia X', 'sony-xperia-x-1-400x460.png', '[]', 7990000, 0, 'Android 6.0 (Marshmallow)', '13 MB', '23 MB', 'Snapdragon 650 6 nhân 64-bit', '', '3GB', '64GB', '', '2', '', '2620 mAh', 'IPS LCD, 5", Full HD', '<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden; text-align: justify;">\r\n	<span style="font-size:14px;"><span style="font-family:times new roman,times,serif;"><a href="https://www.thegioididong.com/dtdd-sony" style="margin: 0px; padding: 0px; text-decoration-line: none; font-stretch: normal; line-height: 18px; color: rgb(80, 168, 227); outline: none; zoom: 1;" target="_blank" title="Điện thoại hãng Sony">Sony</a>&nbsp;vừa giới thiệu d&ograve;ng sản phẩm X Serie mới của h&atilde;ng trong năm 2016 tại triển l&atilde;m MWC. Xperia X l&agrave; chiếc smartphone tầm trung mới với nhiều điểm nhấn đ&aacute;ng ch&uacute; &yacute;.</span></span></p>\r\n<p style="text-align: justify;">\r\n	<span style="font-size:14px;"><span style="font-family:times new roman,times,serif;"><span style="color: rgb(51, 51, 51); text-align: justify;">Sony Xperia X vẫn mang trong m&igrave;nh b&oacute;ng d&aacute;ng của c&aacute;c anh em d&ograve;ng Z Series với phong c&aacute;ch thiết kế omibaland quen thuộc. M&aacute;y tr&ocirc;ng vẫn rất sang trọng đ&uacute;ng phong c&aacute;ch rất &ldquo;Sony&rdquo;. Ch&uacute;ng ta sẽ c&oacute; phần ph&iacute;a tr&ecirc;n v&agrave; ph&iacute;a dưới m&agrave;n h&igrave;nh đối xứng nhau về độ rộng của viền m&agrave;n h&igrave;nh cũng như vị tr&iacute; đặt loa ngo&agrave;i</span></span></span></p>\r\n', 0, 0, 0, 7),
(17, 1, 9, 'Sony Xperia XA Ultra', 'sony-xperia-xa-ultra-trang1-180x125.png', '[]', 7490000, 0, 'Helio P10 8 nhân 64-bit', '', '', 'Android 6.0 (Marshmallow)', '', 'Không có', '64 GB', '', '1', '', '2700 mAh', 'IPS LCD, 6', '<p c="" camera="" cao="" color:="" dejavu="" i="" liberation="" n="" ng="" nh="" outline:="" overflow:="" p="" sony="" span="" style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, " text-align:="" u="" ultra="" xa="" xperia="" zoom:="">\r\n	<span style="font-size:14px;"><a href="https://www.thegioididong.com/dtdd-sony" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227); font-size: 16px;" target="_blank" title="Điện thoại Sony">Sony</a>&nbsp;Xperia XA Ultra mang trong m&igrave;nh m&agrave;n h&igrave;nh c&oacute; k&iacute;ch thước 6 inch độ ph&acirc;n giải&nbsp;1080 x 1920 pixels c&ugrave;ng tấm nền&nbsp;<a href="https://www.thegioididong.com/tin-tuc/loai-man-hinh-tft-lcd-amoled-la-gi--592346#ipslcd" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227); font-size: 16px;" target="_blank" title="IPS LCD">IPS LCD</a>. M&aacute;y đem lại m&agrave;u sắc thể hiện kh&aacute; sắc n&eacute;t c&ugrave;ng một g&oacute;c nh&igrave;n rộng cho bạn thoải m&aacute;i chia sẻ nội dung với bạn b&egrave;.</span></p>\r\n', 0, 0, 0, 12),
(18, 1, 9, 'Sony Xperia XA1', 'sony-xperia-xa1-400x460.png', '[]', 6490000, 0, 'Android 7.0', '', '', 'Mediatek Helio P20', '', 'Không có', '32', '', '1', '', '2300 mAh', 'IPS LCD, 5', '<p a="" c="" camera="" cao="" color:="" dejavu="" href="https://www.thegioididong.com/dtdd/sony-xperia-xa" i="" liberation="" m="" n="" ng="" nh="" outline:="" overflow:="" p="" span="" strong="" style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, " t="" target="_blank" title="Xperia XA" trang="" type="Xperia XA" u="" xa1="" xperia="" zoom:="">\r\n	<em><span style="font-size: 16px;">Điểm n&acirc;ng cấp dễ d&agrave;ng nhận thấy nhất của XA1 ch&iacute;nh l&agrave; thiết kế. Năm nay Sony vẫn giữ nguy&ecirc;n ưu điểm 2 cạnh b&ecirc;n kh&ocirc;ng viền sexy, nhưng ng&ocirc;n ngữ thiết kế được &aacute;p dụng tr&ecirc;n XA1 lại mang hơi hướng giống với d&ograve;ng flagship Xperia XZ hơn.</span></em></p>\r\n', 0, 0, 0, 14),
(19, 1, 9, 'Sony Xperia M5 (Single SIM)', 'sony-xperia-xz-1-400x460.png', '[]', 5990000, 0, 'IPS LCD, 5", Full HD', '13 MB', '21.5 MB', 'MT6795 (Helio x10) 8 nhân 64-bit', '', '3GB', '16 GB', '', '1', '', '2600 mAh', 'IPS LCD, 5", Full HD', '<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden; text-align: justify;">\r\n	<span style="font-size:14px;">Sony Xperia M5 (Single SIM) l&agrave; sự kết hợp h&agrave;i h&ograve;a c&aacute;c ưu điểm giữa Xperia Z3 Plus v&agrave; M4 Aqua để đưa ra sản phẩm tốt nhất, khắc phục một v&agrave;i hạn chế ở chiếc M4 trước kia.</span></p>\r\n<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden; text-align: justify;">\r\n	<span style="margin: 0px; padding: 0px; font-size: 16px; line-height: 1.6;">M&aacute;y được ho&agrave;n thiện với chất lượng tốt, đậm phong c&aacute;ch quen thuộc của c&aacute;c d&ograve;ng điện thoại&nbsp;</span><a href="https://www.thegioididong.com/dtdd-sony" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227); font-size: 16px; line-height: 1.6;" target="_blank" title="Điện thoại hãng Sony">Sony</a><span style="margin: 0px; padding: 0px; font-size: 16px; line-height: 1.6;">, bao phủ to&agrave;n bộ m&aacute;y l&agrave; hai mặt k&iacute;nh được l&agrave;m từ nhựa, chống xước. Khung viền xung quanh của m&aacute;y bằng chất liệu kim loại v&agrave; được gia cố ở bốn g&oacute;c nhằm bảo vệ m&aacute;y một c&aacute;ch tối đa khi c&oacute; va đập xảy ra.</span></p>\r\n', 0, 0, 0, 11),
(20, 1, 9, 'Sony Xperia XA', 'sony-xperia-xa-400x460-400x460.png', '[]', 4490000, 0, 'Android 6.0 (Marshmallow)', '', '', 'Helio P10 8 nhân 64-bit', '', 'Không có', '16 GB', '', '1', '', '2300 mAh', 'IPS LCD, 5', '<p a="" c="" color:="" dejavu="" i="" liberation="" n="" ng="" nh="" outline:="" overflow:="" p="" smartphone="" sony="" span="" strong="" style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, " t="" text-align:="" trong="" trung="" u="" xa="" xperia="" zoom:="">\r\n	<span style="font-family:times new roman,times,serif;"><span style="font-size:14px;">Với thiết kế nguy&ecirc;n khối v&agrave; c&aacute;c g&oacute;c cạnh được&nbsp;<span style="margin: 0px; padding: 0px;">bo tr&ograve;n</span>&nbsp;cho cảm gi&aacute;c cầm chắc tay. M&agrave;n h&igrave;nh của Xperia XA l&agrave; m&agrave;n h&igrave;nh&nbsp;<a href="https://www.thegioididong.com/tin-tuc/loai-man-hinh-tft-lcd-amoled-la-gi--592346#ipslcd" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227); font-size: 16px;" target="_blank" title="Tìm hiều màn hình IPS LCD">IPS LCD</a>&nbsp;c&oacute; k&iacute;ch thước 5 inch với độ ph&acirc;n giải HD 720p cho chất lượng h&igrave;nh ảnh sắc n&eacute;t, sống động</span></span></p>\r\n', 0, 1, 0, 11),
(21, 2, 10, 'Asus E402SA N3060', 'asus-e402sa-wx251t-400-400x400.png', '[]', 6290000, 0, '', '', '', 'Intel, Intel Celeron, N3060, 1.60 GHz', 'Intel® HD Graphics', '2GB', 'HDD: 500 GB', '', '', 'HDMI, LAN (RJ45), USB 2.0, USB 3.0, VGA (D-Sub)', 'Li-Ion 2 cell', '14 inch, HD (1366 x 768)', '<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<span style="font-size:14px;"><span style="font-family:times new roman,times,serif;"><strong style="margin: 0px; padding: 0px;">Asus E402SA N3060 l&agrave; bản n&acirc;ng cấp nhẹ với chip xử l&yacute; Celeron cho khả năng hoạt động tốt hơn</strong></span></span></p>\r\n<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<span style="font-size:14px;">Kh&ocirc;ng c&oacute; qu&aacute; nhiều sự kh&aacute;c biệt so với bản&nbsp;<a href="https://www.thegioididong.com/laptop/asus-e402sa-n3050-2gb-500gb-win10" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227); font-size: 16px;" target="_blank" title="Laptop Asus E402SA N3050/2GB/500GB/Win10">Asus E402SA N3050</a>, Asus E402SA được sử dụng chip&nbsp;<a href="https://www.thegioididong.com/tin-tuc/tim-hieu-vi-xu-ly-may-tinh-cpu-intel-596066#intelceleron" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227); font-size: 16px;" target="_blank" title="Tìm hiểu chip máy tính Celeron">Celeron</a>&nbsp;phi&ecirc;n bản tốt hơn l&agrave; N3060, gi&uacute;p m&aacute;y hoạt động c&oacute; phần nhẹ nh&agrave;ng hơn.</span></p>\r\n', 0, 0, 0, 5),
(22, 2, 10, 'Asus X441SA N3710', 'asus-x441sa-n3710-400-400x400.png', '[]', 7490000, 0, '', '', '', 'Intel, Intel Pentium, N3710, 1.60 GHz', 'Intel® HD Graphics', '4GB', 'HDD: 500 GB', '', '', 'HDMI, LAN (RJ45), USB 2.0, USB 3.0, USB Type-C, VGA (D-Sub)', 'Li-Ion 3 cell', '14 inch, HD (1366 x 768)', '<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<span style="font-size:14px;"><span style="font-family:times new roman,times,serif;"><strong style="margin: 0px; padding: 0px;"><a href="https://www.thegioididong.com/laptop-asus" style="margin: 0px; padding: 0px; text-decoration-line: none; font-stretch: normal; line-height: 18px; color: rgb(80, 168, 227); outline: none; zoom: 1;" target="_blank" title="Laptop hãng Asus">Asus</a>&nbsp;X441SA N3710 l&agrave; bản n&acirc;ng cấp kh&aacute; hơn với chip xử l&yacute; Pentium cho khả năng hoạt động tốt hơn.</strong></span></span></p>\r\n<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<span style="font-size: 16px;">Asus E402SA được sử dụng chip&nbsp;</span><a href="https://www.thegioididong.com/tin-tuc/tim-hieu-vi-xu-ly-may-tinh-cpu-intel-596066#intelpentinum" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227); font-size: 16px;" target="_blank" title="Tìm hiểu chip xử lý Pentium">Pentium</a><span style="font-size: 16px;">&nbsp;phi&ecirc;n bản tốt hơn l&agrave; N3710, gi&uacute;p m&aacute;y hoạt động c&oacute; phần nhẹ nh&agrave;ng hơn.</span></p>\r\n', 0, 3, 0, 7),
(23, 2, 10, 'Asus X441NA N4200', 'asus-x441sa-n3710-4gb-500gb-win10-den-2.jpg', '[]', 7490000, 0, '', '', '', 'Intel Pentium, N4200, 1.10 GHz', 'Intel® HD Graphics', '4GB', 'HDD: 500', '', '', 'HDMI, LAN (RJ45), USB 2.0, USB 3.0, USB Type-C, VGA (D-Sub)', 'Li-Ion 3 cell', '14 inch, HD (1366 x 768)', '<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<span style="font-size:14px;"><span style="font-family:times new roman,times,serif;"><strong style="margin: 0px; padding: 0px;">Asus X441NA N4200 l&agrave; sự lựa chọn gi&aacute; tốt ph&ugrave; hợp với học sinh - sinh vi&ecirc;n hoặc người d&ugrave;ng l&agrave;m việc văn ph&ograve;ng, giải tr&iacute; nhẹ</strong></span></span></p>\r\n<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<span style="font-size: 16px;">M&aacute;y t&iacute;ch hợp&nbsp;</span><a href="https://www.thegioididong.com/tin-tuc/tim-hieu-vi-xu-ly-may-tinh-cpu-intel-596066#intelpentinum" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227); font-size: 16px;" target="_blank" title="Intel Pentium">Intel Pentium</a><span style="font-size: 16px;">&nbsp;</span><strong style="margin: 0px; padding: 0px; font-size: 16px;">N4200</strong><span style="font-size: 16px;">&nbsp;với tốc độ&nbsp;</span><strong style="margin: 0px; padding: 0px; font-size: 16px;">1.10 GHz</strong><span style="font-size: 16px;">&nbsp;hoạt động ổn với c&aacute;c phần mềm nhẹ cơ bản. RAM&nbsp;</span><strong style="margin: 0px; padding: 0px; font-size: 16px;">4 GB</strong><span style="font-size: 16px;">&nbsp;</span><a href="https://www.thegioididong.com/hoi-dap/ram-ddr3l-on-board-la-nhu-the-nao-951049" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227); font-size: 16px;" target="_blank" title="DDR3L">DDR3L</a><span style="font-size: 16px;">&nbsp;c&ugrave;ng với ổ cứng lưu trữ&nbsp;</span><a href="https://www.thegioididong.com/hoi-dap/hdd-la-gi-922791" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227); font-size: 16px;" target="_blank" title="HDD">HDD</a><span style="font-size: 16px;">&nbsp;</span><strong style="margin: 0px; padding: 0px; font-size: 16px;">500 GB</strong><span style="font-size: 16px;">&nbsp;gi&uacute;p bạn lưu trữ được kh&aacute; nhiều dữ liệu để học tập, l&agrave;m việc</span></p>\r\n', 0, 1, 0, 7),
(24, 2, 10, 'Asus TP201SA N3710', 'asus-tp201sa-n3710-vang-400-400x400-400x400-400x400.png', '[]', 9490000, 0, '', '', '', 'Intel Pentium, N3710, 1.60 GHz', 'Intel® HD Graphics', '4GB', 'HDD: 500', '', '', 'HDMI, USB 2.0, USB 3.0, USB Type-C', 'Li-Ion 3 cell', '11.6 inch, HD (1366 x 768)', '<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<span style="font-size:14px;"><span style="font-family:times new roman,times,serif;"><strong style="margin: 0px; padding: 0px;"><a href="https://www.thegioididong.com/laptop-asus" style="margin: 0px; padding: 0px; text-decoration-line: none; font-stretch: normal; line-height: 18px; color: rgb(80, 168, 227); outline: none; zoom: 1;" target="_blank" title="Laptop hãng Asus">Asus</a>&nbsp;</strong><strong style="margin: 0px; padding: 0px;">T</strong><strong style="margin: 0px; padding: 0px;">P201</strong><strong style="margin: 0px; padding: 0px;">SA N3710 l&agrave; chiếc laptop c&oacute; k&iacute;ch thước nhỏ gọn, th&iacute;ch hợp với nhu cầu giải tr&iacute; cơ bản.</strong><strong style="margin: 0px; padding: 0px;">Xoay m&aacute;y theo c&aacute;c hướng kh&aacute;c nhau t&ugrave;y theo nhu cầu sử dụng</strong></span></span></p>\r\n', 0, 0, 0, 9),
(25, 2, 10, 'Asus A540LA', 'asus-a540la-i3-5005u-4gb-500gb-win10-400-400x400.png', '[]', 9690000, 0, '', '', '', 'Intel Core i3 Broadwell, 5005U, 2.00 GHz', 'Intel® HD Graphics 5500', '4GB', 'HDD: 500', '', '', 'HDMI, LAN (RJ45), USB 2.0, USB 3.0, USB Type-C, VGA (D-Sub)', 'Li-Ion 3 cell', '15.6 inch, HD (1366 x 768)', '<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden; text-align: justify;">\r\n	<span style="font-size:14px;"><span style="font-family:times new roman,times,serif;"><strong style="margin: 0px; padding: 0px;">Asus A540LA i3 5005U c&oacute; cấu h&igrave;nh kh&aacute; tốt v&agrave; nhiều t&iacute;nh năng mới, k&egrave;m với mức gi&aacute; vừa phải, ph&ugrave; hợp với điều kiện kinh tế v&agrave; nhu cầu của nhiều người sử dụng.</strong></span></span></p>\r\n<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden; text-align: justify;">\r\n	<span style="font-size:14px;"><span style="font-family:times new roman,times,serif;"><strong style="margin: 0px; padding: 0px;">Asus A540LA i3 5005U chơi được những Game g&igrave;?</strong></span></span></p>\r\n<p style="margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; font-size: 16px; text-align: justify;">\r\n	Với vi xử l&yacute;&nbsp;<a href="https://www.thegioididong.com/tin-tuc/tim-hieu-vi-xu-ly-may-tinh-cpu-intel-596066#broadwell" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227);" target="_blank" title="Tìm hiểu chip Broadwell">Core i3 Broadwell</a>&nbsp;c&oacute; xung nhịp&nbsp;<strong style="margin: 0px; padding: 0px;">2.0 GHz</strong>,&nbsp;<strong style="margin: 0px; padding: 0px;">RAM 4GB</strong>, đồ họa&nbsp;<a href="https://www.thegioididong.com/hoi-dap/intel-hd-graphics-754665" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227);" target="_blank" title="Intel® HD Graphics 5500">Intel&reg; HD Graphics 5500</a>&nbsp;sẽ đem lại những trải nghiệm tuyệt vời với nhiều tựa game. K&egrave;m theo ổ cứng HDD 500GB cho ph&eacute;p lưu trữ dữ liệu thoải m&aacute;i.</p>\r\n', 0, 0, 0, 8),
(26, 2, 13, 'Dell Inspiron 3462 N4200', 'dell-inspiron-3462-n4200-6pftf1-400-400x460-400x460.png', '[]', 7690000, 0, '', '', '', 'Intel Pentium, N4200, 1.10 GHz', 'Intel® HD Graphics', '4GB', 'HDD: 500', '', '', '2 x USB 3.0, HDMI, USB 2.0', 'Li-Ion 4 cell', '14 inch, HD (1366 x 768)', '<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<span style="font-size:14px;"><span style="font-family:times new roman,times,serif;"><strong style="margin: 0px; padding: 0px;">Với chip Intel Pentium N4200 1.10 GHz, bộ nhớ Ram 4GB&nbsp;trong tầm gi&aacute; thấp nhưng những trải nghiệm thực tế Dell Inspiron 3462 c&oacute; kết quả&nbsp;kh&aacute; ngạc nhi&ecirc;n về hiệu suất sử dụng.</strong></span></span></p>\r\n<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<span style="font-size: 16px;"><span style="font-size:14px;">C&oacute; thể n&oacute;i nh&igrave;n cấu h&igrave;nh m&aacute;y sẽ ph&ugrave; hợp hơn với nhu cầu học tập, văn ph&ograve;ng , ứng dụng v&agrave; game nhẹ. Thế nhưng với trải nghiệm thực tế th</span>&igrave;&nbsp;</span><span style="font-size:14px;"><strong style="margin: 0px; padding: 0px; font-size: 16px;">Dell Inspiron 3462</strong>&nbsp;c&oacute; thể chơi được một trong c&aacute;c game nổi tiếng hiện tại:&nbsp;<strong style="margin: 0px; padding: 0px; font-size: 16px;">Li&ecirc;n Minh Huyền Thoại, Fifa Online 3, Modern Combat 5: Blackout, Zing Play</strong>&hellip;</span></p>\r\n', 0, 0, 0, 7),
(27, 2, 13, 'Dell Inspiron 3567', 'dell-inspiron-3567-i3-6006u-400-400x460.png', '[]', 10890000, 0, '', '', '', 'Intel Core i3 Skylake, 6006U, 2.00 GHz', 'Intel® HD Graphics 520', '4GB', 'HDD: 1 TB', '', '', '2 x USB 3.0, HDMI, LAN (RJ45), USB 2.0', 'Li-Ion 4 cell', '15.6 inch, HD (1366 x 768)', '<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<span style="font-family:times new roman,times,serif;"><span style="font-size:14px;"><strong style="margin: 0px; padding: 0px;">Dell Inspiron 3567 i3 6006U l&agrave; phi&ecirc;n bản n&acirc;ng cấp với RAM 4 GB c&ugrave;ng một ổ đĩa quang tiện dụng, l&agrave; chiếc laptop th&iacute;ch hợp d&agrave;nh cho việc giải tr&iacute;.</strong></span></span></p>\r\n<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<span style="font-family:times new roman,times,serif;"><span style="font-size: 16px;">Với&nbsp;</span><a href="https://www.thegioididong.com/hoi-dap/intel-core-the-he-thu-6-skylake-774739#i3" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227); font-size: 16px;" target="_blank" title="Intel Core i3 Skylake 6198DU">Intel Core i3 Skylake 6198DU</a><span style="font-size: 16px;">&nbsp;kh&aacute; tốt c&ugrave;ng với ổ cứng lưu trữ HDD 1TB, m&aacute;y đ&aacute;p ứng đầy đủ nhu cầu về xem phim, chơi game.</span></span></p>\r\n', 0, 0, 0, 11),
(28, 2, 13, 'Dell Inspiron 3467', 'dell-inspiron-3467-i5-7200u-c4i5107w-1-300-300x300.jpg', '[]', 11290000, 0, '', '', '', 'Intel Core i3 Kabylake, 7100U, 2.30 GHz', 'Intel® HD Graphics 620', '4GB', 'HDD: 1 TB', '', '', '2 x USB 3.0, HDMI, LAN (RJ45), USB 2.0', 'Li-Ion 4 cell', '14 inch, HD (1366 x 768)', '<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<span style="font-size:14px;"><span style="font-family:times new roman,times,serif;"><strong style="margin: 0px; padding: 0px;">Laptop Dell Inspiron 3467 trang bị vi xử l&yacute; Core i3 thế hệ thứ 7 đem lại hiệu suất l&agrave;m việc mạnh hơn c&aacute;c thế hệ trước đ&acirc;y, t&iacute;ch hợp với Ram 4 GB v&agrave; c&oacute; thể hỗ trợ n&acirc;ng cấp tối đa 8 GB gi&uacute;p m&aacute;y vận h&agrave;nh mượt m&agrave; c&aacute;c nhu cầu kh&aacute;c nhau</strong></span></span></p>\r\n<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<span style="font-family:times new roman,times,serif;"><span style="font-size: 16px;">Tuy kh&ocirc;ng hỗ trợ&nbsp;</span><a href="https://www.thegioididong.com/tin-tuc/card-do-hoa-roi-tren-laptop-594941" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227); font-size: 16px;" target="_blank" title="card đồ họa rời">card đồ họa rời</a><span style="font-size: 16px;">, thế nhưng với sự hỗ trợ card&nbsp;</span><a href="https://www.thegioididong.com/hoi-dap/intel-hd-graphics-620-co-manh-khong-953533" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227); font-size: 16px;" target="_blank" title="Intel HD Graphics 620">Intel HD Graphics 620</a><strong style="margin: 0px; padding: 0px; font-size: 16px;">&nbsp;</strong><span style="font-size: 16px;">k&egrave;m theo ổ cứng&nbsp;</span><strong style="margin: 0px; padding: 0px; font-size: 16px;">HDD</strong><span style="font-size: 16px;">&nbsp;l&ecirc;n đến&nbsp;</span><strong style="margin: 0px; padding: 0px; font-size: 16px;">1TB</strong><span style="font-size: 16px;">&nbsp;gi&uacute;p lưu trữ được nhiều dữ liệu v&agrave; game hơn.</span></span></p>\r\n', 0, 0, 0, 13),
(29, 2, 13, 'Dell Vostro 3468', 'dell-vostro-3468-i3-7100u-400-400x460copy-400x460.png', '[]', 11490000, 0, '', '', '', 'Intel, Intel Core i3 Kabylake, 7100U, 2.40 GHz', 'Intel® HD Graphics 620', '4GB', 'HDD: 1 TB', '', '', '2 x USB 3.0, HDMI, LAN (RJ45), USB 2.0, VGA (D-Sub)', 'Li-Ion 4 cell', '14 inch, HD (1366 x 768)', '<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<span style="font-size:14px;"><span style="font-family:times new roman,times,serif;"><strong style="margin: 0px; padding: 0px;"><a href="https://www.thegioididong.com/laptop-dell" style="margin: 0px; padding: 0px; text-decoration-line: none; font-stretch: normal; line-height: 18px; color: rgb(80, 168, 227); outline: none; zoom: 1;" target="_blank" title="Laptop hãng Dell">Dell</a>&nbsp;Vostro 3468 i3 7100U&nbsp;l&agrave; phi&ecirc;n bản r&uacute;t gọn cấu h&igrave;nh cơ bản nhất nhưng vẫn được trang bị chip xử l&yacute; thế hệ mới nhất, bảo mật v&acirc;n tay c&ugrave;ng&nbsp;<a href="https://www.thegioididong.com/tin-tuc/o-cung-la-gi-co-may-loai--590183#hdd" style="margin: 0px; padding: 0px; text-decoration-line: none; font-stretch: normal; line-height: 18px; color: rgb(80, 168, 227); outline: none; zoom: 1;" target="_blank" title="Tìm hiểu ổ cứng HDD">ổ cứng HDD</a>&nbsp;l&ecirc;n đến 1 TB</strong></span></span></p>\r\n', 0, 0, 0, 11),
(30, 2, 14, 'Lenovo IdeaPad 100S', 'lenovo-ideapad-100s-400-400x400.png', '[]', 3990000, 0, '', '', '', 'Intel Atom, Z3735F Quad-Core, 1.33 GHz', 'Intel® HD Graphics', '2GB', 'eMMC: 32 GB', '', '', '2 x USB 2.0, HDMI, Micro SD', '8.400 mAh - 2 cell', '11.6 inch, HD (1366 x 768)', '<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden; text-align: justify;">\r\n	<span style="font-family:times new roman,times,serif;"><span style="font-size:14px;"><strong style="margin: 0px; padding: 0px;">Lenovo IdeaPad 100S 11IBY c&oacute; mức gi&aacute; rẻ bất ngờ, thiết kế m&agrave;u sắc dễ thương ph&ugrave; hợp mang theo b&ecirc;n m&igrave;nh để giải tr&iacute;.</strong></span></span></p>\r\n<p>\r\n	<span style="font-family:times new roman,times,serif;"><span style="color: rgb(51, 51, 51); font-size: 16px;"><span style="font-size:14px;">L&agrave; chiếc laptop hướng tới việc giải tr&iacute; l&agrave; ch&iacute;nh n&ecirc;n h&atilde;ng rất ch&uacute; trọng đến phần m&agrave;u sắc của tổng thể m&aacute;y với t&ocirc;ng đỏ, xanh dương v&agrave; bạc.</span></span></span></p>\r\n', 0, 0, 0, 6),
(31, 2, 14, 'Lenovo IdeaPad 110', 'lenovo-ideapad-110-15ibr-80t700bkvn-400-15inch-400x400.png', '[]', 6990000, 0, '', '', '', 'Intel Pentium, N3710, 1.60 GHz', 'Intel® HD Graphics 405', 'Không có', 'HDD: 500 GB', '', '', 'HDMI, LAN (RJ45), USB 2.0, USB 3.0', 'Li-Ion 3 cell', '15.6 inch, HD (1366 x 768)', '<p 110="" 15ibr="" a="" c="" color:="" dejavu="" font-size:="" href="https://www.thegioididong.com/tin-tuc/tim-hieu-vi-xu-ly-may-tinh-cpu-intel-596066#intelpentinum" i="" ideapad="" laptop="" lenovo="" liberation="" margin:="" n="" n3710="" ng="" outline:="" overflow:="" padding:="" span="" strong="" style="font-family: Helvetica, Arial, " target="_blank" text-align:="" text-decoration-line:="" title="Tìm hiểu chip Pentium" y="" zoom:="">\r\n	Pentium<span style="color: rgb(51, 51, 51); text-align: justify;">&nbsp;N3710 tốc độ CPU 1.6 GHz v&agrave; c&oacute; thể n&acirc;ng cấp l&ecirc;n tối đa 2.56 GHz để gi&uacute;p m&aacute;y vận h&agrave;nh hiệu quả hơn.</span></p>\r\n<p c="" cho="" dejavu="" font-size:="" hay="" i="" laptop="" liberation="" n="" ng="" p="" span="" style="margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: Helvetica, Arial, " t="" text-align:="" u="" xem="">\r\n	<span style="font-family:times new roman,times,serif;"><span style="font-size:14px;">M&aacute;y c&oacute; RAM sẵn 4 GB v&agrave; c&oacute; thể n&acirc;ng cấp l&ecirc;n tối đa 8 GB,&nbsp;<a href="https://www.thegioididong.com/tin-tuc/o-cung-la-gi-co-may-loai--590183#hdd" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227);" target="_blank" title="Tìm hiểu ổ cứng HDD là gì?">ổ cứng HDD</a>&nbsp;500 GB để lưu trữ dữ liệu.</span></span></p>\r\n', 0, 0, 0, 5),
(32, 2, 14, 'Lenovo Yoga 300', 'lenovo-yoga-300-11ibr-80m100l5vn-400-400x400.png', '[]', 7990000, 0, '', '', '', 'Intel, Intel Pentium, N3710, 1.60 GHz', 'Intel® HD Graphics 405', 'Không có', '', '', '', '2 x USB 2.0, HDMI, LAN (RJ45), USB 3.0', 'Li-Ion 2 cell', '11.6 inch, HD (1366 x 768)', '<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<span style="font-family:times new roman,times,serif;"><span style="font-size:14px;"><strong style="margin: 0px; padding: 0px;"><a href="https://www.thegioididong.com/laptop-lenovo" style="margin: 0px; padding: 0px; text-decoration-line: none; font-stretch: normal; line-height: 18px; color: rgb(80, 168, 227); outline: none; zoom: 1;" target="_blank" title="Laptop hãng Lenovo">Lenovo</a>&nbsp;Yoga 300 11IBR N3710 l&agrave; chiếc m&aacute;y giải tr&iacute; nhỏ gọn với khả năng gấp theo nhiều kiểu c&ugrave;ng m&agrave;n h&igrave;nh cảm ứng.</strong></span></span></p>\r\n<p style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<strong style="font-size: 14px; font-family: &quot;times new roman&quot;, times, serif; margin: 0px; padding: 0px;">Xoay m&aacute;y theo c&aacute;c hướng kh&aacute;c nhau t&ugrave;y theo nhu cầu sử dụng</strong></p>\r\n<p style="margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; font-size: 16px;">\r\n	<span style="font-family:times new roman,times,serif;"><span style="font-size:14px;">Bạn c&oacute; thể gập m&aacute;y lại theo dạng&nbsp;<strong style="margin: 0px; padding: 0px;">lều&nbsp;</strong>hoặc&nbsp;<strong style="margin: 0px; padding: 0px;">đứng&nbsp;</strong>để sử dụng khi xem phim hoặc đang tr&igrave;nh chiếu t&agrave;i liệu.</span></span></p>\r\n', 0, 0, 0, 7);
INSERT INTO `product` (`id`, `idCatalog`, `idSuplier`, `name`, `image_link`, `image_list`, `price`, `discount`, `system`, `front_camera`, `behind_camera`, `cpu`, `graphics`, `ram`, `disk`, `storage`, `sim`, `connect`, `battery`, `display`, `content`, `star`, `view`, `buyed`, `total`) VALUES
(33, 2, 14, 'Lenovo IdeaPad 100', 'lenovo-ideapad-100-14ibd-i3-5005u-4gb-500gb-win10-400x400.png', '[]', 8490000, 0, '', '', '', 'Intel Core i3 Broadwell, 5005U, 2.00 GHz', 'Intel® HD Graphics 5500', '4GB', 'HDD: 500 GB', '', '', 'HDMI, LAN (RJ45), USB 2.0, USB 3.0', 'Li-Ion 2 cell', '14 inch, HD (1366 x 768)', '<p style="margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; font-size: 16px; text-align: justify;">\r\n	<span style="font-family:times new roman,times,serif;"><span style="font-size:14px;">Với chip xử l&yacute;&nbsp;<a href="https://www.thegioididong.com/tin-tuc/tim-hieu-vi-xu-ly-may-tinh-cpu-intel-596066#broadwell" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227);" target="_blank" title="Tìm hiểu chip xử lý Broadwell">thế hệ thứ 5 Broadwell</a>&nbsp;sẽ cho hiệu năng hoạt động tốt hơn, &iacute;t ti&ecirc;u tốn điện năng.</span></span></p>\r\n<p style="margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; font-size: 16px; text-align: justify;">\r\n	<span style="font-family:times new roman,times,serif;"><span style="font-size:14px;">RAM sẵn 4 GB v&agrave; c&oacute; thể n&acirc;ng cấp l&ecirc;n 8 GB để gi&uacute;p m&aacute;y chạy nhẹ nh&agrave;ng hơn, ổ cứng lưu trữ&nbsp;<a href="https://www.thegioididong.com/hoi-dap/hdd-la-gi-922791" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227);" target="_blank" title="HDD">HDD</a>&nbsp;500 GB, card đồ họa&nbsp;<a href="https://www.thegioididong.com/hoi-dap/intel-hd-graphics-754665" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227);" target="_blank" title="Tìm hiểu card đồ họa HD Graphics 5500">HD Graphics 5500</a>.</span></span></p>\r\n', 0, 0, 0, 5),
(34, 3, 16, 'iPad Pro 9.7 inch Wifi 32GB', 'ipad-pro-97-inch-1-400x460.png', '[]', 1490000, 0, '', '', '', 'Apple A9X 2 nhân 64-bit, 2.16 GHz', '', '2GB', '32 GB', '', '', '', '7350 mAh', 'LED backlit LCD, 9.7"', '<h2 style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden; text-align: justify;">\n	<strong style="margin: 0px; padding: 0px;">iPad Pro 9.7 inch &ndash; M&aacute;y t&iacute;nh bảng cao cấp, hiệu năng mượt m&agrave;</strong></h2>\n<p>\n	<strong style="margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; font-size: 16px; text-align: justify;">Sau khi giới thiệu chiếc iPad Pro 12.9 inch th&igrave;&nbsp;<a href="https://www.thegioididong.com/may-tinh-bang-apple-ipad" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227);" target="_blank" title="Máy tính bảng Apple">Apple</a>&nbsp;đ&atilde; đưa đến người ti&ecirc;u d&ugrave;ng th&ecirc;m một phi&ecirc;n bản mini kh&aacute;c của chiếc iPad cỡ lớn n&agrave;y với m&agrave;n h&igrave;nh 9.7 inch với cấu h&igrave;nh tương đương.</strong></p>\n<p>\n	<span style="color: rgb(51, 51, 51); font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; font-size: 16px; text-align: justify;">Tuy sở hữu m&agrave;n h&igrave;nh kh&aacute; lớn nhưng iPad Pro 9.7 inch vẫn sở hữu độ mỏng kh&aacute; ấn tượng. Với thiết kế vỏ nh&ocirc;m nguy&ecirc;n khối c&ugrave;ng c&aacute;c đường cắt kim cương sắc sảo iPad Pro 9.7 inch thu h&uacute;t gần như mọi &aacute;nh nh&igrave;n về ph&iacute;a m&igrave;nh</span></p>\n', 0, 0, 0, 5),
(35, 3, 16, 'iPad Air 2 Cellular 128GB', 'ipad-air-2-cellular-128gb-400x460.png', '[]', 15490000, 0, '', '', '', 'Apple A8, 1.5 GHz', '', '2GB', '2 GB', '', '', '', '7300 mAh', '128 GB', '<h2 style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	iPad Air 2 Cellular 128GB mang trong m&igrave;nh thiết kế sang trọng, bộ nhớ trong lớn c&ugrave;ng kết nối 3G/4G tiện lợi sẽ đ&aacute;p ứng tốt cho bạn trong mọi nhu cầu sử dụng.</h2>\r\n<p>\r\n	<span style="color: rgb(51, 51, 51); font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; font-size: 16px;">M&aacute;y sở hữu cho m&igrave;nh thiết kế kim loại nguy&ecirc;n khối sang trọng với 3 m&agrave;u sắc sang trọng l&agrave; bạc, v&agrave;ng đồng v&agrave; m&agrave;u x&aacute;m.</span></p>\r\n', 0, 0, 0, 3),
(36, 3, 16, 'iPad Mini 4 Wifi Cellular 16GB', 'ipad-mini-4-cellular-16gb-400x460.png', '[]', 10490000, 0, '', '', '', 'Apple A8, 1.5 GHz', '', '2GB', '16 GB', '', '', '', '5124 mAh', 'LED backlit LCD, 7.9"', '<h2 style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden; text-align: justify;">\r\n	iPad Mini 4 Wifi Cellular 16GB cho bạn th&ecirc;m sự lựa chọn với kết nối mạng 3G/4G c&ugrave;ng cấu h&igrave;nh mạnh mẽ.</h2>\r\n<h3 dir="ltr" style="margin: 30px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<strong style="margin: 0px; padding: 0px;">Kết nối thế giới mọi l&uacute;c mọi nơi</strong></h3>\r\n<p dir="ltr" style="margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; font-size: 16px;">\r\n	B&ecirc;n cạnh kết nối wifi chuẩn&nbsp;<a href="https://www.thegioididong.com/tin-tuc/wifi-la-gi-cai-dat-wifi-hotspot-nhu-the-nao--590309#80211ac" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227);" title="Wifi" type="Wifi">Wi-Fi 802.11 a/b/g/n/ac</a>&nbsp;cho ph&eacute;p trải nghiệm web nhanh hơn, iPad Mini 4 ghi điểm với c&ocirc;ng nghệ 3G/4G hiện đại, mạnh mẽ, cho kết nối to&agrave;n diện.</p>\r\n<h3 dir="ltr" style="margin: 30px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<strong style="margin: 0px; padding: 0px;">Nhẹ v&agrave; mỏng: sang chảnh từng chi tiết</strong></h3>\r\n<p style="margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; font-size: 16px;">\r\n	Được gia c&ocirc;ng tỉ mỉ v&agrave; thiết kế gọn g&agrave;ng, Apple Mini 4 nổi bật n&eacute;t sang chảnh với hợp kim nh&ocirc;m m&aacute;t tay, chắc chắn.</p>\r\n', 0, 1, 0, 0),
(37, 3, 15, 'Asus Zenfone Go ZB690KG', 'asus-zenfone-go-zb690kg-400-400x400.png', '[]', 2590000, 0, '', '', '', 'Qualcomm Snapdragon 200 4 nhân 32bit, 1.2 GHz', '', '1GB', '8 GB', '', '', '', '3480 mAh', 'IPS LCD, 6.9"', '<h2 style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	Asus Zenfone Go ZB690KG l&agrave; mẫu m&aacute;y t&iacute;nh bảng gi&aacute; rẻ của Asus năm 2016 với m&agrave;n h&igrave;nh k&iacute;ch thước lớn cho bạn kh&ocirc;ng gian giải tr&iacute; thoải m&aacute;i.</h2>\r\n<h2 style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<strong style="margin: 0px; padding: 0px;">Thiết kế quen thuộc</strong></h2>\r\n<p style="margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; font-size: 16px;">\r\n	M&aacute;y sở hữu chất liệu nhựa nh&aacute;m quen thuộc của c&aacute;c d&ograve;ng tablet b&igrave;nh d&acirc;n. C&aacute;c g&oacute;c cạnh của m&aacute;y được bo cong mềm mại cho cảm gi&aacute;c cầm nắm kh&aacute; thoải m&aacute;i.</p>\r\n', 0, 0, 0, 7),
(38, 2, 11, ' HP 15 ay526TU', 'hp-15-ay526tu-i3-6006u-400a-400x400.png', '[]', 10290000, 0, '', '', '', 'Intel Core i3 Skylake, 6006U, 2.00 GHz', 'Intel® HD Graphics 520', '4GB', 'HDD: 500 GB', '', '', '2 x USB 2.0, HDMI, LAN (RJ45), USB 3.0', 'Li-Ion 4 cell', '15.6 inch, HD (1366 x 768)', '<h2 style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<strong style="margin: 0px; padding: 0px;">HP 15 ay526TU i3 6006U c&oacute; cấu h&igrave;nh đ&aacute;p ứng nhu cầu sử dụng nhẹ nh&agrave;ng cho học sinh, sinh vi&ecirc;n hay nh&acirc;n vi&ecirc;n văn ph&ograve;ng.</strong></h2>\r\n<h3 style="margin: 30px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<strong style="margin: 0px; padding: 0px;">Thiết kế m&aacute;y HP 15 ay072TU N3710</strong></h3>\r\n<p style="margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; font-size: 16px;">\r\n	M&aacute;y c&oacute; thiết kế kh&aacute; đơn giản nhưng cũng c&oacute; điểm nhấn nổi bật như họa tiết đường kẻ ngang tr&ecirc;n nắp lưng.</p>\r\n', 0, 0, 0, 7),
(39, 2, 11, 'HP 14 am065TU N3060', 'hp-14-am065tu-x3b72pa-400x400-400x400.png', '[]', 6390000, 0, '', '', '', 'Intel, Intel Celeron, N3060, 1.60 GHz', 'Intel® HD Graphics', '4GB', 'HDD: 500 GB', '', '', '2 x USB 2.0, HDMI, LAN (RJ45), USB 3.0, VGA (D-Sub)', 'Li-Ion 4 cell', '14 inch, HD (1366 x 768)', '<h2 style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden; text-align: justify;">\r\n	<strong style="margin: 0px; padding: 0px;">HP 14 am065TU N3060 l&agrave; một lựa chọn gi&aacute; rẻ cho c&ocirc;ng việc nhẹ nh&agrave;ng v&agrave; giải tr&iacute; mỗi ng&agrave;y.</strong></h2>\r\n<h3 style="margin: 30px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden; text-align: justify;">\r\n	<strong style="margin: 0px; padding: 0px;">Cấu h&igrave;nh ph&ugrave; hợp cho c&ocirc;ng việc văn ph&ograve;ng v&agrave; soạn thảo</strong></h3>\r\n<p style="margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; font-size: 16px; text-align: justify;">\r\n	M&aacute;y sử dụng d&ograve;ng chip&nbsp;<a href="https://www.thegioididong.com/tin-tuc/tim-hieu-vi-xu-ly-may-tinh-cpu-intel-596066#intelceleron" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227);" target="_blank" title="Tìm hiểu chip xử lý Celeron">Celeron</a>&nbsp;gi&uacute;p m&aacute;y c&oacute; thể đảm đương tốt c&aacute;c phần mềm như office, d&ugrave;ng để soạn thảo văn bản hay cho trẻ em học tập tiếng anh...</p>\r\n<p style="margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; font-size: 16px; text-align: justify;">\r\n	Tốc độ CPU 1.6 GHz v&agrave; c&oacute; thể tăng tốc l&ecirc;n 2.48 GHz để thực hiện c&ocirc;ng việc nhanh hơn.&nbsp;</p>\r\n<p style="margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; font-size: 16px; text-align: justify;">\r\n	RAM 4 GB v&agrave; c&oacute; thể n&acirc;ng l&ecirc;n tối đa 8 GB l&agrave; điểm s&aacute;ng của m&aacute;y, ổ cứng lưu trữ&nbsp;<a href="https://www.thegioididong.com/tin-tuc/o-cung-la-gi-co-may-loai--590183#hdd" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227);" target="_blank" title="Tìm hiểu ổ cứng HDD">HDD</a>&nbsp;500 GB.</p>\r\n', 0, 0, 0, 7),
(40, 2, 11, 'HP Pavilion 14 AL103TU', 'hp-pavilion-14-al103tu-400-1-400x400.png', '[]', 11990000, 0, '', '', '', 'Intel Core i3 Kabylake, 7100U, 2.40 GHz', 'Intel® HD Graphics 620', '4GB', 'HDD: 500 GB', '', '', '2 x USB 3.0, HDMI, LAN (RJ45), USB 2.0', 'Li-Ion 3 cell', '14 inch, HD (1366 x 768)', '<h2 style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<strong style="margin: 0px; padding: 0px;">HP Pavilion 14 AL103TU i3 7100U</strong><strong style="margin: 0px; padding: 0px;">&nbsp;c&oacute; kiểu d&aacute;ng v&agrave; m&agrave;u sắc rất sang trọng, ph&ugrave; hợp nhu cầu sử dụng đơn giản nhưng đa dạng.</strong></h2>\r\n<h3 style="margin: 30px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<strong style="margin: 0px; padding: 0px;">Cấu h&igrave;nh tốt, đ&aacute;p ứng nhiều nhu cầu sử dụng</strong></h3>\r\n<p style="margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; font-size: 16px;">\r\n	<strong style="margin: 0px; padding: 0px;">HP Pavilion 14 AL103TU i3</strong><strong style="margin: 0px; padding: 0px;">&nbsp;7100U</strong>&nbsp;sử dụng&nbsp;<a href="https://www.thegioididong.com/hoi-dap/bo-xu-ly-intel-core-i3-i5-i7-the-he-thu-7-952583" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227);" target="_blank" title="Intel core i3 Kabylake">Intel core i3 Kabylake</a>&nbsp;thế hệ thứ 7 mới nhất hiện nay,&nbsp;gi&uacute;p m&aacute;y đảm đương tốt nhu cầu sử dụng cơ bản của bạn như xem phim, học Anh văn, chơi game&nbsp;<strong style="margin: 0px; padding: 0px;">&quot;HOT&quot;</strong>&nbsp;(t&ugrave;y chỉnh cầu h&igrave;nh nhẹ), l&agrave;m thuyết tr&igrave;nh...</p>\r\n<p style="margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; font-size: 16px;">\r\n	Tốc độ CPU&nbsp;<strong style="margin: 0px; padding: 0px;">2.40 GHz</strong>,&nbsp;<a href="https://www.thegioididong.com/tin-tuc/o-cung-la-gi-co-may-loai--590183#hdd" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227);" target="_blank" title="HDD">ổ cứng HDD&nbsp;500 GB</a>&nbsp;thoải m&aacute;i để bạn lưu trữ dữ liệu, kết hợp với&nbsp;<a href="https://www.thegioididong.com/hoi-dap/ram-ddr4-la-gi-882173" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227);" target="_blank" title="DDR 4">RAM DDR4 4 GB</a>&nbsp;c&agrave;ng chạy mượt m&agrave; hơn.</p>\r\n', 0, 0, 0, 9),
(41, 2, 11, 'HP Pavilion x360 11-u103TU', 'hp-pavilion-x360-11-u103tu-i3-7100u-400-400x460.png', '[]', 12490000, 0, '', '', '', 'Intel Core i3 Kabylake, 7100U, 2.40 GHz', 'Intel® HD Graphics 620', '4GB', 'HDD: 500 GB', '', '', '2 x USB 3.0, HDMI, USB 2.0', 'Li-Ion 3 cell', '11.6 inch, HD (1366 x 768)', '<h2 style="margin: 0px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<strong style="margin: 0px; padding: 0px;">Laptop HP Pavilion x360 11-u103TU l&agrave; sản phẩm c&oacute; thiết kế xoay 360 độ độc đ&aacute;o c&ugrave;ng vi xử l&yacute; thế hệ mới v&agrave; m&agrave;n h&igrave;nh cảm ứng tiện dụng.</strong></h2>\r\n<h3 style="margin: 30px 0px 10px; padding: 0px; font-stretch: normal; font-size: 20px; line-height: 1.3em; font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; color: rgb(51, 51, 51); outline: none; zoom: 1; overflow: hidden;">\r\n	<strong style="margin: 0px; padding: 0px;">L&agrave; laptop d&agrave;nh ri&ecirc;ng cho học sinh, sinh vi&ecirc;n hay người d&ugrave;ng thường di chuyển nhiều</strong></h3>\r\n<p style="margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; font-size: 16px;">\r\n	Được t&iacute;ch hợp chip xử l&yacute;<a href="https://www.thegioididong.com/hoi-dap/bo-xu-ly-intel-core-i3-i5-i7-the-he-thu-7-952583" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227);" target="_blank" title="i3">&nbsp;core i3 KabyLake</a>, tốc độ CPU&nbsp;<strong style="margin: 0px; padding: 0px;">2.4 GHz</strong>.</p>\r\n<p style="margin: 10px 0px; padding: 0px; -webkit-margin-before: 0px; -webkit-margin-after: 0px; text-rendering: geometricPrecision; color: rgb(51, 51, 51); font-family: Helvetica, Arial, &quot;DejaVu Sans&quot;, &quot;Liberation Sans&quot;, Freesans, sans-serif; font-size: 16px;">\r\n	RAM&nbsp;<strong style="margin: 0px; padding: 0px;">4 GB</strong>&nbsp;<a href="https://www.thegioididong.com/hoi-dap/ram-ddr4-la-gi-882173" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227);" target="_blank" title="DDR4">DDR4&nbsp;</a>thế hệ mới,<strong style="margin: 0px; padding: 0px;">&nbsp;</strong>đi c&ugrave;ng với ổ cứng&nbsp;<a href="https://www.thegioididong.com/tin-tuc/o-cung-la-gi-co-may-loai--590183" style="margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(80, 168, 227);" target="_blank" title="HDD">HDD</a>&nbsp;c&oacute; dung lượng&nbsp;<strong style="margin: 0px; padding: 0px;">500 GB</strong>. Ngo&agrave;i ra, m&aacute;y c&oacute; k&iacute;ch thước d&agrave;y&nbsp;<strong style="margin: 0px; padding: 0px;">19.3 mm</strong>, nặng&nbsp;<strong style="margin: 0px; padding: 0px;">1.41 kg&nbsp;</strong>kh&aacute; gọn nhẹ.</p>\r\n', 0, 0, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idCatalog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id`, `name`, `idCatalog`) VALUES
(6, 'SamSung', 1),
(7, 'Iphone', 1),
(8, 'LG', 1),
(9, 'Sony', 1),
(10, 'Asus', 2),
(11, 'Hp', 2),
(13, 'Dell', 2),
(14, 'Lenovo', 2),
(15, 'Asus', 3),
(16, 'apple', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass_word` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_link` text COLLATE utf8_unicode_ci NOT NULL,
  `id_group_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `pass_word`, `name`, `phone`, `email`, `address`, `image_link`, `id_group_user`) VALUES
(1, 'caothien96', 'e10adc3949ba59abbe56e057f20f883e', 'cao van thien', '0974690349', 'Demo@gmail.com', 'Đà Nẵng', '', 1),
(2, 'thien', 'e10adc3949ba59abbe56e057f20f883e', 'Lê Anh Tú', '012384578', 'abc@gmail.com', 'Ngõ 69 Đặng Xuân Bảng Hoàng Mai Hà Nội', '', 2),
(3, 'nhung', 'e10adc3949ba59abbe56e057f20f883e', 'Trần Hồng Nhung', '0281476734', 'Test@gmail.com', 'ThanhHoa', '', 3),
(4, 'robert', 'e10adc3949ba59abbe56e057f20f883e', 'michael robert da sua', '0974690349', 'robert@gmail.com', 'Ngõ 69 Đặng Xuân Bảng Hoàn Mai', '', 2),
(5, 'Tom', 'e10adc3949ba59abbe56e057f20f883e', 'Tom Scopfi', '0974690349', 'tom@gmail.com', '241 Nguyễn Trãi Thanh Xuân Hà Nội', '', 2),
(6, 'nacy', 'd93105cfd3455f154f5768f681f3676f', 'Elizabet Nacy', '0974690349', 'nacy@gmail.com', '21 Tây Sơn Đống Đa Hà Nội', '', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`id`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idProduct` (`idProduct`);

--
-- Indexes for table `group_user`
--
ALTER TABLE `group_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_order` (`idOrder`),
  ADD KEY `id_product` (`idProduct`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCatalog` (`idCatalog`),
  ADD KEY `idSuplier` (`idSuplier`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_catalog` (`idCatalog`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_group_user` (`id_group_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `group_user`
--
ALTER TABLE `group_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_user_fk` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`idProduct`) REFERENCES `product` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_user_fk` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_order_fk` FOREIGN KEY (`idOrder`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`idCatalog`) REFERENCES `catalog` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`idSuplier`) REFERENCES `suplier` (`id`);

--
-- Constraints for table `suplier`
--
ALTER TABLE `suplier`
  ADD CONSTRAINT `suplier_catalog` FOREIGN KEY (`idCatalog`) REFERENCES `catalog` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_group_user_fk` FOREIGN KEY (`id_group_user`) REFERENCES `group_user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
