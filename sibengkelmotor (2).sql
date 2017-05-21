-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2017 at 10:18 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibengkelmotor`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `ID_Booking` int(11) NOT NULL,
  `ID_Konsumen` int(11) NOT NULL,
  `Waktu_Booking` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status_Pengerjaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`ID_Booking`, `ID_Konsumen`, `Waktu_Booking`, `Status_Pengerjaan`) VALUES
(1, 1, '2017-04-07 00:35:26', 2),
(2, 5, '2017-05-14 12:41:14', 3),
(3, 5, '2017-05-14 12:42:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_pegawai`
--

CREATE TABLE `jabatan_pegawai` (
  `ID_Jabatan` int(11) NOT NULL,
  `Nama_Jabatan` varchar(20) NOT NULL,
  `Gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_pegawai`
--

INSERT INTO `jabatan_pegawai` (`ID_Jabatan`, `Nama_Jabatan`, `Gaji`) VALUES
(1, 'manager', 10000),
(2, 'Montir', 5000000),
(3, 'Maintenance', 2000000),
(4, 'Cashier', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_transaksi`
--

CREATE TABLE `keranjang_transaksi` (
  `ID_Keranjang` int(11) NOT NULL,
  `Tipe_Transaksi` varchar(7) NOT NULL,
  `ID_Sparepart` int(11) DEFAULT NULL,
  `ID_Servis` int(11) DEFAULT NULL,
  `ID_Transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang_transaksi`
--

INSERT INTO `keranjang_transaksi` (`ID_Keranjang`, `Tipe_Transaksi`, `ID_Sparepart`, `ID_Servis`, `ID_Transaksi`) VALUES
(20, 'Servis', NULL, 1, 31),
(23, 'Beli', 3, NULL, 33),
(24, 'Servis', NULL, 1, 33),
(25, 'Servis', NULL, 1, 34),
(27, 'Beli', 12, NULL, 34),
(29, 'Beli', 3, NULL, 36),
(30, 'Servis', NULL, 1, 36),
(31, 'Beli', 3, NULL, 37),
(32, 'Beli', 9, NULL, 37),
(33, 'Beli', 2, NULL, 37),
(34, 'Servis', NULL, 1, 37),
(35, 'Beli', 3, NULL, 38),
(36, 'Servis', NULL, 1, 38),
(37, 'Beli', 11, NULL, 38),
(38, 'Servis', NULL, 1, 39),
(39, 'Beli', 3, NULL, 39);

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `ID_Konsultasi` int(11) NOT NULL,
  `ID_Konsumen` int(11) NOT NULL,
  `Judul` varchar(140) NOT NULL,
  `Deskripsi_Konsultasi` varchar(1000) NOT NULL,
  `Waktu_Buat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`ID_Konsultasi`, `ID_Konsumen`, `Judul`, `Deskripsi_Konsultasi`, `Waktu_Buat`) VALUES
(4, 5, 'Ban dalam bocor', 'Untuk ban dalam bocor perlu dibawa ke bengkel atau ke tambal ban pinggir jalan ya?', '2017-05-14 12:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `ID_Konsumen` int(11) NOT NULL,
  `Nama_Konsumen` varchar(30) NOT NULL,
  `No_Telp_Konsumen` varchar(14) NOT NULL,
  `Alamat_Konsumen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`ID_Konsumen`, `Nama_Konsumen`, `No_Telp_Konsumen`, `Alamat_Konsumen`) VALUES
(1, 'Artorias Mahmud', '08122239292', 'Keputih'),
(2, 'Aaron A Aaronson', '081331233321', 'Villa Melati Mas'),
(3, 'Boris Yeltsin', '08192930303', 'keputih'),
(4, 'Anindita Larasati', '08129394839', 'Apartment Educity'),
(5, 'Ario Bimbul', '08129392039', 'Kertajaya');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID_Login` int(11) NOT NULL,
  `ID_Pegawai` int(11) DEFAULT NULL,
  `ID_Pelanggan` int(11) DEFAULT NULL,
  `password` varchar(60) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `access_type` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID_Login`, `ID_Pegawai`, `ID_Pelanggan`, `password`, `remember_token`, `access_type`, `created_at`, `updated_at`) VALUES
(1, 2, NULL, '$2y$10$Yw9rdnZ6axNlE.FoYLoaE.p9LwnB4e0RYBzSRILXF5SdjRN8n0Q7y', 'yl8FpvQavkN3UjP0cm8XJgfpiHSc9O0KHrXrMJZeXGBh63rwiCFpWjgzzn9b', 'admin', '2017-05-21 08:01:25', '0000-00-00 00:00:00'),
(2, 4, NULL, '$2y$10$Yw9rdnZ6axNlE.FoYLoaE.p9LwnB4e0RYBzSRILXF5SdjRN8n0Q7y', 'Ek8zOZSn8soZzJ9A9CgWEG2zK05KxJppuKHsIjcTSKBFOiJ7R3mLgzghqxRt', 'pegawai', '2017-05-21 08:01:58', '2017-05-14 12:19:21'),
(3, NULL, 5, '$2y$10$FgRkUsbaaauecNJIxdTTh.2.0nahUKVuTKsVLUZcSkb/N2UQv9bAi', 'W0aXxsQ3jdgVxaaDg0mqQPeA04FXkxYrIGSnN4hZYCiGn0ZJpfp4AGHdR7Fy', 'pelanggan', '2017-05-14 20:00:53', '2017-05-14 12:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `ID_Pegawai` int(11) NOT NULL,
  `ID_Jabatan` int(11) NOT NULL,
  `Nama_Pegawai` varchar(30) NOT NULL,
  `Alamat_Pegawai` varchar(50) NOT NULL,
  `No_Telp_Pegawai` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`ID_Pegawai`, `ID_Jabatan`, `Nama_Pegawai`, `Alamat_Pegawai`, `No_Telp_Pegawai`) VALUES
(1, 1, 'Ario Bimo', 'Keputih', '08121034567'),
(2, 1, 'Muh Rifatullah', 'Keputih Gang Makam', '08263738292'),
(4, 2, 'Lazuardi Rahim Yamin', 'klampis timur', '08129394839');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `ID_Reply` int(11) NOT NULL,
  `ID_Konsultasi` int(11) NOT NULL,
  `ID_Konsumen` int(11) NOT NULL,
  `Isi_Balasan` varchar(200) NOT NULL,
  `Waktu_Balas` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`ID_Reply`, `ID_Konsultasi`, `ID_Konsumen`, `Isi_Balasan`, `Waktu_Balas`) VALUES
(5, 4, 9825000, 'Perlu dibawa ke bengkel apabila ada kerusakan di bagian velg', '2017-05-14 12:52:58');

-- --------------------------------------------------------

--
-- Table structure for table `servis`
--

CREATE TABLE `servis` (
  `ID_Servis` int(11) NOT NULL,
  `Deskripsi_Servis` varchar(100) NOT NULL,
  `Harga_Servis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servis`
--

INSERT INTO `servis` (`ID_Servis`, `Deskripsi_Servis`, `Harga_Servis`) VALUES
(1, 'Ganti sparepart', 100000),
(2, 'Cuci Kendaraan', 20000),
(3, 'Tuning', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `sparepart`
--

CREATE TABLE `sparepart` (
  `ID_Sparepart` int(11) NOT NULL,
  `Nama_Sparepart` varchar(25) NOT NULL,
  `Kendaraan_Sparepart` varchar(25) NOT NULL,
  `Harga_Sparepart` int(11) NOT NULL,
  `Stok_Sparepart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sparepart`
--

INSERT INTO `sparepart` (`ID_Sparepart`, `Nama_Sparepart`, `Kendaraan_Sparepart`, `Harga_Sparepart`, `Stok_Sparepart`) VALUES
(1, 'busi kampart', 'Yamaha Mayo', 200000, 500),
(2, 'Karburator', 'Yamaha mayo', 200000, 20),
(3, 'karburator', 'Honda RX7', 300000, 10),
(8, 'Knalpot Nobi', 'Yamaha RX King', 300000, 10),
(9, 'Rantai', 'yamaha mayo', 100000, 21),
(10, 'Aki Yuasa', 'yamaha mayo', 10000, 12),
(11, 'Kampas Rem', 'Honda Vario', 200000, 0),
(12, 'Lampu', 'Yamaha Mio', 100000, 10),
(13, 'busi', 'Honda Vario', 100000, 20);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_Transaksi` int(11) NOT NULL,
  `ID_Konsumen` int(11) NOT NULL,
  `ID_Pegawai` int(11) NOT NULL,
  `Total_Biaya` int(11) DEFAULT NULL,
  `Waktu_Transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`ID_Transaksi`, `ID_Konsumen`, `ID_Pegawai`, `Total_Biaya`, `Waktu_Transaksi`) VALUES
(31, 2, 1, 100000, '2017-04-08 21:40:18'),
(33, 1, 1, 400000, '2017-04-08 19:53:46'),
(34, 2, 1, 200000, '2017-04-08 20:08:10'),
(36, 3, 1, 400000, '2017-04-09 07:32:38'),
(37, 1, 1, 700000, '2017-04-09 07:34:11'),
(38, 3, 1, 600000, '2017-05-13 07:02:11'),
(39, 1, 1, 400000, '2017-05-14 19:47:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`ID_Booking`),
  ADD KEY `ID_Konsumen` (`ID_Konsumen`);

--
-- Indexes for table `jabatan_pegawai`
--
ALTER TABLE `jabatan_pegawai`
  ADD PRIMARY KEY (`ID_Jabatan`);

--
-- Indexes for table `keranjang_transaksi`
--
ALTER TABLE `keranjang_transaksi`
  ADD PRIMARY KEY (`ID_Keranjang`),
  ADD KEY `ID_Sparepart` (`ID_Sparepart`,`ID_Servis`,`ID_Transaksi`),
  ADD KEY `ID_Servis` (`ID_Servis`),
  ADD KEY `ID_Transaksi` (`ID_Transaksi`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`ID_Konsultasi`),
  ADD KEY `ID_Konsumen` (`ID_Konsumen`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`ID_Konsumen`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID_Login`),
  ADD KEY `ID_Pegawai` (`ID_Pegawai`),
  ADD KEY `ID_Pelanggan` (`ID_Pelanggan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`ID_Pegawai`),
  ADD KEY `ID_Jabatan` (`ID_Jabatan`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`ID_Reply`),
  ADD KEY `ID_Konsultasi` (`ID_Konsultasi`,`ID_Konsumen`),
  ADD KEY `ID_Konsumen` (`ID_Konsumen`);

--
-- Indexes for table `servis`
--
ALTER TABLE `servis`
  ADD PRIMARY KEY (`ID_Servis`);

--
-- Indexes for table `sparepart`
--
ALTER TABLE `sparepart`
  ADD PRIMARY KEY (`ID_Sparepart`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_Transaksi`),
  ADD KEY `ID_Konsumen` (`ID_Konsumen`,`ID_Pegawai`),
  ADD KEY `ID_Pegawai` (`ID_Pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `ID_Booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jabatan_pegawai`
--
ALTER TABLE `jabatan_pegawai`
  MODIFY `ID_Jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `keranjang_transaksi`
--
ALTER TABLE `keranjang_transaksi`
  MODIFY `ID_Keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `ID_Konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `ID_Konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID_Login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `ID_Pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `ID_Reply` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
  MODIFY `ID_Servis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `ID_Sparepart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID_Transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`ID_Konsumen`) REFERENCES `konsumen` (`ID_Konsumen`) ON DELETE CASCADE;

--
-- Constraints for table `keranjang_transaksi`
--
ALTER TABLE `keranjang_transaksi`
  ADD CONSTRAINT `keranjang_transaksi_ibfk_1` FOREIGN KEY (`ID_Servis`) REFERENCES `servis` (`ID_Servis`) ON DELETE CASCADE,
  ADD CONSTRAINT `keranjang_transaksi_ibfk_2` FOREIGN KEY (`ID_Sparepart`) REFERENCES `sparepart` (`ID_Sparepart`) ON DELETE CASCADE,
  ADD CONSTRAINT `keranjang_transaksi_ibfk_3` FOREIGN KEY (`ID_Transaksi`) REFERENCES `transaksi` (`ID_Transaksi`) ON DELETE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`ID_Pelanggan`) REFERENCES `konsumen` (`ID_Konsumen`) ON DELETE CASCADE,
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`ID_Pegawai`) REFERENCES `pegawai` (`ID_Pegawai`) ON DELETE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`ID_Jabatan`) REFERENCES `jabatan_pegawai` (`ID_Jabatan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`ID_Konsultasi`) REFERENCES `konsultasi` (`ID_Konsultasi`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`ID_Konsumen`) REFERENCES `konsumen` (`ID_Konsumen`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`ID_Pegawai`) REFERENCES `pegawai` (`ID_Pegawai`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
