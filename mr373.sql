-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2016 at 03:13 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mr373`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventcalendar`
--

DROP TABLE IF EXISTS `eventcalendar`;
CREATE TABLE IF NOT EXISTS `eventcalendar` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(65) NOT NULL,
  `Detail` varchar(255) NOT NULL,
  `eventDate` date DEFAULT NULL,
  `eventStartTime` time DEFAULT NULL,
  `eventEndTime` time DEFAULT NULL,
  `dateAdded` date DEFAULT NULL,
  `BEGIN` varchar(255) DEFAULT NULL,
  `SUMMARY` varchar(255) DEFAULT NULL,
  `LOCATION` varchar(255) DEFAULT NULL,
  `DTSTART` datetime DEFAULT NULL,
  `DTEND` datetime DEFAULT NULL,
  ` X-MICROSOFT-CDO-ALLDAYEVENT` tinyint(1) DEFAULT '0',
  `EventType` varchar(255) DEFAULT NULL,
  `Organization` varchar(255) DEFAULT NULL,
  `SubmitterName` varchar(255) DEFAULT NULL,
  `EventName` varchar(255) DEFAULT NULL,
  `DTSTAMP` datetime DEFAULT NULL,
  `CATEGORIES` varchar(255) DEFAULT NULL,
  `UID` varchar(255) DEFAULT NULL,
  `END` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `SubmitterName` (`SubmitterName`),
  KEY `ID` (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=424 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventcalendar`
--

INSERT INTO `eventcalendar` (`ID`, `Title`, `Detail`, `eventDate`, `eventStartTime`, `eventEndTime`, `dateAdded`, `BEGIN`, `SUMMARY`, `LOCATION`, `DTSTART`, `DTEND`, ` X-MICROSOFT-CDO-ALLDAYEVENT`, `EventType`, `Organization`, `SubmitterName`, `EventName`, `DTSTAMP`, `CATEGORIES`, `UID`, `END`) VALUES
(408, '1', 'detail', '2016-01-01', '15:02:28', '15:02:29', '2016-04-11', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(410, 'rretretertertHEREgdfgfdg', 'hjfj', '2016-04-20', '02:01:03', '02:01:04', '2016-04-13', NULL, NULL, NULL, NULL, NULL, 0, 'test', 'cs', 'raza', NULL, NULL, NULL, NULL, NULL),
(411, '2', 'ebent', '2016-01-01', '15:02:28', '00:00:00', '2016-04-12', NULL, NULL, NULL, NULL, NULL, 0, 'Test', 'CS', '', NULL, NULL, NULL, NULL, NULL),
(412, 'new this one HERE', 'ebent', '2016-01-01', '15:02:28', '15:02:29', '2016-04-12', NULL, NULL, NULL, NULL, NULL, 0, 'Test', 'CS', 'Raza', NULL, NULL, NULL, NULL, NULL),
(413, '45', 'test', '2016-01-01', '15:02:28', '00:00:00', '2016-04-12', NULL, NULL, NULL, NULL, NULL, 0, 'ggsgfg', 'CS', 'rtertert', NULL, NULL, NULL, NULL, NULL),
(422, 'fdfsdf', 'dfsdfsdf', '2016-01-01', '02:02:02', '02:03:04', '2016-05-02', NULL, NULL, NULL, NULL, NULL, 0, 'dsfdsf', 'cs', 'cs490', NULL, NULL, NULL, NULL, NULL),
(423, '123', '123', '2016-01-01', '02:02:02', '02:03:04', '2016-05-02', NULL, NULL, NULL, NULL, NULL, 0, 'dsfdsf', 'cs', 'cs490', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(65) NOT NULL DEFAULT '',
  `password` varchar(65) NOT NULL DEFAULT '',
  `usertype` varchar(11) NOT NULL DEFAULT 'user',
  `email` varchar(255) DEFAULT NULL,
  `subs` varchar(255) DEFAULT 'allsubs',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `usertype`, `email`, `subs`) VALUES
(27, 'cs490', '98f54143ab4e86b28c3afee0f50f2f51cfb2ed38', 'admin', 'adding@gmail.com', 'allsubs'),
(28, 'test', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'user', NULL, 'allsubs'),
(29, 'raza', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'user', '67567567', 'allsubs');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `tag_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(30) NOT NULL,
  `tag_submitter_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`tag_id`),
  UNIQUE KEY `tag_name` (`tag_name`),
  KEY `tag_submitter_id` (`tag_submitter_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_id`, `tag_name`, `tag_submitter_id`) VALUES
(8, 'tag1', NULL),
(9, 'tag2', NULL),
(10, 'tag3', NULL),
(11, '123', NULL),
(12, '456', NULL),
(18, '123456789', 27),
(19, '1234578', 27),
(20, '987', 29),
(21, '654', 29),
(22, '231313', 27),
(23, '8787987', 27),
(24, '554', 27),
(27, '5665465', 29),
(28, '5', 29);

-- --------------------------------------------------------

--
-- Table structure for table `tag_targets`
--

DROP TABLE IF EXISTS `tag_targets`;
CREATE TABLE IF NOT EXISTS `tag_targets` (
  `tag_target_id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `tag_target_name` varchar(30) DEFAULT NULL,
  `tag_target_event_id` int(11) NOT NULL,
  PRIMARY KEY (`tag_target_id`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tag_targets`
--

INSERT INTO `tag_targets` (`tag_target_id`, `tag_id`, `tag_target_name`, `tag_target_event_id`) VALUES
(4, 8, NULL, 409),
(5, 9, NULL, 409),
(6, 10, NULL, 409),
(7, 11, NULL, 408),
(8, 12, NULL, 408),
(11, 18, NULL, 412),
(12, 19, NULL, 412),
(13, 20, NULL, 412),
(14, 21, NULL, 412),
(15, 22, NULL, 408),
(16, 23, NULL, 410),
(17, 24, NULL, 410),
(18, 23, NULL, 410),
(19, 24, NULL, 410),
(20, 27, NULL, 408),
(21, 28, NULL, 408);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`tag_submitter_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tag_targets`
--
ALTER TABLE `tag_targets`
  ADD CONSTRAINT `tag_targets_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`tag_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
