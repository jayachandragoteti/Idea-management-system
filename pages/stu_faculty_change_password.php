<?PHP
  include "../db_connection.php";
  session_start();
  if(!isset($_SESSION['user_name']))
  {header('location:index.php');}
  $user=$_SESSION['user_name'];

?>
<div class="row">
      <div class="col-md-4 grid-margin stretch-card"></div>
        <div class="col-md-4 grid-margin stretch-card">
              <div class="card" >
              <div class="card-body">
                <h4 class="card-title"><b>Change Password</b></h4>
                <form method="POST" id="change_password"  class="forms-sample" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="old_password">Old Password</label>
                    <input type="text" name="old_password" class="form-control" id="old_password" placeholder="Old Password" required/>
                  </div>
                  <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" class="form-control" id="new_password" placeholder="New Password" required/>
                  </div>
                  <input type="submit" class="btn btn-primary" name="change_pass_submit" id="change_pass_submit" class="form-submit" value="Change"/>
                </form>
              </div>
              <div id="response"></div>
            </div>
        </div>
      <div class="col-md-4 grid-margin stretch-card"></div>
  </div>
  <script>
  $(document).ready(function(){

  $("#change_pass_submit").click(function(){
      
	    var request_method = $("#change_password").attr("method"); //get form GET/POST method
	    var form_data = $("#change_password").serialize();
          $.ajax({
              url : "./pages/change_pass_db.php",
	        	  type: request_method,
		          data : form_data
        }).done(function(response){ //
          $("#response").html(response);
          alert("password changed");
        });
  });

});
  </script>