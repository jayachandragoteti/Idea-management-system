<?PHP 
include "db_connection.php";
session_start();
$msg="";
$error="";
if (isset($_POST['login'])) {
   $username=$_POST['username'];
   $password=$_POST['password'];
   $user="SELECT * FROM `user` WHERE `user`.`username`='$username' AND `user`.`password`='$password'";

   if ($user_sql=mysqli_query($connect,$user)) {
            if ($user_row=mysqli_fetch_array($user_sql)) {
                if ($user_row['user_type'] == 'department_admin') {
                    $_SESSION['department_admin']=$user_row['username'];
                    $msg="successfully logged in";
                    echo "<script>alert('successfully logged in.')</script>";
                    echo "<script>window.location='department_admin/pending.php';</script>";
                }elseif ( $user_row['user_type'] == 'central_community') {
                    $_SESSION['central_community']=$user_row['username'];
                    $msg="successfully logged in";
                    echo "<script>alert('successfully logged in.')</script>";
                    echo "<script>window.location='central_community/pending.php';</script>";
                }else {
                        $error="Login faild ,Try again..";
                }
            }else {
                $error="Password is incorrect ,Try again.";
           }                  
   } else {
        $error="Password is incorrect ,Try again.";
   }  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Wisdom Writer</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style>
    @import url("https://fonts.googleapis.com/css?family=Poppins");
    * {
        padding: 0;
        margin: 0;
    }
    
    *:focus {
        outline: none;
    }
    
    body {
        font-family: "Poppins", sans-serif;
        height: 100vh;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }
    
    #bg {
        background: #56baed;
        width: 100%;
        height: 100%;
        position: absolute;
        z-index: -1;
        clip-path: polygon(0 0, 55% 0, 45% 100%, 0% 100%);
    }
    
    .underlineHover:after {
        display: block;
        left: 0;
        width: 0;
        height: 2px;
        background-color: #56baed;
        content: "";
        transition: width 0.33s ease-in-out;
    }
    
    .underlineHover:hover {
        color: #0d0d0d;
    }
    
    .underlineHover:hover:after {
        width: 100%;
    }
    
    .wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        justify-content: center;
        border-radius: 10px 10px 10px 10px;
        min-height: 100%;
    }
    
    .wrapper #form {
        max-width: 350px;
        position: relative;
        box-shadow: 2px 2px 3px #b3b3b3;
        border-radius: 10px 10px 10px 10px;
        background: #fff;
        position: relative;
    }
    
    .wrapper #form #formHeader h2 {
        text-align: center;
        font-size: 15px;
        font-weight: 400px;
        text-transform: uppercase;
        color: #cccccc;
        display: inline-block;
        margin: 20px 10px 20px 10px;
    }
    
    .wrapper #form #formHeader h2.inactive {
        color: #cccccc;
    }
    
    .wrapper #form #formHeader h2.active {
        color: #0d0d0d;
        border-bottom: 2px solid #56baed;
    }
    
    .wrapper #form #formHeader i {
        font-size: 4.5em;
        margin: 0px;
        color: #28a7e8;
        text-shadow: 0px 2px 3px #28a7e8;
    }
    
    .wrapper #form #formContent {
        padding: 20px 20px;
        position: relative;
    }
    
    .wrapper #form #formContent form input[type=submit] {
        display: inline-block;
        background-color: #56baed;
        border: none;
        color: white;
        padding: 15px 70px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        text-transform: uppercase;
        border-radius: 5px;
        box-shadow: 0 2px 2px 0px #1474a6;
        font-size: 13px;
        margin-top: 5px;
    }
    
    .wrapper #form #formContent form input[type=submit]:hover {
        background-color: #39ace7;
        border: none;
    }
    
    .wrapper #form #formFooter {
        padding: 10px 20px;
        background-color: #f6f6f6;
        border-top: 1px solid #e9e9e9;
        border-radius: 0px 0px 10px 10px;
    }
    
    .wrapper #form #formFooter a {
        color: #0e5b83;
        padding: 10px 25px;
        font-size: 1em;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
    
    .credits footer {
        position: absolute;
        bottom: 0;
        right: 5px;
        text-align: right;
        font-size: 0.6em;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #56baed;
    }
    
    .credits footer p {
        border: none;
        padding: 0;
    }
    
    .credits footer p strong {
        font-size: 2em;
        text-decoration: none;
    }
    
    .credits footer p strong:hover {
        color: #ff0909;
        transition: all .4s ease-in-out;
        font-weight: 1500;
        font-size: 4em;
    }
    
    .credits footer a {
        color: #28a7e8;
        text-decoration: none;
        transition: all .4s ease-in-out;
    }
    
    .credits footer a:hover {
        color: #ff2222;
        font-weight: 900;
        font-size: 1.5em;
    }
    
    .form-control {}
</style>

<body>
    <!-- partial:index.partial.html -->
    <div id="bg"></div>
    <div class="wrapper fadeInDown">
        <div id="form">
            <div id="formHeader">
                <h2 class="active">
                    <img src="assets/images/logo.jpg" alt="Logo" style='height:80px;margin-top:0%;'><br>
                    Login
                </h2>
                <div class="fadeIn first">
                    <i class="fa fa-user-circle-o"></i>
                </div>
                <div id="formContent">
                    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
                        <div class="form-group">
                            <input type="test" class="form-control" style="margin-left:7%;width:85%;" name='username' placeholder="User Name" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" style="margin-left:7%;width:85%;" name='password' placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <input type="submit"  name="login" class="fadeIn fourth" value="Log In">
                        </div>
                    </form>
                </div>
                <div id="formFooter">

                    <!-- <a class="underlineHover" href="#">Forgot Password?</a>-->
                </div>
            </div>
        </div>

        <div class="credits">
            <footer>

            </footer>
        </div>
<!-- partial -->
<!-- SCIPTS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>