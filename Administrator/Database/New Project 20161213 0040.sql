-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema decent
--

CREATE DATABASE IF NOT EXISTS decent;
USE decent;

--
-- Definition of table `tblclient`
--

DROP TABLE IF EXISTS `tblclient`;
CREATE TABLE `tblclient` (
  `ClientID` varchar(20) NOT NULL,
  `FName` varchar(50) default NULL,
  `LName` varchar(50) default NULL,
  `BDate` date default NULL,
  `Age` int(11) default NULL,
  `Status` varchar(20) default NULL,
  `Sex` varchar(20) default NULL,
  `EMail` varchar(100) default NULL,
  `Address` varchar(200) default NULL,
  `Mobile` varchar(20) default NULL,
  `Username` varchar(50) default NULL,
  `Password` varchar(50) default NULL,
  `No` bigint(20) NOT NULL auto_increment,
  `Stat` int(11) default NULL,
  PRIMARY KEY  (`ClientID`),
  UNIQUE KEY `No` (`No`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclient`
--

/*!40000 ALTER TABLE `tblclient` DISABLE KEYS */;
INSERT INTO `tblclient` (`ClientID`,`FName`,`LName`,`BDate`,`Age`,`Status`,`Sex`,`EMail`,`Address`,`Mobile`,`Username`,`Password`,`No`,`Stat`) VALUES 
 ('CID001','Marc Jordan','Saladaga','1984-05-28',32,'Single','Male','marcjordan_saladaga@yahoo.com','Purok Palmera, Balangasan Dist','09322310890','7pnlOb4q','NEirTe3c',4,NULL),
 ('CID005','Marc Jordan','Saladaga','1984-05-28',32,'Single','Male','ken@yahoo.com','Purok Palmera, Balangasan Dist','09322310890','Ken','1',6,1);
/*!40000 ALTER TABLE `tblclient` ENABLE KEYS */;


--
-- Definition of table `tblnews`
--

DROP TABLE IF EXISTS `tblnews`;
CREATE TABLE `tblnews` (
  `No` bigint(20) NOT NULL auto_increment,
  `News` varchar(50000) default NULL,
  `Date` date default NULL,
  PRIMARY KEY  (`No`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblnews`
--

/*!40000 ALTER TABLE `tblnews` DISABLE KEYS */;
INSERT INTO `tblnews` (`No`,`News`,`Date`) VALUES 
 (1,'Naay boxing sa buros karong petsa 15 sa Enero sa Plaza Luz.','2017-01-11'),
 (3,'ddddddddddddddddd','2017-01-11'),
 (4,'aaaaaaaaaaaaaaa','2017-01-11');
/*!40000 ALTER TABLE `tblnews` ENABLE KEYS */;


--
-- Definition of table `tblreport`
--

DROP TABLE IF EXISTS `tblreport`;
CREATE TABLE `tblreport` (
  `No` bigint(20) NOT NULL auto_increment,
  `Date` date default NULL,
  `Service` varchar(100) default NULL,
  `Amount` double default NULL,
  `Cashier` varchar(100) default NULL,
  PRIMARY KEY  (`No`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreport`
--

/*!40000 ALTER TABLE `tblreport` DISABLE KEYS */;
INSERT INTO `tblreport` (`No`,`Date`,`Service`,`Amount`,`Cashier`) VALUES 
 (1,'2017-01-10','Ventosa',400,'Administrator'),
 (2,'2017-01-11','Ventosa',400,'Administrator'),
 (3,'2017-01-11','Ventosa',400,'Administrator'),
 (4,'2017-01-11','Ventosa',400,''),
 (5,'2017-01-11','Ventosa',400,'');
/*!40000 ALTER TABLE `tblreport` ENABLE KEYS */;


--
-- Definition of table `tblreservation`
--

DROP TABLE IF EXISTS `tblreservation`;
CREATE TABLE `tblreservation` (
  `ReservationID` varchar(20) NOT NULL,
  `ClientID` varchar(20) default NULL,
  `ServiceID` varchar(20) default NULL,
  `Date` date default NULL,
  `FTime` time default NULL,
  `TTime` time default NULL,
  `Type` varchar(50) default NULL,
  `Status` varchar(20) default NULL,
  PRIMARY KEY  (`ReservationID`),
  KEY `FK_tblreservation` (`ClientID`),
  CONSTRAINT `FK_tblreservation` FOREIGN KEY (`ClientID`) REFERENCES `tblclient` (`ClientID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblreservation`
--

/*!40000 ALTER TABLE `tblreservation` DISABLE KEYS */;
INSERT INTO `tblreservation` (`ReservationID`,`ClientID`,`ServiceID`,`Date`,`FTime`,`TTime`,`Type`,`Status`) VALUES 
 ('RID-0001','CID001','1','2017-01-10','18:00:00','09:00:00','Home Service','Paid'),
 ('RID-0002','CID005','1','2017-01-20','18:00:00','09:30:00','At the Center','Paid'),
 ('RID-0003','CID005','8','2017-01-25','16:00:00','10:00:00','Home Service','Cancelled');
/*!40000 ALTER TABLE `tblreservation` ENABLE KEYS */;


--
-- Definition of table `tblservices`
--

DROP TABLE IF EXISTS `tblservices`;
CREATE TABLE `tblservices` (
  `No` bigint(20) NOT NULL auto_increment,
  `Type` varchar(100) default NULL,
  `Description` varchar(10000) default NULL,
  `Price` double default NULL,
  `Images` varchar(100) default NULL,
  `Duration` varchar(10) default NULL,
  `Category` varchar(50) default NULL,
  PRIMARY KEY  (`No`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblservices`
--

/*!40000 ALTER TABLE `tblservices` DISABLE KEYS */;
INSERT INTO `tblservices` (`No`,`Type`,`Description`,`Price`,`Images`,`Duration`,`Category`) VALUES 
 (1,'Ventosa','Ventosa cupping therapy is an ancient Chinese alternative treatment that uses local suctions on the skin to eliminate stagnation of the blood flow and promote healing for a variety of health conditions such as colds, bronchitis, pneumonia, body pain, swelling and gastrointestinal disorders. It is also used to balance the qi and maintain a healthy physical well being. Dry cupping involves heating the cups inside with flammable substances like paper, alcohol or open flames and quickly placing these warmed cups upside down on the skin. Herbal or medicated oils are sometimes applied to the skin prior to the procedure to easily glide the cups around the meridians and acupoints.As soon as the hot air pressure cools down, it constricts and pulls up the skin, creating a vacuum due to the lack of oxygen.Mechanical and rubber suction pumps can also be alternately used to produce the same vacuum. Generally, cups are left on the skin within five to ten minutes depending on the patient condition.Wet cupping creates a mild suction by applying a heated pump or cup on the skin for three minutes. After the cups are removed, the practitioner performs minor incisions using a cupping scalpel, and then goes back to create a second suction to extract a small amount of blood which can be treated with antibiotics to avoid infection.',400,'Ventosa.jpg','1.5','Regular'),
 (2,'Body Scrub','Body scrubs are popular body treatments aiming at exfoliating and hydrating the skin. An abrasive material (granule) like, for instance, salt, coffee or coconut, mixed with oil or cream is rubbed on the whole body to exfoliate the skin. Once the job is done, the mixture is rinsed off under a thorough shower. Finally, a moisturizer is applied on the body. If part of a package, it can also be the first step to a body wrap or a massage. A scrub rubs away dead cells and sloughs off flakes that make your skin look dull and lackluster. It reveals the fresh cells underneath and leaves the skin glowing, youthful and hydrated. The level of exfoliation depends on the size of the granules: natural granules exfoliate more than synthetic ones. Choose the scrub type according to the sensitivity of your skin. A scrub is not a massage, even though the rubbing on your body is relaxing and encourages the blood circulation. You are usually lying on the massage table draped in a sheet. Only the part the therapist is working on is exposed. Once over, rinse it off without using shower gel, to keep the benefits of the oil. It is fun to make up your own scrub recipe at home.',350,'Body Scrub.jpg','1.5','Regular'),
 (3,'Sauna Bath','In terms of reaping the benefits for your skin, the sauna is better for muscle relaxation and lowering blood pressure whereas the steam room will help with overall detoxification of the bodyâ€”the preference is yours. Saunas use dry heat whereas steam rooms use more moist heat.',430,'Arci-Munoz-2016-Ginebra-San-Miguel-calendar-girl.jpg','1','Regular'),
 (4,'Full Body Massage','session will include work on your back, arms, legs, feet, hands, head, neck, and shoulders. You will not be touched on or near your genitals (male or female) or breasts (female).',400,'19385_997374683614952_279227384473301623_n.jpg','1','Promo'),
 (5,'Eat All you can','Eat while massage is on going',500,'15202772_1321757454523853_398344641167603350_n.jpg','1','Promo'),
 (7,'Body Scrub + 1hr  Body Massage','polish is a spa treatment which exfoliates the skin on yourÂ body leaving it feeling fresh, smooth, moisturised and soft.\r\n',550,'download (1).jpg','1.5','Package'),
 (8,'Body Scrub +  Ventosa','Enjoy Asia natural method of dry suction through the use of Home Spa 2 GoÂ VentosaÂ Hot Cup therapy to relieve muscle pain and tension.\r\n',750,'d.jpg','2','Package');
/*!40000 ALTER TABLE `tblservices` ENABLE KEYS */;


--
-- Definition of table `tbltherapist`
--

DROP TABLE IF EXISTS `tbltherapist`;
CREATE TABLE `tbltherapist` (
  `No` bigint(20) NOT NULL auto_increment,
  `Pix` varchar(100) default NULL,
  `Name` varchar(100) default NULL,
  PRIMARY KEY  (`No`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbltherapist`
--

/*!40000 ALTER TABLE `tbltherapist` DISABLE KEYS */;
INSERT INTO `tbltherapist` (`No`,`Pix`,`Name`) VALUES 
 (2,'JOKER.png','Joker'),
 (3,'FOREST-CAMO-SKULL-1.png','Forest Camo Skull'),
 (4,'Salt-Armour-30.jpg','Salt Armour'),
 (5,'Twisty_LT-700x700.png','Twisty'),
 (6,'Two-Face.jpg','Two Face');
/*!40000 ALTER TABLE `tbltherapist` ENABLE KEYS */;


--
-- Definition of table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE `tbluser` (
  `No` bigint(20) NOT NULL auto_increment,
  `Username` varchar(20) default NULL,
  `Password` varchar(20) default NULL,
  `Name` varchar(100) default NULL,
  `EMail` varchar(100) default NULL,
  `CNo` varchar(20) default NULL,
  `Address` varchar(200) default NULL,
  `Type` varchar(20) default NULL,
  PRIMARY KEY  (`No`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

/*!40000 ALTER TABLE `tbluser` DISABLE KEYS */;
INSERT INTO `tbluser` (`No`,`Username`,`Password`,`Name`,`EMail`,`CNo`,`Address`,`Type`) VALUES 
 (1,'Admin','2','Administrator','admin@gmail.com','09322310890','Pagadian City','Administrator'),
 (3,'Cashier','2','Cashier','cashier@gmail.com','09322310890','Pagadian City','Cashier');
/*!40000 ALTER TABLE `tbluser` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
