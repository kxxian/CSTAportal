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

    $(document).on('submit', '#declineForm', function(event) {
        event.preventDefault();
        var fullname = $("#fullname").val();
        var email = $("#email").val();
        
            $.ajax({
                url: "codes/decline.php",
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
                        text: 'Account Registration Declined!',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    $('#declineModal').modal('hide');

                    // $('#usersForm')[0].reset();

                    regTable.api().ajax.reload();
                }

            })
        
    })

    // $(document).on('click', '.decline', function() {
    //     var decline_id = $(this).attr('id');


    //     Swal.fire({
    //         title: 'Confirmation',
    //         text: "Are you sure you want to decline this registration?",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes'
    //       }).then((result) => {
    //         if (result.isConfirmed) {

    //             $.ajax({
    //                 url: "codes/accounts.php",
    //                 method: "POST",
    //                 data: {
    //                     decline_id: decline_id
    //                 },
                  
    //             })
                
    //           Swal.fire(
    //             'Success!',
    //             'Account Registration Declined!',
    //             'success'
    //           )
    //           regTable.api().ajax.reload();
            
    //         }
    //     })
    // })


    $(document).on('click', '.accept', function() {
        var accept_id = $(this).attr('id');
        var accept_email = $(this).attr('email');
        var sname=$(this).attr('sname');
        // alert(sname); 

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
                        accept_id: accept_id,
                        email:accept_email,
                        sname:sname
                    },
                  
                })
                
              Swal.fire(
                'Success!',
                'Account Registration Accepted!',
                'success'
              )
              regTable.api().ajax.reload();
            
            }
        })
    })



    $(document).on('click', '.decline', function() {
        var id = $(this).attr('id');
        $('#reason').val("");

        
        $.ajax({
            url: "codes/decline.php",
            method: "POST",
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {
                $('#declineModal').modal('show');
                $('#id').val(data.id);
                $('#fullname').val(data.fullname);
                $('#email').val(data.email);
                $('#mobile').val(data.mobile);
               
                $('.title').text(' Decline Request');
                $('#id').val(id);

                $('#operation').val("Send");
                $('#action').val("Send");

            }
        })
    })



    
    $(document).on('click', '.close', function() {
        $('#declineModal').modal('hide');
    })

    $(document).on('click', '#close', function() {
        $('#declineModal').modal('hide');
    })


  


});