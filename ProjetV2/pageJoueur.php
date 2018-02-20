<?php
/**
 * Created by PhpStorm.
 * User: Bastien
 * Date: 06/01/2018
 * Time: 03:21
 */

include_once('../traitementPHP/connection.php'); // connection base de données
$con = mysqli_connect('localhost','root','','fcsochaux');

$id = $_GET['IDJoueur'];

$req = "SELECT * FROM players WHERE PlayerID=$id";

$result = mysqli_query($con,$req);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Fiche Joueur</title>
    <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="../css/feuilleDeMatch.css" type="text/css" rel="stylesheet" />
    <link href="../css/rechercheJoueur.css" type="text/css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="css/navbarstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="../js/listeDeroulante.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/rechercheJoueur.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/popup.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <?php include 'navbar.php' ?>

        <div class="col-sm-10 feuilleDeMatch ">
            <?php
            while($row = mysqli_fetch_array($result)) {
                $reqNation = "SELECT NationName FROM nations WHERE NationID=".$row['NationID'];
                $reqClub = "SELECT ClubName FROM clubs WHERE ClubID=".$row['ClubID'];
                $reqPosition = "SELECT PositionName FROM positions WHERE positionID=".$row['PositionID1'];
                $resultNation = mysqli_query($con,$reqNation);
                $resultClub = mysqli_query($con,$reqClub);
                $resultPosition = mysqli_query($con,$reqPosition);
            ?>
            <div class="barreTitre">
                <h1>  <?php  echo $row['PlayerFirstName']; echo " ".$row['PlayerFamilyName'] ?></h1>
            </div>

            <div class="starter-template">

                <div class="row">
                    <div class="col-sm-11">
                        <div class="col-lg-4">
                            <img src="../images/<?php echo $row['PlayerImageFilePath']; ?> " width="220" height="300"/>
                        </div>
                        <div class="infoJoueur col-lg-8">
                            <?php
                            while($rowNation = mysqli_fetch_array($resultNation)) {
                                while($rowClub = mysqli_fetch_array($resultClub)) {
                                    while ($rowPosition = mysqli_fetch_array($resultPosition)) {?>
                                        <p>  Nationalité: <?php  echo $rowNation[0] ?></p></br>
                                        <p>  Club actuel: <?php  echo $rowClub[0] ?></p></br>
                                        <p>  Poste : <?php  echo $rowPosition[0] ?></p></br>
                                        <?php
                                    }
                                }
                            }
                            ?>
                            <p>  Pied : <?php  echo $row['PlayerFoot'] ?></p></br>
                            <p> Taille : <?php  echo $row['PlayerHeight'] ?></p></br>
                            <p> Poids : <?php  echo $row['PlayerWeight'] ?></p></br>
                            <p>  Note : <?php  echo $row['PlayerNote'] ?></p></br>
                            <p> Commentaire : <?php  echo $row['PlayerComment'] ?></p></br>
                        </div>
                        <?php } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
