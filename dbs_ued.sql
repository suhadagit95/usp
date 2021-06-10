-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Nov 2020 pada 03.37
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbs_ued`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_agama`
--

CREATE TABLE `tbl_agama` (
  `id_agama` varchar(50) NOT NULL,
  `agama` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_agama`
--

INSERT INTO `tbl_agama` (`id_agama`, `agama`) VALUES
('RELETKMB', 'Islam'),
('RELLMPAUK', 'Hindu'),
('REL55R', 'Budha'),
('RELVAR9M0', 'Katolik'),
('REL7QG67', 'Kong Hucu'),
('REL1853J3', 'Kristen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_agunan`
--

CREATE TABLE `tbl_agunan` (
  `id_agunan` varchar(50) NOT NULL,
  `id_pinjaman` varchar(50) NOT NULL,
  `jenis_agunan` varchar(150) NOT NULL,
  `no_surat_agunan` varchar(100) NOT NULL,
  `alamat_agunan` text NOT NULL,
  `peta_lokasi_agunan` text NOT NULL,
  `foto_agunan` text NOT NULL,
  `foto_surat_agunan` text NOT NULL,
  `nama_pemilik` varchar(150) NOT NULL,
  `tempat_lahir_pemilik` varchar(100) NOT NULL,
  `tanggal_lahir_pemilik` date NOT NULL,
  `pekerjaan_pemilik` varchar(100) NOT NULL,
  `alamat_pemilik` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_agunan`
--

INSERT INTO `tbl_agunan` (`id_agunan`, `id_pinjaman`, `jenis_agunan`, `no_surat_agunan`, `alamat_agunan`, `peta_lokasi_agunan`, `foto_agunan`, `foto_surat_agunan`, `nama_pemilik`, `tempat_lahir_pemilik`, `tanggal_lahir_pemilik`, `pekerjaan_pemilik`, `alamat_pemilik`) VALUES
('AGd62svj8io760', 'PJ93096P2VU340', 'surat tanah', '123456789', 'bengkalis', 'd62svj8io76012345.jpg', 'd62svj8io760123.jpg', 'd62svj8io760123456.jpg', 'khairus suhada', 'bengkalis', '1995-01-13', 'Wira suasta', 'Bantan tua'),
('AGl5desbn97k00', 'PJ1EU7B05D9VVG', 'surat tanah', 'ser234kl', 's', 'l5desbn97k0012345.jpg', 'l5desbn97k00123.jpg', 'l5desbn97k00123456.jpg', 'khairus suhada', 's', '2008-02-01', 's', 's'),
('AGknb8fm4m0o80', 'PJ7D1TJ0IR1G20', 'Surat Tanah', '123456789', 'Bantan Tua', 'knb8fm4m0o801 3.2.jpg', 'knb8fm4m0o802 3.2 a.jpg', 'knb8fm4m0o802,6 a.jpg', 'khairus suhada', 'Bantan tua', '1995-01-14', 'Honorer', 'Bantan Tua'),
('AG369jj7k77v20', 'PJGKLN2KBC0A80', 'surat tanah', '123456', 'Bantan tua', '369jj7k77v2012345.jpg', '369jj7k77v20123.jpg', '369jj7k77v20123456.jpg', 'khairus suhada', 'Bantan tua ', '1995-01-14', 'Wira suasta', 'Bantan tua'),
('AGotfff21d7is0', 'PJC51H1PGR9AU0', 's', 's', 's', 'otfff21d7is0123456.jpg', 'otfff21d7is0123.jpg', 'otfff21d7is01234.jpg', 'khairus suhada', 'd', '2000-12-20', 's', 'h'),
('AGca3ivqr43ki0', 'PJJ2F3SU0OLKC0', 'Surat Tanah', '119/skmt/bt2014', 'RT 2/ RW 5 Bantan tua', 'ca3ivqr43ki012345.jpg', 'ca3ivqr43ki0123.jpg', 'ca3ivqr43ki0123456.jpg', 'Iskandar', 'Bengkalis', '1960-12-14', 'PNS', 'Jalan Wonosari barat'),
('AGapoltl2jcuo0', 'PJD9N4Q8J9L6O0', 'Surat Tanah', '119/skmt/bt2014', 'd', 'apoltl2jcuo0B612_20200927_114825_250.jpg', 'apoltl2jcuo0B612_20200927_112424_581.jpg', 'apoltl2jcuo0B612_20200927_112424_581.jpg', 'khairus suhada', 'Bengkalis', '1999-02-21', 'PNS', 'b'),
('AGjj41qrju4r80', 'PJ7T30MF126F40', 'Surat Tanah', '119/skmt/bt2014', 'bn', 'surat_permohonan_kredit_001.jpgjj41qrju4r80', '1234.jpgjj41qrju4r80', 'surat_penyerahan_agunan_001.jpgjj41qrju4r80', 'khairus suhada', 'Bengkalis', '2006-01-16', 'PNS', 'b'),
('AGbk21mb8860c0', 'PJ2E1KIEMIHC90', 'Surat Tanah', '119/skmt/bt2014', 'g', 'bk21mb8860c0navigasi_ued-sp_barokah.jpg', 'bk21mb8860c0erd,_rich_picture_dan_navigasi_ued-sp_barokah.jpg', 'bk21mb8860c0img20200828141920.jpg', 'khairus suhada', 'Bengkalis', '2004-01-17', 'PNS', 'g'),
('AGau6nij9t8700', 'PJJ1HLLBQRLB00', 'Surat Tanah', '119/skmt/bt2014', 'bantan tua', 'au6nij9t870012345.jpg', 'au6nij9t8700123.jpg', 'au6nij9t8700123456.jpg', 'khairus suhada', 'Bengkalis', '1967-01-18', 'PNS', 'bantan tua'),
('AGktsh368j4vk0', 'PJD5RB1VEVURK0', 'Surat Tanah', '119/skmt/bt2014', 'bantan tua', 'ktsh368j4vk012345.jpg', 'ktsh368j4vk0123.jpg', 'ktsh368j4vk0123456.jpg', 'khairus suhada', 'Bengkalis', '2000-02-19', 'PNS', 'v'),
('AGb5i196susoe0', 'PJGR53MNFVCDK', 'Surat Tanah', '119/skmt/bt2014', 'h', 'b5i196susoe0absen_kehadiran.docx', 'b5i196susoe01234.jpg', 'b5i196susoe0123456.jpg', 'khairus suhada', 'Bengkalis', '2000-01-21', 'PNS', 'hh'),
('AGi5erpqnlo100', 'PJ9AUM35ERESI0', 'Surat Tanah', '119/skmt/bt2014', 'u', 'i5erpqnlo100absen_kehadiran.docx', 'i5erpqnlo1001234.jpg', 'i5erpqnlo100absen_pengabdian.xlsx', 'khairus suhada', 'Bengkalis', '2002-01-18', 'PNS', 'f'),
('AG8qptlad6i540', 'PJNNKA8DR9F900', 'Surat Tanah', '119/skmt/bt2014', 'qwert', '8qptlad6i540absen_kehadiran.docx', '8qptlad6i54012345.jpg', '8qptlad6i5401234.jpg', 'khairus suhada', 'Bengkalis', '2002-01-02', 'PNS', 'r'),
('AGcpdkg2lqfpa0', 'PJ5OGHMJN6GL70', 'Surat Tanah', '119/skmt/bt2014', 'h', 'cpdkg2lqfpa0absen_kehadiran.docx', 'cpdkg2lqfpa0design_prototype.jpg', 'cpdkg2lqfpa0capture11.png', 'khairus suhada', 'Bengkalis', '2002-11-18', 'PNS', 'h'),
('AGg3spq5jaumo0', 'PJGOU5I41B86O0', 'Surat Tanah', '119/skmt/bt2014', 'r', 'g3spq5jaumo0absen_kehadiran.docx', 'g3spq5jaumo0123456.jpg', 'g3spq5jaumo01234.jpg', 'khairus suhada', 'Bengkalis', '2000-02-21', 'PNS', 'r'),
('AGrfq2sqnsn7g0', 'PJG4NV9DVHE7G0', 'Surat Tanah', '119/skmt/bt2014', 'h', 'rfq2sqnsn7g0123.jpg', 'rfq2sqnsn7g01234.jpg', 'rfq2sqnsn7g012345.jpg', 'khairus suhada', 'Bengkalis', '2001-02-19', 'PNS', 'h'),
('AGjrcuai0jdfo0', 'PJ4AH1GSNSSVM0', 'Surat Tanah', '119/skmt/bt2014', 'u', 'jrcuai0jdfo0absen_kehadiran.docx', 'jrcuai0jdfo0absen_pengabdian.xlsx', 'jrcuai0jdfo0123.jpg', 'khairus suhada', 'Bengkalis', '2001-01-21', 'PNS', 'u'),
('AGcfgs5siq4nu0', 'PJA4TJ5KTRJBS0', 'Surat Tanah', '119/skmt/bt2014', 'u', 'cfgs5siq4nu0absen_kehadiran.docx', 'cfgs5siq4nu0absen_pengabdian.xlsx', 'cfgs5siq4nu0alur_upload_file_dalam_pengusulan_peminjaman.docx', 'khairus suhada', 'Bengkalis', '2001-01-20', 'PNS', 'u'),
('AGo1gvr9vas480', 'PJGK6IA9DNHG40', 'Surat Tanah', '119/skmt/bt2014', '4', 'o1gvr9vas480absen_kehadiran.docx', 'o1gvr9vas480absen_pengabdian.xlsx', 'o1gvr9vas480capture11.png', 'khairus suhada', 'Bengkalis', '2003-01-21', 'PNS', '5'),
('AG58v88skcbko0', 'PJPOBFRRQKUGK0', 'Surat Tanah', '119/skmt/bt2014', 'y', '58v88skcbko0123.jpg', '58v88skcbko0123.jpg', '58v88skcbko0123456.jpg', 'khairus suhada', 'Bengkalis', '2001-01-01', 'PNS', 'y'),
('AG8dkmuhrddpk0', 'PJEVH80EN3JDE0', 'Surat Tanah', '119/skmt/bt2014', 'i', '8dkmuhrddpk0absen_kehadiran.docx', '8dkmuhrddpk012345.jpg', '8dkmuhrddpk012345.jpg', 'khairus suhada', 'Bengkalis', '1998-01-21', 'PNS', 'i'),
('AGm6irut91guc0', 'PJOP446VERFAC0', 'Surat Tanah', '119/skmt/bt2014', 'u', 'm6irut91guc0erd,_richpicture_dan_navigasi_ued-sp_barokah.docx', 'm6irut91guc01234.jpg', 'm6irut91guc0123.jpg', 'khairus suhada', 'Bengkalis', '2001-02-20', 'PNS', 'k'),
('AG13fdcv0rt2u0', 'PJ4VP5P08K6SL', 'Surat Tanah', '119/skmt/bt2014', '456', '13fdcv0rt2u0123456.jpg', '13fdcv0rt2u0123.jpg', '13fdcv0rt2u01234.jpg', 'khairus suhada', 'Bengkalis', '2000-01-21', 'PNS', 'b'),
('AGik96bl60dgs0', 'PJM268M8G6DOO0', 'Surat Tanah', '119/skmt/bt2014', 'h', 'ik96bl60dgs0123.jpg', 'ik96bl60dgs01234.jpg', 'ik96bl60dgs012345.jpg', 'Iskandar', 'Bengkalis', '2002-01-19', 'PNS', 'h'),
('AG45jknsagq3q0', 'PJ39L7RE79QFO0', 'Surat Tanah', '119/skmt/bt2014', 'h', '45jknsagq3q0img20200828141920.jpg', '45jknsagq3q0img20200828141945.jpg', '45jknsagq3q0123.jpg', 'khairus suhada', 'Bengkalis', '1999-01-22', 'PNS', 'h'),
('AG7knv2s3tovt0', 'PJNNIHRVRA0VS0', 'Surat Tanah', '119/skmt/bt2014', 't', '7knv2s3tovt0img20200828141920.jpg', '7knv2s3tovt0123.jpg', '7knv2s3tovt0capture11.png', 'khairus suhada', 'Bengkalis', '2001-01-22', 'PNS', 'r'),
('AGpiqu2rvvjc00', 'PJ3AVI31HAUJVG', 'Surat Tanah', '119/skmt/bt2014', 'e', 'piqu2rvvjc00img20200828141920.jpg', 'piqu2rvvjc00123456.jpg', 'piqu2rvvjc001234.jpg', 'Iskandar', 'Bengkalis', '1999-01-22', 'PNS', 'e'),
('AGnkiaadjmlo80', 'PJCEGH5NFU7S80', 'Surat Tanah', '119/skmt/bt2014', 'f', 'nkiaadjmlo80img20200828142205.jpg', 'nkiaadjmlo80img20200828160410.jpg', 'nkiaadjmlo8012345.jpg', 'f', 'Bengkalis', '2004-01-19', 'PNS', 'v'),
('AG7i78400b60a0', 'PJGR0I4LIEHK80', 'Surat Tanah', '119/skmt/bt2014', 'a', '7i78400b60a01234.jpg', '7i78400b60a0img20200828142205.jpg', '7i78400b60a0123.jpg', 'khairus suhada', 'Bengkalis', '1999-01-24', 'PNS', 'b'),
('AGap07oblc14c0', 'PJBMAVEOVGJOA0', 'Surat Tanah', '119/skmt/bt2014', 'c', 'ap07oblc14c0img20200828141920.jpg', 'ap07oblc14c0123456.jpg', 'ap07oblc14c0123456.jpg', 'khairus suhada', 'Bengkalis', '2000-01-22', 'PNS', 'q'),
('AGg0b5l1ue4cg0', 'PJFN7FGEBORGE0', 's', '119/skmt/bt2014', 'j', '5upl9a8diko01234.jpg', '5upl9a8diko0123.jpg', '5upl9a8diko012345.jpg', 'khairus suhada', 'Bengkalis', '1999-01-22', 'PNS', 'k');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_angsuran`
--

CREATE TABLE `tbl_angsuran` (
  `id_angsuran` int(11) NOT NULL,
  `id_pinjaman` varchar(50) NOT NULL,
  `angsuran_ke` int(11) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_angsuran`
--

INSERT INTO `tbl_angsuran` (`id_angsuran`, `id_pinjaman`, `angsuran_ke`, `keterangan`) VALUES
(78, 'PJ1EU7B05D9VVG', 1, 'Lancar'),
(77, 'PJGKLN2KBC0A80', 12, 'Lancar'),
(76, 'PJGKLN2KBC0A80', 11, 'Lancar'),
(75, 'PJGKLN2KBC0A80', 10, 'Lancar'),
(74, 'PJGKLN2KBC0A80', 9, 'Lancar'),
(73, 'PJGKLN2KBC0A80', 8, 'Lancar'),
(72, 'PJGKLN2KBC0A80', 7, 'Lancar'),
(71, 'PJGKLN2KBC0A80', 6, 'Lancar'),
(70, 'PJGKLN2KBC0A80', 5, 'Lancar'),
(69, 'PJGKLN2KBC0A80', 4, 'Lancar'),
(68, 'PJGKLN2KBC0A80', 3, 'Lancar'),
(67, 'PJGKLN2KBC0A80', 2, 'Lancar'),
(66, 'PJGKLN2KBC0A80', 1, 'Lancar'),
(79, 'PJ7D1TJ0IR1G20', 1, 'Lancar'),
(80, 'PJ7D1TJ0IR1G20', 2, 'Lancar'),
(81, 'PJ7D1TJ0IR1G20', 3, 'Lancar'),
(82, 'PJ7D1TJ0IR1G20', 4, 'Lancar'),
(83, 'PJ7D1TJ0IR1G20', 5, 'Lancar'),
(84, 'PJ7D1TJ0IR1G20', 6, 'Lancar'),
(85, 'PJ7D1TJ0IR1G20', 7, 'Lancar'),
(86, 'PJ7D1TJ0IR1G20', 8, 'Lancar'),
(87, 'PJ7D1TJ0IR1G20', 9, 'Lancar'),
(88, 'PJ7D1TJ0IR1G20', 10, 'Lancar'),
(89, 'PJ7D1TJ0IR1G20', 11, 'Lancar'),
(90, 'PJ7D1TJ0IR1G20', 12, 'Lancar'),
(91, 'PJ7D1TJ0IR1G20', 13, 'Lancar'),
(92, 'PJ7D1TJ0IR1G20', 14, 'Lancar'),
(93, 'PJ7D1TJ0IR1G20', 15, 'Lancar'),
(94, 'PJ7D1TJ0IR1G20', 16, 'Lancar'),
(95, 'PJ7D1TJ0IR1G20', 17, 'Lancar'),
(96, 'PJ7D1TJ0IR1G20', 18, 'Lancar'),
(97, 'PJ7D1TJ0IR1G20', 19, 'Lancar'),
(98, 'PJ7D1TJ0IR1G20', 20, 'Lancar'),
(99, 'PJ7D1TJ0IR1G20', 21, 'Lancar'),
(100, 'PJ7D1TJ0IR1G20', 22, 'Lancar'),
(101, 'PJ7D1TJ0IR1G20', 23, 'Lancar'),
(102, 'PJ7D1TJ0IR1G20', 24, 'Lancar'),
(103, 'PJ7D1TJ0IR1G20', 25, 'Lancar'),
(104, 'PJ7D1TJ0IR1G20', 26, 'Lancar'),
(105, 'PJ7D1TJ0IR1G20', 27, 'Lancar'),
(106, 'PJ7D1TJ0IR1G20', 28, 'Lancar'),
(107, 'PJ7D1TJ0IR1G20', 29, 'Lancar'),
(108, 'PJ7D1TJ0IR1G20', 30, 'Lancar'),
(109, 'PJ7D1TJ0IR1G20', 31, 'Lancar'),
(110, 'PJ7D1TJ0IR1G20', 32, 'Lancar'),
(111, 'PJ7D1TJ0IR1G20', 33, 'Lancar'),
(112, 'PJ7D1TJ0IR1G20', 34, 'Lancar'),
(113, 'PJ7D1TJ0IR1G20', 35, 'Lancar'),
(114, 'PJ7D1TJ0IR1G20', 36, 'Lancar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bpd`
--

CREATE TABLE `tbl_bpd` (
  `id_bpd` varchar(50) NOT NULL,
  `periode_bpd` varchar(10) NOT NULL,
  `nama_bpd` varchar(150) NOT NULL,
  `status_bpd` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bpd`
--

INSERT INTO `tbl_bpd` (`id_bpd`, `periode_bpd`, `nama_bpd`, `status_bpd`) VALUES
('BPDP5C31T0RRUS0', '2015-2020', 'Khairul', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokumen`
--

CREATE TABLE `tbl_dokumen` (
  `id_dokumen` varchar(50) NOT NULL,
  `id_pinjaman` varchar(50) NOT NULL,
  `cover` text,
  `surat_permohonan` text,
  `profil_pemanfaat` text,
  `ktp` text,
  `kk` text,
  `rencana_usaha` text,
  `surat_keterangan_desa` text,
  `surat_penyerahan_agunan` text,
  `surat_kuasa_pemakaian_agunan` text,
  `surat_kuasa_penjualan` text,
  `foto_usaha_pemanfaat` text,
  `surat_kuasa_peminjaman_agunan` text,
  `surat_perjanjian_pemberian_kredit` text,
  `rekening_bank` text NOT NULL,
  `surat_perjanjian_sanksi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dokumen`
--

INSERT INTO `tbl_dokumen` (`id_dokumen`, `id_pinjaman`, `cover`, `surat_permohonan`, `profil_pemanfaat`, `ktp`, `kk`, `rencana_usaha`, `surat_keterangan_desa`, `surat_penyerahan_agunan`, `surat_kuasa_pemakaian_agunan`, `surat_kuasa_penjualan`, `foto_usaha_pemanfaat`, `surat_kuasa_peminjaman_agunan`, `surat_perjanjian_pemberian_kredit`, `rekening_bank`, `surat_perjanjian_sanksi`) VALUES
('DKd62svj8io760', 'PJ93096P2VU340', NULL, 'd2r9s4fklb80whatsapp_image_2020-10-26_at_15.09.45.jpeg', 'Y', 'r0hduln08to0e-ktp.jpg', 'iqpp4lhtse802 Transkip nilai.pdf', '', '', 'ljcbqe6fnb4whatsapp_image_2020-10-26_at_15.09.54.jpeg', 'egrvb3m58a00b612_20201007_101013_192.jpg', 'c68f21ek5u00sistem_usp_-_cetak_data_peminjam_(1).pdf', '3hlfrihu6tp0b612_20200618_154342_725.jpg', '', 'qnj5gsnvnu40pengumpulan_perjanjian_kinerja_individu.pdf', '2psvj93fq5l0whatsapp_image_2020-10-26_at_15.09.45.jpeg', '29m6j24u98f0download logo polbeng.jpg'),
('DKknb8fm4m0o80', 'PJ7D1TJ0IR1G20', NULL, '1ngcahn60s8g2,6.jpg', 'Y', 'resncigme4c061c2346be1b5fbdc07572813ca0572c7.jpg', 'oohnopo3acc0070d912cf7cd3384d0b2619d11f552c3.jpg', 'ljrreim7gcc0070d912cf7cd3384d0b2619d11f552c3.jpg', '3samb221coa0cc3e3249e404f5dbcbb0c74818fb4ef4.jpg', 'ed71lujm98a0f83cab56fba759c83fe48f628b6149f4.jpg', 'mkap402pdkc0lebar 3.2.jpg', '56ja3empfkb01 3.2.jpg', 'djtghhn42sc0cc3e3249e404f5dbcbb0c74818fb4ef4.jpg', 'r9mer5enesc084fce8e74f98e1f54ad7a12ace0cf9dc.jpg', 'r0ssfgmqqgc0cc3e3249e404f5dbcbb0c74818fb4ef4.jpg', 'qenc74quf7s012345.jpg', 'dnk8dbe7bc00capture13.png'),
('DKl5desbn97k00', 'PJ1EU7B05D9VVG', NULL, 'dclvpo0tvg40navigasi ued-sp barokah.jpg', 'Y', 'k5bjimn0rs401234.jpg', 'cjrsgn9dj0605cf3908217525407b2c46fd054839d9a.jpg', '4cc65v0j808024.-Surat-pengumuman-hasil-seleksi-berkas-shortcourse-LN-bidang-Vocasional.pdf', '8gg4piib6o80833311_82a310d5-dc7b-45a5-a220-d31accfa4c10.png', 'bsmvq2ddgg803177709_77ee4d19-845b-42d8-947e-001d9569b7a8.jpg', 'esjelq71bo802348aeddb7a2b6441775b0def864af5a.jpg', '8aqsuegffka05016612_d33731d7-3c84-42d0-be0e-d401f02798dd_857_864.jpg', 'fma18s5ipg804779213_457da93e-217c-4627-8f45-42e88694f2db_588_640.jpg', 'aac4c8rh2fe012345.jpg', 'ect55qbi1mk0IMG20200411164040.jpg', '3mmp7q5frpc012345.jpg', 'lgoprngs51g0surat_permohonan_kredit_001.jpg'),
('DKotfff21d7is0', 'PJC51H1PGR9AU0', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DK369jj7k77v20', 'PJGKLN2KBC0A80', NULL, 'jqqspk5mafo0Surat Permohonan Kredit_001.jpg', 'Y', '8bbht9hcqc20e-ktp.jpg', 'ckpao9fda040rc41ok0vm780index.jpg', '2ikil8d4hk8012 11 2018 Sesi II.pdf', 'orvedisft880Formulir Verifikasi.pdf', '4r0p0q9pocd0Surat Penyerahan Agunan_001.jpg', 'gc2u2pmh00g0Surat Penyerahan Agunan.pdf', '6c9am9gkq4g0navigasi ued-sp barokah.jpg', '6t2oak2lnog01234.jpg', 'qntu77vvksg0Surat Penyerahan Agunan.pdf', '4m2rru2khfh05cf3908217525407b2c46fd054839d9a.jpg', 'gs0courgtdg0123.jpg', 'g5rbjmit6h40WhatsApp Image 2020-10-21 at 08.31.19.jpeg'),
('DKouununfeq9k0', 'PJ2DIC5MF8Q5F0', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKilok9uhs5600', 'PJM6JN80UGQU00', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKca3ivqr43ki0', 'PJJ2F3SU0OLKC0', NULL, '32a3jei340m012345.jpg', 'Y', '64lrusb5o0n01234.jpg', '5vtumt60hso083790f2b43f00bekemendigkbud.png', '7vcd0htcjso0Surat Penyerahan Agunan_001.jpg', '8fht33bdnsq0Surat Penyerahan Agunan.pdf', 'r0d0vin0pos0Surat Permohonan Kredit_001.jpg', 'r3i8jdnbr0s0Surat Penyerahan Agunan_001.jpg', 'b9u606gi68s0Surat Penyerahan Agunan_001.jpg', 'h37rmhsul8s01234.jpg', '6b9hs6sab0s0Surat Permohonan Kredit.pdf', 'jv5eipne2gs0Surat Penyerahan Agunan_001.jpg', '', ''),
('DKapoltl2jcuo0', 'PJD9N4Q8J9L6O0', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKjj41qrju4r80', 'PJ7T30MF126F40', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKbk21mb8860c0', 'PJ2E1KIEMIHC90', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKau6nij9t8700', 'PJJ1HLLBQRLB00', NULL, 'pqmg0s3dqj80surat_permohonan_kredit_001.jpg', 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKktsh368j4vk0', 'PJD5RB1VEVURK0', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKb5i196susoe0', 'PJGR53MNFVCDK', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKi5erpqnlo100', 'PJ9AUM35ERESI0', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DK8qptlad6i540', 'PJNNKA8DR9F900', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKcpdkg2lqfpa0', 'PJ5OGHMJN6GL70', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKg3spq5jaumo0', 'PJGOU5I41B86O0', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKrfq2sqnsn7g0', 'PJG4NV9DVHE7G0', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKjrcuai0jdfo0', 'PJ4AH1GSNSSVM0', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKcfgs5siq4nu0', 'PJA4TJ5KTRJBS0', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKo1gvr9vas480', 'PJGK6IA9DNHG40', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DK58v88skcbko0', 'PJPOBFRRQKUGK0', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DK8dkmuhrddpk0', 'PJEVH80EN3JDE0', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKm6irut91guc0', 'PJOP446VERFAC0', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DK13fdcv0rt2u0', 'PJ4VP5P08K6SL', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKik96bl60dgs0', 'PJM268M8G6DOO0', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DK45jknsagq3q0', 'PJ39L7RE79QFO0', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DK7knv2s3tovt0', 'PJNNIHRVRA0VS0', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKpiqu2rvvjc00', 'PJ3AVI31HAUJVG', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKnkiaadjmlo80', 'PJCEGH5NFU7S80', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DK7i78400b60a0', 'PJGR0I4LIEHK80', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKap07oblc14c0', 'PJBMAVEOVGJOA0', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', ''),
('DKg0b5l1ue4cg0', 'PJFN7FGEBORGE0', NULL, NULL, 'Y', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kades`
--

CREATE TABLE `tbl_kades` (
  `id_kades` varchar(50) NOT NULL,
  `periode_kades` varchar(10) NOT NULL,
  `nama_kades` varchar(150) NOT NULL,
  `foto_kades` text NOT NULL,
  `status_kades` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_kades`
--

INSERT INTO `tbl_kades` (`id_kades`, `periode_kades`, `nama_kades`, `foto_kades`, `status_kades`) VALUES
('KDSOG9UO4U3HT40', '2020-2024', 'Suswanto', '448717dqhd30fotouser.jpg', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pemanfaat`
--

CREATE TABLE `tbl_pemanfaat` (
  `id_pemanfaat` varchar(50) NOT NULL,
  `nama_pemanfaat` varchar(50) NOT NULL,
  `tempat_lahir_pemanfaat` varchar(100) NOT NULL,
  `tgl_lahir_pemanfaat` date NOT NULL,
  `alamat_pemanfaat` varchar(50) NOT NULL,
  `status_pemanfaat` varchar(30) NOT NULL,
  `id_agama` varchar(50) NOT NULL,
  `pekerjaan_pemanfaat` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `foto_pemanfaat` text NOT NULL,
  `tgl_daftar` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pemanfaat`
--

INSERT INTO `tbl_pemanfaat` (`id_pemanfaat`, `nama_pemanfaat`, `tempat_lahir_pemanfaat`, `tgl_lahir_pemanfaat`, `alamat_pemanfaat`, `status_pemanfaat`, `id_agama`, `pekerjaan_pemanfaat`, `jenis_kelamin`, `no_hp`, `foto_pemanfaat`, `tgl_daftar`) VALUES
('SP2K0001', 'Khairus suhada', 'Bantan tua', '1995-01-14', 'Bantan tua. Jl. H. Lebai wahid', 'Menikah', 'RELETKMB', 'PNS', 'Laki-laki', '085265250010', 'SP2K0001SP2K0003fotouser.jpg', '2020-09-18'),
('SP2K0002', 'Wulandari', 'Bengkalis', '1995-07-19', 'Bantan tua', 'Menikah', 'RELETKMB', 'IRT', 'Perempuan', '085298765432', 'SP2K0002design_prototype.jpg', '2020-09-15'),
('SP2K0004', 'Ida Royani', 'Bengkalis', '1999-12-21', 'g', 'Menikah', 'RELETKMB', 'PNS', 'Perempuan', '085298765432', 'SP2K0004123.jpg', '2020-10-31'),
('SP2K0005', 'Ida Royani', 'Bengkalis', '2000-12-19', 'j', 'Menikah', 'RELETKMB', 'PNS', 'Laki-laki', '085298765432', 'SP2K0005fotouser.jpg', '2020-10-31'),
('SP2K0003', 'Ida Royani', 'Bengkalis', '2001-01-22', 'd', 'Lajang', 'RELETKMB', 'Ibu rumah Tangga', 'Perempuan', '085298765432', 'SP2K0003fotouser.jpg', '2020-10-31'),
('SP2K0006', 'Ida Royani', 'Bengkalis', '2000-01-22', 'v', 'Menikah', 'RELETKMB', 'PNS', 'Perempuan', '085298765432', 'SP2K0006absen_kehadiran.docx', '2020-11-01'),
('SP2K0007', 'Ida Royani', 'Bengkalis', '1999-01-21', 'd', 'Lajang', 'RELETKMB', 'Ibu rumah Tangga', 'Laki-laki', '085298765432', 'SP2K0007img20200828141942.jpg', '2020-11-01'),
('SP2K0008', 'Ida Royani', 'Bengkalis', '1999-01-22', 'd', 'Lajang', 'RELETKMB', 'Ibu rumah Tangga', 'Laki-laki', '085298765432', 'SP2K0008123.jpg', '2020-11-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendamping_desa`
--

CREATE TABLE `tbl_pendamping_desa` (
  `id_pendamping_desa` varchar(50) NOT NULL,
  `periode_pendamping_desa` varchar(10) NOT NULL,
  `nama_pendamping_desa` varchar(150) NOT NULL,
  `status_pendamping_desa` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pendamping_desa`
--

INSERT INTO `tbl_pendamping_desa` (`id_pendamping_desa`, `periode_pendamping_desa`, `nama_pendamping_desa`, `status_pendamping_desa`) VALUES
('PDR5KD019JRMS0', '2015-2020', 'Nofita Mulyani, S.Pd.i', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengurus`
--

CREATE TABLE `tbl_pengurus` (
  `id_pengurus` varchar(50) NOT NULL,
  `periode_pengurus` varchar(10) NOT NULL,
  `ketua` varchar(150) NOT NULL,
  `komisaris_bumdes` varchar(250) NOT NULL,
  `direktur_bumdes` varchar(250) NOT NULL,
  `tata_usaha` varchar(150) NOT NULL,
  `sak` varchar(150) NOT NULL,
  `kasir` varchar(150) NOT NULL,
  `status_pengurus` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengurus`
--

INSERT INTO `tbl_pengurus` (`id_pengurus`, `periode_pengurus`, `ketua`, `komisaris_bumdes`, `direktur_bumdes`, `tata_usaha`, `sak`, `kasir`, `status_pengurus`) VALUES
('PG8QJVIJVNPIQ0', '2020-2024', 'Hery Novry', 'Suswanto', 'H. Irman, S.H', 'Raja Septian Nahdlatuddina', 'Afrianda Destara. SKM', 'Sri Wahyuni, S.Kom', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pinjaman`
--

CREATE TABLE `tbl_pinjaman` (
  `id_pinjaman` varchar(50) NOT NULL,
  `id_pemanfaat` varchar(50) NOT NULL,
  `jumlah_pinjaman` int(11) NOT NULL,
  `jangka_waktu` int(11) NOT NULL,
  `sistem_angsuran` varchar(150) NOT NULL,
  `jumlah_jasa` int(11) NOT NULL,
  `nama_usaha` text NOT NULL,
  `tanggal_pinjaman` date NOT NULL,
  `status_pinjaman` varchar(150) DEFAULT NULL,
  `status_pembayaran` varchar(50) DEFAULT NULL,
  `pinjaman_disetujui` varchar(5) NOT NULL,
  `finis_dokumen` varchar(5) DEFAULT NULL,
  `pesan` text,
  `usulan_disetujui` int(11) DEFAULT NULL,
  `no_rek_bank` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pinjaman`
--

INSERT INTO `tbl_pinjaman` (`id_pinjaman`, `id_pemanfaat`, `jumlah_pinjaman`, `jangka_waktu`, `sistem_angsuran`, `jumlah_jasa`, `nama_usaha`, `tanggal_pinjaman`, `status_pinjaman`, `status_pembayaran`, `pinjaman_disetujui`, `finis_dokumen`, `pesan`, `usulan_disetujui`, `no_rek_bank`) VALUES
('PJGKLN2KBC0A80', 'SP2K0001', 25000000, 12, 'Kredit', 3000000, 'BudidayaIkanAirTawar', '2020-08-16', 'rekomendasi', NULL, 'Y', 'Y', NULL, 15000000, ''),
('PJ1EU7B05D9VVG', 'SP2K0001', 20000000, 24, 'Kredit', 4800000, 'BudidayaIkanAirTawar', '2020-08-17', 'rekomendasi', NULL, 'Y', 'Y', '1. Berdasarkan Keputusan Rapat Penentuan Anggaran no 20/ght19/9/2020 2. Dokumen Proposal/Peminjaman Telah Lengkap 3. Tidak ada penunggakan pembayaran pada peminjaman sebelumya\r\n																	', 15000000, ''),
('PJM268M8G6DOO0', 'SP2K0005', 20000000, 24, 'Kredit', 4800000, 'Dagang', '2020-11-01', 'tidak direkomendasi', NULL, '', NULL, NULL, NULL, '12345678'),
('PJ4VP5P08K6SL', 'SP2K0002', 20000000, 24, 'Kredit', 4800000, 'Dagang', '2020-10-31', 'tidak direkomendasi', NULL, '', NULL, NULL, NULL, '123456710'),
('PJ39L7RE79QFO0', 'SP2K0008', 20000000, 24, 'Kredit', 4800000, 'Dagang', '2020-11-01', NULL, NULL, '', NULL, NULL, NULL, '12345678'),
('PJ7D1TJ0IR1G20', 'SP2K0002', 25000000, 36, 'Kredit', 9000000, 'UsahaAnyamanTikar', '2020-08-25', 'rekomendasi', NULL, 'Y', 'Y', '1. Berdasarkan Keputusan Rapat Penentuan Anggaran 2. Dokumen Proposal/Peminjaman Telah Lengkap 3. Tidak ada penunggakan pembayaran pada peminjaman sebelumya\r\n																	', 15000000, ''),
('PJ93096P2VU340', 'SP2K0002', 24000000, 12, 'Kredit', 240000, 'UsahaAnyamanTikar', '2020-08-26', 'rekomendasi', NULL, 'Y', NULL, '1. Berdasarkan Keputusan Rapat Penentuan Anggaran 2. Dokumen Proposal/Peminjaman Telah Lengkap 3. Tidak ada penunggakan pembayaran pada peminjaman sebelumya\r\n																	', 20000000, ''),
('PJJ2F3SU0OLKC0', 'SP2K0004', 20000000, 24, 'Kredit', 4800000, 'Dagang', '2020-09-25', 'rekomendasi', NULL, 'Y', 'Y', '1. Berdasarkan Keputusan Rapat Penentuan Anggaran 2. Dokumen Proposal/Peminjaman Telah Lengkap 3. Tidak ada penunggakan pembayaran pada peminjaman sebelumya\r\n																	', 15000000, ''),
('PJD9N4Q8J9L6O0', 'SP2K0003', 2000000, 12, 'Kredit', 240000, 'Dagang', '2020-10-23', 'tidak direkomendasi', NULL, '', NULL, NULL, NULL, ''),
('PJCEGH5NFU7S80', 'SP2K0008', 20000000, 24, 'Kredit', 4800000, 'Dagang', '2020-11-01', NULL, NULL, '', NULL, NULL, NULL, '12345678'),
('PJGR0I4LIEHK80', 'SP2K0008', 20000000, 24, 'Kredit', 4800000, 'Dagang', '2020-11-01', NULL, NULL, '', NULL, NULL, NULL, '12345678'),
('PJBMAVEOVGJOA0', 'SP2K0008', 20000000, 24, 'Kredit', 4800000, 'Dagang', '2020-11-01', NULL, NULL, '', NULL, NULL, NULL, '12345678'),
('PJFN7FGEBORGE0', 'SP2K0008', 20000000, 24, 'Kredit', 4800000, 'Dagang', '2020-11-01', NULL, NULL, '', NULL, NULL, NULL, '12345678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_profil_usp`
--

CREATE TABLE `tbl_profil_usp` (
  `id_profil` varchar(20) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `bum_desa` varchar(250) NOT NULL,
  `nama_usp_surat` varchar(250) NOT NULL,
  `alamat_usp` varchar(250) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `aktif` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_profil_usp`
--

INSERT INTO `tbl_profil_usp` (`id_profil`, `nama_desa`, `bum_desa`, `nama_usp_surat`, `alamat_usp`, `logo`, `aktif`) VALUES
('PDJAM65VOPLPG0', 'Wonosari', 'Unggul Sari', 'Mekar Sari', 'Jalan wonosari Tengah', 'logo.PNG', 'Ya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(20) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `level` varchar(35) NOT NULL,
  `id_pemanfaat` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `level`, `id_pemanfaat`) VALUES
('1', 'tatausaha', '82849c85acf1f4e6e4eec748f0aeddf4', 'Tata Usaha', ''),
('2', 'ketua', '00719910bb805741e4b7f28527ecb3ad', 'Ketua', ''),
('USeR17F115C6B8N0', 'suhada', '10d1df28f07921a2acf35193097e8c8e', 'pemanfaat', 'SP2K0001'),
('USeRFVDQ4PN7LSC0', 'wulandari', 'c3eca2a24ccc8cb03a402d8e9aef685d', 'pemanfaat', 'SP2K0002');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_agama`
--
ALTER TABLE `tbl_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indeks untuk tabel `tbl_agunan`
--
ALTER TABLE `tbl_agunan`
  ADD PRIMARY KEY (`id_agunan`);

--
-- Indeks untuk tabel `tbl_angsuran`
--
ALTER TABLE `tbl_angsuran`
  ADD PRIMARY KEY (`id_angsuran`);

--
-- Indeks untuk tabel `tbl_bpd`
--
ALTER TABLE `tbl_bpd`
  ADD PRIMARY KEY (`id_bpd`);

--
-- Indeks untuk tabel `tbl_dokumen`
--
ALTER TABLE `tbl_dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indeks untuk tabel `tbl_kades`
--
ALTER TABLE `tbl_kades`
  ADD PRIMARY KEY (`id_kades`);

--
-- Indeks untuk tabel `tbl_pemanfaat`
--
ALTER TABLE `tbl_pemanfaat`
  ADD PRIMARY KEY (`id_pemanfaat`);

--
-- Indeks untuk tabel `tbl_pendamping_desa`
--
ALTER TABLE `tbl_pendamping_desa`
  ADD PRIMARY KEY (`id_pendamping_desa`);

--
-- Indeks untuk tabel `tbl_pengurus`
--
ALTER TABLE `tbl_pengurus`
  ADD PRIMARY KEY (`id_pengurus`);

--
-- Indeks untuk tabel `tbl_pinjaman`
--
ALTER TABLE `tbl_pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`);

--
-- Indeks untuk tabel `tbl_profil_usp`
--
ALTER TABLE `tbl_profil_usp`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_angsuran`
--
ALTER TABLE `tbl_angsuran`
  MODIFY `id_angsuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
