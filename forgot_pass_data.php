<?PHP 
include "db_connection.php";
session_start();
//---------------- forgot_password ---------------
if(isset($_POST['forgot_password_submit']))
{
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
                        // To send HTML mail, the Content-type header must be set
                        $headers  = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                        
                        // Create email headers
                        $headers .= 'From: '.$from."\r\n".
                            'Reply-To: '.$from."\r\n" .
                            'X-Mailer: PHP/' . phpversion();
                        
                        // Compose a simple HTML email message
                            $body = '<html><body>';
                        $body .= "<center>";
                        $body .= "<div style='width:80%;background-color:#424949;color:white;'>";
                        $body .= "<div>";
                            $body .= "<br>";
                            $body .= "<h2>Your verification code</h2>";
                            $body .= "<h1 >".$code."</h1>";
                            $body .= "<hr style='background-color: white; width:75%;'>";
                            $body .= "<br>";
                        $body .= "</div>";
                        $body .= "</div>";
                        $body .= "</center>";
                        $body .= "</body></html>";
                            if (mail($to1, $subject1, $body,$headers)) {
                                $_SESSION['code']=$code;
                                $_SESSION['mail']=$email;
                                echo "<script>alert('Verification Code will send to your Mali')</script>";
                                echo "<script>window.location='stu_faculty_forgot_password.php';</script>";
                            }else {
                                echo "<script>alert('Request faild try again')</script>";
                               // echo "<script>window.location='index.php';</script>";
                            }
                             echo "<script>window.location='stu_faculty_forgot_password.php';</script>";
                    }

}
//---------------- /forgot_password ---------------
?>