<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Feuille de match</title>
    <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="../css/feuilleDeMatch.css" type="text/css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="../js/listeDeroulante.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/popup.js" type="text/javascript" charset="utf-8"></script>
</head>

<body>

<?php
    include_once('../traitementPHP/connection.php'); // connection base de données
?>

<div class="navigation col-lg-2">
    <?php include 'navigation.html' ?>
</div>

<div class="feuilleDeMatch col-lg-10">

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
                        $nations = $bd->query('SELECT * FROM nations'); ?>
                        <SELECT id ="nation1" Name="Nation1" class="form-control" onchange='activListChampionnat(1, this.value)'>
                            <option> </option>
                        <?php while ($nation = $nations->fetch()){ ?>
                            <OPTION value=<?php echo $nation['NationID']; ?> > <?php echo $nation['NationName']; ?> </OPTION>
                        <?php } ?>
                        </SELECT>

                        </br>

                        <?php
                        $nations2 = $bd->query('SELECT * FROM nations'); ?>
                        <SELECT id ="nation2" Name="Nation2" class="form-control" onchange='activListChampionnat(2, this.value)'>
                            <option> </option>
                            <?php while ($nation = $nations2->fetch()){ ?>
                                <OPTION value=<?php echo $nation['NationID']; ?> > <?php echo $nation['NationName']; ?> </OPTION>
                            <?php } ?>
                        </SELECT>
                        </br>
                        <div class="addChamp">
                            <form action="../traitementPHP/ajout_fdm.php" method="post">
                                <label>Ajout Nation</label> : <input type="text" name="nation" />
                                <input name="validerNation" type="submit" value="Ajouter" />
                            </form>
                        </div>

                    </div>

                    <div class="col-sm-4">

                        <h4>Championnats</h4>

                        <SELECT id ="championnat1" Name="Championship1"  class="form-control" onchange='activListClub(1, this.value)' disabled>"</SELECT>

                        </br>

                        <SELECT id ="championnat2" Name="Championship2"  class="form-control" onchange='activListClub(2, this.value)' disabled>"</SELECT>
                        </br>
                        <div class="addChamp">
                            <form action="../traitementPHP/ajout_fdm.php" method="post">
                                <label>Ajout Championnat</label> : <input type="text" name="championnat" />
                                <input type="hidden" name="idnation" value="" id="hiddennation">
                                <input name="validerChampionnat" type="submit" value="Ajouter" />
                            </form>
                        </div>

                    </div>

                    <div class="col-sm-4">

                        <h4>Clubs</h4>

                        <SELECT id ="club1" Name="Club1"  class="form-control"  disabled>"</SELECT>

                        </br>

                        <SELECT id ="club2" Name="Club2"  class="form-control"  disabled>"</SELECT>
                        </br>
                        <div class="addChamp">
                            <form action="../traitementPHP/ajout_fdm.php" method="post">
                                <label>Ajout Club</label> : <input type="text" name="club" />
                                <input type="hidden" name="idchamp" value="" id="hiddenchamp">
                                <input name="validerClub" type="submit" value="Ajouter" />
                            </form>
                        </div>

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

                <div class="col-sm-4">
                    <div class="addNation">
                        <form action="../traitementPHP/ajout_fdm.php" method="post">
                            <label>Ajout Nation</label> : <input size="14" type="text" name="nation" />
                            <input name="validerNation" type="submit" value="Ajouter" />
                        </form>
                    </div>
                </div>

                <div class="col-sm-4">
                    <label>Ajout championnat</label>
                    <form action="../traitementPHP/ajout_fdm.php" method="post">
                            <?php
                            $nations = $bd->query('SELECT * FROM nations'); ?>
                            <SELECT id ="nation1" Name="Nation" class="form-control">
                                <option> </option>
                                <?php while ($nation = $nations->fetch()){ ?>
                                    <OPTION value=<?php echo $nation['NationID']; ?> > <?php echo $nation['NationName']; ?> </OPTION>
                                <?php } ?>
                            </SELECT>
                            <div class="addChamp">
                                <input type="text" size="14" name="Championnat" />
                                <input name="validerChampionnat" type="submit" value="Ajouter" />
                            </div>
                    </form>
                </div>

                <div class="col-sm-4">
                    <label>Ajout club</label>
                    <form action="../traitementPHP/ajout_fdm.php" method="post">
                        <?php
                        $nations = $bd->query('SELECT * FROM nations'); ?>
                        <SELECT id ="nation3" Name="Nation" class="form-control" onchange='activListChampionnat(3, this.value)'>
                            <option> </option>
                            <?php while ($nation = $nations->fetch()){ ?>
                                <OPTION value=<?php echo $nation['NationID']; ?> > <?php echo $nation['NationName']; ?> </OPTION>
                            <?php } ?>
                        </SELECT>
                        <SELECT id ="championnat3" Name="Championship3"  class="form-control" disabled>"</SELECT>
                        <div class="addChamp">
                            <input type="text" size="14" name="Club" />
                            <input type="hidden" name="idnation" value="" id="hiddennation">
                            <input name="validerClub" type="submit" value="Ajouter" />
                        </div>
                    </form>
                </div>
            </div>

            <div class="colone col-sm-5">

                <div class="feuilleDeMatch">

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
                        <img src="../images/terrain-foot.png" style=" width: 80%; margin: 20px 10%;"/>
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