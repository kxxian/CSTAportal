



$(document).ready(function () {
    $('#myTable').DataTable();
    $("#OrNum").prop("disabled");

    $('#btnsendreceipt').click(function (e) {
        e.preventDefault();
        let chkOR = document.getElementById("OR");
        let chkAR = document.getElementById("AR");  
         let OrNum=$("#OrNum").val();
         let OReceipt=$("#OReceipt").val();
         let AReceipt=$("#AReceipt").val();
         let ArNum=$("#ArNum").val();
         let Remarks=$("#Remarks").val();

        if ((chkOR.checked) && (OReceipt=="" || OrNum=="") || Remarks=="") {
            norecord();
        }
        else if((chkAR.checked) && (AReceipt=="" || ArNum=="") || Remarks==""){
            norecord();
        }
        else if(chkAR.checked==false && chkOR.checked==false){
            norecord();
        }
        else{
            $.ajax({
				type: 'POST',
				url: 'codes/sendreceipt.php',
				// data: {
				// 	sendreceipt: 1,
				// 	Data: data
				// }
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                success: function(){
                    swal("Success!", "Receipt has been sent!", "success");
                    },
                    error: function(){} 	        
                    
                    });
                }
	})
})

// toggle controls
function toggle() {
var chk_OR=document.getElementById("OR");
var chk_AR=document.getElementById("AR");
var ORNum=document.getElementById("OrNum");
var OReceipt= document.getElementById("OReceipt");
var ArNum= document.getElementById("ArNum");
var remarks= document.getElementById("Remarks");
var btn= document.getElementById("btn");

//Receipts checkboxes
if ((chk_OR.checked)||(chk_AR.checked)){
btn.disabled=false;
OReceipt.disabled=false;
remarks.disabled=false;
}else{
btn.disabled=true;  
OReceipt.disabled=true;
remarks.disabled=true;
}

//O.R number
if(chk_OR.checked){
    ORNum.disabled=false;
    ORNum.required = true;
}else{
    ORNum.disabled=true;
    ORNum.required = false;
}
//O.R number
if(chk_AR.checked){
    ArNum.disabled=false;
    ArNum.required = true;
}else{
    ArNum.disabled=true;
    ArNum.required = false;
}}



//verify payment modal
function loadRecord(payment_ID) {
 $.ajax({
     type: "POST",
     url: "codes/pending-payments.php",
     data:
    {
           viewpaydetails: 1,
           payment_ID: payment_ID,
       }
   }).done(function (rec) {
       var rowEdit = $.parseJSON(rec);
    //    console.log(rec);
    $("#pv_ID").val(rowEdit['pv_ID']);
    $("#txtemail").val(rowEdit['email']);
    $("#txtsid").val(rowEdit['sid']);
    $("#txtname").val(rowEdit['fname']+' '+rowEdit['lname']);
    $("#sendreceipt").modal("show");
    

   });

    //close payment details modal
    $('.close').on('click', function() {
        $('#sendreceipt').modal('hide');

    });

}



function norecord(){
    swal({
        title: "Oops!",
        text: "Insufficient Data!",
        icon: "warning",
        buttons: false,
        timer: 2000
    })
}


