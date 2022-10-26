$(document).ready(function() {
     //Capitalize input fields
     $('#course').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#abbr').keyup(function(){
        $(this).css("text-transform", "uppercase");
    });


    $('#addDept').click(function() {
        $('#deptForm')[0].reset();
        $('.title').text(' Add Department');
        $('#action').val("Save");
        $('#operation').val("Add");
    })

    var deptTable = $('#deptTable').dataTable({
        "paging": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "info": true,
        "pageLength": 5,
        "ajax": {
            url: "codes/fetch_departments.php",
            type: "POST"

        },
        "columnDefs": [{
            "target": [0, 1, 2],
            "orderable": false,
        }, ],
    });

    $(document).on('submit', '#deptForm', function(event) {
        event.preventDefault();

            $.ajax({
                url: "codes/deptcrud.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Departments Table Updated!',
                        showConfirmButton: false,
                        timer: 1500
                    })

                    $('#deptModal').modal('hide');

                    // $('#usersForm')[0].reset();

                    deptTable.api().ajax.reload();
                }

            })
       
    })


    $(document).on('click', '.edit_dept', function() {
        var dept_id = $(this).attr('id');
        //alert (course_id);

        $.ajax({
            url: "codes/deptcrud.php",
            method: "POST",
            data: {
                dept_id: dept_id
            },
            dataType: "json",
            success: function(data) {
                $('#deptModal').modal('show');
                $('#dept_id').val(data.id);
                $('#dept').val(data.dept);
                $('#dept_email').val(data.dept_email);
                
                $('.title').text(' Edit Department');
                $('#dept_id').val(dept_id);

                $('#operation').val("Edit");
                $('#action').val("Save");
            }
        })
    })

    $(document).on('click', '.delete', function() {
        var dept_id = $(this).attr('id');
        Swal.fire({
            title: 'Confirm',
            text: "Are you sure you want to delete this department?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "codes/deptcrud.php",
                    method: "POST",
                    data: {
                        delete_dept_id: dept_id
                    },
                    success: function(data) {
                        deptTable.api().ajax.reload();
                    }
                })
                Swal.fire(
                    'Success!',
                    'Department has been deleted!.',
                    'success'
                )
            }
        })

    })



    $(document).on('click', '.close', function() {
        $('#deptModal').modal('hide');
    })

    $(document).on('click', '#close', function() {
        $('#deptModal').modal('hide');
    })


});