-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2019 at 08:54 AM
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
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user`, `password`) VALUES
(1, 'admin', 'danaoinfo'),
(2, 'admin2', 'admin2');

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
(2, 1, 'How will Senior HS of the K to 12 Program help in ensuring employment for our graduates?', 'The K to 12 BEC will be sufficient to prepare students for work. Students will acquire Certificates of Competency and National Certificates in accordance with TESDA (NC 1 for JHS, NC II for SHS)There will be school-industry partnership for technical- vocational courses for students to gain work experience while studying, and to be absorbed by the companies.'),
(1, 2, 'What would be the assurance that the K to 12 graduates will be employed?', 'DepEd has entered into an agreement with business organizations, local and foreign chambers of commerce and industries that graduates of K to 12 will be considered for employment. DepEd ensures that “ENTREPRENEURSHIP” is taught and that competencies and standards of Senior HS graduates match with the College Readiness Standards.'),
(1, 3, 'adasd', 'asdasdasdasd'),
(1, 4, 'asdasdasdasdasdsd', 'asdasdasasdasdasdsad'),
(2, 5, 'Hi', 'asdasdasdasdsadasda');

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
(3, 7, 'Com Laboratory', 'Com-Laboratory', 'A Computer Laboratory', '1231.PNG', '1231.PNG'),
(2, 8, 'Science Lab.', 'Science-Lab', 'A Science Laboratory', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `school_info`
--

CREATE TABLE `school_info` (
  `school_id` int(11) NOT NULL,
  `schoolname` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
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
  `slogoname` varchar(255) NOT NULL,
  `backgroundpic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_info`
--

INSERT INTO `school_info` (`school_id`, `schoolname`, `user`, `password`, `status`, `address`, `telno`, `emailaddress`, `typeofschool`, `contactperson`, `principal`, `locationurl`, `calendar`, `avetuition`, `logoname`, `slogoname`, `backgroundpic`) VALUES
(2, 'NCC', 'schooladmin', 'schooladmin', 1, 'Danao', 123456789, 'ncc@gmail.com', 'private', 'Loida', 'Romo', '234234', 'semester', 8000, 'qwerty', 'qwerty', 'qwerty'),
(3, 'CTU', 'ctu', 'admin', 1, 'Danao Sabang', 9876, 'ctu@gmail.com', 'public', 'Me', 'ME', 'qwert', 'semester', 6000, 'qwe', 'qwe', 'qwe');

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
-- Table structure for table `school_offering`
--

CREATE TABLE `school_offering` (
  `school_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `privilige_name` varchar(255) NOT NULL,
  `priviliges_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 0, 'NSO', 'asdasd'),
(1, 2, 'asdasd', 'asdasd');

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
(1, 19, 'The Accounting Business and Management or ABM. ABM is the strand for students who wish to go into college with the following courses: Human Resource, Tourism, Hotel and Restaurant Management, Accounting, Business Studies, Marketing, Real Estate, Export Management, Entrepreneurship and other related courses in this path. This is definitely a suggested strand for those who have their eyes set on creating a business in the future or working in the business sector.', '(ABM) Accounting Business and Management', 'ABM-Accounting-Business-and-Management', '- Bachelor of Science in Accountancy (BSA)\r\n- Bachelor of Science in Accounting Technology (BSAcT)\r\n- Bachelor of Science in Business Administration Major in Business Economics (BSBA)\r\n- Bachelor of Science in Business Administration Major in Financial Management (BSBA major in FM)\r\n- Bachelor of Science in Business Administration Major in Human Resource Development (BSBA major in HRDM)\r\n- Bachelor of Science in Business Administration Major in Marketing Management (BSBA major in MM)\r\n- Bachelor of Science in Business Administration Major in Operations Management (BSBA major in OM)\r\n- Bachelor of Science in Entrepreneurship (BS Entrep)\r\n- Bachelor of Science in Agribusiness (BS Agribusiness)\r\n- Bachelor of Science in Bachelor of Science in Hotel and Restaurant Management (BS HRM)\r\n- Bachelor of Science in Office Administration (BSOA) \r\n- Bachelor of Science in Real Estate Management (BS REM)\r\n- Bachelor of Science in Tourism Management (BSTM)\r\n- Bachelor of Science in Community Development (BS Community Development)\r\n- Bachelor of Science in Customs Administration (BSCA)\r\n- Bachelor of Science in Foreign Service (BS Foreign Service)\r\n- Bachelor of Science in International Studies (BSIS)\r\n- Bachelor of Public Administration (BPA)\r\n- Bachelor of Science in Public Safety (BSPS)\r\n- Bachelor of Science in Social Work (BS Social Work)', 'abm.png', 'abm.png'),
(1, 20, 'The Academic track is the General Academic Strand or GAS. Now if you have some uncertainty or confusion in your mind on what specific path you would want to take, then GAS is the strand offered in this track. What makes this good is that the courses offered here are encompassing; meaning in all fields. The things that one can learn in this can help your uncertain mind explore your possible college options. To simply put, this strand is for all courses in college.', '(GAS) General Academic', 'GAS-General-Academic', '', 'gas.png', 'gas.png'),
(1, 21, 'The TVL Track is the Agri-Fishery Arts Strand. The skills taught here are those that can be used in the agriculture and aquaculture field. Examples of lessons to be learned are rubber production, food processing, and such.', 'Agri-Fishery Arts', 'Agri-Fishery-Arts', '', 'Agri-Fishery_Arts_Strand.png', 'Agri-Fishery_Arts_Strand.png'),
(1, 22, 'It focuses on teaching you skills that can be useful in livelihood projects. Professions that can be considered after taking this stand are stylists, makeup artists, tour guides, barista, baker, etc.', 'Home Economics', 'Home-Economics', '', 'Home_Economics_Strand.png', 'Home_Economics_Strand.png'),
(1, 23, 'The Industrial Arts Strand. When you want to know about carpentry, electrical repairs, driving and welding, the Industrial Arts strand offers a good curriculum.', 'Industrial Arts', 'Industrial-Arts', '', 'Industrial_Arts_Strand.png', 'Industrial_Arts_Strand.png'),
(1, 24, 'The Information and Communications Technology Strand, basically if you are tech and computer-savvy then you’d love this strand. Professions that can be considered after this stand are as a graphic designer, encoder, web developer and designer, call center agent, sales agent and such.', '(ICT) Information and Communications Technology', 'ICT-Information-and-Communications-Technology', '', 'Information_and_Communications_Technology_(ICT)_Strand.png', 'Information_and_Communications_Technology_(ICT)_Strand.png'),
(1, 25, 'The Arts and Designs Track. It provides students the know-how on the different arts and design forms, materials, media, and production in the creative industries. If you think you would want to have a job in the art field then this track is good for you. It has a curriculum catered to enhance and encourage your creativity. It is a good platform to express yourself. Concepts around the globe will be taught to you to make you more immersed and competitive in this field. If your interest falls under music, theatres arts, photography, fashion design, and such, this is the advisable track for you.', 'Arts and Design', 'Arts-and-Design', '', 'art_design.png', 'art_design.png'),
(1, 26, 'If you excel in sports, whatever it may be, then you would enjoy it here. You will be able to learn concepts on positive attitude, teamwork and competitiveness because this teaches you about how sports management and leadership work in this type of setting. There will be subjects on human anatomy and physiology, plus you will also learn first aid. Whether or not your end goal is to become a professional athlete, trainer, P.E. teacher, instructors, game officials or anything under the field of sports, the Sports track has a curriculum that equips you with the knowledge you would need to prepare you for the future.', 'Sports', 'Sports', '', 'sports.png', 'sports.png'),
(2, 27, 'ASD', 'ASDqweqwt', 'ASDqweqwt', 'ASD', '', '');

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
-- Indexes for table `school_offering`
--
ALTER TABLE `school_offering`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_requirements`
--
ALTER TABLE `school_requirements`
  ADD PRIMARY KEY (`requirement_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `school_facilites`
--
ALTER TABLE `school_facilites`
  MODIFY `facility_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `school_info`
--
ALTER TABLE `school_info`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `school_inquiry`
--
ALTER TABLE `school_inquiry`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `school_requirements`
--
ALTER TABLE `school_requirements`
  MODIFY `requirement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
