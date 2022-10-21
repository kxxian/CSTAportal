$(document).ready(function() {
    var reqgradesTable = $('#reqgradesTable').dataTable({
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
                    columns: [0,1,2,3,4,5]
                }
            },
            {
                extend: 'pdfHtml5',
                className:'btn btn-danger',
                exportOptions: {
                    columns: [0,1,2,3,4,5]
                }
            },
            {
                extend: 'print',
                className:'btn btn-secondary',
                exportOptions: {
                    columns: [0,1,2,3,4,5]
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
            url: "codes/fetch_reqgrades.php",
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
                url: "codes/reqgrades.php",
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
                        text: 'Grades Sent!',
                        showConfirmButton: false,
                        timer: 3000
                    })

                    $('#reqgradesModal').modal('hide');

                    // $('#usersForm')[0].reset();

                    reqgradesTable.api().ajax.reload();
                }

            })
        }
    })

    $(document).on('click', '.sendgrades', function() {
        var gradereq_ID = $(this).attr('id');
        //console.log(gradereq_ID);

        $.ajax({
            url: "codes/reqgrades.php",
            method: "POST",
            data: {
                gradereq_ID: gradereq_ID
            },
            dataType: "json",
            success: function(data) {
                $('#reqgradesModal').modal('show');
                $('#gradereq_ID').val(data.id);
                $('#fullname').val(data.fullname);
                $('#email').val(data.email);
                //$('#mobile').val(data.mobile);
               


                $('.title').text(' Send Grades');
                $('#gradereq_ID').val(gradereq_ID);

                $('#operation').val("Send");
                $('#action').val("Send");

            }
        })
    })

  

    $(document).on('click', '.close', function() {
        $('#reqgradesModal').modal('hide');
    })

    $(document).on('click', '#close', function() {
        $('#reqgradesModal').modal('hide');
    })


});