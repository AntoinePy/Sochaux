-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  lun. 04 déc. 2017 à 22:48
-- Version du serveur :  10.1.28-MariaDB
-- Version de PHP :  7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `esurleau`
--

-- --------------------------------------------------------

--
-- Structure de la table `championships`
--

CREATE TABLE `championships` (
  `ChampionshipID` smallint(3) UNSIGNED NOT NULL,
  `ChampionshipName` char(50) DEFAULT NULL,
  `NationID` smallint(4) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `championships`
--

INSERT INTO `championships` (`ChampionshipID`, `ChampionshipName`, `NationID`) VALUES
(2, 'Ligue 1', 6),
(3, 'Ligue 2', 6),
(4, 'LaLiga', 7),
(5, 'LaLiga 2', 7),
(6, 'Bundesliga', 9),
(7, 'Bundesliga 2', 9),
(8, 'Serie A', 8),
(9, 'Serie B', 8);


-- --------------------------------------------------------

--
-- Structure de la table `clubs`
--

CREATE TABLE `clubs` (
  `ClubID` smallint(3) UNSIGNED NOT NULL,
  `ClubName` char(50) DEFAULT NULL,
  `ClubVille` char(50) DEFAULT NULL,
  `ClubAdress` char(100) DEFAULT NULL,
  `ChampionshipID` smallint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `clubs`
--

INSERT INTO `clubs` (`ClubID`, `ClubName`, `ClubVille`, `ClubAdress`, `ChampionshipID`) VALUES
(1, 'FCSM', 'Sochaux', NULL, 3),
(2, 'OM', 'marseille', NULL, 2),
(3, 'PSG', 'paris saint germain', NULL, 2),
(4, 'DFCO', 'Dijon', NULL, 2),
(5, 'Barcelone', NULL, NULL, 4),
(6, 'Real Madrid', NULL, NULL, 4),
(7, 'Osasuna', NULL, NULL, 5),
(8, 'Cadix', NULL, NULL, 5),
(9, 'Bayern Munich', NULL, NULL, 6),
(10, 'Dortmund', NULL, NULL, 6),
(11, 'Juventus turin', NULL, NULL, 8),
(12, 'Inter Milan', NULL, NULL, 8),
(13, 'Palerme', NULL, NULL, 9),
(14, 'Parme', NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Structure de la table `clubs_matchs`
--

CREATE TABLE `clubs_matchs` (
  `ClubID` smallint(3) UNSIGNED NOT NULL,
  `MatchID` int(20) UNSIGNED NOT NULL,
  `Club_MatchScore` smallint(2) UNSIGNED DEFAULT NULL,
  `Club_MatchHalfScore` smallint(2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `CommentID` int(20) UNSIGNED NOT NULL,
  `CommentText` char(255) DEFAULT NULL,
  `CommentMinute` smallint(3) UNSIGNED DEFAULT NULL,
  `MatchID` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contracts`
--

CREATE TABLE `contracts` (
  `ContractID` int(4) UNSIGNED NOT NULL,
  `ContractComment` char(255) DEFAULT NULL,
  `ContractDateStart` date DEFAULT NULL,
  `ContractDateEnd` date DEFAULT NULL,
  `ContractPrice` int(10) UNSIGNED DEFAULT NULL,
  `ClubID` smallint(3) UNSIGNED DEFAULT NULL,
  `PlayerID` int(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `FormationID` smallint(2) UNSIGNED NOT NULL,
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
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`FormationID`, `FormationName`, `Position1`, `Position2`, `Position3`, `Position4`, `Position5`, `Position6`, `Position7`, `Position8`, `Position9`, `Position10`, `Position11`) VALUES
(4, '4-4-2 losange', 1, 3, 2, 8, 7, 5, 6, 11, 12, 15, 16),
(5, '4-4-2 carré', 1, 3, 2, 10, 9, 8, 7, 12, 11, 16, 15),
(6, '4-3-3', 1, 4, 2, 3, 8, 7, 20, 12, 11, 16, 15),
(7, '4-5-1', 1, 4, 9, 10, 7, 8, 5, 12, 11, 16, 15),
(8, '5-3-2', 1, 3, 2, 8, 7, 20, 12, 11, 13, 16, 15),
(9, '3-5-2', 1, 3, 2, 10, 9, 8, 7, 6, 13, 15, 16),
(10, '5-4-1', 1, 4, 8, 7, 9, 10, 12, 11, 13, 16, 15);

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

CREATE TABLE `matchs` (
  `MatchID` int(20) UNSIGNED NOT NULL,
  `MatchPlace` char(50) DEFAULT NULL,
  `MatchDate` date DEFAULT NULL,
  `MatchCondition` char(50) DEFAULT NULL,
  `MatchComment` char(255) DEFAULT NULL,
  `MatchAuthor` char(50) DEFAULT NULL,
  `TournamentID` smallint(4) UNSIGNED DEFAULT NULL,
  `ClubID1` smallint(3) UNSIGNED DEFAULT NULL,
  `ClubID2` smallint(3) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `nations`
--

CREATE TABLE `nations` (
  `NationID` smallint(4) UNSIGNED NOT NULL,
  `NationName` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `nations`
--

INSERT INTO `nations` (`NationID`, `NationName`) VALUES
(6, 'France'),
(7, 'Espagne'),
(8, 'Italie'),
(9, 'Allemagne');

-- --------------------------------------------------------

--
-- Structure de la table `players`
--

CREATE TABLE `players` (
  `PlayerID` int(20) UNSIGNED NOT NULL,
  `PlayerFirstName` char(50) NOT NULL,
  `PlayerFamilyName` char(50) NOT NULL,
  `PlayerWeight` smallint(3) UNSIGNED DEFAULT NULL,
  `PlayerHeight` smallint(3) UNSIGNED DEFAULT NULL,
  `PlayerFoot` char(10) DEFAULT NULL,
  `PlayerComment` char(255) DEFAULT NULL,
  `PlayerVideoFilePath` char(255) DEFAULT NULL,
  `PlayerNote` smallint(2) UNSIGNED DEFAULT NULL,
  `ClubID` smallint(3) UNSIGNED DEFAULT NULL,
  `PositionID1` smallint(2) UNSIGNED DEFAULT NULL,
  `PositionID2` smallint(2) UNSIGNED DEFAULT NULL,
  `PositionID3` smallint(2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `players_matchs`
--

CREATE TABLE `players_matchs` (
  `PlayerID` int(20) UNSIGNED NOT NULL,
  `MatchID` int(20) UNSIGNED NOT NULL,
  `Player_MatchComment` char(255) DEFAULT NULL,
  `Player_MatchDecisive` smallint(2) UNSIGNED DEFAULT NULL,
  `Player_MatchGoals` smallint(2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `positions`
--

CREATE TABLE `positions` (
  `PositionID` smallint(2) UNSIGNED NOT NULL,
  `PositionName` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `positions`
--

INSERT INTO `positions` (`PositionID`, `PositionName`) VALUES
(1, 'Gardien'),
(2, 'Avant Gauche'),
(3, 'Avant Droit'),
(4, 'Avant Centre'),
(5, 'Milieu Offensif'),
(6, 'Milieu Défensif'),
(7, 'Milieu Gauche'),
(8, 'Milieu Droit'),
(9, 'Ailier Gauche'),
(10, 'Ailier Droit'),
(11, 'Arrière Gauche'),
(12, 'Arrière Droit'),
(13, 'Défenseur Central'),
(15, 'Défenseur Gauche'),
(16, 'Défenseur Droit'),
(20, 'Milieu Central');

-- --------------------------------------------------------

--
-- Structure de la table `tournaments`
--

CREATE TABLE `tournaments` (
  `TournamentID` smallint(4) UNSIGNED NOT NULL,
  `TournamentName` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `championships`
--
ALTER TABLE `championships`
  ADD PRIMARY KEY (`ChampionshipID`),
  ADD KEY `NationID` (`NationID`);

--
-- Index pour la table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`ClubID`),
  ADD KEY `ChampionshipID` (`ChampionshipID`);

--
-- Index pour la table `clubs_matchs`
--
ALTER TABLE `clubs_matchs`
  ADD PRIMARY KEY (`ClubID`,`MatchID`),
  ADD KEY `MatchID` (`MatchID`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentID`),
  ADD KEY `MatchID` (`MatchID`);

--
-- Index pour la table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`ContractID`),
  ADD KEY `ClubID` (`ClubID`),
  ADD KEY `PlayerID` (`PlayerID`);

--
-- Index pour la table `formations`
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
-- Index pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`MatchID`),
  ADD KEY `TournamentID` (`TournamentID`),
  ADD KEY `ClubID1` (`ClubID1`),
  ADD KEY `ClubID2` (`ClubID2`);

--
-- Index pour la table `nations`
--
ALTER TABLE `nations`
  ADD PRIMARY KEY (`NationID`);

--
-- Index pour la table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`PlayerID`),
  ADD KEY `ClubID` (`ClubID`),
  ADD KEY `PositionID1` (`PositionID1`),
  ADD KEY `PositionID2` (`PositionID2`),
  ADD KEY `PositionID3` (`PositionID3`);

--
-- Index pour la table `players_matchs`
--
ALTER TABLE `players_matchs`
  ADD PRIMARY KEY (`PlayerID`,`MatchID`),
  ADD KEY `MatchID` (`MatchID`);

--
-- Index pour la table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`PositionID`);

--
-- Index pour la table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`TournamentID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `championships`
--
ALTER TABLE `championships`
  MODIFY `ChampionshipID` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `ClubID` smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `ContractID` int(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `FormationID` smallint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `MatchID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `nations`
--
ALTER TABLE `nations`
  MODIFY `NationID` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `players`
--
ALTER TABLE `players`
  MODIFY `PlayerID` int(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `positions`
--
ALTER TABLE `positions`
  MODIFY `PositionID` smallint(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `TournamentID` smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `championships`
--
ALTER TABLE `championships`
  ADD CONSTRAINT `championships_ibfk_1` FOREIGN KEY (`NationID`) REFERENCES `nations` (`NationID`);

--
-- Contraintes pour la table `clubs`
--
ALTER TABLE `clubs`
  ADD CONSTRAINT `clubs_ibfk_1` FOREIGN KEY (`ChampionshipID`) REFERENCES `championships` (`ChampionshipID`);

--
-- Contraintes pour la table `clubs_matchs`
--
ALTER TABLE `clubs_matchs`
  ADD CONSTRAINT `clubs_matchs_ibfk_1` FOREIGN KEY (`ClubID`) REFERENCES `clubs` (`ClubID`),
  ADD CONSTRAINT `clubs_matchs_ibfk_2` FOREIGN KEY (`MatchID`) REFERENCES `matchs` (`MatchID`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`MatchID`) REFERENCES `matchs` (`MatchID`);

--
-- Contraintes pour la table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`ClubID`) REFERENCES `clubs` (`ClubID`),
  ADD CONSTRAINT `contracts_ibfk_2` FOREIGN KEY (`PlayerID`) REFERENCES `players` (`PlayerID`);

--
-- Contraintes pour la table `formations`
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
-- Contraintes pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD CONSTRAINT `matchs_ibfk_1` FOREIGN KEY (`TournamentID`) REFERENCES `tournaments` (`TournamentID`),
  ADD CONSTRAINT `matchs_ibfk_2` FOREIGN KEY (`ClubID1`) REFERENCES `clubs` (`ClubID`),
  ADD CONSTRAINT `matchs_ibfk_3` FOREIGN KEY (`ClubID2`) REFERENCES `clubs` (`ClubID`);

--
-- Contraintes pour la table `players`
--
ALTER TABLE `players`
  ADD CONSTRAINT `players_ibfk_1` FOREIGN KEY (`ClubID`) REFERENCES `clubs` (`ClubID`),
  ADD CONSTRAINT `players_ibfk_2` FOREIGN KEY (`PositionID1`) REFERENCES `positions` (`PositionID`),
  ADD CONSTRAINT `players_ibfk_3` FOREIGN KEY (`PositionID2`) REFERENCES `positions` (`PositionID`),
  ADD CONSTRAINT `players_ibfk_4` FOREIGN KEY (`PositionID3`) REFERENCES `positions` (`PositionID`);

--
-- Contraintes pour la table `players_matchs`
--
ALTER TABLE `players_matchs`
  ADD CONSTRAINT `players_matchs_ibfk_1` FOREIGN KEY (`PlayerID`) REFERENCES `players` (`PlayerID`),
  ADD CONSTRAINT `players_matchs_ibfk_2` FOREIGN KEY (`MatchID`) REFERENCES `matchs` (`MatchID`);
COMMIT;

ALTER TABLE `nations` ADD UNIQUE(`NationName`);
ALTER TABLE `championships` ADD UNIQUE(`ChampionshipName`);
ALTER TABLE `clubs` ADD UNIQUE(`ClubName`);


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
