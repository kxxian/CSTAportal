$(document).ready(function () {
    // var verifcode = $("#verif_code").val();
    // var pv_ID = $("#verif_code").val();

    // $('.btnVerify').on('click', function() {
   

    //     if (verifcode.length==0){
    //         norecord();
    //         }else{
    //             swal({
    //                 title: "Are you sure?",
    //                 text: "This action can not be undone",
    //                 icon: "warning",
    //                 buttons: true,
    //                 dangerMode: true,
    //               })
    //               .then((willVerify) => {
    //                 if (willVerify) {
    //                     $.ajax({
    //                         type: "POST",
    //                         url: "codes/verify-payments.php",
    //                         data:
    //                        {
    //                               verify: 1,
    //                               payment_ID: pv_ID,
    //                               verif_code:verif_code
    //                           }
    //                       }).success(function(){

    //                         swal("Success!", "Payment Verified!", "success").then(function(){ 
    //                             setTimeout(function(){ 
    //                                 location.reload();
    //                               }, 500);
    
                              
    //                            }
    //                         ); 

    //                       }
    //                       )
                       
                        
    //             }else{

    //             }
    //               });
                
    //         }
       



    // })
   

});


//payment details on modal
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
       console.log(rec);
    $("#txt_id").val(rowEdit['pv_ID']);
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


