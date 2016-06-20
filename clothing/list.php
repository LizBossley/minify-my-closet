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
		function showCategory(str, column) {
		    if (str == "") {
		        document.getElementById("txtHint").innerHTML = "";
		        return;
		    } else { 
		        if (window.XMLHttpRequest) {
		            // code for IE7+, Firefox, Chrome, Opera, Safari
		            xmlhttp = new XMLHttpRequest();
		        } else {
		            // code for IE6, IE5
		            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		        }
		        xmlhttp.onreadystatechange = function() {
		            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
		            }
		        };
		        xmlhttp.open("GET","getclothing.php?q="+str+"&column="+column,true);
		        xmlhttp.send();
		    }
		}

		function switchViewBy(filter) {
			
		}
		</script>
	</head>
	<body>
		<?php include '../resources/imports/header.php'; ?>
		<div class="container">
			<div class="jumbotron">
				<p> Welcome to this clothing-list page </p>
			</div>
			<div class="row">
			<div class="col-sm-12">
				<label class="radio-inline"><input type="radio" name="viewBy" onclick="switchViewBy('category');" value="category">Category</label>
				<label class="radio-inline"><input type="radio" name="viewBy" value="season">Season</label>
				<label class="radio-inline"><input type="radio" name="viewBy" value="test">Other choice</label>
			</div>
				<form>
					<div class="col-sm-6">
						<select class="form-control" name="category" onchange="showCategory(this.value, 'category')">
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
					<div class="col-sm-6">
						<select class="form-control" id="season" name="season" onchange="showCategory(this.value, 'season')">
							<option value="">Select a season:</option>
							<option value="1">Summer</option>
							<option value="2">Spring</option>
							<option value="3">Winter</option>
							<option value="4">Fall</option>
							<option value="5">Year-round</option>
						</select>
					</div>
				</form>
			</div>
			<br>
			<div id="txtHint"><b>Clothing will be displayed here once category selected</b></div>
		</div>
	</body>
</html>