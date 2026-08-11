-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2026 at 05:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan_digital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `nama`, `username`, `password`, `created_at`) VALUES
(2, 'Administrator', 'admin', '$2y$10$HTYUofcGgARKkFxXUCjzOOSMGNFAqJSJDqwlR.2lbAhV/nf2fSuXq', '2026-08-07 01:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `penulis` varchar(150) DEFAULT NULL,
  `penerbit` varchar(150) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `file_pdf` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kategori_id`, `judul`, `penulis`, `penerbit`, `tahun`, `deskripsi`, `cover`, `file_pdf`, `created_at`) VALUES
(5, 7, 'Dasar-dasar Pendidikan Agama Islam', 'Drs. Maman, M.Ag', 'Rajawali Pers', '2022', 'Materi yang disajikan dalam buku ini, memang belum seluruhnya sesuai  dengan kurikulum nasional, namun sekalipun demikian, materinya merupakan perpaduan dari buku-buku Pendidikan Agama Islam di perguruan tinggi umum lainnya, baik negeri ataupun swasta. Pembahasannya diawali dengan pembahasan tentang “Mengenal Allah sebagai Khalik” Materi ini dikenalkan di awal pembahasan karena sesuai dengan sebuah pernyataan bahwa hal yang wajib pertama kali diketahui oleh seorang Muslim, atau hal yang wajib pertama kali ditanamkan dalam diri seorang muslim adalah tauhid kepada Allah. Kemudian diakhiri dengan pembahasan tentang “toleransi” sebagai bagian dari akhlak dalam beragama untuk menuju kerukunan umat beragama. Hal ini diharapkan agar mahasiswa dapat memahami dan menghayatinya sebagai komponen bangsa yang pluralitas dalam beragama, dan agar dapat mewujudkan kerukunan di tengah-tengah umat beragama.', '1786349656_676edb361183fb75e8e3.jpg', '1786349656_4e06cf45aa6109d14809.pdf', '2026-08-10 08:14:16'),
(6, 8, ' Apa Itu Ilmu Psikologi?', 'Muhajjah Saratini', 'IRCiSoD', '2025', 'Apa sebenarnya psikologi itu? Mengapa kita berpikir, merasakan, dan bertindak seperti sekarang? Buku ini menjawab pertanyaan-pertanyaan mendasar mengenai psikologi dengan cara yang menarik, informatif, dan mudah dipahami.', '1786350049_79ddb2998b9e173b77f9.jpg', '1786350049_a86f11abfa26369e9453.pdf', '2026-08-10 08:20:49'),
(7, 9, 'Buku Ilmu Pengetahuan Sosial', 'Muhajjah Saratini', 'CV. Green Publisher Indonesia', '2023', 'Dalam buku ini, penulis membawa pembaca dalam perjalanan mendalam ke dalam dunia Ilmu Pengetahuan Sosial yang menarik. Melalui penjelasan yang jelas dan terperinci, buku ini mengungkap betapa pentingnya memahami dinamika manusia dan masyarakat dalam konteks sosial yang kompleks.', '1786350467_4df5dff5c88221a9c08c.jpg', '1786350467_ea195e2d2ecaa99eb330.pdf', '2026-08-10 08:27:47'),
(8, 13, 'bahasa test', 'zetta', 'cv zetta', '2026', 'test', '1786367229_e3cfda0375cd25b7bb94.png', '1786367229_14add3876c3cf64a311b.pdf', '2026-08-10 13:07:09'),
(9, 11, 'Sejarah Indoensia', 'Drs. Djakariah, M. Pd.', 'CV. Indah sejahtera', '2025', 'Buku ini berisi sejarah tentang indonesia', '1786413715_ed93daa80c0f40e1d95f.jpg', '1786413715_15e9baa71c21d39e5414.pdf', '2026-08-11 02:01:55');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `created_at`) VALUES
(7, 'Agama', '2026-08-10 02:36:09'),
(8, 'Filsafat & Psikologi', '2026-08-10 07:58:18'),
(9, 'Ilmu Sosial', '2026-08-10 07:59:11'),
(11, 'Sejarah & Geografi', '2026-08-10 08:01:12'),
(12, 'Seni & RekreasI', '2026-08-10 08:02:21'),
(13, 'Bahasa', '2026-08-10 13:04:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kategori` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `fk_kategori` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
