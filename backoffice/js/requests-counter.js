$(document).ready(function() {
    setInterval(function() {
        $.post("codes/counter.php",
        {data:'get'},function(data){
     
            if(data>0){
              

                    //alert(data);
                $(".ctr_pendingpayment").addClass('badge-danger');
                $(".ctr_pendingpayment").text(data);
           
            }else{
                $(".ctr_pendingpayment").removeClass('badge-danger');
                $(".ctr_pendingpayment").text('');
            }
           
            
        })
    },1000);

});