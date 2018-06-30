-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 30. Jun 2018 um 21:20
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

--
-- Daten für Tabelle `aufgabe`
--

INSERT INTO `aufgabe` (`aufgabenID`, `name`, `beschreibung`, `userID`, `kursID`, `datei`) VALUES
(1, 'wt2 Projektaufgabe', 'das ist die Projektaufgabe von 2018', 1, 2, ''),
(2, 'Java 1', 'das ist die erste Aufgabe in Java 1', 1, 1, ''),
(3, 'Mathe 1', 'Mathe Arbeitsblatt 1 handelt vom Dreisatz', 3, 4, ''),
(4, 'Java 2 Aufgabe 3', 'diese Aufgabe handelt von getter und setter', 3, 7, ''),
(5, 'IT-Sicherheit', 'ein DDoS-Angriff: wie funktioniert es', 7, 9, ''),
(6, 'Java 2 Aufgabe 9', 'Einführung in Javafx', 7, 4, ''),
(7, 'Mathe 2: Vektoren', 'Betrag von Vektoren berechnen', 3, 4, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `freund`
--

CREATE TABLE `freund` (
  `userid1` int(11) NOT NULL,
  `userid2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `freund`
--

INSERT INTO `freund` (`userid1`, `userid2`) VALUES
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8);

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

--
-- Daten für Tabelle `kurs`
--

INSERT INTO `kurs` (`kursID`, `name`, `beschreibung`, `voraussetzung`) VALUES
(1, 'Java 1', 'Grundlagen der Progrmmierung', 'Für diesen Kurs gibt es keine Voraussetzungen'),
(2, 'Java 2', 'Einführung in die OOP', 'Voraussetzung für diesen Kurs ist Java 1'),
(3, 'Mathe 1', 'In diesem Kurs geht es Hauptsächlich um die Kurvendiskussion', 'Für diesen Kurs gibt es keine Voraussetzungen'),
(4, 'Mathe 2', 'Der Schwerpunkt in diesem Kurs ist die Vektorrechnung', 'Es ist Vorteilhaft Mathe 1 Vorher abgeschlossen zu haben'),
(5, 'IT-Sicherheit', 'Wie kann ich mich vor Angriffe schützen und wie funktionieren diese', 'Für diesen Kurs gibt es keine Voraussetzungen'),
(6, 'Datenbanken', 'Erlerne den Umgang mit Datenbanken in der Sprache MySql', 'Für diesen Kurs gibt es keine Voraussetzungen'),
(7, 'C Programmierung', 'Grundlagen in der Programmiersprache C', 'Für diesen Kurs gibt es keine Voraussetzungen');

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
  `preis` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `nachhilfeangebot`
--

INSERT INTO `nachhilfeangebot` (`angebotID`, `kursID`, `titel`, `ort`, `zeit`, `preis`, `userID`) VALUES
(1, 1, 'Mathe', 'Bochum', '12:00', '12,50â‚¬', 1),
(2, 2, 'Nachhilfe Java 2', 'Bochum', '19:00 Uhr', '12€', 5),
(3, 3, 'Mathe Nachhilfe', 'Recklinghausen', '23.7 14:30 Uhr', '10€', 0);

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
  `preis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `nachhilfesuche`
--

INSERT INTO `nachhilfesuche` (`sucheID`, `kursID`, `userID`, `titel`, `ort`, `zeit`, `preis`) VALUES
(1, 1, 1, 'C Pointer', 'Bochum', '12:15 - 15:00', '8,50â‚¬ pro Stunde');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `todoliste`
--

CREATE TABLE `todoliste` (
  `todoID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `beschreibung` varchar(255) NOT NULL,
  `checked` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `todoliste`
--

INSERT INTO `todoliste` (`todoID`, `userID`, `beschreibung`, `checked`) VALUES
(2, 1, '', NULL),
(3, 1, '', NULL);

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
('Albert', 'cb69ade06bce5180f20a96b1fc3960f3', 'a', 1, 'Hochschule Bochum', 'Informatik', 'Ich bin Albert', 'sulf.jpeg');

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
  MODIFY `aufgabenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `kurs`
--
ALTER TABLE `kurs`
  MODIFY `kursID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `nachhilfeangebot`
--
ALTER TABLE `nachhilfeangebot`
  MODIFY `angebotID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `nachhilfesuche`
--
ALTER TABLE `nachhilfesuche`
  MODIFY `sucheID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `todoliste`
--
ALTER TABLE `todoliste`
  MODIFY `todoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
