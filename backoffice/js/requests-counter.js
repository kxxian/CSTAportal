$(document).ready(function() {
    //datatable currency
   // Get all the "currency" elements into an array
   let cells = Array.prototype.slice.call(document.querySelectorAll(".currency"));

   // Loop over the array
   cells.forEach(function(cell){
   // Convert cell data to a number, call .toLocaleString()
   // on that number and put result back into the cell
   cell.textContent = (+cell.textContent).toLocaleString("fil-PH", {
               style: "currency",
               currency: "PHP"
           });
   });

    setInterval(function() {
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

        //pending student account registrations
        $.post("codes/counter.php",
        {data5:'get'},function(data5){
            //console.log(data4)  ;
            if(data5>0){
                    // console.log(data3);
                $(".ctr_total_reg").addClass('badge-danger');
                $(".ctr_total_reg").text(data5);
           
            }else{
                $(".ctr_total_reg").removeClass('badge-danger');
                $(".ctr_total_reg").text('');
            }
        });


    //sidebar counter for assessments
    $.post("codes/counter.php",
    {data6:'get'},function(data6){
        
        if(data6>0){
                // console.log(data6);
            
            $(".for_assessment").text(data6.toLocaleString());
       
        }else{
          
            $(".for_assessment").text('');
        }
    });

       //dashboard counter for assessed students
       $.post("codes/counter.php",
       {data7:'get'},function(data7){
       
           if(data7>0){
                //    console.log(data7);
               $(".assessed_students").text(data7.toLocaleString());
           }else{
              
                $(".assessed_students").text("0");
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

           //dashboard counter for acknowledged payments
           $.post("codes/counter.php",
           {data10:'get'},function(data10){
           
               if(data10>0){
                    //    console.log(data7);
                   $(".for_receipt").text(data10.toLocaleString());
               }else{
                  
                    $(".for_receipt").text("0");
               }
           });

          //dashboard counter for acknowledged payments
           $.post("codes/counter.php",
           {data11:'get'},function(data11){
           
               if(data11>0){
                    //    console.log(data7);
                   $(".verified").text(data11.toLocaleString());
               }else{
                  
                    $(".verified").text("0");
               }
           });

           //sidebar counter for pending registrations
           $.post("codes/counter.php",
           {data12:'get'},function(data12){
           
               if(data12>0){
                    //    console.log(data7);
                   $(".pendingusers").text(data12.toLocaleString());
               }else{
                  
                    $(".pendingusers").text("0");
               }
           });
              //dashboard counter for total registered students
              $.post("codes/counter.php",
              {data13:'get'},function(data13){
              
                  if(data13>0){
                       //    console.log(data7);
                      $(".accepted").text(data13.toLocaleString());
                  }else{
                     
                       $(".accepted").text("0");
                  }
              });

              //sidebar counter for clearance request
              $.post("codes/counter.php",
              {data14:'get'},function(data14){
              
                  if(data14>0){
                       //    console.log(data7);
                      $(".ctr_clearance").text(data14.toLocaleString());
                  }else{
                     
                       $(".ctr_clearance").text("0");
                  }
              });

              
              //sidebar counter for enrollment
              $.post("codes/counter.php",
              {data15:'get'},function(data15){
              
                  if(data15>0){
                           //console.log(data15);
                      $(".ctr_enrollment").text(data15.toLocaleString());
                  }else{
                     
                       $(".ctr_enrollment").text("");
                  }
              });

               //sidebar counter for request of documents
               $.post("codes/counter.php",
               {data16:'get'},function(data16){
               
                   if(data16>0){
                            //console.log(data16);
                       $(".ctr_reqdocu").text(data16.toLocaleString());
                   }else{
                      
                        $(".ctr_reqdocu").text("");
                   }
               });

                //sidebar counter for request of grades
                $.post("codes/counter.php",
                {data17:'get'},function(data17){
                
                    if(data17>0){
                             //console.log(data17);
                        $(".ctr_gradereq").text(data17.toLocaleString());
                    }else{
                       
                         $(".ctr_gradereq").text("");
                    }
                });





    },1000);
    

});