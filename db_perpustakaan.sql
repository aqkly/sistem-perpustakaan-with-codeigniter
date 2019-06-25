-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2018 at 09:17 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

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
-- Table structure for table `anggota`
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
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_user`, `status_anggota`, `nama_anggota`, `email`, `telepon`, `instansi`, `username`, `password`, `tanggal`) VALUES
(1, 1, 'Active', 'Salwa Annisa', 'salwaannisa@gmail.com', '085433636434', 'PT. Subur Ga Makmur', 'salwa', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '2018-08-22 08:24:39'),
(2, 1, 'Active', 'Resti Asfiani', 'asfiani.resti123@gmail.com', '087653134543', 'PT. word media', 'resti', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2018-08-22 08:14:56');

-- --------------------------------------------------------

--
-- Table structure for table `bahasa`
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
-- Dumping data for table `bahasa`
--

INSERT INTO `bahasa` (`id_bahasa`, `kode_bahasa`, `nama_bahasa`, `keterangan`, `urutan`, `tanggal`) VALUES
(1, 'ID', 'Bahasa Indonesia', 'Bahasa Indonesa, Bahasa Melayu', 1, '2018-08-22 09:34:21'),
(2, 'EN', 'Bahasa Inggris', 'Bahasa Inggris(us/uk)', 2, '2018-08-25 06:06:16');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
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
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `slug_berita`, `judul_berita`, `isi`, `gambar`, `status_berita`, `jenis_berita`, `tanggal`) VALUES
(7, 1, 'apa-itu-membaca', 'Apa itu Membaca ?', '<p><strong style=\"color: #222222; font-family: sans-serif;\">Membaca</strong><span style=\"color: #222222; font-family: sans-serif;\">&nbsp;adalah kegiatan meresepsi, menganalisis, dan menginterpretasi yang dilakukan oleh pembaca untuk memperoleh pesan yang hendak disampaikan oleh penulis dalam media tulisan.</span><span style=\"color: #222222; font-family: sans-serif;\">Kegiatan membaca meliputi membaca nyaring dan membaca dalam hati.</span><sup id=\"cite_ref-&rdquo;rujukan1&rdquo;_1-1\" class=\"reference\" style=\"line-height: 1em; unicode-bidi: isolate; white-space: nowrap; color: #222222; font-family: sans-serif;\"></sup><span style=\"color: #222222; font-family: sans-serif;\">Membaca nyaring adalah kegiatan membaca yang dilakukan dengan cara membaca keras-keras di depan umum.<span style=\"font-size: 11.6667px; white-space: nowrap;\">&nbsp;</span></span><span style=\"color: #222222; font-family: sans-serif;\">Sedangkan kegiatan membaca dalam hati adalah kegiatan membaca dengan saksama yang dilakukan untuk mengrti dan memahami maksud atau tujuan penulis dalam media tertulis.</span></p>\r\n<p><strong>Sumber</strong>:&nbsp;<em><span style=\"color: #006621; font-family: arial, sans-serif; white-space: nowrap;\">https://id.wikipedia.org/wiki/Membaca</span></em></p>', 'logo-book-green.jpg', 'Publish', 'Berita', '2018-08-29 05:00:57'),
(8, 1, 'sejarah-javascript', 'Sejarah Javascript', '<p>JavaScript pertama kali dikembangkan oleh&nbsp;<a class=\"new\" title=\"Brendan Eich (halaman belum tersedia)\" href=\"https://id.wikipedia.org/w/index.php?title=Brendan_Eich&amp;action=edit&amp;redlink=1\">Brendan Eich</a>&nbsp;dari Netscape di bawah nama&nbsp;<em>Mocha</em>, yang nantinya namanya diganti menjadi&nbsp;<em>LiveScript, dan akhirnya menjadi JavaScript.&nbsp;</em><sup id=\"cite_ref-computerworld_7-0\" class=\"reference\"></sup><em>Navigator</em>&nbsp;sebelumnya telah mendukung Java untuk lebih bisa dimanfaatkan para&nbsp;<a class=\"mw-redirect\" title=\"Programmer\" href=\"https://id.wikipedia.org/wiki/Programmer\">programmer</a>&nbsp;yang non-Java.&nbsp;<sup id=\"cite_ref-zaki_8-0\" class=\"reference\"></sup>Maka dikembangkanlah bahasa pemrograman bernama&nbsp;<em>LiveScript</em>&nbsp;untuk mengakomodasi hal tersebut.&nbsp;<sup id=\"cite_ref-zaki_8-1\" class=\"reference\"></sup>&nbsp;Bahasa pemrograman inilah yang akhirnya berkembang dan diberi nama JavaScript, walaupun tidak ada hubungan bahasa antara Java dengan JavaScript.<sup id=\"cite_ref-zaki_8-2\" class=\"reference\"></sup></p>\r\n<p>JavaScript bisa digunakan untuk banyak tujuan, misalnya untuk membuat efek&nbsp;<em>rollover</em>&nbsp;baik di gambar maupun teks, dan yang penting juga adalah untuk membuat&nbsp;<a title=\"AJAX\" href=\"https://id.wikipedia.org/wiki/AJAX\">AJAX</a>.&nbsp;<sup id=\"cite_ref-zaki_8-3\" class=\"reference\"></sup>JavaScript adalah bahasa yang digunakan untuk AJAX.<sup id=\"cite_ref-zaki_8-4\" class=\"reference\"></sup></p>\r\n<p><strong>Sumber:</strong><em> https://id.wikipedia.org/wiki/JavaScript</em></p>', 'javascript-logo-banner.jpg', 'Publish', 'Slider', '2018-08-29 05:27:02'),
(9, 1, 'sejarah-php', 'Sejarah PHP', '<p>Pada awalnya PHP merupakan kependekan dari&nbsp;<em>Personal Home Page</em>&nbsp;(Situs personal). PHP pertama kali dibuat oleh&nbsp;<a title=\"Rasmus Lerdorf\" href=\"https://id.wikipedia.org/wiki/Rasmus_Lerdorf\">Rasmus Lerdorf</a>pada tahun&nbsp;<a title=\"1995\" href=\"https://id.wikipedia.org/wiki/1995\">1995</a>. Pada waktu itu PHP masih bernama&nbsp;<em>Form Interpreted</em>&nbsp;(FI), yang wujudnya berupa sekumpulan skrip yang digunakan untuk mengolah data formulir dari&nbsp;<a class=\"mw-redirect\" title=\"Web\" href=\"https://id.wikipedia.org/wiki/Web\">web</a>.</p>\r\n<p>Selanjutnya Rasmus merilis kode sumber tersebut untuk umum dan menamakannya&nbsp;<a class=\"new\" title=\"PHP/FI (halaman belum tersedia)\" href=\"https://id.wikipedia.org/w/index.php?title=PHP/FI&amp;action=edit&amp;redlink=1\">PHP/FI</a>. Dengan perilisan kode sumber ini menjadi&nbsp;<a title=\"Sumber terbuka\" href=\"https://id.wikipedia.org/wiki/Sumber_terbuka\">sumber terbuka</a>, maka banyak&nbsp;<a title=\"Pemrogram\" href=\"https://id.wikipedia.org/wiki/Pemrogram\">pemrogram</a>&nbsp;yang tertarik untuk ikut mengembangkan PHP.</p>\r\n<p>Pada November 1997, dirilis PHP/FI 2.0. Pada rilis ini,&nbsp;<em><a class=\"mw-redirect\" title=\"Interpreter\" href=\"https://id.wikipedia.org/wiki/Interpreter\">interpreter</a></em>&nbsp;PHP sudah diimplementasikan dalam program&nbsp;<a title=\"C\" href=\"https://id.wikipedia.org/wiki/C\">C</a>. Dalam rilis ini disertakan juga modul-modul ekstensi yang meningkatkan kemampuan PHP/FI secara signifikan.</p>\r\n<p>Pada tahun 1997, sebuah perusahaan bernama&nbsp;<a class=\"new\" title=\"Zend (halaman belum tersedia)\" href=\"https://id.wikipedia.org/w/index.php?title=Zend&amp;action=edit&amp;redlink=1\">Zend</a>&nbsp;menulis ulang interpreter PHP menjadi lebih bersih, lebih baik, dan lebih cepat. Kemudian pada Juni 1998, perusahaan tersebut merilis interpreter baru untuk PHP dan meresmikan rilis tersebut sebagai&nbsp;<a class=\"new\" title=\"PHP 3.0 (halaman belum tersedia)\" href=\"https://id.wikipedia.org/w/index.php?title=PHP_3.0&amp;action=edit&amp;redlink=1\">PHP 3.0</a>&nbsp;dan singkatan PHP diubah menjadi&nbsp;<a title=\"Akronim berulang\" href=\"https://id.wikipedia.org/wiki/Akronim_berulang\">akronim berulang</a>&nbsp;<em>PHP: Hypertext Preprocessing</em>.</p>\r\n<p>Pada pertengahan tahun 1999, Zend merilis interpreter PHP baru dan rilis tersebut dikenal dengan&nbsp;<a class=\"new\" title=\"PHP 4.0 (halaman belum tersedia)\" href=\"https://id.wikipedia.org/w/index.php?title=PHP_4.0&amp;action=edit&amp;redlink=1\">PHP 4.0</a>. PHP 4.0 adalah versi PHP yang paling banyak dipakai pada awal abad ke-21. Versi ini banyak dipakai disebabkan kemampuannya untuk membangun aplikasi web kompleks tetapi tetap memiliki kecepatan dan stabilitas yang tinggi.</p>\r\n<p>Pada&nbsp;<a title=\"Juni\" href=\"https://id.wikipedia.org/wiki/Juni\">Juni</a>&nbsp;<a title=\"2004\" href=\"https://id.wikipedia.org/wiki/2004\">2004</a>, Zend merilis&nbsp;<a class=\"mw-redirect\" title=\"PHP 5.0\" href=\"https://id.wikipedia.org/wiki/PHP_5.0\">PHP 5.0</a>. Dalam versi ini, inti dari interpreter PHP mengalami perubahan besar. Versi ini juga memasukkan model&nbsp;<a title=\"Pemrograman berorientasi objek\" href=\"https://id.wikipedia.org/wiki/Pemrograman_berorientasi_objek\">pemrograman berorientasi objek</a>&nbsp;ke dalam PHP untuk menjawab perkembangan bahasa pemrograman ke arah paradigma berorientasi objek. Server web bawaan ditambahkan pada versi 5.4 untuk mempermudah pengembang menjalankan kode PHP tanpa menginstall software server.</p>\r\n<p>Versi terbaru dan stabil dari bahasa pemograman PHP saat ini adalah versi 7.0.16 dan 7.1.2 yang resmi dirilis pada tanggal 17&nbsp;<a title=\"Februari\" href=\"https://id.wikipedia.org/wiki/Februari\">Februari</a>&nbsp;2017.<sup id=\"cite_ref-7\" class=\"reference\"></sup></p>\r\n<p><strong>Sumber:&nbsp;</strong><em>https://id.wikipedia.org/wiki/PHP</em></p>', 'banner-php.jpg', 'Publish', 'Slider', '2018-08-29 05:21:41'),
(10, 1, 'apa-itu-linux', 'Apa itu Linux ?', '<p><strong>Linux</strong>&nbsp;(diucapkan ?l?n?ks atau /?l?n?ks/)&nbsp;<sup id=\"cite_ref-1\" class=\"reference\"></sup>adalah nama yang diberikan kepada&nbsp;<a title=\"Sistem operasi\" href=\"https://id.wikipedia.org/wiki/Sistem_operasi\">sistem operasi</a>&nbsp;komputer&nbsp;<a title=\"Sistem operasi bertipe Unix\" href=\"https://id.wikipedia.org/wiki/Sistem_operasi_bertipe_Unix\">bertipe Unix</a>. Linux merupakan salah satu contoh hasil pengembangan&nbsp;<a title=\"Perangkat lunak bebas\" href=\"https://id.wikipedia.org/wiki/Perangkat_lunak_bebas\">perangkat lunak bebas</a>&nbsp;dan&nbsp;<a title=\"Perangkat lunak sumber terbuka\" href=\"https://id.wikipedia.org/wiki/Perangkat_lunak_sumber_terbuka\">sumber terbuka</a>&nbsp;utama. Seperti perangkat lunak bebas dan sumber terbuka lainnya pada umumnya,&nbsp;<a title=\"Kode sumber\" href=\"https://id.wikipedia.org/wiki/Kode_sumber\">kode sumber</a>&nbsp;Linux dapat dimodifikasi, digunakan dan didistribusikan kembali secara bebas oleh siapa saja.<sup id=\"cite_ref-2\" class=\"reference\"></sup></p>\r\n<p>Nama \"Linux\" berasal dari nama pembuatnya, yang diperkenalkan tahun 1991 oleh&nbsp;<a title=\"Linus Torvalds\" href=\"https://id.wikipedia.org/wiki/Linus_Torvalds\">Linus Torvalds</a>. Sistemnya,&nbsp;<a title=\"Perangkat lunak sistem\" href=\"https://id.wikipedia.org/wiki/Perangkat_lunak_sistem\">peralatan sistem</a>&nbsp;dan&nbsp;<a title=\"Pustaka perangkat lunak\" href=\"https://id.wikipedia.org/wiki/Pustaka_perangkat_lunak\">pustakanya</a>&nbsp;umumnya berasal dari&nbsp;<a class=\"mw-redirect\" title=\"Sistem operasi GNU\" href=\"https://id.wikipedia.org/wiki/Sistem_operasi_GNU\">sistem operasi GNU</a>, yang diumumkan tahun 1983 oleh&nbsp;<a class=\"mw-redirect\" title=\"Richard Stallman\" href=\"https://id.wikipedia.org/wiki/Richard_Stallman\">Richard Stallman</a>. Kontribusi GNU adalah dasar dari munculnya&nbsp;<a title=\"Kontroversi penamaan GNU/Linux\" href=\"https://id.wikipedia.org/wiki/Kontroversi_penamaan_GNU/Linux\">nama alternatif</a>&nbsp;<strong>GNU/Linux</strong>.<sup id=\"cite_ref-lsag_3-0\" class=\"reference\"></sup></p>\r\n<p>Linux telah lama dikenal untuk penggunaannya di&nbsp;<a class=\"mw-redirect\" title=\"Server\" href=\"https://id.wikipedia.org/wiki/Server\">server</a>, dan didukung oleh perusahaan-perusahaan komputer ternama seperti&nbsp;<a class=\"mw-disambig\" title=\"Intel\" href=\"https://id.wikipedia.org/wiki/Intel\">Intel</a>,&nbsp;<a title=\"Dell\" href=\"https://id.wikipedia.org/wiki/Dell\">Dell</a>,&nbsp;<a title=\"Hewlett-Packard\" href=\"https://id.wikipedia.org/wiki/Hewlett-Packard\">Hewlett-Packard</a>,&nbsp;<a title=\"IBM\" href=\"https://id.wikipedia.org/wiki/IBM\">IBM</a>,&nbsp;<a title=\"Novell\" href=\"https://id.wikipedia.org/wiki/Novell\">Novell</a>,&nbsp;<a title=\"Oracle Corporation\" href=\"https://id.wikipedia.org/wiki/Oracle_Corporation\">Oracle Corporation</a>,&nbsp;<a title=\"Red Hat\" href=\"https://id.wikipedia.org/wiki/Red_Hat\">Red Hat</a>, dan&nbsp;<a title=\"Sun Microsystems\" href=\"https://id.wikipedia.org/wiki/Sun_Microsystems\">Sun Microsystems</a>. Linux digunakan sebagai sistem operasi di berbagai macam jenis&nbsp;<a title=\"Perangkat keras\" href=\"https://id.wikipedia.org/wiki/Perangkat_keras\">perangkat keras</a>&nbsp;komputer, termasuk&nbsp;<a class=\"mw-redirect\" title=\"Komputer desktop\" href=\"https://id.wikipedia.org/wiki/Komputer_desktop\">komputer desktop</a>,&nbsp;<a title=\"Superkomputer\" href=\"https://id.wikipedia.org/wiki/Superkomputer\">superkomputer</a>,&nbsp;dan&nbsp;<a title=\"Sistem benam\" href=\"https://id.wikipedia.org/wiki/Sistem_benam\">sistem benam</a>&nbsp;seperti&nbsp;<a class=\"mw-redirect\" title=\"Pembaca buku elektronik\" href=\"https://id.wikipedia.org/wiki/Pembaca_buku_elektronik\">pembaca buku elektronik</a>, sistem permainan video (<a title=\"PlayStation 2\" href=\"https://id.wikipedia.org/wiki/PlayStation_2\">PlayStation 2</a>,&nbsp;<a title=\"PlayStation 3\" href=\"https://id.wikipedia.org/wiki/PlayStation_3\">PlayStation 3</a>&nbsp;dan&nbsp;<a class=\"mw-redirect\" title=\"XBox\" href=\"https://id.wikipedia.org/wiki/XBox\">XBox</a><sup id=\"cite_ref-5\" class=\"reference\"></sup>),&nbsp;<a title=\"Telepon genggam\" href=\"https://id.wikipedia.org/wiki/Telepon_genggam\">telepon genggam</a>&nbsp;dan&nbsp;<a class=\"mw-redirect\" title=\"Router\" href=\"https://id.wikipedia.org/wiki/Router\">router</a>. Para pengamat teknologi informatika beranggapan kesuksesan Linux dikarenakan Linux tidak bergantung kepada vendor (<em>vendor independence</em>), biaya operasional yang rendah, dan kompatibilitas yang tinggi dibandingkan versi UNIX&nbsp;<a class=\"mw-redirect\" title=\"Perangkat lunak tak bebas\" href=\"https://id.wikipedia.org/wiki/Perangkat_lunak_tak_bebas\">tak bebas</a>, serta faktor keamanan dan kestabilannya yang tinggi dibandingkan dengan sistem operasi lainnya seperti&nbsp;<a title=\"Microsoft Windows\" href=\"https://id.wikipedia.org/wiki/Microsoft_Windows\">Microsoft Windows</a>. Ciri-ciri ini juga menjadi bukti atas keunggulan model pengembangan perangkat lunak sumber terbuka (<em>opensource software</em>).</p>\r\n<p>Sistem operasi Linux yang dikenal dengan istilah&nbsp;<a title=\"Distribusi Linux\" href=\"https://id.wikipedia.org/wiki/Distribusi_Linux\">distribusi Linux</a>&nbsp;(<em>Linux distribution</em>) atau distro Linux umumnya sudah termasuk perangkat-perangkat lunak pendukung seperti&nbsp;<a class=\"mw-redirect\" title=\"Server Web\" href=\"https://id.wikipedia.org/wiki/Server_Web\">server web</a>,&nbsp;<a title=\"Bahasa pemrograman\" href=\"https://id.wikipedia.org/wiki/Bahasa_pemrograman\">bahasa pemrograman</a>,&nbsp;<a class=\"mw-redirect\" title=\"Basisdata\" href=\"https://id.wikipedia.org/wiki/Basisdata\">basisdata</a>,&nbsp;<a class=\"mw-redirect\" title=\"Tampilan desktop\" href=\"https://id.wikipedia.org/wiki/Tampilan_desktop\">tampilan desktop</a>&nbsp;(<em>desktop environment</em>) seperti&nbsp;<a title=\"GNOME\" href=\"https://id.wikipedia.org/wiki/GNOME\">GNOME</a>,<a title=\"KDE\" href=\"https://id.wikipedia.org/wiki/KDE\">KDE</a>&nbsp;dan&nbsp;<a title=\"Xfce\" href=\"https://id.wikipedia.org/wiki/Xfce\">Xfce</a>&nbsp;juga memiliki&nbsp;<a title=\"Paket aplikasi perkantoran\" href=\"https://id.wikipedia.org/wiki/Paket_aplikasi_perkantoran\">paket aplikasi perkantoran</a>&nbsp;(<em>office suite</em>) seperti&nbsp;<a class=\"mw-redirect\" title=\"OpenOffice.org\" href=\"https://id.wikipedia.org/wiki/OpenOffice.org\">OpenOffice.org</a>,&nbsp;<a title=\"KOffice\" href=\"https://id.wikipedia.org/wiki/KOffice\">KOffice</a>,&nbsp;<a class=\"mw-redirect\" title=\"Abiword\" href=\"https://id.wikipedia.org/wiki/Abiword\">Abiword</a>,&nbsp;<a title=\"Gnumeric\" href=\"https://id.wikipedia.org/wiki/Gnumeric\">Gnumeric</a>&nbsp;dan&nbsp;<a title=\"LibreOffice\" href=\"https://id.wikipedia.org/wiki/LibreOffice\">LibreOffice</a><strong>.</strong></p>\r\n<p><strong>Sumber:&nbsp;</strong><em>https://id.wikipedia.org/wiki/Linux</em></p>', 'banner_linux.png', 'Publish', 'Slider', '2018-08-29 05:25:13'),
(11, 1, 'welcome', 'Welcome', '<p><strong>Selamat Datang Di Perpustakaan Online</strong></p>', 'perpus-header.jpg', 'Publish', 'Slider', '2018-08-29 05:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
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
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_user`, `id_jenis`, `id_bahasa`, `judul_buku`, `penulis_buku`, `subyek_buku`, `letak_buku`, `kode_buku`, `kolasi`, `penerbit`, `tahun_terbit`, `nomor_seri`, `status_buku`, `ringkasan`, `cover_buku`, `jumlah_buku`, `tanggal_entri`, `tanggal`) VALUES
(7, 1, 5, 1, 'Kode HTML FULL', 'Rio Astamal', 'HTML', '', 'HTML ', 0, '-', 2005, '004', 'Publish', 'Buku ini ditujukan bagi anda yang belum mengenal sama sekali kode HTML atau sudah\r\nmengetahui HTML secara garis besar dan ingin menambah kemampuan.', 'large_html-css-logo.jpg', 0, '2018-08-26 09:59:59', '2018-08-29 04:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `file_buku`
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
-- Dumping data for table `file_buku`
--

INSERT INTO `file_buku` (`id_file_buku`, `id_user`, `id_buku`, `judul_file`, `nama_file`, `keterangan`, `urutan`, `tanggal`) VALUES
(1, 2, 4, 'Bab 1 Pendahuluan', 'topologi_jaringan.pdf', 'Tutorial Untuk Pemula', 1, '2018-08-25 03:55:57'),
(2, 2, 2, 'Bab 1', 'laporan_siswa_20180815.pdf', 'Tutorial Untuk Pemula', 1, '2018-08-25 03:47:47'),
(3, 2, 7, 'Kode HTML', 'Kode_HTML_-_Full.pdf', '', 1, '2018-08-28 06:35:36'),
(4, 2, 6, 'cara cepat dan mudah menguasai css', 'cara_cepat_dan_mudah_menguasai_css.pdf', '', 1, '2018-08-28 06:44:40');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
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
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `kode_jenis`, `nama_jenis`, `keterangan`, `urutan`, `tanggal`) VALUES
(1, 'JS', 'Menguasai Javascript dalam Sehari', 'Web Programming', 1, '2018-08-22 09:23:46'),
(3, 'PHP', 'Belajar PHP Dasar', 'Web Programming', 2, '2018-08-22 09:35:14'),
(4, 'CI', 'Tutorial Code Igniter', 'Tutorial CI Pemula', 3, '2018-08-25 06:04:40'),
(5, 'HTML - CSS', 'HTML & CSS', 'Web Proggramming', 4, '2018-08-28 06:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
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
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `id_user`, `namaweb`, `tagline`, `deskripsi`, `keywords`, `email`, `website`, `logo`, `icon`, `facebook`, `twitter`, `instagram`, `map`, `metatext`, `telepon`, `alamat`, `max_hari_peminjaman`, `max_jumlah_peminjaman`, `denda_perhari`, `tanggal`) VALUES
(1, 2, 'Sistem Informasi Desa', 'Info-info tentang desa ada disini', '', 'perpus, buku, membaca dan lain-lain', 'aqklyhermawan@gmail.com', 'http://perpusku.rf.gd', 'pwk.jpg', 'layanan_perpus.png', 'http://facebook.com/', 'http://twitter.com/', 'http://instagram.com/aqli.hermawan', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15852.321488140424!2d107.3853579725853!3d-6.636940823212416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6905d5e8591d2d%3A0xe7f974027e8b0e84!2sBekam+Ruqyah+Center+(BRC)+Purwakarta!5e0!3m2!1sid!2sid!4v1535356701722\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '', '085221151731', 'Jl.Warung Kandang', 3, 2, 1000, '2018-11-19 10:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `id_link` int(11) NOT NULL,
  `nama_link` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `link`
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
-- Table structure for table `peminjaman`
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
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `id_anggota`, `id_user`, `tanggal_pinjam`, `tanggal_kembali`, `keterangan`, `status_kembali`, `tanggal`) VALUES
(1, 4, 1, 2, '2018-10-03', '2018-10-17', '', 'Sudah', '2018-08-28 05:59:25'),
(3, 5, 2, 2, '2018-08-30', '2018-09-13', 'Pinjam ya..', 'Sudah', '2018-08-28 06:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
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
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `foto`, `keterangan`, `tanggal`) VALUES
(1, 'Sofiah Jamilah', 'sofiah123@gmail.com', 'sofiah', '20eabe5d64b0e216796e834f52d61fd0b70332fc', 'Admin', NULL, 'Administrator', '2018-08-22 07:36:34'),
(2, 'Aqkly Hermawan', 'aqklyhermawan@gmail.com', 'aqkly', '9fb358aa8e8a4ea512a8e8e317c2c1f9753bec59', 'Admin', NULL, 'Administrator', '2018-08-22 05:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `usulan`
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
-- Dumping data for table `usulan`
--

INSERT INTO `usulan` (`id_usulan`, `judul`, `penulis`, `penerbit`, `keterangan`, `nama_pengusul`, `email_pengusul`, `ip_address`, `status_usulan`, `tanggal_usulan`, `tanggal`) VALUES
(1, 'Mengejar Mimpi Menjadi Programmer', 'Sofiah Jamilah', 'Pt. suka-suka', 'Menceritakan seorang anak yang ingin menjadi programmer', 'Resti Asfiani', 'asfiani.resti123@gmail.com', '::1', 'Diterima', '2018-08-27 07:16:48', '2018-08-27 06:05:22'),
(2, 'duehuf', 'feuhfuh', 'feufhuf', 'feufh', 'fuehfuh', 'asfiani.resti123@gmail.com', '::1', 'Baru', '2018-09-08 06:32:39', '2018-09-08 04:32:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `bahasa`
--
ALTER TABLE `bahasa`
  ADD PRIMARY KEY (`id_bahasa`),
  ADD UNIQUE KEY `kode_bahasa` (`kode_bahasa`),
  ADD UNIQUE KEY `nama_bahasa` (`nama_bahasa`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD UNIQUE KEY `judul_berita` (`judul_berita`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `file_buku`
--
ALTER TABLE `file_buku`
  ADD PRIMARY KEY (`id_file_buku`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`),
  ADD UNIQUE KEY `kode_jenis` (`kode_jenis`),
  ADD UNIQUE KEY `nama_jenis` (`nama_jenis`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id_link`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `usulan`
--
ALTER TABLE `usulan`
  ADD PRIMARY KEY (`id_usulan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bahasa`
--
ALTER TABLE `bahasa`
  MODIFY `id_bahasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `file_buku`
--
ALTER TABLE `file_buku`
  MODIFY `id_file_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usulan`
--
ALTER TABLE `usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
