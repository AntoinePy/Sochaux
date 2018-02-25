<?php
/**
 * Created by PhpStorm.
 * User: Bastien
 * Date: 06/01/2018
 * Time: 03:21
 */

include_once('php/connectionJoueurs.php'); // connection base de données
$con = mysqli_connect('localhost','root','','fcsochaux');
$req = "SELECT *  
        FROM players 
        WHERE 0=0";

if (isset ($_POST['NomJoueur'])&& $_POST['NomJoueur'] != "") {
    $nomJoueur = $_POST['NomJoueur'];
    $req .= " AND PlayerFamilyName="."'$nomJoueur'";
}

if (isset ($_POST['Poste']) && $_POST['Poste'] != ""){
    $poste = $_POST['Poste'];
    $req .= " AND PositionID1=".$poste;
}

if (isset ($_POST['Pays']) && $_POST['Pays'] != ""){
    $pays = $_POST['Pays'];
    $req .= " AND NationID=".$pays;
}

if (isset ($_POST['Note']) && $_POST['Note'] != ""){
    $note = $_POST['Note'];
    $req .= " AND PlayerNoteID=".$note;
}

if (isset ($_POST['Club']) && $_POST['Club'] != ""){
    $club = $_POST['Club'];
    $req .= " AND ClubID=".$club;
}else {
    if (isset ($_POST['Championnat']) && $_POST['Championnat'] != "") {
        $championnat = $_POST['Championnat'];
        $req .= " AND ClubID IN (SELECT ClubID FROM clubs WHERE ChampionshipID=".$championnat.")";
    }
}
$result = mysqli_query($con,$req);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Liste Joueurs</title>
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
                <h1>Liste des joueurs </h1>

            </div>

            <div class="starter-template">

                <div class="row">
                    <?php
                            while($row = mysqli_fetch_array($result)) {?>
                    <div class="colone col-sm-6">
                        <?php
                            $reqNation = "SELECT NationName FROM nations WHERE NationID=".$row['NationID'];
                            $reqClub = "SELECT ClubName FROM clubs WHERE ClubID=".$row['ClubID'];
                            $reqPosition = "SELECT PositionName FROM positions WHERE positionID=".$row['PositionID1'];
                            $resultNation = mysqli_query($con,$reqNation);
                            $resultClub = mysqli_query($con,$reqClub);
                            $resultPosition = mysqli_query($con,$reqPosition);
                            if ($resultNation && $resultClub && $resultPosition) {
                                while ($rowNation = mysqli_fetch_array($resultNation)) {
                                    while ($rowClub = mysqli_fetch_array($resultClub)) {
                                        while ($rowPosition = mysqli_fetch_array($resultPosition)) {


                                            if (isset ($row['PlayerImageFilePath'])) {
                                                $srcImage = $row['PlayerImageFilePath'];
                                            } else {
                                                $srcImage = "defaut.png";
                                            }
                                            if (isset ($row['PlayerID'])) {
                                                $idPlayer = $row['PlayerID'];
                                            } else {
                                                $idPlayer = "";
                                            }
                                            if (isset ($row['PlayerFirstName'])) {
                                                $playerFirstName = $row['PlayerFirstName'];
                                            } else {
                                                $playerFirstName = "";
                                            }
                                            if (isset ($row['PlayerFamilyName'])) {
                                                $playerFamilyName = $row['PlayerFamilyName'];
                                            } else {
                                                $playerFamilyName = "";
                                            }
                                            if (isset ($rowNation['NationName'])) {
                                                $playerNation = $rowNation['NationName'];
                                            } else {
                                                $playerNation = "";
                                            }
                                            if (isset ($rowClub['ClubName'])) {
                                                $playerClub = $rowClub['ClubName'];
                                            } else {
                                                $playerClub = "";
                                            }
                                            if (isset ($rowPosition['PositionName'])) {
                                                $playerPosition = $rowPosition['PositionName'];
                                            } else {
                                                $playerPosition = "";
                                            }
                                            ?>
                                            <div class="listeJoueur" style="margin-bottom: 100px">
                                                <img src="../images/<?php echo $srcImage; ?> " width="70" height="70"/>
                                                <?php echo '<a href="pageJoueur.php?IDJoueur=' . $idPlayer . '"> ' . $playerFirstName . ' ' . " " . ' ' . $playerFamilyName . '</a>'; ?>
                                                <?php echo " - ", $playerNation, " - ", $playerClub, " - ", $playerPosition; ?>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                            }else{
                                if (isset ($row['PlayerImageFilePath'])) {
                                    $srcImage = $row['PlayerImageFilePath'];
                                } else {
                                    $srcImage = "defaut.png";
                                }
                                if (isset ($row['PlayerID'])) {
                                    $idPlayer = $row['PlayerID'];
                                } else {
                                    $idPlayer = "";
                                }
                                if (isset ($row['PlayerFirstName'])) {
                                    $playerFirstName = $row['PlayerFirstName'];
                                } else {
                                    $playerFirstName = "";
                                }
                                if (isset ($row['PlayerFamilyName'])) {
                                    $playerFamilyName = $row['PlayerFamilyName'];
                                } else {
                                    $playerFamilyName = "";
                                }
                                if (isset ($rowNation['NationName'])) {
                                    $playerNation = $rowNation['NationName'];
                                } else {
                                    $playerNation = "";
                                }
                                if (isset ($rowClub['ClubName'])) {
                                    $playerClub = $rowClub['ClubName'];
                                } else {
                                    $playerClub = "";
                                }
                                if (isset ($rowPosition['PositionName'])) {
                                    $playerPosition = $rowPosition['PositionName'];
                                } else {
                                    $playerPosition = "";
                                }
                                ?>
                                <div class="listeJoueur" style="margin-bottom: 100px">
                                    <img src="../images/<?php echo $srcImage; ?> " width="70" height="70"/>
                                    <?php echo '<a href="pageJoueur.php?IDJoueur=' . $idPlayer . '"> ' . $playerFirstName . ' ' . " " . ' ' . $playerFamilyName . '</a>'; ?>
                                </div>
                                <?php
                            }
                             ?>
                    </div>
                    <?php } ?>
                </div>

            </div>

        </div>
    </div>
    
</div>


</body>
</html>
