-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 09 Jan 2020 pada 07.15
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `setiawan_spooring_2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `idBarang` int(11) NOT NULL,
  `Barang_nama` varchar(45) DEFAULT NULL,
  `Barang_harga` int(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`idBarang`, `Barang_nama`, `Barang_harga`) VALUES
(1, 'Knalpot Mobil Stainless Steel', 850000),
(2, 'Bola Lampu Mobil', 50000),
(3, 'Knalpot Mobil', 450000),
(4, 'Audio & Video Mobil', 1250000),
(5, 'Baterai Mobil', 250000),
(6, 'Spidometer Mobil', 375000),
(7, 'GPS Mobil', 550000),
(8, 'Handle GPS Mobil', 50000),
(9, 'Pipa Knalpot Mobil', 450000),
(10, 'Wiper', 45000),
(11, 'Casing Lampu Mobil', 850000),
(12, 'Kaca Mobil', 170000),
(13, 'Klakson Mobil', 125000),
(14, 'Dongkrak Mobil', 800000),
(15, 'Bagasi Mobil', 1250000),
(16, 'Ball Joint', 75000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `idcustomer` int(11) NOT NULL,
  `customer_deskripsi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`idcustomer`, `customer_deskripsi`) VALUES
(1, 'UMUM'),
(2, 'KEPOLISIAN RI'),
(3, 'MITRA PERUSAHAAN'),
(4, 'MILIK SENDIRI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur`
--

CREATE TABLE `faktur` (
  `idFaktur` int(11) NOT NULL,
  `Faktur_tgl` datetime DEFAULT NULL,
  `Faktur_total_transaksi` mediumint(9) DEFAULT NULL,
  `no_polisi` varchar(10) DEFAULT NULL,
  `idpembayaran` int(11) DEFAULT NULL,
  `idcustomer` int(11) DEFAULT NULL,
  `operator` int(11) DEFAULT NULL,
  `Faktur_jumlah_dibayar` mediumint(9) DEFAULT NULL,
  `Faktur_uang_kembalian` int(11) DEFAULT NULL,
  `diperiksa_oleh` int(11) DEFAULT NULL,
  `sales` int(11) DEFAULT NULL,
  `pembelian_total_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `faktur`
--

INSERT INTO `faktur` (`idFaktur`, `Faktur_tgl`, `Faktur_total_transaksi`, `no_polisi`, `idpembayaran`, `idcustomer`, `operator`, `Faktur_jumlah_dibayar`, `Faktur_uang_kembalian`, `diperiksa_oleh`, `sales`, `pembelian_total_item`) VALUES
(0, '2019-10-14 09:35:00', 600000, 'AB 4235 KL', 3, 3, 5, 600000, 0, 6, 7, 2),
(1, '2019-05-05 10:00:00', 645000, 'AA 4689 CM', 1, 1, 5, 700000, 55000, 6, 7, 4),
(2, '2019-06-18 14:40:00', 900000, 'AA 1111 FC', 2, 1, 1, 900000, 0, 6, 7, 2),
(3, '2019-09-16 10:45:00', 1250000, 'F 3555 TYT', 1, 4, 5, 1300000, 50000, 6, 7, 1),
(4, '2019-09-02 11:35:00', 950000, 'AA 1238 BG', 3, 2, 1, 950000, 0, 6, 7, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `idjabatan` int(11) NOT NULL,
  `jabatan_deskripsi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`idjabatan`, `jabatan_deskripsi`) VALUES
(1, 'Kasir'),
(2, 'Customer Service'),
(3, 'Supervisor'),
(4, 'Sales'),
(5, 'Marketing'),
(6, 'Owner'),
(7, 'Admin Sistem'),
(8, 'Teknisi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menjabat_sebagai`
--

CREATE TABLE `menjabat_sebagai` (
  `idmenjabat_sebagai` int(11) NOT NULL,
  `idjabatan` int(11) DEFAULT NULL,
  `idpegawai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menjabat_sebagai`
--

INSERT INTO `menjabat_sebagai` (`idmenjabat_sebagai`, `idjabatan`, `idpegawai`) VALUES
(1, 1, 5),
(2, 1, 1),
(3, 1, 5),
(4, 2, 2),
(5, 3, 3),
(6, 3, 6),
(7, 4, 7),
(8, 4, 8),
(9, 6, 9),
(10, 7, 9),
(11, 5, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `idpegawai` int(11) NOT NULL,
  `pegawai_nama` varchar(45) DEFAULT NULL,
  `pegawaialamat` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`idpegawai`, `pegawai_nama`, `pegawaialamat`, `user_id`) VALUES
(1, 'Iis Dahlia', 'srumbung', 2),
(2, 'Sumartono', 'kramat utara', 3),
(3, 'Pasalindo S', 'mertoyudan', 4),
(4, 'Hatta Siahaan', 'dukun', 5),
(5, 'Martino H', 'srumbung', 6),
(6, 'Betty Lavea', 'srumbung', 7),
(7, 'Bekti Subekti', 'tidar karajan', 8),
(8, 'Marlini Yumanis', 'tidar warung', 9),
(9, 'Bowo Adi Saputro', 'mantenan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `No_polisi` varchar(12) NOT NULL,
  `Pelanggan_nama` varchar(45) DEFAULT NULL,
  `Pelanggan_alamat` varchar(45) DEFAULT NULL,
  `Pelanggan_km` int(11) DEFAULT NULL,
  `Pelanggan_jenis_mobil` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`No_polisi`, `Pelanggan_nama`, `Pelanggan_alamat`, `Pelanggan_km`, `Pelanggan_jenis_mobil`) VALUES
('AA 1111 FC', 'Gusti Ngabei', 'Perum Cendana Kiara', 140800, 'Honda Jazz'),
('AA 1238 BG', 'Maryati Setyana', 'Cluster Gardenia', 234000, 'Toyota Yaris'),
('AA 2345 HD', 'Bobby Harsendi', 'Armada Estate', 140000, 'Innova Venturer'),
('AA 3245 RMA', 'Mulyawan', 'Kaponan Pakis', 130000, 'Honda Brio'),
('AA 4689 CM', 'Heru S', 'Dusun Glagah', 167000, 'Honda Brio'),
('AB 4235 KL', 'Malik Arsetya', 'Perum Korpri', 150000, 'Innova'),
('AB 4561 CV', 'Singodimejo', 'Cluster Edelweis', 140890, 'Daihatsu Zebra'),
('F 3555 TYT', 'Cerry Andana', 'Cluster Mertoyudan Asri', 179000, 'Honda Freed'),
('K 5778 FG', 'Harsono Mulyo', 'Perum Griya Mulia', 310000, 'Honda Brio');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` int(11) NOT NULL,
  `pembayaran_deskripsi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`idpembayaran`, `pembayaran_deskripsi`) VALUES
(1, 'CASH'),
(2, 'CREDIT CARD'),
(3, 'SPK PERUSAHAAN'),
(4, 'DEPOSIT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `idpembelian` int(11) NOT NULL,
  `idfaktur` int(11) DEFAULT NULL,
  `idbarang` int(11) DEFAULT NULL,
  `pembelian_jumlah_barang` int(11) DEFAULT NULL,
  `pembelian_sub_jumlah` mediumint(9) DEFAULT NULL,
  `pembelian_diskon` int(11) DEFAULT NULL,
  `pembelian_jumlah_kotor` mediumint(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`idpembelian`, `idfaktur`, `idbarang`, `pembelian_jumlah_barang`, `pembelian_sub_jumlah`, `pembelian_diskon`, `pembelian_jumlah_kotor`) VALUES
(1, 1, 1, 1, 450000, 0, 450000),
(2, 1, 16, 2, 150000, 0, 150000),
(3, 1, 10, 1, 45000, 0, 45000),
(4, 2, 3, 1, 450000, 0, 450000),
(5, 2, 9, 1, 450000, 0, 450000),
(6, 3, 15, 1, 1250000, 0, 1250000),
(7, 4, 2, 2, 100000, 0, 100000),
(8, 4, 11, 1, 850000, 0, 850000),
(9, 0, 7, 1, 550000, 0, 550000),
(10, 0, 8, 1, 50000, 0, 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `ip_address` varchar(64) NOT NULL DEFAULT '',
  `last_login` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `ip_address`, `last_login`) VALUES
(1, 'admin', '$2y$10$E9xdVXl9tREzcbK.5CGWouu30WbJlcSNIcBPUKz8uNdlOAb880g9a', '', 0),
(2, 'iisdahlia', '$2y$10$E9xdVXl9tREzcbK.5CGWouu30WbJlcSNIcBPUKz8uNdlOAb880g9a', '', 0),
(3, 'sumartono', '$2y$10$E9xdVXl9tREzcbK.5CGWouu30WbJlcSNIcBPUKz8uNdlOAb880g9a', '', 0),
(4, 'pasalindo', '$2y$10$E9xdVXl9tREzcbK.5CGWouu30WbJlcSNIcBPUKz8uNdlOAb880g9a', '', 0),
(5, 'hattas', '$2y$10$E9xdVXl9tREzcbK.5CGWouu30WbJlcSNIcBPUKz8uNdlOAb880g9a', '', 0),
(6, 'martino', '$2y$10$E9xdVXl9tREzcbK.5CGWouu30WbJlcSNIcBPUKz8uNdlOAb880g9a', '', 0),
(7, 'laveabetty', '$2y$10$E9xdVXl9tREzcbK.5CGWouu30WbJlcSNIcBPUKz8uNdlOAb880g9a', '', 0),
(8, 'besiktas', '$2y$10$E9xdVXl9tREzcbK.5CGWouu30WbJlcSNIcBPUKz8uNdlOAb880g9a', '', 0),
(9, 'imhumanis', '$2y$10$E9xdVXl9tREzcbK.5CGWouu30WbJlcSNIcBPUKz8uNdlOAb880g9a', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idBarang`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustomer`);

--
-- Indeks untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`idFaktur`),
  ADD KEY `fk_pelanggan_idx` (`no_polisi`),
  ADD KEY `fk_pembayaran_idx` (`idpembayaran`),
  ADD KEY `fk_customer_idx` (`idcustomer`),
  ADD KEY `fk_menjabat_idx` (`operator`),
  ADD KEY `fk_diperiksa_idx` (`diperiksa_oleh`),
  ADD KEY `fk_sales_idx` (`sales`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`idjabatan`);

--
-- Indeks untuk tabel `menjabat_sebagai`
--
ALTER TABLE `menjabat_sebagai`
  ADD PRIMARY KEY (`idmenjabat_sebagai`),
  ADD KEY `fk_jabatan_idx` (`idjabatan`),
  ADD KEY `fk_pegawai_idx` (`idpegawai`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idpegawai`),
  ADD KEY `fk_user_pegawai` (`user_id`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`No_polisi`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idpembelian`),
  ADD KEY `fk_faktur_idx` (`idfaktur`),
  ADD KEY `fk_barang_idx` (`idbarang`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `idpembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD CONSTRAINT `fk_customer` FOREIGN KEY (`idcustomer`) REFERENCES `customer` (`idcustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_diperiksa` FOREIGN KEY (`diperiksa_oleh`) REFERENCES `menjabat_sebagai` (`idmenjabat_sebagai`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_operator` FOREIGN KEY (`operator`) REFERENCES `menjabat_sebagai` (`idmenjabat_sebagai`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pelanggan` FOREIGN KEY (`no_polisi`) REFERENCES `pelanggan` (`No_polisi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pembayaran` FOREIGN KEY (`idpembayaran`) REFERENCES `pembayaran` (`idpembayaran`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sales` FOREIGN KEY (`sales`) REFERENCES `menjabat_sebagai` (`idmenjabat_sebagai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `menjabat_sebagai`
--
ALTER TABLE `menjabat_sebagai`
  ADD CONSTRAINT `fk_jabatan` FOREIGN KEY (`idjabatan`) REFERENCES `jabatan` (`idjabatan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pegawai` FOREIGN KEY (`idpegawai`) REFERENCES `pegawai` (`idpegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `fk_user_pegawai` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_barang` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`idBarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_faktur` FOREIGN KEY (`idfaktur`) REFERENCES `faktur` (`idFaktur`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
