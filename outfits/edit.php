<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <title>Outfit Edit</title>
		<?php include '../resources/imports/resources.php'; ?>
		<script src="submit.js"></script>
		<script src="../resources/js/jquery.validate.min.js"></script>
	</head>
	<body>
		<?php include '../resources/imports/header.php'; ?>
		<?php 
		$categoryArray = array("None", "Casual", "Athletic", "Dressy");
		$seasonArray = array("None", "Summer", "Spring", "Winter", "Fall", "Year-round");
		if (isset($_GET['id'])) {
			
			$con =  mysqli_connect("localhost", "root", "");
			if (!$con) {
			    die('Could not connect: ' . mysqli_error($con));
			}

			$id = mysqli_real_escape_string($con,($_GET['id']));

			$db = mysqli_select_db($con, "minify_my_closet"); // Selecting Database
			$sql="SELECT * FROM outfits WHERE ID = '". $id ."'";

			$result = mysqli_query($con,$sql);
			if (!$result) {
				printf("Error: %s\n", mysqli_error($con));
				exit();
			}


			while($row = mysqli_fetch_array($result)) {
				$outfit = array(
			    'name' => $row['name'],
			    'category' => $row['category'],
			    'season' => $row['season'],
			    );
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
							<div><h2><?php echo $outfit['name'] ?></h2></div>
							<a href="edit.php?id=<?php echo $id ?>" class="edit-button hollow button">Edit</a>
						</div>
					</div>
					<div class="row">
						<div class="small-6 medium-3 columns">
							<h4>Category: </h4><?php echo $categoryArray[$outfit['category']]?>
						</div>
						<div class="small-6 medium-3 columns">
							<h4>Season: </h4><?php echo $seasonArray[$outfit['season']] ?>
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
						<form id="outfit-edit" action="outfit-submit.php" method="post" role="form>
							<h4 class="panel-title">
								Outfit Information
							</h4>
							<label for="name">Name :</label>
							<input class="form-control" id="id" name="id" type="hidden" 
								<?php if (isset($id)): ?>
									value="<?php echo $id ?>"
								<?php endif ?>
							>
							<input class="form-control" id="name" name="name" type="text"
							<?php if (isset($outfit)): ?>
								value="<?php echo $outfit['name'] ?>"
							<?php endif ?>
							>
							<div class="row">
								<div class="small-6 columns">
									<label for="season">Season :</label>
									<select class="form-control" id="season" name="season">
										<option value="">Select a season:</option>
										<?php 
										for($i = 1; $i < count($seasonArray); $i++) {
											if(isset($outfit['season']) && $outfit['season'] == $i) {
												echo "<option selected value='" . $i . "'>" . $seasonArray[$i] . "</option>";
											} else {
												echo "<option value='" . $i . "'>" . $seasonArray[$i] . "</option>";
											}
										}
										?>
									</select>
								</div>
								<div class="small-6 columns">
									<label for="Category">Category :</label>
									<select class="form-control" id="type" name="type">
										<option value="">Select a category:</option>
										<?php 
										for($i = 1; $i < count($categoryArray); $i++) {
											if(isset($outfit['category']) && $outfit['category'] == $i) {
												echo "<option selected value='" . $i . "'>" . $categoryArray[$i] . "</option>";
											} else {
												echo "<option value='" . $i . "'>" . $categoryArray[$i] . "</option>";
											}
										}
										?>
									</select>
								</div>
							</div>		
							<input class="button" id="submit" type="submit">
						</form>
					<?php endif; ?> <!-- form end-->
	
				</div>
			</div>
		</div>
	</body>
</html>