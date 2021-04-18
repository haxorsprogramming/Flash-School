-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Apr 2021 pada 18.35
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bimbel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_kelas` varchar(10) NOT NULL,
  `id_login` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id`, `nip`, `nama`, `tempat`, `tgl_lahir`, `alamat`, `id_kelas`, `id_login`) VALUES
(1, '199001', 'Wahid', 'Pelaihari', '1997-03-02', 'Jl. A.Yani Km.6 Desa Panggung\r\n', '15', '88'),
(3, '199021892', 'Burhanuddin, M.Pd', 'Banjarbaru', '1990-12-12', 'Jl. Hasan Basri', '22', '99'),
(4, '199083727371', 'Budianto', 'Pelaihari', '1990-12-12', 'Jl. A.Yani', '26', '78');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` int(5) NOT NULL,
  `id_pendaftar` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pendaftar`
--

INSERT INTO `pendaftar` (`id`, `id_pendaftar`, `nama`) VALUES
(1, 'iis', 'iis'),
(2, 'admin@gmail.com', 'admin'),
(3, 'haikal', 'haikal'),
(4, 'iis', 'admin1'),
(5, 'admin2', 'admin2'),
(6, 'haikal', 'haikal'),
(7, 'nugi', 'nugi'),
(8, 'rokhmatul', 'iis'),
(9, 'iis rokhmatul', 'iis rokhmatul khasanah'),
(10, 'nugi', 'nugi'),
(11, 'suho', 'suho'),
(12, 'napis', 'Napis'),
(13, 'alwi', 'alwi'),
(14, 'lana', 'lana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `tempat` varchar(100) NOT NULL,
  `Nomor` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `paket` varchar(255) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tambah_guru`
--

CREATE TABLE `tambah_guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_krs` varchar(100) NOT NULL,
  `tempat_krs` varchar(100) NOT NULL,
  `mapel_krs` varchar(100) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `latar_belakang` text NOT NULL,
  `cv_krs` varchar(1000) NOT NULL,
  `no_tlp` int(11) NOT NULL,
  `prov` varchar(255) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kec` varchar(100) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tambah_guru`
--

INSERT INTO `tambah_guru` (`id`, `nama`, `jenis_krs`, `tempat_krs`, `mapel_krs`, `harga`, `latar_belakang`, `cv_krs`, `no_tlp`, `prov`, `kota`, `kec`, `gambar`) VALUES
(81, 'iis khasanah, S.Kom', 'dirumah, dilembaga', '', 'SMP', 'Rp. 250.000 sd 600.000', 'Metode pembelajaran saya adalah tatap muka, saya mengajarkan apa yang disekolah ajarkan secara detail, biasanya saya meminta siswa buku mtk yang dia punya untuk saya jelaskan dan saya beri latihan latihan soal dari apa yang saya jelaskan. Dan alhamdulilah siswa saya dapag menerimanya', '- Sekolah Dasar (SD)\r\n- Sekolah Menengah Pertama (SMP)\r\n- Sekolah Menengah Atas (SMA)\r\n- Diploma-3 (D3)\r\n- Sarjana \r\n', 897182717, 'JAWA TIMUR', 'KABUPATEN PASURUAN', 'BEJI', '607b0afe31784.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(5) NOT NULL,
  `username` varchar(355) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','siswa','guru') NOT NULL,
  `kode_pendaftar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `level`, `kode_pendaftar`) VALUES
(1, 'iis', '1234', 'siswa', 'iis'),
(2, 'admin', '1234', 'admin', 'admin@gmail.com'),
(3, 'haikal', '12345', 'siswa', 'haikal'),
(4, 'iis', '12345', 'siswa', 'iis'),
(14, 'lana', '123', 'guru', 'lana');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tambah_guru`
--
ALTER TABLE `tambah_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `tambah_guru`
--
ALTER TABLE `tambah_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
