$(document).ready(function() {
    var assessTable = $('#enrollTable').dataTable({
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
            url: "codes/fetch_enrollment.php",
            type: "POST"

        },
        "columnDefs": [{
            "target": [0,1,2,3,4,5,6],
            "orderable": false,
        }, ],
    });

    $(document).on('submit', '#assessForm', function(event) {
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
                url: "codes/sendassessment.php",
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
                        text: 'Assessment Form Sent!',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    $('#assessModal').modal('hide');

                    // $('#usersForm')[0].reset();

                    assessTable.api().ajax.reload();
                }

            })
        }
    })

    $(document).on('click', '.sendassessment', function() {
        var enroll_id = $(this).attr('id');


        $.ajax({
            url: "codes/sendassessment.php",
            method: "POST",
            data: {
                enroll_id: enroll_id
            },
            dataType: "json",
            success: function(data) {
                $('#assessModal').modal('show');
                $('#enroll_id').val(data.id);
                $('#fullname').val(data.fullname);
                $('#email').val(data.email);
                $('#mobile').val(data.mobile);
               


                $('.title').text(' Send Assessment');
                $('#enroll_id').val(enroll_id);

                $('#operation').val("Send");
                $('#action').val("Send");

            }
        })
    })

  

    $(document).on('click', '.close', function() {
        $('#assessModal').modal('hide');
    })

    $(document).on('click', '#close', function() {
        $('#assessModal').modal('hide');
    })


});