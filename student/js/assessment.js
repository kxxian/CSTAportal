$(document).ready(function () {
    $('#myForm').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'functions/assessment.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            processData: false,
            cache: false
        })
    });

    $('#fileupload').change(function () {
        let image = this.files[0]
        let fileType = image.type
        const match = ['image/jpeg', 'image/jpg', 'image/png']

        if(!(fileType === match[0] || fileType === match[1] || fileType === match[2])) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                width: 400,
                text: 'Only jpeg, jpg, png are available filetypes to upload.'
            })

            $('#fileupload').val('')
            return false
        }
    })

    $('#btnSubmit').click(function () { 
       let filename = $('#filename').val()
       let fileupload = $('#fileupload').val()

       if (filename === '' || fileupload === '') {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                width: 400,
                text: 'Insufficient Data',
                showConfirmButton: false,
                timer: 1300
            })
       } else {
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                width: 400,
                text: 'File successfuly uploaded!',
                showConfirmButton: false,
                timer: 1300
            })
            setTimeout(function () {
                $('#filename').val('')
                $('#fileupload').val('')
            }, 500)
       }
    });
});