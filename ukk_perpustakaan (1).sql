-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2024 at 03:45 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukk_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `BukuID` int(11) NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Penulis` varchar(255) NOT NULL,
  `Penerbit` varchar(255) NOT NULL,
  `TahunTerbit` varchar(100) NOT NULL,
  `Deskripsi` text NOT NULL,
  `Foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`BukuID`, `Judul`, `Penulis`, `Penerbit`, `TahunTerbit`, `Deskripsi`, `Foto`) VALUES
(23, 'Kamu Terlalu Banyak Bercanda', 'Marchella Fp', 'PT Kebahagiaan Itu Sederhana', '22 Des 2019', 'Buku Kamu Terlalu Banyak Bercanda ini adalah buku kompilasi dari isi surat-surat yang ditulis oleh Awan, salah satu tokoh dari buku Nanti Kita Cerita Tentang Hari Ini. Isi dalam surat berisikan tentang waktu yang ia alami saat dirinya tidak bisa untuk ikut tertawa, sebuah perasaan ketika Awan merasa sedang dijadikan bahan canda oleh hidup. Di dalam buku ini, berisikan kutipan-kutipan dari surat yang ditulis oleh Awan. Kumpulan dari catatan yang ditulis oleh Awan sendiri tentang berbagai perasaan negatif yang ia rasakan dalam dirinya. Alur cerita digambarkan dalam rentang waktu selama sekitar 10 tahun, dengan membaca catatan yang ditulis oleh Awan ini, kita akan membayangkan bagaimana Awan menjalani hari kelabunya, dan kemudian Awan memutuskan untuk menuliskan perasaannya yang ia curahkan dalam catatan harian. Dituliskan dalam waktu 10 tahun, Awan menuliskan segala permasalahan yang ia rasa, tentang perasaan sedih, kecewa, marah dan juga meragu yang terkadang semua perasaan itu jarang kita perlihatkan p', '17065759451705538161ktbb.jpg'),
(31, 'Nanti Kita Cerita Tentang Hari Ini', 'Marchella Fp', 'Kepustakaan Populer Gramedia', '22 Des 2019', 'Novel Nanti Kita Cerita Tentang Hari Ini mengisahkan tentang sebuah keluarga yang mempunyai konflik di masa lalu. Konflik tersebut menjadi konflik yang terpendam, karena belum pernah dibicarakan dan diselesaikan sebelumnya. Sebab, konflik ini bersifat destruktif dan dapat merusak keharmonisan yang ada dalam keluarga ini.  Konflik tersebut bagaikan bom waktu yang dapat meledak begitu saja, tanpa ada yang tahu kapan, bagaimana, dan di mana. Pada akhirnya waktu meledaknya bom waktu tersebut akhirnya tiba. Rahasia yang selama ini disembunyikan akhirnya terkuak.  Hal ini bisa terjadi, karena anak sulung di keluarga tersebut yang mengetahui tentang masalah ini sudah merasa lelah dan selalu terbebani, karena memendam rahasia ini dari ia kecil hingga dewasa. Ketika rahasia ini terbongkar pun, adik-adiknya tentunya merasa sangat terkejut, dan tidak pernah menduga bahwa ada rahasia gelap yang tersimpan dalam keluarga yang harmonis itu.  Kedua orang tua mereka pun akhirnya menjelaskan bahwa anak bungsunya memiliki kemba', '17065774241705539754nkcthi.jpg'),
(34, 'Lookism', 'Park Tae Joon', 'Webtoon', '3 Sept 2015', 'Manhwa Lookism yang dibuat oleh komikus bernama Park Tae Joon ini bercerita tentang Park Hyung Suk, kelebihan berat badan dan tidak menarik, diintimidasi dan dilecehkan setiap hari. Tapi keajaiban akan segera terjadi.', '1708392121Komik-Lookism-224x319.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku`
--

CREATE TABLE `kategoribuku` (
  `KategoriID` int(11) NOT NULL,
  `NamaKategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoribuku`
--

INSERT INTO `kategoribuku` (`KategoriID`, `NamaKategori`) VALUES
(13, 'novel'),
(14, 'Komik');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku_relasi`
--

CREATE TABLE `kategoribuku_relasi` (
  `KategoriBukuID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL,
  `KategoriID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoribuku_relasi`
--

INSERT INTO `kategoribuku_relasi` (`KategoriBukuID`, `BukuID`, `KategoriID`) VALUES
(1, 23, 13),
(2, 31, 13),
(3, 34, 14);

-- --------------------------------------------------------

--
-- Table structure for table `koleksipribadi`
--

CREATE TABLE `koleksipribadi` (
  `KoleksiID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `PeminjamanID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL,
  `TanggalPeminjaman` date DEFAULT NULL,
  `TanggalPengembalian` date DEFAULT NULL,
  `StatusPeminjaman` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`PeminjamanID`, `UserID`, `BukuID`, `TanggalPeminjaman`, `TanggalPengembalian`, `StatusPeminjaman`, `created_at`, `updated_at`) VALUES
(29, 5, 31, '2024-02-19', '2024-02-26', 'Selesai', '2024-02-17 00:29:59', '2024-02-17 00:29:59'),
(30, 8, 31, '2024-02-19', '2024-02-26', 'Selesai', '2024-02-17 01:15:55', '2024-02-17 01:15:55'),
(31, 20, 31, '2024-02-21', '2024-02-28', 'Selesai', '2024-02-19 17:26:44', '2024-02-19 17:26:44'),
(32, 20, 34, '2024-02-20', '2024-02-28', 'Selesai', '2024-02-19 18:40:50', '2024-02-19 18:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `ulasanbuku`
--

CREATE TABLE `ulasanbuku` (
  `UlasanID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `BukuID` int(11) NOT NULL,
  `Ulasan` text NOT NULL,
  `Rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ulasanbuku`
--

INSERT INTO `ulasanbuku` (`UlasanID`, `UserID`, `BukuID`, `Ulasan`, `Rating`) VALUES
(22, 5, 31, 'aaaa', 2),
(23, 5, 23, 'sa', 1),
(24, 5, 31, 'buku ini bagus banget loh', 4),
(25, 5, 23, 'sssss', 5),
(26, 5, 31, 'kelas abangkuhhh', 1),
(27, 20, 31, 'test', 1),
(28, 20, 34, 'bagus banget', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NamaLengkap` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `level` enum('petugas','admin','user','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `username`, `password`, `Email`, `NamaLengkap`, `Alamat`, `level`) VALUES
(5, 'Asep', '$2y$12$jeOa4EydxrsanZxgEOesoOeJivSpgmOQhK8L6C77Kv/l2XdV.FRiy', 'asep11@gmail.com', 'asep jamaludin', 'Jln 123', 'petugas'),
(8, 'Azall', '$2y$12$3hZuyw0shM.IIoA57BQLXOZuyaWhfHtmIWJbhpFz3nlt.jItUtScy', 'Aririzal@gmail.com', 'Ari Rizal F', 'Jl.Mangga 1', 'user'),
(10, 'Petugas Sumbul', '$2y$12$0GCML/v0yI3msXXRJMgjue9SFYl97obwx43X0yCTdNHbm0C1XM46y', 'MuhammadSumbul@gmail.com', 'Muhammad Sumbul', 'Jl.Arab', 'petugas'),
(20, 'aa', '$2y$12$mYq9vUQhlsBTVk7.OEahQ.pf4BZL9KzDrFl5gki4lC.iyyBPIAwGy', 'aa@gmail.com', 'aa', 'Jamal', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`BukuID`),
  ADD UNIQUE KEY `Judul` (`Judul`);

--
-- Indexes for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  ADD PRIMARY KEY (`KategoriID`);

--
-- Indexes for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD PRIMARY KEY (`KategoriBukuID`),
  ADD KEY `BukuID` (`BukuID`),
  ADD KEY `KategoriID` (`KategoriID`);

--
-- Indexes for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD PRIMARY KEY (`KoleksiID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `BukuID` (`BukuID`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`PeminjamanID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `BukuID` (`BukuID`);

--
-- Indexes for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD PRIMARY KEY (`UlasanID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `BukuID` (`BukuID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `BukuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  MODIFY `KategoriID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  MODIFY `KategoriBukuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  MODIFY `KoleksiID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `PeminjamanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  MODIFY `UlasanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_1` FOREIGN KEY (`BukuID`) REFERENCES `buku` (`BukuID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_2` FOREIGN KEY (`KategoriID`) REFERENCES `kategoribuku` (`KategoriID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD CONSTRAINT `koleksipribadi_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `koleksipribadi_ibfk_2` FOREIGN KEY (`BukuID`) REFERENCES `buku` (`BukuID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`BukuID`) REFERENCES `buku` (`BukuID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD CONSTRAINT `ulasanbuku_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulasanbuku_ibfk_2` FOREIGN KEY (`BukuID`) REFERENCES `buku` (`BukuID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
