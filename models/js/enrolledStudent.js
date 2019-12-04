$(document).ready(function () {
    get_course_table();


    function get_course_table(page) {
        var id = $("#editId").val();
        $.ajax({
            url: '../../models/controller/getEnrolledStudent.php',
            type: 'GET',
            data: {
                page: page,
                id: id
            },
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
            row += '<tr role="row" class="odd">';
            // button part
            row += '<td class="text-center" data-id="' + value.id + '" hidden>';
            row += '<td class="text-left" >' + value.i + '</td>';
            row += '<td class="text-left upper">' + value.firstName + '</td>';
            row += '<td class="text-left upper">' + value.lastName + '</td>';
            row += '<td class="text-left upper">' + value.grade + '</td>';

            row += '<td class="text-center upper" data-id="' + value.id + '">';
            if (value.access == 1) {
                row += '<button style="background-color:white" class="btn deactivate"><i style="color:green; font-size:140%" class="fa fa-toggle-on"></i></button> ';
            } else if (value.access == 0) {
                row += '<button style="background-color:white" class="btn activate"><i style="color:green; font-size:140%" class="fa fa-toggle-off"></i></button>';
            }
            row += '</td>';
            row += '</tr>';
        });

        $("#loadEnrolledStudent").html(row);


    }


    // $("body").on("click", "#editPage", function () {
    //     var id = $("#editId").val();

    //     window.location.href = "editCourse.php?id=" + id;

    // });
    $("body").on("click", ".deactivate", function () {
        var courseId = $(this).parent("td").data('id');
        $.ajax({
            type: 'GET',
            url: '../../models/controller/deactiveQuizAccess.php',
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
            url: '../../models/controller/activeQuizAccess.php',
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