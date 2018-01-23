<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','fcsochaux');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"fcsochaux");
$sql="SELECT PlayerID, PlayerFirstName, PlayerFamilyName FROM players WHERE ClubID=".$q;
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
    echo "<option value='".$row[1]." ".$row[2]."' data-value=".$row[0]." ></option>";
}
mysqli_close($con);
?>