$(document).ready(function () {

    $("#send").click(function (e) {
        $('#addCourses').validate({
            rules: {
                courseTitle: {
                    required: true
                },
                duration: {
                    required: true
                },
                assignedLecturer: {
                    required: true
                },
                img_show: {
                    required: true
                }
            },
            messages: {
                courseTitle: "You are required to fill this field",
                duration: "You are required to fill this field",
                assignedLecturer: "You are required to select a field",
                img_file: "You are required to fill this field",
            },
            submitHandler: submitForm
        });

        function submitForm() {
            var data = $("#addCourses").serialize();
            $.ajax({
                type: 'POST',
                url: '../../models/controller/addCourses.php',
                data: data,
                beforeSend: function () {
                    $("#send").html('Submitting Leave..');
                    $("#send").attr("disabled", true);
                },
                success: function (response) {
                    if (response == 'created') {
                        // get_table_data();
                        // get_pagination();
                        $("#send").html('<i class="fa fa-save"></i>&ensp;Submit Log');
                        $("#send").attr("disabled", false);
                        $("#addCourses")[0].reset();
                        $(".modal").modal('hide');
                        Swal({
                            position: 'center',
                            type: 'success',
                            title: 'Registration Successfull',
                            showConfirmButton: false,
                            timer: 2500
                        });
                    } else {
                        // get_table_data();
                        // get_pagination();
                        $("#send").html('<i class="fa fa-save"></i>&ensp;Create');
                        $("#send").attr("disabled", false);
                        $("#addCourses")[0].reset();
                        $(".modal").modal('hide');
                        Swal({
                            type: 'error',
                            title: response,
                            text: 'Please go add your Referral Code on your profile',
                        })
                        // toastr.error(response,'Dange Alert',{timeOut:20000});
                    }
                }
            });// ends create ajax 
        }

    });

   



    $("#saveUpdate").click(function (e) {
        var id = $("#viewId").val();
        var token = $("#viewToken").val();
        $('#editCourseDetails').validate({
            rules: {
                courseTitle: {
                    required: true
                },
                editDescription: {
                    required: true
                }
            },
            messages: {
                courseTitle: "You are required to fill this field",
                editDescription: "You are required to fill this field",
            },
            submitHandler: submitForm
        });

        function submitForm() {
            var data = $("#editCourseDetails").serialize();
            $.ajax({
                type: 'POST',
                url: '../../models/controller/editCourseDetails.php',
                data: data,
                beforeSend: function () {
                    $("#saveUpdate").html('Submitting Leave..');
                    $("#saveUpdate").attr("disabled", true);
                },
                success: function (response) {
                    if (response == 'created') {
                        // loadDescription();
                        // // get_pagination();
                        $("#saveUpdate").html('<i class="fa fa-save"></i>&ensp;Submit Log');
                        $("#saveUpdate").attr("disabled", false);
                        $("#editCourseDetails")[0].reset();
                        $(".modal").modal('hide');
                        Swal({
                            position: 'center',
                            type: 'success',
                            title: 'Registration Successfull',
                            showConfirmButton: false,
                            timer: 3000
                        });
                        window.location.href = "viewCourse.php?id=" + id + "&token=" + token;
                    } else {
                        // get_pagination();
                        $("#saveUpdate").html('<i class="fa fa-save"></i>&ensp;Create');
                        $("#saveUpdate").attr("disabled", false);
                        $("#editCourseDetails")[0].reset();
                        $(".modal").modal('hide');
                        Swal({
                            type: 'error',
                            title: response,
                            text: 'Please go add your Referral Code on your profile',
                        })
                        // toastr.error(response,'Dange Alert',{timeOut:20000});
                    }
                }
            });// ends create ajax 
        }

    });

});