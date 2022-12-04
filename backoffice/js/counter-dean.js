$(document).ready(function() {


       ///////////////////////////////////DEAN
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

    //dashboard counter for pending assessments
    $.post("codes/counter.php",
       {data6:'get'},function(data6){
       
           if(data6>0){
                //    console.log(data7);
               $(".pending_assessments").text(data6.toLocaleString());
           }else{
              
                $(".pending_assessments").text("0");
           }
    });

        //dashboard counter for pending assessments
        $.post("codes/counter.php",
        {data7:'get'},function(data7){
        
            if(data7>0){
                 //    console.log(data7);
                $(".assessed").text(data7.toLocaleString());
            }else{
               
                 $(".assessed").text("0");
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




  
    setInterval(function() {

      


      //1- minute interval
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

    //dashboard counter for pending assessments
    $.post("codes/counter.php",
       {data6:'get'},function(data6){
       
           if(data6>0){
                //    console.log(data7);
               $(".pending_assessments").text(data6.toLocaleString());
           }else{
              
                $(".pending_assessments").text("0");
           }
    });

        //dashboard counter for pending assessments
        $.post("codes/counter.php",
        {data7:'get'},function(data7){
        
            if(data7>0){
                 //    console.log(data7);
                $(".assessed").text(data7.toLocaleString());
            }else{
               
                 $(".assessed").text("0");
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



    },60000);
    

});