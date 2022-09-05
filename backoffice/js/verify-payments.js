$(document).ready(function () {

    var table = $('#myTable').DataTable( {
        dom: 'Bfrtip',
        
        buttons: [
            {
                extend: 'copyHtml5',
                className:'btn btn-primary',
                exportOptions: {
                    columns: [1,2,14,16,19,20],
                    
                }
            },
            // {
            //     extend: 'csvHtml5',
            //     className:'btn btn-info',
            //     exportOptions: {
            //         columns: [1,2,14,16,19,20]
            //     }
            // },
            {
                extend: 'excelHtml5',
                className:'btn btn-success',
                exportOptions: {
                    columns: [1,2,14,16,19,20]
                }
            },
            {
                extend: 'pdfHtml5',
                className:'btn btn-danger',
                exportOptions: {
                    columns: [1,2,14,16,19,20]
                }
            },
            {
                extend: 'print',
                className:'btn btn-secondary',
                exportOptions: {
                    columns: [1,2,14,16,19,20]
                }
            },
        
            'colvis'
        ]
      
    
    } );
   

    $('.btnVerify').on('click', function() {
           
    
        var verifcode = $("#verif_code").val();
        var pv_ID = $("#pv_ID").val();
                $.ajax({
                    type: "POST",
                    url: "codes/verify-payments.php",
                    data:
                    {
                        verify: 1,
                        payment_ID: pv_ID,
                        verif_code:verifcode
                         }
                        }).done(function () {
                            swal({
                                title: "Good job", 
                                text: "You clicked the button!", 
                                type: "success"
                              }).then(function(){ 
                            location.reload();
                            }
                            );
                       
                        });




 });
                

});


//verify payment modal
function loadRecord(payment_ID) {
    
 
 $.ajax({
     type: "POST",
     url: "codes/pending-payments.php",
     data:
    {
           viewpaydetails: 1,
           payment_ID: payment_ID,
       }
   }).done(function (rec) {
       var rowEdit = $.parseJSON(rec);
    //    console.log(rec);
    $("#pv_ID").val(rowEdit['pv_ID']);
    $("#txtemail").val(rowEdit['email']);
    $("#txtsid").val(rowEdit['sid']);
    $("#verifypayment").modal("show");
   });

    //close payment details modal
    $('.close').on('click', function() {
        $('#verifypayment').modal('hide');

    });

}



function norecord(){
    swal({
        title: "Oops!",
        text: "Insufficient Data!",
        icon: "warning",
        buttons: false,
        timer: 2000
    })
}


