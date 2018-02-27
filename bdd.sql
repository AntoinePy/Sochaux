-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2018 at 02:47 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fcsochaux`
--

-- --------------------------------------------------------


--
-- Table structure for table `nations`
--

CREATE TABLE `nations` (
  `NationID` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `NationName` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nations`
--

INSERT INTO `nations` (`NationID`, `NationName`) VALUES
(1, 'Allemagne'),
(2, 'Argentine'),
(3, 'Belgique'),
(4, 'Bresil'),
(5, 'Croatie'),
(6, 'Espagne'),
(7, 'France'),
(8, 'Italie'),
(9, 'Portugal');

-- --------------------------------------------------------

--
-- Table structure for table `championships`
--

CREATE TABLE `championships` (
  `ChampionshipID` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `ChampionshipName` char(50) DEFAULT NULL,
  `NationID` smallint(4) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `championships`
--

INSERT INTO `championships` (`ChampionshipID`, `ChampionshipName`, `NationID`) VALUES
(1, 'Ligue 1', 7),
(2, 'Ligue 2', 7),
(3, 'LaLiga', 6),
(4, 'LaLiga 2', 6),
(5, 'Bundesliga', 1),
(6, 'Bundesliga 2', 1),
(7, 'Serie A', 8),
(8, 'Serie B', 8);

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `ClubID` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `ClubName` char(50) DEFAULT NULL,
  `ClubVille` char(50) DEFAULT NULL,
  `ClubAdress` char(100) DEFAULT NULL,
  `ChampionshipID` smallint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`ClubID`, `ClubName`, `ClubVille`, `ClubAdress`, `ChampionshipID`) VALUES
(1, 'FCSM', 'Sochaux', NULL, 2),
(2, 'OM', 'marseille', NULL, 1),
(3, 'PSG', 'paris saint germain', NULL, 1),
(4, 'DFCO', 'Dijon', NULL, 1),
(5, 'Barcelone', NULL, NULL, 3),
(6, 'Real Madrid', NULL, NULL, 3),
(7, 'Osasuna', NULL, NULL, 4),
(8, 'Cadix', NULL, NULL, 4),
(9, 'Bayern Munich', NULL, NULL, 5),
(10, 'Dortmund', NULL, NULL, 5),
(11, 'Juventus turin', NULL, NULL, 7),
(12, 'Inter Milan', NULL, NULL, 7),
(13, 'Palerme', NULL, NULL, 7),
(14, 'Parme', NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `clubs_matchs`
--

CREATE TABLE `clubs_matchs` (
  `ClubID` smallint(3) UNSIGNED NOT NULL,
  `MatchID` int(20) UNSIGNED NOT NULL,
  `Club_MatchScore` smallint(2) UNSIGNED DEFAULT NULL,
  `Club_MatchHalfScore` smallint(2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `CommentText` char(255) DEFAULT NULL,
  `CommentMinute` smallint(3) UNSIGNED DEFAULT NULL,
  `MatchID` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `ContractID` int(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `ContractComment` char(255) DEFAULT NULL,
  `ContractDateStart` date DEFAULT NULL,
  `ContractDateEnd` date DEFAULT NULL,
  `ContractPrice` int(10) UNSIGNED DEFAULT NULL,
  `ClubID` smallint(3) UNSIGNED DEFAULT NULL,
  `PlayerID` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `formations`
--

CREATE TABLE `formations` (
  `FormationID` smallint(2) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `FormationName` char(15) DEFAULT NULL,
  `Position1` smallint(2) UNSIGNED DEFAULT NULL,
  `Position2` smallint(2) UNSIGNED DEFAULT NULL,
  `Position3` smallint(2) UNSIGNED DEFAULT NULL,
  `Position4` smallint(2) UNSIGNED DEFAULT NULL,
  `Position5` smallint(2) UNSIGNED DEFAULT NULL,
  `Position6` smallint(2) UNSIGNED DEFAULT NULL,
  `Position7` smallint(2) UNSIGNED DEFAULT NULL,
  `Position8` smallint(2) UNSIGNED DEFAULT NULL,
  `Position9` smallint(2) UNSIGNED DEFAULT NULL,
  `Position10` smallint(2) UNSIGNED DEFAULT NULL,
  `Position11` smallint(2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formations`
--

INSERT INTO `formations` (`FormationID`, `FormationName`, `Position1`, `Position2`, `Position3`, `Position4`, `Position5`, `Position6`, `Position7`, `Position8`, `Position9`, `Position10`, `Position11`) VALUES
(4, '4-4-2 losange', 1, 2, 3, 4,5, 6, 7, 11, 12, 14,16),
(5, '4-4-2 carré', 1, 2, 3, 4, 5, 7, 8, 10, 11, 14,16),
(6, '4-3-3', 1, 2, 3, 4, 5, 6, 8, 10, 13, 15,17),
(7, '4-5-1', 1, 2, 3, 4, 5,6, 7, 8, 10, 11,15);

-- --------------------------------------------------------

--
-- Table structure for table `matchs`
--

CREATE TABLE `matchs` (
  `MatchID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `MatchPlace` char(50) DEFAULT NULL,
  `MatchDate` date DEFAULT NULL,
  `MatchCondition` char(50) DEFAULT NULL,
  `MatchComment` char(255) DEFAULT NULL,
  `MatchAuthor` char(50) DEFAULT NULL,
  `MatchScore` char(50) DEFAULT NULL,
  `TournamentID` smallint(4) UNSIGNED DEFAULT NULL,
  `ClubID1` smallint(3) UNSIGNED DEFAULT NULL,
  `ClubID2` smallint(3) UNSIGNED DEFAULT NULL,
  `CompositionID1` smallint(3) UNSIGNED DEFAULT NULL,
  `CompositionID2` smallint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `PlayerID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `PlayerFirstName` char(50) NOT NULL,
  `PlayerFamilyName` char(50) NOT NULL,
  `PlayerWeight` smallint(3) UNSIGNED DEFAULT NULL,
  `PlayerHeight` smallint(3) UNSIGNED DEFAULT NULL,
  `PlayerNumber` char(255) DEFAULT NULL,
  `PlayerFoot` char(10) DEFAULT NULL,
  `PlayerComment` char(255) DEFAULT NULL,
  `PlayerVideoFilePath` char(255) DEFAULT NULL,
  `PlayerNote` smallint(2) UNSIGNED DEFAULT NULL,
  `ClubID` smallint(3) UNSIGNED DEFAULT NULL,
  `PositionID1` smallint(2) UNSIGNED DEFAULT NULL,
  `PlayerImageFilePath` char(255) DEFAULT NULL,
  `NationID` smallint(3) UNSIGNED DEFAULT NULL,
  `PositionID2` smallint(2) UNSIGNED DEFAULT NULL,
  `PositionID3` smallint(2) UNSIGNED DEFAULT NULL,
  `PlayerNoteID` smallint(2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`PlayerID`, `PlayerFirstName`, `PlayerFamilyName`, `PlayerWeight`, `PlayerHeight`, `PlayerNumber`, `PlayerFoot`, `PlayerComment`, `PlayerVideoFilePath`, `PlayerNote`, `ClubID`, `PositionID1`, `PlayerImageFilePath`, `NationID`, `PositionID2`, `PositionID3`, `PlayerNoteID`) VALUES
(1, 'Zinedine', 'Zidane', 80, 180, '01', 'Droit', 'Tres bon', '#', 10, 1, 20, 'zidane.jpg', 6, NULL, NULL,3),
(2, 'Leo', 'Messi', 70, 170, '02', 'Gauche', 'Tres bon', '#', 10, 1, 2, 'messi.jpg', 12, NULL, NULL,1),
(3, 'Cristiano', 'Ronaldo', 80, 180, '03', 'Droit', 'Tres bon', '#', 10, 1, 3, 'ronaldo.jpg', 13, NULL, NULL,3),
(4, 'Gianluigi', 'Buffon', 80, 180, '04', 'Droit', 'Tres bon', '#', 10, 11, 1, 'buffon.jpg', 8, NULL, NULL,3),
(5, 'Dani', 'Alves', 80, 180, '05', 'Droit', 'Tres bon', '#', 10, 1, 4, 'alves.jpg', 10, NULL, NULL,2),
(6, 'Gerard', 'Pique', 80, 180, '06', 'Droit', 'Tres bon', '#', 10, 1, 5, 'defaut.png', 7, NULL, NULL,2),
(7, 'Sergio', 'Ramos', 80, 180, '07', 'Droit', 'Tres bon', '#', 10, 1, 6, 'defaut.png', 7, NULL, NULL,2),
(8, 'Layvin', 'Kurzawa', 80, 180, '08', 'Droit', 'Tres bon', '#', 10, 1, 7, 'defaut.png', 6, NULL, NULL,2),
(9, 'Ngolo', 'Kante', 80, 180, '09', 'Droit', 'Tres bon', '#', 10, 1, 8, 'defaut.png', 6, NULL, NULL,2),
(10, 'Kevin', 'DeBruyne', 80, 180, '10', 'Droit', 'Tres bon', '#', 10, 1, 9, 'defaut.png', 14, NULL, NULL,2),
(11, 'Luka', 'Modric', 80, 180, '11', 'Droit', 'Tres bon', '#', 10, 1, 10, 'defaut.png', 11, NULL, NULL,2),
(12, 'Samuel', 'Umtiti', 80, 180, '12', 'Droit', 'Tres bon', '#', 10, 2, 20, 'defaut.png', 6, NULL, NULL,2),
(13, 'Ousmane', 'Dembele', 70, 170, '13', 'Gauche', 'Tres bon', '#', 10, 2, 2, 'defaut.png', 6, NULL, NULL,2),
(14, 'Andres', 'Iniesta', 80, 180, '14', 'Droit', 'Tres bon', '#', 10, 2, 3, 'defaut.png', 7, NULL, NULL,2),
(15, 'MarcAndre', 'TerStegen', 80, 180, '15', 'Droit', 'Tres bon', '#', 10, 2, 1, 'defaut.png', 9, NULL, NULL,2),
(16, 'Jordi', 'Alba', 80, 180, '16', 'Droit', 'Tres bon', '#', 10, 2, 4, 'defaut.png', 7, NULL, NULL,2),
(17, 'Nelson', 'Semedo', 80, 180, '17', 'Droit', 'Tres bon', '#', 10, 2, 5, 'defaut.png', 13, NULL, NULL,2),
(18, 'Sergio', 'Busquets', 80, 180, '18', 'Droit', 'Tres bon', '#', 10, 2, 6, 'defaut.png', 7, NULL, NULL,2),
(19, 'Denis', 'Suarez', 80, 180, '19', 'Droit', 'Tres bon', '#', 10, 2, 7, 'defaut.png', 7, NULL, NULL,2),
(20, 'Ivan', 'Rakitic', 80, 180, '20', 'Droit', 'Tres bon', '#', 10, 2, 8, 'defaut.png', 11, NULL, NULL,2),
(21, 'Paco', 'Alcacer', 80, 180, '21', 'Droit', 'Tres bon', '#', 10, 2, 9, 'defaut.png', 7, NULL, NULL,2),
(22, 'Philippe', 'Coutinho', 80, 180, '22', 'Droit', 'Tres bon', '#', 10, 2, 10, 'defaut.png', 10, NULL, NULL,2);

-- --------------------------------------------------------

--
-- Table structure for table `players_matchs`
--

CREATE TABLE `players_matchs` (
  `PlayerID` int(20) UNSIGNED NOT NULL,
  `MatchID` int(20) UNSIGNED NOT NULL,
  `Player_MatchComment` char(255) DEFAULT NULL,
  `Player_MatchDecisive` smallint(2) UNSIGNED DEFAULT NULL,
  `Player_MatchGoals` smallint(2) UNSIGNED DEFAULT NULL,
  `Player_MatchTimeGame` smallint(2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

CREATE TABLE `notes` (
  `NoteID` smallint(2) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `NoteName` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `notes` (`NoteID`, `NoteName`) VALUES
(1, 'Pas intéressant'),
(2, 'intéressant'),
(3, 'très intéressant');

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `PositionID` smallint(2) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `PositionName` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`PositionID`, `PositionName`) VALUES
(1, 'Gardien '),
(2, 'Défenseur Gauche '),
(3, 'Défenseur Central G. '),
(4, 'Défenseur Central D. '),
(5, 'Défenseur Droit '),
(6, 'Milieu Defensif C. '),
(7, 'Milieu Gauche '),
(8, 'Milieu Central G. '),
(9, 'Milieu Central '),
(10, 'Milieu Central D. '),
(11, 'Milieu Droit '),
(12, 'Milieu Offensif '),
(13, 'Ailier Gauche '),
(14, 'Attaquant Gauche '),
(15, 'Attaquant Central '),
(16, 'Attaquant Droit '),
(17, 'Ailier Droit ');

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `TournamentID` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `TournamentName` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` smallint(2) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `UserName` char(30) NOT NULL,
  `UserPassword` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `UserName`, `UserPassword`) VALUES
(1, 'etienne', 'surleau'),
(2, 'fcsm', 'fcsm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `championships`
--
ALTER TABLE `championships`
  ADD PRIMARY KEY (`ChampionshipID`),
  ADD UNIQUE KEY `ChampionshipName` (`ChampionshipName`),
  ADD KEY `NationID` (`NationID`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`ClubID`),
  ADD UNIQUE KEY `ClubName` (`ClubName`),
  ADD KEY `ChampionshipID` (`ChampionshipID`);

--
-- Indexes for table `clubs_matchs`
--
ALTER TABLE `clubs_matchs`
  ADD PRIMARY KEY (`ClubID`,`MatchID`),
  ADD KEY `MatchID` (`MatchID`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `MatchID` (`MatchID`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`ContractID`),
  ADD KEY `ClubID` (`ClubID`),
  ADD KEY `PlayerID` (`PlayerID`);

--
-- Indexes for table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`FormationID`),
  ADD KEY `Position1` (`Position1`),
  ADD KEY `Position2` (`Position2`),
  ADD KEY `Position3` (`Position3`),
  ADD KEY `Position4` (`Position4`),
  ADD KEY `Position5` (`Position5`),
  ADD KEY `Position6` (`Position6`),
  ADD KEY `Position7` (`Position7`),
  ADD KEY `Position8` (`Position8`),
  ADD KEY `Position9` (`Position9`),
  ADD KEY `Position10` (`Position10`),
  ADD KEY `Position11` (`Position11`);

--
-- Indexes for table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`MatchID`),
  ADD KEY `TournamentID` (`TournamentID`),
  ADD KEY `ClubID1` (`ClubID1`),
  ADD KEY `ClubID2` (`ClubID2`);

--
-- Indexes for table `nations`
--
ALTER TABLE `nations`
  ADD PRIMARY KEY (`NationID`),
  ADD UNIQUE KEY `NationName` (`NationName`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`PlayerID`),
  ADD KEY `ClubID` (`ClubID`),
  ADD KEY `PositionID1` (`PositionID1`),
  ADD KEY `PositionID2` (`PositionID2`),
  ADD KEY `PositionID3` (`PositionID3`);

--
-- Indexes for table `players_matchs`
--
ALTER TABLE `players_matchs`
  ADD PRIMARY KEY (`PlayerID`,`MatchID`),
  ADD KEY `MatchID` (`MatchID`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`PositionID`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`TournamentID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `championships`
--
ALTER TABLE `championships`
  MODIFY `ChampionshipID` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `ClubID` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `ContractID` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formations`
--
ALTER TABLE `formations`
  MODIFY `FormationID` smallint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `MatchID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nations`
--
ALTER TABLE `nations`
  MODIFY `NationID` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `PlayerID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `PositionID` smallint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `TournamentID` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` smallint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `championships`
--
ALTER TABLE `championships`
  ADD CONSTRAINT `championships_ibfk_1` FOREIGN KEY (`NationID`) REFERENCES `nations` (`NationID`);

--
-- Constraints for table `clubs`
--
ALTER TABLE `clubs`
  ADD CONSTRAINT `clubs_ibfk_1` FOREIGN KEY (`ChampionshipID`) REFERENCES `championships` (`ChampionshipID`);

--
-- Constraints for table `clubs_matchs`
--
ALTER TABLE `clubs_matchs`
  ADD CONSTRAINT `clubs_matchs_ibfk_1` FOREIGN KEY (`ClubID`) REFERENCES `clubs` (`ClubID`),
  ADD CONSTRAINT `clubs_matchs_ibfk_2` FOREIGN KEY (`MatchID`) REFERENCES `matchs` (`MatchID`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`MatchID`) REFERENCES `matchs` (`MatchID`);

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`ClubID`) REFERENCES `clubs` (`ClubID`),
  ADD CONSTRAINT `contracts_ibfk_2` FOREIGN KEY (`PlayerID`) REFERENCES `players` (`PlayerID`);

--
-- Constraints for table `formations`
--
ALTER TABLE `formations`
  ADD CONSTRAINT `formations_ibfk_1` FOREIGN KEY (`Position1`) REFERENCES `positions` (`PositionID`),
  ADD CONSTRAINT `formations_ibfk_10` FOREIGN KEY (`Position10`) REFERENCES `positions` (`PositionID`),
  ADD CONSTRAINT `formations_ibfk_11` FOREIGN KEY (`Position11`) REFERENCES `positions` (`PositionID`),
  ADD CONSTRAINT `formations_ibfk_2` FOREIGN KEY (`Position2`) REFERENCES `positions` (`PositionID`),
  ADD CONSTRAINT `formations_ibfk_3` FOREIGN KEY (`Position3`) REFERENCES `positions` (`PositionID`),
  ADD CONSTRAINT `formations_ibfk_4` FOREIGN KEY (`Position4`) REFERENCES `positions` (`PositionID`),
  ADD CONSTRAINT `formations_ibfk_5` FOREIGN KEY (`Position5`) REFERENCES `positions` (`PositionID`),
  ADD CONSTRAINT `formations_ibfk_6` FOREIGN KEY (`Position6`) REFERENCES `positions` (`PositionID`),
  ADD CONSTRAINT `formations_ibfk_7` FOREIGN KEY (`Position7`) REFERENCES `positions` (`PositionID`),
  ADD CONSTRAINT `formations_ibfk_8` FOREIGN KEY (`Position8`) REFERENCES `positions` (`PositionID`),
  ADD CONSTRAINT `formations_ibfk_9` FOREIGN KEY (`Position9`) REFERENCES `positions` (`PositionID`);

--
-- Constraints for table `matchs`
--
ALTER TABLE `matchs`
  ADD CONSTRAINT `matchs_ibfk_1` FOREIGN KEY (`TournamentID`) REFERENCES `tournaments` (`TournamentID`),
  ADD CONSTRAINT `matchs_ibfk_2` FOREIGN KEY (`ClubID1`) REFERENCES `clubs` (`ClubID`),
  ADD CONSTRAINT `matchs_ibfk_3` FOREIGN KEY (`ClubID2`) REFERENCES `clubs` (`ClubID`);

--
-- Constraints for table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`ClubID`) REFERENCES `clubs` (`ClubID`),
  ADD CONSTRAINT `players_ibfk_2` FOREIGN KEY (`PositionID1`) REFERENCES `positions` (`PositionID`),
  ADD CONSTRAINT `players_ibfk_3` FOREIGN KEY (`PositionID2`) REFERENCES `positions` (`PositionID`),
  ADD CONSTRAINT `players_ibfk_4` FOREIGN KEY (`PositionID3`) REFERENCES `positions` (`PositionID`);

--
-- Constraints for table `players_matchs`
--
ALTER TABLE `players_matchs`
  ADD CONSTRAINT `players_matchs_ibfk_1` FOREIGN KEY (`PlayerID`) REFERENCES `players` (`PlayerID`),
  ADD CONSTRAINT `players_matchs_ibfk_2` FOREIGN KEY (`MatchID`) REFERENCES `matchs` (`MatchID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
