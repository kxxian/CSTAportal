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