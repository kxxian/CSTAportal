$(document).ready(function() {


  
    setInterval(function() {

        ////////////////////////////////////////ACCOUNTING
        $.post("codes/counter.php",
        {data:'get'},function(data){
     
            //pending payments
            if(data>0){
                    // console.log(data);
                $(".ctr_pendingpayment").addClass('badge-danger');
                $(".ctr_pendingpayment").text(data);
           
            }else{
                $(".ctr_pendingpayment").removeClass('badge-danger');
                $(".ctr_pendingpayment").text('');
            }
        });
        //acknowledged payments
        $.post("codes/counter.php",
        {data2:'get'},function(data2){
     
            if(data2>0){
                    //console.log(data2);
                $(".ctr_rcvdpayment").addClass('badge-danger');
                $(".ctr_rcvdpayment").text(data2);
           
            }else{
                $(".ctr_rcvdpayment").removeClass('badge-danger');
                $(".ctr_rcvdpayment").text('');
            }
        });
        //for receipt payments
        $.post("codes/counter.php",
        {data3:'get'},function(data3){
     
            if(data3>0){
                    // console.log(data3);
                $(".ctr_for_receipt").addClass('badge-danger');
                $(".ctr_for_receipt").text(data3);
           
            }else{
                $(".ctr_for_receipt").removeClass('badge-danger');
                $(".ctr_for_receipt").text('');
            }
        });

        //total requests
        $.post("codes/counter.php",
        {data4:'get'},function(data4){
            //console.log(data4)  ;
            if(data4>0){
                    // console.log(data3);
                $(".ctr_total_reqpay").addClass('badge-danger');
                $(".ctr_total_reqpay").text(data4);
           
            }else{
                $(".ctr_total_reqpay").removeClass('badge-danger');
                $(".ctr_total_reqpay").text('');
            }
        });







       //dashboard counter for pending payments
       $.post("codes/counter.php",
       {data8:'get'},function(data8){
       
           if(data8>0){
                //    console.log(data7);
               $(".pending_payments").text(data8.toLocaleString());
           }else{
              
                $(".pending_payments").text("0");
           }
       });

         //dashboard counter for acknowledged payments
         $.post("codes/counter.php",
         {data9:'get'},function(data9){
         
             if(data9>0){
                  //    console.log(data7);
                 $(".received_payments").text(data9.toLocaleString());
             }else{
                
                  $(".received_payments").text("0");
             }
         });

           //dashboard counter for for receipt
           $.post("codes/counter.php",
           {data10:'get'},function(data10){
           
               if(data10>0){
                    //    console.log(data7);
                   $(".for_receipt").text(data10.toLocaleString());
               }else{
                  
                    $(".for_receipt").text("0");
               }
           });

          //dashboard counter for for verified
           $.post("codes/counter.php",
           {data11:'get'},function(data11){
           
               if(data11>0){
                    //    console.log(data7);
                   $(".verified").text(data11.toLocaleString());
               }else{
                  
                    $(".verified").text("0");
               }
           });

   

              //sidebar counter for clearance request
              $.post("codes/counter.php",
              {data14:'get'},function(data14){
              
                  if(data14>0){
                       //    console.log(data7);
                      $(".ctr_clearance").text(data14.toLocaleString());
                  }else{
                     
                       $(".ctr_clearance").text("");
                  }
              });


                      

               //sidebar counter for cleared request of documents
               $.post("codes/counter.php",
               {data22:'get'},function(data22){
          
              if(data22>0){
                       //console.log(data16);
                  $(".ctr_c_reqdocu").text(data22.toLocaleString());
              }else{
                 
                   $(".ctr_c_reqdocu").text("");
                  
              }
          });

             //sidebar counter for total request of documents
             $.post("codes/counter.php",
             {data23:'get'},function(data23){
        
            if(data23>0){
                     //console.log(data16);
                $(".ctr_total_reqdocu").text(data23.toLocaleString());
            }else{
               
                 $(".ctr_total_reqdocu").text("");
           
            }
        });


          
 





    },1000);
    

});