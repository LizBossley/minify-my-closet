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

$con =  mysqli_connect("localhost", "root", "");
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$db = mysqli_select_db($con, "damage_counter"); // Selecting Database
$sql="SELECT * FROM card_list WHERE faction = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table>
<tr>
<th>Name</th>
<th>View/Edit</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td><a href='/edit?id=" . $row['id'] . "'>Edit</a> | <a href='/edit?id=" . $row['id'] . "'>View</a></td>"; 
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>