-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 20, 2013 at 02:26 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

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
(19, 'Homes/houses', 5, 6),
(20, 'Airlines in Tanzania', 3, 7),
(21, 'Beach Resorts & Lodge', 3, 7),
(24, 'House hold cooks', 7, 9),
(25, 'Drivers', 7, 9),
(26, 'Gardeners', 7, 9),
(27, 'Arts & Cultural', 4, NULL),
(28, 'Bar/Pub Entertanment', 4, NULL),
(29, 'Dance & Party', 4, NULL),
(30, 'Business analyst', 7, 10),
(31, 'Engineering', 7, 10);

-- --------------------------------------------------------

--
-- Table structure for table `cusine_type`
--

CREATE TABLE IF NOT EXISTS `cusine_type` (
  `cusinetype_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`cusinetype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `cusine_type`
--

INSERT INTO `cusine_type` (`cusinetype_id`, `type`) VALUES
(1, 'Burgers'),
(2, 'Breakfast'),
(3, 'Carribean'),
(4, 'Ethiopian'),
(5, 'Chinese'),
(6, 'Cafe/Coffee house');

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
-- Table structure for table `documenttype`
--

CREATE TABLE IF NOT EXISTS `documenttype` (
  `documentType_id` int(11) NOT NULL AUTO_INCREMENT,
  `documentType` varchar(45) NOT NULL,
  PRIMARY KEY (`documentType_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `documenttype`
--

INSERT INTO `documenttype` (`documentType_id`, `documentType`) VALUES
(1, 'Flyer'),
(2, 'Banner');

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
(1, 75, '20', '', 'Assume the customer is not familiar with your location or street. Provide clear, concise and descriptive driving directions.', '7', 9),
(1, 76, '20', '', '', '7', 2),
(1, 77, '20', '', 'Although email is not a required field, we strongly recommend you provide one, but only if it will be checked at least 3 times a week.', '7', 5),
(1, 86, '20', '', '', '7', 1),
(1, 87, '20', '', '', '7', 3),
(2, 88, '20', '', '', '7', 4),
(1, 89, '20', '', '', '7', 6),
(1, 90, '20', '', '', '7', 10),
(1, 118, '20', ' *Area', '(Choose all that apply)\r\nTo multi-select, hold the “Ctrl” key and click each option desired', '7', 7),
(1, 120, '20', '', '', '7', 2),
(1, 75, '29', '', 'Assume the customer is not familiar with your location or street. Provide clear, concise and descriptive driving directions.', '', 9),
(1, 76, '29', '', '', '', 7),
(1, 77, '29', '', 'Although email is not a required field, we strongly recommend you provide one, but only if it will be checked at least 3 times a week.', '', 8),
(1, 90, '29', '', '', '', 9),
(1, 112, '29', '', '', '', 12),
(1, 113, '29', '', '', '', 1),
(1, 114, '29', '', '', '', 2),
(1, 115, '29', '', '', '', 3),
(1, 117, '29', '', '', '', 10),
(1, 118, '29', '*Area', '', '', 8),
(1, 119, '29', '', '', '', 11),
(1, 121, '29', '', '', '', 6),
(1, 122, '29', '', '', '', 4),
(1, 123, '29', '', '', '', 5),
(1, 76, '31', '', '', '10', 11),
(1, 77, '31', '', 'Although email is not a required field, we strongly recommend you provide one, but only if it will be checked at least 3 times a week.', '10', 12),
(2, 79, '31', '', '', '10', 13),
(1, 86, '31', '', '', '10', 1),
(1, 90, '31', '', '', '10', 2),
(1, 101, '31', '', '', '10', 4),
(1, 102, '31', '', '', '10', 5),
(1, 104, '31', '', '', '10', 6),
(1, 105, '31', '', '', '10', 8),
(1, 106, '31', '', '', '10', 10),
(1, 118, '31', '*Area', '(Choose all that apply)\r\nTo multi-select, hold the “Ctrl” key and click each option desired.', '10', 3),
(1, 120, '31', '', 'Please either use the following open Position Description field to type in or copy and paste your resume', '10', 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=124 ;

--
-- Dumping data for table `input_type_tbl`
--

INSERT INTO `input_type_tbl` (`input_id`, `input_name`, `input_type`, `draws_from`, `max_no_inputs`, `fieldtypename`, `column_id`, `display_id`) VALUES
(1, 'full name', 'fullname_input', NULL, '1', '', NULL, NULL),
(2, 'Last Name', 'lastname', '', '1', '', NULL, NULL),
(13, 'file', 'file', NULL, '2', '', NULL, NULL),
(36, 'Price', 'price', NULL, '1', '', NULL, NULL),
(44, 'Cusine Type', 'cuisinetype', NULL, '1', '', NULL, NULL),
(45, 'Year', 'year', NULL, '1', '', NULL, NULL),
(57, 'Documents', 'file', NULL, '2', 'Documents', NULL, NULL),
(61, 'Area', 'select', 'Area_tbl', '1', 'Area', 'area_id', 'area_name'),
(62, 'Amenities', 'select', 'amenities', '1', 'Amenities', 'amenity_id', 'amenity_name'),
(65, 'Term', 'select', 'term', '1', 'Term', 'term_id', 'term_description'),
(69, 'Four Wheel Drive', 'checkbox', '', '1', 'FourWheelDrive', '', ''),
(70, '* Listing  Title', 'textinput', '', '1', '*ListingTitle', '', ''),
(71, '* Listing  Copy', 'textarea', '', '1', '*ListingCopy', '', ''),
(73, '*Bedrooms', 'textinput', '', '1', '*Bedrooms', '', ''),
(74, '*bathrooms', 'textinput', '', '1', '*bathrooms', '', ''),
(75, '*Location/Directions', 'textarea', '', '1', '*Location/Directions', '', ''),
(76, '*Primary Public Phone', 'textinput', '', '1', '*PrimaryPublicPhone', '', ''),
(77, 'Public email', 'textinput', '', '1', 'Publicemail', '', ''),
(78, 'Image', 'file', '', '8', 'Image', '', ''),
(79, '*Contact Email', 'textinput', '', '2', '*ContactEmail', '', ''),
(80, '*Rent', 'price', '', '1', '*Rent', '', ''),
(81, '*Make', 'select', '', '1', '*Make', 'make_id', 'make_type'),
(82, '*Model', 'textinput', '', '1', '*Model', '', ''),
(83, '*Kilometers', 'textinput', '', '1', '*Kilometers', '', ''),
(84, '*Transmission', 'select', 'transimission', '1', '*Transmission', 'transimission_id', 'transimission_type'),
(85, '*Descriptive Title', 'textinput', '', '1', '*DescriptiveTitle', '', ''),
(86, '*Business /Organization Name', 'textinput', '', '1', '*Business/OrganizationName', '', ''),
(87, 'Fax #', 'textinput', '', '1', 'Fax#', '', ''),
(88, 'Other Public Phone #', 'textinput', '', '2', 'OtherPublicPhone#', '', ''),
(89, '*Short Promo Copy', 'textarea', '', '1', '*ShortPromoCopy', '', ''),
(90, 'Website', 'textinput', '', '1', 'Website', '', ''),
(91, '*Contact First Name', 'textinput', '', '1', '*ContactFirstName', '', ''),
(92, '*Contact  Last Name', 'textinput', '', '1', '*ContactLastName', '', ''),
(93, '*Contact  Phone', 'textinput', '', '1', '*ContactPhone', '', ''),
(94, '*Contact  Altenate Phone', 'textinput', '', '1', '*ContactAltenatePhone', '', ''),
(95, '*Second Contact First Name', 'textinput', '', '1', '*SecondContactFirstName', '', ''),
(96, '*Second Contact  Last Name', 'textinput', '', '1', '*SecondContactLastName', '', ''),
(97, '*Second Contact  Phone', 'textinput', '', '1', '*SecondContactPhone', '', ''),
(98, '*Second Contact  Altenate Phone', 'textinput', '', '1', '*SecondContactAltenatePhone', '', ''),
(99, 'Second Contact  Email', 'textinput', '', '1', 'SecondContactEmail', '', ''),
(100, '*Restaurant Name', 'textinput', '', '1', '*RestaurantName', '', ''),
(101, '*Position Title', 'textinput', '', '1', '*PositionTitle', '', ''),
(102, '*Application Deadline', 'dateinput', '', '1', '*ApplicationDeadline', '', ''),
(104, 'Start Date', 'dateinput', '', '1', 'StartDate', '', ''),
(105, 'Position Description Document', 'file', '', '1', 'PositionDescriptionDocument', '', ''),
(106, '*Application Instructions', 'textarea', '', '1', '*ApplicationInstructions', '', ''),
(107, '*NGO Type', 'multiselect', '', '1', '*NGOType', '', ''),
(108, '*Price Ranges', 'multiselect', '', '1', '*PriceRanges', '', ''),
(109, '*Trip Name', 'textinput', '', '1', '*TripName', '', ''),
(110, '*Minimum Price', 'price', '', '1', '*MinimumPrice', '', ''),
(111, '*Expiration Date', 'dateinput', '', '1', '*ExpirationDate', '', ''),
(112, '*Document Upload-JPG,GIF,PNG or PDF only', 'file', '', '1', '*DocumentUpload-JPG,GIF,PNGorPDFonly', '', ''),
(113, '* Event Name', 'textinput', '', '1', '*EventName', '', ''),
(114, '* Event  Start Date', 'dateinput', '', '1', '*EventStartDate', '', ''),
(115, '* Event  End  Date', 'dateinput', '', '1', '*EventEndDate', '', ''),
(117, '* Event  Description', 'textarea', '', '1', '*EventDescription', '', ''),
(118, 'Area Multi select', 'multiselect', 'area_tbl', '1', 'AreaMultiselect', 'area_id', 'area_name'),
(119, 'The Document I will upload is a', 'select', 'documenttype', '1', 'TheDocumentIwilluploadisa', 'documentType_id', 'documentType'),
(120, 'Position Description', 'textarea', '', '1', 'PositionDescription', '', ''),
(121, 'Repeat?', 'repeat', '', '1', 'Repeat?', '', ''),
(122, '* Event  Start Time', 'time', '', '1', '*EventStartTime', '', ''),
(123, '* Event  End Time', 'time', '', '1', '*EventEndTime', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `make`
--

CREATE TABLE IF NOT EXISTS `make` (
  `make_id` int(11) NOT NULL AUTO_INCREMENT,
  `make_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`make_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `make`
--

INSERT INTO `make` (`make_id`, `make_type`) VALUES
(1, 'Toyota'),
(2, 'Suzuki');

-- --------------------------------------------------------

--
-- Table structure for table `ngo_type`
--

CREATE TABLE IF NOT EXISTS `ngo_type` (
  `ngo_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `ngo_name` varchar(45) NOT NULL,
  PRIMARY KEY (`ngo_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `ngo_type`
--

INSERT INTO `ngo_type` (`ngo_type_id`, `ngo_name`) VALUES
(1, 'Agricultural'),
(2, 'Children''s Orgaanizationns'),
(3, 'Economic Development'),
(4, 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `priceranges`
--

CREATE TABLE IF NOT EXISTS `priceranges` (
  `priceranges_id` int(11) NOT NULL AUTO_INCREMENT,
  `range` varchar(45) NOT NULL,
  PRIMARY KEY (`priceranges_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `priceranges`
--

INSERT INTO `priceranges` (`priceranges_id`, `range`) VALUES
(1, 'Budget'),
(2, 'Moderate');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `section_tbl`
--

INSERT INTO `section_tbl` (`section_id`, `section_name`) VALUES
(1, 'Tanzania business directory'),
(2, 'Movies,dining,Arts &entertainement directory'),
(3, 'Travel &tourism directory'),
(4, 'Tanzania events calendar'),
(5, 'Tanzania real estate'),
(6, 'Steal deals &Classfields'),
(7, 'Tanzania Jobs & Employment');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `subsections`
--

INSERT INTO `subsections` (`subsections_id`, `subsections`, `section_id`) VALUES
(1, 'Agribusiness', 1),
(2, 'Banking,Finance&insurance', 1),
(3, 'Business equipment & Supply', 1),
(4, 'Business services', 1),
(5, 'Tanzania house rentals', 5),
(6, 'Homes&property fo resale', 5),
(7, 'Travel & tourism Businesses', 3),
(8, 'Special Travel Offers', 3),
(9, 'Domestic staff', 7),
(10, 'Professional', 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `transimission`
--

INSERT INTO `transimission` (`transimission_id`, `transimission_type`) VALUES
(1, 'Manual'),
(2, 'Auto');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `validation_rules_handler_tbl`
--

INSERT INTO `validation_rules_handler_tbl` (`rule_id`, `input_type_id`, `rule_name`) VALUES
(8, 57, 'required'),
(10, 61, 'required'),
(11, 62, 'required'),
(19, 69, 'required'),
(20, 70, 'required'),
(21, 71, 'required'),
(23, 73, 'required'),
(24, 74, 'required'),
(25, 75, 'required'),
(26, 76, 'required'),
(27, 77, 'valid_email'),
(28, 78, 'required'),
(29, 79, 'required'),
(30, 79, 'valid_email'),
(31, 80, 'required'),
(32, 81, 'required'),
(33, 82, 'required'),
(34, 83, 'required'),
(35, 83, 'is_natural'),
(36, 84, 'required'),
(37, 85, 'required'),
(38, 86, 'required'),
(39, 87, 'required'),
(40, 88, 'required'),
(41, 89, 'required'),
(42, 90, 'required'),
(43, 91, 'required'),
(44, 92, 'required'),
(45, 93, 'required'),
(46, 94, 'required'),
(47, 95, 'required'),
(48, 96, 'required'),
(49, 97, 'is_natural'),
(50, 98, 'is_natural'),
(51, 99, 'valid_email'),
(52, 100, 'required'),
(53, 101, 'required'),
(54, 102, 'required'),
(55, 104, 'numeric'),
(56, 105, 'required'),
(57, 106, 'required'),
(58, 107, 'required'),
(59, 108, 'required'),
(60, 109, 'required'),
(61, 110, 'required'),
(62, 111, 'required'),
(63, 112, 'required'),
(64, 113, 'required'),
(65, 114, 'required'),
(66, 115, 'required'),
(68, 117, 'required'),
(69, 118, 'required'),
(70, 119, 'required'),
(71, 120, 'required'),
(72, 121, 'required'),
(73, 122, 'required'),
(74, 123, 'required');

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
