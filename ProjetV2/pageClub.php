<?php
/**
 * Created by PhpStorm.
 * User: Bastien
 * Date: 06/01/2018
 * Time: 03:21
 */

include_once('../traitementPHP/connection.php'); // connection base de données
$con = mysqli_connect('localhost','root','','fcsochaux');

$id = $_GET['ClubID'];

$req = "SELECT *  
        FROM clubs 
        WHERE ClubID=$id";
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
        <div class="feuilleDeMatch col-lg-10">
            <?php
                while($row = mysqli_fetch_array($result)) { ?>
                <div class="barreTitre">
                    <h1>  <?php  echo $row['ClubName']; ?></h1>
                </div>

                <div class="starter-template">

                    <div class="row">
                        <div class="colone col-sm-11">
                            <h2>  Nom du club : <?php  echo $row['ClubName'] ?></h2></br>
                            <h2> Ville : <?php  echo $row['ClubVille'] ?></h2></br>
                            <h2> Adresse : <?php  echo $row['ClubAdress'] ?></h2></br>
                        </div>
                    <?php } ?>
                  </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
