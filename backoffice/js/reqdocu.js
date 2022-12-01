$(document).ready(function() {
    var reqdocuTable = $('#reqdocuTable').dataTable({
        dom: 'Bfrtip',
        
        buttons: [
            
            // {
            //     extend: 'csvHtml5',
            //     className:'btn btn-info',
            //     exportOptions: {
            //         columns: [1,2,14,16,19,20]
            //     }
            // },
            // {
            //     extend: 'excelHtml5',
            //     className:'btn btn-success',
            //     exportOptions: {
            //         columns: [0,1,2,3,4]
            //     }
            // },
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
        "ajax": {
            url: "codes/fetch_reqdocu.php",
            type: "POST"

        },
        "columnDefs": [{
            "target": [0,1,2,3,4],
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

                    reqdocuTable.api().ajax.reload();
                }

            })
        }
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






    $(document).on('click', '.decline', function() {
        var decline_id = $(this).attr('id');
        var email = $(this).attr('email');


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
                    url: "codes/ack_reqdocu.php",
                    method: "POST",
                    data: {
                        decline_id: decline_id,
                        email:email
                    },
                  
                })
                
              Swal.fire(
                'Success!',
                'Enrollment has been cancelled!',
                'success'
              )
              reqdocuTable.api().ajax.reload();
            
            }
        })
    })


    $(document).on('click', '.ack', function() {
        var id = $(this).attr('id');
        var email = $(this).attr('email');
        var fullname= $(this).attr('fullname');
        var sid= $(this).attr('sid');

        //alert(fullname);


        Swal.fire({
            title: 'Confirmation',
            text: "Are you sure you want to acknowledge this request?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "codes/ack_reqdocu.php",
                    method: "POST",
                    data: {
                        id: id,
                        email:email,
                        fullname:fullname,
                        sid:sid
                    },
                })
                
              Swal.fire(
                'Success!',
                'Request Acknowledged!',
                'success'
              )
              reqdocuTable.api().ajax.reload();
            
            }
        })
    })

  


});