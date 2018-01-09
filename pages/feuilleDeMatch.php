<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Feuille de match</title>
    <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
    <link href="../css/feuilleDeMatch.css" type="text/css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="../js/listeDeroulante.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/equipe.js" type="text/javascript" charset="utf-8"></script>
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

                    <div class="col-sm-6">

                        <h4><center>DOMICILE</center></h4>
                        <?php
                        $nations = $bd->query('SELECT * FROM nations'); ?>
                        <SELECT id ="nation1" Name="Nation1" class="form-control" onchange='activListChampionnat(1, this.value)'>
                            <option> </option>
                            <?php while ($nation = $nations->fetch()){ ?>
                                <OPTION value=<?php echo $nation['NationID']; ?> > <?php echo $nation['NationName']; ?> </OPTION>
                            <?php } ?>
                        </SELECT>
                        </br>

                        <SELECT id ="championnat1" Name="Championship1"  class="form-control" onchange='activListClub(1, this.value)' disabled>"</SELECT>
                        </br>
                        <SELECT id ="club1" Name="Club1" class="form-control" onchange="choixClub(1, this.value)" disabled>"</SELECT>
                        </br>
                    </div>

                    <div class="col-sm-6">

                        <h4><center> EXTERIEUR</center></h4>
                        <?php
                        $nations2 = $bd->query('SELECT * FROM nations'); ?>
                        <SELECT id ="nation2" Name="Nation2" class="form-control" onchange='activListChampionnat(2, this.value)'>
                            <option> </option>
                            <?php while ($nation = $nations2->fetch()){ ?>
                                <OPTION value=<?php echo $nation['NationID']; ?> > <?php echo $nation['NationName']; ?> </OPTION>
                            <?php } ?>
                        </SELECT>
                        </br>

                        <SELECT id ="championnat2" Name="Championship2"  class="form-control" onchange='activListClub(2, this.value)' disabled>"</SELECT>
                        </br>
                        <SELECT id ="club2" Name="Club2"  class="form-control" onchange="choixClub(2, this.value)" disabled>"</SELECT>
                        </br>
                    </div>



                </div>


                <div class="effectif">
                    </br>
                    </br>
                    <h2>Effectifs</h2>


                    <div class="equipe1 col-sm-6">

                        <h3 id="nomEquipe1">Equipe 1</h3>

                        <div class="entraineur">
                            <p> entraineur 1 </p>
                        </div>

                        <div class="equipe">
                            <p>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="player1" Name="player1"  class="form-control"> <br/>
                                <option> </option>
                                <?php while ($player = $players->fetch()){ ?>
                                    <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="player2" Name="player2"  class="form-control"> <br/>
                                <option> </option>
                                <?php while ($player = $players->fetch()){ ?>
                                    <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="player3" Name="player3"  class="form-control"> <br/>
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="player4" Name="player4"  class="form-control"> <br/>
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="player5" Name="player5"  class="form-control"> <br/>
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="player6" Name="player6"  class="form-control"> <br/>
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="player7" Name="player7"  class="form-control"> <br/>
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="player8" Name="player8"  class="form-control"> <br/>
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="player9" Name="player9"  class="form-control"> <br/>
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="player10" Name="player10"  class="form-control"> <br/>
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="player11" Name="player11"  class="form-control">
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                            </p>
                        </div>

                    </div>

                    <div class="equipe2 col-sm-6">

                        <h3 id="nomEquipe2">Equipe 2</h3>

                        <div class="entraineur">
                            <p> entraineur 2 </p>
                        </div>

                        <div class="equipe">
                            <p>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="joueur1" Name="joueur1"  class="form-control"> <br/>
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="joueur2" Name="joueur2"  class="form-control"> <br/>
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="joueur3" Name="joueur3"  class="form-control"> <br/>
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="joueur4" Name="joueur4"  class="form-control"> <br/>
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="joueur5" Name="joueur5"  class="form-control"> <br/>
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="joueur6" Name="joueur6"  class="form-control"> <br/>
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="joueur7" Name="joueur7"  class="form-control"> <br/>
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="joueur8" Name="joueur8"  class="form-control"> <br/>
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="joueur9" Name="joueur9"  class="form-control"> <br/>
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="joueur10" Name="joueur10"  class="form-control"> <br/>
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
                                <?php
                                $players = $bd->query('SELECT * FROM players'); ?>
                                <SELECT id ="joueur11" Name="joueur11"  class="form-control">
                                    <option> </option>
                                    <?php while ($player = $players->fetch()){ ?>
                                        <OPTION value=<?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFamilyName']; ?> </OPTION>
                                    <?php } ?>
                                </SELECT>
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
                            <label>Ajout Nation</label> : <input size="14" type="text" name="Nation" />
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
                        <SELECT id ="championnat3" Name="Championnat"  class="form-control" disabled>"</SELECT>
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
                            <h4 id="domicile">Domicile</h4>
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
                            <h4 id="exterieur">Extérieur</h4>
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