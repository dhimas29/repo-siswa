-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2021 at 05:11 AM
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
(3, 2, '123123', 'Guru', 'Jakarta', '2021-04-14', 'laki', 'kristen', '123123', 'Bekasi', '123123'),
(4, 3, '1111', 'Sayap', 'Jakarta', '2017-01-30', 'perempuan', 'islam', '0812312', 'Jakarta', '1111'),
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
(5, 'Sikap Sosial', 'Benefit', 2);

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
(2, 'Bahasa Inggris'),
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
(35, 1, 2, 1.6667, 2.297),
(36, 1, 3, 3.2222, 4.441),
(37, 2, 2, 3, 1.87),
(38, 3, 2, 4, 1.262),
(39, 4, 2, 2, 0.595),
(40, 5, 2, 2, 0.565),
(41, 2, 3, 1, 0.623),
(42, 3, 3, 1, 0.316),
(43, 4, 3, 1, 0.298),
(44, 5, 3, 1, 0.282);

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
(1, 2, 0.062875884717703),
(2, 3, 0.3629);

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
(100, 3, 1, 4),
(101, 3, 2, 5),
(102, 3, 3, 5),
(103, 3, 4, 2),
(104, 3, 5, 2),
(105, 3, 6, 1),
(106, 3, 7, 4),
(107, 3, 8, 3),
(108, 3, 9, 3),
(109, 2, 1, 1),
(110, 2, 2, 1),
(111, 2, 3, 1),
(112, 2, 4, 1),
(113, 2, 5, 2),
(114, 2, 6, 1),
(115, 2, 7, 5),
(116, 2, 8, 1),
(117, 2, 9, 2);

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
  `alamat` varchar(100) NOT NULL,
  `tahun_angkatan` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id`, `id_kelas`, `nis`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `tahun_angkatan`) VALUES
(2, 2, '13123', 'Dhimas', 'Tangerang', '2021-04-15', 'laki', 'islam', 'Bekasi', '2010'),
(3, 2, '12301', 'Dhim', 'Jakarta', '2021-04-08', 'laki', 'kristen', 'Bekasi', '2000');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_matrik`
--
ALTER TABLE `tb_matrik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tb_preferensi`
--
ALTER TABLE `tb_preferensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_raport`
--
ALTER TABLE `tb_raport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
