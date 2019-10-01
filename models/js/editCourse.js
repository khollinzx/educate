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

   



    $("body").on("click", "#saveUpdate", function () {
        var id = $("#editDescription").val();

        alert(id);

    });

});