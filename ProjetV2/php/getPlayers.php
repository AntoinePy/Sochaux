<?php
$clubid = intval($_GET['clubid']);
$positionid = intval($_GET['positionid']);

$con = mysqli_connect('localhost','root','','fcsochaux');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"fcsochaux");
$sql="SELECT * FROM players WHERE ClubID=".$clubid."AND PositionID=".$positionid;
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
    echo "<option value=".$row[2]." data-value=".$row[0]." ></option>";
}
mysqli_close($con);
?>