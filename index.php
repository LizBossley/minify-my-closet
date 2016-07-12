<!DOCTYPE html>
<html lang="en">
  	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	    <title>Home</title>
		<link href="resources/css/bootstrap.min.css" rel="stylesheet">
		<link href="resources/css/main.css" rel="stylesheet">
		<script src="resources/js/jquery-2.2.4.min.js"></script>
		<script src="resources/js/bootstrap.min.js"></script>
		<script src="resources/js/app.js"></script>
	</head>
	<body>
		<div class="jumbotron">
			<p> Welcome to this home page </p>
			</p>
		</div>
		<div class="container">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="http://placeimg.com/1000/400/nature" alt="Chania">
    </div>

    <div class="item">
      <img src="http://placeimg.com/1000/400/nature" alt="Chania">
    </div>

    <div class="item">
      <img src="http://placeimg.com/1000/400/nature" alt="Flower">
    </div>

    <div class="item">
      <img src="http://placeimg.com/1000/400/nature" alt="Flower">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>




			<p> Would you like to <a href="clothing/list.php">view</a> the clothing items?</p>
			<p> Would you like to <a href="clothing/edit.php">add</a> a clothing item?</p>
			<p> Would you like to <a href="outfits/list.php">view</a> the outfits?</p>
			<p> Would you like to <a href="outfits/edit.php">add</a> an outfit?
		</div>
	</body>
</html>