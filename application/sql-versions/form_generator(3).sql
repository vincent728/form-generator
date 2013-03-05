-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 05, 2013 at 05:43 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `form_generator`
--

-- --------------------------------------------------------

--
-- Table structure for table `area_tbl`
--

CREATE TABLE IF NOT EXISTS `area_tbl` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(250) NOT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(250) DEFAULT NULL,
  `section_id` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `fk_categories_section_tbl_idx` (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `section_id`) VALUES
(1, 'Agribusiness', 1),
(2, 'Automative,motorcycle &marine', 1),
(3, 'Bars,Clubs &pubs', 2),
(4, 'Artists&Art galleries in Tanzania', 2),
(5, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `forms_titles`
--

CREATE TABLE IF NOT EXISTS `forms_titles` (
  `form_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  PRIMARY KEY (`form_id`),
  UNIQUE KEY `form_id_UNIQUE` (`form_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=141 ;

-- --------------------------------------------------------

--
-- Table structure for table `form_label_name_tbl`
--

CREATE TABLE IF NOT EXISTS `form_label_name_tbl` (
  `label_name` varchar(250) NOT NULL,
  `input_tip` varchar(250) DEFAULT NULL,
  `input_id` int(11) NOT NULL,
  PRIMARY KEY (`input_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form_label_name_tbl`
--

INSERT INTO `form_label_name_tbl` (`label_name`, `input_tip`, `input_id`) VALUES
('Short promo', 'assume the customer is not familiar with your location or street.Provide clear concise and descriptive driving directions', 1),
('location', 'fills your name here', 2);

-- --------------------------------------------------------

--
-- Table structure for table `form_tbl`
--

CREATE TABLE IF NOT EXISTS `form_tbl` (
  `no_input` int(11) NOT NULL DEFAULT '1',
  `input_type_id` int(11) NOT NULL,
  `category_id` varchar(45) DEFAULT NULL,
  `form_label` varchar(45) DEFAULT NULL,
  `input_tip` varchar(45) DEFAULT NULL,
  KEY `fk_form_tbl_input_type_tbl1_idx` (`input_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form_tbl`
--

INSERT INTO `form_tbl` (`no_input`, `input_type_id`, `category_id`, `form_label`, `input_tip`) VALUES
(1, 1, '3', 'Listing copy', 'tip for the input goes here'),
(1, 1, '4', 'Listing copy', 'tip for the input goes here'),
(5, 4, '3', 'image', 'tip for the input goes here'),
(5, 4, '4', 'image', 'tip for the input goes here');

-- --------------------------------------------------------

--
-- Table structure for table `input_type_tbl`
--

CREATE TABLE IF NOT EXISTS `input_type_tbl` (
  `input_id` int(11) NOT NULL AUTO_INCREMENT,
  `input_name` varchar(250) NOT NULL,
  `input_type` varchar(250) NOT NULL,
  `draws_from` varchar(45) DEFAULT NULL,
  `max_no_inputs` varchar(45) NOT NULL,
  PRIMARY KEY (`input_id`),
  UNIQUE KEY `input_id_UNIQUE` (`input_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `input_type_tbl`
--

INSERT INTO `input_type_tbl` (`input_id`, `input_name`, `input_type`, `draws_from`, `max_no_inputs`) VALUES
(1, 'Short promo', 'Textarea', NULL, '1'),
(2, 'full name', 'input', 'Area table_id', '2'),
(3, 'phone number', 'input', NULL, '3'),
(4, 'Images', 'file', NULL, '8'),
(5, 'files', 'file', NULL, '2'),
(6, 'repeat events?', 'repeat ', NULL, '2');

-- --------------------------------------------------------

--
-- Table structure for table `section_tbl`
--

CREATE TABLE IF NOT EXISTS `section_tbl` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(250) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `section_tbl`
--

INSERT INTO `section_tbl` (`section_id`, `section_name`) VALUES
(1, 'Tanzania business directory'),
(2, 'Movies,dining,Arts &entertainement directory'),
(3, 'Travel &tourism directory'),
(4, 'Tanzania events calendar');

-- --------------------------------------------------------

--
-- Table structure for table `validation_rules_handler_tbl`
--

CREATE TABLE IF NOT EXISTS `validation_rules_handler_tbl` (
  `validation_rules_id` int(11) NOT NULL,
  `input_type_id` int(11) NOT NULL,
  PRIMARY KEY (`validation_rules_id`,`input_type_id`),
  KEY `fk_validation_rules_tbl_has_input_type_tbl_input_type_tbl1_idx` (`input_type_id`),
  KEY `fk_validation_rules_tbl_has_input_type_tbl_validation_rules_idx` (`validation_rules_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `validation_rules_tbl`
--

CREATE TABLE IF NOT EXISTS `validation_rules_tbl` (
  `validation_id` int(11) NOT NULL AUTO_INCREMENT,
  `validation_rule` varchar(250) NOT NULL,
  PRIMARY KEY (`validation_id`),
  UNIQUE KEY `validation_id_UNIQUE` (`validation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `validation_rules_tbl`
--

INSERT INTO `validation_rules_tbl` (`validation_id`, `validation_rule`) VALUES
(1, 'required');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_categories_section_tbl` FOREIGN KEY (`section_id`) REFERENCES `section_tbl` (`section_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `form_label_name_tbl`
--
ALTER TABLE `form_label_name_tbl`
  ADD CONSTRAINT `fk_form_label_name_tbl_input_type_tbl1` FOREIGN KEY (`input_id`) REFERENCES `input_type_tbl` (`input_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `form_tbl`
--
ALTER TABLE `form_tbl`
  ADD CONSTRAINT `fk_form_tbl_input_type_tbl1` FOREIGN KEY (`input_type_id`) REFERENCES `input_type_tbl` (`input_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `validation_rules_handler_tbl`
--
ALTER TABLE `validation_rules_handler_tbl`
  ADD CONSTRAINT `fk_validation_rules_tbl_has_input_type_tbl_input_type_tbl1` FOREIGN KEY (`input_type_id`) REFERENCES `input_type_tbl` (`input_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_validation_rules_tbl_has_input_type_tbl_validation_rules_t1` FOREIGN KEY (`validation_rules_id`) REFERENCES `validation_rules_tbl` (`validation_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
