<?php
$conn = mysqli_connect("localhost", "root", "", "rvm test");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT LAST 'current_total_weight' FROM `waste info`";
$result = $conn->query($sql);

echo $result;

$conn->close();

?>