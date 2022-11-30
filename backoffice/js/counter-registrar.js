$(document).ready(function() {


  
    setInterval(function() {

           //sidebar counter for pending registrations
           $.post("codes/counter.php",
           {data12:'get'},function(data12){
           
               if(data12>0){
                    //    console.log(data7);
                   $(".pendingusers").text(data12.toLocaleString());
               }else{
                  
                    $(".pendingusers").text("");
                   
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

                      //dashboard counter for total registered students
              $.post("codes/counter.php",
              {data18:'get'},function(data18){
              
                  if(data18>0){
                  
                       //    console.log(data7);
                      $(".staff_registrar").text(data18.toLocaleString());
                  }else{
                     
                       $(".staff_registrar").text("0");
                  }
              });

              
                      //dashboard counter for total upcoming events
                      $.post("codes/counter.php",
                      {data19:'get'},function(data19){
                      
                          if(data19>0){
                          
                               //    console.log(data7);
                              $(".up_events").text(data19.toLocaleString());
                          }else{
                             
                               $(".up_events").text("0");
                          }
                      });


                        //dashboard counter for total registrar office tasks
                        $.post("codes/counter.php",
                        {data20:'get'},function(data20){
                           
                            if(data20>0){
                                
                                 //    console.log(data7);
                                $(".tasks").text(data20.toLocaleString());
                            }else{
                                alert (data20)
                                 $(".tasks").text("0");
                            }
                        });


                     //sidebar counter for pending request of documents
                    $.post("codes/counter.php",
                    {data21:'get'},function(data21){
               
                   if(data21>0){
                            //console.log(data16);
                       $(".ctr_p_reqdocu").text(data21.toLocaleString());
                   }else{
                      
                        $(".ctr_p_reqdocu").text("");
                       
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


              //sidebar counter for requirements checking
              $.post("codes/counter.php",
              {data24:'get'},function(data24){
         
             if(data24>0){
                      //console.log(data16);
                 $(".ctr_checkreq").text(data24.toLocaleString());
             }else{
                
                  $(".ctr_checkreq").text("");
            
             }
         });

               //sidebar counter for freshman-registrations
               $.post("codes/counter.php",
               {data25:'get'},function(data25){
          
              if(data25>0){
                       //console.log(data16);
                  $(".ctr_regfreshman").text(data25.toLocaleString());
              }else{
                 
                   $(".ctr_regfreshman").text("");
             
              }
          });

           //sidebar counter for transferee-registrations
           $.post("codes/counter.php",
           {data26:'get'},function(data26){
      
          if(data26>0){
                   //console.log(data16);
              $(".ctr_regtrans").text(data26.toLocaleString());
          }else{
             
               $(".ctr_regtrans").text("");
         
          }
      });

            //sidebar counter for old students
            $.post("codes/counter.php",
            {data27:'get'},function(data27){
       
           if(data27>0){
                    //console.log(data16);
               $(".ctr_total_reg").text(data27.toLocaleString());
           }else{
              
                $(".ctr_total_reg").text("");
          
           }
       });

               //sidebar counter for total registrations
               $.post("codes/counter.php",
               {data28:'get'},function(data28){
          
              if(data28>0){
                       //console.log(data16);
                  $(".ctr_total_regs").text(data28.toLocaleString());
              }else{
                 
                   $(".ctr_total_regs").text("");
             
              }
          });
 





    },1000);
    

});