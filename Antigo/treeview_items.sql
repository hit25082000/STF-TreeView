-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2015 at 11:08 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `treeview_items`
--

CREATE TABLE IF NOT EXISTS `treeview_items` (
`ID` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `text` varchar(200) NOT NULL,
  `parent_ID` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treeview_items`
--

INSERT INTO `treeview_items` (`ID`, `name`, `text`, `parent_ID`) VALUES
(1, 'task1', 'task1title', '0'),
(2, 'task2', 'task2title', '0'),
(3, 'task3', 'task1title3', '0'),
(4, 'task4', 'task2title4', '3'),
(5, 'task5', 'task1title4', '3'),
(6, 'task5', 'task2title5', '5'),
(7, 'task42', 'desc', '2'),
(8, 'task45', 'desc', '2'),
(9, 'task56', 'desc', '1'),
(10, 'task87', 'desc', '5'),
(11, 'task66', 'desc', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `treeview_items`
--
ALTER TABLE `treeview_items`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `treeview_items`
--
ALTER TABLE `treeview_items`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
