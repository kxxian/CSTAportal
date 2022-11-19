$(document).ready(function() {
    var enrollTable = $('#enrollTable_guest_cross_enrollee').dataTable({
        dom: 'Bfrtip',
        
        buttons: [
            
            // {
            //     extend: 'csvHtml5',
            //     className:'btn btn-info',
            //     exportOptions: {
            //         columns: [1,2,14,16,19,20]
            //     }
            // },
            {
                extend: 'excelHtml5',
                className:'btn btn-success',
                exportOptions: {
                    columns: [0,1,2,3,4]
                }
            },
            {
                extend: 'pdfHtml5',
                className:'btn btn-danger',
                exportOptions: {
                    columns: [0,1,2,3,4]
                }
            },
            {
                extend: 'print',
                className:'btn btn-secondary',
                exportOptions: {
                    columns: [0,1,2,3,4]
                }
            },
        
            'colvis'
        ],
        "paging": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "info": true,
        "ajax": {
            url: "codes/fetch_enrollment_ce.php",
            type: "POST"

        },
        "columnDefs": [{
            "target": [0,1,2,3,4,5],
            "orderable": false,
        }, ],
    });

    $(document).on('submit', '#enrollForm_guest_cross_enrollee', function(event) {
        event.preventDefault();
        var fullname = $("#fullname").val();
        var email = $("#email").val();
        var attachment = $("#attachment").val();
        
        
        if (fullname == "" || email == "" || attachment == "" ){

            Swal.fire({
                icon: 'warning',
                title: 'Oops!',
                text: 'Insufficient Data!'
            })
        } else {
            $.ajax({
                url: "codes/sendregform.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Success!',
                        text: 'Registration Form Sent!',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    $('#enrollModal_guest_cross_enrollee').modal('hide');

                    // $('#usersForm')[0].reset();

                    enrollTable.api().ajax.reload();
                }

            })
        }
    })

    $(document).on('click', '.sendregform', function() {
        var ev_ID = $(this).attr('id');
        var sid = $(this).attr('sid');

        // alert (sid);

        $.ajax({
            url: "codes/sendregform.php",
            method: "POST",
            data: {
                ev_ID: ev_ID
            },
            dataType: "json",
            success: function(data) {
                $('#enrollModal').modal('show');
                $('#ev_ID').val(data.id);
                $('#sid').val(data.sid);
                $('#fullname').val(data.fullname);
                $('#email').val(data.email);
                $('#mobile').val(data.mobile);
               
                $('.title').text(' Send Registration Form');
                $('#ev_ID').val(ev_ID);

                $('#operation').val("Send");
                $('#action').val("Send");

            }
        })
    })

  

    $(document).on('click', '.close', function() {
        $('#enrollModal_guest_cross_enrollee').modal('toggle');
    })

    $(document).on('click', '#close', function() {
        $('#enrollModal_guest_cross_enrollee').modal('toggle');
    })


});
