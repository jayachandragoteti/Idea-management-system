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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- shortcut icon-->
    <link rel="shortcut icon" href="assets/images/logo.jpg" />
    <title>Idea Management</title>

    <!-- Custom fonts for this template-->
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="assets/css/dashboard_style.css" rel="stylesheet">
    <style>
        @media only screen and (min-width:990px) {
            #image {
                display: none;
            }
            #back{
                display: none;
            }
            #form {
                margin-top: 25%;
            }
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-lg-6 d-none d-lg-block">
                                <h6 class="font-weight-bold text-primary" style="margin:5% 0 0 5%;">
                                    <a href="index.php" class="btn btn-primary btn-circle btn">
                                        <i class="fas fa-arrow-circle-left"></i>
                                    </a> Back
                                </h6>
                                <img src="assets/images/logo.jpg" style="margin-top: 5%;">
                            </div>
                            <div class="col-lg-6" style="margin-top: 5%;">
                            <h6 class="font-weight-bold text-primary" id="back" style="margin:5% 0 0 5%;">
                                    <a href="index.php" class="btn btn-primary btn-circle btn">
                                        <i class="fas fa-arrow-circle-left"></i>
                                    </a> Back
                                </h6>
                                <div class="p-5">
                                    <div class="text-center">
                                        
                                        <img src="assets/images/logo.jpg" id="image" alt="sing up image" style="height: auto; width:75%;">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form  method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>"class="user" >
                                        <div class="form-group">
                                            <input type="text" name='username' class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="User Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name='password' class="form-control form-control-user" id="exampleInputPassword" placeholder="Password"required>
                                        </div>
                                            <input type="submit" name="login" value="Login"class="btn btn-primary btn-user btn-block">
                                        <hr>

                                    </form>

                                    <?php if($error !=""){?><strong> <div class="text-danger"><i class='far fa-times-circle' style='color:red'></i> <?php echo htmlentities($error); ?>  </strong></div><?php } 
                                        else if($msg !=""){?><strong><div class="text-success"><i class="far fa-check-circle"  style='color:green'></i><?php echo htmlentities($msg); ?></strong> </div><?php }
                                    ?>
                                    <hr>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- Core plugin JavaScript
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>-->
    <!-- Custom scripts for all pages-->
    <script src="assets/js/dashboard_js.js"></script>

</body>

</html>