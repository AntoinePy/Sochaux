<?php
include 'php/checkSession.php';
?>
<!DOCTYPE html>
<meta charset="utf-8">
<html>
<head>
    <title>Commentaires joueurs</title>
    <link rel="icon" type="image/png" href="assets/images/fcsm.png" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/feuillematchstyle.css">
    <link rel="stylesheet" type="text/css" href="css/navbarstyle.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <?php include 'navbar.php'; ?>
        <div class="col-sm-8">
            <div class="row">
                <h1>
                    Commentaires joueurs
                </h1>
            </div>
            <div id="playersClub1"></div>
            <div id="playersClub2"></div>

            <datalist id="club1PlayersList"></datalist>
            <datalist id="club2PlayersList"></datalist>

        </div>


    </div>
    <input type="button" value="Retour" class="homebutton" id="btnCommentaire" onclick="document.location.href='feuilleMatch.php'"/>
</div>
<script type="text/javascript" src="js/listesDeroulantes.js"></script>
</body>
</html>
