<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','fcsochaux');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"fcsochaux");
$sql="SELECT ClubID, ClubName FROM clubs WHERE ChampionshipID=".$q;
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
    echo "<option value='".$row[1]."' data-value=".$row[0]." ></option>";
}
mysqli_close($con);
?>