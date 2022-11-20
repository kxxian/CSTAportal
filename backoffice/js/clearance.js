$(document).ready(function() {
    var clearanceTable = $('#clearanceTable').dataTable({
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
                    columns: [0,1,2]
                }
            },
            // {
            //     extend: 'pdfHtml5',
            //     className:'btn btn-danger',
            //     exportOptions: {
            //         columns: [0,1,2]
            //     }
            // },
            {
                extend: 'print',
                className:'btn btn-secondary',
                exportOptions: {
                    columns: [0,1,2]
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
            url: "codes/fetch_clearance.php",
            type: "POST"

        },
        "columnDefs": [{
            "target": [0,1,2,3],
            "orderable": false,
        }, ],
    });

    $(document).on('submit', '#pendingForm', function(event) {
        event.preventDefault();
        var fullname = $("#fullname").val();
        var email = $("#email").val();
        // var attachment = $("#attachment").val();
        

            $.ajax({
                url: "codes/markpending_reqdocu.php",
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
                        text: 'Request marked as pending!',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    $('#pendingModal').modal('hide');

                    // $('#usersForm')[0].reset();

                    clearanceTable.api().ajax.reload();
                }

            })
      
    })



    $(document).on('click', '.markcleared', function() {
        var id = $(this).attr('id');
        var email = $(this).attr('email');
        var fullname= $(this).attr('fullname');
        var sid= $(this).attr('sid');
        var reqdoc_ID= $(this).attr('reqdoc');
        //alert (reqdoc_ID);

        //alert(id);
        $('#pendingModal').modal('show');

        Swal.fire({
            title: 'Mark as Cleared',
            text: "Are you sure?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "codes/clear_reqdocu.php",
                    method: "POST",
                    data: {
                        id: id,
                        email:email,
                        fullname:fullname,
                        sid:sid,
                        reqdoc_ID:reqdoc_ID

                    },
                })
                
              Swal.fire(
                'Success!',
                'Request Marked as Cleared!',
                'success'
              )
              clearanceTable.api().ajax.reload();
            
            }
        })
    })


    // $(document).on('click', '.markpending', function() {
    //     var id = $(this).attr('id');
    //     var email = $(this).attr('email');
    //     var fullname= $(this).attr('fullname');
    //     var sid= $(this).attr('sid');
    //     var reqdoc_ID= $(this).attr('reqdoc');
    //     alert (reqdoc_ID);

    //     // alert(id);


    //     Swal.fire({
    //         title: 'Mark as Pending',
    //         text: "Are you sure?",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes'
    //       }).then((result) => {
    //         if (result.isConfirmed) {
    //             $.ajax({
    //                 url: "codes/markpending.php",
    //                 method: "POST",
    //                 data: {
    //                     id: id
    //                 },
    //                 dataType: "json",
    //                 success: function(data) {
    //                     $('#pendingModal').modal('show');
    //                     // $('#id').val(data.id);
    //                     // $('#fullname').val(data.fullname);
    //                     // $('#email').val(data.email);
    //                     // $('#mobile').val(data.mobile);
                       
    //                     $('.title').text(' Decline Request');
    //                     // $('#id').val(id);
        
    //                     $('#operation').val("Send");
    //                     $('#action').val("Send");
        
    //                 }
    //             })
            
    //         }
    //     })
    // })


    $(document).on('click', '.markpending', function() {
        var id = $(this).attr('id');
        var email = $(this).attr('email');
        var fullname= $(this).attr('fullname');
        var sid= $(this).attr('sid');
        var reqdoc_ID= $(this).attr('reqdoc');
        //alert (reqdoc_ID);
        $('#reason').val("");

        
        $.ajax({
            url: "codes/markpending_reqdocu.php",
            method: "POST",
            data: {
                id: id,
               
            },
            dataType: "json",
            success: function(data) {
                $('#pendingModal').modal('show');
                $('#id').val(data.id);
                $('#fullname').val(fullname);
                $('#email').val(email);
             
               
                $('.title').text(' Mark as Pending');
                $('#id').val(id);
                $('#reqdoc_ID').val(reqdoc_ID);
                $('#operation').val("Send");
                $('#action').val("Send");

            }
        })
    })



    $(document).on('click', '.close', function() {
        $('#pendingModal').modal('hide');
    })

    $(document).on('click', '#close', function() {
        $('#pendingModal').modal('hide');
    })

  


});