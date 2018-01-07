<?php
echo $_GET['q'];
$con = mysqli_connect('localhost','root','','fcsochaux');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"fcsochaux");
$sql="INSERT INTO championships (ChampionshipID, ChampionshipName, NationID) VALUES (null, '".$_GET['q']."',".$_GET['n'].")";
if (mysqli_query($con, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($con);
?>