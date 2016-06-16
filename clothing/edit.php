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
		<div class="container">
			<div class="row">
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
												<option value="8">Other</option>
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
												<option value="5">Replce Soon</option>
											</select>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-3">
											<label>Price :</label>
											<input class="form-control" id="price" name="price" type="text">
										</div>
										<div class="col-sm-6">
											<label for="name">Purchased from :</label>
											<input class="form-control" id="store" name="store" type="text">
										</div>
										<div class="col-sm-3">
											<div class="checkbox">
											  <label><input type="checkbox" id="athletic" name="athletic" value="1">Athletic</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					<input class="btn btn-primary" id="submit" type="submit">
				</form>
			</div>
		</div>
	</body>
</html>