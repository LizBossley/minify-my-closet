<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <title>Clothing Edit</title>
		<?php include '../resources/imports/resources.php'; ?>
		<script src="submit.js"></script>
		<script src="../resources/js/jquery.validate.min.js"></script>
	</head>
	<body>
		<?php include '../resources/imports/header.php'; ?>

<?php 
$categoryArray = array("None", "Shirt", "Skirt", "Dress", "Sweater", "Pants", "Shorts", "Outerwear", "Other/Multi");
$seasonArray = array("None", "Summer", "Spring", "Winter", "Fall", "Year-round");
$typeArray = array("None", "Casual", "Athletic", "Dressy");

if (isset($_GET['id'])) {
	echo "The id is set!";
}
 {
	echo "The view is set!";

}
?> 
<?php if (isset($_GET['view']) && isset($_GET['id']) && $_GET['view'] == 1) {
	
	$con =  mysqli_connect("localhost", "root", "");
	if (!$con) {
	    die('Could not connect: ' . mysqli_error($con));
	}

	$id = mysqli_real_escape_string($con,($_GET['id']));

	$db = mysqli_select_db($con, "minify_my_closet"); // Selecting Database
	$sql="SELECT * FROM clothing WHERE ID = '". $id ."'";

	$result = mysqli_query($con,$sql);
	if (!$result) {
		printf("Error: %s\n", mysqli_error($con));
		exit();
	}


	while($row = mysqli_fetch_array($result)) {
	$clothing = array(
	    'name' => $row['name'],
	    'category' => $row['category'],
	    'season' => $row['season'],
	    'store' => $row['store'],
	    'price' => $row['price'],
	    'type' => $row['type'],
	    'id' => $row['id'],
	    );
	}
	mysqli_close($con);
} ?>



<div class="container">
	<div class="row">
		<?php if (isset($_GET['view']) && isset($_GET['id']) && $_GET['view'] == 1): ?> <!-- view begin -->
		<div class="row">
			<div><h2><?php echo $clothing['name'] ?></h2></div>
		</div>
		<div class="row">
			<div><?php echo $categoryArray[$clothing['category']]?></div>
			<div><?php echo $seasonArray[$clothing['season']] ?></div>
			<div><?php echo $typeArray[$clothing['type']] ?></div>
		</div>
		<div class="row">
			<div><span class='glyphicon glyphicon-tags' aria-hidden='true'></span> <?php echo $clothing['store'] ?></div>
			<div><span class='glyphicon glyphicon-usd' aria-hidden='true'></span> <?php echo $clothing['price'] ?></div>
		</div>
		
		<?php endif; ?> <!-- view begin -->



<?php if (!isset($_GET['view']) || (isset($_GET['view']) && $_GET['view'] != 1)): ?> <!-- form begin -->
		
			
				<p> Welcome to this clothing-edit page </p>
				<form id="clothing-edit" onsubmit="validateForm()" role="form">
					<div class="panel-group">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h4 class="panel-title">
									Clothing Information
								</h4>
							</div>
								<div class="panel-body">
									<div class="form-group">
										<label for="name">Name :</label>
										<input class="form-control" id="name" name="name" type="text">
									</div>
									<div class="row">
										<div class="col-sm-4">
											<label for="category">Category :</label>
											<select class="form-control" id="category" name="category">
												<option value="">Select a category:</option>
												<option value="1">Shirt</option>
												<option value="2">Skirt</option>
												<option value="3">Dress</option>
												<option value="4">Sweater</option>
												<option value="5">Pants</option>
												<option value="6">Shorts</option>
												<option value="7">Outerwear</option>
												<option value="8">Other/Multi</option>
											</select>
										</div>
										<div class="col-sm-4">
											<label for="season">Season :</label>
											<select class="form-control" id="season" name="season">
												<option value="">Select a season:</option>
												<option value="1">Summer</option>
												<option value="2">Spring</option>
												<option value="3">Winter</option>
												<option value="4">Fall</option>
												<option value="5">Year-round</option>
											</select>
										</div>
										<div class="col-sm-4">
											<label for="season">Condition :</label>
											<select class="form-control" id="state" name="state">
												<option value="">Select a condition:</option>
												<option value="1">New</option>
												<option value="2">Like New</option>
												<option value="3">Broken in</option>
												<option value="4">Loved</option>
												<option value="5">Replace Soon</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<label>Price (rounded) :</label>
											<input class="form-control" id="price" name="price" type="text">
										</div>
										<div class="col-sm-4">
											<label for="name">Purchased from :</label>
											<input class="form-control" id="store" name="store" type="text">
										</div>
										<div class="col-sm-4">
											<label for="type">Use :</label>
											<select class="form-control" id="type" name="type">
												<option value="">Select a category:</option>
												<option value="1">Casual</option>
												<option value="2">Athletic</option>
												<option value="3">Dressy</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="color-select">
										  <input type="checkbox" name="color-select" id="color1" value="1">
										  <label class="checkbox-inline" for="color1">Red</label>
										
										
										  <input type="checkbox" name="color-select" id="color2" value="2">
										  <label class="checkbox-inline" for="color1">Blue</label>
										
										  <input type="checkbox" name="color-select" id="color3" value="3">
										  <label class="checkbox-inline" for="color1">Green</label>
										</div>
									</div>
								</div>
							</div>
						</div>
					<input class="btn btn-primary" id="submit" type="submit">
				</form>
			
	<?php endif; ?> <!-- form end-->

			</div>
		</div>
	</body>
</html>