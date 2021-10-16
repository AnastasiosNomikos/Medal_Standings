-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 02 Ιουλ 2020 στις 23:12:00
-- Έκδοση διακομιστή: 10.4.13-MariaDB
-- Έκδοση PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `olympicgames_db`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `medal_results`
--

CREATE TABLE `medal_results` (
  `Country` varchar(255) NOT NULL,
  `Sport` varchar(255) NOT NULL,
  `Medal` enum('gold','silver','bronze','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Άδειασμα δεδομένων του πίνακα `medal_results`
--

INSERT INTO `medal_results` (`Country`, `Sport`, `Medal`) VALUES
('Germany', 'Archery', 'gold'),
('Germany', 'Tennis', 'bronze'),
('Greece', 'Archery', 'bronze'),
('Greece', 'Sailing', 'gold'),
('Greece', 'Tae-Kwon-Do', 'bronze'),
('Greece', 'Tennis', 'silver'),
('Italy', 'Archery', 'silver'),
('Italy', 'Sailing', 'silver'),
('Italy', 'Tennis', 'gold'),
('Spain', 'Sailing', 'bronze'),
('Spain', 'Tae-Kwon-Do', 'gold');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `medal_results`
--
ALTER TABLE `medal_results`
  ADD PRIMARY KEY (`Country`,`Sport`,`Medal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
