
<?php
$info = '';

if (isset ($_POST['validerChampionnat']))
{
    $champ = $_POST['championnat'];
    $nation = $_POST['idnation'];
    if (empty ($champ))
        $info = 'Veuillez renseigner ce champ';
    else
    {
        // Connexion à la bdd
        $db = mysqli_connect("localhost", "root","") or die("Echec de connexion au serveur.");;
        mysqli_select_db($db,"fcsochaux") or die("Echec de sélection de la base.");;

        // Insertion dans la bdd
        $query = "insert into championships (ChampionshipID,ChampionshipName,NationID) values(NULL,'".$champ."',".$nation.")";

        if (mysqli_query($db,$query))
            $info = 'Le championnat a été créé avec succès';
        else
            $info = 'Erreur lors de la création du championnat';


    }
}


if (isset ($_POST['validerNation']))
{
    $nat = $_POST['nation'];

    if (empty ($nat))
        $info = 'Veuillez renseigner ce champ';
    else
    {
        // Connexion à la bdd
        $db = mysqli_connect("localhost", "root","") or die("Echec de connexion au serveur.");;
        mysqli_select_db($db,"fcsochaux") or die("Echec de sélection de la base.");;

        // Insertion dans la bdd
        $query = "insert into nations (NationID,NationName) values(NULL,'".$nat."')";
        $query2 = "select NationID from nations where NatioName == '".$nat."')";

        if (mysqli_query($db,$query))
            $info = 'La nation a été créé avec succès';
        else
            $info = 'Erreur lors de la création de la nation';

        //mysqli_close();
    }
}


if (isset ($_POST['validerClub']))
{
    $club = $_POST['club'];
    $champ = $_POST['idchamp'];
    if (empty ($club))
        $info = 'Veuillez renseigner ce champ';
    else
    {
        // Connexion à la bdd
        $db = mysqli_connect("localhost", "root","") or die("Echec de connexion au serveur.");;
        mysqli_select_db($db,"fcsochaux") or die("Echec de sélection de la base.");;

        // Insertion dans la bdd
        $query = "insert into clubs (ClubID,ClubName,ChampionshipID) values (NULL,'".$club."',".$champ.")";

        if (mysqli_query($db,$query))
            $info = 'Le championnat a été créé avec succès';
        else
            $info = 'Erreur lors de la création du championnat';
    }
}
echo $info;
header('Location: ../pages/feuilleDeMatch.php');
?>