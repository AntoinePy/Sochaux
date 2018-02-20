<?php
/**
 * Created by PhpStorm.
 * User: Bastien
 * Date: 06/01/2018
 * Time: 03:21
 */

include_once('../traitementPHP/connection.php'); // connection base de données
$con = mysqli_connect('localhost','root','','fcsochaux');
$req = "SELECT PlayerFirstName,PlayerFamilyName,PlayerImageFilePath, NationID, ClubID, PositionID1, playerID  
        FROM players 
        WHERE 0=0";

if (isset ($_POST['NomJoueur'])&& $_POST['NomJoueur'] != "") {
    $nomJoueur = $_POST['NomJoueur'];
    echo $nomJoueur;
    $req .= " AND PlayerFamilyName=".$nomJoueur;
}

if (isset ($_POST['Poste']) && $_POST['Poste'] != ""){
    $poste = $_POST['Poste'];
    $req .= " AND PositionID1=".$poste;
}

if (isset ($_POST['Pays']) && $_POST['Pays'] != ""){
    $pays = $_POST['Pays'];
    $req .= " AND NationID=".$pays;
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
    <title>Fiche Joueur</title>
    <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="../css/feuilleDeMatch.css" type="text/css" rel="stylesheet" />
    <link href="../css/rechercheJoueur.css" type="text/css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="../js/listeDeroulante.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/rechercheJoueur.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/popup.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>

<div class="navigation col-lg-2">
    <?php include 'navigation.html' ?>
</div>

<div class="feuilleDeMatch col-lg-10">

    <div class="barreTitre">
        <h1>Liste des joueurs </h1>
    </div>

    <div class="starter-template">

        <div class="row">
            <?php
                    while($row = mysqli_fetch_array($result)) { ?>
            <div class="colone col-sm-11">
                <?php
                    $reqNation = "SELECT NationName FROM nations WHERE NationID=".$row[3];
                    $reqClub = "SELECT ClubName FROM clubs WHERE ClubID=".$row[4];
                    $reqPosition = "SELECT PositionName FROM positions WHERE positionID=".$row[5];
                    $resultNation = mysqli_query($con,$reqNation);
                    $resultClub = mysqli_query($con,$reqClub);
                    $resultPosition = mysqli_query($con,$reqPosition);
                    while($rowNation = mysqli_fetch_array($resultNation)) {
                        while($rowClub = mysqli_fetch_array($resultClub)) {
                            while ($rowPosition = mysqli_fetch_array($resultPosition)) {
                                ?>
                                <div class="listeJoueur" style="margin-bottom: 100px">
                                    <img src="../images/<?php echo $row[2]; ?> " width="70" height="70"/>
                                    <?php echo '<a href="pageJoueur.php?IDJoueur='.$row[6].'"> '.$row[0].' '." ".' '.$row[1].'</a>'; ?>
                                    <?php echo " - ", $rowNation[0], " - ", $rowClub[0], " - ", $rowPosition[0]; ?>
                                </div>
                            <?php
                            }
                        }
                     }
                     ?>
            </div>
            <?php } ?>
        </div>

    </div>

</div>

</body>
</html>
