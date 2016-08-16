<?php
$con = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server..

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } else {
  	$submittedId = mysqli_insert_id($con);
  }

$db = mysqli_select_db($con, "minify_my_closet"); // Selecting Database
//Fetching Values from URL
$name=mysqli_real_escape_string($con, $_POST['name']);
$category=mysqli_real_escape_string($con, $_POST['category']);
$season=mysqli_real_escape_string($con, $_POST['season']);

//Insert query
$query = mysqli_query($con, "INSERT INTO outfits(name, category, season) VALUES ('$name', '$category', '$season')");
echo "Form Submitted Succesfully";
mysqli_close($con); // Connection Closed
header("Location: edit.php?id=" . $submittedId . "&view=1");
exit;
?>