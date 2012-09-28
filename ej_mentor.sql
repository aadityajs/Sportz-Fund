-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 11, 2012 at 12:45 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ej_mentor`
--

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_achcoordinator_achiever_relation`
--

CREATE TABLE IF NOT EXISTS `ejmentor_achcoordinator_achiever_relation` (
  `rel_id` int(11) NOT NULL AUTO_INCREMENT,
  `achiever_id` int(11) NOT NULL,
  `coordinator_id` int(11) NOT NULL,
  PRIMARY KEY (`rel_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `ejmentor_achcoordinator_achiever_relation`
--

INSERT INTO `ejmentor_achcoordinator_achiever_relation` (`rel_id`, `achiever_id`, `coordinator_id`) VALUES
(1, 15, 8),
(2, 18, 8),
(3, 19, 8),
(4, 21, 8),
(5, 22, 8),
(6, 23, 8),
(7, 24, 8),
(8, 25, 8),
(9, 26, 8),
(10, 27, 8),
(11, 28, 8),
(12, 30, 8),
(13, 31, 8),
(14, 33, 32);

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_admin`
--

CREATE TABLE IF NOT EXISTS `ejmentor_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_fname` varchar(255) NOT NULL,
  `admin_lname` varchar(255) NOT NULL,
  `admin_address` varchar(255) NOT NULL,
  `admin_city` varchar(255) NOT NULL,
  `admin_state` varchar(255) NOT NULL,
  `admin_zip_code` varchar(255) NOT NULL,
  `admin_street` varchar(255) NOT NULL,
  `admin_phone_no` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ejmentor_admin`
--

INSERT INTO `ejmentor_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_fname`, `admin_lname`, `admin_address`, `admin_city`, `admin_state`, `admin_zip_code`, `admin_street`, `admin_phone_no`, `admin_image`) VALUES
(1, 'admin@ejmentor.com', 'admin123', 'Admin', 'User', 'anywhere', 'california', 'usa', '1234567890', 'some street', '9998784562', '');

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_announcement`
--

CREATE TABLE IF NOT EXISTS `ejmentor_announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `added_by` int(11) NOT NULL,
  `announcement` longtext NOT NULL,
  `announce_date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ejmentor_announcement`
--

INSERT INTO `ejmentor_announcement` (`id`, `added_by`, `announcement`, `announce_date`) VALUES
(1, 5, '0', 0),
(2, 1, 'AdReturns the current time as a Unix timestamp, referenced either to your server''s local time or GMT, based on the "time reference" setting in your config file. If you do not intend to set your master time reference to GMT (which you''ll typically do if you run a site that lets each user set their own timezone settings) there is no benefit to using this function over PHP''s time() Returns the current time as a Unix timestamp, referenced either to your server''s local time or GMT, based on the "time reference" setting in your config file. If you do not intend to set your master time reference to GMT (which you''ll typically do if you run a site that lets each user set their own timezone settings) there is no benefit to using this function over PHP''s time() Returns the current time as a Unix timestamp, referenced either to your server''s local time or GMT, based on the "time reference" setting in your config file. If you do not intend to set your master time reference to GMT (which you''ll typically do if you run a site that lets each user set their own timezone settings) there is no benefit to using this function over PHP''s time() ', 1347353690),
(3, 6, 'ddddddwwbbpl1dddd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_availability`
--

CREATE TABLE IF NOT EXISTS `ejmentor_availability` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mon` varchar(255) NOT NULL DEFAULT 'Y',
  `tue` varchar(255) NOT NULL DEFAULT 'Y',
  `wed` varchar(255) NOT NULL DEFAULT 'Y',
  `thu` varchar(255) NOT NULL DEFAULT 'Y',
  `fri` varchar(255) NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `ejmentor_availability`
--

INSERT INTO `ejmentor_availability` (`id`, `user_id`, `mon`, `tue`, `wed`, `thu`, `fri`) VALUES
(1, 29, 'N', 'Meeting withsomeone at siliguri boys school ', 'Y', 'Meeting withsomeone at siliguri boys school ', 'Y'),
(30, 34, 'Y', 'Meeting withsomeone at siliguri boys school ', 'Meeting withsomeone at siliguri boys school ', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_cms`
--

CREATE TABLE IF NOT EXISTS `ejmentor_cms` (
  `cms_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`cms_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ejmentor_cms`
--

INSERT INTO `ejmentor_cms` (`cms_id`, `page_title`, `content`) VALUES
(1, 'about us', 'lorem ipsum dolor sit amet consectetur.vbcvbvcbvcbdf dsf ds ds '),
(3, 'contribution', '<p style="padding: 10px 0; font: normal 15px/23px Arial, Helvetica, sans-serif;"><strong>Text</strong><br/>Volunteer your time/money!<br/>Link to ej.org<br/>List of Partners/contributors<br/>LTA Logo<br/>Attorney</p>\r\n<p> </p>			 \r\n	<p style="padding: 10px 0;"><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In aliquet pulvinar ipsum sollicitudin porta.</strong> Integer commodo arcu vel eros tristique pulvinar. Maecenas aliquet ipsum quis nunc facilisis auctor. Morbi commodo nibh justo, eu volutpat urna. Etiam ligula mi, cursus sed facilisis sed, mattis sit amet tortor. Nam at urna nisi, vel lacinia sem. Nunc vulputate feugiat orci vitae venenatis. Nulla urna turpis, aliquam nec ornare ut, fermentum vitae lacus. Cras sed gravida orci. Curabitur lacinia, mi sit amet feugiat mattis, nulla quam mollis sem, eget feugiat urna elit quis ante. Cras mattis mollis magna ac commodo.  Integer commodo arcu vel eros tristique pulvinar. Maecenas aliquet ipsum quis nunc facilisis auctor. Morbi commodo nibh justo, eu volutpat urna. Etiam ligula mi, cursus sed facilisis sed, mattis sit amet tortor.</p>ggggggggg      ddddddddddddddd');

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_contact_email`
--

CREATE TABLE IF NOT EXISTS `ejmentor_contact_email` (
  `cont_id` int(11) NOT NULL AUTO_INCREMENT,
  `cont_name` varchar(255) NOT NULL,
  `cont_email` varchar(255) NOT NULL,
  `cont_number` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`cont_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ejmentor_contact_email`
--

INSERT INTO `ejmentor_contact_email` (`cont_id`, `cont_name`, `cont_email`, `cont_number`, `content`) VALUES
(6, 'dsfd', 'dsfdsf@dfdf.dfd', '0', 'dfsdfdsfdsfdsf'),
(7, 'sam', 'sam@gmail.com', '(837) 483-2478324 x79832', 'dsfdshgds hgdsygdshjsd shef isd osdh fdsgf'),
(8, 'ytu', 'yuyts@fdsfdsf.vg', '(345) 555-5555555 x55555', 'dsgfdsf');

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_docs`
--

CREATE TABLE IF NOT EXISTS `ejmentor_docs` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `chapter_id` int(11) NOT NULL,
  `docs` varchar(255) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ejmentor_docs`
--

INSERT INTO `ejmentor_docs` (`doc_id`, `user_id`, `school_id`, `chapter_id`, `docs`) VALUES
(1, 8, 10, 0, 'hghgt1.txt'),
(2, 8, 10, 0, ''),
(3, 8, 10, 0, 'Admin1.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_email_template`
--

CREATE TABLE IF NOT EXISTS `ejmentor_email_template` (
  `template_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `template_content` text NOT NULL,
  PRIMARY KEY (`template_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ejmentor_email_template`
--

INSERT INTO `ejmentor_email_template` (`template_id`, `title`, `subject`, `template_content`) VALUES
(1, 'template1', 'test subject', '<h2>this is test content.</h2><br />{content}');

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_faculty_mentor_relation`
--

CREATE TABLE IF NOT EXISTS `ejmentor_faculty_mentor_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mentor_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ejmentor_faculty_mentor_relation`
--

INSERT INTO `ejmentor_faculty_mentor_relation` (`id`, `mentor_id`, `faculty_id`) VALUES
(2, 6, 1),
(3, 7, 1),
(4, 10, 1),
(5, 16, 1),
(6, 17, 1),
(7, 29, 1),
(8, 34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_faculty_sponser`
--

CREATE TABLE IF NOT EXISTS `ejmentor_faculty_sponser` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_no` int(15) NOT NULL,
  `best_time_to_call` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `faculty_sponser_nominee` varchar(255) NOT NULL,
  `how_did_u_hear` text NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `activation_code` varchar(255) NOT NULL,
  ` 	temp_password` varchar(255) NOT NULL,
  `is_approved` enum('Y','N') NOT NULL DEFAULT 'N',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `ejmentor_faculty_sponser`
--

INSERT INTO `ejmentor_faculty_sponser` (`user_id`, `fname`, `lname`, `email`, `school`, `address`, `phone_no`, `best_time_to_call`, `username`, `password`, `faculty_sponser_nominee`, `how_did_u_hear`, `account_type`, `activation_code`, ` 	temp_password`, `is_approved`, `is_active`) VALUES
(12, 'Prittam', 'Hubba2', 'kuretwiltshire@hotmail.com', 'r', 'r', 0, '4', 'r3', '0', '', 'r', '', '', '', 'N', 'N'),
(13, 'Prittam', 'Hubba2', 'kuretwiltshire@hotmail.com', 'r', 'r', 0, '4', 'r3', '0', '', 'r', '', '', '', 'N', 'N'),
(14, 'prit', 'hubboo', 'kurtwiltshire@hoetmail.com', 'fe', 'fefe', 0, '1:00am', 'soumendu', '0', 'ddddf', '3', '', '', '', 'N', 'N'),
(16, '', '', '', '', '', 0, '', '', '0', '', '', '', '', '', 'N', 'N'),
(17, '', '', '', '', '', 0, '', '', '0', '', '', '', '', '', 'N', 'N'),
(18, 'Chiranjit', 'G', 'tesyt.unified@gmail.com', 'u', 'u', 0, '1:30am EST', 'u', '0', '44444444444', '4444', '', '', '', 'N', 'N'),
(19, 'Chiranjit', 'G', 'tesyt.unified@gmail.com', 'u', 'u', 0, '1:30am EST', 'u', '0', '44444444444', '4444', '', '', '', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_faq`
--

CREATE TABLE IF NOT EXISTS `ejmentor_faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `questions` text NOT NULL,
  `is_active` enum('Y','N') NOT NULL DEFAULT 'Y',
  `answers` text NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `ejmentor_faq`
--

INSERT INTO `ejmentor_faq` (`faq_id`, `questions`, `is_active`, `answers`) VALUES
(8, 'q3', 'Y', 'a3'),
(10, 'faq1', 'Y', 'ans1'),
(2, 'How do you evaluate each candidate''s skills?', 'Y', 'We conduct a thorough in-person interview with each of our candidates. Our local management are staffed with professionals who carefully probe each candidate''s background and skill set in order to ensure proper fit with our client companies.');

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_mentor_achiever_relation`
--

CREATE TABLE IF NOT EXISTS `ejmentor_mentor_achiever_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mentor_id` int(11) NOT NULL,
  `achiever_id` int(11) NOT NULL,
  `is_approved` enum('N','Y') NOT NULL DEFAULT 'N',
  `mentoring_day` varchar(233) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `ejmentor_mentor_achiever_relation`
--

INSERT INTO `ejmentor_mentor_achiever_relation` (`id`, `mentor_id`, `achiever_id`, `is_approved`, `mentoring_day`) VALUES
(13, 29, 28, 'N', 'Tu,Th'),
(15, 29, 30, 'N', 'Th'),
(16, 29, 31, 'N', 'W'),
(17, 29, 33, 'N', 'M,Tu'),
(22, 34, 15, 'N', 'Tu,W');

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_mentor_mentorschool_relation`
--

CREATE TABLE IF NOT EXISTS `ejmentor_mentor_mentorschool_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mentor_id` int(11) NOT NULL,
  `mentor_school` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ejmentor_mentor_mentorschool_relation`
--

INSERT INTO `ejmentor_mentor_mentorschool_relation` (`id`, `mentor_id`, `mentor_school`) VALUES
(1, 6, 10),
(3, 7, 10),
(4, 29, 10),
(5, 29, 11),
(6, 34, 0),
(7, 34, 10);

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_message`
--

CREATE TABLE IF NOT EXISTS `ejmentor_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` longtext,
  `is_read` enum('N','Y') DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ejmentor_message`
--

INSERT INTO `ejmentor_message` (`id`, `to_id`, `from_id`, `subject`, `message`, `is_read`) VALUES
(1, 28, 28, 'subjectsqs', 'Your Msqsqessage', 'N'),
(2, 29, 28, 'ore', 'gadha', 'N'),
(3, 29, 28, 'Hi', 'This is dummy', 'N'),
(4, 30, 29, 'bbb', 'fefefe', 'N'),
(5, 15, 29, 'bgtre', 'grewt', 'N'),
(6, 15, 29, 'dhut', 'Baje', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_schools`
--

CREATE TABLE IF NOT EXISTS `ejmentor_schools` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` int(11) NOT NULL,
  `school_phone` varchar(50) NOT NULL,
  `added_by` varchar(200) NOT NULL,
  `is_varified` enum('N','Y') NOT NULL DEFAULT 'N',
  `is_active` enum('N','Y') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`school_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED AUTO_INCREMENT=12 ;

--
-- Dumping data for table `ejmentor_schools`
--

INSERT INTO `ejmentor_schools` (`school_id`, `school_name`, `address`, `city`, `state`, `zip`, `school_phone`, `added_by`, `is_varified`, `is_active`) VALUES
(10, 'siliguri boys', 'siliguri', 'siliguri', 'al', 555555, '0999999999999', '20', 'N', 'N'),
(11, 'Calcutta Boys', 'kolkata', 'kolkata', 'West bengal', 700048, '1234567890', '1', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_security_answers`
--

CREATE TABLE IF NOT EXISTS `ejmentor_security_answers` (
  `ans_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `answers` text,
  PRIMARY KEY (`ans_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `ejmentor_security_answers`
--

INSERT INTO `ejmentor_security_answers` (`ans_id`, `user_id`, `ques_id`, `answers`) VALUES
(1, 52, 0, 'ff'),
(2, 52, 0, 'ff'),
(3, 52, 0, NULL),
(4, 52, 0, NULL),
(5, 52, 0, NULL),
(6, 52, 0, NULL),
(7, 52, 0, 'vfr'),
(8, 52, 0, NULL),
(9, 52, 0, NULL),
(10, 52, 0, 'bgtrhh'),
(11, 52, 0, 'hhh'),
(12, 52, 2, 'gttr'),
(13, 52, 2, 'jhyt'),
(14, 52, 1, 'dwed'),
(15, 52, 2, 'dwf'),
(16, 52, 1, 'bgtr'),
(17, 52, 2, 'bgfd'),
(18, 51, 1, 'bgfd'),
(19, 51, 2, 'nmj'),
(20, 53, 1, ''),
(21, 53, 2, ''),
(22, 52, 1, 'derp'),
(23, 52, 2, '11111'),
(24, 52, 1, ''),
(25, 52, 2, ''),
(26, 52, 1, ''),
(27, 52, 2, ''),
(28, 52, 1, ''),
(29, 52, 2, ''),
(30, 52, 1, ''),
(31, 52, 2, ''),
(32, 52, 1, ''),
(33, 52, 2, ''),
(34, 52, 1, ''),
(35, 52, 2, ''),
(36, 52, 1, ''),
(37, 52, 2, ''),
(38, 52, 1, ''),
(39, 52, 2, ''),
(40, 52, 1, ''),
(41, 52, 2, ''),
(42, 52, 1, ''),
(43, 52, 2, ''),
(44, 52, 1, ''),
(45, 52, 2, ''),
(46, 52, 1, ''),
(47, 52, 2, ''),
(48, 52, 1, ''),
(49, 52, 2, ''),
(50, 52, 1, ''),
(51, 52, 2, ''),
(52, 52, 1, ''),
(53, 52, 2, ''),
(54, 52, 1, ''),
(55, 52, 2, ''),
(56, 52, 1, 'bgtr'),
(57, 52, 2, 'bb'),
(58, 97, 1, 'superman'),
(59, 97, 2, '001001'),
(60, 53, 1, 'test'),
(61, 53, 2, 'test1'),
(62, 1, 1, ''),
(63, 1, 2, ''),
(64, 8, 1, 'superman'),
(65, 8, 2, '001001'),
(66, 8, 3, 'black'),
(67, 6, 1, ''),
(68, 6, 2, ''),
(69, 6, 3, ''),
(70, 15, 1, ''),
(71, 15, 2, ''),
(72, 15, 3, ''),
(73, 7, 1, ''),
(74, 7, 2, ''),
(75, 7, 3, ''),
(76, 7, 1, ''),
(77, 7, 2, ''),
(78, 7, 3, ''),
(79, 28, 1, ''),
(80, 28, 2, ''),
(81, 28, 3, ''),
(82, 29, 1, ''),
(83, 29, 2, ''),
(84, 29, 3, '');

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_security_ques`
--

CREATE TABLE IF NOT EXISTS `ejmentor_security_ques` (
  `ques_id` int(11) NOT NULL AUTO_INCREMENT,
  `questions` text,
  `is_active` enum('N','Y') DEFAULT 'Y',
  PRIMARY KEY (`ques_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ejmentor_security_ques`
--

INSERT INTO `ejmentor_security_ques` (`ques_id`, `questions`, `is_active`) VALUES
(1, 'Who is your childhood hero?', 'Y'),
(2, 'What is your first telephone number?', 'Y'),
(3, 'What is your favorite color?', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_settings`
--

CREATE TABLE IF NOT EXISTS `ejmentor_settings` (
  `setting_id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ejmentor_settings`
--

INSERT INTO `ejmentor_settings` (`setting_id`, `key`, `value`) VALUES
(1, 'admin_email', 'info@ejmentor.com'),
(2, 'admin_name', 'Ej Mentor'),
(3, 'email_closing', '<p>\r\n Thanks &amp; Regards<br />\r\n www.EJMentor.com</p>\r\n<p>\r\n 33 Veterans Memorial Hwy,<br />\r\n Suite 1402,<br />\r\n Mableton,<br />\r\n GA 30136.</p>\r\n<p>\r\n &nbsp;</p>\r\n<p>\r\n <strong>Note:</strong> If you do not wish to receive this email anymore you should change your preference settings in your account profile or contact <a href="mailto:support@ejmentor.com" target="_blank">support@ejmentor.com</a></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_status_history`
--

CREATE TABLE IF NOT EXISTS `ejmentor_status_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reason` varchar(244) NOT NULL,
  `change_date` int(11) NOT NULL,
  `explaination` longtext NOT NULL,
  `changed_to` enum('N','Y') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `ejmentor_status_history`
--

INSERT INTO `ejmentor_status_history` (`id`, `user_id`, `reason`, `change_date`, `explaination`, `changed_to`) VALUES
(1, 6, 'Other', 0, 'fwfwfw', ''),
(2, 6, 'Other', 0, 'fe', ''),
(3, 6, 'Other', 0, 'dwd', ''),
(4, 6, '', 0, '', ''),
(5, 6, 'Other', 0, 'baje', ''),
(6, 6, '', 0, '', ''),
(7, 7, 'Moved', 0, 'dd', ''),
(8, 6, 'Other', 1346407894, 'ffe', 'N'),
(9, 7, '', 1346407897, '', 'Y'),
(10, 6, '', 1346407956, '', 'Y'),
(11, 7, 'Other', 1346407967, 'banao', 'N'),
(12, 6, 'Other', 1346408990, 'yuhujhuj', 'N'),
(13, 6, '', 1346408995, '', 'Y'),
(14, 15, 'Moved', 1346413020, '', 'N'),
(15, 15, '', 1346413025, '', 'Y'),
(16, 15, 'Graduated', 1346413156, '', 'N'),
(17, 16, '', 1346414425, '', 'Y'),
(18, 15, '', 1346415390, '', 'Y'),
(19, 15, 'Moved', 1346415833, '', 'N'),
(20, 15, '', 1346415836, '', 'Y'),
(21, 17, '', 1346415854, '', 'Y'),
(22, 7, '', 1346416028, '', 'Y'),
(23, 7, 'Graduated', 1346416408, '', 'N'),
(24, 19, '', 1346420054, '', 'Y'),
(25, 15, 'Graduated', 1346423868, '', 'N'),
(26, 15, '', 1346423872, '', 'Y'),
(27, 7, '', 1346649123, '', 'Y'),
(28, 7, 'Other', 1346649131, 'qs', 'N'),
(29, 6, 'Other', 1346650808, 'uhuhu', 'N'),
(30, 6, '', 1346650814, '', 'Y'),
(31, 15, 'Graduated', 1346653877, '', 'N'),
(32, 15, '', 1346653881, '', 'Y'),
(33, 15, 'Moved', 1346654779, '', 'N'),
(34, 15, '', 1346654782, '', 'Y'),
(35, 15, 'Other', 1346655549, 'dydrfytrey', 'N'),
(36, 19, 'Other', 1346655553, 'reyrey', 'N'),
(37, 15, '', 1346655556, '', 'Y'),
(38, 19, '', 1346671313, '', 'Y'),
(39, 15, 'Graduated', 1346671889, '', 'N'),
(40, 15, '', 1346671902, '', 'Y'),
(41, 15, '', 1346736426, '', 'Y'),
(42, 15, '', 1346736440, '', 'Y'),
(43, 30, '', 1346929280, '', 'Y'),
(44, 31, '', 1346941936, '', 'Y'),
(45, 33, '', 1347018335, '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ejmentor_user`
--

CREATE TABLE IF NOT EXISTS `ejmentor_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `school` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `best_time_to_call` varchar(255) NOT NULL,
  `faculty_sponser_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `how_did_u_hear` text NOT NULL,
  `how_did_u_find_out` text NOT NULL,
  `school_background` text NOT NULL,
  `provide_space` varchar(255) NOT NULL,
  `student_lunch` varchar(255) NOT NULL,
  `approved_by_principal` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `activation_code` varchar(255) NOT NULL,
  `temp_password` varchar(255) NOT NULL,
  `is_approved` enum('Y','N') NOT NULL DEFAULT 'N',
  `is_active` enum('Y','N') NOT NULL DEFAULT 'N',
  `sex` enum('Female','Male') DEFAULT 'Male',
  `grade` int(11) DEFAULT NULL,
  `mid_initial` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `about_me` longtext,
  `fav_sub` varchar(244) DEFAULT NULL,
  `least_fav_sub` varchar(233) DEFAULT NULL,
  `fav_food` varchar(233) DEFAULT NULL,
  `fav_tv_show` varchar(233) DEFAULT NULL,
  `achiver_coordinator/faculty_sponser` varchar(233) DEFAULT NULL,
  `available_days` varchar(20) DEFAULT NULL,
  `parent_fname` varchar(255) DEFAULT NULL,
  `parent_lname` varchar(255) DEFAULT NULL,
  `parent_email` varchar(255) DEFAULT NULL,
  `return_agrmnt` enum('Y','N') NOT NULL DEFAULT 'N',
  `dob` varchar(255) NOT NULL,
  `is_submitted` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `ejmentor_user`
--

INSERT INTO `ejmentor_user` (`user_id`, `title`, `fname`, `lname`, `email`, `school`, `address`, `city`, `state`, `zip_code`, `street`, `phone_no`, `best_time_to_call`, `faculty_sponser_name`, `username`, `password`, `how_did_u_hear`, `how_did_u_find_out`, `school_background`, `provide_space`, `student_lunch`, `approved_by_principal`, `account_type`, `activation_code`, `temp_password`, `is_approved`, `is_active`, `sex`, `grade`, `mid_initial`, `image`, `about_me`, `fav_sub`, `least_fav_sub`, `fav_food`, `fav_tv_show`, `achiver_coordinator/faculty_sponser`, `available_days`, `parent_fname`, `parent_lname`, `parent_email`, `return_agrmnt`, `dob`, `is_submitted`) VALUES
(1, 'Mr.', 'Chiranjit', 'Ghosh', 'chiranjit.uss@gmail.com', 10, 'Baghajatin\r\n', 'Kolkata', 'West bengal', '700056', 'some where', '(009) 777-55556', '12:30am EST', '0', '', '123456', '0', 'dwwd', '', '0', '', '0', 'Faculty', '503f106471c0e', '', 'Y', 'Y', 'Male', NULL, NULL, 'ddd2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', '0000-00-00', 'N'),
(2, '0', 'Sourav', 'Mukherjee', 'sourav.uss@gmail.com', 10, 'r', '', '', '', '', '(222) 222-22222', '12:30am EST', '', '', '', 'e3', '0', '', 'Yes', 'Yes', 'Yes', 'Faculty', '503f139d451e4', 'gevygeqys', 'Y', 'Y', 'Male', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', '0000-00-00', 'N'),
(6, '', 'Pritam', 'Hubba', 'pritam.uss@gmail.com', 10, ' 42/4/1, s.k.deb road', 'kolkata', 'w.b', '700048', '3rd bye lane', '(111) 111-11111', '', '', '', '123456', '', '', '', '', '', '', 'Mentor', '', '', 'Y', 'Y', 'Male', 8, '', '2.jpg', 'This is pritam...hubba pritam...brother of hubba shyamal..This is pritam...hubba pritam...brother of hubba shyamal..This is pritam...hubba pritam...brother of hubba shyamal..This is pritam...hubba pritam...brother of hubba shyamal..This is pritam...hubba pritam...brother of hubba shyamal..This is pritam...hubba pritam...brother of hubba shyamal..This is pritam...hubba pritam...brother of hubba shyamal..This is pritam...hubba pritam...brother of hubba shyamal..This is pritam...hubba pritam...brother of hubba shyamal..This is pritam...hubba pritam...brother of hubba shyamal..This is pritam...hubba pritam...brother of hubba shyamal..This is pritam...hubba pritam...brother of hubba shyamal..This is pritam...hubba pritam...brother of hubba shyamal..This is pritam...hubba pritam...brother of hubba shyamal..This is pritam...hubba pritam...brother of hubba shyamal..', 'Mathematics,Physics', 'History', 'Biriyani', 'Friends(for jennifer aniston)', '1', 'W', NULL, NULL, NULL, 'N', '0000-00-00', 'Y'),
(7, '', 'Sentu', 'Hubba', 'sentu.uss@gmail.com', 10, '', '', '', '', '', '', '', '', '', '123456', '', '', '', '', '', '', 'Mentor', '', '', 'Y', 'Y', 'Male', 11, '', 'article-2167602-13E288E4000005DC-608_634x432.jpg', NULL, NULL, NULL, NULL, NULL, '1', 'M,Tu,W', NULL, NULL, NULL, 'N', '0000-00-00', 'N'),
(8, '0', 'Sam', 'Mukherjee', 'unified.sourav@gmail.com', 10, ' somewhere', 'Belong', 'I', '111111', 'streets', '(666) 666-66666', '12:00pm EST', '', '', '123456', 'some how', '0', '', 'No', 'Yes', 'Yes', 'Achiever', '5040552bea527', '', 'Y', 'Y', 'Male', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', '0000-00-00', 'N'),
(19, '', 'someone', 'asdasdas', 'asdsd@dfdsf.com', 10, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Achiever_student', '', 'egygeqyge', 'Y', 'Y', 'Male', 5, 'dsfdsf', 'Winter3.jpg', NULL, NULL, NULL, NULL, NULL, '8', NULL, 'dfdsfd', 'dsfdsf', 'dsfds@dgfdg.dffd', 'Y', '0000-00-00', 'N'),
(15, '', 'someone', 'anyone', 'someone@gmail.com', 10, '545sdf 54ds54fds', '', '', '', '', '(222) 222-22222', '', '', '', '123456', '', '', '', '', '', '', 'Achiever_student', '', '', 'Y', 'Y', 'Male', 8, '', 'Winter4.jpg', 'something3232', 'biology,chemistry', 'maths', 'biriyani', 'friends', '8', 'M,Tu', 'guardian', 'parent', 'parentfgfgdf@gmail.com', 'Y', 'fgdfg', 'Y'),
(20, 'Mr.', 'Sourav', 'Ganguly', 'ganguly.uss@gmail.com', 10, '0', '', '', '', '', '0', '1:00am EST', '0', '', '', '0', '', '', '0', '', '0', 'Faculty', '5045a295a14b4', 'tumahuzad', 'N', 'N', 'Male', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', '', 'N'),
(28, 'Mr.', 'Hubba ', 'shyamal', 'shyamal.uss@gmail.com', 10, '', '', '', '', '', '', '', '', '', '123456', '', '', '', '', '', '', 'Achiever_student', '', '', 'Y', 'Y', 'Male', 7, '', 'Captain-Jack-Sparrow-captain-jack-sparrow-7792687-535-356.jpg', 'Hard worker', 'Math', 'english', 'sandwich', 'cartoon', '8', NULL, 'guardian', 'parent', 'parentfgfgdf@gmail.com', 'Y', '', 'Y'),
(29, '', 'Dob', 'Goal', 'dob@gmail.com', 10, ' somewhere', 'dhfjdshfj', 'sjhsjhdssfdsf', '242424', 'fsdhjfdhsjdsfdsf', '(222) 222-22222', '', '', '', '123456', '', '', '', '', '', '', 'Mentor', '', '', 'Y', 'Y', 'Female', 8, '', 'p10509919.jpg', 'I like math', 'Mathematics,physics', 'History', 'Pasta', 'Lost', '1', 'W,Th', NULL, NULL, NULL, 'N', '', 'Y'),
(30, '', 'pramath', 'giri', 'unified.giri@gmail.com', 10, '', '', '', '', '', '', '', '', '', '123456', '', '', '', '', '', '', 'Achiever_student', '', '', 'N', 'Y', 'Male', 8, 'kumar', 'Sunset4.jpg', 'asdasd', 'asdas', 'asdasd', 'dasdas', 'asdasd', '8', NULL, 'guardian', 'parent', 'parentfgfgdf@gmail.com', 'Y', '', 'Y'),
(31, '', 'asdf', 'anyone', 'somssne@gmail.com', 10, '', '', '', '', '', '', '', '', '', '123456', '', '', '', '', '', '', 'Achiever_student', '', '', 'Y', 'Y', 'Male', 3, 'avatar', '291377_10151033309409871_1600364559_o1.jpg', 'as', 's', 'sfgeg', 'd', 'd', '8', NULL, 'sadas', 'asdas', 'lenon@gmail.com', 'Y', '', 'Y'),
(32, '0', 'Som', 'Subhra', 'som@gmail.com', 11, 'kolkata', '', '', '', '', '(121) 212-12121', '1:00am EST', '', '', '', 'some how', '0', '', 'No', 'No', 'Yes', 'Achiever', '5049ddbe82d5d', 'upamuharu', 'Y', 'Y', 'Male', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', '', 'N'),
(33, '', 'pritam', 'biswas', 'pritam@gmail.com', 11, '', '', '', '', '', '', '', '', '', '123', '', '', '', '', '', '', 'Achiever_student', '', '', 'N', 'Y', 'Male', 6, '', '', 'asdasd', 'asdas', 'asdasd', 'asdas', 'asdsad', '32', NULL, 'parent', 'guardian', 'bparent@gmail.com', 'Y', '', 'Y'),
(34, '', 'ram', 'shyam', 'ram@gmail.com', 10, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Mentor', '', 'zaputazuh', 'Y', 'Y', 'Male', 10, '', 'Ab-Badlega-Game_Face-Off_Dhoni-and-Torres.jpg', 'hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh hzaputazuh ', 'Mathematics,physics', 'History', 'Pasta', 'Lost', '1', 'M,Tu,W,Th', NULL, NULL, NULL, 'N', '', 'Y');
