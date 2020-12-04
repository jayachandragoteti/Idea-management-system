<?PHP
include "db_connection.php";
session_start();
if (isset($_POST['proposal_submit'])) {
    //-------------- Applicant --------------------
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $id_number=$_POST['id_number'];
    $contact_number=$_POST['contact_number'];
    $email=$_POST['email'];
    $appilicant_type=$_POST['appilicant_type'];
    
    if ($_POST['appilicant_type'] == "Student") {
        $year=$_POST['year'];
        $branch=$_POST['branch'];
        $section=$_POST['section'];
    }else {
        $year=$_POST['appilicant_type'];
        $branch=$_POST['f_branch'];
        $section=$_POST['appilicant_type'];
    }
    //-------------- Team --------------------
    /*---- 1 -----*/
    if ($_POST['team_member_name_1'] !="" && $_POST['team_member_id_1'] !="" && $_POST['branch_1'] !="" && $_POST['year_1'] !="") {
        $team_member_name_1=$_POST['team_member_name_1'];
        $team_member_id_1=$_POST['team_member_id_1'];
        $branch_1=$_POST['branch_1'];
        $year_1 =$_POST['year_1'];
	  }else {
        $team_member_name_1="";
        $team_member_id_1="";
        $branch_1="";
        $year_1="";
    }
    /*---- 2 -----*/
    if ($_POST['team_member_name_2'] !="" && $_POST['team_member_id_2'] !="" && $_POST['branch_2'] !="" && $_POST['year_2'] !="") {
        $team_member_name_2 =$_POST['team_member_name_2'];
        $team_member_id_2 =$_POST['team_member_id_2'];
        $branch_2=$_POST['branch_2'];
        $year_2 =$_POST['year_2'];
    }else {
        $team_member_name_2="";
        $team_member_id_2="";
        $branch_2="";
        $year_2="";
    }
    /*---- 3 -----*/
    if ($_POST['team_member_name_3'] !="" && $_POST['team_member_id_3'] !="" && $_POST['branch_3'] !="" && $_POST['year_3'] !="") {
		$team_member_name_3=$_POST['team_member_name_3'];
        $team_member_id_3=$_POST['team_member_id_3'];
        $branch_3=$_POST['branch_3'];
        $year_3 =$_POST['year_3'];
	  }else {
        $team_member_name_3="";
        $team_member_id_3="";
        $branch_3="";
        $year_3="";
    }
    /*---- 4 -----*/
    if ($_POST['team_member_name_4'] !="" && $_POST['team_member_id_4'] !="" && $_POST['branch_4'] !="" && $_POST['year_4'] !="") {
		$team_member_name_4=$_POST['team_member_name_4'];
        $team_member_id_4=$_POST['team_member_id_4'];
        $branch_4=$_POST['branch_4'];
        $year_4 =$_POST['year_4'];
	  }else {
        $team_member_name_4="";
        $team_member_id_4="";
        $branch_4="";
        $year_4="";
    }
    /*---- 5 -----*/
    if ($_POST['team_member_name_5'] !="" && $_POST['team_member_id_5'] !="" && $_POST['branch_5'] !="" && $_POST['year_5'] !="") {
		$team_member_name_5=$_POST['team_member_name_5'];
        $team_member_id_5=$_POST['team_member_id_5'];
        $branch_5=$_POST['branch_5'];
        $year_5 =$_POST['year_5'];
	  }else {
        $team_member_name_5="";
        $team_member_id_5="";
        $branch_5="";
        $year_5="";
    }
    //-------------- project --------------------
    $project_title=$_POST['project_title'];
    $estimated_ammount=$_POST['estimated_ammount'];
    $project_description=$_POST['project_description'];
    /*--- $proposal_id -----*/      
    function password_generate($chars){
       $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
       return substr(str_shuffle($data), 0, $chars);
    }
    $R_str= password_generate(6); 
    $proposal_id="AIM0".$R_str;
    //combine random digit to you file name to create new file name
    //use dot (.) to combile these two variable
    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];
    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    // destination of the file on the server & change file name
    $destination = 'assets/project_files/' . $proposal_id.".".$extension; 
    //change file name
    $modefide_file_name=$proposal_id.".".$extension;
    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if ($first_name =='' && $last_name =='' && $id_number =='' && $contact_number =='' && $email =='' && $appilicant_type =='' && $year =='' && $branch=='' && $section =='' && $filename =='') {
        echo "<script>alert('All fields must be filled.')</script>";
        echo "<script>window.location='index.php';</script>";
    }elseif(!in_array($extension, ['zip','pdf','doxc'])){
        echo "<script>alert('You file extension must be ZIP, PDF')</script>";
        echo "<script>window.location='index.php';</script>";
    }elseif ($_FILES['myfile']['size'] > 2000000) {
        echo "<script>alert('File too large!')</script>";
        echo "<script>window.location='index.php';</script>";
    }else {
        $appilicant="INSERT INTO `applicant_details`(`first_name`, `last_name`, `id_number`, `contact_number`, `email`, `applicant_type`, `branch`, `year`, `section`, `proposal_id`) VALUES ('$first_name','$last_name','$id_number','$contact_number','$email','$appilicant_type','$branch','$year','$section','$proposal_id')";
        $appilicant_sql=mysqli_query($connect,$appilicant);
        if ($appilicant_sql) {
            $project="INSERT INTO `project_proposals`(`project_title`, `estimated_amount`, `project_description`, `priject_file`, `proposal_id`,`branch`) VALUES ('$project_title','$estimated_ammount','$project_description','$modefide_file_name','$proposal_id','$branch')";
            $project_sql=mysqli_query($connect,$project);
            if ($project_sql) {
               if (move_uploaded_file($file, $destination)) {
                        //--------------------- Team -------------------
                        /*---- 1 -----*/
                        if ($year_1 !="" && $branch_1 !="" && $team_member_id_1 !="" && $team_member_name_1 !="") {
                            $team_details="INSERT INTO `team_details`(`proposal_id`, `name`, `year`, `branch`, `id_number`) VALUES ('$proposal_id','$team_member_name_1','$year_1','$branch_1','$team_member_id_1')";
                            $team_details_sql=mysqli_query($connect,$team_details);
                          }
                          /*---- 2-----*/
                          if ($year_2 !="" && $branch_2 !="" && $team_member_id_2 !="" && $team_member_name_2 !="") {
                              $team_details="INSERT INTO `team_details`(`proposal_id`, `name`, `year`, `branch`, `id_number`) VALUES ('$proposal_id','$team_member_name_2','$year_2','$branch_2','$team_member_id_2')";
                              $team_details_sql=mysqli_query($connect,$team_details);
                          }
                          /*---- 3 -----*/
                          if($year_3 !="" && $branch_3 !="" && $team_member_id_3 !="" && $team_member_name_3 !=""){
                              $team_details="INSERT INTO `team_details`(`proposal_id`, `name`, `year`, `branch`, `id_number`) VALUES ('$proposal_id','$team_member_name_3','$year_3','$branch_3','$team_member_id_3')";
                              $team_details_sql=mysqli_query($connect,$team_details);
                          }
                          /*---- 4 -----*/
                          if($year_4 !="" && $branch_4 !="" && $team_member_id_4 !="" && $team_member_name_4 !=""){
                              $team_details="INSERT INTO `team_details`(`proposal_id`, `name`, `year`, `branch`, `id_number`) VALUES ('$proposal_id','$team_member_name_4','$year_4','$branch_4','$team_member_id_4')";
                              $team_details_sql=mysqli_query($connect,$team_details);
                          }
                          /*---- 5 -----*/
                          if($year_5 !="" && $branch_5 !="" && $team_member_id_5 !="" && $team_member_name_5 !=""){
                              $team_details="INSERT INTO `team_details`(`proposal_id`, `name`, `year`, `branch`, `id_number`) VALUES ('$proposal_id','$team_member_name_5','$year_5','$branch_5','$team_member_id_5')";
                              $team_details_sql=mysqli_query($connect,$team_details);
                          }
                        //--------------------- /Team -------------------
                        //--------------------- Mail -------------------  
                          if ($email !="") {              
                            $to1 = $email;
                            $subject1 = 'Response from AITAM innovation hub';
                            $from ='jayachandramohan2001.@gmail.com';
                            $message = " Hi ".$first_name." ".$last_name.", Propsal id : ".$proposal_id.".
                            your proposal is pending at department.";
                            $headers = "From:" . $from;
                              if (mail($to1, $subject1,$message,$headers)){
                                    echo "<script>alert('Request submitted successfully')</script>";
                                    echo "<script>window.location='index.php';</script>";
                              }else{
                                    echo "<script>alert(' response mail cannot be sent rejected by server,approach department')</script>";
                                    echo "<script>window.location='index.php';</script>";
                              }
                            }else {
                                    echo "<script>alert(' response mail cannot be sent rejected by server,approach department')</script>";
                                    echo "<script>window.location='index.php';</script>";
                            }
                        //--------------------- /Mail -------------------
               }else {
                    $appilicant_remove="DELETE FROM `applicant_details` WHERE `proposal_id` = '$proposal_id'";
                    $appilicant_remove_sql=mysqli_query($connect,$appilicant_remove);
                    $project_remove="DELETE FROM `project_proposals` WHERE `proposal_id` = '$proposal_id'";
                    $project_remove_sql=mysqli_query($connect,$project_remove);
                    echo "<script>alert('Request submission faild,try again!')</script>";
                    echo "<script>window.location='index.php';</script>";
               }
                
                 
           } else {
                $appilicant_remove="DELETE FROM `applicant_details` WHERE `proposal_id`=$proposal_id'";
                $appilicant_remove_sql=mysqli_query($connect,$appilicant_remove);
                echo "<script>alert('Request submission faild,try again!')</script>";
                echo "<script>window.location='index.php';</script>";
           }
           
        } else {
                echo "<script>alert('Request submission faild,try again!')</script>";
                echo "<script>window.location='index.php';</script>";
        }
        
    }
}