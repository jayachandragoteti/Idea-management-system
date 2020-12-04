<?PHP 
include "db_connection.php";
$msg="";
$error="";
if (isset($_POST['submit'])) {

    $team_member_name=$_POST['team_member_name'];
    $team_member_id=$_POST['team_member_id'];
    $branch_t = $_POST['branch'];
    $year_t = $_POST['year'];
    $proposal_id = $_POST['P_id'];
   
    

    if ($proposal_id !="" && $year_t !="" && $branch_t !="" && $team_member_id !="" && $team_member_name !="") {
        $team_details="INSERT INTO `team_details`(`proposal_id`, `name`, `year`, `branch`, `id_number`) VALUES ('$proposal_id','$team_member_name','$year_t','$branch_t','$team_member_id')";
        $team_details_sql=mysqli_query($connect,$team_details);
        if ($team_details_sql) {
            $msg=" Team Meember Updated";
        }else{
            $error="Updated Faild";
        }
    }
    else{
        $error="you need to fill all required fields";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Add Team Member</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="assets/css/raleway-font.css">
	<link rel="stylesheet" type="text/css" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
	<!--=============================== fonts ==========================================-->
	<link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css"/>
</head>
<body>
	<div class="page-content" style="background-image: url('assets/images/ablock.jpg')">
		<div class="wizard-v1-content">
			<div class="wizard-form">
		        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>" class="form-register" id="form-register" >
					
		        	<div id="form-total">
		        		<!-- SECTION 1 -->
			            <h2>
			            	<span class="step-icon"><i class="fas fa-user-plus"></i></span>
                            <span class="step-text">Add Team Member</span>
                            <?php if($error !=""){?><strong> <div class="text-danger"><i class='far fa-times-circle' ></i> <?php echo htmlentities($error); ?>  </strong></div><?php } 
                        else if($msg !=""){?><strong><div class="text-success"><i class="far fa-check-circle" ></i> <?php echo htmlentities($msg); ?></strong> </div><?php }?>
                    </h2>
			            <section>
			                <div class="inner">
								<div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="">Proposal ID</label>
										<select name="P_id" id="card-type" class="form-control" required>
											<option value="" disabled selected>Select proposal ID</option>
											
                                            <?PHP 
                                             $team_details="SELECT `proposal_id`FROM `project_proposals` WHERE `status` Not LIKE 'ACCEPTED%' OR `status`NOT LIKE 'REKECTED%' ";
                                             $team_details_sql=mysqli_query($connect,$team_details);
                                             while($row = mysqli_fetch_array($team_details_sql)){
                                                 echo "<option value='".$row['proposal_id']."'>".$row['proposal_id']."</option>";
                                             }
                                            ?>
										</select>
                                    </div>
                                    
									<div class="form-holder form-holder-2">
										<label for="">Team Member Full Name</label>
										<input type="text" name="team_member_name" id="" placeholder="Full Name" class="form-control"  required>
									</div>
									<div class="form-holder form-holder-2">
										<label for="=">Team Member Id Number</label>
										<input type="text" name="team_member_id" id="" placeholder="Team Member Id Number" class="form-control"  required>
									</div>
								</div>
								<div class="form-row">
									<div class="form-holder form-holder-2">
										<label for="">Year</label>
										<select name="year" id="card-type" class="form-control" required>
											<option value="" disabled selected>Select Year</option>
											<option value="1">1st</option>
											<option value="2">2nd</option>
											<option value="3">3rd</option>
											<option value="4">4th</option>
										</select>
									</div>
									<div class="form-holder form-holder-2">
										<label for="">Branch</label>
										<select name="branch" id="card-type" class="form-control" required>
											<!--<option value="" disabled selected>Select Your Branch</option>-->
											<option value="CSE">CSE</option>
											<option value="ECE">ECE</option>
											<option value="IT">IT</option>
											<option value="EEE">EEE</option>
											<option value="MECH">MECH</option>
											<option value="CIVIL">CIVIL</option>
										</select>
                                    </div>
                                </div>		
                                <div class="form-row">
                                        <div class="form-holder form-holder-2">
                                                <input type="submit" name="submit" id=""  class="form-control" value="Submit">
                                        </div>	
                                </div>		
							</div>
			            </section>
				    </div>
		        </form>
			</div>
		</div>
	</div>
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
		</script>
	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script src="assets/js/jquery.steps.js"></script>
	<script src="assets/js/main.js"></script>
</body>
</html>