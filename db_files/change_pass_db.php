<?PHP
  include "../db_connection.php";
  session_start();
  if(!isset($_SESSION['user_name']))
  {header('location:index.php');}
  $user=$_SESSION['user_name'];
  $sql="SELECT * FROM `user_details` WHERE  `id_number` = '$user' ";
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_array($result);


  $oldpass = mysqli_real_escape_string($connect, $_POST["old_password"]);  //$_POST['project_title'];
  $newpass =mysqli_real_escape_string($connect, $_POST["new_password"]);



  if($oldpass == $row['password']){
            $change = "UPDATE `user_details` SET  `password` ='$newpass' WHERE `id_number` = '$user'";
            $changesql=mysqli_query($connect,$change);
            if($changesql){
                echo "Success";
            }else{
                echo "falid";
            }
    }

?>