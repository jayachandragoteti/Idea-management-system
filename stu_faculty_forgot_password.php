<?PHP 
include "db_connection.php";
session_start();
        if(!isset($_SESSION['codee']))
        {header('location:index.php');}
        $mail=$_SESSION['maill'];
        $code=$_SESSION['codee'];
        $user=$_SESSION['user'];
        
$expireAfter =5;
        if(isset($_SESSION['last_action'])){
    
            //Figure out how many seconds have passed
            //since the user was last active.
            $secondsInactive = time() - $_SESSION['last_action'];
            
            //Convert our minutes into seconds.
            $expireAfterSeconds = $expireAfter * 60;
            
            //Check to see if they have been inactive for too long.
            if($secondsInactive >= $expireAfterSeconds){
                //User has been inactive for too long.
                //Kill their session.
                session_unset();
                session_destroy();
            }
            
        }
         
        //Assign the current timestamp as the user's
        //latest activity
        $_SESSION['last_action'] = time();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--===========================================================================-->
    <link rel="shortcut icon" href="assets/images/logo.jpg" />
    <!--===========================================================================-->
    <title>Change</title>
    <!--=============================Font Icon ==================================-->
    <link rel="stylesheet" href="assets/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/iconfonts/ionicons/css/ionicons.css">
    <link rel="stylesheet" href="assets/iconfonts/typicons/src/font/typicons.css">
    <link rel="stylesheet" href="assets/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/iconfonts/font-awesome/css/font-awesome.min.css" />
    <!--===========================================================================-->
    <link rel="stylesheet" href="assets/css/login_style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!--===========================================================================-->
     <script src="assets/js/jquery.min.js"></script>
     <script src="js/bootstrap.min.js"></script>
    <!--===========================================================================-->
</head>
<body style="background-image: linear-gradient(to right, #1A2980 0%, #26D0CE 51%, #1A2980 100%)">
<!--===========================================================================-->
    <div class="main" style="background-image: linear-gradient(to right, #1A2980 0%, #26D0CE 51%, #1A2980 100%)">
        <!--==================================== Register =====================================-->
        <section class="signup" style="" >
            <div class="container">
                <div class="signup-content" ><?PHP echo $code;?>
                    <div class="signup-form" style="margin-top:-8%;">
                        <h2 class="form-title">Password Reset</h2>
                        <h5><i class="fa fa-dot-circle-o"></i> &nbsp <?PHP echo $mail;?>: Your Id Number is Your User Name</h5>
                        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="vcode"><i class="fa fa-user-circle"></i></label>
                                <input type="text" name="vcode" id="vcode" placeholder="Verification code" required/>
                            </div>    
                            <div class="form-group">
                                <label for="password"><i class="fa fa-lock"></i></label>
                                <input type="password" name="password" id="password" pattern=".{8,}" placeholder="Password 8 characters minimum" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="fa fa-lock"></i></label>
                                <input type="password" name="re_pass" id="confirm_password" pattern=".{8,}" placeholder="Repeat your password" required/>
                            </div>
                           <div class="form-group">
                            <!--<a href="#"  id="already_member" style="color:#1565c0;text-decoration:none;">
                                <b><i class="fa fa-dot-circle-o">&nbsp</i><u> I am already member</u></b>
                            </a>-->
                                <!--<input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span>
                                <span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>-->
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                        
                    </div>
                    <div class="signup-image">
                        <figure><img src="assets/images/logo.jpg" alt="sing up image"></figure>
                       <!-- <a href="#" class="signup-image-link" id="login" style="color:#1565c0;text-decoration:none;">
                            <b><u>I am already member</u></b>
                        </a>-->
                    </div>
                </div>
            </div>
        </section>
        <!--===========================================================================-->
    </div>
<!--===========================================================================-->
<?php

   //-------------- register --------------
if(isset($_POST['signup'])){
        $vvcode = $_POST['vcode'];
        $password = $_POST['password'];
        $re_pass = $_POST['re_pass'];
         
if( $vvcode == $code && $re_pass == $password ) {


                     $query = "UPDATE `user_details` SET `password`='$re_pass' WHERE `id_number`='$user' AND `email`='$mail' ";
                            $sql= mysqli_query($connect,$query);
                            if($sql){
                                echo "<script>alert('Password changed successfully')</script>";
                                echo "<script>window.location='index.php';</script>";

                            }else{
                                echo "<script>alert(' Faild try again ')</script>";
                                echo "<script>window.location='index.php';</script>";
                            }
        
         }else {
            echo "<script>alert('In valid Verification Code. Try Again')</script>";
           // echo "<script>window.location='index.php';</script>";
        }
        
    }
    //-------------- / register --------------
?>
<script>
$(document).ready(function(){

   $("#student").click(function(){
    $("#student_branch_section").show();
    $("#fac_branch").hide();        
   });
   $("#faculty").click(function(){
        $("#student_branch_section").hide();
        $("#fac_branch").show();       
   });
});

$(function () {
        $("#signup").click(function () {
            var password = $("#password").val();
            var confirmPassword = $("#confirm_password").val();
            if (password != confirmPassword) {
                alert("Passwords do not match.");
                return false;
            }
            return true;
        });
    });
</script>
<!--===========================================================================-->   
</body>
</html>