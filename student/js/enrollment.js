$(document).ready(function() {
    
    $(document).on('click', '.cancel_enroll', function() {
        var enroll_id = $(this).attr('id');

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
                        enroll_id: enroll_id
                    },
                  
                })
                
              Swal.fire(
                'Success!',
                'Enrollment has been cancelled!',
                'success'
              )
              setTimeout(function(){// wait for 5 secs(2)
                location.reload(); // then reload the page.(3)
           }, 1500); 
            
            }
           
          })
         
    })

    $(document).on('click', '.cancel_enroll_validate', function() {
      var enroll_id = $(this).attr('id');

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
                      enroll_valid_id: enroll_id
                  },
                
              })
              
            Swal.fire(
              'Success!',
              'Enrollment has been cancelled!',
              'success'
            )
            setTimeout(function(){// wait for 5 secs(2)
              location.reload(); // then reload the page.(3)
         }, 1500); 
          
          }
         
        })
       
  })



});