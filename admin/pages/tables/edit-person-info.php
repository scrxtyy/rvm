
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RVM Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <?php include_once 'process.php'; ?>
  

  <?php
    $mysqli = new mysqli("192.168.76.188", "rvmmonitor", "LEAAT32!", "adminRVM");

    $stmt1 = "SELECT * FROM Personal_Info LIMIT 1,10000";
    $stmt2 = "SELECT * FROM Person_Address LIMIT 1,10000";
    $stmt3 = "SELECT * FROM Employee_LogIn  LIMIT 1,10000";
    $stmt4 = "SELECT * FROM RVM_Assign  LIMIT 1,10000";
    $stmt5 = "SELECT * FROM RVM_MonitorLog";
  

    $result1 = $mysqli->query($stmt1);
    $result2 = $mysqli->query($stmt2);
    $result3 =  $mysqli->query($stmt3);
    $result4 =  $mysqli->query("SELECT * FROM RVM_Assign  LIMIT 1,10000");
    $result5 = $mysqli->query($stmt5);
    $result6 = $mysqli->query("SELECT * FROM RVM_Information");

    
    // pre_r($result1->fetch_assoc());
    // pre_r($result2->fetch_assoc());
    // pre_r($result3->fetch_assoc());

    function pre_r($array){
      echo "<pre>";
      print_r($array);
      echo "</pre>";
    }
  ?>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo me-5" href="../../index.html"><img src="../../images/logo.svg" class="me-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="../../index.html"><img src="../../images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
              ADMIN <img src="../../images/faces/face28.png" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="/RVM-monitoring-website/index.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="employeetable.php">
              <i class="ti-layout-list-post menu-icon"></i>
              <span class="menu-title">Go Back</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="edit-person-info.php">
              <i class="ti-view-list-alt menu-icon"></i>
              <span class="menu-title">Edit</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->

      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Employee's Information Sheet</h4>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>User ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Contact No.</th>
                          <th>Address</th>
                          <th colspan="2">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          while(($row1 = $result1->fetch_assoc()) && ($row2 = $result2->fetch_assoc())){
                                  echo "<tr><td>".$row1['user_id']."</td>
                                    <td>".$row1['first_name']." ".$row1['last_name']."</td><td>".$row1['email'].
                                    "</td><td>".$row1['contact_no']."</td><td>".$row2['address']. " ".$row2['barangay']." ".$row2['city']."</td>";

                                  echo "<td><a href='edit-person-info.php?edit=".$row1['user_id']."' class='btn btn-info'>Edit</a></td>";
                                  echo "<td><a href='edit-person-info.php?delete=".$row1['user_id']."' class='btn btn-danger'>Delete</a></td>";
                          }
                          

                        ?>

                          </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php
                  if(isset($_SESSION['message'])){?>

                  <div class="alert alert-<?=$_SESSION['msg_type']?>">
                    <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']); 
                    ?>

                  </div>

                  <?php } ?>
              </div>
              
            </div> 

            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Employee Log In Details</h4>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>User ID</th>
                          <th>Assigned RVM ID</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th colspan="2">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                            while(($row3 = $result3->fetch_assoc()) && ($row4 = $result4->fetch_assoc())){
                                  echo "<tr><td>".$row3['user_id']."</td><td>".$row4['rvm_id'].
                                  "</td><td>".$row3['usern'].
                                    "</td><td>".$row3['pw']."</td>";

                                  echo "<td><a href='edit-person-info.php?edit=".$row3['user_id']."' class='btn btn-info'>Edit</a></td>";
                                  echo "<td><a href='edit-person-info.php?delete=".$row3['user_id']."' class='btn btn-danger'>Delete</a></td>";
                        
                        }

                        ?>

                          </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <?php
                  if(isset($_SESSION['message'])){?>

                  <div class="alert alert-<?=$_SESSION['msg_type']?>">
                    <?php 
                    echo $_SESSION['message'];
                    unset($_SESSION['message']); 
                    ?>

                  </div>

                  <?php } ?>
              </div>
              
            </div> 
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                <h4 class="card-title">Insert or Edit Info:</h4>
                  <form class="form-sample" action="process.php" method="POST">
                    <p class="card-description">
                      Personal Information
                    </p>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <!--ROW-->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">First Name: </label>
                            <div class="col-sm-9">
                              <input type="text" value="<?php echo $firstname; ?>" name="firstname" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Last Name: </label>
                            <div class="col-sm-9">
                              <input type="text" value="<?php echo $lastname; ?>" name="lastname" class="form-control" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--ROW-->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Contact Number: </label>
                            <div class="col-sm-9">
                              <input type="text" value="<?php echo $contact; ?>" name="contact" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email: </label>
                            <div class="col-sm-9">
                              <input type="text" value="<?php echo $email; ?>" name="email" class="form-control" required>
                            </div>
                          </div>
                        </div>
                      </div>

                      <p class="card-description">
                        Address
                      </p>
                      <!--ROW-->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address: </label>
                            <div class="col-sm-9">
                              <input type="text" value="<?php echo $address; ?>" name="address" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      <!--ROW-->
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">City: </label>
                            <div class="col-sm-9">
                              <select class="form-select" name="city" id="city" onchange="populate(this.id,'barangay','postid')"  required>
                                <option selected><?php echo $city; ?></option>
                                <option value="Santa Rosa">Santa Rosa</option>
                                <option value="Carmona">Carmona</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Barangay: </label>
                            <div class="col-sm-9">
                              <select id="barangay" class="form-select" name="barangay" required>
                                <option selected><?php echo $barangay; ?></option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                      <!--ROW-->
                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Postal Code: </label>
                            <div class="col-sm-9">
                              <input type="text" value="<?php echo $postal; ?>" id="postid" name="postal" class="form-control" value="4026" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--ROW-->
                      <p class="card-description">
                        Log In Information
                      </p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Username: </label>
                            <div class="col-sm-9">
                              <input type="text" value="<?php echo $username; ?>" name="usern" class="form-control" required>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Assign RVM: </label>
                            <div class="col-sm-9">
                              <select class="form-select" name="rvm-assign" required>
                                <option selected><?php echo $rvmassign; ?></option>
                                <?php
                                  while($row6 = $result6->fetch_assoc()){
                                    echo "<option value=".$row6['rvm_id'].">".$row6['rvm_id']."</option>"; 
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>


                      </div>
                      <!--ROW-->
                      <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Password: </label>
                            <div class="col-sm-9">
                              <input type="password" value="<?php echo $password; ?>" name="pw" class="form-control" required>
                            </div>
                          </div>
                        </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Confirm Password: </label>
                            <div class="col-sm-9">
                              <input type="password" name="confirmpw" class="form-control" required>
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      <!--ROW-->
                      <?php 
                        if ($update == true){ ?>
                        <div class="row">
                          <div class="card-body">
                            <div class="template-demo">
                              <label class="form-check-label">
                                <button type="submit" name="update" class="btn btn-outline-green btn-fw">Update</button>
                              </label>
                            </div>
                          </div>
                        </div>
                      <?php
                        }else {
                      ?>
                      <div class="row">
                      <div class="card-body">
                          <div class="template-demo">
                            <label class="form-check-label">
                              <button type="submit" name="save-login" class="btn btn-outline-green btn-fw">Add Record</button>  
                            </label>
                          </div>
			                  </div>
                      </div>
                      <?php }?>

                      
                  </form>
          </div>
                          </div>
                          </div>
          
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <!-- partial -->
        
      </div>
      <!-- main-panel ends -->
<script type="text/javascript">
    function populate(s1,s2,postid){
      var s1 = document.getElementById(s1);
      var s2 = document.getElementById(s2);
      var postid = document.getElementById(postid);
      s2.innerHTML = "";
      if(s1.value == "Santa Rosa"){
        postid.value = "4026";
        postid.innerHTML = "4026";
        var optionArray = ["|","cityhallsantarosa|City Hall Santa Rosa","dita|Dita","tagapo|Tagapo","donjose|Don Jose"]
      } else if (s1.value == "Carmona"){
        postid.value = "4116";
        postid.innerHTML = "4116";
        var optionArray = ["|","cityhallcarmona|City Hall Carmona"]
      }
      for(var option in optionArray){
        var pair = optionArray[option].split("|");
        var newOption = document.createElement("option");
        newOption.value = pair[0];
        newOption.innerHTML = pair[1];
        s2.options.add(newOption);
      }
    }
  </script>                   
      
    </div>
                          </div>
                          </div>
                          </div>
                          </div>
    <!-- page-body-wrapper ends -->
    
  
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <script src="../../js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <!-- End custom js for this page-->
</body>

</html>
