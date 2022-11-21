$(document).ready(function() {

    setInterval(function() {
                //sidebar counter for notifications
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
    },2000);
    

});