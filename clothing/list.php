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
		function showCategory(str) {
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
		        xmlhttp.open("GET","getclothing.php?q="+str,true);
		        xmlhttp.send();
		    }
		}
		</script>
	</head>
	<body>
		<?php include '../resources/imports/header.php'; ?>
		<div class="container">
			<div class="jumbotron">
				<p> Welcome to this clothing-list page </p>
			</div>
			<form>
				<select name="category" onchange="showCategory(this.value)">
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
			</form>
			<br>
			<div id="txtHint"><b>Clothing will be displayed here once category selected</b></div>
		</div>
	</body>
</html>