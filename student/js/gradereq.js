$(document).ready(function() {
   // var reqtable= $('#reqtable').dataTable();

   var reqTable = $('#reqTable').dataTable({
    dom: 'Bfrtip',
  
    "paging": true,
    "processing": false,
    "serverSide": true,
    "order": [],
    "info": true,
    searching: false, 
    paging: false,
    info: false,
    "ajax": {
        url: "codes/fetch_reqgrades.php",
        type: "POST"

    },
    "columnDefs": [{
        "target": [0,1,2,3,4],
        "orderable": false,
    }, ],
});









    $(document).on('click', '.cancelgradereq', function() {
        var gradereq_id = $(this).attr('id');

        Swal.fire({
            title: 'Confirmation',
            text: "Are you sure you want to cancel this request?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "codes/gradereq.php",
                    method: "POST",
                    data: {
                        gradereq_id: gradereq_id
                    },
                  
                })
                
              Swal.fire(
                'Success!',
                'Grade request cancelled!',
                'success'
              )
              setTimeout(function(){// wait for 5 secs(2)
                // location.reload(); // then reload the page.(3)
                
                 reqTable.api().ajax.reload();
           }, 1000); 
            
            }
           
          })
         
    })

});