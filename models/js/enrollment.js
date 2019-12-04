$(document).ready(function () {    

        $("body").on("click", ".enrollButton", function () {
            var courseId = $("#courseId").val();
            var studentId = $("#studentId").val();
            var token = $("#token").val();
            $.ajax({
                type: 'GET',
                url: '../../models/controller/checkEnrollment.php',
                data: { courseId: courseId,
                        studentId: studentId 
                        },
                success: function (response) {
                    if (response == 'yes') {
                        Swal({
                            position: 'center',
                            type: 'success',
                            title: 'You have enrolled for the course already',
                            url: "viewCourse.php?id=" + courseId + "&token=" + token
                            // timer: 2500
                        });
                        // window.location.href = "viewCourse.php?id=" + courseId + "&token=" + token;
                    } else if(response == "no") {
                        Swal({
                            position: 'center',
                            type: 'success',
                            title: "Thanks for enrolling to the Course",
                            url: "viewCourse.php?id=" + courseId + "&token=" + token
                        });
                        // window.location.href = "viewCourse.php?id=" + courseId + "&token=" + token;
                        // toastr.error(response,'Dange Alert',{timeOut:20000});
                    }
                }
            });
        });
});