

$(document).ready(function () {
   

 

 
    //load payment details on button click
    $('.btnPaymentDetails').on('click', function() {
        $('#sendreceipt').modal('show');
        paymentdetails();
    })

        //receive multiple
    $('.bulkReceive').on("click",function(){
        var id=[];
        var email_data = [];
      
        $(":checkbox:checked").each(function(key){
            id[key] = $(this).val();
        });

        if (id.length===0){
           norecord();
        }else{
            $('.single_select').each(function(){
                if($(this).prop('checked')==true){
                    
                    email_data.push({
                        id:$(this).data('id'),
                        email: $(this).data("email"),
                        name:$(this).data('name')
                    });
                }console.log(email_data);
            });          
            swal({
                title: "Are you sure?",
                text: "This action can not be undone!",
                icon: "info",
                buttons: true,
                dangerMode: false,
            })
                .then((willReceive) => {
                    if (willReceive) {
                        $.ajax({
                            method: "POST",
                            url: "codes/receive-payments.php",
                            data:
                            {
                               email_data:email_data
        
                              
                            }, beforeSend:function(){
                                $('.bulkReceive').html('Please Wait...');
                                $('.bulkReceive').addClass('btn-danger');
                            },
                            success:function(){

                                swal("Success!", "Payment Acknowledged!", "success").then(function(){ 
                                    setTimeout(function(){ 
                                        location.reload();
                                      }, 500);
        
                                  
                                   }
                                );
                              
                            }
                        })
                        
                 
                       
                    }
                });
        }

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
    //console.log(rec);
    $("#pv_id").val(rowEdit['pv_ID']);
    $("#txtemail").val(rowEdit['email']);
    $("#txtsid").val(rowEdit['sid']);
    $("#txtsnum").val(rowEdit['snum']);
    $("#dtDateSub").val(rowEdit['datepaid']);
    $("#txtName").val(rowEdit['lname']+', '+rowEdit['fname']+' '+rowEdit['mname']);
    // $("#txtFname").val("First Year");
    $("#txtCourse").val(rowEdit['course']);
    $("#txtTfee").val(rowEdit['tfeepayment']);
    $("#txtTerm").val(rowEdit['term']);
    $("#txtSySem").val(rowEdit['schoolyr']+' '+rowEdit['semester']);
    $("#txtOthers").val(rowEdit['particulars_total']);
    $("#txtParticulars").val(rowEdit['particulars']);
    $("#txtPaymethod").val(rowEdit['paymethod']);
    $("#txtSentVia").val(rowEdit['sentvia']);
    $("#txtGtotal").val(rowEdit['gtotal']);
    $("#txtNotes").val(rowEdit['note']);

    $("#viewpaydetails").modal("show");
   });

    //close payment details modal
    $('.close').on('click', function() {
        $('#viewpaydetails').modal('hide');

    });

}

//no record selected alert message
function norecord(){
    swal({
        title: "Oops!",
        text: "No Record Selected!",
        icon: "warning",
        buttons: false,
        timer: 2000
    })
}


