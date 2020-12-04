<?PHP
  include "db_connection.php";
  session_start();
  if(!isset($_SESSION['user_name']))
  {header('location:index.php');}
  $user=$_SESSION['user_name'];
  $sql="SELECT * FROM `user_details` WHERE  `id_number` = '$user' ";
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!--===========================================================================-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--===========================================================================-->
    <link rel="shortcut icon" href="assets/images/logo.jpg" />
    <!--===========================================================================-->
    <title>Dashboard</title>
    <!--===========================================================================-->
    <link rel="stylesheet" href="assets/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/iconfonts/ionicons/css/ionicons.css">
    <link rel="stylesheet" href="assets/iconfonts/typicons/src/font/typicons.css">
    <link rel="stylesheet" href="assets/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/iconfonts/font-awesome/css/font-awesome.min.css" />
    <!--===========================================================================-->
    <link rel="stylesheet" href="assets/css/shared/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--===========================================================================-->
    <link rel="stylesheet" href="assets/css/demo_1/style.css">
    <script src="assets/js/jquery.min.js"></script>
    <!--===========================================================================-->
<style>
.active{
  background-color:#1A2980;
}
</style>
  </head>
  <body>
    <div class="container-scroller" >
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="assets/images/aitam.png" alt="logo" style="height: 50px;" /> </a>
          <a class="navbar-brand brand-logo-mini" href="index.html">
            <img src="assets/images/logo.jpg" alt="logo" style="width:50px;height: 50px;" alt="logo" /> </a>
        </div>
          <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
              <a  href="logout.php" class="nav-link count-indicator" >
                Sign Out &nbsp<i class="fa fa-sign-out" style="font-size:15px;"></i>
              </a>
            </li>
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="assets/images/profile.png" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="assets/images/profile.png" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold"><?PHP echo $row['name'];?></p>
                  <p class="mb-1 mt-3 font-weight-semibold"><?PHP echo $row['id_number'];?></p>
                  <p class="font-weight-light text-muted mb-0"><?PHP echo $row['login_type'];?></p>
                  <p class="font-weight-light text-muted mb-0"><?PHP echo $row['email'];?></p>
                </div>
                <a  href="logout.php" class="dropdown-item">Sign Out &nbsp<i class="fa fa-sign-out" style="font-size:15px;"></i></a>

              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="assets/images/profile.png" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?PHP echo $_SESSION['user_name'];?></p>
                  <p class="designation"><?PHP echo $row['login_type'];?></p>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">Menu</li>
            <li class="nav-item active" id="Dashboard">
              <a class="nav-link " href="#">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item " id="Project_Proposal">
              <a class="nav-link " href="#">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Project Proposal</span>
              </a>
            </li>
            <li class="nav-item " id="Profile">
              <a class="nav-link " href="#">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Profile</span>
              </a>
            </li>
            <li class="nav-item " id="change_pass">
              <a class="nav-link " href="#">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Change Password</span>
              </a>
            </li>
          </ul>
        </nav>
        <!--===========================================================================-->
        <!-- partial -->
        <div class="main-panel" >
          <div class="content-wrapper"> 
            <section id="main_section" >

            <div class="col-lg-12 grid-margin stretch-card" id="main_dashboard">
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title">Your Proposals</h1>
                    
                      <div class="form-group" style="width:45%;float:right;">
                        <input type="search" id="search"class="form-control" placeholder="Search Here">
                        <script>
                              $(document).ready(function(){
                                //---------------------------------------
                                $("#search").on("keyup", function() {
                                  var value = $(this).val().toLowerCase();
                                  $("#myTable tr").filter(function() {
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                  });
                                });
                              //----------------------------------------
                              });
                        </script>
                      </div>
                    
                      <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead  class="thead-light">
                                  <tr>
                                    <th scope="col">Proposal ID</th>
                                    <th scope="col">Projec Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">View Details</th>
                                  </tr>
                                </thead>
                                <tbody id="myTable">
                                <?PHP 
                                  $sql="SELECT * FROM `project_proposals` WHERE  `id_number` = '$user' ORDER BY `sno` DESC ";
                                  $result = mysqli_query($connect,$sql);
                                  
                                     while($row = mysqli_fetch_array($result)){
                                      echo "<tr><td>".$row['proposal_id']."</td><td>".$row['project_title']."</td><td>".$row['status']."</td>
                                          <td>
                                            view
                                         </td>
                                       </tr>";
                                    
                                    
                                    }
                                
                                  
                                ?>

                
                            </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>
<!--===========================================================================-->     
<!---------------- view data-------------->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Your Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
              <div class="card-body">
                  <div class="form-group" >
                    <label for="project_title"><b>Name</b></label>
                    <p><?PHP echo $row['name'];?></p>
                  </div>
                  <div class="form-group">
                    <label for="project_title"> <b>User Name </b></label>
                    <p><?PHP echo $row['id_number'];?></p>
                  </div>
                  <div class="form-group">
                    <label for="project_title"> <b>Phone </b></label>
                    <p><?PHP echo $row['phone'];?></p>
                  </div>
                  <div class="form-group">
                    <label for="project_title"><b>Email </b></label>
                    <p><?PHP echo $row['email'];?></p>
                  </div>
                  <div class="form-group">
                    <label for="project_title"><b>Login Type</b></label>
                    <p><?PHP echo $row['login_type'];?></p>
                  </div>
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>         
<!--===========================================================================-->
              </section>
          </div>
          <!-- content-wrapper ends -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">
                Design and developed by <a href="#" >AITAM</a> Web developers club.
              </span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                <a href="#" >AITAM SAC</a> 
              </span>
            </div>
          </footer>
          <!-------------------/ partial --------------------------------------->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
<!--===========================================================================-->
<script>
$(document).ready(function(){
  //--------------------------
  $("#Dashboard").click(function()
  {
    $.ajax({
      url: "pages/stu_faculty_dashboard.php",
      success: function(result)
      {
          $("#main_section").html(result);
         // final=result;
          $("#Dashboard").addClass("active");
          $("#Project_Proposal,#Profile,#change_pass").removeClass("active");
      }
    });
      if (final == code2) {
        
      } else {
        //$("#main_section").html(result);
        code2 = final;
      }

  });
  //--------------------------
  $("#Project_Proposal").click(function()
  {
    $.ajax({
      url: "pages/stu_faculty_poposal.php",
      success: function(result)
      {
          $("#main_section").html(result);
          $("#Project_Proposal").addClass("active");
          $("#Dashboard,#Profile,#change_pass").removeClass("active");
      }
    });
  });
  //--------------------------
  $("#Profile").click(function()
  {
    $.ajax({
      url: "pages/stu_faculty_profile.php",
      success: function(result)
      {
          $("#main_section").html(result);
          $("#Profile").addClass("active");
          $("#Project_Proposal,#Dashboard,#change_pass").removeClass("active");
      }
    });
  });
  //--------------------------
    //--------------------------
    $("#change_pass").click(function()
  {
    $.ajax({
      url: "pages/stu_faculty_change_password.php",
      success: function(result)
      {
          $("#main_section").html(result);
          $("#change_pass").addClass("active");
          $("#Project_Proposal,#Dashboard,#Profile").removeClass("active");
      }
    });
  });
  //--------------------------
});
</script>
<!--===========================================================================-->
<!--<script src="assets/js/vendor.bundle.base.js"></script>
    <script src="assets/js/vendor.bundle.addons.js"></script>--->
    <script src="assets/js/shared/off-canvas.js"></script>
    <script src="assets/js/bootstrap.min.js" ></script>
<!--===========================================================================-->
  </body>
</html>