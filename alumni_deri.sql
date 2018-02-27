-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5169
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for alumni_deri
DROP DATABASE IF EXISTS `alumni_deri`;
CREATE DATABASE IF NOT EXISTS `alumni_deri` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `alumni_deri`;

-- Dumping structure for table alumni_deri.alumni
DROP TABLE IF EXISTS `alumni`;
CREATE TABLE IF NOT EXISTS `alumni` (
  `npm` char(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('LK','PR') NOT NULL,
  `photo` varchar(50) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `angkatan` char(4) NOT NULL,
  `tahun_lulus` char(4) NOT NULL,
  `periode_lulus` enum('1','2','3') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` char(15) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `judul_skripsi` varchar(200) NOT NULL,
  `tanggal_sidang` date NOT NULL,
  `id_status_pekerjaan` int(11) NOT NULL,
  `nama_instansi` varchar(200) DEFAULT NULL,
  `alamat_instansi` varchar(200) DEFAULT NULL,
  `id_waktu_tunggu` int(11) DEFAULT NULL,
  `aktif` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`npm`),
  KEY `FK_alumni_jurusan` (`id_jurusan`),
  KEY `FK_alumni_status_pekerjaan` (`id_status_pekerjaan`),
  CONSTRAINT `FK_alumni_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_alumni_status_pekerjaan` FOREIGN KEY (`id_status_pekerjaan`) REFERENCES `status_pekerjaan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table alumni_deri.alumni: ~0 rows (approximately)
/*!40000 ALTER TABLE `alumni` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumni` ENABLE KEYS */;

-- Dumping structure for table alumni_deri.berita
DROP TABLE IF EXISTS `berita`;
CREATE TABLE IF NOT EXISTS `berita` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(150) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(50) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `aktif` enum('Y','N') NOT NULL DEFAULT 'N',
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_berita_users` (`id_user`),
  CONSTRAINT `FK_berita_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table alumni_deri.berita: ~0 rows (approximately)
/*!40000 ALTER TABLE `berita` DISABLE KEYS */;
/*!40000 ALTER TABLE `berita` ENABLE KEYS */;

-- Dumping structure for table alumni_deri.fakultas
DROP TABLE IF EXISTS `fakultas`;
CREATE TABLE IF NOT EXISTS `fakultas` (
  `id_fakultas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_fakultas` varchar(100) NOT NULL,
  PRIMARY KEY (`id_fakultas`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table alumni_deri.fakultas: ~9 rows (approximately)
/*!40000 ALTER TABLE `fakultas` DISABLE KEYS */;
REPLACE INTO `fakultas` (`id_fakultas`, `nama_fakultas`) VALUES
	(1, 'Hukum'),
	(2, 'Agama Islam'),
	(3, 'Teknik'),
	(4, 'Pertanian'),
	(5, 'Ekonomi'),
	(6, 'FKIP'),
	(7, 'FISIPOL'),
	(8, 'Psikologi'),
	(9, 'Ilmu Komputer');
/*!40000 ALTER TABLE `fakultas` ENABLE KEYS */;

-- Dumping structure for table alumni_deri.gallery
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL,
  `npm_author` char(15) NOT NULL,
  `aktif` enum('1','0') NOT NULL,
  `nama_file` varchar(50) NOT NULL,
  PRIMARY KEY (`id_gallery`),
  KEY `FK_gallery_alumni` (`npm_author`),
  CONSTRAINT `FK_gallery_alumni` FOREIGN KEY (`npm_author`) REFERENCES `alumni` (`npm`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table alumni_deri.gallery: ~0 rows (approximately)
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;

-- Dumping structure for table alumni_deri.informasi
DROP TABLE IF EXISTS `informasi`;
CREATE TABLE IF NOT EXISTS `informasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isi` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `date_created` datetime NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `aktif` enum('Y','N') NOT NULL,
  `gambar` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_informasi_users` (`id_user`),
  CONSTRAINT `FK_informasi_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table alumni_deri.informasi: ~0 rows (approximately)
/*!40000 ALTER TABLE `informasi` DISABLE KEYS */;
/*!40000 ALTER TABLE `informasi` ENABLE KEYS */;

-- Dumping structure for table alumni_deri.jurusan
DROP TABLE IF EXISTS `jurusan`;
CREATE TABLE IF NOT EXISTS `jurusan` (
  `id_jurusan` int(11) NOT NULL AUTO_INCREMENT,
  `id_fakultas` int(11) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `tingkatan` char(2) NOT NULL,
  PRIMARY KEY (`id_jurusan`),
  KEY `FK_jurusan_fakultas` (`id_fakultas`),
  CONSTRAINT `FK_jurusan_fakultas` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table alumni_deri.jurusan: ~30 rows (approximately)
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
REPLACE INTO `jurusan` (`id_jurusan`, `id_fakultas`, `nama_jurusan`, `tingkatan`) VALUES
	(1, 1, 'Ilmu Hukum', 'S1'),
	(2, 2, 'Ekonomi Islam', 'S1'),
	(3, 2, 'Pendidikan Agama Islam', 'S1'),
	(4, 3, 'Teknik Sipil', 'S1'),
	(5, 3, 'Teknik Perminyakan', 'S1'),
	(6, 3, 'Teknik Mesin', 'S1'),
	(7, 3, 'Perencanaan Wilayah Dan Kota', 'S1'),
	(8, 3, 'Teknik Informatika', 'S1'),
	(9, 3, 'Teknik Geologi', 'S1'),
	(10, 4, 'Agroteknologi', 'S1'),
	(11, 4, 'Agribisnis', 'S1'),
	(12, 4, 'Budidaya Perairan', 'S1'),
	(13, 5, 'Ekonomi Pembangunan', 'S1'),
	(14, 5, 'Manajemen', 'S1'),
	(15, 5, 'Akuntansi', 'S1'),
	(16, 5, 'Akuntansi', 'D3'),
	(17, 6, 'Pendidikan Bahasa Dan Sastra Indonesia ', 'S1'),
	(18, 6, 'Pendidikan Bahasa Inggris', 'S1'),
	(19, 6, 'Pendidikan Matematika', 'S1'),
	(20, 6, 'Pendidikan Biologi', 'S1'),
	(21, 6, 'Pendidikan Jasmani, Kesehatan & Rekreasi', 'S1'),
	(22, 6, 'Pendidikan Seni Drama, Tari Dan Musik', 'S1'),
	(23, 6, 'Pendidikan Akuntansi', 'S1'),
	(24, 7, 'Ilmu Administrasi Negara', 'S1'),
	(25, 7, 'Ilmu Administrasi Niaga', 'S1'),
	(26, 7, 'Ilmu Pemerintahan ', 'S1'),
	(27, 7, 'Sekretari', 'D3'),
	(28, 7, 'Kriminologi', 'S1'),
	(29, 8, 'Psikologi', 'S1'),
	(30, 9, 'Ilmu Komunikasi', 'S1');
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;

-- Dumping structure for table alumni_deri.ket_waktu_tunggu
DROP TABLE IF EXISTS `ket_waktu_tunggu`;
CREATE TABLE IF NOT EXISTS `ket_waktu_tunggu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table alumni_deri.ket_waktu_tunggu: ~3 rows (approximately)
/*!40000 ALTER TABLE `ket_waktu_tunggu` DISABLE KEYS */;
REPLACE INTO `ket_waktu_tunggu` (`id`, `keterangan`) VALUES
	(1, '< 1 Tahun'),
	(2, '> 1 Tahun'),
	(3, '> 2 Tahun');
/*!40000 ALTER TABLE `ket_waktu_tunggu` ENABLE KEYS */;

-- Dumping structure for table alumni_deri.role
DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `id_role` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table alumni_deri.role: ~11 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
REPLACE INTO `role` (`id_role`, `nama`) VALUES
	(0, 'Admin BAAK'),
	(1, 'Admin Fakultas Hukum'),
	(2, 'Admin Fakultas Agama Islam'),
	(3, 'Admin Fakultas Teknik'),
	(4, 'Admin Fakultas Pertanian'),
	(5, 'Admin Fakultas Ekonomi'),
	(6, 'Admin FKIP'),
	(7, 'Admin FISIPOL'),
	(8, 'Admin Fakultas Psikologi'),
	(9, 'Admin Fakultas Ilmu Komputer'),
	(11, 'Alumni');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table alumni_deri.status_pekerjaan
DROP TABLE IF EXISTS `status_pekerjaan`;
CREATE TABLE IF NOT EXISTS `status_pekerjaan` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table alumni_deri.status_pekerjaan: ~3 rows (approximately)
/*!40000 ALTER TABLE `status_pekerjaan` DISABLE KEYS */;
REPLACE INTO `status_pekerjaan` (`id`, `keterangan`) VALUES
	(1, 'Tidak Bekerja'),
	(2, 'Bekerja'),
	(3, 'Lanjut Kuliah');
/*!40000 ALTER TABLE `status_pekerjaan` ENABLE KEYS */;

-- Dumping structure for table alumni_deri.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`),
  KEY `FK_users_role` (`id_role`),
  CONSTRAINT `FK_users_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table alumni_deri.users: ~10 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id_user`, `username`, `password`, `date_created`, `id_role`) VALUES
	(1, 'admin_baak', 'admin_baak', '2018-02-25 13:56:35', 0),
	(2, 'admin_hukum', 'admin_hukum', '2018-02-25 13:57:28', 1),
	(3, 'admin_fai', 'admin_fai', '2018-02-25 13:57:47', 2),
	(4, 'admin_teknik', 'admin_teknik', '2018-02-25 13:57:57', 3),
	(5, 'admin_pertanian', 'admin_pertanian', '2018-02-25 13:58:12', 4),
	(6, 'admin_ekonomi', 'admin_ekonomi', '2018-08-25 13:59:00', 5),
	(7, 'admin_fkip', 'admin_fkip', '2018-02-25 13:59:05', 6),
	(8, 'admin_fisipol', 'admin_fisipol', '2018-02-25 13:59:17', 7),
	(9, 'admin_psikologi', 'admin_psikologi', '2018-02-25 13:59:31', 8),
	(10, 'admin_ilkom', 'admin_ilkom', '2018-02-25 14:00:00', 9);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
