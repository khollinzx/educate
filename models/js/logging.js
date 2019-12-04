$(document).ready(function(){

    $("#send").click(function(e){
        $('#loginUser').validate({
            rules: {
                password: {
                    required: true
                },
                username: {
                    required: true
                },
                
                
            },
            messages: {
                username : "Username Required",
                password : "Password Required",
                
                
            },
              submitHandler: submitForm
        });

        function submitForm(){
            var data = $("#loginUser").serialize();
            $.ajax({
                type: 'POST',
                url: 'models/controller/loginUsers.php',
                data: data,
                beforeSend: function(){
                    $("#msg").fadeOut();
                    $("#send").html('Validating...');
                    $("#msg2").html('<span> <img src="assets/build/images/loavding.gif"></span>');
                    $("#send").attr("disabled", true);
                },	
                success: function(response){
                    if (response == 6){
                        // $("#msg").html(response);
                        $("#send").html('connecting...');
                        $("#msg2").html('<span><img src="assets/build/images/loavding.gif""></span>');
                        window.location.href = "pages/student/index.php";

                    }else if (response == 5){
                        // $("#msg").html(response);
                        $("#send").html('connecting...');
                        $("#msg2").html('<span><img src="assets/build/images/loavding.gif""></span>');
                        window.location.href = "pages/lecturer/index.php";

                    } else if (response == 4) {
                        // $("#msg").html(response);
                        $("#send").html('connecting...');
                        $("#msg2").html('<span><img src="assets/build/images/loavding.gif""></span>');
                        window.location.href = "pages/admin/index.php";

                    }else{
                        $("#msg").fadeIn(1000,function(){
                            $("#msg").html('<div style="font-size: 14px;" class="alert btn-danger" role="alert"> '+response+' </div>');
                            $("#send").html('Login');
                            $("#msg2").html('');
                            $("#send").attr("disabled", false);
                            // $("#createUser")[0].reset();
                        });
                    }


                }
            });// ends create ajax 
        }

    });

});
