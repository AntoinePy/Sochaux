<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Fiche Joueur</title>
    <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="../css/feuilleDeMatch.css" type="text/css" rel="stylesheet" />
    <link href="../css/rechercheJoueur.css" type="text/css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="../js/listeDeroulante.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/rechercheJoueur.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/popup.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>

<?php
include_once('../traitementPHP/connection.php'); // connection base de données
?>

<?php
function mb_form_option($class, $value,$echo) {
    return	"<OPTION class=\"$class\" value=\"$value\"> $echo </OPTION>";
}
?>

<div class="navigation col-lg-2">
    <?php include 'navigation.html' ?>
</div>

<div class="feuilleDeMatch col-lg-10">

    <div class="barreTitre">
        <h1>Rechercher un Club </h1>

    </div>

    <div class="starter-template">

        <div class="row">
            <div class="colone col-sm-6">

                <div class="liste1" style="margin-bottom: 100px">
                    <form method="post" action="listeClub.php">
                        <input id="www" type="joueur" list="clubListe" class="formulaireRechercheClub"
                               placeholder="Saisissez nom club" Name="NomClub">
                        <?php
                        $championnats = $bd->query('SELECT * FROM championships'); ?>
                        <datalist id="clubListe">
                            <?php while ($championnat= $championnats->fetch()){ ?>
                            <option value=<?php echo $championnat['ChampionshipName']; ?> >
                                <?php } ?>
                        </datalist>
                        <?php
                        $champs = $bd->query('SELECT * FROM championships'); ?>
                        <SELECT title="championnat" id ="championnat1" Name="Championnat" class="formulaireRechercheJoueur" onchange='activListClub(1, this.value)'>
                            <option value="">Championnat</option>
                            <?php while ($champ = $champs->fetch()){ ?>
                                <OPTION class="formulaireRechercheJoueurSelectionne" value=<?php echo $champ['ChampionshipID']; ?> > <?php echo $champ['ChampionshipName']; ?> </OPTION>
                            <?php } ?>
                        </SELECT>
                        </br></br>
                        <SELECT title="club" id ="club1" Name="Club"  class="formulaireRechercheJoueur"  disabled>"
                            <option value="" disabled selected>Club</option>
                        </SELECT>
                        </br></br>

                        <input  type="submit" id="uname" name="name" class="boutonRechercher">
                    </form>
                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>