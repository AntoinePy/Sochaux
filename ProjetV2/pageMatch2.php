<?php
include 'php/checkSession.php';
$con = mysqli_connect('localhost','root','','fcsochaux');

$id = $_GET['IDMatch'];

$req = "SELECT * FROM matchs WHERE MatchID=$id";

$result = mysqli_query($con,$req);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title id="titreCom">Commentaires joueurs</title>
        <link rel="icon" type="image/png" href="assets/images/fcsm.png" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/commentairejoueurstyle.css">
        <link rel="stylesheet" type="text/css" href="css/navbarstyle.css">
        <link rel="stylesheet" type="text/css" href="css/impression.css" media="print">
    </head>
    <body>

    <div class="container-fluid">
        <div class="row">
            <?php include 'navbar.php'; ?>

            <div class="feuilleDeMatch col-sm-10">
                    <?php
                        while($row = mysqli_fetch_array($result)) {
                        $lieuMatch = $row['MatchPlace'];
                        $dateMatch = $row['MatchDate'];
                        $auteurMatch = $row['MatchAuthor'];
                        $conditionMatch = $row['MatchCondition'];
                        $commentaireMatch = $row['MatchComment'];
                        $resultatMatch = $row['MatchScore'];

                        $reqClub1 = "SELECT ClubName FROM clubs WHERE ClubID=".$row['ClubID1'];
                        $reqClub2 = "SELECT ClubName FROM clubs WHERE ClubID=".$row['ClubID2'];
                        $reqInfoMatchEquipe1 = "SELECT * FROM clubs_matchs WHERE MatchID=".$id." AND ClubID=".$row['ClubID1'];
                        $reqInfoMatchEquipe2 = "SELECT * FROM clubs_matchs WHERE MatchID=".$id." AND ClubID=".$row['ClubID2'];

                        $resultInfoMatchEquipe1 = mysqli_query($con,$reqInfoMatchEquipe1);
                        $resultInfoMatchEquipe2 = mysqli_query($con,$reqInfoMatchEquipe2);


                        $resultClub1 = mysqli_query($con,$reqClub1);
                        $resultClub2 = mysqli_query($con,$reqClub2);

                        while($rowClub1 = mysqli_fetch_array($resultClub1)) {
                        while($rowClub2 = mysqli_fetch_array($resultClub2)) {
                            while($rowInfoMatchEquipe1 = mysqli_fetch_array($resultInfoMatchEquipe1)) {
                                while($rowInfoMatchEquipe2 = mysqli_fetch_array($resultInfoMatchEquipe2)) {
                                    $equipe1 = $rowClub1[0];
                                    $equipe2 = $rowClub2[0];
                                    $scoreEquipe1 = $rowInfoMatchEquipe1['Club_MatchScore'];
                                    $scoreEquipe2 = $rowInfoMatchEquipe2['Club_MatchScore'];
                                    ?>
                                    <div class="row">
                                        <div class="col">
                                            <div id="InfoMatch">
                                                <div class="row">
                                                    <h1>Informations du match</h1>
                                                </div>
                                                <a href="javascript:window.print()"><button class="btn btn-info">Imprimer</button></a>

                                                <div class="inputSelection">
                                                    <table class="table">
                                                        <tr><td>Confrontation</td><td><?php echo $equipe1 ?> - <?php echo $equipe2 ?></td></tr>
                                                        <tr><td>Score du match</td><td><?php echo $scoreEquipe1." - ".$scoreEquipe2 ?></td></tr>
                                                        <tr><td id="lieuM">Lieu du match</td><td><?php echo $lieuMatch ?></td></tr>
                                                        <tr><td>Date du match</td><td><?php echo $dateMatch ?></td></tr>
                                                        <tr><td>Auteur</td><td><?php echo $auteurMatch ?></td></tr>
                                                        <tr><td>Condition du match</td><td><?php echo $conditionMatch ?></td></tr>
                                                        <tr><td>Commentaire du match</td><td><?php echo $commentaireMatch ?></td></tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <h1>Commentaire du match</h1>
                                    </div>
                                    <div class="row">

                                            <?php
                                            $reqPlayerMatch = "SELECT * FROM players_matchs WHERE MatchID=".$id;
                                            $resultPlayerMatch = mysqli_query($con,$reqPlayerMatch);
                                            while($rowPlayerMatch = mysqli_fetch_array($resultPlayerMatch)) {
                                                ?>
                                        <div class="col">
                                                <div class="inputSelection">
                                                    <?php
                                                    $reqEquipe1Player = "SELECT * FROM players WHERE PlayerID=".$rowPlayerMatch['PlayerID'];
                                                    $resultPlayerEquipe1 = mysqli_query($con,$reqEquipe1Player);
                                                    while($test = mysqli_fetch_array($resultPlayerEquipe1)) {
                                                        ?>Numéro: <?php echo $test[0]."<br> ".$test[1]." ".$test[2]  ?> <br>
                                                        Commentaire: <?php echo $rowPlayerMatch['Player_MatchComment']  ?> <br>
                                                        Nombres de buts: <?php echo $rowPlayerMatch['Player_MatchGoals']  ?> <br>
                                                        Nombre de passe décisives: <?php echo $rowPlayerMatch['Player_MatchDecisive']  ?> <br>
                                                        Temps de jeu: <?php echo $rowPlayerMatch['Player_MatchTimeGame']  ?> Minutes <br>
                                                        <?php
                                                    }
                                                    ?>
                                                </div>
                                        </div>
                                            <?php }
                                            ?>

                                    </div>
                            <?php }
                        }}}}
                    ?>
            </div>
        </div>
    </div>
    </body>
</html>
