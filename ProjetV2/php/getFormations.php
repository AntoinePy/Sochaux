<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','fcsochaux');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"fcsochaux");
$sql="SELECT FormationID, FormationName FROM formations";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
    echo utf8_encode("<option value=".$row[0].">".$row[1]."</option>") ;
}
mysqli_close($con);
?>