$(document).ready(function () {

    $('#myForm').on('submit', function (e) {
        e.preventDefault()

        $.ajax({
            type: "POST",
            url: "functions/fn_guest_payments_insert.php",
            data: new FormData(this),
            dataType: "json",
            processData: false,
            contentType: false,
            cache: false
        });
    });

    $('#image').change(function () { 
        let image = this.files[0]
        let fileType = image.type
        const match = ['image/jpeg', 'image/jpg', 'image/png']

        if(!(fileType === match[0] || fileType === match[1] || fileType === match[2])) {
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
                text: 'Only jpeg, jpg, and png are available filetypes to upload'
            })


            $('#image').val('')
        }
    });

    $('#image2').change(function () { 
        let image = this.files[0]
        let fileType = image.type
        const match = ['image/jpeg', 'image/jpg', 'image/png']

        if(!(fileType === match[0] || fileType === match[1] || fileType === match[2])) {
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
                text: 'Only jpeg, jpg, and png are available filetypes to upload'
            })


            $('#image2').val('')
        }
    });

    $('#btnSubmit').click(function () { 

        let dateOfPayment = $('#dateOfPayment').val()
        let tutionFee = $('#tutionFee').val()
        let paymentMethod = $('#paymentMethod').val()
        let sentVia = $('#sentVia').val()
        let totalAmount = $('#totalAmount').val()
        let image = $('#image').val()
        let studentName = $('#studentName').val()
        let email = $('#email').val()
        let trackerId = $('#trackerId').val()

        if (dateOfPayment === '' || tutionFee === '' || schoolYear === '' || paymentMethod === '' || sentVia === '' || totalAmount === '' || image === '' || studentName === '' || email === '' || trackerId === '') {
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
            Swal.fire({
                icon: 'success',
                title: 'success',
                width: 400,
                position: 'top-right',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                },
                text: 'You have been able to submit successfuly!',
                showConfirmButton: false,
                timer: 1500
            })
            setTimeout(function () {
                window.location.href = 'guest_success.php'
            },1500)
        }
    });
});