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
			if (isset($_GET['view'])) { 
				echo $_GET['view'];
			}
		 ?>
		


		<div class="container">
			<div class="row">
				<p> Welcome to this outfit-edit page </p>
				<form id="outfit-edit" action="outfit-submit.php" method="post" role="form>
					<h4 class="panel-title">
						Outfit Information
					</h4>
					<label for="name">Name :</label>
					<input class="form-control" id="name" name="name" type="text">
					<div class="row">
						<div class="small-6 columns">
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
						<div class="small-6 columns">
							<label for="Category">Category :</label>
							<select class="form-control" id="category" name="category">
								<option value="">Select a category:</option>
								<option value="1">Casual</option>
								<option value="2">Athletic</option>
								<option value="3">Dressy</option>
							</select>
						</div>
					</div>		
					<input class="button" id="submit" type="submit">
				</form>
			</div>
		</div>
	</body>
</html>