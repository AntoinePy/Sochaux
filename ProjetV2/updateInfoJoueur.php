<?php
/**
 * Created by PhpStorm.
 * User: Bastien
 * Date: 06/01/2018
 * Time: 03:21
 */

include_once('php/connectionJoueurs.php'); // connection base de données
$con = mysqli_connect('localhost','root','','fcsochaux');
$id = $_POST['playerID'];
$req = "UPDATE players
        SET ";

if (isset ($_POST['Poste'])&& $_POST['Poste'] != "") {
    $poste = $_POST['Poste'];
    $req .= " PositionID1='".$poste."',";
}

if (isset ($_POST['Pays']) && $_POST['Pays'] != ""){
    $pays = $_POST['Pays'];
    $req .= " NationID='".$pays."',";
}

if (isset ($_POST['Club']) && $_POST['Club'] != ""){
    $club = $_POST['Club'];
    $req .= " ClubID='".$club."',";
}

if (isset ($_POST['Note']) && $_POST['Note'] != ""){
    $note = $_POST['Note'];
    $req .= " PlayerNoteID='".$note."',";
}

if (isset ($_POST['Pied']) && $_POST['Pied'] != ""){
    $pied = $_POST['Pied'];
    $req .= " PlayerFoot='".$pied."',";
}
if (isset ($_POST['PoidJoueur']) && $_POST['PoidJoueur'] != ""){
    $poidJoueur = $_POST['PoidJoueur'];
    $req .= " PlayerWeight='".$poidJoueur."',";
}

if (isset ($_POST['TailleJoueur']) && $_POST['TailleJoueur'] != ""){
    $tailleJoueur = $_POST['TailleJoueur'];
    $req .= " PlayerHeight='".$tailleJoueur."',";
}
if (isset ($_POST['NumberJoueur']) && $_POST['NumberJoueur'] != ""){
    $numeroJoueur = $_POST['NumberJoueur'];
    $req .= " PlayerNumber='".$numeroJoueur."',";
}
if (isset ($_POST['CommentaireJoueur']) && $_POST['CommentaireJoueur'] != ""){
    $commentaireJoueur = $_POST['CommentaireJoueur'];
    $req .= " PlayerComment='".$commentaireJoueur."'";
}else{
    $commentaireJoueur = "";
    $req .= " PlayerComment='".$commentaireJoueur."'";
}
$req .="WHERE PlayerID=".$id;
$result = mysqli_query($con,$req);

if ($result){
    header('Location:pageJoueur.php?IDJoueur=' . $id. '');
}else{
    echo "bad";
}
?>


