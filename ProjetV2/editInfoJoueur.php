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

            ?>
            <div class="barreTitre">
                <h1>  <?php echo $row['PlayerFirstName'];
                    echo " " . $row['PlayerFamilyName'] ?></h1>
            </div>

            <div class="starter-template">

                <div class="row">
                    <div class="colone col-sm-6">

                        <div class="liste1" style="margin-bottom: 100px">
                            <form method="post" action="updateInfoJoueur.php">

                                <div class="form-group">
                                    <?php
                                    $positions = $bd->query('SELECT * FROM positions'); ?>
                                    <SELECT title="Poste" id="poste" Name="Poste" class="form-control">
                                        <option value="">Poste</option>
                                        <?php while ($position = $positions->fetch()) { ?>
                                            <OPTION class="formulaireRechercheJoueurSelectionne"
                                                    <?php if($position['PositionID'] == $row['PositionID1']) echo 'selected="selected"'?> value=<?php echo $position['PositionID']; ?>> <?php echo $position['PositionName']; ?> </OPTION>
                                        <?php } ?>
                                    </SELECT>
                                </div>

                                <div class="form-group">
                                    <?php
                                    $nations = $bd->query('SELECT * FROM nations'); ?>
                                    <SELECT title="pays" id="pays" Name="Pays" class="form-control">
                                        <option value="">Nation</option>
                                        <?php while ($nation = $nations->fetch()) { ?>
                                            <OPTION class="formulaireRechercheJoueurSelectionne"
                                                    <?php if($nation['NationID'] == $row['NationID']) echo 'selected="selected"'?> value=<?php echo $nation['NationID']; ?>> <?php echo $nation['NationName']; ?> </OPTION>
                                        <?php } ?>
                                    </SELECT>
                                </div>

                                <div class="form-group">
                                    <?php
                                    $champs = $bd->query('SELECT * FROM championships'); ?>
                                    <SELECT title="championnat" id="championnat1" Name="Championnat"
                                            class="form-control" onchange='activListClub(1, this.value)'>
                                        <option value="">Championnat</option>
                                        <?php while ($champ = $champs->fetch()) { ?>
                                            <OPTION class="formulaireRechercheJoueurSelectionne"
                                                    value=<?php echo $champ['ChampionshipID']; ?> > <?php echo $champ['ChampionshipName']; ?> </OPTION>
                                        <?php } ?>
                                    </SELECT>
                                </div>

                                <div class="form-group">
                                    <SELECT title="club" id="club1" Name="Club" class="form-control" disabled>"
                                        <option value="" disabled selected>Club</option>
                                    </SELECT>
                                </div>

                                <div class="form-group">
                                    <?php
                                    $notes = $bd->query('SELECT * FROM notes'); ?>
                                    <SELECT title="note" id="note1" Name="Note" class="form-control">
                                        <option value="">Note</option>
                                        <?php while ($note = $notes->fetch()) {
                                            ?>
                                            <OPTION class="formulaireRechercheJoueurSelectionne" <?php if($note['NoteID'] == $row['PlayerNoteID']) echo 'selected="selected"'?> value=<?php echo $note['NoteID']; ?>> <?php echo $note['NoteName']; ?> </OPTION>
                                        <?php } ?>
                                    </SELECT>
                                </div>

                                <div class="form-group">
                                    <SELECT title="Pied" id="pied" Name="Pied" class="form-control">
                                        <option value="" >Pied</option>
                                        <option value="Droit" <?php if($row['PlayerFoot'] == "Droit") echo 'selected="selected"'?>>Droit</option>
                                        <option value="Gauche" <?php if($row['PlayerFoot'] == "Gauche") echo 'selected="selected"'?>>Gauche</option>
                                    </SELECT>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Poids: " Name="PoidJoueur" value="<?php echo $row['PlayerWeight']; ?>">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Taille: " Name="TailleJoueur" value="<?php echo $row['PlayerHeight']; ?>">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Numéro: " Name="NumberJoueur" value="<?php echo $row['PlayerNumber']; ?>">
                                </div>

                                <div class="form-group">
                                    <textarea placeholder="Commentaire: " class="form-control" rows="5" id="comment"  Name="CommentaireJoueur" ><?php echo $row['PlayerComment']; ?></textarea>
                                </div>
                                <input type="submit" id="uname" name="name" class="btn btn-primary">
                                <?php echo '<a href="pageJoueur.php?IDJoueur=' . $id. '"> <input href="pageJoueur.php?IDJoueur=' . $id. '" type="button" class="btn btn-dark" value="retour"></a>'; ?>
                                <?php } ?>
                                <input type="hidden" id="playerID" name="playerID" value=<?php echo $id; ?>>
                            </form>
                        </div>
    </div>
</div>
</body>
</html>
