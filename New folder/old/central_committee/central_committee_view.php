<?PHP
  include "../db_connection.php";
  session_start();
  if(!isset($_SESSION['central_committee']))
  {header('location:index.php');}
  $user=$_SESSION['central_committee'];
  $sqll="SELECT * FROM `user_details` WHERE  `id_number` = '$user' ";
        $result = mysqli_query($connect,$sqll);
        $roww = mysqli_fetch_array($result);
        $user_branch=$roww['branch'];
        
        if(!isset($_GET['k'])){
          $Proposal_Id =$_SESSION['Proposal_Id'];
          
        }else{
          $Proposal_Id = $_SESSION['Proposal_Id'] = $_GET['k'];
        }
       
        $project="SELECT * FROM `project_proposals`  WHERE `proposal_id`='$Proposal_Id'";
        $project_sql= mysqli_query($connect,$project);
        $project_row= mysqli_fetch_array($project_sql);
        $applicant_id =  $_SESSION['applicant_id'] = $project_row['id_number'];

        $applicant="SELECT * FROM `applicants_details` WHERE  `id_number`='$applicant_id'";
        $applicant_sql= mysqli_query($connect,$applicant);
        $applicant_row= mysqli_fetch_array($applicant_sql);

 
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <!--================================================================================-->
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--================================================================================-->
  <link rel="shortcut icon" href="../assets/images/logo.jpg" />
  <!--================================================================================-->
  <title>Dashboard</title>
  <!--=============================== fonts ==========================================-->
  <link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!--================================styles==========================================-->
  <link href="../assets/css/sb-admin-2.css" rel="stylesheet">
  <!--================================================================================-->
   <!--================================================================================-->
 
  <!--================================================================================-->
  <!--================================================================================-->
  <!--================================================================================-->
<style>

</style>
<!--================================================================================-->
</head>
<body id="page-top">
<!--==================================Page Wrapper==================================-->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">
          <img class="" src="../assets/images/logo.jpg" style="height:50%;width:50%;">
        </div>
        <div class="sidebar-brand-text mx-3">idea management </div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <!--+++++++++ Side navbar items +++++++++++-->
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="fas fa-user"></i>
          <span><?PHP echo $user;?></span></a>
      </li>
      <hr class="sidebar-divider">
      <!--=== Heading ===-->
      <div class="sidebar-heading">
              Menu
      </div>
      <li class="nav-item active">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Proposals List</h6>
            <a class="collapse-item" href="central_committee_pending.php">Pending</a>
            <a class="collapse-item" href="central_committee_accepted.php">Accepted</a>
            <a class="collapse-item" href="central_committee_rejected.php">Rejected</a>
            
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="central_committee_profle.php">
          <i class="far fa-address-card"></i>
          <span>My Profile</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="central_committee_change_password.php">
          <i class="fas fa-key"></i>
          <span>Change Password</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!--++++++ Sidebar Toggler +++++-->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!--+++++ End of Sidebar ++++++-->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!---------- Sidebar Toggle (Topbar) -------->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!---------Topbar Navbar------------->
          <ul class="navbar-nav ml-auto">
           <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">User</span>
                <img class="img-profile rounded-circle" src="../assets/images/profile.png">
                <i class="fas fa-caret-down"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"></h1>
          <!--=================================-->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                  
                      <h6 class="m-0 font-weight-bold text-primary"><a href="department_admin_accepted.php" class="btn btn-primary btn-circle btn">
                      <i class="fas fa-arrow-circle-left"></i>
                  </a> Back </h6>
               </div>
               <!------------------------>
             
                    <div class="container">
                    <h5 class="card-title">  Proposals details</h5>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                <label for="exampleInputPassword1"><b>Proposal Id</b></label>
                                <p class="border-bottom border-primary"> <?PHP echo $Proposal_Id;?></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                <label for="exampleInputPassword1"><b>Project Title</b></label>
                                <p class="border-bottom border-primary">  <?PHP echo $project_row['project_title'];?></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                <label for="exampleInputPassword1"><b>Estimated Ammount</b></label>
                                <p class="border-bottom border-primary"> <?PHP echo $project_row['estimated_amunt'];?></p>
                                </div>
                            </div>
                            
                            <div class="col">
                                <div class="form-group">
                                <label for="exampleInputPassword1"><b>Approved Amount </b></label>
                                <p class="border-bottom border-primary">  <?PHP echo $project_row['approved_amount'];?></p>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                           <div class="col">
                                <div class="form-group">
                                <label for="exampleInputPassword1"><b>Status</b></label>
                                <p class="border-bottom border-primary"> <?PHP echo $project_row['status'];;?></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                <label for="exampleInputPassword1"><b>Admin remarks</b></label>
                                <p class="border-bottom border-primary"> <?PHP echo $project_row['admin_remarks'];?></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                <label for="exampleInputPassword1"><b>Central committee remarks</b></label>
                                <p class="border-bottom border-primary"> <?PHP echo $project_row['central_committee_remarks'];?></p>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">                        
                            <div class="col">
                                <div class="form-group">
                                <label for="exampleInputPassword1"><b>Project Description</b></label>
                                <p class="border-bottom border-primary">  <?PHP echo $project_row['project_description'];?>  </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                <label for="exampleInputPassword1"><b>Applicant Id</b></label>
                                <p class="border-bottom border-primary"><?PHP echo $project_row['id_number'];?></p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                <label for="exampleInputPassword1"><b>Applicant Name</b></label>
                                <p class="border-bottom border-primary"><?PHP echo $applicant_row['first_name']."".$applicant_row['last_name'];?></p>
                                </div>    
                            </div>
                            <div class="col">
                                <div class="form-group">
                                <label for="exampleInputPassword1"><b>Applicant Section</b></label>
                                <p class="border-bottom border-primary"><?PHP echo $applicant_row['section'];?></p>
                                </div>
                            </div>
                        </div>                       
                        <div class="row">                        
                            <div class="col">
                                <div class="form-group">
                                <label><b>Project File :</b><?PHP echo "<a href='assets/project_files/".$project_row['project_file']."' download>Download</a>"; ?></label>
                                <?PHP echo"<iframe src='assets/project_files/".$project_row['project_file']."' height='450' width='100%'></iframe>"; ?>
                                </div>
                            </div>
                        </div>

                    </div>
                    
            <!------------------------>
            </div>
        <!--=================================-->
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
      <!---------------------- Footer ------------------------->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          <span> &copy; Desgin and Developed by AITAM developers club  </span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
    </div>
    <!-------- End of Content Wrapper ---------------->
  </div>
<!--=============================== /Page Wrapper =================================--> 
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!--======================= Logout Modal================================-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>
<!--================================================================================-->
<script>

</script>
<!--================================================================================-->
  <!-- Bootstrap core JavaScript-->
  <script src="../assets/jquery/jquery.min.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--================================================================================-->
<script src="../assets/js/sb-admin-2.js"></script>
<!--================================================================================-->
<!--================================================================================-->
</body>
</html>
