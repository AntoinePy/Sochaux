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
                        $resultClub1 = mysqli_query($con,$reqClub1);
                        $resultClub2 = mysqli_query($con,$reqClub2);
                        while($rowClub1 = mysqli_fetch_array($resultClub1)) {
                        while($rowClub2 = mysqli_fetch_array($resultClub2)) {
                        $equipe1 = $rowClub1[0];
                        $equipe2 = $rowClub2[0];
                    ?>
                   <div class="row">
                       <div class="col">
                           <div id="InfoMatch">
                               <div class="row">
                                   <h1>Informations du match</h1>
                               </div>
                               <div class="inputSelection">
                                   <table class="table">
                                       <tr><td>Confrontation</td><td><?php echo $equipe1 ?> - <?php echo $equipe2 ?></td></tr>
                                       <tr><td>Score du match</td><td><?php echo $resultatMatch ?></td></tr>
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

                    <h1>Composition du match</h1>
                </div>
                <div class="row">
                    <div class="col">
                        <?php
                            $reqCompo1 = "SELECT * FROM compositions WHERE CompositionID=".$row['CompositionID1'];
                            $resultCompo1 = mysqli_query($con,$reqCompo1);
                            while($rowCompo1 = mysqli_fetch_array($resultCompo1)) {
                        ?>

                                <div class="inputSelection">
                                    <?php
                                    $reqEquipe1Player = "SELECT PlayerNumber,PlayerFirstName,PlayerFamilyName FROM players WHERE PlayerID=".$rowCompo1[3];
                                    for ($i = 4;$i <=16;$i++){
                                        $reqEquipe1Player .= " OR PlayerID=".$rowCompo1[$i];
                                    }
                                    $resultPlayerEquipe1 = mysqli_query($con,$reqEquipe1Player);
                                    while($test = mysqli_fetch_array($resultPlayerEquipe1)) {
                                        ?>
                                        <?php echo $test[0]." ".$test[1]." ".$test[2]  ?> <br>
                                        <?php
                                    }
                                    ?>
                                </div>
                            <?php }
                        ?>
                    </div>

                    <div class="col">
                        <div class="inputSelection">
                            <?php
                            $reqCompo2 = "SELECT * FROM compositions WHERE CompositionID=".$row['CompositionID2'];
                            $resultCompo2 = mysqli_query($con,$reqCompo2);
                            while($rowCompo2 = mysqli_fetch_array($resultCompo2)) {
                            ?>

                            <div class="inputSelection">
                                <?php
                                $reqEquipe2Player = "SELECT PlayerNumber,PlayerFirstName,PlayerFamilyName FROM players WHERE PlayerID=".$rowCompo2[3];
                                for ($i = 4;$i <=16;$i++){
                                    $reqEquipe2Player .= " OR PlayerID=".$rowCompo2[$i];
                                }
                                $resultPlayerEquipe2 = mysqli_query($con,$reqEquipe2Player);
                                while($test2 = mysqli_fetch_array($resultPlayerEquipe2)) {
                                    ?>
                                    <?php echo $test2[0]." ".$test2[1]." ".$test2[2]  ?> <br>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>
                <a href="javascript:window.print()"><button class="btn btn-info">Imprimer</button></a>
                        <?php }}}
                    ?>
            </div>
        </div>
    </div>
    </body>
</html>
