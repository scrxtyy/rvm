<!DOCTYPE html>
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
  <?php
    $mysqli = new mysqli("192.168.76.188", "rvmmonitor", "LEAAT32!", "adminRVM");

    // $stmt1 = "SELECT * FROM Personal_Info LIMIT 1,100";
    // $stmt2 = "SELECT * FROM Person_Address LIMIT 1,100 ";
    // $stmt3 = "SELECT * FROM Employee_LogIn LIMIT 1,100";
    // $stmt4 = "SELECT * FROM RVM_Assign";
    // $stmt5 = "SELECT * FROM RVM_MonitorLog";
    

    $result1 = $mysqli->query("SELECT * FROM Personal_Info LIMIT 1,100");
    $result2 = $mysqli->query("SELECT * FROM Person_Address LIMIT 1,100 ");
    $result3 =  $mysqli->query("SELECT * FROM Employee_LogIn LIMIT 1,100");
    $result4 =  $mysqli->query("SELECT * FROM RVM_Assign");
    $result5 = $mysqli->query("SELECT * FROM RVM_MonitorLog");
    $result6 = $mysqli->query("SELECT * FROM RVM_Information");
    
    
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
            <a class="nav-link" href="/RVM-monitoring-website/admin/index.php">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="../../pages/forms/basic_elements.php">
              <i class="ti-layout-list-post menu-icon"></i>
              <span class="menu-title">Registration Forms</span>
            </a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="/RVM-monitoring-website/admin/pages/tables/rvms.php">
              <i class="ti-view-list-alt menu-icon"></i>
              <span class="menu-title">RVM Information</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/RVM-monitoring-website/admin/pages/tables/employeetable.php">
              <i class="ti-view-list-alt menu-icon"></i>
              <span class="menu-title">Employees</span>
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
                  <p class="card-description">
                    ASSIGNED EMPLOYEES IN DIFFERENT LOCATIONS
                  </p>
                  <div class="table-responsive">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>User ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Contact No.</th>
                          <th>Address</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php

                                while(($row1 = $result1->fetch_assoc()) && ($row2 = $result2->fetch_assoc())){
                                  echo "<tr><td>".$row1['user_id']."</td>
                                    <td>".$row1['first_name']." ".$row1['last_name']."</td><td>".$row1['email'].
                                    "</td><td>".$row1['contact_no']."</td><td>".$row2['address']. " ".$row2['barangay']." ".$row2['city']."</td></tr>";
                                  }
                          ?>
                      </tbody>
                    </table>
                  </div>
                  <button name="like" class="btn btn-lg btn-outline-light text-primary rounded-0 border-0 d-none d-md-block" type="button" onclick="location.href = 'edit-person-info.php'"> Edit Data on Table</button>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
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
