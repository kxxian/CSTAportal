$(document).ready(function() {
    var checkreqTable = $('#checkreqTable').dataTable({
        // dom: 'Bfrtip',
        
        // buttons: [
            
        //     // {
        //     //     extend: 'csvHtml5',
        //     //     className:'btn btn-info',
        //     //     exportOptions: {
        //     //         columns: [1,2,14,16,19,20]
        //     //     }
        //     // },
        //     {
        //         extend: 'excelHtml5',
        //         className:'btn btn-success',
        //         exportOptions: {
        //             columns: [0,1,2,3,4,5]
        //         }
        //     },
        //     {
        //         extend: 'pdfHtml5',
        //         className:'btn btn-danger',
        //         exportOptions: {
        //             columns: [0,1,2,3,4,5]
        //         }
        //     },
        //     {
        //         extend: 'print',
        //         className:'btn btn-secondary',
        //         exportOptions: {
        //             columns: [0,1,2,3,4,5]
        //         }
        //     },
        
        //     'colvis'
        // ],
        "paging": true,
        "processing": false,
        "serverSide": true,
        "order": [],
        "info": true,
        "ajax": {
            url: "codes/fetch_checkreq.php",
            type: "POST"

        },
        "columnDefs": [{
            "target": [0,1,2,3,4,5,6],
            "orderable": false,
        }, ],
    });





    $(document).on('click', '.viewprofile', function() {
        var sid = $(this).attr('sid');
        var username=$(this).attr('username');
        // alert(sid)
        // alert(username)

       document.location.href = "viewprofile.php?stud="+(sid);


    })

    $(document).on('click', '.acceptreq', function() {
        var checkreq_ID = $(this).attr('id');
         var sid = $(this).attr('sid');

        // alert(sid)

        Swal.fire({
            title: 'Confirmation',
            text: "Are you sure you want to accept requirements?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "codes/acceptreq.php",
                    method: "POST",
                    data: {
                        accept_id: checkreq_ID,
                        sid:sid
                    },
                  
                })
                
              Swal.fire(
                'Success!',
                'Student Requirements Accepted!',
                'success'
              )
              checkreqTable.api().ajax.reload();
            
            }
        })
    })

  


});
