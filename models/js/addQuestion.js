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

    // displayLecturer();
    // image_loaded();
    // get_course_table();

    // function displayLecturer() {
    //     $.ajax({
    //         url: '../../models/controller/displayLecturer.php',
    //         data: 'loadLecturer',
    //         success: function (html) {
    //             $("#assignedLecturer").html(html);
    //         }
    //     });
    // }

    $("#addQuestion").click(function (e) {
        $('#questions').validate({
            rules: {
                question: {
                    required: true
                },
                opt1: {
                    required: true
                },
                opt2: {
                    required: true
                },
                opt3: {
                    required: true
                },
                opt4: {
                    required: true
                },
                qans: {
                    required: true
                },
                cousreId: {
                    required: true
                }
            },
            messages: {
                question: "You are required to fill this field",
                opt1: "You are required to fill this field",
                opt2: "You are required to fill this field",
                opt3: "You are required to select a field",
                opt4: "You are required to fill this field",
                qans: "You are required to select a field",
                cousreId: "You are required to fill this field",
            },
            submitHandler: submitForm
        });

        function submitForm() {
            var data = $("#questions").serialize();
            $.ajax({
                type: 'POST',
                url: '../../models/controller/addQuestionAnswer.php',
                data: data,
                beforeSend: function () {
                    $("#addQuestion").html('Submitting Leave..');
                    $("#addQuestion").attr("disabled", true);
                },
                success: function (response) {
                    if (response == 'created') {
                        // get_table_data();
                        // get_pagination();
                        $("#addQuestion").html('<i class="fa fa-save"></i>&ensp;Submit Log');
                        $("#addQuestion").attr("disabled", false);
                        $("#questions")[0].reset();
                        $(".modal").modal('hide');
                        Swal({
                            position: 'center',
                            type: 'success',
                            title: 'Question Added Successfull',
                            showConfirmButton: false,
                            timer: 2500
                        });
                    } else {
                        // get_table_data();
                        // get_pagination();
                        $("#addQuestion").html('<i class="fa fa-save"></i>&ensp;Create');
                        $("#addQuestion").attr("disabled", false);
                        $("#questions")[0].reset();
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
    // function image_loaded() {
    //     $(document).on("change", "#img_file", function () {
    //         var property = document.getElementById("img_file").files[0];
    //         var image_name = property.name;
    //         var image_extension = image_name.split(".").pop().toLowerCase();
    //         var image_size = property.size;
    //         if ($.inArray(image_extension, ["png", "jpg", "jpeg"]) === -1) {
    //             $("#msg").html("<div class='alert alert-danger' role='alert'>Invalid Format Selected</div>");
    //             // alert("invalid Image Format");
    //         }

    //         if (image_size > 200000) {
    //             $("#msg").html("<div class='alert alert-danger' role='alert'>Image File is too large</div>");
    //             // alert("invalid Image size");
    //         }
    //         else if (image_size <= 200000) {
    //             $("#msg").html("<div class='alert alert-success' role='alert'>This Image is Okay</div>");
    //             $("#img_show").val(image_name);
    //             var form_data = new FormData();
    //             form_data.append("img_file", property);
    //             $.ajax({
    //                 url: "../../models/controller/loadImage.php",
    //                 method: "POST",
    //                 data: form_data,
    //                 contentType: false,
    //                 cache: false,
    //                 processData: false,
    //                 beforeSend: function () {
    //                     $("#profileContent").html("<label class='atext-success' >Uploading Image ...</label>");
    //                 },
    //                 success: function (data) {
    //                     $("#profileContent").html(data);

    //                 }
    //             });
    //         }
    //     });
    // }


    // function get_course_table(page) {

    //     $.ajax({
    //         url: '../../models/controller/getCourses.php',
    //         type: 'GET',
    //         data: { page: page },
    //         dataType: 'json',
    //         beforeSend: function () {

    //         }
    //     }).done(function (data) {
    //         if (data.data != 'zero') {

    //             if (data.count != 0) {
    //                 //calling the manage data table function
    //                 manage_data_table(data.data);
    //             } else {
    //                 $("#nofill").html('NO RECORDED LEAVE FOUND');
    //             }

    //         } else {
    //             $("#nofill").html('<h3 class="text-center"> YOU HAVE NO ACTIVITIES FILLED IN YET</h3>');
    //         }

    //     });
    // }

    // $("body").on("click", ".pagination_link", function () {
    //     var page = $(this).attr("id");
    //     get_course_table(page);
    // });

    // //the manage data table function
    // function manage_data_table(data) {
    //     var row = '';
    //     $.each(data, function (key, value) {
    //         row += '<tr>';
    //         row += '<td class="text-left upper">' + value.courseTitle + '</td>';
    //         if (value.duration >= 2) {
    //             row += '<td class="text-center upper">' + value.duration + ' Months </td>';
    //         } else {
    //             row += '<td class="text-center upper">' + value.duration + ' Month </td>';
    //         }
    //         row += '<td class="text-left upper">' + value.user_id + '</td>';
    //         row += '<td class="text-center upper">';
    //         if (value.status == 1) {
    //             row += '<span class="label label-success">active</span>';
    //         } else if (value.status == 0) {
    //             row += '<span class="label label-danger">inactive</span>';
    //         }
    //         row += '</td>';
    //         // button part
    //         row += '<td class="text-center" data-id="' + value.id + '">';
    //         row += '<a href="viewCourse.php?tokenId=' + value.tokenId + '&amp;id=' + value.id + '" class="btn btn-xs btn-primary view-members"> <i class="fa fa-eye"></i> </a>';
    //         row += '<button class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></button>';
    //         row += '<button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>';
    //         row += '</td>';
    //         row += '</tr>';
    //     });

    //     $("#courseTableContent").html(row);


    // }




});

