-- MySQL dump 10.13  Distrib 8.0.31, for macos12 (arm64)
--
-- Host: localhost    Database: secretCellarNew
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `appellation`
--

DROP TABLE IF EXISTS `appellation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `appellation` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(45) DEFAULT NULL,
  `region_id` int NOT NULL,
  PRIMARY KEY (`id`,`region_id`),
  KEY `fk_appellation_region1_idx` (`region_id`),
  CONSTRAINT `fk_appellation_region1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appellation`
--

LOCK TABLES `appellation` WRITE;
/*!40000 ALTER TABLE `appellation` DISABLE KEYS */;
INSERT INTO `appellation` VALUES (3,'margaux',12),(4,'haut-médoc',12),(5,'graves',12),(6,'saint-estephe',12),(7,'saint-émilion',12),(8,'pauillac',12),(9,'pomerol',12),(10,'saint-julien',12),(11,'bordeaux supérieur',12),(12,'pessac-léognan',12),(13,'blaye',12),(14,'loupiac',12),(15,'cadillac',12),(16,'sauternes',12),(17,'medoc',12),(18,'gewurztraminer',4),(19,'riesling',4),(20,'pinot gris',4),(21,'gruenspiel',4),(22,'engelgarten',4),(23,'morgon',5),(24,'julienas',5),(25,'moulin à vent',5),(26,'brouilly',5),(27,'chirouble',5),(28,'aloxe-corton',2),(29,'corton',2),(30,'chorey-les-beaune',2),(31,'saint-aubin',2),(32,'savigny-les-beaune',2),(33,'pommard',2),(34,'chevrey-chambertin',2),(35,'marsannay',2),(36,'côtes de nuit',2),(37,'irancy',2),(38,'coulanges-la-vinneuse',2),(39,'puilly-fuissée',2),(40,'chablis',2),(41,'mercurey',2),(42,'vosne-romanée',2),(43,'voirin-jumel',1),(44,'canard duchene',1),(45,'hutasse et fils',1),(46,'ayala',1),(47,'le brun serveney',1),(48,'château neuf du pape',7),(49,'crozes hermitage',7),(50,'côte du rhône chusclan',7),(51,'condrieu',7),(52,'arbois',14),(53,'côtes du jura',14),(54,'château-chalon ',14),(55,'collioure',10),(56,'pic saint loup',10),(57,'fitoux',10),(58,'cabardes',10),(59,'côteaux du languedoc',10),(60,'rivesaltes',10),(61,'côtes du roussillon villages',10),(62,'languedoc',10),(63,'bandol',8),(64,'cahors',11),(65,'madiran',11),(66,'jurançon',11),(67,'chinon',13),(68,'sancerre',13),(69,'la roulerie',13);
/*!40000 ALTER TABLE `appellation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `color`
--

DROP TABLE IF EXISTS `color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `color` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `color`
--

LOCK TABLES `color` WRITE;
/*!40000 ALTER TABLE `color` DISABLE KEYS */;
INSERT INTO `color` VALUES (1,'rouge'),(2,'blanc'),(3,'rosé');
/*!40000 ALTER TABLE `color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `country` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'Afghanistan'),(2,'Albanie'),(3,'Antarctique'),(4,'Algérie'),(5,'Samoa Américaines'),(6,'Andorre'),(7,'Angola'),(8,'Antigua-et-Barbuda'),(9,'Azerbaïdjan'),(10,'Argentine'),(11,'Australie'),(12,'Autriche'),(13,'Bahamas'),(14,'Bahreïn'),(15,'Bangladesh'),(16,'Arménie'),(17,'Barbade'),(18,'Belgique'),(19,'Bermudes'),(20,'Bhoutan'),(21,'Bolivie'),(22,'Bosnie-Herzégovine'),(23,'Botswana'),(24,'Île Bouvet'),(25,'Brésil'),(26,'Belize'),(27,'Territoire Britannique de l\'Océan Indien'),(28,'Îles Salomon'),(29,'Îles Vierges Britanniques'),(30,'Brunéi Darussalam'),(31,'Bulgarie'),(32,'Myanmar'),(33,'Burundi'),(34,'Bélarus'),(35,'Cambodge'),(36,'Cameroun'),(37,'Canada'),(38,'Cap-vert'),(39,'Îles Caïmanes'),(40,'République Centrafricaine'),(41,'Sri Lanka'),(42,'Tchad'),(43,'Chili'),(44,'Chine'),(45,'Taïwan'),(46,'Île Christmas'),(47,'Îles Cocos (Keeling)'),(48,'Colombie'),(49,'Comores'),(50,'Mayotte'),(51,'République du Congo'),(52,'République Démocratique du Congo'),(53,'Îles Cook'),(54,'Costa Rica'),(55,'Croatie'),(56,'Cuba'),(57,'Chypre'),(58,'République Tchèque'),(59,'Bénin'),(60,'Danemark'),(61,'Dominique'),(62,'République Dominicaine'),(63,'Équateur'),(64,'El Salvador'),(65,'Guinée Équatoriale'),(66,'Éthiopie'),(67,'Érythrée'),(68,'Estonie'),(69,'Îles Féroé'),(70,'Îles (malvinas) Falkland'),(71,'Géorgie du Sud et les Îles Sandwich du Sud'),(72,'Fidji'),(73,'Finlande'),(74,'Îles Åland'),(75,'France'),(76,'Guyane Française'),(77,'Polynésie Française'),(78,'Terres Australes Françaises'),(79,'Djibouti'),(80,'Gabon'),(81,'Géorgie'),(82,'Gambie'),(83,'Territoire Palestinien Occupé'),(84,'Allemagne'),(85,'Ghana'),(86,'Gibraltar'),(87,'Kiribati'),(88,'Grèce'),(89,'Groenland'),(90,'Grenade'),(91,'Guadeloupe'),(92,'Guam'),(93,'Guatemala'),(94,'Guinée'),(95,'Guyana'),(96,'Haïti'),(97,'Îles Heard et Mcdonald'),(98,'Saint-Siège (état de la Cité du Vatican)'),(99,'Honduras'),(100,'Hong-Kong'),(101,'Hongrie'),(102,'Islande'),(103,'Inde'),(104,'Indonésie'),(105,'République Islamique d\'Iran'),(106,'Iraq'),(107,'Irlande'),(108,'Israël'),(109,'Italie'),(110,'Côte d\'Ivoire'),(111,'Jamaïque'),(112,'Japon'),(113,'Kazakhstan'),(114,'Jordanie'),(115,'Kenya'),(116,'République Populaire Démocratique de Corée'),(117,'République de Corée'),(118,'Koweït'),(119,'Kirghizistan'),(120,'République Démocratique Populaire Lao'),(121,'Liban'),(122,'Lesotho'),(123,'Lettonie'),(124,'Libéria'),(125,'Jamahiriya Arabe Libyenne'),(126,'Liechtenstein'),(127,'Lituanie'),(128,'Luxembourg'),(129,'Macao'),(130,'Madagascar'),(131,'Malawi'),(132,'Malaisie'),(133,'Maldives'),(134,'Mali'),(135,'Malte'),(136,'Martinique'),(137,'Mauritanie'),(138,'Maurice'),(139,'Mexique'),(140,'Monaco'),(141,'Mongolie'),(142,'République de Moldova'),(143,'Montserrat'),(144,'Maroc'),(145,'Mozambique'),(146,'Oman'),(147,'Namibie'),(148,'Nauru'),(149,'Népal'),(150,'Pays-Bas'),(151,'Antilles Néerlandaises'),(152,'Aruba'),(153,'Nouvelle-Calédonie'),(154,'Vanuatu'),(155,'Nouvelle-Zélande'),(156,'Nicaragua'),(157,'Niger'),(158,'Nigéria'),(159,'Niué'),(160,'Île Norfolk'),(161,'Norvège'),(162,'Îles Mariannes du Nord'),(163,'Îles Mineures Éloignées des États-Unis'),(164,'États Fédérés de Micronésie'),(165,'Îles Marshall'),(166,'Palaos'),(167,'Pakistan'),(168,'Panama'),(169,'Papouasie-Nouvelle-Guinée'),(170,'Paraguay'),(171,'Pérou'),(172,'Philippines'),(173,'Pitcairn'),(174,'Pologne'),(175,'Portugal'),(176,'Guinée-Bissau'),(177,'Timor-Leste'),(178,'Porto Rico'),(179,'Qatar'),(180,'Réunion'),(181,'Roumanie'),(182,'Fédération de Russie'),(183,'Rwanda'),(184,'Sainte-Hélène'),(185,'Saint-Kitts-et-Nevis'),(186,'Anguilla'),(187,'Sainte-Lucie'),(188,'Saint-Pierre-et-Miquelon'),(189,'Saint-Vincent-et-les Grenadines'),(190,'Saint-Marin'),(191,'Sao Tomé-et-Principe'),(192,'Arabie Saoudite'),(193,'Sénégal'),(194,'Seychelles'),(195,'Sierra Leone'),(196,'Singapour'),(197,'Slovaquie'),(198,'Viet Nam'),(199,'Slovénie'),(200,'Somalie'),(201,'Afrique du Sud'),(202,'Zimbabwe'),(203,'Espagne'),(204,'Sahara Occidental'),(205,'Soudan'),(206,'Suriname'),(207,'Svalbard etÎle Jan Mayen'),(208,'Swaziland'),(209,'Suède'),(210,'Suisse'),(211,'République Arabe Syrienne'),(212,'Tadjikistan'),(213,'Thaïlande'),(214,'Togo'),(215,'Tokelau'),(216,'Tonga'),(217,'Trinité-et-Tobago'),(218,'Émirats Arabes Unis'),(219,'Tunisie'),(220,'Turquie'),(221,'Turkménistan'),(222,'Îles Turks et Caïques'),(223,'Tuvalu'),(224,'Ouganda'),(225,'Ukraine'),(226,'L\'ex-République Yougoslave de Macédoine'),(227,'Égypte'),(228,'Royaume-Uni'),(229,'Île de Man'),(230,'République-Unie de Tanzanie'),(231,'États-Unis'),(232,'Îles Vierges des États-Unis'),(233,'Burkina Faso'),(234,'Uruguay'),(235,'Ouzbékistan'),(236,'Venezuela'),(237,'Wallis et Futuna'),(238,'Samoa'),(239,'Yémen'),(240,'Serbie-et-Monténégro'),(241,'Zambie');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grapeVariety`
--

DROP TABLE IF EXISTS `grapeVariety`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grapeVariety` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grapeVariety`
--

LOCK TABLES `grapeVariety` WRITE;
/*!40000 ALTER TABLE `grapeVariety` DISABLE KEYS */;
INSERT INTO `grapeVariety` VALUES (1,'cabernet-franc noir'),(2,'cabernet-sauvignon noir'),(3,'carignan noir'),(4,'chardonnay blanc'),(5,'chenin blanc'),(6,'gamay noir'),(7,'gewurztraminer noir'),(8,'gewurztraminer blanc'),(9,'gewurztraminer rosé'),(10,'grenache noir'),(11,'merlot noir'),(12,'muscat blanc'),(13,'muscat noir'),(14,'pinot noir'),(15,'riesling blanc'),(16,'sauvignon blanc'),(17,'syrah noir'),(18,'ugni blanc'),(19,'viognier blanc'),(20,'pinot blanc');
/*!40000 ALTER TABLE `grapeVariety` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `region` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` VALUES (1,'champagne'),(2,'bourgogne'),(4,'alsace'),(5,'beaujolais'),(6,'savoie'),(7,'vallée du rhône'),(8,'provence'),(9,'corse'),(10,'languedoc roussillon'),(11,'sud-ouest'),(12,'bordelais'),(13,'vallée de la loire'),(14,'jura');
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (1,'sec'),(2,'moelleux'),(3,'liquoreux'),(4,'pétillant');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` blob,
  `dateOfBirth` date NOT NULL,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin','admin@admin.fr','admin',NULL,'1989-10-09','admin'),(2,'user','user','user@user.fr','user',NULL,'1989-10-09','user');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_has_wine`
--

DROP TABLE IF EXISTS `user_has_wine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_has_wine` (
  `user_id` int NOT NULL,
  `wine_id` int NOT NULL,
  PRIMARY KEY (`user_id`,`wine_id`),
  KEY `fk_user_has_wine_wine1_idx` (`wine_id`),
  KEY `fk_user_has_wine_user_idx` (`user_id`),
  CONSTRAINT `fk_user_has_wine_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_user_has_wine_wine1` FOREIGN KEY (`wine_id`) REFERENCES `wine` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_has_wine`
--

LOCK TABLES `user_has_wine` WRITE;
/*!40000 ALTER TABLE `user_has_wine` DISABLE KEYS */;
INSERT INTO `user_has_wine` VALUES (1,2),(1,3),(1,5),(1,12),(1,13),(1,14);
/*!40000 ALTER TABLE `user_has_wine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wine`
--

DROP TABLE IF EXISTS `wine`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wine` (
  `id` int NOT NULL AUTO_INCREMENT,
  `domaine` varchar(255) NOT NULL,
  `description` longtext,
  `comment` longtext,
  `rank` float DEFAULT NULL,
  `price` float DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `value` float DEFAULT NULL,
  `cellarLocation` varchar(45) DEFAULT NULL,
  `picture` blob,
  `drinkBefore` int DEFAULT NULL,
  `vintage` int NOT NULL,
  `purchaseDate` date DEFAULT NULL,
  `color_id` int NOT NULL,
  `country_id` int NOT NULL,
  `region_id` int NOT NULL,
  `appellation_id` int NOT NULL,
  `type_id` int NOT NULL,
  PRIMARY KEY (`id`,`color_id`,`country_id`,`region_id`,`appellation_id`,`type_id`),
  KEY `fk_wine_color1_idx` (`color_id`),
  KEY `fk_wine_country1_idx` (`country_id`),
  KEY `fk_wine_region1_idx` (`region_id`),
  KEY `fk_wine_appellation1_idx` (`appellation_id`),
  KEY `fk_wine_type1_idx` (`type_id`),
  CONSTRAINT `fk_wine_appellation1` FOREIGN KEY (`appellation_id`) REFERENCES `appellation` (`id`),
  CONSTRAINT `fk_wine_color1` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  CONSTRAINT `fk_wine_country1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`),
  CONSTRAINT `fk_wine_region1` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`),
  CONSTRAINT `fk_wine_type1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wine`
--

LOCK TABLES `wine` WRITE;
/*!40000 ALTER TABLE `wine` DISABLE KEYS */;
INSERT INTO `wine` VALUES (2,'domaine bergeron','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. ','Lorem Ipsum is therefore always free ',3,7.5,6,10,'A-24',NULL,2024,2014,'2018-01-28',1,75,5,24,1),(3,'clos saint apolline','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. ','Lorem Ipsum is therefore always free ',5,15,3,20,'B-10',NULL,2030,2015,'2018-01-28',2,75,4,18,1),(5,'château giscours','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. ','Lorem Ipsum is therefore always free ',5,13,12,30,'C-10',NULL,2026,2006,'2018-01-28',1,75,12,3,1),(12,'château cantenac brown','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. ','Lorem Ipsum is therefore always free ',3,4.3,1,10,'D-01',NULL,2030,2010,'2018-01-28',1,75,12,3,1),(13,'château la lagune','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. ','Lorem Ipsum is therefore always free ',4,7.1,2,12,'D-02',NULL,2025,2012,'2018-01-28',3,75,12,4,1),(14,'château duhars milon','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. ','Lorem Ipsum is therefore always free ',5,9,20,15,'D-03',NULL,2035,2019,'2018-01-28',1,75,12,8,1);
/*!40000 ALTER TABLE `wine` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wine_has_grapeVariety`
--

DROP TABLE IF EXISTS `wine_has_grapeVariety`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wine_has_grapeVariety` (
  `wine_id` int NOT NULL,
  `grapeVariety_id` int NOT NULL,
  PRIMARY KEY (`wine_id`,`grapeVariety_id`),
  KEY `fk_wine_has_grapeVariety_grapeVariety1_idx` (`grapeVariety_id`),
  KEY `fk_wine_has_grapeVariety_wine1_idx` (`wine_id`),
  CONSTRAINT `fk_wine_has_grapeVariety_grapeVariety1` FOREIGN KEY (`grapeVariety_id`) REFERENCES `grapeVariety` (`id`),
  CONSTRAINT `fk_wine_has_grapeVariety_wine1` FOREIGN KEY (`wine_id`) REFERENCES `wine` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wine_has_grapeVariety`
--

LOCK TABLES `wine_has_grapeVariety` WRITE;
/*!40000 ALTER TABLE `wine_has_grapeVariety` DISABLE KEYS */;
INSERT INTO `wine_has_grapeVariety` VALUES (2,6),(2,7),(3,12),(12,12),(14,12),(5,14),(13,14),(14,18),(13,20);
/*!40000 ALTER TABLE `wine_has_grapeVariety` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wine_has_winePairing`
--

DROP TABLE IF EXISTS `wine_has_winePairing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `wine_has_winePairing` (
  `wine_id` int NOT NULL,
  `winePairing_id` int NOT NULL,
  PRIMARY KEY (`wine_id`,`winePairing_id`),
  KEY `fk_wine_has_winePairing_winePairing1_idx` (`winePairing_id`),
  KEY `fk_wine_has_winePairing_wine1_idx` (`wine_id`),
  CONSTRAINT `fk_wine_has_winePairing_wine1` FOREIGN KEY (`wine_id`) REFERENCES `wine` (`id`),
  CONSTRAINT `fk_wine_has_winePairing_winePairing1` FOREIGN KEY (`winePairing_id`) REFERENCES `winePairing` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wine_has_winePairing`
--

LOCK TABLES `wine_has_winePairing` WRITE;
/*!40000 ALTER TABLE `wine_has_winePairing` DISABLE KEYS */;
INSERT INTO `wine_has_winePairing` VALUES (3,1),(3,2),(5,3),(12,4),(12,5),(12,6),(2,7),(13,7),(13,8);
/*!40000 ALTER TABLE `wine_has_winePairing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `winePairing`
--

DROP TABLE IF EXISTS `winePairing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `winePairing` (
  `id` int NOT NULL AUTO_INCREMENT,
  `label` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `winePairing`
--

LOCK TABLES `winePairing` WRITE;
/*!40000 ALTER TABLE `winePairing` DISABLE KEYS */;
INSERT INTO `winePairing` VALUES (1,'charcuterie'),(2,'viande rouge'),(3,'viande blanche'),(4,'gibier'),(5,'poisson'),(6,'fromage'),(7,'chocolat'),(8,'dessert fruité');
/*!40000 ALTER TABLE `winePairing` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-08 11:29:41
