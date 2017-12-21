<?php
/**
 * Created by PhpStorm.
 * User: sylva
 * Date: 17/12/2017
 * Time: 18:24
 */

    include_once "connection.php";

    $idNation = $_GET['idNation'];

    $sql = "SELECT * FROM championships WHERE NationID =" .$idNation. " ORDER BY ChampionshipName";

    $championschips = $bd->query($sql);
    $championschips->setFetchMode(PDO::FETCH_ASSOC);
    ?> <option> </option> <?php
    while ($championschip = $championschips->fetch()) { ?>
        <OPTION value= <?php echo  $championschip['ChampionshipID']; ?> > <?php echo $championschip['ChampionshipName']; ?> </OPTION>
    <?php }