-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2018 at 07:44 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kususon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `pass` varchar(500) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(40) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`, `nama`, `jabatan`, `foto`) VALUES
(20, 'alexandromeo123@gmail.com', 'ZAwrO6KP67c=', 'admin', 'Trainer', ''),
(19, 'alexandromeo@makinrajin.com', 'yzPhU3FFWOs1Mxrq/FaUHg==', 'Makinrajin', 'Master', '1515505159Lighthouse.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint(99) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `foto` varchar(99) NOT NULL,
  `stok` varchar(99) NOT NULL,
  `harga` int(50) NOT NULL,
  `kondisi` varchar(99) NOT NULL,
  `deskripsi` text NOT NULL,
  `berat` varchar(99) NOT NULL,
  `kategori` varchar(99) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `foto`, `stok`, `harga`, `kondisi`, `deskripsi`, `berat`, `kategori`, `email`) VALUES
(16, 'The Master of 3', '15110649291. The Master Of 3.jpg', '20', 80000, '1', 'Buku ini membahas tentang 3 Open Source CMS terbesar di dunia, yaitu Joomla, Wordpress, AuraCMS. Buku ini sangat cocok untuk para pemula yang ingin belajar seluk beluk CMS', '700', 'Pemrograman', 'alexandromeo@makinrajin.com'),
(17, '60 Freeware Terbaik', '15111864042. 60 Freeware Terbaik.jpg', '100', 20000, '1', 'Desc baru', '455', 'Komputer Umum', 'alexandromeo@makinrajin.com'),
(18, 'Jurus Terbaik Menyelamatkan Data', '15110652043. Jurus Terbaik Menyelamatkan Data.jpg', '300', 45000, '', 'Data Anda sering dirusak orang ? Sering hilang ? Tak perlu khawatir. Di buku ini sudah dibahas tentang jurus ampuh untuk menyelamatkan data-data komputer Anda.', '400', 'Komputer Umum', 'alexandromeo@makinrajin.com'),
(20, 'Belajar', '15154673127. Ramuan Sakti Pemusnah Virus.jpg', '10', 80000, '1', 'ini deskriptis', '750', 'Intrnet', 'alexandromeo@makinrajin.com');

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(80) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `idkonten` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `nama`, `email`, `website`, `komentar`, `tanggal`, `idkonten`) VALUES
(1, '', 'alexandromeo@makinrajin.com', '', '', '15 Dec 2017', 52),
(2, '', 'alexandromeo@makinrajin.com', '', '', '15 Dec 2017', 52),
(3, 'Alexandromeo', 'alexandromeo@makinrajin.com', 'https://makinrajin.com', 'Wah mantap sekali belajar CSS di sini', '20 Dec 2017', 69),
(4, 'saya', 'aa@gmail.com', '', 'omenter', '03 Jan 2018', 70),
(5, 'Anang', 'alexandromeo@makinrajin.com', 'anangwaelah.com', 'Benar benar bagus pembahasannya mas. Saya tunggu konten selanjutnya ya', '30 Jan 2018', 69);

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id` int(20) NOT NULL,
  `judul` varchar(70) NOT NULL,
  `gambar` varchar(40) NOT NULL,
  `pembuat` varchar(50) NOT NULL,
  `bahasa` varchar(30) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `modul` varchar(80) NOT NULL,
  `bayar` int(5) NOT NULL,
  `isi` text NOT NULL,
  `penerbit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id`, `judul`, `gambar`, `pembuat`, `bahasa`, `kategori`, `modul`, `bayar`, `isi`, `penerbit`) VALUES
(68, 'Belajar DBMS', '1513653770pexels-photo-490411.jpeg', 'Alexan', 'SQL', 'Modul', '1513653770Rangkuman DBMS.pdf', 0, '', 'Alexan'),
(69, 'Belajar CSS Untuk Pemula', '1513743161Tulips.jpg', 'Alexan', 'CSS', 'Artikel', '0', 0, '', 'Alexan'),
(71, 'Sinau JavaScript : From Zero to A Hero', '1517056326Chrysanthemum.jpg', 'Alexan', 'Javascript', 'Artikel', '0', 0, 'Belajar Javascript bersama yuk', 'Makinrajin'),
(72, 'Belajar Membuat Website', '1517056337Penguins.jpg', 'Makinrajin', 'PHP', 'Artikel', '0', 0, 'Belajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang BaikBelajar Membuat Website: 8 Cara Belajar Membuat Website yang Baik', 'Makinrajin');

-- --------------------------------------------------------

--
-- Table structure for table `memberbayar`
--

CREATE TABLE `memberbayar` (
  `id` int(60) NOT NULL,
  `username` varchar(99) NOT NULL,
  `password` varchar(99) NOT NULL,
  `email` varchar(50) NOT NULL,
  `bayar` varchar(99) NOT NULL,
  `mulai` varchar(20) NOT NULL,
  `akhir` varchar(20) NOT NULL,
  `biaya` int(15) NOT NULL,
  `foto` varchar(99) NOT NULL,
  `online` int(1) NOT NULL,
  `utm` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `memberbayar`
--

INSERT INTO `memberbayar` (`id`, `username`, `password`, `email`, `bayar`, `mulai`, `akhir`, `biaya`, `foto`, `online`, `utm`) VALUES
(1, 'makinrajin', 'yzPhU3FFWOs1Mxrq/FaUHg==', 'alexandromeo@makinrajin.com', '1', '2018 01 09', '2018 2 8', 99651, '1515505243Chrysanthemum.jpg', 0, 'menu'),
(3, 'utm', 'yzPhU3FFWOs1Mxrq/FaUHg==', 'utm@gmail.com', '0', '0', '0', 99285, '', 0, '404'),
(4, 'asasasas', 'yzPhU3FFWOs1Mxrq/FaUHg==', 'aaaaa@gmail.com', '0', '0', '0', 99767, '', 0, '404'),
(5, 'asasasas', 'yzPhU3FFWOs1Mxrq/FaUHg==', 'a@gmail.com', '1', '2018 01 16', '2018 2 15', 99616, '', 0, 'menu'),
(7, 'baru', 'yzPhU3FFWOs1Mxrq/FaUHg==', 'coba@gmail.com', '1', '2018 01 25', '2018 2 24', 79200, '', 0, 'menu'),
(8, 'Awalkj', 'FZpn7AGHk2FzuGKIdeG5Rg==', 'awddss@yahoo.com', '1', '2018 01 14', '2018 2 13', 99790, '', 0, 'perpanjang'),
(9, 'Maulana Khasan', 'u7NEx4yzLmJw7/MvOd6tCA==', 'someone@example.com', '1', '2018 01 16', '2018 2 15', 99748, '1516086445p11770987_p_v8_ab.jpg', 0, 'menu'),
(12, 'aksmaksmaksm', 'yzPhU3FFWOs1Mxrq/FaUHg==', 'alexandromeo123@makinrajin.com', '0', '', '', 99396, '', 0, 'menu'),
(13, 'makinrajin', 'yzPhU3FFWOs1Mxrq/FaUHg==', 'alexandromeo123@gmail.com', '0', '', '', 99149, '', 0, 'menu'),
(14, 'asa', 'DkaAcn6vJgg=', 'cobacoba@gmail.com', '0', '', '', 99421, '', 0, 'menu'),
(15, 'makinrajin', 'yzPhU3FFWOs1Mxrq/FaUHg==', 'makin@gmail.com', '0', '', '', 99248, '', 0, 'form'),
(16, 'Fitria Putri Fisabilla', '9vwVpK8WdTo=', 'putriifisabilla@gmail.com', '1', '2018 02 16', '2018 3 18', 99489, '', 0, 'index');

-- --------------------------------------------------------

--
-- Table structure for table `membergratis`
--

CREATE TABLE `membergratis` (
  `id` int(60) NOT NULL,
  `username` varchar(99) NOT NULL,
  `password` varchar(99) NOT NULL,
  `email` varchar(60) NOT NULL,
  `foto` varchar(99) NOT NULL,
  `online` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membergratis`
--

INSERT INTO `membergratis` (`id`, `username`, `password`, `email`, `foto`, `online`) VALUES
(1, 'makinrajin', 'yzPhU3FFWOs1Mxrq/FaUHg==', 'alexandromeo@makinrajin.com', '', 1),
(2, 'asasasasas', 'yzPhU3FFWOs1Mxrq/FaUHg==', 'aa@gmail.com', '', 0),
(3, 'andri', 'Bla+I8NB6egtRu5m/Z3H8g==', 'andriyuliantoro81@gmail.com', '', 0),
(4, 'anang123', 'Ua+71S6Ym9I2hlrVdWnhLw==', 'anangpriyambodho61@gmail.com', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE `pembeli` (
  `email` varchar(80) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(35) NOT NULL,
  `hp` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`email`, `nama`, `alamat`, `kecamatan`, `kota`, `provinsi`, `hp`, `id`, `idbarang`) VALUES
('alexandromeo@makinrajin.com', 'Saya', 'makinrajin', 'makinrajin', 'makinrajin', 'makinrajin', '083807077896', 4, 17),
('alexandromeo@makinrajin.com', 'ASJAJSH', 'SAJHAJSH', 'JHSAJSHJH', 'JASHJAHSJH', 'JHSAJS', '098823784', 9, 16),
('alexandromeo@makinrajin.com', 'Al', 'Al', 'Al', 'makinrajin', 'makinrajin', '088303781389', 11, 16),
('alexandromeo@makinrajin.com', 'new', 'new', 'new', 'new', 'new', '01291029120', 12, 17),
('alexandromeo@makinrajin.com', 'Alexandromeo Lawrence Gunawan', 'Jl. Kyai Muntang no. 2', 'Wonosobo', 'Wonosobo', 'Jawa Tengah', '083807077896', 13, 17),
('alexandromeo@makinrajin.com', 'newest', 'newest', 'newest', 'newest', 'newest', '2938293237', 14, 18),
('alexandromeo@makinrajin.com', 'Alexandromeo Lawrence Gunawan', 'Jln. Kyai Muntang no 2', 'Wonosobo', 'Wonosobo', 'Jawa Tengah', '083807077896', 15, 18),
('anangpriyambodho61@gmail.com', 'Anang Priyambodho', 'Jalan Semayu no.12, Semayu, Selomerto, Wonosobo, Jawa Tengah, Indonesia', 'Selomerto', 'Kabupaten Wonosobo', 'Jawa Tengah', '088216473712', 16, 18),
('alexandromeo@makinrajin.com', 'jskbdhj', 'BQHJDSBHJ', 'bshasdbhj', 'bhasbdhj', 'bwsdabdh', '823728', 17, 17);

-- --------------------------------------------------------

--
-- Table structure for table `penarikan`
--

CREATE TABLE `penarikan` (
  `id` int(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `rekening` int(30) NOT NULL,
  `bank` varchar(35) NOT NULL,
  `cabang` varchar(35) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `nominal` int(30) NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `persetujuan` int(1) NOT NULL,
  `pengirim` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penarikan`
--

INSERT INTO `penarikan` (`id`, `email`, `rekening`, `bank`, `cabang`, `nama`, `nominal`, `tanggal`, `persetujuan`, `pengirim`) VALUES
(10, 'alexandromeo@makinrajin.com', 2147483647, 'Mandiri', 'Wonosobo', 'Alexandromeo Lawrence Gunawan', 2928000, '22 01 2018', 2, 'alexandromeo@makinrajin.com'),
(11, 'alexandromeo@makinrajin.com', 1281720821, 'BCA', 'Wonosobo', 'Alexandromeo', 1464000, '26 01 2018', 0, 'null');

-- --------------------------------------------------------

--
-- Table structure for table `pesananbarang`
--

CREATE TABLE `pesananbarang` (
  `id` int(30) NOT NULL,
  `tagihan` varchar(50) NOT NULL,
  `biaya` int(40) NOT NULL,
  `jasaongkir` varchar(40) NOT NULL,
  `status` int(1) NOT NULL,
  `jumlah` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesananbarang`
--

INSERT INTO `pesananbarang` (`id`, `tagihan`, `biaya`, `jasaongkir`, `status`, `jumlah`) VALUES
(4, '3931373334343833', 77500, 'Pos Indonesia', 1, 3),
(11, '3338393539343138', 1464000, 'JNE', 1, 18),
(12, '3236323238383431', 60000, 'TIKI', 1, 2),
(13, '35343837303631', 60000, 'TIKI', 1, 2),
(14, '3230363837383637', 107500, 'Pos Indonesia', 0, 2),
(15, '3936343038303831', 114000, 'JNE', 0, 2),
(16, '3236363639333132', 65000, 'TIKI', 1, 1),
(17, '33343633373436', 40000, 'TIKI', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `strukmember`
--

CREATE TABLE `strukmember` (
  `id` int(30) NOT NULL,
  `idmember` int(20) NOT NULL,
  `foto` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strukmember`
--

INSERT INTO `strukmember` (`id`, `idmember`, `foto`) VALUES
(17, 4, '1513132151Koala.jpg'),
(18, 1, '1513997539Chrysanthemum.jpg'),
(19, 5, '1514953653404.jpg'),
(22, 8, '1515462176404.jpg'),
(23, 9, '1516085836p11770987_p_v8_ab.jpg'),
(24, 7, '1516886716Koala.jpg'),
(25, 13, '1517056277Chrysanthemum.jpg'),
(26, 16, '1518761959Desert.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id` int(60) NOT NULL,
  `email` varchar(70) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `alamat` varchar(99) NOT NULL,
  `kota` varchar(40) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `foto` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id`, `email`, `nama`, `alamat`, `kota`, `provinsi`, `foto`) VALUES
(14, 'makinrajin@gmail.com', 'aku', 'aku', 'aku', 'akkak', 'Desert.jpg'),
(20, 'alexandromeo@makinrajin.com', 'Toko Baru', 'Jl. Kyai Muntang no. 2', 'Wonosobo', 'Jawa Tengah', '1511064161Untitled.png'),
(21, 'alexandromeo123@gmail.com', 'Toko Saya', 'Jln. in aja', 'Wonosobo', 'Jawa Tengah', 'makinrajinn.png'),
(22, 'awddss@yahoo.com', 'asdas', 'asasdasdasdasdasdasdasdsadsa', 'asadasdasd', 'asdasdasdas', '1515462830404.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksibarang`
--

CREATE TABLE `transaksibarang` (
  `id` int(50) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `idpembeli` int(11) NOT NULL,
  `idbarang` int(40) NOT NULL,
  `struk` varchar(80) NOT NULL,
  `dikirim` int(1) NOT NULL,
  `resi` varchar(20) NOT NULL,
  `berhasil` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksibarang`
--

INSERT INTO `transaksibarang` (`id`, `invoice`, `idpembeli`, `idbarang`, `struk`, `dikirim`, `resi`, `berhasil`) VALUES
(1, '3931373334343833', 4, 17, '1514124461Desert.jpg', 1, 'JNAO672SJBS9237', 1),
(2, '3338393539343138', 11, 16, '15155040191. The Master Of 3.jpg', 1, '7623HGDSOU', 1),
(3, '35343837303631', 13, 17, '1515676831Lighthouse.jpg', 0, '', 0),
(9, '3236323238383431', 12, 17, '1515677729Lighthouse.jpg', 1, 'HG87623IQWY', 1),
(10, '3236363639333132', 16, 18, '1518762541Chrysanthemum.jpg', 1, 'wsye2hr8', 1),
(11, '33343633373436', 17, 17, '1518763196Chrysanthemum.jpg', 1, '7t6g', 1);

-- --------------------------------------------------------

--
-- Table structure for table `virtualmoney`
--

CREATE TABLE `virtualmoney` (
  `email` varchar(80) NOT NULL,
  `uang` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `virtualmoney`
--

INSERT INTO `virtualmoney` (`email`, `uang`) VALUES
('alexandromeo@makinrajin.com', 2928000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberbayar`
--
ALTER TABLE `memberbayar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_3` (`email`),
  ADD KEY `email` (`email`),
  ADD KEY `email_2` (`email`);

--
-- Indexes for table `membergratis`
--
ALTER TABLE `membergratis`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pembeli`
--
ALTER TABLE `pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penarikan`
--
ALTER TABLE `penarikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesananbarang`
--
ALTER TABLE `pesananbarang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tagihan` (`tagihan`);

--
-- Indexes for table `strukmember`
--
ALTER TABLE `strukmember`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idmember` (`idmember`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `toko` (`nama`);

--
-- Indexes for table `transaksibarang`
--
ALTER TABLE `transaksibarang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `invoice` (`invoice`);

--
-- Indexes for table `virtualmoney`
--
ALTER TABLE `virtualmoney`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `memberbayar`
--
ALTER TABLE `memberbayar`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `membergratis`
--
ALTER TABLE `membergratis`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pembeli`
--
ALTER TABLE `pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `penarikan`
--
ALTER TABLE `penarikan`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pesananbarang`
--
ALTER TABLE `pesananbarang`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `strukmember`
--
ALTER TABLE `strukmember`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `transaksibarang`
--
ALTER TABLE `transaksibarang`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
