$(document).ready(function() {
     //Capitalize input fields
     $('#lname').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });
    $('#fname').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });

    $('#mname').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });

    $('#position').keyup(function(){
        $(this).css("text-transform", "capitalize");
    });


    $('#addUser').click(function() {
        $('#usersForm')[0].reset();
        $('.title').text(' Add User');
        $('#action').val("Register");
        $('#operation').val("Add");
    })

    var usersTable = $('#usersTable').dataTable({
        "paging": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "info": true,
        "ajax": {
            url: "codes/fetch_users.php",
            type: "POST"

        },
        "columnDefs": [{
            "target": [0, 1, 2, 3, 4,5],
            "orderable": false,
        }, ],
    });

    $(document).on('submit', '#usersForm', function(event) {
        event.preventDefault();
      
            $.ajax({
                url: "codes/userscrud.php",
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

                    $('#usersModal').modal('hide');

                     $('#usersForm')[0].reset();

                    usersTable.api().ajax.reload();
                }

            })
      
    })


    $(document).on('click', '.update', function() {
        var user_id = $(this).attr('id');


        $.ajax({
            url: "codes/userscrud.php",
            method: "POST",
            data: {
                user_id: user_id
            },
            dataType: "json",
            success: function(data) {
                $('#usersModal').modal('show');
                $('#user_id').val(data.id);
                $('#lname').val(data.lname);
                $('#fname').val(data.fname);
                $('#mname').val(data.mname);
                $('#gender').val(data.Gender);
                $('#email').val(data.email);
                $('#mobile').val(data.mobile);
                $("#office").val(data.office);
                $("#dept").val(data.dept);
                $("#position").val(data.position);
                $("#role").val(data.role);
                


                $('.title').text(' Edit User');
                $('#user_id').val(user_id);

                $('#operation').val("Edit");
                $('#action').val("Save");

            }
        })
    })

    $(document).on('click', '.restrict', function() {
        var user_id = $(this).attr('id');
        Swal.fire({
            title: 'Confirm',
            text: "Are you sure you want to restrict this user?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "codes/userscrud.php",
                    method: "POST",
                    data: {
                        restrict_id: user_id
                    },
                    success: function(data) {
                        usersTable.api().ajax.reload();
                    }
                })
                Swal.fire(
                    'Success!',
                    'User has been restricted.',
                    'success'
                )
            }
        })

    })

    $(document).on('click', '.activate', function() {
        var user_id = $(this).attr('id');
        Swal.fire({
            title: 'Confirm',
            text: "Are you sure you want to activate this user?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "codes/userscrud.php",
                    method: "POST",
                    data: {
                        activate_id: user_id
                    },
                    success: function(data) {
                        usersTable.api().ajax.reload();
                    }
                })
                Swal.fire(
                    'Success!',
                    'User has been activated.',
                    'success'
                )
            }
        })

    })

    // $(document).on('click', '.delete', function() {
    //     var user_id = $(this).attr('id');
    //     Swal.fire({
    //         title: 'Confirm',
    //         text: "Are you sure you want to permanently delete this user?",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $.ajax({
    //                 url: "codes/userscrud.php",
    //                 method: "POST",
    //                 data: {
    //                     delete_id: user_id
    //                 },
    //                 success: function(data) {
    //                     usersTable.api().ajax.reload();
    //                 }
    //             })
    //             Swal.fire(
    //                 'Success!',
    //                 'User has been deleted.',
    //                 'success'
    //             )
    //         }
    //     })

    // })






    $(document).on('click', '.close', function() {
        $('#usersModal').modal('hide');
    })

    $(document).on('click', '#close', function() {
        $('#usersModal').modal('hide');
    })


});