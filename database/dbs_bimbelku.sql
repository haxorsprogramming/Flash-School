-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2021 at 12:13 AM
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
(7, 'yuricaem', 'Yuri Maulida Putri', '7899112', 'Medan', '2021-04-16', 'Medan', 'Siyap cantik', '087856112311'),
(8, 'alfuaniputri', 'Alfuani Putri Hasibuan', '-', '-', '-', '-', '-', '-');

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
(82, '8050927476', '1', '3khst2zwyb', '0'),
(83, '8050927476', '12', '3khst2zwyb', '0'),
(84, '8050927476', '23', '3khst2zwyb', '0');

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
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id` int(5) NOT NULL,
  `kd_paket` varchar(111) NOT NULL,
  `nama_paket` varchar(111) NOT NULL,
  `keterangan` text NOT NULL,
  `jenjang` varchar(111) NOT NULL,
  `pertemuan` int(3) NOT NULL,
  `harga` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`id`, `kd_paket`, `nama_paket`, `keterangan`, `jenjang`, `pertemuan`, `harga`) VALUES
(2, 'r93pxvs75m', 'Normal SD', 'Jenis paket normal', 'sd', 8, 20000),
(3, 'c1pbqjmnv6', 'Normal SMP', 'Jenis paket normal smp', 'smp', 12, 30000),
(4, 'iz3og6swbc', 'Normal SMA', 'Jenis paket normal untuk sma', 'sma', 8, 40000),
(5, '8a2og9m3u1', 'Intensif SD', 'Jenis paket intensif untuk sd', 'sd', 12, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesanan`
--

CREATE TABLE `tbl_pemesanan` (
  `id` int(7) NOT NULL,
  `kd_pemesanan` varchar(111) NOT NULL,
  `kd_tentor` varchar(111) NOT NULL,
  `kd_siswa` varchar(50) NOT NULL,
  `kd_paket` varchar(111) NOT NULL,
  `waktu_pemesanan` datetime NOT NULL,
  `waktu_konfirmasi_bayar` datetime NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL,
  `status_mentoring` varchar(222) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pemesanan`
--

INSERT INTO `tbl_pemesanan` (`id`, `kd_pemesanan`, `kd_tentor`, `kd_siswa`, `kd_paket`, `waktu_pemesanan`, `waktu_konfirmasi_bayar`, `status_pembayaran`, `status_mentoring`) VALUES
(17, '8050927476', '3khst2zwyb', 'ahmadfauzan', 'c1pbqjmnv6', '2021-05-17 19:46:10', '0000-00-00 00:00:00', 'sukses', 'selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registrasi_siswa`
--

CREATE TABLE `tbl_registrasi_siswa` (
  `id` int(5) NOT NULL,
  `kd_registrasi` varchar(22) NOT NULL,
  `username` varchar(222) NOT NULL,
  `waktu_registrasi` datetime NOT NULL,
  `status_pembayaran` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_registrasi_siswa`
--

INSERT INTO `tbl_registrasi_siswa` (`id`, `kd_registrasi`, `username`, `waktu_registrasi`, `status_pembayaran`) VALUES
(1, 'fviotjknqd', 'amalia_ibdahni', '2021-05-07 10:12:35', 'pending'),
(2, 'ebjikavqxc', 'rigenrakelna', '2021-05-11 06:25:33', 'pending'),
(3, 'jkfenotdzv', 'lailatulhasanah', '2021-05-11 09:07:06', 'sukses'),
(4, 'dnelfgjvzw', 'alfafuani', '2021-05-11 09:10:02', 'pending'),
(5, 'xmogtzjlke', 'ahmadfauzan', '2021-05-11 09:18:02', 'sukses');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting_bimbel`
--

CREATE TABLE `tbl_setting_bimbel` (
  `id` int(5) NOT NULL,
  `kd_setting` varchar(200) NOT NULL,
  `nama_setting` varchar(200) NOT NULL,
  `nilai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_setting_bimbel`
--

INSERT INTO `tbl_setting_bimbel` (`id`, `kd_setting`, `nama_setting`, `nilai`) VALUES
(1, 'NAMA_BIMBEL', 'Nama bimbingan belajar', 'Flash School'),
(2, 'BIAYA_REGISTRASI', 'Biaya registrasi', '50000'),
(3, 'ALAMAT', 'Alamat bimbel', 'Jln. Keluarga, No. 15, Kabupaten Deli Serdang, Provinsi Sumatera Utara'),
(4, 'NOMOR_HANDPHONE', 'Nomor handphone kontak bimbel', '087812782211'),
(5, 'EMAIL', 'Alamat email kontak bimbel', 'flash.school@gmail.com'),
(6, 'REKENING', 'Nomor rekening bimbel', '2190-2221-222901 BCA an Flash School Media');

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
(5, 'hamidahkurnia', 'Hamidah Kurnia Putri', '0000-00-00', '-', '-', '-'),
(6, 'amalia_ibdahni', 'Amalia Ibdahni', '0000-00-00', '-', '-', '-'),
(7, 'rigenrakelna', 'Rigen Rakelna', '0000-00-00', '-', '-', '-'),
(8, 'lailatulhasanah', 'Lailatul Hasanah', '0000-00-00', '-', '-', '-'),
(9, 'alfafuani', 'Alfa Fuani', '0000-00-00', '-', '-', '-'),
(10, 'ahmadfauzan', 'Ahmad Fauuzan', '2021-05-15', 'Perbaungan', '-', '087822782212');

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
  `latar_belakang` text NOT NULL,
  `daerah_layanan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tentor`
--

INSERT INTO `tbl_tentor` (`id`, `username`, `kd_tentor`, `tempat`, `kd_kursus`, `latar_belakang`, `daerah_layanan`) VALUES
(1, 'guru1', 'szj148nol3', 'tempat_bimbel', '18', '', 'Lubuk Pakam, Deli Serdang Regency, North Sumatra, Indonesia'),
(2, 'guru2', '9xhcf5uqjl', 'rumah', '115', 'Kita semua dalam keadaan Stress saat ini.. Tak bisa di pungkiri.. I hope this jokes will release some... Love u all.', 'Pematang Siantar, Pematang Siantar City, North Sumatra, Indonesia'),
(3, 'alfananinda', '3khst2zwyb', 'rumah', '18', 'Ni orang sebenernya punya kepribadian yg bagus, sebisa mungkin berusaha ngejelasin.. Toh klo ngerasa salah gak sungkan minta maaf', 'Lubuk Pakam, Deli Serdang Regency, North Sumatra, Indonesia'),
(4, 'dwicitrautami', 'jhndz81o3p', 'tempat_bimbel', '18', 'Saya akan berusaha sebaik mungkin dalam mengajar, terima kasih', 'Lubuk Pakam, Deli Serdang Regency, North Sumatra, Indonesia'),
(5, 'dwicitrautami', 'yj5ir9hlg4', 'rumah', '862', 'Saya suka mengajar matematika', 'Lubuk Pakam, Deli Serdang Regency, North Sumatra, Indonesia'),
(7, 'alfuaniputri', 'kipsx8o15g', 'rumah', '115', 'Saya guru bahasa inggris juga loh', 'Lubuk Pakam, Deli Serdang Regency, North Sumatra, Indonesia');

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
(8, 'admin', 'admin', 'admin', '2021-05-20 00:13:10'),
(13, 'guru1', 'admin', 'guru', '2021-04-23 10:31:08'),
(14, 'guru2', 'admin', 'guru', '2021-04-23 10:30:55'),
(15, 'siswa1', 'admin', 'siswa', '2021-04-23 12:53:07'),
(16, 'alfananinda', 'admin', 'guru', '2021-05-19 23:59:38'),
(18, 'hasnah', 'admin', 'guru', '2021-04-22 07:08:44'),
(19, 'faridahasanah', 'admin', 'siswa', '2021-04-23 11:15:17'),
(20, 'irapermata', 'admin', 'siswa', '2021-04-23 18:00:52'),
(21, 'hamidahkurnia', 'admin', 'siswa', '2021-04-23 17:54:36'),
(22, 'dwicitrautami', 'admin', 'guru', '2021-04-23 17:57:16'),
(23, 'yuricaem', 'admin', 'guru', '2021-04-23 18:02:23'),
(24, 'amalia_ibdahni', 'admin', 'siswa', '2021-05-07 10:13:31'),
(25, 'rigenrakelna', 'admin', 'siswa', '2021-05-11 06:25:33'),
(26, 'alfuaniputri', 'admin', 'guru', '2021-05-19 23:49:46'),
(27, 'lailatulhasanah', 'admin', 'siswa', '2021-05-11 09:07:06'),
(28, 'alfafuani', 'admin', 'siswa', '2021-05-11 09:10:02'),
(29, 'ahmadfauzan', 'admin', 'siswa', '2021-05-19 23:56:13');

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
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_registrasi_siswa`
--
ALTER TABLE `tbl_registrasi_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_setting_bimbel`
--
ALTER TABLE `tbl_setting_bimbel`
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
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_item_pesanan`
--
ALTER TABLE `tbl_item_pesanan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `tbl_kursus`
--
ALTER TABLE `tbl_kursus`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pemesanan`
--
ALTER TABLE `tbl_pemesanan`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_registrasi_siswa`
--
ALTER TABLE `tbl_registrasi_siswa`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_setting_bimbel`
--
ALTER TABLE `tbl_setting_bimbel`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_tentor`
--
ALTER TABLE `tbl_tentor`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
