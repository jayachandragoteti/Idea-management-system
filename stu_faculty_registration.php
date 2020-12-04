<?PHP 
include "db_connection.php";
session_start();
        if(!isset($_SESSION['code']))
        {header('location:index.php');}
        $mail=$_SESSION['mail'];
        $code=$_SESSION['code'];
        
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
    <title>Register</title>
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
                        <h2 class="form-title">Register</h2>
                        <h5><i class="fa fa-dot-circle-o"></i> &nbsp <?PHP echo $mail;?>: Your Id Number is Your User Name</h5>
                        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="name"><i class="fa fa-user-circle"></i></label>
                                <input type="text" name="name" id="name" placeholder="Your Full Name" required/>
                            </div>
                            <div class="form-group">
                                <label for="user_name"><i class="fa fa fa-vcard"></i></label>
                                <input type="text" name="user_name" id="user_name" placeholder="Your Id Number" required/>
                            </div>
                            <div class="form-group">
                                <label for="phone"><i class="fa fa-phone"></i></label>
                                <input type="tel" id="phone" name="phone"id="phone" placeholder="Your Phone Number" pattern="[0-9]{10}" required/>
                            </div>
                            <div class="form-group">
                                <label for="code"><i class="fa fa-envelope"></i></label>
                                <input type="text" name="code" id="code" placeholder="Verification Code" required/>
                            </div>
                            <div class="form-group" style="display:flex;">
                                <label for="login_type"></label>
                                <input type="radio" name="login_type" id="student" value="student" class="agree-term">Student
                                <input type="radio" name="login_type" id="faculty" value="faculty" class="agree-term">Faculty
                            </div>
                                        <div id="student_branch_section" style="display:none;">
                                            <div class="form-group">
                                                <label for="branch"></label>
                                                <input type="radio" name="branch" value="CSE" class="agree-term">CSE
                                                <input type="radio" name="branch" value="ECE" class="agree-term">ECE
                                                <input type="radio" name="branch" value="IT" class="agree-term">IT
                                            </div>
                                            <div class="form-group">
                                                <input type="radio"  name="branch" value="EEE" class="agree-term">EEE
                                                <input type="radio" name="branch" value="CIVIL" class="agree-term">CIVIL
                                                <input type="radio" name="branch" value="MECH" class="agree-term">MECH
                                            </div>   
                                            <div class="form-group">
                                                <label for="re-pass"></label>
                                                <input type="radio" name="section" value="A" class="agree-term">A SECTION
                                                <input type="radio" name="section" value="B" class="agree-term">B SECTION
                                                <input type="radio" name="section" value="C" class="agree-term">C SECTION
                                            </div>
                                        </div>  
                                        <div id="fac_branch" style="display:none;">
                                            <div class="form-group">
                                                <label for="branch"></label>
                                                <input type="radio" name="branch" value="CSE" class="agree-term">CSE
                                                <input type="radio" name="branch" value="ECE" class="agree-term">ECE
                                                <input type="radio" name="branch" value="IT" class="agree-term">IT
                                            </div>
                                            <div class="form-group">
                                                <input type="radio"  name="branch" value="EEE" class="agree-term">EEE
                                                <input type="radio" name="branch" value="CIVIL" class="agree-term">CIVIL
                                                <input type="radio" name="branch" value="MECH" class="agree-term">MECH
                                                <input type="radio" name="branch" value="BS" class="agree-term">BS
                                            </div>   
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
        $vcode = $_POST['code'];
         
if( $vcode == $code) {
        $name = $_POST['name'];
        $user_name = $_POST['user_name'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $login_type = $_POST['login_type'];
        $branch = $_POST['branch'];
        if($login_type=="student"){
            $section = $_POST['section'];
        }else{
            $section = "faculty";
        }

            if($name !=' ' && $user_name !=' ' && $phone !=' ' && $password !=' ' && $login_type !=' ' && $branch !=' ' && $section !=' '  ){ 
                    
                            $query = "INSERT INTO `user_details` (`name`, `id_number`, `phone`,`email`, `password`,`login_type`, `branch`, `section`) VALUES ('$name','$user_name','$phone','$mail','$password','$login_type','$branch','$section')";
                            $sql= mysqli_query($connect,$query);
                            if($sql){
                                echo "<script>alert('Registration successfull ')</script>";
                                echo "<script>window.location='index.php';</script>";

                            }else{
                                echo "<script>alert('Registration Faild try again ')</script>";
                                echo "<script>window.location='index.php';</script>";
                            }
            }else {
                    echo "<script>alert('All fields must be filled')</script>";
                // echo "<script>window.location='index.php';</script>";
            }
        }
else {
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

});
</script>
<!--===========================================================================-->   
</body>
</html>