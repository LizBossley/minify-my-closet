<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <title>Card List</title>
		<?php include '../resources/imports/resources.php'; ?>
		
		<script>
		function switchViewBy(filter) {
			$('.filter').hide();

			$('.' + filter).show();
		}

		$(document).ready(function() {
			switchViewBy('category');
		});
		</script>

	</head>
	<body>
		<?php include '../resources/imports/header.php'; ?>
		<div class="container">
			<div class="jumbotron">
				<p> Welcome to this clothing-list page </p>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<p>View by:</p>
				</div>
				<div class="col-sm-9">
					<label class="radio-inline"><input type="radio" name="viewBy" onclick="switchViewBy('category');" value="category" checked="checked">Category</label>
					<label class="radio-inline"><input type="radio" name="viewBy" onclick="switchViewBy('season');" value="season">Season</label>
					<label class="radio-inline"><input type="radio" name="viewBy" onclick="switchViewBy('state');" value="state">Condition</label>
				</div>
			</div>
			<div class="row">
				<form>
					<div class="col-sm-12 category filter">
						<select class="form-control" name="category" onchange="showCategory(this.value, 'category', 'clothing')">
							<option value="">Select a category:</option>
							<option value="1">Shirt</option>
							<option value="2">Skirt</option>
							<option value="3">Dress</option>
							<option value="4">Sweater</option>
							<option value="5">Pants</option>
							<option value="6">Shorts</option>
							<option value="7">Outerwear</option>
							<option value="8">Other</option>
							<option value="9">Accessories/Shoes</option>
						</select>
					</div>
					<div class="col-sm-12 season filter">
						<select class="form-control" id="season" name="season" onchange="showCategory(this.value, 'season', 'clothing')">
							<option value="">Select a season:</option>
							<option value="1">Summer</option>
							<option value="2">Spring</option>
							<option value="3">Winter</option>
							<option value="4">Fall</option>
							<option value="5">Year-round</option>
						</select>
					</div>
					<div class="col-sm-12 state filter">
						<select class="form-control" id="state" name="state" onchange="showCategory(this.value, 'state', 'clothing')">
							<option value="">Select a condition:</option>
							<option value="1">New</option>
							<option value="2">Like New</option>
							<option value="3">Broken in</option>
							<option value="4">Loved</option>
							<option value="5">Replace Soon</option>
						</select>
					</div>
				</form>
			</div>
			<br>
			<div id="txtHint"><b>Clothing will be displayed here once category selected</b></div>
		</div>
	</body>
</html>