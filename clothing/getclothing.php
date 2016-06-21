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

$con =  mysqli_connect("localhost", "root", "");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$db = mysqli_select_db($con, "minify_my_closet"); // Selecting Database
$sql="SELECT * FROM clothing WHERE ".$column." = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Name</th>
<th class='table-clothing-edit'>Edit</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td><a href='/edit?id=" . $row['id'] . "'>" . $row['name'] . "</a></td>";
    echo "<td class='table-clothing-edit'><a href='edit.php?id=" . $row['id'] . "'>Edit</a>"; 
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>