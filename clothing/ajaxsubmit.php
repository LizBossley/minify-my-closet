<?php
$con = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server..

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$db = mysqli_select_db($con, "minify_my_closet"); // Selecting Database
//Fetching Values from URL
$name=mysqli_real_escape_string($con, $_POST['name']);
$category=mysqli_real_escape_string($con, $_POST['category']);
$price=mysqli_real_escape_string($con, $_POST['price']);
$type=mysqli_real_escape_string($con, $_POST['type']);
$season=mysqli_real_escape_string($con, $_POST['season']);
$state=mysqli_real_escape_string($con, $_POST['state']);
$store=mysqli_real_escape_string($con, $_POST['store']);

$query = "INSERT INTO clothing(name, category, price, type, season, state, store) VALUES ('$name', '$category', '$price', '$type', '$season', '$state', '$store')";

//Insert query
if(!mysqli_query($con, $query)) {
echo("Error description: " . mysqli_error($con));
} else {
$submittedId = mysqli_insert_id($con);
}




mysqli_close($con); // Connection Closed
?>