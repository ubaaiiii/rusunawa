-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2020 at 07:39 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rusun`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `foto`, `no_telp`, `admin`) VALUES
(1, 'Admin Rusun 1', 'anugerahgustir@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '55490868_1007480052975131_2283922788920066048_n4.jpg', '085325115407', 1),
(2, 'Admin 2', 'timtam.rpl@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'foto.jpg', '085325115407', 1),
(3, 'Ubai', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'user1.png', '087877200523', 1);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `code_booking` int(10) DEFAULT NULL,
  `user_id` int(20) NOT NULL,
  `kamar_id` int(20) NOT NULL,
  `tanggal_booking` date NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `tanggal_lunas` date DEFAULT NULL,
  `jam` varchar(30) NOT NULL,
  `upload_bukti` text NOT NULL,
  `no_rek` varchar(40) NOT NULL,
  `keterangan` text NOT NULL,
  `satuan_pdam` varchar(50) DEFAULT NULL,
  `harga_pdam` varchar(50) DEFAULT NULL,
  `bukti_pdam` varchar(150) DEFAULT NULL,
  `tanggal_pdam` date DEFAULT NULL,
  `status_pdam` int(3) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `code_booking`, `user_id`, `kamar_id`, `tanggal_booking`, `tanggal_mulai`, `tanggal_selesai`, `tanggal_lunas`, `jam`, `upload_bukti`, `no_rek`, `keterangan`, `satuan_pdam`, `harga_pdam`, `bukti_pdam`, `tanggal_pdam`, `status_pdam`, `status`) VALUES
(1, 755988328, 1, 5, '2019-05-20', '2019-05-20', '2019-08-20', NULL, '18:30', 'WhatsApp_Image_2019-05-16_at_00_44_23.jpeg', '085325115407', '', '6', '30000', 'react_vue.jpg', '2019-05-20', 3, 1),
(2, 380770214, 6, 1, '2020-02-11', '2020-02-12', '2020-03-12', '2020-02-13', '23:55', 'e-cash-palsu.jpg', '123', '', NULL, NULL, NULL, NULL, 0, 4),
(3, 1072961200, 6, 1, '2020-02-13', '2020-02-12', '2020-03-12', '2020-02-13', '02:49:18', 'e-cash-palsu2.jpg', '34234234', '', NULL, NULL, NULL, NULL, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `foto` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `foto`, `deskripsi`) VALUES
(8, 'IMG_20170422_1454461.jpg', 'Halaman Depan Rusun'),
(9, 'IMG_20170422_1455503.jpg', 'Toilet'),
(10, 'IMG_20170422_1458001.jpg', 'Parkiran'),
(11, 'IMG-20170523-WA00083.jpg', 'Tangga Rusun'),
(12, 'IMG-20171104-WA00021.jpg', 'Kegiatan Senam Sehat'),
(13, 'IMG_20170422_1458321.jpg', 'Halaman Utama'),
(14, 'rusun15.jpg', 'Lingkungan Dalam');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `tingkat` int(11) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `gender` int(1) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id`, `code`, `tingkat`, `harga`, `gender`, `status`) VALUES
(1, 'A1', 1, '6000000', 1, 3),
(2, 'B2', 1, '600000', 1, 1),
(3, 'A3', 2, '550000', 2, 1),
(5, 'A5', 3, '500000', 1, 3),
(6, 'B6', 3, '500000', 2, 1),
(7, 'A7', 4, '450000', 1, 1),
(8, 'B8', 4, '450000', 2, 1),
(9, 'B8', 1, '1500000', 2, 1),
(10, 'A9', 4, '2000000', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `keuangan`
--

CREATE TABLE `keuangan` (
  `id` int(11) NOT NULL,
  `tanggal_confirm` date NOT NULL,
  `uang` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_booking` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan`
--

INSERT INTO `keuangan` (`id`, `tanggal_confirm`, `uang`, `deskripsi`, `id_booking`) VALUES
(1, '2019-05-20', '250000', 'Booking Kamar 50%', 1),
(3, '2019-05-20', '30000', 'Pembayaran PDAM  Liter', 1),
(4, '2020-02-11', '3000000', 'Booking Kamar 50%', 2),
(5, '2020-02-12', '3000000', 'Booking Kamar 50%', 3),
(6, '2020-02-13', '3000000', 'Pelunasan Kamar', 3),
(7, '2020-02-13', '3000000', 'Pelunasan Kamar', 2);

-- --------------------------------------------------------

--
-- Table structure for table `perpanjang`
--

CREATE TABLE `perpanjang` (
  `id` int(11) NOT NULL,
  `booking_id` int(40) NOT NULL,
  `tanggal` date NOT NULL,
  `biaya` varchar(90) NOT NULL,
  `bulan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perpanjang`
--

INSERT INTO `perpanjang` (`id`, `booking_id`, `tanggal`, `biaya`, `bulan`) VALUES
(1, 1, '2019-05-20', '1000000', '2');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id` int(11) NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bank` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id`, `no_rek`, `nama`, `bank`) VALUES
(2, '0983939392829', 'Mark Zukerberg', 'BNI'),
(3, '0809093049', 'Ilaham', 'BNI');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `logo` text NOT NULL,
  `satuan_pdam` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `nama`, `alamat`, `no_telp`, `email`, `deskripsi`, `logo`, `satuan_pdam`) VALUES
(1, 'Rusunawa BPJS', 'Rumah Susun Sewa BPJS Ketenagakerjaan Jalan Kedasih IV Blok P1, Mekarmukti, Cikarang Utara, Bekasi, Jawa Barat 17530', '02189834237', 'rusunawa@gmail.com', 'Rusun BPJS Ketenagakerjaan Cikarang adalah rumah susun sewa pertama di kawasan industri Jababeka, Cikarang, Bekasi, Jawa Barat. Rumah susun ini didirikan oleh PT Jaminan Sosial Tenaga Kerja (Jamsostek). menurut Direktur Utama PT Jamsostek Djunaidi, rusun memiliki 245 unit kamar berkapasitas 980 orang. Harga sewa per orang berkisar Rp 110 ribu hingga Rp 125 ribu per bulan.\r\n\r\n\r\nSatu kamar yang bisa ditempati empat orang memiliki fasilitas kamar mandi di dalam. Beberapa kamar telah ditempati sejumlah karyawan yang bekerja di sekitar lokasi rusun. Sejauh ini, PT Jamsostek telah membangun rusun di Jakarta dengan jumlah kamar mencapai 2.071 unit berkapasitas 7.516 orang. Rusun juga dibangun di kawasan Batam, Riau, dan Makassar, Sulawesi Selatan.', 'logo.jpg', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `gender` int(11) NOT NULL,
  `foto` text NOT NULL,
  `ktp` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `nama`, `email`, `password`, `no_telp`, `alamat`, `gender`, `foto`, `ktp`, `status`) VALUES
(1, '123123123', 'ahmad karim', 'timtam.rpl@gmail.compojan@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '085230516559', 'Jember', 1, 'ferguso1.png', 'image.png', 1),
(2, '090909', 'ahmad karim', 'timtam.rpl@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '05325115407', 'Jember', 1, 'user.png', 'ktp1.jpg', 1),
(3, '987987987897', 'Jim Geovdei', 'aba@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '085325115407', 'Jl.Berlian', 1, 'user.png', 'kt.jpg', 1),
(4, '928402984092384', 'Ahmad Karim', 'ahmad@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0853251154077', 'Jl.Raya Keting', 1, 'user.png', '52006045_120911035644266_3695607081835253419_n.jpg', 1),
(5, '567765567', 'Jim Geovdei', 'ahmad@gmail.com', '85136c79cbf9fe36bb9d05d0639c70c265c18d37', '456456', 'dfgdfg', 2, 'user.png', 'logo.png', 1),
(6, '2020010001', 'rizqi ubaidillah', 'emailnya.ubai@gmail.com', 'b54391cb2b1c07733f30710949766e45c902bd83', '087877200523', 'jalanin aja dulu', 1, 'ferguso1.png', 'ktp11.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perpanjang`
--
ALTER TABLE `perpanjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `perpanjang`
--
ALTER TABLE `perpanjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
