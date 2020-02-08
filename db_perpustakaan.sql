-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 08 Feb 2020 pada 05.24
-- Versi server: 5.7.24
-- Versi PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_anggota` enum('Active','Non Active') NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_user`, `status_anggota`, `nama_anggota`, `email`, `telepon`, `instansi`, `username`, `password`, `tanggal`) VALUES
(1, 1, 'Active', 'Juned', 'Juned@gmail.com', '085433636434', 'PT. Subur Ga Makmur', 'juned', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2020-02-08 13:23:52'),
(2, 1, 'Active', 'Asep F', 'asep@gmail.com', '087653134543', 'PT. word media', 'asep', '123456', '2020-02-08 13:24:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahasa`
--

CREATE TABLE `bahasa` (
  `id_bahasa` int(11) NOT NULL,
  `kode_bahasa` varchar(3) NOT NULL,
  `nama_bahasa` varchar(50) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bahasa`
--

INSERT INTO `bahasa` (`id_bahasa`, `kode_bahasa`, `nama_bahasa`, `keterangan`, `urutan`, `tanggal`) VALUES
(1, 'ID', 'Bahasa Indonesia', 'Bahasa Indonesa, Bahasa Melayu', 1, '2018-08-22 09:34:21'),
(2, 'EN', 'Bahasa Inggris', 'Bahasa Inggris(us/uk)', 2, '2018-08-25 06:06:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status_berita` enum('Publish','Draft') NOT NULL,
  `jenis_berita` enum('Berita','Slider') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `slug_berita`, `judul_berita`, `isi`, `gambar`, `status_berita`, `jenis_berita`, `tanggal`) VALUES
(7, 1, 'apa-itu-membaca', 'Apa itu Membaca ?', '<p><strong style=\"color: #222222; font-family: sans-serif;\">Membaca</strong><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;adalah kegiatan meresepsi, menganalisis, dan menginterpretasi yang dilakukan oleh pembaca untuk memperoleh pesan yang hendak disampaikan oleh penulis dalam media tulisan.</span><span style=\"color: #222222; font-family: sans-serif;\">Kegiatan membaca meliputi membaca nyaring dan membaca dalam hati.</span><sup id=\"cite_ref-&rdquo;rujukan1&rdquo;_1-1\" class=\"reference\" style=\"line-height: 1em; unicode-bidi: isolate; white-space: nowrap; color: #222222; font-family: sans-serif;\"></sup><span style=\"color: #222222; font-family: sans-serif;\">Membaca nyaring adalah kegiatan membaca yang dilakukan dengan cara membaca keras-keras di depan umum.<span style=\"font-size: 11.6667px; white-space: nowrap;\">&nbsp;</span></span><span style=\"color: #222222; font-family: sans-serif;\">Sedangkan kegiatan membaca dalam hati adalah kegiatan membaca dengan saksama yang dilakukan untuk mengrti dan memahami maksud atau tujuan penulis dalam media tertulis.</span></p>\r\n<p><strong>Sumber</strong>:&nbsp;<em><span style=\"color: #006621; font-family: arial, sans-serif; white-space: nowrap;\">https://id.wikipedia.org/wiki/Membaca</span></em></p>', 'logo-book-green.jpg', 'Publish', 'Berita', '2018-08-29 05:00:57'),
(8, 2, 'sejarah-javascript', 'Sejarah Javascript', '<p>JavaScript pertama kali dikembangkan oleh&nbsp;<a class=\"new\" title=\"Brendan Eich (halaman belum tersedia)\" href=\"https://id.wikipedia.org/w/index.php?title=Brendan_Eich&amp;action=edit&amp;redlink=1\">Brendan Eich</a>&nbsp;dari Netscape di bawah nama&nbsp;<em>Mocha</em>, yang nantinya namanya diganti menjadi&nbsp;<em>LiveScript, dan akhirnya menjadi JavaScript.&nbsp;</em><sup id=\"cite_ref-computerworld_7-0\" class=\"reference\"></sup><em>Navigator</em>&nbsp;sebelumnya telah mendukung Java untuk lebih bisa dimanfaatkan para&nbsp;<a class=\"mw-redirect\" title=\"Programmer\" href=\"https://id.wikipedia.org/wiki/Programmer\">programmer</a>&nbsp;yang non-Java.&nbsp;<sup id=\"cite_ref-zaki_8-0\" class=\"reference\"></sup>Maka dikembangkanlah bahasa pemrograman bernama&nbsp;<em>LiveScript</em>&nbsp;untuk mengakomodasi hal tersebut.&nbsp;<sup id=\"cite_ref-zaki_8-1\" class=\"reference\"></sup>&nbsp;Bahasa pemrograman inilah yang akhirnya berkembang dan diberi nama JavaScript, walaupun tidak ada hubungan bahasa antara Java dengan JavaScript.<sup id=\"cite_ref-zaki_8-2\" class=\"reference\"></sup></p>\r\n<p>JavaScript bisa digunakan untuk banyak tujuan, misalnya untuk membuat efek&nbsp;<em>rollover</em>&nbsp;baik di gambar maupun teks, dan yang penting juga adalah untuk membuat&nbsp;<a title=\"AJAX\" href=\"https://id.wikipedia.org/wiki/AJAX\">AJAX</a>.&nbsp;<sup id=\"cite_ref-zaki_8-3\" class=\"reference\"></sup>JavaScript adalah bahasa yang digunakan untuk AJAX.<sup id=\"cite_ref-zaki_8-4\" class=\"reference\"></sup></p>\r\n<p><strong>Sumber:</strong><em> https://id.wikipedia.org/wiki/JavaScript</em></p>', 'modern-library-with-bookshelf-illustration_1262-16576.jpg', 'Publish', 'Slider', '2019-02-13 12:43:00'),
(9, 2, 'apa-manfaat-membaca', 'Apa Manfaat Membaca ?', '<p>Berikut ini beberapa manfaat membaca buku yang bisa kita dapatkan selain mempercerdas otak. diantaranya:</p>\r\n<p><strong>1. Dapat Menstimulasi Mental</strong></p>\r\n<p>Otak merupakan salah satu organ tubuh yang memrlukan latihan agar tetap kuat dan sehat seperti organ tubuh yang lainnya. Dengan membaca buku dapat menjaga otak agar bisa tetap aktif sehingga dapat melakukan fungsinya secara baik dan benar. Beberapa penelitian telah menunjukkan bahwa dengan membaca buku dapat merangsang mental bahkan dapat mencegah penyakit Alzheimer dan demensia.</p>\r\n<p><strong>2. Dapat Mengurangi Stress</strong></p>\r\n<p>Setelah seharian melakukan rutinitas harian yang melelahkan, tak jarang hal tersebut dapat memicu timbulnya stress. Dengan melakukan kegiatan membaca yang bisa dilakukan selama beberapa menit dapat membantu menekan perkembangan hormon stress seperti hormon kortisol. Dengan membaca dapat membuat pikiran lebih santai sehingga hal tersebut dapat membantu menurunkan tingkat stress hingga 67%.</p>\r\n<p>Selain relaksasi, dengan membaca buku dapat membawa kedamaian batin serta ketenangan yang sangat besar. Membaca dapat menurunkan tekanan darah serta telah terbukti membantu orang yang menderita gangguan mood tertentu dan penyakit mental ringan. Inilah manfaat membaca buku yang banyak orang abaikan, banyak orang beanggapan bahwa membaca buku justru membuat otak terus bekerja dan menimbulkan stres, padahal manfaat membaca buku adalah mengurangi stres.</p>\r\n<p><strong>3. Menambah Wawasan dan Pengetahuan</strong></p>\r\n<p>Dengan membaca buku dapat mengisi kepala kita tentang berbagai macam informasi baru yang selama ini belum kita ketahui yang kemungkinan besar hal tersebut dapat berguna bagi kita nantinya. Semakin banyak pengetahuan yang kita miliki, maka kita akan lebih siap untuk menghadapi tantangan hidup baik dimasa sekarang maupun di masa-masa yang akan datang.</p>\r\n<p>Selain itu, ilmu pengetahuan merupakan hal yang sangat berharga yang tidak pernah dapat hilang meskipun kita kehilangan hal-hal lain didunia ini, seperti harta, benda, maupun yang lainnya.&nbsp;Cerita maupun ide-ide yang tertuang dalam sebuah buku yang kita baca dapat membantu untuk membuka jalan pikiran kita untuk lebih mengenal dunia lain, mendapatkan pemahama yang lebih dari sebelumnya.</p>', 'slider4.png', 'Publish', 'Slider', '2019-02-13 12:41:11'),
(10, 2, 'perpustakaan-itu-tempat-apa-sih', 'Perpustakaan itu tempat apa sih ?', '<p><span class=\"ILfuVd\">Dalam arti tradisional, <strong>perpustakaan</strong> adalah sebuah koleksi buku dan majalah. ... Oleh karena itu <strong>perpustakaan</strong> modern telah didefinisikan kembali sebagai <strong>tempat</strong> untuk mengakses informasi dalam format apapun, apakah informasi itu disimpan dalam gedung <strong>perpustakaan</strong> tersebut ataupun tidak.</span></p>', 'visisumeks1.jpg', 'Publish', 'Slider', '2019-02-13 12:38:35'),
(11, 2, 'welcome', 'Welcome', '<p><strong>Selamat Datang Di Perpustakaan Online</strong></p>', 'slider-1.png', 'Publish', 'Slider', '2019-02-13 12:36:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_bahasa` int(11) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penulis_buku` varchar(255) NOT NULL,
  `subyek_buku` varchar(255) DEFAULT NULL,
  `letak_buku` varchar(50) DEFAULT NULL,
  `kode_buku` varchar(50) DEFAULT NULL,
  `kolasi` int(11) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `nomor_seri` varchar(50) DEFAULT NULL,
  `status_buku` enum('Publish','Not Publish','Missing') DEFAULT NULL,
  `ringkasan` text,
  `cover_buku` varchar(255) DEFAULT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `tanggal_entri` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `id_user`, `id_jenis`, `id_bahasa`, `judul_buku`, `penulis_buku`, `subyek_buku`, `letak_buku`, `kode_buku`, `kolasi`, `penerbit`, `tahun_terbit`, `nomor_seri`, `status_buku`, `ringkasan`, `cover_buku`, `jumlah_buku`, `tanggal_entri`, `tanggal`) VALUES
(7, 1, 5, 1, 'Kode HTML FULL', 'Rio Astamal', 'HTML', '', 'HTML ', 0, '-', 2005, '004', 'Publish', 'Buku ini ditujukan bagi anda yang belum mengenal sama sekali kode HTML atau sudah\r\nmengetahui HTML secara garis besar dan ingin menambah kemampuan.', 'large_html-css-logo.jpg', 0, '2018-08-26 09:59:59', '2018-08-29 04:50:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `file_buku`
--

CREATE TABLE `file_buku` (
  `id_file_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `judul_file` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file_buku`
--

INSERT INTO `file_buku` (`id_file_buku`, `id_user`, `id_buku`, `judul_file`, `nama_file`, `keterangan`, `urutan`, `tanggal`) VALUES
(1, 2, 4, 'Bab 1 Pendahuluan', 'topologi_jaringan.pdf', 'Tutorial Untuk Pemula', 1, '2018-08-25 03:55:57'),
(2, 2, 2, 'Bab 1', 'laporan_siswa_20180815.pdf', 'Tutorial Untuk Pemula', 1, '2018-08-25 03:47:47'),
(3, 2, 7, 'Kode HTML', 'Kode_HTML_-_Full.pdf', '', 1, '2018-08-28 06:35:36'),
(4, 2, 6, 'cara cepat dan mudah menguasai css', 'cara_cepat_dan_mudah_menguasai_css.pdf', '', 1, '2018-08-28 06:44:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `kode_jenis` varchar(28) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `kode_jenis`, `nama_jenis`, `keterangan`, `urutan`, `tanggal`) VALUES
(1, 'JS', 'Menguasai Javascript dalam Sehari', 'Web Programming', 1, '2018-08-22 09:23:46'),
(3, 'PHP', 'Belajar PHP Dasar', 'Web Programming', 2, '2018-08-22 09:35:14'),
(4, 'CI', 'Tutorial Code Igniter', 'Tutorial CI Pemula', 3, '2018-08-25 06:04:40'),
(5, 'HTML - CSS', 'HTML & CSS', 'Web Proggramming', 4, '2018-08-28 06:34:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `map` text,
  `metatext` text,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `max_hari_peminjaman` int(11) DEFAULT NULL,
  `max_jumlah_peminjaman` int(11) DEFAULT NULL,
  `denda_perhari` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `id_user`, `namaweb`, `tagline`, `deskripsi`, `keywords`, `email`, `website`, `logo`, `icon`, `facebook`, `twitter`, `instagram`, `map`, `metatext`, `telepon`, `alamat`, `max_hari_peminjaman`, `max_jumlah_peminjaman`, `denda_perhari`, `tanggal`) VALUES
(1, 2, 'Perpustakaan Online', 'Membaca dan Meminjam Dimanapun dan Kapanpun', '', 'perpus, buku, membaca dan lain-lain', 'aqklyhermawan@gmail.com', 'http://perpusku.rf.gd', 'baca.jpg', 'layanan_perpus.png', 'http://facebook.com/aqkli.hermawan', 'http://twitter.com/', 'http://instagram.com/aqli.hermawan', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15852.321488140424!2d107.3853579725853!3d-6.636940823212416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6905d5e8591d2d%3A0xe7f974027e8b0e84!2sBekam+Ruqyah+Center+(BRC)+Purwakarta!5e0!3m2!1sid!2sid!4v1535356701722\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '', '085221151731', 'Jl.Warung Kandang', 3, 2, 1000, '2019-02-13 12:24:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `link`
--

CREATE TABLE `link` (
  `id_link` int(11) NOT NULL,
  `nama_link` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `link`
--

INSERT INTO `link` (`id_link`, `nama_link`, `url`, `target`, `tanggal`) VALUES
(1, 'Perpusku', 'http://perpusku.rf.gd', '_blank', '2018-08-29 05:01:30'),
(2, 'Perpustakaan Online - Perpustakaan Nasional', 'http://www.pnri.go.id', '_blank', '2018-08-29 05:02:08'),
(3, 'Layanan Online - Perpustakaan ITB', 'https://lib.itb.ac.id/layanan-online', '_blank', '2018-08-29 05:04:02'),
(4, 'Perpustakaan – Universitas Gadjah Mada', 'http://lib.ugm.ac.id/', '_blank', '2018-08-29 05:04:51'),
(5, 'Perpusnas Digital Library', 'http://ipusnas.id/', '_blank', '2018-08-29 05:05:42'),
(6, 'Perpustakaan Digital – Universitas Terbuka', 'http://pustaka.ut.ac.id', '_blank', '2018-08-29 05:06:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `keterangan` text NOT NULL,
  `status_kembali` enum('Belum','Sudah','Hilang','') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `id_anggota`, `id_user`, `tanggal_pinjam`, `tanggal_kembali`, `keterangan`, `status_kembali`, `tanggal`) VALUES
(1, 4, 1, 2, '2018-10-03', '2018-10-17', '', 'Sudah', '2018-08-28 05:59:25'),
(3, 5, 2, 2, '2018-08-30', '2018-09-13', 'Pinjam ya..', 'Sudah', '2018-08-28 06:12:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `foto`, `keterangan`, `tanggal`) VALUES
(2, 'Aqkly Hermawan', 'aqklyhermawan@gmail.com', 'aqkly', '9fb358aa8e8a4ea512a8e8e317c2c1f9753bec59', 'Admin', NULL, 'Administrator', '2018-08-22 05:42:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usulan`
--

CREATE TABLE `usulan` (
  `id_usulan` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `keterangan` text,
  `nama_pengusul` varchar(255) NOT NULL,
  `email_pengusul` varchar(255) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `status_usulan` varchar(20) NOT NULL,
  `tanggal_usulan` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `usulan`
--

INSERT INTO `usulan` (`id_usulan`, `judul`, `penulis`, `penerbit`, `keterangan`, `nama_pengusul`, `email_pengusul`, `ip_address`, `status_usulan`, `tanggal_usulan`, `tanggal`) VALUES
(1, 'Mengejar Mimpi Menjadi Programmer', 'Sofiah Jamilah', 'Pt. suka-suka', 'Menceritakan seorang anak yang ingin menjadi programmer', 'Resti Asfiani', 'asfiani.resti123@gmail.com', '::1', 'Diterima', '2018-08-27 07:16:48', '2018-08-27 06:05:22'),
(2, 'duehuf', 'feuhfuh', 'feufhuf', 'feufh', 'fuehfuh', 'asfiani.resti123@gmail.com', '::1', 'Baru', '2018-09-08 06:32:39', '2018-09-08 04:32:39');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `bahasa`
--
ALTER TABLE `bahasa`
  ADD PRIMARY KEY (`id_bahasa`),
  ADD UNIQUE KEY `kode_bahasa` (`kode_bahasa`),
  ADD UNIQUE KEY `nama_bahasa` (`nama_bahasa`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD UNIQUE KEY `judul_berita` (`judul_berita`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `file_buku`
--
ALTER TABLE `file_buku`
  ADD PRIMARY KEY (`id_file_buku`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`),
  ADD UNIQUE KEY `kode_jenis` (`kode_jenis`),
  ADD UNIQUE KEY `nama_jenis` (`nama_jenis`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id_link`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `usulan`
--
ALTER TABLE `usulan`
  ADD PRIMARY KEY (`id_usulan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `bahasa`
--
ALTER TABLE `bahasa`
  MODIFY `id_bahasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `file_buku`
--
ALTER TABLE `file_buku`
  MODIFY `id_file_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `link`
--
ALTER TABLE `link`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `usulan`
--
ALTER TABLE `usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
