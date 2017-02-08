-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Agu 2016 pada 10.21
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sman1banjarsari`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `admin_user` varchar(25) NOT NULL,
  `admin_pass` varchar(50) NOT NULL,
  `admin_nama` varchar(30) NOT NULL,
  `admin_alamat` varchar(250) NOT NULL,
  `admin_telepon` varchar(15) NOT NULL,
  `admin_ip` varchar(12) NOT NULL,
  `admin_online` int(10) NOT NULL,
  `admin_level_kode` int(3) NOT NULL,
  `admin_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`admin_user`, `admin_pass`, `admin_nama`, `admin_alamat`, `admin_telepon`, `admin_ip`, `admin_online`, `admin_level_kode`, `admin_status`) VALUES
('kania', '98928d89c33969c35adc6836c8ff7151', 'Kania', 'Pangandaran', '08181', '', 0, 1, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_level`
--

CREATE TABLE `admin_level` (
  `admin_level_kode` int(3) NOT NULL,
  `admin_level_nama` varchar(30) NOT NULL,
  `admin_level_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin_level`
--

INSERT INTO `admin_level` (`admin_level_kode`, `admin_level_nama`, `admin_level_status`) VALUES
(1, 'Administrator', 'A'),
(2, 'Operator', 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `agenda_id` int(11) NOT NULL,
  `agenda_tema` varchar(100) NOT NULL,
  `agenda_deskripsi` text NOT NULL,
  `agenda_mulai` date NOT NULL,
  `agenda_selesai` date NOT NULL,
  `agenda_tempat` varchar(100) NOT NULL,
  `agenda_jam` varchar(50) NOT NULL,
  `agenda_gambar` varchar(100) DEFAULT NULL,
  `agenda_posting` datetime NOT NULL,
  `admin_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`agenda_id`, `agenda_tema`, `agenda_deskripsi`, `agenda_mulai`, `agenda_selesai`, `agenda_tempat`, `agenda_jam`, `agenda_gambar`, `agenda_posting`, `admin_nama`) VALUES
(1, 'Pelatiahan Guru SMAN 1 Banjarsari', '<p>\r\n	Pelatiahan Guru</p>\r\n', '2016-08-04', '2016-08-04', ' SMAN 1 Banjarsari', '09.00 WIB', '1470316824-bg.jpg', '2016-08-04 20:20:24', 'Kania'),
(2, 'Pelatihan Siswa kelas XI', '<p>\r\n	Pelatihan Siswa kelas XI</p>\r\n', '2016-08-04', '2016-08-04', ' SMAN 1 Banjarsari', '09.00 WIB', '1470316980-bg.jpg', '2016-08-04 20:23:00', 'Kania');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `berita_id` int(5) NOT NULL,
  `berita_judul` varchar(100) NOT NULL,
  `headline` enum('N','Y') NOT NULL DEFAULT 'N',
  `berita_deskripsi` text NOT NULL,
  `berita_waktu` datetime NOT NULL,
  `berita_gambar` varchar(100) NOT NULL,
  `berita_hits` int(3) NOT NULL,
  `tags` varchar(100) NOT NULL,
  `kategori_id` int(3) NOT NULL,
  `admin_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`berita_id`, `berita_judul`, `headline`, `berita_deskripsi`, `berita_waktu`, `berita_gambar`, `berita_hits`, `tags`, `kategori_id`, `admin_nama`) VALUES
(4, 'SMAN 1 Banjarsari mengikuti kurikulum 2013', 'N', '<p>\r\n	SMAN 1 Banjarsari mengikuti kurikulum 2013</p>\r\n', '2016-08-04 20:12:29', '1470316451-sman-1-banjarsari-mengikuti-kurikulum-2013.jpg', 3, '', 2, 'Kania'),
(5, 'Kepala sekolah SMAN 1 Banjarsari mendapatkan Penghargaan dari dinas pendidikan', 'N', '<p>\r\n	Kepala sekolah SMAN 1 Banjarsari mendapatkan Penghargaan dari dinas pendidikan</p>\r\n', '2016-08-04 20:14:59', '1470316499-kepala-sekolah-sman-1-banjarsari-mendapatkan-penghargaan-dari-dinas-pendidikan.jpg', 2, '', 2, 'Kania'),
(6, 'Siswa kelas X harap mengerjakan Tugas', 'N', '<p>\r\n	Siswa kelas X harap mengerjakan Tugas</p>\r\n', '2016-08-04 20:15:36', '1470316536-siswa-kelas-x-harap-mengerjakan-tugas.jpg', 0, '', 1, 'Kania'),
(7, 'Dana BOS sudah bisa dicairkan', 'N', '<p>\r\n	Dana BOS sudah bisa dicairkan</p>\r\n', '2016-08-04 20:17:08', '1470316628-dana-bos-sudah-bisa-dicairkan.jpg', 1, '', 1, 'Kania'),
(8, 'Pengumuman PPDB SMAN 1 Banjarsari', 'N', '<p>\r\n	Pengumuman PPDB SMAN 1 Banjarsari</p>\r\n', '2016-08-04 20:18:27', '1470316707-pengumuman-ppdb-sman-1-banjarsari.jpg', 0, '', 1, 'Kania');

-- --------------------------------------------------------

--
-- Struktur dari tabel `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` bigint(13) UNSIGNED NOT NULL,
  `captcha_time` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(2617, 1470315131, '::1', '8739'),
(2618, 1470315559, '::1', '5607'),
(2619, 1470315905, '::1', '2630');

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE `identitas` (
  `identitas_id` int(3) NOT NULL,
  `identitas_website` varchar(250) NOT NULL,
  `identitas_deskripsi` text NOT NULL,
  `identitas_keyword` text NOT NULL,
  `identitas_alamat` varchar(250) NOT NULL,
  `identitas_notelp` char(20) NOT NULL,
  `identitas_fb` varchar(100) NOT NULL,
  `identitas_email` varchar(100) NOT NULL,
  `identitas_tw` varchar(100) NOT NULL,
  `identitas_gp` varchar(100) NOT NULL,
  `identitas_yb` varchar(100) NOT NULL,
  `identitas_maps` varchar(50) NOT NULL,
  `identitas_favicon` varchar(250) NOT NULL,
  `identitas_author` varchar(100) NOT NULL,
  `identitas_warning` varchar(100) NOT NULL,
  `identitas_aktif` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`identitas_id`, `identitas_website`, `identitas_deskripsi`, `identitas_keyword`, `identitas_alamat`, `identitas_notelp`, `identitas_fb`, `identitas_email`, `identitas_tw`, `identitas_gp`, `identitas_yb`, `identitas_maps`, `identitas_favicon`, `identitas_author`, `identitas_warning`, `identitas_aktif`) VALUES
(1, 'SMAN 1 Banjarsari', 'SMAN 1 Banjarsari', 'SMAN 1 Banjarsari', 'Jl. SMAN 1 Banjarsari - Pangandaran', '087820033395', 'https://www.facebook.com/', 'info@sman1banjarsari.sch.id', 'https://twitter.com/', 'https://plus.google.com/', 'https://www.youtube.com/', '-6.8730588,107.5760094,20', '1470228781-SMAN 1 Banjarsari .jpg', 'www.nava.web.id', 'DEMO WEBSITE IS UP', '2016-09-09 11:18:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(3) NOT NULL,
  `kategori_judul` varchar(50) NOT NULL,
  `kategori_warna` varchar(20) NOT NULL,
  `admin_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_judul`, `kategori_warna`, `admin_nama`) VALUES
(1, 'Pengumuman', '006fff', 'Nava Gia Ginasta'),
(2, 'Berita', '09ff00', 'Nava Gia Ginasta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `menu_kode` int(11) NOT NULL,
  `menu_nama` varchar(50) NOT NULL,
  `menu_deskripsi` varchar(50) NOT NULL,
  `menu_url` varchar(255) NOT NULL,
  `menu_site` enum('A','H') NOT NULL DEFAULT 'A',
  `menu_level` char(1) NOT NULL,
  `menu_subkode` int(11) NOT NULL,
  `menu_urutan` int(2) NOT NULL,
  `menu_status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`menu_kode`, `menu_nama`, `menu_deskripsi`, `menu_url`, `menu_site`, `menu_level`, `menu_subkode`, `menu_urutan`, `menu_status`) VALUES
(1, 'Admin', 'Admin', 'admin', 'A', '1', 0, 1, 'A'),
(11, 'Daftar Menu', 'Informasi Daftar Menu', 'pengaturan/menu', 'A', '3', 162, 1, 'A'),
(13, 'Pengguna', 'Informasi Pengguna Aplikasi', '#', 'A', '3', 0, 2, 'A'),
(16, 'Daftar Pengguna', 'Daftar Pengguna', 'pengaturan/pengguna', 'A', '3', 162, 2, 'A'),
(19, 'Hak Akses Kelompok', 'Hak Akses Kelompok', 'pengaturan/hak_akses', 'A', '3', 162, 4, 'A'),
(79, 'Menu Utama', 'fa-list', '#', 'A', '2', 1, 4, 'A'),
(84, 'Agenda', 'Informasi Agenda', 'website/agenda', 'A', '3', 79, 6, 'A'),
(93, 'Public', 'Menu Public', '#', 'A', '1', 0, 0, 'A'),
(97, 'Kategori Berita', 'Informasi Kategori Berita', 'website/kategori', 'A', '3', 79, 1, 'A'),
(98, 'Berita', 'Informasi Berita', 'website/berita', 'A', '3', 79, 2, 'A'),
(99, 'Tags', 'Informasi Tags', 'website/tags', 'A', '3', 79, 3, 'A'),
(105, 'Modul Website', 'fa-laptop', '#', 'A', '2', 1, 3, 'A'),
(106, 'Identitas Website', 'fa-location-arrow', 'website/identitas/edit/1', 'A', '2', 1, 2, 'A'),
(110, 'Halaman Statis', 'Informasi Halaman Statis', 'website/halaman_statis', 'A', '3', 105, 2, 'A'),
(114, 'Home', '#', 'home', 'A', '2', 93, 1, 'A'),
(120, 'Agenda', 'Agenda', 'agenda', 'A', '2', 93, 6, 'A'),
(122, 'Profil', '#', '#', '', '2', 93, 2, 'A'),
(123, 'Berita', 'Berita', 'news', 'A', '2', 93, 8, 'A'),
(125, 'Kontak', 'Kontak', 'pages/contact_us', 'A', '2', 93, 10, 'A'),
(126, 'Sambutan Kepala Sekolah', 'Sambutan Kepala Sekolah', 'pages/detail/2016/1', 'A', '3', 122, 1, 'A'),
(127, 'Fasilitas', 'Fasilitas', 'pages/detail/2016/2', 'A', '3', 122, 2, 'A'),
(160, 'Dashboard', 'fa-home', 'admin', 'A', '2', 1, 1, 'A'),
(162, 'Setting', 'fa-cogs', '#', 'A', '2', 1, 10, 'A'),
(168, 'Prestasi', 'Prestasi', 'prestasi', 'A', '2', 93, 5, 'A'),
(169, 'Organisasi', 'Organisasi', 'pages/detail/2016/3', 'H', '2', 93, 3, 'A'),
(170, 'E-learning', 'E-learning', 'http://sman1banjarsari.sch.id/elearning', 'H', '2', 93, 5, 'H'),
(171, 'PPDB Online', 'PPDB Online', 'http://sman1banjarsari.sch.id/index.php/ppdb-online/pendaftaran', 'H', '2', 93, 6, 'H'),
(172, 'Kontak', 'Kontak', 'pages/contact_us', 'A', '2', 93, 8, 'A'),
(173, 'Prestasi', 'fa fa-university', 'website/prestasi', 'A', '2', 1, 3, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_admin`
--

CREATE TABLE `menu_admin` (
  `menu_admin_kode` int(11) NOT NULL,
  `menu_kode` int(11) NOT NULL,
  `admin_level_kode` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu_admin`
--

INSERT INTO `menu_admin` (`menu_admin_kode`, `menu_kode`, `admin_level_kode`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 7, 1),
(14, 79, 1),
(16, 84, 1),
(24, 80, 1),
(30, 11, 1),
(31, 13, 1),
(32, 16, 1),
(33, 17, 1),
(34, 18, 1),
(35, 19, 1),
(36, 94, 1),
(96, 96, 1),
(102, 9, 5),
(111, 1, 2),
(112, 79, 2),
(210, 95, 1),
(211, 9, 2),
(212, 3, 2),
(213, 84, 2),
(214, 79, 3),
(215, 84, 3),
(217, 98, 1),
(218, 99, 1),
(219, 100, 1),
(220, 101, 1),
(221, 102, 1),
(222, 103, 1),
(223, 104, 1),
(224, 105, 1),
(225, 106, 1),
(226, 107, 1),
(227, 108, 1),
(228, 109, 1),
(229, 110, 1),
(230, 111, 1),
(231, 157, 1),
(232, 158, 1),
(234, 98, 2),
(235, 100, 2),
(236, 101, 2),
(237, 103, 2),
(249, 105, 2),
(250, 108, 2),
(251, 9, 4),
(252, 79, 4),
(254, 98, 4),
(255, 100, 4),
(256, 84, 4),
(257, 101, 4),
(258, 103, 4),
(259, 104, 4),
(260, 105, 4),
(261, 108, 4),
(262, 1, 4),
(263, 3, 4),
(264, 160, 1),
(265, 97, 1),
(266, 161, 1),
(267, 162, 1),
(269, 164, 1),
(270, 160, 5),
(271, 106, 5),
(272, 167, 1),
(273, 160, 6),
(274, 97, 2),
(275, 160, 2),
(276, 173, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `prestasi`
--

CREATE TABLE `prestasi` (
  `prestasi_id` int(3) NOT NULL,
  `prestasi_nis` varchar(10) NOT NULL,
  `prestasi_nama` varchar(100) NOT NULL,
  `prestasi_jk` enum('L','P') NOT NULL DEFAULT 'L',
  `prestasi_penghargaan` varchar(250) NOT NULL,
  `tahun_id` int(3) NOT NULL,
  `prestasi_foto` varchar(100) NOT NULL,
  `prestasi_angka` varchar(5) NOT NULL,
  `prestasi_post` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`prestasi_id`, `prestasi_nis`, `prestasi_nama`, `prestasi_jk`, `prestasi_penghargaan`, `tahun_id`, `prestasi_foto`, `prestasi_angka`, `prestasi_post`) VALUES
(1, '1144096', 'Nava Gia Ginasta', 'L', 'JUARA I WEB DESIGN TINGKAT PROVINSI', 4, '1470323524-bg.jpg', '1', '2016-08-04 00:00:00'),
(2, '1144038', 'Kania Kustiani', 'P', 'JUARA HARAPAN MENYANYI', 4, '1470323535-slide-2.jpg', '1', '2016-08-04 00:00:00'),
(3, '1144090', 'Ervina Sahrati Rangkuti', 'P', 'JUARA I LOMBA MENGGAMBAR', 5, '1470323546-slide-1.jpg', '1', '2016-08-04 00:00:00'),
(5, '114407111', 'Anggi Sholihatus Sadiah1', 'P', 'JUARA 1 WEB APP1', 3, '1470322753-SMAN 1 Banjarsari .jpg', '1', '2016-08-04 21:59:13'),
(6, '1144072', 'Firma Rasyid', 'L', 'JUARA I BASKET', 2, '1470323648-SMAN 1 Banjarsari .jpg', '1', '2016-08-04 22:14:08'),
(7, '1144073', 'M.Ramadhan', 'L', 'JUARA I PASTCODING', 4, '1470323692-SMAN 1 Banjarsari .jpg', '1', '2016-08-04 22:14:52'),
(8, '1144074', 'Ketut Adi', 'L', 'JUARA I IOT', 2, '1470323763-SMAN 1 Banjarsari .jpg', '1', '2016-08-04 22:16:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('0e1557f01a871aeab0ca692efacdc157', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.106 Safari/537.36', 1470386406, ''),
('ebf3cd2a566131323faf69fbd6ca5816', '0.0.0.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.106 Safari/537.36', 1470327719, 'a:4:{s:10:"admin_nama";s:5:"Kania";s:10:"admin_user";s:5:"kania";s:11:"admin_level";s:1:"1";s:9:"logged_in";b:1;}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statis`
--

CREATE TABLE `statis` (
  `statis_id` int(5) NOT NULL,
  `statis_judul` varchar(100) NOT NULL,
  `statis_deskripsi` text NOT NULL,
  `statis_gambar` varchar(100) NOT NULL,
  `statis_status` enum('N','Y') NOT NULL,
  `statis_waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `statis`
--

INSERT INTO `statis` (`statis_id`, `statis_judul`, `statis_deskripsi`, `statis_gambar`, `statis_status`, `statis_waktu`) VALUES
(1, 'Sambutan Kepala Sekolah', 'Pada bulan Desember ini Sekretariat Balitbang Kemdikbud akan mengadakan pelatihan CMS Balitbang secara on-line, pelatihan ini dilaksanakan sebagai salah satu perwujudan upaya peningkatan kuantitas dan kualitas layanan Badan Penelitian dan Pengembangan Kemdikbud kepada publik. Pelatihan on-line ini dimaksudkan untuk memangkas kendala keterbatasan dari model pelatihan reguler.\r\n\r\nBila model pelatihan tetap dilaksanakan secara reguler seperti pada saat pembangunan sistem, dengan asumsi anggaran yang tersedia sekitar 500 juta rupiah per tahun untuk melatih 50 sekolah, sementara cakupannya adalah seluruh sekolah (sekitar 300 ribu sekolah) mendapatkan pelatihan, maka waktu yang diperlukan untuk menyelesaikan pelatihan kepada seluruh sekolah tersebut adalah 6000 (enam ribu) tahun dengan biaya sekitar Rp 3 trilyun (Rp 10 juta/sekolah) tanpa menghitung faktor inflasi.\r\n\r\nSementara itu, bila dilihat dari data pengguna CMS Balitbang sampai dengan akhir tahun 2012, terdapat sekitar 3000 sekolah yang menggunakanya atau rata-rata pertumbuhan penggunanya adalah 1000 sekolah per tahun, sehingga untuk mencapai sekitar 300 ribu sekolah akan dibutuhkan waktu sekitar 300 tahun.\r\n\r\nUntuk itulah, mulai tahun 2013 pelatihan pembuatan website sekolah (CMS Balitbang) dilakukan dengan model on-line. Penggunaan model on-line ini diharapkan dapat mengapai seluruh sekolah dalam waktu yang tidak terlalu lama.\r\n\r\nDengan gambaran seperti di atas, pelatihan secara on-line ini akan dapat memenuhi azas efisiensi, efektivitas, dan akuntabilitas, sekaligus memenuhi unsur keadilan. Sedangkan motto yang meng-ilhami pelatihan ini adalah: “mudahkanlah, jangan dipersulit!” dan “Membuat Website Sekolah? MUDAH!”\r\n\r\nPendaftaran peserta pelatihan cms Balitbang on-line ini akan ditutup pada tanggal 16 Desember 2013.\r\n\r\nSemoga dengan adanya pelatihan on-line ini menjawab berbagai pertanyaan tentang pembuatan website sekolah menggunakan cms Balitbang dan memberikan kesempatan kepada sekolah yang belum memiliki website serta tidak berkesempatan mengikuti pelatihan pembuatan website sekolah untuk ikut berpartisipasi mendaftar. Karena tidak ada jumlah batasan peserta dalam pelatihan ini.\r\n\r\nJangan lewatkan.... kesempatan yang baik ini, segera daftarkan diri dan sekolah Anda\r\n\r\nSalam asah, asih dan asuh\r\n\r\nTim Portal Balitang', '', 'N', '2016-08-03 21:01:14'),
(2, 'Fasilitas', 'Fasilitas belajar merupakan sarana dan prasarana pembelajaran. Prasarana meliputi gedung sekolah, ruang belajar, lapangan olahraga, ruang ibadah, ruang kesenian dan peralatan olah raga. Sarana pembelajaran meliputi buku pelajaran, buku bacaan, alat dan fasilitas laboraturium sekolah dan berbagai media pembelajaran yang lain.\r\n\r\nSedangkan menurut H. M Daryanto (2006: 51) secara etimologi (arti kata) fasilitas yang terdiri dari sarana dan prasarana belajar, bahwa sarana belajar adalah alat langsung untuk mencapai tujuan pendidikan, misalnya lokasi/tempat, bangunan dan lain-lain,  sedangkan prasarana adalah alat yang tidak langsung untuk mencapai tujuan pendidikan, misalnya ruang, buku, perpustakaan, laboraturium dan sebagainya.\r\n \r\nBerdasarkan pengertian diatas dapat disimpulkan bahwa fasilitas belajar adalah sarana dan prasarana yang digunakan untuk menunjang kegiatan belajar untuk mencapai tujuan pendidikan.\r\n \r\n\r\nMacam-macam Fasilitas Belajar\r\nFasilitas belajar merupakan sarana dan prasarana yang dapat menunjang kelancaran proses belajar baik di rumah maupun di sekolah. Dengan adanya fasilitas belajar yang memadai maka kelancaran dalam belajar akan dapat terwujud. Kaitannya dengan fasilitas belajar, Slameto (2003: 63) mengemukakan bahwa:\r\n\r\nAnak yang sedang belajar selain harus terpenuhi kebutuhan pokoknya, misal makan, pakaian, perlindungan kesehatan dan lain-lain, juga membutuhkan fasilitas belajar seperti ruang belajar, meja, kursi, penerangan, alat tulis-menulis, buku-buku dan lain-lain. Fasilitas belajar itu hanya dapat terpenuhi jika keluarga mempunyai cukup uang.\r\n\r\nBerdasarkan pengertian di atas dapat diketahui bahwa fasilitas belajar erat kaitannya dengan kondisi ekonomi orang tua siswa. Dengan kondisi ekonomi orang tua yang baik, maka orang tua akan lebih mempunyai kemampuan untuk mencukupi kebutuhan anaknya termasuk dalam hal penyediaan fasilitas belajar di rumah yang memadai.\r\n \r\nBegitu juga dengan pemenuhan kelengkapan fasilitas di sekolah, jika sekolah memiliki kemampuan keuangan yang baik, maka kelengkapan fasilitas penunjang kegiatan belajar siswa dapat terpenuhi dengan baik. Semakin lengkap fasilitas belajar, akan semakin mempermudah dalam melakukan kegiatan belajar.\r\nSebagaimana dikemukakan oleh S. Nasution (2005: 76) bahwa:\r\n\r\nUntuk memperbaiki mutu pengajaran harus di dukung oleh berbagai fasilitas, sumber belajar dan tenaga pembantu antara lain diperlukan sumber-sumber dan alat-alat yang cukup untuk memungkinkan murid belajar secara individual. Antara lain diperlukan sumber-sumber dan alat-alat yang cukup untuk memungkinkan murid belajar secara individual.    \r\n\r\nDengan demikian, adanya fasilitas belajar yang lengkap diharapkan akan terjadi perubahan, misalnya dengan sekolah menyediakan fasilitas belajar yang lengkap, siswa akan lebih bersemangat dalam belajar, siswa tidak perlu meminjam ataupun menggantungkan tugasnya pada teman, karena ia dapat mengerjakan tugasnya sendiri dengan bantuan fasilitas yang telah disediakan.\r\n \r\nKetersediaan fasilitas belajar di sekolah yang lengkap dan memadai juga merupakan indikasi atau syarat menjadi sekolah yang efektif. Sekolah yang efektif sendiri menurut Levine dalam Burhanuddin Tola   dan Furqon (2008)dapat diartikan sebagai sekolah yang menunjukkan tingkat kinerja yang diharapkan dalam menyelenggarakan proses belajarnya, dengan menunjukkan hasil belajar yang bermutu pada peserta didik sesuai dengan tugas pokoknya.\r\n \r\nPada akhirnya konsep sekolah efektif ini berkaitan langsung dengan mutu kinerja sekolah. Sebagaimana dikemukakan oleh Satori dalam Burhanuddin Tola dan Furqon (2008), bahwamutu pendidikan (MP) di sekolah merupakan fungsi dari mutu input peserta didik yang ditunjukkan oleh potensi siswa (PS), mutu pengalaman belajar yang ditunjukkan oleh kemampuan profesional guru (KP), mutu penggunaan fasilitas belajar (FB), dan budaya sekolah (BS) yang merupakan refleksi mutu kepemimpinan kepala sekolah. Pernyataan tersebut dapat dirumuskan dalam formula sebagai berikut: MP = f (PS.KP.FB.BS)\r\n \r\nFasilitas belajar yang dimaksudkan dalam pernyataan tersebut adalah menyangkut ketersediaan hal-hal yang dapat memberikan kemudahan bagi perolehan pengalaman belajar yang efektif dan efisien.  Fasilitas belajar yang sangat penting adalah laboratorium yang memenuhi syarat bengkel kerja, perpustakaan, komputer, dan kondisi fisik lainnya yang secara langsung mempengaruhi kenyamanan belajar.\r\n \r\nBerdasarkan penjelasan di atas dapat ditarik kesimpulan bahwa adanya fasilitas belajar yang lengkap dan memadai merupakan salah satu faktor dari mutu kinerja sekolah yang efektif. Sekolah akan menjadi sekolah yang mempunyai mutu baik jika dalam penyelengaraan kegiatan belajarnya tidak hanya didukung oleh potensi siswa, kemampuan guru dalam mengajar ataupun oleh lingkungan sekolah, akan tetapi juga harus didukung adanya kelengkapan fasilitas belajar siswa yang memadai sehingga penggunaannya akan menunjang kemudahan siswa dalam kegiatan belajarnya.\r\n \r\nDalam Keputusan Menteri P dan K No. 079/1975, fasilitas belajar terdiri dari 3 kelompok besar yaitu:\r\n\r\n1. Bangunan dan perabot sekolah\r\nBangunan di sekolah pada dasarnya harus sesuai dengan kebutuhan pendidikan dan harus layak untuk ditempati siswa pada proses kegiatan belajar mengajar di sekolah. Bangunan sekolah terdiri atas berbagai macam ruangan. Secara umum jenis ruangan ditinjau dari fungsinya dapat dikelompokkan dalam ruang pendidikan untuk menampung proses kegiatan belajar mengajar baik teori maupun praktek, ruang administrasi untuk proses administrasi sekolah dan berbagai kegiatan kantor, dan ruang penunjang untuk kegiatan yang mendukung proses belajar mengajar. Sedangkan perabot sekolah yang pada umumnya terdiri dari berbagai jenis mebel, harus dapat mendukung semua semua kegiatan yang berlangsung di sekolah, baik kegiatan belajar mengajar maupun kegiatan administrasi sekolah.\r\n \r\n2. Alat pelajaran\r\nAlat pelajaran yang dimaksudkan disini adalah alat peraga dan buku-buku bahan ajar. Alat peraga berfungsi untuk memperlancar dan memperjelas komunikasi dalam proses belajar mengajar antara guru dan siswa. Buku-buku pelajaran yang digunakan dalam kegiatan belajar mengajar, biasanya terdiri dari buku pegangan, buku pelengkap, dan buku bacaan.\r\n\r\n3. Media pendidikan\r\nMedia pengajaran merupakan sarana non personal yang digunakan atau disediakan oleh tenaga pengajar yang memegang peranan dalam proses belajar untuk mencapai tujuan instruksional. Media pengajaran dapat dikategorikan dalam media visual yang menggunakan proyeksi, media auditif, dan media kombinasi.', '', 'N', '2016-08-03 21:02:39'),
(3, 'Organisasi', '<p>\r\n	Organisasi</p>\r\n', '', 'N', '2016-08-03 21:12:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(5) NOT NULL,
  `tag_judul` varchar(50) NOT NULL,
  `tag_seo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_judul`, `tag_seo`) VALUES
(3, 'Pengumuman', 'pengumuman'),
(4, 'Quiz', 'quiz');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE `tahun` (
  `tahun_id` int(3) NOT NULL,
  `tahun_nama` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun`
--

INSERT INTO `tahun` (`tahun_id`, `tahun_nama`) VALUES
(2, '2012'),
(3, '2013'),
(4, '2014'),
(5, '2015'),
(6, '2016');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_user`),
  ADD KEY `admin_level_kode` (`admin_level_kode`);

--
-- Indexes for table `admin_level`
--
ALTER TABLE `admin_level`
  ADD PRIMARY KEY (`admin_level_kode`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`agenda_id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `captcha`
--
ALTER TABLE `captcha`
  ADD PRIMARY KEY (`captcha_id`),
  ADD KEY `word` (`word`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`identitas_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_kode`);

--
-- Indexes for table `menu_admin`
--
ALTER TABLE `menu_admin`
  ADD PRIMARY KEY (`menu_admin_kode`),
  ADD KEY `menu_kode` (`menu_kode`),
  ADD KEY `admin_level_kode` (`admin_level_kode`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`prestasi_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `statis`
--
ALTER TABLE `statis`
  ADD PRIMARY KEY (`statis_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`tahun_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_level`
--
ALTER TABLE `admin_level`
  MODIFY `admin_level_kode` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `agenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `berita_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `captcha`
--
ALTER TABLE `captcha`
  MODIFY `captcha_id` bigint(13) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2620;
--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `identitas_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `menu_admin`
--
ALTER TABLE `menu_admin`
  MODIFY `menu_admin_kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;
--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `prestasi_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `statis`
--
ALTER TABLE `statis`
  MODIFY `statis_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `tahun_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`admin_level_kode`) REFERENCES `admin_level` (`admin_level_kode`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
