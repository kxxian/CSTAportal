$(document).ready(function() {

  var enrollTable = $('#enrollTable').dataTable({
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
        url: "codes/fetch_enroll.php",
        type: "POST"

    },
    "columnDefs": [{
        "target": [0,1,2,3,4],
        "orderable": false,
    }, ],

    
});

var enrollvalTable = $('#enrollvalTable').dataTable({
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
      url: "codes/fetch_enrollval.php",
      type: "POST"

  },
  "columnDefs": [{
      "target": [0,1,2],
      "orderable": false,
  }, ],

  
});

setInterval (function() {
  enrollTable.api().ajax.reload();
  enrollvalTable.api().ajax.reload();
},10000)

    
    $(document).on('click', '.cancel_enroll', function() {
        var enroll_id = $(this).attr('id');
        var filename= $(this).attr('filename');
       // alert(filename);

        Swal.fire({
            title: 'Confirmation',
            text: "Are you sure you want to cancel your enrollment?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
          }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url: "codes/cancel_enroll.php",
                    method: "POST",
                    data: {
                        enroll_id: enroll_id,
                        filename:filename
                    },
                  
                })
                
              Swal.fire(
                'Success!',
                'Enrollment has been cancelled!',
                'success'
              )
              setTimeout(function(){// wait for 5 secs(2)
                enrollTable.api().ajax.reload();
           }, 500); 
            
            }
           
          })
         
    })

    $(document).on('click', '.cancel_enroll_validate', function() {
      var enroll_id = $(this).attr('id');
      var receipt = $(this).attr('receipt');
      var assessment = $(this).attr('assessment');

      // alert (receipt + assessment)
      Swal.fire({
          title: 'Confirmation',
          text: "Are you sure you want to cancel?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes'
        }).then((result) => {
          if (result.isConfirmed) {

              $.ajax({
                  url: "codes/cancel_enroll.php",
                  method: "POST",
                  data: {
                      enroll_valid_id: enroll_id,
                      receipt:receipt,
                      assessment:assessment
                  },
                
              })
              
            Swal.fire(
              'Success!',
              'Enrollment has been cancelled!',
              'success'
            )
            setTimeout(function(){// wait for 5 secs(2)
              enrollvalTable.api().ajax.reload();
         }, 500); 
          
          }
         
        })
       
  })



});