-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Apr 2017 pada 19.01
-- Versi Server: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sibengkel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `ID_Booking` int(11) NOT NULL,
  `ID_Konsumen` int(11) NOT NULL,
  `Waktu_Booking` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status_Pengerjaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`ID_Booking`, `ID_Konsumen`, `Waktu_Booking`, `Status_Pengerjaan`) VALUES
(2, 9825000, '2017-03-26 07:52:03', 1),
(4, 9825000, '2017-03-26 07:58:10', 1),
(5, 9825000, '2017-03-26 08:37:23', 3),
(6, 9825000, '2017-03-29 18:55:06', 1),
(7, 9825000, '2017-03-30 19:48:16', 1),
(8, 9825001, '2017-04-16 05:50:36', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan_pegawai`
--

CREATE TABLE `jabatan_pegawai` (
  `ID_Jabatan` int(11) NOT NULL,
  `Nama_Jabatan` varchar(20) NOT NULL,
  `Gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan_pegawai`
--

INSERT INTO `jabatan_pegawai` (`ID_Jabatan`, `Nama_Jabatan`, `Gaji`) VALUES
(1, 'manager', 10000),
(2, 'montir', 123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_transaksi`
--

CREATE TABLE `keranjang_transaksi` (
  `ID_Keranjang` int(11) NOT NULL,
  `Tipe_Transaksi` varchar(7) NOT NULL,
  `ID_Sparepart` int(11) DEFAULT NULL,
  `ID_Servis` int(11) DEFAULT NULL,
  `ID_Transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE `konsultasi` (
  `ID_Konsultasi` int(11) NOT NULL,
  `Judul` varchar(140) NOT NULL,
  `Deskripsi_Konsultasi` varchar(1000) NOT NULL,
  `Waktu_Buat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsumen`
--

CREATE TABLE `konsumen` (
  `ID_Konsumen` int(11) NOT NULL,
  `Nama_Konsumen` varchar(30) NOT NULL,
  `No_Telp_Konsumen` varchar(14) NOT NULL,
  `Alamat_Konsumen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konsumen`
--

INSERT INTO `konsumen` (`ID_Konsumen`, `Nama_Konsumen`, `No_Telp_Konsumen`, `Alamat_Konsumen`) VALUES
(9825000, 'tes', '124124', 'surabaya'),
(9825001, 'sfdfds', '123123', 'acaca'),
(9825002, 'om', '090898', 'surabaya kota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `ID_Login` int(11) NOT NULL,
  `ID_Pegawai` int(11) DEFAULT NULL,
  `ID_Pelanggan` int(11) DEFAULT NULL,
  `Password` varchar(60) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `access_type` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `ID_Pegawai` int(11) NOT NULL,
  `ID_Jabatan` int(11) NOT NULL,
  `Nama_Pegawai` varchar(30) NOT NULL,
  `Alamat_Pegawai` varchar(50) NOT NULL,
  `No_Telp_Pegawai` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`ID_Pegawai`, `ID_Jabatan`, `Nama_Pegawai`, `Alamat_Pegawai`, `No_Telp_Pegawai`) VALUES
(1, 1, 'ehehhh', 'uhuy', '123'),
(2, 1, 'qweqw', 'wqeqw', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reply`
--

CREATE TABLE `reply` (
  `ID_Reply` int(11) NOT NULL,
  `ID_Konsultasi` int(11) NOT NULL,
  `ID_Konsumen` int(11) NOT NULL,
  `Isi_Balasan` varchar(200) NOT NULL,
  `Waktu_Balas` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `servis`
--

CREATE TABLE `servis` (
  `ID_Servis` int(11) NOT NULL,
  `Deskripsi_Servis` varchar(100) NOT NULL,
  `Harga_Servis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `servis`
--

INSERT INTO `servis` (`ID_Servis`, `Deskripsi_Servis`, `Harga_Servis`) VALUES
(5, 'coba edit tes', 2423434);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sparepart`
--

CREATE TABLE `sparepart` (
  `ID_Sparepart` int(11) NOT NULL,
  `Nama_Sparepart` varchar(25) NOT NULL,
  `Kendaraan_Sparepart` varchar(25) NOT NULL,
  `Harga_Sparepart` int(11) NOT NULL,
  `Stok_Sparepart` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sparepart`
--

INSERT INTO `sparepart` (`ID_Sparepart`, `Nama_Sparepart`, `Kendaraan_Sparepart`, `Harga_Sparepart`, `Stok_Sparepart`) VALUES
(1, 'Knalpot', 'Honda Vario', 100000, 120);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_Transaksi` int(11) NOT NULL,
  `ID_Konsumen` int(11) NOT NULL,
  `ID_Pegawai` int(11) NOT NULL,
  `Total_Biaya` int(11) NOT NULL,
  `Waktu_Transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`ID_Konsultasi`);

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
  MODIFY `ID_Booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jabatan_pegawai`
--
ALTER TABLE `jabatan_pegawai`
  MODIFY `ID_Jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `keranjang_transaksi`
--
ALTER TABLE `keranjang_transaksi`
  MODIFY `ID_Keranjang` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `ID_Konsultasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `konsumen`
--
ALTER TABLE `konsumen`
  MODIFY `ID_Konsumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9825003;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID_Login` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `ID_Pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `ID_Reply` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `servis`
--
ALTER TABLE `servis`
  MODIFY `ID_Servis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `sparepart`
--
ALTER TABLE `sparepart`
  MODIFY `ID_Sparepart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID_Transaksi` int(11) NOT NULL AUTO_INCREMENT;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`ID_Konsumen`) REFERENCES `konsumen` (`ID_Konsumen`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjang_transaksi`
--
ALTER TABLE `keranjang_transaksi`
  ADD CONSTRAINT `keranjang_transaksi_ibfk_1` FOREIGN KEY (`ID_Servis`) REFERENCES `servis` (`ID_Servis`) ON DELETE CASCADE,
  ADD CONSTRAINT `keranjang_transaksi_ibfk_2` FOREIGN KEY (`ID_Sparepart`) REFERENCES `sparepart` (`ID_Sparepart`) ON DELETE CASCADE,
  ADD CONSTRAINT `keranjang_transaksi_ibfk_3` FOREIGN KEY (`ID_Transaksi`) REFERENCES `transaksi` (`ID_Transaksi`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`ID_Pelanggan`) REFERENCES `konsumen` (`ID_Konsumen`) ON DELETE CASCADE,
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`ID_Pegawai`) REFERENCES `pegawai` (`ID_Pegawai`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`ID_Jabatan`) REFERENCES `jabatan_pegawai` (`ID_Jabatan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`ID_Konsultasi`) REFERENCES `konsultasi` (`ID_Konsultasi`) ON DELETE CASCADE,
  ADD CONSTRAINT `reply_ibfk_2` FOREIGN KEY (`ID_Konsumen`) REFERENCES `konsumen` (`ID_Konsumen`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`ID_Konsumen`) REFERENCES `konsumen` (`ID_Konsumen`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`ID_Pegawai`) REFERENCES `pegawai` (`ID_Pegawai`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
