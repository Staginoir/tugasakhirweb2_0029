-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2025 at 01:52 PM
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
-- Database: `prestasi_siswa_0029`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-12-19-045517', 'App\\Database\\Migrations\\Mtingkat', 'default', 'App', 1734584979, 1),
(2, '2024-12-19-045527', 'App\\Database\\Migrations\\MGelar', 'default', 'App', 1734584979, 1),
(3, '2024-12-19-045534', 'App\\Database\\Migrations\\MBidang', 'default', 'App', 1734584979, 1),
(4, '2024-12-19-045733', 'App\\Database\\Migrations\\MGuru', 'default', 'App', 1734584979, 1),
(5, '2024-12-19-045733', 'App\\Database\\Migrations\\MKelas', 'default', 'App', 1734584979, 1),
(6, '2024-12-19-045734', 'App\\Database\\Migrations\\MEkskul', 'default', 'App', 1734584979, 1),
(7, '2024-12-19-045805', 'App\\Database\\Migrations\\MProvinsi', 'default', 'App', 1734584979, 1),
(8, '2024-12-19-045806', 'App\\Database\\Migrations\\MKota', 'default', 'App', 1734584979, 1),
(9, '2024-12-19-050237', 'App\\Database\\Migrations\\MSiswa', 'default', 'App', 1734584979, 1),
(10, '2024-12-19-055372', 'App\\Database\\Migrations\\MPrestasi', 'default', 'App', 1734584980, 1),
(11, '2024-12-19-062237', 'App\\Database\\Migrations\\MUser', 'default', 'App', 1734589415, 2);

-- --------------------------------------------------------

--
-- Table structure for table `m_bidang`
--

CREATE TABLE `m_bidang` (
  `id_bidang` varchar(15) NOT NULL,
  `nama_bidang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_bidang`
--

INSERT INTO `m_bidang` (`id_bidang`, `nama_bidang`) VALUES
('AS', 'Akademik dan Sains'),
('IS', 'Interpersonal dan Sosial'),
('Kewirausahaan', 'Kewirausahaan'),
('KS', 'Kreatif dan Seni'),
('Olahraga', 'Olahraga'),
('TIK', 'Teknologi dan Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `m_ekskul`
--

CREATE TABLE `m_ekskul` (
  `id_ekskul` varchar(17) NOT NULL,
  `nama_ekskul` varchar(50) NOT NULL,
  `jumlah_siswa` varchar(4) DEFAULT NULL,
  `id_guru` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_ekskul`
--

INSERT INTO `m_ekskul` (`id_ekskul`, `nama_ekskul`, `jumlah_siswa`, `id_guru`) VALUES
('EX001', 'Paskibra', '25', 'G001'),
('EX002', 'Pramuka', '40', 'G002'),
('EX003', 'Basket', '18', 'G003'),
('EX004', 'SAINS', '19', 'G005'),
('EX005', 'PIKR', '231', 'G004');

-- --------------------------------------------------------

--
-- Table structure for table `m_gelar`
--

CREATE TABLE `m_gelar` (
  `id_gelar` varchar(4) NOT NULL,
  `nama_gelar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_gelar`
--

INSERT INTO `m_gelar` (`id_gelar`, `nama_gelar`) VALUES
('Hap1', 'Juara Harapan 1'),
('Hap2', 'Juara Harapan 2'),
('Hap3', 'Juara Harapan 3'),
('Ju1', 'Juara 1'),
('Ju2', 'Juara 2'),
('Ju3', 'Juara 3'),
('Med1', 'Medali Emas'),
('Med2', 'Medali Perak'),
('Med3', 'Medali Preunggu');

-- --------------------------------------------------------

--
-- Table structure for table `m_guru`
--

CREATE TABLE `m_guru` (
  `id_guru` varchar(16) NOT NULL,
  `nip_guru` varchar(18) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `kontak_guru` varchar(15) DEFAULT NULL,
  `status_jabatan` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_guru`
--

INSERT INTO `m_guru` (`id_guru`, `nip_guru`, `nama_guru`, `kontak_guru`, `status_jabatan`) VALUES
('G001', '123456789012345678', 'Budi Santoso', '081234567890', 'Wali Kelas'),
('G002', '987654321098765432', 'Ani Wijaya', '081298765432', 'Guru Matematika'),
('G003', '112233445566778899', 'Cahyo Pranoto', '081334556677', 'Guru Bahasa Indonesia'),
('G004', '182937465849123457', 'Amelia', '081234567894', 'Guru PPKN'),
('G005', '18293746584913445', 'Irfan Maulana', '085167895678', 'Guru Biologi');

-- --------------------------------------------------------

--
-- Table structure for table `m_kelas`
--

CREATE TABLE `m_kelas` (
  `id_kelas` varchar(6) NOT NULL,
  `level_kelas` enum('10','11','12') NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `id_guru` varchar(16) NOT NULL,
  `kapasitas` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_kelas`
--

INSERT INTO `m_kelas` (`id_kelas`, `level_kelas`, `nama_kelas`, `id_guru`, `kapasitas`) VALUES
('KLS001', '10', 'X MIPA 2', 'G001', '30 Siswa'),
('KLS002', '11', 'XI MIPA 1', 'G002', '30 Siswa'),
('KLS003', '12', 'XII IPS 3', 'G003', '30 Siswa'),
('KLS004', '10', 'X IPS 5', 'G004', '3O siswa');

-- --------------------------------------------------------

--
-- Table structure for table `m_kota`
--

CREATE TABLE `m_kota` (
  `id_kota` varchar(3) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `id_provinsi` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_kota`
--

INSERT INTO `m_kota` (`id_kota`, `nama_kota`, `id_provinsi`) VALUES
('AMB', 'Ambon', 'MA'),
('BDG', 'Bandung', 'JB'),
('BJM', 'Banjarmasin', 'KS'),
('BKL', 'Bengkulu', 'BE'),
('BLP', 'Bandar Lampung', 'LA'),
('BNA', 'Banda Aceh', 'AC'),
('DIY', 'Yogyakarta', 'YO'),
('DPS', 'Denpasar', 'BA'),
('GTO', 'Gorontalo', 'GO'),
('JBI', 'Jambi', 'JA'),
('JKT', 'Jakarta', 'JK'),
('KDI', 'Kendari', 'SG'),
('KPG', 'Kupang', 'NT'),
('MDN', 'Medan', 'SU'),
('MKS', 'Makassar', 'SN'),
('MMU', 'Mamuju', 'SR'),
('MND', 'Manado', 'SA'),
('MNK', 'Manokwari', 'PB'),
('MRK', 'Merauke', 'PS'),
('MTR', 'Mataram', 'NB'),
('NAB', 'Nabire', 'PT'),
('PDG', 'Padang', 'SB'),
('PGK', 'Pangkalpinang', 'BB'),
('PKU', 'Pekanbaru', 'RI'),
('PLG', 'Palembang', 'SS'),
('PLK', 'Palangka Raya', 'KT'),
('PLW', 'Palu', 'ST'),
('PTK', 'Pontianak', 'KB'),
('SBY', 'Surabaya', 'JI'),
('SMG', 'Semarang', 'JT'),
('SMR', 'Samarinda', 'KI'),
('SOF', 'Sofifi', 'MU'),
('SRG', 'Serang', 'BT'),
('SRW', 'Sorong', 'PD'),
('TJP', 'Tanjungpinang', 'KR'),
('TJS', 'Tanjung Selor', 'KU'),
('WLK', 'Wamena', 'PP');

-- --------------------------------------------------------

--
-- Table structure for table `m_prestasi`
--

CREATE TABLE `m_prestasi` (
  `id_prestasi` int(18) NOT NULL,
  `jenis_prestasi` enum('Akademik','Non Akademik') NOT NULL,
  `id_tingkat` varchar(10) DEFAULT NULL,
  `id_gelar` varchar(4) DEFAULT NULL,
  `id_bidang` varchar(15) DEFAULT NULL,
  `nama_pembina` varchar(50) DEFAULT NULL,
  `id_ekskul` varchar(17) DEFAULT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `tempat` varchar(100) DEFAULT NULL,
  `id_kota` varchar(3) DEFAULT NULL,
  `id_provinsi` varchar(2) DEFAULT NULL,
  `persetujuan_walkelas` enum('Diterima','Ditolak','Menunggu') NOT NULL DEFAULT 'Menunggu',
  `persetujuan_wakasek` enum('Diterima','Ditolak','Menunggu') NOT NULL DEFAULT 'Menunggu',
  `penyelenggara` varchar(100) DEFAULT NULL,
  `jumlah_sekolah` varchar(20) DEFAULT NULL,
  `jumlah_peserta` varchar(20) DEFAULT NULL,
  `waktu_pelaksanaan` date DEFAULT NULL,
  `bukti_sertif` varchar(255) DEFAULT NULL,
  `bukti_kegiatan` varchar(255) DEFAULT NULL,
  `nis_siswa` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_prestasi`
--

INSERT INTO `m_prestasi` (`id_prestasi`, `jenis_prestasi`, `id_tingkat`, `id_gelar`, `id_bidang`, `nama_pembina`, `id_ekskul`, `nama_kegiatan`, `tempat`, `id_kota`, `id_provinsi`, `persetujuan_walkelas`, `persetujuan_wakasek`, `penyelenggara`, `jumlah_sekolah`, `jumlah_peserta`, `waktu_pelaksanaan`, `bukti_sertif`, `bukti_kegiatan`, `nis_siswa`) VALUES
(1, 'Akademik', 'DaeProv', 'Ju1', 'AS', '', 'EX001', 'Olimpiade Matematika', 'Jakarta', 'JKT', 'JK', 'Diterima', 'Diterima', 'Kementerian Pendidikan', '20', '200', '2024-12-01', 'sertifikat_001.pdf', 'dokumentasi_001.jpg', '11221'),
(2, 'Non Akademik', 'DaeProv', 'Ju1', 'Olahraga', 'Siti Rahmawati', 'EX003', 'Developmental Basketball League (DBL)', 'Siliwangi Basketball Court', 'BDG', 'JB', 'Diterima', 'Diterima', 'PB Perbasi', '15', '150', '2024-11-15', 'sertifikat_002.pdf', 'dokumentasi_002.jpg', '13240'),
(6, 'Non Akademik', 'KotKab', 'Ju1', 'Olahraga', 'Siti Rahmawati', 'EX003', 'Popda Kota', 'Gor Bandung', 'BDG', 'JB', 'Diterima', 'Diterima', 'Dinas Kepemudaan dan Olahraga (Dispora)', '21', '210', '2025-01-07', '1736236624_8fdc55e69e85e29b85a9.png', '1736236624_8ace5da05486745bea6a.png', '13240'),
(8, 'Akademik', 'Nas', 'Ju2', 'AS', 'Budi Santoso', 'EX002', 'Lomba Matematika Nasional Universitas Gadjah Mada', ' Universitas Gadjah Mada', 'SBY', 'JI', 'Diterima', 'Diterima', 'Himpunan Mahasiswa Matematika (Himatika) UGM', '10', '1000', '2025-01-08', '1736324273_c3c67e183be192365db2.jpg', '1736324273_c7b08cfec2a4326df168.jpg', '10102'),
(11, 'Akademik', 'DaeProv', 'Ju2', 'AS', 'Ani Wijaya', 'EX001', 'OSN-P Matematika', ' Balai Pengembangan Talenta Indonesia', 'JKT', 'JK', 'Diterima', 'Diterima', 'Kementerian Pendidikan dan Kebudayaan', '200', '500', '2025-01-13', '1736755865_1c94ffd6582cc944ac05.jpg', '1736755865_99e33d065e1afb17e13e.jpg', '11221'),
(12, 'Non Akademik', 'DaeProv', 'Ju3', 'Olahraga', 'Ani Wijaya', 'EX002', 'Turnamen Bola Voli Piala Gubernur Jawa Tengah', 'Gor Semarang', 'SMG', 'JT', 'Diterima', 'Diterima', 'Dinas Kepemudaan dan Olahraga (Dispora)', '211', '245', '2025-01-20', '1737361803_6678f17cefd7f9cfe27a.jpeg', '1737361803_5f3d836e92b8c763dc46.jpeg', '10102'),
(13, 'Akademik', 'Nas', 'Ju2', 'AS', 'Siti Rahmawati', 'EX001', 'Lomba Matematika Nasional Universitas Gadjah Mada', ' Universitas Gadjah Mada', 'DIY', 'YO', 'Ditolak', 'Ditolak', 'Himpunan Mahasiswa Matematika (Himatika) UGM', '223', '2133', '2025-01-20', '1737362719_371cefdbbc3bab6b2441.jpeg', '1737362719_452ad7395862fd01c7d8.jpeg', '11221'),
(14, 'Non Akademik', 'DaeProv', 'Ju1', 'Olahraga', 'Ani Wijaya', 'EX001', 'Paskib', 'Gor Bandung', 'BDG', 'JB', 'Ditolak', 'Ditolak', 'Dinas Kepemudaan dan Olahraga (Dispora)', '12', '120', '2025-01-20', '1737363941_11c4aaafacc3648f5c5d.jpeg', '1737363941_c15dbf64f69eabd2eede.jpeg', '10103');

-- --------------------------------------------------------

--
-- Table structure for table `m_provinsi`
--

CREATE TABLE `m_provinsi` (
  `id_provinsi` varchar(2) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_provinsi`
--

INSERT INTO `m_provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
('AC', 'Aceh'),
('BA', 'Bali'),
('BB', 'Kepulauan Bangka Belitung'),
('BE', 'Bengkulu'),
('BT', 'Banten'),
('GO', 'Gorontalo'),
('JA', 'Jambi'),
('JB', 'Jawa Barat'),
('JI', 'Jawa Timur'),
('JK', 'DKI Jakarta'),
('JT', 'Jawa Tengah'),
('KB', 'Kalimantan Barat'),
('KI', 'Kalimantan Timur'),
('KR', 'Kepulauan Riau'),
('KS', 'Kalimantan Selatan'),
('KT', 'Kalimantan Tengah'),
('KU', 'Kalimantan Utara'),
('LA', 'Lampung'),
('MA', 'Maluku'),
('MU', 'Maluku Utara'),
('NB', 'Nusa Tenggara Barat'),
('NT', 'Nusa Tenggara Timur'),
('PA', 'Papua'),
('PB', 'Papua Barat'),
('PD', 'Papua Barat Daya'),
('PP', 'Papua Pegunungan'),
('PS', 'Papua Selatan'),
('PT', 'Papua Tengah'),
('RI', 'Riau'),
('SA', 'Sulawesi Utara'),
('SB', 'Sumatera Barat'),
('SG', 'Sulawesi Tenggara'),
('SN', 'Sulawesi Selatan'),
('SR', 'Sulawesi Barat'),
('SS', 'Sumatera Selatan'),
('ST', 'Sulawesi Tengah'),
('SU', 'Sumatera Utara'),
('YO', 'Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `m_siswa`
--

CREATE TABLE `m_siswa` (
  `nis_siswa` varchar(5) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `id_kelas` varchar(6) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat_siswa` varchar(255) DEFAULT NULL,
  `kontak_siswa` varchar(15) DEFAULT NULL,
  `passw_siswa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_siswa`
--

INSERT INTO `m_siswa` (`nis_siswa`, `nama_siswa`, `id_kelas`, `jenis_kelamin`, `alamat_siswa`, `kontak_siswa`, `passw_siswa`) VALUES
('10102', 'Ahmad Yusuf', 'KLS001', 'Laki-laki', 'Jl. Merdeka No. 10, Jakarta', '081234567890', '$2y$10$uB6fSGpHWb7Cgabvws8sWuHf5PnOYGEoaQDXLnWjCcklXT51JVP/.'),
('10103', 'irfan', 'KLS001', 'Laki-laki', 'sragi deket pom', '08883453371', '$2y$10$c9Oz4Pm4y5jHGR7h4ERFQuKwuCmVhSI4qUKftsWJyM.pGzwAwhCLy'),
('11221', 'Dewi Anggraini', 'KLS002', 'Perempuan', 'Jl. Sudirman No. 45, Surabaya', '082345678901', '$2y$10$y.n3sozXUK2TbUnivxPSj.5SBYkbpPKhgcX3373oNtsXujmUKEDH2'),
('12011', 'Udin', 'KLS001', 'Laki-laki', 'kartini', '08123456781', '$2y$10$HZbtUIgYMMHiy2WjLAnVsOBEcGdpftUh7BEUmewECqyglrx1Tn22y'),
('13240', 'Rizky Pratama', 'KLS003', 'Laki-laki', 'Jl. Diponegoro No. 21, Bandung', '083456789012', '$2y$10$nYs6opmLGOm.woZr81CYx.agt.UGAVsGkzjf.PKdIXFiBBU3eEVIq');

-- --------------------------------------------------------

--
-- Table structure for table `m_tingkat`
--

CREATE TABLE `m_tingkat` (
  `id_tingkat` varchar(10) NOT NULL,
  `nama_tingkat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_tingkat`
--

INSERT INTO `m_tingkat` (`id_tingkat`, `nama_tingkat`) VALUES
('DaeProv', 'Daerah/Provinsi'),
('Inter', 'Internasional'),
('KotKab', 'Kota/Kabupaten'),
('Nas', 'Nasional');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Kesiswaan','Wakasek','Wali Kelas') NOT NULL,
  `access_level` int(11) NOT NULL,
  `id_guru` varchar(16) DEFAULT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`, `access_level`, `id_guru`, `status`) VALUES
('USR001', 'admin123', '$2y$10$TXsi6Zc7KsTyHeL9Gf2zGuy8e1mJfrfZP.E2ZgBKTK5Q429G3EHtm', 'Admin', 1, 'G001', 'Aktif'),
('USR002', 'kesiswaan01', '$2y$10$P1LQlIxWtV4WTy.JR6Ob4ufKLfq/H0o8v9wushwYYkn5Ji5.ePBO.', 'Kesiswaan', 1, 'G001', 'Aktif'),
('USR003', 'wakasek02', '$2y$10$mm3489p/nL36BEb38I7CUe4ajsS.d4F53XytryRqYISUTUVGclyfe', 'Wakasek', 2, 'G002', 'Aktif'),
('USR004', 'walikelas01', '$2y$10$TGUb/qxGiWcajLkPlJ9D8OVci3GNMvj4ufyjclR2Uqa8PYJQjKwIC', 'Wali Kelas', 3, 'G003', 'Aktif'),
('USR005', 'wakasek01', '$2y$10$pdnO6xwYreBu.3MWxSP6uuyNbmHEUG/LNx5QF8SwqFkT1MZ7kAM8y', 'Wakasek', 2, 'G004', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_bidang`
--
ALTER TABLE `m_bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indexes for table `m_ekskul`
--
ALTER TABLE `m_ekskul`
  ADD PRIMARY KEY (`id_ekskul`),
  ADD KEY `M_Ekskul_id_guru_foreign` (`id_guru`);

--
-- Indexes for table `m_gelar`
--
ALTER TABLE `m_gelar`
  ADD PRIMARY KEY (`id_gelar`);

--
-- Indexes for table `m_guru`
--
ALTER TABLE `m_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `m_kelas`
--
ALTER TABLE `m_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `M_Kelas_id_guru_foreign` (`id_guru`);

--
-- Indexes for table `m_kota`
--
ALTER TABLE `m_kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD KEY `M_kota_id_provinsi_foreign` (`id_provinsi`);

--
-- Indexes for table `m_prestasi`
--
ALTER TABLE `m_prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `M_Prestasi_id_tingkat_foreign` (`id_tingkat`),
  ADD KEY `M_Prestasi_id_gelar_foreign` (`id_gelar`),
  ADD KEY `M_Prestasi_id_bidang_foreign` (`id_bidang`),
  ADD KEY `M_Prestasi_id_ekskul_foreign` (`id_ekskul`),
  ADD KEY `M_Prestasi_id_kota_foreign` (`id_kota`),
  ADD KEY `M_Prestasi_id_provinsi_foreign` (`id_provinsi`),
  ADD KEY `M_Prestasi_nis_siswa_foreign` (`nis_siswa`);

--
-- Indexes for table `m_provinsi`
--
ALTER TABLE `m_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `m_siswa`
--
ALTER TABLE `m_siswa`
  ADD PRIMARY KEY (`nis_siswa`),
  ADD KEY `M_Siswa_id_kelas_foreign` (`id_kelas`);

--
-- Indexes for table `m_tingkat`
--
ALTER TABLE `m_tingkat`
  ADD PRIMARY KEY (`id_tingkat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `User_id_guru_foreign` (`id_guru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `m_prestasi`
--
ALTER TABLE `m_prestasi`
  MODIFY `id_prestasi` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_ekskul`
--
ALTER TABLE `m_ekskul`
  ADD CONSTRAINT `M_Ekskul_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `m_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_kelas`
--
ALTER TABLE `m_kelas`
  ADD CONSTRAINT `M_Kelas_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `m_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_kota`
--
ALTER TABLE `m_kota`
  ADD CONSTRAINT `M_kota_id_provinsi_foreign` FOREIGN KEY (`id_provinsi`) REFERENCES `m_provinsi` (`id_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_prestasi`
--
ALTER TABLE `m_prestasi`
  ADD CONSTRAINT `M_Prestasi_id_bidang_foreign` FOREIGN KEY (`id_bidang`) REFERENCES `m_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `M_Prestasi_id_ekskul_foreign` FOREIGN KEY (`id_ekskul`) REFERENCES `m_ekskul` (`id_ekskul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `M_Prestasi_id_gelar_foreign` FOREIGN KEY (`id_gelar`) REFERENCES `m_gelar` (`id_gelar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `M_Prestasi_id_kota_foreign` FOREIGN KEY (`id_kota`) REFERENCES `m_kota` (`id_kota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `M_Prestasi_id_provinsi_foreign` FOREIGN KEY (`id_provinsi`) REFERENCES `m_provinsi` (`id_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `M_Prestasi_id_tingkat_foreign` FOREIGN KEY (`id_tingkat`) REFERENCES `m_tingkat` (`id_tingkat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `M_Prestasi_nis_siswa_foreign` FOREIGN KEY (`nis_siswa`) REFERENCES `m_siswa` (`nis_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `m_siswa`
--
ALTER TABLE `m_siswa`
  ADD CONSTRAINT `M_Siswa_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `m_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `User_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `m_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
