$(document).ready(function() {
    
    $('#toggle-two').bootstrapToggle({
        on: 'Enabled',
        off: 'Disabled'    });


    $('#addSy').click(function() {
        $('#syForm')[0].reset();
        $('.title').text(' Add School Year');
        $('#action').val("Save");
        $('#operation').val("Add");
    })

    $('#addSem').click(function() {
        $('#semForm')[0].reset();
        $('.title').text(' Add Semester');
        $('#action_sem').val("Save");
        $('#operation_sem').val("Add");
    })

    var syTable = $('#syTable').dataTable({
        "paging": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "info": true,
        "pageLength": 3,
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "ajax": {
            url: "codes/fetch_sy.php",
            type: "POST"

        },
        "columnDefs": [{
            "target": [0, 1, 2],
            "orderable": false,
        }, ],
    });

    var semTable = $('#semTable').dataTable({
        "paging": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "info": true,
        "pageLength": 3,
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "ajax": {
            url: "codes/fetch_sem.php",
            type: "POST"

        },
        "columnDefs": [{
            "target": [0, 1, ],
            "orderable": false,
        }, ],
    });

   
        //
    $(document).on('submit', '#syForm', function(event) {
        event.preventDefault();
        //var lname = $("#lname").val();
    
            $.ajax({
                url: "codes/sycrud.php",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                success: function(data) {
                  
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Success',
                        text:'School Year table updated.',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    // $('#usersForm')[0].reset();
                    syTable.api().ajax.reload();
                    $('#syModal').modal('hide');
               
                }

            })
    })

         //
         $(document).on('submit', '#semForm', function(event) {
            event.preventDefault();
            //var lname = $("#lname").val();
        
                $.ajax({
                    url: "codes/semcrud.php",
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
                            text:'Semester Table Updated',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        // $('#usersForm')[0].reset();
                        semTable.api().ajax.reload();
                        $('#semModal').modal('hide');
                   
                    }
    
                })
        })


    $(document).on('click', '.update', function() {
        var sy_id = $(this).attr('id');

        //alert(sy_id);

        $.ajax({
            url: "codes/sycrud.php",
            method: "POST",
            data: {
                sy_id: sy_id
            },
            dataType: "json",
            success: function(data) {
                $('#syModal').modal('show');
                $('#sy_id').val(data.id);
                $('#sy').val(data.schoolyr);
            
            
                $('.title').text(' Edit School Year');
                $('#sy_id').val(sy_id);

                $('#operation').val("Edit");
                $('#action').val("Save");

            }
        })
    })

    $(document).on('click', '.update_sem', function() {
        var sem_id = $(this).attr('id');

        //alert(sem_id);

        $.ajax({
            url: "codes/semcrud.php",
            method: "POST",
            data: {
                sem_id: sem_id
            },
            dataType: "json",
            success: function(data) {
                $('#semModal').modal('show');
                $('#sem_id').val(data.id);
                $('#sem').val(data.sem);
            
            
                $('.title').text(' Edit Semester');
                $('#sem_id').val(sem_id);

                $('#operation_sem').val("Edit");
                $('#action_sem').val("Save");

            }
        })
    })

    $(document).on('click', '.enable', function() {
        var sy_id = $(this).attr('id');
        ///alert (sy_id);
        Swal.fire({
            title: 'Confirm',
            text: "Are you sure you want to set this school year as current?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "codes/sycrud.php",
                    method: "POST",
                    data: {
                        enable_id: sy_id
                    },
                    success: function(data) {
                        if (data>0){
                            Swal.fire(
                                'Oops!',
                                'A school year is already active.',
                                'warning'
                            )
                        }else{
                            Swal.fire(
                                'Success!',
                                'School year set as current.',
                                'success')
                        }
                         syTable.api().ajax.reload();
                        // alert(data);
                    }
                })
                
            }
        })

    })

    $(document).on('click', '.disable', function() {
        var sy_id = $(this).attr('id');
        //alert(sy_id);
        Swal.fire({
            title: 'Confirm',
            text: "Are you sure you want to remove this school year as current?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "codes/sycrud.php",
                    method: "POST",
                    data: {
                        disable_id: sy_id
                    },
                    success: function(data) {
                        syTable.api().ajax.reload();
                    }
                })
                Swal.fire(
                    'Success!',
                    'School year removed as current.',
                    'success'
                )
            }
        })

    })

    $(document).on('click', '.enable_sem', function() {
        var sem_id = $(this).attr('id');
        alert (sem_id);
        Swal.fire({
            title: 'Confirm',
            text: "Are you sure you want to set this semester as current?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "codes/semcrud.php",
                    method: "POST",
                    data: {
                        enable_sem_id: sem_id
                    },
                    success: function(data) {
                        if (data>0){
                            Swal.fire(
                                'Oops!',
                                'A semester is already active.',
                                'warning'
                            )
                        }else{
                            Swal.fire(
                                'Success!',
                                'Semester set as current.',
                                'success')
                        }
                         semTable.api().ajax.reload();
                        // alert(data);
                    }
                })
                
            }
        })

    })

    $(document).on('click', '.disable_sem', function() {
        var sem_id = $(this).attr('id');
        //alert(sy_id);
        Swal.fire({
            title: 'Confirm',
            text: "Are you sure you want to remove this semester as current?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "codes/semcrud.php",
                    method: "POST",
                    data: {
                        disable_sem_id: sem_id
                    },
                    success: function(data) {
                        semTable.api().ajax.reload();
                    }
                })
                Swal.fire(
                    'Success!',
                    'Semester removed as current.',
                    'success'
                )
            }
        })

    })


    $(document).on('click', '.close', function() {
        $('#syModal').modal('hide');
    })

    $(document).on('click', '#close', function() {
        $('#syModal').modal('hide');
    })

    
    $(document).on('click', '.close', function() {
        $('#semModal').modal('hide');
    })

    $(document).on('click', '#close', function() {
        $('#semModal').modal('hide');
    })


});