<?php
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "rvm test";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);
// // Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }

// $sql = "SELECT * FROM adminlogin";
// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
//   // output data of each row
//   while($row = $result->fetch_assoc()) {
//         // if(($row['admin_username']=='reverse32')&&($row['role']=='admin')){
//         //     header("location: admin/index.php");
//         //     break;
//         // }
//         if(($row['admin_username']=='rvm0001')&&($row['role']=='employee')){
//             header("location: employee/index.php");
//             break;
//         }
//         else{
//             echo "INCORRECT USERNAME OR PASSWORD.";
//         }
//   }
// }

session_start();

$host = 'localhost';
$db_name='rvm test';
$username='root';
$password='';
// // username and password sent from form 
// $myusername=$_POST['username'];
// $mypassword=$_POST['password'];

// try {
//     // Connect to server and select database.
//     $db = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
//     $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
//     $query = "SELECT *, COUNT(*) as count FROM login WHERE `admin_username`=:user and `admin_password`=:pass";

//     $stmt = $db-> $query;
//     $stmt->bindParam(':user', $myusername);
//     $stmt->bindParam(':pass', $mypassword);
    
//     if ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
//         $count = $row['count'];
        
//         // If result matched $myusername and $mypassword, table must be 1 row
//         if ($count == 1) {        
//             switch( $row['role'] ){

//                 case 'admin':
//                     header("location:admin/index.php");
//                     exit();

//                 case 'employee':
//                     header("location:employee/index.php");
//                     exit();
//                 default:
//                     echo "Wrong Username or Password";
//             }
//         }
//     }
    
//     $db = null;
// }

// catch(PDOException $e) {  
//     echo $e->getMessage();  
// }

$conn = new mysqli("localhost","root","","rvm test");

$msg = "";



?>