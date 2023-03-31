-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 31, 2023 lúc 05:18 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tourbooking`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthd`
--

CREATE TABLE `cthd` (
  `id_hd` int(16) NOT NULL,
  `id_gia` int(16) NOT NULL,
  `sl` int(20) NOT NULL,
  `giatien` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cthd`
--

INSERT INTO `cthd` (`id_hd`, `id_gia`, `sl`, `giatien`) VALUES
(125, 103, 2, 230),
(125, 84, 2, 2044),
(125, 88, 3, 342),
(125, 8, 3, 4500000),
(125, 10, 3, 2000000),
(126, 88, 1, 342),
(126, 6, 1, 3500000),
(127, 84, 1, 2044),
(127, 103, 1, 230),
(127, 88, 1, 342),
(127, 6, 1, 3500000),
(127, 5, 1, 3000000),
(128, 88, 2, 0),
(135, 11, 3, 3000000),
(135, 12, 3, 3500000),
(135, 96, 3, 750000),
(135, 13, 3, 1000000),
(135, 16, 3, 2000000),
(135, 15, 3, 2500000),
(136, 5, 3, 3000000),
(136, 6, 4, 3500000),
(136, 16, 0, 2000000),
(136, 15, 2, 2500000),
(137, 7, 0, 4000000),
(137, 8, 1, 4500000),
(138, 88, 1, 5000000),
(138, 6, 1, 3500000),
(139, 6, 1, 3500000),
(139, 7, 1, 4000000),
(139, 8, 1, 4500000),
(139, 13, 1, 1000000),
(140, 6, 1, 3500000),
(140, 15, 1, 2500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dichvu`
--

CREATE TABLE `dichvu` (
  `id` int(16) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mota` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_loai` int(16) NOT NULL,
  `xeploai` float NOT NULL,
  `sdt` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dichvu`
--

INSERT INTO `dichvu` (`id`, `ten`, `mota`, `anh`, `id_loai`, `xeploai`, `sdt`, `diachi`) VALUES
(1, 'Vinpearl Condotel Beachfront Nha Trang', 'Vinpearl Condotel Beachfront Nha Trang với những căn hộ khách sạn có tầm nhìn hướng biển, không chỉ mang đến cho du khách sự tiện nghi, thoải mái, mà còn là cảm nhận trọn vẹn về những bãi biển đầy nắng gió của vịnh Nha Trang - một trong những vịnh biển đẹp của Nha Trang.                                                                        ', 'dichvu_1.jpg', 1, 4.5, '0258 359 9099', '78 - 80 Đường Trần Phú, Phường Lộc Thọ, Tp. Nha Trang, tỉnh Khánh Hòa'),
(2, 'Vinpearl Resort Nha Trang', 'Vinpearl Resort Nha Trang chào đón du khách bằng vẻ đẹp Á Đông thuần khiết với kiến trúc mang đậm phong cách Indochine sang trọng cùng bãi biển riêng tư hút mắt. Giữa vạn trải nghiệm sôi nổi, tại quần thể nghỉ dưỡng – giải trí biển hàng đầu khu vực của đảo Hòn Tre Nha Trang', 'dichvu_2.jpg', 1, 4, '258 359 8222', 'Đảo Hòn Tre, Tp. Nha Trang, Khánh Hòa, Việt Nam'),
(3, 'Vinpearl Luxury Nha Trang', 'Được sinh ra bởi khao khát tìm về chốn bình yên của tâm hồn, Vinpearl Luxury Nha Trang là điểm đến khó lòng bỏ qua với những du khách trân trọng từng giây phút an tĩnh tuyệt đối bên người mình yêu thương. Tọa lạc nơi bờ biển thiên đường, 84 căn biệt thự xinh đẹp nằm trải mình giữa những khu vườn nhiệt đới mướt mát, lắng nghe tiếng sóng rì rào khúc nhạc thư thái của thiên nhiên, tạo nên khung cảnh yên bình và đầm ấm như một “ốc đảo bình yên” cách xa khỏi chốn thị thành bận rộn.', 'dichvu_3.jpg', 1, 5, '258 359 8222', 'Đảo Hòn Tre, Tp. Nha Trang, Khánh Hòa, Việt Nam'),
(4, 'Vinpearl Discovery Sealink Nha Trang', 'Tọa lạc liền kề sân golf 18 hố, Vinpearl Discovery Sealink Nha Trang gây ấn tượng mạnh với tầm nhìn hút mắt từ tòa khách sạn nguy nga, tráng lệ chấm phá trên nền màu xanh dương vô tận của biển. Hệ thống phòng khách sạn và biệt thự công suất lớn và sang trọng hàng đầu Nha Trang, cùng 5 bể bơi lớn, 8 nhà hàng và quầy bar với các hoạt động thể thao dưới nước khiến cho Vinpearl Discovery Sealink Nha Trang là lựa chọn hàng đầu để nghỉ dưỡng gia đình cũng như phục vụ khách đoàn. Resort còn có Kids Club lớn nhất trên đảo Hòn Tre cùng nhiều trò chơi thú vị cho các bé mọi độ tuổi.', 'dichvu_4.jpg', 1, 3.5, '0258 359 9099', 'Đảo Hòn Tre, Nha Trang, Khánh Hòa, Việt Nam'),
(5, 'Vinpearl Discovery Golflink Nha Trang test', 'Tọa lạc trên thung lũng ở vị trí tuyệt đẹp ôm trọn điểm ngắm toàn cảnh sân golf 18 hố tiêu chuẩn quốc tế, Vinpearl Discovery Golflink Nha Trang là khu nghỉ dưỡng liền kề sân golf trên đảo đẹp bậc nhất Việt Nam. Đây chính là điểm đến lý tưởng cho những người ưa thích phong cách nghỉ dưỡng đẳng cấp gắn liền với các hoạt động thể thao giàu tính trí tuệ và đam mê mãnh liệt trong hành trình du lịch Nha Trang. Vinpearl Discovery Golflink Nha Trang được thiết kế đầy tính nghệ thuật, lấy cảm hứng từ phong cách kiến trúc Địa Trung Hải với mái vòm đặc trưng, 182 căn villa với bể bơi riêng biệt, trang bị đầy đủ nội thất, thiết kế hiện đại, cao cấp theo tiêu chuẩn quốc tế. Khu nghỉ dưỡng chắc chắn sẽ thỏa mãn những người yêu mến sự khoáng đạt.', 'dichvu_5.jpg', 1, 4.5, '0258 359 9099', 'Đảo Hòn Tre, Nha Trang, Khánh Hòa, Việt Nam'),
(6, 'Melia Vinpearl Empire Nha Trang', 'Chỉ cách sân bay 15 phút lái xe và cách danh thắng Ngũ Hành Sơn 800m, Vinpearl Resort & Spa Đà Nẵng tọa lạc nơi bãi biển Non Nước – \"Bãi biển hấp dẫn nhất hành tinh\" do tạp chí Forbes từng bình chọn. Trong bức tranh sơn thủy hữu tình, Vinpearl Resort & Spa Đà Nẵng tựa ốc đảo thanh bình với 122 căn biệt thự phong cách tân cổ điển được ôm ấp bởi hồ nước lượn quanh và khuôn viên rực rỡ hoa trái. Nơi đây lý tưởng để nghỉ dưỡng thảnh thơi và thuận tiện để khám phá các điểm đến nổi tiếng như Ngũ Hành Sơn, phố cổ Hội An, VinWonders Nam Hội An...\r\n\r\n', 'dichvu_6.jpg', 1, 2, '0258 359 9099', '44 – 46 Đường Lê Thánh Tôn, phường Lộc Thọ, thành phố Nha Trang'),
(7, 'Vinpearl Resort & Spa Nha Trang Bay Bay', 'Trên “đảo thiên đường” Hòn Tre, Vinpearl Resort & Spa Nha Trang Bay với kiến trúc hình cánh cung trắng muốt luôn hút mắt với vẻ tinh khôi riêng biệt. Mỗi phòng nghỉ đều sở hữu view biển sống động đặc trưng vào lúc bình minh. Thiết kế khung cửa toàn kính bao quanh các căn biệt thự liền kề bờ cát trắng mịn mang tới trải nghiệm “thức giấc ngay giữa bãi biển riêng tư”. Trải nghiệm đặc trưng tại đây là một liệu trình thư giãn trên mặt hồ yên ả, thưởng thức bữa tối trong khung cảnh hoàng hôn tại nhà hàng Lagoon hay thả mình trên ghế lười xem bộ phim yêu thích tại Beach Cinema.', 'dichvu_7.jpg', 1, 4.5, '0258 359 9099', 'Đảo Hòn Tre, Nha Trang, Khánh Hòa, Việt Nam'),
(8, 'Vinpearl Discovery Rockside Nha Trang', 'Vinpearl Condotel Beachfront Nha Trang với những căn hộ khách sạn có tầm nhìn hướng biển, không chỉ mang đến cho du khách sự tiện nghi, thoải mái, mà còn là cảm nhận trọn vẹn về những bãi biển đầy nắng gió của vịnh Nha Trang - một trong những vịnh biển đẹp nhất hành tinh. Đây là một điểm đến mới “tất cả trong một” với trung tâm thương mại sầm uất, những nhà hàng sang trọng, bể bơi ngoài trời ngắm toàn cảnh vịnh biển, không gian hội họp đẳng cấp, nơi tụ hội của thành công.', 'dichvu_8.jpg', 1, 4.5, '(+84) 258 359 8', '78 - 80 Đường Trần Phú, Phường Lộc Thọ, Tp. Nha Trang, tỉnh Khánh Hòa'),
(9, 'Melia Vinpearl Nha Trang Riverfont', 'Trên “đảo thiên đường” Hòn Tre, Vinpearl Resort & Spa Nha Trang Bay với kiến trúc hình cánh cung trắng muốt luôn hút mắt với vẻ tinh khôi riêng biệt. Mỗi phòng nghỉ đều sở hữu view biển sống động đặc trưng vào lúc bình minh. Thiết kế khung cửa toàn kính bao quanh các căn biệt thự liền kề bờ cát trắng mịn mang tới trải nghiệm “thức giấc ngay giữa bãi biển riêng tư”. Trải nghiệm đặc trưng tại đây là một liệu trình thư giãn trên mặt hồ yên ả, thưởng thức bữa tối trong khung cảnh hoàng hôn tại nhà hàng Lagoon hay thả mình trên ghế lười xem bộ phim yêu thích tại Beach Cinema.', 'dichvu_9.jpg', 1, 4.5, '258 359 8222', '341 đường Trần Hưng Đạo, phường An Hải Bắc, quận Sơn Trà, Tp. Đà Nẵng'),
(10, 'Nha Trang Marriott Resort & Spa', 'Vinpearl Condotel Beachfront Nha Trang với những căn hộ khách sạn có tầm nhìn hướng biển, không chỉ mang đến cho du khách sự tiện nghi, thoải mái, mà còn là cảm nhận trọn vẹn về những bãi biển đầy nắng gió của vịnh Nha Trang - một trong những vịnh biển đẹp nhất hành tinh. Đây là một điểm đến mới “tất cả trong một” với trung tâm thương mại sầm uất, những nhà hàng sang trọng, bể bơi ngoài trời ngắm toàn cảnh vịnh biển, không gian hội họp đẳng cấp, nơi tụ hội của thành công.', 'dichvu_10.jpg', 1, 4.5, '0 111 222 333', 'Số 7 Trường Sa, Ngũ Hành Sơn, Nha Trang'),
(11, 'Melia Vinpearl Cua Sot Beach Resort', 'Vinpearl Discovery Greenhill Phú Quốc sở hữu các biệt thự nép mình dọc theo sườn núi với tầm nhìn khoáng đạt bao trọn cả đất trời. Hồ điều hòa nước ngọt rộng 17 ha nằm ở trung tâm khu nghỉ dưỡng tạo không khí trong lành và cảnh quan độc đáo, thích hợp với những vị khách yêu thích khám phá cảnh sắc thiên nhiên xen kẽ giữa đại dương bao la và núi đồi trùng điệp.\r\n\r\nMột trong những điểm nhấn của Vinpearl Discovery Greenhill Phú Quốc là các Clubhouse The Forest và Nerin thiết kế theo phong cách “tropical” ấn tượng với rừng cây nhiệt đới xanh mướt phủ quanh lối vào, tại đây du khách có thể thỏa thích check-in, thưởng thức những món ăn thượng hạng bao gồm cả đặc sản Phú Quốc và các loại đồ uống hấp dẫn.', 'dichvu_11.jpg', 1, 4.5, '0258 359 9099', 'Nha Trang, Khánh Hòa'),
(12, 'Vinpearl Landmark 81, Autograph Collection', 'Vinpearl Condotel Beachfront Nha Trang với những căn hộ khách sạn có tầm nhìn hướng biển, không chỉ mang đến cho du khách sự tiện nghi, thoải mái, mà còn là cảm nhận trọn vẹn về những bãi biển đầy nắng gió của vịnh Nha Trang - một trong những vịnh biển đẹp nhất hành tinh. Đây là một điểm đến mới “tất cả trong một” với trung tâm thương mại sầm uất, những nhà hàng sang trọng, bể bơi ngoài trời ngắm toàn cảnh vịnh biển, không gian hội họp đẳng cấp, nơi tụ hội của thành công.', 'dichvu_12.jpg', 1, 4.5, '0258 359 9099', 'Nha Trang Khánh Hòa'),
(13, 'VinHolidays Fiesta Nha Trang', 'Vinpearl Condotel Beachfront Nha Trang với những căn hộ khách sạn có tầm nhìn hướng biển, không chỉ mang đến cho du khách sự tiện nghi, thoải mái, mà còn là cảm nhận trọn vẹn về những bãi biển đầy nắng gió của vịnh Nha Trang - một trong những vịnh biển đẹp nhất hành tinh. Đây là một điểm đến mới “tất cả trong một” với trung tâm thương mại sầm uất, những nhà hàng sang trọng, bể bơi ngoài trời ngắm toàn cảnh vịnh biển, không gian hội họp đẳng cấp, nơi tụ hội của thành công.', 'dichvu_13.jpg', 1, 4.5, '0258 359 9099', 'Nha Trang Khánh Hòa'),
(14, 'Four Points by Sheraton Nha Trang', 'Vinpearl Condotel Beachfront Nha Trang với những căn hộ khách sạn có tầm nhìn hướng biển, không chỉ mang đến cho du khách sự tiện nghi, thoải mái, mà còn là cảm nhận trọn vẹn về những bãi biển đầy nắng gió của vịnh Nha Trang - một trong những vịnh biển đẹp nhất hành tinh. Đây là một điểm đến mới “tất cả trong một” với trung tâm thương mại sầm uất, những nhà hàng sang trọng, bể bơi ngoài trời ngắm toàn cảnh vịnh biển, không gian hội họp đẳng cấp, nơi tụ hội của thành công.', 'dichvu_14.jpg', 1, 4.5, '0258 359 9099', 'Nha Trang Khánh Hòa'),
(15, 'Sheraton Can Tho', 'Vinpearl Condotel Beachfront Nha Trang với những căn hộ khách sạn có tầm nhìn hướng biển, không chỉ mang đến cho du khách sự tiện nghi, thoải mái, mà còn là cảm nhận trọn vẹn về những bãi biển đầy nắng gió của vịnh Nha Trang - một trong những vịnh biển đẹp nhất hành tinh. Đây là một điểm đến mới “tất cả trong một” với trung tâm thương mại sầm uất, những nhà hàng sang trọng, bể bơi ngoài trời ngắm toàn cảnh vịnh biển, không gian hội họp đẳng cấp, nơi tụ hội của thành công.', 'dichvu_15.jpg', 1, 4.5, '0258 359 9099', 'Nha Trang Khánh Hòa'),
(16, 'Luke Bar', 'Tọa lạc bên bãi biển mang đầy màu sắc tươi trẻ, hiện đại, Luke Bar thu hút du khách với quầy bar sôi động cùng những ly cocktail hấp dẫn, nước ép, trái cây tươi miền nhiệt đới và các loại café thơm ngon... ', 'dichvu_16.jpg', 2, 5, '1900 6677', 'Water World, VinWonders Nha Trang'),
(17, 'Yummy Land', 'Nhà hàng fastfood Yummy Land phục vụ những món ăn nhanh kiểu Á như: cơm phần, mỳ xào hải sản… và kiểu Âu như burger, pizza hải sản… giúp du khách tái tạo năng lượng để tiếp tục vui chơi và khám phá thế giới giải trí đầy hấp dẫn của Vinwonders Nha Trang.\r\n\r\nVới sức chứa 250 chỗ, nhà hàng Yummy Land là sự lựa chọn hoàn hảo cho mọi du khách với thực đơn đa dạng, hương vị thơm ngon đặc sắc, lên món nhanh và không phải mất nhiều thời gian chờ đợi.', 'dichvu_17.jpg', 2, 5, '1900 6677', 'Adventure Land, VinWonders Nha Trang'),
(18, 'Lotteria Restaurent', 'Giới thiệu về Nhà hàng Lotteria\r\nChuỗi nhà hàng được đông đảo các bạn nhỏ yêu thích với các món ăn đặc trưng: gà rán, phomai que, khoai tây chiên…', 'dichvu_18.jpg', 2, 4.5, '1900 6677', 'Sea World, VinWonders Nha Trang | King Garden, Vinwonders Nha Trang'),
(19, 'Yummy Land Restaurent', 'Nhà hàng fastfood Yummy Land - nơi mang đến cho du khách những món ăn kiểu Á như: cơm phần, mỳ xào hải sản… và kiểu Âu như burger, pizza hải sản… để du khách nhanh chóng tái tạo năng lượng, tiếp tục vui chơi và khám phá thế giới giải trí đầy hấp dẫn của Vinwonders Nha Trang.\r\n\r\nVới sức chứa 250 chỗ ngồi, nhà hàng Yummy Land là sự lựa chọn hoàn hảo cho mọi du khách với thực đơn đa dạng, phục vụ nhanh chóng, tận tâm và không làm mất nhiều thời gian chờ đợi.', 'dichvu_19.jpg', 2, 4.5, '1900 6677', 'Water World, VinWonders Nha Trang'),
(20, 'Romy Cream', 'Quầy kem, nước giải khát & bánh ngọt Romy với menu đa dạng phù hợp với tất cả khách hàng, thêm nhiều lựa chọn cho cuộc chơi thêm hứng khởi tại King\'s Garden, VinWonders Nha Trang.', 'dichvu_20.jpg', 2, 4.5, '1900 6677', 'King\'s Garden, VinWonders Nha Trang'),
(21, 'Lobby Bar - Vinpearl Discovery Rockside Nha Trang', 'Giới thiệu về Lobby Bar - Vinpearl Discovery Rockside Nha Trang\r\nLobby Bar nằm ngay tại sảnh chờ chính của khách sạn - một vị trí thuận lợi cho việc nghỉ chân và thư giãn sau hành trình vui chơi, du lịch Nha Trang. Nơi đây còn là địa điểm lý tưởng để gặp gỡ, chuyện trò với bạn bè, người thân bên ly thức uống thơm ngon, thức ăn nhẹ hấp dẫn và ngắm nhìn khung cảnh tuyệt đẹp của khu nghỉ dưỡng.', 'dichvu_21.jpg', 2, 5, '(+84) 258 359 8888', 'Vinpearl Discovery Rockside Nha Trang, Đảo Hòn Tre, Nha Trang, Khánh Hòa, Việt Nam'),
(22, 'Marina Restaurant', 'Tọa lạc tại tầng trệt của khách sạn Vinpearl Resort & Spa Nha Trang Bay, Nhà hàng Marina được bài trí pha trộn giữa nét đẹp hiện đại và truyền thống. Thực khách sẽ được phục vụ buổi tiệc Buffet đa dạng và phong phú từ các đặc sản Việt Nam và Quốc Tế được chế biến qua bàn tay của đầu bếp mang đẳng cấp 5* chắc chắn sẽ mang đến trải nghiệm tuyệt vời.', 'dichvu_22.jpg', 2, 5, '(+84) 258 359 8888', 'Vinpearl Resort & Spa Nha Trang Bay, Đảo Hòn Tre, Nha Trang, Khánh Hòa, Việt Nam'),
(23, 'Ozone Seafood Restaurant', 'Nhà hàng hải sản Ozone chinh phục những thực khách sành sỏi bằng nguồn hải sản tươi ngon, kết hợp với sự chăm chút chi tiết cho từng món ăn của các chuyên gia ẩm thực cùng với không gian kiến trúc độc đáo, phóng khoáng.\r\nKhi đến với Ozone, quý khách đừng quên thưởng thức những món ăn “sơn hào hải vị” tươi ngon cùng với 17 loại nước sốt trứ danh làm nên đẳng cấp nhà hàng hải sản 5*.', 'dichvu_23.jpg', 2, 5, '(+84) 258 359 8888', 'Imperial Club, Đảo Hòn Tre, Tp. Nha Trang, Tỉnh Khánh Hòa, Việt Nam'),
(24, 'Blue Lagoon Restaurant', 'Đến với khách sạn Nha Trang, Quý khách sẽ được thưởng thức những hương vị ẩm thực nổi tiếng trên khắp 4 phương trong không gian sang trọng, hiện đại và khung cảnh thơ mộng, nên thơ của Blue Lagoon Restaurant. ', 'dichvu_24.jpg', 2, 4.5, '(+84) 258 359 8598', 'Vinpearl Luxury Nha Trang, Đảo Hòn Tre, Tp. Nha Trang, Tỉnh Khánh Hòa, Việt Nam'),
(25, 'Huong Viet Restaurant', 'Huong Viet Restaurant được đặt tại tầng 1 tòa nhà đón tiếp, với sức chứa lên tới 120 khách. Nhà hàng mang tới cho bạn ẩm thực thuần Việt độc đáo, bao gồm nhiều món đặc sản Nha Trang, với không gian được thiết kế ấn tượng hoàn toàn bằng gỗ lim, có sự kết hợp hài hòa giữa phong cách kiến trúc truyền thống và lối kiến trúc hiện đại.', 'dichvu_25.jpg', 2, 4.5, '(+84) 258 359 8598', 'Vinpearl Luxury Nha Trang, Đảo Hòn Tre, Tp. Nha Trang, Tỉnh Khánh Hòa, Việt Nam'),
(26, 'Beach Bar - Vinpearl Luxury Nha Trang', 'Ở Beach Bar - Vinpearl Luxury Nha Trang, được thả mình trong làn nước mát tại resort Nha Trang, nhấp một ngụm cocktail mát lạnh bên bờ biển xanh cùng nắng gió chan hòa, còn gì khiến bạn cảm thấy thư thái hơn thế?', 'dichvu_26.jpg', 2, 5, '(+84) 258 359 8888', 'Vinpearl Luxury Nha Trang, Đảo Hòn Tre, Tp. Nha Trang, Tỉnh Khánh Hòa, Việt Nam'),
(27, 'Wave Bar', 'Tại Wave Bar, được đắm mình trong không gian sóng biển rì rào với những ly cocktail ngon tuyệt, cùng ngắm ánh hoàng hôn với người mình yêu sẽ là những khoảnh khắc tuyệt vời trong hành trình du lịch Nha Trang.', 'dichvu_27.jpg', 2, 5, '(+84) 258 359 8888', 'Vinpearl Luxury Nha Trang, Đảo Hòn Tre, Tp. Nha Trang, Tỉnh Khánh Hòa, Việt Nam'),
(28, 'Pool Bar - Vinpearl Resort Nha Trang', 'Nằm bên hồ bơi chính của khách sạn Vinpearl Resort Nha Trang, Pool Bar là nơi lý tưởng để quý khách có thể vừa thư giãn dưới làn nước trong xanh, vừa thưởng thức những ly cocktail hảo hạng, rượu và đồ ăn nhẹ.', 'dichvu_28.jpg', 2, 5, '(+84) 258 359 8598', '(+84)258 359 8900'),
(29, 'Beachcomber - Vinpearl Resort Nha Trang', 'Tọa lạc tại Vinpearl Resort Nha Trang, Nhà hàng Beachcomber phục vụ ẩm thực theo phong cách biển và các món ăn quốc tế đặc sắc. Không gì tuyệt vời hơn khi thưởng thức ẩm thực trong không gian thơ mộng cạnh bãi biển và hồ bơi, một không gian thoáng đãng với gió biển khuấy động mọi giác quan của du khách.', 'dichvu_29.jpg', 2, 4.5, '(+84) 258 359 8888', 'Vinpearl Resort Nha Trang, Đảo Hòn Tre, Nha Trang, Khánh Hòa, Việt Nam'),
(30, 'Club Lounge', 'Club Lounge tọa lạc tại Vinpearl Resort & Spa Long Beach Nha Trang là nơi mang tới cho quý khách những buổi tối sôi động, mới lạ với những thức uống độc đáo, thức ăn nhẹ thơm ngon khiến những buổi tối trở nên \"chill\" hơn bao giờ hết.', 'dichvu_30.jpg', 2, 5, '(+84) 258 399 1888', 'Vinpearl Resort & Spa Long Beach Nha Trang, Lô D6B2 & D7A1, Khu 2, Bắc Bán đảo Cam Ranh, Huyện Cam Lâm, Tỉnh Khánh Hòa'),
(31, 'Vinpearl Golf Nha Trang', 'Kiệt tác sân golf 18 hố Vinpearl Golf Nha Trang do IMG Worldwide thiết kế, được bao trùm bởi vẻ đẹp thơ mộng của biển xanh bao la và sự hùng vĩ của núi non trùng điệp, đem lại những trải nghiệm golf hấp dẫn kết hợp cảnh quan tuyệt đẹp.\r\n\r\nChiều dài: 6787 yards, par 71\r\nLoại cỏ:\r\nFairways/Roughs/Tees: Seashore Paspalum - Sea isle 1\r\nGreens: Seashore Paspalum - Sea isle 2000\r\nNằm trên vịnh biển đẹp nhất thế giới với hơn 300 ngày nắng đẹp trong năm, cùng địa thế \"tựa sơn hướng thủy\".\r\nTại mỗi thời điểm trong năm, cảnh quan và thời tiết trên sân thay đổi với nhiều chướng ngại vật đầy thử thách.\r\n', 'golf.jpg', 4, 5, '(+84) 258 359 8888', 'Đảo Hòn Tre, Phường Vĩnh Nguyên, Thành phố Nha Trang, Tỉnh Khánh Hòa, Việt Nam'),
(32, 'VinWonders Nha Trang', 'Bước qua cánh cổng của VinWonders Nha Trang là dấn thân vào một cuộc chu du kỳ thú vòng quanh thế giới của niềm vui, sự sôi động và cảm xúc thăng hoa bất tận ở 6 phân khu trò chơi đặc sắc! \r\n\r\nĐến với VinWonders Nha Trang, du khách sẽ được trải nghiệm Cáp treo Thiên đường dài hơn 3.300m tại một trong 29 vịnh biển đẹp nhất hành tinh, “Quẩy” tưng bừng tại Vịnh phao nổi hơn 4.200m2 lớn nhất thế giới! Ngất ngây trên độ cao 120m với Bánh xe bầu trời - Top 10 vòng xoay cao nhất thế giới. Du hành Alpine Coaster dài đến 1.865m - Đường trượt núi trên đảo đầu tiên tại Châu Á.\r\n\r\nKhám phá bộ sưu tập xương rồng lớn nhất Việt Nam cùng các kì hoa dị thảo 5 châu tại The World Garden. Thả mình trên Zipline 880m với Hattrick 03 kỷ lục Dài nhất, Dốc nhất, Cú nhảy tiếp đất cao nhất Việt Nam.', 'dichvu_32.jpg', 3, 5, '(+84) 258 359 8888', 'Đảo Hòn Tre, Vĩnh Nguyên, Thành phố Nha Trang, tỉnh Khánh Hoà'),
(33, 'Vinpearl Submarine Nha Trang\r\n', 'Là tàu ngầm trong suốt 360 độ đầu tiên trên thế giới cùng thiết kế thân vỏ tàu độc đáo 100% acrylic trong suốt, Vinpearl Submarine Nha Trang mang đến cho du khách trải nghiệm có 1-0-2 với tầm nhìn vô cực, hòa mình trọn vẹn vào không gian sâu thẳm và huyền diệu của đại dương', 'dichvu_33.jpg', 3, 5, '258 359 8222', 'Đảo Hòn Tre, Vĩnh Nguyên, Thành phố Nha Trang, Tỉnh Khánh Hoà'),
(44, 'Vinpearl Discovery CNTT Nha Trang', 'Vinpearl Resort Nha Trang chào đón du khách bằng vẻ đẹp Á Đông thuần khiết với kiến trúc mang đậm phong cách Indochine sang trọng cùng bãi biển riêng tư hút mắt. Giữa vạn trải nghiệm sôi nổi, tại quần thể nghỉ dưỡng – giải trí biển hàng đầu khu vực của đảo Hòn Tre, Vinpearl Resort Nha Trang là thiên đàng trú ẩn yên bình dành cho những ai yêu thích nghỉ dưỡng và chăm sóc sức khỏe, là nơi để phục hồi năng lượng cho những tâm hồn sôi nổi yêu giải trí và khám phá, nơi ghi dấu hạnh phúc bằng một đám cưới trong mơ, hay hội họp đẳng cấp để dẫn lối tới thành công.', 'dichvu_7.jpg', 1, 4.5, '0345324789', 'Nha TRang'),
(45, 'Vinpear Resort Nha Trang', 'Vinpearl Resort Nha Trang chào đón du khách bằng vẻ đẹp Á Đông thuần khiết với kiến trúc mang đậm phong cách Indochine sang trọng cùng bãi biển riêng tư hút mắt. Giữa vạn trải nghiệm sôi nổi, tại quần thể nghỉ dưỡng – giải trí biển hàng đầu khu vực của đảo Hòn Tre, Vinpearl Resort Nha Trang là thiên đàng trú ẩn yên bình dành cho những ai yêu thích nghỉ dưỡng và chăm sóc sức khỏe, là nơi để phục hồi năng lượng cho những tâm hồn sôi nổi yêu giải trí và khám phá, nơi ghi dấu hạnh phúc bằng một đám cưới trong mơ, hay hội họp đẳng cấp để dẫn lối tới thành công.\r\n                        ', 'dichvu_3.jpg', 2, 4.5, '043543234', 'Nha Trang'),
(46, 'Tiên Tri Zũ Trụ Trần Dần', 'dasda                            \r\n                        ', 'dichvu_12.jpg', 1, 4.5, '023634523', 'Nha Trang'),
(56, 'Vinpearl Lovely Nha Trang', 'Vinpearl Resort Nha Trang chào đón du khách bằng vẻ đẹp Á Đông thuần khiết với kiến trúc mang đậm phong cách Indochine sang trọng cùng bãi biển riêng tư hút mắt. Giữa vạn trải nghiệm sôi nổi, tại quần thể nghỉ dưỡng – giải trí biển hàng đầu khu vực của đảo Hòn Tre, Vinpearl Resort Nha Trang là thiên đàng trú ẩn yên bình dành cho những ai yêu thích nghỉ dưỡng và chăm sóc sức khỏe, là nơi để phục hồi năng lượng cho những tâm hồn sôi nổi yêu giải trí và khám phá, nơi ghi dấu hạnh phúc bằng một đám cưới trong mơ, hay hội họp đẳng cấp để dẫn lối tới thành công.', 'pic1.jpg', 3, 4.5, '012321321', 'Nha Trang'),
(57, 'Vinpearl Earth Nha Trang', 'Vinpearl Resort Nha Trang chào đón du khách bằng vẻ đẹp Á Đông thuần khiết với kiến trúc mang đậm phong cách Indochine sang trọng cùng bãi biển riêng tư hút mắt. Giữa vạn trải nghiệm sôi nổi, tại quần thể nghỉ dưỡng – giải trí biển hàng đầu khu vực của đảo Hòn Tre, Vinpearl Resort Nha Trang là thiên đàng trú ẩn yên bình dành cho những ai yêu thích nghỉ dưỡng và chăm sóc sức khỏe, là nơi để phục hồi năng lượng cho những tâm hồn sôi nổi yêu giải trí và khám phá, nơi ghi dấu hạnh phúc bằng một đám cưới trong mơ, hay hội họp đẳng cấp để dẫn lối tới thành công.', 'test.jpg', 1, 5, '0345324789', 'Nha Trang'),
(58, 'Vinpearl Test Nha Trang', 'Vinpearl Resort Nha Trang chào đón du khách bằng vẻ đẹp Á Đông thuần khiết với kiến trúc mang đậm phong cách Indochine sang trọng cùng bãi biển riêng tư hút mắt. Giữa vạn trải nghiệm sôi nổi, tại quần thể nghỉ dưỡng – giải trí biển hàng đầu khu vực của đảo Hòn Tre, Vinpearl Resort Nha Trang là thiên đàng trú ẩn yên bình dành cho những ai yêu thích nghỉ dưỡng và chăm sóc sức khỏe, là nơi để phục hồi năng lượng cho những tâm hồn sôi nổi yêu giải trí và khám phá, nơi ghi dấu hạnh phúc bằng một đám cưới trong mơ, hay hội họp đẳng cấp để dẫn lối tới thành công.', 'chieunor.png', 1, 4.5, '0345324789', 'trai dat'),
(59, 'Vinpearl Alien NHa Trang', 'Vinpearl Resort Nha Trang chào đón du khách bằng vẻ đẹp Á Đông thuần khiết với kiến trúc mang đậm phong cách Indochine sang trọng cùng bãi biển riêng tư hút mắt. Giữa vạn trải nghiệm sôi nổi, tại quần thể nghỉ dưỡng – giải trí biển hàng đầu khu vực của đảo Hòn Tre, Vinpearl Resort Nha Trang là thiên đàng trú ẩn yên bình dành cho những ai yêu thích nghỉ dưỡng và chăm sóc sức khỏe, là nơi để phục hồi năng lượng cho những tâm hồn sôi nổi yêu giải trí và khám phá, nơi ghi dấu hạnh phúc bằng một đám cưới trong mơ, hay hội họp đẳng cấp để dẫn lối tới thành công.', 'pic3.jpg', 2, 4.5, '0345324789', 'Nha Trang'),
(60, 'Vinpearl Beautiful Nha Trang', 'Vinpearl Resort Nha Trang chào đón du khách bằng vẻ đẹp Á Đông thuần khiết với kiến trúc mang đậm phong cách Indochine sang trọng cùng bãi biển riêng tư hút mắt. Giữa vạn trải nghiệm sôi nổi, tại quần thể nghỉ dưỡng – giải trí biển hàng đầu khu vực của đảo Hòn Tre, Vinpearl Resort Nha Trang là thiên đàng trú ẩn yên bình dành cho những ai yêu thích nghỉ dưỡng và chăm sóc sức khỏe, là nơi để phục hồi năng lượng cho những tâm hồn sôi nổi yêu giải trí và khám phá, nơi ghi dấu hạnh phúc bằng một đám cưới trong mơ, hay hội họp đẳng cấp để dẫn lối tới thành công.', 'pic1.jpg', 3, 4.5, '0345324789', 'Nha TRang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gia`
--

CREATE TABLE `gia` (
  `id` int(16) NOT NULL,
  `id_dichvu` int(16) NOT NULL,
  `loaive` int(1) NOT NULL,
  `giatien` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gia`
--

INSERT INTO `gia` (`id`, `id_dichvu`, `loaive`, `giatien`) VALUES
(5, 3, 0, 3000000),
(6, 3, 1, 3500000),
(7, 4, 0, 4000000),
(8, 4, 1, 4500000),
(9, 5, 1, 2500000),
(10, 5, 0, 2000000),
(11, 6, 0, 3000000),
(12, 6, 1, 3500000),
(13, 7, 1, 1000000),
(15, 8, 1, 2500000),
(16, 8, 0, 2000000),
(17, 9, 0, 3000000),
(18, 9, 1, 3500000),
(19, 10, 0, 4000000),
(20, 10, 1, 4500000),
(21, 11, 1, 2500000),
(22, 11, 0, 2000000),
(23, 12, 0, 3000000),
(24, 12, 1, 3500000),
(25, 13, 0, 4000000),
(26, 13, 1, 4500000),
(27, 14, 1, 2500000),
(28, 14, 0, 2000000),
(30, 15, 1, 3500000),
(31, 16, 0, 4000000),
(32, 16, 1, 4500000),
(33, 17, 1, 2500000),
(34, 17, 0, 2000000),
(35, 18, 0, 3000000),
(36, 18, 1, 3500000),
(37, 19, 0, 4000000),
(38, 19, 1, 4500000),
(39, 20, 1, 2500000),
(40, 20, 0, 2000000),
(41, 21, 0, 3000000),
(42, 22, 1, 3500000),
(43, 23, 0, 4000000),
(44, 23, 1, 4500000),
(45, 24, 1, 2500000),
(46, 24, 0, 2000000),
(47, 25, 0, 3000000),
(48, 25, 1, 3500000),
(49, 26, 0, 4000000),
(50, 26, 1, 4500000),
(51, 27, 1, 2500000),
(52, 27, 0, 2000000),
(53, 28, 0, 3000000),
(54, 28, 1, 3500000),
(55, 29, 0, 4000000),
(56, 29, 1, 4500000),
(57, 30, 1, 2500000),
(58, 30, 0, 2000000),
(59, 31, 1, 30000000),
(61, 32, 0, 4000000),
(62, 32, 1, 4500000),
(63, 33, 1, 2500000),
(64, 33, 0, 2000000),
(84, 1, 1, 2000000),
(88, 2, 1, 5000000),
(89, 44, 1, 6000000),
(90, 44, 0, 4000000),
(91, 45, 1, 5000000),
(93, 46, 1, 3500000),
(95, 46, 0, 3000000),
(96, 7, 0, 750000),
(103, 1, 0, 1750000),
(107, 56, 1, 10000000),
(109, 56, 0, 9000000),
(110, 57, 1, 10000000),
(112, 58, 1, 2000000),
(114, 59, 1, 5000000),
(115, 59, 0, 4500000),
(116, 60, 1, 5600000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id_khachhang` int(16) NOT NULL,
  `id_gia` int(16) NOT NULL,
  `sl` int(20) NOT NULL,
  `ngaythem` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id_khachhang`, `id_gia`, `sl`, `ngaythem`) VALUES
(15, 96, 1, '2022-11-22 14:11:18'),
(15, 13, 1, '2022-11-22 14:11:18'),
(15, 16, 2, '2022-11-22 14:11:25'),
(15, 15, 1, '2022-11-22 14:11:25'),
(18, 103, 1, '2022-11-22 14:13:12'),
(18, 84, 1, '2022-11-22 14:13:12'),
(36, 103, 0, '2022-11-25 00:00:00'),
(36, 84, 1, '2022-11-25 00:00:00'),
(36, 88, 1, '2022-11-25 00:00:00'),
(38, 88, 1, '2022-11-26 00:00:00'),
(38, 7, 0, '2022-11-26 00:00:00'),
(38, 8, 1, '2022-11-26 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(16) NOT NULL,
  `id_khachhang` int(16) NOT NULL,
  `id_nhanvien` int(16) NOT NULL,
  `ngaythanhtoan` datetime NOT NULL,
  `ten_khachhang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt_khachhang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_khachhang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tongtien` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `id_khachhang`, `id_nhanvien`, `ngaythanhtoan`, `ten_khachhang`, `sdt_khachhang`, `email_khachhang`, `tongtien`) VALUES
(125, 18, 1, '2022-11-22 14:08:43', 'Nguyen Van Test', '0111222333', '1@', 19506600),
(126, 18, 1, '2022-11-22 14:09:08', 'Nguyen Van Test', '0111222333', '1@', 3500684),
(127, 15, 1, '2022-11-22 14:11:10', 'Coder Mobile', '0092313213', 'huydevmobile@gmail.com', 6502958),
(128, 1, 1, '2022-11-24 00:00:00', 'Test Mô Bi Le', '0382566545', 'testmobile@gmail.com', 14000000),
(129, 1, 1, '2022-11-24 00:00:00', 'Test Mô Bi Le', '0382566545', 'testmobile@gmail.com', 14000000),
(135, 1, 1, '2022-11-24 00:00:00', 'Test Mô Bi Le', '0382566545', 'testmobile@gmail.com', 38250000),
(136, 1, 1, '2022-11-25 00:00:00', 'Test Mô Bi Le', '0382566545', 'testmobile@gmail.com', 28000000),
(137, 1, 1, '2022-11-25 00:00:00', 'Test Mô Bi Le', '0382566545', 'testmobile@gmail.com', 4500000),
(138, 1, 1, '2022-11-25 00:00:00', 'Test Mô Bi Le', '0382566545', 'testmobile@gmail.com', 8500000),
(139, 36, 1, '2022-11-25 00:00:00', 'Tiên Tri Zũ Trụ Trần Dần', '0385247684', 'quysunho123@gmail.com', 13000000),
(140, 36, 1, '2022-11-25 00:00:00', 'Tiên Tri Zũ Trụ Trần Dần', '0385247684', 'quysunho123@gmail.com', 6000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(16) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sdt` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` int(1) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `name`, `sdt`, `diachi`, `ngaysinh`, `gioitinh`, `email`, `matkhau`, `avatar`) VALUES
(1, 'Test Mô Bi Le', '0382566545', 'Lỗ Đen Dũ Trụ', '2001-01-16', 1, 'testmobile@gmail.com', '123', 'pic0.jpg'),
(15, 'Coder Mobile', '0092313213', 'Nha Trang', '1111-11-09', 1, 'huydevmobile@gmail.com', '123', 'pic3.jpg'),
(18, 'Nguyen Van Test', '0111222333', 'Sao Hỏa', '2001-01-17', 1, '1@', '1', 'pic2.jpg'),
(36, 'Tiên Tri Zũ Trụ Trần Dần', '0385247684', 'Nha Trang', '2022-11-03', 1, 'quysunho123@gmail.com', '$2y$10$hodthj7uYuITJV5n8Z1ff.7SsLgPmK4DXD2Gl9.8JammIMIowW6Pu', 'pic1.jpg'),
(38, 'Nhóm PHP', '0345324789', '', '0000-00-00', 0, 'nhomphp@gmail.com', '$2y$10$mHzw6k/VMNJnwBS9.RlmJOcaCJFXzOfPiZkVI1RWXy4lrO7KJEFw2', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_dichvu`
--

CREATE TABLE `loai_dichvu` (
  `id` int(16) NOT NULL,
  `tenloai` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_dichvu`
--

INSERT INTO `loai_dichvu` (`id`, `tenloai`) VALUES
(1, 'Nghỉ dưỡng'),
(2, 'Ẩm thực'),
(3, 'Khám phá & Hoạt động'),
(4, 'Golf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_nv`
--

CREATE TABLE `loai_nv` (
  `id` int(16) NOT NULL,
  `tenloai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `luongcoban` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_nv`
--

INSERT INTO `loai_nv` (`id`, `tenloai`, `luongcoban`) VALUES
(1, 'Lễ Tân', 12000000),
(2, 'Kế toán', 12000000),
(5, 'Bẻo vệ', 10000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `idnv` int(16) NOT NULL,
  `id_loai` int(16) NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `sdt` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` int(1) NOT NULL,
  `anh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soca` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`idnv`, `id_loai`, `ten`, `diachi`, `ngaysinh`, `sdt`, `gioitinh`, `anh`, `email`, `matkhau`, `soca`) VALUES
(1, 2, 'Tiên Tri Zũ Trụ Trần Dần', 'Nha Trang', '2001-01-16', '0385247684', 1, 'meme.jpg', 'testadmin@gmail.com', '$2y$10$9MuPwSIrLW5J99.BY3t2mucj2ug12l2GGnvv86Hz8Pmru4Qq5Gh4e', 29),
(4, 1, 'Nguyễn Đức Huy', 'Nha Trang', '2022-11-05', '0385247684', 1, 'pic1.jpg', 'huyadmin@gmail.com', '$2y$10$MaEtPaBVGn/BTtlqXyqv.e1LmyhqV4q7//RdLse0v/t34UC9h4f3u', 20);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `soca`
--

CREATE TABLE `soca` (
  `id` int(16) NOT NULL,
  `id_nv` int(16) NOT NULL,
  `soca` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `soca`
--

INSERT INTO `soca` (`id`, `id_nv`, `soca`) VALUES
(1, 1, 20),
(2, 2, 30),
(3, 0, 20);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD KEY `fk_ctdh_gia` (`id_gia`),
  ADD KEY `fk_cthd_hd` (`id_hd`);

--
-- Chỉ mục cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_iddv_loaidv` (`id_loai`);

--
-- Chỉ mục cho bảng `gia`
--
ALTER TABLE `gia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_gia_dv` (`id_dichvu`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD KEY `fk_gh_kh` (`id_khachhang`),
  ADD KEY `fk_gh_giatien` (`id_gia`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_hd_nv` (`id_nhanvien`),
  ADD KEY `fk_hd_kh` (`id_khachhang`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_dichvu`
--
ALTER TABLE `loai_dichvu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_nv`
--
ALTER TABLE `loai_nv`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`idnv`),
  ADD KEY `fk_nv_loainv` (`id_loai`);

--
-- Chỉ mục cho bảng `soca`
--
ALTER TABLE `soca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_soca_nv` (`id_nv`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `gia`
--
ALTER TABLE `gia`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `loai_dichvu`
--
ALTER TABLE `loai_dichvu`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `loai_nv`
--
ALTER TABLE `loai_nv`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `idnv` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `soca`
--
ALTER TABLE `soca`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cthd`
--
ALTER TABLE `cthd`
  ADD CONSTRAINT `fk_ctdh_gia` FOREIGN KEY (`id_gia`) REFERENCES `gia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cthd_hd` FOREIGN KEY (`id_hd`) REFERENCES `hoadon` (`id`);

--
-- Các ràng buộc cho bảng `dichvu`
--
ALTER TABLE `dichvu`
  ADD CONSTRAINT `dichvu_ibfk_1` FOREIGN KEY (`id_loai`) REFERENCES `loai_dichvu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_iddv_loaidv` FOREIGN KEY (`id_loai`) REFERENCES `loai_dichvu` (`id`);

--
-- Các ràng buộc cho bảng `gia`
--
ALTER TABLE `gia`
  ADD CONSTRAINT `fk_gia_dv` FOREIGN KEY (`id_dichvu`) REFERENCES `dichvu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `fk_gh_giatien` FOREIGN KEY (`id_gia`) REFERENCES `gia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_gh_kh` FOREIGN KEY (`id_khachhang`) REFERENCES `khachhang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_hd_kh` FOREIGN KEY (`id_khachhang`) REFERENCES `khachhang` (`id`),
  ADD CONSTRAINT `fk_hd_nv` FOREIGN KEY (`id_nhanvien`) REFERENCES `nhanvien` (`idnv`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `fk_nv_loainv` FOREIGN KEY (`id_loai`) REFERENCES `loai_nv` (`id`),
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`id_loai`) REFERENCES `loai_nv` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
