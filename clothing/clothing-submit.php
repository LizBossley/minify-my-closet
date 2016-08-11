<?php
/**
 * This file processes the clothing submit form
 */

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
$wearsCount=mysqli_real_escape_string($con, $_POST['wearsCount']);
$colors= $_POST['color-select'];

if(!empty($colors)) {
	for($i = 0; $i < count($colors); $i++) {
		$colors[$i] = mysqli_real_escape_string($con, $colors[$i]);
	}
}

$query = "INSERT INTO clothing(name, category, price, type, season, state, store, wearsCount) VALUES ('$name', '$category', '$price', '$type', '$season', '$state', '$store', '$wearsCount')";

//Insert query
if(!mysqli_query($con, $query)) {
echo("Error description: " . mysqli_error($con));
} else {
	//get last id, process colors array and insert
	$submittedId = mysqli_insert_id($con);
		
	if(isset($submittedId)) {
		if (!empty($colors) && count($colors) > 1 ) {
			$colorQuery = "INSERT INTO clothing_color(clothing_id,color_id) VALUES ";
			for($i = 0; $i < count($colors); $i++) {
				$colorQuery .= "('$submittedId', '" . $colors[$i] . "'),";
			}
			$colorQuery = substr($colorQuery,0,-1);
			$colorQuery .= ";";
			if(!mysqli_query($con, $colorQuery)) {
				echo("Error description: " . mysqli_error($con));
			} 
		} elseif (count($colors) == 1) {
			$colorQuery = "INSERT INTO clothing_color(clothing_id,color_id) VALUES ('$submittedId', '$colors[0]')";
			if(!mysqli_query($con, $colorQuery)) {
				echo("Error description: " . mysqli_error($con));
			}
		}
	}
}

mysqli_close($con); // Connection Closed
header("Location: edit.php?id=" . $submittedId . "&view=1");
exit;
?>