<?php
/**
 * Created by PhpStorm.
 * User: ANTOINE
 * Date: 16/12/2017
 * Time: 14:12
 */
$bd = new PDO('mysql:host=localhost;dbname=apy6;charset=utf8', 'root', '');
$retour = "";
$requete = "SELECT NationName FROM nations";
$resultat = $bd->query($requete);
if($resultat){
        while ($enreg = $resultat->fetch()) {
            $retour .= "<option value='$enreg[0]'>$enreg[1]</option>";
        }
}else{
    $retour = "REQUETE";
}
if ("" == $retour) {

    $retour = "NONDETERMINE";

}
echo $retour;
