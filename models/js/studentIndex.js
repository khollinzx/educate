$(document).ready(function () {
    // var studentId = $("#studentId").val();
    // checkEnrollment(studentId);
    // image_loaded();
    get_course_table();

    // function checkEnrollment(arg) {
        
    //     var courseId = $("#courseId").val();
    //     $.ajax({
    //         url: '../../models/controller/checkEnrollment.php',
    //         type: 'GET',
    //         data: {
    //             courseId: courseId,
    //             studentId: studentId
    //         },
    //         dataType: 'json',
    //         success: function (data) {
    //             $.each(data, function (key, value){
    //                 if(value.word == "enrolled"){
    //                 $("#offEnroll").show();
    //                 $("#onEnroll").hide();
    //             }else{
    //                 $("#offEnroll").hide();
    //                 $("#onEnroll").show();
    //             }
    //             });
    //         }
    //     });
    // }


    function get_course_table(page) {
        var id = $("#studentId").val();
        $.ajax({
            url: '../../models/controller/getMyCourses.php',
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
            row += '<div class="col-sm-6 col-md-4">';
            // row += '<input type="text" id="courseId" value="'+ value.id +'">';
            row += '<div class="thumbnail">';
            row += '<a href=""> ';
            row += '<img src="../../uploads/images/' + value.image + '" alt="...">';
            row += '</a>';
            row += '<div class="caption">';
            // button part
            row += '<h3 class="text-center"><b>' + value.courseTitle + '</b></h3>';

            if (value.status == 1) {
                row += '<p id="offEnroll" ><a href="viewCourse.php?id=' + value.id + '&amp;token=' + value.tokenId + '" class="btn btn-primary btn-block btn-flat btn-lg" role="button">View Course</a> </p>';
            } else if (value.status == 0) {
                row += '<p id="offEnroll" ><a href="assessment.php?id=' + value.id + '&amp;token=' + value.tokenId + '" class="btn btn-success btn-block btn-flat btn-lg" role="button">Take Assessment </a> </p>';
            }
            row += '</div>';
            row += '</div>';
            row += '</div>';
        });

        $("#myCourses").html(row);
    }




});

