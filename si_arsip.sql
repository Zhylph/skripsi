-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2020 at 05:25 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_access_menu`
--

CREATE TABLE `tbl_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_access_menu`
--

INSERT INTO `tbl_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 13, 1),
(12, 13, 3),
(13, 13, 4),
(14, 13, 6),
(19, 13, 7),
(27, 13, 9),
(29, 13, 8),
(31, 13, 10),
(32, 13, 11),
(40, 2, 7),
(41, 2, 11),
(44, 1, 4),
(47, 1, 8),
(48, 1, 9),
(49, 1, 10),
(50, 1, 11),
(51, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berkas`
--

CREATE TABLE `tbl_berkas` (
  `id_berkas` int(11) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `id_jenis_berkas` varchar(25) NOT NULL,
  `id_jenis_pengajuan` varchar(25) NOT NULL,
  `file_berkas` varchar(255) NOT NULL,
  `tanggal_upload` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_berkas`
--

INSERT INTO `tbl_berkas` (`id_berkas`, `nip`, `id_jenis_berkas`, `id_jenis_pengajuan`, `file_berkas`, `tanggal_upload`) VALUES
(113, '196605141997031001', 'DOC1', '', 'AD_UT_Pengajuan.png', 1601863507),
(114, 'rajif', 'SK13', '', 'AD_UT_Pengajuan.png', 1601779184),
(115, '196605141997031001', 'SK7', 'JP3', 'AD_UT_Berkas.png', 1601779870),
(116, '196605141997031001', 'SK3', 'JP4', 'AD_UT_Pengajuan.png', 1601779879),
(117, '196605141997031001', 'SK9', 'JP5', 'AD_UT_Pengajuan.png', 1601779888),
(118, '196605141997031001', 'KP3', 'JP2', 'AD_UT_Berkas.png', 1601779948),
(119, '196605141997031001', 'DOC1', 'JP1', '45596.jpg', 1601954617);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cuti`
--

CREATE TABLE `tbl_cuti` (
  `id_cuti` int(25) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `lama` varchar(50) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `id_jenis_pengajuan` varchar(25) NOT NULL,
  `tanggal_pengajuan` varchar(50) NOT NULL,
  `penyetujuan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cuti`
--

INSERT INTO `tbl_cuti` (`id_cuti`, `nip`, `perihal`, `tempat`, `lama`, `lampiran`, `id_jenis_pengajuan`, `tanggal_pengajuan`, `penyetujuan`) VALUES
(2, '196605141997031001', 'Cuti Tahunan', 'Marabahan', 'Dua Hari', 'Surat Izin Cuti', 'JP4', '1601624920', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_berkas`
--

CREATE TABLE `tbl_jenis_berkas` (
  `id_jenis_berkas` varchar(25) NOT NULL,
  `nama_berkas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_berkas`
--

INSERT INTO `tbl_jenis_berkas` (`id_jenis_berkas`, `nama_berkas`) VALUES
('DOC1', 'Akta Kelahiran'),
('KP1', 'Kartu Pegawai'),
('KP2', 'Kartu Suami/Istri'),
('KP3', 'KTP'),
('KP4', 'Kartu Peserta Taspen'),
('SK1', 'SK CPNS'),
('SK10', 'SK Kenaikan Gaji Berkala Terakhir'),
('SK11', 'PPKPNS'),
('SK12', 'SK PMK'),
('SK13', 'SK Konversi NIP Baru'),
('SK14', 'Surat Keterangan Penghentian'),
('SK2', 'SK PNS'),
('SK3', 'SK Pangkat Terakhir'),
('SK4', 'SK Mutasi'),
('SK5', 'SKP 2 Tahun Terakhir'),
('SK6', 'SK Jabatan Struktural'),
('SK7', 'SK Jabatan Sebelumnya'),
('SK8', 'SK Pembebasan Jabatan Fungsional'),
('SK9', 'SK Penambahan Masa Kerja'),
('SP1', 'Surat Pengantar Dinas'),
('ST1', 'Ijazah Terakhir'),
('ST2', 'Transkip Nilai'),
('ST3', 'STTPL Penjenjangan'),
('ST4', 'STLUD'),
('ST5', 'Surat Izin '),
('ST6', 'Surat Tugas Belajar'),
('ST7', 'Legalisir Pangkalan Data'),
('ST8', 'Surat Tanda Lulus UKPPI'),
('ST9', 'Surat Nikah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_pengajuan`
--

CREATE TABLE `tbl_jenis_pengajuan` (
  `id_jenis_pengajuan` varchar(25) NOT NULL,
  `jenis_pengajuan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_pengajuan`
--

INSERT INTO `tbl_jenis_pengajuan` (`id_jenis_pengajuan`, `jenis_pengajuan`) VALUES
('JP1', 'Kenaikan Pangkat'),
('JP2', 'Kenaikan Gaji'),
('JP3', 'Pensiun'),
('JP4', 'Izin Cuti'),
('JP5', 'Penyesuaian Ijazah');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenis_surat`
--

CREATE TABLE `tbl_jenis_surat` (
  `id_jenis_surat` varchar(50) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenis_surat`
--

INSERT INTO `tbl_jenis_surat` (`id_jenis_surat`, `jenis_surat`) VALUES
('SK', 'Surat Keluar'),
('SM', 'Surat Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `menu`) VALUES
(1, 'Admin'),
(2, 'Administrator'),
(3, 'Menu'),
(4, 'Data'),
(6, 'Pengarsipan'),
(7, 'Pengajuan'),
(8, 'Surat'),
(9, 'Penyetujuan'),
(10, 'Laporan'),
(11, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id_pengajuan` int(25) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `id_jenis_pengajuan` varchar(25) NOT NULL,
  `tanggal_pengajuan` varchar(50) NOT NULL,
  `penyetujuan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id_pengajuan`, `nip`, `id_jenis_pengajuan`, `tanggal_pengajuan`, `penyetujuan`) VALUES
(13, '196605141997031001', 'JP2', '1579737029', 1),
(14, '196609041987032006', 'JP2', '1579737080', 0),
(15, '197409012010011005', 'JP1', '1579737128', 1),
(16, '197809281997112001', 'JP2', '1579737157', 0),
(17, '5789', 'JP1', '1579835865', 1),
(18, '5789', 'JP1', '1579909575', 1),
(19, '196605141997031001', 'JP2', '1580044474', 0),
(20, '196605141997031001', 'JP3', '1580044482', 1),
(21, '196605141997031001', 'JP4', '1580044485', 1),
(22, 'rajif', 'JP4', '1582461249', 1),
(23, '197809281997112001', 'JP1', '1582462311', 1),
(24, '197809281997112001', 'JP2', '1582462315', 0),
(25, '197809281997112001', 'JP3', '1582462319', 0),
(26, '197809281997112001', 'JP4', '1582462323', 1),
(27, '5789', 'JP1', '1582495924', 1),
(28, '5789', 'JP1', '1582497438', 0),
(29, '1101', 'JP1', '1582499110', 0),
(30, '5789', 'JP1', '1582505409', 0),
(31, '110199', 'JP1', '1597200012', 1),
(32, '1101', 'JP1', '1597214194', 0),
(33, '1101', 'JP4', '1597214698', 0),
(34, '1101', 'JP5', '1597214894', 0),
(35, '196605141997031001', 'JP3', '1601686338', 1),
(36, '196605141997031001', 'JP1', '1601767220', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penyesuaian`
--

CREATE TABLE `tbl_penyesuaian` (
  `id_penyesuaian` int(25) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `fakultas` varchar(30) NOT NULL,
  `tahun` varchar(25) NOT NULL,
  `id_jenis_pengajuan` varchar(25) NOT NULL,
  `tanggal_pengajuan` varchar(50) NOT NULL,
  `penyetujuan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penyesuaian`
--

INSERT INTO `tbl_penyesuaian` (`id_penyesuaian`, `nip`, `tempat`, `jurusan`, `fakultas`, `tahun`, `id_jenis_pengajuan`, `tanggal_pengajuan`, `penyetujuan`) VALUES
(5, 'rajif', 'UniskaBisa', 'Teknik Informatika', 'Teknologi Informasi', '2020 Aamiin', 'JP5', '1600916902', 1),
(6, '196609041987032006', 'Universitas Islam Kalimantan Selatan', 'Teknik Informatika', 'Teknologi Informasi', '2020', 'JP5', '1600917029', 0),
(7, '1101', 'Universitas Islam Kalimantan Selatan', 'Teknik Informatika', 'Teknologi Informasi', '2019', 'JP5', '1601296089', 0),
(8, '196605141997031001', 'Universitas Islam Kalimantan Selatan', 'Teknik Informatika', 'Teknologi Informasi', '2019', 'JP5', '1601686509', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'User'),
(13, 'Superadmin'),
(3, 'Superadmin'),
(11, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_menu`
--

CREATE TABLE `tbl_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_menu`
--

INSERT INTO `tbl_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin/index', 'fas fa-fw fa-tachometer-alt', 1),
(3, 3, 'Submenu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(5, 1, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(7, 6, 'Upload Berkas', 'user/upberkas', 'fas fa-fw fa-upload', 1),
(8, 4, 'Data Pegawai', 'data', 'fas fa-fw fa-user', 1),
(9, 4, 'Data Berkas', 'data/berkas', 'fas fa-fw fa-file', 1),
(10, 2, 'Dashboard', 'newadmin', 'fas fa-fw fa-tachometer-alt', 1),
(11, 4, 'Data Jenis Berkas', 'data/jenisberkas', 'fas fa-fw fa-file-alt', 1),
(12, 4, 'Data Jenis Pengajuan', 'data/jenispengajuan', 'fas fa-fw fa-share-square', 1),
(13, 7, 'Ajukan Berkas', 'user/pengajuan', 'fas fa-fw fa-paper-plane', 1),
(14, 10, 'Laporan Pegawai', 'data/pdf', 'fas fa-fw fa-tasks', 1),
(15, 10, 'Laporan Berkas', 'data/pdfberkas', 'fas fa-fw fa-tasks', 1),
(16, 10, 'Laporan Kenaikan Pangkat', 'data/pdfpengajuankp', 'fas fa-fw fa-tasks', 1),
(17, 10, 'Laporan Kenaikan Gaji', 'data/pdfpengajuankg', 'fas fa-fw fa-tasks', 1),
(18, 4, 'Data Pengajuan', 'data/pengajuan', 'fas fa-fw fa-tasks', 0),
(19, 10, 'Laporan Pengajuan', 'data/pdfpengajuan', 'fas fa-fw fa-tasks', 0),
(20, 11, 'Ubah Password', 'user/changepassword', 'fas fa-fw fa-key', 1),
(21, 9, 'Kenaikan Pangkat', 'data/approve_kp', 'fas fa-fw fa-check', 1),
(22, 9, 'Kenaikan Gaji', 'data/approve_kg', 'fas fa-fw fa-check', 1),
(23, 9, 'Pensiun', 'data/approve_p', 'fas fa-fw fa-check', 1),
(24, 9, 'Izin Cuti', 'data/approve_c', 'fas fa-fw fa-check', 1),
(25, 10, 'Laporan Pensiun', 'data/pdfpengajuanpensi', 'fas fa-fw fa-tasks', 1),
(26, 10, 'Laporan Izin Cuti', 'data/pdfpengajuancuti', 'fas fa-fw fa-tasks', 0),
(27, 8, 'Surat Masuk', 'data/suratmasuk', 'fas fa-fw fa-envelope', 1),
(28, 8, 'Surat Keluar', 'data/suratkeluar', 'fas fa-fw fa-envelope-open-text', 1),
(29, 4, 'Data Jenis Surat ', 'data/jenissurat', 'fas fa-fw fa-envelope', 0),
(30, 10, 'Laporan Surat Masuk', 'data/pdfsuratmasuk', 'fas fa-fw fa-tasks', 1),
(31, 10, 'Laporan Surat Keluar', 'data/pdfsuratkeluar', 'fas fa-fw fa-tasks', 0),
(32, 9, 'Penyesuaian Ijazah', 'data/approve_pi', 'fas fa-fw fa-check	', 1),
(33, 7, 'Izin Cuti', 'user/izin_cuti', 'fas fa-fw fa-paper-plane', 1),
(34, 7, 'Penyesuaian Ijazah', 'user/penyesuaian', 'fas fa-fw fa-paper-plane', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_keluar`
--

CREATE TABLE `tbl_surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `id_jenis_surat` varchar(10) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `klasifikasi` varchar(50) NOT NULL,
  `lampiran` varchar(50) NOT NULL,
  `isi` longtext NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tujuan_surat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_surat_keluar`
--

INSERT INTO `tbl_surat_keluar` (`id_surat_keluar`, `no_surat`, `id_jenis_surat`, `perihal`, `klasifikasi`, `lampiran`, `isi`, `tanggal_surat`, `tujuan_surat`) VALUES
(48, '001/Diskominfo/2020', 'SK', 'Registrasi Kartu Pelanggan Seluler', 'Segera', '-', 'Dalam rangka registrasi ulang kartu pelanggan telekomunikasi seluler sesuai dengan Peraturan Menteri Kominfo Nomor 12 Tahun 2016 sebagaimana terakhir diubah dengan Peraturan Mentreri Kominfo Nomor 21 Tahun 2017, yang dimulai pada tanggal 31 Oktober 2017, bersama ini diberitahukan bahwa sampai dengan tanggal 1 November 2017 pelanggan yang berhasil melakukan registrasi sejumlah 30.201.602 (Tiga Puluh Juta Dua Ratus Seribu Enam Ratus Dua) sim card. Hal ini menunjukan antusiasme dan respon positif masyarakat untuk meregistrasikan kartu pelanggannya. Berkenaan dengan hal tersebut, kami mohon bantuan Kepala Dinas Komunikasi dan Informatika Provinsi di seluruh Indonesia untuk dapat membantu suksesnya registrasi kartu prabayar kepada masyarakat di wilayah Saudara. Demikian disampaikan, atas perhatian dan kerjasamanya diucapkan terima kasih', '2020-10-05', 'Para Kepala Dinas Komunikasi dan Informatika'),
(49, '002/Diskominfo/2020', 'SK', 'Pengajuan Konsep Keputusan', 'Segera', '-', 'asd', '2020-10-05', 'Dinas Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat_masuk`
--

CREATE TABLE `tbl_surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `no_surat` varchar(100) NOT NULL,
  `id_jenis_surat` varchar(10) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `asal_surat` varchar(100) NOT NULL,
  `tujuan_surat` varchar(100) NOT NULL,
  `file_surat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_surat_masuk`
--

INSERT INTO `tbl_surat_masuk` (`id_surat_masuk`, `no_surat`, `id_jenis_surat`, `perihal`, `tanggal_surat`, `tanggal_diterima`, `asal_surat`, `tujuan_surat`, `file_surat`) VALUES
(10, '001/Pemda/2020', 'SM', 'Perihal', '2020-07-02', '2020-07-05', 'Kantor Pemerintah Daerah', 'Kantor Dinas Komunikasi dan Informatika', 'Undangan.pdf'),
(12, '141/Dishub/2020', 'SM', 'Undangan', '2020-06-29', '2020-07-30', 'Dinas Perhubungan', 'Dinas Komunikasi', 'revolusi-industri-4.pdf'),
(13, '911/Pemda/2020', 'SM', 'Undangan', '2020-08-19', '2020-08-20', 'Kantor Pemerintah Daerah', 'Dinas Komunikasi', 'CV.docx'),
(14, '121/Disdik/2020', 'SM', 'Izin Sakit', '2020-10-03', '2020-10-10', 'Dinas Pendidikan', 'Dinas Pendidikan', '1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `nip` varchar(18) NOT NULL,
  `nama_pegawai` varchar(25) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `jabatan` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`nip`, `nama_pegawai`, `golongan`, `jabatan`, `password`, `role_id`) VALUES
('196505011986021007', 'Akhmad Wahyuni,S.Sos,M.IP', 'IV A', 'Kepala Dinas', '$2y$10$gaYehloTwg6TIywNh/X/vOWHCS.itUCLADmAWjhM8quy4dHGgrzaW', 2),
('196605141997031001', 'Ichwan Hakim, S.Hut', 'IV/a', 'Sekretaris', '$2y$10$gaYehloTwg6TIywNh/X/vOWHCS.itUCLADmAWjhM8quy4dHGgrzaW', 2),
('196609041987032006', 'Sri Wahidah, S.IP', 'IV/a', 'Kabid Pengembangan Sumber Daya Komunikasi Dan Informatika', '$2y$10$gaYehloTwg6TIywNh/X/vOWHCS.itUCLADmAWjhM8quy4dHGgrzaW', 2),
('197409012010011005', 'Abdul Manhudi, S.Sos.', 'III/d', 'Kasubbag Umum & Kepegawaian', '$2y$10$gaYehloTwg6TIywNh/X/vOWHCS.itUCLADmAWjhM8quy4dHGgrzaW', 2),
('admin', 'Administrator', 'Admin', 'Admin', '$2y$10$jC9updmC9aUpaKZ/0HX8jOIXKoUIoJQkT3.vGbBiYvpnRXiarZHsS', 1),
('rajif', 'R', 'IV', 'Direktur', '$2y$10$tFP0S/7ome7bfDGoXFgQO.zaZpAijmJfmraybJs5mzuau8Jb4Pm0S', 13);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_access_menu`
--
ALTER TABLE `tbl_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `id_jenis_berkas` (`id_jenis_berkas`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `tbl_jenis_berkas`
--
ALTER TABLE `tbl_jenis_berkas`
  ADD PRIMARY KEY (`id_jenis_berkas`);

--
-- Indexes for table `tbl_jenis_pengajuan`
--
ALTER TABLE `tbl_jenis_pengajuan`
  ADD PRIMARY KEY (`id_jenis_pengajuan`);

--
-- Indexes for table `tbl_jenis_surat`
--
ALTER TABLE `tbl_jenis_surat`
  ADD PRIMARY KEY (`id_jenis_surat`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `nip` (`nip`),
  ADD KEY `id_jenis_pengajuan` (`id_jenis_pengajuan`);

--
-- Indexes for table `tbl_penyesuaian`
--
ALTER TABLE `tbl_penyesuaian`
  ADD PRIMARY KEY (`id_penyesuaian`);

--
-- Indexes for table `tbl_sub_menu`
--
ALTER TABLE `tbl_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`),
  ADD KEY `id_jenis_surat` (`id_jenis_surat`);

--
-- Indexes for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`),
  ADD KEY `id_jenis_surat` (`id_jenis_surat`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_access_menu`
--
ALTER TABLE `tbl_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_berkas`
--
ALTER TABLE `tbl_berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  MODIFY `id_cuti` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id_pengajuan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_penyesuaian`
--
ALTER TABLE `tbl_penyesuaian`
  MODIFY `id_penyesuaian` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_sub_menu`
--
ALTER TABLE `tbl_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_surat_keluar`
--
ALTER TABLE `tbl_surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_surat_masuk`
--
ALTER TABLE `tbl_surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
