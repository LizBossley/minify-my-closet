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

//Insert query
$query = mysqli_query($con, "INSERT INTO clothing(name, category) VALUES ('$name', '$category')");
echo "Form Submitted Succesfully";
mysqli_close($con); // Connection Closed
?>