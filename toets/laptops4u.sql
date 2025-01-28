-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 jan 2025 om 11:19
-- Serverversie: 10.4.32-MariaDB
-- PHP-versie: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptops4u`
--
CREATE DATABASE IF NOT EXISTS `laptops4u` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `laptops4u`;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `laptops`
--

CREATE TABLE `laptops` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `memory` int(11) NOT NULL,
  `hd` int(11) NOT NULL,
  `prijs` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `laptops`
--

INSERT INTO `laptops` (`id`, `category`, `merk`, `type`, `memory`, `hd`, `prijs`) VALUES
(15, 'Ultrabooks', 'Dell', 'XPS 13', 128, 2048, 1278.00),
(16, 'Ultrabooks', 'Apple', 'Macbook Air', 128, 512, 2378.00),
(18, 'Gaming laptop', 'MSI', 'Stealth', 64, 2048, 1856.00),
(19, 'Chromebooks', 'Google', 'Pixelbook', 16, 32, 231.00),
(20, 'Chromebooks', 'HP ', 'Chromebook', 8, 16, 345.00),
(27, '2-in-1 Laptops', 'Microsoft', 'Surface Pro', 32, 128, 1278.00),
(28, 'Zakelijke Laptops', 'HP', 'Elitebooks', 64, 2048, 2489.00);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `laptops`
--
ALTER TABLE `laptops`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `laptops`
--
ALTER TABLE `laptops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
