<?php
/**
 * Created by PhpStorm.
 * User: sylva
 * Date: 06/02/2018
 * Time: 09:34
 */

$con = mysqli_connect('localhost','root','','fcsochaux');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"fcsochaux");
$sql="INSERT INTO tournaments (TournamentID, TournamentName) VALUES (null, '".$_GET['value']."')";
if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

mysqli_close($con);
?>