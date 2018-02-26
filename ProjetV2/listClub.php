<?php
/**
 * Created by PhpStorm.
 * User: Bastien
 * Date: 06/01/2018
 * Time: 03:21
 */

include_once('../traitementPHP/connection.php'); // connection base de données
$con = mysqli_connect('localhost','root','','fcsochaux');
$req = "SELECT ClubID,ClubName,ClubVille 
        FROM clubs
        WHERE 0=0";

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
    <title>Fiche Club</title>
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
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

        <div class="feuilleDeMatch col-lg-10">

            <div class="barreTitre">
                <h1>Liste des clubs </h1>
            </div>

            <div class="starter-template">

                <div class="row">
                    <?php
                    while($row = mysqli_fetch_array($result)) { ?>
                        <div class="colone col-sm-11">
                            <div class="listeJoueur" style="margin-bottom: 100px">
                                <?php echo '<a href="pageClub.php?ClubID='.$row[0].'"> '.$row[1].' '." - ".' '.$row[2].'</a>'; ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>

        </div>
    </div>
</div>

</body>
</html>
