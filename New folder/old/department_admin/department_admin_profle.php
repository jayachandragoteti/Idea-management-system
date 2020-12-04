<?PHP
  include "../db_connection.php";
  session_start();
  if(!isset($_SESSION['department_admin']))
  {header('location:index.php');}
  $user=$_SESSION['department_admin'];
  $sqll="SELECT * FROM `user_details` WHERE  `id_number` = '$user' ";
        $result = mysqli_query($connect,$sqll);
        $roww = mysqli_fetch_array($result);
        $user_branch=$roww['branch'];
        $error="";
        $msg="";
         
        if (isset($_POST['profile_update'])) {
           
            $name =  mysqli_real_escape_string($connect, $_POST['name']);// $_POST['name'];
            $phone = mysqli_real_escape_string($connect, $_POST['phone']);//$_POST['phone'];
            $email = mysqli_real_escape_string($connect, $_POST['email']);//$_POST['email'];

            $update_profile="UPDATE `user_details` SET `name`='$name',`phone`= '$phone',`email`= '$email' WHERE `id_number` = '$user'";
            $sqlupdate_update_profile= mysqli_query($connect,$update_profile);
            if ($sqlupdate_update_profile) {
                $msg="Profile Updated";
               // echo "<script>alert('Profile Updated')</script>";
              # echo "<script>window.location='stu_faculty_profile.php';</script>";
            }else{
                $error="Update Faild ";
             // echo "<script>alert('Update Faild ')</script>";
              # echo "<script>window.location=' stu_faculty_profile.php';</script>";
            }
       }

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
  <script src="../assets/js/sb-admin-2.js"></script>
  <!--================================================================================-->
  <!--================================================================================-->
  <!--================================================================================-->
  <style>
.form-group p{
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap; 
}
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
      <li class="nav-item ">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Proposals List</h6>
            <a class="collapse-item" href="department_admin_pending.php">Pending</a>
            <a class="collapse-item" href="department_admin_accepted.php">Accepted</a>
            <a class="collapse-item" href="department_admin_rejected.php">Rejected</a>
            
          </div>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="department_admin_profle.php">
          <i class="far fa-address-card"></i>
          <span>My Profile</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="department_admin_change_password.php">
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
                  <?php if($error !=""){?><strong> <div class="text-danger"><i class='far fa-times-circle' ></i> <?php echo htmlentities($error); ?>  </strong></div><?php } 
                        else if($msg !=""){?><strong><div class="text-success"><i class="far fa-check-circle" ></i> <?php echo htmlentities($msg); ?></strong> </div><?php }
                    ?>
               </div>
               <!------------------------>
               
               <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
                
                    <div class="container">
                    <h4 class="card-title"><b>Your Profile</b></h4>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for=""> <b>Name</b> <i class="far fa-edit"></i></label>
                            <input type="text" name="name" value="<?PHP echo $roww['name'];?>" id="" class="form-control border-bottom border-primary"style="border-style:none;" >                           
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for=""> <b>User name</b></label>
                             <div  class="form-control border-bottom border-primary" style="border-style:none;"><?PHP echo $roww['id_number'];?> </div>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <div class="form-group">
                            <label for=""> <b>Contact number</b> <i class="far fa-edit"></i></label>
                            <input type="text" name="phone" value="<?PHP echo $roww['phone'];?>"  id="" class="form-control border-bottom border-primary"style="border-style:none;" >
                          </div>
                        </div>
                        <div class="col">
                          <div class="form-group">
                            <label for=""> <b>Email</b> <i class="far fa-edit"></i></label>
                            <input type="text" name="email"value="<?PHP echo $roww['email'];?>" id="" class="form-control border-bottom border-primary"style="border-style:none;" >
                          </div>
                        </div>
                      </div>
                    <div class="row">
                      <div class="col">
                          <div class="form-group">
                            <label for=""> <b>Login type</b></label>
                              <div  class="form-control border-bottom border-primary" style="border-style:none;"><?PHP echo $roww['login_type'];?></div>
                          </div>
                      </div>
                      <div class="col">
                           <div class='form-group'>
                                <label for=''> <b>Branch</b></label>
                                <div  class='form-control border-bottom border-primary' style='border-style:none;'><?PHP echo $roww['branch'];?></div>
                            </div>
                      </div>
                    </div>
                    <input type="submit" name="profile_update" class="btn btn-primary" value='Update'>
                  </div>
                </form>
              
       
            <!------------------------>
            <br>
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