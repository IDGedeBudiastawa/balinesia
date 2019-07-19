-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2018 at 04:02 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balinesia`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(20) NOT NULL,
  `event_id` int(20) NOT NULL,
  `user_idcom` int(20) NOT NULL,
  `comment_field` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment_sar`
--

CREATE TABLE `comment_sar` (
  `comsar_id` int(20) NOT NULL,
  `sarana_id` int(20) NOT NULL,
  `user_idsar` int(20) NOT NULL,
  `comment_sar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(100) NOT NULL,
  `evkat_id` int(100) NOT NULL,
  `user_id` int(20) NOT NULL,
  `event_nama` char(100) NOT NULL,
  `des_event` text NOT NULL,
  `price_ev` int(30) NOT NULL,
  `slot_member` int(20) NOT NULL,
  `ev_place` varchar(100) NOT NULL,
  `ev_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ev_kategori`
--

CREATE TABLE `ev_kategori` (
  `evkat_id` int(100) NOT NULL,
  `evkat_nama` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ev_kategori`
--

INSERT INTO `ev_kategori` (`evkat_id`, `evkat_nama`) VALUES
(1, 'Pawiwahan'),
(2, 'Mepandes');

-- --------------------------------------------------------

--
-- Table structure for table `fot_event`
--

CREATE TABLE `fot_event` (
  `foto_id` int(20) NOT NULL,
  `event_id` int(20) NOT NULL,
  `url_event` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fot_sar`
--

CREATE TABLE `fot_sar` (
  `fotsar_id` int(20) NOT NULL,
  `sarana_id` int(20) NOT NULL,
  `url_sarana` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `kab_id` int(20) NOT NULL,
  `kab_nama` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kabupaten`
--

INSERT INTO `kabupaten` (`kab_id`, `kab_nama`) VALUES
(1101, 'Badung'),
(1102, 'Bangli'),
(1103, 'Buleleng'),
(1104, 'Gianyar'),
(1105, 'Jembrana'),
(1106, 'Karangasem'),
(1107, 'Klungkung'),
(1108, 'Tabanan'),
(1109, 'Denpasar');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kec_id` int(20) NOT NULL,
  `kec_nama` char(100) NOT NULL,
  `kab_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`kec_id`, `kec_nama`, `kab_id`) VALUES
(1201, 'Abiansemal', 1101),
(1202, 'Kuta Selatan', 1101),
(1203, 'Kuta Utara', 1101),
(1204, 'Kuta', 1101),
(1205, 'Mengwi', 1101),
(1206, 'Petang', 1101),
(1207, 'Bangli', 1102),
(1208, 'Kintamani', 1102),
(1209, 'Susut', 1102),
(1210, 'Tembuku', 1102),
(1211, 'Banjar', 1103),
(1212, 'Buleleng', 1103),
(1213, 'Busung Biu', 1103),
(1214, 'Gerokgak', 1103),
(1215, 'Kubutambahan', 1103),
(1216, 'Sawan', 1103),
(1217, 'Seririt', 1103),
(1218, 'Sukasada', 1103),
(1219, 'Tejakula', 1103),
(1220, 'Blahbatuh', 1104),
(1221, 'Gianyar', 1104),
(1222, 'Payangan', 1104),
(1223, 'Tegalalang', 1104),
(1224, 'Tampaksiring', 1104),
(1225, 'Sukawati', 1104),
(1226, 'Ubud', 1104),
(1227, 'Jembrana', 1105),
(1228, 'Melaya', 1105),
(1229, 'Mendoyo', 1105),
(1230, 'Negara', 1105),
(1231, 'Pekutatan', 1105),
(1232, 'Abang', 1106),
(1233, 'Bebandem', 1106),
(1234, 'Karang Asem', 1106),
(1235, 'Kubu', 1106),
(1236, 'Manggis', 1106),
(1237, 'Rendang', 1106),
(1238, 'Selat', 1106),
(1239, 'Sidemen', 1106),
(1240, 'Banjarangkan', 1107),
(1241, 'Dawan', 1107),
(1242, 'Klungkung', 1107),
(1243, 'Nusa Penida', 1107),
(1244, 'Baturiti', 1108),
(1245, 'Kediri', 1108),
(1246, 'Kerambitan', 1108),
(1247, 'Marga', 1108),
(1248, 'Penebel', 1108),
(1249, 'Pupuan', 1108),
(1250, 'Selemadeg', 1108),
(1251, 'Selemadeg Timur', 1108),
(1252, 'Selemadeg Barat', 1108),
(1253, 'Tabanan', 1108),
(1254, 'Denpasar Barat', 1109),
(1255, 'Denpasar Selatan', 1109),
(1256, 'Denpasar Timur', 1109),
(1257, 'Denpasar utara', 1109);

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `kel_id` int(20) NOT NULL,
  `kel_nama` char(100) NOT NULL,
  `kec_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`kel_id`, `kel_nama`, `kec_id`) VALUES
(13001, 'Abiansemal', 1201),
(13002, 'Angantaka', 1201),
(13003, 'Ayunan', 1201),
(13004, 'Blahkiuh', 1201),
(13005, 'Bongkasa', 1201),
(13006, 'Bongkasa Pertiwi', 1201),
(13007, 'Darmasaba', 1201),
(13008, 'Dauh Yeh Cani', 1201),
(13009, 'Jagapati', 1201),
(13010, 'Mambal', 1201),
(13011, 'Mekar Bhuwana', 1201),
(13012, 'Punggul', 1201),
(13013, 'Sangeh', 1201),
(13014, 'Sedang', 1201),
(13015, 'Selat', 1201),
(13016, 'Sibang Gede', 1201),
(13017, 'Sibang Kaja', 1201),
(13018, 'Taman', 1201),
(13019, 'Benoa', 1202),
(13020, 'Jimbaran', 1202),
(13021, 'Kutuh', 1202),
(13022, 'Pecatu', 1202),
(13023, 'Tanjung Benoa', 1202),
(13024, 'Ungasan', 1202),
(13025, 'Canggu', 1203),
(13026, 'Dalung', 1203),
(13027, 'Kerobokan', 1203),
(13028, 'Kerobokan Kaja', 1203),
(13029, 'Kerobokan Kelod', 1203),
(13030, 'Tibubeneng', 1203),
(13031, 'Kedonganan', 1204),
(13032, 'Kuta', 1204),
(13033, 'Legian', 1204),
(13034, 'Seminyak', 1204),
(13035, 'Tuban', 1204),
(13036, 'Abianbase', 1205),
(13037, 'Baha', 1205),
(13038, 'Buduk', 1205),
(13039, 'Cemagi', 1205),
(13040, 'Gulingan', 1205),
(13041, 'Kapal', 1205),
(13042, 'Kekeran', 1205),
(13043, 'Kuwun', 1205),
(13044, 'Lukluk', 1205),
(13045, 'Mengwi', 1205),
(13046, 'Mengwitani', 1205),
(13047, 'Munggu', 1205),
(13048, 'Penarungan', 1205),
(13049, 'Pererenan', 1205),
(13050, 'Sading', 1205),
(13051, 'Sembung', 1205),
(13052, 'Sempidi', 1205),
(13053, 'Sobangan', 1205),
(13054, 'Tumbak Bayuh', 1205),
(13055, 'Werdi Bhuwana', 1205),
(13056, 'Belok', 1206),
(13057, 'Carangsari', 1206),
(13058, 'Getasan', 1206),
(13059, 'Pangsan', 1206),
(13060, 'Pelaga', 1206),
(13061, 'Petang', 1206),
(13062, 'Sulangai', 1206),
(13063, 'Bebalang', 1207),
(13064, 'Bunutin', 1207),
(13065, 'Cempaga', 1207),
(13066, 'Kawan', 1207),
(13067, 'Kayubihi', 1207),
(13068, 'Kubu', 1207),
(13069, 'Landih', 1207),
(13070, 'Pengotan', 1207),
(13071, 'Taman Bali', 1207),
(13072, 'Abang Songan', 1208),
(13073, 'Abuan', 1208),
(13074, 'Awan', 1208),
(13075, 'Bantang', 1208),
(13076, 'Banua', 1208),
(13077, 'Batu Dinding', 1208),
(13078, 'Batukaang', 1208),
(13079, 'Batur Selatan', 1208),
(13080, 'Batur Tengah', 1208),
(13081, 'Batur Utara', 1208),
(13082, 'Bayungcerik', 1208),
(13083, 'Bayunggede', 1208),
(13084, 'Belacan', 1208),
(13085, 'Belandingan', 1208),
(13086, 'Belanga', 1208),
(13087, 'Belantih', 1208),
(13088, 'Binyan', 1208),
(13089, 'Bonyoh', 1208),
(13090, 'Buahan', 1208),
(13091, 'Bunutin', 1208),
(13092, 'Catur', 1208),
(13093, 'Daup', 1208),
(13094, 'Dausa', 1208),
(13095, 'Gunungbau', 1208),
(13096, 'Katung', 1208),
(13097, 'Kedisan', 1208),
(13098, 'Kintamani', 1208),
(13099, 'Kutuh', 1208),
(13100, 'Langgahan', 1208),
(13101, 'Lembean', 1208),
(13102, 'Mangguh', 1208),
(13103, 'Manikliyu', 1208),
(13104, 'Mengani', 1208),
(13105, 'Pengejaran', 1208),
(13106, 'Pinggan', 1208),
(13107, 'Satra', 1208),
(13108, 'Sekaan', 1208),
(13109, 'Sekardadi', 1208),
(13110, 'Selulung', 1208),
(13111, 'Serahi', 1208),
(13112, 'Siyakin', 1208),
(13113, 'Songan A', 1208),
(13114, 'Songan B', 1208),
(13115, 'Subaya', 1208),
(13116, 'Sukawana', 1208),
(13117, 'Suter', 1208),
(13118, 'Terunyan', 1208),
(13119, 'Ulian', 1208),
(13120, 'Abuan', 1209),
(13121, 'Apuan', 1209),
(13122, 'Demulih', 1209),
(13123, 'Pengiangan', 1209),
(13124, 'Penglumbaran', 1209),
(13125, 'Selat', 1209),
(13126, 'Sulahan', 1209),
(13127, 'Susut', 1209),
(13128, 'Tiga', 1209),
(13129, 'Bangbang', 1210),
(13130, 'Jehem', 1210),
(13131, 'Peninjoan', 1210),
(13132, 'Tembuku', 1210),
(13133, 'Undisan', 1210),
(13134, 'Yangapi', 1210),
(13135, 'Banjar', 1211),
(13136, 'Banjar Tegeha', 1211),
(13137, 'Banyuatis', 1211),
(13138, 'Banyusri', 1211),
(13139, 'Cempaga', 1211),
(13140, 'Dencarik', 1211),
(13141, 'Gesing', 1211),
(13142, 'Gobleg', 1211),
(13143, 'Kaliasem', 1211),
(13144, 'Kayuputih', 1211),
(13145, 'Munduk', 1211),
(13146, 'Pedawa', 1211),
(13147, 'Sidetapa', 1211),
(13148, 'Tampekan', 1211),
(13149, 'Temukus', 1211),
(13150, 'Tigawasa', 1211),
(13151, 'Tirtasari', 1211),
(13152, 'Alasangker', 1212),
(13153, 'Anturan', 1212),
(13154, 'Astina', 1212),
(13155, 'Banjar Bali', 1212),
(13156, 'Banjar Jawa', 1212),
(13157, 'Banjar Tegal', 1212),
(13158, 'Banyuasri', 1212),
(13159, 'Banyuning', 1212),
(13160, 'Beratan', 1212),
(13161, 'Baktiseraga', 1212),
(13162, 'Jinengdalem', 1212),
(13163, 'Kalibukbuk', 1212),
(13164, 'Kaliuntu', 1212),
(13165, 'Kampung Anyar', 1212),
(13166, 'Kampung Baru', 1212),
(13167, 'Kampung Bugis', 1212),
(13168, 'Kampung Kajanan', 1212),
(13169, 'Kampung Singaraja', 1212),
(13170, 'Kendran', 1212),
(13171, 'Liligundi', 1212),
(13172, 'Nagasepaha', 1212),
(13173, 'Paket Agung', 1212),
(13174, 'Pemaron', 1212),
(13175, 'Penarukan', 1212),
(13176, 'Penglatan', 1212),
(13177, 'Petandakan', 1212),
(13178, 'Poh Bergong', 1212),
(13179, 'Sari Mekar', 1212),
(13180, 'Tukadmungga', 1212),
(13181, 'Bengkel', 1213),
(13182, 'Bongancina', 1213),
(13183, 'Busungbiu', 1213),
(13184, 'Kedis', 1213),
(13185, 'Kekeran', 1213),
(13186, 'Pelapuan', 1213),
(13187, 'Pucaksari', 1213),
(13188, 'Sepang', 1213),
(13189, 'Sepang Kelod', 1213),
(13190, 'Subuk', 1213),
(13191, 'Telaga', 1213),
(13192, 'Tinggarsari', 1213),
(13193, 'Tista', 1213),
(13194, 'Titab', 1213),
(13195, 'Umejero', 1213),
(13196, 'Banyupoh', 1214),
(13197, 'Celukan Bawang', 1214),
(13198, 'Gerokgak', 1214),
(13199, 'Musi', 1214),
(13200, 'Patas', 1214),
(13201, 'Pejarakan', 1214),
(13202, 'Pemuteran', 1214),
(13203, 'Pengulon', 1214),
(13204, 'Penyabangan', 1214),
(13205, 'Sanggalangit', 1214),
(13206, 'Sumber Klampok', 1214),
(13207, 'Sumberkima', 1214),
(13208, 'Tingatinga', 1214),
(13209, 'Tukad Sumaga', 1214),
(13210, 'Bengkala', 1215),
(13211, 'Bila', 1215),
(13212, 'Bontihing', 1215),
(13213, 'Bukti', 1215),
(13214, 'Bulian', 1215),
(13215, 'Depeha', 1215),
(13216, 'Kubutambahan', 1215),
(13217, 'Mengening', 1215),
(13218, 'Pakisan', 1215),
(13219, 'Tajun', 1215),
(13220, 'Tambakan', 1215),
(13221, 'Tamblang', 1215),
(13222, 'Tunjung', 1215),
(13223, 'Bebetin', 1216),
(13224, 'Bungkulan', 1216),
(13225, 'Galungan', 1216),
(13226, 'Giri Emas', 1216),
(13227, 'Jagaraga', 1216),
(13228, 'Kerobokan', 1216),
(13229, 'Lemukih', 1216),
(13230, 'Menyali', 1216),
(13231, 'Sangsit', 1216),
(13232, 'Sawan', 1216),
(13233, 'Sekumpul', 1216),
(13234, 'Sinabun', 1216),
(13235, 'Sudaji', 1216),
(13236, 'Suwug', 1216),
(13237, 'Banjar Asem', 1217),
(13238, 'Bestala', 1217),
(13239, 'Bubunan', 1217),
(13240, 'Gunungsari', 1217),
(13241, 'Joanyar', 1217),
(13242, 'Kalianget', 1217),
(13243, 'Kalisada', 1217),
(13244, 'Lokapaksa', 1217),
(13245, 'Mayong', 1217),
(13246, 'Munduk Bestala', 1217),
(13247, 'Pangkungparuk', 1217),
(13248, 'Patemon', 1217),
(13249, 'Pengastulan', 1217),
(13250, 'Rangdu', 1217),
(13251, 'Ringdikit', 1217),
(13252, 'Seririt', 1217),
(13253, 'Sulanyah', 1217),
(13254, 'Tangguwisia', 1217),
(13255, 'Ularan', 1217),
(13256, 'Umeanyar', 1217),
(13257, 'Unggahan', 1217),
(13258, 'Ambengan', 1218),
(13259, 'Gitgit', 1218),
(13260, 'Kayuputih', 1218),
(13261, 'Padangbulia', 1218),
(13262, 'Pancasari', 1218),
(13263, 'Panji', 1218),
(13264, 'Panji Anom', 1218),
(13265, 'Pengadungan', 1218),
(13266, 'Pengayaman', 1218),
(13267, 'Sambangan', 1218),
(13268, 'Selat', 1218),
(13269, 'Silangjana', 1218),
(13270, 'Sukasada', 1218),
(13271, 'Tegal Linggah', 1218),
(13272, 'Wanagiri', 1218),
(13273, 'Bondalem', 1219),
(13274, 'Julah', 1219),
(13275, 'Les', 1219),
(13276, 'Madenan', 1219),
(13277, 'Pacung', 1219),
(13278, 'Penuktukan', 1219),
(13279, 'Sambirenteng', 1219),
(13280, 'Sembiran', 1219),
(13281, 'Tejakula', 1219),
(13282, 'Tembok', 1219),
(13283, 'Bedulu', 1220),
(13284, 'Belega', 1220),
(13285, 'Blahbatuh', 1220),
(13286, 'Bona', 1220),
(13287, 'Buruan', 1220),
(13288, 'Keramas', 1220),
(13289, 'Medahan', 1220),
(13290, 'Pering', 1220),
(13291, 'Saba', 1220),
(13292, 'Abianbase', 1221),
(13293, 'Bakbakan', 1221),
(13294, 'Beng', 1221),
(13295, 'Bitera', 1221),
(13296, 'Gianyar', 1221),
(13297, 'Lebih', 1221),
(13298, 'Petak', 1221),
(13299, 'Petak Kaja', 1221),
(13300, 'Samplangan', 1221),
(13301, 'Serongga', 1221),
(13302, 'Siangan', 1221),
(13303, 'Sidan', 1221),
(13304, 'Sumita', 1221),
(13305, 'Suwat', 1221),
(13306, 'Tegal Tugu', 1221),
(13307, 'Temesi', 1221),
(13308, 'Tulikup', 1221),
(13309, 'Bresela', 1222),
(13310, 'Buahan', 1222),
(13311, 'Buahan kaja', 1222),
(13312, 'Bukian', 1222),
(13313, 'Kelusa', 1222),
(13314, 'Kerta', 1222),
(13315, 'Melinggih', 1222),
(13316, 'Melinggih Kelod', 1222),
(13317, 'Puhu', 1222),
(13318, 'Kedisan', 1223),
(13319, 'Keliki', 1223),
(13320, 'Kenderan', 1223),
(13321, 'Pupuan', 1223),
(13322, 'Sebatu', 1223),
(13323, 'Taro', 1223),
(13324, 'Tegallalang', 1223),
(13325, 'Manukaya', 1224),
(13326, 'Pejeng', 1224),
(13327, 'Pejeng Kaja', 1224),
(13328, 'Pejeng Kangin', 1224),
(13329, 'Pejeng Kawan', 1224),
(13330, 'Pejeng Kelod', 1224),
(13331, 'Sanding', 1224),
(13332, 'Tampaksiring', 1224),
(13333, 'Batuan', 1225),
(13334, 'Batuan Kaler', 1225),
(13335, 'Batubulan', 1225),
(13336, 'Batubulan Kangin', 1225),
(13337, 'Celuk', 1225),
(13338, 'Guwang', 1225),
(13339, 'Kemenuh', 1225),
(13340, 'Ketewel', 1225),
(13341, 'Singapadu', 1225),
(13342, 'Singapadu Kaler', 1225),
(13343, 'Singapadu Tengah', 1225),
(13344, 'Sukawati', 1225),
(13345, 'Kedewatan', 1226),
(13346, 'Lodtunduh', 1226),
(13347, 'Mas', 1226),
(13348, 'Peliatan', 1226),
(13349, 'Petulu', 1226),
(13350, 'Sayan', 1226),
(13351, 'Singakerta', 1226),
(13352, 'Ubud', 1226);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_id` int(20) NOT NULL,
  `id_product` int(20) NOT NULL,
  `id_sarana` int(20) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `price_product` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `total_pay` int(20) NOT NULL,
  `pay_status` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rate_event`
--

CREATE TABLE `rate_event` (
  `evrate_id` int(20) NOT NULL,
  `event_id` int(20) NOT NULL,
  `user_idev` int(20) NOT NULL,
  `rating` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rate_sar`
--

CREATE TABLE `rate_sar` (
  `sarate_id` int(20) NOT NULL,
  `sarana_id` int(20) NOT NULL,
  `user_idsarate` int(20) NOT NULL,
  `rating_sar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sarana`
--

CREATE TABLE `sarana` (
  `sarana_id` int(100) NOT NULL,
  `sarkat_id` int(100) NOT NULL,
  `user_id` int(20) NOT NULL,
  `sar_nama` varchar(100) NOT NULL,
  `des_sar` text NOT NULL,
  `stock_sar` int(20) NOT NULL,
  `sar_price` int(20) NOT NULL,
  `pilihan` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sar_kategori`
--

CREATE TABLE `sar_kategori` (
  `sarkat_id` int(100) NOT NULL,
  `sarkat_nama` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `full_name` char(30) NOT NULL,
  `username` char(30) NOT NULL,
  `address` text NOT NULL,
  `village` int(20) NOT NULL,
  `region` int(20) NOT NULL,
  `kecamatan` int(20) NOT NULL,
  `path` varchar(200) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(20) NOT NULL,
  `repassword` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `full_name`, `username`, `address`, `village`, `region`, `kecamatan`, `path`, `email`, `password`, `repassword`, `birthday`, `phone`, `gender`) VALUES
(1, 'I Dewa Gede Budiastawa', 'budiastawa44', 'Jalan Tukad Yeh Jinah No.5, Samplangan, Gianyar ', 0, 1104, 1221, '', 'budiastawa44', '@budiastawa44', '@budiastawa44', '2018-04-24', '089635922035', 'male'),
(2, 'I Dewa Ayu Budiastuti', 'budiastuti44', 'Gianyar ', 0, 1104, 1221, '', 'budiastuti44@gmail.com', 'budiastuti44', 'budiastuti44', '2018-04-24', '08964678', 'female'),
(3, 'admin', 'admin44', 'Jalan Kampus Unud ', 0, 1104, 1221, '', 'admin@gmail.com', 'admin1234', 'admin1234', '2018-04-11', '089635922035', 'male'),
(4, 'I Dewa Putu Budiartana', 'budiartana', 'Jalan Tukad Yeh Jinah ', 13300, 1104, 1221, '', 'budiartana@gmail.com', 'budiartana44', 'budiartana44', '2018-05-17', '08199905678', 'male'),
(5, 'I Dewa Ayu Budiartini', 'budiartini', 'Jalan Tukad Yeh Jinah ', 13300, 1104, 1221, '', 'budiartini@gmail.com', 'budiartini44', 'budiartini44', '2018-05-22', '085739678', 'female'),
(6, 'I Dewa Gede Budiasa', 'budiasa', 'Jalan Tukad Yeh Jinah ', 13300, 1104, 1221, '', 'budiasa@gmail.com', 'budiasa44', 'budiasa44', '2018-05-25', '0896753498', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `event_id_2` (`event_id`);

--
-- Indexes for table `comment_sar`
--
ALTER TABLE `comment_sar`
  ADD PRIMARY KEY (`comsar_id`),
  ADD KEY `sarana_id` (`sarana_id`),
  ADD KEY `sarana_id_2` (`sarana_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `evkat_id` (`evkat_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `evkat_id_2` (`evkat_id`),
  ADD KEY `user_id_2` (`user_id`),
  ADD KEY `evkat_id_3` (`evkat_id`),
  ADD KEY `user_id_3` (`user_id`);

--
-- Indexes for table `ev_kategori`
--
ALTER TABLE `ev_kategori`
  ADD PRIMARY KEY (`evkat_id`),
  ADD KEY `evkat_id` (`evkat_id`),
  ADD KEY `evkat_id_2` (`evkat_id`);

--
-- Indexes for table `fot_event`
--
ALTER TABLE `fot_event`
  ADD PRIMARY KEY (`foto_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `event_id_2` (`event_id`);

--
-- Indexes for table `fot_sar`
--
ALTER TABLE `fot_sar`
  ADD PRIMARY KEY (`fotsar_id`),
  ADD KEY `sarana_id` (`sarana_id`),
  ADD KEY `sarana_id_2` (`sarana_id`);

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`kab_id`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kec_id`),
  ADD KEY `kab_id` (`kab_id`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`kel_id`),
  ADD KEY `kec_id` (`kec_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_product_2` (`id_product`),
  ADD KEY `id_product_3` (`id_product`),
  ADD KEY `id_sarana` (`id_sarana`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `order_id_2` (`order_id`),
  ADD KEY `order_id_3` (`order_id`),
  ADD KEY `order_id_4` (`order_id`);

--
-- Indexes for table `rate_event`
--
ALTER TABLE `rate_event`
  ADD PRIMARY KEY (`evrate_id`),
  ADD KEY `event_id` (`event_id`),
  ADD KEY `event_id_2` (`event_id`);

--
-- Indexes for table `rate_sar`
--
ALTER TABLE `rate_sar`
  ADD PRIMARY KEY (`sarate_id`),
  ADD KEY `sarana_id` (`sarana_id`),
  ADD KEY `sarana_id_2` (`sarana_id`);

--
-- Indexes for table `sarana`
--
ALTER TABLE `sarana`
  ADD PRIMARY KEY (`sarana_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sarkat_id` (`sarkat_id`);

--
-- Indexes for table `sar_kategori`
--
ALTER TABLE `sar_kategori`
  ADD PRIMARY KEY (`sarkat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `kecamatan` (`kecamatan`),
  ADD KEY `village` (`village`),
  ADD KEY `region` (`region`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment_sar`
--
ALTER TABLE `comment_sar`
  MODIFY `comsar_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `ev_kategori`
--
ALTER TABLE `ev_kategori`
  MODIFY `evkat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fot_event`
--
ALTER TABLE `fot_event`
  MODIFY `foto_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fot_sar`
--
ALTER TABLE `fot_sar`
  MODIFY `fotsar_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kabupaten`
--
ALTER TABLE `kabupaten`
  MODIFY `kab_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1110;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `kec_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1258;
--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `kel_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13353;
--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rate_event`
--
ALTER TABLE `rate_event`
  MODIFY `evrate_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rate_sar`
--
ALTER TABLE `rate_sar`
  MODIFY `sarate_id` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sarana`
--
ALTER TABLE `sarana`
  MODIFY `sarana_id` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment_sar`
--
ALTER TABLE `comment_sar`
  ADD CONSTRAINT `comment_sar_ibfk_1` FOREIGN KEY (`sarana_id`) REFERENCES `sarana` (`sarana_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`evkat_id`) REFERENCES `ev_kategori` (`evkat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fot_event`
--
ALTER TABLE `fot_event`
  ADD CONSTRAINT `fot_event_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fot_sar`
--
ALTER TABLE `fot_sar`
  ADD CONSTRAINT `fot_sar_ibfk_1` FOREIGN KEY (`sarana_id`) REFERENCES `sarana` (`sarana_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rate_event`
--
ALTER TABLE `rate_event`
  ADD CONSTRAINT `rate_event_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rate_sar`
--
ALTER TABLE `rate_sar`
  ADD CONSTRAINT `rate_sar_ibfk_1` FOREIGN KEY (`sarana_id`) REFERENCES `sarana` (`sarana_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sarana`
--
ALTER TABLE `sarana`
  ADD CONSTRAINT `sarana_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sarana_ibfk_2` FOREIGN KEY (`sarkat_id`) REFERENCES `sar_kategori` (`sarkat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
