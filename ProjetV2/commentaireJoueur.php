<?php
include 'php/checkSession.php';
 /*  cacher les erreurs php pour affichage correct
 ini_set("display_errors",0);error_reporting(0);*/
    $con = mysqli_connect('localhost','root','','fcsochaux');
    $posts = $_POST;
    $lieuMatch = $posts['lieuMatch'];
    list($year, $month, $day) = explode('-',  $posts['dateMatch']);
    $dateMatch = $day."/".$month."/".$year;
    $auteurMatch = $posts['auteurMatch'];
    $tournoiMatch = $posts['tournoiMatch'];
    $commentaireMatch = $posts['commentaireMatch'];
    $conditionMatch = $posts['conditionMatch'];
    $club1 = $posts['club1'];
    $club2 = $posts['club2'];
    $joueursInterressantsEquipe1 = array();
    $joueursInterressantsEquipe2 = array();

    $values = array_values($posts);

    // joueurs intérressant de l'équipe 1
    $keyClub2 = 0;
    foreach ($values as $key => $value) {
        if($value != $club2) {
            if ($value == 'on') {
                $joueursInterressantsEquipe1[] = $values[$key-1];
            }
        } else {
            $keyClub2 = $key;
            break;
        }

    }

    // joueurs intérressant de l'équipe 2
    foreach ($values as $key => $value) {
        if ($value == 'on' && $key > $keyClub2) {
            $joueursInterressantsEquipe2[] = $values[$key-1];
        }
    }

    // positions pour liste
    $listePositions = array();
    $sql = "SELECT PositionName FROM positions ORDER BY PositionID";
    $result = mysqli_query($con,$sql);
    //$row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<meta charset="utf-8">
<html>

<head>
    <title id="titreCom">Commentaires joueurs</title>
    <link rel="icon" type="image/png" href="assets/images/fcsm.png" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/commentairejoueurstyle.css">
    <link rel="stylesheet" type="text/css" href="css/navbarstyle.css">
    <link rel="stylesheet" type="text/css" href="css/impression.css" media="print">
</head>

<body>
<!-- <form action="recapFeuilleDeMatch.php" method="post"> -->
    <div class="container-fluid">

        <div class="row">

            <?php include 'navbar.php'; ?>

            <form class="col-sm-10" method="post" action="php/soumissionFeuilleDeMatchCommentaire.php">

                <input type="hidden" name="matchPlace" value="<?php echo $lieuMatch?>">
                <input type="hidden" name="matchDate" value="<?php $posts['dateMatch'] ?>">
                <input type="hidden" name="matchCondition" value="<?php echo $conditionMatch ?>">
                <input type="hidden" name="matchComment" value="<?php echo $commentaireMatch?>">
                <input type="hidden" name="matchAuthor" value="<?php echo $auteurMatch?>">
                <input type="hidden" name="tournamentID" value="<?php echo $tournoiMatch?>">
                <input type="hidden" name="club1ID" value="<?php echo $club1?>">
                <input type="hidden" name="club2ID" value="<?php echo $club2?>">

                <div class="row"><h1>Informations du match</h1></div>

                <div class="inputSelection">

                    <table class="table">
                        <tr><td id="lieuM">Lieu du match</td><td><?php echo $lieuMatch ?></td></tr>
                        <tr><td>Date du match</td><td><?php echo $dateMatch ?></td></tr>
                        <tr><td>Tournoi du match</td><td><?php echo $tournoiMatch ?></td></tr>
                        <tr><td>Auteur</td><td><?php echo $auteurMatch ?></td></tr>
                        <tr><td>Condition du match</td><td><?php echo $conditionMatch ?></td></tr>
                        <tr><td>Commentaire du match</td><td><?php echo $commentaireMatch ?></td></tr>
                    </table>

                </div>

                <div class="row"><h1>Commentaires joueurs</h1></div>

                <div class="inputSelection">

                    <div class="row"><h3><?php echo $club1 ?></h3></div>

                    <div class="row">

                        <table class="table" style="width: 95%;">
                            <thead>
                            <tr><th>#</th><th>Joueur</th><th>Commentaire</th><th>Temps de jeu</th><th>Pied</th><th>Note</th><th>Poste</th></tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach($joueursInterressantsEquipe1 as $joueur) {
                                $i++ ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $joueur ?></td>
                                    <td><textarea name="commentaireEquipe1Joueur<?php echo $i ?>"></textarea></td>
                                    <td><textarea name="tempsJeuEquipe1Joueur<?php echo $i ?>"></textarea></td>
                                    <td>
                                        <select>
                                            <option>Droitier</option>
                                            <option>Gaucher</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select>
                                            <option>1 (ne pas suivre)</option>
                                            <option>2 (à suivre)</option>
                                            <option>3 (à recruter)</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="posteEquipe1Joueur<?php echo $i?>">
                                            <?php
                                            while($row = mysqli_fetch_array($result)) {
                                                echo "<option value=" . $row[0] . ">" . $row[0] . "</option>";
                                            }
                                            ?>
                                        </select>
                                     </td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>

                    </div>

                    <div class="row"><h3><?php echo $club2 ?></h3></div>

                    <div class="row">

                        <table class="table" style="width: 95%;">
                            <thead>
                            <tr><th>#</th><th>Joueur</th><th>Commentaire</th><th>Temps de jeu</th><th>Pied</th><th>Note</th><th>Poste</th></tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach($joueursInterressantsEquipe2 as $joueur) {
                                $i++ ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $joueur ?></td>
                                    <td><textarea name="commentaireEquipe2Joueur<?php echo $i ?>"></textarea></td>
                                    <td><textarea name="tempsJeuEquipe2Joueur<?php echo $i ?>"></textarea></td>
                                    <td>
                                        <select>
                                            <option>Droitier</option>
                                            <option>Gaucher</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select>
                                            <option>1 (ne pas suivre)</option>
                                            <option>2 (suivre)</option>
                                            <option>3 (à recruter)</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="posteEquipe1Joueur<?php echo $i?>">
                                            <?php
                                            while($row = mysqli_fetch_array($result)) {
                                                echo "<option value=" . $row[0] . ">" . $row[0] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>

                    </div>

                </div>

                <input class="btn btn-dark homebutton" type="button" value="Retour" id="btnRetourCommentaire" onclick="document.location.href='feuilleMatch.php'"/>
                <input class="btn btn-primary homebutton" type="submit" value="Valider" id="btnValiderCommentaire" onclick=""/>
                <a href="javascript:window.print()"><button class="btn btn-default">Imprimer</button></a>
            </form>
        </div>
    </div>
<!-- </form> -->
    <script type="text/javascript" src="js/listesDeroulantes.js"></script>

</body>

</html>
