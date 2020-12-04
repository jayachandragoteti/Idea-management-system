<?PHP
  include "../db_connection.php";
  session_start();
  if(!isset($_SESSION['user_name']))
  {header('location:index.php');}
   $user=$_SESSION['user_name'];
?>
  <!--========================================================================================--> 
  <div class="row">
        <div class="col-md-4 grid-margin stretch-card"></div>       
          <div class="col-md-4 grid-margin stretch-card" id="" >
            <div class="card" >
              <div class="card-body">
                <h4 class="card-title"><b>Project Proposal </b></h4>
                <form method="POST" id="project_proposal"  class="forms-sample" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="project_title"> Project Title</label>
                    <input type="text" name="project_title" class="form-control" id="project_title" placeholder="Project Title" required/>
                  </div>
                  <div class="form-group">
                    <label for="estimated_amount">Estimated Amount</label>
                    <input type="number"name="estimated_amount" class="form-control" id="estimated_amount" placeholder="Estimated Amount" required/>
                  </div>
                  <div class="form-group">
                    <label for="project_file">Upload Project File</label>
                    <input type="file" name="myfile" id="file" required>
                  </div>
                  <div class="form-group">
                    <label for="project_description">Project Description</label>
                    <textarea name="project_description" class="form-control" id="project_description" rows="2" placeholder="Description in 3-4 lines" required></textarea>
                  </div>
                  <input type="submit" class="btn btn-primary" name="proposal" id="proposal" class="form-submit" value="Submit"/>
                </form>
              </div>
              <div id="response"></div> 
            </div>
          </div>     
        <div class="col-md-4 grid-margin stretch-card"></div>
    </div>
 <script>
 $(document).ready(function(){  
      $('#proposal').click(function(){  
        /*   var project_title = $('#project_title').val();  
           var estimated_amount = $('#estimated_amount').val();
           var file = $('#file').val();  
           var project_description = $('#project_description').val();  
           if(project_title == '' || estimated_amount == ''|| file == '' || project_description == '')  
           {  
                $('#response').html('<span class="text-danger">All Fields are required</span>');  
           }  
           else  
           {  */
            var fd = new FormData();
            var files = $('#file')[0].files[0];
            fd.append('file',files);

                $.ajax({  
                     url:"./db_files/project_poposal_db.php",  
                     method:"POST",  
                     data:$('#project_proposal').serialize(),  
                     beforeSend:function(){  
                          $('#response').html('<span class="text-info">Loading response...</span>');  
                     },  
                     success:function(data){  
                          $('form').trigger("reset");  
                          $('#response').html(data);  
                          alert("AJAX request successfully completed");
                     }  
                });  
           //}  
      });  
 });  
 </script>         
<!--========================================================================================--> 
<?PHP 
    //-----------------------------------
    /*if (isset($_POST['proposal']))
    { 
      $project_title = $_POST['project_title'];
      $estimated_amount = $_POST['estimated_amount'];
      $project_description = $_POST['project_description'];
      $status="PENDING";
        //------------ $proposal_id ----------
         $letters = array_merge(range('A','Z'));

         $proposal_id="AIM".rand(100,100000).$letters[rand(1,26)].$letters[rand(1,26)];
        //------------ $proposal_id ----------
  
        //combine random digit to you file name to create new file name
        //use dot (.) to combile these two variables

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
    
        if (!in_array($extension, ['zip','pdf','docx']))
         {
            echo "<script>alert('You file extension must be .pdf ')</script>";
            //echo "You file extension must be .zip, .pdf or .docx";
        } 
        elseif ($_FILES['myfile']['size'] > 10000000) 
        { // file shouldn't be larger than 1Megabyte
            echo "<script>alert('File too large!')</script>";
           // echo "File too large!";
        } 
        else 
        {
            // move the uploaded (temporary) file to the specified destination
            if (move_uploaded_file($file, $destination)) 
            {
                $sql = "INSERT INTO `project_proposals` (`id_number`, `proposal_id`, `project_title`, `estimated_amunt`, `project_file`, `project_description`, `status`) VALUES ('$user','$proposal_id','$project_title','$estimated_amount','$modefide_file_name','$project_description','$status') ";
                $query=mysqli_query($connect, $sql);
                        if ($query)
                        {
                            echo "<script>alert('Request submitted successfully')</script>";
                            //echo "Request submitted successfully"; 
                        }
                        else{
                             echo "<script>alert('Request Failed submit')</script>";
                            // echo "Request Failed submit." ;
                            }
            }
            else{
                  echo "<script>alert('file name is already exist')</script>";
                 // echo "file name is already exist"; 
                }
        }
    }
*/
?>  
<!--========================================================================================--> 
