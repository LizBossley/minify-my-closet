<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$table = ($_GET['t']);
$id = ($_GET['id']);

$con =  mysqli_connect("localhost", "root", "");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$db = mysqli_select_db($con, "minify_my_closet"); // Selecting Database
$sql="SELECT * FROM " . $table . " WHERE ID = '". $id ."'";

$result = mysqli_query($con,$sql);
if (!$result) {
	printf("Error: %s\n", mysqli_error($con));
	exit();
}


while($row = mysqli_fetch_array($result)) {
$clothing = array(
    'name' => $row['name'],
    'category' => $row['category'],
    'season' => $row['season'],
    'store' => $row['store'],
    'price' => $row['price'],
    'type' => $row['type'],
    'id' => $row['id'],
    );
}

echo '<script>';
echo 'var clothingItem = ' . json_encode($clothing) . ';';
echo '</script>';
mysqli_close($con);
?>
</body>
</html>