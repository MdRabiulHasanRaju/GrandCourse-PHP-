-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 04:27 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grandcourse`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `content`, `userid`, `postid`) VALUES
(48, 'Md Rabiul Hasan', 'this is test comment', 22, 9);

-- --------------------------------------------------------

--
-- Table structure for table `comments_reply`
--

CREATE TABLE `comments_reply` (
  `id` int(11) NOT NULL,
  `parent_com_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `reply_postid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments_reply`
--

INSERT INTO `comments_reply` (`id`, `parent_com_id`, `content`, `userid`, `username`, `reply_postid`) VALUES
(40, 48, 'this is test reply', 22, 'Md Rabiul Hasan', 9);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_cat` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` text NOT NULL,
  `motivational_des` text NOT NULL,
  `summary` text NOT NULL,
  `course_purpose` text NOT NULL,
  `for_whom` text NOT NULL,
  `pre_idea` text NOT NULL,
  `instructor` text NOT NULL,
  `purchase_title` varchar(255) NOT NULL,
  `order_box_title` varchar(255) NOT NULL,
  `order_box_des` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `discount_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_cat`, `image`, `title`, `sub_title`, `motivational_des`, `summary`, `course_purpose`, `for_whom`, `pre_idea`, `instructor`, `purchase_title`, `order_box_title`, `order_box_des`, `price`, `discount_price`) VALUES
(1, 1, 'hc.png', 'The Ultimate HTML/CSS Mastery Series', 'Everything you need to build fast and beautiful websites with HTML5 and CSS3 in one bundle', '<h5>Complete HTML5/CSS3 Course from Zero to Hero</h5>\r\n								<p> Have you always wanted to learn web development but didn\'t know where to start? Tired of lengthy, boring and outdated courses? This course is for you. <br /><br />\r\n\r\n								A fun, comprehensive and beginner-friendly course that teaches you all the skills you need to build professional-quality websites with HTML5 and CSS3. <br /><br />\r\n\r\n								Say goodbye to long, boring, repetitive courses with outdated content that spend too much time on the basics. This is the only HTML5/CSS3 you\'ll ever need! <br /><br />\r\n\r\n								The first part teaches you the fundamentals, the second part explores advanced concepts and the third part puts everything together to build and deploy a real website. You\'ll start with a Photoshop design mockup and finish with a live website. <br /><br />\r\n\r\n								Whether you’re an absolute beginner wanting to learn web development from scratch, or you know a bit of HTML5/CSS3 and need a refresher course to fill the gaps, this course will help you achieve your goals. </p>', '<ul>\r\n									<li><i class=\"fas fa-chart-bar\"></i> Beginner to Pro </li>\r\n									<li><i class=\"fas fa-bell\"></i> Lifetime Access</li>\r\n									<li><i class=\"far fa-clock\"></i> 14 Hours of Video </li>\r\n									<li><i class=\"fas fa-video\"></i> 180 Lessons </li>\r\n									<li><i class=\"fas fa-comments\"></i> Cheat Sheets</li>\r\n									<li><i class=\"fas fa-cloud-download-alt\"></i> Downloadable</li>\r\n									<li><i class=\"fas fa-closed-captioning\"></i> Subtitles</li>\r\n									<li><i class=\"fas fa-certificate\"></i> Certificate</li>\r\n								</ul>', '<ul>\r\n								<li>Confidently build websites with HTML5/CSS3 </li>\r\n								<li>Build websites that look great on any screen or device </li>\r\n								<li>Troubleshoot issues like a pro</li>\r\n								<li>Deploy your websites to the cloud</li>\r\n							</ul>', '<ul>\r\n								<li>Anyone wanting to become a front-end developer</li>\r\n								<li>Anyone wanting to create websites for fun or to make money</li>\r\n							</ul>', '<p>Everything you need to know from the basics to more advanced concepts are included. I’ve carefully structured this course so anyone can progress quickly and easily and learn a lot along the way. </p>', '<img src=\"images/logo.png\" alt=\"\" />\r\n								<p>Md Rabiul Hasan</p>\r\n								I believe coding should be fun and accessible to everyone. I believe coding should be fun and accessible to everyone. I believe coding should be fun and accessible to everyone. I believe coding should be fun and accessible to everyone.', 'Go from Beginner to Expert', 'Buy the Complete Bundle', '<p class=\"wonit\">Own it forever!</p>\r\n								<p>Limited Time!</p>', 3000, 1500),
(2, 2, 'php.png', 'The Ultimate PHP Mastery Series', 'Everything you need to build fast and beautiful websites with PHP in one bundle', '<h5>Complete PHP Course from Zero to Hero</h5>\r\n								<p> Have you always wanted to learn web development but didn\'t know where to start? Tired of lengthy, boring and outdated courses? This course is for you. <br /><br />\r\n\r\n								A fun, comprehensive and beginner-friendly course that teaches you all the skills you need to build professional-quality websites with HTML5 and CSS3. <br /><br />\r\n\r\n								Say goodbye to long, boring, repetitive courses with outdated content that spend too much time on the basics. This is the only HTML5/CSS3 you\'ll ever need! <br /><br />\r\n\r\n								The first part teaches you the fundamentals, the second part explores advanced concepts and the third part puts everything together to build and deploy a real website. You\'ll start with a Photoshop design mockup and finish with a live website. <br /><br />\r\n\r\n								Whether you’re an absolute beginner wanting to learn web development from scratch, or you know a bit of HTML5/CSS3 and need a refresher course to fill the gaps, this course will help you achieve your goals. </p>', '<ul>\r\n									<li><i class=\"fas fa-chart-bar\"></i> Beginner to Pro </li>\r\n									<li><i class=\"fas fa-bell\"></i> Lifetime Access</li>\r\n									<li><i class=\"far fa-clock\"></i> 14 Hours of Video </li>\r\n									<li><i class=\"fas fa-video\"></i> 180 Lessons </li>\r\n									<li><i class=\"fas fa-comments\"></i> Cheat Sheets</li>\r\n									<li><i class=\"fas fa-cloud-download-alt\"></i> Downloadable</li>\r\n									<li><i class=\"fas fa-closed-captioning\"></i> Subtitles</li>\r\n									<li><i class=\"fas fa-certificate\"></i> Certificate</li>\r\n								</ul>', '<ul>\r\n								<li>Confidently build websites with HTML5/CSS3 </li>\r\n								<li>Build websites that look great on any screen or device </li>\r\n								<li>Troubleshoot issues like a pro</li>\r\n								<li>Deploy your websites to the cloud</li>\r\n							</ul>', '<ul>\r\n								<li>Anyone wanting to become a front-end developer</li>\r\n								<li>Anyone wanting to create websites for fun or to make money</li>\r\n							</ul>', '<p>Everything you need to know from the basics to more advanced concepts are included. I’ve carefully structured this course so anyone can progress quickly and easily and learn a lot along the way. </p>', '<img src=\"images/logo.png\" alt=\"\" />\r\n								<p>Md Rabiul Hasan</p>\r\n								I believe coding should be fun and accessible to everyone. I believe coding should be fun and accessible to everyone. I believe coding should be fun and accessible to everyone. I believe coding should be fun and accessible to everyone.', 'Go from Beginner to Expert', 'Buy the Complete Bundle', '<p class=\"wonit\">Own it forever!</p>\r\n								<p>Limited Time!</p>', 4000, 2500),
(3, 3, 'js.png', 'The Ultimate JavaScript Mastery Series', 'Everything you need to build fast and beautiful websites with JavaScript in one bundle', '<h5>Complete JavaScript Course from Zero to Hero</h5>\r\n								<p> Have you always wanted to learn web development but didn\'t know where to start? Tired of lengthy, boring and outdated courses? This course is for you. <br /><br />\r\n\r\n								A fun, comprehensive and beginner-friendly course that teaches you all the skills you need to build professional-quality websites with HTML5 and CSS3. <br /><br />\r\n\r\n								Say goodbye to long, boring, repetitive courses with outdated content that spend too much time on the basics. This is the only HTML5/CSS3 you\'ll ever need! <br /><br />\r\n\r\n								The first part teaches you the fundamentals, the second part explores advanced concepts and the third part puts everything together to build and deploy a real website. You\'ll start with a Photoshop design mockup and finish with a live website. <br /><br />\r\n\r\n								Whether you’re an absolute beginner wanting to learn web development from scratch, or you know a bit of HTML5/CSS3 and need a refresher course to fill the gaps, this course will help you achieve your goals. </p>', '<ul>\r\n									<li><i class=\"fas fa-chart-bar\"></i> Beginner to Pro </li>\r\n									<li><i class=\"fas fa-bell\"></i> Lifetime Access</li>\r\n									<li><i class=\"far fa-clock\"></i> 14 Hours of Video </li>\r\n									<li><i class=\"fas fa-video\"></i> 180 Lessons </li>\r\n									<li><i class=\"fas fa-comments\"></i> Cheat Sheets</li>\r\n									<li><i class=\"fas fa-cloud-download-alt\"></i> Downloadable</li>\r\n									<li><i class=\"fas fa-closed-captioning\"></i> Subtitles</li>\r\n									<li><i class=\"fas fa-certificate\"></i> Certificate</li>\r\n								</ul>', '<ul>\r\n								<li>Confidently build websites with HTML5/CSS3 </li>\r\n								<li>Build websites that look great on any screen or device </li>\r\n								<li>Troubleshoot issues like a pro</li>\r\n								<li>Deploy your websites to the cloud</li>\r\n							</ul>', '<ul>\r\n								<li>Anyone wanting to become a front-end developer</li>\r\n								<li>Anyone wanting to create websites for fun or to make money</li>\r\n							</ul>', '<p>Everything you need to know from the basics to more advanced concepts are included. I’ve carefully structured this course so anyone can progress quickly and easily and learn a lot along the way. </p>', '<img src=\"images/logo.png\" alt=\"\" />\r\n								<p>Md Rabiul Hasan</p>\r\n								I believe coding should be fun and accessible to everyone. I believe coding should be fun and accessible to everyone. I believe coding should be fun and accessible to everyone. I believe coding should be fun and accessible to everyone.', 'Go from Beginner to Expert', 'Buy the Complete Bundle', '<p class=\"wonit\">Own it forever!</p>\r\n								<p>Limited Time!</p>', 4500, 3000),
(4, 2, 'nodejs.png', 'The Ultimate NodeJS Mastery Series', 'Everything you need to build fast and beautiful websites with NodeJS in one bundle', '<h5>Complete NodeJS Course from Zero to Hero</h5>\r\n								<p> Have you always wanted to learn web development but didn\'t know where to start? Tired of lengthy, boring and outdated courses? This course is for you. <br /><br />\r\n\r\n								A fun, comprehensive and beginner-friendly course that teaches you all the skills you need to build professional-quality websites with HTML5 and CSS3. <br /><br />\r\n\r\n								Say goodbye to long, boring, repetitive courses with outdated content that spend too much time on the basics. This is the only HTML5/CSS3 you\'ll ever need! <br /><br />\r\n\r\n								The first part teaches you the fundamentals, the second part explores advanced concepts and the third part puts everything together to build and deploy a real website. You\'ll start with a Photoshop design mockup and finish with a live website. <br /><br />\r\n\r\n								Whether you’re an absolute beginner wanting to learn web development from scratch, or you know a bit of HTML5/CSS3 and need a refresher course to fill the gaps, this course will help you achieve your goals. </p>', '<ul>\r\n									<li><i class=\"fas fa-chart-bar\"></i> Beginner to Pro </li>\r\n									<li><i class=\"fas fa-bell\"></i> Lifetime Access</li>\r\n									<li><i class=\"far fa-clock\"></i> 14 Hours of Video </li>\r\n									<li><i class=\"fas fa-video\"></i> 180 Lessons </li>\r\n									<li><i class=\"fas fa-comments\"></i> Cheat Sheets</li>\r\n									<li><i class=\"fas fa-cloud-download-alt\"></i> Downloadable</li>\r\n									<li><i class=\"fas fa-closed-captioning\"></i> Subtitles</li>\r\n									<li><i class=\"fas fa-certificate\"></i> Certificate</li>\r\n								</ul>', '<ul>\r\n								<li>Confidently build websites with HTML5/CSS3 </li>\r\n								<li>Build websites that look great on any screen or device </li>\r\n								<li>Troubleshoot issues like a pro</li>\r\n								<li>Deploy your websites to the cloud</li>\r\n							</ul>', '<ul>\r\n								<li>Anyone wanting to become a front-end developer</li>\r\n								<li>Anyone wanting to create websites for fun or to make money</li>\r\n							</ul>', '<p>Everything you need to know from the basics to more advanced concepts are included. I’ve carefully structured this course so anyone can progress quickly and easily and learn a lot along the way. </p>', '<img src=\"images/logo.png\" alt=\"\" />\r\n								<p>Md Rabiul Hasan</p>\r\n								I believe coding should be fun and accessible to everyone. I believe coding should be fun and accessible to everyone. I believe coding should be fun and accessible to everyone. I believe coding should be fun and accessible to everyone.', 'Go from Beginner to Expert', 'Buy the Complete Bundle', '<p class=\"wonit\">Own it forever!</p>\r\n								<p>Limited Time!</p>', 3500, 2000),
(5, 3, 'c.png', 'The Ultimate C Programming Mastery Series', 'Everything you need to build fast and beautiful websites with C Programming in one bundle', '<h5>Complete C Programming Course from Zero to Hero</h5>\r\n								<p> Have you always wanted to learn web development but didn\'t know where to start? Tired of lengthy, boring and outdated courses? This course is for you. <br /><br />\r\n\r\n								A fun, comprehensive and beginner-friendly course that teaches you all the skills you need to build professional-quality websites with HTML5 and CSS3. <br /><br />\r\n\r\n								Say goodbye to long, boring, repetitive courses with outdated content that spend too much time on the basics. This is the only HTML5/CSS3 you\'ll ever need! <br /><br />\r\n\r\n								The first part teaches you the fundamentals, the second part explores advanced concepts and the third part puts everything together to build and deploy a real website. You\'ll start with a Photoshop design mockup and finish with a live website. <br /><br />\r\n\r\n								Whether you’re an absolute beginner wanting to learn web development from scratch, or you know a bit of HTML5/CSS3 and need a refresher course to fill the gaps, this course will help you achieve your goals. </p>', '<ul>\r\n									<li><i class=\"fas fa-chart-bar\"></i> Beginner to Pro </li>\r\n									<li><i class=\"fas fa-bell\"></i> Lifetime Access</li>\r\n									<li><i class=\"far fa-clock\"></i> 14 Hours of Video </li>\r\n									<li><i class=\"fas fa-video\"></i> 180 Lessons </li>\r\n									<li><i class=\"fas fa-comments\"></i> Cheat Sheets</li>\r\n									<li><i class=\"fas fa-cloud-download-alt\"></i> Downloadable</li>\r\n									<li><i class=\"fas fa-closed-captioning\"></i> Subtitles</li>\r\n									<li><i class=\"fas fa-certificate\"></i> Certificate</li>\r\n								</ul>', '<ul>\r\n								<li>Confidently build websites with HTML5/CSS3 </li>\r\n								<li>Build websites that look great on any screen or device </li>\r\n								<li>Troubleshoot issues like a pro</li>\r\n								<li>Deploy your websites to the cloud</li>\r\n							</ul>', '<ul>\r\n								<li>Anyone wanting to become a front-end developer</li>\r\n								<li>Anyone wanting to create websites for fun or to make money</li>\r\n							</ul>', '<p>Everything you need to know from the basics to more advanced concepts are included. I’ve carefully structured this course so anyone can progress quickly and easily and learn a lot along the way. </p>', '<img src=\"images/logo.png\" alt=\"\" />\r\n								<p>Md Rabiul Hasan</p>\r\n								I believe coding should be fun and accessible to everyone. I believe coding should be fun and accessible to everyone. I believe coding should be fun and accessible to everyone. I believe coding should be fun and accessible to everyone.', 'Go from Beginner to Expert', 'Buy the Complete Bundle', '<p class=\"wonit\">Own it forever!</p>\r\n								<p>Limited Time!</p>', 5000, 2500),
(6, 3, 'java.png', 'The Ultimate JAVA Mastery Series', 'Everything you need to build fast and beautiful websites with JAVA in one bundle', '<h5>Complete JAVA Course from Zero to Hero</h5>\r\n								<p> Have you always wanted to learn web development but didn\'t know where to start? Tired of lengthy, boring and outdated courses? This course is for you. <br /><br />\r\n\r\n								A fun, comprehensive and beginner-friendly course that teaches you all the skills you need to build professional-quality websites with HTML5 and CSS3. <br /><br />\r\n\r\n								Say goodbye to long, boring, repetitive courses with outdated content that spend too much time on the basics. This is the only HTML5/CSS3 you\'ll ever need! <br /><br />\r\n\r\n								The first part teaches you the fundamentals, the second part explores advanced concepts and the third part puts everything together to build and deploy a real website. You\'ll start with a Photoshop design mockup and finish with a live website. <br /><br />\r\n\r\n								Whether you’re an absolute beginner wanting to learn web development from scratch, or you know a bit of HTML5/CSS3 and need a refresher course to fill the gaps, this course will help you achieve your goals. </p>', '<ul>\r\n									<li><i class=\"fas fa-chart-bar\"></i> Beginner to Pro </li>\r\n									<li><i class=\"fas fa-bell\"></i> Lifetime Access</li>\r\n									<li><i class=\"far fa-clock\"></i> 14 Hours of Video </li>\r\n									<li><i class=\"fas fa-video\"></i> 180 Lessons </li>\r\n									<li><i class=\"fas fa-comments\"></i> Cheat Sheets</li>\r\n									<li><i class=\"fas fa-cloud-download-alt\"></i> Downloadable</li>\r\n									<li><i class=\"fas fa-closed-captioning\"></i> Subtitles</li>\r\n									<li><i class=\"fas fa-certificate\"></i> Certificate</li>\r\n								</ul>', '<ul>\r\n								<li>Confidently build websites with HTML5/CSS3 </li>\r\n								<li>Build websites that look great on any screen or device </li>\r\n								<li>Troubleshoot issues like a pro</li>\r\n								<li>Deploy your websites to the cloud</li>\r\n							</ul>', '<ul>\r\n								<li>Anyone wanting to become a front-end developer</li>\r\n								<li>Anyone wanting to create websites for fun or to make money</li>\r\n							</ul>', '<p>Everything you need to know from the basics to more advanced concepts are included. I’ve carefully structured this course so anyone can progress quickly and easily and learn a lot along the way. </p>', '<img src=\"images/logo.png\" alt=\"\" />\r\n								<p>Md Rabiul Hasan</p>\r\n								I believe coding should be fun and accessible to everyone. I believe coding should be fun and accessible to everyone. I believe coding should be fun and accessible to everyone. I believe coding should be fun and accessible to everyone.', 'Go from Beginner to Expert', 'Buy the Complete Bundle', '<p class=\"wonit\">Own it forever!</p>\r\n								<p>Limited Time!</p>', 5500, 3500);

-- --------------------------------------------------------

--
-- Table structure for table `course_category`
--

CREATE TABLE `course_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_category`
--

INSERT INTO `course_category` (`id`, `name`) VALUES
(1, 'Front End'),
(2, 'Back End'),
(3, 'Programming languages'),
(4, 'Test Category One'),
(5, 'Test Category Two');

-- --------------------------------------------------------

--
-- Table structure for table `email_verify`
--

CREATE TABLE `email_verify` (
  `id` int(11) NOT NULL,
  `otp` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice`, `price`, `status`, `name`, `email`, `mobile`, `address`, `date`) VALUES
(25, 'GRNDCRS9800756', 1500, 'Paid', 'Md Rabiul Hasan', 'rhr2416@gmail.com', 1879408425, 'Eidgah, Chittagong, Bangladesh', '2021-08-07'),
(26, 'GRNDCRS4347593', 2500, 'Paid', 'Md Rabiul Hasan', 'rhr2416@gmail.com', 1879408425, 'Eidgah, Chittagong, Bangladesh', '2021-08-07'),
(27, 'GRNDCRS3617561', 1500, 'Paid', 'Md Rabiul Hasan', 'rhr2416@gmail.com', 1879408425, 'Eidgah, Chittagong, Bangladesh', '2021-08-07'),
(28, 'GRNDCRS1442564', 2500, 'Paid', 'Md Rabiul Hasan', 'rhr2416@gmail.com', 1879408425, 'Eidgah, Chittagong, Bangladesh', '2021-08-07'),
(29, 'GRNDCRS470827', 3000, 'Paid', 'Md Rabiul Hasan', 'rhr2416@gmail.com', 1879408425, 'Eidgah, Chittagong, Bangladesh', '2021-08-07'),
(30, 'GRNDCRS6214910', 2500, 'Paid', 'Md Rabiul Hasan', 'rhr2416@gmail.com', 1879408425, 'Eidgah, Chittagong, Bangladesh', '2021-08-07'),
(31, 'GRNDCRS2956524', 1500, 'Paid', 'Md Rabiul Hasan', 'rhr2416@gmail.com', 1879408425, 'Eidgah, Chittagong, Bangladesh', '2021-08-07'),
(32, 'GRNDCRS6957961', 2000, 'Paid', 'Md Rabiul Hasan', 'rhr2416@gmail.com', 1879408425, 'Eidgah, Chittagong, Bangladesh', '2021-08-08'),
(33, 'GRNDCRS166043', 2500, 'Paid', 'Md Rabiul Hasan', 'rhr2416@gmail.com', 1879408425, 'Eidgah, Chittagong, Bangladesh', '2021-08-09'),
(34, 'GRNDCRS8751007', 2500, 'Paid', 'Md Rabiul Hasan', 'rhr2416@gmail.com', 1879408425, 'Eidgah, Chittagong, Bangladesh', '2021-08-09'),
(35, 'GRNDCRS8385573', 1500, 'Paid', 'Md Rabiul Hasan', 'rhr2416@gmail.com', 1879408425, 'Eidgah, Chittagong, Bangladesh', '2021-08-09'),
(36, 'GRNDCRS1658604', 1500, 'Paid', 'Md Rabiul Hasan', 'rhr2416@gmail.com', 1879408425, 'Eidgah, Chittagong, Bangladesh', '2021-08-10'),
(37, 'GRNDCRS1658604', 1500, 'Paid', 'Md Rabiul Hasan', 'rhr2416@gmail.com', 1879408425, 'Eidgah, Chittagong, Bangladesh', '2021-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'PHP'),
(2, 'JavaScript'),
(3, 'C Programming'),
(4, 'JAVA'),
(5, 'NodeJS'),
(6, 'ExpressJS'),
(7, 'HTML'),
(8, 'CSS'),
(9, 'Bootstrap');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tags`, `date`) VALUES
(1, 1, 'Introduction of PHP', '<p>\r\nPHP started out as a small open source project that evolved as more and more people found out how useful it was. Rasmus Lerdorf unleashed the first version of PHP way back in 1994.<br><br>\r\n\r\n-> PHP is a recursive acronym for \"PHP: Hypertext Preprocessor\".<br><br>\r\n\r\n-> PHP is a server side scripting language that is embedded in HTML. It is used to manage dynamic content, databases, session tracking, even build entire e-commerce sites.<br><br>\r\n\r\n-> It is integrated with a number of popular databases, including MySQL, PostgreSQL, Oracle, Sybase, Informix, and Microsoft SQL Server.<br><br>\r\n\r\n-> PHP is pleasingly zippy in its execution, especially when compiled as an Apache module on the Unix side. The MySQL server, once started, executes even very complex queries with huge result sets in record-setting time.<br><br>\r\n\r\n-> PHP supports a large number of major protocols such as POP3, IMAP, and LDAP. PHP4 added support for Java and distributed object architectures (COM and CORBA), making n-tier development a possibility for the first time.<br><br>\r\n\r\n-> PHP is forgiving: PHP language tries to be as forgiving as possible.<br><br>\r\n\r\n-> PHP Syntax is C-Like.<br>\r\n</p>', 'php.jpg', 'Rabiul', 'php', '2021-06-08 13:04:06'),
(2, 1, 'Built-In Functions of PHP', '<p>PHP is very rich in terms of Buil-in functions. Here is the list of various important function categories. There are various other function categories which are not covered here. <br><br>\r\n\r\nSelect a category to see a list of all the functions related to that category.\r\n<pre>\r\n=> PHP Array Functions\r\n\r\n=> PHP bzip2 Functions\r\n\r\n=> PHP Calender Functions\r\n\r\n=> PHP Class/Object Functions\r\n\r\n=> PHP Character Functions\r\n\r\n=> PHP Cond Functions\r\n\r\n=> PHP Collectable Functions\r\n\r\n=> PHP Collection Functions\r\n\r\n=> PHP Date & Time Functions\r\n\r\n=> PHP Deque Functions\r\n\r\n=> PHP Directory Functions\r\n\r\n=> PHP Direct I/O Functions\r\n\r\n=> PHP Error Handling Functions\r\n\r\n=> PHP FileInfo Functions\r\n\r\n=> PHP File System Functions\r\n\r\n=> PHP Forms Data Format Functions\r\n\r\n=> PHP Function Handling Functions\r\n\r\n=> PHP Geoip Functions\r\n\r\n=> PHP GMP Functions\r\n\r\n=> PHP Hash Functions\r\n\r\n=> PHP Hashble Functions\r\n\r\n=> PHP IMAP Functions\r\n\r\n=> PHP Inotify Functions\r\n\r\n=> PHP JavaScript Object Notation Functions\r\n\r\n=> PHP Judy Arrays Functions\r\n\r\n=> PHP LibXML Functions\r\n\r\n=> PHP Lua Functions\r\n\r\n=> PHP Map Functions\r\n\r\n=> PHP Memcache Functions\r\n\r\n=> PHP Mhash Functions\r\n\r\n=> PHP Mutex Functions\r\n\r\n=> PHP MySQL Functions\r\n\r\n=> PHP Network Functions\r\n\r\n=> PHP ODBC Functions\r\n\r\n=> PHP Password Functions\r\n\r\n=> PHP Pair Functions\r\n\r\n=> PHP Phar Functions\r\n\r\n=> PHP Phdfs Functions\r\n\r\n=> PHP Pool Functions\r\n\r\n=> PHP PriorityQueue Functions\r\n\r\n=> PHP Proctitle Functions\r\n\r\n=> PHP Queue Functions\r\n\r\n=> PHP Sequence Functions\r\n\r\n=> PHP Session Functions\r\n\r\n=> PHP Set Functions\r\n\r\n=> PHP SimpleXML Functions\r\n\r\n=> PHP Statistics Module\r\n\r\n=> PHP Stack Functions\r\n\r\n=> PHP String Functions\r\n\r\n=> PHP Thread Functions\r\n\r\n=> PHP Threaded Functions\r\n\r\n=> PHP Tokenizer Functions\r\n\r\n=> PHP URL\'s Functions\r\n\r\n=> PHP Vector Functions\r\n\r\n=> PHP Variable Handling Functions\r\n\r\n=> PHP Xattr Functions\r\n\r\n=> PHP Xdiff Functions\r\n\r\n=> PHP XML Functions\r\n\r\n=> PHP XML Parsing Functions\r\n\r\n=> PHP XML Reader Functions\r\n\r\n=> PHP XML Writer Functions\r\n\r\n=> PHP XSLT Processor Functions\r\n\r\n=> PHP OpenSSL Functions\r\n\r\n=> PHP Worker Functions\r\n\r\n=> PHP YAML Data Serialization Functions</pre></p>', 'php.jpg', 'Rabiul', 'php', '2021-06-08 13:04:06'),
(3, 2, 'Languages over JavaScript.', '<p>\r\nThe syntax of JavaScript does not suit everyone’s needs. Different people want different features.<br><br>\r\n\r\nThat’s to be expected, because projects and requirements are different for everyone.<br><br>\r\n\r\nSo recently a plethora of new languages appeared, which are transpiled (converted) to JavaScript before they run in the browser.<br><br>\r\n\r\nModern tools make the transpilation very fast and transparent, actually allowing developers to code in another language and auto-converting it “under the hood”.<br><br>\r\n\r\nExamples of such languages:<br><br>\r\n\r\n<b>CoffeeScript</b> is a “syntactic sugar” for JavaScript. It introduces shorter syntax, allowing us to write clearer and more precise code. Usually, Ruby devs like it.<br><br>\r\n\r\n<b>TypeScript</b> is concentrated on adding “strict data typing” to simplify the development and support of complex systems. It is developed by Microsoft.\r\n<br><br>\r\n<b>Flow</b> also adds data typing, but in a different way. Developed by Facebook.\r\n<br><br>\r\n<b>Dart</b> is a standalone language that has its own engine that runs in non-browser environments (like mobile apps), but also can be transpiled to JavaScript. Developed by Google.\r\n<br><br>\r\n<b>Brython</b> is a Python transpiler to JavaScript that enables the writing of applications in pure Python without JavaScript.\r\n<br><br>\r\n<b>Kotlin</b> is a modern, concise and safe programming language that can target the browser or Node.<br>\r\n</p>', 'java.jpg', 'Md', 'Javascript', '2021-06-08 13:04:06'),
(4, 2, 'What can in-browser JavaScript do?', '<p>\r\nModern JavaScript is a “safe” programming language. It does not provide low-level access to memory or CPU, because it was initially created for browsers which do not require it.<br><br>\r\n\r\nJavaScript’s capabilities greatly depend on the environment it’s running in. For instance, Node.js supports functions that allow JavaScript to read/write arbitrary files, perform network requests, etc.<br><br>\r\n\r\nIn-browser JavaScript can do everything related to webpage manipulation, interaction with the user, and the webserver.<br><br>\r\n\r\nFor instance, in-browser JavaScript is able to:<br>\r\n\r\n=> Add new HTML to the page, change the existing content, modify styles.\r\n<br>\r\n=> React to user actions, run on mouse clicks, pointer movements, key presses.<br>\r\n=> Send requests over the network to remote servers, download and upload files (so-called AJAX and COMET technologies).<br>\r\n=> Get and set cookies, ask questions to the visitor, show messages.<br>\r\n=> Remember the data on the client-side (“local storage”).<br></p>', 'js.jpg', 'Md', 'Javascript', '2021-06-08 13:04:06'),
(5, 4, 'What Are Objects in Java?', '<p><b>An object is an entity that has states and behaviors.</b><br>\r\n\r\nFor example, dog, cat, and vehicle. To illustrate, a dog has states like age, color, name, and behaviors like eating, sleeping, and running.<br>\r\n\r\nState tells us how the object looks or what properties it has.<br>\r\n\r\nBehavior tells us what the object does.<br>\r\n\r\nWe can actually represent a real world dog in a program as a software object by defining its states and behaviors.<br>\r\n\r\nSoftware objects are the actual representation of real world objects. Memory is allocated in RAM whenever creating a logical object.<br>\r\n\r\nAn object is also referred to an instance of a class. Instantiating a class means the same thing as creating an object.<br>\r\n\r\nThe important thing to remember when creating an object is: the reference type should be the same type or a super type of the object type. We’ll see what a reference type is later in this article.<br></p>', 'java.jpg', 'Raju', '<p>java, programming</p>', '2021-05-30 12:19:04'),
(6, 4, '8 New Features in Java 10 That You Should Know About.', '<p>Java is a very popular language pertaining to its amazing features. It dates 20 years back but still qualifies as one of the most exciting languages to work with. Recently, Java 10 is launched with a mix of exciting new features. Here is an overview of the 10 most significant features you will work when using Java 10:\r\n\r\n<br><br><b>1.Local Variable Type Inference</b><br>\r\n\r\nJava now features a var keyword similar to Javascript to declare a variable without specifying its type. The stored value of the variable will indicate the variable type. For example, if you have written this line of code, var name = “Name” then the compiler will know that the variable value is a String.<br>\r\n\r\nVar keyword can only be used for declaration of local variables and can not be used for member variable declaration (which is done inside the class body). You also need to note that this change still does not make it a dynamically typed language such as Python. However, this feature reduces a lot of lines of code which are otherwise required to declare local variables using the Java language.\r\n\r\n<br><br><b>2. Time-Based Released Versioning</b><br>\r\n\r\nJava has scheduled a new release every six months since JDK 10 release. This approach has received a mix of both positive and negative reviews from the Java community. The update element also increments 1 month after a Feature element. This means that the April 2018 java release is JDK 10.0.1, whereas July 2018 release is JDK 10.0.2 so on and so forth.\r\n\r\n\r\n\r\n\r\n \r\n<br><br><b>3. Garbage-Collector Interface (JEP 304)</b><br>\r\n\r\nGarbage Collector interface is another useful and interesting Java 10 feature. It gives a clean garbage collector interface which means that you can now exclude GC from a JDK build. This makes it easy to add a new GC without working on the code base. Read about Java Memory Management to understand how G1 Garbage Collection works and learn the difference between G1 and Concurrent Mark Sweep Garbage Collector.\r\n\r\n<br><br><b>4. Heap Allocation on Alternative Memory Devices (JEP 316)</b><br>\r\n\r\nHeap Allocation on Alternative Memory Devices is another great Java 10 feature. It helps to enable HotSpot VM to allocate Java object heap on an alternative memory device indicated by the user. This feature also makes it possible to allocate lower priority procedures for using the NV-DIMM memory while assisting the higher priority procedures to the DRAM in a multi-JVM environment.\r\n\r\n<br><br><b>5. Root Certificates (JEP 319)</b><br>\r\n\r\nRoot Certificates is another significant change featured in Java 10. JDK 10 was built in connection with OpenJDK and that’s prominent from this feature, as it offers a default set of root Certification Authority. It also focuses on reducing the difference between OpenJDK and Oracle JDK. Security components such as TLS are default enabled in OpenJDK builds.\r\n\r\n<br><br><b>6. Thread-Local Handshakes (JEP 312)</b><br>\r\n\r\nThread-Local Handshakes in Java 10 offers an improved VM performance. It enables callback on application threads without the execution of a global VM savepoint. This means that the JVM can now also stop individual threads instead of collective threads whenever required.<br>\r\n\r\nSmall improvements are also done as part of this feature to enhance VM performance. Various memory barriers are removed from JVM with an improved biased locking to stop individual threads for revoking biases.\r\n\r\n<br><br><b>7. Application class-data sharing</b><br>\r\n\r\nClass-Data Sharing time was introduced in Java 5 to improve startup times of small java applications. It helped in loading the class metadata so as not to load all of it each time. This shared data cache signified a big improvement in startup times for small applications as the relative core class size was mostly larger in size than the application. In Java 10, this feature is further extended to include the system classloader and the platform classloader. To benefit from that, simply add -XX:+UseAppCDS as a parameter.\r\n\r\n<br><br><b>8. Remove the Native-Header Generation Tool (JEP 313) & Deprecated Methods</b>\r\n\r\nRemove the Native-Header Generation Toll focuses on housekeeping by eliminating javah tool from JDK. Javah was separately used to generate header files for compilation of JNI code. It will be done through javac now.<br>\r\n\r\nDeprecated methods such as java.security can be removed by setting the value of forRemoval=true in a deprecated text. The java.security.acl is also marked for removal by setting ForRemoval=true in a deprecated text.  Some fields and methods of java.lang.SecurityManager are also set for removal in Java 10. javax.security.auth.Policy is marked for removal setting the same value whereas its features are available in java.security.Policy. com.sun.security.auth.** classes set for removal using forRemoval=True value in JDK 9 is removed from this version.\r\n\r\n<br><br><b>Conclusion</b><br>\r\n\r\nJava 10 features and changes are not something that will ring an alarm bell for the developers’ community. It mainly comprises a list of minor changes for enhancing the language’s performance. However, it also signifies the first series of changes in the release cycle. Java 10 is delivered on time as expected like its compiler. However, only the time will tell how the Java community responds to the new changes. For now, the developers can enjoy working with Java 10 as it has become much more powerful and useful compared to its previous versions.</p>', 'java.jpg', 'raju', '<p>java, programming</p>', '2021-05-30 12:19:04'),
(7, 3, 'C Program to Find the Factorial of a Number.', '<p>Now let’s see a small C program based on what we’ve learned above. The objective of the program is to print the factorial of any given number.<br><br>\r\n<pre>\r\n\r\n\r\n\r\n#include &lt;stdio.h&gt;\r\n\r\nint main()    \r\n\r\n{    \r\n\r\n int i,factorial=1,num=0;    \r\n\r\n printf(\"Enter the number for which the factorial need to be calculated? \");    \r\n\r\n  scanf(\"%d\",&num);    \r\n\r\n    for(i=1;i<=numb;i++){    \r\n\r\n      factorial=factorial*i;    \r\n\r\n  }    \r\n\r\n  printf(\"Factorial of the given number %d is %d\",num,factorial);    \r\n\r\nreturn 0; \r\n\r\n}  \r\n\r\n<b>Output:</b>\r\n\r\nEnter the number for which the factorial needs to be calculated?\r\n\r\n5\r\n\r\nFactorial of the given number 5 is 120\r\n</pre></p>', 'c.jpg', 'Hasan', 'c programming', '2021-06-08 13:05:25'),
(8, 3, 'Importance of C Programming.', '<p><b>C programming language has following importances:</b><br><br>\r\n\r\n<b>1)</b> C is robust language and has rich set of built-in functions, data types and operators which can be used to write any complex program.<br><br>\r\n\r\n<b>2)</b> Program written in C are efficient due to availability of several data types and operators.<br><br>\r\n\r\n<b>3)</b> C has the capabilities of an assembly language (low level features) with the feature of high level language so it is well suited for writing both system software and application software.<br><br>\r\n\r\n<b>4)</b> C is highly portable language i.e. code written in one machine can be moved to other which is very important and powerful feature.<br><br>\r\n\r\n<b>5)</b> C supports low level features like bit level programming and direct access to memory using pointer which is very useful for managing resource efficiently.<br><br>\r\n\r\n<b>6)</b> C has high level constructs and it is more user friendly as its syntaxes approaches to English like language.<br></p>', 'c.jpg', 'Imtiaz', 'c programming', '2021-06-08 13:05:25'),
(9, 4, 'What is Java and why is it important?', '<p>Java, not unlike many of the technologies which influence our everyday lives to this very day, originated in California, under the purview of Sun Microsystems, a company founded in 1982 by Andreas Bechtolsheim, Vinod Khosla, and Scott McNeally. With that said, tech-savvy types tend to look more to the future than the past, so if you find yourself more curious about the modern world of coding, or find yourself questioning just how influential Java has been to the world of technology, you don’t particularly want a history lesson. You’re most likely looking for the modern applicability and influence of a technology that has continued to evolve consistently in order to keep up with the times.<br><br>\r\n\r\nJava is a programming language, designed to be concurrent, class-based and object-oriented, as well as a computing platform first released by Sun Microsystems in 1995. An enormous amount of applications and websites will not work unless you have Java installed, and more are created every day. Denying yourself Java is akin to denying yourself access to a technological infrastructure. Java is advertised, and esteemed for its fast performance, security, and reliability.</p>', 'java.jpg', 'Md Rabiul Hasan', 'java', '2021-06-08 15:13:17'),
(42, 1, 'Introduction of PHP', '<p>\r\nPHP started out as a small open source project that evolved as more and more people found out how useful it was. Rasmus Lerdorf unleashed the first version of PHP way back in 1994.<br><br>\r\n\r\n-> PHP is a recursive acronym for \"PHP: Hypertext Preprocessor\".<br><br>\r\n\r\n-> PHP is a server side scripting language that is embedded in HTML. It is used to manage dynamic content, databases, session tracking, even build entire e-commerce sites.<br><br>\r\n\r\n-> It is integrated with a number of popular databases, including MySQL, PostgreSQL, Oracle, Sybase, Informix, and Microsoft SQL Server.<br><br>\r\n\r\n-> PHP is pleasingly zippy in its execution, especially when compiled as an Apache module on the Unix side. The MySQL server, once started, executes even very complex queries with huge result sets in record-setting time.<br><br>\r\n\r\n-> PHP supports a large number of major protocols such as POP3, IMAP, and LDAP. PHP4 added support for Java and distributed object architectures (COM and CORBA), making n-tier development a possibility for the first time.<br><br>\r\n\r\n-> PHP is forgiving: PHP language tries to be as forgiving as possible.<br><br>\r\n\r\n-> PHP Syntax is C-Like.<br>\r\n</p>', 'php.jpg', 'Rabiul', 'php', '2021-06-08 13:04:06'),
(43, 1, 'Built-In Functions of PHP', '<p>PHP is very rich in terms of Buil-in functions. Here is the list of various important function categories. There are various other function categories which are not covered here. <br><br>\r\n\r\nSelect a category to see a list of all the functions related to that category.\r\n<pre>\r\n=> PHP Array Functions\r\n\r\n=> PHP bzip2 Functions\r\n\r\n=> PHP Calender Functions\r\n\r\n=> PHP Class/Object Functions\r\n\r\n=> PHP Character Functions\r\n\r\n=> PHP Cond Functions\r\n\r\n=> PHP Collectable Functions\r\n\r\n=> PHP Collection Functions\r\n\r\n=> PHP Date & Time Functions\r\n\r\n=> PHP Deque Functions\r\n\r\n=> PHP Directory Functions\r\n\r\n=> PHP Direct I/O Functions\r\n\r\n=> PHP Error Handling Functions\r\n\r\n=> PHP FileInfo Functions\r\n\r\n=> PHP File System Functions\r\n\r\n=> PHP Forms Data Format Functions\r\n\r\n=> PHP Function Handling Functions\r\n\r\n=> PHP Geoip Functions\r\n\r\n=> PHP GMP Functions\r\n\r\n=> PHP Hash Functions\r\n\r\n=> PHP Hashble Functions\r\n\r\n=> PHP IMAP Functions\r\n\r\n=> PHP Inotify Functions\r\n\r\n=> PHP JavaScript Object Notation Functions\r\n\r\n=> PHP Judy Arrays Functions\r\n\r\n=> PHP LibXML Functions\r\n\r\n=> PHP Lua Functions\r\n\r\n=> PHP Map Functions\r\n\r\n=> PHP Memcache Functions\r\n\r\n=> PHP Mhash Functions\r\n\r\n=> PHP Mutex Functions\r\n\r\n=> PHP MySQL Functions\r\n\r\n=> PHP Network Functions\r\n\r\n=> PHP ODBC Functions\r\n\r\n=> PHP Password Functions\r\n\r\n=> PHP Pair Functions\r\n\r\n=> PHP Phar Functions\r\n\r\n=> PHP Phdfs Functions\r\n\r\n=> PHP Pool Functions\r\n\r\n=> PHP PriorityQueue Functions\r\n\r\n=> PHP Proctitle Functions\r\n\r\n=> PHP Queue Functions\r\n\r\n=> PHP Sequence Functions\r\n\r\n=> PHP Session Functions\r\n\r\n=> PHP Set Functions\r\n\r\n=> PHP SimpleXML Functions\r\n\r\n=> PHP Statistics Module\r\n\r\n=> PHP Stack Functions\r\n\r\n=> PHP String Functions\r\n\r\n=> PHP Thread Functions\r\n\r\n=> PHP Threaded Functions\r\n\r\n=> PHP Tokenizer Functions\r\n\r\n=> PHP URL\'s Functions\r\n\r\n=> PHP Vector Functions\r\n\r\n=> PHP Variable Handling Functions\r\n\r\n=> PHP Xattr Functions\r\n\r\n=> PHP Xdiff Functions\r\n\r\n=> PHP XML Functions\r\n\r\n=> PHP XML Parsing Functions\r\n\r\n=> PHP XML Reader Functions\r\n\r\n=> PHP XML Writer Functions\r\n\r\n=> PHP XSLT Processor Functions\r\n\r\n=> PHP OpenSSL Functions\r\n\r\n=> PHP Worker Functions\r\n\r\n=> PHP YAML Data Serialization Functions</pre></p>', 'php.jpg', 'Rabiul', 'php', '2021-06-08 13:04:06'),
(44, 2, 'Languages over JavaScript.', '<p>\r\nThe syntax of JavaScript does not suit everyone’s needs. Different people want different features.<br><br>\r\n\r\nThat’s to be expected, because projects and requirements are different for everyone.<br><br>\r\n\r\nSo recently a plethora of new languages appeared, which are transpiled (converted) to JavaScript before they run in the browser.<br><br>\r\n\r\nModern tools make the transpilation very fast and transparent, actually allowing developers to code in another language and auto-converting it “under the hood”.<br><br>\r\n\r\nExamples of such languages:<br><br>\r\n\r\n<b>CoffeeScript</b> is a “syntactic sugar” for JavaScript. It introduces shorter syntax, allowing us to write clearer and more precise code. Usually, Ruby devs like it.<br><br>\r\n\r\n<b>TypeScript</b> is concentrated on adding “strict data typing” to simplify the development and support of complex systems. It is developed by Microsoft.\r\n<br><br>\r\n<b>Flow</b> also adds data typing, but in a different way. Developed by Facebook.\r\n<br><br>\r\n<b>Dart</b> is a standalone language that has its own engine that runs in non-browser environments (like mobile apps), but also can be transpiled to JavaScript. Developed by Google.\r\n<br><br>\r\n<b>Brython</b> is a Python transpiler to JavaScript that enables the writing of applications in pure Python without JavaScript.\r\n<br><br>\r\n<b>Kotlin</b> is a modern, concise and safe programming language that can target the browser or Node.<br>\r\n</p>', 'java.jpg', 'Md', 'Javascript', '2021-06-08 13:04:06'),
(45, 2, 'What can in-browser JavaScript do?', '<p>\r\nModern JavaScript is a “safe” programming language. It does not provide low-level access to memory or CPU, because it was initially created for browsers which do not require it.<br><br>\r\n\r\nJavaScript’s capabilities greatly depend on the environment it’s running in. For instance, Node.js supports functions that allow JavaScript to read/write arbitrary files, perform network requests, etc.<br><br>\r\n\r\nIn-browser JavaScript can do everything related to webpage manipulation, interaction with the user, and the webserver.<br><br>\r\n\r\nFor instance, in-browser JavaScript is able to:<br>\r\n\r\n=> Add new HTML to the page, change the existing content, modify styles.\r\n<br>\r\n=> React to user actions, run on mouse clicks, pointer movements, key presses.<br>\r\n=> Send requests over the network to remote servers, download and upload files (so-called AJAX and COMET technologies).<br>\r\n=> Get and set cookies, ask questions to the visitor, show messages.<br>\r\n=> Remember the data on the client-side (“local storage”).<br></p>', 'js.jpg', 'Md', 'Javascript', '2021-06-08 13:04:06'),
(46, 4, 'What Are Objects in Java?', '<p><b>An object is an entity that has states and behaviors.</b><br>\r\n\r\nFor example, dog, cat, and vehicle. To illustrate, a dog has states like age, color, name, and behaviors like eating, sleeping, and running.<br>\r\n\r\nState tells us how the object looks or what properties it has.<br>\r\n\r\nBehavior tells us what the object does.<br>\r\n\r\nWe can actually represent a real world dog in a program as a software object by defining its states and behaviors.<br>\r\n\r\nSoftware objects are the actual representation of real world objects. Memory is allocated in RAM whenever creating a logical object.<br>\r\n\r\nAn object is also referred to an instance of a class. Instantiating a class means the same thing as creating an object.<br>\r\n\r\nThe important thing to remember when creating an object is: the reference type should be the same type or a super type of the object type. We’ll see what a reference type is later in this article.<br></p>', 'java.jpg', 'Raju', '<p>java, programming</p>', '2021-05-30 12:19:04'),
(47, 4, '8 New Features in Java 10 That You Should Know About.', '<p>Java is a very popular language pertaining to its amazing features. It dates 20 years back but still qualifies as one of the most exciting languages to work with. Recently, Java 10 is launched with a mix of exciting new features. Here is an overview of the 10 most significant features you will work when using Java 10:\r\n\r\n<br><br><b>1.Local Variable Type Inference</b><br>\r\n\r\nJava now features a var keyword similar to Javascript to declare a variable without specifying its type. The stored value of the variable will indicate the variable type. For example, if you have written this line of code, var name = “Name” then the compiler will know that the variable value is a String.<br>\r\n\r\nVar keyword can only be used for declaration of local variables and can not be used for member variable declaration (which is done inside the class body). You also need to note that this change still does not make it a dynamically typed language such as Python. However, this feature reduces a lot of lines of code which are otherwise required to declare local variables using the Java language.\r\n\r\n<br><br><b>2. Time-Based Released Versioning</b><br>\r\n\r\nJava has scheduled a new release every six months since JDK 10 release. This approach has received a mix of both positive and negative reviews from the Java community. The update element also increments 1 month after a Feature element. This means that the April 2018 java release is JDK 10.0.1, whereas July 2018 release is JDK 10.0.2 so on and so forth.\r\n\r\n\r\n\r\n\r\n \r\n<br><br><b>3. Garbage-Collector Interface (JEP 304)</b><br>\r\n\r\nGarbage Collector interface is another useful and interesting Java 10 feature. It gives a clean garbage collector interface which means that you can now exclude GC from a JDK build. This makes it easy to add a new GC without working on the code base. Read about Java Memory Management to understand how G1 Garbage Collection works and learn the difference between G1 and Concurrent Mark Sweep Garbage Collector.\r\n\r\n<br><br><b>4. Heap Allocation on Alternative Memory Devices (JEP 316)</b><br>\r\n\r\nHeap Allocation on Alternative Memory Devices is another great Java 10 feature. It helps to enable HotSpot VM to allocate Java object heap on an alternative memory device indicated by the user. This feature also makes it possible to allocate lower priority procedures for using the NV-DIMM memory while assisting the higher priority procedures to the DRAM in a multi-JVM environment.\r\n\r\n<br><br><b>5. Root Certificates (JEP 319)</b><br>\r\n\r\nRoot Certificates is another significant change featured in Java 10. JDK 10 was built in connection with OpenJDK and that’s prominent from this feature, as it offers a default set of root Certification Authority. It also focuses on reducing the difference between OpenJDK and Oracle JDK. Security components such as TLS are default enabled in OpenJDK builds.\r\n\r\n<br><br><b>6. Thread-Local Handshakes (JEP 312)</b><br>\r\n\r\nThread-Local Handshakes in Java 10 offers an improved VM performance. It enables callback on application threads without the execution of a global VM savepoint. This means that the JVM can now also stop individual threads instead of collective threads whenever required.<br>\r\n\r\nSmall improvements are also done as part of this feature to enhance VM performance. Various memory barriers are removed from JVM with an improved biased locking to stop individual threads for revoking biases.\r\n\r\n<br><br><b>7. Application class-data sharing</b><br>\r\n\r\nClass-Data Sharing time was introduced in Java 5 to improve startup times of small java applications. It helped in loading the class metadata so as not to load all of it each time. This shared data cache signified a big improvement in startup times for small applications as the relative core class size was mostly larger in size than the application. In Java 10, this feature is further extended to include the system classloader and the platform classloader. To benefit from that, simply add -XX:+UseAppCDS as a parameter.\r\n\r\n<br><br><b>8. Remove the Native-Header Generation Tool (JEP 313) & Deprecated Methods</b>\r\n\r\nRemove the Native-Header Generation Toll focuses on housekeeping by eliminating javah tool from JDK. Javah was separately used to generate header files for compilation of JNI code. It will be done through javac now.<br>\r\n\r\nDeprecated methods such as java.security can be removed by setting the value of forRemoval=true in a deprecated text. The java.security.acl is also marked for removal by setting ForRemoval=true in a deprecated text.  Some fields and methods of java.lang.SecurityManager are also set for removal in Java 10. javax.security.auth.Policy is marked for removal setting the same value whereas its features are available in java.security.Policy. com.sun.security.auth.** classes set for removal using forRemoval=True value in JDK 9 is removed from this version.\r\n\r\n<br><br><b>Conclusion</b><br>\r\n\r\nJava 10 features and changes are not something that will ring an alarm bell for the developers’ community. It mainly comprises a list of minor changes for enhancing the language’s performance. However, it also signifies the first series of changes in the release cycle. Java 10 is delivered on time as expected like its compiler. However, only the time will tell how the Java community responds to the new changes. For now, the developers can enjoy working with Java 10 as it has become much more powerful and useful compared to its previous versions.</p>', 'java.jpg', 'raju', '<p>java, programming</p>', '2021-05-30 12:19:04'),
(48, 3, 'C Program to Find the Factorial of a Number.', '<p>Now let’s see a small C program based on what we’ve learned above. The objective of the program is to print the factorial of any given number.<br><br>\r\n<pre>\r\n\r\n\r\n\r\n#include &lt;stdio.h&gt;\r\n\r\nint main()    \r\n\r\n{    \r\n\r\n int i,factorial=1,num=0;    \r\n\r\n printf(\"Enter the number for which the factorial need to be calculated? \");    \r\n\r\n  scanf(\"%d\",&num);    \r\n\r\n    for(i=1;i<=numb;i++){    \r\n\r\n      factorial=factorial*i;    \r\n\r\n  }    \r\n\r\n  printf(\"Factorial of the given number %d is %d\",num,factorial);    \r\n\r\nreturn 0; \r\n\r\n}  \r\n\r\n<b>Output:</b>\r\n\r\nEnter the number for which the factorial needs to be calculated?\r\n\r\n5\r\n\r\nFactorial of the given number 5 is 120\r\n</pre></p>', 'c.jpg', 'Hasan', 'c programming', '2021-06-08 13:05:25'),
(49, 3, 'Importance of C Programming.', '<p><b>C programming language has following importances:</b><br><br>\r\n\r\n<b>1)</b> C is robust language and has rich set of built-in functions, data types and operators which can be used to write any complex program.<br><br>\r\n\r\n<b>2)</b> Program written in C are efficient due to availability of several data types and operators.<br><br>\r\n\r\n<b>3)</b> C has the capabilities of an assembly language (low level features) with the feature of high level language so it is well suited for writing both system software and application software.<br><br>\r\n\r\n<b>4)</b> C is highly portable language i.e. code written in one machine can be moved to other which is very important and powerful feature.<br><br>\r\n\r\n<b>5)</b> C supports low level features like bit level programming and direct access to memory using pointer which is very useful for managing resource efficiently.<br><br>\r\n\r\n<b>6)</b> C has high level constructs and it is more user friendly as its syntaxes approaches to English like language.<br></p>', 'c.jpg', 'Imtiaz', 'c programming', '2021-06-08 13:05:25'),
(50, 4, 'What is Java and why is it important?', '<p>Java, not unlike many of the technologies which influence our everyday lives to this very day, originated in California, under the purview of Sun Microsystems, a company founded in 1982 by Andreas Bechtolsheim, Vinod Khosla, and Scott McNeally. With that said, tech-savvy types tend to look more to the future than the past, so if you find yourself more curious about the modern world of coding, or find yourself questioning just how influential Java has been to the world of technology, you don’t particularly want a history lesson. You’re most likely looking for the modern applicability and influence of a technology that has continued to evolve consistently in order to keep up with the times.<br><br>\r\n\r\nJava is a programming language, designed to be concurrent, class-based and object-oriented, as well as a computing platform first released by Sun Microsystems in 1995. An enormous amount of applications and websites will not work unless you have Java installed, and more are created every day. Denying yourself Java is akin to denying yourself access to a technological infrastructure. Java is advertised, and esteemed for its fast performance, security, and reliability.</p>', 'java.jpg', 'Md Rabiul Hasan', 'java', '2021-06-08 15:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `date`) VALUES
(24, 'rhr2416@gmail.com', '$2y$10$yOAtW05I55vth71sZsNhb.sNQnNU9x3gRIDhS5CTxNzWMbDXUxoyG', '2021-08-07 15:00:52'),
(25, 'raju@gmail.com', '$2y$10$ofPEdZjKBXkVlZfxzHXGv.JvEGpDKjVhcFiW/OUdRPRBEfPLzXxIe', '2021-08-07 23:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `mobile` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `userid`, `name`, `address`, `mobile`) VALUES
(22, 24, 'Md Rabiul Hasan', 'Eidgah, Chittagong, Bangladesh', 1879408425),
(23, 25, 'Test Name', 'test address', 1845268547);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments_reply`
--
ALTER TABLE `comments_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_category`
--
ALTER TABLE `course_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_verify`
--
ALTER TABLE `email_verify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `comments_reply`
--
ALTER TABLE `comments_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `course_category`
--
ALTER TABLE `course_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `email_verify`
--
ALTER TABLE `email_verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
