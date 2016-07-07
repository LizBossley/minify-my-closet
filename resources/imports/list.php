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
$q = intval($_GET['q']);
$column = ($_GET['column']);
$table = ($_GET['t']);

$con =  mysqli_connect("localhost", "root", "");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$db = mysqli_select_db($con, "minify_my_closet"); // Selecting Database
$sql="SELECT * FROM " . $table . " WHERE ".$column." = '".$q."'";

$result = mysqli_query($con,$sql);
if (!$result) {
	printf("Error: %s\n", mysqli_error($con));
	exit();
}

echo "<table>
<tr>
<th>Name</th>
<th class='table-clothing-edit'>Edit</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td><a href='edit.php?id=" . $row['id'] . "&view=1'>" . $row['name'] . "</a></td>";
    echo "<td class='table-clothing-edit'><a href='edit.php?id=" . $row['id'] . "'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a>"; 
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>