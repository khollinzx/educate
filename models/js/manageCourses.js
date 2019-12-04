$(document).ready(function () {
    get_course_table();


    function get_course_table(page) {
        var userId = $("#userId").val();
        $.ajax({
            url: '../../models/controller/getLecturerCoursesIndividually.php',
            type: 'GET',
            data: { 
                page: page , 
                userId: userId },
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
            row += '<td class="text-left upper">' + value.i + '</td>';
            row += '<td class="text-left upper">' + value.courseTitle + '</td>';
            if (value.duration >= 2) {
                row += '<td class="text-center upper">' + value.duration + ' Months </td>';
            } else {
                row += '<td class="text-center upper">' + value.duration + ' Month </td>';
            }
            row += '<td class="text-center upper">' + value.user_id + '</td>';
            row += '<td class="text-center upper" data-id="' + value.id + '">';
            if (value.status == 1) {
                row += '<button style="background-color:white" class="btn deactivate"><i style="color:green; font-size:140%" class="fa fa-toggle-on"></i></button> ';
            } else if (value.status == 0) {
                row += '<button style="background-color:white" class="btn activate"><i style="color:green; font-size:140%" class="fa fa-toggle-off"></i></button>';
            }
            row += '</td>';
            // button part
            row += '<td class="text-center" data-id="' + value.id + '">';
            row += '<a href="enrolledStudent.php?id=' + value.id + '&amp;token=' + value.tokenId +'"class="btn btn-xs btn-primary view-members"> <i class="fa fa-eye"></i> </a>';
            row += '<a href="addquestion.php?id=' + value.id + '&amp;token=' + value.tokenId + '" class="btn btn-xs btn-warning view-members"> <i class="fa fa-edit"></i> </a>';
            row += '<button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>';
            row += '</td>';
            row += '</tr>';
        });

        $("#courseTableContent").html(row);


    }


    // $("body").on("click", "#editPage", function () {
    //     var id = $("#editId").val();

    //     window.location.href = "editCourse.php?id=" + id;

    // });

    $("body").on("click", ".deactivate", function () {
        var courseId = $(this).parent("td").data('id');
        $.ajax({
            type: 'GET',
            url: '../../models/controller/deactivate.php',
            data: { courseId: courseId },
            success: function (response) {
                if (response == 'okay') {
                    get_course_table();
                    Swal({
                        position: 'center',
                        type: 'success',
                        title: 'Course has been Deactivated',
                        showConfirmButton: false,
                        timer: 2500
                    });
                } else {
                    get_course_table();
                    Swal({
                        type: 'error',
                        title: response,
                        text: 'Please go add your Referral Code on your profile',
                    })
                    // toastr.error(response,'Dange Alert',{timeOut:20000});
                }
            }
        });
    });

    $("body").on("click", ".activate", function () {
        var courseId = $(this).parent("td").data('id');
        $.ajax({
            type: 'GET',
            url: '../../models/controller/activate.php',
            data: { courseId: courseId },
            success: function (response) {
                if (response == 'okay') {
                    get_course_table();
                    Swal({
                        position: 'center',
                        type: 'success',
                        title: 'Course has been Activated',
                        showConfirmButton: false,
                        timer: 2500
                    });
                } else {
                    get_course_table();
                    Swal({
                        type: 'error',
                        title: response,
                        text: 'Please go add your Referral Code on your profile',
                    })
                    // toastr.error(response,'Dange Alert',{timeOut:20000});
                }
            }
        });
    });




});