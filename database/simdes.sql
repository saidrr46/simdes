/*
SQLyog Community v13.1.5  (64 bit)
MySQL - 10.2.14-MariaDB : Database - simdes
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `m_agama` */

DROP TABLE IF EXISTS `m_agama`;

CREATE TABLE `m_agama` (
  `id_agama` int(11) NOT NULL AUTO_INCREMENT,
  `agama` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_agama`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `m_agama` */

insert  into `m_agama`(`id_agama`,`agama`) values 
(1,'Islam'),
(2,'Kristen'),
(3,'Katolik'),
(4,'Budha'),
(5,'Hindu'),
(6,'Kong Hu Chu');

/*Table structure for table `m_berita` */

DROP TABLE IF EXISTS `m_berita`;

CREATE TABLE `m_berita` (
  `id_berita` int(11) NOT NULL AUTO_INCREMENT,
  `judul_berita` text DEFAULT NULL,
  `isi` longtext DEFAULT NULL,
  `featured` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_berita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `m_berita` */

/*Table structure for table `m_desa` */

DROP TABLE IF EXISTS `m_desa`;

CREATE TABLE `m_desa` (
  `id_desa` int(10) NOT NULL AUTO_INCREMENT,
  `id_kecamatan` int(10) DEFAULT NULL,
  `desa` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_desa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `m_desa` */

insert  into `m_desa`(`id_desa`,`id_kecamatan`,`desa`) values 
(1,1,'Wijirejo');

/*Table structure for table `m_dukuh` */

DROP TABLE IF EXISTS `m_dukuh`;

CREATE TABLE `m_dukuh` (
  `id_dukuh` int(11) NOT NULL AUTO_INCREMENT,
  `id_desa` int(11) DEFAULT NULL,
  `id_kepala_dukuh` int(11) DEFAULT NULL,
  `dukuh` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_dukuh`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `m_dukuh` */

insert  into `m_dukuh`(`id_dukuh`,`id_desa`,`id_kepala_dukuh`,`dukuh`) values 
(7,1,NULL,'Kembangputihan'),
(8,1,NULL,'Kentholan Lor'),
(11,1,NULL,'Kentholan Kidul'),
(12,1,NULL,'Gandekan'),
(13,1,NULL,'Dukuh'),
(14,1,NULL,'Iroyudan'),
(15,1,NULL,'Kembanggede'),
(16,1,NULL,'Kadisono'),
(17,1,NULL,'Karangber'),
(18,1,NULL,'Santan'),
(19,1,NULL,'Kalaijo'),
(20,1,NULL,'Kedung'),
(21,1,NULL,'Gungsing');

/*Table structure for table `m_group` */

DROP TABLE IF EXISTS `m_group`;

CREATE TABLE `m_group` (
  `id_group` int(10) NOT NULL AUTO_INCREMENT,
  `group` varchar(25) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `m_group` */

/*Table structure for table `m_jenis_kelamin` */

DROP TABLE IF EXISTS `m_jenis_kelamin`;

CREATE TABLE `m_jenis_kelamin` (
  `id_jenis_kelamin` int(11) NOT NULL AUTO_INCREMENT,
  `jenis_kelamin` varchar(5) DEFAULT NULL,
  `keterangan` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_jenis_kelamin`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `m_jenis_kelamin` */

insert  into `m_jenis_kelamin`(`id_jenis_kelamin`,`jenis_kelamin`,`keterangan`) values 
(1,'L','Laki Laki'),
(2,'P',NULL);

/*Table structure for table `m_kabupaten` */

DROP TABLE IF EXISTS `m_kabupaten`;

CREATE TABLE `m_kabupaten` (
  `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT,
  `id_provinsi` int(11) DEFAULT NULL,
  `kabupaten` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_kabupaten`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `m_kabupaten` */

insert  into `m_kabupaten`(`id_kabupaten`,`id_provinsi`,`kabupaten`) values 
(1,1,'Bantul'),
(2,1,'Sleman'),
(3,1,'Kulonprogo'),
(4,1,'Gunung Kidul');

/*Table structure for table `m_kecamatan` */

DROP TABLE IF EXISTS `m_kecamatan`;

CREATE TABLE `m_kecamatan` (
  `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT,
  `id_kabupaten` int(11) DEFAULT NULL,
  `kecamatan` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_kecamatan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `m_kecamatan` */

insert  into `m_kecamatan`(`id_kecamatan`,`id_kabupaten`,`kecamatan`) values 
(1,NULL,'Pandak'),
(2,NULL,'Bantul');

/*Table structure for table `m_menu` */

DROP TABLE IF EXISTS `m_menu`;

CREATE TABLE `m_menu` (
  `id_menu` int(10) NOT NULL AUTO_INCREMENT,
  `menu` varchar(25) DEFAULT NULL,
  `href` varchar(25) DEFAULT NULL,
  `icon` varchar(25) DEFAULT NULL,
  `parent` varchar(25) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `m_menu` */

/*Table structure for table `m_page` */

DROP TABLE IF EXISTS `m_page`;

CREATE TABLE `m_page` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `judul_page` varchar(255) DEFAULT NULL,
  `isi` longtext DEFAULT NULL,
  `keterangan` varchar(400) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_page`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `m_page` */

insert  into `m_page`(`id_page`,`judul_page`,`isi`,`keterangan`,`update_at`) values 
(1,'Sejarah','<p>Adalah</p>',NULL,'2019-12-11 08:58:41');

/*Table structure for table `m_pekerjaan` */

DROP TABLE IF EXISTS `m_pekerjaan`;

CREATE TABLE `m_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT,
  `pekerjaan` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `m_pekerjaan` */

insert  into `m_pekerjaan`(`id_pekerjaan`,`pekerjaan`) values 
(1,'PNS'),
(2,'Mahasiswa'),
(3,'Petani'),
(4,'Wirausaha'),
(5,'Buruh'),
(6,'TNI/POLRI'),
(7,'Lain-Lain');

/*Table structure for table `m_pendidikan` */

DROP TABLE IF EXISTS `m_pendidikan`;

CREATE TABLE `m_pendidikan` (
  `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT,
  `pendidikan` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id_pendidikan`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `m_pendidikan` */

insert  into `m_pendidikan`(`id_pendidikan`,`pendidikan`) values 
(1,'TK'),
(2,'SD'),
(3,'SMP'),
(4,'SMA/SMK'),
(5,'S1'),
(6,'S2'),
(7,'S3');

/*Table structure for table `m_profil_desa` */

DROP TABLE IF EXISTS `m_profil_desa`;

CREATE TABLE `m_profil_desa` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `profil` longtext DEFAULT NULL,
  `sejarah` longtext DEFAULT NULL,
  `visi_misi` longtext DEFAULT NULL,
  `demografi` longtext DEFAULT NULL,
  `potensi` longtext DEFAULT NULL,
  `peta_desa` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `m_profil_desa` */

/*Table structure for table `m_rt` */

DROP TABLE IF EXISTS `m_rt`;

CREATE TABLE `m_rt` (
  `id_rt` int(11) NOT NULL AUTO_INCREMENT,
  `id_rw` int(11) DEFAULT NULL,
  `id_kepala_rt` int(11) DEFAULT NULL,
  `rt` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_rt`),
  KEY `id_rt` (`id_rt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `m_rt` */

/*Table structure for table `m_rw` */

DROP TABLE IF EXISTS `m_rw`;

CREATE TABLE `m_rw` (
  `id_rw` int(11) NOT NULL AUTO_INCREMENT,
  `id_dukuh` int(11) DEFAULT NULL,
  `id_ketua_rw` int(11) DEFAULT NULL,
  `rw` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_rw`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `m_rw` */

insert  into `m_rw`(`id_rw`,`id_dukuh`,`id_ketua_rw`,`rw`) values 
(1,8,NULL,'1'),
(2,8,NULL,'2');

/*Table structure for table `m_status_keluarga` */

DROP TABLE IF EXISTS `m_status_keluarga`;

CREATE TABLE `m_status_keluarga` (
  `id_status_keluarga` int(11) NOT NULL AUTO_INCREMENT,
  `status_keluarga` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_status_keluarga`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `m_status_keluarga` */

insert  into `m_status_keluarga`(`id_status_keluarga`,`status_keluarga`) values 
(1,'Kepala Keluarga'),
(2,'Istri'),
(3,'Anak');

/*Table structure for table `m_user` */

DROP TABLE IF EXISTS `m_user`;

CREATE TABLE `m_user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `param1` varchar(255) DEFAULT NULL,
  `param2` varchar(255) DEFAULT NULL,
  `param3` varchar(255) DEFAULT NULL,
  `param4` varchar(255) DEFAULT NULL,
  `param5` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `m_user` */

insert  into `m_user`(`id_user`,`username`,`password`,`nama`,`email`,`active`,`param1`,`param2`,`param3`,`param4`,`param5`) values 
(2,'admin','21232f297a57a5a743894a0e4a801fc3','Administrator','1',1,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `ta_keluarga` */

DROP TABLE IF EXISTS `ta_keluarga`;

CREATE TABLE `ta_keluarga` (
  `id_keluarga` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_kk` varchar(16) DEFAULT NULL,
  `alamat` longtext DEFAULT NULL,
  `id_rt` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_keluarga`),
  KEY `id_rt` (`id_rt`),
  CONSTRAINT `ta_keluarga_ibfk_1` FOREIGN KEY (`id_rt`) REFERENCES `m_rt` (`id_rt`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ta_keluarga` */

insert  into `ta_keluarga`(`id_keluarga`,`nomor_kk`,`alamat`,`id_rt`) values 
(1,'3327090912870008','Sawah Besar',NULL);

/*Table structure for table `ta_penduduk` */

DROP TABLE IF EXISTS `ta_penduduk`;

CREATE TABLE `ta_penduduk` (
  `id_penduduk` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(16) DEFAULT NULL,
  `nama_penduduk` varchar(50) DEFAULT NULL,
  `id_agama` int(11) DEFAULT NULL,
  `id_jenis_kelamin` int(11) DEFAULT NULL,
  `id_pekerjaan` int(11) DEFAULT NULL,
  `id_pendidikan` int(11) DEFAULT NULL,
  `id_keluarga` int(11) DEFAULT NULL,
  `id_status_keluarga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_penduduk`),
  UNIQUE KEY `nik` (`nik`),
  KEY `id_agama` (`id_agama`),
  KEY `id_jenis_kelamin` (`id_jenis_kelamin`),
  KEY `id_pekerjaan` (`id_pekerjaan`),
  KEY `id_pendidikan` (`id_pendidikan`),
  KEY `id_keluarga` (`id_keluarga`),
  KEY `id_status_keluarga` (`id_status_keluarga`),
  KEY `id_penduduk` (`id_penduduk`),
  CONSTRAINT `ta_penduduk_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `m_agama` (`id_agama`) ON UPDATE CASCADE,
  CONSTRAINT `ta_penduduk_ibfk_2` FOREIGN KEY (`id_jenis_kelamin`) REFERENCES `m_jenis_kelamin` (`id_jenis_kelamin`) ON UPDATE CASCADE,
  CONSTRAINT `ta_penduduk_ibfk_3` FOREIGN KEY (`id_pekerjaan`) REFERENCES `m_pekerjaan` (`id_pekerjaan`) ON UPDATE CASCADE,
  CONSTRAINT `ta_penduduk_ibfk_4` FOREIGN KEY (`id_pendidikan`) REFERENCES `m_pendidikan` (`id_pendidikan`) ON UPDATE CASCADE,
  CONSTRAINT `ta_penduduk_ibfk_5` FOREIGN KEY (`id_keluarga`) REFERENCES `ta_keluarga` (`id_keluarga`) ON UPDATE CASCADE,
  CONSTRAINT `ta_penduduk_ibfk_6` FOREIGN KEY (`id_status_keluarga`) REFERENCES `m_status_keluarga` (`id_status_keluarga`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `ta_penduduk` */

insert  into `ta_penduduk`(`id_penduduk`,`nik`,`nama_penduduk`,`id_agama`,`id_jenis_kelamin`,`id_pekerjaan`,`id_pendidikan`,`id_keluarga`,`id_status_keluarga`) values 
(4,'3204320103900023','Said Romadhon',1,1,1,1,1,1);

/*Table structure for table `tr_group_has_menu` */

DROP TABLE IF EXISTS `tr_group_has_menu`;

CREATE TABLE `tr_group_has_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` int(11) DEFAULT NULL,
  `id_menu` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_group` (`id_group`),
  KEY `id_menu` (`id_menu`),
  CONSTRAINT `tr_group_has_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `m_menu` (`id_menu`) ON UPDATE CASCADE,
  CONSTRAINT `tr_group_has_menu_ibfk_2` FOREIGN KEY (`id_group`) REFERENCES `m_group` (`id_group`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tr_group_has_menu` */

insert  into `tr_group_has_menu`(`id`,`id_group`,`id_menu`) values 
(1,NULL,NULL);

/*Table structure for table `tr_group_has_user` */

DROP TABLE IF EXISTS `tr_group_has_user`;

CREATE TABLE `tr_group_has_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_group` (`id_group`),
  CONSTRAINT `tr_group_has_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `m_user` (`id_user`) ON UPDATE CASCADE,
  CONSTRAINT `tr_group_has_user_ibfk_2` FOREIGN KEY (`id_group`) REFERENCES `m_group` (`id_group`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tr_group_has_user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
