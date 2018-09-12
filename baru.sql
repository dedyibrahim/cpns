-- MySQL dump 10.13  Distrib 5.7.23, for Linux (i686)
--
-- Host: localhost    Database: cpns
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `akun`
--

DROP TABLE IF EXISTS `akun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `akun` (
  `id_account` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `nomor_kontak` varchar(100) DEFAULT NULL,
  `alamat_lengkap` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_account`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `akun`
--

LOCK TABLES `akun` WRITE;
/*!40000 ALTER TABLE `akun` DISABLE KEYS */;
INSERT INTO `akun` VALUES (1,'Dedy ibrahim','081289903664','Kp.sumurwangi Kel.Kayumanis Kec.Tanah Sareal Kota bogor','dedyibrahim23@gmail.com','21232f297a57a5a743894a0e4a801fc3'),(3,'asd','asd','asd','asd','7815696ecbf1c96e6894b779456d330e'),(4,'komar','081289903664','kp.bandan','komar@gmail.com','21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `akun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soal`
--

DROP TABLE IF EXISTS `soal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soal` (
  `id_soal` int(100) NOT NULL AUTO_INCREMENT,
  `soal` text NOT NULL,
  `jawaban_a` text NOT NULL,
  `jawaban_b` text NOT NULL,
  `jawaban_c` text NOT NULL,
  `jawaban_d` text NOT NULL,
  `jawaban_e` text NOT NULL,
  `jawaban_benar` text NOT NULL,
  PRIMARY KEY (`id_soal`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soal`
--

LOCK TABLES `soal` WRITE;
/*!40000 ALTER TABLE `soal` DISABLE KEYS */;
INSERT INTO `soal` VALUES (4,'Aku memasuki ruang tunggunya. Ruangan sekitar lima kali enam meter itu\ndilapisi kertas dinding berwarna hitam dan putih. Kursinya berwarna cokelat\nmuda dengan bantal berwarna-warni. Karpetnya berwarna merah dengan\nmotif lingkaran. Pendingin ruangan diletakkan di atas lukisan abstrak sebesar\ntelevisi 32 inch. Lampu hias diletakkan di pojok ruangan dekat dengan meja\nkayu jati. Aku tak heran jika banyak yang betah menunggu di sini.\n	\nParagraf di atas dikembangkan dalam bentuk ....','deskripsi','argumentasi','persuasi','narasi','eksposisi','eksposisi'),(5,'Berbagai suku bangsa yang berbeda-beda dapat saling komunikasi dengan\nsatu bahasa yang dapat dipahami bersama, yaitu bahasa Indonesia, tanpa\nmenghilangkan identitas kesukuan dan kesetiaannya pada nilai-nilai sosial\nbudaya serta bahasa daerahnya.\nPernyataan di atas menyatakan fungsi bahasa Indonesia sebagai ....','lambang kebanggaan kebangsaan','lambang identitas nasional','alat penghubung antardaerah','alat penghubung antarkebudayaan','alat penghubung antarkebudayaan','lambang identitas nasional'),(6,'Berikut ini, tujuan-tujuan ditetapkannya EYD (Ejaan Yang Disempurnakan),\nkecuali ....','membina ketertiban dalam penulisan huruf dan tanda baca','memulai usaha pembakuan bahasa Indonesia secara menyeluruh','mendorong perkembangan bahasa Indonesia','menangkal penggunaan bahasa asing','memberikan pengetahuan masyarakat akan berbahasa yang benar','memberikan pengetahuan masyarakat akan berbahasa yang benar');
/*!40000 ALTER TABLE `soal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin@guepedia.com','a35b7b79104ca17dc3b97b2eb457ab16');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-12  8:25:51
