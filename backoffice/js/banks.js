$(document).ready(function() {
  


    $('#addBank').click(function() {
        $('#banksForm')[0].reset();
        $('.title').text(' Add Bank Account');
        $('#action').val("Save");
        $('#operation').val("Add");
    })

    var banksTable = $('#banksTable').dataTable({
        "paging": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "info": true,
        "ajax": {
            url: "codes/fetch_banks.php",
            type: "POST"

        },
        "columnDefs": [{
            "target": [0, 1, 2, 3],
            "orderable": false,
        }, ],
    });

    $(document).on('submit', '#banksForm', function(event) {
        event.preventDefault();
      
            $.ajax({
                url: "codes/bankscrud.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Record Updated!',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    $('#banksModal').modal('hide');

                     $('#banksForm')[0].reset();

                    banksTable.api().ajax.reload();
                }

            })
      
    })


    $(document).on('click', '.update', function() {
        var po_id = $(this).attr('id');

        //alert(user_id)

        $.ajax({
            url: "codes/bankscrud.php",
            method: "POST",
            data: {
                po_id: po_id
            },
            dataType: "json",
            success: function(data) {
                $('#banksModal').modal('show');
                $('#po_id').val(data.po_id);
                $('#bank').val(data.bank);
                $('#accname').val(data.accname);
                $('#accnumber').val(data.accnumber);
                
                $('.title').text(' Edit Bank Details');
                $('#po_id').val(po_id);

                $('#operation').val("Edit");
                $('#action').val("Save");

            }
        })
    })

    $(document).on('click', '.delete', function() {
        var po_id = $(this).attr('id');
        Swal.fire({
            title: 'Confirm',
            text: "Are you sure you want to permanently delete this user?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "codes/bankscrud.php",
                    method: "POST",
                    data: {
                        delete_id: po_id
                    },
                    success: function(data) {
                        banksTable.api().ajax.reload();
                    }
                })
                Swal.fire(
                    'Success!',
                    'Bank Account deleted.',
                    'success'
                )
            }
        })

    })






    $(document).on('click', '.close', function() {
        $('#banksModal').modal('hide');
    })

    $(document).on('click', '#close', function() {
        $('#banksModal').modal('hide');
    })


});