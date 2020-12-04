<?PHP 
include "db_connection.php";
session_start();
$msg="";
$error="";
if (isset($_POST['login_submit'])) {

            $user_name = $_POST['user_name'];
            $password = $_POST['user_pass'];
            #echo $user_name;
            #echo $password;
            $sql="SELECT *  FROM `user_details` WHERE  `id_number` = '$user_name' AND `password` = '$password'";
            $result = mysqli_query($connect,$sql);
            $row = mysqli_fetch_array($result);

            if ($row){
                    if (0) {
                        //$row['login_type'] == "student" || $row['login_type'] == "faculty"
                        $_SESSION['user_name'] = $user_name;
                        $_SESSION['student_faculty'] = $row['login_type'];

                        $msg="successfully logged in";

                        echo "<script>alert('successfully logged in.')</script>";
                        echo "<script>window.location='student_faculty/stu_faculty_main_dashboard.php';</script>";
                        # header('location:stu_faculty_dashboard.php');

                    } elseif ($row['login_type']=="department_admin") {
                        $_SESSION['department_admin']=$user_name;
                        $_SESSION['login_type']=$row['login_type'];       

                        echo "<script>alert('successfully logged in.')</script>";
                        echo "<script>window.location='department_admin/department_admin_pending.php';</script>";

                    } elseif ($row['login_type']=="central_committee") {

                        $_SESSION['central_committee']=$user_name;
                        $_SESSION['login_type']=$row['login_type'];

                        echo "<script>alert('successfully logged in.')</script>";
                        echo "<script>window.location='central_committee/central_committee_pending.php';</script>";

                    }else {

                        $error="Login faild Try again ";
                       // echo "<script>alert('Login faild Try again')</script>";
                        //echo "<script>window.location='index.php';</script>";
                        
                    }
            } else {

                $error="Login faild , Password is incorrect ,Try again..";
                //echo "<script>alert('Login faild Try again ')</script>";
               // echo "<script>window.location='index.php';</script>";
            }

}elseif(isset($_POST['forgotpass_submit'])){

    $_SESSION['user'] = $user = $_POST['user_name'];
    $sql="SELECT * FROM `user_details` WHERE  `id_number` = '$user' ";
    $result = mysqli_query($connect,$sql);
    $row = mysqli_fetch_array($result);
    $email=$row['email'];

    $code="AIMPASS".rand(1000,100000);
    $_SESSION['codee']=$code;$_SESSION['maill']=$email;
                   // -------------------Sending email------------
                  if ($email!="") {
                        

                        $to1 = $email;
                        $subject1 = 'Your verification code';
                        $from ='jayachandramohan2001.@gmail.com';
                        $message = "Your forgort password verification Code is  $code ";
                        $headers = "From:" . $from;

                            if (mail($to1, $subject1,$message,$headers)) {

                                $_SESSION['codee']=$code;
                                $_SESSION['maill']=$email;

                                echo "<script>alert('Verification Code will send to your Mali')</script>";
                                echo "<script>window.location='stu_faculty_forgot_password.php';</script>";

                            }else {
                                $error="Request faild";
                               // echo "<script>alert('Password changed successfully')</script>";
                               // echo "<script>window.location='index.php';</script>";
                            }
                             echo "<script>window.location='stu_faculty_forgot_password.php';</script>";
                    }

}elseif (isset($_POST['register_submit'])) {

        $email = $_POST['email'];
        $code="AIM".rand(1000,100000);
        $_SESSION['code']=$code;$_SESSION['mail']=$email;

                       // -------------------Sending email------------
                        if ($email!="") {
                          $to1 = $email;
                          $subject1 = 'Your verification code';
                          $from ='jayachandramohan2001.@gmail.com';
                          $message = " Verification Code for Registration is  $code ";
                          $headers = "From:" . $from;
                                if (mail($to1, $subject1, $body,$headers)) {
                                    $_SESSION['code']=$code;
                                    $_SESSION['mail']=$email;
                                    echo "<script>alert('Verification Code will send to your Mali')</script>";
                                    echo "<script>window.location='stu_faculty_registration.php';</script>";
                                }else {
                                    $error="Request failed try again ";
                                    //echo "<script>alert('Request failed try again')</script>";
                                   // echo "<script>window.location='index.php';</script>";
                                }
                                 echo "<script>window.location='stu_faculty_registration.php';</script>";
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
  <link rel="shortcut icon" href="assets/images/logo.jpg" />
  <!--================================================================================-->
  <title>Login</title>
  <!--=============================== fonts ==========================================-->
  <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!--================================styles==========================================-->
  <link href="assets/css/sb-admin-2.css" rel="stylesheet">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!--================================================================================-->
<style>
@media only screen and (min-width:990px) {
  #image{
    display:none;
  }
  #form{
      margin-top:25%;
  }
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
            <div class="row sign-in">
              <div class="col-lg-6 d-none d-lg-block ">
                <h6 class="font-weight-bold text-primary" style="margin:5% 0 0 5%;"><a href="index.html" class="btn btn-primary btn-circle btn">
                      <i class="fas fa-arrow-circle-left"></i>
                  </a> Back </h6>
                <img src="assets/images/logo.jpg" alt="sing up image">
              </div>
              <div class="col-lg-6">
                
                <div class="p-5">
                  <div class="text-center">
                  <div class="text-center">
                    <img src="assets/images/logo.jpg"  id="image"alt="sing up image" style="height: auto; width:75%;">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" class="user">
                    <div class="form-group">
                      <input type="text" name="user_name" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter User Name...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="user_pass" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" name="login_submit" value="Login"/>
                    <br>
                    <?php if($error !=""){?><strong> <div class="text-danger"><i class='far fa-times-circle' style='color:red'></i> <?php echo htmlentities($error); ?>  </strong></div><?php } 
                        else if($msg !=""){?><strong><div class="text-success"><i class="far fa-check-circle"  style='color:green'></i><?php echo htmlentities($msg); ?></strong> </div><?php }
                    ?>
                    <hr>
                  </form>
                  <hr>
                 <!-- <div class="text-center">
                    <a class="small" href="#" id="forgot_pass"> Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="#" id="register">Create an Account!</a>
                  </div>-->
                </div>
              </div>
            </div>
            <!----------------- /login ------------------->
            <!----------------- Forgot Password ------------------->
            <div class="row forgot_password" style="display:none;" >
              <div class="col-lg-6 d-none d-lg-block ">
              <br>
                <img src="assets/images/logo.jpg" alt="sing up image">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Forgot Password</h1>
                   <h6>Verification Code will send to your Registered Emali</h6> 
                  </div>
                  <form  method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" class="user">
                    <div class="form-group">
                      <input type="text"  name="user_name" id="user_name" class="form-control form-control-user"  placeholder="Enter User Name...">
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" name="forgotpass_submit" value="Send"/>
                    <?php if($error !=""){?><strong> <div class="text-danger"><i class='far fa-times-circle' style='color:red'></i> <?php echo htmlentities($error); ?>  </strong></div><?php } 
                        else if($msg !=""){?><strong><div class="text-success"><i class="far fa-check-circle"  style='color:green'></i><?php echo htmlentities($msg); ?></strong> </div><?php }
                    ?>
                    <hr>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="#" id="forgot"> Login</a>
                  </div>
                </div>
              </div>
            </div>
            <!-----------------/ Forgot Password ------------------->
            <!----------------- register ------------------->
            <div class="row mail" style="display:none;">
              <div class="col-lg-6 d-none d-lg-block ">
              <br>
                <img src="assets/images/logo.jpg" alt="sing up image">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Mail Verification</h1>
                    <h6> Verification Code will send to your Emali</h6>
                  </div>
                  <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" class="user">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter User Email">
                    </div>
                    
                    <input type="submit" class="btn btn-primary btn-user btn-block" name="register_submit" value="Login"/>
                    <?php if($error !=""){?><strong> <div class="text-danger"><i class='far fa-times-circle' style='color:red'></i> <?php echo htmlentities($error); ?>  </strong></div><?php } 
                        else if($msg !=""){?><strong><div class="text-success"><i class="far fa-check-circle"  style='color:green'></i><?php echo htmlentities($msg); ?></strong> </div><?php }
                    ?>
                    <hr>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="#" id="mail">I am already member</a>
                  </div>
                </div>
              </div>
            </div>
            <!-----------------/ register ------------------->            
          </div>
        </div>
      </div>
    </div>
  </div>
 <!--================================================================================-->
 <script>
  $(document).ready(function(){
   //-------------------------
   $("#register").click(function(){
      $(".sign-in").hide();
      $(".mail").show();
    });
  //-----------------------------
  $("#mail").click(function(){
      $(".mail").hide();
      $(".sign-in").show();
    });
  //-----------------------------
  $("#forgot_pass").click(function(){
      $(".sign-in").hide();
      $(".forgot_password").show();
    });
  //-----------------------------
  $("#forgot").click(function(){
      $(".forgot_password").hide();
      $(".sign-in").show();
    });
  //-----------------------------
  });      
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
