<?php
/**
 * Created by PhpStorm.
 * User: ANTOINE
 * Date: 16/12/2017
 * Time: 14:12
 */
$bds = new PDO('mysql:host=localhost;dbname=apy6;charset=utf8', 'root', '');
$retour = "";
$pays = $_POST['pays'];
$donneesValides = true;
if ('' == $pays) {
    $donneesValides = false;
}else {

    $requete = "SELECT NationName FROM nations WHERE NationID = ?";
    $stmt = $mysqli->prepare($requete);
    if ($stmt) {
        $stmt->bind_param("i", $pays);
        $stmt->execute();
        // Sans cette ligne, il ne sera pas possible de connaître le nombre de lignes retournées par un SELECT.

        $stmt->store_result();
        if ($stmt->num_rows == 0) {
            $donneesValides = false;
        }
        $stmt->close();
    }else {

        $retour = "REQUETE";
    }
}

if ($donneesValides && '' == $retour) {

    $requete = "SELECT ChampionshipID,ChampionshipName FROM championships WHERE NationID = ? ORDER BY ChampionshipName";

    $stmt = $mysqli->prepare($requete);


    if ($stmt) {
        $stmt->bind_param("i", $pays);
        $stmt->execute();

        // Sans cette ligne, il ne sera pas possible de connaître le nombre de lignes retournées par un SELECT.

        $stmt->store_result();

        if ($stmt->num_rows > 0) {

            $stmt->bind_result($championnat_id, $championnat_nom);

            while ($stmt->fetch()) {

                $retour .= "<option value='$championnat_id'>$championnat_nom</option>";
            }
        }
        else {
            $retour = "AUCUNEDONNEE";
        }
    }
    else {
        $retour = "REQUETE";
    }
    // ne devrait jamais renter ici mais on la laisse là au cas où

    if ("" == $retour) {
        $retour = "NONDETERMINE";
    }
}
else {
    $retour = "PARAMETRE";
}
echo $retour;