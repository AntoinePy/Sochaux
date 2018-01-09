<?php
/**
 * Created by PhpStorm.
 * User: sylva
 * Date: 09/01/2018
 * Time: 23:45
 */

include_once "connection.php";

$idClub = $_GET['idClub'];

$sql = "SELECT ClubName FROM clubs WHERE ClubID =" .$idClub;

$club = $bd->query($sql);
$club->setFetchMode(PDO::FETCH_ASSOC);
while ($nomClub = $club->fetch()) {
    echo $nomClub['ClubName'];
}
