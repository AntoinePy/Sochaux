<?php
/**
 * Created by PhpStorm.
 * User: sylva
 * Date: 06/02/2018
 * Time: 16:31
 */

    include 'connectionJoueurs.php';

    var_dump($_POST);

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
?>