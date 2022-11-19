$(document).ready(function() {
    var pendingpaymentsTable = $('#pendingpaymentsTable').dataTable({
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
            // {
            //     extend: 'pdfHtml5',
            //     className:'btn btn-danger',
            //     exportOptions: {
            //         columns: [0,1,2,3,4]
            //     }
            // },
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
        "bDestroy": true,
        "ajax": {
            url: "codes/fetchpending.php",
            type: "POST"

        },
        "columnDefs": [{
            "target": [0,1,2,3,4,5,6],
            "orderable": false,
        }, ],
    });
   

    $(document).on('submit', '#ackForm', function(event) {
        event.preventDefault();
      
            $.ajax({
                url: "codes/acknowledge.php",
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
                        text: 'Payment Acknowledged!',
                        showConfirmButton: false,
                        timer: 3000
                    })

              
                    pendingpaymentsTable.api().ajax.reload();
                    $('#paymentdetailsModal').modal('hide');
                }

            })
        
    })
    $(document).on('click', '.paymentdetails', function() {
        var payment_id = $(this).attr('id');
        

        $.ajax({
            url: "codes/acknowledge.php",
            method: "POST",
            data: {
                payment_id: payment_id
            },
            dataType: "json",
            success: function(data) {
                $('#paymentdetailsModal').modal('show');
                 $('#pv_ID').val(data.id);
                // $('#fullname').val(data.fullname);
                // $('#email').val(data.email);
                $('#date_sent').html(data.date_sent);
                $('#sent_via').html(data.sent_via);
                $('#date_sent').html(data.date_sent);
                $('#pay').html(data.pay);
                $('#dop').html(data.dop);
                $('#top').html(data.top);
                $('#term').html(data.term);
                $('#sysem').html(data.sysem);
                $('#tfee').html(data.tfee);
                $('#part').html(data.part);
                $('#ptotal').html(data.ptotal);
                $('#gtotal').html(data.gtotal);
                $('#amtpaid').html(data.amtpaid);
                $('#email').val(data.email);
                $('#fullname').val(data.fullname);
            
                $('#operation').val("ack");
                $('#action').val("Acknowledge");

            }
        })
    })


    $(document).on('click', '.close', function() {
        $('#paymentdetailsModal').modal('hide');
    })

    $(document).on('click', '#close', function() {
        $('#paymentdetailsModal').modal('hide');
    })

   
});