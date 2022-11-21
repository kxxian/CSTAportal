$(document).ready(function() {

    //read notifications
     $(document).on('click', '.notif_button', function() {
      let id = $(this).attr('id');
        
      setTimeout(function (){
        $.ajax({
            url: "codes/counter.php",
            method: "POST",
           data: {
               id: id,
                      
          },
      })

        },1500)



    //   setInterval(function() {
       

    // },2000);


            
})



    setInterval(function() {
                //notifications counter 
                $.post("codes/counter.php",
                {data1:'get'},function(data1){
                
                    if(data1>0 && data1<100){
                             //console.log(data1);
                        $(".ctr_notif").text(data1.toLocaleString());
                        
                    }else if(data1>99){
                        $(".ctr_notif").text("99+");
                    }
                    else{
                       
                         $(".ctr_notif").text("");
                    }
                });

                 //fetch notifications 
                $.ajax({
                    type: "POST",
                    url: "codes/counter.php",
                    data: {
                    param: 1
                    }
                }).done(function (rec) {
                    $('#notifications').html(rec)
                });





    },3000);
    

});

