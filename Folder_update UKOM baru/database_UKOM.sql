-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 06:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databasegw`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `IDbuku` int(10) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahunterbit` date NOT NULL,
  `genre` enum('komik','novel','manga') NOT NULL,
  `sinopsis` text NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`IDbuku`, `judul`, `penulis`, `penerbit`, `tahunterbit`, `genre`, `sinopsis`, `foto`) VALUES
(2380, 'hyouka', 'Kana Akatsuki', 'Kyoto Animation', '2015-12-25', 'komik', 'Atas permintaan kakaknya, Hōtarō Oreki bergabung dengan klub sastra klasik (古典部, Koten-bu) di SMA Kamiyama untuk mencegah penutupan klub tersebut, bersama dengan anggota lainnya yaitu Eru Chitanda, Satoshi Fukube dan Mayaka Ibara. Mereka berempat mulai memecahkan berbagai misteri, baik untuk membantu klub mereka maupun atas permintaan Eru. Cerita ini mengambil latar di kota Kamiyama, sebuah kota fiktif di Prefektur Gifu yang didasarkan pada kampung halaman penulis, Takayama, yang juga berlokasi di Prefektur Gifu. SMA Kamiyama yang fiktif didasarkan pada kehidupan nyata di SMA Hida.', 'HyoukaManga13.jpg'),
(2384, 'Violet', 'Kana Akatsuki', 'Kyoto Animation', '2015-12-25', 'komik', '                                                                                                                Cerita ini mengisahkan perjalanan Violet Evergarden yang mencoba untuk membaur di tengah kehidupan masyarakat setelah perang usai sekaligus mencari jati diri serta tujuan hidupnya setelah tidak lagi menjadi prajurit.                                                                                                ', 'Violet.Evergarden.(Character).full.2891574.jpg'),
(2385, 'hujan', 'Tere Liye', 'SABAKGRIP', '2022-09-05', 'novel', 'Novel Hujan merupakan novel yang mengisahkan kisah cinta serta perjuangan hidup Lail. Saat usianya baru menginjak 13 tahun, Lail menjadi seorang yatim piatu akibat ayah dan ibu Lail yang terkena letusan Gunung Api Purba dan gempa yang membuat kota tempat mereka tinggal hancur.', 'hujan.jpg'),
(2386, 'Chainsaw man', 'Tatsuki Fujimoto', 'Shueisha', '2018-12-03', 'komik', 'Denji, pemuda super miskin yang dikejar banyak utang, bekerja sebagai pemburu iblis bersama iblis bernama Pochita. Hari-harinya sebagai manusia kasta terbawah berubah total setelah sebuah pengkhianatan brutal. Meski Denji menyimpan iblis dalam tubunya setelah insiden tersebut, dia tetap harus memburu iblis agar bisa bertahan hidup!?', 'csm.png'),
(2407, 'Bumi', 'Tere Liye', 'SABAKGRIP', '2022-08-30', 'novel', '“Namaku Raib, usiaku 15 tahun, kelas sepuluh. Aku anak perempuan seperti kalian, adik-adik kalian, tetangga kalian. Aku punya dua kucing, namanya si Putih dan si Hitam. Mama dan papaku menyenangkan. Guru-guru di sekolahku seru. Teman-temanku baik dan kompak.”', 'Bumi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku`
--

CREATE TABLE `kategoribuku` (
  `IDkategori` int(11) NOT NULL,
  `genre` enum('komik','novel','manga') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoribuku`
--

INSERT INTO `kategoribuku` (`IDkategori`, `genre`) VALUES
(1, 'komik'),
(2, 'novel'),
(3, 'manga');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku_relasi`
--

CREATE TABLE `kategoribuku_relasi` (
  `IDkategoribuku` int(11) NOT NULL,
  `IDbuku` int(11) NOT NULL,
  `IDkategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `koleksipribadi`
--

CREATE TABLE `koleksipribadi` (
  `koleksiID` int(11) NOT NULL,
  `IDuser` int(11) NOT NULL,
  `IDbuku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `IDpeminjaman` int(11) NOT NULL,
  `IDuser` int(11) NOT NULL,
  `IDbuku` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `status_peminjaman` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`IDpeminjaman`, `IDuser`, `IDbuku`, `nama`, `tgl_peminjaman`, `tgl_pengembalian`, `status_peminjaman`) VALUES
(474, 66632, 2384, 'bread', '2024-02-09', '2024-02-19', 'Di Pinjam'),
(482, 21, 2380, 'tomori', '2024-03-08', '2024-03-27', 'Di Pinjam');

-- --------------------------------------------------------

--
-- Table structure for table `ulasanbuku`
--

CREATE TABLE `ulasanbuku` (
  `IDulasan` int(11) NOT NULL,
  `IDuser` int(11) NOT NULL,
  `IDbuku` int(11) NOT NULL,
  `ulasan` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `IDuser` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nis` varchar(100) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `level` enum('admin','petugas','peminjam') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IDuser`, `username`, `password`, `email`, `nis`, `namalengkap`, `alamat`, `level`) VALUES
(21, 'tomori', 'peminjam', 'tomori@gmail.com', '231232512', 'tomoridesu', 'villa mas indah', 'peminjam'),
(66632, 'bread', 'admin', 'yuibreaddesu@gmail.com', '782728381', 'raihantri', 'jawa', 'admin'),
(160607, 'gura', '223344', 'gura@gmail.com', '778709886', 'gawr gura', 'atlantis', 'admin'),
(160609, 'Yui', 'petugas', 'Yui@gmail.com', '2122121212', 'Yui Ui', 'Jepang', 'petugas'),
(160612, 'amelia', '2321', 'ame@gmail.com', '2134549234', 'amelia watson', 'amerika', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`IDbuku`);

--
-- Indexes for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  ADD PRIMARY KEY (`IDkategori`);

--
-- Indexes for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD PRIMARY KEY (`IDkategoribuku`),
  ADD KEY `IDbuku` (`IDbuku`),
  ADD KEY `IDkategori` (`IDkategori`);

--
-- Indexes for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD PRIMARY KEY (`koleksiID`),
  ADD KEY `IDuser` (`IDuser`),
  ADD KEY `IDbuku` (`IDbuku`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`IDpeminjaman`),
  ADD KEY `IDuser` (`IDuser`),
  ADD KEY `IDbuku` (`IDbuku`);

--
-- Indexes for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD PRIMARY KEY (`IDulasan`),
  ADD KEY `IDuser` (`IDuser`),
  ADD KEY `IDbuku` (`IDbuku`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IDuser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `IDbuku` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2410;

--
-- AUTO_INCREMENT for table `kategoribuku`
--
ALTER TABLE `kategoribuku`
  MODIFY `IDkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `IDpeminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=483;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `IDuser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160613;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_3` FOREIGN KEY (`IDbuku`) REFERENCES `buku` (`IDbuku`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kategoribuku_relasi_ibfk_4` FOREIGN KEY (`IDkategori`) REFERENCES `kategoribuku` (`IDkategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `koleksipribadi`
--
ALTER TABLE `koleksipribadi`
  ADD CONSTRAINT `koleksipribadi_ibfk_3` FOREIGN KEY (`IDuser`) REFERENCES `user` (`IDuser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `koleksipribadi_ibfk_4` FOREIGN KEY (`IDbuku`) REFERENCES `buku` (`IDbuku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`IDuser`) REFERENCES `user` (`IDuser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_4` FOREIGN KEY (`IDbuku`) REFERENCES `buku` (`IDbuku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ulasanbuku`
--
ALTER TABLE `ulasanbuku`
  ADD CONSTRAINT `ulasanbuku_ibfk_3` FOREIGN KEY (`IDuser`) REFERENCES `user` (`IDuser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ulasanbuku_ibfk_4` FOREIGN KEY (`IDbuku`) REFERENCES `buku` (`IDbuku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
