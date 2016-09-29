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
$wearStatus=mysqli_real_escape_string($con, $_POST['wearStatus']);
$wearDate = date("Y-m-d H:i:s");   

$query = "UPDATE clothing SET wearsCount=$updatedWears WHERE id=$id";

//Insert query
if(!mysqli_query($con, $query)) {
echo("Error description: " . mysqli_error($con));
} else {

	$wearsQuery = "INSERT INTO clothing_wears(clothing_id,wear_date,wear_status,wear_count) VALUES ('$id', '$wearDate','$wearStatus', '$updatedWears')";

	if(!mysqli_query($con, $wearsQuery)) {
				echo("Error description: " . mysqli_error($con));
			} else {
				echo $id;
			}
}	
		

mysqli_close($con); // Connection Closed
?>