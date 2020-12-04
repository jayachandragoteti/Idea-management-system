<?PHP
include "db_connection.php";
session_start();
if (isset($_POST['proposal_submit'])) {

    $first_name=$_POST['fname'];
    $last_name=$_POST['lname'];
    $id_number=$_POST['idnumber'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
	$login_type=$_POST['login_type'];
	
    if ($_POST['login_type'] == "student") {
        $year=$_POST['year'];
        $branch=$_POST['branch'];
        $section=$_POST['section'];
       
    }else {
        $year=$_POST['login_type'];
        $branch=$_POST['branch_f'];
        $section=$_POST['login_type'];
    }

    $project_title=$_POST['project_title'];
    $estimated_ammount=$_POST['astimated_ammount'];
    $project_description=$_POST['project_description'];
    $status="PENDING AT YOUR DEPAETMENT";
    //-------------- Team --------------------
    /*---- 1 -----*/
    if ($_POST['team_member_name_1'] !="" && $_POST['team_member_id_1'] !="" && $_POST['branch_1'] !="" && $_POST['year_1'] !="") {
        $team_member_name_1=$_POST['team_member_name_1'];
        $team_member_id_1=$_POST['team_member_id_1'];
        $branch_1=$_POST['branch_1'];
        $year_1 =$_POST['year_1'];
	  }else {
        $team_member_name_1="";
        $team_member_id_1="";
        $branch_1="";
        $year_1="";
    }
    /*---- 1 -----*/
    if ($_POST['team_member_name_2'] !="" && $_POST['team_member_id_2'] !="" && $_POST['branch_2'] !="" && $_POST['year_2'] !="") {
      $team_member_name_2 =$_POST['team_member_name_2'];
      $team_member_id_2 =$_POST['team_member_id_2'];
      $branch_2=$_POST['branch_2'];
      $year_2 =$_POST['year_2'];
    }else {
        $team_member_name_2="";
        $team_member_id_2="";
        $branch_2="";
        $year_2="";
    }
    /*---- 3 -----*/
    if ($_POST['team_member_name_3'] !="" && $_POST['team_member_id_3'] !="" && $_POST['branch_3'] !="" && $_POST['year_3'] !="") {
		    $team_member_name_3=$_POST['team_member_name_3'];
        $team_member_id_3=$_POST['team_member_id_3'];
        $branch_3=$_POST['branch_3'];
        $year_3 =$_POST['year_3'];
	  }else {
        $team_member_name_3="";
        $team_member_id_3="";
        $branch_3="";
        $year_3="";
    }
    /*---- 4 -----*/
    if ($_POST['team_member_name_4'] !="" && $_POST['team_member_id_4'] !="" && $_POST['branch_4'] !="" && $_POST['year_4'] !="") {
		    $team_member_name_4=$_POST['team_member_name_4'];
        $team_member_id_4=$_POST['team_member_id_4'];
        $branch_4=$_POST['branch_4'];
        $year_4 =$_POST['year_4'];
	  }else {
        $team_member_name_4="";
        $team_member_id_4="";
        $branch_4="";
        $year_4="";
    }
    /*---- 5 -----*/
    if ($_POST['team_member_name_5'] !="" && $_POST['team_member_id_5'] !="" && $_POST['branch_5'] !="" && $_POST['year_5'] !="") {
		    $team_member_name_5=$_POST['team_member_name_5'];
        $team_member_id_5=$_POST['team_member_id_5'];
        $branch_5=$_POST['branch_5'];
        $year_5 =$_POST['year_5'];
	  }else {
        $team_member_name_5="";
        $team_member_id_5="";
        $branch_5="";
        $year_5="";
    }
    //------------ $proposal_id ----------
       //-------------------------------
       function password_generate($chars) 
       {
       $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
       return substr(str_shuffle($data), 0, $chars);
       }
        $R_str= password_generate(8); 
        $proposal_id="AIM0".$R_str;
    //------------ $proposal_id ----------
       //combine random digit to you file name to create new file name
       //use dot (.) to combile these two variable
       // name of the uploaded file
       $filename = $_FILES['myfile']['name'];
       // get the file extension
       $extension = pathinfo($filename, PATHINFO_EXTENSION);
       // destination of the file on the server & change file name
       $destination = 'assets/project_files/' . $proposal_id.".".$extension; 
       //change file name
       $modefide_file_name=$proposal_id.".".$extension;
       // the physical file on a temporary uploads directory on the server
       $file = $_FILES['myfile']['tmp_name'];
       $size = $_FILES['myfile']['size'];

    if ($first_name =='' && $last_name =='' && $id_number =='' && $phone =='' && $email =='' && $login_type =='' && $year =='' && $branch=='' && $section =='' && $filename =='') {
        echo "<script>alert('All fields must be filled.')</script>";

    }elseif(!in_array($extension, ['zip','pdf','docx'])){

        echo "<script>alert('You file extension must be 'zip','pdf','docx'')</script>";

    }elseif ($_FILES['myfile']['size'] > 2000000) {
        echo "<script>alert('File too large!')</script>";

    }elseif (move_uploaded_file($file, $destination)) {

        //------------------ Project --------------
            $project_details="INSERT INTO `project_proposals` (`id_number`,`branch`,`proposal_id`,`project_title`,`estimated_amunt`,`project_file`,`project_description`,`status`) VALUES ('$id_number','$branch','$proposal_id','$project_title','$estimated_ammount','$modefide_file_name','$project_description','$status')" ;
            $project_details_sql=mysqli_query($connect,  $project_details) or die(mysqli_error($connect));
            if ($project_details_sql) {
                $applicant_details="INSERT INTO `applicants_details`(`proposal_id`, `first_name`, `last_name`, `id_number`, `phone`, `email`, `student_or_faculty`, `beanch`, `year`, `section`) VALUES ('$proposal_id','$first_name','$last_name','$id_number','$phone','$email','$login_type','$branch','$year','$section')";
                $applicant_details_sql=mysqli_query($connect, $applicant_details)or die(mysqli_error($connect));
                  if ($applicant_details_sql) {
                        //--------------------- Team -------------------
                        /*---- 1 -----*/
                        if ($year_1 !="" && $branch_1 !="" && $team_member_id_1 !="" && $team_member_name_1 !="") {
                          $team_details="INSERT INTO `team_details`(`proposal_id`, `name`, `year`, `branch`, `id_number`) VALUES ('$proposal_id','$team_member_name_1','$year_1','$branch_1','$team_member_id_1')";
                          $team_details_sql=mysqli_query($connect,$team_details);
                        }
                        /*---- 2-----*/
                        if ($year_2 !="" && $branch_2 !="" && $team_member_id_2 !="" && $team_member_name_2 !="") {
                            $team_details="INSERT INTO `team_details`(`proposal_id`, `name`, `year`, `branch`, `id_number`) VALUES ('$proposal_id','$team_member_name_2','$year_2','$branch_2','$team_member_id_2')";
                            $team_details_sql=mysqli_query($connect,$team_details);
                        }
                        /*---- 3 -----*/
                        if($year_3 !="" && $branch_3 !="" && $team_member_id_3 !="" && $team_member_name_3 !=""){
                            $team_details="INSERT INTO `team_details`(`proposal_id`, `name`, `year`, `branch`, `id_number`) VALUES ('$proposal_id','$team_member_name_3','$year_3','$branch_3','$team_member_id_3')";
                            $team_details_sql=mysqli_query($connect,$team_details);
                        }
                        /*---- 4 -----*/
                        if($year_4 !="" && $branch_4 !="" && $team_member_id_4 !="" && $team_member_name_4 !=""){
                            $team_details="INSERT INTO `team_details`(`proposal_id`, `name`, `year`, `branch`, `id_number`) VALUES ('$proposal_id','$team_member_name_4','$year_4','$branch_4','$team_member_id_4')";
                            $team_details_sql=mysqli_query($connect,$team_details);
                        }
                        /*---- 5 -----*/
                        if($year_5 !="" && $branch_5 !="" && $team_member_id_5 !="" && $team_member_name_5 !=""){
                            $team_details="INSERT INTO `team_details`(`proposal_id`, `name`, `year`, `branch`, `id_number`) VALUES ('$proposal_id','$team_member_name_5','$year_5','$branch_5','$team_member_id_5')";
                            $team_details_sql=mysqli_query($connect,$team_details);
                        }
                      //--------------------- /Team -------------------
                      //--------------------- Mail -------------------  
                        if ($email !="") {              
                          $to1 = $email;
                          $subject1 = 'Response from AITAM innovation hub';
                          $from ='jayachandramohan2001.@gmail.com';
                          $message = " Hi ".$first_name." ".$last_name.", Propsal id : ".$proposal_id.".
                          your proposal is pending at department.";
                          $headers = "From:" . $from;
                            if (mail($to1, $subject1,$message,$headers)){
                                  echo "<script>alert('Request submitted successfully')</script>";
                                  echo "<script>window.location='index.html';</script>";
                            }else{
                                  echo "<script>alert(' response mail cannot be sent rejected by server,approach department')</script>";
                                  echo "<script>window.location='index.html';</script>";
                            }
                          }else {
                                  echo "<script>alert(' response mail cannot be sent rejected by server,approach department')</script>";
                                  echo "<script>window.location='index.html';</script>";
                          }
                      //--------------------- /Mail -------------------
                  } else {
                    $delete_p="DELETE FROM `project_proposals` WHERE `proposal_id` = '$proposal_id'";
                    $delete_p_sql=mysqli_query($connect, $delete_p);
                    unlink($file, $destination);
                    echo "<script>alert('request submission faild!(applicant Details)')</script>";
                  }
            } else {
              
              echo "<script>alert('request submission faild!')</script>";
            }
        }else {
          echo "<script>alert('request submission faild!')</script>";
        }
        //------------------ /Project --------------
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
  <link rel="shortcut icon" href="assets/images/logo.jpg" />
  <!--================================================================================-->
  <title>Welcome to Innovation Cell</title>
  <!--=============================== fonts ==========================================-->
  <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!--================================styles==========================================-->
  <link href="assets/css/sb-admin-2.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!--================================================================================-->
<style>
.title{
  display:flex;
  justify-content: center;
}
.title  tr th{
  padding:5%;
  font-size:small;
}
.add_member{
    border:2px solid #7F8C8D;
    padding: 15px;
}
.add_member input{
  padding: 15px;
}
.add_member h5{
     color: #23148C;
     font-size:small;

}
.add_member a {
    text-decoration: none;
    display: inline-block;
    padding: 4px 8px;
  }
  
  .add_member a:hover {
    background-color: #ddd;
    color: black;
  }
  
  .add_member .pre {
 float: left;
  }
  
  .add_member .add {
    float: right;
  }
  #Team_Details{
   
  }
</style>
</head>
<body style="background-image: linear-gradient(180deg, #2af598 0%, #009efd 100%);">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!----------------- login ------------------->
          <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" class="registration-form"   id="form" class="user" enctype="multipart/form-data">
            <div class="row sign-in">
            <div class="text-center" >
            <h6 class="font-weight-bold text-primary" style="margin:5% 0 0 5%;"><a href="index.html" class="btn btn-primary btn-circle btn">
                      <i class="fas fa-arrow-circle-left"></i>
                  </a> Back </h6>
            </div>

              <!--======Applicant Details======-->
              <div class="col" id="Applicant_Details" style="padding: 50px;">
                <div class="text-center">
                  <table class="title">
                    <tr>
                      <th style="color:#009efd;">Applicant Details</th>
                      <th>Team Details</th>
                      <th>Project Details</th>
                    </tr>
                  </table>
                </div>
                <div >
                  
                    <div class="form-group">
                      <input type="text" name="fname" id="fname" onkeyup="manage(this)" placeholder="First Name" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <input type="text" name="lname"id="lname" onkeyup="manage(this)" class="form-control" placeholder="Last Name"required>
                    </div>
                    <div class="form-group">
                      <input type="text" name="idnumber"id="idnumber" onkeyup="manage(this)" class="form-control"placeholder="Roll Number / Id Number"required/>
                
                    </div>
                    <div class="form-group">
                      <input type="text" name="phone"id="phone" onkeyup="manage(this)" class="form-control"placeholder="Phone"required/>
                
                    </div>
                    <div class="form-group">
                     <input type="email" name="email"id="email" onkeyup="manage(this)"  class="form-control"placeholder="Email"required/>
                    </div>
                    <div class="form-group"style="display: inline;">
                      <table style="margin-left: 50px;">
                        <tr>
                            <td><input type="radio" name="login_type" id="student" onkeyup="manage(this)" value="student"  class="form-control" style="padding-left:10px; width:15px;height:15px;"></td>
                            <td>Student</td><td>&nbsp &nbsp</td>
                            <td><input type="radio" name="login_type" id="faculty" onkeyup="manage(this)"value="faculty"  class="form-control"  style="padding-left:10px; width:15px;height:15px;"></td>
                            <td>Faculty</td>
                        </tr>
                    </table> 
                    </div>

                <div  id="fac_branch" style="display:none;">
                  <div class="form-group">
                    <select name='branch_f' id="branch_f" class="form-control" onkeyup="manage(this)">
                        <option selected value="">-------- Select Your Branch ------</option>
                        <option value="CSE">CSE</option>
                        <option value="ECE">ECE</option>
                        <option value="IT">IT</option>
                        <option value="EEE">EEE</option>
                        <option value="CIVIL">CIVIL</option>
                        <option value="MECH">MECH</option>
                        <option value="BS">BS</option>
                    </select>
                  </div>  
                </div>
                <div  id="student_branch_section" style="display:none;">
                  <div class="form-group">
                    <select name='branch' id="branch_s" onChange="manage(this)" class="form-control" >
                        <option selected value="">-------- Select Your Branch ------</option>
                        <option value="CSE">CSE</option>
                        <option value="ECE">ECE</option>
                        <option value="IT">IT</option>
                        <option value="EEE">EEE</option>
                        <option value="CIVIL">CIVIL</option>
                        <option value="MECH">MECH</option>
                    </select>
                  </div>
                    <div class="form-group">
                    <select name='year' id="year" class="form-control" onkeyup="manage(this)">
                        <option selected value="">-------- Select Year ------</option>
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">3rd</option>
                        <option value="4">4th</option>
                    </select>
                  </div>
                    <div class="form-group">
                    <select name='section' id="section" class="form-control" onkeyup="manage(this)">
                        <option selected value="">-------- Select Section ------</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                       
                    </select>
                  </div>
                </div>
                <input type="button" name="next"  id="applicant_next_1" class="btn btn-primary" style="float:right;" value="Next" disabled/>
                </div>
              </div>
            </div>
              <!--======/Applicant Details======-->
              <!--======Team Details======-->
              <div class="col" id="Team_Details" style="display: none; padding: 50px;">
                <div class="text-center">
                  <table class="title">
                    <tr>
                      <th >Applicant Details</th>
                      <th style="color:#009efd;">Team Details</th>
                      <th>Project Details</th>
                    </tr>
                  </table>
                </div>
                <div >
                  <div   id="team_member_1" class="add_member">
                    <h5>Member-1</h5>
                  <div class="form-group">  
                    <input type="text" name="team_member_name_1" class="form-control" id="card-number" placeholder="Full Name">
                  </div>    
                    <div class="form-group">  
                    <input type="text" name="team_member_id_1" class="form-control" id="card-number" placeholder="Team Member Id Number">
                  </div>    
                    <div class="form-group">      
                    <select name="branch_1" id="card-type" class="form-control">
                        <option value="" disabled selected>Select Your Branch</option>
                        <option value="CSE">CSE</option>
                        <option value="ECE">ECE</option>
                        <option value="IT">IT</option>
                        <option value="EEE">EEE</option>
                        <option value="MECH">MECH</option>
                        <option value="CIVIL">CIVIL</option>
                        <option value="BS">BS</option>
                    </select>
                  </div>    
                  <div class="form-group">  
                    <select name="year_1" id="card-type" class="form-control">
                        <option value="" disabled selected>Select Year</option>
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">3rd</option>
                        <option value="4">4th</option>
                    </select>
                  </div>  

                    <br><br>
                    <a href="#" class="btn btn-info add" id="add_1">Add Member &raquo;</a><br><br>
                </div>
                <!-------------------------->
                <div  style="display:none;" id="team_member_2" class="add_member">
                    <h5>Member-2</h5>
                    <div class="form-group">  
                    <input type="text" name="team_member_name_2" class="form-control" id="card-number" placeholder="Full Name">
                  </div>    
                    <div class="form-group">  
                    <input type="text" name="team_member_id_2" class="form-control" id="card-number" placeholder="Team Member Id Number">
                  </div>    
                    <div class="form-group">      
                    <select name="branch_2" id="card-type" class="form-control">
                        <option value="" disabled selected>Select Your Branch</option>
                        <option value="CSE">CSE</option>
                        <option value="ECE">ECE</option>
                        <option value="IT">IT</option>
                        <option value="EEE">EEE</option>
                        <option value="MECH">MECH</option>
                        <option value="CIVIL">CIVIL</option>
                        <option value="BS">BS</option>
                    </select>
                  </div>    
                  <div class="form-group">  
                    <select name="year_2" id="card-type" class="form-control">
                        <option value="" disabled selected>Select Year</option>
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">3rd</option>
                        <option value="4">4th</option>
                    </select>
                  </div>      
                    <br><br>
                        <a href="#" class="btn btn-secondary" id="pre_1">&laquo; Previous</a>
                        <a href="#" class="btn btn-info add" id="add_2">Add Member &raquo;</a>
                    <br><br>
                </div>
                <!-------------------------->
                <div  style="display:none;" id="team_member_3" class="add_member">
                    <h5>Member-3</h5>
                  <div class="form-group">  
                    <input type="text" name="team_member_name_3" class="form-control" id="card-number" placeholder="Full Name">
                  </div>  
                  <div class="form-group">
                    <input type="text" name="team_member_id_3" class="form-control" id="card-number" placeholder="Team Member Id Number">
                  </div>
                    <div class="form-group">
                    <select name="branch_3" id="card-type" class="form-control">
                        <option value="" disabled selected>Select Your Branch</option>
                        <option value="CSE">CSE</option>
                        <option value="ECE">ECE</option>
                        <option value="IT">IT</option>
                        <option value="EEE">EEE</option>
                        <option value="MECH">MECH</option>
                        <option value="CIVIL">CIVIL</option>
                        <option value="BS">BS</option>
                    </select>
                    </div>
                  <div class="form-group">
                    <select name="year_3" id="card-type" class="form-control">
                        <option value="" disabled selected>Select Year</option>
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">3rd</option>
                        <option value="4">4th</option>
                    </select>
                  </div>  
                    <br><br>  
                       <a href="#" class="btn btn-secondary" id="pre_2">&laquo; Previous</a>
                        <a href="#" class="btn btn-info add" id="add_3">Add Member &raquo;</a>
                    <br><br>
                </div>
                <!-------------------------->
                <div  style="display:none;" id="team_member_4" class="add_member">
                    <h5>Member-4</h5>
                  <div class="form-group">
                    <input type="text" name="team_member_name_4" class="form-control" id="card-number" placeholder="Full Name">
                  </div>
                  <div class="form-group">
                    <input type="text" name="team_member_id_4"class="form-control" id="card-number" placeholder="Team Member Id Number">
                  </div>
                  <div class="form-group">
                    <select name="branch_4" id="card-type" class="form-control">
                        <option value="" disabled selected>Select Your Branch</option>
                        <option value="CSE">CSE</option>
                        <option value="ECE">ECE</option>
                        <option value="IT">IT</option>
                        <option value="EEE">EEE</option>
                        <option value="MECH">MECH</option>
                        <option value="CIVIL">CIVIL</option>
                        <option value="BS">BS</option>
                    </select>
                  </div>
                  <div class="form-group">  
                    <select name="year_4" id="card-type" class="form-control">
                        <option value="" disabled selected>Select Year</option>
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">3rd</option>
                        <option value="4">4th</option>
                    </select>
                  </div>
                    <br><br>  
                    <a href="#" class="btn btn-secondary" id="pre_3">&laquo; Previous</a>
                     <a href="#" class="btn btn-info add" id="add_4">Add Member &raquo;</a>
                 <br><br>
                </div>
                <!-------------------------->
                <div style="display:none;" id="team_member_5" class="add_member">
                    <h5>Member-5</h5>
                  <div class="form-group">
                    <input type="text" name="team_member_name_5" class="form-control" id="card-number" placeholder="Full Name">
                  </div>
                  <div class="form-group">
                    <input type="text" name="team_member_id_5" class="form-control" id="card-number" placeholder="Team Member Id Number">
                  </div> 
                  <div class="form-group">
                    <select name="branch_5" id="card-type" class="form-control">
                        <option value="" disabled selected>Select Your Branch</option>
                        <option value="CSE">CSE</option>
                        <option value="ECE">ECE</option>
                        <option value="IT">IT</option>
                        <option value="EEE">EEE</option>
                        <option value="MECH">MECH</option>
                        <option value="CIVIL">CIVIL</option>
                        <option value="BS">BS</option>
                    </select>
                  </div> 
                  <div class="form-group">
                    <select name="year_5" id="card-type" class="form-control" >
                        <option value="" disabled selected>Select Year</option>
                        <option value="1">1st</option>
                        <option value="2">2nd</option>
                        <option value="3">3rd</option>
                        <option value="4">4th</option>
                    </select>
                  </div>  
                    <br><br>  
                       <a href="#" class="btn btn-info" id="pre_4">&laquo; Previous</a>
                    <br><br>
                </div>
                <!-------------------------->
                <br>
                <input type="button" name="previous" id="previous_1" class="btn btn-secondary" value="Previous"/>
                <input type="button" name="next"  id="applicant_next_2"class="btn btn-primary" style="float:right;" value="Next"/>

                </div>
              </div>
              </div>
              <!--======/Team Details======-->
                <!--======Project Details======-->
                <div class="col" id="Project_Details" style="padding: 50px;display: none;" >
                  <div class="text-center">
                    <table class="title">
                      <tr>
                        <th>Applicant Details</th>
                        <th>Team Details</th>
                        <th style="color:#009efd;">Project Details</th>
                      </tr>
                    </table>
                  </div>
                  <div style="">
                    
                      <div class="form-group">
                        <input type="text" name="project_title" id="project_title"onkeyup="manage(this)"placeholder="Project Title" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <input type="number" name="astimated_ammount" id="astimated_ammount" onkeyup="manage(this)"placeholder="Estimated Ammount" class="form-control"required>
                      </div>
                      <div class="form-group">
                        <input  type="file" name="myfile" id="project_file"onkeyup="manage(this)" class="form-control" required/>
                  
                      </div>
                      <div class="form-group">
                        <textarea name="project_description" id="project_description"onkeyup="manage(this)"class="form-control" placeholder="Project Description" required></textarea>

                      </div>
                      <input type="button" name="previous" id="previous_2" class="btn btn-secondary" value="Previous"/>
                      <input type="submit" name="proposal_submit" id="applicant_next_3" class="btn btn-primary " style="float:right;" value="Submit" />
                  <br>
                  </div>
                    </div>
                </div>
              </div>
                <!--======/Project Details======-->
            </div>
          </form>
            <!----------------- /login ------------------->
                     
          </div>
        </div>
      </div>
    </div>
  </div>
 <!--================================================================================-->
 <script>
  //---------------------------
  function manage() {
          //---------------------------
          var bt_1 = document.getElementById('applicant_next_1');
          var bt_3 = document.getElementById('applicant_next_3');
          //---------------------------
          if (fname.value != '' && lname.value != ''&& idnumber.value != ''&& phone.value != '' && email.value != '') {
              bt_1.disabled = false;
              /*if (branch_f.value != '') {
                  bt_1.disabled = false;
              }else if ( branch_s.value != '' ) {
                bt_1.disabled = false;
              } else {
                bt_1.disabled = true;
              }*/
          }
          else {
              bt_1.disabled = true;
          }
          //---------------------------
          if (project_title.value != '' && astimated_ammount.value != ''&& project_description.value != '') {
              bt_3.disabled = false;
          }
          else {
              bt_3.disabled = true;
          }
          //---------------------------
  }
  //---------------------------
  $(document).ready(function(){
    //---------------------------
       $("#applicant_next_1").click(function(){
          $("#Team_Details").show();
          $("#Applicant_Details,#Project_Details").hide();
                  
         });
         $("#applicant_next_2").click(function(){
          $("#Project_Details").show();
          $("#Applicant_Details,#Team_Details").hide();
         });

         $("#previous_1").click(function(){
          $("#Applicant_Details").show();
          $("#Team_Details,#Project_Details").hide();
                  
         });
         $("#previous_2").click(function(){
          $("#Team_Details").show();
          $("#Applicant_Details,#Project_Details").hide();
                  
         });
      //---------------------------
      //---------------------------
         $("#student").click(function(){
          $("#student_branch_section").show();
          $("#fac_branch").hide();
                  
         });
         $("#faculty").click(function(){
              $("#student_branch_section").hide();
              $("#fac_branch").show();  
         });
      //---------------------------
         //------- next ---------
          $("#add_1").click(function(){
              $("#team_member_2").show();
              $("#team_member_1,#team_member_3,#team_member_4,#team_member_5").hide();
                      
          });
          $("#add_2").click(function(){
              $("#team_member_3").show();
              $("#team_member_1,#team_member_2,#team_member_4,#team_member_5").hide();
                      
          });
          $("#add_3").click(function(){
              $("#team_member_4").show();
              $("#team_member_1,#team_member_2,#team_member_3,#team_member_5").hide();
                      
          });
          $("#add_4").click(function(){
              $("#team_member_5").show();
              $("#team_member_1,#team_member_2,#team_member_3,#team_member_4").hide();
                      
          });
          //------- Pre -----------
          $("#pre_1").click(function(){
                  $("#team_member_2,#team_member_3,#team_member_4,#team_member_5").hide();
                  $("#team_member_1").show();  
          });
          $("#pre_2").click(function(){
                  $("#team_member_1,#team_member_3,#team_member_4,#team_member_5").hide();
                  $("#team_member_2").show();  
          });
          $("#pre_3").click(function(){
                  $("#team_member_1,#team_member_2,#team_member_4,#team_member_5").hide();
                  $("#team_member_3").show();  
          });
          $("#pre_4").click(function(){
                  $("#team_member_1,#team_member_2,#team_member_3,#team_member_5").hide();
                  $("#team_member_4").show();  
          });
      //---------------------------   
  });
  //---------------------------    
  </script>
  
<!--================================================================================-->
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<!--================================================================================-->
<script src="assets/jquery/jquery.min.js"></script>
<!--================================================================================-->
<script src="assets/js/sb-admin-2.js"></script>
<!--================================================================================-->
</body>
</html>
