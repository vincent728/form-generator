-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 18, 2013 at 01:41 PM
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
-- Table structure for table `amenities`
--

CREATE TABLE IF NOT EXISTS `amenities` (
  `amenity_id` int(11) NOT NULL AUTO_INCREMENT,
  `amenity_name` varchar(45) NOT NULL,
  PRIMARY KEY (`amenity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`amenity_id`, `amenity_name`) VALUES
(1, 'Air conditioning'),
(2, 'Cold Pantry'),
(3, 'Electricity Included in rent'),
(4, 'Furnished (Fully)');

-- --------------------------------------------------------

--
-- Table structure for table `area_tbl`
--

CREATE TABLE IF NOT EXISTS `area_tbl` (
  `area_id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(250) NOT NULL,
  PRIMARY KEY (`area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `area_tbl`
--

INSERT INTO `area_tbl` (`area_id`, `area_name`) VALUES
(1, 'Arusha'),
(2, 'Mwanza'),
(3, 'Kigoma'),
(4, 'Dar es salaam'),
(5, 'Tanga'),
(6, 'Mtwara'),
(7, 'Zanzibar'),
(8, 'Dodoma'),
(9, 'Ruvuma'),
(10, 'Tabora'),
(11, 'Singida'),
(12, 'Shinyanga'),
(13, 'Iringa'),
(14, 'Rukwa'),
(15, 'Kilimanjaro'),
(16, 'Lindi');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(250) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `subsections_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cat_id`),
  KEY `fk_categories_section_tbl_idx` (`section_id`),
  KEY `fk_categories_subsections1_idx` (`subsections_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `section_id`, `subsections_id`) VALUES
(6, 'Commercial Farms', 1, 1),
(7, 'Fertilizers and pesticides', 1, 1),
(8, 'Irrigation', 1, 1),
(9, 'Camping & outdoors', 6, NULL),
(10, 'For kids  & maternity', 6, NULL),
(11, 'business consultant', 1, 4),
(12, 'Banks in Tanzania', 1, 2),
(13, 'Financial Planners', 1, 2),
(14, 'Distributors & Importers', 1, 3),
(15, 'Work uniform Supply', 1, 3),
(16, 'Hospitality equipment &suoply', 1, 3),
(17, 'Office supply and stationary', 1, 3),
(18, 'Apartments in Dar es salaam &Tanzania', 5, 5),
(19, 'Homes/houses', 5, 6);

-- --------------------------------------------------------

--
-- Table structure for table `datatest`
--

CREATE TABLE IF NOT EXISTS `datatest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `shortpromo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forms_titles`
--

CREATE TABLE IF NOT EXISTS `forms_titles` (
  `form_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  PRIMARY KEY (`form_id`),
  UNIQUE KEY `form_id_UNIQUE` (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `input_tip` varchar(250) DEFAULT NULL,
  `sections_without_subsections` varchar(45) DEFAULT NULL,
  `displayOrder` int(11) DEFAULT '1',
  KEY `fk_form_tbl_input_type_tbl1_idx` (`input_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form_tbl`
--

INSERT INTO `form_tbl` (`no_input`, `input_type_id`, `category_id`, `form_label`, `input_tip`, `sections_without_subsections`, `displayOrder`) VALUES
(1, 55, '10', '', '', '', 1),
(1, 56, '10', '', '', '', 1),
(2, 57, '10', '', '', '', 1),
(1, 61, '10', '', '', '', 1),
(1, 62, '10', '', '', '', 1),
(1, 65, '10', '', '', '', 1),
(1, 17, '13', '', '', '2', 1),
(1, 63, '13', '', '', '2', 1),
(1, 64, '13', '', '', '2', 1),
(1, 66, '13', 'Bei ya nyumba', '', '2', 1);

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
  `fieldtypename` varchar(45) NOT NULL,
  `column_id` varchar(45) DEFAULT NULL,
  `display_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`input_id`),
  UNIQUE KEY `input_id_UNIQUE` (`input_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=67 ;

--
-- Dumping data for table `input_type_tbl`
--

INSERT INTO `input_type_tbl` (`input_id`, `input_name`, `input_type`, `draws_from`, `max_no_inputs`, `fieldtypename`, `column_id`, `display_id`) VALUES
(1, 'full name', 'fullname_input', NULL, '1', '', NULL, NULL),
(2, 'Last Name', 'lastname', '', '1', '', NULL, NULL),
(3, 'public phone#', 'public_phone', NULL, '1', '', NULL, NULL),
(4, 'Primary phone #', 'primaryphone', NULL, '1', '', NULL, NULL),
(5, 'events', 'select', NULL, '2', '', NULL, NULL),
(6, 'Fax#', 'fax', NULL, '1', '', NULL, NULL),
(7, 'Other public phone#', 'otherphone', NULL, '1', '', NULL, NULL),
(8, 'public email', 'contact_email', NULL, '1', '', NULL, NULL),
(9, 'Short promo', 'Textarea', NULL, '1', '', NULL, NULL),
(11, 'location directions', 'location', NULL, '1', '', NULL, NULL),
(12, 'Websites', 'website', NULL, '1', '', NULL, NULL),
(13, 'file', 'file', NULL, '2', '', NULL, NULL),
(14, 'Images', 'images', NULL, '8', '', NULL, NULL),
(15, 'confirm email', 'confirmemail', NULL, '1', '', NULL, NULL),
(16, 'Contact First Name', 'contactfirstname', NULL, '1', '', NULL, NULL),
(17, 'Contact Last Name', 'contactlastname', NULL, '1', '', NULL, NULL),
(18, 'Second Contact First Name', 'secondcontactfirstname', NULL, '1', '', NULL, NULL),
(19, 'Second Contact Last Name', 'secondcontactlastname', NULL, '1', '', NULL, NULL),
(20, 'Contact phone', 'contactphone', NULL, '1', '', NULL, NULL),
(21, 'Contact Altenate Phone', 'contactaltenatephone', NULL, '1', '', NULL, NULL),
(22, 'Second Contact  Altenate phone', 'secondcontactaltenatephone', NULL, '1', '', NULL, NULL),
(23, 'Contact email', 'contactemail', NULL, '2', '', NULL, NULL),
(24, 'Second contact email', 'secondcontactemail', NULL, '2', '', NULL, NULL),
(26, 'Listing Title', 'listingtitle', NULL, '1', '', NULL, NULL),
(27, 'Listing Copy', 'listingcopy', NULL, '1', '', NULL, NULL),
(28, 'Event Name', 'eventname', NULL, '1', '', NULL, NULL),
(29, 'Event Start Date', 'eventstartdate', NULL, '1', '', NULL, NULL),
(30, 'Event End Date', 'eventsenddate', NULL, '1', '', NULL, NULL),
(31, 'Event Start Time', 'eventstarttime', NULL, '1', '', NULL, NULL),
(32, 'Event End Time', 'eventendtime', NULL, '1', '', NULL, NULL),
(33, 'Event Description', 'eventdescription', NULL, '1', '', NULL, NULL),
(34, 'Documents i will upload is', 'docsupload', NULL, '1', '', NULL, NULL),
(35, 'Descriptive Title', 'descriptivetitle', NULL, '1', '', NULL, NULL),
(36, 'Price', 'price', NULL, '1', '', NULL, NULL),
(39, 'Square Feet/Metres', 'squarefeetmetres', NULL, '1', '', NULL, NULL),
(43, 'Restaurant  Name', 'restaurantname', NULL, '1', '', NULL, NULL),
(44, 'Cusine Type', 'cuisinetype', NULL, '1', '', NULL, NULL),
(45, 'Year', 'year', NULL, '1', '', NULL, NULL),
(46, 'Make', 'make', NULL, '1', '', NULL, NULL),
(47, 'Model', 'model', NULL, '1', '', NULL, NULL),
(48, 'Kilometers', 'kilometers', NULL, '1', '', NULL, NULL),
(49, 'Four Wheel Drive', 'fourwheeldrive', NULL, '1', '', NULL, NULL),
(50, 'Transmission', 'transimission', NULL, '1', '', NULL, NULL),
(54, 'Price list', 'textinput', NULL, '2', 'Pricelist', NULL, NULL),
(55, 'my test input', 'textarea', NULL, '1', 'mytestinput', NULL, NULL),
(56, 'my test checkbox', 'checkbox', NULL, '1', 'mytestcheckbox', NULL, NULL),
(57, 'Documents', 'file', NULL, '2', 'Documents', NULL, NULL),
(60, 'Descriptive Title', 'select', 'area2', '2', 'DescriptiveTitle', 'areaname', 'area_id'),
(61, 'Area', 'select', 'Area_tbl', '1', 'Area', 'area_id', 'area_name'),
(62, 'Amenities', 'select', 'amenities', '1', 'Amenities', 'amenity_id', 'amenity_name'),
(63, 'Start Date', 'dateinput', '', '1', 'StartDate', '', ''),
(64, 'End Date', 'dateinput', '', '1', 'EndDate', '', ''),
(65, 'Term', 'select', 'term', '1', 'Term', 'term_id', 'term_description'),
(66, 'Price', 'price', '', '1', 'Price', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `make`
--

CREATE TABLE IF NOT EXISTS `make` (
  `make_id` int(11) NOT NULL AUTO_INCREMENT,
  `make_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`make_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `repeatevents`
--

CREATE TABLE IF NOT EXISTS `repeatevents` (
  `repeat_id` int(11) NOT NULL AUTO_INCREMENT,
  `events` varchar(45) NOT NULL,
  PRIMARY KEY (`repeat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `repeatevents`
--

INSERT INTO `repeatevents` (`repeat_id`, `events`) VALUES
(1, 'Weekly'),
(2, 'bi-weekly'),
(3, 'repeat monthly'),
(4, 'Repeats Weekly or Bi-weekly on');

-- --------------------------------------------------------

--
-- Table structure for table `section_tbl`
--

CREATE TABLE IF NOT EXISTS `section_tbl` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(250) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `section_tbl`
--

INSERT INTO `section_tbl` (`section_id`, `section_name`) VALUES
(1, 'Tanzania business directory'),
(2, 'Movies,dining,Arts &entertainement directory'),
(3, 'Travel &tourism directory'),
(4, 'Tanzania events calendar'),
(5, 'Tanzania real estate'),
(6, 'Steal deals &Classfields');

-- --------------------------------------------------------

--
-- Table structure for table `subsections`
--

CREATE TABLE IF NOT EXISTS `subsections` (
  `subsections_id` int(11) NOT NULL AUTO_INCREMENT,
  `subsections` varchar(45) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`subsections_id`),
  KEY `fk_subsections_section_tbl1_idx` (`section_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `subsections`
--

INSERT INTO `subsections` (`subsections_id`, `subsections`, `section_id`) VALUES
(1, 'Agribusiness', 1),
(2, 'Banking,Finance&insurance', 1),
(3, 'Business equipment & Supply', 1),
(4, 'Business services', 1),
(5, 'Tanzania house rentals', 5),
(6, 'Homes&property fo resale', 5);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE IF NOT EXISTS `term` (
  `term_id` int(11) NOT NULL AUTO_INCREMENT,
  `term_description` varchar(45) NOT NULL,
  PRIMARY KEY (`term_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`term_id`, `term_description`) VALUES
(1, 'Yearly'),
(2, '6 months');

-- --------------------------------------------------------

--
-- Table structure for table `transimission`
--

CREATE TABLE IF NOT EXISTS `transimission` (
  `transimission_id` int(11) NOT NULL AUTO_INCREMENT,
  `transimission_type` varchar(45) NOT NULL,
  PRIMARY KEY (`transimission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `validation_rules_handler_tbl`
--

CREATE TABLE IF NOT EXISTS `validation_rules_handler_tbl` (
  `rule_id` int(11) NOT NULL AUTO_INCREMENT,
  `input_type_id` int(11) NOT NULL,
  `rule_name` varchar(45) NOT NULL,
  KEY `fk_validation_rules_tbl_has_input_type_tbl_input_type_tbl1_idx` (`input_type_id`),
  KEY `fk_validation_rules_tbl_has_input_type_tbl_validation_rules_idx` (`rule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `validation_rules_handler_tbl`
--

INSERT INTO `validation_rules_handler_tbl` (`rule_id`, `input_type_id`, `rule_name`) VALUES
(1, 54, 'required'),
(2, 54, 'decimal'),
(3, 54, 'integer'),
(4, 54, 'numeric'),
(5, 55, 'required'),
(6, 55, 'valid_email'),
(7, 56, 'required'),
(8, 57, 'required'),
(9, 60, 'required'),
(10, 61, 'required'),
(11, 62, 'required'),
(12, 63, 'required'),
(13, 64, 'required'),
(14, 65, 'required'),
(15, 66, 'required'),
(16, 66, 'integer');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_categories_section_tbl` FOREIGN KEY (`section_id`) REFERENCES `section_tbl` (`section_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_categories_subsections1` FOREIGN KEY (`subsections_id`) REFERENCES `subsections` (`subsections_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
-- Constraints for table `subsections`
--
ALTER TABLE `subsections`
  ADD CONSTRAINT `fk_subsections_section_tbl1` FOREIGN KEY (`section_id`) REFERENCES `section_tbl` (`section_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `validation_rules_handler_tbl`
--
ALTER TABLE `validation_rules_handler_tbl`
  ADD CONSTRAINT `fk_validation_rules_tbl_has_input_type_tbl_input_type_tbl1` FOREIGN KEY (`input_type_id`) REFERENCES `input_type_tbl` (`input_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
