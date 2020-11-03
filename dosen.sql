-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 07:39 PM
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
-- Database: `dosen`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetDpaRecord` (IN `kode` VARCHAR(4), OUT `nama` CHAR(48), OUT `classid` VARCHAR(8), IN `year` VARCHAR(16))  BEGIN
if @p0 is not null or @p3 is not null then
select d.kode, l.nama, d.classid, d.year
from dpa d 
join lecturers l on d.kode=l.kode 
where d.kode=@p0 and d.year=@p3;
end if;

if @p0 ='' and @p3 ='' THEN
select d.kode, l.nama, d.classid, d.year
from dpa d 
join lecturers l on d.kode=l.kode;
end if;

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetLecturersTeam` (OUT `nama` CHAR(48), IN `teamid` VARCHAR(4), OUT `teamname` CHAR(8), IN `kode` VARCHAR(4))  BEGIN
if @p1 is not null and @p3 is not null then
select l.kode, l.nama, t.team_name, t.teamid
from lecturers l
join team t on t.teamid= l.teamid
where l.kode=@p3 and t.teamid=@p1;
end if;

if @p1 is not null and @p3='' then
select l.kode, l.nama, t.team_name, t.teamid
from lecturers l
join team t on t.teamid= l.teamid
where t.teamid=@p1;
end if;

if @p3 is not null and @p1='' then
select l.kode, l.nama, t.team_name, t.teamid
from lecturers l
join team t on t.teamid= l.teamid
where l.kode=@p3;
end if;

if @p1='' and @p3='' then
select l.kode, l.nama, t.team_name, t.teamid
from lecturers l
join team t on t.teamid= l.teamid;
end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetMatkulSemester` (IN `program` CHAR(8), IN `level` VARCHAR(2), IN `genap/ganjil` CHAR(8), OUT `nama_m` VARCHAR(32))  NO SQL
BEGIN

if @p0 is not null and @p1 is not null and @p2 is not null then
select mk.nama_matkul as matkul, mk.prodi as prodi, mk.tingkat as tingkat, 
mk.semester as semester
from mata_kuliah as mk
where prodi=@p0 and tingkat=@p1 and semester=@p2;
end if;

if @p0 is not null and @p1 is not null and @p2 = '' then
select mk.nama_matkul as matkul, mk.prodi as prodi, mk.tingkat as tingkat, 
mk.semester as semester
from mata_kuliah as mk
where prodi=@p0 and tingkat=@p1;
end if;

if @p0='' and @p1 is not null and @p2 is not null then
select mk.nama_matkul as matkul, mk.prodi as prodi, mk.tingkat as tingkat, 
mk.semester as semester
from mata_kuliah as mk
where tingkat=@p1 and semester=@p2;
end if;

if @p0 is not null and @p1 = '' and @p2 = '' then
select mk.nama_matkul as matkul, mk.prodi as prodi, mk.tingkat as tingkat, 
mk.semester as semester
from mata_kuliah as mk
where mk.prodi=@p0;
end if;

if @p0='' and @p1='' and @p2 is not null then
select mk.nama_matkul as matkul, mk.prodi as prodi, mk.tingkat as tingkat, 
mk.semester as semester
from mata_kuliah as mk
where semester=@p2;
end if;

if @p0='' and @p1 is not null and @p2='' then
select mk.nama_matkul as matkul, mk.prodi as prodi, mk.tingkat as tingkat, 
mk.semester as semester
from mata_kuliah as mk
where tingkat=@p1;
end if;

if @p0='' and @p1='' and @p2='' then
select mk.nama_matkul as matkul, mk.prodi as prodi, mk.tingkat as tingkat, 
mk.semester as semester
from mata_kuliah as mk;
end if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetResearcher` (OUT `nama` CHAR(48), IN `kode` VARCHAR(24), IN `tingkat` VARCHAR(2), OUT `rs_name` CHAR(16))  BEGIN
if @p1 is not null and @p2 is not null then
select l.nama, rr.kode, rr.tingkat, r.rs_name 
from researcher rr 
join research r on r.RSID=rr.rsid
join lecturers l on l.kode=rr.kode 
where rr.kode=@p1 and rr.tingkat=@p2;
end if;

if @p1 is not null and @p2='' THEN
select l.nama, rr.kode, rr.tingkat, r.rs_name 
from researcher rr 
join research r on r.RSID=rr.rsid
join lecturers l on l.kode=rr.kode 
where rr.kode=@p1;
end if;

if @p2 is not null and @p1='' THEN
select l.nama, rr.kode, rr.tingkat, r.rs_name 
from researcher rr 
join research r on r.RSID=rr.rsid
join lecturers l on l.kode=rr.kode 
where rr.tingkat=@p2;
end if;

if @p1='' and @p2='' then
select l.nama, rr.kode, rr.tingkat, r.rs_name 
from researcher rr 
join research r on r.RSID=rr.rsid
join lecturers l on l.kode=rr.kode ;
end if;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `akreditasi`
--

CREATE TABLE `akreditasi` (
  `AKREID` varchar(2) NOT NULL,
  `AKRE_NAMA` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akreditasi`
--

INSERT INTO `akreditasi` (`AKREID`, `AKRE_NAMA`) VALUES
('1', 'D3'),
('2', 'D4'),
('3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `CLASSID` varchar(8) NOT NULL,
  `CLASS_NAME` char(8) NOT NULL,
  `PROGRAM_STD` char(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`CLASSID`, `CLASS_NAME`, `PROGRAM_STD`) VALUES
('MI-1A', '1A', 'MI'),
('MI-1B', '1B', 'MI'),
('MI-1C', '1C', 'MI'),
('MI-1D', '1D', 'MI'),
('MI-1E', '1E', 'MI'),
('MI-1F', '1F', 'MI'),
('MI-1G', '1G', 'MI'),
('MI-1H', '1H', 'MI'),
('MI-2A', '2A', 'MI'),
('MI-2B', '2B', 'MI'),
('MI-2C', '2C', 'MI'),
('MI-2D', '2D', 'MI'),
('MI-2E', '2E', 'MI'),
('MI-2F', '2F', 'MI'),
('MI-2G', '2G', 'MI'),
('MI-2H', '2H', 'MI'),
('MI-3A', '3A', 'MI'),
('MI-3B', '3B', 'MI'),
('MI-3C', '3C', 'MI'),
('MI-3D', '3D', 'MI'),
('MI-3E', '3E', 'MI'),
('MI-3F', '3F', 'MI'),
('MI-3G', '3G', 'MI'),
('MI-3H', '3H', 'MI'),
('NULL', 'NULL', 'NULL'),
('TI-1A', '1A', 'TI'),
('TI-1B', '1B', 'TI'),
('TI-1C', '1C', 'TI'),
('TI-1D', '1D', 'TI'),
('TI-1E', '1E', 'TI'),
('TI-1F', '1F', 'TI'),
('TI-1G', '1G', 'TI'),
('TI-1H', '1H', 'TI'),
('TI-2A', '2A', 'TI'),
('TI-2B', '2B', 'TI'),
('TI-2C', '2C', 'TI'),
('TI-2D', '2D', 'TI'),
('TI-2E', '2E', 'TI'),
('TI-2F', '2F', 'TI'),
('TI-2G', '2G', 'TI'),
('TI-2H', '2H', 'TI'),
('TI-3A', '3A', 'TI'),
('TI-3B', '3B', 'TI'),
('TI-3C', '3C', 'TI'),
('TI-3D', '3D', 'TI'),
('TI-3E', '3E', 'TI'),
('TI-3F', '3F', 'TI'),
('TI-3G', '3G', 'TI'),
('TI-3H', '3H', 'TI'),
('TI-4A', '4A', 'TI'),
('TI-4B', '4B', 'TI'),
('TI-4C', '4C', 'TI'),
('TI-4D', '4D', 'TI'),
('TI-4E', '4E', 'TI'),
('TI-4F', '4F', 'TI'),
('TI-4G', '4G', 'TI'),
('TI-4H', '4H', 'TI'),
('TI-4Z', '4Z', 'TI');

-- --------------------------------------------------------

--
-- Stand-in structure for view `class_amount`
-- (See below for the actual view)
--
CREATE TABLE `class_amount` (
`total_kelas` bigint(21)
,`total_MI` bigint(21)
,`total_TI` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `contract_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `minggu` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bahasan` char(255) NOT NULL,
  `metode` char(255) NOT NULL,
  `kode_matkul` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `tingkat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`contract_id`, `username`, `minggu`, `tanggal`, `bahasan`, `metode`, `kode_matkul`, `prodi`, `tingkat`) VALUES
(171, 'IFR', '1', '0000-00-00', 'Pendahuluan', 'Ceramah, diskusi', 'RIF191001', 'MI', 1),
(172, 'IFR', '2', '0000-00-00', 'Modeling Requirements: Use Cases', 'Ceramah, diskusi, studi kasus', 'RIF191001', 'MI', 1),
(173, 'IFR', '3', '0000-00-00', 'Modeling System Workflows: Activity Diagrams', 'Ceramah, diskusi, studi kasus', 'RIF191001', 'MI', 1),
(174, 'IFR', '4', '0000-00-00', 'Modeling a System\'s Logical Structure: Introducing Classes and Class Diagrams', 'Ceramah, diskusi, studi kasus', 'RIF191001', 'MI', 1),
(175, 'IFR', '5', '0000-00-00', 'Modeling a System\'s Logical Structure: Advanced Class Diagrams', 'Ceramah, diskusi, studi kasus', 'RIF191001', 'MI', 1),
(176, 'IFR', '6', '0000-00-00', 'Bringing Your Classes to Life: Object Diagrams', 'Ceramah, diskusi, studi kasus', 'RIF191001', 'MI', 1),
(177, 'IFR', '7', '0000-00-00', 'Modeling Ordered Interactions: Sequence Diagrams', 'Ceramah, diskusi, studi kasus', 'RIF191001', 'MI', 1),
(178, 'IFR', '8', '0000-00-00', 'Focusing on Interaction Links: Communication Diagrams', 'Ceramah, diskusi, studi kasus', 'RIF191001', 'MI', 1),
(179, 'IFR', '9', '0000-00-00', 'UTS', 'Online', 'RIF191001', 'MI', 1),
(180, 'IFR', '10', '0000-00-00', 'Focusing on Interaction Timing: Timing Diagrams', 'Ceramah, diskusi, studi kasus', 'RIF191001', 'MI', 1),
(181, 'IFR', '11', '0000-00-00', 'Completing the Interaction Picture: Interaction Overview Diagrams', 'Ceramah, diskusi, studi kasus', 'RIF191001', 'MI', 1),
(182, 'IFR', '12', '0000-00-00', 'Modeling a Class\'s Internal Structure: Composite Structures', 'Ceramah, diskusi, studi kasus', 'RIF191001', 'MI', 1),
(183, 'IFR', '13', '0000-00-00', 'Managing and Reusing Your System\'s Parts: Component Diagrams', 'Ceramah, diskusi, studi kasus', 'RIF191001', 'MI', 1),
(184, 'IFR', '14', '0000-00-00', 'Organizing Your Model: Packages', 'Ceramah, diskusi, studi kasus', 'RIF191001', 'MI', 1),
(185, 'IFR', '15', '0000-00-00', 'Modeling an Object\'s State: State Machine Diagrams', 'Ceramah, diskusi, studi kasus', 'RIF191001', 'MI', 1),
(186, 'IFR', '16', '0000-00-00', 'Modeling Your Deployed System: Deployment Diagrams', 'Ceramah, diskusi, studi kasus', 'RIF191001', 'MI', 1),
(187, 'IFR', '17', '0000-00-00', 'UAS', 'Online', 'RIF191001', 'MI', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dpa`
--

CREATE TABLE `dpa` (
  `YEAR` varchar(16) DEFAULT NULL,
  `KODE` varchar(24) DEFAULT NULL,
  `CLASSID` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `dpa18/19`
-- (See below for the actual view)
--
CREATE TABLE `dpa18/19` (
`kode` varchar(24)
,`nama` char(48)
,`classid` varchar(8)
,`year` varchar(16)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dpa19/20`
-- (See below for the actual view)
--
CREATE TABLE `dpa19/20` (
`kode` varchar(24)
,`nama` char(48)
,`classid` varchar(8)
,`year` varchar(16)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dpa_amount`
-- (See below for the actual view)
--
CREATE TABLE `dpa_amount` (
`count(kode)` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `JABATAN_NAME` char(64) DEFAULT NULL,
  `JABATANID` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`JABATAN_NAME`, `JABATANID`) VALUES
('Ka.Lab. Sistem Komputer dan  Jaringan', '1'),
('Ka. Lab. Sistem Cerdas', '10'),
('Ka. Lab.', '11'),
('KaPokJar. MK. Keahlian D3', '12'),
('KaPokJar MK. Informatika Dasar D4', '13'),
('Ka. Lab. Pengembangan Inkubator Bisnis Berbasis Teknologi', '14'),
('KaPokJar MK Inti D4', '15'),
('KaPokJar. MK. Umum, Wajib dan Penunjang D3', '16'),
('Ka. Lab. Rekayasa Perangkat Lunak', '17'),
('Ka. Lab. Visi Komputer', '18'),
('Ka. Lab. Sistem Cerdas', '19'),
('KaPokJar. MK. MKU, Wajib, dan Penunjang D4', '2'),
('Ka. Lab. Sistem Informasi', '20'),
('Ka. Lab. Informatika Dasar', '3'),
('Ka. Lab. Project', '4'),
('Ka. Lab. Image dan Graphics', '5'),
('KaPokJar. MK. Keahlian D4', '6'),
('KaPokJar MK. Inti D3', '7'),
('KaPokJar MK. Informatika Dasar D3', '8'),
('Ka. Lab. SIstem Informasi', '9');

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `NIP` varchar(80) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `NIDN` varchar(80) DEFAULT NULL,
  `KODE` varchar(24) NOT NULL,
  `PRODIID` varchar(4) DEFAULT NULL,
  `AKREID` varchar(2) DEFAULT NULL,
  `TEAMID` varchar(2) DEFAULT NULL,
  `NAMA` char(48) DEFAULT NULL,
  `STATUSES` char(16) DEFAULT NULL,
  `KUOTA_NGAJAR` int(11) DEFAULT NULL,
  `JAM_NGAJAR` int(11) DEFAULT NULL,
  `SKS` int(11) DEFAULT NULL,
  `DISTRIBUSI` int(11) DEFAULT NULL,
  `KUOTA_GENAP_19_20` int(11) DEFAULT NULL,
  `DISTR_GENAP_19_20` int(11) DEFAULT NULL,
  `JUMLAH_MATKUL_19_20` int(11) DEFAULT NULL,
  `HOMEBASE` varchar(2) DEFAULT NULL,
  `HOMEBASE_AKRE_D3` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`NIP`, `NIDN`, `KODE`, `PRODIID`, `AKREID`, `TEAMID`, `NAMA`, `STATUSES`, `KUOTA_NGAJAR`, `JAM_NGAJAR`, `SKS`, `DISTRIBUSI`, `KUOTA_GENAP_19_20`, `DISTR_GENAP_19_20`, `JUMLAH_MATKUL_19_20`, `HOMEBASE`, `HOMEBASE_AKRE_D3`) VALUES
('', '5078102', 'AB', '0', '3', '1', 'Ahmad Bahauddin', 'MKU', 24, 0, 0, 0, 0, 18, 0, '', ''),
('', '404079101', 'ACH', '0', '3', '0', 'Abdul Chalim SAg., MPd.I', 'MKU', 0, 0, 0, 0, 0, 0, 0, '', ''),
('199107042019031021', '10028903', 'ADE', '2', '1', '0', 'Ade Ismail', 'CPNS / Magang', 24, 0, 0, 0, 12, 16, 0, 'D4', 'D3'),
('', '', 'AFN', '0', '3', '1', 'Ane Fany Novitasari', 'MKU', 24, 0, 0, 0, 0, 12, 0, '', ''),
('198902102019031020', '30078804', 'ANP', '1', '1', '4', 'Agung Nugroho Pramudhita, S.T., M.T.', 'CPNS/Kontrak', 24, 21, 10, 24, 16, 16, 0, 'D3', 'D3'),
('199112302019031016', '10088101', 'ANR', '2', '2', '4', 'Anugrah Nur Rahmanto, S.Sn., M.Ds.', 'CPNS/Kontrak', 24, 18, 12, 24, 16, 16, 0, 'D4', 'D4'),
('198901232019032016', '14128704', 'APK', '1', '2', '4', 'Annisa Puspa Kirana., M.Kom', 'CPNS/Kontrak', 24, 24, 12, 24, 16, 15, 0, 'D3', 'D4'),
('197903132008121002', '', 'ARP', '2', '2', '4', 'Arief Prasetyo, S.Kom., M.Kom.', 'PNS', 24, 24, 9, 24, 24, 24, 0, 'D4', 'D4'),
('198708242019031010', '13037905', 'ARS', '2', '1', '4', 'Arie Rachmad Syulistyo, S.Kom., M.Kom', 'CPNS/Kontrak', 24, 23, 10, 24, 16, 17, 0, 'D4', 'D3'),
('', '', 'ARW', '0', '1', '4', 'Arwin Sumari ST., MT., DR.', 'LB', 24, 9, 6, 22, 0, 13, 0, '', 'D3'),
('', '25067607', 'ASA', '0', '2', '0', 'Ashri Shabrina Afrah SST., MT.', 'LB', 0, 0, 0, 22, 0, 0, 0, '', 'D4'),
('198712142019032012', '30129101', 'ATF', '1', '1', '4', 'Annisa Taufika Firdausi, ST., MT.', 'CPNS/Kontrak', 24, 12, 8, 24, 16, 15, 0, 'D3', 'D3'),
('197606252005012001', '', 'ATQ', '2', '1', '3', 'Atiqah Nurul Asri, S.Pd., M.Pd.', 'PNS', 24, 23, 14, 24, 24, 24, 0, 'D4', 'D3'),
('199006192019031017', '9088107', 'BGS', '1', '1', '0', 'Bagas Satya Dian Nugraha, ST., MT.', 'CPNS/Magang', 24, 0, 0, 18, 16, 18, 0, 'D3', 'D3'),
('198108092010121002', '5016211', 'BSA', '2', '1', '0', 'Banni Satria Andoko, S. Kom., M.MSI', 'PNS', 0, 0, 0, 0, 0, 0, 0, 'D4', 'D3'),
('197202022005011002', '17129402', 'CR', '1', '1', '4', 'Cahya Rahmad, ST., M.Kom., Dr. Eng.', 'PNS', 24, 24, 12, 22, 18, 18, 0, 'D3', 'D3'),
('198806102019031018', '', 'DHS', '1', '2', '4', 'Dian Hanifudin Subhi, S.Kom., M.Kom.', 'CPNS/Kontrak', 24, 19, 7, 26, 16, 16, 0, 'D3', 'D4'),
('', '15117903', 'DOD', '1', '1', '4', 'Dodit Suprianto SKom. MT.', 'Kontrak', 24, 22, 12, 24, 16, 18, 0, 'D3', 'D3'),
('199206062019031017', '9108402', 'DRY', '2', '2', '4', 'Dika Rizky Yunianto, S.Kom, M.Kom', 'CPNS/Kontrak', 24, 25, 9, 24, 16, 18, 0, 'D4', 'D4'),
('198311092014042001', '10068807', 'DS', '1', '1', '4', 'Dhebys Suryani, S.Kom., MT', 'PNS', 24, 18, 12, 24, 24, 24, 0, 'D3', 'D3'),
('197911152005012002', '8078401', 'DWI', '2', '1', '4', 'Dwi Puspitasari, S.Kom., M.Kom.', 'PNS', 24, 23, 12, 24, 24, 24, 0, 'D4', 'D3'),
('198410092015041001', '716037502', 'DWW', '2', '2', '4', 'Dimas Wahyu Wibowo, ST., MT.', 'PNS', 24, 24, 14, 24, 24, 24, 0, 'D4', 'D4'),
('198807112015042005', '8125911', 'ELA', '2', '2', '4', 'Eka Larasati Amalia, S.ST., MT.', 'PNS', 24, 24, 13, 24, 24, 24, 0, 'D4', 'D4'),
('', '', 'END', '0', '3', '0', 'Endah Lestari SH., MHum.', 'MKU', 0, 0, 0, 12, 0, 0, 0, '', ''),
('198610022019032011', '15057606', 'ENH', '2', '2', '4', 'Elok Nur Hamdana, S.T., M.T', 'CPNS/Kontrak', 24, 23, 12, 23, 16, 18, 0, 'D4', 'D4'),
('197201232008011006', '16117704', 'ERF', '2', '1', '4', 'Erfan Rohadi, ST., M.Eng., Ph.D.', 'PNS', 24, 20, 10, 20, 18, 16, 0, 'D4', 'D3'),
('197605152009122001', '', 'ESA', '1', '2', '0', 'Ely Setyo Astuti, ST., MT.', 'PNS', 0, 0, 0, 0, 0, 0, 0, 'D3', 'D4'),
('', '23017206', 'ESS', '0', '2', '0', 'Endah Septa Sintiya. SPd., MKom.', 'LB', 0, 0, 0, 23, 0, 0, 0, '', 'D4'),
('', '14048005', 'FPR', '0', '1', '4', 'Farid Angga Pribadi, S.Kom.,M.Kom', 'LB', 0, 0, 0, 24, 0, 0, 0, '', 'D3'),
('', '', 'FRP', '0', '1', '0', 'Frihandhika Permana SPd., MKom.', 'LB', 0, 0, 0, 23, 0, 0, 0, '', 'D3'),
('', '', 'FU', '2', '1', '3', 'Farida Ulfa, S.Pd., M.Pd.', 'Kontrak', 24, 21, 11, 12, 16, 11, 0, 'D4', 'D3'),
('199305052019031018', '', 'FUM', '1', '1', '3', 'Faiz Ushbah Mubarok, S.Pd., M.Pd.', 'CPNS/Magang', 24, 0, 0, 15, 16, 12, 0, 'D3', 'D3'),
('', '24047706', 'GAP', '0', '2', '4', 'Grezio Arifiyah P. S.Kom., M.Kom', 'LB', 24, 0, 0, 22, 0, 0, 0, '', 'D4'),
('197704242008121001', '', 'GBP', '1', '1', '4', 'Gunawan Budi Prasetyo, ST., MMT., Ph.D.', 'PNS', 24, 23, 14, 24, 24, 24, 0, 'D3', 'D3'),
('', '', 'GPR', '0', '1', '4', 'Galih Putra Riatma, S.St.', 'LB', 24, 0, 0, 24, 0, 0, 0, '', 'D3'),
('199003052019031013', '6029003', 'HAR', '2', '2', '0', 'M. Hasyim Ratsanjani', 'CPNS / Magang', 24, 0, 0, 0, 12, 20, 0, 'D4', 'D4'),
('199204122019031013', '8077501', 'HED', '1', '1', '4', 'Habibie Ed Dien, MT.', 'CPNS/Magang', 24, 0, 0, 18, 16, 17, 0, 'D3', 'D3'),
('196201051990031002', '2027214', 'HJT', '1', '1', '4', 'Budi Harijanto, ST., M.MKom.', 'PNS', 24, 21, 11, 24, 18, 15, 0, 'D3', 'D3'),
('198305212006041003', '14109103', 'HP', '1', '1', '4', 'Hendra Pradibta, SE., M.Sc.', 'PNS', 18, 24, 16, 24, 18, 17, 0, 'D3', 'D3'),
('197507082006041002', '21058301', 'HRS', '0', '3', '1', 'Hairus', 'MKU', 0, 10, 5, 0, 0, 18, 0, '', ''),
('198902012019031009', '', 'IAM', '1', '1', '4', 'Irsyad Arif Mashudi, M.Kom', 'CPNS/Magang', 24, 0, 0, 16, 16, 24, 0, 'D3', 'D3'),
('197305102008011010', '', 'IDW', '2', '2', '4', 'Indra Dharma Wijaya, ST., M.MT.', 'PNS', 12, 24, 13, 14, 12, 12, 0, 'D4', 'D4'),
('198406102008121004', '', 'IFR', '2', '2', '4', 'Imam Fahrur Rozi, ST., MT.', 'PNS', 18, 26, 14, 23, 18, 17, 0, 'D4', 'D4'),
('199110142019032020', '10068402', 'IKP', '1', '1', '4', 'Ika Kusumaning Putri, MT.', 'CPNS/Magang', 24, 0, 0, 16, 16, 21, 0, 'D3', 'D3'),
('', '10057308', 'IN', '0', '2', '0', 'Immah Inayati SKom., MKom., MBA.', 'LB', 24, 0, 0, 22, 0, 0, 0, '', 'D4'),
('198407082008122001', '11078803', 'IRA', '2', '1', '4', 'Dyah Ayu Irawati, ST., M.Cs.', 'PNS', 24, 22, 10, 24, 0, 0, 0, 'D4', 'D3'),
('', '720039003', 'JAS', '0', '3', '1', 'Jasmine Anting Soraya', 'MKU', 0, 0, 0, 0, 0, 0, 0, '', ''),
('196211281988111001', '9118305', 'KPA', '2', '2', '4', 'Deddy Kusbianto PA, Ir., M.Mkom.', 'PNS', 24, 21, 9, 23, 24, 21, 0, 'D4', 'D4'),
('199003202019031016', '730118201', 'KSB', '2', '1', '4', 'Kadek Suarjuna Batubulan, S.Kom, MT', 'CPNS/Kontrak', 24, 23, 12, 24, 16, 22, 0, 'D4', 'D3'),
('198211302014041001', '5026910', 'LA', '1', '1', '4', 'Luqman Affandi, S.Kom., MMSI', 'PNS', 24, 24, 16, 24, 24, 23, 0, 'D3', 'D3'),
('', '', 'MA', '0', '3', '1', 'Moh. Amin', 'MKU', 0, 0, 0, 0, 0, 6, 1, '', ''),
('199111282019031013', '17059201', 'MAH', '1', '2', '4', 'Muhammad Afif Hendrawan.,S.Kom.', 'CPNS/Kontrak', 24, 21, 10, 24, 16, 24, 0, 'D3', 'D4'),
('198704242019032017', '', 'MEA', '1', '2', '4', 'Meyti Eka Apriyani ST., MT.', 'CPNS/Kontrak', 24, 17, 9, 0, 16, 21, 0, 'D3', 'D4'),
('198805072019032012', '', 'MIS', '2', '2', '4', 'Milyun Ni\'ma Shoumi', 'CPNS/Magang', 24, 0, 0, 16, 16, 15, 0, 'D4', 'D4'),
('198806072019032016', '511088901', 'MM', '2', '1', '4', 'Mustika Mentari, S.Kom., M.Kom', 'CPNS/Kontrak', 24, 20, 8, 24, 16, 21, 0, 'D4', 'D3'),
('199002062019032013', '1024048703', 'MMH', '2', '2', '4', 'Mamluatul Hani\'ah', 'CPNS/Magang', 24, 0, 0, 17, 16, 15, 0, 'D4', 'D4'),
('', '', 'MMU', '0', '3', '0', 'Mohammad Muallif, MAg.', 'MKU', 0, 0, 0, 0, 0, 0, 0, '', ''),
('197710302005012001', '7068804', 'MQ', '2', '2', '4', 'Mungki Astiningrum, ST., M.Kom.', 'PNS', 22, 26, 14, 22, 24, 25, 0, 'D4', 'D4'),
('196902052003121003', '', 'MS', '0', '3', '1', 'M Sinal', 'MKU', 0, 0, 0, 0, 0, 0, 0, '', ''),
('199205172019031020', '23089102', 'MSK', '1', '2', '4', 'Muhammad Shulhan Khairy, S.Kom, M.Kom', 'CPNS/Kontrak', 24, 20, 10, 24, 16, 21, 0, 'D3', 'D4'),
('198902102019031019', '', 'MZA', '2', '2', '4', 'Moch. Zawaruddin Abdullah, S.ST., M.Kom', 'CPNS/Magang', 24, 0, 0, 18, 16, 21, 0, 'D4', 'D4'),
('198911082019031020', '', 'NOP', '1', '2', '4', 'Noprianto SKom., MEng.', 'CPNS/Magang', 24, 0, 0, 16, 16, 21, 0, 'D3', 'D4'),
('', '15128903', 'NUR', '0', '3', '0', 'Nurzizah', 'MKU', 0, 0, 0, 0, 0, 0, 0, '', ''),
('', '4058805', 'ODT', '1', '1', '4', 'Odhitya Desta Triswidrananta, S.Pd., M.Pd.', 'Kontrak', 24, 0, 0, 24, 16, 18, 0, 'D3', 'D3'),
('195912081985031004', '702108601', 'OKE', '1', '1', '4', 'Ekojono, ST., M.Kom.', 'PNS', 24, 27, 13, 24, 24, 23, 0, 'D3', 'D3'),
('198611032014041001', '', 'PPA', '1', '1', '4', 'Putra Prima A., ST., M.Kom.', 'PNS', 24, 25, 9, 24, 24, 24, 0, 'D3', 'D3'),
('198805042015041001', '3118602', 'PYS', '2', '2', '4', 'Pramana Yoga Saputra, S.Kom., MMT.', 'PNS', 24, 25, 14, 24, 24, 24, 0, 'D4', 'D4'),
('198010102005011001', '10117109', 'RAA', '1', '1', '4', 'Rosa Andrie Asmara, ST., MT., Dr. Eng.', 'PNS', 16, 17, 8, 24, 16, 15, 0, 'D3', 'D3'),
('198701082019031004', '19038905', 'RB', '1', '2', '0', 'Robby Anggriawan SE., ME.', 'Kontrak', 8, 18, 12, 6, 0, 0, 0, 'D3', 'D4'),
('197111101999031002', '26108904', 'RDA', '1', '2', '4', 'Rudy Ariyanto, ST., M.Cs.', 'PNS', 14, 15, 7, 22, 15, 15, 0, 'D3', 'D4'),
('198603182012121001', '18038602', 'RDM', '2', '2', '4', 'Retno Damayanti, S.Pd', 'CPNS/Kontrak', 24, 24, 13, 24, 16, 22, 0, 'D4', 'D4'),
('', '21129003', 'RDN', '0', '1', '0', 'Rizdania ST., MKom.', 'LB', 24, 0, 0, 24, 0, 0, 0, '', 'D3'),
('198108102005012002', '24088701', 'RID', '2', '2', '4', 'Ariadi Retno Ririd, S.Kom., M.Kom.', 'PNS', 24, 24, 12, 24, 24, 24, 0, 'D4', 'D4'),
('195906201994031001', '20065903', 'RKA', '2', '1', '0', 'Rakhmat Arianto', 'CPNS / Magang', 24, 12, 8, 0, 12, 16, 0, 'D4', 'D3'),
('198903192019032013', '10108003', 'ROW', '2', '2', '4', 'Rokhimatul Wakhidah', 'CPNS/Magang', 24, 0, 0, 15, 16, 15, 0, 'D4', 'D4'),
('', '', 'RR', '2', '2', '4', 'Ridwan Rismanto, SST., M.Kom.', 'PNS', 0, 24, 12, 24, 0, 0, 0, 'D4', 'D4'),
('198910042019032023', '', 'RWS', '1', '2', '4', 'Rawansyah., Drs., M.Pd.', 'PNS', 24, 24, 12, 22, 24, 24, 0, 'D3', 'D4'),
('', '601098901', 'SBS', '2', '2', '3', 'Satrio Binusa S, SS, M.Pd', 'Kontrak', 24, 12, 8, 24, 16, 7, 0, 'D4', 'D4'),
('198909012019031010', '22078505', 'SES', '2', '2', '4', 'Septian Enggar Sukmana, S.Pd., M.T', 'CPNS/Magang', 24, 0, 0, 18, 16, 17, 0, 'D4', 'D4'),
('198507222014041001', '16045306', 'SMU', '0', '3', '1', 'Shohib Muslim', 'MKU', 0, 0, 0, 6, 0, 12, 0, '', ''),
('198908132019031017', '', 'SNA', '1', '1', '4', 'Sofyan Noor Arief, S.ST., M.Kom.', 'CPNS/Kontrak', 24, 24, 11, 22, 16, 19, 0, 'D3', 'D3'),
('', '27037801', 'TAW', '0', '1', '0', 'Triastana Anang Wibawa, ST., MT.', 'LB', 0, 0, 0, 12, 0, 0, 0, '', 'D3'),
('197711162005011008', '5059303', 'TOM', '2', '1', '4', 'Faisal Rahutomo, ST., M.Kom., Dr.Eng.', 'PNS', 24, 26, 14, 24, 24, 23, 0, 'D4', 'D3'),
('197803272003122002', '23098604', 'UDR', '1', '1', '4', 'Ulla Delfana Rosiani, ST., MT.', 'PNS', 6, 0, 0, 12, 12, 6, 0, 'D3', 'D3'),
('198609232015041001', '', 'UN', '1', '1', '4', 'Usman Nurhasan, S.Kom., MT.', 'PNS', 24, 25, 11, 24, 24, 24, 0, 'D3', 'D3'),
('199105052019031029', '11089303', 'VAH', '1', '2', '4', 'Vipkas Al Hadid Firdaus, ST,. MT', 'CPNS/Kontrak', 24, 23, 9, 21, 16, 16, 0, 'D3', 'D4'),
('199106212019032020', '18038104', 'VAL', '1', '2', '4', 'Vivin Ayu Lestari, S.Pd', 'CPNS/Kontrak', 24, 18, 8, 24, 16, 17, 0, 'D3', 'D4'),
('199412172019032020', '', 'VIS', '1', '1', '4', 'Candra Bella Vista, S.Kom., MT.', 'CPNS/Magang', 12, 0, 0, 12, 12, 12, 0, 'D3', 'D3'),
('199308112019032025', '21069102', 'VNW', '1', '2', '4', 'Vivi Nur Wijayaningrum, S.Kom, M.Kom', 'CPNS/Kontrak', 24, 17, 10, 24, 16, 16, 0, 'D3', 'D4'),
('', '5059104', 'VS', '0', '2', '0', 'Very Sugiarto, S.Pd', 'LB', 0, 7, 4, 26, 0, 0, 0, '', 'D4'),
('198103182010122002', '29089201', 'WID', '2', '2', '1', 'Widaningsih Condrowardhani, SH, MH.', 'PNS', 21, 18, 12, 21, 21, 18, 0, 'D4', 'D4'),
('199208292019032023', '5018104', 'WIS', '1', '2', '4', 'Wilda Imama Sabilla', 'CPNS/Magang', 24, 0, 0, 16, 16, 15, 0, 'D3', 'D4'),
('198007162010121002', '15018803', 'YA', '1', '1', '4', 'Yuri Ariyanto, S.Kom., M.Kom.', 'PNS', 24, 26, 13, 24, 24, 24, 0, 'D3', 'D3'),
('', '', 'YP', '2', '2', '4', 'Yushintia Pramitarini, S.ST., MT.', 'Kontrak', 24, 22, 10, 23, 16, 21, 0, 'D4', 'D4'),
('', '', 'YS', '0', '3', '0', 'Yusuf Suprapto', 'MKU', 0, 0, 0, 18, 0, 0, 0, '', ''),
('198101052005011005', '21068905', 'YWS', '1', '2', '0', 'Yan Watequlis Syaifuddin, ST., M.MT.', 'PNS', 0, 0, 0, 0, 0, 0, 0, 'D3', 'D4'),
('198906212019031013', '16078008', 'YY', '1', '1', '4', 'Yoppy Yunhasnawa, S.ST., M.Sc.', 'CPNS/Kontrak', 24, 18, 8, 24, 16, 18, 0, 'D3', 'D3'),
('198107052005011002', '8119101', 'ZUL', '2', '2', '4', 'Ahmadi Yuli Ananta, ST., M.M.', 'PNS', 24, 18, 6, 20, 18, 12, 0, 'D4', 'D4');

-- --------------------------------------------------------

--
-- Stand-in structure for view `list_dosen_cpns`
-- (See below for the actual view)
--
CREATE TABLE `list_dosen_cpns` (
`kode` varchar(24)
,`nama` char(48)
,`statuses` char(16)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `list_dosen_lb`
-- (See below for the actual view)
--
CREATE TABLE `list_dosen_lb` (
`kode` varchar(24)
,`nama` char(48)
,`statuses` char(16)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `list_dosen_mku`
-- (See below for the actual view)
--
CREATE TABLE `list_dosen_mku` (
`kode` varchar(24)
,`nama` char(48)
,`statuses` char(16)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `list_dosen_pns`
-- (See below for the actual view)
--
CREATE TABLE `list_dosen_pns` (
`kode` varchar(24)
,`nama` char(48)
,`statuses` char(16)
);

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `nama_matkul` char(64) NOT NULL,
  `kode_matkul` varchar(10) NOT NULL,
  `prodi` char(8) NOT NULL,
  `tingkat` varchar(2) NOT NULL,
  `semester` char(16) NOT NULL,
  `SKS` int(4) NOT NULL,
  `jam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`nama_matkul`, `kode_matkul`, `prodi`, `tingkat`, `semester`, `SKS`, `jam`) VALUES
('Sistem Terdistribusi', 'RIF175001', 'MI', '3', 'Ganjil', 3, 6),
('Proyek 2', 'RIF175002', 'MI', '3', 'Ganjil', 4, 12),
('Kecerdasan Buatan', 'RIF175003', 'MI', '3', 'Ganjil', 2, 4),
('Keamanan Sistem dan Jaringan Komputer', 'RIF175004', 'MI', '3', 'Ganjil', 3, 6),
('Proposal Laporan Akhir', 'RIF175005', 'MI', '3', 'Ganjil', 2, 6),
('Pemograman Jaringan', 'RIF175006', 'MI', '3', 'Ganjil', 3, 6),
('Digital Enterpreneurship', 'RIF176001', 'MI', '3', 'Genap', 2, 4),
('Bahasa Inggris Persiapan Kerja', 'RIF176002', 'MI', '3', 'Genap', 2, 3),
('Etika Profesi Bidang TI', 'RIF176003', 'MI', '3', 'Genap', 2, 3),
('Praktek Kerja Lapangan', 'RIF176004', 'MI', '3', 'Genap', 3, 14),
('Laporan Akhir', 'RIF176005', 'MI', '3', 'Genap', 6, 14),
('Bahasa Indonesia', 'RIF176006', 'MI', '3', 'Genap', 2, 3),
('Desain Antarmuka', 'RIF183001', 'MI', '2', 'Ganjil', 2, 3),
('Bahasa Inggris 2', 'RIF183002', 'MI', '2', 'Ganjil', 2, 3),
('Pemograman Web Lanjut', 'RIF183003', 'MI', '2', 'Ganjil', 3, 6),
('Sistem Informasi', 'RIF183004', 'MI', '2', 'Ganjil', 2, 3),
('Basis Data Lanjut', 'RIF183005', 'MI', '2', 'Ganjil', 3, 6),
('Jaringan Komputer', 'RIF183006', 'MI', '2', 'Ganjil', 2, 3),
('Pratikum Jaringan Komputer', 'RIF183007', 'MI', '2', 'Ganjil', 2, 5),
('Pemograman Berbasis Objek', 'RIF183008', 'MI', '2', 'Ganjil', 2, 3),
('Pratikum Pemograman Berbasis Objek', 'RIF183009', 'MI', '2', 'Ganjil', 2, 6),
('Komputasi Multimedia', 'RIF184001', 'MI', '2', 'Genap', 2, 4),
('Pemrograman Mobile', 'RIF184002', 'MI', '2', 'Genap', 3, 8),
('Manajemen Proyek', 'RIF184003', 'MI', '2', 'Genap', 2, 3),
('Proyek 1', 'RIF184004', 'MI', '2', 'Genap', 3, 9),
('Manajemen Jaringan Komputer', 'RIF184005', 'MI', '2', 'Genap', 2, 5),
('E-Business', 'RIF184006', 'MI', '2', 'Genap', 2, 3),
('Sistem Manajemen Basis Data', 'RIF184007', 'MI', '2', 'Genap', 3, 6),
('Pancasila', 'RIF191001', 'MI', '1', 'Ganjil', 2, 3),
('Teknik Dokumentasi', 'RIF191002', 'MI', '1', 'Ganjil', 2, 3),
('Ilmu Komunikasi dan Organisasi', 'RIF191003', 'MI', '1', 'Ganjil', 2, 3),
('Aplikasi Komputer Perkantoran', 'RIF191004', 'MI', '1', 'Ganjil', 2, 6),
('Bahasa Inggris 1', 'RIF191005', 'MI', '1', 'Ganjil', 2, 3),
('Konsep Teknologi Informasi', 'RIF191006', 'MI', '1', 'Ganjil', 2, 3),
('Matematika Diskrit', 'RIF191007', 'MI', '1', 'Ganjil', 2, 4),
('Keselamatan dan Kesehatan Kerja', 'RIF191008', 'MI', '1', 'Ganjil', 2, 3),
('Dasar Pemograman', 'RIF191009', 'MI', '1', 'Ganjil', 2, 4),
('Pratikum Dasar Pemograman', 'RIF191010', 'MI', '1', 'Ganjil', 2, 6),
('Agama', 'RIF192001', 'MI', '1', 'Genap', 2, 3),
('Kewarganegaraan', 'RIF192002', 'MI', '1', 'Genap', 2, 3),
('Penulisan Ilmiah', 'RIF192003', 'MI', '1', 'Genap', 2, 3),
('Sistem Operasi', 'RIF192004', 'MI', '1', 'Genap', 2, 3),
('Pengembangan Perangkat Lunak Berbasis Objek', 'RIF192005', 'MI', '1', 'Genap', 2, 4),
('Desain & Pemograman Web', 'RIF192006', 'MI', '1', 'Genap', 2, 5),
('Basis Data', 'RIF192007', 'MI', '1', 'Genap', 2, 3),
('Praktikum Basis Data', 'RIF192008', 'MI', '1', 'Genap', 2, 6),
('Struktur Data', 'RIF192009', 'MI', '1', 'Genap', 2, 3),
('Praktikum Struktur Data', 'RIF192010', 'MI', '1', 'Genap', 2, 5),
('Manajemen Proyek', 'RTI167001', 'TI', '4', 'Ganjil', 2, 4),
('Keamanan Informasi', 'RTI167002', 'TI', '4', 'Ganjil', 2, 4),
('E-Business', 'RTI167003', 'TI', '4', 'Ganjil', 2, 4),
('Pemograman Platform Bergerak (Mobile)', 'RTI167004', 'TI', '4', 'Ganjil', 3, 6),
('Sistem Pendukung Keputusan', 'RTI167005', 'TI', '4', 'Ganjil', 3, 6),
('Pengolahan Citra Digital', 'RTI167006', 'TI', '4', 'Ganjil', 3, 6),
('Proyek Tingkat III', 'RTI167007', 'TI', '4', 'Ganjil', 3, 8),
('Issue Profesional dan Sosial Teknologi Informasi (TI)', 'RTI168001', 'TI', '4', 'Genap', 2, 4),
('Metodologi Penelitian', 'RTI168002', 'TI', '4', 'Genap', 2, 4),
('Praktek Kerja Lapangan', 'RTI168003', 'TI', '4', 'Genap', 4, 12),
('Tugas Akhir', 'RTI168004', 'TI', '4', 'Genap', 6, 20),
('E-Business', 'RTI175001', 'TI', '3', 'Ganjil', 2, 4),
('Proyek 2', 'RTI175002', 'TI', '3', 'Ganjil', 4, 12),
('Pemograman Mobile', 'RTI175003', 'TI', '3', 'Ganjil', 3, 6),
('Data Warehouse', 'RTI175004', 'TI', '3', 'Ganjil', 3, 6),
('Pengujian Perangkat Lunak', 'RTI175005', 'TI', '3', 'Ganjil', 2, 4),
('Pemograman Jaringan', 'RTI175006', 'TI', '3', 'Ganjil', 3, 6),
('Digital Enterpreneurship', 'RTI176001', 'TI', '3', 'Genap', 2, 4),
('Sistem Pendukung Keputusan', 'RTI176002', 'TI', '3', 'Genap', 3, 6),
('Teknologi Data', 'RTI176003', 'TI', '3', 'Genap', 3, 6),
('Komputasi Multimedia', 'RTI176004', 'TI', '3', 'Genap', 2, 4),
('Internet Of Things', 'RTI176005', 'TI', '3', 'Genap', 3, 6),
('Pengolahan Citra Dan Visi Komputer', 'RTI176006', 'TI', '3', 'Genap', 3, 6),
('Pemrograman Berbasis Framework', 'RTI176007', 'TI', '3', 'Genap', 3, 6),
('Desain Antarmuka', 'RTI183001', 'TI', '2', 'Ganjil', 2, 3),
('Statistik Komputasi', 'RTI183002', 'TI', '2', 'Ganjil', 2, 3),
('Kecerdasan Buatan', 'RTI183003', 'TI', '2', 'Ganjil', 2, 4),
('Desain & Pemograman Web', 'RTI183004', 'TI', '2', 'Ganjil', 2, 5),
('Basis Data Lanjut', 'RTI183005', 'TI', '2', 'Ganjil', 3, 6),
('Jaringan Komputer', 'RTI183006', 'TI', '2', 'Ganjil', 2, 3),
('Pratikum Jaringan Komputer', 'RTI183007', 'TI', '2', 'Ganjil', 2, 5),
('Pemograman Berbasis Objek', 'RTI183008', 'TI', '2', 'Ganjil', 2, 3),
('Pratikum Pemograman Berbasis Objek', 'RTI183009', 'TI', '2', 'Ganjil', 2, 6),
('Sistem Informasi', 'RTI184001', 'TI', '2', 'Genap', 2, 3),
('Analisis Dan Desain Berorientasi Objek', 'RTI184002', 'TI', '2', 'Genap', 3, 6),
('Manajemen Proyek', 'RTI184003', 'TI', '2', 'Genap', 2, 3),
('Proyek 1', 'RTI184004', 'TI', '2', 'Genap', 3, 9),
('Komputasi Kognitif', 'RTI184005', 'TI', '2', 'Genap', 2, 5),
('Pemrograman Web Lanjut', 'RTI184006', 'TI', '2', 'Genap', 3, 6),
('Sistem Manajemen Basis Data', 'RTI184007', 'TI', '2', 'Genap', 3, 6),
('Pancasila', 'RTI191001', 'TI', '1', 'Ganjil', 2, 3),
('Teknik Dokumentasi', 'RTI191002', 'TI', '1', 'Ganjil', 2, 3),
('Ilmu Komunikasi dan Organisasi', 'RTI191003', 'TI', '1', 'Ganjil', 2, 3),
('Aplikasi Komputer Perkantoran', 'RTI191004', 'TI', '1', 'Ganjil', 2, 6),
('Bahasa Inggris 1', 'RTI191005', 'TI', '1', 'Ganjil', 2, 3),
('Konsep Teknologi Informasi', 'RTI191006', 'TI', '1', 'Ganjil', 2, 3),
('Matematika Diskrit', 'RTI191007', 'TI', '1', 'Ganjil', 2, 4),
('Keselamatan dan Kesehatan Kerja', 'RTI191008', 'TI', '1', 'Ganjil', 2, 3),
('Dasar Pemograman', 'RTI191009', 'TI', '1', 'Ganjil', 2, 4),
('Pratikum Dasar Pemograman', 'RTI191010', 'TI', '1', 'Ganjil', 2, 6),
('Agama', 'RTI192001', 'TI', '1', 'Genap', 2, 3),
('Kewarganegaraan', 'RTI192002', 'TI', '1', 'Genap', 2, 3),
('Bahasa Inggris 2', 'RTI192003', 'TI', '1', 'Genap', 2, 3),
('Sistem Operasi', 'RTI192004', 'TI', '1', 'Genap', 2, 3),
('Rekayasa Perangkat Lunak', 'RTI192005', 'TI', '1', 'Genap', 2, 4),
('Aljabar Linier', 'RTI192006', 'TI', '1', 'Genap', 2, 4),
('Basis Data', 'RTI192007', 'TI', '1', 'Genap', 2, 3),
('Praktikum Basis Data', 'RTI192008', 'TI', '1', 'Genap', 2, 6),
('Algoritma Dan Struktur Data', 'RTI192009', 'TI', '1', 'Genap', 2, 3),
('Praktikum Algoritma Dan Struktur Data', 'RTI192010', 'TI', '1', 'Genap', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `INSTRUCTORID` int(11) NOT NULL,
  `KODE` varchar(24) NOT NULL,
  `nama_kelas` char(8) NOT NULL,
  `nama_matkul` char(32) NOT NULL,
  `SKS` int(11) NOT NULL,
  `kode_matkul` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`INSTRUCTORID`, `KODE`, `nama_kelas`, `nama_matkul`, `SKS`, `kode_matkul`) VALUES
(1, 'UN', 'MI - 3A', 'Sistem Terdistribusi', 3, 'RIF175001'),
(2, 'VAH', 'MI - 3C', 'Sistem Terdistribusi', 3, 'RIF175001'),
(3, 'UN', 'MI - 3B', 'Sistem Terdistribusi', 3, 'RIF175001');

-- --------------------------------------------------------

--
-- Table structure for table `pengemban`
--

CREATE TABLE `pengemban` (
  `KODE` varchar(24) DEFAULT NULL,
  `JABATANID` varchar(2) DEFAULT NULL,
  `YEAR` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengemban`
--

INSERT INTO `pengemban` (`KODE`, `JABATANID`, `YEAR`) VALUES
('ARP', '3', '2019/2021'),
('ATQ', '2', '2019/2020'),
('DWI', '6', '2019/2020'),
('DWW', '5', '2019/2020'),
('ELA', '7', '2019/2020'),
('ERF', '9', '2019/2020'),
('GBP', '10', '2019/2020'),
('HJT', '3', '2019/2020'),
('IDW', '11', '2019/2020'),
('KPA', '4', '2019/2020'),
('LA', '12', '2019/2020'),
('MQ', '13', '2019/2020'),
('OKE', '8', '2019/2020'),
('PPA', '15', '2019/2020'),
('PYS', '14', '2019/2020'),
('RR', '17', '2019/2020'),
('RWS', '16', '2019/2020'),
('UDR', '18', '2019/2020'),
('UN', '19', '2019/2020'),
('YA', '20', '2019/2020');

-- --------------------------------------------------------

--
-- Table structure for table `program_std`
--

CREATE TABLE `program_std` (
  `PRODIID` varchar(4) NOT NULL,
  `PRODI_NAMA` char(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program_std`
--

INSERT INTO `program_std` (`PRODIID`, `PRODI_NAMA`) VALUES
('0', NULL),
('1', 'D3-MI'),
('2', 'D4-TI');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `RS_NAME` char(16) NOT NULL,
  `RSID` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`RS_NAME`, `RSID`) VALUES
('si', '1'),
('cerdas', '2'),
('jaringan', '3'),
('multimedia', '4'),
('vision', '5');

-- --------------------------------------------------------

--
-- Table structure for table `researcher`
--

CREATE TABLE `researcher` (
  `RESEARCHERID` int(11) NOT NULL,
  `KODE` varchar(24) DEFAULT NULL,
  `RSID` varchar(2) DEFAULT NULL,
  `TINGKAT` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `researcher`
--

INSERT INTO `researcher` (`RESEARCHERID`, `KODE`, `RSID`, `TINGKAT`) VALUES
(32, 'ARS', '2', 's1'),
(33, 'DHS', '3', 's1'),
(34, 'DRY', '3', 's1'),
(35, 'ENH', '2', 's1'),
(36, 'KSB', '1', 's1'),
(37, 'MEA', '1', 's1'),
(38, 'MAH', '1', 's1'),
(39, 'MSK', '5', 's1'),
(40, 'MM', '3', 's1'),
(41, 'RDM', '5', 's1'),
(42, 'SNA', '2', 's1'),
(43, 'VAH', '3', 's1'),
(44, 'YY', '1', 's1'),
(45, 'BGS', '3', 's1'),
(46, 'VIS', '5', 's1'),
(59, 'YP', '1', 's1'),
(60, 'GAP', '3', 's1');

-- --------------------------------------------------------

--
-- Table structure for table `rps`
--

CREATE TABLE `rps` (
  `kode_matkul` varchar(10) DEFAULT NULL,
  `nama_matkul` char(64) DEFAULT NULL,
  `file` varchar(64) DEFAULT NULL,
  `tingkat` varchar(2) DEFAULT NULL,
  `std_program` varchar(64) DEFAULT NULL,
  `upload_by` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rps`
--

INSERT INTO `rps` (`kode_matkul`, `nama_matkul`, `file`, `tingkat`, `std_program`, `upload_by`) VALUES
('RIF175004', 'Keamanan Sistem dan Jaringan Komputer', 'RPS_Keamanan_Sistem_dan_Jarkom.docx', '3', 'MI', 'user'),
('RTI175002', 'Proyek 2', 'proyek_Tk_2_Baru.doc', '3', 'MI', 'ifr'),
('RTI183001', 'Desain Antarmuka', 'RPS_desainantarmuka_d3.docx', '2', 'MI', 'admin'),
('RTI192003', 'Bahasa Inggris 2', 'RPS_Bahasa_Inggris_Informatika_2_Genap_2018_2019.docx', '2', 'MI', 'ifr');

-- --------------------------------------------------------

--
-- Table structure for table `sap`
--

CREATE TABLE `sap` (
  `kode_matkul` varchar(10) DEFAULT NULL,
  `nama_matkul` char(64) DEFAULT NULL,
  `file` varchar(64) DEFAULT NULL,
  `tingkat` varchar(2) DEFAULT NULL,
  `std_program` varchar(64) DEFAULT NULL,
  `upload_by` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sap`
--

INSERT INTO `sap` (`kode_matkul`, `nama_matkul`, `file`, `tingkat`, `std_program`, `upload_by`) VALUES
('RTI175002', 'Proyek 2', 'Copy_of_SAP_Proyek.docx', '3', 'MI', 'admin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `semesters2019/2020`
-- (See below for the actual view)
--
CREATE TABLE `semesters2019/2020` (
`matkul` char(64)
,`prodi` char(8)
,`tingkat` varchar(2)
,`semester` char(16)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `status_dosen_amount`
-- (See below for the actual view)
--
CREATE TABLE `status_dosen_amount` (
`PNS` bigint(21)
,`LB` bigint(21)
,`MKU` bigint(21)
,`CPNS` bigint(21)
,`kontrak` bigint(21)
);

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `TEAM_NAME` char(16) DEFAULT NULL,
  `TEAMID` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`TEAM_NAME`, `TEAMID`) VALUES
('NO TEAM', '0'),
('MKU', '1'),
('MP', '2'),
('BING', '3'),
('TI', '4');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'ARS', 'ARS', 'user'),
(3, 'IFR', 'IFR', 'user'),
(4, 'RIZ', 'RIZ', 'user'),
(5, 'ZUL', 'ZUL', 'user'),
(6, 'RID', 'RID', 'user'),
(7, 'ARP', 'ARP', 'user'),
(8, 'ATQ', 'ATQ', 'user'),
(9, 'BSA', 'BSA', 'user'),
(10, 'HJT', 'HJT', 'user'),
(11, 'CR', 'CR', 'user'),
(12, 'KPA', 'KPA', 'user'),
(13, 'DS', 'DS', 'user'),
(14, 'DWW', 'DWW', 'user'),
(15, 'DWI', 'DWI', 'user'),
(16, 'IRA', 'IRA', 'user'),
(17, 'ELA', 'ELA', 'user'),
(18, 'OKE', 'OKE', 'user'),
(19, 'ESA', 'ESA', 'user'),
(20, 'ERF', 'ERF', 'user'),
(21, 'TOM', 'TOM', 'user'),
(22, 'GBP', 'GBP', 'user'),
(23, 'HP', 'HP', 'user'),
(24, 'IDW', 'IDW', 'user'),
(25, 'LA', 'LA', 'user'),
(26, 'MQ', 'MQ', 'user'),
(27, 'PYS', 'PYS', 'user'),
(28, 'PPA', 'PPA', 'user'),
(29, 'RWS', 'RWS', 'user'),
(30, 'RR', 'RR', 'user'),
(31, 'RAA', 'RAA', 'user'),
(32, 'RDA', 'RDA', 'user'),
(33, 'UDR', 'UDR', 'user'),
(34, 'UN', 'UN', 'user'),
(35, 'WID', 'WID', 'user'),
(36, 'YWS', 'YWS', 'user'),
(37, 'YA', 'YA', 'user'),
(38, 'ANP', 'ANP', 'user'),
(39, 'APK', 'APK', 'user'),
(40, 'ATF', 'ATF', 'user'),
(41, 'ANR', 'ANR', 'user'),
(42, 'DHS', 'DHS', 'user'),
(43, 'DRY', 'DRY', 'user'),
(44, 'ENH', 'ENH', 'user'),
(45, 'KSB', 'KSB', 'user'),
(46, 'MEA', 'MEA', 'user'),
(47, 'MAH', 'MAH', 'user'),
(48, 'MSK', 'MSK', 'user'),
(49, 'MM', 'MM', 'user'),
(50, 'RDM', 'RDM', 'user'),
(51, 'SNA', 'SNA', 'user'),
(52, 'VAH', 'VAH', 'user'),
(53, 'VNW', 'VNW', 'user'),
(54, 'VAL', 'VAL', 'user'),
(55, 'YY', 'YY', 'user'),
(56, 'ADE', 'ADE', 'user'),
(57, 'BGS', 'BGS', 'user'),
(58, 'VIS', 'VIS', 'user'),
(59, 'FUM', 'FUM', 'user'),
(60, 'HED', 'HED', 'user'),
(61, 'IKP', 'IKP', 'user'),
(62, 'IAM', 'IAM', 'user'),
(63, 'HAR', 'HAR', 'user'),
(64, 'MMH', 'MMH', 'user'),
(65, 'MIS', 'MIS', 'user'),
(66, 'MZA', 'MZA', 'user'),
(67, 'NOP', 'NOP', 'user'),
(68, 'RKA', 'RKA', 'user'),
(69, 'ROW', 'ROW', 'user'),
(70, 'SES', 'SES', 'user'),
(71, 'WIS', 'WIS', 'user'),
(72, 'CDR', 'CDR', 'user'),
(73, 'DSE', 'DSE', 'user'),
(74, 'DOD', 'DOD', 'user'),
(75, 'FU', 'FU', 'user'),
(76, 'MUP', 'MUP', 'user'),
(77, 'ODT', 'ODT', 'user'),
(78, 'SBS', 'SBS', 'user'),
(79, 'SIR', 'SIR', 'user'),
(80, 'YP', 'YP', 'user'),
(81, 'RB', 'RB', 'user'),
(82, 'AB', 'AB', 'user'),
(83, 'AFN', 'AFN', 'user'),
(84, 'END', 'END', 'user'),
(85, 'HRS', 'HRS', 'user'),
(86, 'JAS', 'JAS', 'user'),
(87, 'MS', 'MS', 'user'),
(88, 'MA', 'MA', 'user'),
(89, 'SMU', 'SMU', 'user'),
(90, 'YS', 'YS', 'user'),
(91, 'MMU', 'MMU', 'user'),
(92, 'ACH', 'ACH', 'user'),
(93, 'NUR', 'NUR', 'user'),
(94, 'ARW', 'ARW', 'user'),
(95, 'ARI', 'ARI', 'user'),
(96, 'DMR', 'DMR', 'user'),
(97, 'FPR', 'FPR', 'user'),
(98, 'GPR', 'GPR', 'user'),
(99, 'GAP', 'GAP', 'user'),
(100, 'IWP', 'IWP', 'user'),
(101, 'QH', 'QH', 'user'),
(102, 'VS', 'VS', 'user'),
(103, 'ASA', 'ASA', 'user'),
(104, 'ESS', 'ESS', 'user'),
(105, 'FRP', 'FRP', 'user'),
(106, 'IN', 'IN', 'user'),
(107, 'RDN', 'RDN', 'user'),
(108, 'TAW', 'TAW', 'user');

-- --------------------------------------------------------

--
-- Structure for view `class_amount`
--
DROP TABLE IF EXISTS `class_amount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `class_amount`  AS  select count(`class`.`CLASSID`) AS `total_kelas`,count(if((`class`.`PROGRAM_STD` = 'MI'),`class`.`PROGRAM_STD`,NULL)) AS `total_MI`,count(if((`class`.`PROGRAM_STD` = 'TI'),`class`.`PROGRAM_STD`,NULL)) AS `total_TI` from `class` ;

-- --------------------------------------------------------

--
-- Structure for view `dpa18/19`
--
DROP TABLE IF EXISTS `dpa18/19`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dpa18/19`  AS  select `d`.`KODE` AS `kode`,`l`.`NAMA` AS `nama`,`d`.`CLASSID` AS `classid`,`d`.`YEAR` AS `year` from (`dpa` `d` join `lecturers` `l` on((`l`.`KODE` = `d`.`KODE`))) where ((`d`.`CLASSID` is not null) and (`d`.`YEAR` = '2018/2019')) ;

-- --------------------------------------------------------

--
-- Structure for view `dpa19/20`
--
DROP TABLE IF EXISTS `dpa19/20`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dpa19/20`  AS  select `d`.`KODE` AS `kode`,`l`.`NAMA` AS `nama`,`d`.`CLASSID` AS `classid`,`d`.`YEAR` AS `year` from (`dpa` `d` join `lecturers` `l` on((`l`.`KODE` = `d`.`KODE`))) where ((`d`.`CLASSID` is not null) and (`d`.`YEAR` = '2019/2020')) ;

-- --------------------------------------------------------

--
-- Structure for view `dpa_amount`
--
DROP TABLE IF EXISTS `dpa_amount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dpa_amount`  AS  select count(`dpa`.`KODE`) AS `count(kode)` from `dpa` where ((`dpa`.`YEAR` is not null) and (`dpa`.`CLASSID` is not null)) ;

-- --------------------------------------------------------

--
-- Structure for view `list_dosen_cpns`
--
DROP TABLE IF EXISTS `list_dosen_cpns`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_dosen_cpns`  AS  select `lecturers`.`KODE` AS `kode`,`lecturers`.`NAMA` AS `nama`,`lecturers`.`STATUSES` AS `statuses` from `lecturers` where (`lecturers`.`STATUSES` like 'CPNS%') ;

-- --------------------------------------------------------

--
-- Structure for view `list_dosen_lb`
--
DROP TABLE IF EXISTS `list_dosen_lb`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_dosen_lb`  AS  select `lecturers`.`KODE` AS `kode`,`lecturers`.`NAMA` AS `nama`,`lecturers`.`STATUSES` AS `statuses` from `lecturers` where (`lecturers`.`STATUSES` like 'LB') ;

-- --------------------------------------------------------

--
-- Structure for view `list_dosen_mku`
--
DROP TABLE IF EXISTS `list_dosen_mku`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_dosen_mku`  AS  select `lecturers`.`KODE` AS `kode`,`lecturers`.`NAMA` AS `nama`,`lecturers`.`STATUSES` AS `statuses` from `lecturers` where (`lecturers`.`STATUSES` like 'MKU') ;

-- --------------------------------------------------------

--
-- Structure for view `list_dosen_pns`
--
DROP TABLE IF EXISTS `list_dosen_pns`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `list_dosen_pns`  AS  select `lecturers`.`KODE` AS `kode`,`lecturers`.`NAMA` AS `nama`,`lecturers`.`STATUSES` AS `statuses` from `lecturers` where (`lecturers`.`STATUSES` = 'PNS') ;

-- --------------------------------------------------------

--
-- Structure for view `semesters2019/2020`
--
DROP TABLE IF EXISTS `semesters2019/2020`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `semesters2019/2020`  AS  select `mk`.`nama_matkul` AS `matkul`,`mk`.`prodi` AS `prodi`,`mk`.`tingkat` AS `tingkat`,`mk`.`semester` AS `semester` from `mata_kuliah` `mk` ;

-- --------------------------------------------------------

--
-- Structure for view `status_dosen_amount`
--
DROP TABLE IF EXISTS `status_dosen_amount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `status_dosen_amount`  AS  select count(if((`lecturers`.`STATUSES` = 'PNS'),`lecturers`.`STATUSES`,NULL)) AS `PNS`,count(if((`lecturers`.`STATUSES` = 'LB'),`lecturers`.`STATUSES`,NULL)) AS `LB`,count(if((`lecturers`.`STATUSES` = 'MKU'),`lecturers`.`STATUSES`,NULL)) AS `MKU`,count(if((`lecturers`.`STATUSES` like 'CPNS%'),`lecturers`.`STATUSES`,NULL)) AS `CPNS`,count(if((`lecturers`.`STATUSES` = 'kontrak'),`lecturers`.`STATUSES`,NULL)) AS `kontrak` from `lecturers` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akreditasi`
--
ALTER TABLE `akreditasi`
  ADD PRIMARY KEY (`AKREID`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`CLASSID`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`contract_id`),
  ADD KEY `relation1contracts` (`username`);

--
-- Indexes for table `dpa`
--
ALTER TABLE `dpa`
  ADD KEY `fk_classid` (`CLASSID`),
  ADD KEY `fk_kode` (`KODE`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`JABATANID`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`KODE`),
  ADD KEY `rel2` (`PRODIID`),
  ADD KEY `rel1` (`AKREID`),
  ADD KEY `rel3` (`TEAMID`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kode_matkul`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`INSTRUCTORID`),
  ADD KEY `pengajar_ibfk_2` (`kode_matkul`),
  ADD KEY `relation2pengajar` (`KODE`);

--
-- Indexes for table `pengemban`
--
ALTER TABLE `pengemban`
  ADD UNIQUE KEY `KODE` (`KODE`) USING BTREE,
  ADD KEY `RELATIONSHIP_15_FK` (`JABATANID`);

--
-- Indexes for table `program_std`
--
ALTER TABLE `program_std`
  ADD PRIMARY KEY (`PRODIID`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`RSID`);

--
-- Indexes for table `researcher`
--
ALTER TABLE `researcher`
  ADD PRIMARY KEY (`RESEARCHERID`),
  ADD KEY `RELATIONSHIP_7_FK` (`RSID`),
  ADD KEY `RELATIONSHIP_6_FK` (`KODE`) USING BTREE;

--
-- Indexes for table `rps`
--
ALTER TABLE `rps`
  ADD UNIQUE KEY `relation1rps` (`kode_matkul`) USING BTREE;

--
-- Indexes for table `sap`
--
ALTER TABLE `sap`
  ADD UNIQUE KEY `kode_matkul` (`kode_matkul`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`TEAMID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `contract_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `INSTRUCTORID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `researcher`
--
ALTER TABLE `researcher`
  MODIFY `RESEARCHERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `relation1contracts` FOREIGN KEY (`username`) REFERENCES `user` (`username`);

--
-- Constraints for table `dpa`
--
ALTER TABLE `dpa`
  ADD CONSTRAINT `fk_classid` FOREIGN KEY (`CLASSID`) REFERENCES `class` (`CLASSID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kode` FOREIGN KEY (`KODE`) REFERENCES `lecturers` (`KODE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD CONSTRAINT `rel1` FOREIGN KEY (`AKREID`) REFERENCES `akreditasi` (`AKREID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rel2` FOREIGN KEY (`PRODIID`) REFERENCES `program_std` (`PRODIID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rel3` FOREIGN KEY (`TEAMID`) REFERENCES `team` (`TEAMID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD CONSTRAINT `pengajar_ibfk_2` FOREIGN KEY (`kode_matkul`) REFERENCES `mata_kuliah` (`kode_matkul`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relation2pengajar` FOREIGN KEY (`KODE`) REFERENCES `lecturers` (`KODE`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengemban`
--
ALTER TABLE `pengemban`
  ADD CONSTRAINT `FK_RELATIONSHIP_14` FOREIGN KEY (`KODE`) REFERENCES `lecturers` (`KODE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RELATIONSHIP_15` FOREIGN KEY (`JABATANID`) REFERENCES `jabatan` (`JABATANID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `researcher`
--
ALTER TABLE `researcher`
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`KODE`) REFERENCES `lecturers` (`KODE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`RSID`) REFERENCES `research` (`RSID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rps`
--
ALTER TABLE `rps`
  ADD CONSTRAINT `relation1rps` FOREIGN KEY (`kode_matkul`) REFERENCES `mata_kuliah` (`kode_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sap`
--
ALTER TABLE `sap`
  ADD CONSTRAINT `relation1sap` FOREIGN KEY (`kode_matkul`) REFERENCES `mata_kuliah` (`kode_matkul`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
