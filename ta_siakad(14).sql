-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2019 pada 16.04
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_siakad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_angkatan`
--

CREATE TABLE `app_angkatan` (
  `id_angkatan` int(11) NOT NULL,
  `thn_angkatan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_angkatan`
--

INSERT INTO `app_angkatan` (`id_angkatan`, `thn_angkatan`) VALUES
(1, '2016/2017'),
(2, '2017/2018'),
(3, '2018/2019');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_aset_barang`
--

CREATE TABLE `app_aset_barang` (
  `id_aset_brng` int(11) NOT NULL,
  `ruangan_id` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `model_barang` varchar(50) NOT NULL,
  `spesifikasi_barang` varchar(50) NOT NULL,
  `thun_pembuatan` varchar(25) NOT NULL,
  `jumlah_barang` varchar(25) NOT NULL,
  `harga_beli` varchar(50) NOT NULL,
  `kondisi_barang` varchar(25) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_aset_barang`
--

INSERT INTO `app_aset_barang` (`id_aset_brng`, `ruangan_id`, `kode_barang`, `nama_barang`, `model_barang`, `spesifikasi_barang`, `thun_pembuatan`, `jumlah_barang`, `harga_beli`, `kondisi_barang`, `keterangan`) VALUES
(1, 30, 'DAB0006', 'teeee', 'eeee', 'eee', '2003', '3', '3.400.000,00', 'B', 'ty'),
(2, 29, 'DAB0005', 'Kursi', 'Alumi', 'rangak', '2000', '123', '1200000', 'B', 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_aset_kendaran`
--

CREATE TABLE `app_aset_kendaran` (
  `id_aset_kndran` int(11) NOT NULL,
  `jenis_kendaraan` varchar(100) NOT NULL,
  `model_kendaraan` varchar(100) NOT NULL,
  `spesifikasi_kndran` varchar(100) NOT NULL,
  `thun_pmbuatan` varchar(25) NOT NULL,
  `no_rnka_mesin` varchar(50) NOT NULL,
  `no_mesin` varchar(25) NOT NULL,
  `harga_beli` varchar(25) NOT NULL,
  `jumlah_kendaraan` int(25) NOT NULL,
  `kondisi_kndaran` varchar(25) NOT NULL,
  `ket_unit_pmkai` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_aset_kendaran`
--

INSERT INTO `app_aset_kendaran` (`id_aset_kndran`, `jenis_kendaraan`, `model_kendaraan`, `spesifikasi_kndran`, `thun_pmbuatan`, `no_rnka_mesin`, `no_mesin`, `harga_beli`, `jumlah_kendaraan`, `kondisi_kndaran`, `ket_unit_pmkai`) VALUES
(1, 'asfaaa', 'dsfsdaf', 'dsfsdaf', '2002', '2002', '2002', '1222222222', 0, 'B', 'ddsdsd'),
(2, 'tes', 'tes', 'tes', '2001', '2001', '2001', '34.444,00', 1, 'B', 'tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_aset_prodi`
--

CREATE TABLE `app_aset_prodi` (
  `id_aset_brng` int(11) NOT NULL,
  `ruangan_id` int(11) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `model_barang` varchar(50) NOT NULL,
  `spesifikasi_barang` varchar(50) NOT NULL,
  `thun_pembuatan` varchar(25) NOT NULL,
  `jumlah_barang` varchar(25) NOT NULL,
  `harga_beli` varchar(50) NOT NULL,
  `kondisi_barang` varchar(25) NOT NULL,
  `asal_barang` varchar(128) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_aset_prodi`
--

INSERT INTO `app_aset_prodi` (`id_aset_brng`, `ruangan_id`, `kode_barang`, `nama_barang`, `model_barang`, `spesifikasi_barang`, `thun_pembuatan`, `jumlah_barang`, `harga_beli`, `kondisi_barang`, `asal_barang`, `prodi_id`, `keterangan`) VALUES
(5, 29, 'PRO130005', 'tes dulu', 'test aja', 'masih sama', '2000', '34555', '344.444,00', 'B', 'yees', 13, 'yees'),
(6, 29, 'PRO130006', 'test', 'aja', 'masih', '2000', '45', '650.000,00', 'B', 'tee', 13, 'aaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_data_peminjam`
--

CREATE TABLE `app_data_peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `nim` varchar(25) NOT NULL,
  `institusi` varchar(50) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `dosen_pemb` varchar(50) NOT NULL,
  `hp` varchar(25) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `prodi_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_data_peminjam`
--

INSERT INTO `app_data_peminjam` (`id_peminjam`, `nim`, `institusi`, `kegiatan`, `dosen_pemb`, `hp`, `tgl_peminjaman`, `tgl_pengembalian`, `prodi_id`) VALUES
(26, '201613001', 'po', '120', '110306006', '012455524', '2019-10-06', '2019-11-20', 13),
(27, '201613001', 'test', '5', '110306007', '0124554', '2019-11-09', '2019-11-16', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_dosen_ajar`
--

CREATE TABLE `app_dosen_ajar` (
  `id_transaksi` int(11) NOT NULL,
  `kode_makul` varchar(25) NOT NULL,
  `id_dosen` int(50) NOT NULL,
  `rombel_id` int(11) NOT NULL,
  `thn_id` int(11) NOT NULL,
  `prodi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_gedung`
--

CREATE TABLE `app_gedung` (
  `gedung_id` int(11) NOT NULL,
  `nama_gedung` varchar(50) NOT NULL,
  `kode_gedung` varchar(11) NOT NULL,
  `kode_register` varchar(11) NOT NULL,
  `kondisi_bangunan` varchar(25) NOT NULL,
  `kontruksi_tingkat` varchar(25) NOT NULL,
  `kontruksi_bton` varchar(25) NOT NULL,
  `luas_lantai` varchar(25) NOT NULL,
  `luas_gedung` varchar(25) NOT NULL,
  `status_tanah` varchar(25) NOT NULL,
  `asal_usul` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_gedung`
--

INSERT INTO `app_gedung` (`gedung_id`, `nama_gedung`, `kode_gedung`, `kode_register`, `kondisi_bangunan`, `kontruksi_tingkat`, `kontruksi_bton`, `luas_lantai`, `luas_gedung`, `status_tanah`, `asal_usul`) VALUES
(6, 'Gedung DIrektorata', 'C.01', '1', 'B', '3', 'Beton', '1000', '12,4 x 42,5', 'Pakai', 'APBD'),
(7, 'Serbaguna', 'C.01', '009', 'B', 'tingkat 2', 'Beton', '10003', '500x3000', 'sewa', 'a'),
(8, 'PPM', 'C.03', '009', 'B', '3', 'beton', '3400', '4500x3422', 'tes', 's');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_kurikulum`
--

CREATE TABLE `app_kurikulum` (
  `id_kur` int(11) NOT NULL,
  `thn_kur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_kurikulum`
--

INSERT INTO `app_kurikulum` (`id_kur`, `thn_kur`) VALUES
(1, '2011'),
(2, '2015'),
(3, '2018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_nilai_grade`
--

CREATE TABLE `app_nilai_grade` (
  `nilai_id` int(11) NOT NULL,
  `dari` float NOT NULL,
  `sampai` float NOT NULL,
  `grade` varchar(1) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_nilai_grade`
--

INSERT INTO `app_nilai_grade` (`nilai_id`, `dari`, `sampai`, `grade`, `keterangan`) VALUES
(1, 9.5, 10, 'A', ''),
(2, 8.5, 9.4, 'B', ''),
(3, 7.5, 8.4, 'C', ''),
(4, 6, 7.4, 'D', 'perbaikan'),
(5, 0, 5.9, 'E', 'tidak lulus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_nilai_mhs`
--

CREATE TABLE `app_nilai_mhs` (
  `id_nilai` int(11) NOT NULL,
  `nim` int(25) NOT NULL,
  `kode_makul` varchar(50) NOT NULL,
  `nilai_angka` varchar(50) NOT NULL,
  `nilai_huruf` varchar(50) NOT NULL,
  `thn_akademik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_nilai_mhs`
--

INSERT INTO `app_nilai_mhs` (`id_nilai`, `nim`, `kode_makul`, `nilai_angka`, `nilai_huruf`, `thn_akademik`) VALUES
(1, 201813001, 'TI2061', '80', 'B', '2'),
(2, 201813002, 'TI2061', '10', 'A', '2019-2'),
(3, 201813003, 'TI2061', '10', 'A', '2019-2'),
(4, 201813004, 'TI2061', '4', 'E', '2019-2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_notif`
--

CREATE TABLE `app_notif` (
  `id_notif` int(5) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `penerima` varchar(25) NOT NULL,
  `isi_notif` varchar(250) NOT NULL,
  `prodi` int(11) NOT NULL,
  `status` int(3) NOT NULL,
  `tgl_notif` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_notif`
--

INSERT INTO `app_notif` (`id_notif`, `pengirim`, `penerima`, `isi_notif`, `prodi`, `status`, `tgl_notif`) VALUES
(41, 'Siti Nurjannah', '2', 'Telah Melakukan Pengajuan Registrasi', 13, 1, '2019-08-30'),
(42, 'Siti Nurjannah', '9', 'Telah Melakukan Pengajuan Registrasi', 0, 1, '2019-08-30'),
(45, 'Slamet Triyanto, S.ST.', '4', 'Telah Di validasi', 0, 1, '2019-08-31'),
(50, 'OP Akademik', '11', 'Telah Membuat Pengumuman', 0, 0, '2019-09-30'),
(51, 'OP Akademik', '12', 'Telah Membuat Pengumuman', 0, 1, '2019-09-30'),
(52, 'OP Akademik', '11', 'Telah Membuat Pengumuman', 0, 0, '2019-10-02'),
(53, 'OP Akademik', '12', 'Telah Membuat Pengumuman', 0, 0, '2019-10-02'),
(54, 'OP Akademik', '11', 'Telah Membuat Pengumuman', 0, 0, '2019-10-02'),
(55, 'OP Akademik', '12', 'Telah Membuat Pengumuman', 0, 0, '2019-10-02'),
(56, 'OP Akademik', '11', 'Telah Membuat Pengumuman', 0, 0, '2019-10-02'),
(57, 'OP Akademik', '12', 'Telah Membuat Pengumuman', 0, 0, '2019-10-02'),
(58, 'Slamet Triyanto, S.ST.', '4', 'Telah Di validasi', 13, 0, '2019-10-02'),
(59, 'Slamet Triyanto, S.ST.', '4', 'Telah Di validasi', 13, 0, '2019-10-02'),
(60, 'OP Akademik', '11', 'Telah Membuat Pengumuman', 0, 0, '2019-10-03'),
(61, 'OP Akademik', '12', 'Telah Membuat Pengumuman', 0, 0, '2019-10-03'),
(62, 'Slamet Triyanto, S.ST.', '4', 'Telah Di Un-validasi', 13, 0, '2019-10-03'),
(63, 'Slamet Triyanto, S.ST.', '4', 'Telah Di validasi', 13, 0, '2019-10-03'),
(64, 'Slamet Triyanto, S.ST.', '4', 'Telah Di Un-validasi', 13, 0, '2019-10-03'),
(65, 'Slamet Triyanto, S.ST.', '4', 'Telah Di validasi', 13, 0, '2019-10-03'),
(66, 'Slamet Triyanto, S.ST.', '4', 'Telah Di Un-validasi', 13, 0, '2019-10-03'),
(67, 'Slamet Triyanto, S.ST.', '4', 'Telah Di validasi', 13, 0, '2019-10-03'),
(68, 'OP Akademik', '11', 'Telah Membuat Pengumuman', 0, 0, '2019-10-03'),
(69, 'OP Akademik', '12', 'Telah Membuat Pengumuman', 0, 0, '2019-10-03'),
(70, 'Slamet Triyanto, S.ST.', '4', 'Telah Di Un-validasi', 13, 0, '2019-11-09'),
(71, 'Slamet Triyanto, S.ST.', '4', 'Telah Di Un-validasi', 13, 0, '2019-11-09'),
(72, 'Slamet Triyanto, S.ST.', '4', 'Telah Di validasi', 13, 0, '2019-11-09'),
(73, 'Slamet Triyanto, S.ST.', '4', 'Telah Di Un-validasi', 13, 0, '2019-11-09'),
(74, 'Slamet Triyanto, S.ST.', '4', 'Telah Di validasi', 13, 0, '2019-11-09'),
(75, 'Slamet Triyanto, S.ST.', '4', 'Telah Di validasi', 13, 0, '2019-11-09'),
(76, 'Slamet Triyanto, S.ST.', '4', 'Telah Di Un-validasi', 13, 0, '2019-11-09'),
(77, 'Slamet Triyanto, S.ST.', '4', 'Telah Di validasi', 13, 0, '2019-11-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_pejabat_polkam`
--

CREATE TABLE `app_pejabat_polkam` (
  `id_pejabat` int(11) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `Keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_pejabat_polkam`
--

INSERT INTO `app_pejabat_polkam` (`id_pejabat`, `jabatan`, `Keterangan`) VALUES
(110306009, 'Direktur', 'Direktur Politeknik Kampar'),
(110306006, 'WD1', 'Wakil Direktur 1'),
(110306010, 'WD2', 'Wakil Direktur 2'),
(110907026, 'WD3', 'Wakil Direktur 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_peminjaman_barang`
--

CREATE TABLE `app_peminjaman_barang` (
  `id_brg_pinjam` int(11) NOT NULL,
  `id_peminjam` varchar(25) NOT NULL,
  `kode_barang` varchar(25) NOT NULL,
  `jumlah` int(5) NOT NULL,
  `kondisi_awal` varchar(25) NOT NULL,
  `kondisi_akhir` varchar(25) NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_peminjaman_barang`
--

INSERT INTO `app_peminjaman_barang` (`id_brg_pinjam`, `id_peminjam`, `kode_barang`, `jumlah`, `kondisi_awal`, `kondisi_akhir`, `tgl_kembali`) VALUES
(16, '26', 'PRO130005', 4, 'BAIK', 'B', '2019-11-09'),
(17, '27', 'PRO130005', 2, 'BAIK', 'B', '2019-11-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_portal`
--

CREATE TABLE `app_portal` (
  `id_portal` int(11) NOT NULL,
  `nama_portal` varchar(100) NOT NULL,
  `jenis_portal` varchar(100) NOT NULL,
  `status_portal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_portal`
--

INSERT INTO `app_portal` (`id_portal`, `nama_portal`, `jenis_portal`, `status_portal`) VALUES
(1, 'Registrasi Darurat', 'registrasi', 1),
(2, 'Batas Pembuatan Distribusi ajar', 'Batar Akhir DBA', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_ruangan`
--

CREATE TABLE `app_ruangan` (
  `ruangan_id` int(11) NOT NULL,
  `kode_ruangan` varchar(25) NOT NULL,
  `nama_ruangan` varchar(20) NOT NULL,
  `gedung_id` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_ruangan`
--

INSERT INTO `app_ruangan` (`ruangan_id`, `kode_ruangan`, `nama_ruangan`, `gedung_id`, `kapasitas`, `keterangan`) VALUES
(29, '123a', 'testaaa111', 6, 34, 'ss'),
(30, 'aaa21', 'res', 6, 23, ''),
(31, '34ere', 'tes', 7, 23, 'uyyy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_sk_mengajar`
--

CREATE TABLE `app_sk_mengajar` (
  `id_sk` int(11) NOT NULL,
  `no_sk` varchar(100) NOT NULL,
  `tgl_sk` varchar(128) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `thn_akademik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_sk_mengajar`
--

INSERT INTO `app_sk_mengajar` (`id_sk`, `no_sk`, `tgl_sk`, `id_dosen`, `thn_akademik`) VALUES
(1, '001/PK.1/KEP/BAAK-AKD/10.2019', '10/04/2019', 110907026, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `app_thn_akademik`
--

CREATE TABLE `app_thn_akademik` (
  `id_thnakad` int(11) NOT NULL,
  `thun_akademik` varchar(12) NOT NULL,
  `ta_tipe` enum('Genap','Ganjil') NOT NULL,
  `keterangan` varchar(246) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `app_thn_akademik`
--

INSERT INTO `app_thn_akademik` (`id_thnakad`, `thun_akademik`, `ta_tipe`, `keterangan`, `status`) VALUES
(1, '2019-1', 'Ganjil', '2019/2020', 0),
(2, '2019-2', 'Genap', '2019/2020', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `con_reg`
--

CREATE TABLE `con_reg` (
  `id_reg` int(10) NOT NULL,
  `tahun_akedmik` varchar(10) NOT NULL,
  `tgl_mulai` datetime NOT NULL,
  `tgl_mulai_daftar` datetime NOT NULL,
  `tgl_selesai` datetime NOT NULL,
  `status` int(10) NOT NULL,
  `pengumuman` longtext NOT NULL,
  `validasi1` int(3) NOT NULL,
  `validasi2` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `con_reg`
--

INSERT INTO `con_reg` (`id_reg`, `tahun_akedmik`, `tgl_mulai`, `tgl_mulai_daftar`, `tgl_selesai`, `status`, `pengumuman`, `validasi1`, `validasi2`) VALUES
(3, '20191', '2019-06-20 14:25:00', '0000-00-00 00:00:00', '2019-06-26 16:00:00', 0, '<p>aku cinta pada mu &gt;///&lt;</p>\n', 1, 1),
(9, '20192', '2019-07-03 11:00:00', '2019-07-14 00:00:00', '2019-07-26 16:00:00', 1, '<p>test</p>\n', 1, 1);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `data_mengajar`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `data_mengajar` (
`id_dosen` int(50)
,`rombel_id` int(11)
,`kode_makul` varchar(11)
,`nama_makul` varchar(60)
,`sks` int(11)
,`jenis_makul` enum('P','T')
,`nama_prodi` varchar(10)
,`nama` varchar(20)
,`id_rombel` int(11)
,`angkatan_id` int(11)
,`nama_rombel` varchar(25)
,`prodi_id` int(11)
,`dosen_id` int(25)
,`id_thnakad` int(11)
,`thun_akademik` varchar(12)
,`ta_tipe` enum('Genap','Ganjil')
,`keterangan` varchar(246)
,`status` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_hkases` int(25) NOT NULL,
  `id_jabatan` int(25) NOT NULL,
  `id_menu` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hak_akses`
--

INSERT INTO `hak_akses` (`id_hkases`, `id_jabatan`, `id_menu`) VALUES
(83, 1, 50),
(20, 2, 18),
(19, 2, 27),
(40, 2, 41),
(41, 2, 42),
(42, 2, 43),
(43, 2, 44),
(64, 2, 45),
(66, 2, 47),
(21, 3, 18),
(22, 3, 27),
(95, 3, 68),
(101, 3, 73),
(8, 4, 18),
(9, 4, 25),
(10, 4, 26),
(96, 4, 70),
(97, 4, 71),
(98, 4, 72),
(100, 5, 7),
(38, 5, 8),
(4, 5, 10),
(6, 5, 11),
(44, 6, 18),
(45, 6, 27),
(73, 9, 5),
(71, 9, 6),
(76, 9, 9),
(77, 9, 18),
(18, 9, 21),
(16, 9, 22),
(75, 9, 29),
(74, 9, 36),
(93, 9, 40),
(99, 9, 46),
(68, 9, 48),
(82, 9, 49),
(91, 9, 55),
(92, 9, 57),
(94, 9, 58),
(70, 11, 48),
(84, 11, 51),
(32, 12, 18),
(79, 12, 21),
(78, 12, 22),
(69, 12, 48),
(81, 13, 18),
(80, 13, 27),
(85, 14, 9),
(86, 14, 38),
(87, 14, 39),
(88, 14, 52),
(89, 14, 53),
(90, 14, 54);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(25) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Dosen'),
(2, 'Kaprodi'),
(3, 'Kalab'),
(4, 'Mahasiswa'),
(5, 'Admin'),
(6, 'Wali dosen'),
(9, 'Akademik'),
(11, 'Wadir1'),
(12, 'Kabag'),
(13, 'Perpustakaan'),
(14, 'OP SIMA'),
(15, 'operator IPD');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pengumuman`
--

CREATE TABLE `jenis_pengumuman` (
  `id_jenisp` int(11) NOT NULL,
  `nama_jenis` varchar(128) NOT NULL,
  `keterangan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_pengumuman`
--

INSERT INTO `jenis_pengumuman` (`id_jenisp`, `nama_jenis`, `keterangan`) VALUES
(1, 'Registarsi Ulang', 'Untuk Pengumuman RU'),
(2, 'BA Validasi', 'batas Akhir Validasi Pengumuman'),
(3, 'Pengumuman DLL', 'apa aja lah'),
(4, 'BA Distibusi DBA', 'Batas Akhir Distribusi Beban Ajar Dosen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `makul_matakuliah`
--

CREATE TABLE `makul_matakuliah` (
  `makul_id` int(11) NOT NULL,
  `kode_makul` varchar(11) NOT NULL,
  `nama_makul` varchar(60) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester_id` int(1) NOT NULL,
  `prodi_id` int(3) NOT NULL,
  `jenis_makul` enum('P','T') NOT NULL,
  `kur_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `makul_matakuliah`
--

INSERT INTO `makul_matakuliah` (`makul_id`, `kode_makul`, `nama_makul`, `sks`, `semester_id`, `prodi_id`, `jenis_makul`, `kur_id`) VALUES
(1, 'PK1011', 'Agama', 2, 1, 13, 'T', 1),
(2, 'PK1021', 'Matematika Dasar', 2, 1, 13, 'T', 1),
(3, 'PK1031', 'Fisika Dasar', 2, 1, 13, 'T', 1),
(4, 'PK1041', 'Keselamatan dan Kesehatan Kerja', 2, 1, 13, 'T', 1),
(5, 'TI1011', 'Algoritma dan Pemrograman 1', 2, 1, 13, 'T', 1),
(6, 'TI1021', 'Komputer dan internet', 1, 1, 13, 'T', 1),
(7, 'TI1031', 'Pengantar Sistem Informasi ', 2, 1, 13, 'T', 1),
(8, 'PK1052', 'Praktik Aplikasi Perkantoran', 2, 1, 13, 'P', 1),
(9, 'PK1062', 'Praktik Bahasa Inggris Terapan I', 1, 1, 13, 'P', 1),
(10, 'PK1072', 'Proses Pemesinan', 1, 1, 13, 'P', 1),
(11, 'TI1012', 'Praktik Algoritma dan Pemrograman 1', 2, 1, 13, 'P', 1),
(12, 'TI1022', 'Praktik Komputer dan Internet', 2, 1, 13, 'P', 1),
(13, 'TI1042', 'Praktik Fisika', 1, 1, 13, 'P', 1),
(14, 'PK2081', 'Pancasila & Kewarganegaraan', 3, 2, 13, 'T', 1),
(15, 'TI2051', 'Algoritma dan Pemrograman 2', 2, 2, 13, 'T', 1),
(16, 'TI2061', 'Matematika Diskrit', 2, 2, 13, 'T', 1),
(17, 'TI2071', 'Elektronika Analog & Digital', 1, 2, 13, 'T', 1),
(18, 'TI2081', 'Organisasi & Arsitektur Komputer', 3, 2, 13, 'T', 1),
(19, 'TI2052', 'Praktek Algoritma dan Pemrograman 2', 2, 2, 13, 'P', 1),
(20, 'TI2072', 'Praktek Elektronika Analog & DIgital', 2, 2, 13, 'P', 1),
(21, 'TI2092', 'Desain Web', 1, 2, 13, 'P', 1),
(22, 'TI2102', 'Praktek Aplikasi Perkantoran 2', 1, 2, 13, 'P', 1),
(23, 'PK2092', 'English Proficiency Test 1', 1, 2, 13, 'P', 1),
(24, 'TI2112', 'Proyek 1', 2, 2, 13, 'P', 1),
(25, 'PK3121', 'Teknik Pengolahan Sawit', 1, 3, 13, 'T', 1),
(26, 'TI3121', 'DBMS', 2, 3, 13, 'T', 1),
(27, 'TI3131', 'Metode Numerik (+ praktikum)', 2, 3, 13, 'T', 1),
(28, 'TI3141', 'SIM', 1, 3, 13, 'T', 1),
(29, 'TI3151', 'Microcontroller', 1, 3, 13, 'T', 1),
(30, 'TI3161', 'Sistem Berbasis Pengetahuan', 2, 3, 13, 'T', 1),
(31, 'PK3112', 'Praktik Bahasa Inggris Terapan I', 1, 3, 13, 'P', 1),
(32, 'TI3122', 'Praktek DBMS', 3, 3, 13, 'P', 1),
(33, 'TI3142', 'Praktik SIM', 2, 3, 13, 'P', 1),
(34, 'TI3152', 'Praktik Microcontroller', 2, 3, 13, 'P', 1),
(35, 'TI3172', 'Multimedia', 3, 3, 13, 'P', 1),
(36, 'PK4131', 'Manajemen Proyek', 2, 4, 13, 'T', 1),
(37, 'TI4181', 'Komunikasi dan Keamanan Data', 2, 4, 13, 'T', 1),
(38, 'TI4191', 'Rekayasa Perangkat Lunak', 2, 4, 13, 'T', 1),
(39, 'TI4201', 'Jaringan Komputer', 2, 4, 13, 'T', 1),
(40, 'TI4211', 'Sistem Operasi', 2, 4, 13, 'T', 1),
(41, 'PK4142', 'English Proficiency Test 2', 1, 4, 13, 'P', 1),
(42, 'TI4202', 'Praktik Jaringan', 2, 4, 13, 'P', 1),
(43, 'TI4212', 'Praktik Sistem Operasi', 1, 4, 13, 'P', 1),
(44, 'TI4222', 'Praktik Pemrograman Web', 2, 4, 13, 'P', 1),
(45, 'TI4232', 'Praktik Pemrograman GUI', 2, 4, 13, 'P', 1),
(46, 'TI4182', 'Praktek Komunikasi & Keamanan Data', 1, 4, 13, 'P', 1),
(47, 'TI4242', 'Proyek 2', 2, 4, 13, 'P', 1),
(48, 'TI5251', 'Statistik', 2, 5, 13, 'T', 1),
(49, 'TI5262', 'Mata Kuliah Pilihan 1*', 2, 5, 13, 'P', 1),
(50, 'TI5272', 'Praktik GIS', 2, 5, 13, 'P', 1),
(51, 'TI5282', 'Praktik E-Commerce', 2, 5, 13, 'P', 1),
(52, 'PK5162', 'Praktik Bahasa Inggris Terapan', 1, 5, 13, 'P', 1),
(53, 'PK5152', 'Praktek Kerja Lapangan', 7, 5, 13, 'P', 1),
(54, 'PK5151', 'Bahasa Indonesia (TTL)', 2, 5, 13, 'P', 1),
(55, 'PK5161', 'Kewirausahaan', 2, 5, 13, 'P', 1),
(56, 'TI6291', 'Capita Selecta', 2, 6, 13, 'T', 1),
(57, 'TI6301', 'Mata Kuliah Pilihan 2 / Etika Profesi', 2, 6, 13, 'T', 1),
(58, 'PK6192', 'Tugas Akhir', 4, 6, 13, 'P', 1),
(59, 'PK1011', 'Agama', 2, 1, 11, 'T', 1),
(60, 'PK1021', 'Matematika Dasar', 2, 1, 11, 'T', 1),
(61, 'PK1031', 'Fisika Dasar', 2, 1, 11, 'T', 1),
(62, 'TP1011', 'Kimia Dasar', 2, 1, 11, 'T', 1),
(63, 'PK1041', 'Keselamatan dan Kesehatan Kerja', 2, 1, 11, 'T', 1),
(64, 'PM1041', 'Gambar Teknik', 1, 1, 11, 'T', 1),
(65, 'TP1021', 'Budidaya Sawit', 2, 1, 11, 'T', 1),
(66, 'PK1062', 'Praktik Bahasa Inggris Terapan I', 1, 1, 11, 'P', 1),
(67, 'TP1022', 'Praktik Budidaya Sawit', 1, 1, 11, 'P', 1),
(68, 'TP1012', 'Praktik Kimia Dasar', 2, 1, 11, 'P', 1),
(69, 'PK1052', 'Praktik Aplikasi Perkantoran', 2, 1, 11, 'P', 1),
(70, 'PK1072', 'Praktik Proses Pemesinan', 1, 1, 11, 'P', 1),
(71, 'PM1041', 'Praktik Gambar Teknik', 1, 1, 11, 'P', 1),
(72, 'PK1032', 'Praktik fisika dasar', 1, 1, 11, 'P', 1),
(73, 'PK2081', 'Pancasila dan Kewarganegaraan', 3, 2, 11, 'T', 1),
(74, 'TP2031', 'Kimia Organik', 1, 2, 11, 'T', 1),
(75, 'TP2041', 'Azas Teknik Pengolahan', 2, 2, 11, 'T', 1),
(76, 'PK2102', 'Matematika Teknik', 2, 2, 11, 'T', 1),
(77, 'TP2051', 'Kimia Fisika', 2, 2, 11, 'T', 1),
(78, 'TP2061', 'Kimia Analitik', 2, 2, 11, 'T', 1),
(79, 'TP2071', 'Mikrobiologi Industri', 2, 2, 11, 'T', 1),
(80, 'TP2072', 'Praktik Mikrobiologi Industri', 1, 2, 11, 'P', 1),
(81, 'TP2042', 'Praktik Azas Teknik Pengolahan', 1, 2, 11, 'P', 1),
(82, 'PK2092', 'English Proficiency test 1', 1, 2, 11, 'P', 1),
(83, 'TP2032', 'Praktik Kimia Organik', 2, 2, 11, 'P', 1),
(84, 'TP2052', 'Praktik Kimia Fisika', 1, 2, 11, 'P', 1),
(85, 'TP2062', 'Praktik kimia Analitik', 2, 2, 11, 'P', 1),
(86, 'TP2082', 'Project 1', 1, 2, 11, 'P', 1),
(87, 'TP3081', 'Statistik', 2, 3, 11, 'T', 1),
(88, 'TP3091', 'Thermodinamika', 2, 3, 11, 'T', 1),
(89, 'TP3101', 'Teknologi Pengolahan Sawit I', 2, 3, 11, 'T', 1),
(90, 'TP3111', 'Proses Industri Kimia', 1, 3, 11, 'T', 1),
(91, 'TP3121', 'Pengetahuan Bahan dan Pengendalian Korosi', 2, 3, 11, 'T', 1),
(92, 'TP3131', 'Satuan Operasi', 3, 3, 11, 'T', 1),
(93, 'PK3121', 'Mesin Pengolahan Sawit I', 2, 3, 11, 'T', 1),
(94, 'TP3141', 'Instrumentasi', 1, 3, 11, 'T', 1),
(95, 'TP3102', 'Praktik Teknologi Pengolahan Sawit I', 2, 3, 11, 'P', 1),
(96, 'PK3112', 'Praktik Bahasa Inggris Terapan II', 1, 3, 11, 'P', 1),
(97, 'TP3132', 'Praktik Satuan Operasi I', 2, 3, 11, 'P', 1),
(98, 'PK3122', 'Praktik Mesin Pengolahan Sawit I', 1, 3, 11, 'P', 1),
(99, 'TP3142', 'Praktik Instrumentasi', 2, 3, 11, 'P', 1),
(100, 'PK4131', 'Manajemen Proyek', 2, 4, 11, 'T', 1),
(101, 'TP4151', 'Teknologi Pengemasan', 2, 4, 11, 'T', 1),
(102, 'TP4161', 'Utilitas', 2, 4, 11, 'T', 1),
(103, 'TP4171', 'Teknik Pengolahan Sawit II', 2, 4, 11, 'T', 1),
(104, 'TP4181', 'Ekonomi Teknik', 2, 4, 11, 'T', 1),
(105, 'TP4191', 'Teknik Pemisahan', 2, 4, 11, 'T', 1),
(106, 'TP4201', 'Mesin Pengolahan Sawit II', 2, 4, 11, 'T', 1),
(107, 'TP4212', 'Praktik Produksi I', 2, 4, 11, 'P', 1),
(108, 'TP4152', 'Praktik Teknologi Pengemasan', 1, 4, 11, 'P', 1),
(109, 'TP4172', 'Praktik Teknik Pengolahan Sawit II', 2, 4, 11, 'P', 1),
(110, 'TP4192', 'Praktik Teknik Pemisahan', 1, 4, 11, 'P', 1),
(111, 'TP4222', 'Project 2', 2, 4, 11, 'P', 1),
(112, 'PK4142', 'English Proficiency test 2', 1, 4, 11, 'P', 1),
(113, 'TP5231', 'Teknologi Pengolahan Limbah', 2, 5, 11, 'T', 1),
(114, 'TP5241', 'Teknik Pemipaan', 2, 5, 11, 'T', 1),
(115, 'TP5251', 'HACCP', 2, 5, 11, 'T', 1),
(116, 'TP5262', 'Praktik Produksi II', 3, 5, 11, 'P', 1),
(117, 'TP5232', 'Praktik Teknologi Pengolahan Limbah', 1, 5, 11, 'P', 1),
(118, 'TP5252', 'Praktik HACCP', 1, 5, 11, 'P', 1),
(119, 'PK6172', 'Praktek Kerja Lapangan', 6, 5, 11, 'P', 1),
(120, 'PK6151', 'Tata tulis laporan', 2, 6, 11, 'T', 1),
(121, 'PK6161', 'Kewirausahaan', 1, 6, 11, 'T', 1),
(122, 'PK6162', 'Praktik Kewirausahaan', 1, 6, 11, 'P', 1),
(123, 'PK6192', 'Tugas Akhir', 4, 6, 11, 'P', 1);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `pengajuan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `pengajuan` (
`nim` int(25)
,`nama_mhs` varchar(100)
,`prodi` varchar(10)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `jenisp_id` int(11) NOT NULL,
  `thn_akademik` varchar(122) NOT NULL,
  `tgl_distribusip` datetime NOT NULL,
  `tgl_mulai_daftar` datetime NOT NULL,
  `tgl_selesaip` datetime NOT NULL,
  `no_srt` varchar(128) NOT NULL,
  `isi` longtext NOT NULL,
  `status_pengumuman` int(11) NOT NULL,
  `ka_akademik` varchar(11) NOT NULL,
  `wadir1` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `jenisp_id`, `thn_akademik`, `tgl_distribusip`, `tgl_mulai_daftar`, `tgl_selesaip`, `no_srt`, `isi`, `status_pengumuman`, `ka_akademik`, `wadir1`) VALUES
(23, 1, '2019-1', '2019-09-30 14:19:00', '2019-10-01 14:19:00', '2019-10-04 14:19:00', 'TES/AKD.REG/01.19', '<p><span style=\"font-size:18px\"><span style=\"font-family:Times New Roman,Times,serif\">tes aja dulu</span></span></p>\n', 1, '0', '1'),
(24, 1, '2019-2', '2019-10-02 22:57:00', '2019-10-02 22:57:00', '2019-10-10 22:57:00', 'TES/AKD.Reg/02.19', '<p>test Pengumuman</p>\n', 0, '1', '1'),
(25, 2, '2019-2', '2019-10-02 22:58:00', '2019-10-02 22:58:00', '2019-10-11 22:58:00', 'TES/AKD.BA/02.19', '<p>test pengumuman</p>\n', 0, '0', '0'),
(27, 1, '2019-2', '2019-10-03 09:00:00', '2019-10-04 09:00:00', '2019-10-10 16:00:00', 'REG/AKD./03.19', '<p>Pengumuman registrasi dimulai</p>\n', 0, '0', '0'),
(28, 4, '2019-2', '2019-10-03 10:15:00', '2019-10-03 10:15:00', '2019-10-02 10:15:00', 'TE', '<p>jan apa</p>\n', 1, '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman_dist`
--

CREATE TABLE `pengumuman_dist` (
  `id_dist` int(11) NOT NULL,
  `jenisp_id` int(11) NOT NULL,
  `distribusi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengumuman_dist`
--

INSERT INTO `pengumuman_dist` (`id_dist`, `jenisp_id`, `distribusi`) VALUES
(1, 1, 4),
(3, 2, 2),
(6, 2, 3),
(7, 2, 13),
(8, 2, 6),
(9, 3, 2),
(10, 3, 4),
(11, 1, 1),
(12, 3, 3),
(13, 4, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rombel_detail_mhs`
--

CREATE TABLE `rombel_detail_mhs` (
  `id_rbm` int(64) NOT NULL,
  `nim` int(128) NOT NULL,
  `rombel_id` int(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rombel_jenis`
--

CREATE TABLE `rombel_jenis` (
  `id_rombel` int(11) NOT NULL,
  `angkatan_id` int(11) NOT NULL,
  `nama_rombel` varchar(25) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `dosen_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rombel_jenis`
--

INSERT INTO `rombel_jenis` (`id_rombel`, `angkatan_id`, `nama_rombel`, `prodi_id`, `dosen_id`) VALUES
(28, 3, 'TIF A', 13, 110306007);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ses_log`
--

CREATE TABLE `ses_log` (
  `id_sess` int(11) NOT NULL,
  `user_ses` varchar(128) NOT NULL,
  `tgl_sess` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id_dosen` int(10) NOT NULL,
  `nrp` int(25) NOT NULL,
  `nidn` int(25) NOT NULL,
  `nama_dsn` varchar(100) NOT NULL,
  `prodi_id` int(10) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id_dosen`, `nrp`, `nidn`, `nama_dsn`, `prodi_id`, `agama`, `gender`, `email`, `alamat`) VALUES
(1, 110306007, 1021058003, 'Fitri, S.T., M.Sc.', 13, 'Islam', 'L', 'fitri@gami.com', 'test1'),
(2, 110907026, 1003018202, 'M.Ridwan, S.T., M.T.', 13, 'Islam', 'L', 'ridwan@gmail.com', 'test'),
(3, 110809041, 2147483647, 'Ade Kurniawan, S.Kom.', 13, 'Islam', 'L', 'kurniawan@gmai.com', 'test1'),
(4, 1409112062, 2147483647, 'Slamet Triyanto, S.ST.', 13, 'Islam', 'L', 'slamet@gmail.com', 'test'),
(5, 110306006, 1031107801, 'Fenty Kurnia Oktorina,ST., M.Sc.', 13, 'Islam', 'P', 'fenty@gmail.com', 'test'),
(6, 110907028, 1014048204, 'Sri Wahyuni, S.P., M.Si.\r\n', 11, 'Islam', 'P', 'wahyuni@gmail.com', 'test'),
(7, 110306005, 1001088001, 'Fatmayati, S.T., M.Si.', 11, 'Islam', 'P', 'fatma@gmail.com', 'test'),
(8, 110306009, 1024057902, 'Nina Veronika, S.T., M.Sc.', 11, 'Islam', 'P', 'nina@gmail.com', 'test'),
(9, 110306010, 1011018202, 'Nur Asma Deli, S.T., M.Si.', 11, 'Islam', 'P', 'asmadeli@gmail.com', 'test'),
(10, 110907021, 1030088201, 'Anna Dhora, S.TP., M.P.', 11, 'Islam', 'P', 'anna@gmail.com', 'test'),
(11, 130809039, 1007128601, 'Hanifah Khairiah, S.ST., M.T.', 11, 'Islam', 'P', 'hanifah@gmail.com', 'test'),
(12, 110907027, 1020047802, 'Purnama Irwan, S.T., M.T.', 12, 'Islam', 'L', 'purnawan@gmail.com', 'test'),
(13, 110809042, 2147483647, 'Indah Purnama Putri, S.Pd., M.Si.', 12, 'Islam', 'P', 'indah@gmail.com', 'test'),
(14, 110306011, 1004057901, 'Romiyadi, S.T., M.T.', 12, 'Islam', 'L', 'romi@gmail.com', 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dosen_lb`
--

CREATE TABLE `tbl_dosen_lb` (
  `id_dosen_lb` int(25) NOT NULL,
  `nama_dlb` varchar(100) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dosen_lb`
--

INSERT INTO `tbl_dosen_lb` (`id_dosen_lb`, `nama_dlb`, `agama`, `gender`, `email`, `alamat`) VALUES
(1002312, 'M.suhendri,s,Ag', 'Islam', 'L', 'test@mail.com', 'test'),
(0, 'Mahdi', 'Islam', 'L', 'Mahdi@gmail.com', 'jl.tengku Umar'),
(1234567890, 'test', 'Islam', 'L', 'tesss1@gmail.com', 'test');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id_mhs` int(10) NOT NULL,
  `nim` int(25) NOT NULL,
  `nama_mhs` varchar(100) NOT NULL,
  `prodi_id` int(10) NOT NULL,
  `semester_id` int(10) NOT NULL,
  `angkatan_id` int(10) NOT NULL,
  `agama` varchar(25) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `foto` varchar(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id_mhs`, `nim`, `nama_mhs`, `prodi_id`, `semester_id`, `angkatan_id`, `agama`, `gender`, `email`, `alamat`, `foto`) VALUES
(1, 201613001, 'Siti Nurjannah', 13, 6, 1, 'Islam', 'P', 'mahasiswatif2016.001@poltek-kampar.ac.id', 'test', 'profile-pic.jpg'),
(2, 201613002, 'Annisa Nur Fitriyani', 13, 6, 1, 'Islam', 'P', 'mahasiswatif2016.002@poltek-kampar.ac.id', 'test', ''),
(3, 201613003, 'Nia Syafitri', 13, 6, 1, 'Islam', 'P', 'mahasiswatif2016.003@poltek-kampar.ac.id', 'test', ''),
(4, 201613004, 'Nur Amira', 13, 6, 1, 'Islam', 'P', 'mahasiswatif2016.004@poltek-kampar.ac.id', 'test', ''),
(5, 201613006, 'Muhammad Khairul Mustova', 13, 6, 1, 'Islam', 'L', 'mahasiswatif2016.006@poltek-kampar.ac.id', 'test', ''),
(6, 201613008, 'Mai Efendi', 13, 6, 1, 'Islam', 'L', 'mahasiswatif2016.008@poltek-kampar.ac.id', 'test', ''),
(7, 201613010, 'Mahdiawan Nurkholifah', 13, 6, 1, 'Islam', 'L', 'mahasiswatif2016.010@poltek-kampar.ac.id', 'test', ''),
(8, 201613012, 'Zulkifli', 13, 6, 1, 'Islam', 'L', 'mahasiswatif2016.012@poltek-kampar.ac.id', 'test', ''),
(9, 201613013, 'M. Desriadi', 13, 6, 1, 'Islam', 'L', 'mahasiswatif2016.013@poltek-kampar.ac.id', 'test', ''),
(10, 201613015, 'Defri Harmegi', 13, 6, 1, 'Islam', 'L', 'mahasiswatif2016.015@poltek-kampar.ac.id', 'test', ''),
(11, 201613016, 'Raju Gunawan ', 13, 6, 1, 'Islam', 'L', 'mahasiswatif2016.016@poltek-kampar.ac.id', 'test', ''),
(12, 201613017, 'Deni Sabrian', 13, 6, 1, 'Islam', 'L', 'mahasiswatif2016.017@poltek-kampar.ac.id', 'test', ''),
(13, 201613018, 'Muhammad Jundi', 13, 6, 1, 'Islam', 'L', 'mahasiswatif2016.018@poltek-kampar.ac.id', 'test', ''),
(14, 201713001, 'Toto Sumanto', 13, 4, 2, 'Islam', 'L', 'mahasiswatif2017.001@poltek-kampar.ac.id', 'test', ''),
(15, 201713002, 'Rachmadani Arison', 13, 4, 2, 'Islam', 'P', 'mahasiswatif2017.002@poltek-kampar.ac.id', 'test', ''),
(16, 201713004, 'Ryan Ismanizan', 13, 4, 2, 'Islam', 'L', 'mahasiswatif2017.004@poltek-kampar.ac.id', 'test', ''),
(17, 201713005, 'Ringga Septia Pribadi', 13, 4, 2, 'Islam', 'L', 'mahasiswatif2017.005@poltek-kampar.ac.id', 'test', ''),
(18, 201713006, 'Aldi Saputra', 13, 4, 2, 'Islam', 'L', 'mahasiswatif2017.006@poltek-kampar.ac.id', 'test', ''),
(19, 201713007, 'Ratul Mustika Janna', 13, 4, 2, 'Islam', 'P', 'mahasiswatif2017.007@poltek-kampar.ac.id', 'test', ''),
(20, 201713009, 'Leni Aprilia Ningsih', 13, 4, 2, 'Islam', 'P', 'mahasiswatif2017.009@poltek-kampar.ac.id', 'test', ''),
(21, 201713010, 'Ilham Sidiq', 13, 4, 2, 'Islam', 'L', 'mahasiswatif2017.010@poltek-kampar.ac.id', 'test', ''),
(22, 201813001, 'Erma Diana', 13, 2, 3, 'Islam', 'P', 'mahasiswatif2018.001@poltek-kampar.ac.id', 'test', ''),
(23, 201813002, 'Chandra Wardana', 13, 2, 3, 'Islam', 'L', 'mahasiswatif2018.002@poltek-kampar.ac.id', 'test', ''),
(24, 201813003, 'Putri Handa Yani', 13, 2, 3, 'Islam', 'P', 'mahasiswatif2018.003@poltek-kampar.ac.id', 'test', ''),
(25, 201813004, 'Faridah Badriyyah', 13, 2, 3, 'Islam', 'P', 'mahasiswatif2018.004@poltek-kampar.ac.id', 'test', ''),
(26, 201813005, 'M. Diaz Rahmadi', 13, 2, 3, 'Islam', 'L', 'mahasiswatif2018.005@poltek-kampar.ac.id', 'test', ''),
(27, 201612002, 'Muhammad Firdaus', 12, 6, 1, 'Islam', 'L', 'mahasiswappm2016.002@poltek-kampar.ac.id', 'test', ''),
(28, 201612003, 'Muhammad Suhaimi', 12, 6, 1, 'Islam', 'L', 'mahasiswappm2016.003@poltek-kampar.ac.id', 'test', ''),
(29, 201612005, 'Fajar Agil Riswanto', 12, 6, 1, 'Islam', 'L', 'mahasiswappm2016.005@poltek-kampar.ac.id', 'test', ''),
(30, 201612007, 'Indra Maulana', 12, 6, 1, 'Islam', 'L', 'mahasiswappm2016.007@poltek-kampar.ac.id', 'test', ''),
(31, 201712001, 'Indra Saputra', 12, 4, 2, 'Islam', 'L', 'mahasiswappm2017.001@poltek-kampar.ac.id', 'test', ''),
(32, 201712002, 'Eko Danang Saputra', 12, 4, 2, 'Islam', 'L', 'mahasiswappm2017.002@poltek-kampar.ac.id', 'test', ''),
(33, 201712003, 'Muhammad Ade Mukhlis', 12, 4, 2, 'Islam', 'L', 'mahasiswappm2017.003@poltek-kampar.ac.id', 'test', ''),
(34, 201712004, 'Angga Guspradana', 12, 4, 2, 'Islam', 'L', 'mahasiswappm2017.004@poltek-kampar.ac.id', 'test', ''),
(35, 201812001, 'Arifin Ahmad', 12, 2, 3, 'Islam', 'L', 'mahasiswappm2018.001@poltek-kampar.ac.id', 'test', ''),
(36, 201812002, 'Wildan Akromi', 12, 2, 3, 'Islam', 'L', 'mahasiswappm2018.002@poltek-kampar.ac.id', 'test', ''),
(37, 201812003, 'Raull Fadillah', 12, 2, 3, 'Islam', 'L', 'mahasiswappm2018.003@poltek-kampar.ac.id', 'test', ''),
(38, 201812004, 'M. Hafis Alfarido', 12, 2, 3, 'Islam', 'L', 'mahasiswappm2018.004@poltek-kampar.ac.id', 'test', ''),
(39, 201812005, 'Sandi Setiawan', 12, 2, 3, 'Islam', 'L', 'mahasiswappm2018.005@poltek-kampar.ac.id', 'test', ''),
(40, 201812006, 'Hardiyat Maulana', 12, 2, 3, 'Islam', 'L', 'mahasiswappm2018.006@poltek-kampar.ac.id', 'test', ''),
(41, 201812007, 'Muhammad Sutan Rio Hasibuan', 12, 2, 3, 'Islam', 'L', 'mahasiswappm2018.007@poltek-kampar.ac.id', 'test', ''),
(42, 201812009, 'Yandri', 12, 2, 3, 'Islam', 'L', 'mahasiswappm2018.009@poltek-kampar.ac.id', 'test', ''),
(43, 201611001, 'Aldiansyah', 11, 6, 1, 'Islam', 'L', 'mahasiswatps2016.001@poltek-kampar.ac.id', 'test', ''),
(44, 201611002, 'Nanda Eka Putra', 11, 6, 1, 'Islam', 'L', 'mahasiswatps2016.002@poltek-kampar.ac.id', 'test', ''),
(45, 201611003, 'Adlu Adil Saleh', 11, 6, 1, 'Islam', 'L', 'mahasiswatps2016.003@poltek-kampar.ac.id', 'test', ''),
(46, 201611004, 'Joni Pranata', 11, 6, 1, 'Islam', 'L', 'mahasiswatps2016.004@poltek-kampar.ac.id', 'test', ''),
(47, 201611005, 'Tuti Ayuna Sari', 11, 6, 1, 'Islam', 'P', 'mahasiswatps2016.005@poltek-kampar.ac.id', 'test', ''),
(48, 201611008, 'Fitri Suci Rahmadani', 11, 6, 1, 'Islam', 'P', 'mahasiswatps2016.008@poltek-kampar.ac.id', 'test', ''),
(49, 201611010, 'Dalisa', 11, 6, 1, 'Islam', 'L', 'mahasiswatps2016.010@poltek-kampar.ac.id', 'test', ''),
(50, 201611011, 'Yunaldi Hendra', 11, 6, 1, 'Islam', 'L', 'mahasiswatps2016.011@poltek-kampar.ac.id', 'test', ''),
(51, 201611013, 'Indro Pranowo', 11, 6, 1, 'Islam', 'L', 'mahasiswatps2016.013@poltek-kampar.ac.id', 'test', ''),
(52, 201611016, 'Qhauraf Fahlillah Islam', 11, 6, 1, 'Islam', 'L', 'mahasiswatps2016.016@poltek-kampar.ac.id', 'test', ''),
(53, 201611017, 'Feby Arrian', 11, 6, 1, 'Islam', 'L', 'mahasiswatps2016.017@poltek-kampar.ac.id', 'test', ''),
(54, 201611018, 'Aiztami', 11, 6, 1, 'Islam', 'L', 'mahasiswatps2016.018@poltek-kampar.ac.id', 'test', ''),
(55, 201611019, 'Zakirullah', 11, 6, 1, 'Islam', 'L', 'mahasiswatps2016.019@poltek-kampar.ac.id', 'test', ''),
(56, 201611020, 'Winda', 11, 6, 1, 'Islam', 'P', 'mahasiswatps2016.020@poltek-kampar.ac.id', 'test', ''),
(57, 201711001, 'Yeriken Delbi Almansyah', 11, 4, 2, 'Islam', 'L', 'mahasiswatps2017.001@poltek-kampar.ac.id', 'test', ''),
(58, 201711002, 'Nurmaiyani', 11, 4, 2, 'Islam', 'P', 'mahasiswatps2017.002@poltek-kampar.ac.id', 'test', ''),
(59, 201711003, 'Prity Deschawati', 11, 4, 2, 'Islam', 'P', 'mahasiswatps2017.003@poltek-kampar.ac.id', 'test', ''),
(60, 201711004, 'Efrimaldi Rambe', 11, 4, 2, 'Islam', 'L', 'mahasiswatps2017.004@poltek-kampar.ac.id', 'test', ''),
(61, 201711005, 'Irwan Efendi', 11, 4, 2, 'Islam', 'L', 'mahasiswatps2017.005@poltek-kampar.ac.id', 'test', ''),
(62, 201711007, 'M. Rafii Athallah Hilal', 11, 4, 2, 'Islam', 'L', 'mahasiswatps2017.007@poltek-kampar.ac.id', 'test', ''),
(63, 201711008, 'Reza Maulana', 11, 4, 2, 'Islam', 'L', 'mahasiswatps2017.008@poltek-kampar.ac.id', 'test', ''),
(64, 201711009, 'Fitria Hafiza', 11, 4, 2, 'Islam', 'P', 'mahasiswatps2017.009@poltek-kampar.ac.id', 'test', ''),
(65, 201711010, 'Bintang Cahya Muliadi', 11, 4, 2, 'Islam', 'L', 'mahasiswatps2017.010@poltek-kampar.ac.id', 'test', ''),
(66, 201711011, 'Ahmad Shaumbaqi Ramadhan', 11, 4, 2, 'Islam', 'L', 'mahasiswatps2017.011@poltek-kampar.ac.id', 'test', ''),
(67, 201711013, 'Perdi Kurnia', 11, 4, 2, 'Islam', 'L', 'mahasiswatps2017.013@poltek-kampar.ac.id', 'test', ''),
(68, 201711014, 'Abdi Darmawan', 11, 4, 2, 'Islam', 'L', 'mahasiswatps2017.014@poltek-kampar.ac.id', 'test', ''),
(69, 201711015, 'Ahmad Rahmadi', 11, 4, 2, 'Islam', 'L', 'mahasiswatps2017.015@poltek-kampar.ac.id', 'test', ''),
(70, 201711016, 'Doni Fahendra', 11, 4, 2, 'Islam', 'L', 'mahasiswatps2017.016@poltek-kampar.ac.id', 'test', ''),
(71, 201711017, 'Telsa Aidalina Putri', 11, 4, 2, 'Islam', 'P', 'mahasiswatps2017.017@poltek-kampar.ac.id', 'test', ''),
(72, 201711018, 'Annisa Fadila', 11, 4, 2, 'Islam', 'P', 'mahasiswatps2017.018@poltek-kampar.ac.id', 'test', ''),
(73, 201711019, 'Wahyu Pradana', 11, 4, 2, 'Islam', 'L', 'mahasiswatps2017.019@poltek-kampar.ac.id', 'test', ''),
(74, 201811001, 'Nesmi Arianti Hasibuan', 11, 2, 3, 'Islam', 'P', 'mahasiswatps2018.001@poltek-kampar.ac.id', 'test', ''),
(75, 201811002, 'Sugiarto', 11, 2, 3, 'Islam', 'L', 'mahasiswatps2018.002@poltek-kampar.ac.id', 'test', ''),
(76, 201811003, 'Sesti Yopita', 11, 2, 3, 'Islam', 'P', 'mahasiswatps2018.003@poltek-kampar.ac.id', 'test', ''),
(77, 201811004, 'Alnando Nikolas Sagala', 11, 2, 3, 'Islam', 'L', 'mahasiswatps2018.004@poltek-kampar.ac.id', 'test', ''),
(78, 201811005, 'Fitri Hidayani', 11, 2, 3, 'Islam', 'P', 'mahasiswatps2018.005@poltek-kampar.ac.id', 'test', ''),
(79, 201811006, 'Herliana Putri', 11, 2, 3, 'Islam', 'P', 'mahasiswatps2018.006@poltek-kampar.ac.id', 'test', ''),
(80, 201811007, 'Muhammad Ahsan Jihadan', 11, 2, 3, 'Islam', 'L', 'mahasiswatps2018.007@poltek-kampar.ac.id', 'test', ''),
(81, 201811009, 'Tedja Hadi Pratama', 11, 2, 3, 'Islam', 'L', 'mahasiswatps2018.009@poltek-kampar.ac.id', 'test', ''),
(82, 201811010, 'Rio ibnu ari febrianta', 11, 2, 3, 'Islam', 'L', 'mahasiswatps2018.010@poltek-kampar.ac.id', 'test', ''),
(83, 201811011, 'Nur Hasmi', 11, 2, 3, 'Islam', 'P', 'mahasiswatps2018.011@poltek-kampar.ac.id', 'test', ''),
(84, 201811012, 'Andi Saputra Harahap', 11, 2, 3, 'Islam', 'L', 'mahasiswatps2018.012@poltek-kampar.ac.id', 'test', ''),
(85, 201811013, 'Alfitrah Mulia Insani', 11, 2, 3, 'Islam', 'L', 'mahasiswatps2018.013@poltek-kampar.ac.id', 'test', ''),
(86, 201811014, 'Tri Apri Aldi', 11, 2, 3, 'Islam', 'L', 'mahasiswatps2018.014@poltek-kampar.ac.id', 'test', ''),
(87, 201811015, 'Zainur Khotib', 11, 2, 3, 'Islam', 'L', 'mahasiswatps2018.015@poltek-kampar.ac.id', 'test', ''),
(88, 201811016, 'Muhammad alKausar', 11, 2, 3, 'Islam', 'L', 'mahasiswatps2018.016@poltek-kampar.ac.id', 'test', ''),
(89, 201811017, 'Risma Wati', 11, 2, 3, 'Islam', 'P', 'mahasiswatps2018.017@poltek-kampar.ac.id', 'test', ''),
(90, 201811018, 'Fazri', 11, 2, 3, 'Islam', 'L', 'mahasiswatps2018.018@poltek-kampar.ac.id', 'test', ''),
(91, 201811019, 'Rezky Wahyu Saputra', 11, 2, 3, 'Islam', 'L', 'mahasiswatps2018.019@poltek-kampar.ac.id', 'test', ''),
(92, 201811020, 'Tifanny Wulandari', 11, 2, 3, 'Islam', 'P', 'mahasiswatps2018.020@poltek-kampar.ac.id', 'test', ''),
(93, 201811021, 'Sri Susanti', 11, 2, 3, 'Islam', 'P', 'mahasiswatps2018.021@poltek-kampar.ac.id', 'test', ''),
(94, 201811022, 'Nadya Elfitri', 11, 2, 3, 'Islam', 'P', 'mahasiswatps2018.022@poltek-kampar.ac.id', 'test', ''),
(95, 201811023, 'Diva Yogi Husada', 11, 2, 3, 'Islam', 'L', 'mahasiswatps2018.023@poltek-kampar.ac.id', 'test', ''),
(96, 201814001, 'Resis Marlita', 14, 2, 3, 'Islam', 'P', 'mahasiswaabi2018.001@poltek-kampar.ac.id', 'test', ''),
(97, 201814002, 'Fitria Melsi Wendra', 14, 2, 3, 'Islam', 'P', 'mahasiswaabi2018.002@poltek-kampar.ac.id', 'test', ''),
(98, 201814003, 'Suci Rahayu', 14, 2, 3, 'Islam', 'P', 'mahasiswaabi2018.003@poltek-kampar.ac.id', 'test', ''),
(99, 201814004, 'Novita Sari', 14, 2, 3, 'Islam', 'P', 'mahasiswaabi2018.004@poltek-kampar.ac.id', 'test', ''),
(100, 201814006, 'Rani Slapangki', 14, 2, 3, 'Islam', 'P', 'mahasiswaabi2018.006@poltek-kampar.ac.id', 'test', ''),
(101, 201814007, 'Imelda', 14, 2, 3, 'Islam', 'P', 'mahasiswaabi2018.007@poltek-kampar.ac.id', 'test', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id_menu` int(25) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(25) NOT NULL,
  `main_menu` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_menu`
--

INSERT INTO `tbl_menu` (`id_menu`, `nama_menu`, `link`, `icon`, `main_menu`) VALUES
(5, 'Data Mahasiswa', 'master/d_mhs', 'fa fa-list', 9),
(6, 'Data Dosen', 'master/d_dosen', 'fa fa-list', 9),
(7, 'Menu', 'pengaturan/d_menu', 'fa fa-list', 10),
(8, 'User Group', 'pengaturan/d_hakses', 'fa fa-list', 10),
(9, 'Data Master', '#', 'fa fa-group', 0),
(10, 'Pengaturan', '#', 'fa fa-gears orange', 0),
(11, 'Pengguna', 'pengaturan/d_pengguna', 'fa fa-list', 10),
(18, 'Registrasi Ulang', '#', 'fa fa-list', 0),
(21, 'Data Penagajuan Regis', 'r_pengajuan', 'fa fa-list', 18),
(22, 'Data Mahasiswa Terdaftar', 'r_selesai_daftar', 'fa fa-list', 18),
(25, 'Histori Registrasi', 'registrasi/histori_reg', 'fa fa-list', 18),
(26, 'Registrasi', 'registrasi/pendaftaran', 'fa fa-list', 18),
(27, 'Validasi Reg', 'registrasi/validasi', 'fa fa-list', 18),
(29, 'Prodi', 'master/d_prodi', 'fa fa-list', 9),
(36, 'Matakuliah', 'master/d_matkul', 'fa fa-list', 9),
(38, 'Data Gedung', 'd_gedung', 'fa fa-list', 9),
(39, 'Data Ruangan', 'd_ruangan', 'fa fa-list', 9),
(40, 'Rombel', 'master/d_rombel', 'fa fa-users', 9),
(43, 'Set Dosen Pengajar', 'jadwal_mk', 'fa fa-list', 42),
(44, 'Set Jadwal Kuliah', 'jadwal_mk/set_jadwal_mk', 'fa fa-list', 42),
(45, 'Rombel', 'b_rombel', 'fa fa-list', 0),
(46, 'Data Dosen LB', 'd_dosenlb', 'fa fa-list', 0),
(47, 'Distribusi Ajar', 'd_dbajar', 'fa fa-list', 0),
(48, 'Pengumuman', 'pengumuman', 'fa fa-list', 0),
(49, 'SK Mengajar', '#', 'fa fa-list', 0),
(50, 'MK Mengajar', 'mk_mengajar', 'fa fa-list', 0),
(51, 'Portal', 'p_portal', 'fa fa-list', 0),
(52, 'Aset', '#', 'fa fa-list', 0),
(53, 'Data Barang', 'sm_aset_barang', 'fa fa-list', 52),
(54, 'Aset Kendaraan', 'sm_aset_kendaraan', 'fa fa-list', 52),
(55, 'Dosen Pengajar', 'd_dosen_pengajar', 'fa fa-list', 49),
(57, 'SK Mengajar', 'sk_mengajar', 'fa fa-list', 49),
(58, 'Data Akademik', 'master/d_akademik', 'fa fa-list', 9),
(59, 'Peminjaman', '#', 'fa fa-list', 0),
(68, 'Data Asset Prodi', 'asset/asset_prodi', 'fa fa-list', 0),
(70, 'Peminjaman Barang', '#', 'fa fa-list', 0),
(71, 'Form Peminjaman', 'asset/peminjaman/peminjaman_barang', 'fa fa-list', 70),
(72, 'Histori Peminjaman Barang', 'asset/peminjaman', 'fa fa-list', 70),
(73, 'Data Peminjaman Barang', 'asset/data_peminjaman', 'fa fa-list', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_prodi`
--

CREATE TABLE `tbl_prodi` (
  `kode_prodi` int(128) NOT NULL,
  `nama_prodi` varchar(10) NOT NULL,
  `ketua` varchar(100) NOT NULL,
  `jenjang` varchar(128) NOT NULL,
  `ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_prodi`
--

INSERT INTO `tbl_prodi` (`kode_prodi`, `nama_prodi`, `ketua`, `jenjang`, `ket`) VALUES
(11, 'TPS', '110306005', 'D3', 'Teknik Pengolahan sawit'),
(12, 'PPM', '110306011', 'D3', 'Perbaikan Perawatan Mesin'),
(13, 'TIF', '110306007', 'D3', 'Teknik Informatika'),
(14, 'ABI', '', 'D4', 'Administrasi Bisnis Internasional');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reg_before`
--

CREATE TABLE `tbl_reg_before` (
  `id_rebor` int(10) NOT NULL,
  `nim` int(25) NOT NULL,
  `thun_akademik` varchar(12) NOT NULL,
  `semester` int(11) NOT NULL,
  `tgl_pengajuan` datetime NOT NULL,
  `v_lab_ppm` int(10) NOT NULL,
  `v_lab_tps` int(10) NOT NULL,
  `v_lab_tif` int(10) NOT NULL,
  `v_kompensasi` int(10) NOT NULL,
  `v_perpus` int(10) NOT NULL,
  `v_keuangan` int(10) NOT NULL,
  `v_khs` int(10) NOT NULL,
  `v_kaprodi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_reg_before`
--

INSERT INTO `tbl_reg_before` (`id_rebor`, `nim`, `thun_akademik`, `semester`, `tgl_pengajuan`, `v_lab_ppm`, `v_lab_tps`, `v_lab_tif`, `v_kompensasi`, `v_perpus`, `v_keuangan`, `v_khs`, `v_kaprodi`) VALUES
(1, 201613001, '2019-1', 6, '2019-10-02 11:18:05', 1, 1, 1, 1, 1, 1, 1, 0),
(2, 201613004, '2019-1', 6, '2019-10-02 11:36:36', 1, 1, 0, 1, 1, 0, 1, 0),
(3, 201613001, '2019-2', 5, '2019-10-02 11:18:05', 1, 1, 1, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_reg_selesai`
--

CREATE TABLE `tbl_reg_selesai` (
  `id_res` int(11) NOT NULL,
  `nim` int(20) NOT NULL,
  `semester_sebelum` int(11) NOT NULL,
  `semester_aktif` int(11) NOT NULL,
  `tgl_terdaftar` datetime NOT NULL,
  `thn_akademik` varchar(12) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_reg_selesai`
--

INSERT INTO `tbl_reg_selesai` (`id_res`, `nim`, `semester_sebelum`, `semester_aktif`, `tgl_terdaftar`, `thn_akademik`, `status`) VALUES
(1, 201613001, 6, 7, '2019-10-03 09:39:26', '2019-1', 'aktif'),
(2, 201613001, 5, 6, '2019-10-09 00:00:00', '2018-2', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_semester`
--

CREATE TABLE `tbl_semester` (
  `id` int(10) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `ket` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbl_semester`
--

INSERT INTO `tbl_semester` (`id`, `nama`, `ket`) VALUES
(1, 'SEMESTER 1', 'Ganjil'),
(2, 'SEMESTER 2', 'Genap'),
(3, 'SEMESTER 3', 'Ganjil'),
(4, 'SEMESTER 4', 'Genap'),
(5, 'SEMESTER 5', 'Ganjil'),
(6, 'SEMESTER 6', 'Genap'),
(7, 'SEMESTER 7', 'Ganjil'),
(8, 'SEMESTER 8', 'Genap');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tr_akses`
--

CREATE TABLE `tr_akses` (
  `id_akses` int(100) NOT NULL,
  `email` varchar(128) NOT NULL,
  `id_jabatan` int(100) NOT NULL,
  `keterangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tr_akses`
--

INSERT INTO `tr_akses` (`id_akses`, `email`, `id_jabatan`, `keterangan`) VALUES
(32, 'super@admin.com', 5, 0),
(41, 'operator@siak.com', 9, 0),
(43, 'fenty@gmail.com', 11, 0),
(44, 'ka_akademik@siak.com', 12, 0),
(46, 'slamet@gmail.com', 3, 13),
(48, 'ridwan@gmail.com', 6, 0),
(49, 'perpus@gmail.om', 13, 0),
(54, 'slamet@gmail.com', 1, 0),
(55, 'ridwan@gmail.com', 1, 0),
(56, 'umar@sima.com', 14, 0),
(60, 'fatma@gmail.com', 2, 11),
(67, 'anna@gmail.com', 12, 0),
(68, 'anna@gmail.com', 1, 0),
(69, 'fitri@gami.com', 2, 13),
(70, 'fitri@gami.com', 1, 0),
(71, 'kalabtps@gmail.com', 3, 11),
(76, 'hanifah@gmail.com', 6, 0),
(77, 'adeyoga@gmail.com', 3, 12),
(82, 'operator@ipd.com', 15, 0),
(83, 'fenty@gmail.com', 1, 0),
(84, 'mahasiswatif2016.001@poltek-kampar.ac.id', 4, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`email`, `username`, `password`) VALUES
('adeyoga@gmail.com', 'Ade Yoga', '827ccb0eea8a706c4c34a16891f84e7b'),
('anna@gmail.com', 'Anna Dhora, S.TP., M.P.', '827ccb0eea8a706c4c34a16891f84e7b'),
('fatma@gmail.com', 'Fatmayati, S.T., M.Si.', '827ccb0eea8a706c4c34a16891f84e7b'),
('fenty@gmail.com', 'Fenty Kurnia Oktorina,ST., M.Sc.', '827ccb0eea8a706c4c34a16891f84e7b'),
('fitri@gami.com', 'Fitri, S.T., M.Sc.', '827ccb0eea8a706c4c34a16891f84e7b'),
('hanifah@gmail.com', 'Hanifah Khairiah, S.ST., M.T.', '827ccb0eea8a706c4c34a16891f84e7b'),
('kalabtps@gmail.com', 'Antonius', '827ccb0eea8a706c4c34a16891f84e7b'),
('ka_akademik@siak.com', 'Ka Akademk', '827ccb0eea8a706c4c34a16891f84e7b'),
('mahasiswatif2016.001@poltek-kampar.ac.id', 'Siti Nurjannah', '43d993f92a2b6251fe67e563b1f63f97'),
('operator@ipd.com', 'OP IPD', 'e10adc3949ba59abbe56e057f20f883e'),
('operator@siak.com', 'OP Akademik', '827ccb0eea8a706c4c34a16891f84e7b'),
('perpus@gmail.om', 'OP Perpustakaan', '827ccb0eea8a706c4c34a16891f84e7b'),
('ridwan@gmail.com', 'M.Ridwan, S.T., M.T.', '827ccb0eea8a706c4c34a16891f84e7b'),
('slamet@gmail.com', 'Slamet Triyanto, S.ST.', '827ccb0eea8a706c4c34a16891f84e7b'),
('super@admin.com', 'Super Admin', '827ccb0eea8a706c4c34a16891f84e7b'),
('umar@sima.com', 'Umar Linggom', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

--
-- Struktur untuk view `data_mengajar`
--
DROP TABLE IF EXISTS `data_mengajar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_mengajar`  AS  select `a`.`id_dosen` AS `id_dosen`,`a`.`rombel_id` AS `rombel_id`,`b`.`kode_makul` AS `kode_makul`,`b`.`nama_makul` AS `nama_makul`,`b`.`sks` AS `sks`,`b`.`jenis_makul` AS `jenis_makul`,`c`.`nama_prodi` AS `nama_prodi`,`e`.`nama` AS `nama`,`f`.`id_rombel` AS `id_rombel`,`f`.`angkatan_id` AS `angkatan_id`,`f`.`nama_rombel` AS `nama_rombel`,`f`.`prodi_id` AS `prodi_id`,`f`.`dosen_id` AS `dosen_id`,`g`.`id_thnakad` AS `id_thnakad`,`g`.`thun_akademik` AS `thun_akademik`,`g`.`ta_tipe` AS `ta_tipe`,`g`.`keterangan` AS `keterangan`,`g`.`status` AS `status` from (((((`app_dosen_ajar` `a` join `makul_matakuliah` `b` on((`a`.`kode_makul` = `b`.`kode_makul`))) join `tbl_prodi` `c` on((`b`.`prodi_id` = `c`.`kode_prodi`))) join `tbl_semester` `e` on((`b`.`semester_id` = `e`.`id`))) join `rombel_jenis` `f` on((`a`.`rombel_id` = `f`.`id_rombel`))) join `app_thn_akademik` `g` on((`a`.`thn_id` = `g`.`id_thnakad`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `pengajuan`
--
DROP TABLE IF EXISTS `pengajuan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pengajuan`  AS  select `a`.`nim` AS `nim`,`a`.`nama_mhs` AS `nama_mhs`,`b`.`nama_prodi` AS `prodi` from (`tbl_mahasiswa` `a` join `tbl_prodi` `b` on((`a`.`prodi_id` = `b`.`kode_prodi`))) order by `a`.`prodi_id` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `app_angkatan`
--
ALTER TABLE `app_angkatan`
  ADD PRIMARY KEY (`id_angkatan`);

--
-- Indeks untuk tabel `app_aset_barang`
--
ALTER TABLE `app_aset_barang`
  ADD PRIMARY KEY (`id_aset_brng`);

--
-- Indeks untuk tabel `app_aset_kendaran`
--
ALTER TABLE `app_aset_kendaran`
  ADD PRIMARY KEY (`id_aset_kndran`);

--
-- Indeks untuk tabel `app_aset_prodi`
--
ALTER TABLE `app_aset_prodi`
  ADD PRIMARY KEY (`id_aset_brng`);

--
-- Indeks untuk tabel `app_data_peminjam`
--
ALTER TABLE `app_data_peminjam`
  ADD PRIMARY KEY (`id_peminjam`);

--
-- Indeks untuk tabel `app_dosen_ajar`
--
ALTER TABLE `app_dosen_ajar`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `app_gedung`
--
ALTER TABLE `app_gedung`
  ADD PRIMARY KEY (`gedung_id`);

--
-- Indeks untuk tabel `app_kurikulum`
--
ALTER TABLE `app_kurikulum`
  ADD PRIMARY KEY (`id_kur`);

--
-- Indeks untuk tabel `app_nilai_grade`
--
ALTER TABLE `app_nilai_grade`
  ADD PRIMARY KEY (`nilai_id`);

--
-- Indeks untuk tabel `app_nilai_mhs`
--
ALTER TABLE `app_nilai_mhs`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `app_notif`
--
ALTER TABLE `app_notif`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indeks untuk tabel `app_peminjaman_barang`
--
ALTER TABLE `app_peminjaman_barang`
  ADD PRIMARY KEY (`id_brg_pinjam`);

--
-- Indeks untuk tabel `app_portal`
--
ALTER TABLE `app_portal`
  ADD PRIMARY KEY (`id_portal`);

--
-- Indeks untuk tabel `app_ruangan`
--
ALTER TABLE `app_ruangan`
  ADD PRIMARY KEY (`ruangan_id`);

--
-- Indeks untuk tabel `app_sk_mengajar`
--
ALTER TABLE `app_sk_mengajar`
  ADD PRIMARY KEY (`id_sk`);

--
-- Indeks untuk tabel `app_thn_akademik`
--
ALTER TABLE `app_thn_akademik`
  ADD PRIMARY KEY (`id_thnakad`);

--
-- Indeks untuk tabel `con_reg`
--
ALTER TABLE `con_reg`
  ADD PRIMARY KEY (`id_reg`);

--
-- Indeks untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_hkases`),
  ADD KEY `id_jabatan` (`id_jabatan`,`id_menu`),
  ADD KEY `id_menu` (`id_menu`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jenis_pengumuman`
--
ALTER TABLE `jenis_pengumuman`
  ADD PRIMARY KEY (`id_jenisp`);

--
-- Indeks untuk tabel `makul_matakuliah`
--
ALTER TABLE `makul_matakuliah`
  ADD PRIMARY KEY (`makul_id`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indeks untuk tabel `pengumuman_dist`
--
ALTER TABLE `pengumuman_dist`
  ADD PRIMARY KEY (`id_dist`);

--
-- Indeks untuk tabel `rombel_detail_mhs`
--
ALTER TABLE `rombel_detail_mhs`
  ADD PRIMARY KEY (`id_rbm`);

--
-- Indeks untuk tabel `rombel_jenis`
--
ALTER TABLE `rombel_jenis`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indeks untuk tabel `ses_log`
--
ALTER TABLE `ses_log`
  ADD PRIMARY KEY (`id_sess`);

--
-- Indeks untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indeks untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `tbl_prodi`
--
ALTER TABLE `tbl_prodi`
  ADD PRIMARY KEY (`kode_prodi`);

--
-- Indeks untuk tabel `tbl_reg_before`
--
ALTER TABLE `tbl_reg_before`
  ADD PRIMARY KEY (`id_rebor`);

--
-- Indeks untuk tabel `tbl_reg_selesai`
--
ALTER TABLE `tbl_reg_selesai`
  ADD PRIMARY KEY (`id_res`);

--
-- Indeks untuk tabel `tbl_semester`
--
ALTER TABLE `tbl_semester`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tr_akses`
--
ALTER TABLE `tr_akses`
  ADD PRIMARY KEY (`id_akses`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `email` (`email`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `app_angkatan`
--
ALTER TABLE `app_angkatan`
  MODIFY `id_angkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `app_aset_barang`
--
ALTER TABLE `app_aset_barang`
  MODIFY `id_aset_brng` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `app_aset_kendaran`
--
ALTER TABLE `app_aset_kendaran`
  MODIFY `id_aset_kndran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `app_aset_prodi`
--
ALTER TABLE `app_aset_prodi`
  MODIFY `id_aset_brng` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `app_data_peminjam`
--
ALTER TABLE `app_data_peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `app_dosen_ajar`
--
ALTER TABLE `app_dosen_ajar`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `app_gedung`
--
ALTER TABLE `app_gedung`
  MODIFY `gedung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `app_kurikulum`
--
ALTER TABLE `app_kurikulum`
  MODIFY `id_kur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `app_nilai_grade`
--
ALTER TABLE `app_nilai_grade`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `app_nilai_mhs`
--
ALTER TABLE `app_nilai_mhs`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `app_notif`
--
ALTER TABLE `app_notif`
  MODIFY `id_notif` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT untuk tabel `app_peminjaman_barang`
--
ALTER TABLE `app_peminjaman_barang`
  MODIFY `id_brg_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `app_portal`
--
ALTER TABLE `app_portal`
  MODIFY `id_portal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `app_ruangan`
--
ALTER TABLE `app_ruangan`
  MODIFY `ruangan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `app_sk_mengajar`
--
ALTER TABLE `app_sk_mengajar`
  MODIFY `id_sk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `app_thn_akademik`
--
ALTER TABLE `app_thn_akademik`
  MODIFY `id_thnakad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `con_reg`
--
ALTER TABLE `con_reg`
  MODIFY `id_reg` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_hkases` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `jenis_pengumuman`
--
ALTER TABLE `jenis_pengumuman`
  MODIFY `id_jenisp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `makul_matakuliah`
--
ALTER TABLE `makul_matakuliah`
  MODIFY `makul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `pengumuman_dist`
--
ALTER TABLE `pengumuman_dist`
  MODIFY `id_dist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `rombel_detail_mhs`
--
ALTER TABLE `rombel_detail_mhs`
  MODIFY `id_rbm` int(64) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rombel_jenis`
--
ALTER TABLE `rombel_jenis`
  MODIFY `id_rombel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `ses_log`
--
ALTER TABLE `ses_log`
  MODIFY `id_sess` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id_dosen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mhs` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT untuk tabel `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id_menu` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `tbl_reg_before`
--
ALTER TABLE `tbl_reg_before`
  MODIFY `id_rebor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_reg_selesai`
--
ALTER TABLE `tbl_reg_selesai`
  MODIFY `id_res` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_semester`
--
ALTER TABLE `tbl_semester`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tr_akses`
--
ALTER TABLE `tr_akses`
  MODIFY `id_akses` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tr_akses`
--
ALTER TABLE `tr_akses`
  ADD CONSTRAINT `tr_akses_ibfk_2` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
