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
$categoryArray = array("None", "Shirt", "Skirt", "Dress", "Sweater", "Pants", "Shorts", "Outerwear", "Other/Multi", "Accessories/Shoes");
$seasonArray = array("None", "Summer", "Spring", "Winter", "Fall", "Year-round");
$typeArray = array("None", "Casual", "Athletic", "Dressy");
$stateArray = array("None", "New", "Like New", "Broken in", "Loved", "Replace Soon");
$colorArray = array("None", "Red", "Blue", "Green", "Purple", "Yellow", "Orange", "Grey", "Black", "White", "Pink");

if (isset($_GET['id'])) {
	
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
	    'wearsCount' => $row['wearsCount'],
	    'state' => $row['state'],
	    );
	}

	$sql = "SELECT * FROM clothing_color WHERE clothing_id = '". $id ."'";
	$result = mysqli_query($con,$sql);
	if (!$result) {
		printf("Error: %s\n", mysqli_error($con));
		exit();
	}

	$colors = array();

	while($row = mysqli_fetch_array($result)) {
	array_push($colors, $row['color_id']);
	}

	mysqli_close($con);
} 
?>

<div class="container">
	<div class="row">
		<div class="col-sm-12">
		<?php if (isset($_GET['view']) && isset($_GET['id']) && $_GET['view'] == 1): ?> <!-- view begin -->
		<div class="row">
			<div class="col-sm-12">
				<div><h2><?php echo $clothing['name'] ?></h2></div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div>
					<h4>Category: </h4><?php echo $categoryArray[$clothing['category']]?>
				</div>
				<div>
					<h4>Season: </h4><?php echo $seasonArray[$clothing['season']] ?>
				</div>
				<div>
					<h4>Occasion: </h4><?php echo $typeArray[$clothing['type']] ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div>
					<h4>Store: </h4><span class='glyphicon glyphicon-tags' aria-hidden='true'></span>  
					<?php echo (!($clothing['store'] == "") ? $clothing['store'] : " --") ?>
				</div>
				<div>
					<h4>Price: </h4><span class='glyphicon glyphicon-usd' aria-hidden='true'></span> 
					<?php echo (($clothing['price'] == 0) ? " --"  : $clothing['price']) ?>
				</div>
				<div>
					<h4>Times worn: </h4>
					<?php echo (!($clothing['wearsCount'] == "") ?  $clothing['wearsCount'] : " --") ?>
				</div>
				<div>
					<h4>Average cost per wear:</h4> <span class='glyphicon glyphicon-usd' aria-hidden='true'></span>
						<?php  
							if($clothing['wearsCount'] != 0 && $clothing['price'] != 0) {
								$averageCost = round($clothing['price']/$clothing['wearsCount'], 2);
							} 
							else {
								$averageCost = (($clothing['price'] == 0) ? " --"  : $clothing['price']); 
							}

							echo $averageCost;
						?>
				
				</div>
				<div>
					<h4>Condition: </h4><i class="fa fa-heartbeat" aria-hidden="true"></i> <?php echo $stateArray[$clothing['state']]?>
				</div>
				<div>
					<h4>Color(s): </h4>
					<i class="fa fa-paint-brush" aria-hidden="true"></i>
						<?php 

						$arrlength = count($colors);

						if($arrlength == 0) {
							echo "None";
						}

						for($x = 0; $x < $arrlength; $x++) {
						    echo $colorArray[$colors[$x]];
						    echo "<br>";
						}

						?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">      
				<form id="wears-increase"  role="form"> 
					<input type="hidden" id="clothingId" value=<?php echo $id ?>>
					<input type="hidden" id="currentWears" value=<?php echo $clothing['wearsCount'] ?>>       
					<input class="btn btn-default" onclick="increaseWears()" type="button" id="submit-currentWears" value="I Wore This!" >
				</form>
			</div>
		</div>
		
		<?php endif; ?> <!-- view begin -->



<?php if (!isset($_GET['view']) || (isset($_GET['view']) && $_GET['view'] != 1)): ?> <!-- form begin -->
		
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
										<input class="form-control" id="name" name="name" type="text" 
										<?php if (isset($id)): ?>
											value=<?php echo $clothing['name'] ?>
										<?php endif ?>
										>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<label for="category">Category :</label>
											<select class="form-control" id="category" name="category">
												<option value="">Select a category:</option>
												<?php 
												for($i = 1; $i < count($categoryArray); $i++) {
													echo "<option value='" . $i . "'>" . $categoryArray[$i] . "</option>";
												}
												?>
											</select>
										</div>
										<div class="col-sm-4">
											<label for="season">Season :</label>
											<select class="form-control" id="season" name="season">
												<option value="">Select a season:</option>
												<?php 
												for($i = 1; $i < count($seasonArray); $i++) {
													echo "<option value='" . $i . "'>" . $seasonArray[$i] . "</option>";
												}
												?>
											</select>
										</div>
										<div class="col-sm-4">
											<label for="season">Condition :</label>
											<select class="form-control" id="state" name="state">
												<option value="">Select a condition:</option>
												<?php 
												for($i = 1; $i < count($stateArray); $i++) {
													echo "<option value='" . $i . "'>" . $stateArray[$i] . "</option>";
												}
												?>
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
												<?php 
												for($i = 1; $i < count($typeArray); $i++) {
													echo "<option value='" . $i . "'>" . $typeArray[$i] . "</option>";
												}
												?>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<label>Number of times worn :</label>
											<input class="form-control" id="wearsCount" type="text">
										</div>
									</div>
									<div class="row">
										<div class="cold-sm-10 col-sm-offset-1 color-select">
											<span>Color(s)</span>
											<br>
											<?php 

												for($i = 1; $i < count($colorArray); $i++) {
													echo "<input type='checkbox' name='color-select' id='color" . $i . "' value='" . $i . "'>";
													echo "<label class='checkbox-inline' for='color" . $i ."'>" . $colorArray[$i] . "</label>";
												}
											?>
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
		</div>
	</body>
</html>