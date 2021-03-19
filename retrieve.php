<?php 

$con = mysqli_connect('localhost', 'root', '', 'weather_database');


if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$result = mysqli_query($con, "SELECT * from weather");

$json_array = array();
while($row = mysqli_fetch_assoc($result)) {
	$json_array[] = $row;
}

print_r(json_encode($json_array));

$con->close();

?>
