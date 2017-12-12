<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>Feuille de match</title>
        <link href="../css/bootstrap.min.css" type="text/css" rel="stylesheet" />
        <link href="../css/feuilleDeMatch.css" type="text/css" rel="stylesheet" />
    </head>

    <body>

        <div class="navigation col-sm-3">
            <?php include 'navigation.html' ?>
        </div>

        <div class="feuilleDeMatch col-sm-9">

            <div class="barreTitre">
                <h1>Feuille de match</h1>
            </div>

            <div class="starter-template">

                <div class="row">

                    <div class="colone col-sm-5">

                        <div class="liste1">

                            <h3>Nations</h3>

                            <?php include '../bd_connect.php';
                               // $bd = bd_connection();
                            $bd = new PDO('mysql:host=localhost;dbname=baselucas;charset=utf8', 'root', '');
                                $rep = $bd->query('SELECT NationName FROM nations');
                                while ($donnee = $rep->fetch()){
                                    echo $donnee['NationName'] . '<br>';
                                }
                                //$req = "SELECT NationName FROM nations";
                               // $R = mysqli_query($bd,$req);
                               // while($data = $R -> fetch()){
                                //    echo $data['NationName'];
                                //}
                            ?>
                            <option value='<?php echo $R[0];?>'><?php echo $R[0];?></option>\n";

                            </select>

                            </form>


                        </div>

                        <div class="effectif">

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
                        <h2>Feuille de match</h2>
                    </div>

                </div>

            </div>

        </div>

    </body>

</html>