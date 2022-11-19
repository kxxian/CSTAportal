$(document).ready(function() {
    
    $("#regForm").validate({
        rules: {
            txtSnum: "required",
            txtLname:{
                required: true,
                minlength:2,
            },
            chkagree:{required:true},
        },
   
        messages: {
            chkagree: {
                required: "You must check at least 1 box",
                // maxlength: "Check no more than {0} boxes"
            }
        }
    });



    //Capitalize input fields
    $('#txtLname').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#txtFname').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#txtMname').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#txtCitizenship').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#txtguardian').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#txtCityadd').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });

   




    //populate region, province, city, brgy
    $('#region').on('change', function() {
        var regCode = $(this).val();
        if (regCode) {
            $.ajax({
                type: 'POST',
                url: 'codes/register.php',
                data: 'regCode=' + regCode,
                success: function(html) {
                    $('#provinces').html(html);
                }
            });
        } else {
            $('#provinces').html('<option selected="" disabled>Select Province</option>');
        }
    })
    $('#provinces').on('change', function() {
        var provCode = $(this).val();
        if (provCode) {
            $.ajax({
                type: 'POST',
                url: 'codes/register.php',
                data: 'provCode=' + provCode,
                success: function(html) {
                    $('#city').html(html);
                }
            });
        } else {
            $('#provinces').html('<option selected="" disabled>Select Province</option>');
            $('#city').html('<option selected="" disabled>Select City</option>');
        }
    });

    $('#city').on('change', function() {
        var citymunCode = $(this).val();
        if (citymunCode) {
            $.ajax({
                type: 'POST',
                url: 'codes/register.php',
                data: 'citymunCode=' + citymunCode,
                success: function(html) {
                    $('#barangay').html(html);
                }

            });
        } else {
            $('#provinces').html('<option selected="" disabled>Select Province</option>');
            $('#city').html('<option selected="" disabled>Select City</option>');
            $('#barangay').html('<option selected="" disabled>Select Barangay</option>');
        }
    });


    //PASSWORD VALIDATION
    $('#txtPassword, #confirmpassword').on('keyup', function() {

        if ($('#txtPassword').val() == "" || $('#confirmpassword').val() == "") {
            $('#message').html('');
        } else {

            if ($('#txtPassword').val().length <= 7) {
                $('#length').html('Weak Password').css('color', 'red');
                $('#length').html('Weak Password').css('font-weight', 'bold');
            } else if ($('#txtPassword').val().length = 0) {
                $('#length').html('');
            } else {
                $('#length').html('Great!').css('color', 'green');
                $('#length').html('Great!').css('font-weight', 'bold');
            }
        }

        if ($('#txtPassword').val() == "" && ($('#confirmpassword').val() == "")) {
            $('#length').html('');
        } else if ($('#confirmpassword').val() == "") {
            $('#message').html('');
        } else if ($('#txtPassword').val() == $('#confirmpassword').val()) {
            $('#message').html('Passwords Matched!').css('color', 'green');
            $('#message').html('Passwords Matched!').css('font-weight', 'bold');
        } else {
            $('#message').html("Passwords do not Match!").css('color', 'red');
            $('#message').html("Passwords do not Match!").css('font-weight', 'bold');
        }
    });




        //populate dpartments and courses
        $('#dept').on('change', function() {
            var dept_ID = $(this).val();
            if (dept_ID) {
                $.ajax({
                    type: 'POST',
                    url: 'codes/register.php',
                    data: 'dept_ID=' + dept_ID,
                    success: function(html) {
                        $('#courses').html(html);
                    }
                });
            } else {
                $('#courses').html('<option selected="" disabled>Select Course</option>');
            }
        })


});

 //USERNAME AVAILABILITY CHECKER
 function checkUserName() {
    var value = $('#txtUsername').val();
    if (value.length > 0 && value != "") {

    }
    $.ajax({
        type: "POST",
        url: "codes/check_username.php",
        data: 'userName=' + $("#txtUsername").val(),
        success: function(data) {
            $("#check-username").html(data);
        },
        error: function() {}
    });
}


// Validate Student Registration
function validateReg() {
    //var snum = $('#txtSnum').val();
    var lname = $('#txtLname').val();
    var fname = $('#txtFname').val();
    var mname = $('#txtMname').val();
    var bday = $('#dtBday').val();

    var detailss = lname + "^" + fname + "^" + mname + "^" + bday;
    
    if (lname.length > 0 && fname.length > 0) {

        $.ajax({
            type: "POST",
            url: "codes/validate_reg.php",
            data: {
                details: detailss,
                validate: 1
            },

            success: function(data) {
                $("#identityAlert").html(data);
                // console.log(data);
            },
            error: function() {
            }
        });
    }
    var mobile = $('#txtContactno').val();
    var email = $('#txtEmail').val();

    var contacts = mobile + "^" + email;

    if (mobile.length > 0 || email.length > 0) {
        $.ajax({
            type: "POST",
            url: "codes/validate_reg.php",
            data: {
                mobem: contacts,
                validate2: 1
            },

            success: function(data) {
                $("#mobileAlert").html(data);
                //console.log(data);
            },
            error: function() {}
        });
    }
    //validate snum
     var snum = $('#txtSnum').val();

     if (snum.length > 0) {

        $.ajax({
            type: "POST",
            url: "codes/validate_reg.php",
            data: {
                snum: snum,
                validate3: 1
            },

            success: function(data) {
                $("#regAlert").html(data);
                // console.log(data);
            },
            error: function() {
            }
        });
    }

}