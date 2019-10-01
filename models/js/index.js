$(document).ready(function () {
    displayRole();
    get_lecturers_table();
    get_students_table();

    function displayRole() {
        $.ajax({
            url: '../../models/controller/displayRole.php',
            data: 'loadRoles',
            success: function (html) {
                $("#userRole").html(html);
            }
        });
    }

    $("#send").click(function (e) {
        $('#createUser').validate({
            rules: {
                firstName: {
                    required: true
                },
                lastName: {
                    required: true
                },
                email: {
                    required: true
                },
                phoneNumber: {
                    required: true
                },
                userRole: {
                    required: true
                }
            },
            messages: {
                firstName: "You are required to fill this field",
                lastName: "You are required to fill this field",
                email: "You are required to fill this field",
                phoneNumber: "You are required to fill this field",
                userRole: "You are required to select this field",
            },
            submitHandler: submitForm
        });

        function submitForm() {
            var data = $("#createUser").serialize();
            $.ajax({
                type: 'POST',
                url: '../../models/controller/addUsers.php',
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
                        $("#createUser")[0].reset();
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
                        $("#createUser")[0].reset();
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

    function get_lecturers_table(page) {

        $.ajax({
            url: '../../models/controller/getLecturers.php',
            type: 'GET',
            data: { page: page },
            dataType: 'json',
            beforeSend: function () {

            }
        }).done(function (data) {
            if (data.data != 'zero') {

                    manage_lecturer_data_table(data.data);

            } else {
                $("#viewLecturers").html('<h4 class="text-center">NO RECORD FOUND</h4>');
            }

        });
    }

    $("body").on("click", ".lecturerPagination_link", function () {
        var page = $(this).attr("id");
        get_lecturers_table(page);
    });

    //the manage data table function
    function manage_lecturer_data_table(data) {
        var row = '';
        $.each(data, function (key, value) {
            row += '<tr>';
            row += '<td class="text-center upper">' + value.firstName + '</td>';
            row += '<td class="text-center upper">' + value.lastName + '</td>';
            row += '<td class="text-center upper">' + value.email + '</td>';
            row += '<td class="text-center upper">' + value.phoneNumber + '</td>';
            // button part
            row += '<td class="text-center" data-id="' + value.id + '">';
            row += '<a href="viewUser.php?tokenId=' + value.tokenId + '&amp;id=' + value.id + '" class="btn btn-xs btn-primary view-members"> <i class="fa fa-eye"></i> </a>';
            row += '<button class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></button>';
            row += '<button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>';
            row += '</td>';
            row += '</tr>';
        });

        $("#viewLecturers").html(row);


    }

    function get_students_table(page) {

        $.ajax({
            url: '../../models/controller/getStudents.php',
            type: 'GET',
            data: { page: page },
            dataType: 'json',
            beforeSend: function () {

            }
        }).done(function (data) {
            if (data.data != 'zero') {

                    //calling the manage data table function
                manage_students_data_table(data.data);

            } else {
                $("#viewStudents").html('<h4 class="text-center">NO RECORD FOUND</h4>');
            }

        });
    }

    $("body").on("click", ".studentPagination_link", function () {
        var page = $(this).attr("id");
        get_students_table(page);
    });

    //the manage data table function
    function manage_students_data_table(data) {
        var row = '';
        $.each(data, function (key, value) {
            row += '<tr>';
            row += '<td class="text-center upper">' + value.firstName + '</td>';
            row += '<td class="text-center upper">' + value.lastName + '</td>';
            row += '<td class="text-center upper">' + value.email + '</td>';
            row += '<td class="text-center upper">' + value.phoneNumber + '</td>';
            // button part
            row += '<td class="text-center" data-id="' + value.id + '">';
            row += '<a href="viewUser.php?tokenId=' + value.tokenId + '&amp;id=' + value.id + '" class="btn btn-xs btn-primary view-members"> <i class="fa fa-eye"></i> </a>';
            row += '<button class="btn btn-xs btn-warning"><i class="fa fa-edit"></i></button>';
            row += '<button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>';
            row += '</td>';
            row += '</tr>';
        });

        $("#viewStudents").html(row);


    }



});
