<?php
$mysqli = new mysqli("localhost","root","","apy6");
$result = $mysqli->query("SELECT * FROM nations");
$row=mysqli_fetch_array($result);
$numRows=mysqli_num_rows($result);


if(isset($_POST['nations']))
{
    $result2 = $mysqli->query("SELECT * FROM championships WHERE NationID=".$_POST['nations']." ORDER BY ChampionshipName");
    $rowsubchamp=mysqli_fetch_array($result2);
    $numRowssubchamp=mysqli_num_rows($result2);
}

?>
<h3 class="style1">Choix de la nation</h3>
<form method="post" id="nations">
    <select name="nations" >
        <?php for($i=0; $i < $numRows; $i++){ ?>
            <option value="<?php echo $row['NationID']; ?>"><?php echo $row['NationName']; ?></option>
            <?php $row=mysqli_fetch_array($result); ?>
        <?php } ?>
    </select>
    <input type="submit" value="OK"/>
</form>
<h3 class="style2"> Choix du championnat</h3>

<form method="post" id="championship" action="test2.php">
    <select name="championship">
        <?php for($j=0; $j < $numRowssubchamp; $j++){ ?>
            <option value="<?php echo $rowsubchamp['ChampionshipID']; ?>"><?php echo $rowsubchamp['ChampionshipName']; ?></option>
            <?php $rowsubchamp=mysqli_fetch_array($result2); ?>
        <?php } ?>
    </select>
    <input type="submit" value="OK"/>
