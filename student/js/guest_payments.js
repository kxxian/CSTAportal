$(document).ready(function () {
    $('#myForm').on('submit', function (e) {
        e.preventDefault()

        $.ajax({
            type: "POST",
            url: "functions/fn_guest_payments.php",
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            processData: false,
            cache: false                    
        });
    });

    $('#btnSubmit').click(function () { 

        let fileName = $('#fileName').val()        
        let file = $('#file').val()
        let email = $('#email').val()        
        let fullName = $('#fullName').val()        

        if ( fileName === '' || file === '' || email === '' || fullName === '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                width: 400,
                text: 'Insufficient Data',
                showConfirmButton: false,
                timer: 1500
            })
        } else {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                width: 400,
                text: 'You have been able to upload successfuly!',
                showConfirmButton: false,
                timer: 1500
            })
           setTimeout(function (){
               window.location.href = 'guest_success.php'
           }, 1500)
        }
    });

    $('#file').change(function () { 
        let image = this.files[0]
        let fileType = image.type
        const match = ['image/jpeg', 'image/jpg', 'image/png']
        
        if(!(fileType === match[0] ||   fileType === match[1] === fileType === match[2])) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                width: 400,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                text: 'Only jpeg, jpg, and png are available filetypes to upload.'
            })

            $('#file').val('')
        }
    });
});