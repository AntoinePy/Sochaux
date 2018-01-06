<?php
/**
 * Created by PhpStorm.
 * User: Bastien
 * Date: 06/01/2018
 * Time: 03:21
 */

include_once('../traitementPHP/connection.php'); // connection base de données
$con = mysqli_connect('localhost','root','','fcsochaux');

$poste = $_POST['Poste'];
if (isset ($_POST['Pays'])){
    $pays = $_POST['Pays'];
}
$championnat = $_POST['Championnat'];

if (isset ($_POST['Club'])){
    $club = $_POST['Club'];
}

$nom = $_POST['NomJoueur'];


$req = "SELECT PlayerFirstName, PlayerFamilyName,PlayerImageFilePath  FROM players WHERE PositionID1=".$poste;
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
        <h1>Rechercher un Joueur </h1>

    </div>

    <div class="starter-template">

        <div class="row">
            <?php
                    while($row = mysqli_fetch_array($result)) {?>
            <div class="colone col-sm-6">

                <div class="liste1" style="margin-bottom: 100px">
                    <img src="../images/<?php echo $row[2]; ?>"/>
                    <?php
                    echo $row[0]," ";
                    echo $row[1];
                    ?>
                    </br>
                    <a>voir bio</a>
                </div>

            </div>
            <?php
            }
            ?>
        </div>

    </div>

</div>

</body>
</html>
