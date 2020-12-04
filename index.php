<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Idea Management</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- shortcut icon-->
    <link rel="shortcut icon" href="assets/images/logo.jpg" />
    <!-- Font-->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/register_nunito-font.css">
    <link href="assets/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="assets/css/register_style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        @media only screen and (max-width:575px) {
            #login{
                margin:5% 0 0 30%;
            }
        }
    </style>
</head>

<body>
    <div class="page-content">
        <div class="wizard-v5-content">
            <div class="wizard-form">
                <form class="form-register" id="form-register" action="proposal_php.php" method="post" enctype="multipart/form-data">
                    <div id="form-total" style="padding:75px;">
                        <!-- SECTION 1 -->
                        <section id="applicant_details">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm rounded-pill" style="background-color:#2ECC71 ;">
                                        <h6 style="margin:0% 0 0 10%;color:#fff;padding:5%;">
                                            <span class="step-icon"><i class="fa fa-check" aria-hidden="true"></i></span>
                                            <span class="step-text">Applicant Details</span>
                                        </h6>
                                    </div>
                                    <div class="col-sm">

                                    </div>
                                    <div class="col-sm">

                                    </div>
                                </div>
                            </div><br>

                            <div class="inner">
                                <div class="form-row">
                                    <div class="form-holder">
                                        <label for="first_name">First Name</label>
                                        <input type="text" placeholder="ex: Jayachandra" onkeyup="manage(this)" class="form-control" id="first_name" name="first_name">
                                    </div>
                                    <div class="form-holder">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" placeholder="ex: Goteti" onkeyup="manage(this)" class="form-control" id="last_name" name="last_name">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder">
                                        <label for="id_number">Id Number</label>
                                        <input type="text" placeholder="ex: 18A51A0515" onkeyup="manage(this)" class="form-control" id="id_number" name="id_number">
                                    </div>
                                    <div class="form-holder">
                                        <label for="contact_number">Contact Number</label>
                                        <input type="tel" placeholder="ex: 9491694195" onkeyup="manage(this)" class="form-control" id="contact_number" name="contact_number">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div id="radio">
                                        <label for="appilicant_type">Appilicant Type </label>
                                        <br>
                                        <input type="radio" name="appilicant_type" value="Student" onkeyup="manage(this)" id="student"> Student
                                        <input type="radio" name="appilicant_type" value="Faculty" onkeyup="manage(this)" id="faculty"> Faculty
                                    </div>
                                </div>
                                <div class="form-row form-row-date">
                                    <div class="form-holder form-holder-2" style="display:none;" id="student_select">
                                        <label for="branch" class="special-label">Branch</label>
                                        <select name="branch" id="branch" class="form-control" onkeyup="manage(this)">
											<option value="Select" selected>-----Select-----</option>
											<option value="cse">CSE</option>
											<option value="ece">ECE</option>
                                            <option value="it">IT</option>
                                            <option value="eee">EEE</option>
											<option value="mech">MECH</option>
											<option value="civil">CIVIL</option>
                                        </select>
                                        <label for="year" class="special-label">Year</label>
                                        <select name="year" id="year" class="form-control" onkeyup="manage(this)">
											<option value="" selected>-----Select-----</option>
											<option value="1st">1st Year</option>
											<option value="2nd">2nd Year</option>
											<option value="3rd">3rd Year</option>
											<option value="4th">4th Year</option>
                                        </select>
                                        <label for="section" class="special-label">Section</label>
                                        <select name="section" id="section" class="form-control" onkeyup="manage(this)">
											<option value="Select" selected>-----Select-----</option>
											<option value="A">A Section</option>
											<option value="B">B Section</option>
											<option value="C">C Section</option>

										</select>
                                    </div>
                                    <div class="form-holder form-holder-2" style="display:none;" id="faculty_select">
                                        <label for="f_branch" class="special-label">Branch</label>
                                        <select name="f_branch" id="f_branch" class="form-control" onkeyup="manage(this)">
											<option value="Select" selected>-----Select-----</option>
											<option value="cse">CSE</option>
											<option value="ece">ECE</option>
                                            <option value="it">IT</option>
                                            <option value="eee">EEE</option>
											<option value="mech">MECH</option>
                                            <option value="civil">CIVIL</option>
                                            <option value="basic science and humanities">Basic science and Humanities</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="email">Email</label>
                                        <input type="text" placeholder="ex: aitamtekkali@gmail.com" onkeyup="manage(this)" class="form-control" id="email" name="email">
                                        <span><i class="zmdi zmdi-pin"></i></span>
                                    </div>
                                </div>
                            </div>


                            <div class="form-row">
                                <button type="button" class="btn btn-success" id="applicant_next_1" style="margin-left:90%;" style="float:right;" disabled>Next</button>
                            </div>

                        </section>
                        <!-- SECTION 2 -->
                        <section style="display:none;" id="team_details">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">

                                    </div>
                                    <div class="col-sm rounded-pill" style="background-color:#2ECC71 ;">
                                        <h6 style="margin:0% 0 0 10%;color:#fff;padding:5%;">
                                            <span class="step-icon"><i class="fa fa-check" aria-hidden="true"></i></span>
                                            <span class="step-text">Applicant Details</span>
                                        </h6>
                                    </div>
                                    <div class="col-sm">

                                    </div>
                                </div>
                            </div><br>

                            <div class="inner">
                                <div id="team_member_1" class="add_member">
                                    <h5>Member-1</h5>
                                    <div class="form-group">
                                        <input type="text" name="team_member_name_1" class="form-control" id="card-number" placeholder="Full Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="team_member_id_1" class="form-control" id="card-number" placeholder="Team Member Id Number">
                                    </div>
                                    <div class="form-group">
                                        <select name="branch_1" id="card-type" class="form-control">
                                        <option value="" disabled selected>Select Your Branch</option>
                                        <option value="CSE">CSE</option>
                                        <option value="ECE">ECE</option>
                                        <option value="IT">IT</option>
                                        <option value="EEE">EEE</option>
                                        <option value="MECH">MECH</option>
                                        <option value="CIVIL">CIVIL</option>
                                        <option value="BS">BS</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="year_1" id="card-type" class="form-control">
                                        <option value="" disabled selected>Select Year</option>
                                        <option value="1">1st</option>
                                        <option value="2">2nd</option>
                                        <option value="3">3rd</option>
                                        <option value="4">4th</option>
                                    </select>
                                    </div>

                                    <br><br>
                                    <a href="#" class="btn btn-info add" id="add_1">Add Member &raquo;</a><br><br>
                                </div>
                                <!-------------------------->
                                <div style="display:none;" id="team_member_2" class="add_member">
                                    <h5>Member-2</h5>
                                    <div class="form-group">
                                        <input type="text" name="team_member_name_2" class="form-control" id="card-number" placeholder="Full Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="team_member_id_2" class="form-control" id="card-number" placeholder="Team Member Id Number">
                                    </div>
                                    <div class="form-group">
                                        <select name="branch_2" id="card-type" class="form-control">
                                        <option value="" disabled selected>Select Your Branch</option>
                                        <option value="CSE">CSE</option>
                                        <option value="ECE">ECE</option>
                                        <option value="IT">IT</option>
                                        <option value="EEE">EEE</option>
                                        <option value="MECH">MECH</option>
                                        <option value="CIVIL">CIVIL</option>
                                        <option value="BS">BS</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="year_2" id="card-type" class="form-control">
                                        <option value="" disabled selected>Select Year</option>
                                        <option value="1">1st</option>
                                        <option value="2">2nd</option>
                                        <option value="3">3rd</option>
                                        <option value="4">4th</option>
                                    </select>
                                    </div>
                                    <br><br>
                                    <a href="#" class="btn btn-secondary" id="pre_1">&laquo; Previous</a>
                                    <a href="#" class="btn btn-info add" id="add_2">Add Member &raquo;</a>
                                    <br><br>
                                </div>
                                <!-------------------------->
                                <div style="display:none;" id="team_member_3" class="add_member">
                                    <h5>Member-3</h5>
                                    <div class="form-group">
                                        <input type="text" name="team_member_name_3" class="form-control" id="card-number" placeholder="Full Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="team_member_id_3" class="form-control" id="card-number" placeholder="Team Member Id Number">
                                    </div>
                                    <div class="form-group">
                                        <select name="branch_3" id="card-type" class="form-control">
                                        <option value="" disabled selected>Select Your Branch</option>
                                        <option value="CSE">CSE</option>
                                        <option value="ECE">ECE</option>
                                        <option value="IT">IT</option>
                                        <option value="EEE">EEE</option>
                                        <option value="MECH">MECH</option>
                                        <option value="CIVIL">CIVIL</option>
                                        <option value="BS">BS</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="year_3" id="card-type" class="form-control">
                                        <option value="" disabled selected>Select Year</option>
                                        <option value="1">1st</option>
                                        <option value="2">2nd</option>
                                        <option value="3">3rd</option>
                                        <option value="4">4th</option>
                                    </select>
                                    </div>
                                    <br><br>
                                    <a href="#" class="btn btn-secondary" id="pre_2">&laquo; Previous</a>
                                    <a href="#" class="btn btn-info add" id="add_3">Add Member &raquo;</a>
                                    <br><br>
                                </div>
                                <!-------------------------->
                                <div style="display:none;" id="team_member_4" class="add_member">
                                    <h5>Member-4</h5>
                                    <div class="form-group">
                                        <input type="text" name="team_member_name_4" class="form-control" id="card-number" placeholder="Full Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="team_member_id_4" class="form-control" id="card-number" placeholder="Team Member Id Number">
                                    </div>
                                    <div class="form-group">
                                        <select name="branch_4" id="card-type" class="form-control">
                                        <option value="" disabled selected>Select Your Branch</option>
                                        <option value="CSE">CSE</option>
                                        <option value="ECE">ECE</option>
                                        <option value="IT">IT</option>
                                        <option value="EEE">EEE</option>
                                        <option value="MECH">MECH</option>
                                        <option value="CIVIL">CIVIL</option>
                                        <option value="BS">BS</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="year_4" id="card-type" class="form-control">
                                        <option value="" disabled selected>Select Year</option>
                                        <option value="1">1st</option>
                                        <option value="2">2nd</option>
                                        <option value="3">3rd</option>
                                        <option value="4">4th</option>
                                    </select>
                                    </div>
                                    <br><br>
                                    <a href="#" class="btn btn-secondary" id="pre_3">&laquo; Previous</a>
                                    <a href="#" class="btn btn-info add" id="add_4">Add Member &raquo;</a>
                                    <br><br>
                                </div>
                                <!-------------------------->
                                <div style="display:none;" id="team_member_5" class="add_member">
                                    <h5>Member-5</h5>
                                    <div class="form-group">
                                        <input type="text" name="team_member_name_5" class="form-control" id="card-number" placeholder="Full Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="team_member_id_5" class="form-control" id="card-number" placeholder="Team Member Id Number">
                                    </div>
                                    <div class="form-group">
                                        <select name="branch_5" id="card-type" class="form-control">
                                        <option value="" disabled selected>Select Your Branch</option>
                                        <option value="CSE">CSE</option>
                                        <option value="ECE">ECE</option>
                                        <option value="IT">IT</option>
                                        <option value="EEE">EEE</option>
                                        <option value="MECH">MECH</option>
                                        <option value="CIVIL">CIVIL</option>
                                        <option value="BS">BS</option>
                                    </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="year_5" id="card-type" class="form-control">
                                        <option value="" disabled selected>Select Year</option>
                                        <option value="1">1st</option>
                                        <option value="2">2nd</option>
                                        <option value="3">3rd</option>
                                        <option value="4">4th</option>
                                    </select>
                                    </div>
                                    <br><br>
                                    <a href="#" class="btn btn-info" id="pre_4">&laquo; Previous</a>
                                    <br><br>
                                </div>
                                <!-------------------------->
                            </div>
                            <div class="form-row">
                                <button type="button" class="btn btn-secondary" id="previous_1">Previous</button>
                                <button type="button" class="btn btn-success" id="applicant_next_2" style="margin-left:75%;" style="float:right;">Next</button>
                            </div>

                        </section>
                        <!-- SECTION 3 -->
                        <section style="display:none;" id="project_details">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm">

                                    </div>
                                    <div class="col-sm">

                                    </div>
                                    <div class="col-sm rounded-pill" style="background-color:#2ECC71 ;">
                                        <h6 style="margin:0% 0 0 10%;color:#fff;padding:5%;">
                                            <span class="step-icon"><i class="fa fa-check" aria-hidden="true"></i></span>
                                            <span class="step-text">Project Details</span>
                                        </h6>
                                    </div>
                                </div>
                            </div><br>

                            <div class="inner">
                                <div class="form-row">
                                    <div class="form-holder">
                                        <label for="project_title">Project Title</label>
                                        <input type="text" placeholder="ex: AIM SYSTEMS" onkeyup="manage(this)" class="form-control" id="project_title" name="project_title">
                                    </div>
                                    <div class="form-holder">
                                        <label for="estimated_ammount">Estimated Ammount</label>
                                        <input type="text" placeholder="ex: 1000" onkeyup="manage(this)" class="form-control" id="estimated_ammount" name="estimated_ammount">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="project_description">Project Description</label>
                                        <textarea onkeyup="manage(this)" class="form-control" id="project_description" name="project_description" placeholder=" "></textarea>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-holder form-holder-2">
                                        <label for="project_file">Project File</label>
                                        <input type="file" name="myfile" class="form-control" id="" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row ">
                                <button type="button" class="btn btn-secondary" id="previous_2">Previous</button>
                                <input type="submit" name="proposal_submit" class="btn btn-success" id="applicant_next_3" style="margin-left:75%;" style="float:right;" value="Submit" disabled>
                            </div>
                        </section>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm"></div>
                                <a href="login.php" id="login">
                                    <div class="col-sm rounded-pill" style="text-align:center;background-color:#fff;">
                                        Login
                                    </div>
                                </a>
                                <div class="col-sm"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!------------------------------------>
    <script>
    </script>
    <!------------------------------------>
    <script src="assets/js/other_scripts.js"></script>
</body>

</html>