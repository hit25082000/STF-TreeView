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
CREATE TABLE CONTROLE_VERSAO (
    ID int NOT NULL AUTO_INCREMENT,
    VERSAO DATE UNIQUE NOT NULL,
    PRIMARY KEY (ID)
);
ALTER TABLE controle_versao AUTO_INCREMENT=1001;

CREATE TABLE controle_versao_item (
    ID int NOT NULL AUTO_INCREMENT,
    ID_CONTROLE_VERSAO int NOT NULL,
    SEQUENCIAL int NOT NULL,
    DESCRICAO varchar(255) NOT NULL,
    PRIMARY KEY (ID),
    FOREIGN KEY (ID_CONTROLE_VERSAO) REFERENCES controle_versao(ID)
);

ALTER TABLE controle_versao_item AUTO_INCREMENT=1001;

INSERT INTO `controle_versao` (`VERSAO`) VALUES
('2022-02-10'),
('2022-02-09'),
('2022-02-06'),
('2022-02-05'),
('2022-02-02');

INSERT INTO `controle_versao_item` (`SEQUENCIAL`, `DESCRICAO`, `ID_CONTROLE_VERSAO`) VALUES
(1, 'task1title',1001),
(2, 'task2title',1001),
(3, 'task1title3',1001),
(4, 'task2title4',1004),
(5, 'task1title4',1004),
(6, 'task2title5',1004),
(7, 'desc', 1005),
(8, 'desc', 1001),
(9, 'desc', 1002),
(10, 'desc', 1003);