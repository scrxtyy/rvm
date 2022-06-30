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
<th>Date</th>
<th>Time</th>
<th>Location</th>
<th>Waste Info</th>
<th>Item Weight (g)</th>
<th>Total Weight in Machine (g)</th>
</tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "rvm test");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT date,time,location,classification,weight,current_total_weight FROM `waste info`";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
echo "<tr><td>".$row["date"]."</td><td>".$row["time"]."</td><td>".$row["location"]."</td><td>". $row["classification"] . "</td><td>". $row["weight"]."</td><td>". $row["current_total_weight"]. "</td></tr>";
}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
</table>
</body>
</html>