<?PHP
        include "../db_connection.php";
        session_start();
        if(!isset($_SESSION['user_name']))
        {header('location:index.php');}
        $user=$_SESSION['user_name'];
        //$user="18A51A0515";
        $sql="SELECT * FROM `user_details` WHERE  `id_number` = '$user' ";
        $result = mysqli_query($connect,$sql);
        $row = mysqli_fetch_array($result);
?>
<!--========================================================================================--> 
<div class="row">
    <div class="col-md-4 grid-margin stretch-card"></div>
          <div class="col-md-4 grid-margin stretch-card" id="profile">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title"><b>Your Profile</b></h4>
                
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
                  <div class='form-group'>
                            <label for='project_title'><b>Branch </b></label>
                            <p><?PHP echo $row['branch'];?></p>
                            </div>
                  <?PHP
                  //-----------------------Branch section update-------------------------------------
                  if( $row['login_type'] =="student"){
                      echo"
                     
                            <div class='form-group'>
                            <label for='project_title'><b> Section </b></label>
                            <p>".$row['section']."</p>
                            </div>
                      ";
                  }
                    ?>
                    
                  <form class="forms-sample">
                    <br>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#profile_edit"> 
                        Edit
                    </button>
                    </form>
              </div>
            </div>
          </div>
<!--========================================================================================--> 
</section>
  <div class="col-md-4 grid-margin stretch-card"></div>
</div>
<!--===========================================================================-->
<!-----------------------------------------------Profile Edit ------------------------------------ -->
<div class="modal fade" id="profile_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  method="POST" id="profile_update">
            <div class="form-group">
            <label for="name">NAME</label>
                <input type="text" class="form-control" name="name" id="name" value="<?PHP echo $row['name'];?>"  required />
            </div>
            <div class="form-group">
                <label for="phone"> Phone</label>
                <input type="tel" id="phone" name="phone" class="form-control"  value="<?PHP echo $row['phone'];?>" required/>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email"  value="<?PHP echo $row['email'];?>" required/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="profile_edit" id="profile_edit" class="btn btn-primary" value="Save Changes"/>
            </div>
        </form>
      </div>
      <div id="response"></div>
    </div>
  </div>
</div>
<!----------------------------------------------- /Profile Edit ------------------------------------ -->

<!------------------------------------------------------------------------------------------------------>
<?PHP 

        //$user="18A51A0515";

        //---------------profele update------------------
        /*if(isset($_POST['profile_edit'])){
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];

            $update_profile="UPDATE `user_details` SET `name`='$name',`phone`= '$phone',`email`= '$email' WHERE `id_number` = '$user'";
            $sqlupdate_update_profile= mysqli_query($connect,$update_profile);
            if ($sqlupdate_update_profile) {
                 echo "<script>alert('Profile Updated')</script>";
               # echo "<script>window.location='stu_faculty_profile.php';</script>";
            }else{
                echo "<script>alert('Update Faild ')</script>";
               # echo "<script>window.location=' stu_faculty_profile.php';</script>";
            }

        }*/
       //---------------/profele update------------------
?>
<!--===========================================================================-->
<script>


$(document).ready(function(){  
  
    $('#profile_edit').click(function(){  
     /*    var project_title = $('#project_title').val();  
         var estimated_amount = $('#estimated_amount').val();
         var file = $('#file').val();  
         var project_description = $('#project_description').val();  
         if(project_title == '' || estimated_amount == ''|| file == '' || project_description == '')  
         {  
              $('#response').html('<span class="text-danger">All Fields are required</span>');  
         }  
         else  
         {  */
              $.ajax({  
                   url:"./db_files/stu_faculty_profile_edit_db.php",  
                   method:"POST",  
                   data:$('#profile_update').serialize(),  
                   beforeSend:function(){  
                        $('#response').html('<span class="text-info">Loading response...</span>');  
                   },  
                   success:function(data){  
                       // $('form').trigger("reset");  
                        $('#response').html(data);  
                        alert("AJAX request successfully completed");
                   }  
              });  
         //}  
    });  
});  

</script>
<!--===========================================================================-->
    <script src="assets/js/vendor.bundle.base.js"></script>
    <script src="assets/js/vendor.bundle.addons.js"></script>
    <script src="assets/js/bootstrap.min.js" ></script>
    <script src="assets/js/shared/off-canvas.js"></script>
<!--==========================================================================-->
  </body>
</html>