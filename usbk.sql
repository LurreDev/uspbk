-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 31, 2023 at 08:29 PM
-- Server version: 5.7.39
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usbk`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(12) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `article`
--
DELIMITER $$
CREATE TRIGGER `tanggal` BEFORE INSERT ON `article` FOR EACH ROW BEGIN
    IF NEW. date = '0000-00-00 00:00:00' THEN
        SET NEW.date = CURRENT_TIMESTAMP();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(12) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `user` char(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `nis` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `kodemapel` varchar(20) NOT NULL,
  `jumlahsoal` int(11) NOT NULL,
  `kodesoal` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` varchar(20) NOT NULL,
  `waktu` varchar(10) NOT NULL,
  `jawabansiswa` varchar(100) NOT NULL,
  `benar` varchar(10) NOT NULL,
  `salah` varchar(10) NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `kuncisoal` varchar(100) NOT NULL,
  `mulaiujian` varchar(12) NOT NULL,
  `lamaujian` varchar(12) NOT NULL,
  `waktuselesai` varchar(12) NOT NULL,
  `sisawaktu` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`nis`, `nama`, `kelas`, `kodemapel`, `jumlahsoal`, `kodesoal`, `aktif`, `waktu`, `jawabansiswa`, `benar`, `salah`, `nilai`, `kuncisoal`, `mulaiujian`, `lamaujian`, `waktuselesai`, `sisawaktu`) VALUES
('17001', 'Nam Dosan', '12TKJ', 'IPA', 40, 'IPA-1', 'Aktif', '60', 'AABXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', '', '', '', '', '07:23:27', '01:00:00', '08:20:27', '3360'),
('17010', 'Andrew', '12TKJ', 'TKJ', 5, 'TKJ12', 'Aktif', '60', 'AXXXX', '', '', '', '', '11:41:07', '01:00:00', '12:42:07', '2940'),
('17466', 'ABDUL AZIZ', '12TKJ', 'IPA', 40, 'IPA-1', 'Aktif', '60', 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', '', '', '', '', '15:02:40', '01:00:00', '16:03:40', '3600');

-- --------------------------------------------------------

--
-- Table structure for table `nilaihasil`
--

CREATE TABLE `nilaihasil` (
  `id` int(10) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `kodemapel` varchar(20) NOT NULL,
  `jumlahsoal` int(11) NOT NULL,
  `kodesoal` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `aktif` varchar(20) NOT NULL,
  `jawabansiswa` varchar(100) NOT NULL,
  `benar` varchar(10) NOT NULL,
  `salah` varchar(10) NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `kuncisoal` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilaihasil`
--

INSERT INTO `nilaihasil` (`id`, `nis`, `nama`, `kelas`, `kodemapel`, `jumlahsoal`, `kodesoal`, `aktif`, `jawabansiswa`, `benar`, `salah`, `nilai`, `kuncisoal`) VALUES
(12, '17470TKJ12', 'ADE LIAN YUNITA PUTRI', '12TKJ', 'TKJ', 5, 'TKJ12', '1', 'CBCAC', '03:06:24pm', '03-06-2022', '20', 'ADAAB'),
(11, '17467TKJ12', 'ABDUL MALIK FAJAR', '12TKJ', 'TKJ', 5, 'TKJ12', '1', 'AAABC', '12:49:35pm', '02-06-2022', '40', 'ADAAB'),
(10, '17466TKJ12', 'ABDUL AZIZ', '12TKJ', 'TKJ', 5, 'TKJ12', '1', 'ADAAD', '11:43:00am', '21-12-2021', '80', 'ADAAB');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id` int(11) NOT NULL,
  `n_sekolah` varchar(200) NOT NULL,
  `sub_n_sekolah` varchar(300) NOT NULL,
  `kode_sekolah` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `logo_ujian` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `logo_kota` varchar(200) NOT NULL,
  `web` varchar(300) NOT NULL,
  `bg_login` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id`, `n_sekolah`, `sub_n_sekolah`, `kode_sekolah`, `logo`, `logo_ujian`, `kota`, `logo_kota`, `web`, `bg_login`) VALUES
(1, 'SMK PGRI 1 JOMBANG', 'Jl. Pattimura V No. 75 Jombang', 'SUB RAYON 06', 'logo.png', 'logoheader.png', 'JOMBANG', '', 'smkpgri1jombang.sch.id', 'wall-min.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kelas` text NOT NULL,
  `pass` varchar(255) NOT NULL,
  `Id_User` int(11) NOT NULL DEFAULT '1',
  `Id_Usergroup_User` int(11) NOT NULL DEFAULT '1',
  `foto` varchar(100) DEFAULT NULL,
  `sesi` int(11) NOT NULL,
  `ruang` varchar(30) NOT NULL,
  `statuslogin` varchar(20) NOT NULL DEFAULT '0',
  `online` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama`, `kelas`, `pass`, `Id_User`, `Id_Usergroup_User`, `foto`, `sesi`, `ruang`, `statuslogin`, `online`) VALUES
(31, '17466', 'ABDUL AZIZ', '12TKJ', '17466', 1, 1, NULL, 1, 'Ruang-1', '0', '2'),
(32, '17467', 'ABDUL MALIK FAJAR', '12TKJ', '17467', 1, 1, NULL, 1, 'Ruang-1', '0', '2'),
(33, '17468', 'ACHMAD HIDAYAT', '12TKJ', '17468', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(34, '17469', 'ACMAD MUZAKI', '12TKJ', '17469', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(35, '17470', 'ADE LIAN YUNITA PUTRI', '12TKJ', '17470', 1, 1, NULL, 1, 'Ruang-1', '0', '2'),
(36, '17471', 'ADE RIZKY CAHYONO', '12TKJ', '17471', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(37, '17472', 'ADELIA RIKE ALVIONITA', '12TKJ', '17472', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(38, '17473', 'ADINDA PEBRUARI DEWI', '12TKJ', '17473', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(39, '17474', 'AINUL GILANG PRIYATAMA', '12TKJ', '17474', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(40, '17475', 'AKBAR NISP IMAMI', '12TKJ', '17475', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(41, '17476', 'ALMA YUSILIA ULFA', '12TKJ', '17476', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(42, '17477', 'AMALYA SYAHBERINA', '12TKJ', '17477', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(43, '17478', 'AMRI LUKMAN HANAFI', '12TKJ', '17478', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(44, '17479', 'ANDRIAN LISTANTO', '12TKJ', '17479', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(45, '17480', 'ANGGA DWI FIRNANDA', '12TKJ', '17480', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(46, '17481', 'ANGGUN KUSWANDINI', '12TKJ', '17481', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(47, '17482', 'ANINDA PURWANTI', '12TKJ', '17482', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(48, '17483', 'ANNA ZAROTUS S', '12TKJ', '17483', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(49, '17484', 'ARUM YULIA', '12TKJ', '17484', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(50, '17485', 'ARYA DWI PRASETYO', '12TKJ', '17485', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(51, '17486', 'ASYIFAH NURUL FAUZIAH', '12TKJ', '17486', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(52, '17487', 'BAGAS PRAMUDITO', '12TKJ', '17487', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(53, '17488', 'BAGUS PRAYOGO', '12TKJ', '17488', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(54, '17489', 'BAYU SETIAWAN', '12TKJ', '17489', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(55, '17490', 'CINDY IKA NADYA', '12TKJ', '17490', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(56, '17491', 'CLARISA BEKANTRI', '12TKJ', '17491', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(57, '17492', 'DADANG IRAWAN', '12TKJ', '17492', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(58, '17493', 'DEBY EVITALIA', '12TKJ', '17493', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(59, '17494', 'DENY PANCA ROMADHONI', '12TKJ', '17494', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(60, '17495', 'DESI ROSALINDAH', '12TKJ', '17495', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(61, '17496', 'DHIKA DWI KUSWANTO', '12TKJ', '17496', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(62, '17497', 'DITA YULISTINA PRIMANDANA', '12TKJ', '17497', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(63, '17498', 'DZAKI ELAPANGGA', '12TKJ', '17498', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(64, '17499', 'EKA NUR ZIANA FIRDAUS', '12TKJ', '17499', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(65, '17500', 'EKA SEPTIA SAPUTRA', '12TKJ', '17500', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(66, '17501', 'ELIYANA', '12TKJ', '17501', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(67, '17502', 'ELOK  AMELIANA', '12TKJ', '17502', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(68, '17503', 'ELOK PURBAYANI', '12TKJ', '17503', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(69, '17504', 'ERIKA SEPTYANINGTYAS', '12TKJ', '17504', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(70, '17505', 'ERWIN DWI KUSUMA', '12TKJ', '17505', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(71, '17506', 'FANI FRANSISKA DEWI', '12TKJ', '17506', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(72, '17507', 'FERLINA WIDYAWATI', '12TKJ', '17507', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(73, '17508', 'FITRI LISTYANA', '12TKJ', '17508', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(74, '17509', 'FRANSISKO ARDIANSA PUTRA', '12TKJ', '17509', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(75, '17511', 'HENDRY DWI KURNIAWAN', '12TKJ', '17511', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(76, '17512', 'IAN RAMADANA', '12TKJ', '17512', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(77, '17513', 'IDA NUR AFIFAH', '12TKJ', '17513', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(78, '17514', 'ILHAM PRASETYO', '12TKJ', '17514', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(79, '17515', 'INDRI DEVITA SARI', '12TKJ', '17515', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(80, '17516', 'IRFAN MAULANA', '12TKJ', '17516', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(81, '17517', 'IRMA DEAH KUSUMA WARDANI', '12TKJ', '17517', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(82, '17518', 'JIHAN RACHMAWATI', '12TKJ', '17518', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(83, '17519', 'KRISNO WAHYU SEJATI', '12TKJ', '17519', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(84, '17520', 'KRISTINA SAFITRI LESTARI', '12TKJ', '17520', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(85, '17521', 'KUSMININGSIH ADITYA', '12TKJ', '17521', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(86, '17522', 'LAYLA IZA NABILA', '12TKJ', '17522', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(87, '17523', 'LILIK AMILIA WATI', '12TKJ', '17523', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(88, '17524', 'LUTFI  HIDAYAH', '12TKJ', '17524', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(89, '17525', 'M. FAISAL ARIANTO', '12TKJ', '17525', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(90, '17526', 'MOCH. ARIFIN SETIAWAN', '12TKJ', '17526', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(91, '17527', 'MOCHAMMAD FANANI', '12TKJ', '17527', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(92, '17528', 'MOHAMAD MIFTACHUL ULUM', '12TKJ', '17528', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(93, '17529', 'MUCHAMAD MAHARDIKA', '12TKJ', '17529', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(94, '17530', 'MUCHAMMAD IFAN SYAIFUDIN', '12TKJ', '17530', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(95, '17531', 'MUDRIKA', '12TKJ', '17531', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(96, '17532', 'MUHAMMAD ARIF ALFARIZI', '12TKJ', '17532', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(97, '17533', 'MUHAMMAD KAVANA RAFLY PUTRA IRVAN', '12TKJ', '17533', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(98, '17534', 'MUHAMMAD KHOIRUR ROHMAN', '12TKJ', '17534', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(99, '17535', 'MUHAMMAD RAVY ANDI KURNIAWAN', '12TKJ', '17535', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(100, '17536', 'MUKHAMMAD KHOIRUN NASIKHIN', '12TKJ', '17536', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(101, '17537', 'MUSA BAGUS WICAKSONO', '12TKJ', '17537', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(102, '17538', 'NADILA EKA ANGGRAINI', '12TKJ', '17538', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(103, '17539', 'NINDY MAYSICE MALENDES', '12TKJ', '17539', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(104, '17540', 'NOVA TRI KUSUMA', '12TKJ', '17540', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(105, '17541', 'NOVIE ROCHMAWATI', '12TKJ', '17541', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(106, '17542', 'NUR ALIFAH', '12TKJ', '17542', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(107, '17543', 'NUR AVIVA SITA DEWI', '12TKJ', '17543', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(108, '17544', 'NUR FAHMIYATUL WAHYUNI', '12TKJ', '17544', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(109, '17545', 'NUR WAHYU LAILATUL MUBAROKAH', '12TKJ', '17545', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(110, '17546', 'PUJI ASTUTIK', '12TKJ', '17546', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(111, '17547', 'RETNO AULLIA', '12TKJ', '17547', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(112, '17548', 'RETNO TRI WULANSARI', '12TKJ', '17548', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(113, '17549', 'REVAN JOKO KRISMONO', '12TKJ', '17549', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(114, '17550', 'REYNA OCTAVIANUR ROHMA', '12TKJ', '17550', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(115, '17551', 'RINI SURYA ADI PRATIWI', '12TKJ', '17551', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(116, '17552', 'RITA EKA PRATIWI', '12TKJ', '17552', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(117, '17553', 'ROCKY ARDIANSYAH YUDISTIRA PUTRA', '12TKJ', '17553', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(118, '17554', 'SELLY PICESA', '12TKJ', '17554', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(119, '17555', 'SEPTI WULAN DARI', '12TKJ', '17555', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(120, '17556', 'SHAIBATUL  HAMNI', '12TKJ', '17556', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(121, '17557', 'SIFAUL FUADI', '12TKJ', '17557', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(122, '17558', 'SILVIA DAMAYATI', '12TKJ', '17558', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(123, '17559', 'SILVIA NUR HIDAYATI', '12TKJ', '17559', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(124, '17560', 'SITI MASRUROH', '12TKJ', '17560', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(125, '17561', 'SITI NUR AISAH', '12TKJ', '17561', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(126, '17562', 'SITI SALWATUS ZAHIROH', '12TKJ', '17562', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(127, '17563', 'SOFIAN KURNIAWAN', '12TKJ', '17563', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(128, '17564', 'STEVIA INGGIS SAVELLA', '12TKJ', '17564', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(129, '17565', 'SUSIANJANI', '12TKJ', '17565', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(130, '17566', 'TRI AMIN SANTOSO', '12TKJ', '17566', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(131, '17567', 'VIKRI INDRA AMINUDIN', '12TKJ', '17567', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(132, '17568', 'VIRGIANO DWIYUAN', '12TKJ', '17568', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(133, '17569', 'WAHYU BUDI SANTOSO', '12TKJ', '17569', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(134, '17570', 'WALIDAH AWAL BIRROHMAH', '12TKJ', '17570', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(135, '17571', 'WILMA YUSNITA', '12TKJ', '17571', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(136, '17572', 'WIWIN SEPTI ANJANI', '12TKJ', '17572', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(137, '17573', 'YOVITA AURELLYA PUTRI', '12TKJ', '17573', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(138, '17574', 'YUNI ROHMASARI', '12TKJ', '17574', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(139, '17575', 'ZAKARIYAH', '12TKJ', '17575', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(140, '17576', 'ZANUBA UMI IZZATI', '12TKJ', '17576', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(141, '17577', 'ZULIANI', '12TKJ', '17577', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(142, '17583', 'LUQMAN HAFID HABIBULLOH', '12TKJ', '17583', 1, 1, NULL, 1, 'Ruang-1', '0', ''),
(143, '17584', 'RISKY NUR CAHYA PUTRA', '12TKJ', '17584', 1, 1, NULL, 1, 'Ruang-1', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `jenissoal` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodemapel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodesoal` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nomersoal` int(11) NOT NULL,
  `soal` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambarsoal` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan3` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan4` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pilihan5` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_a` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_b` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_c` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_d` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_e` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `audio` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kunci` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `jenissoal`, `kodemapel`, `kodesoal`, `nomersoal`, `soal`, `gambarsoal`, `pilihan1`, `pilihan2`, `pilihan3`, `pilihan4`, `pilihan5`, `gambar_a`, `gambar_b`, `gambar_c`, `gambar_d`, `gambar_e`, `audio`, `kunci`) VALUES
(2, 'USPBK', 'IPA', 'IPA-1', 1, 'Sesuatu yang diketahui langsung dari pengalaman, berdasarkan serapan pancaindra, dan diolah oleh akal budi secara spontan adalah.....', '', 'Pengetahuan', ' Ilmu pengetahuan', 'Pengetahuan non ilmiah', 'Pengetahuan pra ilmiah', 'Kebenaran', '', '', '', '', '', '', 'A'),
(3, 'USPBK', 'IPA', 'IPA-1', 2, 'Praduga seseorang ilmuwan terhadap suatu kasus yang didasarkan pada telaah pustaka disebut.....', '', 'Sintesis', ' Analisis', ' Hipotesis', 'Replikatif', 'Teori', '', '', '', '', '', '', 'C'),
(4, 'USPBK', 'IPA', 'IPA-1', 3, 'Tata urutan yang benar dalam melakukan langkah-langkah metode ilmiah adalah&hellip;.', 'IPA_3.jpg', '1-2-3-4-5-6', '5-4-3-2-6-1', '3-4-2-6-5-1', '4-5-6-1-3-2', '4-1-6-2-3-5', '', '', '', '', '', '', 'E'),
(5, 'USPBK', 'IPA', 'IPA-1', 4, 'â€˜Adakah pengaruh motivasi belajar terhadap hasil belajar siswa SMK PGRI 1 JOMBANG ?â€™. Hipotesis alternatif dari rumusan masalah tersebut adalahâ€¦.', '', 'Tidak ada pengaruh motivasi belajar terhadap hasil belajar siswa SMK PGRI 1 JOMBANG', 'Ada pengaruh motivasi belajar terhadap hasil belajar siswa SMK PGRI 1 JOMBANG', 'Tidak ada pengaruh kecerdasan siswa terhadap hasil belajar', 'Ada pengaruh hasil belajar terhadap kesuksesan siswa SMK PGRI 1 JOMBANG', 'Semakin tinggi hasil belajar siswa maka tingkat motivasi siswa juga semakin tinggi', '', '', '', '', '', '', 'B'),
(6, 'USPBK', 'IPA', 'IPA-1', 5, 'â€˜Pengaruh umur betina dan macam strain jantan terhadap keberhasilan kawin kembali individu betina Drosophila melanogasterâ€™. Variabel bebas dari judul penelitian tersebut adalah.....', '', 'Umur betina', 'Macam strain jantan', 'Keberhasilan kawin', 'Individu betina Drosophila melanogaster', ' Umur betina dan macam strain jantan', '', '', '', '', '', '', 'E'),
(7, 'USPBK', 'IPA', 'IPA-1', 6, 'Berikut ini beberapa hal yang membuktikan bahwa bumi bulat, kecuali.....', '', 'Hasil pemotretan bumi dari luar angkasa', 'Pada saat terjadi gerhana bulan, bagian bulan yang tertutup bayangan bumi berupa garis lurus', 'Jika seseorang berlayar ke barat, maka orang tersebut akan kembali ke tempat semula dari arah yang berlawanan', 'Jika berada di pelabuhan dan melihat kapal dari kejauhan maka yang tampak terlebih dahulu adalah bagian ujungnya, kemudian baru badan kapal', 'Ketika menjelang matahari terbenam di ufuk barat tampak kemerah-merahan', '', '', '', '', '', '', 'B'),
(8, 'USPBK', 'IPA', 'IPA-1', 7, 'Gempa dengan kekuatan lebih 6,4 &ndash; 7,4 SR adalah.....', '', 'Gempa kecil', 'Gelombang sedang', 'Gempa sangat jauh', 'Gempa besar', 'Gempa sangat besar', '', '', '', '', '', '', 'D'),
(9, 'USPBK', 'IPA', 'IPA-1', 8, 'Tanda-tanda terjadinya tsunami, kecuali.....', '', 'Terjadinya gempa bumi di tengah laut dengan kekuatan besar ', 'Awan tegak lurus', 'Munculnya ombak yang kuat tidak seperti biasanya', 'Tercium bau garam yang menyengat', 'Terdengar suara gemuruh, mendesis atau ledakan dari tengah laut', '', '', '', '', '', '', 'B'),
(10, 'USPBK', 'IPA', 'IPA-1', 9, 'Jika GMT menunjukkan pukul 12.00 maka ditempat yang terletak pada 45º BB menunjukkan pukul.....', '', ' 03.00', '09.00', '11.00', '15.00', '12.00', '', '', '', '', '', '', 'B'),
(11, 'USPBK', 'IPA', 'IPA-1', 10, ' Yang bukan gejala yang terjadi setelah sebuah gunung api mati atau istirahat adalah.....', '', 'Sumber air panas', 'Sumber mineral', 'Geyser', 'Gempa vulkanik', 'Sumber gas (ekhalasi)', '', '', '', '', '', '', 'D'),
(12, 'USPBK', 'IPA', 'IPA-1', 11, 'Berikut ini bukan penyebab pencemaran udara adalah.....', '', 'CFC', 'Asap', 'CO', 'NOx', 'O2', '', '', '', '', '', '', ' '),
(13, 'USPBK', 'IPA', 'IPA-1', 12, 'CO dalam jumlah besar bila diserap tubuh sangat mematikan karena.....', '', 'Hb meningkat jumlahnya', 'Hb banyak mengikat CO', 'Hb banyak mengikat O2', 'Darah kekurangan CO', 'Darah tidak bekerja dengan baik', '', '', '', '', '', '', 'B'),
(14, 'USPBK', 'IPA', 'IPA-1', 13, 'Ketika ganggang yang mengalami blooming mati, sel-selnya akan turun kedasar perairan dan mengalami pembusukan sehingga terjadi peningkatan populasi bakteri pembusuk yang memerlukan oksigen. Hal ini akan menyebabkan terjadinya.....', '', 'CO perairan meningkat', 'CO perairan menurun', 'DO perairan meningkat', 'BOD perairan meningkat', 'BOD perairan menjadi stabil', '', '', '', '', '', '', ' '),
(15, 'USPBK', 'IPA', 'IPA-1', 14, 'Limbah B3 dapat mengandung suatu zat atau bahan yang bersifat mutagenik, yang artinya.....', '', 'Dapat menyebabkan kanker', 'Dapat menyebabkan infeksi', 'Dapat menyebabkan mutasi', 'Dapat menyebabkan tumor', 'Dapat menyebabkan kecacatan janin', '', '', '', '', '', '', ' '),
(16, 'USPBK', 'IPA', 'IPA-1', 15, 'Limbah padat, limbah cair, dan limbah gas merupakan pengelompokan limbah berdasarkan.....', '', 'Jenis senyawa', 'Wujud', 'Sumber', 'Sifat', 'Tingkat bahaya', '', '', '', '', '', '', ' '),
(17, 'USPBK', 'IPA', 'IPA-1', 16, 'Agar tanaman tumbuh dengan baik, para petani menggunakan.....untuk membasmi serangga yang ada pada tanaman.', '', 'Insektisida', 'Pestisida', 'Herbisida', 'Fungisida', 'Hamasida ', '', '', '', '', '', '', ' '),
(18, 'USPBK', 'IPA', 'IPA-1', 17, 'Kebisingan semi kontinyu adalah kebisingan yang datangnya.....', '', 'Tidak terus menerus tetapi beraturan', 'Terus-menerus dalam jangka waktu yang cukup lama', 'Terus-menerus dalam jangka waktu yang singkat', 'Hanya sekejap, kemudian hilang', 'Hanya sekejap, kemungkinan akan terulang kembali', '', '', '', '', '', '', ' '),
(19, 'USPBK', 'IPA', 'IPA-1', 18, 'Berikut ini ciri-ciri pencemaran pada air, kecuali.....', '', 'Penurunan pH', 'Kenaikan suhu', 'Perubahan rasa dan warna', 'Timbul endapan', 'Perubahan bentuk', '', '', '', '', '', '', ' '),
(20, 'USPBK', 'IPA', 'IPA-1', 19, 'Berikut ini adalah polutan udara yang menyebabkan terjadinya hujan asam adalah.....', '', 'CO', 'NOx dan SOx', 'Hidrokarbon', 'H2O', 'O3', '', '', '', '', '', '', ' '),
(21, 'USPBK', 'IPA', 'IPA-1', 20, 'Alat untuk membakar sampah secara terkendali melalui pembakaran dengan suhu tinggi disebut.....', '', 'Insenerator', 'Sanitary landfill', 'Galian parit', 'Metode area', 'Metode ramp', '', '', '', '', '', '', ' '),
(22, 'USPBK', 'IPA', 'IPA-1', 21, 'Proses pembersihan pencemaran tanah dengan menggunakan mikroorganisme (jamur, bakteri) disebut.....', '', 'Wet scrubber', 'Cyclone separator', 'Electrostatic precipitator', 'Bioremediasi', 'Trickling filter', '', '', '', '', '', '', ' '),
(23, 'USPBK', 'IPA', 'IPA-1', 22, 'Pengolahan air limbah yang bertujuan untuk memisahkan padatan dari air secara fisik, yaitu proses.....', '', 'Filtration', 'IPAL', 'Secondary treatment', 'Pengendapan', 'Primary treatment', '', '', '', '', '', '', ' '),
(24, 'USPBK', 'IPA', 'IPA-1', 23, 'Jenis sampah yang dipakai sebagai bahan pembuatan kompos adalah sampah.....', '', 'Anorganik', 'Yang tidak mudah terbakar', 'Padat', 'Organik', 'Dari bahan tambang', '', '', '', '', '', '', ' '),
(25, 'USPBK', 'IPA', 'IPA-1', 24, 'Binatang yang bisa mempercepat dalam pembuatan kompos adalah.....', '', 'Semut', 'Tikus', 'Lalat', 'Cacing', 'Anjing', '', '', '', '', '', '', ' '),
(26, 'USPBK', 'IPA', 'IPA-1', 25, 'Berikut ini yang merupakan komponen abiotik adalah.....', '', 'Capung', 'Belalang', 'Rumput', 'Hujan', 'Pohon', '', '', '', '', '', '', ' '),
(27, 'USPBK', 'IPA', 'IPA-1', 26, 'Berikut ini yang bukan termasuk populasi adalah.....', '', 'Sekumpulan badak di Taman Nasional Ujung kulon', 'Sekumpulan monyet ekor panjang di Cagar Alam Pangandaran', 'Serumpun rumput di lapangan bola', 'Sekumpulan manusia di kota Jakarta', 'Sekumpulan ikan beraneka jenis di kolam ikan', '', '', '', '', '', '', ' '),
(28, 'USPBK', 'IPA', 'IPA-1', 27, 'Untuk bisa memperoleh sumber nutrisi dan air yang cukup, suatu jenis tanaman menyekresikan zat tertentu sehingga tanaman jenis lainnya tidak bisa tumbuh. Interaksi ini disebut dengan.....', '', 'Predasi', 'Kompetisi', 'Parasitisme', 'Komensalisme', 'Alelopati', '', '', '', '', '', '', ' '),
(29, 'USPBK', 'IPA', 'IPA-1', 28, 'Kompetisi antara pohon jambu dan pohon mangga dalam memperebutkan air dan cahaya merupakan jenis kompetisi.....', '', 'Intraspesifik', 'Interspesifik', 'Alelopati', 'Antarorganisme', 'Antarindividu', '', '', '', '', '', '', ' '),
(30, 'USPBK', 'IPA', 'IPA-1', 29, 'Berikut ini yang bukan ekosistem buatan adalah.....', '', 'Waduk', 'Sawah', 'Perkebunan teh', 'Tundra', 'Perkebunan kopi', '', '', '', '', '', '', ' '),
(31, 'USPBK', 'IPA', 'IPA-1', 30, 'Apabila populasi ular berkurang maka akan mempengaruhi populasi hewan lainnya, yaitu.....', '', 'Belalang', 'Tikus', 'Padi', 'Elang', 'Kancil', '', '', '', '', '', '', ' '),
(32, 'USPBK', 'IPA', 'IPA-1', 31, 'Simbiosis antara fungi dengan akar tumbuhan adalah.....', '', 'Mutualisme', 'Komensalisme', 'Predasi', 'Parasitisme', ' Alelopati', '', '', '', '', '', '', ' '),
(33, 'USPBK', 'IPA', 'IPA-1', 32, ' Zona pasang surut di sebut juga dengan zona......', '', 'Afotik', 'Bentik', 'Intertidal', 'Neritik', 'Fogik', '', '', '', '', '', '', ' '),
(34, 'USPBK', 'IPA', 'IPA-1', 33, 'Suhu dingin yang ekstrim, keragaman spesies rendah, struktur vegetasinya sederhana, dan musim tumbuh dan berkembang biak pendek adalah ciri-ciri dari bioma.....', '', 'Hutan hujan tropis', ' Taiga', 'Tundra', 'Gurun', 'Padang rumput', '', '', '', '', '', '', ' '),
(35, 'USPBK', 'IPA', 'IPA-1', 34, 'Kecepatan organisme heterotrof menyimpan dan mengubah energi yang didapatkan dari makanannya adalah.....', '', 'Daur materi senyawa', 'Daur materi unsur', 'Rantai makanan', 'Produktivitas primer', ' Produktivitas sekunder', '', '', '', '', '', '', ' '),
(36, 'USPBK', 'IPA', 'IPA-1', 35, 'Pada piramida makanan, puncak piramida ditempati oleh.....', '', 'Konsumen I', 'Konsumen II', 'Konsumen III', 'Produsen', ' Pengurai', '', '', '', '', '', '', ' '),
(37, 'USPBK', 'IPA', 'IPA-1', 36, 'Perhatikan gambar!', 'IPA_36.jpg', 'Rumput', 'Tikus', 'Pengurai', 'Ular', ' Elang', '', '', '', '', '', '', ' '),
(38, 'USPBK', 'IPA', 'IPA-1', 37, 'Pada daur air, senyawa H2O dikembalikan ke bumi melalui peristiwa.....', '', 'Evaporasi', 'Transpirasi', 'Presipitasi', 'Penguapan', ' Kondensasi', '', '', '', '', '', '', ' '),
(39, 'USPBK', 'IPA', 'IPA-1', 38, 'Unsur Nitrogen dapat dikembalikan ke atmosfer alam melalui proses.....', '', 'Fiksasi nitrogen', 'Nitrifikasi', 'Denitrifikasi', 'Amonifikasi', ' Asimilasi', '', '', '', '', '', '', ' '),
(40, 'USPBK', 'IPA', 'IPA-1', 39, 'Bakteri Nitrosomonas dapat mengubah ammonium menjadi.....', '', 'Nitrogen', 'Nitrit', 'Nitrat', 'Ammonia', ' Lipid', '', '', '', '', '', '', ' '),
(41, 'USPBK', 'IPA', 'IPA-1', 40, 'Bakteri yang tidak berperan dalam daur nitrogen adalah.....', '', 'Pseudomonas denitrificans', 'Thiobacillus denitrificans', 'Bacillus', 'Desulfomaculum', ' Nitrobacter', '', '', '', '', '', '', ' '),
(57, 'USPBK', 'TKJ', 'TKJ12', 5, 'Bagian komputer terbagi menjadi 3 yaitu...', '', 'Software - Hardware - Output', 'Hardware - Software - Brainware', 'Harddisk - Monitor - VGA', 'Input - Proses - Output', 'Input - Komputer - Output', '', '', '', '', '', '', 'B'),
(54, 'USPBK', 'TKJ', 'TKJ12', 2, 'Alasan perlunya dipasang perangkat antivirus pada komputer dengan tujuan......', '', 'Agar software yang terinstall di PC aman', 'Agar data pribadi dan komputer tidak terkena virus dan semua data tetap aman', 'Agar saat melakukan download di internet menjadi lebih aman', 'Semua jawaban benar', 'Saat memasukan flashdisk ke komputer tidak akan terkena virus', '', '', '', '', '', '', 'D'),
(55, 'USPBK', 'TKJ', 'TKJ12', 3, 'Kombinasi pengkabelan straight pada jaringan komputer yang sesuai dengan standart internasional adalah...', '', 'White orange â€“ orange - white green â€“ blue - white blue - green â€“ white brown - brown', 'White orange â€“ orange - white green â€“ green - white blue - blue â€“ white brown - brown', 'White green â€“ green - white orange â€“ blue - white blue - orange â€“ white brown - brown', 'White orange â€“ orange - white green - green - white blue - blue â€“ white brown - brown', 'Blue â€“ orange - white green â€“ green - white blue - White orange â€“ white brown - brown', '', '', '', '', '', '', 'A'),
(56, 'USPBK', 'TKJ', 'TKJ12', 4, 'Apa yang dimaksud dengan gateway ...', '', 'Gateway adalah (gerbang jaringan) sebuah perangkat yang dipakai untuk menghubungkan satu jaringan komputer dengan satu ataupun lebih jaringan komputer yang memakai protokol komunikasi yang berbeda ', 'Sistem yang menyimpan informasi tentang nama Host', 'Sebuah alamat ip address yang diterjemahkan menjadi DNS', 'Sebuah client yang terhubung ke server', 'Semua benar', '', '', '', '', '', '', 'A'),
(53, 'USPBK', 'TKJ', 'TKJ12', 1, '1.&nbsp; Untuk melakukan instalasi windows pada komputer kita perlu menyiapkan...', '', 'Sistem Operasi', 'Hardware', 'Software', 'Printer', 'Mouse', '', '', '', '', '', '', 'A'),
(59, 'USPBK', 'IPS', 'IPS-1', 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(11) NOT NULL,
  `warna` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `warna`) VALUES
(2, 'blue'),
(1, 'blue'),
(3, 'hidden'),
(4, '0'),
(5, 'show');

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `id` int(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `waktu` timestamp NOT NULL,
  `encrpt` text NOT NULL,
  `hasil_token` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`id`, `username`, `waktu`, `encrpt`, `hasil_token`) VALUES
(1, 'Admin', '2023-03-31 13:27:52', 'fe4e029c74e6073aa678d9d960b7a3bf67f65c7f0c2d387170922c2af6e635a5', 'F0C2D3'),
(2, 'Admin', '2023-03-31 13:28:27', 'fe4e029c74e6073aa678d9d960b7a3bf67f65c7f0c2d387170922c2af6e635a5', '3BF67F');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `Urut` int(11) NOT NULL,
  `jenis` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `mapel` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `kodesoal` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `waktu` varchar(8) COLLATE latin1_general_ci NOT NULL,
  `lamaujian` varchar(12) COLLATE latin1_general_ci NOT NULL,
  `kunci` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `aktif` int(11) NOT NULL DEFAULT '0',
  `acak` varchar(2) COLLATE latin1_general_ci NOT NULL,
  `opsi` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `kelas` varchar(10) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`Urut`, `jenis`, `mapel`, `kodesoal`, `waktu`, `lamaujian`, `kunci`, `aktif`, `acak`, `opsi`, `kelas`) VALUES
(1, 'USPBK', 'IPA', 'IPA-1', '60', '01:30:00', 'ACEBEBDBBD B                            ', 0, '2', 'show', '12'),
(7, 'USPBK', 'IPS', 'IPS-1', '60', '01:00:00', '', 0, '1', 'show', '12'),
(5, 'USPBK', 'TKJ', 'TKJ12', '60', '01:00:00', 'ADAAB', 0, '1', 'show', '12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jabatan` text NOT NULL,
  `pass` varchar(255) NOT NULL,
  `Id_User` int(11) NOT NULL DEFAULT '1',
  `Id_Usergroup_User` int(11) NOT NULL DEFAULT '1',
  `foto` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) NOT NULL,
  `youtube` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `admin_su` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nip`, `nama`, `jabatan`, `pass`, `Id_User`, `Id_Usergroup_User`, `foto`, `instagram`, `youtube`, `phone`, `admin_su`) VALUES
(3, 'Admin', 'Admin', 'Admin', 'admin', 1, 1, NULL, '', '', '', '1'),
(294, 'proktor1', 'Rocky', '', '123456', 1, 1, NULL, 'www.instagram.com', 'www.youtube.com', '085855452319', '2'),
(296, 'proktor2', 'Unzilla', '', '123456', 1, 1, NULL, '', '', '', '2'),
(297, 'proktor3', 'Bella', '', '123456', 1, 1, NULL, '', '', '', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `nilaihasil`
--
ALTER TABLE `nilaihasil`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nis` (`nis`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`nis`),
  ADD UNIQUE KEY `username_2` (`nis`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`Urut`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`nip`),
  ADD UNIQUE KEY `username_2` (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilaihasil`
--
ALTER TABLE `nilaihasil`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `Urut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
