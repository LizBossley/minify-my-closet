<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <title>My Closet</title>
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
			<div class="row">
				<div class="small-3 columns">
					<p>View by:</p>
				</div>
				<div class="small-9 columns">
					<label><input type="radio" name="viewBy" onclick="switchViewBy('category');" value="category" checked="checked">Category</label>
					<label><input type="radio" name="viewBy" onclick="switchViewBy('season');" value="season">Season</label>
					<label><input type="radio" name="viewBy" onclick="switchViewBy('state');" value="state">Condition</label>
				</div>
			</div>
			<div class="row">
				<form>
					<div class="small-12 columns category filter">
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
					<div class="small-12 columns season filter">
						<select class="form-control" id="season" name="season" onchange="showCategory(this.value, 'season', 'clothing')">
							<option value="">Select a season:</option>
							<option value="1">Summer</option>
							<option value="2">Spring</option>
							<option value="3">Winter</option>
							<option value="4">Fall</option>
							<option value="5">Year-round</option>
						</select>
					</div>
					<div class="small-12 columns state filter">
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
			<div class="row">
				<div class="small-7 small-centered columns">
					<div id="txtHint"><b>Select a category to view clothing items in your closet</b></div>
				</div>
			</div>
	</body>
</html>