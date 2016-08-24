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
		<div class="small-12 columns">
		<?php if (isset($_GET['view']) && isset($_GET['id']) && $_GET['view'] == 1): ?> <!-- view begin -->
		<div class="row">
			<div class="small-12 columns">
				<div><h2><?php echo $clothing['name'] ?></h2></div>
				<a href="edit.php?id=<?php echo $id ?>" class="edit-button hollow button">Edit</a>
			</div>
		</div>
		<div class="row">
			<div class="small-6 medium-3 columns">
				<h4>Category: </h4><?php echo $categoryArray[$clothing['category']]?>
			</div>
			<div class="small-6 medium-3 columns">
				<h4>Season: </h4><?php echo $seasonArray[$clothing['season']] ?>
			</div>
			<div class="small-6 medium-3 columns">
				<h4>Occasion: </h4><?php echo $typeArray[$clothing['type']] ?>
			</div>
			<div class="small-6 medium-3 columns">
				<h4>Store: </h4><span class='glyphicon glyphicon-tags' aria-hidden='true'></span>  
				<?php echo (!($clothing['store'] == "") ? $clothing['store'] : " --") ?>
			</div>
		</div>
		<div class="row">
			<div class="small-6 medium-3 columns">
				<h4>Price: </h4><span class='glyphicon glyphicon-usd' aria-hidden='true'></span> 
				<?php echo (($clothing['price'] == 0) ? " --"  : $clothing['price']) ?>
			</div>
			<div class="small-6 medium-3 columns">
				<h4>Times worn: </h4>
				<?php echo (!($clothing['wearsCount'] == "") ?  $clothing['wearsCount'] : " --") ?>
			</div>
			<div class="small-6 medium-3 columns">
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
			<div class="small-6 medium-3 columns">
				<h4>Condition: </h4><i class="fa fa-heartbeat" aria-hidden="true"></i> <?php echo $stateArray[$clothing['state']]?>
			</div>
			<div class="small-12 columns">
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
		<div class="row">
			<div class="small-12 columns">      
				<form id="wears-increase"  role="form"> 
					<input type="hidden" id="clothingId" value="<?php echo $id ?>">
					<input type="hidden" id="currentWears" value="<?php echo $clothing['wearsCount'] ?>">       
					<input class="button" onclick="increaseWears()" type="button" id="submit-currentWears" value="I Wore This!" >
				</form>
			</div>
		</div>
		
		<?php endif; ?> <!-- view begin -->



<?php if (!isset($_GET['view']) || (isset($_GET['view']) && $_GET['view'] != 1)): ?> <!-- form begin -->
		
	<?php if (isset($_GET['id'])): ?> <!-- form begin -->	
		<form id="clothing-edit" action="clothing-update.php" method="post" role="form">
	<?php else: ?>
		<form id="clothing-edit" action="clothing-submit.php" method="post" role="form">
	<?php endif; ?>

			<div class="panel-group">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							Clothing Information
						</h4>
					</div>
						<div class="panel-body">
							<div class="form-group">
								<input class="form-control" id="id" name="id" type="hidden" 
								<?php if (isset($id)): ?>
									value="<?php echo $id ?>"
								<?php endif ?>
								>
								<label for="name">Name :</label>
								<input class="form-control" id="name" name="name" type="text" 
								<?php if (isset($clothing)): ?>
									value="<?php echo $clothing['name'] ?>"
								<?php endif ?>
								>
							</div>
							<div class="row">
								<div class="small-12 medium-4 columns">
									<label for="category">Category :</label>
									<select class="form-control" id="category" name="category">
										<option value="">Select a category:</option>
										<?php 
										for($i = 1; $i < count($categoryArray); $i++) {
											if(isset($clothing['category']) && $clothing['category'] == $i) {
												echo "<option selected value='" . $i . "'>" . $categoryArray[$i] . "</option>";
											} else {
												echo "<option value='" . $i . "'>" . $categoryArray[$i] . "</option>";	
											}
										}
										?>
									</select>
								</div>
								<div class="small-12 medium-4 columns">
									<label for="season">Season :</label>
									<select class="form-control" id="season" name="season">
										<option value="">Select a season:</option>
										<?php 
										for($i = 1; $i < count($seasonArray); $i++) {
											if(isset($clothing['season']) && $clothing['season'] == $i) {
												echo "<option selected value='" . $i . "'>" . $seasonArray[$i] . "</option>";
											} else {
												echo "<option value='" . $i . "'>" . $seasonArray[$i] . "</option>";
											}
										}
										?>
									</select>
								</div>
								<div class="small-12 medium-4 columns">
									<label for="season">Condition :</label>
									<select class="form-control" id="state" name="state">
										<option value="">Select a condition:</option>
										<?php 
										for($i = 1; $i < count($stateArray); $i++) {
											if(isset($clothing['state']) && $clothing['state'] == $i) {
												echo "<option selected value='" . $i . "'>" . $stateArray[$i] . "</option>";
											} else {
												echo "<option value='" . $i . "'>" . $stateArray[$i] . "</option>";
											}	
										}
										?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="small-12 medium-4 columns">
									<label for="name">Purchased from :</label>
									<input class="form-control" id="store" name="store" type="text"
										<?php if (isset($clothing['store'])): ?>
											value="<?php echo $clothing['store'] ?>"
										<?php endif ?>
									>
								</div>
								<div class="small-12 medium-4 columns">
									<label for="type">Use :</label>
									<select class="form-control" id="type" name="type">
										<option value="">Select a category:</option>
										<?php 
										for($i = 1; $i < count($typeArray); $i++) {
											if(isset($clothing['type']) && $clothing['type'] == $i) {
												echo "<option selected value='" . $i . "'>" . $typeArray[$i] . "</option>";
											} else {
												echo "<option value='" . $i . "'>" . $typeArray[$i] . "</option>";
											}
										}
										?>
									</select>
								</div>
								<div class="small-6 medium-4 columns">
									<label>Price (rounded) :</label>
									<input class="form-control" id="price" name="price" type="text"
										<?php if (isset($clothing['price'])): ?>
											value="<?php echo $clothing['price'] ?>"
										<?php endif ?>
									>
								</div>
								<div class="small-6 medium-4 columns">
									<label>Number of times worn :</label>
									<input class="form-control" id="wearsCount" name="wearsCount" type="text"
										<?php if (isset($clothing['wearsCount'])): ?>
											value="<?php echo $clothing['wearsCount'] ?>"
										<?php endif ?>
									>
								</div>
							</div>

							<div class="row">
								<div class="small-12 columns">
									<fieldset class="fieldset">
										<legend>Color(s)</legend>
										<?php 
										for($i = 1; $i < count($colorArray); $i++) {
											if(isset($colors) && in_array($i, $colors)) {
												echo "<input checked type='checkbox' name='color-select[]' id='color" . $i . "' value='" . $i . "'>";
											} else {
												echo "<input type='checkbox' name='color-select[]' id='color" . $i . "' value='" . $i . "'>";
											}
											echo "<label for='color" . $i ."'>" . $colorArray[$i] . "</label>";
										}
										?>
									</fieldset>
								</div>
							</div>
						</div>
					</div>
				</div>
			<input class="button" id="submit-clothing" type="submit">
		</form>
			
	<?php endif; ?> <!-- form end-->

			</div>
			</div>
		</div>
	</body>
</html>