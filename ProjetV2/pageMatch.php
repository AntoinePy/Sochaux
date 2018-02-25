<?php
include 'php/checkSession.php';
$con = mysqli_connect('localhost','root','','fcsochaux');

$id = $_GET['IDMatch'];

$reqMatch = "SELECT * FROM matchs WHERE MatchID=$id";

$resultMatch = mysqli_query($con,$reqMatch);

//                    $reqEquipe2Player = "SELECT PlayerFamilyName FROM players WHERE playerID=".$rowCompo1['PlayerID2'];

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
while($row = mysqli_fetch_array($resultMatch)) {
    $lieuMatch = $row['MatchPlace'];
    list($year, $month, $day) = explode('-', $row['MatchDate']);
    $dateMatch = $day."/".$month."/".$year;
    $auteurMatch = $row['MatchAuthor'];
    $conditionMatch = $row['MatchCondition'];
    $commentaireMatch = $row['MatchComment'];

    $reqClub1 = "SELECT ClubName FROM clubs WHERE ClubID=".$row['ClubID1'];
    $reqClub2 = "SELECT ClubName FROM clubs WHERE ClubID=".$row['ClubID2'];
    $reqScore = "SELECT * FROM clubs_matchs WHERE MatchID=".$row['MatchID']." AND ClubID=".$row['ClubID1'];
    $resultClub1 = mysqli_query($con,$reqClub1);
    $resultClub2 = mysqli_query($con,$reqClub2);
    $resultScore = mysqli_query($con,$reqScore);

    while($rowClub1 = mysqli_fetch_array($resultClub1)) {
        while($rowClub2 = mysqli_fetch_array($resultClub2)) {
            $equipe1 = $rowClub1[0];
            $equipe2 = $rowClub2[0];
            $rowScore = mysqli_fetch_array($resultScore);
?>
            <div id="InfoMatch">
                <div class="row">
                    <h1>Informations du match</h1>
                </div>
                <div class="inputSelection">
                    <table class="table">
                        <tr><td>Confrontation</td><td><?php echo $equipe1 ?> - <?php echo $equipe2 ?></td></tr>
                        <tr><td>Score du match</td><td><?php echo " Score: ", $rowScore['Club_MatchScore'], " - ", $rowScore['Club_MatchHalfScore'] ; ?></td></tr>
                        <tr><td id="lieuM">Lieu du match</td><td><?php echo $lieuMatch ?></td></tr>
                        <tr><td>Date du match</td><td><?php echo $dateMatch ?></td></tr>
                        <tr><td>Auteur</td><td><?php echo $auteurMatch ?></td></tr>
                        <tr><td>Condition du match</td><td><?php echo $conditionMatch ?></td></tr>
                        <tr><td>Commentaire du match</td><td><?php echo $commentaireMatch ?></td></tr>
                    </table>
                </div>
            </div>
            <div id="CompositionMatch">
                <div class="col">
               <?php
                $reqCompo1 = "SELECT * FROM compositions WHERE CompositionID=".$row['CompositionID1'];
                $reqCompo2 = "SELECT * FROM compositions WHERE CompositionID=".$row['CompositionID2'];

                $resultCompo1 = mysqli_query($con,$reqCompo1);
                $resultCompo2 = mysqli_query($con,$reqCompo2);

                while($rowCompo1 = mysqli_fetch_array($resultCompo1)) {
                while($rowCompo2 = mysqli_fetch_array($resultCompo2)) {


                //                    $reqEquipe2Player = "SELECT PlayerFamilyName FROM players WHERE playerID=".$rowCompo1['PlayerID2'];
?>
                <div class="row">

                    <h1>Composition du match</h1>
                </div>
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
                <?php }}}}}
               ?>
            <a href="javascript:window.print()"><button class="btn btn-info">Imprimer</button></a>
        </div>
    </div>
</div>
</body>
</html>
