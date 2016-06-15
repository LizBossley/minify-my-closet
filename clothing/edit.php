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
									<br>
									<div class="row">
										<div class="col-sm-6">
											<label>Price :</label>
											<input class="form-control" id="price" name="price" type="text">
										</div>
										<div class="checkbox">
										  <label><input type="checkbox" id="athletic" name="athletic" value="0">Athletic</label>
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