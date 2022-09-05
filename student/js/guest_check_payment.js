function checkTrackerId() {
    $.ajax({
        type: "POST",
        url: "functions/fn_guest_check_payment.php",
        data: "trackerId=" +$("#trackerId").val(),
        success: function (data) {
            $("#valid_trackerId").html(data)
        },
        error: function() {}
    });
}

$(document).ready(function () {
    $('#btnSubmit').click(function () { 
        let trackerId = $('#trackerId').val();
        
        if (trackerId === '') {
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
        }
    });
});