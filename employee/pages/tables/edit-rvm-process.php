<?php
session_start();

$mysqli = new mysqli("192.168.76.188", "rvmmonitor", "LEAAT32!", "adminRVM");

        $update=false;  
        $id=0;
    
        $address = '';
        $barangay = '';
        $city = '';
        $postal = '';


if (isset($_POST['save-login'])){  

    $address = $_POST['address'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $postal = $_POST['postal'];

    $_SESSION['message'] = "Record has been saved.";
    $_SESSION['msg_type']= "success";

    $mysqli->query("INSERT INTO `RVM_Information (address,barangay,city,postal_no) VALUES ('$address', '$barangay', '$city','$postal')");

    header("location: edit-rvm.php");


}

else if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    $mysqli->query("DELETE FROM RVM_Information WHERE rvm_id=$id");

    $_SESSION['message'] = "Record has been deleted.";
    $_SESSION['msg_type']= "danger";

    $rvm_infoMax = intval($mysqli->query("SELECT MAX( `rvm_id` ) FROM `RVM_Information` ;"));

    $mysqli->query("ALTER TABLE `RVM_Information` AUTO_INCREMENT = $rvm_infoMax;");

    header("location: edit-rvm.php");

}

else if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update=true;
    $result = $mysqli->query("SELECT * FROM RVM_Information WHERE rvm_id = $id");
    
    if(mysqli_num_rows($result)==1){
        $row2 = $result->fetch_array();

        $address = $row2['address'];
        $barangay = $row2['barangay'];
        $city = $row2['city'];
        $postal = $row2['postal_no'];

        $rvmassign=$row2['rvm_id'];
    }
}

else if(isset($_POST['update'])){
    $id=$_POST['id'];

    $update = false;

    $address = $_POST['address'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $postal = $_POST['postal'];

    $_SESSION['message'] = "Record has been updated.";
    $_SESSION['msg_type']= "warning";

      $mysqli->query("UPDATE `RVM_Information` SET address='$address', barangay ='$barangay', city='$city' WHERE rvm_id='$id';");

    header("location: edit-rvm.php");

}


?>