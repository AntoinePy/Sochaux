<!DOCTYPE html>
<html lang="fr">
<?php
include 'php/checkSession.php';
?>
<head>
    <meta charset="UTF-8">
    <title>Fiche Joueur</title>
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

<?php
include_once('php/connectionJoueurs.php'); // connection base de données
?>
<div class="container-fluid">
    <div class="row">
        <?php include 'navbar.php' ?>

        <div class="feuilleDeMatch col-lg-10">

            <div class="barreTitre">
                <h1>Rechercher un Club </h1>

            </div>

            <div class="starter-template">

                <div class="row">
                    <div class="colone col-sm-6">

                        <div class="liste1" style="margin-bottom: 100px">
                            <form method="post" action="listClub.php">

                                <div class="form-group">
                                    <?php
                                    $champs = $bd->query('SELECT * FROM championships'); ?>
                                    <SELECT title="championnat" id ="championnat1" Name="Championnat" class="form-control" onchange='activListClub(1, this.value)'>
                                        <option value="" >Championnat</option>
                                        <?php while ($champ = $champs->fetch()){ ?>
                                            <OPTION value=<?php echo $champ['ChampionshipID']; ?>> <?php echo $champ['ChampionshipName']; ?> </OPTION>
                                        <?php } ?>
                                    </SELECT>
                                </div>

                                <div class="form-group">
                                    <SELECT title="club" id ="club1" Name="Club" class="form-control" disabled>"
                                        <option value="" disabled selected>Club</option>
                                    </SELECT>
                                </div>

                                <input  type="submit" id="uname" name="name" class="btn btn-primary">
                            </form>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

</body>
</html>