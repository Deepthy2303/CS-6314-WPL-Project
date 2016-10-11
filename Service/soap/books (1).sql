-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2016 at 06:33 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sds`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ISBN` varchar(10) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Cover` varchar(255) NOT NULL,
  `Publisher` varchar(255) NOT NULL,
  `Pages` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Reviews` text,
  `Description` text,
  `Rating` int(11) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `Genre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `ISBN`, `Title`, `Author`, `Cover`, `Publisher`, `Pages`, `Price`, `Reviews`, `Description`, `Rating`, `stock`, `Genre`) VALUES
(1, '195153448', 'Classical Mythology', 'Mark P. O. Morford,Robert J. Lenardon', 'http://www.openisbn.com/cover/0195153448_72.jpg', 'Oxford University Press, USA', 844, 10, NULL, NULL, 3, 10, 'Literature'),
(2, '2005018', 'Clara Callan: A Novel', 'Richard Bruce Wright', 'http://www.openisbn.com/cover/0002005018_72.jpg', 'HarperFlamingoCanada', 414, 20, NULL, NULL, 3, 10, 'Literature'),
(3, '60973129', 'Decision In Normandy', 'Carlo D''Este', 'http://www.openisbn.com/cover/0060973129_72.jpg', 'HarperPerennial', 555, 50, NULL, NULL, 3, 10, 'Literature'),
(4, '374157065', 'Flu: The Story Of The Great Influenza Pandemic Of 1918 And The Search For The Virus That Caused It', 'Gina Kolata', 'http://www.openisbn.com/cover/0374157065_72.jpg', 'Farrar, Straus And Giroux', 256, 10, NULL, NULL, 3, 10, 'Literature'),
(5, '393045218', 'The Mummies Of Urumchi', 'Elizabeth Wayland Barber,E. J. W. Barber', 'http://www.openisbn.com/cover/0393045218_72.jpg', 'W. W. Norton and Company', 240, 35, NULL, NULL, 3, 10, 'Literature'),
(6, '399135782', 'The Kitchen God''s Wife', 'Amy Tan', 'http://www.openisbn.com/cover/0399135782_72.jpg', 'G. P. Putnam''s Sons', 415, 10, NULL, NULL, 3, 10, 'Literature'),
(7, '425176428', 'What If?: The World''s Foremost Military Historians Imagine What Might Have Been', 'Robert Cowley', 'http://www.openisbn.com/cover/0425176428_72.jpg', 'Berkley Trade', 416, 67, NULL, NULL, 3, 10, 'Literature'),
(8, '671870432', 'Pleading Guilty', 'Scott Turow,Stacy Keach', 'http://www.openisbn.com/cover/0671870432_72.jpg', 'Simon and Schuster Audio', 0, 10, NULL, NULL, 3, 10, 'Literature'),
(9, '679425608', 'Under The Black Flag: The Romance And The Reality Of Life Among The Pirates', 'David Cordingly', 'http://www.openisbn.com/cover/0679425608_72.jpg', 'Random House', 296, 87, NULL, NULL, 3, 10, 'Literature'),
(10, '074322678X', 'Where You''ll Find Me: And Other Stories', 'Ann Beattie', 'http://www.openisbn.com/cover/074322678X_72.jpg', 'Scribner', 208, 45, NULL, NULL, 3, 10, 'Bestsellers'),
(11, '771074670', 'Nights Below Station Street', 'David Adams Richards', 'http://www.openisbn.com/cover/0771074670_72.jpg', 'Emblem Editions', 225, 80, NULL, NULL, 3, 10, 'Bestsellers'),
(12, '080652121X', 'Hitler''s Secret Bankers: The Myth Of Swiss Neutrality During The Holocau: The Myth Of Swiss Neutrality During The Holocaust', 'Kensington', 'http://www.openisbn.com/cover/080652121X_72.jpg', 'Citadel', 293, 56, NULL, NULL, 3, 10, 'Bestsellers'),
(13, '887841740', 'The Middle Stories', 'Sheila Heti', 'http://www.openisbn.com/cover/0887841740_72.jpg', 'House Of Anansi Press', 160, 10, NULL, NULL, 3, 10, 'Bestsellers'),
(14, '1552041778', 'Jane Doe', 'J. R. Kaiser', 'http://www.openisbn.com/cover/1552041778_72.jpg', 'Mira Books', 0, 60, NULL, NULL, 3, 10, 'Bestsellers'),
(15, '1558746218', 'A Second Chicken Soup For The Woman''s Soul (Chicken Soup For The Soul)', 'Jack Canfield,Mark Victor Hansen,Jennifer Read Haw', 'http://www.openisbn.com/cover/1558746218_72.jpg', 'HCI', 328, 76, NULL, NULL, 3, 10, 'Bestsellers'),
(16, '1567407781', 'The Witchfinder (Amos Walker Series)', 'Loren D. Estleman,John Kenneth', 'http://www.openisbn.com/cover/1567407781_72.jpg', 'Nova Audio Books', 0, 30, NULL, NULL, 3, 10, 'Bestsellers'),
(17, '1575663937', 'More Cunning Than Man: A Social History Of Rats And Man', 'Robert Hendrickson', 'http://www.openisbn.com/cover/1575663937_72.jpg', 'Kensington', 288, 20, NULL, NULL, 3, 10, 'Bestsellers'),
(18, '1881320189', 'Goodbye To The Buttermilk Sky', 'Julia Oliver', 'http://www.openisbn.com/cover/1881320189_72.jpg', 'River City Pub', 191, 40, NULL, NULL, 3, 10, 'Bestsellers'),
(19, '440234743', 'The Testament', 'John Grisham', 'http://www.openisbn.com/cover/0440234743_72.jpg', 'Dell', 544, 90, NULL, NULL, 3, 10, 'Bestsellers'),
(20, '452264464', 'Beloved (Plume Contemporary Fiction)', 'Toni Morrison', 'http://www.openisbn.com/cover/0452264464_72.jpg', 'Longman', 275, 60, NULL, NULL, 3, 10, 'Academic'),
(21, '609804618', 'Our Dumb Century: The Onion Presents 100 Years Of Headlines From America''s Finest News Source', 'The Onion,Scott Dikkers,Mike Loew', 'http://www.openisbn.com/cover/0609804618_72.jpg', 'Three Rivers Press', 176, 40, NULL, NULL, 3, 10, 'Academic'),
(22, '1841721522', 'New Vegetarian: Bold And Beautiful Recipes For Every Occasion', 'Celia Brooks Brown,Jane Noraika,Philip Webb', 'http://www.openisbn.com/cover/1841721522_72.jpg', 'Ryland Peters &amp; Small', 144, 66, NULL, NULL, 3, 10, 'Academic'),
(23, '1879384493', 'If I''d Known Then What I Know Now: Why Not Learn From The Mistakes Of Others? You Can''t Afford To Make Them All Yourself!', 'J. R. Parrish', 'http://www.openisbn.com/cover/1879384493_72.jpg', 'Cypress House', 136, 43, NULL, NULL, 3, 10, 'Academic'),
(24, '61076031', 'Mary-Kate &amp; Ashley Switching Goals (Mary-Kate &amp; Ashley Starring In)', 'Mary-kate &amp; Ashley Olsen', 'http://www.openisbn.com/cover/0061076031_72.jpg', 'HarperEntertainment', 128, 15, NULL, NULL, 3, 10, 'Academic'),
(25, '439095026', 'Tell Me This Isn''t Happening', 'Robynn Clairday', 'http://www.openisbn.com/cover/0439095026_72.jpg', 'Scholastic', 144, 75, NULL, NULL, 3, 10, 'Academic'),
(26, '689821166', 'Flood : Mississippi 1927', 'Kathleen Duey,Karen A. Bale,Bill Dodge', 'http://www.openisbn.com/cover/0689821166_72.jpg', 'Aladdin', 176, 76, NULL, NULL, 3, 10, 'Academic'),
(27, '971880107', 'Wild Animus: A Novel', 'Rich Shapero', 'http://www.openisbn.com/cover/0971880107_72.jpg', 'Too Far Pub', 315, 60, NULL, NULL, 3, 10, 'Academic'),
(28, '345402871', 'Airframe', 'Michael Crichton', 'http://www.openisbn.com/cover/0345402871_72.jpg', 'Ballantine Books', 448, 49, NULL, NULL, 3, 10, 'Academic'),
(29, '345417623', 'Timeline', 'Michael Crichton', 'http://www.openisbn.com/cover/0345417623_72.jpg', 'Ballantine Books', 512, 43, NULL, NULL, 3, 10, 'Academic');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
