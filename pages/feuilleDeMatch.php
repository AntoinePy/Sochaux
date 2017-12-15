<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Feuille de match</title>
    <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="../css/feuilleDeMatch.css" type="text/css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="../js/listeDeroulante.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>

<?php
//$bd = new PDO('mysql:host=localhost;dbname=fcsochaux;charset=utf8', 'root', 'dgfn85**');
//$bd = new PDO('mysql:host=localhost;dbname=apy6;charset=utf8', 'root', '');
$bd = new PDO('mysql:host=localhost;dbname=tpsochaux;charset=utf8', 'root', '');
?>

<div class="navigation col-lg-3">
    <?php include 'navigation.html' ?>
</div>

<div class="feuilleDeMatch col-lg-9">

    <div class="barreTitre">
        <h1>Feuille de match</h1>
    </div>

    <div class="starter-template">

        <div class="row">

            <div class="colone col-sm-6">

                <div class="liste1" style="margin-bottom: 100px">

                    <div class="col-sm-4">

                        <h4>Nations</h4>
                        <?php
                        $nations = $bd->query('SELECT NationName FROM nations');

                        echo "<SELECT id =\"nation1\" Name=\"Nation1\" class=\"form-control\">";
                        while ($nation = $nations->fetch()){
                            echo "<OPTION Value=\"".$nation['NationName']."\">".$nation['NationName']."</OPTION>";
                        }
                        echo "</SELECT>";
                        ?>
                        </br>
                        </br>

                        <?php
                        $nations2 = $bd->query('SELECT NationName FROM nations');

                        echo "<SELECT id =\"nation2\" Name=\"Nation2\" class=\"form-control\">";
                        while ($nation = $nations2->fetch()){
                            echo "<OPTION Value=\"".$nation['NationName']."\">".$nation['NationName']."</OPTION>";
                        }
                        echo "</SELECT>";
                        ?>

                    </div>

                    <div class="col-sm-4">

                        <h4>Championnats</h4>
                        <?php
                        $championschips = $bd->query('SELECT ChampionshipName FROM championships');

                        echo "<SELECT id =\"championnat1\" Name=\"Championship1\"  class=\"form-control\" onchange='activListChampionnat()'>";
                        while ($championschip = $championschips->fetch()){
                            echo "<OPTION Value=\"".$championschip['ChampionshipName']."\">".$championschip['ChampionshipName']."</OPTION>";
                        }
                        echo "</SELECT>";
                        ?>
                        </br>
                        <div class="addChamp">
                            <form action="../traitementPHP/ajout_fdm.php" method="post">
                                <label>Add champ</label> : <input type="text" name="championnat" />
                                <input name="valider" type="submit" value="Ajouter" />
                            </form>

                        </div>


                        <?php
                       /* $championschips2 = $bd->query('SELECT ChampionshipName FROM championships');

                        echo "<SELECT id =\"championnat2\" Name=\"Championship2\"  class=\"form-control\" onchange='activListChampionnat()'>";
                        while ($championschip = $championschips2->fetch()){
                            echo "<OPTION Value=\"".$championschip['ChampionshipName']."\">".$championschip['ChampionshipName']."</OPTION>";
                        }
                        echo "</SELECT>";*/
                        ?>

                    </div>

                    <div class="col-sm-4">

                        <h4>Clubs</h4>
                        <?php
                        $clubs = $bd->query('SELECT ClubName FROM clubs');

                        echo "<SELECT id =\"club1\" Name=\"Club1\"  class=\"form-control\" onchange='activListClub()'>";
                        while ($club = $clubs->fetch()){
                            echo "<OPTION Value=\"".$club['ClubName']."\">".$club['ClubName']."</OPTION>";
                        }
                        echo "</SELECT>";
                        ?>
                        </br>
                        </br>
                        <?php
                        $clubs2 = $bd->query('SELECT ClubName FROM clubs');

                        echo "<SELECT id =\"club2\" Name=\"Club2\"  class=\"form-control\" onchange='activListClub()'>";
                        while ($club = $clubs2->fetch()){
                            echo "<OPTION Value=\"".$club['ClubName']."\">".$club['ClubName']."</OPTION>";
                        }
                        echo "</SELECT>";
                        ?>

                    </div>

                </div>

                </br>

                <div class="effectif">
                    </br>
                    </br>
                    </br>
                    <h2>Effectifs</h2>


                    <div class="equipe1 col-sm-6">

                        <h3>Equipe 1</h3>

                        <div class="entraineur">
                            <p> entraineur 1 </p>
                        </div>

                        <div class="equipe">
                            <p>
                                n - joueur <br/>
                                n - joueur <br/>
                                n - joueur <br/>
                                n - joueur <br/>
                                n - joueur <br/>
                                n - joueur <br/>
                                n - joueur <br/>
                                n - joueur <br/>
                                n - joueur <br/>
                                n - joueur <br/>
                                n - joueur
                            </p>
                        </div>

                    </div>

                    <div class="equipe2 col-sm-6">

                        <h3>Equipe 2</h3>

                        <div class="entraineur">
                            <p> entraineur 2 </p>
                        </div>

                        <div class="equipe">
                            <p>
                                n - joueur <br/>
                                n - joueur <br/>
                                n - joueur <br/>
                                n - joueur <br/>
                                n - joueur <br/>
                                n - joueur <br/>
                                n - joueur <br/>
                                n - joueur <br/>
                                n - joueur <br/>
                                n - joueur <br/>
                                n - joueur
                            </p>
                        </div>

                    </div>

                </div>

                <div class="commentaire">
                    <h2>Commentaires</h2>
                    <p>
                        Ruiz : bonne vision de jeu <br/>
                        Meite : bon déplacement <br/>
                        Tardieu : bon pressing <br/>
                        Prevot : faible en attaque, bon en defense <br/>
                        Ronaldo : homme du match
                    </p>
                </div>

            </div>

            <div class="colone col-sm-5">

                <div class="feuilleDeMatch">

                    <h2>Feuille de match</h2>

                    <div class="listeFormation">

                        <div class="col-sm-6">
                            <h4>Domicile</h4>
                            <?php
                            $rep = $bd->query('SELECT FormationName FROM formations');
                            echo "<SELECT id =\"formation\" Name=\"Formation\"  class=\"form-control\">";
                            while ($donnees = $rep->fetch()){
                                echo "<OPTION Value=\"".$donnees['FormationName']."\">".$donnees['FormationName']."</OPTION>";
                            }
                            echo "</SELECT>";
                            ?>
                        </div>

                        <div class="col-sm-6">
                            <h4>Extérieur</h4>
                            <?php
                            $rep = $bd->query('SELECT FormationName FROM formations');
                            echo "<SELECT id =\"formation\" Name=\"Formation\"  class=\"form-control\">";
                            while ($donnees = $rep->fetch()){
                                echo "<OPTION Value=\"".$donnees['FormationName']."\">".$donnees['FormationName']."</OPTION>";
                            }
                            echo "</SELECT>";
                            ?>
                        </div>

                    </div>

                    <div class="terrainDeFoot">
                        <img src="../images/terrain.jpg" style=" width: 80%; margin: 20px 10%;"/>
                    </div>

                </div>

                <div class="faitDeMatch">

                    <h2>Faits de match</h2>

                    <div class="col-sm-6 equipe1">

                        <div class="but">

                        </div>

                        <div class="carton">

                        </div>

                    </div>

                    <div class="col-sm-6 equipe2">

                        <div class="but">

                        </div>

                        <div class="carton">

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>