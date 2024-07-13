-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 07:57 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii_sptun`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Ketua'),
(2, 'Sekretaris'),
(5, 'Staf Bagian Umum dan Keuangan'),
(6, 'Panmud Perkara'),
(7, 'Panitera'),
(8, 'Wakil Ketua'),
(9, 'Hakim'),
(10, 'Calon Hakim'),
(11, 'Kepala Sub Bagian'),
(12, 'Staff Bagian PTIP'),
(13, 'Staff Bagian Kepegawaian dan ORTALA'),
(14, 'Jurusita Pengganti'),
(15, 'PPNPN');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` int(11) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `jenis_barang`) VALUES
(1, 'ATK'),
(2, 'Alat Kebersihan'),
(3, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1704593754),
('m130524_201442_init', 1704593757),
('m140506_102106_rbac_init', 1707428906),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1707428906),
('m180523_151638_rbac_updates_indexes_without_prefix', 1707428906),
('m190124_110200_add_verification_token_column_to_user_table', 1704593757),
('m200409_110543_rbac_update_mssql_trigger', 1707428906);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `get_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `get_user` int(11) NOT NULL,
  `get_jenis` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id_permintaan` int(11) NOT NULL,
  `get_user` int(11) NOT NULL,
  `get_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status_permintaan` enum('menunggu','proses','disetujui') NOT NULL,
  `get_jenis` int(11) NOT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `tgl_permintaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id_permintaan`, `get_user`, `get_barang`, `jumlah`, `status_permintaan`, `get_jenis`, `ket`, `tgl_permintaan`) VALUES
(71, 7, 331, 1, 'disetujui', 2, 'Ruang PTIP', '2024-07-12'),
(72, 7, 328, 1, 'disetujui', 2, 'Ruang PTIP', '2024-07-12'),
(73, 7, 268, 1, 'disetujui', 1, 'PTIP', '2024-07-12'),
(74, 7, 269, 1, 'disetujui', 1, 'PTIP', '2024-07-12'),
(75, 7, 277, 1, 'disetujui', 2, 'Kamar Mandi PTIP', '2024-07-12'),
(76, 15, 168, 2, 'disetujui', 1, 'Kasub PTIP', '2024-07-12'),
(77, 15, 276, 2, 'disetujui', 2, 'Kasub PTIP', '2024-07-12'),
(78, 18, 345, 1, 'disetujui', 2, 'Untuk ruang sidang', '2024-07-12'),
(79, 18, 366, 1, 'disetujui', 3, 'Untuk ruang sidang', '2024-07-12'),
(80, 10, 345, 1, 'disetujui', 2, 'Untuk ruangan hakim', '2024-07-12'),
(81, 6, 209, 1, 'disetujui', 1, 'Untuk dokumen dibagian umum', '2024-07-12'),
(82, 6, 282, 7, 'disetujui', 1, 'warna biru,untuk pembatas laporan bulanan', '2024-07-12'),
(83, 16, 216, 4, 'disetujui', 1, 'Untuk dokumen', '2024-07-12'),
(84, 9, 366, 2, 'disetujui', 3, 'untuk ruangan panmud', '2024-07-12'),
(85, 6, 268, 1, 'disetujui', 1, 'Untuk Bendahara', '2024-07-12'),
(86, 8, 296, 2, 'disetujui', 1, 'untuk printer ruang kepegawaian', '2024-07-12'),
(87, 8, 242, 1, 'disetujui', 1, 'Untuk staff kepegawaian', '2024-07-12'),
(88, 8, 269, 2, 'disetujui', 1, 'untuk staff kepegawaian', '2024-07-12'),
(89, 8, 241, 1, 'disetujui', 1, 'untuk adminstrasi ruangan kepegawaian', '2024-07-12'),
(90, 8, 244, 1, 'disetujui', 1, 'Untuk adminstrasi kepegawaian', '2024-07-12'),
(91, 8, 253, 1, 'disetujui', 1, 'untuk adminstrasi kepegawaian', '2024-07-12'),
(92, 6, 293, 1, 'disetujui', 1, 'untuk printer bendahara', '2024-07-12'),
(93, 13, 345, 1, 'disetujui', 2, 'Untuk ruangan panitera', '2024-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `stok_barang`
--

CREATE TABLE `stok_barang` (
  `id_stok` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `tgl_pembuatan` date NOT NULL,
  `get_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_barang`
--

INSERT INTO `stok_barang` (`id_stok`, `kode`, `nama_barang`, `satuan`, `stok`, `sisa`, `tgl_pembuatan`, `get_jenis`) VALUES
(167, 'BRG-398', 'Bolpoin Biasa', 'Buah', 3, 3, '2024-07-01', 1),
(168, 'BRG-154', 'Bolpoin Boldliner', 'Buah', 10, 10, '2024-07-01', 1),
(169, 'BRG-089', 'Bolpoin Erasable', 'Buah', 0, 0, '2024-07-01', 1),
(170, 'BRG-287', 'Stand Pen ', 'Buah', 4, 4, '2024-07-01', 1),
(171, 'BRG-700', 'Drawing Pen', 'Buah', 9, 9, '2024-07-01', 1),
(172, 'BRG-507', 'Spidol Kecil Biru', 'Buah', 14, 14, '2024-07-01', 1),
(173, 'BRG-725', 'Spidol Papan Tulis ', 'Buah', 0, 0, '2024-07-01', 1),
(174, 'BRG-183', 'Bolpoin Joyko', 'Buah', 5, 5, '2024-07-01', 1),
(175, 'BRG-399', 'Spidol Papan Tulis Permanen', 'Buah', 10, 10, '2024-07-01', 1),
(176, 'BRG-086', 'Spidol Kecil Hijau ', 'Buah', 11, 11, '2024-07-01', 1),
(177, 'BRG-192', 'Bolpoin request ', 'Buah', 0, 0, '2024-07-12', 1),
(178, 'BRG-640', 'Spidol Putih', 'Buah', 0, 0, '2024-07-12', 1),
(179, 'BRG-594', 'Bolpoin Kenko ', 'Buah', 0, 0, '2024-07-12', 1),
(180, 'BRG-244', 'Bolpoin Hitech ', 'Buah', 0, 0, '2024-07-12', 1),
(181, 'BRG-993', 'Spidol Kecil Hitam', 'Buah', 24, 24, '2024-07-12', 1),
(182, 'BRG-927', 'Bolpoin Techjob ', 'Buah', 23, 23, '2024-07-12', 1),
(183, 'BRG-776', 'Pensil', 'Buah', 24, 24, '2024-07-12', 1),
(184, 'BRG-536', 'Bolpoin TTD ', 'PCS', 27, 27, '2024-07-12', 1),
(185, 'BRG-583', 'Bolpoin Merah', 'PCS', 15, 15, '2024-07-12', 1),
(186, 'BRG-247', 'Spidol Kecil Merah ', 'PCS', 12, 12, '2024-07-12', 1),
(187, 'BRG-767', 'Bolpoin Biru ', 'Buah', 0, 0, '2024-07-12', 1),
(188, 'BRG-109', 'Stabilo', 'Buah', 3, 3, '2024-07-12', 1),
(189, 'BRG-037', 'Refill Bolpoin TTD ', 'Buah', 0, 0, '2024-07-12', 1),
(190, 'BRG-341', 'Refill Bolpoin Techjob', 'Buah', 3, 3, '2024-07-12', 1),
(191, 'BRG-082', 'Tinta Stempel', 'Botol', 1, 1, '2024-07-12', 1),
(192, 'BRG-992', 'Paper Clips', 'Kotak/Box', 37, 37, '2024-07-12', 1),
(193, 'BRG-724', 'Binder Clip 105', 'Kotak/Box', 29, 29, '2024-07-12', 1),
(194, 'BRG-749', 'Binder Clip 155', 'Kotak/Box', 12, 12, '2024-07-12', 1),
(195, 'BRG-763', 'Binder Clip 111', 'Kotak/Box', 16, 16, '2024-07-12', 1),
(196, 'BRG-782', 'Binder Clip 280 ', 'Buah', 6, 6, '2024-07-12', 1),
(197, 'BRG-468', 'Binder Clip 260 ', 'Kotak/Box', 9, 9, '2024-07-12', 1),
(198, 'BRG-497', 'Binder Clip 200', 'Kotak/Box', 0, 0, '2024-07-12', 1),
(199, 'BRG-119', 'Tipe X ', 'Buah', 11, 11, '2024-07-12', 1),
(200, 'BRG-509', 'Penghapus Karet', 'Buah', 6, 6, '2024-07-12', 1),
(201, 'BRG-845', 'Penghapus Papan Tulis ', 'Buah', 0, 0, '2024-07-12', 1),
(202, 'BRG-836', 'Buku Kwitansi', 'Buah', 2, 2, '2024-07-12', 1),
(203, 'BRG-621', 'Buku Album Folio 200L', 'PCS', 1, 1, '2024-07-12', 1),
(204, 'BRG-815', 'Buku Album Folio 100L', 'PCS', 1, 1, '2024-07-12', 1),
(205, 'BRG-086', 'Buku Ekspedisi ', 'PCS', 5, 5, '2024-07-12', 1),
(206, 'BRG-396', 'Buku Album Folio 50L', 'PCS', 1, 1, '2024-07-12', 1),
(207, 'BRG-806', 'Buku Tulis ', 'PCS', 14, 14, '2024-07-12', 1),
(208, 'BRG-498', 'Buku Agenda ', 'Buah', 0, 0, '2024-07-12', 1),
(209, 'BRG-751', 'Map Biasa', 'Lembar', 70, 70, '2024-07-12', 1),
(210, 'BRG-299', 'Ordner Gobi ', 'Buah', 0, 0, '2024-07-12', 1),
(211, 'BRG-739', 'Map Plastik F4', 'Pak', 3, 3, '2024-07-12', 1),
(212, 'BRG-819', 'Box File ', 'Buah', 0, 0, '2024-07-12', 1),
(213, 'BRG-707', 'Box File Bantex ', 'Buah', 1, 1, '2024-07-12', 1),
(214, 'BRG-470', 'Map Batik', 'Pack', 1, 1, '2024-07-12', 1),
(215, 'BRG-484', 'Ordner Bambi ', 'Buah', 9, 9, '2024-07-12', 1),
(216, 'BRG-265', 'Map Jepit ', 'Buah', 29, 29, '2024-07-12', 1),
(217, 'BRG-105', 'Map Lubang ', 'PCS', 12, 12, '2024-07-12', 1),
(218, 'BRG-226', 'Ordner Bantex ', 'Buah', 0, 0, '2024-07-12', 1),
(219, 'BRG-213', 'Map File Bisnis', 'Buah', 6, 6, '2024-07-12', 1),
(220, 'BRG-537', 'Ordner Besar Bantex', 'Buah', 0, 0, '2024-07-12', 1),
(222, 'BRG-555', 'Map Plastik A4', 'Lembar', 120, 120, '2024-07-12', 1),
(223, 'BRG-911', ' Mistar 30 cm ', 'Buah', 4, 4, '2024-07-12', 1),
(224, 'BRG-429', 'Mistar 60cm ', 'Buah', 0, 0, '2024-07-12', 1),
(225, 'BRG-373', 'Mata Pisau Cutter', 'Pak', 2, 2, '2024-07-12', 3),
(226, 'BRG-685', 'Cutter', 'Buah', 10, 10, '2024-07-12', 3),
(227, 'BRG-294', 'Lem Fox ', 'Buah', 0, 0, '2024-07-12', 1),
(228, 'BRG-116', 'Lakban Jilid Hitam', 'Roll', 9, 9, '2024-07-12', 1),
(229, 'BRG-452', 'Lakban Jilid Bening ', 'Roll', 5, 5, '2024-07-12', 1),
(230, 'BRG-089', 'Double Tape ', 'Roll', 5, 5, '2024-07-12', 1),
(231, 'BRG-817', 'Dispenser Tape', 'Buah', 2, 2, '2024-07-12', 1),
(232, 'BRG-500', 'Lem Stick', 'Buah', 1, 1, '2024-07-12', 1),
(233, 'BRG-760', 'Lem Korea', 'Buah', 1, 1, '2024-07-12', 1),
(234, 'BRG-007', 'Lem Kertas ', 'Buah', 0, 0, '2024-07-12', 1),
(235, 'BRG-236', 'Lem Kertas Kenko ', 'Buah', 0, 0, '2024-07-12', 1),
(236, 'BRG-630', 'Double Tape Tebal ', 'Roll', 3, 3, '2024-07-12', 1),
(237, 'BRG-599', 'Lakban Merah ', 'Roll', 2, 2, '2024-07-12', 1),
(238, 'BRG-551', ' Lakban Bening Kecil ', 'Roll', 2, 2, '2024-07-12', 1),
(239, 'BRG-591', 'Lakban Coklat ', 'Roll', 4, 4, '2024-07-12', 1),
(240, 'BRG-853', 'Staples Tembak', 'Buah', 1, 1, '2024-07-12', 1),
(241, 'BRG-016', 'Hekter HD 50 ', 'Buah', 12, 12, '2024-07-12', 1),
(242, 'BRG-363', 'Hekter HD 10', 'Buah', 11, 11, '2024-07-12', 1),
(243, 'BRG-570', 'Isi Hekter HD 10 ', 'Kotak/Box', 0, 0, '2024-07-12', 1),
(244, 'BRG-148', 'Isi Hekter HD 50', 'Kotak/Box', 16, 16, '2024-07-12', 1),
(245, 'BRG-125', 'Isi Hekter Tembak', 'Kotak/Box', 9, 9, '2024-07-12', 1),
(246, 'BRG-112', 'Rautan Pensil ', 'Buah', 26, 26, '2024-07-12', 1),
(247, 'BRG-910', 'Kalkulator', 'Buah', 0, 0, '2024-07-12', 1),
(248, 'BRG-838', 'Amplop Putih Kecil ', 'Lembar', 0, 0, '2024-07-12', 1),
(249, 'BRG-516', 'Spons Uang', 'Buah', 2, 2, '2024-07-12', 1),
(250, 'BRG-986', 'Pelubang Kertas Kecil ', 'Buah', 2, 2, '2024-07-12', 1),
(251, 'BRG-464', 'Pelubang Kertas Sedang', 'Buah', 0, 0, '2024-07-12', 1),
(252, 'BRG-808', 'Pelubang Kertas Besar', 'Buah', 1, 1, '2024-07-12', 1),
(253, 'BRG-192', 'Gunting Sedang ', 'Buah', 5, 5, '2024-07-12', 1),
(254, 'BRG-888', 'Gunting Besar', 'Buah', 12, 12, '2024-07-12', 1),
(255, 'BRG-981', 'Sticky Note Persegi Panjang', 'Buah', 9, 9, '2024-07-12', 1),
(256, 'BRG-298', 'Bantal Stempel', 'Buah', 0, 0, '2024-07-12', 1),
(257, 'BRG-912', 'Sticky Note Kotak', 'Buah', 6, 6, '2024-07-12', 1),
(258, 'BRG-949', 'Sticky Note Sign', 'Buah', 4, 4, '2024-07-12', 1),
(259, 'BRG-930', 'Sticky Note Kecil ', 'Buah', 1, 1, '2024-07-12', 1),
(260, 'BRG-154', 'Papan Tulis', 'Buah', 1, 1, '2024-07-12', 1),
(261, 'BRG-310', 'CD Penyimpanan', 'PCS', 26, 26, '2024-07-12', 1),
(262, 'BRG-343', 'Keranjang ATK Plastik ', 'Buah', 0, 0, '2024-07-12', 1),
(263, 'BRG-431', 'Pin Gabus ', 'Pack', 2, 2, '2024-07-12', 1),
(264, 'BRG-819', 'Keranjang ATK', 'Buah', 2, 2, '2024-07-12', 1),
(265, 'BRG-933', 'Letter Tray 4 Susun', 'Buah', 0, 0, '2024-07-12', 1),
(266, 'BRG-498', 'Letter Tray 3 Susun ', 'Buah', 0, 0, '2024-07-12', 1),
(267, 'BRG-228', 'Gabus', 'Buah', 0, 0, '2024-07-12', 1),
(268, 'BRG-120', 'HVS A4 ', 'Rim', 6, 6, '2024-07-12', 1),
(269, 'BRG-294', 'HVS F4 ', 'Rim', 9, 9, '2024-07-12', 1),
(270, 'BRG-433', 'Kertas Foto ', 'Rim', 2, 2, '2024-07-12', 1),
(271, 'BRG-786', 'Kertas Warna ', 'Pak', 1, 1, '2024-07-12', 1),
(272, 'BRG-634', 'Kertas Kado Besar', 'Lembar', 0, 0, '2024-07-12', 1),
(273, 'BRG-747', 'Kertas Kado', 'Lembar', 0, 0, '2024-07-12', 1),
(274, 'BRG-463', 'Sticker Label ', 'Pak', 3, 3, '2024-07-12', 1),
(275, 'BRG-112', 'Kertas Sampul Coklat ', 'Lembar', 16, 16, '2024-07-12', 1),
(276, 'BRG-369', 'Tissue', 'Pak', 7, 7, '2024-07-12', 2),
(277, 'BRG-986', 'Tissue Toilet', 'Roll', 11, 11, '2024-07-12', 2),
(278, 'BRG-076', 'Kertas Sticker', 'Lembar', 7, 7, '2024-07-12', 1),
(279, 'BRG-257', 'Kertas Karton ', 'Lembar', 30, 30, '2024-07-12', 1),
(280, 'BRG-297', 'Mika Plastik ', 'Lembar', 65, 65, '2024-07-12', 1),
(281, 'BRG-048', 'Kertas Karton Putih', 'Lembar', 50, 50, '2024-07-12', 1),
(282, 'BRG-508', 'Kertas Karton Warna', 'Lembar', 50, 50, '2024-07-12', 1),
(283, 'BRG-448', 'Amplop Surat Sedang ', 'Pack', 4, 4, '2024-07-12', 1),
(284, 'BRG-448', 'Amplop Surat Kecil', 'Pack', 1, 1, '2024-07-12', 1),
(285, 'BRG-250', 'Amplop Putih Sedang', 'Lembar', 136, 136, '2024-07-12', 1),
(286, 'BRG-218', 'Amplop Putih Panjang ', 'Lembar', 87, 87, '2024-07-12', 1),
(288, 'BRG-189', 'Amplop Surat Besar', 'Pack', 0, 0, '2024-07-12', 1),
(289, 'BRG-295', 'Amplop Cokelat Sedang', 'Pack', 0, 0, '2024-07-12', 1),
(290, 'BRG-201', 'Kertas Sampul Biasa', 'Lembar', 2, 2, '2024-07-12', 1),
(291, 'BRG-888', 'Tinta Warna Canon', 'Botol', 9, 9, '2024-07-12', 1),
(292, 'BRG-489', 'Tinta Hitam Epson', 'Botol', 3, 3, '2024-07-12', 1),
(293, 'BRG-624', 'Tinta Epson L664 Hitam ', 'Botol', 4, 4, '2024-07-12', 1),
(294, 'BRG-775', 'Tinta Epson L664 Warna', 'Botol', 3, 3, '2024-07-12', 1),
(295, 'BRG-471', 'Tinta Hitam Canon ', 'Botol', 4, 4, '2024-07-12', 1),
(296, 'BRG-126', 'Tinta Warna Epson ', 'Botol', 3, 3, '2024-07-12', 1),
(297, 'BRG-064', 'Flashdisk Sandisk 16gb ', 'Buah', 2, 2, '2024-07-12', 1),
(298, 'BRG-113', 'Flashdisk Sandisk 32gb', 'Buah', 0, 0, '2024-07-12', 1),
(299, 'BRG-693', 'Mouse ', 'Buah', 0, 0, '2024-07-12', 1),
(300, 'BRG-765', 'Alas Mouse ', 'Buah', 2, 2, '2024-07-12', 1),
(301, 'BRG-225', 'Sapu Lidi Gagang', 'Buah', 5, 5, '2024-07-12', 2),
(302, 'BRG-884', 'Sikat WC', 'Buah', 4, 4, '2024-07-12', 2),
(303, 'BRG-524', 'Sikat Lantai', 'Buah', 0, 0, '2024-07-12', 2),
(304, 'BRG-640', 'Sapu Lantai', 'Buah', 3, 3, '2024-07-12', 2),
(305, 'BRG-703', 'Sponge Busa ', 'Buah', 0, 0, '2024-07-12', 2),
(306, 'BRG-055', 'Sapu Laba-laba ', 'PCS', 1, 1, '2024-07-12', 2),
(307, 'BRG-891', 'Alat Pel Super', 'set', 2, 2, '2024-07-12', 2),
(308, 'BRG-314', 'Kain Pel', 'Buah', 0, 0, '2024-07-12', 2),
(309, 'BRG-048', 'Alat Pel', 'Buah', 1, 1, '2024-07-12', 2),
(310, 'BRG-835', 'Kanebo ', 'Buah', 1, 1, '2024-07-12', 2),
(311, 'BRG-734', 'Pel Karet', 'Buah', 0, 0, '2024-07-12', 2),
(312, 'BRG-947', 'Kain Microfiber', 'Buah', 0, 0, '2024-07-12', 2),
(313, 'BRG-134', 'Kemoceng ', 'Buah', 0, 0, '2024-07-12', 2),
(314, 'BRG-739', 'Alat Pembersih Kaca', 'Buah', 0, 0, '2024-07-12', 2),
(315, 'BRG-265', 'Kain Pembersih ', 'PCS', 10, 10, '2024-07-12', 2),
(316, 'BRG-593', 'Kain Lap Tangan', 'Buah', 0, 0, '2024-07-12', 2),
(317, 'BRG-699', 'Alat Pel Lobby ', 'Buah', 0, 0, '2024-07-12', 2),
(318, 'BRG-462', 'Ember', 'Buah', 0, 0, '2024-07-12', 2),
(319, 'BRG-855', 'Slang', 'Buah', 0, 0, '2024-07-12', 2),
(320, 'BRG-204', 'Gayung', 'Buah', 2, 2, '2024-07-12', 2),
(321, 'BRG-983', 'Keset', 'Buah', 3, 3, '2024-07-12', 2),
(322, 'BRG-516', 'Tempat Sampah Kecil ', 'Buah', 1, 1, '2024-07-12', 2),
(323, 'BRG-314', 'Tempat Sampah Tutup ', 'Buah', 2, 2, '2024-07-12', 2),
(324, 'BRG-427', 'Plastik Sampah ', 'Pak', 0, 0, '2024-07-12', 2),
(325, 'BRG-560', 'Tempat Sampah Injak ', 'Buah', 0, 0, '2024-07-12', 2),
(326, 'BRG-850', 'Kunci ', 'Buah', 0, 0, '2024-07-12', 3),
(327, 'BRG-614', 'Kunci Gembok ', 'Buah', 0, 0, '2024-07-12', 3),
(328, 'BRG-426', 'Soklin Lantai', 'Botol', 6, 6, '2024-07-12', 2),
(329, 'BRG-382', 'Sunlight ', 'Buah', 2, 2, '2024-07-12', 2),
(330, 'BRG-003', 'Cairan Pembersih Kaca ', 'Buah', 0, 0, '2024-07-12', 2),
(331, 'BRG-787', 'Portex ', 'Botol', 5, 5, '2024-07-12', 2),
(332, 'BRG-430', 'Kit Ban Kecil', 'Buah', 1, 1, '2024-07-12', 2),
(333, 'BRG-741', 'Kapur Barus Ball ', 'Pak', 4, 4, '2024-07-12', 2),
(334, 'BRG-644', 'Hand Soap', 'Buah', 2, 2, '2024-07-12', 2),
(335, 'BRG-983', 'Kit Ban', 'Botol', 1, 1, '2024-07-12', 2),
(336, 'BRG-771', 'Kit Mobil ', 'Botol', 1, 1, '2024-07-12', 2),
(337, 'BRG-010', 'Kit Wipper', 'Botol', 2, 2, '2024-07-12', 2),
(338, 'BRG-128', 'Handsoap Botolan ', 'Botol', 0, 0, '2024-07-12', 2),
(339, 'BRG-918', 'Baygon ', 'Kaleng', 0, 0, '2024-07-12', 2),
(340, 'BRG-490', 'Refill Clear Kaca', 'Buah', 1, 1, '2024-07-12', 2),
(341, 'BRG-237', 'Baygon Kecil', 'Kaleng', 0, 0, '2024-07-12', 2),
(342, 'BRG-027', 'Disinfektan', 'Buah', 1, 1, '2024-07-12', 2),
(343, 'BRG-823', 'Cairan Pembersih Lantai', 'Botol', 6, 6, '2024-07-12', 2),
(344, 'BRG-815', 'Baygon Besar', 'Kaleng', 0, 0, '2024-07-12', 2),
(345, 'BRG-439', 'Pengharum Ruangan ', 'Kaleng', 3, 3, '2024-07-12', 2),
(346, 'BRG-008', 'Pengharum Mobil ', 'Buah', 5, 5, '2024-07-12', 2),
(347, 'BRG-286', 'Pengharum Lemari ', 'Buah', 7, 7, '2024-07-12', 2),
(348, 'BRG-267', 'Dettol Spray', 'Kaleng', 2, 2, '2024-07-12', 2),
(349, 'BRG-908', 'Pengharum Dinding ', 'Buah', 5, 5, '2024-07-12', 2),
(350, 'BRG-835', 'Stella Spray', 'Botol', 0, 0, '2024-07-12', 2),
(351, 'BRG-813', 'Spray Ruangan', 'Kaleng', 1, 1, '2024-07-12', 2),
(352, 'BRG-631', 'Dahlia K-205 ', 'Pak', 0, 0, '2024-07-12', 2),
(353, 'BRG-746', 'Dahlia K-21', 'Pak', 1, 1, '2024-07-12', 2),
(354, 'BRG-261', 'Pengharum AC ', 'PCS', 0, 0, '2024-07-12', 2),
(355, 'BRG-616', 'Pengharum Toilet', 'PCS', 1, 1, '2024-07-12', 2),
(356, 'BRG-079', 'Botol Handsoap ', 'Buah', 0, 0, '2024-07-12', 2),
(357, 'BRG-246', 'Jam Dinding', 'Buah', 0, 0, '2024-07-12', 3),
(358, 'BRG-481', 'Cover Toga Hakim', 'set', 0, 0, '2024-07-12', 3),
(359, 'BRG-798', 'Cover Jas Panitera ', 'Buah', 0, 0, '2024-07-12', 3),
(360, 'BRG-032', 'Kotak P3K ', 'Buah', 0, 0, '2024-07-12', 3),
(361, 'BRG-268', 'Palu ', 'Buah', 0, 0, '2024-07-12', 3),
(362, 'BRG-588', 'Taplak Meja Kecil', 'Buah', 2, 2, '2024-07-12', 3),
(363, 'BRG-178', 'Baterai UM-2U ', 'Buah', 58, 58, '2024-07-12', 3),
(364, 'BRG-793', 'Baterai UM-10 ', 'Buah', 32, 32, '2024-07-12', 3),
(365, 'BRG-357', 'Baterai A3 ', 'Buah', 22, 22, '2024-07-12', 3),
(366, 'BRG-167', 'Baterai A2 ', 'Buah', 47, 47, '2024-07-12', 3),
(367, 'BRG-603', 'Paper Bag', 'PCS', 13, 13, '2024-07-12', 3),
(368, 'BRG-172', 'Acrylic Sign', 'Buah', 11, 11, '2024-07-12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `get_jabatan` int(11) NOT NULL,
  `nip` varchar(18) COLLATE utf8_unicode_ci NOT NULL,
  `level` enum('instansi','admin') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`, `get_jabatan`, `nip`, `level`) VALUES
(5, 'SITI ERNAWATI, A.Md.', 'MY-T2Vfw_HMlpH_JBTZ5vK70ARwWw9gX', '$2y$13$6pH2BmhAhp558UwGew.LC.EjTkWHD/8oSOnsAj1jdhrHjIZz4WcRm', NULL, 'sitiernawati@gmail.com', 10, 1714480491, 1719807638, 'tgUQXq_88WyYXEhgQydQ2TGYo9W5OTdk_1714480491', 5, '199501062022032012', 'admin'),
(6, 'BENTARI CAHYANING, A.Md.', 'Vv4_8Pklz1GDJzqRr30yb88tx37mip7Q', '$2y$13$CplBBv8qI0FZN.DPXS6U1.dmTZw0hvDOAdqZBU0igve5VkfGDjRte', NULL, 'bentari@gmail.com', 10, 1714480676, 1718330464, 'qgcgtVM7majjNrlOXXVP3pT0O2bZF5fX_1714480676', 5, '199506032020122006', 'instansi'),
(7, 'AMALIA MULYANI, S.E.', '1l86qYnUBpPHkpcSYpKWcxkqet_wiWI_', '$2y$13$rOLolpRdseVYigcqXKJAx.6vnOM9rTP48Ubh98i39sDQC07VCF6X6', NULL, 'amalia@gmail.com', 10, 1714480748, 1718330628, 'uJ5mEkz_TaTbfnrlmKBTs2NAjmnYP0KG_1714480748', 12, '199804232022032015', 'instansi'),
(8, 'NURFAIDAH BANGSAWAN, S.E', 'I4iAt0Zo-yZVD3DHOhD-tikM568YPqVh', '$2y$13$xX/L0gYTxp6g7EO8CUwPrO8WlPWa5Nk4XBtR4bCaKCXhihcuvfIei', NULL, 'nurfaidah@gmail.com', 10, 1714480808, 1719807726, '2QaBTTdiv5EDqQG5-FAJC-pppN2O7w65_1714480808', 13, '198703092011012018', 'instansi'),
(9, 'DEWI JUNI CAHYATI, S.H., M.H', 'XHh4UhJvt4zmHeQuYOXy82oFE9zTzvOV', '$2y$13$vq6yxLVaIzwTBTPcYhB8yeWcqXxkuQSyIcXiI/GPipEAmADpb04xS', NULL, 'dewijuni@gmail.com', 10, 1714480873, 1719807736, 'n_dGDK9Lg3HHZkzKsvYHZRpXLKfsD4ou_1714480873', 6, '199206142019032018', 'instansi'),
(10, 'IHSAN SAFIRULLAH, SH.', 'XDE9Gg5vmUSNIGBwU3eVS4jjenEKV_w7', '$2y$13$hDYqb4O2TT8qOKjMpQzYtOfXQOOfPeAgv9mRNT12N30numm.nFqZa', NULL, 'ihsan@gmail.com', 10, 1714481048, 1719807748, 'q2zp-WWqgyLXFheWelS9IhXAm5WpUkwG_1714481048', 9, '198205042007041001', 'instansi'),
(11, 'TAUFIK ADHI PRIYANTO,SH.,MH.', 'zhlu3d_yRm8qe9RpxhqwyWhQAduWLbBs', '$2y$13$QdAc2Qkkmadi8QgxNbgtQOlbAa.RPeqRXIGf7Ec8sbgHzEsEa8lwq', NULL, 'taufik@gmail.com', 10, 1714481102, 1719807845, 'd-EL9tkKSPwUiDn25d4cPPsQGPcRyG4t_1714481102', 9, '198011242008051001', 'instansi'),
(12, 'Sri Muliati, S.Sos.,MH.', 'uwqjx6kUWNpAZUV22l9fCu__0ZcGZfxc', '$2y$13$n7HZrJmCMcBOtr.OgbkL6eY1ARL7EM/KOTacintWP7zopqbF9yUOi', NULL, 'srimuliati@gmail.com', 10, 1714481188, 1719807885, 'Ywgc0PGAsXq0yQUHK4IWl3j6X8_mDwh4_1714481188', 2, '197108261991032002', 'instansi'),
(13, 'SITTI NURCE SAPAN, S.H.', '8XxdVX7a5dHL1039wNFyJnP5XNiBVmTD', '$2y$13$mePLIxKbfGU3USfqgomZzu18y33lI63157RRnGjU351skON7XTJgW', NULL, 'sittinurce@gmail.com', 10, 1714481268, 1719807905, 'SUJ_zRc5y_d8LiZzfDQjDi_scv0dV93a_1714481268', 7, '196910221990032001', 'instansi'),
(14, 'Amri, S.Kom.,M.I.Kom', 'iL9vdnpQci-JLo3apuJz205KXeoMqA3C', '$2y$13$FoTpARZcyXcIVF5QEBseAOGnD3IVj5Isq8iILJ/asJbfbOamdgvnS', NULL, 'amri@gmail.com', 10, 1714481374, 1719807941, 'eKiFtF-B6V9dQla08gJG6BNrgTolFCGS_1714481374', 11, '198304012009041003', 'instansi'),
(15, 'Andi Adzan Mirzan, S.Kom', 'lfdMfjCqGhID4_u9SuwTdnkAOQb3FQ-G', '$2y$13$q3fIdbmEsnAY/3iMxu/4..uuBmSy3J.4Ythi41ZLm6PeJKzhQchLC', NULL, 'adzanmirzan@gmail.com', 10, 1714481662, 1719807958, 'po2-CK2ydFLuv8Y6uAwLuUeVpcQvLsvU_1714481662', 11, '198503092009041001', 'instansi'),
(16, 'Ariyanto', 'y8Nkb3eMMWpg5Zp573TYdcthxyeZopo8', '$2y$13$k5qAL93ZpMvnCUQ9rksbI.5ZjYkdOOrfeTLAdsJiyhtXVKPRevak.', NULL, 'ariyanto@gmail.com', 10, 1714481842, 1719807980, 'f1Yeh4mqw-pBG_DfScyUmipImK-KHIc1_1714481842', 11, '196907111991031003', 'instansi'),
(17, 'Andy Adrhyan Taufik, S.Kom', 'KbQqis4NypV83Bdlio1y2YZ7Dq9DmlHB', '$2y$13$va4SEnxH2c3CjvNLCF35zO5k0sD.Wxz8U.cdz532kjcFjdzWq.RLa', NULL, 'adryan@gmail.com', 10, 1714482075, 1719807989, 'sRfimG1ZO99VK0e2dkyR7jDPAUxpWsEB_1714482075', 15, '123456787655234512', 'instansi'),
(18, 'SANDI KURNIAWAN, S.H.', 'v_bRdOwxF_LhVUsp7h5oMBQ_EJuJaeL7', '$2y$13$ikzC3NDA3PL5HcnptneecOB.EsR6PCSLnLL10HReEexsB.Dltyd/2', NULL, 'sandikurniawan@gmail.com', 10, 1714482205, 1719808026, '3TyJ7O78Wiq5xkj7I_w885zanaQvUqHW_1714482205', 10, '199610192022031007', 'instansi'),
(19, 'Abdul Razak', 'Zq4SLBgsZO2ujAOOeCmQIwAiUbyLE0mO', '$2y$13$OxDRCrtD0FxBZuqT06Hfnu54jYtygO4Xf/pQ9i91RpNlV01dZklRa', NULL, 'abdulrazak@gmail.com', 10, 1714543227, 1719808063, 'r218vmLw7ifGs18vPXUGn1fsk8zwOWFk_1714543227', 14, '196907151991031003', 'instansi'),
(20, 'Tedi Romyadi, S.H.,M.H.', 'dsEIpMaczDXRNQLsFCWkqFKM026MZv7D', '$2y$13$A2fkwsM79cjgWJuKtHB3fOAfqZq8k1UBsAAHa4/eno2IpuNoOH3VK', NULL, 'tedyromyadi@gmail.com', 10, 1714543783, 1719808124, 'AGjmF5t5MQAXiZuGmmRE_s2BQ7zwiCda_1714543783', 1, '196203060930121001', 'instansi'),
(21, 'NUR AKTI, S.M.,M.H', 'Hjf41cWbWGFjYOFECNjs1_PgtPfVkFj_', '$2y$13$zU3nxLcj63i5Ft0sGJqyLO5fu0JwdZEvHND0/.vcDCPwCSlf2cndO', NULL, 'nuraktif@gmail.com', 10, 1714543884, 1719808096, 'PW47ZeHFyDkJcbJahel-z2-2aikDV8Ad_1714543884', 8, '196310051739032003', 'instansi'),
(22, 'MUHAMMAD ALY RUSMIN, SH.', 'marr0T3pBRNd91yCxTf4PPCq4S5r1pGd', '$2y$13$lajfq3kw2.8IpPkTvYef8OwPeg.5dI4gOPRJC81S4L1HzOWx.GTuC', NULL, 'alyrusmin@gmail.com', 10, 1714544455, 1719808174, 'YoOdm02x63vn5kfWyPFiCE35Gs4p8LwD_1714544455', 9, '197802062003121001', 'instansi'),
(23, 'BUDIAMIN RODDING, S.H., M.H.', '0OIIowYIGGOd1g5tBLzqWy7uJmcC9A8r', '$2y$13$QCUpsjLu17bbqCeAh35rx.H.f9BK92bIy8846SXifw27q9o2f778.', NULL, 'budiaman@gmail.com', 10, 1714544494, 1719808191, 'H9Lz_kZBZSHaZP4CHTIvQLsG72GQy2u-_1714544494', 9, '197905032003121001', 'instansi'),
(24, 'ANDI JAYADI NUR, S.H., M.H.', 'c51JOS8Lskmuv8wH6VDPlw1PKlQR_JXp', '$2y$13$zbqt3UfITNyW5DNbh2DbyuV4tQL7vF7JrvmhzGZvMy5IEdlwIJt1i', NULL, 'andijayadi@gmail.com', 10, 1714544541, 1719808199, 'MI6iUWTIAJ1z07PKDNIXmrFw-8Iznw2Q_1714544541', 9, '198206292007041001', 'instansi'),
(25, 'ZARINA, S.H.', 'O6HVCH4xWXWGpfZqVDRmWxirGEc8KZyI', '$2y$13$AkmUazjMDZuMSOYhtO0wqOLJZXF0pyv5UwnW0Ii2H6DAAHg1IFQSO', NULL, 'zarina@gmail.com', 10, 1714544580, 1719808217, 'nVL5Z97UahIbjWAXi2gSlxr5LYnnaa1d_1714544580', 9, '197205132006042001', 'instansi'),
(26, 'TAUFIK PERDANA, S.H., M.H.', 'nUcEZbxxX8ksbE9afIt9k-4G5fntlSRE', '$2y$13$21RqnUp9dfv50kP4At6UbO7z.sXOZJQTEZj3DOlHK1Hu4IkXmdyG6', NULL, 'taufikperdana@gmail.com', 10, 1714544633, 1719808230, '9MuFFhmdzMjddTNEm6z6L5mSxlL564Ua_1714544633', 9, '197207092006041001', 'instansi'),
(27, 'LUTFI, S.H.', 'TOm_rMz_izvxsjgds0XTL5Wb0byn0otq', '$2y$13$ZtMkqWHckaB.SZiPdYO/pelt8nEvyDS7FbmXG4F3C0wmMT9KqsSpC', NULL, 'lutfi@gmail.com', 10, 1714544709, 1719808307, '2NdT77FeEW895xHKOp1gL4BJW4gejmc-_1714544709', 9, '197906302006041003', 'instansi'),
(28, 'CHRISTIAN EDNI PUTRA, S.H.', '37r84eNPQidCGDSXqV_SHKHkBbztjCsd', '$2y$13$XYtUnKMes7BNmJExE9lRY.FvrfUvFijpSD/Grq7cv/Jc9WroI93LG', NULL, 'edniputra@gmail.com', 10, 1714544747, 1719808318, 'Bk-Z8J61W_B73MlvMd1EXALqvi-k41Sa_1714544747', 9, '197410152005021002', 'instansi'),
(29, 'ANDI PUTRI BULAN, SH.MH.', '13jCA3hsCQrSQGKzhQTDq3JxmfQSoriq', '$2y$13$Js79oTmu2QVsuTpoyE2tJ.i19y6XlPIEUTJvNp1XJ5s/EfXJVAlay', NULL, 'andiputribulan@gmail.com', 10, 1714544904, 1719808336, '_oT96N1l-4Q06AgX2JadaeF9l_DxVGNR_1714544904', 9, '198209152008052001', 'instansi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `get_barang` (`get_barang`),
  ADD KEY `get_user` (`get_user`),
  ADD KEY `get_jenis` (`get_jenis`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id_permintaan`),
  ADD KEY `get_barang` (`get_barang`),
  ADD KEY `get_user` (`get_user`),
  ADD KEY `get_jenis` (`get_jenis`);

--
-- Indexes for table `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `get_jenis` (`get_jenis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `get_jabatan` (`get_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `stok_barang`
--
ALTER TABLE `stok_barang`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_ibfk_1` FOREIGN KEY (`get_barang`) REFERENCES `stok_barang` (`id_stok`),
  ADD CONSTRAINT `pengajuan_ibfk_2` FOREIGN KEY (`get_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pengajuan_ibfk_3` FOREIGN KEY (`get_jenis`) REFERENCES `jenis_barang` (`id_jenis`);

--
-- Constraints for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD CONSTRAINT `permintaan_ibfk_1` FOREIGN KEY (`get_barang`) REFERENCES `stok_barang` (`id_stok`),
  ADD CONSTRAINT `permintaan_ibfk_2` FOREIGN KEY (`get_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `permintaan_ibfk_3` FOREIGN KEY (`get_jenis`) REFERENCES `jenis_barang` (`id_jenis`);

--
-- Constraints for table `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD CONSTRAINT `stok_barang_ibfk_1` FOREIGN KEY (`get_jenis`) REFERENCES `jenis_barang` (`id_jenis`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`get_jabatan`) REFERENCES `jabatan` (`id_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
