$(document).ready(function () {

    // $("#listTable").DataTable({
    //     "ajax":{
    //         "processing": true,
    //         "serverSide": true,
    //         "url":"../../models/controller/getCoursesDataTable.php",
    //         "dataSrc":""
    //     },
    //     "columns":[
    //         { "data":"Course Title"},
    //         { "data": "Duration" }
    //     ]
    // });

    displayLecturer();
    image_loaded();
    get_course_table();

    function displayLecturer() {
        $.ajax({
            url: '../../models/controller/displayLecturer.php',
            data: 'loadLecturer',
            success: function (html) {
                $("#assignedLecturer").html(html);
            }
        });
    }

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

    // this function helps select an image file, check the image size and store the image in its prefered folder
    function image_loaded() {
        $(document).on("change", "#img_file", function () {
            var property = document.getElementById("img_file").files[0];
            var image_name = property.name;
            var image_extension = image_name.split(".").pop().toLowerCase();
            var image_size = property.size;
            if ($.inArray(image_extension, ["png", "jpg", "jpeg"]) === -1) {
                $("#msg").html("<div class='alert alert-danger' role='alert'>Invalid Format Selected</div>");
                // alert("invalid Image Format");
            }

            if (image_size > 200000) {
                $("#msg").html("<div class='alert alert-danger' role='alert'>Image File is too large</div>");
                // alert("invalid Image size");
            }
            else if (image_size <= 200000) {
                $("#msg").html("<div class='alert alert-success' role='alert'>This Image is Okay</div>");
                $("#img_show").val(image_name);
                var form_data = new FormData();
                form_data.append("img_file", property);
                $.ajax({
                    url: "../../models/controller/loadImage.php",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $("#profileContent").html("<label class='atext-success' >Uploading Image ...</label>");
                    },
                    success: function (data) {
                        $("#profileContent").html(data);

                    }
                });
            }
        });
    }


    function get_course_table(page) {
        var id = $("#lecturerId").val();
        $.ajax({
            url: '../../models/controller/getLecturerCourses.php',
            type: 'GET',
            data: { page: page , 
                    id: id },
            dataType: 'json',
            beforeSend: function () {

            }
        }).done(function (data) {
            if (data.data != 'zero') {

                if (data.count != 0) {
                    //calling the manage data table function
                    manage_data_table(data.data);
                } else {
                    $("#nofill").html('NO RECORDED LEAVE FOUND');
                }

            } else {
                $("#nofill").html('<h3 class="text-center"> YOU HAVE NO ACTIVITIES FILLED IN YET</h3>');
            }

        });
    }

    $("body").on("click", ".pagination_link", function () {
        var page = $(this).attr("id");
        get_course_table(page);
    });

    //the manage data table function
    function manage_data_table(data) {
        var row = '';
        $.each(data, function (key, value) {
            row += '<div class="col-sm-6 col-md-4">';
            row += '<div class="thumbnail">';
            row += '<a href=""> ';
            row += '<img src="../../uploads/images/'+ value.image +'" alt="...">';
            row += '</a>';
            row += '<div class="caption">';
            // button part
            row += '<h3 class="text-center"><b>'+ value.courseTitle +'</b></h3>';
            if(value.duration >= 2){
                row += '<p class="text-center">' + value.duration + ' Months </p>';
            }else{
                row += '<p class="text-center">' + value.duration + ' Month </p>';
            }
            row += '<p><a href="viewCourse.php?id='+ value.id +'&amp;token='+ value.tokenId +'" class="btn btn-block btn-flat btn-lg btn-primary" role="button">View Course</a> </p>';
            row += '</div>';
            row += '</div>';
            row += '</div>';
        });

        $("#coursePlate").html(row);

        
            
                
                    
                        
                        
                    
          
            

    }




});

