<?PHP
  include "../db_connection.php";
  session_start();
  if(!isset($_SESSION['user_name']))
  {header('location:index.php');}
  $user=$_SESSION['user_name'];
?>

            <div class="col-lg-12 grid-margin stretch-card"id="main_dashboard">
                <div class="card">
                  <div class="card-body">
                    <h1 class="card-title">Your Proposals</h1>
                    
                      <div class="form-group" style="width:45%;float:right;">
                        <input type="search" id="search"class="form-control" placeholder="Search Here">
                        <script>
                              $(document).ready(function(){
                                //---------------------------------------
                                $("#search").on("keyup", function() {
                                  var value = $(this).val().toLowerCase();
                                  $("#myTable tr").filter(function() {
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                  });
                                });
                              //----------------------------------------
                              });
                        </script>
                      </div>
                    
                      <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead  class="thead-light">
                                  <tr>
                                    <th scope="col">Proposal ID</th>
                                    <th scope="col">Projec Name</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">View Details</th>
                                  </tr>
                                </thead>
                                <tbody id="myTable">
                                <?PHP 
                                  $sql="SELECT * FROM `project_proposals` WHERE  `id_number` = '$user' ORDER BY `sno` DESC ";
                                  $result = mysqli_query($connect,$sql);
                                  
                                     while($row = mysqli_fetch_array($result)){
                                      echo "<tr><td>".$row['proposal_id']."</td><td>".$row['project_title']."</td><td>".$row['status']."</td>
                                          <td>
                                            view
                                         </td>
                                       </tr>";
                                    
                                    
                                    }
                                
                                  
                                ?>

                
                            </tbody>
                        </table>
                      </div>
                  </div>
                </div>
  </div>  
<!--===========================================================================-->     
<!---------------- view data-------------->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Your Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <div class="modal-body">
              <div class="card-body">
                <?PHP 
                if (isset($_POST[''])) {
                  # code...
                }
                
                ?>
                
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
              </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>         
<!--===========================================================================-->
