-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2024 at 11:36 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pelacek_cassidy_portfolio1`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Design\r\n'),
(2, 'Motion'),
(3, 'Development\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `first` varchar(150) NOT NULL,
  `last` varchar(150) NOT NULL,
  `email` varchar(250) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `media` varchar(350) NOT NULL,
  `project_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(150) NOT NULL,
  `company` varchar(150) NOT NULL,
  `role` varchar(400) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `year` int UNSIGNED NOT NULL,
  `description` varchar(1000) NOT NULL,
  `feedback` varchar(1000) NOT NULL,
  `challenges` varchar(1000) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`, `company`, `role`, `url`, `year`, `description`, `feedback`, `challenges`, `keywords`) VALUES
(3, 'Jeopardy', 'Fanshawe Student Union', 'Designer, Developer', 'NA', 2024, 'For this project I was asked to create a simple Jeopardy board to play for students at Fanshawe provided by the FSU, where students were able to play jeopardy against each other in a chance to win a prize. During this process with discussions with the Event Coordinator Patrick Nichol we discussed how he wanted to keep things simple, including no rounds of double jeopardy, and a point system for students to be able to get through a board of questions without taking too long.', 'During the test run of this project Patrick decided he wanted a specific amount of players to be able to play at once to make it so that there was an opportunity for more engagement. During the early development stages I created the questions to find a good balance of easy to mildly difficult questions for students to be able to just have fun with, without too much of a challenge, and was constantly evolving and questions after not being able to find an API to integrate seamlessly with Fanshawe students knowledge, and language diversity to Fanshawe\'s rich cultural presence. ', 'During a test run with student we realized we wanted to implement a way to pull the dollar amount to connect with the player number to be able to add the points to the user on click, vs clicking individually on the user to add the points, but there was also a problem with if no one gets the answer correct. ', 'Arrays, Student Engagement, Point System, Game'),
(1, 'Seven', 'School Project', 'Designer, Motion design', 'NA', 2024, 'Seven was a project based on developing a makeup line, branding it, and create products and advertisements to promote your created products to your target audience. \r\n\r\nSeven was created as a dual-sided makeup line where fantasy meets reality. On one side, embrace the dark allure of the Grimdark realm with bold, edgy shades that evoke mystery and power. On the other, step into an Enchanted world of soft, ethereal tones that celebrate magic and beauty. Seven invites you to express both sides of your fantasy.', 'During the development of Seven feedback that was received was given to suggest the line had to specific of an audience. This feedback was taken into consideration when it came to branding, and converted into a way that not only can fantasy lovers enjoy a makeup line made for them, but for those learning to open themselves up to a new line of makeup, can have an easy way of transition into finding their own version of fantasy.', 'Challenges during this production included learning of limitations in certain technology uses. During video promotion much was learned about VRAM vs RAM and the true technological requirements of software use of 3D, as well as proper communication of brand identity and target audiences, and found a way to diversify audiences to new ideas. ', '3D makeup products, poster design, video promotion'),
(2, 'Stars', 'School Project', 'Development, Design, Motion', 'NA', 2024, 'Stars is an earbud brand created from scratch. From designing the structure to modeling in 3d, to creating a site to promote the earbuds with posters, a video, and 3d models with hotspots. Stars brings out a bit of every aspect in interactive media design.', 'During feedback stages, I received feedback that sometimes the simpler the better. This puts emphasis on the quality of the product, and what it offers, rather than excessive design choices. I took this feedback and tweaked my product to bring simplicity, and a design that can be useful to all. ', 'Challenges during this process involved learning about using redshift in cinema 4d to model and render products, and that when time isn\'t on your side for redshift renders, that with a good model, and controlling your lighting, you can learn to make your standard render a high quality to reveal your product. ', 'model viewer, scroll features, greensock animations ');

-- --------------------------------------------------------

--
-- Table structure for table `project_category`
--

DROP TABLE IF EXISTS `project_category`;
CREATE TABLE IF NOT EXISTS `project_category` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `project_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `project_category`
--

INSERT INTO `project_category` (`id`, `category_id`, `project_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `project_tools`
--

DROP TABLE IF EXISTS `project_tools`;
CREATE TABLE IF NOT EXISTS `project_tools` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `tool_id` int UNSIGNED NOT NULL,
  `project_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `job` varchar(150) NOT NULL,
  `testimonial` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tool`
--

DROP TABLE IF EXISTS `tool`;
CREATE TABLE IF NOT EXISTS `tool` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tool`
--

INSERT INTO `tool` (`id`, `image`) VALUES
(1, 'after-effects.svg\r\n'),
(2, 'illustrator.svg'),
(3, 'indesign.svg\r\n'),
(4, 'lightroom.svg'),
(5, 'photoshop.svg'),
(6, 'premiere.svg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
