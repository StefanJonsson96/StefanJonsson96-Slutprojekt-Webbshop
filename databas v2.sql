/* Skapa datbas först och kör script sen */

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 28 feb 2022 kl 16:38
-- Serverversion: 10.4.22-MariaDB
-- PHP-version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `sinus`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `produkt`
--

CREATE TABLE `produkt` (
  `ProduktID` int(6) NOT NULL,
  `Färg` varchar(25) DEFAULT NULL,
  `Kvantitet` varchar(7) NOT NULL,
  `Bild` text DEFAULT NULL,
  `Pris` float NOT NULL,
  `Kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumpning av Data i tabell `produkt`
--

INSERT INTO `produkt` (`ProduktID`, `Färg`, `Kvantitet`, `Bild`, `Pris`, `Kategori`) VALUES
(1, 'Red', '99', NULL, 250, 'caps'),
(2, 'Purple', '99', NULL, 250, 'caps'),
(3, 'Green', '99', NULL, 250, 'caps'),
(4, 'Blue', '99', NULL, 250, 'caps'),
(69, 'Black', '99', NULL, 500, 'Hoodies'),
(70, 'Red', '99', NULL, 500, 'Hoodies'),
(71, 'Blue', '99', NULL, 500, 'Hoodies'),
(72, 'Green', '99', NULL, 500, 'Hoodies'),
(73, 'Purple', '99', NULL, 500, 'Hoodies'),
(74, 'Black', '99', NULL, 350, 'T-Shirts'),
(75, 'Blue', '99', NULL, 350, 'T-Shirts'),
(76, 'Pink', '99', NULL, 350, 'T-Shirts'),
(77, 'Purple', '99', NULL, 350, 'T-Shirts'),
(78, 'Yellow', '99', NULL, 350, 'T-Shirts'),
(84, 'Eagle', '99', NULL, 1000, 'Basic-Skateboard'),
(85, 'Fire', '99', NULL, 1000, 'Basic-Skateboard'),
(86, 'Greta', '99', NULL, 1000, 'Basic-Skateboard'),
(87, 'Ink', '99', NULL, 1000, 'Basic-Skateboard'),
(88, 'Simple', '99', NULL, 1000, 'Basic-Skateboard'),
(89, 'Northern Lights', '99', NULL, 1000, 'Design-Skateboard'),
(90, 'Plastic Lights', '99', NULL, 1000, 'Design-Skateboard'),
(91, 'Polar', '99', NULL, 1000, 'Design-Skateboard'),
(92, 'Purple', '99', NULL, 1000, 'Design-Skateboard'),
(93, 'Yellow', '99', NULL, 1000, 'Design-Skateboard'),
(94, 'Rocket wheels', '99', NULL, 200, 'Skateboard-Däck'),
(95, 'Spinner wheels', '99', NULL, 200, 'Skateboard-Däck'),
(96, 'Wave wheels', '99', NULL, 200, 'Skateboard-Däck');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`ProduktID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `produkt`
--
ALTER TABLE `produkt`
  MODIFY `ProduktID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
