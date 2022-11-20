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
            url: "codes/fetchpending_guest.php",
            type: "POST"

        },
        "columnDefs": [{
            "target": [0,1,2,3,4,5],
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

                    $('#assessModal').modal('hide');
                    pendingpaymentsTable.api().ajax.reload();
                    $('#paymentdetailsModal').modal('toggle');
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
                $('#payment_id').val(data.id);
                $('#fullname').val(data.fullname);
                $('#email').val(data.email);
                $('#date').val(data.date);
                $('#time').val(data.time);
                $('#tfee').val(data.tfeeamount);
                $('#appsy').val(data.appsy);
                $('#term').val(data.term);
                $('#others').val(data.others);
                $("#others_total").val(data.others_total);
                $("#paymethod").val(data.paymethod);
                $("#sentvia").val(data.sentvia);
                $("#gtotal").val(data.gtotal);
                $("#note").val(data.note);
                
                $('.title').text('Payment Details');
                $('#enroll_id').val(payment_id);
            
                $('#operation').val("ack");
                $('#action').val("Acknowledge");

            }
        })
    })


    $(document).on('click', '.close', function() {
        $('#paymentdetailsModal').modal('toggle');
    })

    $(document).on('click', '#close', function() {
        $('#paymentdetailsModal').modal('toggle');
    })

   
});
