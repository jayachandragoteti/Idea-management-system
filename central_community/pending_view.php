<?PHP 
include "../db_connection.php";
session_start();
if(!isset($_SESSION['central_community']))
{header('location:../logout.php');}
$username=$_SESSION['central_community'];
$user="SELECT * FROM `user` WHERE `username`='$username'";
$user_sql=mysqli_query($connect,$user);
$user_row=mysqli_fetch_array($user_sql);
$branch=$user_row['branch'];

if(!isset($_GET['k'])){
    $Proposal_Id =$_SESSION['proposal_Id'];         
  }else{
    $Proposal_Id = $_SESSION['proposal_Id'] = $_GET['k'];
  }
$project="SELECT * FROM `project_proposals` WHERE `proposal_id`='$Proposal_Id'";
$project_sql=mysqli_query($connect,$project);
$project_row=mysqli_fetch_array($project_sql);
$applicant="SELECT * FROM `applicant_details` WHERE `proposal_id`='$Proposal_Id'";
$applicant_sql=mysqli_query($connect,$applicant);
$applicant_row=mysqli_fetch_array($applicant_sql);

if (isset($_POST['Accept'])) {
    $accept_remarks=$_POST['accept_Remarks'];
    $approved_amount=$_POST['approved_amount'];
    $accept_status="Project is approved for funding.";
    
    $accept_query="UPDATE `project_proposals` SET `status`='$accept_status',`central_remarks`='$accept_remarks',`approved_amount`='$approved_amount' WHERE `proposal_id`='$Proposal_Id'";
    if($accept_sql= mysqli_query($connect,$accept_query)){
        $_SESSION['download_pdf'] = $Proposal_Id;

              if ($applicant_row['email'] !="") {
                
                        $to1 = $applicant_row['email'];
                        $subject1 = 'Response from AITAM innovation hub';
                        $from ='jayachandramohan2001.@gmail.com';
                        $message = " Hi ".$applicant_name.", your propsal id : ".$Proposal_Id." is ".$accept_status.", and approvied ammount is ".$approved_amount."";
                        $headers = "From:" . $from;

                            if (mail($to1, $subject1,$message,$headers)){
                                echo "<script>alert('Proposal Accepted')</script>";
                                echo "<script>window.location='download_pdf.php';</script>";
                               // echo "<script>window.location='pending.php';</script>";
                            }else{
                                echo "<script>alert('mail cannot be sent rejected by server,Inform to applicant')</script>";
                                echo "<script>window.location='download_pdf.php';</script>";
                                //echo "<script>window.location='pending.php';</script>";
                            }
                            //
              }else {
                echo "<script>alert('mail cannot be sent rejected by server,Inform to applicant')</script>";
                echo "<scriptwindow.open('download_pdf.php','_blank');</script>";
                //echo "<script>window.location='pending.php';</script>";
              }                
        }else{
            //$error="Proposal approval falid try again";
          echo "<script>alert('Proposal approval falid try again')</script>";
        }

  }elseif (isset($_POST['Reject'])) {

  $reject_Reject_remarks=$_POST['Reject_Remarks'];
  $reject_status="Rejected at central committee.";
  
  $reject_query="UPDATE `project_proposals` SET `status`='$reject_status',`central_remarks`='$reject_Reject_remarks' WHERE `proposal_id`='$Proposal_Id'";

  if($rejecy_sql= mysqli_query($connect,$reject_query)){

        if ($applicant_row['email'] !=""){     
          $to1 = $applicant_row['email'];
          $subject1 = 'Response from AITAM innovation hub';
          $from ='jayachandramohan2001.@gmail.com';
          $message = " Hi ".$applicant_name.", your propsal id : ".$Proposal_Id." is ".$reject_status." ";
          $headers = "From:" . $from;

                  if (mail($to1, $subject1,$message,$headers)){
                      echo "<script>alert('Proposal Rejected')</script>";
                      echo "<script>window.location='pending.php';</script>";
                    }else{
                      echo "<script>alert('mail cannot be sent rejected by server,Inform to applicant')</script>";
                      echo "<script>window.location='pending.php';</script>";
                    }
          }else{
            echo "<script>alert('mail cannot be sent rejected by server,Inform to applicant')</script>";
            echo "<script>window.location='pending.php';</script>";
          }  
    }else{
      $error="Proposal rejection falid try again";
      echo "<script>alert(' falid try again')</script>";
  }
}else {

}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- shortcut icon-->
    <link rel="shortcut icon" href="../assets/images/logo.jpg" />
    <title>Idea Management</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="../assets/css/dashboard_style.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <img src="../assets/images/logo.jpg" width="50" height="50">
                </div>
                <div class="sidebar-brand-text mx-3">Idea Management</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!--<li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu</h6>
                        <a class="collapse-item" href="#">Pending</a>
                        <a class="collapse-item" href="#">Accepted</a>
                        <a class="collapse-item" href="#">Rejected</a>
                    </div>
                </div>
            </li>-->
            <!-- Heading -->
            <div class="sidebar-heading">
                Project Requests
            </div>
            <li class="nav-item"  id="pending">
                <a class="nav-link" href="pending.php">
                    <i class="fas fa-exclamation-triangle"></i>
                    <span>Pending</span></a>
            </li>
            <li class="nav-item" id="accepted">
                <a class="nav-link" href="accepted.php">
                    <i class="fas fa-check"></i>
                    <span>Accepted</span></a>
            </li>
            <li class="nav-item" id="rejected">
                <a class="nav-link" href="rejected.php">
                    <i class="fas fa-trash"></i>
                    <span>Rejected</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Profile -->
            <li class="nav-item " id="my_profile"> 
                <a class="nav-link" href="my_profile.php">
                    <i class="far fa-address-card"></i>
                    <span>My Profile</span></a>
            </li>
            <li class="nav-item" id="change_password">
                <a class="nav-link" href="change_password.php">
                    <i class="fas fa-key"></i>
                    <span>Change Password</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">

                        </li>

                        <!-- Nav Item - Alerts -->

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">User</span>
                                <img class="img-profile rounded-circle" src="../assets/images/logo.jpg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="my_profile.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i> Profile
                                </a>
                                <a class="dropdown-item" href="change_password.php" >
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Change Password
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"></h1>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                                <a href="pending.php" class="btn btn-primary btn-circle btn">
                                    <i class="fas fa-arrow-circle-left"></i>
                                </a> Back to Pending Requests
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        <div class="col-sm">
                                            <label><B>Project Id</B></label>
                                            <p class="border-bottom border-primary">
                                                <?PHP echo $Proposal_Id;?>
                                            </p>
                                        </div>
                                        <div class="col-sm">
                                            <label><B>Project Title</B></label>
                                            <p class="border-bottom border-primary">
                                                <?PHP echo $project_row['project_title'];?>
                                            </p>
                                        </div>
                                        <div class="col-sm">
                                            <label><B>Estimated Amount</B></label>
                                            <p class="border-bottom border-primary">
                                                <?PHP echo $project_row['estimated_amount'];?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <label><B>Project Description</B></label>
                                            <p class="border-bottom border-primary">
                                                <?PHP echo $project_row['project_description'];?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                            <label><B>Applicant Name</B></label>
                                            <p class="border-bottom border-primary">
                                                <?PHP echo $applicant_row['first_name']." ".$applicant_row['last_name'];?>
                                            </p>
                                        </div>
                                        <div class="col-sm">
                                            <label><B>Applicant Contact Number</B></label>
                                            <p class="border-bottom border-primary">
                                                <?PHP echo $applicant_row['contact_number'];?>
                                            </p>
                                        </div>
                                        <div class="col-sm">
                                            <label><B>Applicant Email</B></label>
                                            <p class="border-bottom border-primary">
                                                <?PHP echo $applicant_row['email'];?>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                            <label><B>Applicant Branch</B></label>
                                            <p class="border-bottom border-primary">
                                                <?PHP echo $applicant_row['branch'];?>
                                            </p>
                                        </div>
                                        <?PHP 
                                            if($applicant_row['applicant_type']=='Student'){ ?>
                                                <div class="col-sm">
                                                    <label><B>Applicant Year</B></label>
                                                    <p class="border-bottom border-primary">
                                                        <?PHP echo $applicant_row['year'];?>
                                                    </p>
                                                </div>
                                                <div class="col-sm">
                                                    <label><B>Applicant Section</B></label>
                                                    <p class="border-bottom border-primary">
                                                        <?PHP echo $applicant_row['section'];?>
                                                    </p>
                                                </div>
                                       <?PHP } ?>
                                       
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                                <label><B>Team Details</B></label>
                                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                                    <thead>
                                                        <tr role="row">
                                                            <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 58px;">Sno</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 61px;">Name</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 67px;">Id Number</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 50px;">Branch</th>
                                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 31px;">Year</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?PHP 
                                                        $team="SELECT * FROM `team_details` WHERE `proposal_id`='$Proposal_Id'";
                                                        $team_sql=mysqli_query($connect,$team);
                                                        $j=1;
                                                        while($team_row=mysqli_fetch_array($team_sql)){ ?>
                                                        <tr role="row" class="even">
                                                            <td class="sorting_1"><?PHP echo $j;?></td>
                                                            <td><?PHP echo $team_row['name'];?></td>
                                                            <td><?PHP echo $team_row['id_number'];?></td>
                                                            <td><?PHP echo $team_row['branch'];?></td>
                                                            <td><?PHP echo $team_row['year'];?></td>

                                                        </tr>
                                                        <?PHP $j++; } ?>
                                                    </tbody>
                                                </table>   
                                            </div>   
                                        </div>
                                        <div class="row">                        
                                            <div class="col-sm">
                                                <div class="form-group">
                                                    <label><b>Project File : </b><?PHP echo "<a href='../assets/project_files/".$project_row['priject_file']."' download> Download</a>"; ?></label>
                                                                <!-- Button trigger modal --> <br>
                                                    <a href="#" class="btn btn-primary btn-circle btn-sm" data-toggle="modal" data-target="#exampleModalLong">View</a> 
                                                </div>

                                                <!-- Project File View Modal -->
                                                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Project File</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        <div class="form-group">
                                                            <?PHP echo"<iframe src='../assets/project_files/".$project_row['priject_file']."' height='450' width='100%'></iframe>"; ?>
                                                        </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>   
                                                <!-- //Project File View Modal -->  
                                            </div>
                                            <div class="col-sm">
                                                <button id="accept_a" class="btn btn-success   btn-sm"  data-toggle="modal" data-target="#accepts_Modal"> <i class="fas fa-check">  Accept</i></button>
                                            </div>
                                            <div class="col-sm">
                                                <button id="reject_r" class="btn btn-danger  btn-sm" data-toggle="modal" data-target="#Reject_Modal"><i class="fas fa-trash"> Reject</i></button>
                                            </div>
                                    </div>
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Degine and developed by <a href="http://sac.aitam.com/">AITAM SAC</a></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
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
    <!-- accepts Modal -->
    <div class="modal fade" id="accepts_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Accept</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" class="form-inline">
                    <div class="modal-body">
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text"  name="accept_Remarks" class="form-control" id="" placeholder="Remarks">
                        </div>
                        <div class="col-sm">
                            <input type="number" id="approved_amount" name="approved_amount" class="form-control mb-2" id="" placeholder="Approved amount" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" style="margin-top:8px"; name="Accept" class="btn btn-success mb-2" value='Accept'>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /accepts Modal -->
    <!-- Reject Modal -->
    <div class="modal fade" id="Reject_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reject</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" class="form-inline">
                    <div class="modal-body">
                        <div class="form-group mx-sm-3 mb-2">
                            <input type="text" name="Reject_Remarks" class="form-control" id="" placeholder="Remarks" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit"  style="margin-top:8px"; name="Reject" class="btn btn-danger mb-2" value='Reject'>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Reject Modal -->
 
    <!--  core JavaScript & Jquery-->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/other_scripts.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../assets/js/dashboard_js.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>

</html>