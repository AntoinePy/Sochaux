<?php
include 'php/checkSession.php';
include 'php/connectionJoueurs.php';

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

    //récuperation ID des 2 clubs et du tournoi
    $reponse1 = $bd->query('SELECT * FROM clubs WHERE ClubName = \'' . $club1 . '\'');
    while ($donnees = $reponse1->fetch()) {
        $idClub1 = $donnees['ClubID'];
    }
    $reponse1->closeCursor();
    $reponse2 = $bd->query('SELECT * FROM clubs WHERE ClubName = \'' . $club2 . '\'');
    while ($donnees = $reponse2->fetch()) {
        $idClub2 = $donnees['ClubID'];
    }
    $reponse2->closeCursor();
    $reponse3 = $bd->query('SELECT * FROM tournaments WHERE TournamentName = \'' . $tournoiMatch . '\'');
    while ($donnees = $reponse3->fetch()) {
        $idTournoi = $donnees['TournamentID'];
    }
    $reponse2->closeCursor();

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
                <input type="hidden" name="matchDate" value="<?php echo $posts['dateMatch'] ?>">
                <input type="hidden" name="matchCondition" value="<?php echo $conditionMatch ?>">
                <input type="hidden" name="matchComment" value="<?php echo $commentaireMatch?>">
                <input type="hidden" name="matchAuthor" value="<?php echo $auteurMatch?>">
                <input type="hidden" name="tournamentID" value="<?php echo $idTournoi?>">
                <input type="hidden" name="club1ID" value="<?php echo $idClub1?>">
                <input type="hidden" name="club2ID" value="<?php echo $idClub2?>">
                <input type="hidden" name="nbJoueursInterressants1" value="<?php echo sizeof($joueursInterressantsEquipe1)?>">
                <input type="hidden" name="nbJoueursInterressants2" value="<?php echo sizeof($joueursInterressantsEquipe2)?>">
                <input type="hidden" name="scoreEquipe1" value="<?php echo $posts['scoreEquipe1'] ?>">
                <input type="hidden" name="scoreEquipe2" value="<?php echo $posts['scoreEquipe2'] ?>">

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

                    <div class="row"><h3 style="width: 95%;"><?php echo $club1 ?></h3></div>

                    <div class="row">

                        <table class="table" style="width: 95%;">
                            <thead>
                                <tr><th>#</th><th>Joueur</th><th>Commentaire</th><th>Temps de jeu</th><th>Pied et note</th><th>But et passe</th><th>Poste</th></tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach($joueursInterressantsEquipe1 as $joueur) {
                                $i++ ;
                                list($prenom, $nom) = explode(' ',  $joueur);
                                $reponse = $bd->query('SELECT * FROM players WHERE PlayerFirstName = \'' . $prenom . '\' AND PlayerFamilyName = \'' . $nom . '\'');
                                while ($donnees = $reponse->fetch()) { ?>
                                     <input type="hidden" name="idEquipe1Joueur<?php echo $i ?>" value="<?php echo $donnees['PlayerID']?>">
                                <?php }
                                $reponse->closeCursor();
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $joueur ?></td>
                                    <td><textarea class="form-control" name="commentaireEquipe1Joueur<?php echo $i ?>"></textarea></td>
                                    <td><textarea class="form-control" name="tempsJeuEquipe1Joueur<?php echo $i ?>"></textarea></td>
                                    <td>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item liste">
                                                <select class="form-control">
                                                    <option>Droitier</option>
                                                    <option>Gaucher</option>
                                                </select>
                                            </li>
                                            <li class="list-group-item liste">
                                                <select class="form-control">
                                                    <option>1 (ne pas suivre)</option>
                                                    <option>2 (à suivre)</option>
                                                    <option>3 (à recruter)</option>
                                                </select>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item liste">
                                                <label> But :
                                                    <input class="form-control" name="butJoueur<?php echo $i ?>Equipe1">
                                                </label>
                                            </li>
                                            <li class="list-group-item liste">
                                                <label> Passe :
                                                    <input class="form-control" name="passeJoueur<?php echo $i ?>Equipe1">
                                                </label>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <select class="form-control" name="posteEquipe1Joueur<?php echo $i?>">
                                            <?php
                                            // positions pour liste
                                            $listePositions = array();
                                            $sql = "SELECT PositionName FROM positions ORDER BY PositionID";
                                            $result = mysqli_query($con,$sql);
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

                    <div class="row"><h3 style="width: 95%;"><?php echo $club2 ?></h3></div>

                    <div class="row">

                        <table class="table" style="width: 95%;">
                            <thead>
                                <tr><th>#</th><th>Joueur</th><th>Commentaire</th><th>Temps de jeu</th><th>Pied et note</th><th>But et passe</th><th>Poste</th></tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach($joueursInterressantsEquipe2 as $joueur) {
                                $i++;
                                list($prenom, $nom) = explode(' ',  $joueur);
                                $reponse = $bd->query('SELECT * FROM players WHERE PlayerFirstName = \'' . $prenom . '\' AND PlayerFamilyName = \'' . $nom . '\'');
                                while ($donnees = $reponse->fetch()) { ?>
                                    <input type="hidden" name="idEquipe2Joueur<?php echo $i ?>" value="<?php echo $donnees['PlayerID']?>">
                                <?php }
                                $reponse->closeCursor();
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $joueur ?></td>
                                    <td><textarea class="form-control" name="commentaireEquipe2Joueur<?php echo $i ?>"></textarea></td>
                                    <td><textarea class="form-control" name="tempsJeuEquipe2Joueur<?php echo $i ?>"></textarea></td>
                                    <td>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item liste">
                                                <select class="form-control">
                                                    <option>Droitier</option>
                                                    <option>Gaucher</option>
                                                </select>
                                            </li>
                                            <li class="list-group-item liste">
                                                <select class="form-control">
                                                    <option>1 (ne pas suivre)</option>
                                                    <option>2 (à suivre)</option>
                                                    <option>3 (à recruter)</option>
                                                </select>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item liste">
                                                <label> But :
                                                    <input class="form-control" name="butJoueur<?php echo $i ?>Equipe2">
                                                </label>
                                            </li>
                                            <li class="list-group-item liste">
                                                <label> Passe :
                                                    <input class="form-control" name="passeJoueur<?php echo $i ?>Equipe2">
                                                </label>
                                            </li>
                                        </ul>
                                    </td>
                                    <td>
                                        <select class="form-control" name="posteEquipe1Joueur<?php echo $i?>">
                                            <?php
                                            // positions pour liste
                                            $listePositions = array();
                                            $sql = "SELECT PositionName FROM positions ORDER BY PositionID";
                                            $result = mysqli_query($con,$sql);
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
                <input class="btn btn-primary homebutton" type="submit" value="Valider" id="btnValiderCommentaire" onclick="document.location.href='index.php'"/>
                <a href="javascript:window.print()"><input type="text" value="imprimer" class="btn btn-default"></a>
            </form>
        </div>
    </div>
<!-- </form> -->
    <script type="text/javascript" src="js/listesDeroulantes.js"></script>

</body>

</html>
