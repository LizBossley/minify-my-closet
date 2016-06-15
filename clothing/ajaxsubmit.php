<?php
$con = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server..

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$db = mysqli_select_db($con, "damage_counter"); // Selecting Database
//Fetching Values from URL
$name=mysqli_real_escape_string($con, $_POST['name']);
$faction=mysqli_real_escape_string($con, $_POST['faction']);
$game=mysqli_real_escape_string($con, $_POST['game']);
$size=mysqli_real_escape_string($con, $_POST['size']);

//Insert query
$query = mysqli_query($con, "INSERT INTO card_list(name, faction, game, size) VALUES ('$name', '$faction', '$game', '$size')");
echo "Form Submitted Succesfully";
mysqli_close($con); // Connection Closed
?>