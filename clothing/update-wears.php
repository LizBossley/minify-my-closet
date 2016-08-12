<?php
$con = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server..

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$db = mysqli_select_db($con, "minify_my_closet"); // Selecting Database
//Fetching Values from URL
$id=mysqli_real_escape_string($con, $_POST['id']);
$updatedWears=mysqli_real_escape_string($con, $_POST['updatedWears']);

$query = "UPDATE clothing SET wearsCount=$updatedWears WHERE id=$id";

//Insert query
if(!mysqli_query($con, $query)) {
echo("Error description: " . mysqli_error($con));
} else {
		echo $id;
}

mysqli_close($con); // Connection Closed
?>