        //---------------------------
        function manage() {
            //---------------------------
            var bt_1 = document.getElementById('applicant_next_1');
            var bt_3 = document.getElementById('applicant_next_3');
            //---------------------------
            if (first_name.value != '' && last_name.value != '' && id_number.value != '' && contact_number.value != '' && email.value != '') {


                if (branch.value != 'Select' && year.value != 'Select' && section.value != 'Select') {
                    bt_1.disabled = false;
                } else if (f_branch.value != 'Select') {
                    bt_1.disabled = false;
                } else {
                    bt_1.disabled = true;
                }
            } else {
                bt_1.disabled = true;
            }
            //---------------------------
            if (project_title.value != '' && estimated_ammount.value != '' && project_description.value != '') {
                bt_3.disabled = false;
            } else {
                bt_3.disabled = true;
            }
            //---------------------------
        }
        //---------------------------    
        $(document).ready(function() {
            //---------------------------
            $("#student").click(function() {
                $("#student_select").show();
                $("#faculty_select").hide();

            });
            $("#faculty").click(function() {
                $("#student_select").hide();
                $("#faculty_select").show();
            });
            //---------------------------
            //---------------------------
            $("#applicant_next_1").click(function() {
                $("#team_details").show();
                $("#applicant_details,#project_details").hide();

            });
            $("#applicant_next_2").click(function() {
                $("#project_details").show();
                $("#applicant_details,#team_details").hide();
            });

            $("#previous_1").click(function() {
                $("#applicant_details").show();
                $("#team_details,#project_details").hide();

            });
            $("#previous_2").click(function() {
                $("#team_details").show();
                $("#applicant_details,#project_details").hide();

            });
            //---------------------------
            //------- next ---------
            $("#add_1").click(function() {
                $("#team_member_2").show();
                $("#team_member_1,#team_member_3,#team_member_4,#team_member_5").hide();

            });
            $("#add_2").click(function() {
                $("#team_member_3").show();
                $("#team_member_1,#team_member_2,#team_member_4,#team_member_5").hide();

            });
            $("#add_3").click(function() {
                $("#team_member_4").show();
                $("#team_member_1,#team_member_2,#team_member_3,#team_member_5").hide();

            });
            $("#add_4").click(function() {
                $("#team_member_5").show();
                $("#team_member_1,#team_member_2,#team_member_3,#team_member_4").hide();

            });
            //------- Pre -----------
            $("#pre_1").click(function() {
                $("#team_member_2,#team_member_3,#team_member_4,#team_member_5").hide();
                $("#team_member_1").show();
            });
            $("#pre_2").click(function() {
                $("#team_member_1,#team_member_3,#team_member_4,#team_member_5").hide();
                $("#team_member_2").show();
            });
            $("#pre_3").click(function() {
                $("#team_member_1,#team_member_2,#team_member_4,#team_member_5").hide();
                $("#team_member_3").show();
            });
            $("#pre_4").click(function() {
                $("#team_member_1,#team_member_2,#team_member_3,#team_member_5").hide();
                $("#team_member_4").show();
            });
            //---------------------------   
            /*--- table filter ---*/
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            //---------------------------     
        });