<?php
/**
 * Created by PhpStorm.
 * User: Bastien
 * Date: 06/01/2018
 * Time: 03:21
 */

include_once('php/connectionJoueurs.php'); // connection base de données
$con = mysqli_connect('localhost','root','','fcsochaux');
$req = "SELECT * FROM matchs";
$result = mysqli_query($con,$req);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste des matchs</title>
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="css/feuilleDeMatch.css" type="text/css" rel="stylesheet" />
    <link href="css/rechercheJoueur.css" type="text/css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="assets/images/fcsm.png" />
    <link rel="stylesheet" type="text/css" href="css/navbarstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="js/listeDeroulanteJoueurs.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/rechercheJoueur.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/popup.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>

<div class="container-fluid">
    <div class="row">
        <?php include 'navbar.php' ?>
        <div class="feuilleDeMatch col-sm-10">
            <div class="barreTitre">
                <h1>Liste des matchs </h1>
            </div>
            <div class="starter-template">
                <div class="row">
                    <div class="col-sm-6">
                    <?php
                        while($row = mysqli_fetch_array($result)) {
                            $reqClub1 = "SELECT ClubName FROM clubs WHERE ClubID=".$row['ClubID1'];
                            $reqClub2 = "SELECT ClubName FROM clubs WHERE ClubID=".$row['ClubID2'];
                            $reqScoreMatch = "SELECT * FROM clubs_matchs WHERE MatchID=".$row['MatchID']." AND ClubID=".$row['ClubID1'];
                            $resultClub1 = mysqli_query($con,$reqClub1);
                            $resultClub2 = mysqli_query($con,$reqClub2);
                            $resultScoreMatch = mysqli_query($con,$reqScoreMatch);
                            while($rowClub1 = mysqli_fetch_array($resultClub1)) {
                                while($rowClub2 = mysqli_fetch_array($resultClub2)) {
                                    $rowScore = mysqli_fetch_array($resultScoreMatch)
                                    ?>
                                    <div class="colone listeJoueur" style="margin-bottom: 20px; padding: 10px">
                                        <?php echo '<a href="pageMatch.php?IDMatch=' . $row['MatchID'] . '"> ' . $rowClub1[0] . ' ' . " - " . ' ' . $rowClub2[0] . '</a>'; ?>
                                        <br><?php echo " Score: ", $rowScore['Club_MatchScore'], " - ", $rowScore['Club_MatchHalfScore'] ; ?>
                                        <br><?php echo " Auteur: ", $row['MatchAuthor']; ?>
                                        <br><?php echo " Condition du match: ", $row['MatchCondition']; ?>
                                    </div>
                                    <?php

                                    }
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
