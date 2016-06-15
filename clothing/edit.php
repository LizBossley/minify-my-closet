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
									<a data-toggle="collapse" href="#basic-information">Basic Information</a>
								</h4>
							</div>
							<div id="basic-information" class="panel-collapse collapse">
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
									</select>
									<br>
									<label for="size">Base size:</label>
									<input class="radio-inline" type="radio" name="size" value="1" checked> S
									<input class="radio-inline" type="radio" name="size" value="2"> M
									<input class="radio-inline" type="radio" name="size" value="3"> L
								</div>
							</div>
						</div>
						<div class="panel  panel-primary">
							<div class="panel-heading">
								<h4 class="panel-title">
									<a data-toggle="collapse" href="#model-statistics">Model Statistics </a>
								</h4>
							</div>
							<div id="model-statistics" class="panel-collapse collapse">
								<div class="panel-body">
									<div class="row">
										<div class="col-sm-6">
											<label>SPD :</label>
											<input class="form-control" id="spd" name="spd" type="text">
											<label>STR :</label>
											<input class="form-control" id="str" name="str" type="text">
											<label>MAT :</label>
											<input class="form-control" id="mat" name="mat" type="text">
											<label>RAT :</label>
											<input class="form-control" id="rat" name="rat" type="text">
											<label>DEF :</label>
											<input class="form-control" id="def" name="def" type="text">
										</div>
										<div class="col-sm-6">
											<label>ARM :</label>
											<input class="form-control" id="arm" name="arm" type="text">
											<label>CMD :</label>
											<input class="form-control" id="cmd" name="cmd" type="text">
											<div class="hordes">	
												<label>FURY :</label>
												<input class="form-control" id="fury" name="fury" type="text">
												<label>THR :</label>
												<input class="form-control" id="thr" name="thr" type="text">
											</div>
											<div class="warmachine">
												<label>FOCUS :</label>
												<input class="form-control" id="focus" name="focus" type="text">
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
		
<script>
$("#faction").change(function() {
var faction = $("#faction").val();
    if (faction > 7) {
        $('.warmachine').hide();
        $('.hordes').show();
    } else {
    	$('.hordes').hide();
        $('.warmachine').show();
    }
});
</script>

	</body>
</html>