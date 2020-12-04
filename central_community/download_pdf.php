<?PHP
 include "../db_connection.php";
 session_start();

if(!isset($_GET['k'])){
    $Proposal_Id =  $_SESSION['download_pdf'];
    
  }else{
    $Proposal_Id =  $_SESSION['download_pdf'] = $_GET['k'];
  }
$project="SELECT * FROM `project_proposals`  WHERE `proposal_id`='$Proposal_Id'";
$project_sql= mysqli_query($connect,$project);
$project_row= mysqli_fetch_array($project_sql);

$applicant="SELECT * FROM `applicant_details` WHERE  `proposal_id`='$Proposal_Id'";
$applicant_sql= mysqli_query($connect,$applicant);
$applicant_row= mysqli_fetch_array($applicant_sql);

echo "<script>window.print()</script>";
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
    <link rel="shortcut icon" href="../assets/images/logo.jpg" />
    <title>Idea Management</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom styles for this template-->
    <link href="../assets/css/dashboard_style.css" rel="stylesheet">

    <style>
     body{
	background-color: #EEEEEE;
    font-family: sans-serif;
    padding: 10px;
}
#header1{
	width:100%;
	height:100px;
	top: 0;
	left: 0;
    position:absolute;
    padding:15px;
	display:flex;
	align-items:center;
	border: 5px solid #B8B8B8;
}
#header1 *{
	display: inline;
}
#header1 ul{
	list-style-type: none;
	margin-left:47%;
	margin-top:1%;
}
#header1 li p{
	padding-left:0px;
    font-size: 12px;
   
}
#header1 h1{
	margin-left: 2%;
	font-size: 20px;
}
#logo{
    height: 70px;
    margin-left:2%;
}
#homepic{
	height: 500px;
	width: 800px;
	position: absolute;
	margin-top: 7%;
	margin-left: 4%;
	border-radius: 2%;
	box-shadow: 0 0 10px black;
}
.card{
			box-shadow: 0 0 10px 0 black;
 			transition: 0.3s;
  			width: 1205px;
  			background-color: white;
              border: 3px solid white;
              height: auto;
  			color: white;
  			font-family: sans-serif;
  			padding:35px;
  			font-size:18px;
  			margin-top:3%;
          }
          .card table{
            text-align:left;
          }
  		.card p {
  			position: relative;
  			margin-top: -5px;
  			padding-left: 10px;
  		}

  		@page {
  			size: auto;
  			margin:0;
  		}
  		
        table, th, td {
            border: 1px solid black;
            text-align: center;
        }	
#foot{
    bottom: 0;
	top:85%;
	width:100%;
	height:60px;
	left: 0;
	position:absolute;
	display:flex;
	align-items:center;
	border: 5px solid #B8B8B8;
}
#foot *{
    display: inline;
    bottom: 0;
}
#foot li a{
	text-decoration: none;
	color: black;
	margin-left: 3%	 ;
	font-size: 14px;
	padding: 2px;
}
#foot ul{
	list-style-type: none;
	margin-left: 80px;
}
#foot h4{
	font-size: 12px;
	margin-left: 4%;
}   
    </style>   
    </head>
    <body>
	<a href="pending.php"<header id="header1"><img id="logo" src="../assets/images/aitam.png">
		<h1>AITAM INNOVATION HUB</h1>
		<ul>
			<li><p style="font-size:15px;"> K. Kotturu, Tekkali, <br>Srikakulam Dist., A.P.<br> (AITAM College, Tekkali) </p></li>
		</ul>
	</header></a>

<div style="margin-top:100px;margin-left:20px;display: inline-flex;">
    <div class="card" style="color: black;">
        <h4>Project Approval Document</h4>
        <br>
        <h5><b>Project Title </b>: <?PHP echo $project_row['project_title'];?>  </h5>
        <h5><b>Project Id </b>: <?PHP echo $project_row['proposal_id'];?></h5>
        <h5><b>Estimated Amount </b>: <?PHP echo $project_row['estimated_amount'];?> </h5>
        <h5><b>Approved Amount </b>: <?PHP echo $project_row['approved_amount'];?> </h5>
        <h5><b>Project Description </b>: <?PHP echo $project_row['project_description'];?></h5>
        <br>
        <h6>Applicant Details</h6>
		<table> 
            <tr>
                <th>Applicant Name</th><th> Applicant Roll Number</th><th> Year</th><th> Applicant Branch</th>
            </tr>

            <tr>
                <td><?PHP  echo $applicant_row['first_name']."".$applicant_row['last_name'];?></td>
                <td><?PHP echo $applicant_row['id_number'];?></td>
                <td><?PHP echo $applicant_row['year'];?></td>
                <td><?PHP echo $applicant_row['beanch'];?></td>
            </tr>
            
           
        </table>
        <br>
        <h6>Team Details</h6>
        <div class="table-responsive">
                                    <table class="table">
                                      <tr><th>Sno</th> <th>Name</th> <th>Roll Number</th> <th>Year</th><th>Branch</th></tr>
                                      <?PHP 
                                      $team="SELECT * FROM  `team_details` WHERE  `proposal_id`='$Proposal_Id'";
                                      $team_sql= mysqli_query($connect,$team);
                                      $sno=1;
                                      while ($team_row= mysqli_fetch_array($team_sql)) {
                                       echo "<tr>
                                       <td>".$sno."</td> <td>".$team_row['name']."</td><td>".$team_row['id_number']."</td><td>".$team_row['year']."</td><td>".$team_row['branch']."</td>
                                       </tr>";
                                       $sno++;
                                      }
                                      ?>
                                    </table>
                                    </div>
        <br>
        <table style="margin-top:650px;" >
            <tr>
                <td style="padding-bottom: 50px;">
                    Department Admin<br>
                    
                </td>
                <td style="padding-bottom: 50px;">
                    Central Admin<br>
                </td>
                <td style="padding-bottom: 50px;">
                     Admin<br>
                </td>
            </tr>
        </table>


	</div>
</div>
	<footer id="foot"  style="margin-top:110px;"><h4><i class="fa fa-copyright" style="font-size: 12px;"></i><span> Desgin and Developed by AITAM developers club  </span>   &copy; COPYRIGHTS ARE RESERVED.</h4>
	    <ul>
			<li><a href="http://aitamsac.in/">aitamsac.in</a></li>
			
        </ul>
    </footer>
    <!--  core JavaScript & Jquery-->
    <script src="../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../assets/js/other_scripts.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../assets/js/dashboard_js.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>