<?php
/**
 * Created by PhpStorm.
 * User: sylva
 * Date: 06/02/2018
 * Time: 16:31
 */

    include 'connectionJoueurs.php';

    //var_dump($_POST);

/*$con = mysqli_connect('localhost','root','','fcsochaux');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"fcsochaux");
$sql="INSERT INTO championships (ChampionshipID, ChampionshipName, NationID) VALUES (null, '".$_GET['q']."',".$_GET['n'].")";
if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($con);*/

    // création match
    try {
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $req = $bd->prepare("INSERT INTO matchs (MatchPlace, MatchDate, MatchCondition, MatchComment, MatchAuthor, TournamentID, ClubID1, ClubID2)
                                       VALUES(:matchPlace, :matchDate, :matchCondition, :matchComment, :matchAuthor, :tournamentID, :clubID1, :clubID2)");
        $req->bindParam(':matchPlace', $_POST['matchPlace'], PDO::PARAM_STR,255);
        $req->bindParam(':matchDate', $_POST['matchDate'],PDO::PARAM_STR,255);
        $req->bindParam(':matchCondition', $_POST['matchCondition'], PDO::PARAM_STR,255);
        $req->bindParam(':matchComment', $_POST['matchComment'], PDO::PARAM_STR,255);
        $req->bindParam(':matchAuthor', $_POST['matchAuthor'], PDO::PARAM_STR,255);
        $req->bindParam(':tournamentID', $_POST['tournamentID'],PDO::PARAM_STR,255);
        $req->bindParam(':clubID1', $_POST['club1ID'], PDO::PARAM_STR,255);
        $req->bindParam(':clubID2', $_POST['club2ID'], PDO::PARAM_STR,255);
        $req->execute();
    } catch (Exception $e) {
        die('erreur :'.$e->getMessage());
    }
    $req->closeCursor();

    $idMatch = $bd->lastInsertId();

    // enregistrement score equipe 1
    try {
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $req = $bd->prepare("INSERT INTO clubs_matchs (ClubID, MatchID, Club_MatchScore, Club_MatchHalfScore)
                                           VALUES(:clubID, :matchID, :club_matchScore, :club_matchHalfScore)");
        $req->bindParam(':clubID', $_POST['club1ID'], PDO::PARAM_STR,255);
        $req->bindParam(':matchID', $idMatch,PDO::PARAM_STR,255);
        $req->bindParam(':club_matchScore', $_POST['scoreEquipe1'], PDO::PARAM_STR,255);
        $req->bindParam(':club_matchHalfScore', $_POST['scoreEquipe2'], PDO::PARAM_STR,255);
        $req->execute();
    } catch (Exception $e) {
        die('erreur :'.$e->getMessage());
    }
    $req->closeCursor();

    // enregistrement score equipe 2
    try {
        $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $req = $bd->prepare("INSERT INTO clubs_matchs (ClubID, MatchID, Club_MatchScore, Club_MatchHalfScore)
                                               VALUES(:clubID, :matchID, :club_matchScore, :club_matchHalfScore)");
        $req->bindParam(':clubID', $_POST['club2ID'], PDO::PARAM_STR,255);
        $req->bindParam(':matchID', $idMatch,PDO::PARAM_STR,255);
        $req->bindParam(':club_matchScore', $_POST['scoreEquipe2'], PDO::PARAM_STR,255);
        $req->bindParam(':club_matchHalfScore', $_POST['scoreEquipe1'], PDO::PARAM_STR,255);
        $req->execute();
    } catch (Exception $e) {
        die('erreur :'.$e->getMessage());
    }
    $req->closeCursor();

    // joueur interressant participant au match
    for($i = 0; $i < $_POST['nbJoueursInterressants1']; $i++) {
        try {
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $req = $bd->prepare("INSERT INTO players_matchs (PlayerID, MatchID, Player_MatchComment, Player_MatchDecisive, Player_MatchGoals, Player_MatchTimeGame)
                                           VALUES(:playerID, :matchID, :player_MatchComment, :player_MatchDecisive, :player_MatchGoals, :player_MatchTimeGame)");
            $req->bindParam(':playerID', $_POST['idEquipe1Joueur' . ($i+1)], PDO::PARAM_STR,255);
            $req->bindParam(':matchID', $idMatch,PDO::PARAM_STR,255);
            $req->bindParam(':player_MatchComment', $_POST['commentaireEquipe1Joueur' . ($i+1)], PDO::PARAM_STR,255);
            $req->bindParam(':player_MatchDecisive', $_POST['passeJoueur' . ($i+1) . 'Equipe1'], PDO::PARAM_STR,255);
            $req->bindParam(':player_MatchGoals', $_POST['butJoueur' . ($i+1) . 'Equipe1'], PDO::PARAM_STR,255);
            $req->bindParam(':player_MatchTimeGame', $_POST['tempsJeuEquipe1Joueur' . ($i+1)], PDO::PARAM_STR,255);
            $req->execute();
        } catch (Exception $e) {
            die('erreur :'.$e->getMessage());
        }
        $req->closeCursor();
    }
    for($i = 0; $i < $_POST['nbJoueursInterressants2']; $i++) {
        try {
            $bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $bd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $req = $bd->prepare("INSERT INTO players_matchs (PlayerID, MatchID, Player_MatchComment, Player_MatchDecisive, Player_MatchGoals, Player_MatchTimeGame)
                                           VALUES(:playerID, :matchID, :player_MatchComment, :player_MatchDecisive, :player_MatchGoals, :player_MatchTimeGame)");
            $req->bindParam(':playerID', $_POST['idEquipe2Joueur' . ($i+1)], PDO::PARAM_STR,255);
            $req->bindParam(':matchID', $idMatch,PDO::PARAM_STR,255);
            $req->bindParam(':player_MatchComment', $_POST['commentaireEquipe2Joueur' . ($i+1)], PDO::PARAM_STR,255);
            $req->bindParam(':player_MatchDecisive', $_POST['passeJoueur' . ($i+1) . 'Equipe2'], PDO::PARAM_STR,255);
            $req->bindParam(':player_MatchGoals', $_POST['butJoueur' . ($i+1) . 'Equipe2'], PDO::PARAM_STR,255);
            $req->bindParam(':player_MatchTimeGame', $_POST['tempsJeuEquipe2Joueur' . ($i+1)], PDO::PARAM_STR,255);
            $req->execute();
        } catch (Exception $e) {
            die('erreur :'.$e->getMessage());
        }
        $req->closeCursor();
    }
?>