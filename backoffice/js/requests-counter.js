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

    },1000);
    

});