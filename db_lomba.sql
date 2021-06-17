-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 01:17 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lomba`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bobot`
--

CREATE TABLE `tb_bobot` (
  `id` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `id_kelas`, `nip`, `nama_guru`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `no_telp`, `alamat`, `password`) VALUES
(3, 3, '123123', 'Guru', 'Jakarta', '2021-04-14', 'perempuan', 'kristen', '123123', 'Bekasi', '123123'),
(5, 2, '10', 'Oneng', 'Bekasi', '2006-05-10', 'laki', 'islam', '075675467', 'Bekasi', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id`, `nama_kelas`) VALUES
(2, 'X'),
(3, 'XI');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kriteria`
--

CREATE TABLE `tb_kriteria` (
  `id` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL,
  `sifat` varchar(10) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kriteria`
--

INSERT INTO `tb_kriteria` (`id`, `nama_kriteria`, `sifat`, `bobot`) VALUES
(1, 'Raport', 'Benefit', 5),
(2, 'Pengalaman Lomba', 'Benefit', 3),
(3, 'Nilai Tes Uji Kompetensi', 'Benefit', 2),
(4, 'Sikap Spritual', 'Benefit', 2),
(5, 'Sikap Sosial', 'Benefit', 2),
(9, 'Mata Pelajaran', 'Benefit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id` int(11) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mapel`
--

INSERT INTO `tb_mapel` (`id`, `nama_mapel`) VALUES
(1, 'Bahasa Indonesia'),
(2, 'PLBJ'),
(3, 'Agama'),
(4, 'Matematika'),
(5, 'IPA'),
(6, 'IPS'),
(7, 'PPKN'),
(8, 'Seni Budaya'),
(9, 'PJOK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matrik`
--

CREATE TABLE `tb_matrik` (
  `id` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `bobot_matrik` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_matrik`
--

INSERT INTO `tb_matrik` (`id`, `id_kriteria`, `id_siswa`, `nilai`, `bobot_matrik`) VALUES
(35, 1, 2, 30, 1.234),
(36, 1, 3, 22.2222, 0.914),
(37, 2, 2, 0, 0),
(38, 3, 2, 90, 0.734),
(39, 4, 2, 90, 0.641),
(40, 5, 2, 90, 0.576),
(41, 2, 3, 10, 0.148),
(42, 3, 3, 10, 0.082),
(43, 4, 3, 10, 0.071),
(44, 5, 3, 10, 0.064),
(45, 1, 5, 70, 2.879),
(49, 1, 6, 48.8889, 2.01),
(50, 1, 7, 50, 2.056),
(52, 2, 5, 80, 1.181),
(53, 3, 5, 80, 0.653),
(54, 4, 5, 80, 0.57),
(55, 5, 5, 80, 0.512),
(56, 2, 7, 80, 1.181),
(57, 3, 7, 10, 0.082),
(58, 4, 7, 10, 0.071),
(59, 5, 7, 10, 0.064),
(60, 2, 6, 100, 1.476),
(61, 3, 6, 40, 0.326),
(62, 4, 6, 40, 0.285),
(63, 5, 6, 40, 0.256),
(64, 1, 8, 60, 2.467),
(65, 2, 8, 60, 0.886),
(66, 3, 8, 50, 0.408),
(67, 4, 8, 50, 0.356),
(68, 5, 8, 50, 0.32),
(69, 1, 9, 60, 5),
(70, 2, 9, 60, 2.121),
(71, 3, 9, 80, 1.372),
(72, 4, 9, 80, 1.131),
(73, 5, 9, 8, 0.113),
(74, 9, 9, 8, 0.056),
(75, 9, 5, 80, 0.241),
(76, 9, 8, 60, 0.181),
(77, 9, 7, 40, 0.121),
(78, 9, 6, 20, 0.06),
(79, 9, 2, 10, 0.03);

-- --------------------------------------------------------

--
-- Table structure for table `tb_preferensi`
--

CREATE TABLE `tb_preferensi` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_preferensi`
--

INSERT INTO `tb_preferensi` (`id`, `id_siswa`, `nilai`) VALUES
(1, 2, 0.0545),
(2, 3, 0.5026),
(3, 5, 0.0545),
(4, 7, 0.0545),
(5, 6, 0.0545),
(6, 8, 0.0545),
(7, 9, 0.0545);

-- --------------------------------------------------------

--
-- Table structure for table `tb_raport`
--

CREATE TABLE `tb_raport` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_raport`
--

INSERT INTO `tb_raport` (`id`, `id_siswa`, `id_mapel`, `nilai`) VALUES
(100, 3, 1, 20),
(101, 3, 2, 20),
(102, 3, 3, 20),
(103, 3, 4, 20),
(104, 3, 5, 20),
(105, 3, 6, 20),
(106, 3, 7, 20),
(107, 3, 8, 40),
(108, 3, 9, 20),
(109, 2, 1, 30),
(110, 2, 2, 30),
(111, 2, 3, 30),
(112, 2, 4, 30),
(113, 2, 5, 30),
(114, 2, 6, 30),
(115, 2, 7, 30),
(116, 2, 8, 30),
(117, 2, 9, 30),
(118, 5, 1, 70),
(119, 5, 2, 70),
(120, 5, 3, 70),
(121, 5, 4, 70),
(122, 5, 5, 70),
(123, 5, 6, 70),
(124, 5, 7, 70),
(125, 5, 8, 70),
(126, 5, 9, 70),
(127, 0, 1, 50),
(128, 0, 2, 50),
(129, 0, 3, 50),
(130, 0, 4, 50),
(131, 0, 5, 50),
(132, 0, 6, 50),
(133, 0, 7, 50),
(134, 0, 8, 50),
(135, 0, 9, 50),
(145, 6, 1, 50),
(146, 6, 2, 50),
(147, 6, 3, 50),
(148, 6, 4, 50),
(149, 6, 5, 50),
(150, 6, 6, 50),
(151, 6, 7, 50),
(152, 6, 8, 50),
(153, 6, 9, 40),
(154, 7, 1, 50),
(155, 7, 2, 50),
(156, 7, 3, 50),
(157, 7, 4, 50),
(158, 7, 5, 50),
(159, 7, 6, 50),
(160, 7, 7, 50),
(161, 7, 8, 50),
(162, 7, 9, 50),
(163, 8, 1, 80),
(164, 8, 2, 70),
(165, 8, 3, 70),
(166, 8, 4, 40),
(167, 8, 5, 70),
(168, 8, 6, 60),
(169, 8, 7, 50),
(170, 8, 8, 50),
(171, 8, 9, 50),
(172, 9, 1, 60),
(173, 9, 2, 60),
(174, 9, 3, 60),
(175, 9, 4, 60),
(176, 9, 5, 60),
(177, 9, 6, 60),
(178, 9, 7, 60),
(179, 9, 8, 60),
(180, 9, 9, 60);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` varchar(10) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `agama` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `id_kelas`, `nis`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`) VALUES
(2, 2, '13123', 'Dhimas', 'Tangerang', '2021-04-15', 'laki', 'islam', 'Bekasi'),
(3, 2, '12301', 'Dhim', 'Jakarta', '2021-04-08', 'laki', 'kristen', 'Bekasi'),
(5, 2, '12312', 'Baju', 'Tangerang', '2021-06-01', 'laki', 'islam', 'Bandung'),
(6, 2, '22222', 'Bujang', 'Bandung', '2021-05-30', 'laki', 'islam', 'Bekasi'),
(7, 2, '33333', 'Saya', 'Tangerang', '2021-05-30', 'laki', 'islam', 'Jakarta'),
(8, 2, '4444', 'Barus', 'Bekasi', '1998-01-20', 'perempuan', 'islam', 'Bandung'),
(9, 3, '55555', 'Agus', 'Jakarta', '2021-06-06', 'laki', 'islam', 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tes`
--

CREATE TABLE `tb_tes` (
  `id` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tes`
--

INSERT INTO `tb_tes` (`id`, `id_siswa`, `id_kriteria`, `nilai`) VALUES
(7, 2, 3, 3),
(8, 0, 3, 3),
(9, 3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `level`, `nama`) VALUES
(1, 'admin', 'admin', 'admin', 'admin1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bobot`
--
ALTER TABLE `tb_bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_matrik`
--
ALTER TABLE `tb_matrik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_preferensi`
--
ALTER TABLE `tb_preferensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_raport`
--
ALTER TABLE `tb_raport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tes`
--
ALTER TABLE `tb_tes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bobot`
--
ALTER TABLE `tb_bobot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kriteria`
--
ALTER TABLE `tb_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_matrik`
--
ALTER TABLE `tb_matrik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tb_preferensi`
--
ALTER TABLE `tb_preferensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_raport`
--
ALTER TABLE `tb_raport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_tes`
--
ALTER TABLE `tb_tes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
