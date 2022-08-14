$(document).ready(function () {
    $('#btnSubmit').click(function (e) { 
        e.preventDefault();
        
        let firstName = $('#firstName').val()
        let lastName = $('#lastName').val()
        let address = $('#address').val()       
        let email = $('#email').val()       
        let mobile = $('#mobile').val()       
        let course = $('#course').val()       
        let guardian = $('#guardian').val()       
        let guardianNo = $('#guardianNo').val()       
        let guardianEmail = $('#guardianEmail').val()    
        
        if (firstName === '' || lastName === '' || address === '' || email === '' || mobile === '' || course === '' || guardian === '' || guardianNo === '' || guardianEmail === '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                width: 400,
                position: 'top-right',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                text: 'Insufficient Data',
                showConfirmButton: false,
                timer: 1500
            })
        } else {
            $.ajax({
                type: "POST",
                url: "functions/fn_guest_register_tesda.php",
                data: $('#myForm').serialize(),
            });
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                width: 400,
                text: 'You have been able to register successfuly!',
                showConfirmButton: false,
                timer: 1500
            })
            setTimeout(function (){
                window.location.href = 'guest_blank.php'
            }, 1500)
        }
    });
});