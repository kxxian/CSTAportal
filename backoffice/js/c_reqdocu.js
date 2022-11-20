$(document).ready(function() {
    var p_reqdocuTable = $('#p_reqdocuTable').dataTable({
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
            url: "codes/fetch_c_reqdocu.php",
            type: "POST"

        },
        "columnDefs": [{
            "target": [0,1,2,3,4],
            "orderable": false,
        }, ],
    });

    $(document).on('submit', '#pendingForm', function(event) {
        event.preventDefault();
      
            $.ajax({
                url: "codes/sendsumpay_reqdocu.php",
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
                        text: 'Summary of Payment Sent!',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    $('#pendingModal').modal('hide');

                    // $('#usersForm')[0].reset();

                    p_reqdocuTable.api().ajax.reload();
                }

            })
        
    })

    $(document).on('click', '.view', function() {
        var req_id = $(this).attr('id');
        // alert(req_id)
                $.ajax({
                    url: "codes/drcrud.php",
                    method: "POST",
                    data: {
                        req_id: req_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#reqdocModal').modal('show');
                        // $('#payment_id').val(data.id);
                        $('#date_sent').html(data.date_sent);
                        $('#stat').html(data.studstat);
                        $('#bplace').html(data.birthplace);
                        $('#yeargrad').html(data.yeargrad);
                        $('#sch').html(data.sch);
                         $('#repr').html(data.repr);
                        $('#del').html(data.del);
                        $('#cnum').html(data.cnum);
                        $('#certi').html(data.certi);
                        $('#transs').html(data.transs);
                        $('#dip').html(data.dip);
                        $('#ctc').html(data.ctc);
                        $('#address').html(data.address);
                        $('#mobile').html(data.mobile);
                        $('#purpose').html(data.purpose);
                        $('#bday').html(data.bday);
                        $('#reqnum').html(data.reqnum);
                        $('#sname').html(data.sname);
                        $('#snum').html(data.snum);
                        $('#scourse').html(data.scourse);
                       
                        
              
        
                        $('#payment_id').val(req_id);
            }
        })
    })

    $(document).on('click', '.sendsumpay', function() {
        var id = $(this).attr('id');
        //alert (reqdoc_ID);
        $('#reason').val("");

        
        $.ajax({
            url: "codes/sendsumpay_reqdocu.php",
            method: "POST",
            data: {
                id: id,
               
            },
            dataType: "json",
            success: function(data) {
                $('#pendingModal').modal('show');
                $('#id').val(data.id);
                $('#fullname').val(data.fullname);
                $('#email').val(data.email);
             
               
                $('.title').text(' Send Summary of Payment');
                $('#id').val(id);
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