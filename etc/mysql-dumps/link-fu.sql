-- MySQL dump 10.13  Distrib 5.1.49, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: linkfu
-- ------------------------------------------------------
-- Server version	5.1.49-3

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
-- Table structure for table `bookmark`
--

DROP TABLE IF EXISTS `bookmark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookmark` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reference` varchar(4096) NOT NULL,
  `link` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1662 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookmark`
--

LOCK TABLES `bookmark` WRITE;
/*!40000 ALTER TABLE `bookmark` DISABLE KEYS */;
INSERT INTO `bookmark` VALUES (1580,'2011-03-07 14:54:09','0000-00-00 00:00:00','http://code.google.com/intl/de/apis/maps/documentation/javascript/overlays.html','Google Maps JavaScript API V3 '),(1581,'2011-03-07 16:46:44','0000-00-00 00:00:00','http://www.chip.de/bestenlisten/Bestenliste-Grafikkarten-PCIe--index/detail/id/733/','Vergleich: Grafikkarten (PCIe) im Test'),(1583,'2011-03-09 12:11:23','0000-00-00 00:00:00','http://www.mack-remstalmarkt.de/','Mack Remstalmarkt'),(1584,'2011-03-09 12:52:55','0000-00-00 00:00:00','http://www.youtube.com/watch?v=wdX8y_xkz14','Captain Obvious!!!'),(1585,'2011-03-09 20:12:44','0000-00-00 00:00:00','http://www.youtube.com/watch?v=JImcvtJzIK8','Why Is The Rum Gone?!'),(1586,'2011-03-09 20:39:37','0000-00-00 00:00:00','http://wurstball.de/47083/','Very funny Scotty.'),(1587,'2011-03-09 21:07:56','0000-00-00 00:00:00','http://wurstball.de/45164//','Run EMCÂ²'),(1588,'2011-03-09 22:02:16','0000-00-00 00:00:00','http://wurstball.de/41022/','Christ gleich...'),(1589,'2011-03-12 06:42:02','0000-00-00 00:00:00','http://www.netvision-technik.de/','http://www.netvision-technik.de/'),(1590,'2011-03-12 06:42:36','0000-00-00 00:00:00','http://www.spaceyonline.de/radio.html','Spaceys Onlineradio'),(1591,'2011-03-12 06:43:08','0000-00-00 00:00:00','http://www.imdb.de/title/tt0166896/','The straight Story - Eine wahre Geschichte'),(1592,'2011-03-12 06:44:11','0000-00-00 00:00:00','http://www.youtube.com/watch?v=9epGfEBjquc','EAV - Mein Gott'),(1593,'2011-03-12 06:44:39','0000-00-00 00:00:00','http://www.youtube.com/watch?v=pe7sfOKSMqQ','EAV - s\\\'Muaterl'),(1594,'2011-03-12 06:45:39','0000-00-00 00:00:00','http://www.youtube.com/watch?v=fkfux3Ju7Q4','EAV - Nie wieder Kunst'),(1595,'2011-03-12 06:46:24','0000-00-00 00:00:00','http://www.youtube.com/watch?v=7IlUCJfl79M','EAV - Neandertal'),(1596,'2011-03-12 14:53:53','0000-00-00 00:00:00','http://www.amazon.de/product-reviews/3608932224/ref=cm_cr_pr_link_next_17?ie=UTF8&showViewpoints=0&pageNumber=17&sortBy=bySubmissionDateDescending','Rezension zu KregeÃ¼bersetzung von LotR '),(1597,'2011-03-15 18:06:31','0000-00-00 00:00:00','http://www-i1.informatik.rwth-aachen.de/~algorithmus/','Algorithmus der Woche'),(1598,'2011-03-15 18:06:59','0000-00-00 00:00:00','http://www.headroomx.de/german/mods/v8/index.html','Casemod: Big Block'),(1599,'2011-03-15 19:03:10','0000-00-00 00:00:00','http://www.remix64.com/index.php?sitesearch_dom=2&sitesearch=visa+r%C3%B6ster','remix64.com'),(1600,'2011-03-15 19:04:11','0000-00-00 00:00:00','http://www.societyofrobots.com/','How to build a robot'),(1601,'2011-03-15 19:10:21','0000-00-00 00:00:00','http://www.regular-expressions.info/','Regular-Expressions.info'),(1604,'2011-03-17 21:02:44','0000-00-00 00:00:00','http://www.youtube.com/watch?v=QJlBX7_x_VM','The Royal Scots Dragoon Guards - The Gael'),(1605,'2011-03-19 15:42:28','0000-00-00 00:00:00','http://f.666kb.com/i/brvv5ag8u1zftlm3j.jpg','Iss Mirdoch Wurscht'),(1606,'2011-03-21 09:55:00','0000-00-00 00:00:00','http://www.youtube.com/watch?v=xRAq3A9TOXY','Ralf Schmitz - Tourette-Syndrom'),(1607,'2011-03-22 13:16:20','0000-00-00 00:00:00','http://www.youtube.com/watch?v=JRL5Z1k60tg','Wer hat an der Uhr gedreht'),(1608,'2011-03-23 11:53:36','0000-00-00 00:00:00','http://listen.grooveshark.com/#/','Grooveshark'),(1609,'2011-03-24 15:24:11','0000-00-00 00:00:00','http://www.youtube.com/watch?v=YmsC8-e9xHs','Laughing Baby Gets Terrified by Mom Blowing Nose'),(1610,'2011-03-26 17:26:41','0000-00-00 00:00:00','http://www.spreadshirt.de/maenner-t-shirts-C4410P24/1/60','Spreadshirt'),(1611,'2011-04-08 20:16:20','0000-00-00 00:00:00','http://www.getdigital.de/products/NULL_Pointer','Thou shalt not follow the NULL-Pointer'),(1612,'2011-04-08 21:54:05','0000-00-00 00:00:00','http://www.youtube.com/watch?v=WB0kzUbuQZo','Made in Germany | Pirmasens -- im Schatten des Booms'),(1613,'2011-04-15 14:23:59','0000-00-00 00:00:00','https://mail.google.com/mail/u/1/images/2/5/android/bg.png','Schaltkreis-Bild'),(1614,'2011-04-18 15:25:22','0000-00-00 00:00:00','http://www.kwick.de/JuneBeetle#/JuneBeetle/mypage/','Satire-Websperre'),(1615,'2011-04-27 16:27:23','0000-00-00 00:00:00','http://www.myvideo.de/watch/7148183/Ludwig_Hirsch_1928','Ludwig Hirsch, 1928'),(1617,'2011-04-29 21:20:33','0000-00-00 00:00:00','http://www.youtube.com/watch?v=Ns8YZAJByDQ','Lisa Gerrard - The host of seraphim - HD'),(1619,'2011-05-06 14:05:48','0000-00-00 00:00:00','http://www.cafepress.de/+aperture_laboratories_1950s_mug,531678616','Tasse: Aperture Science Innovators'),(1620,'2011-05-06 14:06:24','0000-00-00 00:00:00','http://www.cafepress.de/+portal_aperture_science_lab_dark_tshirt,529135759','T-Shirt: Aperture Laboratories'),(1621,'2011-05-10 06:48:15','0000-00-00 00:00:00','http://www.pad-soft.de/Galerie/index.php?Bild=47','PDI GemÃ¤lde Galerie'),(1622,'2011-05-10 20:04:48','0000-00-00 00:00:00','http://www.youtube.com/watch?v=eXqPYte8tvc','Ewan Dobson - Time 2 Guitar'),(1623,'2011-05-20 15:21:21','0000-00-00 00:00:00','http://geekadelphia.com/wp-content/uploads/2009/04/day_of_the_tentacle_amigurumi.jpg','Gestrickte DOTT Tentakel'),(1624,'2011-05-20 15:26:56','0000-00-00 00:00:00','http://donrobot.spreadshirt.com/day-of-the-tentacle-take-on-the-world-A4180409','Purpur Tentakel T-Shirt'),(1625,'2011-05-28 08:16:11','0000-00-00 00:00:00','http://www-test.link-fu.net/','GMA Interview with Charlie Sheen'),(1626,'2011-06-01 09:49:33','0000-00-00 00:00:00','http://www.stuttgarter-zeitung.de/inhalt.schiffer-erhaelt-grossteils-recht.2b062546-08e2-4945-9dbf-4fafa99fffa5.html','Schiffer erhÃ¤lt groÃŸteils Recht'),(1627,'2011-06-07 06:34:08','0000-00-00 00:00:00','http://www.youtube.com/watch?v=FK_CKtYCRIc','They see me rollin\''),(1628,'2011-06-23 05:40:18','0000-00-00 00:00:00','http://www.spieletipps.de/pc/torchlight/tipps/37866/1/','Torchlight - Cheats'),(1629,'2011-06-23 06:06:07','0000-00-00 00:00:00','http://www.youtube.com/watch?v=a0n1PNpB00g','Polizei, Hausdurchsuchung: Sie haben das Recht zu schweigen (Udo Vetter)'),(1630,'2011-06-23 06:24:23','0000-00-00 00:00:00','http://www.adventures-kompakt.de/web-loesungen/runaway-loesung-road-adventure.html','Runaway 1 - KomplettlÃ¶sung'),(1641,'2011-07-03 19:49:12','0000-00-00 00:00:00','http://www.geocaching.com/bookmarks/view.aspx?guid=495245ca-3910-4669-a35b-7a30b9c956f6','Geocache - NÃ¤chster Halt: Raum Stuttgart'),(1642,'2011-11-08 13:32:09','0000-00-00 00:00:00','http://www.geocaching.com/seek/cache_details.aspx?wp=GC1BE91','ISS Geocache'),(1643,'2011-11-10 12:08:06','0000-00-00 00:00:00','http://earthquake.usgs.gov/earthquakes/recenteqsww/','Latest Earthquakes in the World - Past 7 days'),(1644,'2011-11-10 12:21:45','0000-00-00 00:00:00','http://www.geocaching.com/seek/cache_details.aspx?wp=GC1FPN1','GC: MÃ¼nchen - Venedig'),(1645,'2011-11-12 19:34:07','0000-00-00 00:00:00','http://www.youtube.com/watch?v=Y8uE-HXASuE','High Guard Battle March'),(1646,'2011-11-15 20:37:45','0000-00-00 00:00:00','http://video.google.com/videoplay?docid=-2537804408218048195','Fabian - Gib mir die Welt plus fÃ¼nf prozent'),(1647,'2011-11-15 20:38:50','0000-00-00 00:00:00','http://www.youtube.com/user/grodq#p/c/CFDAED86248DD832/3/Tk_Nku_GPUs','Never Enough Lights; TSO - Wizards of Winter'),(1648,'2011-11-15 20:39:18','0000-00-00 00:00:00','http://www.crackajack.de/2011/10/29/probability-mathloop/','Nerdcore - Probably a math loop'),(1649,'2011-11-15 20:40:23','0000-00-00 00:00:00','http://ocw.mit.edu/courses/physics/8-01-physics-i-classical-mechanics-fall-1999/video-lectures/','MIT Open CourseWare - Physik Video Lectures'),(1650,'2011-11-15 20:41:01','0000-00-00 00:00:00','http://www.youtube.com/watch?v=6ZS9tpDAohg','Wissen ist Macht: Die Datenkrake ELENA'),(1651,'2011-11-15 20:42:14','0000-00-00 00:00:00','http://www.youtube.com/watch?v=TjVPQ_-tufg','Neues vom Wixxer... mit Hatler.'),(1652,'2011-11-15 20:45:09','0000-00-00 00:00:00','http://www.youtube.com/watch?v=JoHqdXpwLN8','Sesame Street - The Martians look for Earth'),(1653,'2011-11-15 20:45:41','0000-00-00 00:00:00','http://www.metacafe.com/watch/135718/william_shatner_vs_george_lucas/',''),(1654,'2011-11-15 20:49:31','0000-00-00 00:00:00','http://blog.dream-coder.de/2010/06/zend-studio-7-2-autovervollstaendigung-geht-nicht-mehr/','Zend Studio 7.2 - AutovervollstÃ¤ndigung geht nicht mehr'),(1655,'2011-11-15 20:50:36','0000-00-00 00:00:00','http://www.jplayer.org/','jPlayer - The jQuery HTML5 Audio'),(1656,'2011-11-15 20:53:03','0000-00-00 00:00:00','http://www.instructables.com/id/The-Most-Useless-Machine/','The most useless machine ever.'),(1657,'2011-11-16 11:22:01','0000-00-00 00:00:00','http://www.theonion.com/video/apple-introduces-revolutionary-new-laptop-with-no,14299/','Macbook Wheel'),(1658,'2011-11-16 11:26:40','0000-00-00 00:00:00','http://www.youtube.com/watch?v=1eJ5v3R2zOg','Mactini'),(1659,'2011-11-16 11:28:08','0000-00-00 00:00:00','http://www.no-copy.org/abspielen.html','NO COPY - Die Welt der digitalen Raubkopie: Abspielen'),(1660,'2011-11-16 11:36:28','0000-00-00 00:00:00','http://de.youtube.com/watch?v=Y3tF7TL0Qh4','Matrix - GitS - Vergleich'),(1661,'2011-12-14 11:07:34','0000-00-00 00:00:00','http://www.cyanogenmod.com/','CyanogenMod für Android');
/*!40000 ALTER TABLE `bookmark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookmark_tag`
--

DROP TABLE IF EXISTS `bookmark_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookmark_tag` (
  `link_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `link_id` (`link_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `bookmark_tag_ibfk_1` FOREIGN KEY (`link_id`) REFERENCES `bookmark` (`id`),
  CONSTRAINT `bookmark_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookmark_tag`
--

LOCK TABLES `bookmark_tag` WRITE;
/*!40000 ALTER TABLE `bookmark_tag` DISABLE KEYS */;
INSERT INTO `bookmark_tag` VALUES (1580,1,'2011-04-13 12:07:33'),(1581,4,'2011-04-13 12:07:52'),(1584,2,'2011-04-13 12:08:10'),(1584,5,'2011-04-13 12:08:16'),(1585,2,'2011-04-13 12:08:33'),(1585,5,'2011-04-13 12:08:35');
/*!40000 ALTER TABLE `bookmark_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tagname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (1,'2011-04-13 11:12:37','0000-00-00 00:00:00','programmierung'),(2,'2011-04-13 11:12:50','0000-00-00 00:00:00','video'),(3,'2011-04-13 11:12:53','0000-00-00 00:00:00','pic'),(4,'2011-04-13 11:12:59','0000-00-00 00:00:00','hardware'),(5,'2011-04-13 11:13:08','0000-00-00 00:00:00','fun'),(6,'2011-04-13 11:13:18','0000-00-00 00:00:00','games');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-07-14 14:39:00
-- MySQL dump 10.13  Distrib 5.1.49, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: linkfu
-- ------------------------------------------------------
-- Server version	5.1.49-3

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
-- Table structure for table `bookmark`
--

DROP TABLE IF EXISTS `bookmark`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookmark` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reference` varchar(4096) NOT NULL,
  `link` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1662 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookmark`
--

LOCK TABLES `bookmark` WRITE;
/*!40000 ALTER TABLE `bookmark` DISABLE KEYS */;
INSERT INTO `bookmark` VALUES (1580,'2011-03-07 14:54:09','0000-00-00 00:00:00','http://code.google.com/intl/de/apis/maps/documentation/javascript/overlays.html','Google Maps JavaScript API V3 '),(1581,'2011-03-07 16:46:44','0000-00-00 00:00:00','http://www.chip.de/bestenlisten/Bestenliste-Grafikkarten-PCIe--index/detail/id/733/','Vergleich: Grafikkarten (PCIe) im Test'),(1583,'2011-03-09 12:11:23','0000-00-00 00:00:00','http://www.mack-remstalmarkt.de/','Mack Remstalmarkt'),(1584,'2011-03-09 12:52:55','0000-00-00 00:00:00','http://www.youtube.com/watch?v=wdX8y_xkz14','Captain Obvious!!!'),(1585,'2011-03-09 20:12:44','0000-00-00 00:00:00','http://www.youtube.com/watch?v=JImcvtJzIK8','Why Is The Rum Gone?!'),(1586,'2011-03-09 20:39:37','0000-00-00 00:00:00','http://wurstball.de/47083/','Very funny Scotty.'),(1587,'2011-03-09 21:07:56','0000-00-00 00:00:00','http://wurstball.de/45164//','Run EMCÂ²'),(1588,'2011-03-09 22:02:16','0000-00-00 00:00:00','http://wurstball.de/41022/','Christ gleich...'),(1589,'2011-03-12 06:42:02','0000-00-00 00:00:00','http://www.netvision-technik.de/','http://www.netvision-technik.de/'),(1590,'2011-03-12 06:42:36','0000-00-00 00:00:00','http://www.spaceyonline.de/radio.html','Spaceys Onlineradio'),(1591,'2011-03-12 06:43:08','0000-00-00 00:00:00','http://www.imdb.de/title/tt0166896/','The straight Story - Eine wahre Geschichte'),(1592,'2011-03-12 06:44:11','0000-00-00 00:00:00','http://www.youtube.com/watch?v=9epGfEBjquc','EAV - Mein Gott'),(1593,'2011-03-12 06:44:39','0000-00-00 00:00:00','http://www.youtube.com/watch?v=pe7sfOKSMqQ','EAV - s\\\'Muaterl'),(1594,'2011-03-12 06:45:39','0000-00-00 00:00:00','http://www.youtube.com/watch?v=fkfux3Ju7Q4','EAV - Nie wieder Kunst'),(1595,'2011-03-12 06:46:24','0000-00-00 00:00:00','http://www.youtube.com/watch?v=7IlUCJfl79M','EAV - Neandertal'),(1596,'2011-03-12 14:53:53','0000-00-00 00:00:00','http://www.amazon.de/product-reviews/3608932224/ref=cm_cr_pr_link_next_17?ie=UTF8&showViewpoints=0&pageNumber=17&sortBy=bySubmissionDateDescending','Rezension zu KregeÃ¼bersetzung von LotR '),(1597,'2011-03-15 18:06:31','0000-00-00 00:00:00','http://www-i1.informatik.rwth-aachen.de/~algorithmus/','Algorithmus der Woche'),(1598,'2011-03-15 18:06:59','0000-00-00 00:00:00','http://www.headroomx.de/german/mods/v8/index.html','Casemod: Big Block'),(1599,'2011-03-15 19:03:10','0000-00-00 00:00:00','http://www.remix64.com/index.php?sitesearch_dom=2&sitesearch=visa+r%C3%B6ster','remix64.com'),(1600,'2011-03-15 19:04:11','0000-00-00 00:00:00','http://www.societyofrobots.com/','How to build a robot'),(1601,'2011-03-15 19:10:21','0000-00-00 00:00:00','http://www.regular-expressions.info/','Regular-Expressions.info'),(1604,'2011-03-17 21:02:44','0000-00-00 00:00:00','http://www.youtube.com/watch?v=QJlBX7_x_VM','The Royal Scots Dragoon Guards - The Gael'),(1605,'2011-03-19 15:42:28','0000-00-00 00:00:00','http://f.666kb.com/i/brvv5ag8u1zftlm3j.jpg','Iss Mirdoch Wurscht'),(1606,'2011-03-21 09:55:00','0000-00-00 00:00:00','http://www.youtube.com/watch?v=xRAq3A9TOXY','Ralf Schmitz - Tourette-Syndrom'),(1607,'2011-03-22 13:16:20','0000-00-00 00:00:00','http://www.youtube.com/watch?v=JRL5Z1k60tg','Wer hat an der Uhr gedreht'),(1608,'2011-03-23 11:53:36','0000-00-00 00:00:00','http://listen.grooveshark.com/#/','Grooveshark'),(1609,'2011-03-24 15:24:11','0000-00-00 00:00:00','http://www.youtube.com/watch?v=YmsC8-e9xHs','Laughing Baby Gets Terrified by Mom Blowing Nose'),(1610,'2011-03-26 17:26:41','0000-00-00 00:00:00','http://www.spreadshirt.de/maenner-t-shirts-C4410P24/1/60','Spreadshirt'),(1611,'2011-04-08 20:16:20','0000-00-00 00:00:00','http://www.getdigital.de/products/NULL_Pointer','Thou shalt not follow the NULL-Pointer'),(1612,'2011-04-08 21:54:05','0000-00-00 00:00:00','http://www.youtube.com/watch?v=WB0kzUbuQZo','Made in Germany | Pirmasens -- im Schatten des Booms'),(1613,'2011-04-15 14:23:59','0000-00-00 00:00:00','https://mail.google.com/mail/u/1/images/2/5/android/bg.png','Schaltkreis-Bild'),(1614,'2011-04-18 15:25:22','0000-00-00 00:00:00','http://www.kwick.de/JuneBeetle#/JuneBeetle/mypage/','Satire-Websperre'),(1615,'2011-04-27 16:27:23','0000-00-00 00:00:00','http://www.myvideo.de/watch/7148183/Ludwig_Hirsch_1928','Ludwig Hirsch, 1928'),(1617,'2011-04-29 21:20:33','0000-00-00 00:00:00','http://www.youtube.com/watch?v=Ns8YZAJByDQ','Lisa Gerrard - The host of seraphim - HD'),(1619,'2011-05-06 14:05:48','0000-00-00 00:00:00','http://www.cafepress.de/+aperture_laboratories_1950s_mug,531678616','Tasse: Aperture Science Innovators'),(1620,'2011-05-06 14:06:24','0000-00-00 00:00:00','http://www.cafepress.de/+portal_aperture_science_lab_dark_tshirt,529135759','T-Shirt: Aperture Laboratories'),(1621,'2011-05-10 06:48:15','0000-00-00 00:00:00','http://www.pad-soft.de/Galerie/index.php?Bild=47','PDI GemÃ¤lde Galerie'),(1622,'2011-05-10 20:04:48','0000-00-00 00:00:00','http://www.youtube.com/watch?v=eXqPYte8tvc','Ewan Dobson - Time 2 Guitar'),(1623,'2011-05-20 15:21:21','0000-00-00 00:00:00','http://geekadelphia.com/wp-content/uploads/2009/04/day_of_the_tentacle_amigurumi.jpg','Gestrickte DOTT Tentakel'),(1624,'2011-05-20 15:26:56','0000-00-00 00:00:00','http://donrobot.spreadshirt.com/day-of-the-tentacle-take-on-the-world-A4180409','Purpur Tentakel T-Shirt'),(1625,'2011-05-28 08:16:11','0000-00-00 00:00:00','http://www-test.link-fu.net/','GMA Interview with Charlie Sheen'),(1626,'2011-06-01 09:49:33','0000-00-00 00:00:00','http://www.stuttgarter-zeitung.de/inhalt.schiffer-erhaelt-grossteils-recht.2b062546-08e2-4945-9dbf-4fafa99fffa5.html','Schiffer erhÃ¤lt groÃŸteils Recht'),(1627,'2011-06-07 06:34:08','0000-00-00 00:00:00','http://www.youtube.com/watch?v=FK_CKtYCRIc','They see me rollin\''),(1628,'2011-06-23 05:40:18','0000-00-00 00:00:00','http://www.spieletipps.de/pc/torchlight/tipps/37866/1/','Torchlight - Cheats'),(1629,'2011-06-23 06:06:07','0000-00-00 00:00:00','http://www.youtube.com/watch?v=a0n1PNpB00g','Polizei, Hausdurchsuchung: Sie haben das Recht zu schweigen (Udo Vetter)'),(1630,'2011-06-23 06:24:23','0000-00-00 00:00:00','http://www.adventures-kompakt.de/web-loesungen/runaway-loesung-road-adventure.html','Runaway 1 - KomplettlÃ¶sung'),(1641,'2011-07-03 19:49:12','0000-00-00 00:00:00','http://www.geocaching.com/bookmarks/view.aspx?guid=495245ca-3910-4669-a35b-7a30b9c956f6','Geocache - NÃ¤chster Halt: Raum Stuttgart'),(1642,'2011-11-08 13:32:09','0000-00-00 00:00:00','http://www.geocaching.com/seek/cache_details.aspx?wp=GC1BE91','ISS Geocache'),(1643,'2011-11-10 12:08:06','0000-00-00 00:00:00','http://earthquake.usgs.gov/earthquakes/recenteqsww/','Latest Earthquakes in the World - Past 7 days'),(1644,'2011-11-10 12:21:45','0000-00-00 00:00:00','http://www.geocaching.com/seek/cache_details.aspx?wp=GC1FPN1','GC: MÃ¼nchen - Venedig'),(1645,'2011-11-12 19:34:07','0000-00-00 00:00:00','http://www.youtube.com/watch?v=Y8uE-HXASuE','High Guard Battle March'),(1646,'2011-11-15 20:37:45','0000-00-00 00:00:00','http://video.google.com/videoplay?docid=-2537804408218048195','Fabian - Gib mir die Welt plus fÃ¼nf prozent'),(1647,'2011-11-15 20:38:50','0000-00-00 00:00:00','http://www.youtube.com/user/grodq#p/c/CFDAED86248DD832/3/Tk_Nku_GPUs','Never Enough Lights; TSO - Wizards of Winter'),(1648,'2011-11-15 20:39:18','0000-00-00 00:00:00','http://www.crackajack.de/2011/10/29/probability-mathloop/','Nerdcore - Probably a math loop'),(1649,'2011-11-15 20:40:23','0000-00-00 00:00:00','http://ocw.mit.edu/courses/physics/8-01-physics-i-classical-mechanics-fall-1999/video-lectures/','MIT Open CourseWare - Physik Video Lectures'),(1650,'2011-11-15 20:41:01','0000-00-00 00:00:00','http://www.youtube.com/watch?v=6ZS9tpDAohg','Wissen ist Macht: Die Datenkrake ELENA'),(1651,'2011-11-15 20:42:14','0000-00-00 00:00:00','http://www.youtube.com/watch?v=TjVPQ_-tufg','Neues vom Wixxer... mit Hatler.'),(1652,'2011-11-15 20:45:09','0000-00-00 00:00:00','http://www.youtube.com/watch?v=JoHqdXpwLN8','Sesame Street - The Martians look for Earth'),(1653,'2011-11-15 20:45:41','0000-00-00 00:00:00','http://www.metacafe.com/watch/135718/william_shatner_vs_george_lucas/',''),(1654,'2011-11-15 20:49:31','0000-00-00 00:00:00','http://blog.dream-coder.de/2010/06/zend-studio-7-2-autovervollstaendigung-geht-nicht-mehr/','Zend Studio 7.2 - AutovervollstÃ¤ndigung geht nicht mehr'),(1655,'2011-11-15 20:50:36','0000-00-00 00:00:00','http://www.jplayer.org/','jPlayer - The jQuery HTML5 Audio'),(1656,'2011-11-15 20:53:03','0000-00-00 00:00:00','http://www.instructables.com/id/The-Most-Useless-Machine/','The most useless machine ever.'),(1657,'2011-11-16 11:22:01','0000-00-00 00:00:00','http://www.theonion.com/video/apple-introduces-revolutionary-new-laptop-with-no,14299/','Macbook Wheel'),(1658,'2011-11-16 11:26:40','0000-00-00 00:00:00','http://www.youtube.com/watch?v=1eJ5v3R2zOg','Mactini'),(1659,'2011-11-16 11:28:08','0000-00-00 00:00:00','http://www.no-copy.org/abspielen.html','NO COPY - Die Welt der digitalen Raubkopie: Abspielen'),(1660,'2011-11-16 11:36:28','0000-00-00 00:00:00','http://de.youtube.com/watch?v=Y3tF7TL0Qh4','Matrix - GitS - Vergleich'),(1661,'2011-12-14 11:07:34','0000-00-00 00:00:00','http://www.cyanogenmod.com/','CyanogenMod für Android');
/*!40000 ALTER TABLE `bookmark` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookmark_tag`
--

DROP TABLE IF EXISTS `bookmark_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookmark_tag` (
  `link_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `link_id` (`link_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `bookmark_tag_ibfk_1` FOREIGN KEY (`link_id`) REFERENCES `bookmark` (`id`),
  CONSTRAINT `bookmark_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookmark_tag`
--

LOCK TABLES `bookmark_tag` WRITE;
/*!40000 ALTER TABLE `bookmark_tag` DISABLE KEYS */;
INSERT INTO `bookmark_tag` VALUES (1580,1,'2011-04-13 12:07:33'),(1581,4,'2011-04-13 12:07:52'),(1584,2,'2011-04-13 12:08:10'),(1584,5,'2011-04-13 12:08:16'),(1585,2,'2011-04-13 12:08:33'),(1585,5,'2011-04-13 12:08:35');
/*!40000 ALTER TABLE `bookmark_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tag`
--

DROP TABLE IF EXISTS `tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tag` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tagname` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tag`
--

LOCK TABLES `tag` WRITE;
/*!40000 ALTER TABLE `tag` DISABLE KEYS */;
INSERT INTO `tag` VALUES (1,'2011-04-13 11:12:37','0000-00-00 00:00:00','programmierung'),(2,'2011-04-13 11:12:50','0000-00-00 00:00:00','video'),(3,'2011-04-13 11:12:53','0000-00-00 00:00:00','pic'),(4,'2011-04-13 11:12:59','0000-00-00 00:00:00','hardware'),(5,'2011-04-13 11:13:08','0000-00-00 00:00:00','fun'),(6,'2011-04-13 11:13:18','0000-00-00 00:00:00','games');
/*!40000 ALTER TABLE `tag` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-07-14 14:40:06
