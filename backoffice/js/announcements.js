$(document).ready(function() {
    $('#addAnnouncement').click(function() {
        $('#myForm')[0].reset();
        $('.title').text(' Add Announcement');
        $('#action').val("Add");
        $('#operation').val("Add");
    })

    var a_table = $('#a_table').dataTable({
        "paging": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "info": true,
        "pageLength": 5,
        "ajax": {
            url: "codes/fetch_announcements.php",
            type: "POST"

        },
        "columnDefs": [{
            "target": [0, 1, 2, 3, 4, 5],
            "orderable": false,
        }, ],
    });

    $(document).on('submit', '#myForm', function(event) {
        event.preventDefault();
      
        var day = $("#selday").val();
        var month = $("#selmonth").val();
        var title = $("#txttitle").val();
        var desc = $("#txtdesc").val();
        // var op = $("#operation").val();

        // alert(op);
       

        if (!day || !month || title === ''|| desc === '') {

            Swal.fire({
                icon: 'warning',
                title: 'Oops!',
                text: 'Insufficient Data!'
            })
        } else {
            $.ajax({
                url: "codes/announcementscrud.php",
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
                    $('#a_modal').modal('hide'); 
                    a_table.api().ajax.reload();
                    
                   
                     $('#myForm')[0].reset();

                 
                }

            })
        }
    })


    $(document).on('click', '.update', function() {
        var a_id = $(this).attr('id');

       // alert(a_id)

        $.ajax({
            url: "codes/announcementscrud.php",
            method: "POST",
            data: {
                announce_id: a_id
            },
            dataType: "json",
            success: function(data) {
                $('#a_modal').modal('show');
                $('#a_id').val(data.id);
                $('#selday').val(data.day);
                $('#selmonth').val(data.month);
                $('#txttitle').val(data.title);
                $('#txtdesc').val(data.desc);


                $('.title').text(' Edit Announcement');
                $('#a_id').val(a_id);

                $('#operation').val("Edit");
                $('#action').val("Save");

            }
        })
    })

    $(document).on('click', '.delete', function() {
        var a_id = $(this).attr('id');
        Swal.fire({
            title: 'Confirm',
            text: "Are you sure you want to delete this announcement?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "codes/announcementscrud.php",
                    method: "POST",
                    data: {
                        delete_id: a_id
                    },
                    success: function(data) {
                        a_table .api().ajax.reload();
                    }
                })
                Swal.fire(
                    'Success!',
                    'Announcement has been deleted.',
                    'success'
                )
            }
        })

    })


    $(document).on('click', '.close', function() {
        $('#a_modal').modal('hide');
    })

    $(document).on('click', '#close', function() {
        $('#a_modal').modal('hide');
    })


});
