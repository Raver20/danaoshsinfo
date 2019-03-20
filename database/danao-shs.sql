-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 05:17 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `danao-shs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user`, `password`, `email`) VALUES
(1, 'admin', 'danaoinfo', 'danao.shs.info@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `admin_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email_add` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `admin_id` int(11) NOT NULL,
  `faq_id` int(11) NOT NULL,
  `faq_title` varchar(255) NOT NULL,
  `faq_ans` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`admin_id`, `faq_id`, `faq_title`, `faq_ans`) VALUES
(1, 2, 'Why are we implementing 12 years of basic education and not 11 years?', 'A 12-year program is found to be an adequate period for learning under basic education and is a requirement for recognition of professionals abroad.\r\n\r\nOther countries like Singapore have 11 years of compulsory education but have, 12 to 14 years of pre-university education depending on the track.``'),
(1, 7, 'What would be the assurance that K to 12 graduates will be employed?', 'DepEd has entered into an agreement with business organizations and local and\r\nforeign chambers of commerce and industries that graduates of K to 12 will be\r\nconsidered for employment.\r\n\r\nThere will be a matching of competency requirements and standards so that 12-year\r\nbasic education graduates will have the necessary entry-level skills needed to join\r\nthe workforce and to match the College Readiness Standards (CRS) for further\r\neducation and future employment.\r\n\r\nEntrepreneurship will also be included in the enhanced basic education curriculum,\r\nensuring graduates can venture into other opportunities beyond employment.'),
(1, 8, 'Will K to 12 change TESDA Technical Vocational Education and Training (TVET) programs?', 'No. TESDA will continue to offer TVET programs. Students may also be eligible for NC I\r\nand NC II through Junior High School and Senior High School, respectively'),
(1, 14, 'What will happen to the curriculum? What subjects will be added and removed?', 'There is a continuum from Kindergarten to Grade 12 and to technical-vocational and\r\nhigher education.\r\n\r\nThe current curriculum has been enhanced and has been given more focus to allow\r\nmastery of learning.\r\n\r\nIn Grades 11 and 12, core subjects like Mathematics, Science, and Languages will\r\nbe strengthened. Specializations in students’ areas of interest will also be offered.'),
(1, 21, 'What happens to high school graduates of the old basic education curriculum who intend to enroll by AY 2018-2019 onwards?', 'High school graduates of the old basic education curriculum who did not go through Senior High School may enroll for AY 2018-2019 under the new higher education curricula. However, given that the Revised General Education Curriculum in college will be implemented nationwide starting AY 2018-2019, these students may need to undergo bridging programs as implemented by the admitting colleges and universities.\r\n\r\nThose who have previously taken college units may have these units credited subject to the relevant HEI policies. Those who have work experience may have their competencies assessed under existing CHED rules and regulations through the Expanded Tertiary Education Equivalency and Accreditation Program (ETEEAP).');

-- --------------------------------------------------------

--
-- Table structure for table `school_facilites`
--

CREATE TABLE `school_facilites` (
  `school_id` int(11) NOT NULL,
  `facility_id` int(11) NOT NULL,
  `facility_name` varchar(255) NOT NULL,
  `facility_url` varchar(255) NOT NULL,
  `description` varchar(20000) NOT NULL,
  `big_pic` varchar(255) NOT NULL,
  `small_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_facilites`
--

INSERT INTO `school_facilites` (`school_id`, `facility_id`, `facility_name`, `facility_url`, `description`, `big_pic`, `small_pic`) VALUES
(10, 7, 'Com Laboratory', 'Com-Laboratory', 'A Computer Laboratory', 'blog-6.jpg', 'blog-6.jpg'),
(10, 8, 'Science Lab.', 'Science-Lab', 'A Science Laboratory', '15823278_1250177651729728_5366755261536348673_n1.jpg', '15823278_1250177651729728_5366755261536348673_n1.jpg'),
(7, 9, 'Clinic', 'Clinic', 'A Clinic', 'blog-2.jpg', 'blog-2.jpg'),
(7, 10, 'Social Hall', 'Social-Hall', 'A Social Hall', 'blog-31.jpg', 'blog-31.jpg'),
(10, 11, 'Science Lab.', 'Science-Lab', 'asd', 'blog-21.jpg', 'blog-21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `school_info`
--

CREATE TABLE `school_info` (
  `admin_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `schoolname` varchar(255) NOT NULL,
  `school_name_url` varchar(1000) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telno` int(11) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `typeofschool` varchar(30) NOT NULL,
  `contactperson` varchar(100) NOT NULL,
  `principal` varchar(100) NOT NULL,
  `locationurl` varchar(255) NOT NULL,
  `calendar` varchar(20) NOT NULL,
  `avetuition` int(30) NOT NULL,
  `logoname` varchar(255) NOT NULL,
  `slogoname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_info`
--

INSERT INTO `school_info` (`admin_id`, `school_id`, `schoolname`, `school_name_url`, `user`, `password`, `address`, `telno`, `emailaddress`, `typeofschool`, `contactperson`, `principal`, `locationurl`, `calendar`, `avetuition`, `logoname`, `slogoname`) VALUES
(1, 7, 'Colegio de San Antonio de Padua (CSA)', 'Colegio-de-San-Antonio-de-Padua-CSA', 'csa', 'admin', 'Guinsay', 2147483647, 'raver.glen@gmail.com', 'Private', 'Glenn Jopia', 'Glenn Jopia', 'asdasdasdasd', 'Semester', 8000, '', ''),
(1, 8, 'Sto. Tomas College (STC)', 'Sto-Tomas-College-STC', 'stc', 'admin', 'Poblacion', 2147483647, 'raver.glen@gmail.com', 'Private', 'Glenn Jopia', 'Glenn Jopia', 'asdasdasdasd', 'Semester', 8000, '', ''),
(1, 9, 'Rosemont Hills Montessori College', 'Rosemont-Hills-Montessori-College', 'rose', 'admin', 'Sabang', 2147483647, 'raver.glen@gmail.com', 'Private', 'Glenn Jopia', 'Glenn Jopia', 'asdasdasdasd', 'Semester', 8000, '', ''),
(0, 10, 'Northeastern Cebu Colleges, Inc. (NCC)', 'Northeastern-Cebu-Colleges-Inc-NCC', 'ncc1', 'admin', 'Poblacion', 2147483647, 'raver.glen@gmail.com', 'Public', 'Glenn Jopia', 'Glenn Jopia', 'asdasdasdasd', 'Semester', 8000, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `school_inquiry`
--

CREATE TABLE `school_inquiry` (
  `school_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_made` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school_privileges`
--

CREATE TABLE `school_privileges` (
  `school_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  `privilege_name` varchar(255) NOT NULL,
  `privilege_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_privileges`
--

INSERT INTO `school_privileges` (`school_id`, `privilege_id`, `privilege_name`, `privilege_url`) VALUES
(10, 5, 'asdasd', 'asdasd'),
(7, 6, 'zxczxczx', 'zxczxczx'),
(10, 9, 'DSWD', 'DSWD');

-- --------------------------------------------------------

--
-- Table structure for table `school_requirements`
--

CREATE TABLE `school_requirements` (
  `school_id` int(11) NOT NULL,
  `requirement_id` int(11) NOT NULL,
  `requirement_name` varchar(255) NOT NULL,
  `requirement_desc` varchar(20000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_requirements`
--

INSERT INTO `school_requirements` (`school_id`, `requirement_id`, `requirement_name`, `requirement_desc`) VALUES
(10, 2, 'asdasd', 'asdasd'),
(10, 3, 'BIRTH', '1123123'),
(6, 4, 'NSO', 'Need NSO'),
(6, 5, '2x2 Picture', 'A 2x2 Picture'),
(0, 6, 'NSO', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `school_strands`
--

CREATE TABLE `school_strands` (
  `school_id` int(11) NOT NULL,
  `strand_id` int(11) NOT NULL,
  `school_strand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_strands`
--

INSERT INTO `school_strands` (`school_id`, `strand_id`, `school_strand_id`) VALUES
(10, 19, 1),
(10, 20, 3),
(10, 18, 4),
(10, 19, 5);

-- --------------------------------------------------------

--
-- Table structure for table `site_cookies`
--

CREATE TABLE `site_cookies` (
  `id` int(11) NOT NULL,
  `cookie_code` varchar(128) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expiry_data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `strands`
--

CREATE TABLE `strands` (
  `admin_id` int(11) NOT NULL,
  `strand_id` int(11) NOT NULL,
  `description` varchar(20000) NOT NULL,
  `strand_name` varchar(255) NOT NULL,
  `strand_url` varchar(255) NOT NULL,
  `rcic` mediumtext NOT NULL,
  `small_pic` varchar(255) NOT NULL,
  `big_pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strands`
--

INSERT INTO `strands` (`admin_id`, `strand_id`, `description`, `strand_name`, `strand_url`, `rcic`, `small_pic`, `big_pic`) VALUES
(1, 17, 'The Science, Technology, Engineering and Math track or also known as STEM. STEM is the strand for students who wish to go into college with the following courses: Biology, Physics, Mathematics, Engineering, Computer Studies, Information Technology and so on and forth on the related courses. This strand is a very hands-on type of experience that would be good for students who have firmly decided their future college course and profession.', '(STEM) Science, Technology, Engineering and Math', 'STEM-Science-Technology-Engineering-and-Math', 'Bachelor of Science in Environmental Science (BSES)\r\nBachelor of Science in Geology (BS Geology)\r\nBachelor of Science in Biology (BS Biology)\r\nBachelor of Science in Molecular Biology (BS Molecular Biology)\r\nBachelor of Science in Physics (BS Physics)\r\nBachelor of Science in Applied Physics (BS Applied Physics)\r\n Bachelor of Science in Chemistry (BS Chemistry)\r\n Bachelor of Science in Food Technology (BS Food Tech)\r\n Bachelor of Science in Nutrition and Dietetics (BS Nutrition and Dietetics)\r\n Bachelor of Science in Medical Technology (BS Med Tech)\r\n Bachelor of Science in Midwifery (BS Midwifery)\r\n Bachelor of Science in Nursing (BSN) \r\nBachelor of Science in Occupational Therapy (BSOT)\r\nBachelor of Science in in Pharmacy (BS Pharmacy)\r\nBachelor of Science in Physical Therapy (BSPT)\r\nBachelor of Science in Radiologic Technology (BS Rad Tech)\r\nBachelor of Science in Respiratory Therapy (BSRT)\r\nBachelor of Science in Speech-Language Pathology\r\n', 'stem.png', 'stem.png'),
(1, 18, 'The Humanities and Social Sciences or HUMSS. HUMSS is the strand for students who wish to go into college with the following courses: Political Science or International Studies, English or Filipino Literature, Mass Communication, Education, Performing Arts and other related courses.', '(HUMSS) Humanities and Social Sciences', 'HUMSS-Humanities-and-Social-Sciences', 'Bachelor of Arts in Philosophy (AB Philosophy)\r\nBachelor of Arts in English (AB English)\r\nBachelor of Arts in Linguistics (AB Linguistics)\r\nBachelor of Arts in Literature (AB Literature)\r\nBachelor of Arts in Filipino (AB Filipino)\r\nBachelor of Arts in Islamic Studies (AB Islamic Studies)', 'humms.png', 'humms.png'),
(1, 19, 'The Accounting Business and Management or ABM. ABM is the strand for students who wish to go into college with the following courses: Human Resource, Tourism, Hotel and Restaurant Management, Accounting, Business Studies, Marketing, Real Estate, Export Management, Entrepreneurship and other related courses in this path. This is definitely a suggested strand for those who have their eyes set on creating a business in the future or working in the business sector.', '(ABM) Accounting Business and Management', 'ABM-Accounting-Business-and-Management', 'Bachelor of Science in Accountancy (BSA)\r\nBachelor of Science in Accounting Technology (BSAcT)\r\nBachelor of Science in Business Administration Major in Business Economics (BSBA)\r\nBachelor of Science in Business Administration Major in Financial Management (BSBA major in FM)\r\nBachelor of Science in Business Administration Major in Human Resource Development (BSBA major in HRDM)\r\nBachelor of Science in Business Administration Major in Marketing Management (BSBA major in MM)\r\nBachelor of Science in Business Administration Major in Operations Management (BSBA major in OM)\r\nBachelor of Science in Entrepreneurship (BS Entrep)\r\nBachelor of Science in Agribusiness (BS Agribusiness)\r\nBachelor of Science in Bachelor of Science in Hotel and Restaurant Management (BS HRM)\r\nBachelor of Science in Office Administration (BSOA) \r\nBachelor of Science in Real Estate Management (BS REM)\r\nBachelor of Science in Tourism Management (BSTM)\r\nBachelor of Science in Community Development (BS Community Development)\r\nBachelor of Science in Customs Administration (BSCA)\r\nBachelor of Science in Foreign Service (BS Foreign Service)\r\nBachelor of Science in International Studies (BSIS)\r\nBachelor of Public Administration (BPA)\r\nBachelor of Science in Public Safety (BSPS)\r\nBachelor of Science in Social Work (BS Social Work)', 'abm.png', 'abm.png'),
(1, 20, 'The Academic track is the General Academic Strand or GAS. Now if you have some uncertainty or confusion in your mind on what specific path you would want to take, then GAS is the strand offered in this track. What makes this good is that the courses offered here are encompassing; meaning in all fields. The things that one can learn in this can help your uncertain mind explore your possible college options. To simply put, this strand is for all courses in college.', '(GA) General Academic', 'GA-General-Academic', '', 'gas.png', 'gas.png'),
(1, 21, 'The TVL Track is the Agri-Fishery Arts Strand. The skills taught here are those that can be used in the agriculture and aquaculture field. Examples of lessons to be learned are rubber production, food processing, and such.', 'Agri-Fishery Arts', 'Agri-Fishery-Arts', '', 'Agri-Fishery_Arts_Strand.png', 'Agri-Fishery_Arts_Strand.png'),
(1, 22, 'It focuses on teaching you skills that can be useful in livelihood projects. Professions that can be considered after taking this stand are stylists, makeup artists, tour guides, barista, baker, etc.', 'Home Economics', 'Home-Economics', '', 'Home_Economics_Strand.png', 'Home_Economics_Strand.png'),
(1, 23, 'The Industrial Arts Strand. When you want to know about carpentry, electrical repairs, driving and welding, the Industrial Arts strand offers a good curriculum.', 'Industrial Arts', 'Industrial-Arts', '', 'Industrial_Arts_Strand.png', 'Industrial_Arts_Strand.png'),
(1, 24, 'The Information and Communications Technology Strand, basically if you are tech and computer-savvy then you’d love this strand. Professions that can be considered after this stand are as a graphic designer, encoder, web developer and designer, call center agent, sales agent and such.', '(ICT) Information and Communications Technology', 'ICT-Information-and-Communications-Technology', '', 'Information_and_Communications_Technology_(ICT)_Strand.png', 'Information_and_Communications_Technology_(ICT)_Strand.png'),
(1, 25, 'The Arts and Designs Track. It provides students the know-how on the different arts and design forms, materials, media, and production in the creative industries. If you think you would want to have a job in the art field then this track is good for you. It has a curriculum catered to enhance and encourage your creativity. It is a good platform to express yourself. Concepts around the globe will be taught to you to make you more immersed and competitive in this field. If your interest falls under music, theatres arts, photography, fashion design, and such, this is the advisable track for you.', 'Arts and Design', 'Arts-and-Design', '', 'art_design.png', 'art_design.png'),
(1, 26, 'If you excel in sports, whatever it may be, then you would enjoy it here. You will be able to learn concepts on positive attitude, teamwork and competitiveness because this teaches you about how sports management and leadership work in this type of setting. There will be subjects on human anatomy and physiology, plus you will also learn first aid. Whether or not your end goal is to become a professional athlete, trainer, P.E. teacher, instructors, game officials or anything under the field of sports, the Sports track has a curriculum that equips you with the knowledge you would need to prepare you for the future.', 'Sports', 'Sports', '', 'sports.png', 'sports.png');

-- --------------------------------------------------------

--
-- Table structure for table `strand_categories`
--

CREATE TABLE `strand_categories` (
  `admin_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL,
  `parent_cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `school_facilites`
--
ALTER TABLE `school_facilites`
  ADD PRIMARY KEY (`facility_id`);

--
-- Indexes for table `school_info`
--
ALTER TABLE `school_info`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `school_inquiry`
--
ALTER TABLE `school_inquiry`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `school_privileges`
--
ALTER TABLE `school_privileges`
  ADD PRIMARY KEY (`privilege_id`);

--
-- Indexes for table `school_requirements`
--
ALTER TABLE `school_requirements`
  ADD PRIMARY KEY (`requirement_id`);

--
-- Indexes for table `school_strands`
--
ALTER TABLE `school_strands`
  ADD PRIMARY KEY (`school_strand_id`);

--
-- Indexes for table `site_cookies`
--
ALTER TABLE `site_cookies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strands`
--
ALTER TABLE `strands`
  ADD PRIMARY KEY (`strand_id`);

--
-- Indexes for table `strand_categories`
--
ALTER TABLE `strand_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `school_facilites`
--
ALTER TABLE `school_facilites`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `school_info`
--
ALTER TABLE `school_info`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `school_inquiry`
--
ALTER TABLE `school_inquiry`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_privileges`
--
ALTER TABLE `school_privileges`
  MODIFY `privilege_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `school_requirements`
--
ALTER TABLE `school_requirements`
  MODIFY `requirement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `school_strands`
--
ALTER TABLE `school_strands`
  MODIFY `school_strand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `site_cookies`
--
ALTER TABLE `site_cookies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `strands`
--
ALTER TABLE `strands`
  MODIFY `strand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `strand_categories`
--
ALTER TABLE `strand_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
