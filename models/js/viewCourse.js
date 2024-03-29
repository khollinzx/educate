$(document).ready(function () {
    displayLecturer();
    image_loaded();
    // get_course_table();
    loadDescription();
    loadContentFile();
    pdf_upload() 

    function displayLecturer() {
        $.ajax({
            url: '../../models/controller/displayLecturer.php',
            data: 'loadLecturer',
            success: function (html) {
                $("#assignedLecturer").html(html);
            }
        });
    }

    function loadContentFile() {
        var id = $("#editId").val();
        $.ajax({
            url: '../../models/controller/loadContentFile.php',
            type: 'GET',
            data: { id: id },
            success: function (html) {
                $("#viewMaterial").html(html);
            }
        });
    }
    

    function loadDescription() {
        var id = $("#editId").val();
        $.ajax({
            url: '../../models/controller/loadDescription.php',
            type: 'GET',
            data: {id: id},
            success: function (html) {
                var inputVal = $("#txtinput").val(html);
                $("#editDescription").text(inputVal);
                $("#loadDescription").html(html);
            }
        });
    }

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
                        window.location.href = "viewCourse.php?id=" + id + "&token=" + token; 
                        Swal({
                            position: 'center',
                            type: 'success',
                            title: 'Registration Successfull',
                            showConfirmButton: false,
                            timer: 2500
                        });
                    } else {
                        loadDescription();
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

        $.ajax({
            url: '../../models/controller/getCourses.php',
            type: 'GET',
            data: { page: page },
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
            row += '<tr>';
            row += '<td class="text-center upper">' + value.courseTitle + '</td>';
            row += '<td class="text-center upper">' + value.duration + '</td>';
            row += '<td class="text-center upper">' + value.user_id + '</td>';
            row += '<td class="text-center upper">';
            if (value.status == 1) {
                row += '<span class="label label-success">active</span>';
            } else if (value.status == 0) {
                row += '<span class="label label-danger">inactive</span>';
            }
            row += '</td>';
            // button part
            row += '<td class="text-center" data-id="' + value.id + '">';
            row += '<a href="viewCourse.php?tokenId=' + value.tokenId + '&amp;id=' + value.id + '" class="btn btn-xs btn-primary view-members"> <i class="fa fa-eye"></i> </a>';
            row += '<button class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></button>';
            row += '<button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>';
            row += '</td>';
            row += '</tr>';
        });

        $("#courseTableContent").html(row);


    }


    $("body").on("click", "#editPage", function () {
        var id = $("#editId").val();
        var token = $("#editToken").val();

        window.location.href = "editCourse.php?id="+id+"&token="+token; 

    });

    $("body").on("click", "#opt1", function (evt) {
        $('#appendment').append('<div class="form-group" id="matOp1"> <label for= "materialContent"> Type The Link Here </label > <input type="url" class="form-control" id="links" name="materialContent" value="https://"> </div>');
        $('#matOp2').remove();

    });

    $("body").on("click", "#opt2", function (evt) {
        $('#appendment').append('<div class="form-group" id="matOp2"> <label for= "materialContent"> Select the Material </label > <input type="file" class="form-control col-md-12" name="pdf_file" id="pdf_file" accept="application/pdf" style="border:1px solid grey; border-radius: 3px;"><input type="hidden" class="form-control" name="materialContent"  id="pdf_show"> </div>');
        $('#matOp1').remove();
    });

    function pdf_upload() {
        $(document).on("change", "#pdf_file", function () {
            var pdf_property = document.getElementById("pdf_file").files[0];
            var pdf_name = pdf_property.name;
            var pdf_extension = pdf_name.split(".").pop().toLowerCase();
            $("#pdf_show").val(pdf_name);
            var form_data2 = new FormData();
            form_data2.append("pdf_file", pdf_property);

            $.ajax({
                url: "../../models/controller/uploadPdf.php",
                method: "POST",
                data: form_data2,
                contentType: false,
                cache: false,
                processData: false
            });
        });
    }

    $("#sendContent").click(function (e) {
        $('#materialValues').validate({
            rules: {
                chapterNo: {
                    required: true
                },
                materialTitle: {
                    required: true
                },
                courseId: {
                    required: true
                },
                opt: {
                    required: true
                },
                materialContent: {
                    required: true
                },
                pdf_file: {
                    required: true
                },
            },
            messages: {
                chapterNo: "You are required to fill this field",
                materialTitle: "You are required to fill this field",
                opt: "You are required to fill this field",
                materialContent: "You are required to fill this field",
                pdf_file: "Please select the PDF file",
            },
            submitHandler: submitForm
        });

        function submitForm() {
            var data = $("#materialValues").serialize();
            $.ajax({
                type: 'POST',
                url: '../../models/controller/addMaterialValues.php',
                data: data,
                beforeSend: function () {
                    $("#sendContent").html('Submitting Leave..');
                    $("#sendContent").attr("disabled", true);
                },
                success: function (response) {
                    if (response == 'created') {
                        loadContentFile();
                        // loadDescription();
                        // // get_pagination();
                        $("#sendContent").html('<i class="fa fa-save"></i>&ensp;Submit Log');
                        $("#sendContent").attr("disabled", false);
                        $("#materialValues")[0].reset();
                        $(".modal").modal('hide');
                        Swal({
                            position: 'center',
                            type: 'success',
                            title: 'Contents Added Successfull',
                            showConfirmButton: false,
                            timer: 2500
                        });
                    } else {
                        loadContentFile();
                        // loadDescription();
                        // get_pagination();
                        $("#sendContent").html('<i class="fa fa-save"></i>&ensp;Submit Log');
                        $("#sendContent").attr("disabled", false);
                        $("#materialValues")[0].reset();
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