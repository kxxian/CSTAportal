



$(document).ready(function () {
    $('#myTable').DataTable();

    $('#btnSendReceipt').click(function () {
           
    
        //let verifcode = $("#verif_code").val();
        let pv_ID = $("#pv_ID").val();
        let email = $("#txtemail").val();
        let ORNum=$("#OrNum").val();
        let OReceipt=$("#OReceipt").val();
        let AReceipt=$("#AReceipt").val();
        let ArNum=$("#ArNum").val();
        let Remarks=$("#Remarks").val();

        let data =  ORNum + '^' + OReceipt + '^' + ArNum + '^' + AReceipt + '^' + email + '^' + pv_ID

        if (ArNum==='' && ORNum==='' || OReceipt=='' || 
        AReceipt=='' || OReceipt=='' || Remarks==''){
            norecord();

            //alert (OReceipt);

        }else{
            $.ajax({
				type: 'POST',
				url: 'codes/sendreceipt.php',
				data: {
					upsert: 1,
					Data: data
				}
			}).done(function () {
				$('#sendreceipt').modal('toggle')
				if (id !== '') {
					Swal.fire({
						icon: 'success',
						title: 'Success!',
						width: 400,
						text: 'Your work has been updated!',
						showConfirmButton: false,
						timer: 1300
					})
				} else {
					Swal.fire({
						icon: 'success',
						title: 'Success!',
						width: 400,
						text: 'Your work has been saved!',
						showConfirmButton: false,
						timer: 1300
					})	
				}	
				// recordLoader()
			})
		}
	})
})
           
function toggle() {
var chk_OR=document.getElementById("OR");
var chk_AR=document.getElementById("AR");
var ORNum=document.getElementById("OrNum");
var OReceipt= document.getElementById("OReceipt");


var ArNum= document.getElementById("ArNum");
var Areceipt= document.getElementById("AReceipt");


if (chk_OR.checked) {

    OrNum.disabled = false;
    ORNum.required = true;
    OReceipt.disabled = false;
    OReceipt.required = true;
  
 
} else {
    OrNum.disabled = true;
    OReceipt.disabled = true;
   
}  
if (chk_AR.checked) {
    ArNum.disabled = false;
    ArNum.required = true;
    Areceipt.disabled = false;
    Areceipt.required = true;
   
    
} else {
    ArNum.disabled = true;
    Areceipt.disabled = true;
   
}  

}




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


