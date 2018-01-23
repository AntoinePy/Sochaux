<?php
$con = mysqli_connect('localhost','root','','fcsochaux');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"fcsochaux");
$sql="INSERT INTO players (PlayerID, PlayerFirstName, PlayerFamilyName, ClubID) VALUES (null, '".$_GET['prenom']."','".$_GET['famille']."',".$_GET["club"].")";
if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($con);
?>