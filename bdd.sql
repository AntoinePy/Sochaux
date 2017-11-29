CREATE TABLE Nations ( /* table des nations */
	NationID smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT,
	NationName char(50),
	PRIMARY KEY (NationID)
);

CREATE TABLE Tournaments ( /* table des tournois */
	TournamentID smallint(4) UNSIGNED NOT NULL AUTO_INCREMENT,
	TournamentName char(50),
	PRIMARY KEY (TournamentID)
);

CREATE TABLE Positions ( /* table des postes */
	PositionID smallint(2) UNSIGNED NOT NULL AUTO_INCREMENT,
	PositionName char(50),
	PRIMARY KEY (PositionID)
);

CREATE TABLE Formations ( /* table des formations */
	FormationID smallint(2) UNSIGNED NOT NULL AUTO_INCREMENT,
	FormationName char(10),
	Position1 smallint(2) UNSIGNED,
	Position2 smallint(2) UNSIGNED,
	Position3 smallint(2) UNSIGNED,
	Position4 smallint(2) UNSIGNED,
	Position5 smallint(2) UNSIGNED,
	Position6 smallint(2) UNSIGNED,
	Position7 smallint(2) UNSIGNED,
	Position8 smallint(2) UNSIGNED,
	Position9 smallint(2) UNSIGNED,
	Position10 smallint(2) UNSIGNED,
	Position11 smallint(2) UNSIGNED,
	PRIMARY KEY (FormationID),
	FOREIGN KEY (Position1) REFERENCES Positions(PositionID),
	FOREIGN KEY (Position2) REFERENCES Positions(PositionID),
	FOREIGN KEY (Position3) REFERENCES Positions(PositionID),
	FOREIGN KEY (Position4) REFERENCES Positions(PositionID),
	FOREIGN KEY (Position5) REFERENCES Positions(PositionID),
	FOREIGN KEY (Position6) REFERENCES Positions(PositionID),
	FOREIGN KEY (Position7) REFERENCES Positions(PositionID),
	FOREIGN KEY (Position8) REFERENCES Positions(PositionID),
	FOREIGN KEY (Position9) REFERENCES Positions(PositionID),
	FOREIGN KEY (Position10) REFERENCES Positions(PositionID),
	FOREIGN KEY (Position11) REFERENCES Positions(PositionID)
);


CREATE TABLE Championships ( /* table des championnats */
	ChampionshipID smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
	ChampionshipName char(50),
	NationID smallint(4) UNSIGNED,
	PRIMARY KEY (ChampionshipID),
	FOREIGN KEY (NationID) REFERENCES Nations(NationID)
);

CREATE TABLE Clubs ( /* table des clubs */
	ClubID smallint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
	ClubName char(50),
	ClubVille char(50),
	ClubAdress char(100),
	ChampionshipID smallint(3) UNSIGNED,
	PRIMARY KEY (ClubID),
	FOREIGN KEY (ChampionshipID) REFERENCES Championships(ChampionshipID)
);

CREATE TABLE Matchs ( /* table des matchs */
	MatchID int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	MatchPlace char(50),
	MatchDate date,
	MatchCondition char(50),
	MatchComment char(255),
	MatchAuthor char(50),
	TournamentID smallint(4) UNSIGNED,
	ClubID1 smallint(3) UNSIGNED,
	ClubID2 smallint(3) UNSIGNED,
	PRIMARY KEY (MatchID),
	FOREIGN KEY (TournamentID) REFERENCES Tournaments(TournamentID),
	FOREIGN KEY (ClubID1) REFERENCES Clubs(ClubID),
	FOREIGN KEY (ClubID2) REFERENCES Clubs(ClubID)
);

CREATE TABLE Comments ( /* table des commentaires des matchs */
	CommentID int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	CommentText char(255),
	CommentMinute smallint(3) UNSIGNED,
	MatchID int(20) UNSIGNED,
	PRIMARY KEY (CommentID),
	FOREIGN KEY (MatchID) REFERENCES Matchs(MatchID)
);

CREATE TABLE Players ( /* table des joueurs */
	PlayerID int(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	PlayerFirstName char(50) NOT NULL,
	PlayerFamilyName char(50) NOT NULL,
	PlayerWeight smallint(3) UNSIGNED,
	PlayerHeight smallint(3) UNSIGNED,
	PlayerFoot char(10),
	PlayerComment char(255),
	PlayerVideoFilePath char(255),
	PlayerNote smallint(2) UNSIGNED,
	ClubID smallint(3) UNSIGNED,
	PositionID1 smallint(2) UNSIGNED,
	PositionID2 smallint(2) UNSIGNED,
	PositionID3 smallint(2) UNSIGNED,
	PRIMARY KEY (PlayerID),
	FOREIGN KEY (ClubID) REFERENCES Clubs(ClubID),
	FOREIGN KEY (PositionID1) REFERENCES Positions(PositionID),
	FOREIGN KEY (PositionID2) REFERENCES Positions(PositionID),
	FOREIGN KEY (PositionID3) REFERENCES Positions(PositionID)
);

CREATE TABLE Contracts ( /* table des contrats joueurs/clubs */
	ContractID int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
	ContractComment char(255),
	ContractDateStart date,
	ContractDateEnd date,
	ContractPrice int(10) UNSIGNED,
	ClubID smallint(3) UNSIGNED,
	PlayerID int(20) UNSIGNED,
	PRIMARY KEY (ContractID),
	FOREIGN KEY (ClubID) REFERENCES Clubs(ClubID),
	FOREIGN KEY (PlayerID) REFERENCES Players(PlayerID)
);

CREATE TABLE Players_Matchs ( /* table des stats joueurs/matchs */
	PlayerID int(20) UNSIGNED NOT NULL,
	MatchID int(20) UNSIGNED NOT NULL,
	Player_MatchComment char(255),
	Player_MatchDecisive smallint(2) UNSIGNED,
	Player_MatchGoals smallint(2) UNSIGNED,
	PRIMARY KEY (PlayerID, MatchID),
	FOREIGN KEY (PlayerID) REFERENCES Players(PlayerID),
	FOREIGN KEY (MatchID) REFERENCES Matchs(MatchID)
);

CREATE TABLE Clubs_Matchs ( /* table des stats clubs/matchs */
	ClubID smallint(3) UNSIGNED NOT NULL,
	MatchID int(20) UNSIGNED NOT NULL,
	Club_MatchScore smallint(2) UNSIGNED,
	Club_MatchHalfScore smallint(2) UNSIGNED,
	PRIMARY KEY (ClubID, MatchID),
	FOREIGN KEY (ClubID) REFERENCES Clubs(ClubID),
    FOREIGN KEY (MatchID) REFERENCES Matchs(MatchID)
);

INSERT INTO `nations` (`NationID`, `NationName`) VALUES 
(1, 'France'),
(2, 'Espagne'),
(3, 'Italie'),
(4, 'Allemagne');

INSERT INTO `Championships` (`ChampionshipID`, `ChampionshipName`, `NationID`,) VALUES
(1, 'Ligue 1', 0),
(2, 'Ligue 2', 0);

INSERT INTO `clubs` (`ClubID`, `ClubName`, `ClubVille`, `ClubAdress`, `ChampionshipID`) VALUES
(1, 'FCSM', 'Sochaux', NULL, 3),
(2, 'OM', 'marseille', NULL, 2),
(3, 'PSG', 'paris saint germain', NULL, 2),
(4, 'DFCO', 'Dijon', NULL, 2);