-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 01 mars 2022 kl 09:42
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
-- Tabellstruktur `kund`
--

CREATE TABLE `kund` (
  `KundID` int(6) NOT NULL,
  `Namn` varchar(50) NOT NULL,
  `Gatuadress` varchar(40) NOT NULL,
  `Postnr` varchar(6) NOT NULL,
  `Stad` varchar(30) NOT NULL,
  `Telefon` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrdersID` int(11) NOT NULL,
  `ProduktID` int(11) NOT NULL,
  `Antal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellstruktur `orders`
--

CREATE TABLE `orders` (
  `OrdersID` int(6) NOT NULL,
  `KundID` int(11) NOT NULL,
  `Orderdatum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Index för tabell `kund`
--
ALTER TABLE `kund`
  ADD PRIMARY KEY (`KundID`);

--
-- Index för tabell `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`OrdersID`,`ProduktID`),
  ADD KEY `ProduktID` (`ProduktID`);

--
-- Index för tabell `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrdersID`),
  ADD KEY `KundID` (`KundID`);

--
-- Index för tabell `produkt`
--
ALTER TABLE `produkt`
  ADD PRIMARY KEY (`ProduktID`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `kund`
--
ALTER TABLE `kund`
  MODIFY `KundID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `orders`
--
ALTER TABLE `orders`
  MODIFY `OrdersID` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT för tabell `produkt`
--
ALTER TABLE `produkt`
  MODIFY `ProduktID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Restriktioner för dumpade tabeller
--

--
-- Restriktioner för tabell `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderdetails_ibfk_1` FOREIGN KEY (`OrdersID`) REFERENCES `orders` (`OrdersID`),
  ADD CONSTRAINT `orderdetails_ibfk_2` FOREIGN KEY (`ProduktID`) REFERENCES `produkt` (`ProduktID`);

--
-- Restriktioner för tabell `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`KundID`) REFERENCES `kund` (`KundID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
