$(document).ready(function () {
    get_course_table();


    function get_course_table(page) {
        var id = $("#studentId").val();
        $.ajax({
            url: '../../models/controller/getStudentOfferedCourse.php',
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
            row += '<td class="text-left upper">' + value.courseCode + '</td>';
            row += '<td class="text-left upper">' + value.courseTitle + '</td>';
            row += '<td class="text-left upper">' + value.grade + '</td>';
            row += '</tr>';
        });

        $("#courseTableContent").html(row);


    }


    // $("body").on("click", "#editPage", function () {
    //     var id = $("#editId").val();

    //     window.location.href = "editCourse.php?id=" + id;

    // });




});