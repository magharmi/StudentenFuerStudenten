-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Jul 2018 um 19:18
-- Server-Version: 10.1.9-MariaDB
-- PHP-Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
(1, 'wt2 Projektaufgabe', 'das ist die Projektaufgabe von 2018', 1, 2, 'projektaufgabe.txt'),
(2, 'Java 1', 'das ist die erste Aufgabe in Java 1', 1, 1, 'java1.png'),
(3, 'Mathe 1', 'Mathe Arbeitsblatt 1 handelt vom Dreisatz', 3, 4, 'dreisatz.png'),
(4, 'Java 2 Aufgabe 3', 'diese Aufgabe handelt von getter und setter', 3, 7, 'gettersetter.txt'),
(5, 'IT-Sicherheit', 'ein DDoS-Angriff: wie funktioniert es', 7, 9, 'ddos.png'),
(6, 'Java 2 Aufgabe 9', 'Einführung in Javafx', 7, 4, 'javafx.txt'),
(7, 'Mathe 2: Vektoren', 'Betrag von Vektoren berechnen', 3, 4, 'vektoren.txt');

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
(5, 8),
(5, 9),
(5, 10),
(5, 11),
(5, 12),
(5, 13),
(5, 14),
(5, 15),
(5, 7),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 5);

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
(1, 'Java 1', 'Java ist eine objektorientierte Programmiersprache, die sich durch einige zentrale Eigenschaften auszeichnet. Diese machen sie universell einsetzbar und f&uumlr die Industrie als robuste Programmiersprache interessant. Da Java objektorientiertes Programmieren erm&oumlglicht, k&oumlnnen Entwickler moderne und wiederverwertbare Softwarekomponenten programmieren.', 'F&uuml;r diesen Kurs gibt es keine Voraussetzungen'),
(2, 'Java 2', 'Einführung in die OOP', 'Voraussetzung für diesen Kurs ist Java 1'),
(3, 'Mathe 1', 'In diesem Kurs geht es Hauptsächlich um die Kurvendiskussion', 'F&uuml;r diesen Kurs gibt es keine Voraussetzungen'),
(4, 'Mathe 2', 'Der Schwerpunkt in diesem Kurs ist die Vektorrechnung', 'Es ist Vorteilhaft Mathe 1 Vorher abgeschlossen zu haben'),
(5, 'IT-Sicherheit', 'Wie kann ich mich vor Angriffe schützen und wie funktionieren diese', 'F&uuml;r diesen Kurs gibt es keine Voraussetzungen'),
(6, 'Datenbanken', 'Erlerne den Umgang mit Datenbanken in der Sprache MySql', 'F&uuml;r diesen Kurs gibt es keine Voraussetzungen'),
(7, 'C Programmierung', 'Grundlagen in der Programmiersprache C', 'F&uuml;r diesen Kurs gibt es keine Voraussetzungen');

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
(1, 3, 'Mathe', 'Bochum', '12:00', '12,50€', 1),
(2, 1, 'Nachhilfe Java 2', 'Bochum', '19:00 Uhr', '12€', 5),
(3, 4, 'Mathe Nachhilfe', 'Recklinghausen', '23.7 14:30 Uhr', '10€', 7),
(4, 1, 'Nachhilfe in Javagrundlagen', 'Bochum', '14 Uhr', '12€', 7),
(5, 5, 'Nachhilfe in IT-Sicherheit', 'Essen', '12:45 Uhr', '17€', 1),
(6, 7, 'C Programmierung', 'Recklinghausen', '19:30 Uhr', 'VB', 2),
(7, 3, 'Mathe Grundlagen', 'Bochum', '17 Uhr', '15€ pro Stunde\r\n40€ 3 Stunden Block', 3);

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
(1, 1, 1, 'C Pointer', 'Bochum', '12:15 - 15:00', '8,50€ pro Stunde'),
(2, 3, 7, 'Mathe: Vektoren', 'Essen', '16 Uhr', '10€'),
(3, 8, 10, 'Pq-Formel', 'Bochum', 'Montag oder Samstag', '9€'),
(4, 6, 3, 'Grundlagen in C', 'Recklinghausen', 'nach 15 Uhr', '12€'),
(5, 4, 9, 'Javafx', 'Essen', '14 Uhr', '10€'),
(6, 3, 1, 'Elektrotechnik', 'Bochum', '11 Uhr', '9,50€'),
(7, 7, 7, 'java 2', 'Bochum', 'Beliebig', '11€');

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
(1, 1, 'Mathe lernen', NULL),
(2, 1, 'JavaFX abgeben', NULL),
(3, 1, 'Vortrag vorbereiten', NULL),
(4, 2, 'Physik angucken', NULL),
(5, 2, 'Klausurblatt schreiben', NULL),
(6, 3, 'Japanisch lernen', NULL),
(9, 5, 'Moderne Webtechnologie 2 lernen', NULL),
(10, 5, 'DDoS-Angriff auf Hochschule starten', NULL),
(11, 5, 'Bisschen Mathe lernen', NULL);

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
('Sulfikar Hamka', 'cb69ade06bce5180f20a96b1fc3960f3', 'sulfikar@hs-bochum.de', 1, 'Hochschule Bochum', 'Informatik', 'Hallo, das ist meine Profilseite. Hier siehst du, f&uuml;r welche Kurse ich mich eingetragen habe, in welchen Themen in Hilfe anbiete und ben&ouml;tige. Au&szlig;erdem kannst du meine Aufgaben sehen.', 'sulf.jpeg'),
('Armin Magh', '90c914e8244edea8122346857787b546', 'armin@hs-bochum.de', 5, 'Hochschule Bochum', 'Informatik', 'Hallo, das ist meine Profilseite. Hier siehst du, f&uuml;r welche Kurse ich mich eingetragen habe, in welchen Themen in Hilfe anbiete und ben&ouml;tige. Au&szlig;erdem kannst du meine Aufgaben sehen.', 'logo.png'),
('Alex Schmidt', '43921918dbe1a4910542177bef1c2c75', 'alex@hs-bochum.de', 7, 'Hochschule Bochum', 'Informatik', '', 'Alex.jpg'),
('Max Muster', 'd48d775b353f63fbec00412c228c37d1', 'MaxMustermann@hs-bochum.de', 8, 'Hochschule Bochum', 'Mechatronik', '', 'bwlJustus.jpg'),
('Yvonne Sommer', '350b9cfd29d8e084d10075fab7b83db4', 'Yvonne@dortmund.de', 9, 'TU Dortmund', 'BWL', '', 'frau.jpg'),
('Marcel Davis', '64cb10dff7ebee5ee9f6283d686ee2c6', 'marcel@tu-dortmund.de', 10, 'TU Dortmund', 'Elektotechnik', '', 'Bruce_Willis.jpg'),
('Lea Sommer', '34277f8054c332625a2fa20d86e935e5', 'lea@rub.de', 11, 'Ruhr-Uni Bochum', 'Medizin', '', 'lea.jpg'),
('Tim Winter', 'c7c8c2ee98108c2d0e8b4161e26e3d3d', 'tim@tu-dortmund.de', 12, 'TU Dortmund', 'Chemie', '', 'Tim.jpg'),
('Jenny Herbst', '89be2e5377a492147e75bb5108c82835', 'jennifer@email.de', 13, 'Uni Paderborn', 'BWL', '', 'jennifer.jpg'),
('Ursula Fruehling', '1c0268b960efbe33f3f0ccfef9e15b0a', 'ursula@email.de', 14, 'Uni Muenster', 'BWL', '', 'ursula.jpg'),
('David Krueger', '29b68965d8dd82d94044fcb5d506c2a1', 'david@email.de', 15, 'Uni Bielefeld', 'Maschinenbau', '', 'david.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `useraufgabe`
--

CREATE TABLE `useraufgabe` (
  `userID` int(11) NOT NULL,
  `aufgabenID` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `useraufgabe`
--

INSERT INTO `useraufgabe` (`userID`, `aufgabenID`, `status`) VALUES
(1, 5, 'Erledigt'),
(1, 4, 'In Arbeit'),
(1, 7, 'nicht Angefangen'),
(1, 0, ''),
(1, 0, ''),
(1, 0, ''),
(1, 0, '');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `userkurse`
--

CREATE TABLE `userkurse` (
  `userID` int(11) NOT NULL,
  `kursID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `userkurse`
--

INSERT INTO `userkurse` (`userID`, `kursID`) VALUES
(1, 1),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(1, 6),
(1, 5);

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
  MODIFY `angebotID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `nachhilfesuche`
--
ALTER TABLE `nachhilfesuche`
  MODIFY `sucheID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT für Tabelle `todoliste`
--
ALTER TABLE `todoliste`
  MODIFY `todoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
