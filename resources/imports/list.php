<!DOCTYPE html>
<html>
<head>
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
?>
    <table class="table-clothing">
        <tr>
            <th class="table-clothing-name">Name</th>
            <th class='table-clothing-edit'>Edit</th>
        </tr>
        <?php
        while($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td>
                <a href="edit.php?id=<?php echo $row['id'] ?>&view=1"> <?php echo $row['name'] ?> </a>
            </td>
            <td class='table-clothing-edit'>
                <a href="edit.php?id=<?php echo $row['id'] ?>">
                    test
                </a>
            </td>
        </tr>
    <?php
    }
    ?>
    </table>

<?php
mysqli_close($con);
?>
</body>
</html>