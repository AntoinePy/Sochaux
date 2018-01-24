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
        </div>
        <?php
            $joueursInterressants = array();
            $posts = $_POST;
            /*foreach($posts as $key => $value) {
                if ($value == 'on') {
                    $joueursInterressants[] = $value;
                }
            }
            var_dump($joueursInterressants)*/
            $values = array_values($posts);
            foreach ($values as $key => $value) {
                if ($value == 'on') {
                    $joueursInterressants[] = $values[$key-1];
                }
            }
            var_dump($joueursInterressants)
        ?>


    </div>
    <input type="button" value="Retour" class="homebutton" id="btnCommentaire" onclick="document.location.href='feuilleMatch.php'"/>
</div>
<script type="text/javascript" src="js/listesDeroulantes.js"></script>
</body>
</html>
