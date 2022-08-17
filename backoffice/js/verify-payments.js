$(document).ready(function () {
   

    $('.btnVerify').on('click', function() {
                //   success: function () {
               
            // }
    
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


