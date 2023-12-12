-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 08:31 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts`
--

-- --------------------------------------------------------

--
-- Table structure for table `data bidang`
--

CREATE TABLE `data bidang` (
  `id_komentar` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `isi_komentar` varchar(100) NOT NULL,
  `id_berita` tinytext NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `tampil` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data bidang`
--

INSERT INTO `data bidang` (`id_komentar`, `nama_lengkap`, `isi_komentar`, `id_berita`, `tanggal`, `jam`, `tampil`) VALUES
(0, 'arga', 'bidang dreinase', '35', '2017-03-29', '08:11:00', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_berita` int(11) NOT NULL,
  `capaian` varchar(10000) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `create_by` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_berita`, `capaian`, `kategori`, `keterangan`, `image`, `created_at`, `username`, `create_by`) VALUES
(196, 'terlaksana', '', 'perbaikan jalan desa wongsorejo', '12373666446_.png', '2022-08-02', 'arga', '25');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan user`
--

CREATE TABLE `kegiatan user` (
  `id_berita` int(11) NOT NULL,
  `capaian` varchar(10000) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `create_by` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan user`
--

INSERT INTO `kegiatan user` (`id_berita`, `capaian`, `kategori`, `keterangan`, `image`, `created_at`, `username`, `create_by`) VALUES
(196, 'proses pengerjaan', 'perbaikan jalan', 'masih proses pengajuan', 'www.png', '2023-09-10', 'admin', '23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `kategori` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `kategori`) VALUES
(1, 'admin', 'admin', 'admin', 'bidang dreinase');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data bidang`
--
ALTER TABLE `data bidang`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
