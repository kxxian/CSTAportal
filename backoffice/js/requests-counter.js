$(document).ready(function() {
    setInterval(function() {
        $.post("codes/counter.php",
        {data:'get'},function(data){
     
            if(data>0){
                    //console.log(data);
                $(".ctr_pendingpayment").addClass('badge-danger');
                $(".ctr_pendingpayment").text(data);
           
            }else{
                $(".ctr_pendingpayment").removeClass('badge-danger');
                $(".ctr_pendingpayment").text('');
            }
        });

        $.post("codes/counter.php",
        {data2:'get'},function(data2){
     
            if(data2>0){
                    // console.log(data2);
                $(".ctr_rcvdpayment").addClass('badge-danger');
                $(".ctr_rcvdpayment").text(data2);
           
            }else{
                $(".ctr_rcvdpayment").removeClass('badge-danger');
                $(".ctr_rcvdpayment").text('');
            }
        });



    },1000);
    
});