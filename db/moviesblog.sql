-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1:3306
-- Χρόνος δημιουργίας: 02 Ιουλ 2018 στις 10:01:52
-- Έκδοση διακομιστή: 5.7.19
-- Έκδοση PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `moviesblog`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(500) NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `title` varchar(500) NOT NULL,
  `descriptions` varchar(700) NOT NULL,
  `trailer_url` varchar(300) NOT NULL,
  `insertDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(500) NOT NULL,
  `icon` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `posts`
--

INSERT INTO `posts` (`title`, `descriptions`, `trailer_url`, `insertDate`, `id`, `user_id`, `icon`) VALUES
('FANTASTIC BEASTS', 'Fantastic Beasts and Where to Find Them', 'https://www.youtube.com/watch?v=5sEaYB4rLFQ', '2018-07-01 23:18:13', 72, 'parasxous', 'images/1529495290Fantastic_Beasts_Standard_Sdtk_Cover_01_1425px_RGB.jpg'),
('PACIFIC RIM 2', 'Jake Pentecost, son of Stacker Pentecost, reunites with Mako Mori to lead a new generation of Jaeger pilots, including rival Lambert and 15-year-old hacker Amara, against a new Kaiju threat.', 'https://www.youtube.com/watch?v=aNiIUPwk-sU', '2018-07-01 23:23:08', 73, 'parasxous', 'images/pacific-rim-uprising-soundtrack-album-1100x1100.jpg'),
('DEADPOOL 2 ', 'Foul-mouthed mutant mercenary Wade Wilson (AKA. Deadpool), brings together a team of fellow mutant rogues to protect a young boy with supernatural abilities from the brutal, time-traveling cyborg, Cable.', 'https://www.youtube.com/watch?v=D86RtevtfrA', '2018-07-01 23:38:08', 74, 'parasxous', 'images/deadpool.jpg'),
('FANTASTIC FOUR', 'Four young outsiders teleport to an alternate and dangerous universe which alters their physical form in shocking ways. The four must learn to harness their new abilities and work together to save Earth from a former friend turned enemy.', 'https://www.youtube.com/watch?v=_rRoD28-WgU', '2018-07-01 23:56:56', 75, 'example', 'images/51AM4R5J04L._SY445_.jpg');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(150) NOT NULL,
  `lastName` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `passwords` varchar(150) NOT NULL,
  `forgot_pass` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id`, `names`, `lastName`, `username`, `email`, `passwords`, `forgot_pass`) VALUES
(8, 'paris', 'karampas', 'paparas', 'parasxous3@gmauil.com', '89bf8dc755892f34cf0b13a135ebd078', NULL),
(11, 'paris', 'example', 'example', 'example@example.com', '89bf8dc755892f34cf0b13a135ebd078', NULL),
(5, 'paris', 'karmapas', 'parasxous', 'parasxous@yahoo.com', '36babf380e12c0d9154b0774c56c9d47', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
