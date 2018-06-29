-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 29. Jun 2018 um 19:07
-- Server-Version: 10.1.33-MariaDB
-- PHP-Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `studentenfuerstudenten`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `aufgabe`
--

CREATE TABLE `aufgabe` (
  `aufgabenID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `beschreibung` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `kursID` int(11) NOT NULL,
  `datei` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `freund`
--

CREATE TABLE `freund` (
  `userid1` int(11) NOT NULL,
  `userid2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `kurs`
--

CREATE TABLE `kurs` (
  `kursID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `beschreibung` varchar(1024) NOT NULL,
  `voraussetzung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachhilfeangebot`
--

CREATE TABLE `nachhilfeangebot` (
  `angebotID` int(11) NOT NULL,
  `kursID` int(11) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `ort` varchar(255) NOT NULL,
  `zeit` varchar(255) NOT NULL,
  `preis` decimal(10,0) NOT NULL,
  `beschreibung` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nachhilfesuche`
--

CREATE TABLE `nachhilfesuche` (
  `sucheID` int(11) NOT NULL,
  `kursID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `titel` varchar(255) NOT NULL,
  `ort` varchar(255) NOT NULL,
  `zeit` varchar(255) NOT NULL,
  `preis` decimal(10,0) NOT NULL,
  `beschreibung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `todoliste`
--

CREATE TABLE `todoliste` (
  `todoID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `beschreibung` int(11) NOT NULL,
  `checked` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `name` varchar(255) NOT NULL,
  `passwort` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `uni` varchar(255) NOT NULL,
  `fach` varchar(255) NOT NULL,
  `beschreibung` varchar(1024) NOT NULL,
  `bild` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`name`, `passwort`, `email`, `userID`, `uni`, `fach`, `beschreibung`, `bild`) VALUES
('ein deutiger Nutzername', 'SicheresPassw0rt', 'test@email.com', 1, '', '', '', ''),
('', 'a', 'a', 2, '', '', '', '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `useraufgabe`
--

CREATE TABLE `useraufgabe` (
  `userID` int(11) NOT NULL,
  `aufgabenID` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `userkurse`
--

CREATE TABLE `userkurse` (
  `userID` int(11) NOT NULL,
  `kursID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `aufgabe`
--
ALTER TABLE `aufgabe`
  ADD PRIMARY KEY (`aufgabenID`);

--
-- Indizes für die Tabelle `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`kursID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indizes für die Tabelle `nachhilfeangebot`
--
ALTER TABLE `nachhilfeangebot`
  ADD PRIMARY KEY (`angebotID`);

--
-- Indizes für die Tabelle `nachhilfesuche`
--
ALTER TABLE `nachhilfesuche`
  ADD PRIMARY KEY (`sucheID`);

--
-- Indizes für die Tabelle `todoliste`
--
ALTER TABLE `todoliste`
  ADD PRIMARY KEY (`todoID`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `aufgabe`
--
ALTER TABLE `aufgabe`
  MODIFY `aufgabenID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `kurs`
--
ALTER TABLE `kurs`
  MODIFY `kursID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `nachhilfeangebot`
--
ALTER TABLE `nachhilfeangebot`
  MODIFY `angebotID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `nachhilfesuche`
--
ALTER TABLE `nachhilfesuche`
  MODIFY `sucheID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `todoliste`
--
ALTER TABLE `todoliste`
  MODIFY `todoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
