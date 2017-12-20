<?php
/**
 * Created by PhpStorm.
 * User: sylva
 * Date: 17/12/2017
 * Time: 20:01
 */

    include_once "connection.php";

    $idChampionnat = $_GET['idChampionnat'];

    $sql = "SELECT * FROM clubs WHERE ChampionshipID =" .$idChampionnat. " ORDER BY ClubName";

    $clubs = $bd->query($sql);
    $clubs->setFetchMode(PDO::FETCH_ASSOC);

    while ($club = $clubs->fetch()) { ?>
        <OPTION value= <?php echo $club['ClubID']; ?> > <?php echo $club['ClubName']; ?></OPTION>;
    <?php }