-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2021 at 07:27 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs_bimbelku`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_followers_guru`
--

CREATE TABLE `tbl_followers_guru` (
  `id` int(10) NOT NULL,
  `kd_follow` varchar(111) NOT NULL,
  `username_guru` varchar(111) NOT NULL,
  `username_siswa` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id` int(7) NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `tempat_lahir` text NOT NULL,
  `tanggal_lahir` varchar(22) NOT NULL,
  `alamat` text NOT NULL,
  `tentang_saya` text NOT NULL,
  `no_hp` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`id`, `username`, `nama_lengkap`, `nip`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `tentang_saya`, `no_hp`) VALUES
(1, 'guru1', 'Kurnia Larasati', '8922901', 'Medan Perjuangan', '', 'Tanjung Balai', 'Coding camp at UINSU - \"Spirit Of Collaborative, Never Stop Coding :-) \"', '087890227822'),
(2, 'guru2', 'EBunga Sukses Makmur', '8922122', 'Medan Perjuangan', '2021-04-09', 'Perumahan Cemara Asri, Jln. Tanjung, No. 10\nKelurahan Sampali, Kecamatan Percut Sei Tuan', 'I love my self', '082167511111'),
(3, 'alfananinda', 'Annisa Alfa Naninda', '-', '-', '', '-', '-', '-'),
(5, 'hasnah', 'Hasnah Ardita', '-', '-', '-', '-', '-', '-'),
(6, 'dwicitrautami', 'Dwi Citra Utami', '80901112', 'Padang Sidempuan', '1998-09-12', 'Medan Perjuangan', 'Iam do the best', '0887890117822'),
(7, 'yuricaem', 'Yuri Maulida Putri', '7899112', 'Medan', '2021-04-16', 'Medan', 'Siyap cantik', '087856112311');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item_pesanan`
--

CREATE TABLE `tbl_item_pesanan` (
  `id` int(10) NOT NULL,
  `kd_pemesanan` varchar(111) NOT NULL,
  `kd_jadwal` varchar(5) NOT NULL,
  `kd_tentor` varchar(200) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_item_pesanan`
--

INSERT INTO `tbl_item_pesanan` (`id`, `kd_pemesanan`, `kd_jadwal`, `kd_tentor`, `status`) VALUES
(55, '5604567398', '1', 'szj148nol3', '0'),
(56, '5604567398', '3', 'szj148nol3', '0'),
(57, '5604567398', '4', 'szj148nol3', '0'),
(58, '5604567398', '5', 'szj148nol3', '0'),
(59, '5604567398', '6', 'szj148nol3', '0'),
(60, '5604567398', '13', 'szj148nol3', '0'),
(61, '5604567398', '15', 'szj148nol3', '0'),
(62, '5604567398', '30', 'szj148nol3', '0'),
(63, '5604567398', '32', 'szj148nol3', '0'),
(64, '5604567398', '25', 'szj148nol3', '0'),
(65, '7451345798', '20', 'szj148nol3', '1'),
(66, '7451345798', '23', 'szj148nol3', '1'),
(67, '7451345798', '17', 'szj148nol3', '1'),
(68, '7451345798', '9', 'szj148nol3', '1'),
(69, '7451345798', '7', 'szj148nol3', '1'),
(70, '7451345798', '35', 'szj148nol3', '1'),
(71, '5456929975', '3', '3khst2zwyb', '1'),
(72, '5456929975', '4', '3khst2zwyb', '1'),
(73, '5456929975', '5', '3khst2zwyb', '1'),
(74, '5456929975', '14', '3khst2zwyb', '1'),
(75, '5456929975', '15', '3khst2zwyb', '1'),
(76, '5456929975', '21', '3khst2zwyb', '1'),
(77, '5456929975', '22', '3khst2zwyb', '1'),
(78, '5456929975', '32', '3khst2zwyb', '1'),
(79, '5456929975', '33', '3khst2zwyb', '1'),
(80, '5456929975', '40', '3khst2zwyb', '1'),
(81, '5456929975', '41', '3khst2zwyb', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kursus`
--

CREATE TABLE `tbl_kursus` (
  `id` int(5) NOT NULL,
  `kd_kursus` varchar(25) NOT NULL,
  `nama_kursus` varchar(222) NOT NULL,
  `keterangan` text NOT NULL,
  `kategori` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kursus`
--

INSERT INTO `tbl_kursus` (`id`, `kd_kursus`, `nama_kursus`, `keterangan`, `kategori`) VALUES
(1, '983', 'Bimbingan Akademik', '-', 'Akademik'),
(3, '862', 'Matematika', '-', 'Akademik'),
(4, '845', 'Fisika', '-', 'Akademik'),
(5, '18', 'Kimia', '-', 'Akademik'),
(6, '504', 'Bahasa Mandarin', '-', 'Bahasa'),
(7, '115', 'Bahasa Inggris', '-', 'Bahasa'),
(8, '64', 'Menggambar', '-', 'Seni'),
(10, '868', 'Menjahit', '-', 'Seni');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesanan`
--

CREATE TABLE `tbl_pemesanan` (
  `id` int(7) NOT NULL,
  `kd_pemesanan` varchar(111) NOT NULL,
  `kd_tentor` varchar(111) NOT NULL,
  `kd_siswa` varchar(50) NOT NULL,
  `total_biaya` int(20) NOT NULL,
  `waktu_pemesanan` datetime NOT NULL,
  `waktu_konfirmasi_bayar` datetime NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL,
  `status_mentoring` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pemesanan`
--

INSERT INTO `tbl_pemesanan` (`id`, `kd_pemesanan`, `kd_tentor`, `kd_siswa`, `total_biaya`, `waktu_pemesanan`, `waktu_konfirmasi_bayar`, `status_pembayaran`, `status_mentoring`) VALUES
(12, '5604567398', 'szj148nol3', 'siswa1', 300000, '2021-04-23 07:35:14', '0000-00-00 00:00:00', 'sukses', 'selesai'),
(13, '7451345798', 'szj148nol3', 'faridahasanah', 180000, '2021-04-23 10:33:38', '0000-00-00 00:00:00', 'sukses', 'aktif'),
(14, '5456929975', '3khst2zwyb', 'siswa1', 660000, '2021-04-23 17:51:01', '0000-00-00 00:00:00', 'pending', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id` int(5) NOT NULL,
  `username` varchar(222) NOT NULL,
  `nama_lengkap` varchar(222) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` text NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id`, `username`, `nama_lengkap`, `tanggal_lahir`, `tempat_lahir`, `alamat`, `no_hp`) VALUES
(2, 'siswa1', 'Fenrir Abdullah', '0000-00-00', '-', '-', '-'),
(3, 'faridahasanah', 'Farida Hasanah', '0000-00-00', '-', '-', '-'),
(4, 'irapermata', 'Ira Permata Nasution', '1991-09-21', 'Padangsidempuan', 'Medan perjuangan', '087890226711'),
(5, 'hamidahkurnia', 'Hamidah Kurnia Putri', '0000-00-00', '-', '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tentor`
--

CREATE TABLE `tbl_tentor` (
  `id` int(7) NOT NULL,
  `username` varchar(222) NOT NULL,
  `kd_tentor` varchar(111) NOT NULL,
  `tempat` text NOT NULL,
  `kd_kursus` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `latar_belakang` text NOT NULL,
  `daerah_layanan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tentor`
--

INSERT INTO `tbl_tentor` (`id`, `username`, `kd_tentor`, `tempat`, `kd_kursus`, `harga`, `latar_belakang`, `daerah_layanan`) VALUES
(1, 'guru1', 'szj148nol3', 'tempat_bimbel', '18', 30000, '', 'Lubuk Pakam, Deli Serdang Regency, North Sumatra, Indonesia'),
(2, 'guru2', '9xhcf5uqjl', 'rumah', '115', 80000, 'Kita semua dalam keadaan Stress saat ini.. Tak bisa di pungkiri.. I hope this jokes will release some... Love u all.', 'Pematang Siantar, Pematang Siantar City, North Sumatra, Indonesia'),
(3, 'alfananinda', '3khst2zwyb', 'rumah', '18', 60000, 'Ni orang sebenernya punya kepribadian yg bagus, sebisa mungkin berusaha ngejelasin.. Toh klo ngerasa salah gak sungkan minta maaf', 'Lubuk Pakam, Deli Serdang Regency, North Sumatra, Indonesia'),
(4, 'dwicitrautami', 'jhndz81o3p', 'tempat_bimbel', '18', 40000, 'Saya akan berusaha sebaik mungkin dalam mengajar, terima kasih', 'Lubuk Pakam, Deli Serdang Regency, North Sumatra, Indonesia'),
(5, 'dwicitrautami', 'yj5ir9hlg4', 'rumah', '862', 60000, 'Saya suka mengajar matematika', 'Lubuk Pakam, Deli Serdang Regency, North Sumatra, Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(7) NOT NULL,
  `username` varchar(222) NOT NULL,
  `password` varchar(222) NOT NULL,
  `tipe_user` varchar(20) NOT NULL,
  `last_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `tipe_user`, `last_login`) VALUES
(8, 'admin', 'admin', 'admin', '2021-04-23 19:21:13'),
(13, 'guru1', 'admin', 'guru', '2021-04-23 10:31:08'),
(14, 'guru2', 'admin', 'guru', '2021-04-23 10:30:55'),
(15, 'siswa1', 'admin', 'siswa', '2021-04-23 12:53:07'),
(16, 'alfananinda', 'admin', 'guru', '2021-04-22 07:05:48'),
(18, 'hasnah', 'admin', 'guru', '2021-04-22 07:08:44'),
(19, 'faridahasanah', 'admin', 'siswa', '2021-04-23 11:15:17'),
(20, 'irapermata', 'admin', 'siswa', '2021-04-23 18:00:52'),
(21, 'hamidahkurnia', 'admin', 'siswa', '2021-04-23 17:54:36'),
(22, 'dwicitrautami', 'admin', 'guru', '2021-04-23 17:57:16'),
(23, 'yuricaem', 'admin', 'guru', '2021-04-23 18:02:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_followers_guru`
--
ALTER TABLE `tbl_followers_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_item_pesanan`
--
ALTER TABLE `tbl_item_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kursus`
--
ALTER TABLE `tbl_kursus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tentor`
--
ALTER TABLE `tbl_tentor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_followers_guru`
--
ALTER TABLE `tbl_followers_guru`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_item_pesanan`
--
ALTER TABLE `tbl_item_pesanan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_kursus`
--
ALTER TABLE `tbl_kursus`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_tentor`
--
ALTER TABLE `tbl_tentor`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
