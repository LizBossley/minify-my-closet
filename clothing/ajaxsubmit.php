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
$colors=mysqli_real_escape_string($con, $_POST['colors']);

if (strlen($colors) > 1) {
	$colorsInsert = explode(",", $colors);
}

$query = "INSERT INTO clothing(name, category, price, type, season, state, store) VALUES ('$name', '$category', '$price', '$type', '$season', '$state', '$store')";

//Insert query
if(!mysqli_query($con, $query)) {
echo("Error description: " . mysqli_error($con));
} else {
	//get last id, process colors array and insert
	$submittedId = mysqli_insert_id($con);
		
	if(isset($submittedId)) {
		if (isset($colorsInsert) && count($colorsInsert) > 1 ) {
			$colorQuery = "INSERT INTO clothing_color(clothing_id,color_id) VALUES ";
			for($i = 0; $i < count($colorsInsert); $i++) {
				$colorQuery .= "('$submittedId', '" . $colorsInsert[$i] . "'),";
			}
			$colorQuery = substr($colorQuery,0,-1);
			$colorQuery .= ";";
			if(!mysqli_query($con, $colorQuery)) {
				echo("Error description: " . mysqli_error($con));
			} 
		} elseif (strlen($colors) == 1) {
			$colorQuery = "INSERT INTO clothing_color(clothing_id,color_id) VALUES ('$submittedId', '$colors')";
			if(!mysqli_query($con, $colorQuery)) {
				echo("Error description: " . mysqli_error($con));
			}
		}
	}

	echo $submittedId;
}

mysqli_close($con); // Connection Closed
?>