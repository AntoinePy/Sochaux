<?php
/**
 * Created by PhpStorm.
 * User: sylva
 * Date: 06/02/2018
 * Time: 09:40
 */

$con = mysqli_connect('localhost','root','','fcsochaux');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"fcsochaux");
$sql="SELECT TournamentID, TournamentName FROM tournaments";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
    echo "<option value=".$row[1]." data-value=".$row[0]." ></option>";
}
mysqli_close($con);
?>