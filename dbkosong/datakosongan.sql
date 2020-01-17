-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17 Jan 2020 pada 04.44
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_siswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(30) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat_sekarang` varchar(100) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nokk` varchar(16) NOT NULL,
  `nikayah` varchar(16) NOT NULL,
  `nikibu` int(16) NOT NULL,
  `namaayah` varchar(50) NOT NULL,
  `namaibu` varchar(50) NOT NULL,
  `jumlahsaudara` int(3) NOT NULL,
  `anakke` int(2) NOT NULL,
  `npsn` int(8) NOT NULL,
  `namasdmi` varchar(50) NOT NULL,
  `nopstun` varchar(20) NOT NULL,
  `nilaiun` int(5) NOT NULL,
  `blankoij` varchar(30) NOT NULL,
  `blankoskh` varchar(30) NOT NULL,
  `walikelas` varchar(10) NOT NULL,
  `alasan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`ID`, `username`, `password`, `level`, `nim`, `nama`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `alamat_sekarang`, `no_telepon`, `email`, `kelas`, `nisn`, `nik`, `nokk`, `nikayah`, `nikibu`, `namaayah`, `namaibu`, `jumlahsaudara`, `anakke`, `npsn`, `namasdmi`, `nopstun`, `nilaiun`, `blankoij`, `blankoskh`, `walikelas`, `alasan`) VALUES
(7, 'bangnidd', 'd63b67a7773b5653d54c595e98c86ebf', 'admin', 'admin', 'M HASAN ULUMUDDIN', 'Laki-Laki', 'Banyumas', '1986-05-29', 'banyumas', '085227186724', 'kangulumuddin@gmail.com', 'admin', '', '', '', '', 0, '', '', 0, 0, 0, '', '', 0, '0', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1791;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
