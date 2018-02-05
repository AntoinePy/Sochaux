<?php
include 'php/checkSession.php';

    $posts = $_POST;
    $lieuMatch = $posts['lieuMatch'];
    list($year, $month, $day) = explode('-',  $posts['dateMatch']);
    $dateMatch = $day."/".$month."/".$year;
    $auteurMatch = $posts['auteurMatch'];
    $tournoiMatch = $posts['tournoiMatch'];
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

?>

<!DOCTYPE html>
<meta charset="utf-8">
<html>

<head>
    <title>Commentaires joueurs</title>
    <link rel="icon" type="image/png" href="assets/images/fcsm.png" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/commentairejoueurstyle.css">
    <link rel="stylesheet" type="text/css" href="css/navbarstyle.css">
</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <?php include 'navbar.php'; ?>

            <div class="col-sm-10">

                <div class="row"><h1>Informations du match</h1></div>

                <div class="inputSelection">

                    <table class="table">
                        <tr><td>Lieu du match</td><td><?php echo $lieuMatch ?></td></tr>
                        <tr><td>Date du match</td><td><?php echo $dateMatch ?></td></tr>
                        <tr><td>Tournoi du match</td><td><?php echo $tournoiMatch ?></td></tr>
                        <tr><td>Auteur</td><td><?php echo $auteurMatch ?></td></tr>
                    </table>

                </div>

                <div class="row"><h1>Commentaires joueurs</h1></div>

                <div class="inputSelection">

                    <div class="row"><h3><?php echo $club1 ?></h3></div>

                    <div class="row">

                        <table class="table">
                            <thead>
                            <tr><th>#</th><th>Joueur</th><th>Commentaire</th></tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach($joueursInterressantsEquipe1 as $joueur) {
                                $i++ ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $joueur ?></td>
                                    <td><textarea></textarea></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>

                    </div>

                    <div class="row"><h3><?php echo $club2 ?></h3></div>

                    <div class="row">

                        <table class="table">
                            <thead>
                            <tr><th>#</th><th>Joueur</th><th>Commentaire</th></tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 0;
                            foreach($joueursInterressantsEquipe2 as $joueur) {
                                $i++ ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $joueur ?></td>
                                    <td><textarea></textarea></td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>

                    </div>

                </div>

                <input class="btn btn-dark homebutton" type="button" value="Retour" id="btnRetourCommentaire" onclick="document.location.href='feuilleMatch.php'"/>
                <input class="btn btn-primary homebutton" type="submit" value="Valider" id="btnValiderCommentaire" onclick=""/>

            </div>

        </div>

    </div>

    <script type="text/javascript" src="js/listesDeroulantes.js"></script>

</body>

</html>
