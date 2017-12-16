
<?php
$info = '';

if (isset ($_POST['valider']))
{
    $champ = $_POST['championnat'];

    if (empty ($champ))
        $info = 'Veuillez renseigner ce champs';
    else
    {
        // Connexion à la bdd
        $db = mysqli_connect("localhost", "root","") or die("Echec de connexion au serveur.");;
        mysqli_select_db($db,"apy6") or die("Echec de sélection de la base.");;

        // Insertion dans la bdd
        $query = "insert into championships (ChampionshipID,ChampionshipName,NationID) values(NULL,'$champ',NULL)";

        if (mysqli_query($db,$query))
            $info = 'Le championnat a été créé avec succès';
        else
            $info = 'Erreur lors de la création du championnat';

        //mysqli_close();
    }
}
?>