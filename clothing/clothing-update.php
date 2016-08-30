<?php
/**
 * This file processes the clothing update form
 */

$id = ($_POST['id']);

if (isset($id)) {

$con = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server..

$id=mysqli_real_escape_string($con, $_POST['id']);

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

$query = "UPDATE clothing
					SET name = '$name',
							category = '$category',
							price = '$price',
							type = '$type',
							season ='$season',
							state = '$state',
							store = '$store',
							wearsCount = '$wearsCount' 
					WHERE id=$id";

//Insert query
if(!mysqli_query($con, $query)) {
echo("Error description: " . mysqli_error($con));
} 

$colorDeleteQuery =  "DELETE FROM clothing_color WHERE clothing_id=$id";

if(!mysqli_query($con, $colorDeleteQuery)){
	echo("Error description: " . mysqli_error($con));
} else {
		//process colors array and insert		
	if(isset($id)) {
		if (!empty($colors) && count($colors) > 1 ) {
			$colorQuery = "INSERT INTO clothing_color(clothing_id,color_id) VALUES ";
			for($i = 0; $i < count($colors); $i++) {
				$colorQuery .= "('$id', '" . $colors[$i] . "'),";
			}
			$colorQuery = substr($colorQuery,0,-1);
			$colorQuery .= ";";
			if(!mysqli_query($con, $colorQuery)) {
				echo("Error description: " . mysqli_error($con));
			} 
		} elseif (count($colors) == 1) {
			$colorQuery = "INSERT INTO clothing_color(clothing_id,color_id) VALUES ('$id', '$colors[0]')";
			if(!mysqli_query($con, $colorQuery)) {
				echo("Error description: " . mysqli_error($con));
			}
		}
	}
}



mysqli_close($con); // Connection Closed
header("Location: edit.php?id=" . $id . "&view=1");
exit;
}
?>