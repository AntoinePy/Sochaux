<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','fcsochaux');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"fcsochaux");
$sql="SELECT * FROM formations WHERE FormationID=".$q;
$result = mysqli_query($con,$sql);
$tableau = array();
while($row = mysqli_fetch_array($result)) {
    for ($i=0; $i < 11; $i++) { 
    	$tableau[]=$row[$i+2];
    }
}
$sql="SELECT * FROM positions WHERE PositionID=".
	$tableau[0]." OR PositionID=".
	$tableau[1]." OR PositionID=".
	$tableau[2]." OR PositionID=".
	$tableau[3]." OR PositionID=".
	$tableau[4]." OR PositionID=".
	$tableau[5]." OR PositionID=".
	$tableau[6]." OR PositionID=".
	$tableau[7]." OR PositionID=".
	$tableau[8]." OR PositionID=".
	$tableau[9]." OR PositionID=".
	$tableau[10];
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)){
	echo utf8_encode("<div id='player".$row[0]."Club".$_GET['r']."'>".$row[1]."<input name='inputPlayer".$row[0]."Club".$_GET['r']."'type='text' class='positionClub positionClub".$_GET['r']."' id='inputPlayer".$row[0]."Club".$_GET['r']."' list='club".$_GET['r']."PlayersList' oninput='updatePlayers(this.id,".$_GET['r'].")' onfocus='updatePlayers(this.id,".$_GET['r'].")' onkeypress='return addPlayer(event, this.id,".$_GET['r'].")' disabled><input name='checkbox".$row[0]."Club".$_GET['r']."' id='checkbox".$row[0]."Club".$_GET['r']."'type='checkbox'/></div>");
}
mysqli_close($con);
?>