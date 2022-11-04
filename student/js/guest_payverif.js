$(document).ready(function () {

    //Capitalize input fields
    $('#lname').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#fname').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#mname').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#maidname').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#citizenship').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#txtguardian').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#cityadd').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });

    $('#birthplace').keyup(function(){
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



    // $('#btnSubmit').click(function (e) { 
    //     e.preventDefault();

    //     let firstName = $('#firstName').val()
    //     let lastName = $('#lastName').val()
    //     let address = $('#address').val()       
    //     let email = $('#email').val()       
    //     let mobile = $('#mobile').val()       
    //     let course = $('#course').val()       
    //     let guardian = $('#guardian').val()       
    //     let guardianNo = $('#guardianNo').val()       
    //     let guardianEmail = $('#guardianEmail').val()     
	// 	let studType = $('#studType').val()
        
    //     if (firstName === '' || lastName === '' || address === '' || email === '' || mobile === '' || course === '' || guardian === '' || guardianNo === '' || guardianEmail === '' || studType === '') {
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Error',
    //             width: 400,
    //             text: 'Insufficient Data',
    //             position: 'top-right',
    //             showClass: {
    //                 popup: 'animate__animated animate__fadeInDown'
    //             },
    //             hideClass: {
    //                 popup: 'animate__animated animate__fadeOutUp'
    //             },
    //             showConfirmButton: false,
    //             timer: 1500
    //         })
    //     } else {
    //         $.ajax({
    //             type: "POST",
    //             url: "functions/fn_guest_register.php",
    //             data: $('#myForm').serialize()
    //         });
    //         Swal.fire({
    //             icon: 'success',
    //             title: 'Success!',
    //             width: 400,
	// 			position: 'top-right',
	// 			showClass: {
	// 				popup: 'animate__animated animate__fadeInDown'
	// 			},
	// 			hideClass: {
	// 				popup: 'animate__animated animate__fadeOutUp'
	// 			},
    //             text: 'You have been able to register successfuly!',
    //             showConfirmButton: false,
    //             timer: 1500
    //         })
    //         setTimeout(function () {
    //             window.location.href = 'guest_blank.php'
    //         }, 1500)
    //     }
        
    // });
});
