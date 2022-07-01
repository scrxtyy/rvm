<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>
<table>
<tr>
<th>RVM ID</th>
<th>ADDRESS</th>
<th>BARANGAY</th>
<th>CITY</th>
<th>POSTAL CODE</th>
</tr>
<?php
$conn = mysqli_connect("192.168.1.18", "rvmmonitor", "LEAAT32!", "adminRVM");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM `RVM_Information`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>".$row["rvm_id"]."</td><td>".$row["address"]."</td><td>".$row["barangay"]."</td><td>". $row["city"] . "</td><td>". $row["postal_no"]."</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>