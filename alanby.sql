-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 02:35 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alanby`
--

-- --------------------------------------------------------

--
-- Table structure for table `cucian`
--

CREATE TABLE `cucian` (
  `id_cucian` varchar(12) NOT NULL,
  `nama_cucian` varchar(50) NOT NULL,
  `harga_cucian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cucian`
--

INSERT INTO `cucian` (`id_cucian`, `nama_cucian`, `harga_cucian`) VALUES
('BLC001', 'Selimut Jumbo', 15000),
('BLC002', 'Selimut Besar', 14000),
('BLC003', 'Selimut Sedang', 11000),
('BLC004', 'Selimut Kecil', 8000),
('BLC005', 'Seprai Besar', 7000),
('BLC006', 'Seprai Sedang', 6000),
('BLC007', 'Sarung Bantal/Guling', 2000),
('BLC008', 'Kiloan', 0),
('BLC009', 'Kasur Lantai Besar', 35000),
('BLC010', 'Kasur Lantai Sedang', 25000),
('BLC011', 'Jas', 10000),
('BLC012', 'Jas Stelan', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `kode_kain`
--

CREATE TABLE `kode_kain` (
  `warna` varchar(30) NOT NULL,
  `status_kain` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kode_kain`
--

INSERT INTO `kode_kain` (`warna`, `status_kain`) VALUES
('Abu-abu', '0'),
('Biru', '0'),
('Cokelat', '1'),
('Express Biru', '1'),
('Express Hijau', '1'),
('Express Kuning', '1'),
('Express Merah', '1'),
('Hijau', '1'),
('Hitam', '1'),
('Kuning', '1'),
('Kuning Hijau', '1'),
('Merah', '1'),
('Merah Toska', '1'),
('Orange', '0'),
('Orange Cokelat', NULL),
('Pink', '0'),
('Pink Cokelat', '1'),
('Putih', '1'),
('Putih Pink', '1'),
('Toska', '1'),
('Ungu', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(12) NOT NULL,
  `nama_pelanggan` varchar(50) DEFAULT NULL,
  `alamat_pelanggan` varchar(255) DEFAULT NULL,
  `nohp_pelanggan` varchar(12) DEFAULT NULL,
  `email_pelanggan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `nohp_pelanggan`, `email_pelanggan`) VALUES
('BLP001', 'Asep', 'Sukanagalih', '089777877776', NULL),
('BLP002', 'Yusuf Setiawan', 'Loji RT/RW 01/01 Sukanagalih', '089988877888', 'yusuf@gmail.com'),
('BLP003', 'Dery Iman', 'Padarincang', '082321123123', NULL),
('BLP004', 'M. feisal', 'Jl. Jeprah No. 78', '081231218812', 'isal@gmail.com'),
('BLP005', 'Maulana Idan', 'Cianjur', '089777988998', 'maulana@gmail.com'),
('BLP006', 'Robi', 'Cipanas', '099898989800', 'robi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(12) NOT NULL,
  `status_bayar` varchar(30) DEFAULT NULL,
  `jml_total` int(12) DEFAULT NULL,
  `jml_kilo` double DEFAULT NULL,
  `j_bayar` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `status_bayar`, `jml_total`, `jml_kilo`, `j_bayar`) VALUES
('20190824001', 'lunas', 30000, 0, 30000),
('20190911002', 'lunas', 26000, 0, 26000),
('20190917003', 'lunas', 21000, 0, 21000),
('20190917004', 'lunas', 0, 20000, 20000),
('20190917005', 'lunas', 44000, 0, 44000),
('20190917006', 'lunas', 0, 10000, 10000),
('20191112008', 'lunas', 36000, 0, 36000),
('20191112009', 'lunas', 56000, 0, 56000),
('20191120010', 'lunas', 8000, 0, 8000),
('20191120011', 'lunas', 0, 40000, 40000),
('20191120012', 'lunas', 0, 70000, 70000),
('20191122013', 'belum bayar', 22000, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` varchar(12) NOT NULL,
  `tgl_pesan` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status_layanan` varchar(50) DEFAULT NULL,
  `jml_cucian` int(3) DEFAULT NULL,
  `paket` varchar(10) DEFAULT NULL,
  `jenis_cucian` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `tgl_pesan`, `tgl_selesai`, `status_layanan`, `jml_cucian`, `paket`, `jenis_cucian`) VALUES
('20190824001', '2019-08-24', '2019-09-17', 'telah diambil', 2, 'reguler', 'BLC001'),
('20190911002', '2019-09-11', '2019-09-17', 'telah diambil', 2, 'reguler', 'BLC002'),
('20190917003', '2019-09-17', '2019-11-22', 'telah diambil', 3, 'reguler', 'BLC005'),
('20190917004', '2019-09-17', '2019-09-17', 'telah diambil', 0, 'reguler', 'BLC008'),
('20190917005', '2019-09-17', '2019-09-18', 'telah diambil', 4, 'reguler', 'BLC003'),
('20190917006', '2019-09-17', '2019-09-21', 'telah diambil', 0, 'reguler', 'BLC008'),
('20191112008', '2019-11-12', '2019-12-02', 'selesai', 6, 'reguler', 'BLC006'),
('20191112009', '2019-11-12', '2019-11-12', 'telah diambil', 7, 'reguler', 'BLC004'),
('20191120010', '2019-11-20', '2019-11-22', 'telah diambil', 4, 'reguler', 'BLC007'),
('20191120011', '2019-11-20', '2019-11-20', 'telah diambil', 0, 'reguler', 'BLC004'),
('20191120012', '2019-11-20', NULL, 'diproses', 0, 'reguler', 'BLC008'),
('20191122013', '2019-11-22', NULL, 'diproses', 2, 'reguler', 'BLC003'),
('20191122014', '2019-11-22', NULL, 'belum diproses', 1, 'reguler', 'BLC011'),
('20191202015', '2019-12-02', NULL, 'belum diproses', 8, 'reguler', 'BLC002');

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id_penerimaan` varchar(12) NOT NULL,
  `kode` varchar(30) DEFAULT NULL,
  `berat` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id_penerimaan`, `kode`, `berat`) VALUES
('20190824001', 'Cokelat', 0),
('20190911002', 'Toska', 0),
('20190917003', 'Hitam', 0),
('20190917004', 'Putih', 2),
('20190917005', 'Kuning', 0),
('20190917006', 'Orange', 1),
('20191112008', 'Hijau', 0),
('20191112009', 'Pink Cokelat', 0),
('20191120010', 'Merah', 0),
('20191120011', 'Express Hijau', 4),
('20191120012', 'Pink', 7),
('20191122013', 'Orange', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `pemesanan` varchar(12) NOT NULL,
  `pelanggan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`pemesanan`, `pelanggan`) VALUES
('20190824001', 'BLP001'),
('20190911002', 'BLP002'),
('20190917003', 'BLP003'),
('20190917004', 'BLP004'),
('20190917005', 'BLP004'),
('20190917006', 'BLP002'),
('20191112008', 'BLP001'),
('20191112009', 'BLP005'),
('20191120010', 'BLP004'),
('20191120011', 'BLP004'),
('20191120012', 'BLP004'),
('20191122013', 'BLP003'),
('20191122014', 'BLP002'),
('20191202015', 'BLP006');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(12) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` char(1) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `level`, `nama`) VALUES
('11', 'ahmad@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '0', 'Ahmad'),
('BLP002', 'yusuf@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '1', 'Yusuf Setiawan'),
('BLP004', 'isal@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '1', 'M. feisal'),
('BLP005', 'maulana@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '1', 'Maulana Idan'),
('BLP006', 'robi@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '1', 'Robi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cucian`
--
ALTER TABLE `cucian`
  ADD PRIMARY KEY (`id_cucian`);

--
-- Indexes for table `kode_kain`
--
ALTER TABLE `kode_kain`
  ADD PRIMARY KEY (`warna`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`pemesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
