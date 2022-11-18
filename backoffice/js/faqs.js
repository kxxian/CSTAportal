$(document).ready(function() {
    


    $('#add').click(function() {
        $('#faqForm')[0].reset();
        $('.title').text(' Add Question');
        $('#action').val("Save");
        $('#operation').val("Add");
    })

    var faqTable = $('#faqTable').dataTable({
        "paging": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "info": true,
        "ajax": {
            url: "codes/fetch_faqs.php",
            type: "POST"

        },
        "columnDefs": [{
            "target": [0, 1, 2],
            "orderable": false,
        }, ],
    });

    $(document).on('submit', '#faqForm', function(event) {
        event.preventDefault();
      
            $.ajax({
                url: "codes/faqcrud.php",
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

                    $('#faqModal').modal('hide');

                    // $('#usersForm')[0].reset();

                    faqTable.api().ajax.reload();
                }

            })
       
    })


    $(document).on('click', '.update', function() {
        var faq_id = $(this).attr('id');


        $.ajax({
            url: "codes/faqcrud.php",
            method: "POST",
            data: {
                faq_id: faq_id
            },
            dataType: "json",
            success: function(data) {
                $('#faqModal').modal('show');
                $('#faq_id').val(data.id);
                $('#question').val(data.question);
                $('#ans').val(data.ans);
            
                
                $('.title').text(' Edit Question');
                $('faq_id').val(faq_id);

                $('#operation').val("Edit");
                $('#action').val("Save");

            }
        })
    })

    $(document).on('click', '.delete', function() {
        var delete_id = $(this).attr('id');
        Swal.fire({
            title: 'Confirm',
            text: "Are you sure you want to delete this question?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "codes/faqcrud.php",
                    method: "POST",
                    data: {
                        delete_id: delete_id
                    },
                    success: function(data) {
                        faqTable.api().ajax.reload();
                    }
                })
                Swal.fire(
                    'Success!',
                    'Question deleted.',
                    'success'
                )
            }
        })

    })


    $(document).on('click', '.close', function() {
        $('#faqModal').modal('hide');
    })

    $(document).on('click', '#close', function() {
        $('#faqModal').modal('hide');
    })


});