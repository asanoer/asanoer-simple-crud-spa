CREATE DATABASE IF NOT EXISTS `asanoer-crudspa`;
USE `asanoer-crudspa`;

CREATE TABLE IF NOT EXISTS `asanoer_tb_user` (
  `iduser` int(5) NOT NULL AUTO_INCREMENT COMMENT 'ID User',
  `nameuser` varchar(20) NOT NULL COMMENT 'Username ',
  `passuser` varchar(10) NOT NULL COMMENT 'Password',
  `namalengkapuser` varchar(50) NOT NULL COMMENT 'Nama Lengkap',
  `alamatuser` varchar(100) NOT NULL COMMENT 'Alamat',
  PRIMARY KEY (`iduser`),
  UNIQUE KEY `nameuser` (`nameuser`)
) ENGINE=InnoDB AUTO_INCREMENT=10124 DEFAULT CHARSET=latin1 COMMENT='Tabel User CRUD';

INSERT INTO `asanoer_tb_user` (`iduser`, `nameuser`, `passuser`, `namalengkapuser`, `alamatuser`) VALUES
	(10001, 'admin', 'admin', 'Admin Userku', 'Jakarta Tengah Pusat'),
	(10002, 'asanoer', 'asas', 'ASANOER.com', 'Jakarta'),
	(10009, 'Indra', 'indra', 'Indra Bakti', 'Jakarta Selatan'),
	(10095, 'gisela', 'gisela', 'Gisela Permadani Putri', 'HImalaya Everest'),
	(10096, 'vika', 'vika', 'Ida Ayu Vika Wulandary', 'Bali Selatan'),
	(10098, 'eko', 'eko', 'Eko Permana Putro', 'Jawoo'),
	(10100, 'dedekk', 'dedekk', 'Dedekk Siska Ok', 'Jakarta Stlh PLB'),
	(10102, 'siska', 'siska', 'Siska OK', 'Palembang'),
	(10103, 'budiman', 'budiman', 'Budi Man Tunya', 'Jatibutek'),
	(10104, 'jihanudin', 'jihanudin', 'jihan udinoer', 'HImalaya Everest'),
	(10105, 'datauser', 'budiman', 'Data User Baru', 'Data User Baru'),
	(10116, 'datauserku', 'datauser', 'Budi Man Tunya', 'Budi Man Tunya'),
	(10117, 'username-saya', 'adasaya', 'asanoer', 'Masak Seeh'),
	(10118, 'SayaAsanoer', 'asanoercom', 'InsanOer ASANoer Dot Net', 'Jakarta Net Syber Come Fried'),
	(10121, 'datausermu', 'asanoercom', 'InsanOer ASANoer Dot Net', 'asanoercomplete'),
	(10122, 'indahsekali', 'indahsekal', 'Indah Selalu Sekali', 'Mana Aja'),
	(10123, 'aditya', 'aditya', 'Aditya Cahya Nugraha', 'Jakartra');