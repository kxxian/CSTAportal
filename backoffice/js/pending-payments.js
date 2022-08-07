$(document).ready(function () {

    // Get all the "visibleamt" elements into an array
    let cells = Array.prototype.slice.call(document.querySelectorAll(".visibleamt"));

    // Loop over the array
    cells.forEach(function(cell){
    // Convert cell data to a number, call .toLocaleString()
    // on that number and put result back into the cell
    cell.textContent = (+cell.textContent).toLocaleString("fil-PH", {
                style: "currency",
                currency: "PHP"
            });
    });


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
       console.log(rec);
    $("#txt_id").val(rowEdit['pv_ID']);
    $("#txtemail").val(rowEdit['email']);
    $("#txtsid").val(rowEdit['sid']);
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


