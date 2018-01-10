<?php
/**
 * Created by PhpStorm.
 * User: sylva
 * Date: 09/01/2018
 * Time: 23:32
 */

    include_once "connection.php";

    $idClub = $_GET['idClub'];

    $sql = "SELECT * FROM players WHERE ClubID =" .$idClub. " ORDER BY PlayerFirstName, PlayerFamilyName";

    $players = $bd->query($sql);
    $players->setFetchMode(PDO::FETCH_ASSOC);
    ?> <option> Choisir un joueur </option> <?php
    while ($player = $players->fetch()) { ?>
        <OPTION value= <?php echo $player['PlayerID']; ?> > <?php echo $player['PlayerFirstName']." ".$player['PlayerFamilyName']; ?> </OPTION>
    <?php }