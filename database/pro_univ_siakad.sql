-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 04:39 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro_univ_siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `akademik_angkatan`
--

CREATE TABLE `akademik_angkatan` (
  `id_angkatan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akademik_angkatan`
--

INSERT INTO `akademik_angkatan` (`id_angkatan`, `tahun`) VALUES
(2, 2019);

-- --------------------------------------------------------

--
-- Table structure for table `akademik_jadwal_master`
--

CREATE TABLE `akademik_jadwal_master` (
  `id_jadwal_master` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `kode_mk` varchar(10) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `nilai_is_filled` int(1) NOT NULL,
  `kuisioner_isFilled` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akademik_jadwal_master`
--

INSERT INTO `akademik_jadwal_master` (`id_jadwal_master`, `id_tahun_akademik`, `kode_mk`, `id_prodi`, `id_kelas`, `nidn`, `nilai_is_filled`, `kuisioner_isFilled`) VALUES
(7, 2, 'MTK', 2, 4, '1301154417', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `akademik_jadwal_matkul`
--

CREATE TABLE `akademik_jadwal_matkul` (
  `id_jadwal_matkul` int(3) NOT NULL,
  `id_jadwal_master` int(11) NOT NULL,
  `id_hari` int(3) NOT NULL,
  `jam_mulai` varchar(5) NOT NULL,
  `jam_selesai` varchar(5) NOT NULL,
  `gedung_id` int(3) NOT NULL,
  `ruangan_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akademik_jadwal_matkul`
--

INSERT INTO `akademik_jadwal_matkul` (`id_jadwal_matkul`, `id_jadwal_master`, `id_hari`, `jam_mulai`, `jam_selesai`, `gedung_id`, `ruangan_id`) VALUES
(6, 7, 1, '06.30', '07.29', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `akademik_jadwal_ujian`
--

CREATE TABLE `akademik_jadwal_ujian` (
  `id_jadwal_ujian` int(11) NOT NULL,
  `id_jadwal_master` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `jam_mulai` varchar(5) NOT NULL,
  `jam_selesai` varchar(5) NOT NULL,
  `gedung_id` int(11) NOT NULL,
  `ruangan_id` int(11) NOT NULL,
  `jenis_ujian` int(1) NOT NULL COMMENT '1=UTS, 2=UAS'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `akademik_kegiatan`
--

CREATE TABLE `akademik_kegiatan` (
  `id_kegiatan` int(3) NOT NULL,
  `id_tahun_akademik` int(2) NOT NULL,
  `nama_kegiatan` varchar(30) NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `level` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `akademik_kehadiran_mhs`
--

CREATE TABLE `akademik_kehadiran_mhs` (
  `id_kehadiran` int(11) NOT NULL,
  `id_presensi` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `kehadiran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `akademik_kelas`
--

CREATE TABLE `akademik_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `kuota` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akademik_kelas`
--

INSERT INTO `akademik_kelas` (`id_kelas`, `nama_kelas`, `id_prodi`, `kuota`) VALUES
(4, 'IF-19-1', 2, 30);

-- --------------------------------------------------------

--
-- Table structure for table `akademik_krs`
--

CREATE TABLE `akademik_krs` (
  `id_krs` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `id_jadwal_master` int(11) NOT NULL,
  `semester` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akademik_krs`
--

INSERT INTO `akademik_krs` (`id_krs`, `nim`, `id_jadwal_master`, `semester`) VALUES
(3, 123123, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `akademik_materi`
--

CREATE TABLE `akademik_materi` (
  `id_materi` int(10) NOT NULL,
  `id_jadwal_master` int(10) NOT NULL,
  `judul_materi` varchar(50) NOT NULL,
  `id_file` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `akademik_matkul`
--

CREATE TABLE `akademik_matkul` (
  `kode_mk` varchar(10) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `sks_mk` int(1) NOT NULL,
  `semester` int(1) NOT NULL COMMENT '1=Ganjil 2=Genap',
  `tingkat` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `akademik_matkul`
--

INSERT INTO `akademik_matkul` (`kode_mk`, `nama_mk`, `id_prodi`, `sks_mk`, `semester`, `tingkat`) VALUES
('MTK', 'Matematika', 2, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `akademik_nilai`
--

CREATE TABLE `akademik_nilai` (
  `id_nilai` int(10) NOT NULL,
  `id_jadwal_master` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nilai` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `akademik_presensi`
--

CREATE TABLE `akademik_presensi` (
  `id_presensi` int(11) NOT NULL,
  `pertemuan` int(11) NOT NULL,
  `judul_pertemuan` text NOT NULL,
  `tanggal` date NOT NULL,
  `id_jadwal_matkul` int(11) NOT NULL,
  `is_filled` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `akademik_prodi`
--

CREATE TABLE `akademik_prodi` (
  `id_prodi` int(2) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `kode_prodi` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akademik_prodi`
--

INSERT INTO `akademik_prodi` (`id_prodi`, `nama_prodi`, `kode_prodi`) VALUES
(2, 'S1 Teknik Informatika', 'IF');

-- --------------------------------------------------------

--
-- Table structure for table `akademik_registrasi`
--

CREATE TABLE `akademik_registrasi` (
  `id_registrasi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status_regis` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akademik_registrasi`
--

INSERT INTO `akademik_registrasi` (`id_registrasi`, `id_transaksi`, `tanggal`, `status_regis`) VALUES
(6, 6, '2019-04-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `akademik_tahun_akademik`
--

CREATE TABLE `akademik_tahun_akademik` (
  `tahun_akademik_id` int(11) NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  `batas_registrasi` date NOT NULL,
  `status` enum('n','y') NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akademik_tahun_akademik`
--

INSERT INTO `akademik_tahun_akademik` (`tahun_akademik_id`, `keterangan`, `batas_registrasi`, `status`, `tahun`) VALUES
(2, '20191', '0000-00-00', 'y', 2019);

-- --------------------------------------------------------

--
-- Table structure for table `akademik_tugas`
--

CREATE TABLE `akademik_tugas` (
  `id_tugas` int(10) NOT NULL,
  `id_jadwal_master` int(10) NOT NULL,
  `judul_tugas` varchar(50) NOT NULL,
  `id_file` int(10) NOT NULL,
  `batas_upload` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `app_agama`
--

CREATE TABLE `app_agama` (
  `agama_id` int(11) NOT NULL,
  `keterangan` varchar(15) COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `app_agama`
--

INSERT INTO `app_agama` (`agama_id`, `keterangan`) VALUES
(1, 'Islam'),
(2, 'Kristen'),
(3, 'Katolik'),
(4, 'Budha'),
(5, 'Hindu'),
(6, 'Kepercayaan'),
(0, 'lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `app_gedung`
--

CREATE TABLE `app_gedung` (
  `gedung_id` int(11) NOT NULL,
  `nama_gedung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_gedung`
--

INSERT INTO `app_gedung` (`gedung_id`, `nama_gedung`) VALUES
(3, 'Tokong Nanas');

-- --------------------------------------------------------

--
-- Table structure for table `app_hari`
--

CREATE TABLE `app_hari` (
  `id_hari` int(11) NOT NULL,
  `nama_hari` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_hari`
--

INSERT INTO `app_hari` (`id_hari`, `nama_hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `app_kelas_mhs`
--

CREATE TABLE `app_kelas_mhs` (
  `id` int(3) NOT NULL,
  `id_kelas` int(3) NOT NULL,
  `id_mhs` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_kelas_mhs`
--

INSERT INTO `app_kelas_mhs` (`id`, `id_kelas`, `id_mhs`) VALUES
(3, 4, 123123);

-- --------------------------------------------------------

--
-- Table structure for table `app_pekerjaan`
--

CREATE TABLE `app_pekerjaan` (
  `pekerjaan_id` varchar(2) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_pekerjaan`
--

INSERT INTO `app_pekerjaan` (`pekerjaan_id`, `keterangan`) VALUES
('1', 'tidak bekerja'),
('10', 'Wirausaha'),
('11', 'buruh'),
('12', 'pensiunan'),
('2', 'nelayan'),
('3', 'petani'),
('4', 'peternak'),
('5', 'PNS/ TNI/ Polri'),
('6', 'Karyawan Swasta'),
('7', 'Pedagang Kecil'),
('8', 'Pedagang Besar'),
('9', 'Wiraswasta'),
('99', 'lainya');

-- --------------------------------------------------------

--
-- Table structure for table `app_ruangan`
--

CREATE TABLE `app_ruangan` (
  `ruangan_id` int(11) NOT NULL,
  `nama_ruangan` varchar(20) NOT NULL,
  `gedung_id` int(11) NOT NULL,
  `kapasitas` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_ruangan`
--

INSERT INTO `app_ruangan` (`ruangan_id`, `nama_ruangan`, `gedung_id`, `kapasitas`, `keterangan`) VALUES
(3, 'KU1.01.01', 3, 30, 'Ruang Kuliah Umum 1');

-- --------------------------------------------------------

--
-- Table structure for table `app_shift`
--

CREATE TABLE `app_shift` (
  `id_shift` int(11) NOT NULL,
  `nama_shift` varchar(12) NOT NULL,
  `jam_mulai` varchar(5) NOT NULL,
  `jam_selesai` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_shift`
--

INSERT INTO `app_shift` (`id_shift`, `nama_shift`, `jam_mulai`, `jam_selesai`) VALUES
(1, '1', '06.30', '07.29'),
(2, '2', '07.30', '08.29'),
(3, '3', '08.30', '09.29'),
(4, '4', '09.30', '10.29'),
(5, '5', '10.30', '11.29'),
(6, '6', '11.30', '12.29'),
(7, '7', '12.30', '13.29'),
(8, '8', '13.30', '14.29'),
(9, '9', '14.30', '15.29'),
(10, '10', '15.30', '16.29'),
(11, '11', '16.30', '17.29'),
(12, '12', '17.30', '18.29');

-- --------------------------------------------------------

--
-- Table structure for table `keuangan_biaya`
--

CREATE TABLE `keuangan_biaya` (
  `id_biaya` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `id_prodi` int(11) NOT NULL,
  `jenis_pembayaran` int(2) NOT NULL COMMENT '1=regis_semester,2=spp_bulanan',
  `bulan` int(2) NOT NULL,
  `jumlah_biaya` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan_biaya`
--

INSERT INTO `keuangan_biaya` (`id_biaya`, `id_tahun_akademik`, `id_prodi`, `jenis_pembayaran`, `bulan`, `jumlah_biaya`) VALUES
(2, 2, 2, 1, 1, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `keuangan_transaksi`
--

CREATE TABLE `keuangan_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `id_biaya` int(10) NOT NULL,
  `status_pembayaran_mhs` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `buktipembayaran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keuangan_transaksi`
--

INSERT INTO `keuangan_transaksi` (`id_transaksi`, `id_tahun_akademik`, `nim`, `id_biaya`, `status_pembayaran_mhs`, `tanggal`, `buktipembayaran`) VALUES
(6, 2, 123123, 2, 1, '2019-04-09', '54');

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner_judul`
--

CREATE TABLE `kuisioner_judul` (
  `id_kuisioner_judul` int(11) NOT NULL,
  `id_tahun_akademik` int(11) NOT NULL,
  `tipe` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner_mhs_hasil_tipe_dua`
--

CREATE TABLE `kuisioner_mhs_hasil_tipe_dua` (
  `id_kuisioner_mhs_hasil_tipe_dua` int(11) NOT NULL,
  `id_kuisioner_judul` int(11) NOT NULL,
  `id_kuisioner_pertanyaan` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `hasil` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner_mhs_hasil_tipe_satu`
--

CREATE TABLE `kuisioner_mhs_hasil_tipe_satu` (
  `id_kuisioner_mhs_hasil_tipe_satu` int(11) NOT NULL,
  `id_kuisioner_judul` int(11) NOT NULL,
  `id_kuisioner_pertanyaan` int(11) NOT NULL,
  `id_jadwal_master` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `hasil` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner_pertanyaan`
--

CREATE TABLE `kuisioner_pertanyaan` (
  `id_kuisioner_pertanyaan` int(11) NOT NULL,
  `id_kuisioner_judul` int(11) NOT NULL,
  `pertanyaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_lengkap` varchar(70) NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `nip` varchar(22) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `agama_id` int(1) NOT NULL,
  `status_kawin` int(1) NOT NULL COMMENT '1=kawin ,2=belum kawin',
  `gelar_pendidikan` varchar(10) NOT NULL,
  `jabatan_akademik` varchar(20) NOT NULL,
  `pendidikan` varchar(3) NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(12) NOT NULL,
  `email` varchar(40) NOT NULL,
  `prodi_id` int(11) NOT NULL,
  `status_pekerjaan` int(1) NOT NULL COMMENT '1=tetap, 2=tidak tetap',
  `foto_profil` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`id_dosen`, `nama_lengkap`, `nidn`, `nip`, `no_ktp`, `tempat_lahir`, `tanggal_lahir`, `gender`, `agama_id`, `status_kawin`, `gelar_pendidikan`, `jabatan_akademik`, `pendidikan`, `alamat`, `hp`, `email`, `prodi_id`, `status_pekerjaan`, `foto_profil`) VALUES
(1, 'M. F. Muzakki', '1301154417', '1301154417', '1301154417', 'asd', '1231-12-12', 'p', 1, 1, 'S2', '', '', 'asd', '123123123', 'dasda@asdasd.com', 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mahasiswa`
--

CREATE TABLE `tbl_mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(13) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `angkatan_id` int(4) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `gender` varchar(1) NOT NULL,
  `agama_id` int(11) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `no_hp_ortu` varchar(12) NOT NULL,
  `pekerjaan_id_ibu` int(11) NOT NULL,
  `pekerjaan_id_ayah` int(11) NOT NULL,
  `alamat_ayah` text NOT NULL,
  `alamat_ibu` text NOT NULL,
  `penghasilan_ayah` varchar(11) NOT NULL,
  `penghasilan_ibu` varchar(11) NOT NULL,
  `sekolah_nama` varchar(50) NOT NULL,
  `sekolah_telpon` varchar(12) NOT NULL,
  `sekolah_alamat` text NOT NULL,
  `sekolah_jurusan` varchar(80) NOT NULL,
  `sekolah_tahun_lulus` int(4) NOT NULL,
  `kampus_prodi` varchar(80) NOT NULL,
  `semester_aktif` int(11) NOT NULL,
  `status_pembayaran_mahasiswa` int(11) NOT NULL,
  `status_mahasiswa` int(11) NOT NULL,
  `foto_profil` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mahasiswa`
--

INSERT INTO `tbl_mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `angkatan_id`, `id_kelas`, `alamat`, `gender`, `agama_id`, `tempat_lahir`, `tanggal_lahir`, `nama_ibu`, `nama_ayah`, `no_hp_ortu`, `pekerjaan_id_ibu`, `pekerjaan_id_ayah`, `alamat_ayah`, `alamat_ibu`, `penghasilan_ayah`, `penghasilan_ibu`, `sekolah_nama`, `sekolah_telpon`, `sekolah_alamat`, `sekolah_jurusan`, `sekolah_tahun_lulus`, `kampus_prodi`, `semester_aktif`, `status_pembayaran_mahasiswa`, `status_mahasiswa`, `foto_profil`) VALUES
(1, '123123', '123123', 2, 4, 'asdasd', 'p', 1, 'ghf', '1231-12-12', 'hgf', 'ghf', '876', 1, 1, 'asd', 'asd', '&lt;3000000', '&lt;3000000', 'asd', '123', 'zsdsa', 'ipa', 1233, '2', 2, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_users` int(11) NOT NULL,
  `kode_user` varchar(20) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `kode_user`, `display_name`, `username`, `password`, `level`, `last_login`) VALUES
(1, 'SU0001', 'M Farhan Muzakki', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2019-04-09 09:38:43'),
(2, '1301154417', 'M. F. Muzakki', '1301154417', '5aff205cb3337c582e014d6d9a692f83', 2, NULL),
(3, '123123', '123123', '123123', 'a809ab3dcef97569f55b56d9050d20cc', 3, '2019-04-09 02:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `temp_krs`
--

CREATE TABLE `temp_krs` (
  `id_krs` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `id_jadwal_master` int(11) NOT NULL,
  `semester` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tugas_mhs`
--

CREATE TABLE `tugas_mhs` (
  `id_tugas_mhs` int(100) NOT NULL,
  `id_tugas` int(50) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `id_file` int(3) NOT NULL,
  `uploaded_time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tugas_mhs`
--

INSERT INTO `tugas_mhs` (`id_tugas_mhs`, `id_tugas`, `nim`, `id_file`, `uploaded_time`) VALUES
(3, 5, '1301154417', 25, '0000-00-00'),
(4, 8, '1301154417', 21, '0000-00-00'),
(7, 11, '123123', 31, '2018-07-18'),
(8, 12, '123123', 31, '2018-07-18'),
(9, 9, '123123', 52, '2018-07-18');

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_file`
--

CREATE TABLE `uploaded_file` (
  `id_bukti` int(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `filename` text NOT NULL,
  `owner` varchar(20) NOT NULL,
  `dir` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploaded_file`
--

INSERT INTO `uploaded_file` (`id_bukti`, `judul`, `filename`, `owner`, `dir`) VALUES
(5, 'TX_20181_1301154417', 'Foto_Profil.jpg', '1301154417', '3/1301154417/Foto_Profil.jpg'),
(9, 'Bab Rep', '195-306-1-PB.pdf', '423088501', '2/423088501/1/195-306-1-PB.pdf'),
(10, 'hjg', '1751-4684-1-PB.pdf', '423088501', '2/423088501/1/1751-4684-1-PB.pdf'),
(11, 'asd', '795-2229-1-PB.pdf', '423088501', '2/423088501/2/795-2229-1-PB.pdf'),
(12, 'asd', '2540-4933-1-PB.pdf', '423088501', '2/423088501/1/Materi/2540-4933-1-PB.pdf'),
(13, 'asddas', '195-306-1-PB_2.pdf', '423088501', '2/423088501/1/Materi/195-306-1-PB_2.pdf'),
(14, 'asasd', '795-2229-1-PB.pdf', '423088501', '2/423088501/1/Materi/795-2229-1-PB.pdf'),
(15, 'asdasdasd', '1751-4684-1-PB.pdf', '423088501', '2/423088501/1/Materi/1751-4684-1-PB.pdf'),
(16, 'tugas 1', '1358-5595-1-PB.pdf', '423088501', '2/423088501/1/Tugas/1358-5595-1-PB.pdf'),
(17, 'tugas 2', '17788-19839-1-PB.pdf', '423088501', '2/423088501/1/Tugas/17788-19839-1-PB.pdf'),
(18, 'Tugas 1', '1358-5595-1-PB.pdf', '423088501', '2/423088501/1/Tugas/1358-5595-1-PB.pdf'),
(19, 'Tugas 1', '2540-4933-1-PB.pdf', '423088501', '2/423088501/1/Tugas/2540-4933-1-PB.pdf'),
(20, 'Tugas 1', '795-2229-1-PB.pdf', '423088501', '2/423088501/1/Tugas/795-2229-1-PB.pdf'),
(21, '5', '2540-4933-1-PB.pdf', '1301154417', '3/1301154417/1/Tugas/2540-4933-1-PB.pdf'),
(22, 'TGS_1301154417_5', '1358-5595-1-PB.pdf', '1301154417', '3/1301154417/1/Tugas/1358-5595-1-PB.pdf'),
(23, 'TGS_1301154417_5', '195-306-1-PB.pdf', '1301154417', '3/1301154417/1/Tugas/195-306-1-PB.pdf'),
(24, 'Tugas 1', '195-306-1-PB_2.pdf', '423088501', '2/423088501/2/Tugas/195-306-1-PB_2.pdf'),
(25, 'TGS_1301154417_5', 'laporan_tugas_Qlearning_Fazrian.pdf', '1301154417', '3/1301154417/1/Tugas/laporan_tugas_Qlearning_Fazrian.pdf'),
(26, 'Tugas 2', '5405-10445-1-SM.pdf', '423088501', '2/423088501/1/Tugas/5405-10445-1-SM.pdf'),
(27, 'df', '4921-9468-1-SM.pdf', '423088501', '2/423088501/1/Materi/4921-9468-1-SM.pdf'),
(28, 'TGS_1301154417_8', '2540-4933-1-PB.pdf', '1301154417', '3/1301154417/1/Tugas/2540-4933-1-PB.pdf'),
(29, 'TX_20181_123123', 'Foto_Profil.jpg', '123123', '3/123123/Foto_Profil.jpg'),
(30, 'qwe', 'CV_Tia.docx', '423088501', '2/423088501/4/Tugas/CV_Tia.docx'),
(31, 'TGS_123123_9', '1301154417_IF3911.docx', '123123', '3/123123/4/Tugas/1301154417_IF3911.docx'),
(32, 'adsads', 'Mahasiswa.docx', '423088501', '2/423088501/4/Tugas/Mahasiswa.docx'),
(33, 'TGS_123123_10', '1301154417_IF3911.docx', '123123', '3/123123/4/Tugas/1301154417_IF3911.docx'),
(34, 'asd', 'Mahasiswa.docx', '423088501', '2/423088501/4/Materi/Mahasiswa.docx'),
(35, 'asd', 'CV_Wily.docx', '423088501', '2/423088501/4/Tugas/CV_Wily.docx'),
(36, 'TGS_123123_11', '1301154417_IF3911.docx', '123123', '3/123123/4/Tugas/1301154417_IF3911.docx'),
(37, 'sd', 'CV_Wily.docx', '423088501', '2/423088501/4/Tugas/CV_Wily.docx'),
(38, 'TGS_123123_12', '1301154417_IF3911.docx', '123123', '3/123123/4/Tugas/1301154417_IF3911.docx'),
(39, 'asd', 'CV_Wily.docx', '423088501', '2/423088501/4/Tugas/CV_Wily.docx'),
(40, 'TGS_123123_13', '1301154417_IF3911.docx', '123123', '3/123123/4/Tugas/1301154417_IF3911.docx'),
(41, 'TGS_123123_', 'Foto_Profil.jpg', '123123', '3/123123/DP/Foto_Profil.jpg'),
(42, 'TGS_123123_', 'Foto_Profil.jpg', '123123', '3/123123/DP/Foto_Profil.jpg'),
(43, 'DP_123123', 'Foto_Profil.jpg', '123123', '3/123123/DP/Foto_Profil.jpg'),
(44, 'DP_123123', 'produk.png', '123123', '3/123123/DP/produk.png'),
(45, 'DP_123123', 'Foto_Profil.jpg', '123123', '3/123123/DP/Foto_Profil.jpg'),
(46, 'DP_123123', 'Foto_Profil.jpg', '123123', '3/123123/DP/Foto_Profil.jpg'),
(47, 'DP_123123', 'Foto_Profil.jpg', '123123', '3/123123/DP/Foto_Profil.jpg'),
(48, 'DP_123123', 'Foto_Profil.jpg', '123123', '3/123123/DP/Foto_Profil.jpg'),
(49, 'DP_423088501', 'Foto_Profil.jpg', '423088501', '2/423088501/DP/Foto_Profil.jpg'),
(50, 'DP_1301154417', 'Foto_Profil.jpg', '1301154417', '3/1301154417/DP/Foto_Profil.jpg'),
(51, 'asd', '1101153622_Registrasi___Telkom_University.pdf', '423088501', '2/423088501/4/Tugas/1101153622_Registrasi___Telkom_University.pdf'),
(52, 'TGS_123123_9', 'CV_Tia.docx', '123123', '3/123123/4/Tugas/CV_Tia.docx'),
(53, 'asd', '1301154417_IF3911.docx', '423088501', '2/423088501/4/Tugas/1301154417_IF3911.docx'),
(54, 'TX_20191_123123', 'z.png', '123123', '3/123123/z.png'),
(55, 'TX_20191_123123', 'z.png', '123123', '3/123123/z.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akademik_angkatan`
--
ALTER TABLE `akademik_angkatan`
  ADD PRIMARY KEY (`id_angkatan`);

--
-- Indexes for table `akademik_jadwal_master`
--
ALTER TABLE `akademik_jadwal_master`
  ADD PRIMARY KEY (`id_jadwal_master`);

--
-- Indexes for table `akademik_jadwal_matkul`
--
ALTER TABLE `akademik_jadwal_matkul`
  ADD PRIMARY KEY (`id_jadwal_matkul`);

--
-- Indexes for table `akademik_jadwal_ujian`
--
ALTER TABLE `akademik_jadwal_ujian`
  ADD PRIMARY KEY (`id_jadwal_ujian`);

--
-- Indexes for table `akademik_kegiatan`
--
ALTER TABLE `akademik_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `akademik_kehadiran_mhs`
--
ALTER TABLE `akademik_kehadiran_mhs`
  ADD PRIMARY KEY (`id_kehadiran`);

--
-- Indexes for table `akademik_kelas`
--
ALTER TABLE `akademik_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `akademik_krs`
--
ALTER TABLE `akademik_krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `akademik_materi`
--
ALTER TABLE `akademik_materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indexes for table `akademik_matkul`
--
ALTER TABLE `akademik_matkul`
  ADD PRIMARY KEY (`kode_mk`);

--
-- Indexes for table `akademik_nilai`
--
ALTER TABLE `akademik_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `akademik_presensi`
--
ALTER TABLE `akademik_presensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- Indexes for table `akademik_prodi`
--
ALTER TABLE `akademik_prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `akademik_registrasi`
--
ALTER TABLE `akademik_registrasi`
  ADD PRIMARY KEY (`id_registrasi`);

--
-- Indexes for table `akademik_tahun_akademik`
--
ALTER TABLE `akademik_tahun_akademik`
  ADD PRIMARY KEY (`tahun_akademik_id`);

--
-- Indexes for table `akademik_tugas`
--
ALTER TABLE `akademik_tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- Indexes for table `app_agama`
--
ALTER TABLE `app_agama`
  ADD PRIMARY KEY (`agama_id`);

--
-- Indexes for table `app_gedung`
--
ALTER TABLE `app_gedung`
  ADD PRIMARY KEY (`gedung_id`);

--
-- Indexes for table `app_hari`
--
ALTER TABLE `app_hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `app_kelas_mhs`
--
ALTER TABLE `app_kelas_mhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_pekerjaan`
--
ALTER TABLE `app_pekerjaan`
  ADD PRIMARY KEY (`pekerjaan_id`);

--
-- Indexes for table `app_ruangan`
--
ALTER TABLE `app_ruangan`
  ADD PRIMARY KEY (`ruangan_id`);

--
-- Indexes for table `app_shift`
--
ALTER TABLE `app_shift`
  ADD PRIMARY KEY (`id_shift`);

--
-- Indexes for table `keuangan_biaya`
--
ALTER TABLE `keuangan_biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `keuangan_transaksi`
--
ALTER TABLE `keuangan_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `kuisioner_judul`
--
ALTER TABLE `kuisioner_judul`
  ADD PRIMARY KEY (`id_kuisioner_judul`);

--
-- Indexes for table `kuisioner_mhs_hasil_tipe_dua`
--
ALTER TABLE `kuisioner_mhs_hasil_tipe_dua`
  ADD PRIMARY KEY (`id_kuisioner_mhs_hasil_tipe_dua`);

--
-- Indexes for table `kuisioner_mhs_hasil_tipe_satu`
--
ALTER TABLE `kuisioner_mhs_hasil_tipe_satu`
  ADD PRIMARY KEY (`id_kuisioner_mhs_hasil_tipe_satu`);

--
-- Indexes for table `kuisioner_pertanyaan`
--
ALTER TABLE `kuisioner_pertanyaan`
  ADD PRIMARY KEY (`id_kuisioner_pertanyaan`);

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `kode_user` (`kode_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `temp_krs`
--
ALTER TABLE `temp_krs`
  ADD PRIMARY KEY (`id_krs`);

--
-- Indexes for table `tugas_mhs`
--
ALTER TABLE `tugas_mhs`
  ADD PRIMARY KEY (`id_tugas_mhs`);

--
-- Indexes for table `uploaded_file`
--
ALTER TABLE `uploaded_file`
  ADD PRIMARY KEY (`id_bukti`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akademik_angkatan`
--
ALTER TABLE `akademik_angkatan`
  MODIFY `id_angkatan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `akademik_jadwal_master`
--
ALTER TABLE `akademik_jadwal_master`
  MODIFY `id_jadwal_master` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `akademik_jadwal_matkul`
--
ALTER TABLE `akademik_jadwal_matkul`
  MODIFY `id_jadwal_matkul` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `akademik_jadwal_ujian`
--
ALTER TABLE `akademik_jadwal_ujian`
  MODIFY `id_jadwal_ujian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `akademik_kegiatan`
--
ALTER TABLE `akademik_kegiatan`
  MODIFY `id_kegiatan` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `akademik_kehadiran_mhs`
--
ALTER TABLE `akademik_kehadiran_mhs`
  MODIFY `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `akademik_kelas`
--
ALTER TABLE `akademik_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `akademik_krs`
--
ALTER TABLE `akademik_krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `akademik_materi`
--
ALTER TABLE `akademik_materi`
  MODIFY `id_materi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `akademik_nilai`
--
ALTER TABLE `akademik_nilai`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `akademik_presensi`
--
ALTER TABLE `akademik_presensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `akademik_prodi`
--
ALTER TABLE `akademik_prodi`
  MODIFY `id_prodi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `akademik_registrasi`
--
ALTER TABLE `akademik_registrasi`
  MODIFY `id_registrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `akademik_tahun_akademik`
--
ALTER TABLE `akademik_tahun_akademik`
  MODIFY `tahun_akademik_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `akademik_tugas`
--
ALTER TABLE `akademik_tugas`
  MODIFY `id_tugas` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_gedung`
--
ALTER TABLE `app_gedung`
  MODIFY `gedung_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `app_hari`
--
ALTER TABLE `app_hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `app_kelas_mhs`
--
ALTER TABLE `app_kelas_mhs`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `app_ruangan`
--
ALTER TABLE `app_ruangan`
  MODIFY `ruangan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `app_shift`
--
ALTER TABLE `app_shift`
  MODIFY `id_shift` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `keuangan_biaya`
--
ALTER TABLE `keuangan_biaya`
  MODIFY `id_biaya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keuangan_transaksi`
--
ALTER TABLE `keuangan_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kuisioner_judul`
--
ALTER TABLE `kuisioner_judul`
  MODIFY `id_kuisioner_judul` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuisioner_mhs_hasil_tipe_dua`
--
ALTER TABLE `kuisioner_mhs_hasil_tipe_dua`
  MODIFY `id_kuisioner_mhs_hasil_tipe_dua` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuisioner_mhs_hasil_tipe_satu`
--
ALTER TABLE `kuisioner_mhs_hasil_tipe_satu`
  MODIFY `id_kuisioner_mhs_hasil_tipe_satu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kuisioner_pertanyaan`
--
ALTER TABLE `kuisioner_pertanyaan`
  MODIFY `id_kuisioner_pertanyaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_mahasiswa`
--
ALTER TABLE `tbl_mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `temp_krs`
--
ALTER TABLE `temp_krs`
  MODIFY `id_krs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tugas_mhs`
--
ALTER TABLE `tugas_mhs`
  MODIFY `id_tugas_mhs` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `uploaded_file`
--
ALTER TABLE `uploaded_file`
  MODIFY `id_bukti` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
