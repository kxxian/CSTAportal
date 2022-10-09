$(document).ready(function() {
    var regTable = $('#regTable').dataTable({
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
            url: "codes/fetch_registrations.php",
            type: "POST"

        },
        "columnDefs": [{
            "target": [0,1,2,3,4,5],
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
                        text: 'Account Registration Accepted!',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    $('#assessModal').modal('hide');

                    // $('#usersForm')[0].reset();

                    regTable.api().ajax.reload();
                }

            })
        }
    })

    $(document).on('click', '.decline', function() {
        var decline_id = $(this).attr('id');


        Swal.fire({
            title: 'Confirmation',
            text: "Are you sure you want to decline this registration?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "codes/accounts.php",
                    method: "POST",
                    data: {
                        decline_id: decline_id
                    },
                  
                })
                
              Swal.fire(
                'Success!',
                'Enrollment has been cancelled!',
                'success'
              )
              regTable.api().ajax.reload();
            
            }
        })
    })


    $(document).on('click', '.accept', function() {
        var accept_id = $(this).attr('id');
        //var accept_email = $(this).attr('email');


        Swal.fire({
            title: 'Confirmation',
            text: "Are you sure you want to accept this registration?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "codes/accounts.php",
                    method: "POST",
                    data: {
                        accept_id: accept_id
                    },
                  
                })
                
              Swal.fire(
                'Success!',
                'Enrollment has been cancelled!',
                'success'
              )
              regTable.api().ajax.reload();
            
            }
        })
    })

  


});